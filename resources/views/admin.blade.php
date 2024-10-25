<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="google-site-verification" content="ZfiUTa4rWyIl1rYf1F89BFq3MkDmnrP8f5s2NfQYdwo" />
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <link rel="canonical" href="{{ url()->full() }}" />
    <meta name="robots" content="index, follow" />
    @vite(['resources/css/admin/app.css', 'resources/js/admin/app.js'])
</head>
<body>
    <div id="app">
        <router-view></router-view>
    </div>
</body>
</html>
