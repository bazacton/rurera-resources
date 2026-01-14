<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@php
    $rtlLanguages = !empty($generalSettings['rtl_languages']) ? $generalSettings['rtl_languages'] : [];
$rand_no = rand(99,9999);

    $isRtl = ((in_array(mb_strtoupper(app()->getLocale()), $rtlLanguages)) or (!empty($generalSettings['rtl_layout']) and $generalSettings['rtl_layout'] == 1));
@endphp

<head>
    @include('web.default.includes.metas', ['question_play' => true])
    <title>Play Area</title>

    <!-- General CSS File -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="/assets/admin/vendor/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/default/css/common.min.css?ver={{$rand_no}}">
    <link rel="stylesheet" href="/assets/default/css/quiz-common.css?ver={{$rand_no}}">
	<link rel="stylesheet" href="/assets/default/css/responsive.css?ver={{$rand_no}}">


    @if($isRtl)
        <link rel="stylesheet" href="/assets/default/css/rtl-app.css">
    @endif

    @stack('styles_top')
    @stack('scripts_top')


</head>

<body class="@if($isRtl) rtl @endif">
    <div id="app">
        @yield('content')
    </div>
    <!-- Template JS File -->
    <script src="/assets/default/vendors/sweetalert2/dist/sweetalert2.min.js"></script>



    @if(empty($justMobileApp) and checkShowCookieSecurityDialog())
        @include('web.default.includes.cookie-security')
    @endif


    @if(session()->has('toast'))
        <script>
            (function () {
                "use strict";

                $.toast({
                    heading: '{{ session()->get('toast')['title'] ?? '' }}',
                    text: '{{ session()->get('toast')['msg'] ?? '' }}',
                    bgColor: '@if(session()->get('toast')['status'] == 'success') #43d477 @else #f63c3c @endif',
                    textColor: 'white',
                    hideAfter: 10000,
                    position: 'bottom-right',
                    icon: '{{ session()->get('toast')['status'] }}'
                });
            })(jQuery)
        </script>
    @endif

    @stack('styles_bottom')
    @stack('scripts_bottom')


</body>
</html>
