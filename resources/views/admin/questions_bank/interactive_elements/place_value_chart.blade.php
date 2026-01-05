

<style>
    :root{
        --cellW: 120px;
        --headH: 78px;
        --bodyH: 200px;
        --gridBorder: #333;
        --splitterColor: #777;
        --decimalColor: #000;
        --bg: #ffffff;
        --decimalLine: 4px;

        --headFont: 14px;
        --circleFont: 12px;
        --circleSize: 65px;

        --tableScale: 1; /* zoom-based */
    }

    .place-value-chart .app-card{ border-radius:14px; overflow:hidden; box-shadow:0 10px 24px rgba(0,0,0,.08); background:#fff; }

    /* Layout (left settings, right preview) */
    .place-value-chart .sidebar{
        background:#ffffff;
        border-right:1px solid #ececf1;
        padding:14px 14px 10px;
        height: calc(100vh - 48px);
        overflow:auto;
    }
    .place-value-chart .preview{
        background:#fff;
        padding:14px;
    }
    @media (max-width: 991.98px){
        .place-value-chart .sidebar{ height:auto; border-right:none; border-bottom:1px solid #ececf1; }
    }

    /* Stage: scale ONLY the table area via zoom to keep hitboxes correct */
    .place-value-chart .stage{
        width:100%;
        position:relative;
        margin-bottom: 14px;
    }
    .place-value-chart .stage.fixed{
        margin-left:auto;
        margin-right:auto;
    }
    .place-value-chart .stage-inner{
        zoom: var(--tableScale, 1);
        transform: none;
        width: 100%;
    }

    /* Table */
    .place-value-chart .pv-board{
        background: var(--bg);
        border: 2px solid var(--gridBorder);
        border-radius: 10px;
        overflow:hidden;
        width: 100%;
        position: relative;
    }
    .place-value-chart .pv-row{ display:flex; width:100%; }

    .place-value-chart .pv-col{
        width: var(--cellW);
        min-width: 0;
        flex: 1 1 0;
        border-right: 2px solid var(--gridBorder);
        display:flex;
        flex-direction:column;
        position:relative;
    }
    .place-value-chart .pv-col:last-child{ border-right:none; }

    .place-value-chart .pv-head{
        height: var(--headH);
        border-bottom: 2px solid var(--gridBorder);
        display:flex;
        align-items:center;
        justify-content:center;
        font-weight:700;
        font-size: var(--headFont);
        padding: 0 6px;
        text-align:center;
        line-height:1.05;
        user-select:none;
    }
    .place-value-chart .headers-hidden .pv-head{
        display:none;
        height:0 !important;
        border-bottom:none !important;
        padding:0 !important;
    }

    .place-value-chart .pv-body{
        height: var(--bodyH);
        position: relative;
        background:#fff;
    }
    .place-value-chart .pv-dropzone{ position:absolute; inset:0; }
    .place-value-chart .center-line{
        position:absolute;
        left:50%;
        top:0;
        bottom:0;
        width:2px;
        background: var(--splitterColor);
        transform: translateX(-1px);
        opacity:.28;
        pointer-events:none;
    }

    /* Hide internal lines only (keep outer border) */
    .place-value-chart .lines-hidden .pv-col{ border-right-color: transparent !important; }
    .place-value-chart .lines-hidden .pv-head{ border-bottom-color: transparent !important; }
    .place-value-chart .lines-hidden .center-line{ display:none !important; }

    .place-value-chart .splitter-hidden .center-line{ display:none !important; }

    /* Decimal separator between O and Tth (only when fractions shown) */
    .decimal-sep{ border-right: var(--decimalLine) solid var(--decimalColor) !important; z-index:2; }
    .place-value-chart .lines-hidden .decimal-sep{ border-right-color: transparent !important; }

    .place-value-chart .decimal-dot{
        position:absolute;
        right: calc(var(--decimalLine) / -2);
        top: calc(var(--headH) + (var(--bodyH) * 0.33));
        width: 44px;
        height: 44px;
        border-radius: 999px;
        background: var(--decimalColor);
        transform: translateX(50%);
        z-index:4;
        pointer-events:none;
        box-shadow: 0 6px 14px rgba(0,0,0,.15);
    }
    .place-value-chart  .decimal-dot:before, .decimal-dot:after{
        content:"";
        position:absolute;
        left:50%;
        width:2px;
        background: var(--decimalColor);
        transform:translateX(-50%);
        opacity:.8;
    }
    .place-value-chart .decimal-dot:before{ top:-180px; height:170px; }
    .place-value-chart .decimal-dot:after{ top:44px; height:210px; }
    .place-value-chart .lines-hidden .decimal-dot{ display:none !important; }

    .place-value-chart .decimal-hidden .decimal-dot{ display:none !important; }
    .place-value-chart .decimal-hidden .decimal-sep{ border-right-color: transparent !important; }

    /* Resize handle */
    .place-value-chart .height-handle{
        height: 16px;
        background: transparent;
        border: none;
        border-top: 0;
        border-radius: 0 0 10px 10px;
        display:flex;
        align-items:center;
        justify-content:center;
        cursor: ns-resize;
        user-select:none;
        margin-bottom: 6px;
    }
    .place-value-chart .height-handle .grip{
        width: 120px;
        height: 6px;
        border-radius: 999px;
        background:#c8c8d0;
    }

    /* Palette + arrows */
    .place-value-chart .palette{
        background:transparent;
        border-radius:12px;
        padding:14px;
    }
    .place-value-chart .palette-inner{
        display:flex;
        flex-wrap:wrap;
        gap:10px;
        align-items:center;
        justify-content:center;
    }
    .place-value-chart .arrows-row{
        margin-top: 10px;
        display:flex;
        gap:12px;
        flex-wrap:wrap;
        justify-content:center;
    }
    .place-value-chart .controls-box{
        background:#fbfbfd;
        border:1px solid #ececf1;
        border-radius:12px;
        padding:10px 12px;
        min-width: 280px;
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:10px;
    }
    .place-value-chart .navBtn{
        width:56px;
        height:56px;
        border-radius:12px;
        border:0;
        background:#d9c8e8;
        color:#fff;
        font-size:30px;
        font-weight:900;
        line-height:1;
        box-shadow: 0 6px 16px rgba(0,0,0,.08);
    }
    .place-value-chart .navBtn:focus{ outline:none; }

    /* Tokens */
    .place-value-chart .token{
        width: var(--circleSize);
        height: var(--circleSize);
        border-radius:999px;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        font-weight:900;
        color:#fff;
        user-select:none;
        cursor:grab;
        border: 2px solid rgba(0,0,0,.25);
        box-shadow: 0 6px 14px rgba(0,0,0,.10);
    }
    .place-value-chart .token:active{ cursor:grabbing; }
    .place-value-chart .placed{ position:absolute; z-index:5; }

    .place-value-chart .circleText{
        font-size: var(--circleFont);
        font-weight: 900;
        line-height: 1;
        padding: 0 4px;
        text-align:center;
        user-select:none;
        pointer-events:none;
    }

    .place-value-chart .mini-note{ color:#666; font-size: 13px; }

    /* Sidebar settings (Rurera-like list) */

    .place-value-chart .section-title{
        margin-top: 10px;
        margin-bottom: 8px;
        font-weight: 800;
        letter-spacing: .04em;
        color:#6b7280;
        font-size: 13px;
        text-transform: uppercase;
    }
    .place-value-chart .section-divider{ height:1px; background:#ececf1; margin: 10px 0; }
    .place-value-chart .setting-grid{
        display:grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }
    @media (max-width: 991.98px){
        .place-value-chart .setting-grid{ grid-template-columns: 1fr; }
    }
    .place-value-chart .setting-box{
        padding:10px 6px;
        border-bottom:1px dashed #ededf3;
    }
    .place-value-chart .setting-box:last-child{ border-bottom:none; }

    .place-value-chart .setting{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:10px;
        padding:10px 6px;
        border-bottom:1px dashed #ededf3;
    }
    .place-value-chart .setting:last-child{ border-bottom:none; }
    .place-value-chart .setting label{ margin:0; font-weight:600; }
    .place-value-chart .valueHint{ font-size:12px; color:#666; margin-left:8px; white-space:nowrap; }
    .place-value-chart .control{ min-width: 180px; }
    .place-value-chart .custom-range{ min-width: 180px; }
    @media (max-width: 991.98px){
        .place-value-chart .setting{ flex-direction:column; align-items:flex-start; }
        .place-value-chart .control, .custom-range{ width:100%; min-width:0; }
    }

    /* Modal layout: scroll settings, keep preview sticky */
    .place-value-chart #toolModal .modal-body{ overflow:hidden; }
    .place-value-chart #toolModal .toolShell{ height: calc(100vh - 56px); display:flex; }
    .place-value-chart #toolModal .toolSidebar{ width: 340px; max-width: 340px; border-right:1px solid #ececf1; overflow-y:auto; padding:14px; }
    .place-value-chart #toolModal .toolMain{ flex:1; overflow-y:auto; padding:14px; }
    .place-value-chart #toolModal .stageSticky{ position: sticky; top: 0; z-index: 5; background: #fff; padding-top: 10px; }
    @media (max-width: 991.98px){
        .place-value-chart #toolModal .toolShell{ flex-direction: column; }
        .place-value-chart #toolModal .toolSidebar{ width: 100%; max-width: none; border-right:none; border-bottom:1px solid #ececf1; height: 42vh; }
        .place-value-chart  #toolModal .toolMain{ height: calc(58vh - 56px); }
    }

</style>

<div id="toolModal" class="modal-fullscreen-xl rurera_interactive_elements place-value-chart modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content edit-quest-modal-div">
            <div class="modal-body"  style="height: calc(100vh - 56px); overflow:auto;">




                <!-- Modal -->

                <div class="container-fluid py-3">
                    <div class="app-card">
                        <div class="row no-gutters">
                            <!-- LEFT: SETTINGS -->
                            <div class="col-lg-3">
                                <div class="sidebar toolSidebar">
                                    <div class="mb-2 font-weight-bold">Settings</div>

                                    <div class="section-title">Stage</div>



                                    <div class="setting">
                                        <div>
                                            <label>Stage size</label>
                                            <span class="valueHint" id="stageSizeHint">Auto</span>
                                        </div>
                                        <select id="stageSize" class="custom-select custom-select-sm control">
                                            <option value="auto">Auto</option>
                                            <option value="400">400px</option>
                                            <option value="600" selected>600px</option>
                                            <option value="800">800px</option>
                                        </select>
                                    </div>

                                    <div class="section-divider"></div>
                                    <div class="section-title">Text & display</div>
                                    <div class="setting">
                                        <div>
                                            <label>Header text style</label>
                                            <span class="valueHint" id="headerStyleHint">Abbreviations (M, HTh, …)</span>
                                        </div>
                                        <select id="headerStyle" class="custom-select custom-select-sm control">
                                            <option value="abbr">Abbreviations (M, HTh, …)</option>
                                            <option value="words" selected>Words (Millions, …)</option>
                                            <option value="numeric">Numbers (1,000,000, …)</option>
                                            <option value="numeric_s">Numbers with s (1,000,000s, …)</option>
                                        </select>
                                    </div>

                                    <div class="setting">
                                        <div>
                                            <label>Header font size</label>
                                            <span class="valueHint"><span id="headFontVal">14</span>px</span>
                                        </div>
                                        <input id="headFontSlider" type="range" min="14" max="56" value="14" class="custom-range control">
                                    </div>

                                    <div class="setting">
                                        <div>
                                            <label>Placed font size</label>
                                            <span class="valueHint"><span id="circleFontVal">12</span>px</span>
                                        </div>
                                        <input id="circleFontSlider" type="range" min="10" max="28" value="12" class="custom-range control">
                                    </div>

                                    <div class="setting">
                                        <div>
                                            <label>Placed circles size</label>
                                            <span class="valueHint"><span id="circleSizeVal">65</span>px</span>
                                        </div>
                                        <input id="circleSizeSlider" type="range" min="44" max="110" value="65" class="custom-range control">
                                    </div>
                                    <div class="setting">
                                        <div>
                                            <label>Placed circle colour</label>
                                            <span class="valueHint" id="placedColorHint">Own (palette)</span>
                                        </div>
                                        <select id="placedColor" class="custom-select custom-select-sm control"></select>
                                    </div>

                                    <div class="section-divider"></div>
                                    <div class="section-title">Table</div>
                                    <div class="setting">
                                        <div><label>Show placed text</label></div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="togglePlacedText" checked>
                                            <label class="custom-control-label" for="togglePlacedText"></label>
                                        </div>
                                    </div>

                                    <div class="setting">
                                        <div><label>Show headers</label></div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="toggleHeaders" checked>
                                            <label class="custom-control-label" for="toggleHeaders"></label>
                                        </div>
                                    </div>

                                    <div class="setting">
                                        <div><label>Show table</label></div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="toggleTable" checked>
                                            <label class="custom-control-label" for="toggleTable"></label>
                                        </div>
                                    </div>


                                    <div class="setting">
                                        <div><label>Show column splitter line</label></div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="toggleSplitter" checked>
                                            <label class="custom-control-label" for="toggleSplitter"></label>
                                        </div>
                                    </div>

                                    <div class="setting">
                                        <div><label>Hide table lines</label></div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="toggleLines">
                                            <label class="custom-control-label" for="toggleLines"></label>
                                        </div>
                                    </div>

                                    <div class="setting">
                                        <div><label>Show fraction splitter</label></div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="toggleDecimal" checked>
                                            <label class="custom-control-label" for="toggleDecimal"></label>
                                        </div>
                                    </div>


                                    <div class="section-divider  rurera-hide"></div>
                                    <div class="section-title rurera-hide">Save & export</div>
                                    <div class="setting  rurera-hide">
                                        <div><label>Save / Load JSON</label></div>
                                        <div class="control">
                                            <div class="btn-group btn-group-sm mb-2" role="group">
                                                <button id="btnSaveJSON" type="button" class="btn btn-outline-primary">Save</button>
                                                <button id="btnCopyJSON" type="button" class="btn btn-outline-primary">Copy</button>
                                                <button id="btnLoadJSON" type="button" class="btn btn-outline-success load-json-btn-place-value-chart">Load</button>
                                                <button id="btnDownloadJSON" type="button" class="btn btn-outline-secondary">Download</button>
                                                <button id="btnUploadJSON" type="button" class="btn btn-outline-secondary">Upload</button>
                                            </div>
                                            <textarea id="placeValueJsonBox" class="form-control form-control-sm" rows="6"
                                                      placeholder="JSON will appear here (Save) or paste JSON here (Load)"></textarea>
                                            <input id="jsonFile" type="file" accept="application/json" style="display:none;">
                                            <div class="mini-note mt-1">Includes columns, placed circles, and settings.</div>
                                        </div>
                                    </div>

                                    <div class="setting">
                                        <div>
                                            <label>Table lines colour</label>
                                            <span class="valueHint" id="gridColorHint">#333333</span>
                                        </div>
                                        <input type="color" id="gridColor" class="control" value="#333333" style="height:32px;">
                                    </div>

                                    <div class="setting">
                                        <div>
                                            <label>Column splitter colour</label>
                                            <span class="valueHint" id="splitterColorHint">#777777</span>
                                        </div>
                                        <input type="color" id="splitterColor" class="control" value="#777777" style="height:32px;">
                                    </div>

                                    <div class="setting">
                                        <div>
                                            <label>Fraction splitter colour</label>
                                            <span class="valueHint" id="decimalColorHint">#000000</span>
                                        </div>
                                        <input type="color" id="decimalColor" class="control" value="#000000" style="height:32px;">
                                    </div>



                                    <div class="d-flex flex-wrap justify-content-between pt-2">
                                        <button id="btnClear" class="btn btn-outline-secondary">Clear</button>
                                        <button id="btnExport" class="btn btn-primary">Download SVG</button>
                                    </div>
                                </div>
                            </div>

                            <!-- RIGHT: PREVIEW -->
                            <div class="col-lg-9">
                                <div class="preview">
                                    <div class="stage stageSticky" class="stage">
                                        <div class="stage-inner" id="innerStage">
                                            <div class="pv-board" id="board">
                                                <div class="pv-row" id="columns"></div>
                                            </div>
                                            <div class="height-handle" id="heightHandle" title="Drag to change column height">
                                                <div class="grip"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="palette">
                                        <div class="palette-inner" id="palette"></div>

                                        <div class="arrows-row">
                                            <div class="controls-box">
                                                <button class="navBtn" id="wholeHide" title="Hide one whole-number column">‹</button>
                                                <div class="text-center">
                                                    <div class="font-weight-bold">Whole numbers</div>
                                                    <div class="mini-note">Show: <span id="wholeCountLabel"></span></div>
                                                </div>
                                                <button class="navBtn" id="wholeShow" title="Show one whole-number column">›</button>
                                            </div>

                                            <div class="controls-box">
                                                <button class="navBtn" id="fracHide" title="Hide one fraction column">‹</button>
                                                <div class="text-center">
                                                    <div class="font-weight-bold">Fractions</div>
                                                    <div class="mini-note">Show: <span id="fracCountLabel"></span></div>
                                                </div>
                                                <button class="navBtn" id="fracShow" title="Show one fraction column">›</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dependencies -->







                </div>










            </div>
            <div class="modal-footer">
                <div class="text-right">
                    <a href="javascript:;" class="btn btn-primary insert-place-value-chart" data-insert_id="-1">Insert</a>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    // ----- Data -----
    const WHOLE_COLS_ALL = [
        { abbr:"M",    tokenKey:"1000000", headerColor:"#d7d7d7" },
        { abbr:"HTh",  tokenKey:"100000",  headerColor:"#d4c3c4" },
        { abbr:"TTh",  tokenKey:"10000",   headerColor:"#caa8d5" },
        { abbr:"Th",   tokenKey:"1000",    headerColor:"#d3e8f7" },
        { abbr:"H",    tokenKey:"100",     headerColor:"#bfe3b7" },
        { abbr:"T",    tokenKey:"10",      headerColor:"#ffe2a0" }
    ];
    const ONES_COL = { abbr:"O", tokenKey:"1", headerColor:"#f37b84" };
    const FRAC_COLS_ALL = [
        { abbr:"Tth",    tokenKey:"0.1",     headerColor:"#ffe2a0" },
        { abbr:"Hth",    tokenKey:"0.01",    headerColor:"#bfe3b7" },
        { abbr:"Thth",   tokenKey:"0.001",   headerColor:"#d3e8f7" },
        { abbr:"TTthth", tokenKey:"0.0001",  headerColor:"#caa8d5" }
    ];

    const TOKEN_BASE = {
        "1000000": { text:"1,000,000", baseColor:"#9f9f9f" },
        "100000":  { text:"100,000",   baseColor:"#e57f63" },
        "10000":   { text:"10,000",    baseColor:"#b36ac0" },
        "1000":    { text:"1,000",     baseColor:"#138bb5" },
        "100":     { text:"100",       baseColor:"#3aaa4a" },
        "10":      { text:"10",        baseColor:"#ffbf1a" },
        "1":       { text:"1",         baseColor:"#f1614a" },
        "0.1":     { text:"0.1",       baseColor:"#ffbf1a" },
        "0.01":    { text:"0.01",      baseColor:"#3aaa4a" },
        "0.001":   { text:"0.001",     baseColor:"#138bb5" },
        "0.0001":  { text:"0.0001",    baseColor:"#b36ac0" }
    };

    const HEADER_TEXT = {
        words: {
            "M":"Millions","HTh":"Hundred thousands","TTh":"Ten thousands","Th":"Thousands","H":"Hundreds","T":"Tens","O":"Ones",
            "Tth":"Tenths","Hth":"Hundredths","Thth":"Thousandths","TTthth":"Ten-thousandths"
        },
        numeric: {
            "M":"1,000,000","HTh":"100,000","TTh":"10,000","Th":"1,000","H":"100","T":"10","O":"1",
            "Tth":"0.1","Hth":"0.01","Thth":"0.001","TTthth":"0.0001"
        },
        numeric_s: {
            "M":"1,000,000s","HTh":"100,000s","TTh":"10,000s","Th":"1,000s","H":"100s","T":"10s","O":"1s",
            "Tth":"0.1s","Hth":"0.01s","Thth":"0.001s","TTthth":"0.0001s"
        }
    };

    // Placed colour mode (but by default keep own colour)
    const PLACED_COLOR_CHOICES = [
        { name:"Own (palette)", value:"__own__" },
        { name:"Black", value:"#111111" },
        { name:"Red", value:"#E74C3C" },
        { name:"Pink", value:"#E91E63" },
        { name:"Purple", value:"#8E44AD" },
        { name:"Indigo", value:"#3F51B5" },
        { name:"Blue", value:"#2196F3" },
        { name:"Teal", value:"#009688" },
        { name:"Green", value:"#2ECC71" },
        { name:"Orange", value:"#F39C12" },
        { name:"Brown", value:"#8D6E63" }
    ];

    const state = {
        wholeCount: 2,
        fracCount: 2,
        placed: [] // {id, colAbbr, tokenText, color, xRel, yRel}
    };

    function clamp(n, min, max){ return Math.max(min, Math.min(max, n)); }
    function escapeHtml(str){
        return String(str).replaceAll("&","&amp;").replaceAll("<","&lt;").replaceAll(">","&gt;")
            .replaceAll('"',"&quot;").replaceAll("'","&#039;");
    }

    function getHeaderLabel(abbr){
        const style = $("#headerStyle").val();
        if(style === "abbr") return abbr;
        if(style === "words") return HEADER_TEXT.words[abbr] || abbr;
        if(style === "numeric") return HEADER_TEXT.numeric[abbr] || abbr;
        if(style === "numeric_s") return HEADER_TEXT.numeric_s[abbr] || abbr;
        return abbr;
    }

    function visibleCols(){
        const w = WHOLE_COLS_ALL.slice(0, state.wholeCount);
        const f = FRAC_COLS_ALL.slice(0, state.fracCount);
        return [...w, ONES_COL, ...f];
    }

    function placedColorMode(){ return $("#placedColor").val() || "__own__"; }
    function placedFillFor(tokenColor){
        const mode = placedColorMode();
        if(mode === "__own__") return tokenColor || "#111";
        return mode;
    }

    function updateHints(){
        $("#headerStyleHint").text($("#headerStyle option:selected").text());
        $("#placedColorHint").text($("#placedColor option:selected").text());
        $("#stageSizeHint").text($("#stageSize option:selected").text());
        if($("#gridColorHint").length){
            $("#gridColorHint").text($("#gridColor").val());
            $("#splitterColorHint").text($("#splitterColor").val());
            $("#decimalColorHint").text($("#decimalColor").val());
        }
    }

    function updatePlacedTextVisibility(){
        const show = $("#togglePlacedText").prop("checked");
        $(".placed .circleText").toggleClass("d-none", !show);
    }
    function updateHeadersVisibility(){
        const show = $("#toggleHeaders").prop("checked");
        $("body").toggleClass("headers-hidden", !show);
        document.documentElement.style.setProperty("--headH", show ? "78px" : "0px");
        renderBoard();
    }
    function updateTableVisibility(){
        const show = $("#toggleTable").prop("checked");
        $("#board, #heightHandle").toggleClass("d-none", !show);
        setTableScale();
    }

    function updateSplitterVisibility(){
        const show = $("#toggleSplitter").prop("checked");
        $("body").toggleClass("splitter-hidden", !show);
    }

    function updateDecimalVisibility(){
        const show = $("#toggleDecimal").prop("checked");
        $("body").toggleClass("decimal-hidden", !show);
        renderBoard();
    }

    function updateLinesVisibility(){
        const hide = $("#toggleLines").prop("checked");
        $("body").toggleClass("lines-hidden", hide);
        renderBoard();
    }

    function adjustCellWidth(){
        const cols = visibleCols();
        const n = cols.length;
        const boardWidth = $("#board").width() || 900;
        const w = clamp(Math.floor(boardWidth / n), 92, 190);
        document.documentElement.style.setProperty("--cellW", w + "px");
    }

    function renderCounts(){
        $("#wholeCountLabel").text(state.wholeCount + " / " + WHOLE_COLS_ALL.length);
        $("#fracCountLabel").text(state.fracCount + " / " + FRAC_COLS_ALL.length);
        $("#wholeHide").prop("disabled", state.wholeCount <= 0);
        $("#wholeShow").prop("disabled", state.wholeCount >= WHOLE_COLS_ALL.length);
        $("#fracHide").prop("disabled", state.fracCount <= 0);
        $("#fracShow").prop("disabled", state.fracCount >= FRAC_COLS_ALL.length);
    }

    function renderBoard(){
        renderCounts();
        adjustCellWidth();

        const cols = visibleCols();
        const $columns = $("#columns").empty();

        cols.forEach((col) => {
            const label = getHeaderLabel(col.abbr);
            const needsDecimalSep = (col.abbr === "O" && state.fracCount > 0 && $("#toggleDecimal").prop("checked"));

            const $col = $(`
          <div class="pv-col ${needsDecimalSep ? "decimal-sep" : ""}" data-colabbr="${col.abbr}">
            <div class="pv-head" style="background:${col.headerColor}">${escapeHtml(label)}</div>
            <div class="pv-body">
              <div class="pv-dropzone" data-colabbr="${col.abbr}"></div>
              <div class="center-line"></div>
            </div>
          </div>
        `);
            $columns.append($col);
        });

        $("#board .decimal-dot").remove();
        if(state.fracCount > 0 && $("#toggleDecimal").prop("checked") && !$("#toggleLines").prop("checked")){
            const $oCol = $(`.pv-col[data-colabbr="O"]`);
            if($oCol.length){
                $oCol.append(`<div class="decimal-dot" aria-hidden="true"></div>`);
            }
        }

        $(".pv-dropzone").droppable({
            accept: ".token",
            tolerance: "pointer",
            drop: function(event, ui){
                const colAbbr = $(this).data("colabbr");
                const token = ui.helper.data("token") || ui.draggable.data("token");
                if(!token) return;
                placeToken(token, colAbbr, event);
            }
        });

        renderPlacedTokens();
        renderPalette();
        setTableScale();
    }

    function renderPalette(){
        const cols = visibleCols();
        const $pal = $("#palette").empty();

        cols.forEach(col => {
            const tb = TOKEN_BASE[col.tokenKey];
            if(!tb) return;
            const token = { colAbbr: col.abbr, tokenKey: col.tokenKey, text: tb.text, baseColor: tb.baseColor };

            const $t = $(`
          <div class="token" title="Drag me">
            <span class="circleText">${escapeHtml(token.text)}</span>
          </div>
        `);
            $t.css("background", token.baseColor);
            $t.data("token", token);

            $t.draggable({
                helper: "clone",
                appendTo: "body",
                zIndex: 10000,
                revert: "invalid",
                start: function(_, ui){
                    ui.helper.data("token", token);
                    // Prevent "two tokens moving" look
                    $(this).css("visibility","hidden");
                },
                stop: function(){
                    $(this).css("visibility","visible");
                }
            });

            $pal.append($t);
        });

        updatePlacedTextVisibility(); // placed only
    }

    function placeToken(token, colAbbr, dropEvent){
        const $col = $(`.pv-col[data-colabbr="${colAbbr}"]`);
        if(!$col.length) return;

        const $body = $col.find(".pv-body");
        const bodyEl = $body.get(0);
        const rect = bodyEl.getBoundingClientRect();

        // client coords work with zoom (and also when browser uses CSS transforms elsewhere)
        const oe = dropEvent.originalEvent || dropEvent;
        const clientX = (oe.clientX != null) ? oe.clientX : dropEvent.clientX;
        const clientY = (oe.clientY != null) ? oe.clientY : dropEvent.clientY;

        const x = clientX - rect.left;
        const y = clientY - rect.top;

        const xRel = clamp(x / rect.width, 0.12, 0.88);
        const yRel = clamp(y / rect.height, 0.12, 0.88);

        const id = "p" + Math.random().toString(16).slice(2);
        state.placed.push({ id, colAbbr, tokenText: token.text, color: token.baseColor, xRel, yRel });
        renderPlacedTokens();
    }

    function currentCircleRadiusPx(){
        const size = parseFloat(getComputedStyle(document.documentElement).getPropertyValue('--circleSize'));
        return size / 2;
    }

    function renderPlacedTokens(){
        $("#board .placed").remove();

        const cols = visibleCols();
        const visibleSet = new Set(cols.map(c => c.abbr));
        const r = currentCircleRadiusPx();

        state.placed.forEach(p => {
            if(!visibleSet.has(p.colAbbr)) return;

            const $col = $(`.pv-col[data-colabbr="${p.colAbbr}"]`);
            const $body = $col.find(".pv-body");

            const x = p.xRel * $body.width();
            const y = p.yRel * $body.height();

            const $node = $(`
          <div class="token placed" data-placedid="${p.id}">
            <span class="circleText">${escapeHtml(p.tokenText)}</span>
          </div>
        `);
            $node.css({ background: placedFillFor(p.color), left:(x-r)+"px", top:(y-r)+"px" });
            $body.append($node);

            $node.draggable({
                containment: $body,
                stop: function(_, ui){
                    const left = ui.position.left + r;
                    const top  = ui.position.top + r;
                    p.xRel = clamp(left / $body.width(), 0.12, 0.88);
                    p.yRel = clamp(top / $body.height(), 0.12, 0.88);
                }
            });

            $node.on("dblclick", function(){
                const idx = state.placed.findIndex(z => z.id === p.id);
                if(idx >= 0){ state.placed.splice(idx, 1); renderPlacedTokens(); }
            });
        });

        updatePlacedTextVisibility();
    }

    function clearBoard(){
        state.placed = [];
        renderPlacedTokens();
    }

    function setHeadFont(px){
        document.documentElement.style.setProperty("--headFont", px + "px");
        $("#headFontVal").text(px);
        renderBoard();
    }
    function setCircleFont(px){
        document.documentElement.style.setProperty("--circleFont", px + "px");
        $("#circleFontVal").text(px);
        renderPlacedTokens();
    }
    function setCircleSize(px){
        document.documentElement.style.setProperty("--circleSize", px + "px");
        $("#circleSizeVal").text(px);
        renderPlacedTokens();
    }
    function setBodyHeight(px){
        document.documentElement.style.setProperty("--bodyH", px + "px");
        renderPlacedTokens();
        setTableScale();
    }
    function setTableScale(){
        const userScale = 1;

        // Fit-to-stage (only shrink when fixed stage size is chosen)
        const stageEl = document.getElementById("stage");
        const boardEl = document.getElementById("board");
        let fitScale = 1;

        if(stageEl && boardEl){
            const stageW = stageEl.clientWidth || 0;
            const boardW = boardEl.scrollWidth || boardEl.getBoundingClientRect().width || 0;
            if(stageEl.classList.contains("fixed") && stageW > 0 && boardW > 0){
                fitScale = Math.min(1, stageW / boardW);
            }
        }

        const effective = userScale * fitScale;

        document.documentElement.style.setProperty("--tableScale", String(effective));

        // reserve stage height (after zoom)
        requestAnimationFrame(function(){
            const inner = document.getElementById("innerStage");
            const stage = document.getElementById("stage");
            if(inner && stage){
                const rect = inner.getBoundingClientRect();
                stage.style.height = (rect.height || 0) + "px";
            }
        });
    }

    function initPlacedColorSelect(){
        const $sel = $("#placedColor").empty();
        PLACED_COLOR_CHOICES.forEach((c) => {
            const opt = document.createElement("option");
            opt.value = c.value;
            opt.textContent = c.name;
            $sel.append(opt);
        });
        $sel.val("__own__");
        updateHints();
    }

    // Column show/hide
    function wholeHide(){ state.wholeCount = clamp(state.wholeCount - 1, 0, WHOLE_COLS_ALL.length); renderBoard(); }
    function wholeShow(){ state.wholeCount = clamp(state.wholeCount + 1, 0, WHOLE_COLS_ALL.length); renderBoard(); }
    function fracHide(){ state.fracCount = clamp(state.fracCount - 1, 0, FRAC_COLS_ALL.length); renderBoard(); }
    function fracShow(){ state.fracCount = clamp(state.fracCount + 1, 0, FRAC_COLS_ALL.length); renderBoard(); }

    // ---- Save / Load JSON ----
    function buildSaveObject(){
        return {
            version: 1,
            wholeCount: state.wholeCount,
            fracCount: state.fracCount,
            placed: state.placed,
            settings: {
                headerStyle: $("#headerStyle").val(),
                headFont: parseInt($("#headFontSlider").val(), 10),
                circleFont: parseInt($("#circleFontSlider").val(), 10),
                circleSize: parseInt($("#circleSizeSlider").val(), 10),
                placedColor: $("#placedColor").val(),
                stageSize: $("#stageSize").val(),
                showPlacedText: $("#togglePlacedText").prop("checked"),
                showHeaders: $("#toggleHeaders").prop("checked"),
                showTable: $("#toggleTable").prop("checked"),
                showSplitter: $("#toggleSplitter").prop("checked"),
                showDecimal: $("#toggleDecimal").prop("checked"),
                hideLines: $("#toggleLines").prop("checked"),
                gridColor: $("#gridColor").val(),
                splitterColor: $("#splitterColor").val(),
                decimalColor: $("#decimalColor").val()
            }
        };
    }

    function applySaveObject(obj){
        if(!obj || typeof obj !== "object") throw new Error("Invalid JSON object.");
        if(typeof obj.wholeCount === "number") state.wholeCount = clamp(obj.wholeCount, 0, WHOLE_COLS_ALL.length);
        if(typeof obj.fracCount === "number") state.fracCount = clamp(obj.fracCount, 0, FRAC_COLS_ALL.length);

        if(Array.isArray(obj.placed)){
            const colsSet = new Set(["M","HTh","TTh","Th","H","T","O","Tth","Hth","Thth","TTthth"]);
            state.placed = obj.placed
                .filter(p => p && colsSet.has(p.colAbbr) && typeof p.tokenText === "string")
                .map(p => ({
                    id: String(p.id || ("p"+Math.random().toString(16).slice(2))),
                    colAbbr: p.colAbbr,
                    tokenText: p.tokenText,
                    color: p.color || null,
                    xRel: clamp(Number(p.xRel), 0.05, 0.95),
                    yRel: clamp(Number(p.yRel), 0.05, 0.95)
                }));
        }

        const s = (obj.settings && typeof obj.settings === "object") ? obj.settings : {};
        if(s.headerStyle) $("#headerStyle").val(s.headerStyle);
        if(typeof s.placedColor === "string") $("#placedColor").val(s.placedColor);
        if(typeof s.stageSize === "string") $("#stageSize").val(s.stageSize);

        if(typeof s.headFont === "number"){ $("#headFontSlider").val(s.headFont); setHeadFont(s.headFont); }
        if(typeof s.circleFont === "number"){ $("#circleFontSlider").val(s.circleFont); setCircleFont(s.circleFont); }
        if(typeof s.circleSize === "number"){ $("#circleSizeSlider").val(s.circleSize); setCircleSize(s.circleSize); }

        if(typeof s.showPlacedText === "boolean") $("#togglePlacedText").prop("checked", s.showPlacedText);
        if(typeof s.showHeaders === "boolean") $("#toggleHeaders").prop("checked", s.showHeaders);
        if(typeof s.showTable === "boolean") $("#toggleTable").prop("checked", s.showTable);
        if(typeof s.showSplitter === "boolean") $("#toggleSplitter").prop("checked", s.showSplitter);
        if(typeof s.showDecimal === "boolean") $("#toggleDecimal").prop("checked", s.showDecimal);
        if(typeof s.hideLines === "boolean") $("#toggleLines").prop("checked", s.hideLines);
        if(typeof s.gridColor === "string") $("#gridColor").val(s.gridColor);
        if(typeof s.splitterColor === "string") $("#splitterColor").val(s.splitterColor);
        if(typeof s.decimalColor === "string") $("#decimalColor").val(s.decimalColor);

        updateHints();
        updatePlacedTextVisibility();
        updateHeadersVisibility();
        updateTableVisibility();
        applyLineColors();
        updateSplitterVisibility();
        updateDecimalVisibility();
        updateLinesVisibility();
        renderBoard();
    }

    function saveJSONToBox(){ $("#placeValueJsonBox").val(JSON.stringify(buildSaveObject(), null, 2)); }
    function loadJSONFromBox(){
        const txt = ($("#placeValueJsonBox").val() || "").trim();
        if(!txt) throw new Error("Paste JSON first.");
        applySaveObject(JSON.parse(txt));
    }
    function downloadJSONFile(){
        const txt = ($("#placeValueJsonBox").val() || "").trim() || JSON.stringify(buildSaveObject(), null, 2);
        const blob = new Blob([txt], {type: "application/json;charset=utf-8"});
        const url = URL.createObjectURL(blob);
        const a = document.createElement("a");
        a.href = url;
        a.download = "place-value-chart.json";
        document.body.appendChild(a);
        a.click();
        a.remove();
        URL.revokeObjectURL(url);
    }

    // ----- SVG Export (respects table scale + rounded border) -----
    function downloadSVG(){
        const cols = visibleCols();
        const cellW = parseFloat(getComputedStyle(document.documentElement).getPropertyValue('--cellW'));
        const headH = parseFloat(getComputedStyle(document.documentElement).getPropertyValue('--headH'));
        const bodyH = parseFloat(getComputedStyle(document.documentElement).getPropertyValue('--bodyH'));
        const headFont = parseFloat(getComputedStyle(document.documentElement).getPropertyValue('--headFont'));
        const circleFont = parseFloat(getComputedStyle(document.documentElement).getPropertyValue('--circleFont'));
        const circleSize = parseFloat(getComputedStyle(document.documentElement).getPropertyValue('--circleSize'));
        const gridBorder = (getComputedStyle(document.documentElement).getPropertyValue('--gridBorder') || '#333').trim();
        const splitterColor = (getComputedStyle(document.documentElement).getPropertyValue('--splitterColor') || '#777').trim();
        const decimalColor = (getComputedStyle(document.documentElement).getPropertyValue('--decimalColor') || '#000').trim();
        const r = circleSize / 2;
        const decLine = parseFloat(getComputedStyle(document.documentElement).getPropertyValue('--decimalLine'));

        function estimateTextWidth(str, fs){
            // Heuristic: average glyph width ~0.56em for this font
            return (str || "").length * fs * 0.56;
        }
        function wrapLabel(label, maxW, fs){
            const txt = (label || "").trim();
            if(!txt) return [""];
            const words = txt.split(/\s+/);
            if(words.length === 1) return [txt];

            const lines = [];
            let line = "";
            for(const w of words){
                const test = line ? (line + " " + w) : w;
                if(estimateTextWidth(test, fs) <= maxW || !line){
                    line = test;
                }else{
                    lines.push(line);
                    line = w;
                }
            }
            if(line) lines.push(line);
            return lines.slice(0, 3); // keep it sensible
        }


        const linesHidden = $("#toggleLines").prop("checked");
        const showText = $("#togglePlacedText").prop("checked");
        const showHeaders = $("#toggleHeaders").prop("checked");

        const boardW = cols.length * cellW;
        const totalH = headH + bodyH;

        const ns = "http://www.w3.org/2000/svg";
        const svg = document.createElementNS(ns, "svg");
        svg.setAttribute("xmlns", ns);
        const sw = 2;
        svg.setAttribute("viewBox", `${-sw/2} ${-sw/2} ${boardW + sw} ${totalH + sw}`);
// Apply current table scale to export
        const cssScale = parseFloat(getComputedStyle(document.documentElement).getPropertyValue("--tableScale")) || 1;
        const scale = clamp(cssScale, 0.3, 2);
        svg.setAttribute("width", boardW * scale);
        svg.setAttribute("height", totalH * scale);
        // Draw in base coordinates; scale is applied via width/height

        // Background fill (rounded) — behind everything
        const bgFill = document.createElementNS(ns, "rect");
        bgFill.setAttribute("x", 0); bgFill.setAttribute("y", 0);
        bgFill.setAttribute("width", boardW); bgFill.setAttribute("height", totalH);
        bgFill.setAttribute("fill", "#ffffff");
        bgFill.setAttribute("rx", 12); bgFill.setAttribute("ry", 12);
        svg.appendChild(bgFill);

        // Clip inner content to rounded board (prevents squared corners in export)
        const defs = document.createElementNS(ns, "defs");
        const clipPath = document.createElementNS(ns, "clipPath");
        clipPath.setAttribute("id", "clipBoard");
        const clipRect = document.createElementNS(ns, "rect");
        clipRect.setAttribute("x", 0); clipRect.setAttribute("y", 0);
        clipRect.setAttribute("width", Math.max(0, boardW));
        clipRect.setAttribute("height", Math.max(0, totalH));
        clipRect.setAttribute("rx", 12); clipRect.setAttribute("ry", 12);
        clipPath.appendChild(clipRect);
        defs.appendChild(clipPath);
        svg.appendChild(defs);

        const g = document.createElementNS(ns, "g");
        g.setAttribute("clip-path", "url(#clipBoard)");
        svg.appendChild(g);

        // Border on top (rounded)
        const bgStroke = document.createElementNS(ns, "rect");
        bgStroke.setAttribute("x", 0); bgStroke.setAttribute("y", 0);
        bgStroke.setAttribute("width", boardW); bgStroke.setAttribute("height", totalH);
        bgStroke.setAttribute("fill", "none");
        bgStroke.setAttribute("stroke", gridBorder);
        bgStroke.setAttribute("stroke-width", 2);
        bgStroke.setAttribute("rx", 10); bgStroke.setAttribute("ry", 10);
        bgStroke.setAttribute("stroke-linejoin", "round");
        bgStroke.setAttribute("stroke-linecap", "round");
        svg.appendChild(bgStroke);
        cols.forEach((col, i) => {
            const x = i * cellW;

            if(showHeaders && headH > 0){
                const head = document.createElementNS(ns, "rect");
                head.setAttribute("x", x); head.setAttribute("y", 0);
                head.setAttribute("width", cellW); head.setAttribute("height", headH);
                head.setAttribute("fill", col.headerColor);
                head.setAttribute("stroke", linesHidden ? "transparent" : gridBorder);
                head.setAttribute("stroke-width", 2);
                g.appendChild(head);

                // Clip header text to header cell (matches preview)
                const clipId = `clip_head_${i}`;
                const clipPath = document.createElementNS(ns, "clipPath");
                clipPath.setAttribute("id", clipId);
                const clipRect = document.createElementNS(ns, "rect");
                clipRect.setAttribute("x", x + 2);
                clipRect.setAttribute("y", 0);
                clipRect.setAttribute("width", cellW - 4);
                clipRect.setAttribute("height", headH);
                clipPath.appendChild(clipRect);
                svg.appendChild(clipPath);

                const label = getHeaderLabel(col.abbr);
                const t = document.createElementNS(ns, "text");
                const maxW = Math.max(10, cellW - 12);
                const lines = wrapLabel(label, maxW, headFont);
                const lineH = headFont * 1.1;

                t.setAttribute("text-anchor", "middle");
                t.setAttribute("font-family", "Arial, sans-serif");
                t.setAttribute("font-size", headFont);
                t.setAttribute("font-weight", 700);
                t.setAttribute("fill", "#111");
                t.setAttribute("clip-path", `url(#${clipId})`);

                const baseX = x + cellW/2;
                const startY = headH/2 - ((lines.length - 1) * lineH / 2);
                t.setAttribute("x", baseX);
                t.setAttribute("y", startY);
                t.setAttribute("dominant-baseline", "middle");

                lines.forEach((ln, li) => {
                    const sp = document.createElementNS(ns, "tspan");
                    sp.setAttribute("x", baseX);
                    if(li > 0) sp.setAttribute("dy", lineH);
                    sp.textContent = ln;
                    t.appendChild(sp);
                });

                g.appendChild(t);
            }

            const body = document.createElementNS(ns, "rect");
            body.setAttribute("x", x); body.setAttribute("y", headH);
            body.setAttribute("width", cellW); body.setAttribute("height", bodyH);
            body.setAttribute("fill", "#fff");
            body.setAttribute("stroke", linesHidden ? "transparent" : gridBorder);
            body.setAttribute("stroke-width", 2);
            g.appendChild(body);

            if(!linesHidden){
                const mid = document.createElementNS(ns, "line");
                mid.setAttribute("x1", x + cellW/2); mid.setAttribute("x2", x + cellW/2);
                mid.setAttribute("y1", headH); mid.setAttribute("y2", headH + bodyH);
                mid.setAttribute("stroke", splitterColor); mid.setAttribute("stroke-width", 2);
                mid.setAttribute("opacity", 0.28);
                g.appendChild(mid);
            }

            if(!linesHidden && col.abbr === "O" && state.fracCount > 0){
                const dl = document.createElementNS(ns, "line");
                dl.setAttribute("x1", x + cellW);
                dl.setAttribute("x2", x + cellW);
                dl.setAttribute("y1", 0);
                dl.setAttribute("y2", totalH);
                dl.setAttribute("stroke", decimalColor);
                dl.setAttribute("stroke-width", decLine);
                g.appendChild(dl);
            }
        });

        if(!linesHidden && state.fracCount > 0){
            const oIndex = cols.findIndex(c => c.abbr === "O");
            if(oIndex >= 0){
                const cx = (oIndex + 1) * cellW;
                const cy = headH + bodyH * 0.33;
                const dot = document.createElementNS(ns, "circle");
                dot.setAttribute("cx", cx);
                dot.setAttribute("cy", cy);
                dot.setAttribute("r", 22);
                dot.setAttribute("fill", decimalColor);
                g.appendChild(dot);
            }
        }

        const abbrToIndex = new Map(cols.map((c, i) => [c.abbr, i]));
        state.placed.forEach(p => {
            const idx = abbrToIndex.get(p.colAbbr);
            if(idx === undefined) return;
            const x0 = idx * cellW;
            const cx = x0 + p.xRel * cellW;
            const cy = headH + p.yRel * bodyH;

            const circ = document.createElementNS(ns, "circle");
            circ.setAttribute("cx", cx); circ.setAttribute("cy", cy); circ.setAttribute("r", r);
            circ.setAttribute("fill", placedFillFor(p.color));
            circ.setAttribute("stroke", "rgba(0,0,0,0.25)");
            circ.setAttribute("stroke-width", 2);
            g.appendChild(circ);

            if(showText){
                const txt = document.createElementNS(ns, "text");
                txt.setAttribute("x", cx); txt.setAttribute("y", cy + (circleFont/2));
                txt.setAttribute("text-anchor", "middle");
                txt.setAttribute("font-family", "Arial, sans-serif");
                txt.setAttribute("font-size", circleFont);
                txt.setAttribute("font-weight", 900);
                txt.setAttribute("fill", "#fff");
                txt.textContent = p.tokenText;
                g.appendChild(txt);
            }
        });

        const serializer = new XMLSerializer();
        let svgText = serializer.serializeToString(svg);
        if(!svgText.match(/^<svg[^>]+xmlns=/)){
            svgText = svgText.replace(/^<svg/, '<svg xmlns="http://www.w3.org/2000/svg"');
        }

        return svgText;

        const blob = new Blob([svgText], {type: "image/svg+xml;charset=utf-8"});
        const url = URL.createObjectURL(blob);
        const a = document.createElement("a");
        a.href = url;
        a.download = "place-value-chart.svg";
        document.body.appendChild(a);
        a.click();
        a.remove();
        URL.revokeObjectURL(url);
    }


    function applyStageSize(){
        console.log('applyStageSize');
        const v = $("#stageSize").val() || "auto";
        const $stage = $(".stage");
        if(v === "auto"){
            $stage.removeClass("fixed");
            $stage.css({ width: "100%", maxWidth: "none" });
        }else{
            const px = parseInt(v, 10);
            $stage.addClass("fixed");
            $stage.css({ width: px + "px", maxWidth: px + "px" });
        }
        // Recompute cell widths and effective scale after changing stage width
        adjustCellWidth();
        renderPlacedTokens();
        setTableScale();
    }

    function applyLineColors(){
        const grid = ($("#gridColor").val() || "#333333");
        const split = ($("#splitterColor").val() || "#777777");
        const dec = ($("#decimalColor").val() || "#000000");
        document.documentElement.style.setProperty("--gridBorder", grid);
        document.documentElement.style.setProperty("--splitterColor", split);
        document.documentElement.style.setProperty("--decimalColor", dec);
        updateHints();
        renderBoard();
    }


        initPlacedColorSelect();
        updateHints();
        applyStageSize();
        applyLineColors();

        // Defaults (match your list)
        $("#headFontSlider").val(14);
        $("#circleFontSlider").val(12);
        $("#circleSizeSlider").val(65);
        setHeadFont(14);
        setCircleFont(12);
        setCircleSize(65);
        setTableScale();

        renderBoard();

        // Column arrows
        $("#wholeHide").on("click", wholeHide);
        $("#wholeShow").on("click", wholeShow);
        $("#fracHide").on("click", fracHide);
        $("#fracShow").on("click", fracShow);

        // Toggles
        $("#togglePlacedText").on("change", updatePlacedTextVisibility);
        $("#toggleHeaders").on("change", updateHeadersVisibility);
        $("#toggleTable").on("change", updateTableVisibility);
        $("#toggleSplitter").on("change", updateSplitterVisibility);
        $("#toggleDecimal").on("change", updateDecimalVisibility);
        $("#toggleLines").on("change", updateLinesVisibility);

        // Selects
        $("#placedColor").on("change", function(){ updateHints(); renderPlacedTokens(); });
        $("#headerStyle").on("change", function(){ updateHints(); renderBoard(); });
        $("#stageSize").on("change", function(){ updateHints(); applyStageSize(); });
        $("#gridColor").on("input", applyLineColors);
        $("#splitterColor").on("input", applyLineColors);
        $("#decimalColor").on("input", applyLineColors);

        // Sliders
        $("#headFontSlider").on("input", function(){ setHeadFont(parseInt(this.value, 10)); });
        $("#circleFontSlider").on("input", function(){ setCircleFont(parseInt(this.value, 10)); });
        $("#circleSizeSlider").on("input", function(){ setCircleSize(parseInt(this.value, 10)); });

        // Buttons
        $("#btnClear").on("click", clearBoard);
        $("#btnExport").on("click", downloadSVG);

        // Save/Load JSON buttons
        $("#btnSaveJSON").on("click", function(){ try{ saveJSONToBox(); } catch(e){ alert(e.message || String(e)); } });
        $("#btnLoadJSON").on("click", function(){ try{ loadJSONFromBox(); } catch(e){ alert(e.message || String(e)); } });
        $("#btnCopyJSON").on("click", function(){
            try{
                let txt = ($("#placeValueJsonBox").val() || "").trim();
                if(!txt){ saveJSONToBox(); txt = ($("#placeValueJsonBox").val() || "").trim(); }
                $("#placeValueJsonBox").focus().select();
                document.execCommand("copy");
            }catch(e){ alert(e.message || String(e)); }
        });
        $("#btnDownloadJSON").on("click", function(){ try{ downloadJSONFile(); } catch(e){ alert(e.message || String(e)); } });
        $("#btnUploadJSON").on("click", function(){ $("#jsonFile").val(""); $("#jsonFile").trigger("click"); });
        $("#jsonFile").on("change", function(){
            const file = this.files && this.files[0];
            if(!file) return;
            const reader = new FileReader();
            reader.onload = function(){
                try{ $("#placeValueJsonBox").val(String(reader.result || "")); loadJSONFromBox(); }
                catch(e){ alert(e.message || String(e)); }
            };
            reader.readAsText(file);
        });

        // Height drag handle
        let startY = 0, startH = 0;
        $("#heightHandle").draggable({
            axis: "y",
            helper: "original",
            containment: [0, -9999, 9999, 9999],
            start: function(event){
                startY = event.pageY;
                startH = parseFloat(getComputedStyle(document.documentElement).getPropertyValue('--bodyH'));
            },
            drag: function(event){
                const dy = event.pageY - startY;
                const newH = clamp(Math.round(startH + dy), 200, 860);
                setBodyHeight(newH);
                $(this).css({ top: 0, left: 0, position: "relative" });
            },
            stop: function(){ $(this).css({ top: 0, left: 0, position: "relative" }); }
        });

        // Resize
        let t = null;
        $(window).on("resize", function(){
            clearTimeout(t);
            t = setTimeout(function(){
                adjustCellWidth();
                renderPlacedTokens();
                setTableScale();
            }, 120);
        });
</script>
<script>
    (function(){
        function openModal(e){ if(e) e.preventDefault(); $('#toolModal').modal('show'); }
        $('#openToolLink').on('click', openModal);
        $('#toolModal').on('shown.bs.modal', function(){
            try{
                // Trigger recalculation after becoming visible
                if(window.applyStageSize) window.applyStageSize();
                if(window.adjustCellWidth) window.adjustCellWidth();
                if(window.renderBoard) window.renderBoard();
            }catch(e){}
        });
    })();


    $(document).on('click', '.insert-place-value-chart', function () {
        const svg = downloadSVG();
        console.log(svg);
        const json = ($("#placeValueJsonBox").val() || "").trim() || JSON.stringify(buildSaveObject(), null, 2);
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

            $('.rureraform-toolbar-tool-other[data-type="place_value_chart"] a').click();
            var current_element = $(".place_value_chart_element").last().attr('data-index_i');

            console.log(svg);
            rureraform_form_elements[current_element]["content"] = svg;
            rureraform_form_elements[current_element]["json_code"] = json;

            $(".place_value_chart_element").last().html(svg);
        }

        $(".place-value-chart").modal('hide');
        console.log(svg);
    });

</script>
