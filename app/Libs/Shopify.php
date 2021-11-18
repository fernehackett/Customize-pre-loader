<?php

namespace App\Libs;

use App\Models\User;

class Shopify
{
    public function create(User $shop, $scriptTag)
    {
        $setting = $shop->setting;
        if ($setting && $setting->script_tag_id) {
            $this->deleteScriptTag($shop, $setting->script_tag_id);
        }
        $response = $shop->api()->rest('POST', '/admin/api/script_tags.json', $scriptTag);
        return $response['body'];
    }

    public function getScriptTag(User $shop)
    {
        $response = $shop->api()->rest('get', '/admin/api/script_tags.json');
        $scriptTags = $response['body']->container['script_tags'];
        return $scriptTags;
    }

    public function deleteScriptTag(User $shop, $scripTagId)
    {
        $response = $shop->api()->rest('delete', "/admin/api/script_tags/{$scripTagId}.json");
        return $response['body'];
    }

    public function getWebhooks(User $shop)
    {
        $response = $shop->api()->rest('get', "/admin/api/webhooks.json");
        return $response['body']->container['webhooks'];
    }

    public function createWebHook(User $shop, $data)
    {
        $data = [
            "webhook" => [
                "topic" => "app/uninstalled",
                "address" => route('uninstall'),
            ]
        ];
        $response = $shop->api()->rest('post', "/admin/api/webhooks.json", $data);
        return $response['body'];
    }

    public function getCurrentTheme(User $shop)
    {
        $response = $shop->api()->rest('get', "/admin/api/themes.json");
        $themes = $response['body']->container['themes'];
        foreach ($themes as $theme) {
            if ($theme['role'] == "main") {
                return $theme;
            }
        }
        return null;
    }

    public function getAssetThemeLayout(User $shop, $themeId, $key= "layout/theme.liquid")
    {
        $response = $shop->api()->rest('get', "/admin/api/".config('shopify-app.api_version')."/themes/{$themeId}/assets.json", [
            'asset[key]' => $key
        ]);
        return $response;
    }

    public function getAssetTheme(User $shop, $themeId)
    {
        $response = $shop->api()->rest('get', "/admin/api/2021-10/themes/{$themeId}/assets.json");
        return $response['body']->container;
    }

    public function getAccessToken(User $shop)
    {
        dd($shop->api()->getSession());
    }


}
