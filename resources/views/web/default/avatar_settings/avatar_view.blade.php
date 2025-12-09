@php
    $user_avatar_settings = $user->user_avatar_settings;
    $user_avatar_settings = json_decode($user_avatar_settings);
    $avatar_settings = isset( $user_avatar_settings->avatar_settings )? (array) $user_avatar_settings->avatar_settings : array();
    $avatar_color_settings = isset( $user_avatar_settings->avatar_color_settings )? (array) $user_avatar_settings->avatar_color_settings : array();
    $avatar_settings = json_encode($avatar_settings);
    $avatar_color_settings = json_encode($avatar_color_settings);

@endphp
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
@push('styles_top')
        <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">

        <link href="/assets/default/vendors/svgavatars/css/normalize.css" rel="stylesheet">
        <link href="/assets/default/vendors/svgavatars/css/spectrum.css" rel="stylesheet">
        <link href="/assets/default/vendors/svgavatars/css/svgavatars.css" rel="stylesheet">

        <script src="/assets/default/vendors/svgavatars/js/jquery-3.5.1.min.js"></script>
        <script src="/assets/default/vendors/svgavatars/js/svgavatars.tools.js"></script>
        <script src="/assets/default/vendors/svgavatars/js/svgavatars.defaults.js"></script>
        <script src="/assets/default/vendors/svgavatars/js/languages/svgavatars.en.js"></script>
        <script src="/assets/default/vendors/svgavatars/js/svgavatars.core.min.js"></script>

<div id="svgAvatars" class="mobile-avar-view" data-token_id="{{$token_id}}" data-user_pref="{{$user->user_preference}}">ssssss</div>

    @push('scripts_bottom')

    @endpush
        <script type="text/javascript">
            var user_avatar_settings = '<?php echo $avatar_settings; ?>';
            var avatar_color_settings = '<?php echo $avatar_color_settings; ?>';

            user_avatar_settings = JSON.parse(user_avatar_settings);
            avatar_color_settings = JSON.parse(avatar_color_settings);
            token_id = $(".mobile-avar-view").attr('data-token_id');





            $(document).ready(function () {
                start_id = $("#svgAvatars").attr('data-user_pref');
                start_id = (start_id == 'female') ? 'girls' : 'boys';
                $("#svga-start-" + start_id).click();

                $("#svga-saveavatar").addClass('svga-saveavatar-token');
                $(".svga-saveavatar-token").removeAttr('id'); // removes the id 'svga-saveavatar'
                $(".svga-saveavatar-token").attr('id', 'svga-saveavatar-token'); // assigns new id
                $("#svga-saveavatar-token").removeClass('svga-saveavatar-token');


            });

        </script>

        <script>
        $(document).ready(function () {
            function setMobilePadding() {
                if ($(window).width() <= 767) {
                    var adjacentHeight = $('.mobile-avar-view .svga-vert-order-svgcanvas').outerHeight();
                    $('.mobile-avar-view .svga-col-right').css('padding-top', (adjacentHeight) + 'px');
                } else {
                    $('.mobile-avar-view .svga-col-right').css('padding-top', '');
                }
            }

            setMobilePadding();

            // function setMobilePosition() {
            //     if ($(window).width() <= 767) {
            //         var adjacentHeight = $('.mobile-avar-view .svga-vert-order-svgcanvas').outerHeight();
            //         $('.mobile-avar-view .svga-vert-order-glob-controls').css('top', adjacentHeight + 'px');
            //     } else {
            //         $('.mobile-avar-view .svga-vert-order-glob-controls').css('top', '');
            //     }
            // }
            setMobilePosition();

            $(window).on('resize', function () {
                setMobilePadding();
                setMobilePosition();
            });
        });
        </script>
        <script>
        $(document).ready(function () {

            $(document).on('click', '.svga-bodyzones', function (e) {
                function setMobilePadding() {
                if ($(window).width() <= 767) {
                    var adjacentHeight = $('.mobile-avar-view .svga-col-right').outerHeight();
                    $('.svga-col-left').css('padding-top', (adjacentHeight - 60) + 'px');
                } else {
                    $('.svga-col-left').css('padding-top', '');
                }
            }
            setMobilePadding();

            $(window).on('resize', function () {
                setMobilePadding();
            });

            });

        });
        </script>
        <script src="/assets/default/js/panel/user_setting.min.js"></script>
