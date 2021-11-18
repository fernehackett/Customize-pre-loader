<?php

namespace App\Http\Controllers;

use App\Libs\Shopify;
use App\Models\Setting;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SettingController extends Controller
{
    private $shopify;
    public function __construct()
    {
        $this->shopify = new Shopify();
    }

    public function store(Request $request)
    {
        try {
            $user = User::where('email', $request->user_id)->first();
            if (!$user) throw new \Exception('Shop not found!');
            $data = $request->all();
            $data['user_id'] = $user->id;
            $data['active'] = isset($request->active) ?? false;
            $data['loader_time'] = is_null($data['loader_time']) ? 3000 : $data['loader_time'];
            $data['background_hex'] = !isset($data['background_hex']) ? "#eee" : $data['background_hex'];
            $setting = Setting::updateOrCreate(['user_id' => $data['user_id']], $data);
            if(!$data['active'] && $setting->script_tag_id)
            {
                $this->shopify->deleteScriptTag($user, $setting->script_tag_id);
                $setting->update(['script_tag_id'=>null]);
            }else{
                return $this->createScriptTag($user);
            }
            return Response::json(['message' => 'Your setting has been updated!']);
        } catch (\Exception $exception) {
            return Response::json(['message' => $exception->getMessage()], 500);
        }
    }

    public function show(Setting $setting)
    {
        if ($setting->loader)
            return Response::view('loaders.loader_script', ['setting' => $setting, 'loader' => $setting->loader])->header('Content-Type', 'application/javascript');
    }

    public function createScriptTag(User $shop)
    {
        $setting = $shop->setting;
        $scriptTag = [
            "script_tag" => [
                'event' => 'onload',
                'src' => route('settings.show', $setting),
                'display_scope' => 'online_store',
            ]];
        $scriptTag = $this->shopify->create($shop, $scriptTag);
        $setting->update(['script_tag_id' => $scriptTag->script_tag->id]);
        return Response::json(['message' => 'Your setting has been updated!']);
    }

    private function updateTheme(User $user)
    {
        $currentTheme = $this->shopify->getCurrentTheme($user);
        $currentThemeId = $currentTheme['id'];
        $themAssets = $this->shopify->getAssetTheme($user, $themeId);
    }

}
