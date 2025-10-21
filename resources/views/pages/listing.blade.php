<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Texture Property</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="css/nice-select.css">
    @livewireStyles
</head>

<body>
    {{-- Header --}}
    @livewire('header')

    <div class="clearfix"></div>
    <div class="container">
        @livewire('property-listing')
    </div><!--END OF CONTAINER-->
    <div class="clearfix"></div>

    {{-- Footer --}}
    @livewire('footer')

    <script type='text/javascript' src='js/jquery.js'></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery-1.8.3.js"></script>
    <script src="js/jquery-ui.js"></script>
    <!-- script -->
    <script src="js/jquery.nice-select.js"></script>
    <script>
        $(document).ready(function() {
            $('select').niceSelect();
        });
    </script>

    <script src="js/slider.js"></script>
    <script>
        jQuery(function() {
            jQuery("#slider_range").flatslider({
                min: 10000,
                max: 100000000,
                step: 1,
                values: [10000, 100000000],
                range: true,
                einheit: ''
            });
        });
    </script>
    <script>
        $(".click_to_show .btn").toggle(function() {
            $(".search_bar").slideDown(120);
            $(".search_bar").css('overflow', 'visible');
        }, function() {
            $(".search_bar").slideUp(100);
            $(".search_bar").css('overflow', 'hidden');
        });
        /*   $(function(){
        	$(".click_to_show .btn").click(function(){
        		$(".search_bar").toggle(600);
        		});
        });*/
    </script>
    @livewireScripts
</body>

</html>
