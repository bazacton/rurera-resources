

<div id="toolModal" class="modal-fullscreen-xl rurera_interactive_elements flexible-table-builder modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content edit-quest-modal-div">
            <div class="modal-header" style="border-bottom:1px solid #ececf1;">
                <h5 class="modal-title">Flexible Table Builder</h5>
                <a href="javascript:;" class="btn btn-primary insert-flexible-table-builder" data-insert_id="-1">Insert</a>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"  style="height: calc(100vh - 56px); overflow:auto;">




                <!-- Modal -->





            </div>
        </div>
    </div>
</div>
<script>

    $(document).on('click', '.insert-flexible-table-builder', function () {
        const svg = downloadSVG();
        console.log(svg);
        const json = ($("#flexibleTableBuilderJsonBox").val() || "").trim() || JSON.stringify(buildSaveObject(), null, 2);
        var insert_id = $(this).attr('data-insert_id');
        if(insert_id > 0) {
            console.log(typeof rureraform_form_elements);

            let elements = rureraform_form_elements;

            if (typeof elements === 'string') {
                elements = JSON.parse(elements);
            }

            const current_element = elements.find(
                el => Number(el.id) === Number(insert_id)
            );


            $('.rureraform-admin-popup.active [name="rureraform-content"]').html(svg);
            $('.rureraform-admin-popup.active [name="rureraform-json_code"]').val(json);

        }else {

            var editor_data = '<div id="rureraform-element-5" class="rureraform-element-5 rureraform-element quiz-group rureraform-element-html" data-type="question_label">' + svg + '</div>';

            var image_styles = [];


            jQuery(".image-field-box").each(function () {
                var element_id = $(this).attr('id');
                var styleAttr = $(this).attr('style');
                image_styles[element_id] = styleAttr;
            });

            jQuery(".image-field img").each(function () {
                var image_field_id = $(this).attr('data-id');
                var styleAttr = $(this).attr('style');
                //image_styles[image_field_id] = styleAttr;
            });

            var type = jQuery(this).parent().attr("data-type");

            console.log('daata-type-----' + type);

            if (typeof type == undefined || type == "")
                return false;
            var columns = 2;
            var template_name = '';
            if (rureraform_meta.hasOwnProperty(type)) {
                rureraform_form_last_id++;
                var element = {
                    "type": type,
                    "resize": "both",
                    "height": "auto",
                    "_parent": rureraform_form_page_active,
                    "_parent-col": 0,
                    "_seq": rureraform_form_last_id,
                    "id": rureraform_form_last_id
                };
                if (type == "columns") {
                    columns = parseInt(jQuery(this).parent().attr("data-option"), 10);
                    if (columns != 1 && columns != 2 && columns != 3 && columns != 4 && columns != 6)
                        columns = 2;
                    element['_cols'] = columns;
                }
                if (type == "question_templates") {
                    template_name = jQuery(this).parent().attr("data-option");
                    template_names = jQuery(this).parent().attr("data-elements");
                    var template_names = template_names.split(',').map(tag => tag.trim()).filter(tag => tag.length > 0);
                    template_names.forEach(function (templateName) {
                        console.log(templateName);
                        if (jQuery('.rureraform-toolbar-tool-other[data-type="' + templateName + '"] a').length > 0) {
                            jQuery('.rureraform-toolbar-tool-other[data-type="' + templateName + '"] a').click();
                        } else if (jQuery('.rureraform-toolbar-tool-input[data-type="' + templateName + '"] a').length > 0) {
                            jQuery('.rureraform-toolbar-tool-input[data-type="' + templateName + '"] a').click();
                        }
                    });
                    //jQuery('.rureraform-toolbar-tool-other[data-type="'+template_name+'"] a').click();

                    //$(".rureraform-elements").append('<div id="rureraform-element-0" class="rureraform-element-0 rureraform-element quiz-group rureraform-element-html" data-type="question_label"><div class="question-label"><span>Question Label</span></div></div>');

                    return false;
                }
                for (var key in rureraform_meta[type]) {
                    if (rureraform_meta[type].hasOwnProperty(key)) {

                        switch (rureraform_meta[type][key]['type']) {
                            case 'column-width':
                                for (var i = 0; i < columns; i++) {
                                    element[key + "-" + i] = parseInt(12 / columns, 10);
                                }
                                break;

                            default:
                                if (rureraform_meta[type][key].hasOwnProperty('value')) {
                                    if (typeof rureraform_meta[type][key]['value'] == 'object') {
                                        for (var option_key in rureraform_meta[type][key]['value']) {
                                            if (rureraform_meta[type][key]['value'].hasOwnProperty(option_key)) {
                                                element[key + "-" + option_key] = rureraform_meta[type][key]['value'][option_key];
                                            }
                                        }
                                    } else
                                        element[key] = rureraform_meta[type][key]['value'];
                                } else if (rureraform_meta[type][key].hasOwnProperty('values'))
                                    element[key] = rureraform_meta[type][key]['values'];
                                break;
                        }
                    }
                }

                rureraform_form_elements.push(element);
                rureraform_form_changed = true;
                rureraform_build(image_styles);
                if (rureraform_gettingstarted_enable == "on" && rureraform_form_elements.length <= 2)
                    rureraform_gettingstarted("element-properties", 0);
            }

            //$(".rureraform-form").append(editor_data);

            $('.rureraform-toolbar-tool-other[data-type="flexible_table_builder"] a').click();
            var current_element = $(".flexible_table_builder_element").last().attr('data-index_i');

            console.log(svg);
            rureraform_form_elements[current_element]["content"] = svg;
            rureraform_form_elements[current_element]["json_code"] = json;

            $(".flexible_table_builder_element").last().html(svg);
        }

        $(".flexible-table-builder").modal('hide');
        console.log(svg);
    });

</script>
