<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- Preload --}}
    <link rel="preload" href="{{ asset('css/app.css') }}" as="style" media="print">
    <link rel="preload" href="{{ asset('js/app.js') }}" as="script">

    {{-- Style --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    {{-- Title --}}
    {{-- TODO - Change based on tenant --}}
    <title>Kapten Haddock's samlade svordomar | Från Tin Tin</title>

    {{-- Meta --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- SEO --}}
    {{-- TODO - Change based on tenant --}}
    <meta name="description" content="Kapten Haddock's samlade svordomar!">
    <meta name=”robots” content="index, follow">
    <meta property="og:title" content="Haddock's Svordomar">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:site_name" content="Haddock's Svordomar">
    <meta property="twitter:title" content="Haddock's Svordomar">
    <meta property="twitter:description" content="Kapten Haddock's samlade svordomar!">
    <meta property="og:description" content="Kapten Haddock's samlade svordomar!">
</head>
@include('layout.partials.site--loader')
