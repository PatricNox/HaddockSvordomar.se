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
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Meta --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
@include('layout.partials.site--loader')
