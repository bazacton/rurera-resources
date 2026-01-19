<html>
<head>
    <title>{{ $pageTitle ?? '' }}{{ !empty($generalSettings['site_name']) ? (' | '.$generalSettings['site_name']) : '' }}</title>

    <!-- General CSS File -->
    <link rel="stylesheet" href="/assets/default/css/app.css">
</head>
<body class="play-iframe-page">
@if(!empty($iframe))
    {!! $iframe !!}
@else
    <iframe src="{{ $path }}" frameborder="0" allowfullscreen class="interactive-file-iframe"></iframe>
@endif
</body>
</html>
