@extends('shopify-app::layouts.default')
@section('styles')
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
@stop
@section('content')
    <div class="bg-gray-100 w-full h-full">
        <div class="max-w-7xl py mx-auto py-12 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <div class="getting-started">
                    <h1 class="text-6xl font-normal leading-normal mt-0 mb-2 text-purple-800">Preloadify</h1>
                    <div class="ml-1 border-4 p-2 border-purple-600">
                        <h5 class="text-2xl mb-0 font-normal leading-normal mt-0 mb-2 text-gray-800">Description</h5>
                        <p class="text-lg mr-2 leading-normal mt-2 mb-4 text-gray-800">Add preloader to your
                            website easily, compatible with all major browsers. </p>

                        <h5 class="text-2xl mt-2 font-normal leading-normal mt-0 mb-2 text-gray-800">THE FEATURES</h5>
                        <ul class="list-disc ml-8">
                            <li>Custom background color.</li>
                            <li>4 Options to display Preloader (display it in the entire website or in posts only or in
                                pages only, etc).
                            </li>
                            <li>Compatible with Google Chrome, FireFox, Opera, Safari,etc.</li>
                            <li>Easy to use.</li>
                        </ul>

                        <h5 class="text-2xl mt-2 font-normal leading-normal mt-0 mb-2 text-gray-800">How to use</h5>
                        <ol class="list-decimal ml-7">
                            <li>From your Shopify admin, goto Online <span class="font-semibold">Store</span> > <span class="font-semibold">Theme</span>.</li>
                            <li>Find the theme that you want to edit, and then click <span class="font-semibold">Customize</span>.</li>
                            <li>Click to <span class="font-semibold">Theme Setting</span> (in left bottomm) > <span class="font-semibold">App Embeds</span>.</li>
                            <li><span class="font-semibold">Enable Preloadify</span> and customize background color, time or select Preloader.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
    @parent
    <script>
    </script>
@stop
