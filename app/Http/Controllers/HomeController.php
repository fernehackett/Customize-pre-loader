<?php

namespace App\Http\Controllers;

use App\Jobs\CreateWebHooks;
use App\Models\Loader;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public function index(Request $request)
    {
//        CreateWebHooks::dispatch(Auth::user());
        $loaders = Loader::select('name', 'id')->get();
        return view('setting.index', compact('loaders'));
    }

    public function uninstall(Request $request): JsonResponse
    {
        $domain = $request->domain ?? null;
        if ($domain)
        {
            $shop = User::where('name', $domain)->first();
            $shop->update(['install_webhooks'=> false]);
            $shop->forceDelete();
        }
        return Response::json([]);
    }

    public function customerDataRequest(Request $request): JsonResponse
    {
        Log::info($request->all());
        return Response::json([]);
    }

    public function customerRedact(Request $request): JsonResponse
    {
        Log::info($request->all());
        return Response::json([]);
    }

    public function shopRedact(Request $request): JsonResponse
    {
        Log::info($request->all());
        return Response::json([]);
    }

    public function policy()
    {
        return view("policy");
    }
}
