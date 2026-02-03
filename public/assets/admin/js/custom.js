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

    window.resetRureraDateRangePickers = () => {
        if (jQuery().daterangepicker) {

            if( $(".rureradaterangepicker").length > 0){

                $(".rureradaterangepicker").each(function () {
                    const $datepicker = $(this);
                    const drops3 = $datepicker.attr('data-drops') ?? 'down';
                    const minValue = $datepicker.attr('min');
                    const maxValue = $datepicker.attr('max');

                    var configOptions = {
                        locale: {
                            format: 'YYYY-MM-DD',
                        },
                        // singleDatePicker: true, // enable this only if you want single date
                        timePicker: false,
                        autoApply: true,
                        autoUpdateInput: false, // we'll handle manually
                        drops: drops3,
                    };

                    if (rurera_is_field(minValue)) {
                        configOptions.minDate = minValue;
                    }
                    if (rurera_is_field(maxValue)) {
                        configOptions.maxDate = maxValue;
                    }

                    $datepicker.daterangepicker(configOptions);

                    $datepicker.on('apply.daterangepicker', function (ev, picker) {
                        // populate both start and end date
                        $(this).val(
                            picker.startDate.format('YYYY-MM-DD') +
                            ' - ' +
                            picker.endDate.format('YYYY-MM-DD')
                        );
                    });

                    $datepicker.on('cancel.daterangepicker', function (ev, picker) {
                        $(this).val('');
                    });
                });
            }
        }
    };
    resetRureraDateRangePickers();

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
                dropdownParent: $('.main-content')
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
    //height: $(".summernote-editor").attr('data-height') ?? 250,
    height: null,
    minHeight: 150,
    maxHeight: 400,
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
			//height: $(".summernote").attr('data-height') ?? 250,
            height: null,
            minHeight: 150,
            maxHeight: 400,
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



        //Custom Button
        function uid(prefix) {
            return (prefix || "id") + "-" + Date.now() + "-" + Math.random().toString(16).slice(2);
        }

        function escapeHtml(str) {
            return String(str || "")
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        function tryParseJSON(str) {
            try { return JSON.parse(str); } catch (e) { return null; }
        }

        function makeRow(question, answer) {
            var rowId = uid("faqrow");
            return `
      <div class="card mb-2" data-faq-row="${rowId}">
        <div class="card-body">
          <div class="form-group mb-2">
            <label class="mb-1">Question</label>
            <input type="text" class="form-control faq-q" value="${escapeHtml(question || "")}" placeholder="Enter question">
          </div>
          <div class="form-group mb-2">
            <label class="mb-1">Answer</label>
            <textarea class="form-control faq-a" rows="3" placeholder="Enter answer">${escapeHtml(answer || "")}</textarea>
          </div>
          <div class="text-right">
            <button type="button" class="btn btn-sm btn-outline-danger faq-remove">Remove</button>
          </div>
        </div>
      </div>
    `;
        }

        function collectRows() {
            var items = [];
            $("#faqRows .card").each(function () {
                var q = $(this).find(".faq-q").val().trim();
                var a = $(this).find(".faq-a").val().trim();
                if (q && a) items.push({ q: q, a: a });
            });
            return items;
        }

        function buildFaqHtml(title, items, existingBlockId) {
            var blockId = existingBlockId || uid("rureraFaq");
            var accId = uid("faqAccordion");

            var dataAttr = escapeHtml(JSON.stringify({ title: title || "", items: items }));

            var titleHtml = title ? `<h2 class="mb-3">${escapeHtml(title)}</h2>` : "";

            var editBar = `
    <div class="faq-edit-bar mb-2" contenteditable="false">
      <a href="javascript:void(0)" class="rurera-faq-edit btn btn-sm btn-outline-primary">
        Edit FAQs
      </a>
    </div>
  `;

            var cardsHtml = items.map(function (it, idx) {
                var headingId = uid("faqHeading");
                var collapseId = uid("faqCollapse");
                var expanded = idx === 0 ? "true" : "false";
                var show = idx === 0 ? " show" : "";
                var collapsedBtn = idx === 0 ? "" : " collapsed";

                return `
      <div class="card" itemprop="mainEntity" itemscope itemtype="https://schema.org/Question">
        <div class="card-header" id="${headingId}">
          <h5 class="mb-0">
            <button class="btn btn-link text-left w-100${collapsedBtn}" type="button"
              data-toggle="collapse" data-target="#${collapseId}"
              aria-expanded="${expanded}" aria-controls="${collapseId}">
              <span itemprop="name">${escapeHtml(it.q)}</span>
            </button>
          </h5>
        </div>
        <div id="${collapseId}" class="collapse${show}" aria-labelledby="${headingId}" data-parent="#${accId}">
          <div class="card-body" itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
            <div itemprop="text">${escapeHtml(it.a).replace(/\n/g, "<br>")}</div>
          </div>
        </div>
      </div>
    `;
            }).join("");

            return `
    <div class="rurera-faq-block my-3"
         data-rurera-faq="1"
         data-faq-block-id="${blockId}"
         data-faq-items="${dataAttr}"
         contenteditable="false"
         itemscope itemtype="https://schema.org/FAQPage">

      ${editBar}
      ${titleHtml}

      <div id="${accId}" class="accordion">
        ${cardsHtml}
      </div>
    </div>
    <p><br></p>
  `;
        }

        $(document).on("click", ".rurera-faq-edit", function (e) {
            e.preventDefault();

            var $faqBlock = $(this).closest('[data-rurera-faq="1"]');

            // Get summernote instance by finding the nearest editor
            // (works for single editor; for multiple, still OK if modal stores last context)
            var $editor = $(".summernote"); // if you have multiple editors, replace with a better selector
            var context = $("#faqBuilderModal").data("summernote-context");

            // If modal doesn't have context (user clicked edit without pressing toolbar first)
            // try to fetch summernote context from the editor instance
            if (!context && $editor.length && $editor.data("summernote")) {
                // We'll create a minimal context-like object for focus usage
                context = {
                    invoke: function (cmd) {
                        return $editor.summernote(cmd);
                    }
                };
                $("#faqBuilderModal").data("summernote-context", context);
            }

            // Load stored JSON
            var raw = $faqBlock.attr("data-faq-items") || "";
            var parsed = tryParseJSON(raw);

            if (!parsed) {
                // attribute might be entity-escaped
                var unescaped = raw
                    .replace(/&quot;/g, '"')
                    .replace(/&#039;/g, "'")
                    .replace(/&lt;/g, "<")
                    .replace(/&gt;/g, ">")
                    .replace(/&amp;/g, "&");
                parsed = tryParseJSON(unescaped);
            }

            // Fill modal
            $("#faqRows").empty();
            $("#faqTitleInput").val((parsed && parsed.title) ? parsed.title : "");
            $("#faqSaveBtn").text("Update");

            if (parsed && parsed.items && parsed.items.length) {
                parsed.items.forEach(function (it) {
                    $("#faqRows").append(makeRow(it.q, it.a));
                });
            } else {
                $("#faqRows").append(makeRow("", ""));
            }

            // Store edit target
            $("#faqBuilderModal").data("editing", true);
            $("#faqBuilderModal").data("targetBlock", $faqBlock);

            $("#faqBuilderModal").modal("show");
        });




        // Canced Responses

        var STORAGE_KEY = "rurera_canned_elements_v1";
        var activeContext = null; // last summernote context used


        function loadItems() {
            try {
                var raw = localStorage.getItem(STORAGE_KEY);
                var data = raw ? JSON.parse(raw) : [];
                return Array.isArray(data) ? data : [];
            } catch (e) {
                return [];
            }
        }

        function saveItems(items) {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(items));
        }


        // ------- Modal UI -------
        function renderList(selectedId) {

        }

        function clearForm() {
            $("#ceId").val("");
            $("#ceTitle").val("");
            $("#ceHtml").val("");
            $("#ceDeleteBtn").prop("disabled", true);
        }

        function fillForm(item) {
            $("#ceId").val(item.id);
            $("#ceTitle").val(item.title || "");
            $(".template_id").val(item.id || "");
            $("#ceHtml").val(item.html_content || "");
            $("#ceDeleteBtn").prop("disabled", false);
        }

        function openManager() {
            clearForm();
            //renderList(null);
            $("#cannedElementsModal").modal("show");
        }

        // ------- Toolbar dropdown rendering -------
        function rebuildDropdownMenu($menu) {
            var items = loadItems();
            $menu.empty();

            // Manage link
            $menu.append(
                '<a class="dropdown-item ce-manage" href="javascript:void(0)">Manage canned elements…</a>' +
                '<div class="dropdown-divider"></div>'
            );

            if (!items.length) {
                $menu.append('<span class="dropdown-item text-muted">No items yet</span>');
                return;
            }

            items.forEach(function (it) {
                $menu.append(
                    '<a class="dropdown-item ce-insert" href="javascript:void(0)" data-id="' + escapeHtml(it.id) + '">' +
                    escapeHtml(it.title || "Untitled") +
                    "</a>"
                );
            });
        }

        // ------- Summernote button -------
        function cannedElementsButton(context) {
            var ui = $.summernote.ui;

            // Remember last used context so dropdown clicks can insert into correct editor
            activeContext = context;

            var $menu = $('<div class="dropdown-menu1 canned-templates-list"></div>');
            rebuildDropdownMenu($menu);
            reset_templatest_list();

            var $btn = ui.buttonGroup([
                ui.button({
                    className: "dropdown-toggle",
                    contents: '<i class="note-icon-menu"></i> Canned <span class="caret"></span>',
                    tooltip: "Canned elements",
                    data: { toggle: "dropdown" },
                    click: function () {
                        activeContext = context;
                        rebuildDropdownMenu($menu);
                        reset_templatest_list();
                    }
                }),
                ui.dropdown({
                    className: "note-dropdown-menu",
                    contents: $menu[0].outerHTML
                })
            ]).render();

            return $btn;
        }

        // ------- Global click handlers (dropdown actions) -------
        $(document).on("click", ".ce-manage", function (e) {
            e.preventDefault();
            openManager();
        });

        $(document).on("click", ".ce-insert", function (e) {
            e.preventDefault();
            var id = $(this).data("id");

            var html_content = $('.canned-templates-content[data-template_id="'+id+'"]').html();
            activeContext.invoke("editor.focus");
            activeContext.invoke("editor.pasteHTML", (html_content || "") + "<p><br></p>");

            /*var items = loadItems();
            var found = items.find(function (x) { return x.id === id; });
            if (!found || !activeContext) return;

            activeContext.invoke("editor.focus");
            activeContext.invoke("editor.pasteHTML", (found.html || "") + "<p><br></p>");*/
        });

        // ------- Modal events -------
        $(document).on("click", "#ceNewBtn", function () {
            clearForm();
            $("#ceTitle").focus();
            renderList(null);
        });

        $(document).on("click", ".ce-item", function () {
            var id = $(this).data("id");
            var items = templates_items[id];
            if (!items) return;
            fillForm(items);

            renderList(id);
        });

        $(document).on("click", "#ceSaveBtn", function () {
            var id = $("#ceId").val().trim();
            var title = $("#ceTitle").val().trim();
            var html = $("#ceHtml").val();
            var template_id = $(".template_id").val();


            if (!title) {
                alert("Please enter a title.");
                return;
            }
            if (!html || !html.trim()) {
                alert("Please enter HTML.");
                return;
            }

            var items = loadItems();

            if (!id) {
                id = uid();
                items.unshift({ id: id, title: title, html: html });
            } else {
                var idx = items.findIndex(function (x) { return x.id === id; });
                if (idx >= 0) items[idx] = { id: id, title: title, html: html };
                else items.unshift({ id: id, title: title, html: html });
            }

            saveItems(items);
            renderList(id);
            $("#ceDeleteBtn").prop("disabled", false);



            $.ajax({
                type: "POST",
                url: '/admin/blog/save_canned_templates',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                data: {'title':title, 'html_content': html, 'template_id': template_id},
                success: function (return_data) {
                    $(".canned-templates-list").html(return_data.response_data);
                    $(".canned-templates-content-area").html(return_data.response_content);
                    $(".list-group").html(return_data.list_items);
                    // Also refresh any open dropdowns next time user opens it
                    alert("Saved.");
                }
            });
        });

        $(document).on("click", "#ceDeleteBtn", function () {
            var id = $("#ceId").val().trim();
            if (!id) return;

            if (!confirm("Delete this canned element?")) return;

            var items = loadItems().filter(function (x) { return x.id !== id; });
            saveItems(items);
            clearForm();
            renderList(null);
        });



        $(".summernote-source").summernote({
            dialogsInBody: true,
            tabsize: 2,
            //height: $(".summernote-source").attr('data-height') ?? 250,
            height: null,
            minHeight: 150,
            fontNames: [],
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline']],
                ['para', ['paragraph', 'ul', 'ol']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['history', ['undo']],
                ['view', ['codeview']], // 👈 comma was missing
                ['custom', ['faqBuilder', 'cannedElements']]
            ],
            buttons: {
                lfm: LFMButton,
                cannedElements: cannedElementsButton,
                faqBuilder: function (context) {
                    var ui = $.summernote.ui;

                    return ui.button({
                        contents: '<i class="note-icon-question"></i> FAQs',
                        tooltip: "Insert / Edit FAQs",
                        click: function () {
                            // Save current selection range so we can insert/replace later
                            context.invoke("editor.saveRange");

                            // Detect if caret is inside an existing FAQ block
                            var $current = $(context.invoke("editor.getSelectedNode"));
                            var $faqBlock = $current.closest('[data-rurera-faq="1"]');
                            var isEditing = $faqBlock.length > 0;

                            console.log(isEditing);
                            // Fill modal
                            $("#faqRows").empty();
                            $("#faqTitleInput").val("");
                            $("#faqSaveBtn").text(isEditing ? "Update" : "Insert");

                            // Keep references for save
                            $("#faqBuilderModal").data("summernote-context", context);
                            $("#faqBuilderModal").data("editing", isEditing);
                            $("#faqBuilderModal").data("targetBlock", isEditing ? $faqBlock : null);

                            if (isEditing) {
                                var raw = $faqBlock.attr("data-faq-items") || "";
                                var parsed = tryParseJSON(raw);
                                if (!parsed) {
                                    // if attribute got escaped, try to unescape minimal HTML entities
                                    var unescaped = raw
                                        .replace(/&quot;/g, '"')
                                        .replace(/&#039;/g, "'")
                                        .replace(/&lt;/g, "<")
                                        .replace(/&gt;/g, ">")
                                        .replace(/&amp;/g, "&");
                                    parsed = tryParseJSON(unescaped);
                                }

                                if (parsed && parsed.items && parsed.items.length) {
                                    $("#faqTitleInput").val(parsed.title || "");
                                    parsed.items.forEach(function (it) {
                                        $("#faqRows").append(makeRow(it.q, it.a));
                                    });
                                } else {
                                    // fallback: start with one row
                                    $("#faqRows").append(makeRow("", ""));
                                }
                            } else {
                                // new insert: start with one row
                                $("#faqRows").append(makeRow("", ""));
                            }

                            $("#faqBuilderModal").modal("show");
                        }
                    }).render();
                }
            },
            callbacks: {
                onPaste: function (e) {
                    let clipboardData = (e.originalEvent || e).clipboardData || window.clipboardData;

                    let html = clipboardData.getData('text/html');
                    let text = clipboardData.getData('text/plain');

                    e.preventDefault();

                    let content = html || text;

                    let tempDiv = document.createElement('div');
                    tempDiv.innerHTML = content;

                    function cleanText(node) {
                        if (node.nodeType === Node.TEXT_NODE) {
                            node.nodeValue = node.nodeValue
                                .replace(/[–—−]/g, '-')
                                .replace(/[‘’]/g, "'")
                                .replace(/[“”]/g, '"')
                                .replace(/…/g, '...')
                                .replace(/[•‣▪◦]/g, '-')
                                .replace(/\u00A0/g, ' ')
                                .replace(/©/g, '(c)')
                                .replace(/®/g, '(r)')
                                .replace(/™/g, 'TM')
                                .replace(/°/g, 'deg')
                                .replace(/×/g, 'x')
                                .replace(/÷/g, '/')
                                .replace(/→/g, '->')
                                .replace(/←/g, '<-')
                                .replace(/⇒/g, '=>')
                                .replace(/[✓✔]/g, 'Yes')
                                .replace(/[✗✘]/g, 'No')
                                // emoji-safe removal
                                .replace(/[\uD800-\uDBFF][\uDC00-\uDFFF]/g, '')
                                .replace(/\s{2,}/g, ' ');
                        } else {
                            node.childNodes.forEach(cleanText);
                        }
                    }

                    // 🔥 NEW: remove inline styles ONLY
                    function removeInlineStyles(node) {
                        if (node.nodeType === Node.ELEMENT_NODE) {
                            node.removeAttribute('style');
                        }
                        node.childNodes.forEach(removeInlineStyles);
                    }

                    cleanText(tempDiv);
                    removeInlineStyles(tempDiv);
                    fixHeadingOverflow(tempDiv);

                    document.execCommand('insertHTML', false, tempDiv.innerHTML);
                }
            }
        });

        function fixHeadingOverflow(container) {
            container.querySelectorAll('h1,h2,h3,h4,h5,h6').forEach(heading => {
                let nodes = Array.from(heading.childNodes);

                if (nodes.length <= 1) return;

                let fragment = document.createDocumentFragment();
                let firstTextFound = false;

                nodes.forEach(node => {
                    if (!firstTextFound && node.nodeType === Node.TEXT_NODE && node.nodeValue.trim()) {
                        firstTextFound = true;
                        return;
                    }

                    if (firstTextFound) {
                        fragment.appendChild(node);
                    }
                });

                if (fragment.childNodes.length) {
                    let p = document.createElement('p');
                    p.appendChild(fragment);
                    heading.after(p);
                }
            });
        }

        // --- Modal events ---
        $(document).on("click", "#faqAddRowBtn", function () {
            $("#faqRows").append(makeRow("", ""));
        });

        $(document).on("click", ".faq-remove", function () {
            $(this).closest(".card").remove();
        });

        $(document).on("click", "#faqSaveBtn", function () {
            var context = $("#faqBuilderModal").data("summernote-context");
            var isEditing = $("#faqBuilderModal").data("editing");
            var $targetBlock = $("#faqBuilderModal").data("targetBlock");

            var title = $("#faqTitleInput").val().trim();
            var items = collectRows();

            if (!items.length) {
                alert("Please add at least one FAQ with both a question and an answer.");
                return;
            }

            // Restore selection (important if modal changed focus)
            context.invoke("editor.restoreRange");
            context.invoke("editor.focus");

            if (isEditing && $targetBlock && $targetBlock.length) {
                var existingId = $targetBlock.attr("data-faq-block-id") || uid("rureraFaq");
                var html = buildFaqHtml(title, items, existingId);
                $targetBlock[0].outerHTML = html; // replace whole block
            } else {
                var htmlNew = buildFaqHtml(title, items);
                context.invoke("editor.pasteHTML", htmlNew);
            }

            $("#faqBuilderModal").modal("hide");
        });

        // --- Init: call this on your editor(s) ---
        // Example:
        // registerFaqButton($(".summernote"));


        var EquationButton = function (context) {
            var ui = $.summernote.ui;

            return ui.button({
                contents: '<i class="note-icon-magic"></i> Eq',
                tooltip: 'Insert Equation',
                click: function () {
                    // Open your HTML modal
                    $(".equation-insert-btn").attr('id', 'insertEquation');
                    $('#equationModal').modal('show');
                }
            }).render();
        };
        $(".eq-summernote").summernote({
            dialogsInBody: true,
            tabsize: 2,
            //height: $(".eq-summernote").attr('data-height') ?? 250,
            height: null,
            minHeight: 150,
            maxHeight: 400,
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
            showCloseButton: true,
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
                    showCloseButton: true,
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
                    showCloseButton: true,
                    icon: 'error',
                })
            }
        }).error(err => {
            Swal.fire({
                title: deleteAlertFail,
                text: deleteAlertFailHint,
                showCloseButton: true,
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
    var error_objects = new Array();
    form_name.find('.rurera-req-field:not(img), .editor-field:not(img), .editor-fields:not(img)').each(function (index_no) {
        is_visible = true;
        var thisObj = jQuery(this);
        index_no = rurera_is_field(index_no) ? index_no : 0;
        var visible_id = thisObj.data('visible');
        error_objects[index_no] = new Array();
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
                error_objects[index_no]['error_msg'] = rurera_insert_error_message(thisObj, alert_messages, '', 'radio');
                error_objects[index_no]['error_obj'] = thisObj;
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

                error_objects[index_no]['error_msg'] = rurera_insert_error_message(thisObj, alert_messages, '');
                error_objects[index_no]['error_obj'] = thisObj;
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
	pre(formDataObj['num_correct_answers'], 'formDataObj');

	form_data.forEach((value, key) => {
    var name = key;
	if(name == '_token'){
		return true;
	}

    var selected_value = formDataObj[name];

    // Handle radio and checkbox inputs
    if (parentForm.find('[name="'+name+'"]').attr('type') == 'radio' || parentForm.find('[name="'+name+'"]').attr('type') == 'checkbox') {

		if (name.endsWith('[]')) {
			// Remove the "[]" from the field name for consistency
			key_name = name.slice(0, -2);
			var selected_value = formDataObj[key_name];
		}
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
		key_name = name.slice(0, -2);
		var selected_value = formDataObj[key_name];
		pre(name, 'name');
		pre(selected_value, 'selected_value');
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
	// Get the content inside the <pre> tag

	const promptText = $(this).text();

	// Create a temporary <textarea> element to copy text from
	const tempTextarea = document.createElement('textarea');
	tempTextarea.value = promptText;
	document.body.appendChild(tempTextarea);

	// Select the text and copy it
	tempTextarea.select();
	tempTextarea.setSelectionRange(0, 99999); // For mobile devices

	try {
		document.execCommand('copy');

	} catch (error) {
	}

	$.toast({
            heading: 'Success!',
            text: 'Text Copied',
            bgColor: 'green',
            textColor: 'white',
            hideAfter: 3000,
            position: 'bottom-right',
            icon: 'success'
          });

	// Remove the temporary <textarea> element
	document.body.removeChild(tempTextarea);
});

$(document).on('click', '.copy-to-text', function () {
	// Get the content inside the <pre> tag
	var copyable_div = $(this).attr('data-copy_to');
	const promptText = $('.'+copyable_div).text();

	// Create a temporary <textarea> element to copy text from
	const tempTextarea = document.createElement('textarea');
	tempTextarea.value = promptText;
	document.body.appendChild(tempTextarea);

	// Select the text and copy it
	tempTextarea.select();
	tempTextarea.setSelectionRange(0, 99999); // For mobile devices

	try {
		document.execCommand('copy');

	} catch (error) {
	}

	$.toast({
            heading: 'Success!',
            text: 'Text Copied',
            bgColor: 'green',
            textColor: 'white',
            hideAfter: 3000,
            position: 'bottom-right',
            icon: 'success'
          });

	// Remove the temporary <textarea> element
	document.body.removeChild(tempTextarea);
});



function rureraform_utf8decode(input) {
    var string = "";
    var i = 0;
    var c = 0, c1 = 0, c2 = 0;
    while (i < input.length) {
        c = input.charCodeAt(i);
        if (c < 128) {
            string += String.fromCharCode(c);
            i++;
        } else if ((c > 191) && (c < 224)) {
            c2 = input.charCodeAt(i + 1);
            string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
            i += 2;
        } else {
            c2 = input.charCodeAt(i + 1);
            c3 = input.charCodeAt(i + 2);
            string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
            i += 3;
        }
    }
    return string;
}

function rureraform_decode64(input) {
    var keyString = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    var output = "";
    var chr1, chr2, chr3;
    var enc1, enc2, enc3, enc4;
    var i = 0;
    input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");
    while (i < input.length) {
        enc1 = keyString.indexOf(input.charAt(i++));
        enc2 = keyString.indexOf(input.charAt(i++));
        enc3 = keyString.indexOf(input.charAt(i++));
        enc4 = keyString.indexOf(input.charAt(i++));
        chr1 = (enc1 << 2) | (enc2 >> 4);
        chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
        chr3 = ((enc3 & 3) << 6) | enc4;
        output = output + String.fromCharCode(chr1);
        if (enc3 != 64) {
            output = output + String.fromCharCode(chr2);
        }
        if (enc4 != 64) {
            output = output + String.fromCharCode(chr3);
        }
    }
    output = rureraform_utf8decode(output);
    return output;
}
$(document).on('change', '.check-uncheck-all', function (e) {

    var target_class = $(this).attr('data-target_class');
    var isChecked = $(this).is(':checked');
    $('.' + target_class).prop('checked', isChecked);
    var checkedCount = $('.' + target_class + ':checked').length;

    if(checkedCount > 0){
        if($(".bulk-actions-btn").length > 0){
            $(".bulk-actions-btn").removeClass('disabled')
        }
    }else{
        if($(".bulk-actions-btn").length > 0){
            $(".bulk-actions-btn").addClass('disabled')
        }
    }
});
$(document).on('change', '.sections-teachers', function (e) {
    var target_class = 'sections-teachers';
    var checkedCount = $('.' + target_class + ':checked').length;

    if(checkedCount > 0){
        if($(".bulk-actions-btn").length > 0){
            $(".bulk-actions-btn").removeClass('disabled')
        }
    }else{
        if($(".bulk-actions-btn").length > 0){
            $(".bulk-actions-btn").addClass('disabled')
        }
    }
});

$(document).on('change', '.sections-users', function (e) {
    var target_class = 'sections-users';
    var checkedCount = $('.' + target_class + ':checked').length;

    if(checkedCount > 0){
        if($(".bulk-actions-btn").length > 0){
            $(".bulk-actions-btn").removeClass('disabled')
        }
    }else{
        if($(".bulk-actions-btn").length > 0){
            $(".bulk-actions-btn").addClass('disabled')
        }
    }
});

$(document).on('change', '.sections-students', function (e) {
    var target_class = 'sections-students';
    var checkedCount = $('.' + target_class + ':checked').length;

    if(checkedCount > 0){
        if($(".bulk-actions-btn").length > 0){
            $(".bulk-actions-btn").removeClass('disabled')
        }
    }else{
        if($(".bulk-actions-btn").length > 0){
            $(".bulk-actions-btn").addClass('disabled')
        }
    }
});



$(document).on('change', '.invitations_list', function (e) {
    var target_class = 'invitations_list';
    var checkedCount = $('.' + target_class + ':checked').length;

    if(checkedCount > 0){
        if($(".bulk-actions-btn").length > 0){
            $(".bulk-actions-btn").removeClass('disabled')
        }
    }else{
        if($(".bulk-actions-btn").length > 0){
            $(".bulk-actions-btn").addClass('disabled')
        }
    }
});


$(document).on('change', '.schools-list-ajax', function (e) {

    var next_target = $(this).attr('data-next_target');
    var selected_value = $(this).attr('data-selected_value');
    var school_id = $(this).val();

    jQuery.ajax({
        type: "GET",
        url: '/admin/schools/get_schools_classes',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {'school_id':school_id, 'selected_value': selected_value},
        success: function (return_data) {
            $("."+next_target).html(return_data);
        }
    });
});
$(document).on('click', '.rurera-ajax-tabs', function (e) {
    var ajax_url = $(this).attr('data-ajax_url');
    var target_class = $(this).attr('id');
    var passing_data = $(this).attr('data-passing_data');
    rurera_loader($("."+target_class), 'div');
    if(passing_data != '') {
        passing_data = JSON.parse($(this).attr('data-passing_data'));
    }
    console.log(passing_data);
    jQuery.ajax({
        type: "GET",
        url: ajax_url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: passing_data,
        success: function (return_data) {
            rurera_remove_loader($("."+target_class), 'div');
            $("."+target_class).html(return_data);
        }
    });
});

$(document).on('change', '.rurera-ajax-tabs-change', function (e) {
    var ajax_url = $(this).attr('data-ajax_url');
    var target_class = $(this).attr('data-target_class');
    var passing_data = $(this).attr('data-passing_data');
    var this_key = $(this).attr('data-field_key');
    var this_value = $(this).val();

    rurera_loader($("."+target_class), 'div');

    // Parse existing data or initialize empty object
    if(passing_data != '') {
        passing_data = JSON.parse(passing_data);
    } else {
        passing_data = {};
    }

    // Add/replace key-value
    passing_data[this_key] = this_value;

    console.log(passing_data);

    jQuery.ajax({
        type: "GET",
        url: ajax_url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: passing_data,
        success: function (return_data) {
            rurera_remove_loader($("."+target_class), 'div');
            $("."+target_class).html(return_data);
        }
    });
});

$(document).on('change', '.rurera-ajax-submission', function (e) {
    var ajax_url = $(this).attr('data-ajax_url');
    var target_class = $(this).attr('data-target_class');
    var passing_data = $(this).attr('data-passing_data');
    var passing_vars = $(this).attr('data-passing_vars');
    passing_vars = passing_vars.replace(/[\[\]\s]/g, '').split(',');
    rurera_loader($("."+target_class), 'div');
    if(passing_data != '') {
        passing_data = JSON.parse($(this).attr('data-passing_data'));
    }
    var passing_data = passing_data || {};
    if (passing_vars != '') {
        $.each(passing_vars, function (index, passingClass) {
            var passingValue = $('.' + passingClass).val();
            var passingType = $('.' + passingClass).attr('type');
            if(passingType == 'radio' || passingType == 'checkbox'){
                var passingValue = $('.' + passingClass+':checked').val();
            }

            passing_data[passingClass] = passingValue;
        });
    }
    console.log(passing_data);
    jQuery.ajax({
        type: "GET",
        url: ajax_url,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: passing_data,
        success: function (return_data) {
            rurera_remove_loader($("."+target_class), 'div');
            $("."+target_class).html(return_data);
            resetRureraDateRangePickers();
        }
    });
});
$(document).on('change', '.schools_ajax_field', function (e) {
    var school_id = $(this).val();
    var target_class = $(this).attr('data-next_class');
    var next_value = $(this).attr('data-next_value');
    rurera_loader($("."+target_class), 'div');
    jQuery.ajax({
        type: "GET",
        url: '/admin/common/get_school_classes_field',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {"school_id": school_id, "next_value": next_value},
        success: function (return_data) {
            rurera_remove_loader($("."+target_class), 'div');
            $("."+target_class).html(return_data);
        }
    });
});
if($(".schools_ajax_field").length > 0){
    $(".schools_ajax_field").change();
}
$(document).on('change', '.rurera_self_submitted_field', function (e) {
    var field_key = $(this).attr('data-field_key');
    var field_value = $(this).val();
    var currentUrl = window.location.href;
    var url = new URL(currentUrl);
    url.searchParams.set(field_key, field_value);
    window.location.href = url.toString();
});

$(document).on('change', '.rurera_conditional_field', function (e) {
    var common_class = $(this).attr('data-common_class');
    var target_class = $(this).attr('data-target_class');
    console.log(common_class);
    console.log(target_class);
    $("."+common_class).addClass('rurera-hide');
    $("."+target_class).removeClass('rurera-hide');
    if (typeof common_fields_check === "function") {
        common_fields_check();
    }
});


if($(".rurera_conditional_field").length > 0){
    $(".rurera_conditional_field:checked").change();
}


function rurera_modal_alert(msg_type, msg_title, confirmButton){

    Swal.fire({icon: msg_type, html: '<h3 class="font-20 text-center text-dark-blue">'+msg_title+'</h3>', showConfirmButton: confirmButton, showCloseButton: true});

}


$('body').on('change', '.conditional_field_parent', function (e) {
    var target_field_class = $(this).attr('data-target_field_class');
    var target_common_class = $(this).attr('data-target_common_class');
    if ($(this).is('select')) {
        var selected_option = $(this).find('option:selected');
        var target_field_class = selected_option.attr('data-target_field_class');
        var target_common_class = selected_option.attr('data-target_common_class');
    }
    console.log(target_field_class);
    console.log(target_common_class);
    $('.'+target_common_class).addClass('rurera-hide');
    $('.'+target_field_class).removeClass('rurera-hide');
});
if($(".conditional_field_parent").length > 0){
    $(".conditional_field_parent:checked").change();
}


$(document).on('click', '.generate-subtopic-part', function (e) {
    var sub_chapter_id = $(this).attr('data-sub_chapter_id');
    var parentObj = $(this).closest('.subtopic-parts-block');
    rurera_loader(parentObj, 'div');
    jQuery.ajax({
        type: "GET",
        url: '/admin/topics_parts/generate_sub_chapter_topic_part',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {"sub_chapter_id": sub_chapter_id},
        success: function (return_data) {
            rurera_remove_loader(parentObj, 'div');
            parentObj.html(return_data);
        }
    });
});
$(document).ready(function () {
  if (
    typeof $.fn.select2 !== 'undefined' &&
    $('.closeOnSelect-false').length
  ) {
    $('.closeOnSelect-false').select2({
      closeOnSelect: false
    });
  }
});



$(document).on('click', '.add-more-question', function (e) {
    var question_id = $(this).attr('data-id');
    var bulk_id = $(this).attr('data-bulk_id');
    var part_item_id = $(this).attr('data-part_item_id');
    var difficulty_level = $(this).attr('data-difficulty_level');
    var parentObj = $(this).closest('.main-content');
    rurera_loader(parentObj, 'div');
    jQuery.ajax({
        type: "POST",
        url: '/admin/questions-generator/duplicate_question',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {"question_id": question_id, "bulk_id": bulk_id, "part_item_id": part_item_id, "difficulty_level": difficulty_level},
        success: function (return_data) {
            //rurera_remove_loader(parentObj, 'div');
            //parentObj.html(return_data);
            window.location.href = return_data;
        }
    });
});


function loadGalleryHTML(file_url, input_data){
    var response_url = '';
    response_url += '<li>'+input_data+'<img src="'+file_url+'" style="width:80px;"></li>';
    return response_url;
}

function loadOptionGallery(file_url, input_data){
    var response_url = '';
    if(file_url != ''){
        response_url += '<li>'+input_data+'<img src="'+file_url+'" style="width:80px;"></li>';
    }
    return response_url;
}


$(document).on('click', '#rfp-tab-gallery', function () {
    $(".gallery-load-form").submit();
});
$(document).on('submit', '.gallery-load-form', function () {
    var loaderDiv = $('.rurera-gallery-grid');
    rurera_loader(loaderDiv, 'div');
    var formData = new FormData($(this)[0]);
    $.ajax({
        type: "POST",
        url: '/admin/common/load_gallery_images',
        data: formData,
        processData: false,
        contentType: false,
        success: function (return_data) {
            rurera_remove_loader(loaderDiv, 'div');
            $(".rurera-gallery-grid").html(return_data);
        }
    });

});


$(document).on('click', '.rurera-file-manager', function () {
    var image_attr_encoded = $(this).attr('data-image_attr');
    var image_attr = JSON.parse(decodeURIComponent(image_attr_encoded));

    var gallery_fields_encoded = $(this).attr('data-gallery_fields');
    var gallery_fields = JSON.parse(decodeURIComponent(gallery_fields_encoded));

    jQuery.ajax({
        type: "GET",
        url: '/admin/common/rurera_file_manager',
        data: {'image_attr' : image_attr, 'gallery_fields' : gallery_fields},
        success: function (return_data) {
            $(".rurera-file-manager-block").html(return_data);
            $('.rurera-file-manager-modal').modal('show');
        },
    });

});
