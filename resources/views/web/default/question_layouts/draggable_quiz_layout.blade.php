@php $hasImage = !empty(array_filter($elementObj->options, fn($options) => isset($options) && !empty($options->image)));
$has_image_class = ($hasImage == 1)? 'lms-radio-img' : '';
@endphp
@php $randomID = rand(0,9999); @endphp


<style>

    .question-line{font-size:18px;line-height:2.2}

    /* Input droppable fields */
    .droppable-field.input-simple.ui-droppable{
        width:110px;height:46px;display:inline-block;margin:0 6px;
        text-align:center;font-weight:700;background:#fff;color:#0f172a;
        border-left:none;border-right:none;border-top:none;border-radius:0;
        border-bottom:3px solid #334155;
    }
    .droppable-field.input-simple.ui-droppable.filled{
        border-bottom-color:#2563eb;color:#2563eb;
    }
    .droppable-field.input-simple.ui-droppable:focus,
    .droppable-field.input-simple.ui-droppable.drag-over{
        outline:none;border-bottom:3px dotted #2563eb !important;
    }
    .droppable-field.input-simple.ui-droppable.error{
        border-bottom-color:#dc2626 !important;color:#dc2626;
    }
</style>
@php

    $alphabets_array = array_combine(range(1, 26), range('A', 'Z'));
@endphp

<div class="draggable-element">
    <div id="question" class="question-line mb-2">
        {!! $content !!}
    </div>

    @if( !empty( $elementObj->options ))
        <div class="draggable-options">
            @php $counter = 1; @endphp
            @foreach( $elementObj->options as $option_index => $optionObj)
                @if( !isset( $optionObj->label ))
                    @php continue; @endphp
                @endif
                @php $data_key = isset($alphabets_array[$counter])? $alphabets_array[$counter] : 1; @endphp
                <button type="button" draggable="true" class="btn btn-outline-primary option-btn" data-key="{{$data_key}}" data-value="{{$optionObj->label}}">{{$data_key}} : {{$optionObj->label}}</button>
                @php $counter++; @endphp
            @endforeach
        </div>
    @endif
    <div id="msg" class="message"></div>
    <div class="mt-2 text-muted small">
        Keys: <kbd>A</kbd>–<kbd>J</kbd> • <kbd>Backspace</kbd> undo • <kbd>Enter</kbd> submit • Multi-use: fills one field per press
    </div>
</div>
<script>
    $(function(){

        var placementsByKey = {};

        function mode(){ return $('input[name="mode"]:checked').val(); }
        function fields(){ return $('.droppable-field.input-simple.ui-droppable'); }
        function options(){ return $('.option-btn'); }
        function firstEmpty(){ return fields().filter(function(){ return !$(this).hasClass('filled'); }).first(); }
        function getFieldByIndex(idx){ return fields().filter('[data-index="'+idx+'"]'); }


        function renderQuestion(n){
            var parts=[]; parts.push('I put the ');
            for(var i=0;i<n;i++){
                parts.push(inputHtml(i));
                if(i<n-1) parts.push(' on the ');
            }
            //parts.push('.'); $('#question').html(parts.join(''));
        }

        function inputHtml(i){
            var id=i+1;
            return '<input type="text" data-field_type="text" readonly class="droppable-field-'+i+' droppable-field input-simple ui-droppable" data-id="'+id+'" id="field-'+id+'" data-index="'+i+'" aria-label="blank '+id+'">';
        }

        function resetAll(){
            placementsByKey={};
            fields().removeClass('filled error drag-over').val('').removeData('key').removeData('btn');
            options().removeClass('disabled');
            $('#msg').text('');
        }

        function canPlaceKey(key){ return !(mode()==='single' && placementsByKey[key] && placementsByKey[key].length); }

        function placeIntoField(key, btn, field){
            if(!field || !field.length) return false;
            if(field.hasClass('filled')) return false;
            if(!canPlaceKey(key)) return false;

            field.removeClass('error').val(btn.data('value')).addClass('filled').data('key', key).data('btn', btn);
            var idx=parseInt(field.attr('data-index'),10);
            if(!placementsByKey[key]) placementsByKey[key]=[]; placementsByKey[key].push(idx);
            if(mode()==='single') btn.addClass('disabled'); $('#msg').text(''); return true;
        }

        function removeLastOfKey(key){
            if(!placementsByKey[key] || !placementsByKey[key].length) return;

            var idx=placementsByKey[key].pop();
            var field=getFieldByIndex(idx); var btn=field.data('btn');
            field.val('').removeClass('filled error').removeData('key').removeData('btn');
            if(mode()==='single' && btn) btn.removeClass('disabled');
            if(placementsByKey[key].length===0) delete placementsByKey[key];
        }

        function handleKeyPress(key){
            var btn = options().filter('[data-key="' + key + '"]');
            if(!btn.length) return;
            if(mode()==='single'){
                console.log('sdfsdf');
                if(placementsByKey[key] && placementsByKey[key].length) removeLastOfKey(key);
                else placeIntoField(key, btn, firstEmpty());
                return;
            }
            // Multi-use: fill one field per press
            placeIntoField(key, btn, firstEmpty());
        }

        function removeLastFilled(){
            var last=fields().filter('.filled').last(); if(!last.length) return;
            var key=last.data('key'); var idx=parseInt(last.attr('data-index'),10); var btn=last.data('btn');
            if(key && placementsByKey[key]){ placementsByKey[key]=placementsByKey[key].filter(i=>i!==idx); if(!placementsByKey[key].length) delete placementsByKey[key]; }
            last.val('').removeClass('filled error').removeData('key').removeData('btn');
            if(mode()==='single' && btn) btn.removeClass('disabled');
        }

        function submitAttempt(){
            fields().removeClass('error');
            var missing=fields().filter(function(){ return !$(this).hasClass('filled'); });
            if(missing.length){ missing.addClass('error'); $('#msg').text('Please fill all fields before submitting.'); return; }
            alert('Submitted: '+fields().map(function(){ return $(this).val(); }).get().join(', '));
        }

        /* Init */
        renderQuestion(parseInt($('#fieldCount').val(),10));

        $('#fieldCount').on('change', function(){
            renderQuestion(parseInt(this.value,10)); resetAll();
        });

        // Click option = keyboard logic
        $(document).on('click','.option-btn', function(){ handleKeyPress($(this).data('key')); });

        $(document).on('keydown', function(e){
            var key=(e.key||'').toUpperCase();
            if(e.key==='Backspace'){ e.preventDefault(); removeLastFilled(); return; }
            if(e.key==='Enter'){ e.preventDefault(); submitAttempt(); return; }
            if(key.length===1 && key>='A' && key<='J'){ handleKeyPress(key); }
        });

        // Drag & drop
        $(document).on('dragstart','.option-btn', function(e){ e.originalEvent.dataTransfer.setData('key',$(this).data('key')); });
        $(document).on('dragover','.ui-droppable', function(e){ e.preventDefault(); $(this).addClass('drag-over').focus(); });
        $(document).on('dragleave','.ui-droppable', function(){ $(this).removeClass('drag-over'); });
        $(document).on('drop','.ui-droppable', function(e){ e.preventDefault(); $(this).removeClass('drag-over'); var key=e.originalEvent.dataTransfer.getData('key'); placeIntoField(key, options().filter('[data-key="'+key+'"]'), $(this)); });

        // Click field clears itself
        $(document).on('click','.ui-droppable', function(){
            if(!$(this).hasClass('filled')) return;
            var key=$(this).data('key'); var idx=parseInt($(this).attr('data-index'),10); var btn=$(this).data('btn');
            if(key && placementsByKey[key]){ placementsByKey[key]=placementsByKey[key].filter(i=>i!==idx); if(!placementsByKey[key].length) delete placementsByKey[key]; }
            $(this).val('').removeClass('filled error').removeData('key').removeData('btn');
            if(mode()==='single' && btn) btn.removeClass('disabled');
        });

        // Mode switch: recompute disabled state (single-use)
        $('input[name="mode"]').on('change', function(){
            options().removeClass('disabled');
            if(mode()==='single'){
                Object.keys(placementsByKey).forEach(function(k){
                    if(placementsByKey[k] && placementsByKey[k].length) options().filter('[data-key="'+k+'"]').addClass('disabled');
                });
            }
        });
    });
</script>
