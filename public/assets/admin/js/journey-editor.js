var stage_created = false;
var template_layout = {
    layout1: {
        1: {
            top: '63',
            left: '40'
        },
        2: {
            top: '90',
            left: '30'
        },
        3: {
            top: '40',
            left: '60'
        },
        4: {
            top: '30',
            left: '60'
        },
        5: {
            top: '60',
            left: '30'
        },
        6: {
            top: '70',
            left: '60'
        },
        7: {
            top: '70',
            left: '40'
        },
        8: {
            top: '40',
            left: '30'
        },
        9: {
            top: '00',
            left: '60'
        }
    }
};

var alreadyInitiated     = [];

$(document).on('dblclick', '.flowchart-links-layer g path', function (e) {
    var top = 0;
    var left = 0;
    let bookDropzone = $(this).closest('.book-dropzone');
    var data_id = $(this).closest('g').attr('data-element_id');
    var this_element    = $('.curriculum-item-data.active .levels-objects-list li[data-id="'+data_id+'"]');

    if (bookDropzone.length) {
        let dropzoneBbox = bookDropzone[0].getBoundingClientRect();

        top = e.pageY - (dropzoneBbox.top + window.scrollY);
        left = e.pageX - (dropzoneBbox.left + window.scrollX);

        var elementWidth = bookDropzone.width();
        var elementHeight = bookDropzone.height();

        var topPercentage = (e.offsetY / elementHeight) * 100;
        var leftPercentage = (e.offsetX / elementWidth) * 100;




    }

    var unique_id = Math.floor((Math.random() * 99999) + 1);
    var field_random_number = 'rand_' + unique_id;

    var layer_html = '';
    $el = ($('<div id="' + field_random_number + '"  style="left:'+leftPercentage+'%; top:'+topPercentage+'%;" data-item_title="Spacer" data-unique_id="' + unique_id + '" data-is_new="yes" class="path-initializer spacer-block flowchart-operator flowchart-default-operator drop-item form-group draggablecl field_settings draggable_field_' + field_random_number + '" data-id="' + field_random_number + '" data-item_path="default/topic_numbers.svg" data-field_type="spacer" data-trigger_class="infobox-spacer-fields" data-item_type="spacer" data-paragraph_value="Test text here..."><div class="field-data"><svg width="100%" height="5" xmlns="http://www.w3.org/2000/svg"><circle cx="5" cy="5" r="5" fill="black" /></svg><div class="flowchart-operator-inputs-outputs spacer-svg-controls"><div class="flowchart-operator-inputs"></div><div class="flowchart-operator-outputs"></div></div>'));
    $el.append('<a href="javascript:;" class="remove spacer-remove"><span class="fas fa-trash"></span></a>');
    $el.append('</div>');
    layer_html += `<li class="rurera-hide" data-id="${field_random_number}" data-field_postition="2">Spacer
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <img src="/assets/default/svgs/dots-three.svg" alt="">
                </button>
            <div class="dropdown-menu">
                <i class="fa fa-trash"></i><i class="lock-layer fa fa-unlock"></i><i class="fa fa-sort"></i><i class="fa fa-copy"></i>
            </div>
        </div>
        </li>`;
    this_element.after(layer_html);

    //$(".levels-objects-list").append(layer_html);

    $(".book-dropzone.active").append($el);

    //$('.draggable_field_' + field_random_number).click();
    sorting_render();
    levels_sorting_render();




});


$(document).on('click', '.control-tool-item', function () {
    //$(".field-options").addClass('hide');
    $('.control-tool-item').removeClass('active');
    $(this).addClass('active');
    //$('body').css('cursor', "pointer");
});

$(document).on('click', '.path-tool-item', function () {
    var target_class = $(this).attr('data-target_class');
	$(this).closest('.editor-zone').find('.book-dropzone.active').attr('data-item_path', target_class);
    $(".curriculum-item-data.active .flowchart-links-layer > g").removeAttr('class');
    $(".curriculum-item-data.active .flowchart-links-layer > g").addClass(target_class);
    $(".curriculum-item-data.active .path-tool-item").removeClass('active');
    $(this).addClass('active');
});

$(document).on('click', '.layout-template-item', function () {
    var target_layout = $(this).attr('data-target_layout');

    $(".layout-template-item").removeClass('active');
    $(this).addClass('active');
    //template_layout
    var template_layout_data = template_layout[target_layout];
    var item_counter = 1;
    console.log($(".book-dropzone.active").closest('.editor-zone').find('.levels-objects-list').find('li').length);
    $(".book-dropzone.active").closest('.editor-zone').find('.levels-objects-list').find('li').each(function (item_no) {
        var field_id = $(this).attr('data-id');
        console.log('field_id--'+ field_id);
        console.log('item_counter--'+ item_counter);
        console.log('------------------');
        var top_position = template_layout_data[item_counter].top;
        var left_position =template_layout_data[item_counter].left;
        $(".draggable_field_" + field_id).css('top', top_position+'%');
        $(".draggable_field_" + field_id).css('left', left_position+'%');
        item_counter++;
    });
    levels_sorting_render();



});


$(document).on('click', '.sets-selection', function () {
    var set_name = $(this).attr('data-set');
    //$(".field-options").addClass('hide');
    $(this).closest('.editor-objects-block').find('.sets-selection').removeClass('active');
    $(this).addClass('active');
    var treasure_data = $(this).find('.item_treasure_pending');
    var topic_data = $(this).find('.item_topic_pending');
    var treasure_svg_code = treasure_data.closest('li').find('.svg_code').html();
    var treasure_item_path = treasure_data.attr('data-item_path');
    var topic_svg_code = topic_data.closest('li').find('.svg_code').html();
    var topic_item_path = topic_data.attr('data-item_path');

    var treasure_block = $('.path-initializer[data-field_type="treasure"]');
    treasure_block.attr('data-item_path', treasure_item_path);
    treasure_block.find('.field-data svg').remove();
    treasure_block.find('.field-data').prepend(treasure_svg_code);


    var topic_block = $('.path-initializer[data-field_type="topic"]');
    topic_block.attr('data-item_path', topic_item_path);
    topic_block.find('.field-data svg').remove();
    topic_block.find('.field-data').prepend(topic_svg_code);
    $(this).closest('.editor-zone').find('input[name="stage_set"]').val(set_name);
    //$('body').css('cursor', "pointer");
});

$(document).on('click', '.next-page', function () {
    var thisObj = $(".book-dropzone.active");
    if (thisObj.next().hasClass('book-dropzone') == true) {
        thisObj.next().removeClass('hide');
        thisObj.next().addClass('active');
        thisObj.addClass('hide');
        thisObj.removeClass('active');
    }
});
$(document).on('click', '.prev-page', function () {
    var thisObj = $(".book-dropzone.active");
    if (thisObj.prev().hasClass('book-dropzone') == true) {
        thisObj.prev().removeClass('hide');
        thisObj.prev().addClass('active');
        thisObj.addClass('hide');
        thisObj.removeClass('active');
    }
});


$(document).on('click', '.book-dropzone', function (e) {
    var dropZonObj = $(this);
    var drag_type = $('.control-tool-item.active').attr('data-drag_type');
    var drag_object = $('.control-tool-item.active').attr('data-drag_object');
    var shape_type = $('.control-tool-item.active').attr('data-shape_type');
    var item_path = $('.control-tool-item.active').attr('data-item_path');

    var attribute_type = $('.control-tool-item.active').attr('data-attribute_type');
    var attribute_value = $('.control-tool-item.active').attr('data-attribute_value');
    var item_title = $('.control-tool-item.active').attr('title');


    $('.control-tool-item').removeClass('active');
	var unique_id = Math.floor((Math.random() * 99999) + 1);
    var field_random_number = 'rand_' + unique_id;

    var elementWidth = $(this).width();
    var elementHeight = $(this).height();

    var topPercentage = (e.offsetY / elementHeight) * 100;
    var leftPercentage = (e.offsetX / elementWidth) * 100;


    if (drag_type == "stage" || drag_type == "path" || drag_type == "stage_objects" || drag_type == "topic" || drag_type == "treasure" || drag_type == "spacer") {


		var svg_code = $(".svgs-data ."+drag_object+"_svg").html();

        var $el = $('<div style="left:' + leftPercentage + '%; top:' + topPercentage + '%;" data-item_title="'+item_title+'" data-unique_id="'+unique_id+'" data-is_new="yes" class="drop-item form-group draggablecl field_settings draggable_field_' + field_random_number + '" data-id="' + field_random_number + '" data-item_path="' + item_path + '" data-field_type="' + drag_type + '" data-trigger_class="infobox-'+drag_object+'-fields" data-item_type="'+drag_object+'" data-paragraph_value="Test text here..."><div class="field-data">'+svg_code+'</div>');
        //$el.append('<span class="field-handle fas fa-arrows-alt"></span><a href="javascript:;" class="remove"><span class="fas fa-trash"></span></a>');


        if (drag_type == "topic" || drag_type == "treasure" || drag_type == "spacer") {
        }else{
            $el.append('<div class="object-options"><a href="javascript:;" class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se resize-handler"><span class="fas fa-expand-alt fa-fw"></span></a><a href="javascript:;" class="remove"><span class="fas fa-trash"></span></a></div>');
        }
        $el.append('</div>');
        if (!EditorIsEmpty(attribute_type)) {
            $el.find('.customizable-field').css(attribute_type, attribute_value);
        }
        dropZonObj.append($el);
    }


    //after_add_render(field_random_number, dropZonObj);


    /*
    * Draggable
    */

	$('.draggable_field_' + field_random_number+ ' .field-data').rotatable();

    $('.draggable_field_' + field_random_number)
    .draggable({
        preventCollision: true,
        containment: dropZonObj,
        drag: function(event, ui) {
            var parent = $(this).parent(); // Assuming dropZonObj is the container
            var parentWidth = parent.width();
            var parentHeight = parent.height();

            // Calculate the percentages
            var leftPercent = (ui.position.left / parentWidth) * 100;
            var topPercent = (ui.position.top / parentHeight) * 100;

            // Set the CSS of the element with the percentages
            $(this).css({
                left: leftPercent + '%',
                top: topPercent + '%'
            });

            // Prevent jQuery UI from overriding the percentage values with pixel values
            ui.position.left = leftPercent + '%';
            ui.position.top = topPercent + '%';
        }
    })
    .off('wheel'); // Unbinds all wheel events from this element


	$('.draggable_field_' + field_random_number).resizable({
        handles: {
            se: $('.draggable_field_' + field_random_number).find(".resize-handler") // Ensure the correct handler
        },
        resize: function(event, ui) {

            var parent = $(this).parent(); // Assuming dropZonObj is the container
            var parentWidth = parent.width();
            var parentHeight = parent.height();

            // Calculate the width and height in percentages
            var widthPercent = (ui.size.width / parentWidth) * 100;
            var heightPercent = (ui.size.height / parentHeight) * 100;

            widthPercent = (widthPercent > 100)? 100 : widthPercent;

            // Set the CSS of the element with percentage values
            $(this).css({
                width: widthPercent + '%',
                height: heightPercent + '%'
            });

            // Update the field options with the percentage values
            $(".field-options").find('.trigger_field[data-field_name="width"]').val(widthPercent);
            $(".field-options").find('.trigger_field[data-field_name="width"]').change();
        }
    });

	$('.colorpickerinput').colorpicker({
		format: 'hex',
	});

	var z_index = $(".editor-objects-list-all li").length+1;
	if( item_title != undefined){
		$(".editor-objects-list-all").prepend('<li data-id="'+field_random_number+'" data-field_postition="'+z_index+'"><label contenteditable="true">'+item_title+'</label> <div class="actions-menu">\n' +
            '                                <i class="fa fa-trash"></i><i class="lock-layer fa fa-unlock"></i><i class="fa fa-sort"></i>\n' +
            '                            </div></li>');
		$(".editor-objects-list-all").sortable({
			handle: ".fa-sort",
			update: function(event, ui) {
                var $list = $(this);
                var $stageEnd = $list.find(".stage_end").detach(); // Remove and store the .stage_end element
                $list.append($stageEnd);

                var $stageStart = $list.find(".stage_start").detach(); // Remove and store the .stage_end element
                $list.prepend($stageStart);
				sorting_render(); // Call your function here
			}
		});
	}

	sorting_render();





	$(".field_settingss").rotatable({
        angle: 0,
        rotation: function(event, ui) {
        }
    });


});
function after_add_render(field_random_number, dropZonObj){

    $flowchart = $(".book-dropzone.active");





    var operatorId = field_random_number;
    var fieldObj = $('#'+operatorId);
    var field_position = fieldObj.position();
    var operatorData = {
        //top: field_position.top,// ($flowchart.height() / 2) - 30,
        //left: field_position.left,//($flowchart.width() / 2) - 100 + 10,
        properties: {
            title: 'Operator1111 ' + 3,
            inputs: {
                input_1: {
                    label: '',
                },
            },
            outputs: {
                output_1: {
                    label: '',
                },
            }
        }
    };
    var initiate = false;

    if (!alreadyInitiated[operatorId]) {
        // Add the operator to the flowchart if not already initiated
        $flowchart.flowchart('createOperator', operatorId, operatorData, $("#" + field_random_number));
        // Mark the operator as initiated
        alreadyInitiated[operatorId] = operatorId;
        initiate = true;
    }


    initiate = false;

    if($flowchart != null && initiate == true) {

        //sorting_render();
        reinitialize_items();
        /*$flowchart.flowchart('addLink', {
            fromOperator: 'operator1',
            fromConnector: 'output_1',
            toOperator: operatorId,
            toConnector: 'input_1',
        });*/
    }
    /*$('.draggable_field_' + field_random_number)
        .rotatable()
        .draggable({
            preventCollision: true,
            containment: dropZonObj,
            drag: function(event, ui) {
                reinitialize_items(ui); // Call your function here
            }
        })
        .off('wheel'); // Unbinds all wheel events from this element
*/

    var field_type = $(".draggable_field_"+operatorId).attr('data-field_type');
    if(field_type != 'topic' && field_type != 'treasure' && field_type != 'spacer') {
        $('.draggable_field_' + field_random_number).resizable({
            handles: {
                se: $('.draggable_field_' + field_random_number).find(".resize-handler") // Ensure the correct handler
            },
            resize: function (event, ui) {


                var parent = $(this).parent(); // Assuming dropZonObj is the container
                var parentWidth = parent.width();
                var parentHeight = parent.height();

                // Calculate the width and height in percentages
                var widthPercent = (ui.size.width / parentWidth) * 100;
                var heightPercent = (ui.size.height / parentHeight) * 100;
                widthPercent = (widthPercent > 100) ? 100 : widthPercent;

                // Set the CSS of the element with percentage values
                $(this).css({
                    width: widthPercent + '%',
                    height: heightPercent + '%'
                });

                // Update the field options with the percentage values
                $(".field-options").find('.trigger_field[data-field_name="width"]').val(widthPercent);
                $(".field-options").find('.trigger_field[data-field_name="width"]').change();

            }
        });
    }
}

function reinitialize_items(){

    $('.curriculum-item-data.active .levels-objects-list').find('li').each(function () {
        var field_id = $(this).attr('data-id');
        var link_position = $(this).attr('data-link_position');
        link_position = (link_position == null || link_position == undefined)? 'left-in' : link_position
		link_position = 'left-in';
		console.log('reinitialize_itemsreinitialize_itemsreinitialize_itemsreinitialize_items');
        const previousElement = $(this).prev('li'); // Find the previous element with the same data-field_type
        if (previousElement.length > 0) {
            const previousId = previousElement.attr('data-id'); // Get the ID of the previous element



            var from_connector = 'output_1';
            if(link_position == 'right-in'){
                from_connector = 'input_1';
            }

            if(link_position == 'left-in') {
                /*$flowchart.flowchart('addLink', {
                    fromOperator: previousId,
                    fromConnector: 'output_1',
                    toOperator: field_id,
                    toConnector: 'input_1',
                });*/
                $flowchart.flowchart('addLink', {
                    fromOperator: previousId,
                    fromConnector: 'output_1',
                    toOperator: field_id,
                    toConnector: 'input_1',
                });
            }
            if(link_position == 'right-in'){

                $flowchart.flowchart('addLink', {
                    fromOperator: previousId,
                    fromConnector: 'output_1',
                    toOperator: field_id,
                    toConnector: 'input_1',
                    position: 'right_left',
                });

                /*$flowchart.flowchart('addLink', {
                    fromOperator: previousId,
                    fromConnector: 'input_2',
                    toOperator: field_id,
                    toConnector: 'output_2',
                });*/
            }


        }


    });

    /*$('.book-dropzone.active').find('.path-initializer').each(function () {
        var field_id = $(this).attr('id');
        const previousElement = $(this).prev('.path-initializer'); // Find the previous element with the same data-field_type
        if (previousElement.length > 0) {
            const previousId = previousElement.attr('id'); // Get the ID of the previous element
            $flowchart.flowchart('addLink', {
                fromOperator: previousId,
                fromConnector: 'output_1',
                toOperator: field_id,
                toConnector: 'input_1',
            });
        }


    });*/
}

function sorting_render(){
	var total_length = $('.book-dropzone.active').closest('.editor-zone').find('.editor-objects-list-all li').length;
	$('.book-dropzone.active').closest('.editor-zone').find('.editor-objects-list-all li').each(function (index_id, thisObj) {
		var index_plus = index_id;
		index_plus++;
		var index_id = total_length - index_id;
		$(thisObj).attr('data-field_postition', index_id);

		var data_id = $(thisObj).attr('data-id');
		$(".draggable_field_" + data_id).css('z-index', index_id);
		$(".draggable_field_" + data_id).attr('data-field_postition', index_id);
	});



    /*$('.book-dropzone.active').find('.path-initializer').each(function () {
        var field_id = $(this).attr('id');
        console.log('book-dropzone.activebook-dropzone.activebook-dropzone.activebook-dropzone.active');
        after_add_render(field_id, $(".book-dropzone.active"));
    });*/


    $('.curriculum-item-data.active .levels-objects-list').find('li').each(function () {
        var field_id = $(this).attr('data-id');

        after_add_render(field_id, $(".book-dropzone.active"));
    });

}

function levels_sorting_render(){
    /*$('.curriculum-item-data.active .levels-objects-list li').each(function (index_id, thisObj) {
        index_id++;
        $(thisObj).attr('data-field_postition', index_id);
        var data_id = $(thisObj).attr('data-id');
        $(".draggable_field_" + data_id).css('z-index', index_id);
        $(".draggable_field_" + data_id).attr('data-field_postition', index_id);
    });*/



    var operatorData = {
        //top: field_position.top,// ($flowchart.height() / 2) - 30,
        //left: field_position.left,//($flowchart.width() / 2) - 100 + 10,
        properties: {
            title: 'Operator1111 ' + 3,
            inputs: {
                input_1: {
                    label: '',
                },
            },
            outputs: {
                output_1: {
                    label: '',
                },
            }
        }
    };

    if($flowchart == null){

        setTimeout(function() {
            sorting_render();
            levels_sorting_render();
        }, 2000); // 2000 milliseconds = 2 seconds
    }else {
        sorting_render();

        var links = $flowchart.flowchart('getData').links;

        // Find the link with the specified details



        $('.curriculum-item-data.active .levels-objects-list').find('li').each(function () {
            var field_id = $(this).attr('data-id');
            if ($flowchart.flowchart('getOperatorData', field_id)) {
                if (links != undefined) {
                    Object.keys(links).forEach(function (linkId) {
                        var link = links[linkId];
                        if (
                            link.toOperator === field_id &&
                            link.toConnector === 'input_1'
                        ) {
                            // Delete the matching link
                            $flowchart.flowchart('deleteLink', linkId);

                        }
                    });
                }
            }
        });
        reinitialize_items();

    }

}

$(document).on('keyup change keydown', '.editor-objects-list-all li label', function (e) {
    var label_text = $(this).html();
	var field_id = $(this).closest('li').attr('data-id');
	$(".draggable_field_"+field_id).attr('data-item_title', label_text);
});

$(document).on('click', '#stage_settings-tab1', function (e) {

});

$(document).on('click', '.flowchart-links-layer', function (e) {
	if (e.target !== this) return; // Ensures the click is only on `.page_settings`
	$(this).closest('.editor-zone').find('.all_settings-tab').click();
	$(this).closest('.editor-zone').find('.stage_settings-tab').click();
	$('.field_settings').removeClass('active');

});


$(document).on('click', '.topics_settings-tab', function (e) {

	var thisParentObj = $(this).closest('.editor-zone').find('.book-dropzone');
	var thisObj = $(this);
	thisObj.closest('.editor-zone').find('.topic_settings_fields').find('.trigger_field').each(function () {
        var field_id = $(this).data('field_id');
		var field_attr_type = $(this).attr('data-field_attr_type');
		var current_value = thisParentObj.attr('data-' + field_id);
		console.log(field_id);
		console.log(current_value);

		if( field_attr_type == 'switch'){
			if( current_value == 1){
				$(this).closest('.custom-switch').find(".custom-switch-input").prop('checked', true);
			}
		}
		$(this).val(current_value);

    });

});
$(document).on('click', '.page_settings1', function (e) {

	if (!$(e.target).is($(this))) {
		return false;
	}
	var thisParentObj = $(this).closest('.editor-zone');

	$('.page_settings').removeClass('active');
	$(this).addClass('active');
    thisParentObj.find(".field-options").html('');
    var fieldObj = $(this);
    var field_id = fieldObj.data('id');
    var parent_field_id = field_id;
    var trigger_class = fieldObj.data('trigger_class');
    thisParentObj.find(".field-options").html('<h4 class="properties-title">Stage Properties</h4> '+$('.' + trigger_class).html());
	thisParentObj.find('.field_settings').removeClass('active');
    thisParentObj.find(".field-options .trigger_field").attr('data-id', field_id);

	console.log('page_settings____________-');

	thisParentObj.find('.field-options .trigger_field').each(function () {
        var field_id = $(this).data('field_id');
        var field_type = $(this).data('field_type');
        var field_value = fieldObj.attr('data-' + field_id);
        if (field_type != 'image') {

			if( field_id == 'page_graph' || field_id == 'shuffle_questions'){
				if( field_value == 1){
					$(this).closest('.custom-switch').find(".custom-switch-input").prop('checked', true);
				}
			}
			$(this).val(field_value);
        }

    });

	thisParentObj.find('.field-options .trigger_field').change();
	$('.colorpickerinput').colorpicker({
		format: 'hex',
	});


});

$(document).on('change', '.conditional-field', function () {
    $(".conditional-child-fields").hide();
    var child_value = $(this).val();
    var selectedOption = $(this).find('option:selected');
    var child_class = selectedOption.attr('data-child');
    $('.'+child_class).show();
});

var subject_topics_list = [];


$(document).on('click', '.field_settings', function (e) {
    $(".field-options").html('');

	var thisParentObj = $(this).closest('.editor-zone');
	if( stage_created == true){

		if( $(this).hasClass('path-initializer')){
			thisParentObj.find(".editor-parent-nav #layers-tab").click();
			thisParentObj.find('.levels_layers-tab').click();
		}else{
			thisParentObj.find(".editor-parent-nav #layers-tab").click();
			thisParentObj.find('.all_layers-tab').click();
			//$(".editor-parent-nav #stages-tab").click();
			//$(".editor-controls li #objects-tab1").click();
		}
	}


    var fieldObj = $(this);
    var field_id = fieldObj.data('id');
	var item_title = fieldObj.attr('data-item_title');
	var parent_field_id = field_id;
    var trigger_class = fieldObj.data('trigger_class');
    thisParentObj.find(".field-options").html('<h4 class="properties-title">'+item_title+' Properties</h4> '+$('.' + trigger_class).html());




    if($(".ajax-chapter-dropdown").length > 0) {
        $(".ajax-chapter-dropdown").each(function (index) {
            var data_id = $(this).attr('data-id');
            var selected_value = $('.field_settings[data-id="' + data_id + '"]').attr('data-chapter');

            var sub_chapter_data_id = $(this).closest('.field-options').find('.ajax-subchapter-dropdown').attr('data-id');
            var sub_chapter_id = $('.field_settings[data-id="' + sub_chapter_data_id + '"]').attr('data-sub_chapter_id');

            $(this).attr('data-sub_chapter_id', sub_chapter_id);

            $(this).find('option[value="' + selected_value + '"]').attr('selected', 'selected');
            //sub_chapter_id


        });
        $(".ajax-chapter-dropdown").change();
    }
    if($(".ajax-subchapter-dropdown").length > 0) {
        $(".ajax-subchapter-dropdown").each(function (index) {
            var data_id = $(this).attr('data-id');
            var selected_value = $('.field_settings[data-id="' + data_id + '"]').attr('data-sub_chapter_id');

            $(this).find('option[value="' + selected_value + '"]').attr('selected', 'selected');
        });
        $(".ajax-subchapter-dropdown").change();
    }


	thisParentObj.find('.field_settings').removeClass('active');
	$(this).addClass('active');
	thisParentObj.find('.editor-objects-list-all li').removeClass('active');
	thisParentObj.find('.editor-objects-list-all li[data-id="'+field_id+'"]').addClass('active');

    thisParentObj.find('.field-options .trigger_field').each(function () {

		var currentFieldObj = $(this);
        var field_id = $(this).data('field_id');
        var data_id = $(this).attr('data-id');
        var field_type = $(this).data('field_type');
        var field_value = fieldObj.attr('data-' + field_id);
        if (field_type != 'image' && field_type != 'select_subchapter') {
            $(this).val(field_value);
        }
        if (field_type == 'select_chapter') {
            $(this).find('option[value="' + field_value + '"]').attr('selected', 'selected');
            $(this).change();
        }
        if (field_type == 'select_subchapter') {
            if(field_value != ''){
                fieldObj.attr('data-select_subchapter_default', field_value);
            }
            $(this).find('option[value="' + field_value + '"]').attr('selected', 'selected');
            $(this).change();
        }
        if (field_type == 'select_topic') {
            if(field_value != ''){
                fieldObj.attr('data-topic_default', field_value);
            }
            $(this).find('option[value="' + field_value + '"]').attr('selected', 'selected');
            $(this).change();
        }
        if (field_type == 'texteditor') {
            if (!EditorIsEmpty(field_value)) {
                $(this).val(EditorValueDecode(field_value));
            }
            $(this).addClass('summernote-editor_' + parent_field_id);
        }




		if (field_type == 'select_topic') {


			$.each(subject_topics_list, function(title, id) {
				currentFieldObj.append($('<option>', {
					value: id,
					text: title,
					selected: id == field_value
				}));
			});

		}
        if (field_type == 'select_info') {
            var book_page_id = $(".book-dropzone.active").attr('data-page_id');
            $(this).addClass('search-infobox-select2_' + parent_field_id);
            var select_data = [];
            if (!EditorIsEmpty(field_value)) {
                $.ajax({
                    type: "GET",
                    url: '/admin/books/get_infobox_by_ids',
                    data: {'book_page_id': book_page_id, 'infobox_ids': field_value},
                    success: function (return_data) {
                        var select_data = return_data;
                        handleMultiSelect2('search-infobox-select2_' + parent_field_id, '/admin/books/' + book_page_id + '/searchinfobox', 'title', select_data);
                        var selected_values = [];
                        $.each(select_data, function (index, valueObj) {
                            selected_values.push(valueObj.id);
                        });
                        $('.search-infobox-select2_' + parent_field_id).val(selected_values).trigger('change');
                    }
                });
            } else {
                handleMultiSelect2('search-infobox-select2_' + parent_field_id, '/admin/books/' + book_page_id + '/searchinfobox', 'title', select_data);
            }

        }

        $("ul.select2-selection__rendered").sortable({});

        $('.summernote-editor_' + parent_field_id).summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
            ],
            callbacks: {
                onChange: function (contents, $editable) {
                    $('.summernote-editor_' + parent_field_id).val(EditorValueEnocde(contents));
                    trigger_field_change($('.summernote-editor_' + parent_field_id));
                }
            }
        });

    });



    if (!EditorIsEmpty($('.' + trigger_class).html())) {
        thisParentObj.find(".field-options").removeClass('hide');
    }
    thisParentObj.find(".field-options .trigger_field").attr('data-id', field_id);
	thisParentObj.find('.field-options .trigger_field').change();
	$('.colorpickerinput').colorpicker({
		format: 'hex',
	});

    var options_html = '';
    $(this)
        .closest('.editor-zone')
        .find('.field_settings[data-field_type="topic"]').each(function (index) {
        var topicOrderNo = $(this).attr('data-topic_order_no');
        options_html += '<option value="'+topicOrderNo+'">'+topicOrderNo+'</option>';
    });

    $(".treasure_topic_order_no").html(options_html);

    if($(".treasure_topic_order_no").length > 0) {
        $(".treasure_topic_order_no").each(function (index) {
            var data_id = $(this).attr('data-id');
            var treasure_topic_order_no = $('.field_settings[data-id="' + data_id + '"]').attr('data-treasure_topic_order_no');
            $(this).find('option[value="' + treasure_topic_order_no + '"]').attr('selected', 'selected');
        });
    }


});

$(document).on('keyup keydown click change', '.field-options .trigger_field', function (e) {
    trigger_field_change($(this));
    //levels_sorting_render();
});

		$('body').on('click', '.stage-accordion', function (e) {
            var level_id = $(this).closest('li').attr('data-id');

			$(".stage-accordion").removeClass('active');
            $(".accordion-row").removeClass('active');
            $(this).closest(".accordion-row").addClass('active');
            $(".curriculum-item-data").removeClass('active');
            $(".curriculum-item-data").removeClass('show');
            $(".book-dropzone").removeClass('active');
            $(this).addClass('active');
            $('.curriculum-item-data[data-level_id="'+level_id+'"]').addClass('active');
            //$(".curriculum-item-data#collapseItems"+level_id).addClass('show');
            //$(".curriculum-item-data#collapseItems"+level_id).addClass('show');
            $('.curriculum-item-data[data-level_id="'+level_id+'"]').find('.book-dropzone').addClass('active');


        });

$(document).on('keyup keydown click change', '.page-settings-fields .trigger_field', function (e) {

    trigger_field_change($(this));
});
$(document).on('keyup keydown click change', '.topic_settings_fields .trigger_field', function (e) {
    trigger_field_change($(this));
});



$(document).on('click', '.editor-objects-list-all li .fa-trash', function (e) {
	if( $(this).closest('li').hasClass('locked-object')){
		return false;
	}
    var data_id  = $(this).closest('li').attr('data-id');
    var element_type = $('.field_settings[data-id="'+data_id+'"]').attr('data-field_type');
	$('.field_settings[data-id="'+data_id+'"]').remove();
	$(this).closest('li').remove();
	sorting_render();
    levels_sorting_render();
    if(element_type == 'topic' || element_type == 'treasure' || element_type == 'spacer'){


        var links = $flowchart.flowchart('getData').links;

        // Find the link with the specified details

        if ($flowchart.flowchart('getOperatorData', data_id)) {
            Object.keys(links).forEach(function (linkId) {
                var link = links[linkId];
                if (link.toOperator === data_id && link.toConnector === 'input_1') {
                    $flowchart.flowchart('deleteLink', linkId);
                }
            });
        }



    }

});

$(document).on('click', '.editor-objects-list-all li .fa-unlock', function (e) {
	$(this).removeClass('fa-unlock');
	$(this).addClass('fa-lock');
	$(this).closest('li').addClass('locked-object');
    var data_id  = $(this).closest('li').attr('data-id');
	$('.field_settings[data-id="'+data_id+'"]').addClass('locked-object');
	$('.draggable_field_' + data_id).resizable("disable");
	$('.draggable_field_' + data_id).draggable("disable");
	$('.draggable_field_' + data_id).rotatable("disable");
});

$(document).on('click', '.editor-objects-list-all li .fa-lock', function (e) {
	$(this).removeClass('fa-lock');
	$(this).addClass('fa-unlock');
	$(this).closest('li').removeClass('locked-object');
    var data_id  = $(this).closest('li').attr('data-id');
	$('.field_settings[data-id="'+data_id+'"]').removeClass('locked-object');
	$('.draggable_field_' + data_id).resizable("enable");
	$('.draggable_field_' + data_id).draggable("enable");
	$('.draggable_field_' + data_id).rotatable("enable");

});


function trigger_field_change(thisObj) {
    var data_id = thisObj.attr('data-id');
    var field_type = thisObj.attr('data-field_type');
    var field_id = thisObj.attr('data-field_id');
    var field_name = thisObj.attr('data-field_name');
    var this_value = thisObj.val();
	var inner_style = $(".draggable_field_" + data_id).attr('data-inner_style');
	inner_style  = ( inner_style == undefined)? '' : inner_style;
    if (field_type == 'select' || field_type == 'select_info') {

        this_value = this_value.join(",");
    }

	if (field_type == 'select_topic') {

		if( this_value === null){
			this_value = '';
		}
    }

    if(this_value != null){
        this_value = this_value.replace(/\n/g, '<br />');
    }
    if( field_name == 'width'){
        this_value = this_value+'%';
    }
    $(".draggable_field_" + data_id).attr('data-' + field_id, this_value);
    if (field_type == 'text') {
        $(".draggable_field_" + data_id + ' .field-data').html(this_value);
    }

	if (field_type == 'style') {
		$(".draggable_field_" + data_id).css(field_name,this_value);
        //$(".draggable_field_" + data_id + ' .field-data').html(this_value);
    }

	if (field_type == 'page_style') {
		var this_value_number = this_value;
        if( field_name == 'width'){
            this_value = this_value+'%';
        }
		if( field_name == 'height'){
            var current_height = $(".page_settings.active").attr('data-'+field_id);


            $(".page_settings.active").find(".field_settings").each(function () {
                $activeElement = $(this);
                var topPos = parseInt($activeElement.css('top'));
                $activeElement.attr('data-topPx', topPos);
            });

            console.log('page-heightttttt');
			this_value = this_value+'px';
		}
		console.log(field_name);
		if( field_name == 'graph'){
			if( this_value == 1){
				$(".page_settings.active").addClass('graph-background');
			}else{
				$(".page_settings.active").removeClass('graph-background');
			}
		}if( field_name == 'background_image'){
            $(".page_settings.active").css('background-image','url('+this_value+')');
        }else{
            $(".page_settings.active").css(field_name, this_value);
		}
        //$(".draggable_field_" + data_id + ' .field-data').html(this_value);
		$(".page_settings.active").attr('data-'+field_id, this_value_number);


        if( field_name == 'height') {
            $(".page_settings.active").find(".field_settings").each(function () {
                var parentHeight = this_value;
                var topPercent = (parseInt($(this).attr('data-topPx')) / parseInt(parentHeight)) * 100;

                // Set the CSS of the element with the percentages
                $(this).css({
                    top: topPercent+'%'
                });
            });
        }


    }

	if (field_type == 'svg_style') {
		if( field_name == 'width'){
			this_value = this_value+'%';
		}
		$(".draggable_field_" + data_id).find('svg').css(field_name,this_value);
        //$(".draggable_field_" + data_id + ' .field-data').html(this_value);
		$(".draggable_field_" + data_id).attr('data-inner_style', $(".draggable_field_" + data_id).find('svg').attr('style'));
    }

	if (field_type == 'svg_path_style') {

		$(".draggable_field_" + data_id).find('svg').find('path').css(field_name,this_value);
		$(".draggable_field_" + data_id).find('svg').find('rect').css(field_name,this_value);
		$(".draggable_field_" + data_id).attr('data-inner_style', $(".draggable_field_" + data_id).find('svg').find('path').attr('style'));
		$(".draggable_field_" + data_id).attr('data-inner_style', $(".draggable_field_" + data_id).find('svg').find('rect').attr('style'));
    }



	if (field_type == 'topic_checkbox') {
		var field_title = thisObj.attr('data-topic_title');
		$(".draggable_field_" + data_id).attr('data-' + field_id, field_title);
        $(".draggable_field_" + data_id + ' .field-data').html(field_title);
    }


}


jQuery(document).ready(function () {
    $(".editor-zone").on("contextmenu", function () {
        return false;
    });




		//$('.saved-item-class').click();







    $('.book-dropzone .field_settings').each(function () {
        var dropZonObj = $(this).closest('.book-dropzone');
        var field_id = $(this).attr('data-id');


        $(document).on('keydown', function (event) {
            const $activeElement = $('.draggable_field_' + field_id + '.active');

            if ($activeElement.hasClass('locked-object')) {
                return false;
            }

            if ($activeElement.length) {
                if ($(event.target).attr('class') == '') {
                    event.preventDefault(); // Prevent the default scroll action
                }

                let leftPos = parseInt($activeElement.css('left'));
                let topPos = parseInt($activeElement.css('top'));

                switch (event.which) {
                    case 37: // Left arrow key
                        $activeElement.css('left', leftPos - 1 + '%');
                        break;

                    case 39: // Right arrow key
                        $activeElement.css('left', leftPos + 1 + '%');
                        break;

                    case 38: // Up arrow key
                        $activeElement.css('top', topPos - 1 + '%');
                        break;

                    case 40: // Down arrow key
                        $activeElement.css('top', topPos + 1 + '%');
                        break;
                }
            }
        });

        const style = $('.draggable_field_' + field_id).attr('style');

        var rotate_value = 0;
        if (style) {
            // Use a regular expression to extract the rotate value
            const rotateMatch = style.match(/rotate\(([-\d.]+)deg\)/);
            if (rotateMatch) {
                const rotateValue = parseFloat(rotateMatch[1]); // Extract and convert to a number
                rotate_value = rotateValue;
            }
        }

        $('.draggable_field_' + field_id+' .field-data')
            .rotatable({
                angle: rotate_value,
                rotate: function (event, ui) {

                    sorting_render();
                    levels_sorting_render();
                }
            }).off('wheel');

		$('.draggable_field_' + field_id)
			.draggable({
				preventCollision: true,
				containment: dropZonObj,
                drag: function(event, ui) {
                    var parent = $(this).parent(); // Assuming dropZonObj is the container
                    var parentWidth = parent.width();
                    var parentHeight = parent.height();

                    // Calculate the percentages
                    var leftPercent = (ui.position.left / parentWidth) * 100;
                    var topPercent = (ui.position.top / parentHeight) * 100;

                    // Set the CSS of the element with the percentages
                    $(this).css({
                        left: leftPercent + '%',
                        top: topPercent + '%'
                    });

                    // Prevent jQuery UI from overriding the percentage values with pixel values
                    ui.position.left = leftPercent + '%';
                    ui.position.top = topPercent + '%';
                }
			})
			.off('wheel'); // Unbinds all wheel events from this element



            var field_type = $(".draggable_field_"+field_id).attr('data-field_type');
            if(field_type != 'topic' && field_type != 'treasure' && field_type != 'spacer') {
                $('.draggable_field_' + field_id).resizable({
                    handles: {
                        se: $('.draggable_field_' + field_id).find(".resize-handler") // Ensure the correct handler
                    },

                    resize: function (event, ui) {
                        var parent = $(this).parent(); // Assuming dropZonObj is the container
                        var parentWidth = parent.width();
                        var parentHeight = parent.height();

                        // Calculate the width and height in percentages
                        var widthPercent = (ui.size.width / parentWidth) * 100;
                        var heightPercent = (ui.size.height / parentHeight) * 100;

                        widthPercent = (widthPercent > 100) ? 100 : widthPercent;

                        // Set the CSS of the element with percentage values
                        $(this).css({
                            width: widthPercent + '%',
                            height: heightPercent + '%'
                        });

                        // Update the field options with the percentage values
                        $(".field-options").find('.trigger_field[data-field_name="width"]').val(widthPercent);
                        $(".field-options").find('.trigger_field[data-field_name="width"]').change();


                    }

                });
            }

    });


    $(document).on('click', '.book-dropzone .remove', function (e) {
		if( $(this).closest('.field_settings').hasClass('locked-object')){
			return false;
		}
		var data_id = $(this).closest('.field_settings').attr('data-id');
        var element_type = $(this).closest('.field_settings').attr('data-field_type');
		$('.editor-objects-list-all li[data-id="'+data_id+'"]').remove();
		$('.levels-objects-list li[data-id="'+data_id+'"]').remove();
		sorting_render();
        $(this).closest('.field_settings').remove();
        $(".field-options").addClass('hide');

        levels_sorting_render();
        if(element_type == 'topic' || element_type == 'treasure' || element_type == 'spacer'){


            var links = $flowchart.flowchart('getData').links;

            // Find the link with the specified details

            if ($flowchart.flowchart('getOperatorData', data_id)) {
                Object.keys(links).forEach(function (linkId) {
                    var link = links[linkId];
                    if (link.toOperator === data_id && link.toConnector === 'input_1') {
                        $flowchart.flowchart('deleteLink', linkId);
                    }
                });
            }



        }



    });

    $(document).on('stylechanged', '.resizeable', function (e) {
    });




});


function EditorValueEnocde(input) {
    var keyString = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    var output = "";
    var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
    var i = 0;
    input = EditorUtf8Encode(input);
    while (i < input.length) {
        chr1 = input.charCodeAt(i++);
        chr2 = input.charCodeAt(i++);
        chr3 = input.charCodeAt(i++);
        enc1 = chr1 >> 2;
        enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
        enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
        enc4 = chr3 & 63;
        if (isNaN(chr2)) {
            enc3 = enc4 = 64;
        } else if (isNaN(chr3)) {
            enc4 = 64;
        }
        output = output + keyString.charAt(enc1) + keyString.charAt(enc2) + keyString.charAt(enc3) + keyString.charAt(enc4);
    }
    return JSON.stringify(output);
}


function EditorUtf8Encode(string) {
    string = string.replace(/\x0d\x0a/g, "\x0a");
    var output = "";
    for (var n = 0; n < string.length; n++) {
        var c = string.charCodeAt(n);
        if (c < 128) {
            output += String.fromCharCode(c);
        } else if ((c > 127) && (c < 2048)) {
            output += String.fromCharCode((c >> 6) | 192);
            output += String.fromCharCode((c & 63) | 128);
        } else {
            output += String.fromCharCode((c >> 12) | 224);
            output += String.fromCharCode(((c >> 6) & 63) | 128);
            output += String.fromCharCode((c & 63) | 128);
        }
    }
    return output;
}


function EditorValueDecode(input) {
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
    output = EditorUtf8Decode(output);
    return output;
}

function EditorUtf8Decode(input) {
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

function EditorIsEmpty(dataValue) {
    is_empty = true;
    if (dataValue != '' && dataValue != 'undefined' && dataValue != undefined) {
        is_empty = false;
    }
    return is_empty;
}


$(document).on('change', '.custom-switch-input', function (e) {
	var this_value = 0;
	 if ($(this).is(':checked')) {
		 this_value = 1;
	 }
	$(this).closest('.custom-switch').find('.trigger_field').val(this_value);
	$(this).closest('.custom-switch').find('.trigger_field').change();
});
$(document).on('click', '.generate', function (e) {


	var posted_data = generate_stage_area();

    /*$.ajax({
        type: "POST",
        url: '/admin/books/'+book_page_id+'/store_page',
        data: posted_data,
        success: function (return_data) {
            Swal.fire({icon: "success", html: '<h3 class="font-20 text-center text-dark-blue">Page Successfully Updated</h3>', showConfirmButton: !1});
        }
    });*/

});

$(document).on('change', 'input[name="topic_order_no222"]', function (e) {
    var topic_order_no = $(this).val();
    var total_with_same_value = $(this)
        .closest('.editor-zone')
        .find('.field_settings[data-field_type="topic"][data-topic_order_no="'+topic_order_no+'"]').length;
    if(total_with_same_value > 1){
        $(this).val('');


    }

    //treasure_topic_order_no
    var options_html = '';
    $(this)
        .closest('.editor-zone')
        .find('.field_settings[data-field_type="topic"]').each(function (index) {
        var topicOrderNo = $(this).attr('data-topic_order_no');
        options_html += '<option value="'+topicOrderNo+'">'+topicOrderNo+'</option>';
    });

    $(".treasure_topic_order_no").html(options_html);


});

$(document).on('change', 'select[name="subject_id"]', function (e) {

	var year_id = $(".category-id-field").val();
	var subject_id = $(this).val();

    $.ajax({
		type: "GET",
		url: '/admin/learning_journey/get_topics',
		data: {'year_id': year_id, 'subject_id': subject_id},
		success: function (return_data) {
			subject_topics_list = JSON.parse(return_data);
			if( stage_created == false){
				$('.saved-item-class').click();
				setTimeout(function() {
				stage_created = true;
				}, 2000); // 2000 milliseconds = 2 seconds

			}
		}
	});

});


function generate_stage_area(){
	var posted_data = {};
	posted_data['levels'] = {};
	$(".book-dropzone").each(function (index) {
        var svgs_code = $(this).find('.flowchart-links-layer').html();
        var stage_set = $(this).closest('.editor-zone').find('input[name="stage_set"]').val();
        if(svgs_code != ''){
            svgs_code = '<svg class="flowchart-links-layer">'+svgs_code+'</svg>';
        }
		var level_id = $(this).attr('data-level_id');
		posted_data['levels'][level_id] = {};

		posted_data['levels'][level_id]['background'] = $(this).attr('data-page_background');
        posted_data['levels'][level_id]['stage_set'] = stage_set;
        posted_data['levels'][level_id]['svgs_code'] = svgs_code;
        posted_data['levels'][level_id]['background_image'] = $(this).attr('data-background_image');
		posted_data['levels'][level_id]['height'] = $(this).attr('data-page_height');
		posted_data['levels'][level_id]['page_graph'] = $(this).attr('data-page_graph');
        posted_data['levels'][level_id]['item_path'] = $(this).attr('data-item_path');
        posted_data['levels'][level_id]['stage_name'] = $(this).attr('data-stage_name');


        posted_data['levels'][level_id]['skip_questions'] = $(this).attr('data-skip_questions');
        posted_data['levels'][level_id]['after_activity_show_answers'] = $(this).attr('data-after_activity_show_answers');
        posted_data['levels'][level_id]['activity_show_answers'] = $(this).attr('data-activity_show_answers');
        posted_data['levels'][level_id]['redemption_questions'] = $(this).attr('data-redemption_questions');
        posted_data['levels'][level_id]['play_music'] = $(this).attr('data-play_music');
        posted_data['levels'][level_id]['passing_scores'] = $(this).attr('data-passing_scores');
        posted_data['levels'][level_id]['shuffle_questions'] = $(this).attr('data-shuffle_questions');
		posted_data['levels'][level_id]['shuffle_answer_options'] = $(this).attr('data-shuffle_answer_options');


		$(this).find(".field_settings").each(function (index) {
			var fieldObj = $(this);
			var data_values = {};
			var field_style = field_position_top = field_position_left = '';
			var field_position = fieldObj.position();
			if (field_position != undefined && field_position != 'undefined') {
				var field_style = 'style="top:' + field_position.top + '%;left:' + field_position.left + '%;position: absolute;width: max-content;"';
				var field_position_top = field_position.top;
				var field_position_left = field_position.left;
			}

			var field_style = fieldObj.attr('style');
			var inner_style = fieldObj.attr('data-inner_style');

			var field_id = fieldObj.data('id');
			var field_type = fieldObj.data('field_type');
			var trigger_class = fieldObj.data('trigger_class');
			var is_new = fieldObj.attr('data-is_new');
			var item_type = fieldObj.attr('data-item_type');
			var item_path = fieldObj.attr('data-item_path');
			var unique_id = fieldObj.attr('data-unique_id');
			var item_title = fieldObj.attr('data-item_title');
            var field_postition = fieldObj.attr('data-field_postition');




			posted_data[field_id] = {};


			$(this).find(".data_style_field").each(function (index) {
				var style_id = $(this).attr('data-style_id');
				var style_value = $(this).attr('style');
				data_values[style_id] = style_value;
			});

			$(this).find(".data_html_field").each(function (index) {
				var html_id = $(this).attr('data-html_id');
				var html_value = $(this).html();
				data_values[html_id] = html_value;
			});


			$('.' + trigger_class).find(".trigger_field").each(function (index) {
				var triggerObj = $(this);

				var attr_id = triggerObj.data('field_id');
				var attr_value = fieldObj.attr('data-' + triggerObj.data('field_id'));
				data_values[attr_id] = attr_value;
			});

			posted_data[field_id]['level_id'] = level_id;
			posted_data[field_id]['field_type'] = field_type;
			posted_data[field_id]['field_style'] = field_style;
			posted_data[field_id]['data_values'] = data_values;
			posted_data[field_id]['item_type'] = item_type;
			posted_data[field_id]['item_path'] = item_path;
			posted_data[field_id]['inner_style'] = inner_style;
			posted_data[field_id]['unique_id'] = unique_id;
			posted_data[field_id]['item_title'] = item_title;
			posted_data[field_id]['is_new'] = is_new;
            posted_data[field_id]['field_postition'] = field_postition;

		});
	});

	console.log(posted_data);

	return posted_data;
}
