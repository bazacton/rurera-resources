/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */
(function ($) {
    "use strict";

    if( $('.datefilter').length > 0) {
        var datefilter = $('.datefilter');
        datefilter.daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        datefilter.on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD'));
        });

        datefilter.on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });
    }


    $('body').on('click', '.admin-file-manager', function (e) {
        e.preventDefault();
		var upload_path = $(this).closest('.upload-path-rurera').attr('data-location');
		var thisObj = $(this);
		thisObj.filemanager('file', {prefix: '/laravel-filemanager'});
		thisObj.trigger('click');
		/*$.ajax({
			type: "POST",
			url: '/admin/users/upload_path',
			data: {'upload_path': upload_path},
			success: function (return_data) {
				thisObj.filemanager('file', {prefix: '/laravel-filemanager'});
				thisObj.trigger('click');  // Manually trigger click after initialization
				
			}
		});*/
        
    });

    $('body').on('click', '.admin-file-view', function (e) {
        e.preventDefault();
        var input = $(this).attr('data-input');

        var img_src = $('#' + input).val();

        $('#fileViewModal').find('img').attr('src', img_src);
        $('#fileViewModal').modal('show');
    });


// ********************************************
// ********************************************
// date & time piker
    window.resetDatePickers = () => {
        if (jQuery().daterangepicker) {
            const $dateRangePicker = $('.date-range-picker');
            const format1 = $dateRangePicker.attr('data-format') ?? 'YYYY-MM-DD';
            const timepicker1 = !!$dateRangePicker.attr('data-timepicker');
            const drops1 = $dateRangePicker.attr('data-drops') ?? 'down';

            $dateRangePicker.daterangepicker({
                locale: {
                    format: format1,
                    cancelLabel: 'Clear'
                },
                drops: drops1,
                autoUpdateInput: false,
                timePicker: timepicker1,
                timePicker24Hour: true,
                opens: 'right'
            });
            $dateRangePicker.on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format(format1) + ' - ' + picker.endDate.format(format1));
            });

            $dateRangePicker.on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });


            const $datetimepicker = $('.datetimepicker');
            const format2 = $datetimepicker.attr('data-format') ?? 'YYYY-MM-DD HH:mm';
            const drops2 = $datetimepicker.attr('data-drops') ?? 'down';

            $datetimepicker.daterangepicker({
                locale: {
                    format: format2,
                    cancelLabel: 'Clear'
                },
                singleDatePicker: true,
                timePicker: true,
                timePicker24Hour: true,
                autoUpdateInput: false,
                drops: drops2,
            });
            $datetimepicker.on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD HH:mm'));
            });

            $datetimepicker.on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });

            const $datepicker = $('.datepicker');
            const drops3 = $datepicker.attr('data-drops') ?? 'down';

            $datepicker.daterangepicker({
                locale: {
                    format: 'YYYY-MM-DD',
                    //cancelLabel: 'Clear'
                },
                singleDatePicker: true,
                timePicker: false,
                autoApply: true, // Set autoApply to true to automatically apply the selected date
                autoUpdateInput: false,
                drops: drops3,
            });


            $datepicker.on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD'));
            });

            $datepicker.on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });
        }
    };
    resetDatePickers();


    window.resetRureraDatePickers = () => {
        if (jQuery().daterangepicker) {

            if( $(".rureradatepicker").length > 0){

                $(".rureradatepicker").each(function () {
                    const $datepicker = $(this);
                    const drops3 = $datepicker.attr('data-drops') ?? 'down';
                    const minValue = $datepicker.attr('min');
                    const maxValue = $datepicker.attr('max');

                    var configOptions = {
                        'locale': {
                            format: 'YYYY-MM-DD',
                        },
                        'singleDatePicker': true,
                        'timePicker': false,
                        'autoApply': true, // Set autoApply to true to automatically apply the selected date
                        'autoUpdateInput': false,
                        'drops': drops3,
                    };

                    if( rurera_is_field(minValue)) {
                        configOptions['minDate'] = minValue;
                    }
                    if( rurera_is_field(maxValue)) {
                        configOptions['maxDate'] = maxValue;
                    }

                    $datepicker.daterangepicker(configOptions);

                    $datepicker.on('apply.daterangepicker', function (ev, picker) {
                        $(this).val(picker.startDate.format('YYYY-MM-DD'));
                    });

                    $datepicker.on('cancel.daterangepicker', function (ev, picker) {
                        $(this).val('');
                    });
                });
            }
        }
    };
    resetRureraDatePickers();

    window.resetRureraMultiDatesPickers = () => {
        if (jQuery().daterangepicker) {

            if( $(".rureramultidatespicker").length > 0){

                $('.rureramultidatespicker').datepicker({
                   multidate: true,
                   format: 'dd-mm-yyyy'
               });
            }
        }
    };
    //resetRureraMultiDatesPickers();

    function rurera_is_field(field_value) {
        if (field_value != 'undefined' && field_value != undefined && field_value != '') {
            return true;
        } else {
            return false;
        }
    }


// Timepicker
    if (jQuery().timepicker) {
        $(".setTimepicker").each(function (key, item) {
            $(item).timepicker({
                icons: {
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down'
                },
                showMeridian: false,
            });
        })
    }

// ********************************************
// ********************************************
// select 2
    window.resetSelect2 = () => {
        if (jQuery().select2) {
            $(".select2").select2({
                placeholder: $(this).data('placeholder'),
                allowClear: true,
                width: '100%',
            });
        }
    };
    resetSelect2();
// ********************************************
// ********************************************
// inputtags
    if (jQuery().tagsinput) {
        var input_tags = $('.inputtags');
        input_tags.tagsinput({
            tagClass: 'badge badge-primary',
            maxTags: (input_tags.data('max-tag') ? input_tags.data('max-tag') : 10),
        });
    }

    window.handleSearchableSelect2 = function (className, path, itemColumn) {
        const $el = $('.' + className);

        if ($el.length) {
            $el.select2({
                placeholder: $el.attr('data-placeholder'),
                minimumInputLength: 3,
                allowClear: true,
                ajax: {
                    url: path,
                    dataType: 'json',
                    type: "POST",
                    quietMillis: 50,
                    data: function (params) {
                        return {
                            term: params.term,
                            option: $el.attr('data-search-option'),
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item[itemColumn],
                                    id: item.id
                                };
                            })
                        };
                    }
                }
            });
        }
    };

    window.handleMultiSelect2_bk = function (className, path, itemColumn, select_data) {
        const $el = $('.' + className);

        if ($el.length) {
            $el.select2({allowClear: true});
        }
    };

    window.handleMultiSelect2 = function (className, path, itemColumn, select_data) {
    const $el = $('.' + className);

    if ($el.length) {
        // Initialize select2
        $el.select2({
            placeholder: $el.attr('data-placeholder'),
            minimumInputLength: 3,
            data: select_data,
            ajax: {
                url: path,
                dataType: 'json',
                type: "POST",
                quietMillis: 50,
                data: function (params) {
                    return {
                        term: params.term,
                        option: $el.attr('data-search-option'),
                    };
                },
                processResults: function (data) {
                    let results = $.map(data, function (item) {
                        if ($.isArray(itemColumn)) {
                            let text_label = [];
                            $.each(itemColumn, function (index, itemColumnName) {
                                if (!DataIsEmpty(item[itemColumnName])) {
                                    text_label.push(item[itemColumnName]);
                                }
                            });
                            text_label = text_label.join(' / ');
                            return {
                                text: text_label,
                                id: item.id
                            };
                        } else {
                            return {
                                text: item[itemColumn],
                                id: item.id
                            };
                        }
                    });

                    // Add "Deselect All" option if any options are selected
                    if ($el.val() && $el.val().length > 0) {
                        results.unshift({
                            id: 'deselect-all',
                            text: 'Deselect All'
                        });
                    }

                    return {
                        results: results
                    };
                }
            }
        });

        // Always add "Deselect All" when the dropdown is opened
        $el.on('select2:open', function () {
            // Get the current selected options
            if ($el.val() && $el.val().length > 0) {
                // Check if "Deselect All" is already in the dropdown
                if (!$el.find("option[value='deselect-all']").length) {
                    // Add "Deselect All" option to the select element
                    $el.prepend(new Option('Deselect All', 'deselect-all', false, false));
                    $el.trigger('change'); // Ensure the UI is updated
                }
            }
        });

        // Handle selection of "Deselect All"
        $el.on('select2:select', function (e) {
            if (e.params.data.id === 'deselect-all') {
                // Clear all selected options
                $el.val(null).trigger('change');
            }
        });
    }
};



    window.handleQuestionsMultiSelect2 = function (className, path, itemColumn, select_data) {
        const $el = $('.' + className);

        if ($el.length) {
            $el.select2({
                placeholder: $el.attr('data-placeholder'),
                minimumInputLength: 3,
                //allowClear: true,
                data: select_data,
                ajax: {
                    url: path,
                    dataType: 'json',
                    type: "POST",
                    quietMillis: 50,
                    data: function (params) {
                        return {
                            term: params.term,
                            option: $el.attr('data-search-option'),
                        };
                    },
                    processResults: function (data) {
                        questions_list_populate(data);
                        return {
                            results: $.map(data, function (item) {
                                return '';
                            })
                        };
                    }
                }
            });
        }
    };


    window.handleTopicsMultiSelect2 = function (className, path, itemColumn, select_data) {
            const $el = $('.' + className);

            if ($el.length) {
                $el.select2({
                    placeholder: $el.attr('data-placeholder'),
                    minimumInputLength: 3,
                    //allowClear: true,
                    data: select_data,
                    ajax: {
                        url: path,
                        dataType: 'json',
                        type: "POST",
                        quietMillis: 50,
                        data: function (params) {
                            return {
                                term: params.term,
                                option: $el.attr('data-search-option'),
                            };
                        },
                        processResults: function (data) {
                            return {
                                results: $.map(data, function (item) {
                                    return {
                                        text: item['title'],
                                        id: item.id
                                    };
                                })
                            };
                        }
                    }
                });
            }
        };

    window.handleQuizMultiSelect2 = function (className, path, itemColumn, select_data) {
        const $el = $('.' + className);

        if ($el.length) {
            $el.select2({
                placeholder: $el.attr('data-placeholder'),
                minimumInputLength: 3,
                //allowClear: true,
                data: select_data,
                ajax: {
                    url: path,
                    dataType: 'json',
                    type: "POST",
                    quietMillis: 50,
                    data: function (params) {
                        return {
                            term: params.term,
                            option: $el.attr('data-search-option'),
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item['name'],
                                    id: item.quiz_id
                                };
                            })
                        };
                    }
                }
            });
        }
    };

    function questions_list_populate(data) {
        var html_response = '';
        $.map(data, function (item) {
            if (DataIsEmpty($('.questions-list ul li[data-id="' + item.id + '"]').attr('data-id'))) {
                html_response += '<li data-id="' + item.id + '" data-question_type="' + item.question_type + '">\n' +
                    '<div class="question-title">' + item.title + '</div>\n' +
                    '<div class="question-keywords">\n' +
                    '<ul>' + item.search_tags + '</ul>\n' +
                    '</div>\n' +
                    '<div class="question-select">Select</div>\n' +
                    '</li>';
            }
        });
        $(".questions-block ul").html(html_response);
    }


    $(document).ready(function () {

        handleSearchableSelect2('search-user-select2', '/admin/users/search', 'name');

        handleSearchableSelect2('search-user-select22', '/admin/users/search', 'name');

        handleSearchableSelect2('search-webinar-select2', '/admin/webinars/search', 'title');

        handleSearchableSelect2('search-bundle-select2', '/admin/bundles/search', 'title');

        handleSearchableSelect2('search-forum-topic-select2', '/admin/forums/topics/search', 'title');

        handleSearchableSelect2('search-product-select2', '/admin/store/products/search', 'title');

        handleSearchableSelect2('search-category-select2', '/admin/categories/search', 'title');

        handleSearchableSelect2('search-blog-select2', '/admin/blog/search', 'title');


        if( $('.datefilter').length > 0) {
            var datefilter = $('.datefilter');
            datefilter.daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            });

            datefilter.on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD'));
            });

            datefilter.on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });
        }

        /*const sidebar_nicescroll = $(".main-sidebar").getNiceScroll();
        if (typeof sidebar_nicescroll !== "undefined" && sidebar_nicescroll.length) {
            const $active = $('.nav-item.active');

            if ($active && $active.length) {
                sidebar_nicescroll.doScrollPos(0, ($active.position().top - 100));
            }
        }*/
    });

    var lfm = function (options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function (context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="note-icon-picture"></i> ',
            tooltip: 'Insert image with filemanager',
            click: function () {

                lfm({type: 'file', prefix: '/laravel-filemanager'}, function (lfmItems, path) {
                    lfmItems.forEach(function (lfmItem) {
                        context.invoke('insertImage', lfmItem.url);
                    });
                });

            }
        });
        return button.render();
    };

    if (jQuery().summernote) {
		
		$(".summernote-editor").summernote({
    dialogsInBody: true,
    tabsize: 2,
    height: $(".summernote-editor").attr('data-height') ?? 250,
    fontNames: [],
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline']],
        ['para', ['paragraph', 'ul', 'ol']],
        ['table', ['table']],
        ['insert', ['link']],
        ['history', ['undo']],
    ],
    buttons: {
        lfm: LFMButton
    },
    callbacks: {
        onPaste: function (e) {
            e.preventDefault();

            var clipboardData = (e.originalEvent || e).clipboardData || window.clipboardData;
            var pastedData = clipboardData.getData('text/html') || clipboardData.getData('text/plain');

            // Create a temporary DOM element to parse the HTML
            var tempDiv = document.createElement('div');
            tempDiv.innerHTML = pastedData;

            // Remove all tags except <strong> and <table> with children, but retain the text content
            tempDiv.querySelectorAll("*:not(p):not(h1):not(h2):not(h3):not(h4):not(h5):not(h6):not(ul):not(ol):not(li):not(strong):not(table):not(tbody):not(tr):not(td):not(th)").forEach(node => {
                // Replace each disallowed element with its text content
                const textNode = document.createTextNode(node.textContent);
                node.replaceWith(textNode);
            });

            // Remove attributes from <table> and its child tags
            tempDiv.querySelectorAll("table, td, th, tr").forEach(node => {
                for (let attr of node.attributes) {
                    node.removeAttribute(attr.name);
                }
            });

            // Insert the cleaned HTML into the editor
			document.execCommand('insertHTML', false, tempDiv.innerHTML);
        }
    }
});

		
		
		$(".summernote").summernote({
			dialogsInBody: true,
			tabsize: 2,
			height: $(".summernote").attr('data-height') ?? 250,
			fontNames: [],
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'underline']],
				['para', ['paragraph', 'ul', 'ol']],
				['table', ['table']],
				['insert', ['link']],
				['history', ['undo']],
			],
			buttons: {
				lfm: LFMButton
			},
			callbacks: {
				onPaste: function (e) {
					e.preventDefault();

					var clipboardData = (e.originalEvent || e).clipboardData || window.clipboardData;
					var pastedData = clipboardData.getData('text/html') || clipboardData.getData('text/plain');

					// Create a temporary DOM element to parse the HTML
					var tempDiv = document.createElement('div');
					tempDiv.innerHTML = pastedData;

					// Remove all tags except p, li, ol, ul, strong, u, headings, and table tags
					function cleanTags(node) {
						var allowedTags = ['P', 'LI', 'OL', 'UL', 'STRONG', 'U', 'H1', 'H2', 'H3', 'H4', 'H5', 'H6', 'TABLE', 'TR', 'TD', 'TH'];
						var childNodes = Array.from(node.childNodes);
						childNodes.forEach(function(child) {
							if (child.nodeType === 1) { // Element Node
								if (!allowedTags.includes(child.nodeName)) {
									// Replace disallowed tags with their inner content
									while (child.firstChild) {
										node.insertBefore(child.firstChild, child);
									}
									node.removeChild(child);
								} else {
									// Allowed tag: Clean recursively
									cleanTags(child);

									// Remove all attributes from tables and their children
									if (['TABLE', 'TR', 'TD', 'TH'].includes(child.nodeName)) {
										while (child.attributes.length > 0) {
											child.removeAttribute(child.attributes[0].name);
										}
									}
								}
							} else if (child.nodeType === 3) { // Text Node
								// Do nothing for text nodes
							} else {
								// Remove any other type of node
								node.removeChild(child);
							}
						});
					}

					// Remove all inline styles
					var elementsWithStyles = tempDiv.querySelectorAll('[style]');
					elementsWithStyles.forEach(function (element) {
						element.removeAttribute('style');
					});

					// Remove HTML comments
					function removeComments(node) {
						var childNodes = Array.from(node.childNodes);
						childNodes.forEach(function(child) {
							if (child.nodeType === 8) { // Comment Node
								node.removeChild(child);
							} else if (child.nodeType === 1) {
								removeComments(child);
							}
						});
					}
					removeComments(tempDiv);

					// Clean unwanted tags
					cleanTags(tempDiv);

					// Insert the cleaned content into the editor
					document.execCommand('insertHTML', false, tempDiv.innerHTML);
				}
			}
		});
	}




    $('body').on('change', '.js-edit-content-locale', function (e) {
        const val = $(this).val();

        if (val) {
            var url = window.location.origin + window.location.pathname;

            url += (url.indexOf('?') > -1) ? '&' : '?';

            url += 'locale=' + val;

            window.location.href = url;
        }
    });

    if ($(".colorpickerinput").length) {
        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });
    }

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

    window.serializeObjectByTag = (tagId) => {
        var o = {};
        var a = tagId.find('input, textarea, select').serializeArray();
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

    //
    // delete sweet alert
    $('body').on('click', '.delete-action', function (e) {
        e.preventDefault();
        e.stopPropagation();
        const href = $(this).attr('href');

        const title = $(this).attr('data-title') ?? deleteAlertHint;
        const confirm = $(this).attr('data-confirm') ?? deleteAlertConfirm;

        var html = '<div class="">\n' +
            '    <p class="">' + title + '</p>\n' +
            '    <div class="mt-30 d-flex align-items-center justify-content-center">\n' +
            '        <button type="button" id="swlDelete" data-href="' + href + '" class="btn btn-sm btn-primary">' + confirm + '</button>\n' +
            '        <button type="button" class="btn btn-sm btn-danger ml-10 close-swl">' + deleteAlertCancel + '</button>\n' +
            '    </div>\n' +
            '</div>';

        Swal.fire({
            title: deleteAlertTitle,
            html: html,
            icon: 'warning',
            showConfirmButton: false,
            showCancelButton: false,
            allowOutsideClick: () => !Swal.isLoading(),
        })
    });

    $('body').on('click', '#swlDelete', function (e) {
        e.preventDefault();
        var $this = $(this);
        const href = $this.attr('data-href');

        $this.addClass('loadingbar primary').prop('disabled', true);

        $.get(href, function (result) {
            if (result && result.code === 200) {
                Swal.fire({
                    title: (typeof result.title !== "undefined") ? result.title : deleteAlertSuccess,
                    text: (typeof result.text !== "undefined") ? result.text : deleteAlertSuccessHint,
                    showConfirmButton: false,
                    icon: 'success',
                });

                if (typeof result.dont_reload === "undefined") {
                    setTimeout(() => {
                        if (typeof result.redirect_to !== "undefined" && result.redirect_to !== undefined && result.redirect_to !== null && result.redirect_to !== '') {
                            window.location.href = result.redirect_to;
                        } else {
                            window.location.reload();
                        }
                    }, 1000);
                }
            } else {
                Swal.fire({
                    title: deleteAlertFail,
                    text: deleteAlertFailHint,
                    icon: 'error',
                })
            }
        }).error(err => {
            Swal.fire({
                title: deleteAlertFail,
                text: deleteAlertFailHint,
                icon: 'error',
            })
        }).always(() => {
            $this.removeClass('loadingbar primary').prop('disabled', false);
        });
    })

    $('body').on('change', 'input[type="file"].custom-file-input', function () {
        const value = this.value;

        if (value) {
            const splited = value.split('\\');

            if (splited.length) {
                $(this).closest('.custom-file').find('.custom-file-label').text(splited[splited.length - 1])
            }
        }
    })

    /**********
     * Captcha
     * *********/
    $(document).ready(function () {
        function captcha_src(callback) {

            $.ajax({
                url: '/admin/captcha/create',
                type: 'post',
                cache: false,
                timeout: 30000,
                success: function (data) {
                    if (data.status == 'success') {
                        if (callback) {
                            callback(data.captcha_src);
                        }
                    } else {
                        callback(false);
                    }
                }
            });
        }

        function refreshCaptcha() {
            captcha_src(function (captcha_src) {
                if (captcha_src) {
                    $('.captcha-image').attr('src', captcha_src);
                } else {
                    $('.captcha-image').closest('.form-group').find('.help-block').html('Oops!');
                }
            });
        }


        $('body').on('click', '#refreshCaptcha', function (e) {
            e.preventDefault();
            refreshCaptcha();
        });

        const $refreshCaptcha = $('#refreshCaptcha');

        setTimeout(function () {
            if ($refreshCaptcha.length) {
                $refreshCaptcha.trigger('click')
            }
        }, 100)
    })

    /**********
     * Captcha
     * *********/


})(jQuery);

function DataIsEmpty(dataValue) {
    is_empty = true;
    if (dataValue != '' && dataValue != 'undefined' && dataValue != undefined) {
        is_empty = false;
    }
    return is_empty;
}

$(document).ready(function () {
    $(document).on('click', '.parent-remove', function (e) {
        $(this).parent().remove();
    });


});


//    $(document).ready(function () {

//     $('.lms-data-table table.table').dataTable({
//         "bDestroy": true
//     }).fnDestroy();

//     $('.lms-data-table table.table').dataTable({
//         "aoColumnDefs": [{
//             "bSortable": false,
//             "aTargets": ["sorting_disabled"]
//         }],
//         "bDestroy": true
//     }).fnDestroy();

// });

$(document).on('submit', '.rurera-form-validation', function (e) {
    returnType = rurera_validation_process($(this));
    if (returnType == false) {
        return false;
    }
});


/*
 * Validation Process by Form
 */
function rurera_validation_process(form_name, error_dispaly_type = '') {
    var has_empty = new Array();
    var alert_messages = new Array();
    var radio_fields = new Array();
    var checkbox_fields = new Array();
    form_name.find('.rurera-req-field:not(img), .editor-field:not(img), .editor-fields:not(img)').each(function (index_no) {
        is_visible = true;
        var thisObj = jQuery(this);
        index_no = rurera_is_field(index_no) ? index_no : 0;
        var visible_id = thisObj.data('visible');
        has_empty[index_no] = false;
        checkbox_fields[index_no] = false;
        if (rurera_is_field(visible_id) == true) {
            is_visible = jQuery("#" + visible_id).is(':hidden');
            if (jQuery("#" + visible_id).css('display') !== 'none') {
                is_visible = true;
            } else {
                is_visible = false;
            }
        }
        /*if (thisObj.attr('type') == 'checkbox') {
            thisObj = jQuery("#" + thisObj.attr('name'));
            if (thisObj.val() == 'off') {
                thisObj.val('');
            }
        }*/
        if (thisObj.attr('type') == 'radio') {
            var field_name = thisObj.attr('name');
            var is_field_checked = jQuery('input[name="' + field_name + '"]').is(':checked');
            if (is_field_checked == false) {
                radio_fields[index_no] = thisObj;
            }
            //has_empty[index_no] = true;
            is_visible = false;
        }
        if (thisObj.attr('type') == 'checkbox') {
            var field_name = thisObj.attr('name');
            var is_field_checked = jQuery('input[name="' + field_name + '"]').is(':checked');
            if (is_field_checked == false) {
                checkbox_fields[index_no] = thisObj;
            }
            //has_empty[index_no] = true;
            is_visible = false;
        }
        if (!thisObj.val() && is_visible == true) {
            if (thisObj.hasClass('rurera-req-field') || thisObj.hasClass('editor-field') || thisObj.hasClass('editor-fields')) {
                array_length = alert_messages.length;
                alert_messages[array_length] = rurera_insert_error_message(thisObj, alert_messages, '');
                has_empty[index_no] = true;
            }
        } else {
            if (is_visible == true) {
                has_empty[index_no] = rurera_check_field_type(thisObj, alert_messages, has_empty[index_no]);
            }
        }
        if (has_empty[index_no] == false) {
            thisObj.next('.chosen-container').removeClass('backend-field-error');
            thisObj.next('.rurera-req-field').next('.pbwp-box').removeClass('backend-field-error');
            thisObj.removeClass('backend-field-error');
            thisObj.closest('.jqte').removeClass('backend-field-error');
        }
    });
    if (radio_fields.length > 0) {
        for (i = 0; i < radio_fields.length; i++) {
            var thisnewObj = radio_fields[i];
            array_length = alert_messages.length;
            alert_messages[array_length] = rurera_insert_error_message(thisnewObj, alert_messages, '', 'radio');
            has_empty[i] = true;
        }
    }
    if (checkbox_fields.length > 0) {
        for (i = 0; i < checkbox_fields.length; i++) {
            var thisnewObj = checkbox_fields[i];
            if (rurera_is_field(thisnewObj)) {
                array_length = alert_messages.length;
                alert_messages[array_length] = rurera_insert_error_message(thisnewObj, alert_messages, '', 'checkbox');
                has_empty[i] = true;
            }
        }
    }
    var error_messages = ' <br><br>';
    if (has_empty.length > 0 && jQuery.inArray(true, has_empty) != -1) {
        array_length = alert_messages.length;
        for (i = 0; i < array_length; i++) {
            if (i > 0) {
                error_messages = error_messages + '<br>';
            }
            error_messages = error_messages + alert_messages[i];
        }
        //jQuery.growl.remove();

        if( error_dispaly_type == 'under_field') {
            $(".rurera-error-msg").remove();
            $.each(error_objects, function (key, errorObj) {
                var error_msg = errorObj.error_msg;
                var error_obj = errorObj.error_obj;
                error_msg = '<div class="rurera-error-msg">' + error_msg + '</div>';
                $(error_msg).insertAfter(error_obj);
            });
        }

        if( error_dispaly_type == 'growl') {
            var error_message = jQuery.growl.error({
                message: error_messages,
                duration: 10000,
            });
        }
        return false;
    }
}

function rurera_is_field(field_value) {
    if (field_value != 'undefined' && field_value != undefined && field_value != '') {
        return true;
    } else {
        return false;
    }
}


/*
 * Making list of errors
 */
function rurera_insert_error_message(thisObj, alert_messages, error_msg, field_type = '') {
    thisObj.addClass('backend-field-error');
    if (field_type == 'checkbox' || field_type == 'radio') {

        var field_name = thisObj.attr('name');
        $('[name="' + field_name + '"]').addClass('backend-field-error');
    }

    if (thisObj.is('select')) {
        thisObj.next('.chosen-container').addClass('backend-field-error');
        var field_label = thisObj.closest('.field-holder').children('label').html();
        if (rurera_is_field(field_label) == false) {
            var field_label = thisObj.find(":selected").text();
        }
        if (rurera_is_field(field_label) == false) {
            var field_label = thisObj.closest('.rurera-dev-appended-cats').children().children().children('label').html();
        }
    } else {
        var field_label = thisObj.closest('.field-holder').children('label').html();
        if (typeof field_label === 'undefined') {
            var field_label = thisObj.attr('placeholder');
        }
    }
    if (thisObj.is(':hidden')) {
        thisObj.next('.rurera-req-field').next('.pbwp-box').addClass('backend-field-error');
    }
    if (thisObj.hasClass('rurera_editor')) {
        thisObj.closest('.jqte').addClass('backend-field-error');
    }

    var res = '';
    if (typeof field_label !== "undefined") {
        res = field_label.replace("*", " ");
    } else {
        res = 'Label / Placeholder is missing';
    }
    return '* ' + res + error_msg;
}

/*
 * Check if Provided data for field is valid
 */

function rurera_check_field_type(thisObj, alert_messages, has_empty) {
    /*
     * Check for Email Field
     */
    if (thisObj.hasClass('rurera-email-field')) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        if (!pattern.test(thisObj.val())) {
            array_length = alert_messages.length;
            alert_messages[array_length] = rurera_insert_error_message(thisObj, alert_messages, ' is not valid Email!');
            has_empty = true;
        }
    }
    /*
     * Check for Number Field
     */
    if (thisObj.hasClass('rurera-number-field')) {
        var pattern = /[0-9 -()+]+$/;
        if (!pattern.test(thisObj.val())) {
            array_length = alert_messages.length;
            alert_messages[array_length] = rurera_insert_error_message(thisObj, alert_messages, 'is not valid Number!');
            has_empty = true;
        }
    }
    /*
     * Check for URL Field
     */
    if (thisObj.hasClass('rurera-url-field')) {
        var pattern = /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/;
        if (!pattern.test(thisObj.val())) {
            array_length = alert_messages.length;
            alert_messages[array_length] = rurera_insert_error_message(thisObj, alert_messages, 'is not valid URL!');
            has_empty = true;
        }
    }
    /*
     * Check for Date Field
     */
    if (thisObj.hasClass('rurera-date-field')) {
        //var pattern = /([0-9][1-2])\/([0-2][0-9]|[3][0-1])\/((19|20)[0-9]{2})/;
        var pattern = /^\d{1,2}.\d{1,2}.\d{4} \d{2}:\d{2}$/;
        if (!pattern.test(thisObj.val())) {
            array_length = alert_messages.length;
            alert_messages[array_length] = rurera_insert_error_message(thisObj, alert_messages, 'is not valid Date!');
            has_empty = true;
        }
    }
    /*
     * Check for Range Field
     */
    if (thisObj.hasClass('rurera-range-field')) {
        var min_val = thisObj.data('min');
        var max_val = thisObj.data('max');
        if (!(thisObj.val() >= min_val) || !(thisObj.val() <= max_val)) {
            array_length = alert_messages.length;
            alert_messages[array_length] = rurera_insert_error_message(thisObj, alert_messages, 'is not in Range! ( ' + min_val + ' - ' + max_val + ' )');
            has_empty = true;
        }
    }
    return has_empty;
}

$(document).on('click', '.pin-search', function () {
	var form_id = $(this).attr('data-form_id');
	var search_type = $(this).attr('data-search_type');
	
	var formFields = $('#'+form_id).find('input, select, textarea');
	
	var formData = {};
	// Iterate over each form field
	formFields.each(function() {
		var name = $(this).attr('name');
		var value = $(this).val();

		if (name) {
			formData[name] = value;	
		}
	});
	var jsonFormData = JSON.stringify(formData);
	
	var form_data_encoded  = jsonFormData;
	$.ajax({
		type: "POST",
		url: '/admin/users/pin_search',
		data: {'seach_type': search_type, 'form_id': form_id, 'form_data_encoded': form_data_encoded},
		success: function (return_data) {
			console.log(return_data);
		}
	});
});


$(document).on('click', '.unpin-search', function () {
	var search_type = $(this).attr('data-search_type');
	$.ajax({
		type: "POST",
		url: '/admin/users/unpin_search',
		data: {'seach_type': search_type},
		success: function (return_data) {
			location.reload();
		}
	});
});

$(document).on('click', '.save-template', function () {
	// Select all form fields inside the div with id "question_properties"
	$(".template_save_modal").modal('show');
	
	var form_id = $(this).attr('data-form_id');
	var template_type = $(this).attr('data-template_type');
	var form_data = new FormData($('#' + form_id)[0]);

	// Create an object to store the name-value pairs
	var jsonFormData = {};
	form_data.forEach((value, key) => {
		jsonFormData[key] = value;
	});
	
	jsonFormData['url_params'] = Object.entries(jsonFormData)
    .map(([key, value]) => `${encodeURIComponent(key)}=${encodeURIComponent(value)}`)
    .join('&');
	console.log(jsonFormData);

	jsonFormData = JSON.stringify(jsonFormData);
	$(".form_data_encoded").val(jsonFormData);
	$(".template_type").val(template_type);
	$(".form_id").val(form_id);
	
	
});

$(document).on('click', '.save-template-btn', function () {
	//$(".template_save_modal").modal('hide');
	$(this).attr('disabled','disabled');
	var template_name = $('.template_name').val();
	var template_type = $('.template_type').val();
	var form_id = $('.form_id').val();
	var form_data_encoded  = $('.form_data_encoded').val();
	$.ajax({
		type: "POST",
		url: '/admin/users/save_templates',
		data: {'template_type': template_type, 'template_name': template_name, 'form_data_encoded': form_data_encoded},
		success: function (return_data) {
			$("#"+form_id).submit();
			location.reload();
			console.log(return_data);
		}
	});
});

$(document).on('click', '.apply-template-field span', function () {
	var formDatajson = $(this).closest('.apply-template-field').attr('data-template_data');
	var formDataObj = JSON.parse(formDatajson);
	var form_id = $(this).closest('.apply-template-field').attr('data-form_id');
	var template_type = $(this).closest('.apply-template-field').attr('data-template_type');
	
	is_template_active = true;
	var formFields = $('#'+form_id).find('input, select, textarea');
	var parentForm = $('#'+form_id);
	
	
	var form_data = new FormData($('#' + form_id)[0]);
	$('#' + form_id).find('input[type="checkbox"]:not(:checked)').each(function() {
		form_data.append($(this).attr('name'), ''); // Set value as empty or 'false' as needed
	});
	var jsonFormData = {};

	form_data.forEach((value, key) => {
    var name = key;
	if(name == '_token'){
		return true;
	}
    var selected_value = formDataObj[name];
    // Handle radio and checkbox inputs
    if (parentForm.find('[name="'+name+'"]').attr('type') == 'radio' || parentForm.find('[name="'+name+'"]').attr('type') == 'checkbox') {
			
		pre(name, 'name');	
		pre(selected_value, 'selected_value');
        if (Array.isArray(selected_value)) {
            // For checkboxes with multiple values
			parentForm.find('[name="'+name+'"]').prop('checked', false);
            selected_value.forEach(val => {
                parentForm.find('[name="'+name+'"][value="'+val+'"]').prop('checked', true);
            });
        } else {
            // For single radio or checkbox
            parentForm.find('[name="'+name+'"][value="'+selected_value+'"]').prop('checked', true);
        }
		parentForm.find('[name="'+name+'"]').change();
    } else if (name.endsWith('[]')) {
        // Remove the "[]" from the field name for consistency
        name = name.slice(0, -2);
		var selected_value = formDataObj[name];
        if (Array.isArray(selected_value)) {
            // Handle array of values for inputs with the same base name
			
            selected_value.forEach((val, idx) => {
                // Find and set values for inputs with the modified name
                parentForm.find('[name="'+name+'[]"]').eq(idx).val(val);
            });
        }
    } else {
        // Handle other input types like text, select, and textarea
        parentForm.find('[name="'+name+'"]').val(selected_value);
    }

    // Additional handling for specific input types
    if (parentForm.find('[name="'+name+'"]').is('select')) {
        var next_index = parentForm.find('[name="'+name+'"]').attr('data-next_index');
        var next_value = formDataObj[next_index];
        parentForm.find('[name="'+name+'"]').attr('data-next_value', next_value);
        parentForm.find('[name="'+name+'"]').change();
    }

    if (parentForm.find('[name="'+name+'"]').is('textarea')) {
        if (parentForm.find('[name="'+name+'"]').hasClass('summernote')) {
            parentForm.find('[name="'+name+'"]').summernote('code', selected_value);
        }
    }

    if (parentForm.find('[name="'+name+'"]').attr('type') == 'range') {
        parentForm.find('[name="'+name+'"]').change();
    }

    // Store the form data in the JSON object
    jsonFormData[key] = value;
});

});

$(document).on('click', '.remove-template', function () {
	var template_name = $(this).attr('data-template_name');
	var template_type = $(this).closest('span').attr('data-template_type');
	$(this).closest('span').remove();
	$.ajax({
		type: "POST",
		url: '/admin/users/remove_template',
		data: {'template_type': template_type, 'template_name': template_name},
		success: function (return_data) {
			console.log(return_data);
		}
	});
});


function pre(output_var, output_label = ''){
	console.log(output_label+'-start');
	console.log(output_var);
	console.log(output_label+'-ends');
}

$(document).on('click', '.copyable-text', function () {
    const text = $(this).text(); // Get the text content of the <p> element
    navigator.clipboard.writeText(text).then(() => {
        console.log('Text copied to clipboard!');
    }).catch(err => {
        console.error('Failed to copy text: ', err);
    });
});