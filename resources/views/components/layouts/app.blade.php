<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased">
    {{ $slot }}

    <script type='text/javascript' src='{{ asset('js/jquery.js') }}'></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <!-- script -->
    <script src="{{ asset('js/jquery.nice-select.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('select:not(.no-nice)').niceSelect();
        });
    </script>

    <script src="{{ asset('js/slider.js') }}"></script>
    <script>
        jQuery(function() {
            jQuery("#slider_range").flatslider({
                min: 10000,
                max: 100000000,
                step: 1,
                values: [10000, 100000000],
                range: true,
                einheit: '',
                change: function(event, ui) {
                    // Moved to component
                }
            });
        });
    </script>
    <script>
        $(".click_to_show .btn").click(function() {
            $(".search_bar").slideToggle(120, function() {
                if ($(".search_bar").is(':visible')) {
                    $(".search_bar").css('overflow', 'visible');
                } else {
                    $(".search_bar").css('overflow', 'hidden');
                }
            });
        });
    </script>

    @livewireScripts
</body>
</html>
