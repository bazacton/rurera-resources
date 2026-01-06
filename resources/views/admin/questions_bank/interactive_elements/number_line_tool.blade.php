<style>
    :root{ --bg:#f6f7fb; --panel:#fff; --border:#e5e7eb; --muted:#6b7280; }

    .modal.modal-fullscreen .modal-dialog{ max-width:100vw; width:100vw; height:100vh; margin:0; }
    .modal.modal-fullscreen .modal-content{ height:100vh; border-radius:0; border:0; }
    .modal.modal-fullscreen .modal-body{ padding:0; height:calc(100vh - 56px); overflow:hidden; }
    #nlModal .layout{ display:flex; height:100%; min-height:0; }
    #nlModal .sidebar{ width:360px; max-width:360px; border-right:1px solid var(--border); background:var(--panel); padding:16px; overflow:auto; }
    #nlModal .main{ flex:1; background:var(--bg); padding:18px; overflow:auto; display:flex; justify-content:center; align-items:flex-start; }
    #nlModal .stage{ margin-top:4px; }
    #nlModal .stage-box{ border:2px dotted #cbd5e1; border-radius:14px; background:#fff; padding:10px; margin:0 auto; }
    #nlModal #svgWrap{ text-align:center; overflow:hidden; }
    #nlModal #numberLine{ display:inline-block; width:600px; height:auto; }
    #nlModal .field-label{ font-weight:700; margin-bottom:.35rem; }
    #nlModal .help{ color:var(--muted); font-size:.86rem; }
    #nlModal .section-title{ font-size:.78rem; letter-spacing:.08em; color:var(--muted); font-weight:900; text-transform:uppercase; margin-top:12px; }
    #nlModal .color-row{ display:flex; align-items:center; justify-content:space-between; gap:10px; padding:8px 10px; border:1px solid var(--border); border-radius:12px; }
    #nlModal input[type="color"]{ width:42px; height:32px; border:none; background:transparent; padding:0; }
    #nlModal .point-toggle{ display:flex; align-items:center; gap:10px; padding:8px 12px; border:1px solid var(--border); border-radius:12px; }
    .point-toggle input{ width:18px; height:18px; }
    #nlModal .points-grid{ display:grid; grid-template-columns:1fr 1fr; gap:10px; }
    #nlModal .slider-row{ display:flex; align-items:center; gap:10px; }
    #nlModal .slider-row .name{ width:22px; font-weight:900; }
    #nlModal .slider-row .val{ width:150px; text-align:right; color:var(--muted); font-weight:700; font-variant-numeric:tabular-nums; }
    #nlModal textarea{ font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace; }
</style>

<div id="nlModal" class="modal-fullscreen-xl rurera_interactive_elements number-line-tool modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content edit-quest-modal-div">
            <div class="modal-header" style="border-bottom:1px solid #ececf1;">
                <h5 class="modal-title">Number Line Tool</h5>
                <a href="javascript:;" class="btn btn-primary insert-number-line-tool" data-insert_id="-1">Insert</a>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"  style="height: calc(100vh - 56px); overflow:auto;">




                <!-- Modal -->

                <div class="layout">
                    <!-- Sidebar -->
                    <div class="sidebar">
                        <div class="section-title mt-0">Stage</div>
                        <div class="form-group mb-3">
                            <label class="field-label">Stage size</label>
                            <input id="stageSize" type="range" class="custom-range" min="400" max="1000" step="10" value="600">
                            <div class="help"><span id="stageSizeOut">600</span> px</div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-4">
                                <label class="field-label">Least</label>
                                <input id="minVal" type="number" class="form-control" value="-5" step="0.5">
                            </div>
                            <div class="form-group col-4">
                                <label class="field-label">Greatest</label>
                                <input id="maxVal" type="number" class="form-control" value="5" step="0.5">
                            </div>
                            <div class="form-group col-4">
                                <label class="field-label">Unit</label>
                                <input id="unitVal" type="text" class="form-control" value="°C">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-6">
                                <label class="field-label">Unit display</label>
                                <select id="unitDisplay" class="custom-select">
                                    <option value="axis" selected>Once only</option>
                                    <option value="compact">Every label (9°C)</option>
                                    <option value="spaced">Every label (9 °C)</option>
                                    <option value="none">Hide</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label class="field-label">Label position</label>
                                <select id="labelPos" class="custom-select">
                                    <option value="bottom" selected>Below</option>
                                    <option value="top">Above</option>
                                </select>
                            </div>
                        </div>
                        <div class="section-title">Markings & labels</div>

                        <div class="form-group">
                            <label class="field-label mb-1">Division between major markings</label>
                            <input id="division" type="range" class="custom-range" min="0" max="4" step="1" value="1">
                            <div class="help">0 → 0.5 &nbsp;|&nbsp; 1 → 1 &nbsp;|&nbsp; 2 → 2 &nbsp;|&nbsp; 3 → 5 &nbsp;|&nbsp; 4 → 10</div>
                            <div class="help">Locked values: <b>0.5, 1, 2, 5, 10</b></div>
                        </div>

                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="halfMarks" checked>
                            <label class="custom-control-label" for="halfMarks">Show 0.5 markings</label>
                        </div>

                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="labelHalf">
                            <label class="custom-control-label" for="labelHalf">Label 0.5 markings too</label>
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="showArrows">
                            <label class="custom-control-label" for="showArrows">Show start/end arrows</label>
                        </div>

                        <div class="form-group">
                            <label class="field-label">Numbers on line</label>
                            <select id="labelMode" class="custom-select">
                                <option value="all" selected>Show all</option>
                                <option value="none">Hide all</option>
                                <option value="ends">Ends only</option>
                                <option value="nth">Every Nth major mark</option>
                                <option value="custom">Custom values</option>
                            </select>
                        </div>

                        <div class="form-group" id="nthWrap">
                            <label class="field-label">N (label every Nth)</label>
                            <input id="labelNth" type="number" class="form-control" value="2" min="1" step="1">
                        </div>

                        <div class="form-group" id="customWrap" style="display:none;">
                            <label class="field-label">Custom values to keep (comma-separated)</label>
                            <input id="customValues" type="text" class="form-control" placeholder="-10,-5,0,5 or 0.5,2.25,-3.5">
                            <div class="help">In Custom mode, only these values show (end labels hidden).</div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-6">
                                <label class="field-label">Value style</label>
                                <select id="valueStyle" class="custom-select">
                                    <option value="decimal" selected>Decimal</option>
                                    <option value="fraction">Fraction</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label class="field-label">Label position</label>
                                <select id="labelPos" class="custom-select">
                                    <option value="bottom" selected>Below</option>
                                    <option value="top">Above</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-6">
                                <label class="field-label">Font size</label>
                                <input id="fontSize" type="range" class="custom-range" min="8" max="48" step="1" value="16">
                                <div class="help"><span id="fontSizeOut">16</span> px</div>
                            </div>
                            <div class="form-group col-6">
                                <label class="field-label">Line thickness</label>
                                <input id="lineThickness" type="range" class="custom-range" min="1" max="10" step="1" value="2">
                                <div class="help"><span id="lineThicknessOut">2</span> px</div>
                            </div>
                        </div>


                        <div class="section-title">Colours</div>
                        <div class="form-row mb-2">
                            <div class="form-group col-3">
                                <label class="field-label">Main</label>
                                <input type="color" id="colorMain" value="#000000" class="form-control p-0" style="height:38px;">
                            </div>
                            <div class="form-group col-3">
                                <label class="field-label">Minor</label>
                                <input type="color" id="colorMinor" value="#707070" class="form-control p-0" style="height:38px;">
                            </div>
                            <div class="form-group col-3">
                                <label class="field-label">Numbers</label>
                                <input type="color" id="colorText" value="#000000" class="form-control p-0" style="height:38px;">
                            </div>
                            <div class="form-group col-3">
                                <label class="field-label">Points</label>
                                <input type="color" id="colorPoints" value="#000000" class="form-control p-0" style="height:38px;">
                            </div>
                        </div>

                        <div class="section-title">Points</div>
                        <div class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" id="markPoints">
                            <label class="custom-control-label" for="markPoints">Mark points</label>
                        </div>

                        <div id="pointsPanel" style="display:none;">
                            <div class="points-grid mb-3">
                                <label class="point-toggle mb-0"><input type="checkbox" id="showA" checked> <strong>A</strong></label>
                                <label class="point-toggle mb-0"><input type="checkbox" id="showB" checked> <strong>B</strong></label>
                                <label class="point-toggle mb-0"><input type="checkbox" id="showC" checked> <strong>C</strong></label>
                                <label class="point-toggle mb-0"><input type="checkbox" id="showD" checked> <strong>D</strong></label>
                            </div>

                            <div id="sliderA" class="slider-row mb-2">
                                <div class="name">A</div>
                                <input id="pA" type="range" class="custom-range" min="-10" max="10" step="0.5" value="-9">
                                <div class="val" id="outA">A = -9</div>
                            </div>
                            <div id="sliderB" class="slider-row mb-2">
                                <div class="name">B</div>
                                <input id="pB" type="range" class="custom-range" min="-10" max="10" step="0.5" value="-6">
                                <div class="val" id="outB">B = -6</div>
                            </div>
                            <div id="sliderC" class="slider-row mb-2">
                                <div class="name">C</div>
                                <input id="pC" type="range" class="custom-range" min="-10" max="10" step="0.5" value="2">
                                <div class="val" id="outC">C = 2</div>
                            </div>
                            <div id="sliderD" class="slider-row">
                                <div class="name">D</div>
                                <input id="pD" type="range" class="custom-range" min="-10" max="10" step="0.5" value="6">
                                <div class="val" id="outD">D = 6</div>
                            </div>
                        </div>

                        <div class="section-title">Export</div>
                        <button class="btn btn-outline-primary btn-sm w-100 mb-2" id="saveSvgBtn">Download SVG</button>

                        <div class="section-title">JSON</div>
                        <textarea id="numberLineToolJsonBox" class="form-control" rows="6" placeholder='{"min":-10,"max":10,"division":1}'></textarea>
                        <div class="d-flex mt-2" style="gap:10px;">
                            <button class="btn btn-secondary btn-sm flex-fill applyJsonBtn" id="applyJsonBtn">Apply JSON</button>
                            <button class="btn btn-secondary btn-sm flex-fill" id="getJsonBtn">Get JSON</button>
                        </div>
                    </div>

                    <!-- Main / Preview -->
                    <div class="main">
                        <div class="stage">
                            <div class="stage-box" id="stageBox">
                                <div id="svgWrap">
                                    <svg id="numberLine" viewBox="0 0 1100 240" preserveAspectRatio="xMidYMid meet"></svg>
                                </div>
                            </div>
                            <div class="help text-center mt-2">Preview</div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
</div>




<script>
    (function(){
        const svg = document.getElementById('numberLine');

        const $min = $('#minVal'), $max = $('#maxVal'), $unit = $('#unitVal'), $unitDisplay = $('#unitDisplay');
        const $division = $('#division');
        const $half = $('#halfMarks'), $labelHalf = $('#labelHalf'), $showArrows = $('#showArrows');
        const $labelMode = $('#labelMode'), $labelNth = $('#labelNth'), $customValues = $('#customValues');
        const $nthWrap = $('#nthWrap'), $customWrap = $('#customWrap');
        const $valueStyle = $('#valueStyle'), $labelPos = $('#labelPos');
        const $fontSize = $('#fontSize'), $fontSizeOut = $('#fontSizeOut');
        const $lineThickness = $('#lineThickness'), $lineThicknessOut = $('#lineThicknessOut');
        const $colorMain = $('#colorMain'), $colorMinor = $('#colorMinor'), $colorText = $('#colorText'), $colorPoints = $('#colorPoints');
        const $mark = $('#markPoints'), $pointsPanel = $('#pointsPanel');

        const pointIds = ['A','B','C','D'];
        const pointInputs = { A: $('#pA'), B: $('#pB'), C: $('#pC'), D: $('#pD') };
        const pointOuts   = { A: $('#outA'), B: $('#outB'), C: $('#outC'), D: $('#outD') };
        const showChecks  = { A: $('#showA'), B: $('#showB'), C: $('#showC'), D: $('#showD') };
        const sliderRows  = { A: $('#sliderA'), B: $('#sliderB'), C: $('#sliderC'), D: $('#sliderD') };

        function clamp(n,a,b){ return Math.max(a, Math.min(b,n)); }
        function parseNum(v){ const n = Number(v); return Number.isFinite(n) ? n : 0; }
        function gcd(a,b){ a=Math.abs(a); b=Math.abs(b); while(b){ const t=a%b; a=b; b=t; } return a||1; }

        // fraction approximation for nice classroom decimals
        function toFraction(x, maxDen=1000){
            if (!Number.isFinite(x)) return {n:0,d:1};
            if (Math.abs(x) < 1e-12) return {n:0,d:1};
            const sign = x < 0 ? -1 : 1;
            x = Math.abs(x);
            let h1=1,h0=0,k1=0,k0=1;
            let b=x;
            for(let i=0;i<24;i++){
                const a=Math.floor(b);
                const h2=a*h1+h0, k2=a*k1+k0;
                if(k2>maxDen){
                    const t=Math.floor((maxDen-k0)/k1);
                    return {n:sign*(t*h1+h0), d:(t*k1+k0)};
                }
                const approx=h2/k2;
                if(Math.abs(approx-x)<1e-12) return {n:sign*h2,d:k2};
                h0=h1; h1=h2; k0=k1; k1=k2;
                const frac=b-a;
                if(frac<1e-12) break;
                b=1/frac;
            }
            return {n:sign*h1,d:k1};
        }

        function fmtFraction(v){
            const f = toFraction(v,1000);
            let n=f.n, d=f.d;
            const g=gcd(n,d); n/=g; d/=g;
            const sign = n<0?-1:1; n=Math.abs(n);
            const w=Math.floor(n/d), r=n%d;
            let out='';
            if(w===0 && r===0) out='0';
            else if(r===0) out=String(w);
            else if(w===0) out=r+'/'+d;
            else out=w+' '+r+'/'+d;
            if(sign<0 && out!=='0') out='-'+out;
            return out;
        }

        function fmtDecimal(v){
            const isInt = Math.abs(v - Math.round(v)) < 1e-10;
            return isInt ? String(Math.round(v)) : String(Number(v.toFixed(6)));
        }

        function formatValue(v){
            const style = $valueStyle.val();
            const unit = String($unit.val()||'').trim();
            const unitMode = $unitDisplay.val(); // axis|compact|spaced|none
            const base = (style === 'fraction') ? fmtFraction(v) : fmtDecimal(v);

            if(!unit || unitMode === 'none' || unitMode === 'axis') return base;

            // compact = 9°C, spaced = 9 °C
            return unitMode === 'compact' ? (base + unit) : (base + ' ' + unit);
        }

        function normalizeDivision(){
            // Division slider stores an index 0..4 which maps to 0.5, 1, 2, 5, 10
            const map = [0.5, 1, 2, 5, 10];
            const idxRaw = parseNum($division.val());
            const idx = Math.max(0, Math.min(map.length - 1, Math.round(idxRaw)));
            $division.val(String(idx)); // keep slider in-range
            return map[idx];
        }

        function updateRanges(){
            let minV=parseNum($min.val()), maxV=parseNum($max.val());
            if(minV===maxV){ maxV=minV+1; $max.val(maxV); }
            if(minV>maxV){ const t=minV; minV=maxV; maxV=t; $min.val(minV); $max.val(maxV); }

            const step = $half.is(':checked') ? 0.5 : 1;
            $min.attr('step', step);
            $max.attr('step', step);

            pointIds.forEach(id=>{
                const $p = pointInputs[id];
                $p.attr('min', minV);
                $p.attr('max', maxV);
                $p.attr('step', step);
                $p.val(clamp(parseNum($p.val()), minV, maxV));
            });

            $('#stageSizeOut').text(parseInt($('#stageSize').val()||'600',10));
            $fontSizeOut.text(parseInt($fontSize.val()||'16',10));
            $lineThicknessOut.text(parseInt($lineThickness.val()||'4',10));

            const mode = $labelMode.val();
            $nthWrap.toggle(mode==='nth');
            $customWrap.toggle(mode==='custom');

            $labelHalf.prop('disabled', !$half.is(':checked'));
            if(!$half.is(':checked')) $labelHalf.prop('checked', false);
        }

        function approxTextWidth(text, fontSizePx){
            // Simple width estimate (good enough for collision avoidance)
            return String(text).length * fontSizePx * 0.62;
        }

        function createSvgEl(tag, attrs){
            const el = document.createElementNS('http://www.w3.org/2000/svg', tag);
            if(attrs) Object.keys(attrs).forEach(k=>el.setAttribute(k, attrs[k]));
            return el;
        }

        function parseCustomSet(){
            const raw = String($customValues.val()||'');
            const parts = raw.split(',').map(s=>s.trim()).filter(Boolean);
            const arr = [];
            parts.forEach(p=>{
                const n = Number(p);
                if(Number.isFinite(n)) arr.push(n);
            });
            return arr;
        }
        function inCustom(v, arr){
            for(const n of arr){ if(Math.abs(n-v) < 1e-9) return true; }
            return false;
        }

        function shouldLabel(kind, majorIndex, v, isEnd, customArr){
            const mode = $labelMode.val();
            if(mode==='none') return false;
            if(kind==='minor' && !$labelHalf.is(':checked')) return false;

            if(mode==='all') return true;
            if(mode==='ends') return isEnd;
            if(mode==='nth'){
                const n = Math.max(1, parseInt($labelNth.val()||'1',10));
                return (kind==='major') && ((majorIndex % n === 0) || isEnd);
            }
            if(mode==='custom'){
                // only custom values (no ends)
                return inCustom(v, customArr);
            }
            return true;
        }

        function draw(){
            updateRanges();

            const minV=parseNum($min.val()), maxV=parseNum($max.val());
            const div = normalizeDivision(); // locked
            const showHalf = $half.is(':checked');
            const arrows = $showArrows.is(':checked');

            const stageW = parseInt($('#stageSize').val()||'600',10);
            const stageBox = document.getElementById('stageBox');
            if(stageBox){ stageBox.style.width = stageW + 'px'; }

            const svgEl = document.getElementById('numberLine');
            svgEl.style.width = stageW + 'px';
            svgEl.style.height = 'auto';

            const mainColor=$colorMain.val();
            const minorColor=$colorMinor.val();
            const textColor=$colorText.val();
            const pointColor=$colorPoints.val();
            const fontSize=parseInt($fontSize.val()||'16',10);

            const labelPosition=$labelPos.val(); // top/bottom

            const W=1100, H=240;
            const pad = 150;
            const x1=pad, x2=W-pad;
            // When arrows are enabled, keep ticks/labels inside the arrowheads (like textbook number lines)
            const arrowGap = arrows ? 55 : 0;
            const innerX1 = x1 + arrowGap;
            const innerX2 = x2 - arrowGap;
            const y = (labelPosition==='top') ? 140 : 100;
            const labelY = (labelPosition==='top') ? (y - 26) : (y + 40);

            const tickMajor = 18;
            const tickMinor = 12;

            while(svg.firstChild) svg.removeChild(svg.firstChild);

            if(arrows){
                const defs = createSvgEl('defs');

                // Right-pointing arrow for the end
                const endM = createSvgEl('marker', {id:'arrowEnd', markerWidth:'10', markerHeight:'10', refX:'9', refY:'5', orient:'auto', markerUnits:'strokeWidth'});
                endM.appendChild(createSvgEl('path', {d:'M 0 0 L 10 5 L 0 10 z', fill:mainColor}));
                defs.appendChild(endM);

                // Left-pointing arrow for the start
                const startM = createSvgEl('marker', {id:'arrowStart', markerWidth:'10', markerHeight:'10', refX:'1', refY:'5', orient:'auto', markerUnits:'strokeWidth'});
                startM.appendChild(createSvgEl('path', {d:'M 10 0 L 0 5 L 10 10 z', fill:mainColor}));
                defs.appendChild(startM);

                svg.appendChild(defs);
            }

            const thick = parseInt($lineThickness.val()||'2',10);
            const lineAttrs = {x1:x1,y1:y,x2:x2,y2:y,stroke:mainColor,'stroke-width':String(thick),'stroke-linecap':'round'};
            if(arrows){ lineAttrs['marker-start']='url(#arrowStart)'; lineAttrs['marker-end']='url(#arrowEnd)'; }
            svg.appendChild(createSvgEl('line', lineAttrs));

            function xOf(v){
                const t=(v-minV)/(maxV-minV);
                return innerX1 + t*(innerX2-innerX1);
            }

            const customArr = parseCustomSet();
            let majorIndex=0;

            // Tick generation:
            // Major ticks at multiples of div within [min,max]
            // Minor (if enabled) at div/2 offsets between majors (but not duplicating majors)
            const eps=1e-9;

            // helper to start at first tick >= min
            function firstTick(step){
                return Math.ceil((minV - eps)/step)*step;
            }

            const majorStep = div;
            const minorStep = div/2;

            // Build a set of tick positions to avoid duplicates
            const ticks = [];

            // majors
            for(let v=firstTick(majorStep); v<=maxV+eps; v+=majorStep){
                // snap tiny -0 to 0
                if(Math.abs(v) < 1e-10) v = 0;
                ticks.push({v, kind:'major'});
            }
            // minors
            if(showHalf){
                for(let v=firstTick(minorStep); v<=maxV+eps; v+=minorStep){
                    // skip if it's (close to) a major
                    const isMajor = Math.abs((v/majorStep) - Math.round(v/majorStep)) < 1e-6;
                    if(isMajor) continue;
                    if(Math.abs(v) < 1e-10) v = 0;
                    ticks.push({v, kind:'minor'});
                }
            }
            // Sort by value
            ticks.sort((a,b)=>a.v-b.v);

            // Draw ticks + labels
            let lastLabelX = null;
            let lastLabelW = 0;
            ticks.forEach(tk=>{
                const v=tk.v, kind=tk.kind;
                const xx=xOf(v);

                const isEnd = (Math.abs(v-minV)<1e-6) || (Math.abs(v-maxV)<1e-6);

                svg.appendChild(createSvgEl('line',{
                    x1:xx, y1:y-(kind==='major'?tickMajor:tickMinor),
                    x2:xx, y2:y+(kind==='major'?tickMajor:tickMinor),
                    stroke: (kind==='major'?mainColor:minorColor),
                    'stroke-width': String(kind==='major' ? Math.max(1, thick) : Math.max(1, thick-1)),
                    'stroke-linecap':'round'
                }));

                if(shouldLabel(kind, majorIndex, v, isEnd, customArr)){
                    const labelText = formatValue(v);

                    // Collision control: stagger labels to a second row if needed
                    const wEst = approxTextWidth(labelText, fontSize);
                    const padX = 6;
                    let yUse = labelY;

                    if(typeof lastLabelX === 'number'){
                        const minGap = (wEst/2) + (lastLabelW/2) + padX;
                        if(Math.abs(xx - lastLabelX) < minGap){
                            // stagger
                            const rowShift = Math.round(fontSize * 1.25);
                            yUse = (labelPosition==='top') ? (labelY - rowShift) : (labelY + rowShift);
                        }
                    }

                    const txt=createSvgEl('text',{
                        x:xx, y:yUse, 'text-anchor':'middle',
                        'font-size':String(fontSize),
                        'font-family':'Arial, sans-serif',
                        fill:textColor, 'font-weight':'700'
                    });
                    txt.textContent = labelText;
                    svg.appendChild(txt);

                    // track for next collision check (use original row y doesn't matter)
                    lastLabelX = xx;
                    lastLabelW = wEst;
                }

                if(kind==='major') majorIndex++;
            });

            // Axis unit label (shown once)
            const unitMode = $unitDisplay.val();
            const unitTxt = String($unit.val()||'').trim();
            if(unitMode === 'axis' && unitTxt){
                const ax = Math.min(W-10, x2 + 18);
                const ay = (labelPosition==='top') ? (labelY - Math.round(fontSize*0.2)) : (labelY + Math.round(fontSize*0.2));
                const t = createSvgEl('text',{
                    x: ax, y: ay, 'text-anchor':'start',
                    'font-size':String(fontSize),
                    'font-family':'Arial, sans-serif',
                    fill:textColor, 'font-weight':'700'
                });
                t.textContent = unitTxt;
                svg.appendChild(t);
            }

            // Points UI
            pointIds.forEach(id=>{
                sliderRows[id].toggle(showChecks[id].is(':checked'));
                const pv=parseNum(pointInputs[id].val());
                pointOuts[id].text(id + ' = ' + formatValue(pv));
            });

            if($mark.is(':checked')){
                const pointsAbove = (labelPosition !== 'top'); // keep away from top labels
                let stagger=0;

                pointIds.forEach(id=>{
                    if(!showChecks[id].is(':checked')) return;
                    let pv=parseNum(pointInputs[id].val());
                    pv = clamp(pv, minV, maxV);
                    const px=xOf(pv);

                    // X marker exactly on line
                    svg.appendChild(createSvgEl('line',{x1:px-8,y1:y-8,x2:px+8,y2:y+8,stroke:pointColor,'stroke-width':'4','stroke-linecap':'round'}));
                    svg.appendChild(createSvgEl('line',{x1:px-8,y1:y+8,x2:px+8,y2:y-8,stroke:pointColor,'stroke-width':'4','stroke-linecap':'round'}));

                    const bubbleY = pointsAbove ? (y - 56 - stagger*2) : (y + 58 + stagger*2);
                    stagger++;

                    const g=createSvgEl('g');
                    g.appendChild(createSvgEl('rect',{x:px-16,y:bubbleY-26,width:32,height:30,rx:10,ry:10,fill:'#fff',stroke:pointColor,'stroke-width':'3'}));
                    const t=createSvgEl('text',{x:px,y:bubbleY-5,'text-anchor':'middle','font-size':'18','font-family':'Arial, sans-serif',fill:pointColor,'font-weight':'800'});
                    t.textContent=id;
                    g.appendChild(t);
                    svg.appendChild(g);
                });
            }
        }

        $(document).on('click', '.insert-number-line-tool', function () {
            const svg = downloadNumberLineSVG();
            console.log(svg);
            const json = ($("#numberLineToolJsonBox").val() || "").trim() || JSON.stringify(buildSaveObject(), null, 2);
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

                console.log('test');
                console.log(svg);


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

                $('.rureraform-toolbar-tool-other[data-type="number_line_tool"] a').click();
                var current_element = $(".number_line_tool_element").last().attr('data-index_i');

                console.log(svg);
                rureraform_form_elements[current_element]["content"] = svg;
                rureraform_form_elements[current_element]["json_code"] = json;

                $(".number_line_tool_element").last().html(svg);
            }

            $(".number-line-tool").modal('hide');
            console.log(svg);
        });

        function downloadNumberLineSVG(){
            draw();
            var svgString = new XMLSerializer().serializeToString(svg);

            return svgString;
            console.log('svgsss---');
            console.log(svgString);

            const clone = svg.cloneNode(true);
            return svg;
            return clone;
            clone.setAttribute('xmlns','http://www.w3.org/2000/svg');
            clone.setAttribute('width','1100');
            clone.setAttribute('height','240');
            const s = new XMLSerializer().serializeToString(clone);
            const blob = new Blob([s], {type:'image/svg+xml;charset=utf-8'});
            const a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = 'number-line.svg';
            document.body.appendChild(a);
            a.click();
            a.remove();
        }

        function getState(){
            return {
                min: parseNum($min.val()),
                max: parseNum($max.val()),
                unit: String($unit.val()||'').trim(),
                stageSize: parseInt($('#stageSize').val()||'600',10),
                division: normalizeDivision(),
                showHalfMarks: $half.is(':checked'),
                labelHalfMarks: $labelHalf.is(':checked'),
                showArrows: $showArrows.is(':checked'),
                labelMode: $labelMode.val(),
                labelNth: parseInt($labelNth.val()||'2',10),
                customValues: String($customValues.val()||''),
                valueStyle: $valueStyle.val(),
                labelPosition: $labelPos.val(),
                fontSize: parseInt($fontSize.val()||'16',10),
                colors: { main:$colorMain.val(), minor:$colorMinor.val(), text:$colorText.val(), points:$colorPoints.val() },
                pointsEnabled: $mark.is(':checked'),
                points: {
                    A:{ enabled: showChecks.A.is(':checked'), value: parseNum(pointInputs.A.val()) },
                    B:{ enabled: showChecks.B.is(':checked'), value: parseNum(pointInputs.B.val()) },
                    C:{ enabled: showChecks.C.is(':checked'), value: parseNum(pointInputs.C.val()) },
                    D:{ enabled: showChecks.D.is(':checked'), value: parseNum(pointInputs.D.val()) }
                }
            };
        }

        function applyState(st){
            if(!st || typeof st!=='object') return;
            if(st.min!==undefined) $min.val(st.min);
            if(st.max!==undefined) $max.val(st.max);
            if(st.unit!==undefined) $unit.val(st.unit);
            if(st.stageSize!==undefined) $('#stageSize').val(st.stageSize);
            if(st.division!==undefined) $division.val(st.division);

            if(st.showHalfMarks!==undefined) $half.prop('checked',!!st.showHalfMarks);
            if(st.labelHalfMarks!==undefined) $labelHalf.prop('checked',!!st.labelHalfMarks);
            if(st.showArrows!==undefined) $showArrows.prop('checked',!!st.showArrows);

            if(st.labelMode) $labelMode.val(st.labelMode);
            if(st.labelNth!==undefined) $labelNth.val(st.labelNth);
            if(st.customValues!==undefined) $customValues.val(st.customValues);

            if(st.valueStyle) $valueStyle.val(st.valueStyle);
            if(st.labelPosition) $labelPos.val(st.labelPosition);
            if(st.fontSize!==undefined) $fontSize.val(st.fontSize);

            if(st.colors){
                if(st.colors.main) $colorMain.val(st.colors.main);
                if(st.colors.minor) $colorMinor.val(st.colors.minor);
                if(st.colors.text) $colorText.val(st.colors.text);
                if(st.colors.points) $colorPoints.val(st.colors.points);
            }

            if(st.pointsEnabled!==undefined) $mark.prop('checked',!!st.pointsEnabled);
            if(st.points){
                ['A','B','C','D'].forEach(id=>{
                    const p=st.points[id]; if(!p) return;
                    if(p.enabled!==undefined) showChecks[id].prop('checked',!!p.enabled);
                    if(p.value!==undefined) pointInputs[id].val(p.value);
                });
            }

            $pointsPanel.toggle($mark.is(':checked'));
            draw();
        }

        function bind(){
            const inputs = [
                '#minVal','#maxVal','#unitVal','#unitDisplay','#stageSize',
                '#division','#halfMarks','#labelHalf','#showArrows',
                '#labelMode','#labelNth','#customValues',
                '#valueStyle','#labelPos','#fontSize','#lineThickness',
                '#colorMain','#colorMinor','#colorText','#colorPoints',
                '#markPoints','#showA','#showB','#showC','#showD',
                '#pA','#pB','#pC','#pD'
            ].join(',');

            $(inputs).on('input change', function(){
                $pointsPanel.toggle($mark.is(':checked'));
                draw();
            });

            $('#saveSvgBtn').on('click', downloadSVG);

            $('#getJsonBtn').on('click', function(){
                $('#numberLineToolJsonBox').val(JSON.stringify(getState(), null, 2));
            });

            $('#applyJsonBtn').on('click', function(){
                try{
                    const obj = JSON.parse($('#numberLineToolJsonBox').val() || '{}');
                    applyState(obj);
                }catch(e){
                    alert('Invalid JSON');
                }
            });

            // snap division on blur
            $division.on('blur', function(){ normalizeDivision(); draw(); });
        }

        // init
        bind();
        draw();

        $('#nlModal').on('shown.bs.modal', function(){
            // force redraw after modal layout
            setTimeout(draw, 30);
        });
    })();
</script>





<script>



</script>
