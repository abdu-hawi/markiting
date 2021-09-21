<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{!! 'منصة إس'.$title ?? 'Market' !!}</title>

    <link rel="icon" href="{!! asset('favicon.ico') !!}" type="image/x-icon">

    <style>
        .dtHorizontalExampleWrapper {
            max-width: 600px;
            margin: 0 auto;
        }
        #dtHorizontalExample th, td {
            white-space: nowrap;
        }

        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
            bottom: .5em;
        }
    </style>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{!! asset('/design/plugins/fontawesome-free/css/all.min.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('/design/dist/css/adminlte.min.css') !!}">
{{--    <link rel="stylesheet" href="{!! asset('/design/dist/css/bootstrap-RTL-4.1.1.css') !!}">--}}
    <link rel="stylesheet" href="{!! asset('/design/dist/css/app.style.css') !!}">
    @stack('css')
{{--    <link rel="stylesheet" href="{!! asset('/design/dist/css/dashboard-style-ar.css') !!}">--}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
    <style>
        body {
            font-family: 'Cairo';
        }
    </style>
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
