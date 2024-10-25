<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @include('partials._head')

        <style>
            .driver-status-label {
                font-weight: bold;
                font-size: 1.5rem;
            }
            .admin-profile-icon {
                color: #048484;
                font-size: 1.5rem;
            }
        </style>

    </head>
    <body class="" id="app">

        @include('partials._body')

    </body>

</html>
