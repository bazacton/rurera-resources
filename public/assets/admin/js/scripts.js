"use strict";

// ChartJS
if (window.Chart) {
    Chart.defaults.global.defaultFontFamily = "'Nunito', 'Segoe UI', 'Arial'";
    Chart.defaults.global.defaultFontSize = 12;
    Chart.defaults.global.defaultFontStyle = 500;
    Chart.defaults.global.defaultFontColor = "#999";
    Chart.defaults.global.tooltips.backgroundColor = "#000";
    Chart.defaults.global.tooltips.bodyFontColor = "rgba(255,255,255,.7)";
    Chart.defaults.global.tooltips.titleMarginBottom = 10;
    Chart.defaults.global.tooltips.titleFontSize = 14;
    Chart.defaults.global.tooltips.titleFontFamily = "'Nunito', 'Segoe UI', 'Arial'";
    Chart.defaults.global.tooltips.titleFontColor = '#fff';
    Chart.defaults.global.tooltips.xPadding = 15;
    Chart.defaults.global.tooltips.yPadding = 15;
    Chart.defaults.global.tooltips.displayColors = false;
    Chart.defaults.global.tooltips.intersect = false;
    Chart.defaults.global.tooltips.mode = 'nearest';
}

// DropzoneJS
if (window.Dropzone) {
    Dropzone.autoDiscover = false;
}

// Basic confirm box
$('[data-confirm]').each(function () {
    var me = $(this),
        me_data = me.data('confirm');

    me_data = me_data.split("|");
    me.fireModal({
        title: me_data[0],
        body: me_data[1],
        buttons: [
            {
                link: true,
                href: me.data('confirm-href') || '/',
                text: me.data('confirm-text-yes') || 'Yes',
                class: 'btn btn-danger btn-shadow',
                handler: function () {
                    eval(me.data('confirm-yes'));
                }
            },
            {
                text: me.data('confirm-text-cancel') || 'Cancel',
                class: 'btn btn-secondary',
                handler: function (modal) {
                    $.destroyModal(modal);
                    eval(me.data('confirm-no'));
                }
            }
        ]
    })
});

// Global
$(function () {
    let sidebar_nicescroll_opts = {
        cursoropacitymin: 0,
        cursoropacitymax: .8,
        zindex: 892
    }, now_layout_class = null;

    var sidebar_sticky = function () {
        if ($("body").hasClass('layout-2')) {
            $("body.layout-2 #sidebar-wrapper").stick_in_parent({
                parent: $('body')
            });
            $("body.layout-2 #sidebar-wrapper").stick_in_parent({recalc_every: 1});
        }
    }
    sidebar_sticky();

    var sidebar_nicescroll;
    var update_sidebar_nicescroll = function () {
        let a = setInterval(function () {
            if (sidebar_nicescroll != null)
                sidebar_nicescroll.resize();
        }, 10);

        setTimeout(function () {
            clearInterval(a);
        }, 600);
    }

    var sidebar_dropdown = function () {
        if ($(".main-sidebar").length) {
            $(".main-sidebar").niceScroll(sidebar_nicescroll_opts);
            sidebar_nicescroll = $(".main-sidebar").getNiceScroll();

            $(".main-sidebar .sidebar-menu li a.has-dropdown").off('click').on('click', function () {
                var me = $(this);
                var active = false;
                if (me.parent().hasClass("active")) {
                    active = true;
                }

                $('.main-sidebar .sidebar-menu li.active > .dropdown-menu').slideUp(500, function () {
                    update_sidebar_nicescroll();
                    return false;
                });

                $('.main-sidebar .sidebar-menu li.active').removeClass('active');

                if (active == true) {
                    me.parent().removeClass('active');
                    me.parent().find('> .dropdown-menu').slideUp(500, function () {
                        update_sidebar_nicescroll();
                        return false;
                    });
                } else {
                    me.parent().addClass('active');
                    me.parent().find('> .dropdown-menu').slideDown(500, function () {
                        update_sidebar_nicescroll();
                        return false;
                    });
                }

                return false;
            });

            $('.main-sidebar .sidebar-menu li.active > .dropdown-menu').slideDown(500, function () {
                update_sidebar_nicescroll();
                return false;
            });
        }
    }
    sidebar_dropdown();

    if ($("#top-5-scroll").length) {
        $("#top-5-scroll").css({
            height: 315
        }).niceScroll();
    }

    $(".main-content").css({
        minHeight: $(window).outerHeight() - 108
    })

    $(".nav-collapse-toggle").on('click', function () {
        $(this).parent().find('.navbar-nav').toggleClass('show');
        return false;
    });

    $(document).on('click', function (e) {
        $(".nav-collapse .navbar-nav").removeClass('show');
    });

    // var toggle_sidebar_mini = function (mini) {
    //     let body = $('body');

    //     if (!mini) {
    //         body.removeClass('sidebar-mini');
    //         $(".main-sidebar").css({
    //             overflow: 'hidden'
    //         });
    //         setTimeout(function () {
    //             $(".main-sidebar").niceScroll(sidebar_nicescroll_opts);
    //             sidebar_nicescroll = $(".main-sidebar").getNiceScroll();
    //         }, 500);
    //         $(".main-sidebar .sidebar-menu > li > ul .dropdown-title").remove();
    //         $(".main-sidebar .sidebar-menu > li > a").removeAttr('data-toggle');
    //         $(".main-sidebar .sidebar-menu > li > a").removeAttr('data-original-title');
    //         $(".main-sidebar .sidebar-menu > li > a").removeAttr('title');
    //     } else {
    //         body.addClass('sidebar-mini');
    //         body.removeClass('sidebar-show');
    //         sidebar_nicescroll.remove();
    //         sidebar_nicescroll = null;
    //         $(".main-sidebar .sidebar-menu > li").each(function () {
    //             let me = $(this);

    //             if (me.find('> .dropdown-menu').length) {
    //                 me.find('> .dropdown-menu').hide();
    //                 me.find('> .dropdown-menu').prepend('<li class="dropdown-title pt-3">' + me.find('> a').text() + '</li>');
    //             } else {
    //                 me.find('> a').attr('data-toggle', 'tooltip');
    //                 me.find('> a').attr('data-original-title', me.find('> a').text());
    //                 $("[data-toggle='tooltip']").tooltip({
    //                     placement: 'right'
    //                 });
    //             }
    //         });
    //     }
    // }

    // $("[data-toggle='sidebar']").on('click', function () {

    //     var body = $("body"),
    //     w = $(window);

    //     if (w.outerWidth() <= 1200) {
    //         body.removeClass('search-show search-gone');
    //         if (body.hasClass('sidebar-gone')) {
    //             body.removeClass('sidebar-gone');
    //             body.addClass('sidebar-show');
    //         } else {
    //             body.addClass('sidebar-gone');
    //             body.removeClass('sidebar-show');
    //         }

    //         update_sidebar_nicescroll();
    //     } else {
    //         body.removeClass('search-show search-gone');
    //         if (body.hasClass('sidebar-mini')) {
    //             toggle_sidebar_mini(false);
    //         } else {
    //             toggle_sidebar_mini(true);
    //         }
    //     }

    //     return false;
    // });


    // Main Sidebar Function Start
    $(document).ready(function () {
        var $body = $('body');

        // Ensure globals exist (safe guards)
        window.sidebar_nicescroll = window.sidebar_nicescroll || null;
        window.sidebar_nicescroll_opts = window.sidebar_nicescroll_opts || {};

        // --- Tooltip helpers ---
        function init_sidebar_tooltips() {
            var $els = $(".main-sidebar [data-toggle='tooltip']");
            if (!$els.length) return;
            // dispose existing tooltips (prevent duplicates)
            if ($.fn.tooltip) $els.tooltip('dispose');

            // ensure title attribute present (Bootstrap reads title)
            $els.each(function () {
            var $a = $(this);
            var text = $a.attr('title') || $a.data('original-title') || $a.text().trim();
            $a.attr('title', text);
            });

            // init tooltips appended to body so they are not clipped
            $els.tooltip({
            placement: 'right',
            trigger: 'hover',
            container: 'body'
            });
        }

        function destroy_sidebar_tooltips() {
            var $els = $(".main-sidebar [data-toggle='tooltip']");
            if (!$els.length || !$.fn.tooltip) return;
            $els.tooltip('dispose');
            $els.removeAttr('title data-original-title');
        }

        // --- Mini toggle (keeps behavior you had) ---
        function toggle_sidebar_mini(mini) {
            if (!mini) {
            // switch to normal
            $body.removeClass('sidebar-mini');
            $(".main-sidebar").css({ overflow: 'hidden' });

            setTimeout(function () {
                if ($.fn.niceScroll) {
                $(".main-sidebar").niceScroll(sidebar_nicescroll_opts);
                sidebar_nicescroll = $(".main-sidebar").getNiceScroll();
                }
            }, 500);

            $(".main-sidebar .sidebar-menu > li > ul .dropdown-title").remove();

            // remove tooltip attributes + destroy any tooltips
            destroy_sidebar_tooltips();
            $(".main-sidebar .sidebar-menu > li > a")
                .removeAttr('data-toggle data-original-title title');
            } else {
            // switch to mini
            $body.addClass('sidebar-mini').removeClass('sidebar-show');

            if (typeof sidebar_nicescroll !== "undefined" && sidebar_nicescroll) {
                sidebar_nicescroll.remove();
                sidebar_nicescroll = null;
            }

            $(".main-sidebar .sidebar-menu > li").each(function () {
                var me = $(this);
                var $a = me.find('> a');

                if (me.find('> .dropdown-menu').length) {
                me.find('> .dropdown-menu').hide();
                me.find('> .dropdown-menu').prepend(
                    '<li class="dropdown-title pt-3">' + $a.text().trim() + '</li>'
                );
                } else {
                // set attributes needed for bootstrap tooltip to work
                $a.attr('data-toggle', 'tooltip');
                $a.attr('title', $a.text().trim());
                $a.attr('data-original-title', $a.text().trim());
                }
            });

            // initialize tooltips (appended to body)
            init_sidebar_tooltips();
            }
        }

        // --- Main toggle handler (desktop vs mobile) ---
        $("[data-toggle='sidebar']").on('click', function (e) {
            e.preventDefault();

            var w = $(window);
            if (w.outerWidth() <= 1200) {
            $body.removeClass('search-show search-gone');
            if ($body.hasClass('sidebar-gone')) {
                $body.removeClass('sidebar-gone').addClass('sidebar-show');
            } else {
                $body.addClass('sidebar-gone').removeClass('sidebar-show');
            }
            update_sidebar_nicescroll();
            } else {
            $body.removeClass('search-show search-gone');
            if ($body.hasClass('sidebar-mini')) {
                toggle_sidebar_mini(false);
                localStorage.setItem('sidebar_state', 'open');
            } else {
                toggle_sidebar_mini(true);
                localStorage.setItem('sidebar_state', 'close');
            }
            }
        });

        // --- Restore saved state on load ---
        if (localStorage.getItem('sidebar_state') === 'close') {
            // run the full mini setup so tooltips and markup are prepared
            toggle_sidebar_mini(true);
        }
        });

    // Main Sidebar Function End

    var toggleLayout = function () {
        var w = $(window),
            layout_class = $('body').attr('class') || '',
            layout_classes = (layout_class.trim().length > 0 ? layout_class.split(' ') : '');

        if (layout_classes.length > 0) {
            layout_classes.forEach(function (item) {
                if (item.indexOf('layout-') != -1) {
                    now_layout_class = item;
                }
            });
        }

        if (w.outerWidth() <= 1200) {
            if ($('body').hasClass('sidebar-mini')) {
                toggle_sidebar_mini(false);
                $('.main-sidebar').niceScroll(sidebar_nicescroll_opts);
                sidebar_nicescroll = $(".main-sidebar").getNiceScroll();
            }

            $("body").addClass("sidebar-gone");
            $("body").removeClass("layout-2 layout-3 sidebar-mini sidebar-show");

            update_sidebar_nicescroll();

            if (now_layout_class == 'layout-3') {
                let nav_second_classes = $(".navbar-secondary").attr('class'),
                    nav_second = $(".navbar-secondary");

                nav_second.attr('data-nav-classes', nav_second_classes);
                nav_second.removeAttr('class');
                nav_second.addClass('main-sidebar');

                let main_sidebar = $(".main-sidebar");
                main_sidebar.find('.container').addClass('sidebar-wrapper').removeClass('container');
                main_sidebar.find('.navbar-nav').addClass('sidebar-menu').removeClass('navbar-nav');
                main_sidebar.find('.sidebar-menu .nav-item.dropdown.show a').trigger('click');
                main_sidebar.find('.sidebar-brand').remove();
                main_sidebar.find('.sidebar-menu').before($('<div>', {
                    class: 'sidebar-brand'
                }).append(
                    $('<a>', {
                        href: $('.navbar-brand').attr('href'),
                    }).html($('.navbar-brand').html())
                ));
                setTimeout(function () {
                    sidebar_nicescroll = main_sidebar.niceScroll(sidebar_nicescroll_opts);
                    sidebar_nicescroll = main_sidebar.getNiceScroll();
                }, 700);

                sidebar_dropdown();
                $(".main-wrapper").removeClass("container");
            }
        } else {
            $("body").removeClass("sidebar-gone sidebar-show");
            if (now_layout_class)
                $("body").addClass(now_layout_class);

            let nav_second_classes = $(".main-sidebar").attr('data-nav-classes'),
                nav_second = $(".main-sidebar");

            if (now_layout_class == 'layout-3' && nav_second.hasClass('main-sidebar')) {
                nav_second.find(".sidebar-menu li a.has-dropdown").off('click');
                nav_second.find('.sidebar-brand').remove();
                nav_second.removeAttr('class');
                nav_second.addClass(nav_second_classes);

                let main_sidebar = $(".navbar-secondary");
                main_sidebar.find('.sidebar-wrapper').addClass('container').removeClass('sidebar-wrapper');
                main_sidebar.find('.sidebar-menu').addClass('navbar-nav').removeClass('sidebar-menu');
                main_sidebar.find('.dropdown-menu').hide();
                main_sidebar.removeAttr('style');
                main_sidebar.removeAttr('tabindex');
                main_sidebar.removeAttr('data-nav-classes');
                $(".main-wrapper").addClass("container");
                // if(sidebar_nicescroll != null)
                //   sidebar_nicescroll.remove();
            } else if (now_layout_class == 'layout-2') {
                $("body").addClass("layout-2");
            } else {
                update_sidebar_nicescroll();
            }
        }
    }
    toggleLayout();
    $(window).resize(toggleLayout);

    $('body').on('click', '.sidebar-close', function () {
        toggleLayout();
    });

    $("[data-toggle='search']").on('click', function () {
        var body = $("body");

        if (body.hasClass('search-gone')) {
            body.addClass('search-gone');
            body.removeClass('search-show');
        } else {
            body.removeClass('search-gone');
            body.addClass('search-show');
        }
    });

    // tooltip
    $("[data-toggle='tooltip']").tooltip();

    // popover
    $('[data-toggle="popover"]').popover({
        container: 'body'
    });

    // Select2
    if (jQuery().select2) {
        $(".select2").select2();
    }
    $('#edit-student-modal').on('shown.bs.modal', function () {
        if ($.fn.select2) {
            $(".select2").select2({
                dropdownParent: $('#edit-student-modal')
            }).on('change', function (e) {
                const selectedValue = $(this).val();
                console.log("Selected value:", selectedValue);
            });
        }
    });

    // Selectric
    if (jQuery().selectric) {
        $(".selectric").selectric({
            disableOnMobile: false,
            nativeOnMobile: false
        });
    }

    $(".notification-toggle").dropdown();
    $(".notification-toggle").parent().on('shown.bs.dropdown', function () {
        $(".dropdown-list-icons").niceScroll({
            cursoropacitymin: .3,
            cursoropacitymax: .8,
            cursorwidth: 7
        });
    });

    $(".message-toggle").dropdown();
    $(".message-toggle").parent().on('shown.bs.dropdown', function () {
        $(".dropdown-list-message").niceScroll({
            cursoropacitymin: .3,
            cursoropacitymax: .8,
            cursorwidth: 7
        });
    });

    if ($(".chat-content").length) {
        $(".chat-content").niceScroll({
            cursoropacitymin: .3,
            cursoropacitymax: .8,
        });
        $('.chat-content').getNiceScroll(0).doScrollTop($('.chat-content').height());
    }

    if (jQuery().summernote) {
        $(".summernote").summernote({
            dialogsInBody: true,
            minHeight: 250,
        });
        $(".summernote-simple").summernote({
            dialogsInBody: true,
            minHeight: 150,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['para', ['paragraph']]
            ]
        });
    }

    if (window.CodeMirror) {
        $(".codeeditor").each(function () {
            let editor = CodeMirror.fromTextArea(this, {
                lineNumbers: true,
                theme: "duotone-dark",
                mode: 'javascript',
                height: 200
            });
            editor.setSize("100%", 200);
        });
    }

    // Follow function
    $('.follow-btn, .following-btn').each(function () {
        var me = $(this),
            follow_text = 'Follow',
            unfollow_text = 'Following';

        me.on('click', function () {
            if (me.hasClass('following-btn')) {
                me.removeClass('btn-danger');
                me.removeClass('following-btn');
                me.addClass('btn-primary');
                me.html(follow_text);

                eval(me.data('unfollow-action'));
            } else {
                me.removeClass('btn-primary');
                me.addClass('btn-danger');
                me.addClass('following-btn');
                me.html(unfollow_text);

                eval(me.data('follow-action'));
            }
            return false;
        });
    });

    // Dismiss function
    $("[data-dismiss]").each(function () {
        var me = $(this),
            target = me.data('dismiss');

        me.on('click', function () {
            $(target).fadeOut(function () {
                $(target).remove();
            });
            return false;
        });
    });

    // Collapsable
    $("[data-collapse]").each(function () {
        var me = $(this),
            target = me.data('collapse');

        me.on('click', function () {
            $(target).collapse('toggle');
            $(target).on('shown.bs.collapse', function (e) {
                e.stopPropagation();
                me.html('<i class="fas fa-minus"></i>');
            });
            $(target).on('hidden.bs.collapse', function (e) {
                e.stopPropagation();
                me.html('<i class="fas fa-plus"></i>');
            });
            return false;
        });
    });

    // Gallery
    $(".gallery .gallery-item").each(function () {
        var me = $(this);

        me.attr('href', me.data('image'));
        me.attr('title', me.data('title'));
        if (me.parent().hasClass('gallery-fw')) {
            me.css({
                height: me.parent().data('item-height'),
            });
            me.find('div').css({
                lineHeight: me.parent().data('item-height') + 'px'
            });
        }
        me.css({
            backgroundImage: 'url("' + me.data('image') + '")'
        });
    });
    if (jQuery().Chocolat) {
        $(".gallery").Chocolat({
            className: 'gallery',
            imageSelector: '.gallery-item',
        });
    }

    // Background
    $("[data-background]").each(function () {
        var me = $(this);
        me.css({
            backgroundImage: 'url(' + me.data('background') + ')'
        });
    });

    // Custom Tab
    $("[data-tab]").each(function () {
        var me = $(this);

        me.on('click', function () {
            if (!me.hasClass('active')) {
                var tab_group = $('[data-tab-group="' + me.data('tab') + '"]'),
                    tab_group_active = $('[data-tab-group="' + me.data('tab') + '"].active'),
                    target = $(me.attr('href')),
                    links = $('[data-tab="' + me.data('tab') + '"]');

                links.removeClass('active');
                me.addClass('active');
                target.addClass('active');
                tab_group_active.removeClass('active');
            }
            return false;
        });
    });

    // Bootstrap 4 Validation
    $(".needs-validation").on('submit', function () {
        var form = $(this);
        if (form[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.addClass('was-validated');
    });

    // alert dismissible
    $(".alert-dismissible").each(function () {
        var me = $(this);

        me.find('.close').on('click', function () {
            me.alert('close');
        });
    });

    if ($('.main-navbar').length) {
    }

    // Image cropper
    $('[data-crop-image]').each(function (e) {
        $(this).css({
            overflow: 'hidden',
            position: 'relative',
            height: $(this).data('crop-image')
        });
    });

    // Slide Toggle
    $('[data-toggle-slide]').on('click', function () {
        let target = $(this).data('toggle-slide');

        $(target).slideToggle();
        return false;
    });

    // Dismiss modal
    $("[data-dismiss=modal]").on('click', function () {
        $(this).closest('.modal').modal('hide');

        return false;
    });

    // Width attribute
    $('[data-width]').each(function () {
        $(this).css({
            width: $(this).data('width')
        });
    });

    // Height attribute
    $('[data-height]').each(function () {
        $(this).css({
            height: $(this).data('height')
        });
    });

    // Chocolat
    if ($('.chocolat-parent').length && jQuery().Chocolat) {
        $('.chocolat-parent').Chocolat();
    }

    // Sortable card
    if ($('.sortable-card').length && jQuery().sortable) {
        $('.sortable-card').sortable({
            handle: '.card-header',
            opacity: .8,
            tolerance: 'pointer'
        });
    }
});


(function () {
    "use strict"

    // Timepicker
    if (jQuery().timepicker && $(".timepicker").length) {
        $(".timepicker").timepicker({
            icons: {
                up: 'fas fa-chevron-up',
                down: 'fas fa-chevron-down'
            },
            showMeridian: false,
        });
    }

    /*loading Swl*/

    window.loadingSwl = () => {
        const loadingHtml = '<div class="d-flex align-items-center justify-content-center my-50 "><img src="/assets/default/img/loading.gif" width="80" height="80"></div>';
        Swal.fire({
            html: loadingHtml,
            showCancelButton: false,
            showConfirmButton: false,
            width: '30rem',
        });
    };

    window.randomString = function (count = 5) {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

        for (var i = 0; i < count; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
    };

    /**
     * close swl
     * */
    $('body').on('click', '.close-swl', function (e) {
        e.preventDefault();
        Swal.close();
    });

    $.fn.serializeObject = function () {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    window.makeNewRow = function (cardId, mainRowId) {
        const $card = $('#' + cardId);
        const $mainRow = $('#' + mainRowId);

        $('body').on('click', `#${cardId} .js-add-btn`, function (e) {
            e.preventDefault();

            let copy = $mainRow.clone();
            copy.removeClass('main-row');
            copy.removeClass('d-none');

            let copyHtml = copy.prop('innerHTML');
            copyHtml = copyHtml.replace(/\[record\]/g, '[' + randomString() + ']');
            copy.html(copyHtml);

            $card.append(copy);
        });

        $('body').on('click', `#${cardId} .js-remove-btn`, function (e) {
            e.preventDefault();

            $(this).closest('.input-group').remove();
        });
    }
})(jQuery)

function rurera_loader(thisObj, loader_type) {

    switch (loader_type) {
        case "div":
            thisObj.addClass('rurera-processing');
            thisObj.append('<div class="rurera-button-loader" style="display: block;">\n\
                       <div class="spinner">\n\
                           <div class="double-bounce1"></div>\n\
                           <div class="double-bounce2"></div>\n\
                       </div>\n\
                   </div>');

            break;

        case "button":
            thisObj.wrap('<div class="rurera-loader-holder"></div>');
            thisObj.closest('.rurera-loader-holder').addClass('rurera-processing');
            thisObj.closest('.rurera-loader-holder').append('<div class="rurera-button-loader" style="display: block;">\n\
                        <div class="spinner">\n\
                            <div class="double-bounce1"></div>\n\
                            <div class="double-bounce2"></div>\n\
                        </div>\n\
                    </div>');

            break;

        case "page":
            $('body').addClass('rurera-processing');
            $('body').append('<div class="rurera-button-loader" style="display: block;">\n\
                                    <div class="spinner">\n\
                                        <div class="double-bounce1"></div>\n\
                                        <div class="double-bounce2"></div>\n\
                                    </div>\n\
                                </div>');

            break;


        case "animation":
            $('body').addClass('rurera-processing');
            var loader_no = Math.floor(Math.random() * (3 - 1 + 1)) + 1;
            loader_no = 4;
            $('body').append('<div class="rurera-button-loader" style="display: block;">\n\
                <div class="preloader"><img src="/assets/default/img/preloaders/'+loader_no+'.webp"><span class="preloader-text">Sharpen your wits and get ready to unravel mind-bending questions and brain teasers in our upcoming quiz</span></div>\n\
            </div>');
        break;
    }
}

function rurera_remove_loader(thisObj, loader_type) {
    switch (loader_type) {
        case "button":
            thisObj.removeClass('rurera-processing');
            thisObj.unwrap('.rurera-loader-holder');
            $('body').removeClass('rurera-processing');
            $('body').find('.rurera-button-loader').remove();
            break;
        case "page":
            $('body').removeClass('rurera-processing');
            $('body').find('.rurera-button-loader').remove();
            break;
        case "div":
            thisObj.removeClass('rurera-processing');
            $('body').find('.rurera-button-loader').remove();
            break;
    }
}


$(document).ready(function () {

    if ($(".singleDatePicker").length) {
        $('.singleDatePicker').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD',
            },
            singleDatePicker: true,
            showDropdowns: false,
            autoApply: true,
            startDate: moment(),
        });
    }

    var year_class_ajax_select = function () {
        $('body').on('change', '.year_class_ajax_select', function (e) {
            var year_id = $(this).val();
            var class_id = $('.class_section_ajax_select').attr('data-default_id');
            jQuery.ajax({
                type: "GET",
                url: '/admin/common/classes_by_year',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"year_id": year_id, "class_id": class_id},
                success: function (return_data) {
                    $(".class_section_ajax_select").html(return_data);
                    $(".class_section_ajax_select").change();
                }
            });
        });
        $(".year_class_ajax_select").change();
    }
    var class_section_ajax_select = function () {
        $('body').on('change', '.class_section_ajax_select', function (e) {
            var class_id = $(this).val();
            var section_id = $('.section_ajax_select').attr('data-default_id');
            jQuery.ajax({
                type: "GET",
                url: '/admin/common/sections_by_class',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"class_id": class_id, "section_id": section_id},
                success: function (return_data) {
                    $(".section_ajax_select").html(return_data);
                }
            });
        });

    }

    var class_users_ajax_select = function () {
        $('body').on('change', '.class_users_ajax_select', function (e) {
            rurera_loader($(".users_ajax_select"), 'div');
            var class_id = $(this).val();
            var user_id = $('.users_ajax_select').attr('data-default_id');
            var return_type = $(this).attr('data-return_type');

            jQuery.ajax({
                type: "GET",
                url: '/admin/common/users_by_class',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"class_id": class_id, "user_id": user_id, "return_type": return_type},
                success: function (return_data) {
                    rurera_remove_loader($(".users_ajax_select"), 'button');
                    $(".users_ajax_select").html(return_data);
                }
            });
        });
    }

    var section_users_ajax_select = function () {
        $('body').on('change', '.section_users_ajax_select', function (e) {
            rurera_loader($(".users_ajax_select"), 'div');
            var section_id = $(this).val();
            var user_id = $('.users_ajax_select').attr('data-default_id');
            var return_type = $(this).attr('data-return_type');

            jQuery.ajax({
                type: "GET",
                url: '/admin/common/users_by_section',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"section_id": section_id, "user_id": user_id, "return_type": return_type},
                success: function (return_data) {
                    rurera_remove_loader($(".users_ajax_select"), 'button');
                    $(".users_ajax_select").html(return_data);
                }
            });
        });
    }

    var year_subject_ajax_select = function () {
        $('body').on('change', '.year_subject_ajax_select', function (e) {
            var year_id = $(this).val();
            var subject_id = $('.subject_ajax_select').attr('data-default_id');
            jQuery.ajax({
                type: "GET",
                url: '/admin/common/subjects_by_year',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"year_id": year_id, "subject_id": subject_id},
                success: function (return_data) {
                    $(".subject_ajax_select").html(return_data);
                    $(".subject_ajax_select").change();
                }
            });
        });
        $(".year_class_ajax_select").change();
    }


    $('body').on('click', '.selectable-lis li', function (e) {
        var target_url = $(this).closest('ul').attr('data-target_ul');
        console.log(target_url);
        var user_id = $(this).attr('data-user_id');
        var user_name = $(this).find('a').html();
        $('.' + target_url + ' li[data-user_id="' + user_id + '"]').remove();
        $('.' + target_url).append('<li data-user_id="' + user_id + '"><input type="hidden" name="user_ids[]" value="' + user_id + '">' + user_name + '<a href="javascript:;" class="parent-remove"><span class="fas fa-trash"></span></a></li>');

    });


    year_class_ajax_select();
    class_section_ajax_select();
    class_users_ajax_select();
    section_users_ajax_select();

    year_subject_ajax_select();


    if ($('.rurera-confirm-dialog').length > 0) {
        $('body').on('click', '.rurera-confirm-dialog', function (e) {
            var thisObj = $(this);
            var title = $(this).attr('data-title');
            var subtitle = $(this).attr('data-subtitle');
            var on_confirm = $(this).attr('data-on_confirm');
            var on_confirm_function = new Function(on_confirm);

            Swal.fire({
                title: title,
                text: subtitle,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    on_confirm_function(thisObj);
                }
            })

        });
    }
});

$(document).ready(function() {
    $('body').on('keyup', '.search-dashboard', function (e) {
        $(".sidebar-menu li.nav-item").addClass('rurera-hide');
        var search_text = $(this).val();

        //var $foundDiv = $(".sidebar-menu li:contains('" + search_text + "')");

        var $foundDiv = $(".sidebar-menu li").filter(function() {
            return $(this).text().toLowerCase().includes(search_text.toLowerCase());
          });

        //$foundDiv.show().find(":contains('" + search_text + "')").show();
        //if($foundDiv.hasClass('nav-item')) {
            $foundDiv.removeClass('rurera-hide');
        //}
    });

});


$(document).on('change', '.year_group_chapters', function (e) {
    var year_id = $(this).val();
    var subject_id = $(this).attr('data-subject_id');
    jQuery.ajax({
        type: "GET",
        url: '/admin/common/year_group_chapters',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {"year_id": year_id, "subject_id": subject_id},
        success: function (return_data) {

            $(".subject-chapters-block").html(return_data);
        }
    });
});
$(document).on('click', '.topic-form-submit', function (e) {
    var parentObj = $(this).closest('.modal-body');
    var topic_part_id = parentObj.find('input[name="topic_part_id"]').val();
    var year_id = parentObj.find('input[name="year_id"]').val();
    var subject_id = parentObj.find('input[name="subject_id"]').val();
    var topic_part_name = parentObj.find('input[name="topic_part_name"]').val();
    var topic_part_slug = parentObj.find('input[name="topic_part_slug"]').val();
    var topic_part_status = parentObj
        .find('input[name="topic_part_active"]')
        .is(':checked') ? 'active' : 'inactive';
    jQuery.ajax({
        type: "POST",
        url: '/admin/topics_parts/update_topic_part',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        data: {"topic_part_status": topic_part_status, "topic_part_id": topic_part_id, "year_id": year_id, "subject_id": subject_id, "topic_part_name": topic_part_name, "topic_part_slug": topic_part_slug},
        success: function (return_data) {
            rurera_modal_alert(
                return_data.status,
                return_data.msg,
                false, //confirmButton
            );
            if(return_data.status == 'success') {
                parentObj.closest('.sub-topic-modal').modal('hide');
                parentObj.closest('li').find('.topic-part-title').html(topic_part_name);
                $(".year_group_chapters").change();
            }
        }
    });
});


$(document).on('click', '.topic-add-form-submit', function (e) {
    var parentObj = $(this).closest('.modal-body');
    var chapter_id = parentObj.find('input[name="chapter_id"]').val();
    var year_id = parentObj.find('select[name="year_group_id"]').val();
    var subject_id = parentObj.find('input[name="subject_id"]').val();
    var sub_chapter_id = parentObj.find('input[name="sub_chapter_id"]').val();
    var topic_part_name = parentObj.find('input[name="topic_part_name"]').val();
    var topic_part_slug = parentObj.find('input[name="topic_part_slug"]').val();
    jQuery.ajax({
        type: "POST",
        url: '/admin/topics_parts/add_topic_part',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        data: {"sub_chapter_id": sub_chapter_id, "chapter_id": chapter_id, "year_id": year_id, "subject_id": subject_id, "topic_part_name": topic_part_name, "topic_part_slug": topic_part_slug},
        success: function (return_data) {
            rurera_modal_alert(
                return_data.status,
                return_data.msg,
                false, //confirmButton
            );
            if(return_data.status == 'success') {
                parentObj.closest('.sub-topic-modal-add').modal('hide');
                $(".year_group_chapters").change();
            }
        }
    });
});

$(document).on('click', '.subchapter-add-form-submit', function (e) {
    var parentObj = $(this).closest('.modal-body');
    var chapter_id = parentObj.find('input[name="chapter_id"]').val();
    var year_id = parentObj.find('select[name="year_group_id"]').val();
    var subject_id = parentObj.find('input[name="subject_id"]').val();
    var sub_chapter_name = parentObj.find('input[name="sub_chapter_name"]').val();
    jQuery.ajax({
        type: "POST",
        url: '/admin/topics_parts/add_sub_chapter',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        data: {"chapter_id": chapter_id, "year_id": year_id, "subject_id": subject_id, "sub_chapter_name": sub_chapter_name},
        success: function (return_data) {
            rurera_modal_alert(
                return_data.status,
                return_data.msg,
                false, //confirmButton
            );
            if(return_data.status == 'success') {
                $(".year_group_chapters").change();
            }
        }
    });
});


