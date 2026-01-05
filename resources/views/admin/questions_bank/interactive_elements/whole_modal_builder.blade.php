

<style>

    .appShell{ max-width: 1200px; margin: 18px auto; }
    .panel{ background:#fff; border-radius:14px; box-shadow:0 10px 30px rgba(0,0,0,.08); }

    /* Stage */
    #stageFrame{
        position: relative;
        padding-top:70px;
        padding-bottom:50px;
        padding-left:16px;
        padding-right:16px;
        background:#eef1f4;
        border-radius:0;
        overflow:hidden;
        padding: 2px;
    }
    #stageTopBar{
        position:absolute; left:16px; right:16px; top:14px;
        display:flex; align-items:center; justify-content:space-between;
        pointer-events:none;
    }
    #stageTopBar .left, #stageTopBar .right{ pointer-events:auto; }
    .iconBtn{
        width:34px; height:34px; border-radius:10px;
        border:1px solid rgba(0,0,0,.12);
        background:#fff;
        display:inline-flex; align-items:center; justify-content:center;
        cursor:pointer;
        margin-left:8px;
        user-select:none;
    }
    .rurera_interactive_elements .select-holder {
        position: relative;
    }
    .rurera_interactive_elements .select-holder:after {
        content: "";
        border-bottom: 2px solid #666;
        border-left: 2px solid #666;
        position: absolute;
        right: 10px;
        top: 50%;
        height: 8px;
        width: 8px;
        transform: rotate(-45deg) translateY(-50%);
        margin-top: -3px;
        pointer-events: none;
        z-index: 1;
    }
    .rurera_interactive_elements .select-holder select.form-control {
        appearance: none;
        height: 31px;
    }
    .iconBtn:active{ transform: translateY(1px); }
    .iconBtn svg{ width:18px; height:18px; }

    #stageArea{
        margin: 0 auto;
        border:2px dotted rgba(0,0,0,.25);
        border-radius:12px;
        background:#fff;
        padding:12px;
        position:relative;
    }
    #stage{
        position:relative;
        width:100%;
        height:100%;
        border-radius:10px;
        overflow:hidden;
    }
    #stage.gridOn{
        background-image:
            linear-gradient(to right, rgba(0,0,0,.08) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(0,0,0,.08) 1px, transparent 1px);
        background-size: 25px 28px;
        border-radius: 0;
        border-right: 1px solid rgba(0, 0, 0, 0.08);
        margin-right: -1px;
    }

    #wires{
        position:absolute; left:0; top:0; width:100%; height:100%;
        overflow:visible;
        pointer-events:none;
    }

    #stageResizer{
        position:absolute;
        left:50%;
        bottom:6px;
        transform: translateX(-50%);
        width:110px; height:18px;
        border-radius:999px;
        background: rgba(0,0,0,.07);
        display:flex; align-items:center; justify-content:center;
        cursor: ns-resize;
        user-select:none;
    }
    #stageResizer:after{
        content:"";
        width:44px; height:4px; border-radius:999px;
        background: rgba(0,0,0,.35);
    }

    /* Nodes */
    .node{
        position:absolute;
        width: var(--nodeSize);
        height: var(--nodeSize);
        display:flex;
        align-items:center;
        justify-content:center;
        touch-action:none; /* important */
        user-select:none;
        border:3px solid #111;
        background:#fff;
        color:#111;
        box-sizing:border-box;
    }
    .node.circle{ border-radius:999px; }
    .node.rect{ border-radius:14px; }

    .node.selected{
        box-shadow: 0 0 0 3px rgba(0,123,255,.35);
    }

    .label{
        width: 88%;
        text-align:center;
        font-size: var(--fontSize);
        line-height:1.05;
        display:flex; align-items:center; justify-content:center;
    }
    .label svg{ max-width:100%; max-height:100%; }

    /* Bottom controls */
    .bottomBar{
        position:relative; bottom:0; z-index:5;
        padding:12px 14px;
        border-top:1px solid rgba(0,0,0,.08);
        background:rgba(255,255,255,.92);
        backdrop-filter: blur(6px);
        border-radius: 0 0 14px 14px;
    }

    .badgekey{
        display:inline-block;
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        font-size:12px;
        padding:2px 6px;
        border:1px solid rgba(0,0,0,.18);
        border-radius:6px;
        background:#fff;
        margin-right:6px;
    }
    .tiny{ font-size:12px; color: rgba(0,0,0,.68); }
    .rangeTitle{ display:flex; justify-content:space-between; align-items:center; }
    .rangeTitle .val{ font-size:12px; color: rgba(0,0,0,.6); }
    input[type="range"]::-webkit-slider-thumb {
        background: var(--primary);
        cursor: pointer;
        }
        input[type="range"]::-moz-range-thumb {
        background: var(--primary);
        cursor: pointer;
    }

    textarea.form-control{ font-family: ui-monospace, Menlo, Consolas, monospace; font-size:12px; }

    /* Add menu dropdown */
    #addMenu{
        position:absolute;
        right:16px;
        top:58px;
        background:#fff;
        border:1px solid rgba(0,0,0,.12);
        border-radius:12px;
        box-shadow:0 14px 30px rgba(0,0,0,.12);
        padding:8px;
        display:none;
        z-index:30;
        min-width:180px;
    }
    #addMenu .item{
        padding:8px 10px;
        border-radius:10px;
        cursor:pointer;
        display:flex; align-items:center;
    }
    #addMenu .item:hover{ background: rgba(0,0,0,.06); }
    #addMenu .dot{
        width:12px; height:12px; border:2px solid #111; border-radius:999px; margin-right:10px;
    }
    #addMenu .rectdot{
        width:12px; height:12px; border:2px solid #111; border-radius:3px; margin-right:10px;
    }

    /* Modal preview */
    #previewBox{
        width:160px; height:160px;
        display:flex; align-items:center; justify-content:center;
        margin: 0 auto 10px auto;
        background:#f6f7f9;
        border-radius:14px;
        border:1px dashed rgba(0,0,0,.25);
    }
    .rurera_interactive_elements button.btn.btn-secondary {
        background-color: #6c757d;
    }
    .rurera_interactive_elements button.btn {
        box-shadow: none;
    }
</style>
<!-- MathJax (SVG output) -->
<script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-svg.js"></script>
<script>
    window.MathJax = {
        svg: { fontCache: 'none' },
        tex: { inlineMath: [['\\(', '\\)'], ['$', '$']] },
        options: { skipHtmlTags: ['script','noscript','style','textarea','pre','code'] }
    };
</script>
<div id="rurera_interactive_elements" class="modal-fullscreen-xl rurera_interactive_elements whole-modal-builder modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content edit-quest-modal-div">
            <div class="modal-body">


                <div class="appShell">
                    <div class="panel">
                        <div id="stageFrame">
                            <div id="stageTopBar">
                                <div class="left d-flex align-items-center">
                                    <div class="mr-3">
                                        <span class="tiny font-weight-bold">Stage</span>
                                        <span id="stageDimText" class="tiny ml-2">H:400 × W:600</span>
                                    </div>
                                    <div class="select-holder">
                                        <select id="stageWidthPreset" class="form-control form-control-sm" style="width:140px;">
                                            <option value="400">W:400</option>
                                            <option value="600" selected>W:600</option>
                                            <option value="800">W:800</option>
                                        </select>
                                    </div>
                                    
                                    <div class="custom-control custom-switch ml-3">
                                        <input type="checkbox" class="custom-control-input" id="toggleGrid">
                                        <label class="custom-control-label tiny" for="toggleGrid">Grid</label>
                                    </div>
                                </div>

                                <div class="right d-flex align-items-center">
                                    <div class="iconBtn" id="btnAutoAlign" title="Auto align (cycles layouts)">
                                        <svg viewBox="0 0 24 24" fill="none"><path d="M6 7h12M6 12h8M6 17h12" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                                    </div>

                                    <div class="iconBtn" id="btnAdd" title="Add shape">
                                        <svg viewBox="0 0 24 24" fill="none"><path d="M12 5v14M5 12h14" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                                    </div>

                                    <div class="iconBtn" id="btnClearStage" title="Clear stage">
                                        <svg viewBox="0 0 24 24" fill="none"><path d="M6 6l12 12M18 6L6 18" stroke="#111" stroke-width="2" stroke-linecap="round"/></svg>
                                    </div>
                                </div>
                            </div>

                            <div id="addMenu" aria-hidden="true">
                                <div class="item" data-shape="circle"><span class="dot"></span><span>Add circle</span></div>
                                <div class="item" data-shape="rect"><span class="rectdot"></span><span>Add rectangle</span></div>
                            </div>

                            <div id="stageArea">
                                <div id="stage">
                                    <svg id="wires"></svg>
                                </div>
                                <div id="stageResizer" title="Drag to change stage height"></div>
                            </div>
                        </div>

                        <div class="bottomBar">
                            <div class="d-flex flex-wrap align-items-center mb-2">
                                <span class="badgekey">Drag</span><span class="tiny mr-3">move shapes (touch supported)</span>
                                <span class="badgekey">Ctrl/⌘ + Click</span><span class="tiny mr-3">multi-select</span>
                                <span class="badgekey">Shift + Click</span><span class="tiny mr-3">connect (selected → clicked)</span>
                                <span class="badgekey">Ctrl/⌘ + A</span><span class="tiny mr-3">select all</span>
                                <span class="badgekey">Delete</span><span class="tiny mr-3">delete selected (asks)</span>
                                <span class="badgekey">Double click</span><span class="tiny mr-3">edit shape</span>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <div class="rangeTitle"><div class="tiny">Node size</div><div class="val"><span id="vNodeSize">110</span>px</div></div>
                                            <input id="nodeSize" type="range" min="70" max="180" step="2" value="110">
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="rangeTitle"><div class="tiny">Font size</div><div class="val"><span id="vFontSize">18</span>px</div></div>
                                            <input id="fontSize" type="range" min="10" max="34" step="1" value="18">
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="rangeTitle"><div class="tiny">Line stroke</div><div class="val"><span id="vLineStroke">4</span>px</div></div>
                                            <input id="lineStroke" type="range" min="1" max="10" step="1" value="4">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <div class="rangeTitle"><div class="tiny">Arrow size</div><div class="val"><span id="vArrowSize">12</span>px</div></div>
                                            <input id="arrowSize" type="range" min="8" max="22" step="1" value="12">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <div class="rangeTitle"><div class="tiny">Arrow stroke</div><div class="val"><span id="vArrowStroke">0</span>px</div></div>
                                            <input id="arrowStroke" type="range" min="0" max="6" step="1" value="0">
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="tiny mb-1">Line type</div>
                                            <div class="select-holder">
                                                <select id="lineDash" class="form-control form-control-sm">
                                                    <option value="none" selected>Solid</option>
                                                    <option value="dashed">Dashed</option>
                                                    <option value="dotted">Dotted</option>
                                                </select>
                                            </div>
                                            
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="tiny mb-1">Arrows</div>
                                            <div class="select-holder">
                                                <select id="arrowMode" class="form-control form-control-sm">
                                                    <option value="none">None</option>
                                                    <option value="start">Start</option>
                                                    <option value="end" selected>End</option>
                                                    <option value="both">Both</option>
                                                </select>
                                            </div>
                                            
                                        </div>

                                        <div class="col-md-4 mt-2">
                                            <div class="tiny mb-1">Arrow style</div>
                                            <div class="select-holder">
                                                <select id="arrowStyle" class="form-control form-control-sm">
                                                    <option value="triangle" selected>Triangle</option>
                                                    <option value="wide">Wide</option>
                                                    <option value="chevron">Chevron</option>
                                                    <option value="diamond">Diamond</option>
                                                    <option value="circle">Circle</option>
                                                </select>
                                            </div>
                                            
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <div class="tiny mb-1">Line colour</div>
                                            <input id="lineColor" type="color" class="form-control form-control-sm" value="#111111">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <div class="tiny mb-1">New shapes default style</div>
                                            <div class="d-flex">
                                                <input id="defFill" type="color" class="form-control form-control-sm mr-2" value="#ffffff" title="Fill">
                                                <input id="defBorder" type="color" class="form-control form-control-sm mr-2" value="#111111" title="Border">
                                                <input id="defText" type="color" class="form-control form-control-sm" value="#111111" title="Text">
                                            </div>
                                            <div class="d-flex mt-2">
                                                <input id="defBorderW" type="range" min="0" max="10" step="1" value="3" class="mr-2" style="flex:1;">
                                                <div class="select-holder">
                                                    <select id="defBorderStyle" class="form-control form-control-sm" style="width:120px;">
                                                        <option value="solid" selected>Solid</option>
                                                        <option value="dashed">Dashed</option>
                                                        <option value="dotted">Dotted</option>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-5 mt-2 rurera-hide">
                                    <div class="small font-weight-bold mb-1">Save / load</div>
                                    <div class="mb-2">
                                        <button id="btnSaveJson" class="btn btn-primary btn-sm">Save JSON</button>
                                        <button id="btnLoadJson" class="btn btn-outline-success load-json-btn btn-sm">Load JSON</button>
                                        <input id="jsonFile" type="file" accept="application/json" style="display:none;">
                                    </div>

                                    <div class="mb-2">
                                        <button id="btnExportSvg" class="btn btn-info btn-sm">Export SVG</button>
                                        <button id="btnDownloadSvg" class="btn btn-outline-info btn-sm">Download SVG</button>
                                    </div>

                                    <textarea id="jsonBox" class="form-control mb-2" rows="5" placeholder="JSON appears here...">{  "version": 27,  "stage": {    "width": 600,    "height": 400  },  "vars": {    "nodeSize": "110px",    "fontSize": "18px",    "lineStroke": "4px",    "lineColor": "#111111",    "lineDash": "none",    "arrowMode": "end",    "arrowStyle": "triangle",    "arrowSize": "12px",    "arrowStroke": "0px"  },  "defaults": {    "fill": "#ffffff",    "border": "#111111",    "text": "#111111",    "borderW": 3,    "borderStyle": "solid"  },  "nodes": [    {      "id": "1",      "x": 396.79998779296875,      "y": 59.19999694824219,      "shape": "circle",      "label": "Whole",      "isMath": false,      "svgLabel": null,      "eqScale": 1,      "fill": "#ffffff",      "border": "#111111",      "text": "#111111",      "borderW": 3,      "borderStyle": "solid",      "locked": false    },    {      "id": "2",      "x": 164,      "y": 7.599952697753906,      "shape": "circle",      "label": "\\frac{3}{5}",      "isMath": false,      "svgLabel": null,      "eqScale": 1,      "fill": "#ffffff",      "border": "#111111",      "text": "#111111",      "borderW": 3,      "borderStyle": "solid",      "locked": false    },    {      "id": "3",      "x": 392,      "y": 286.00000762939453,      "shape": "rect",      "label": "40%",      "isMath": false,      "svgLabel": null,      "eqScale": 1,      "fill": "#ffffff",      "border": "#111111",      "text": "#111111",      "borderW": 3,      "borderStyle": "solid",      "locked": false    }  ],  "edges": [    {      "from": "1",      "to": "2"    },    {      "from": "1",      "to": "3"    }  ]}</textarea>
                                    <textarea id="svgBox" class="form-control" rows="5" placeholder="SVG appears here..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:720px;">
                        <div class="modal-content" style="border-radius:14px;">
                            <div class="modal-header">
                                <h6 class="modal-title" id="modalTitle">Edit shape</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div id="previewBox"></div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="tiny">Label / Equation</label>
                                        <input id="mLabel" type="text" class="form-control form-control-sm" placeholder="e.g. 25% or \frac{5}{x}">
                                        <div class="custom-control custom-checkbox mt-2">
                                            <input type="checkbox" class="custom-control-input" id="mIsMath">
                                            <label class="custom-control-label tiny" for="mIsMath">Treat as MathJax equation</label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="tiny">Shape</label>
                                        <div class="select-holder">
                                            <select id="mShape" class="form-control form-control-sm">
                                                <option value="circle">Circle</option>
                                                <option value="rect">Rectangle</option>
                                            </select>
                                        </div>
                                        

                                        <div class="custom-control custom-checkbox mt-2">
                                            <input type="checkbox" class="custom-control-input" id="mLocked">
                                            <label class="custom-control-label tiny" for="mLocked">Locked (cannot move)</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="tiny">Fill</label>
                                        <input id="mFill" type="color" class="form-control form-control-sm" value="#ffffff">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="tiny">Border</label>
                                        <input id="mBorder" type="color" class="form-control form-control-sm" value="#111111">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="tiny">Text</label>
                                        <input id="mText" type="color" class="form-control form-control-sm" value="#111111">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <div class="rangeTitle"><div class="tiny">Border width</div><div class="val"><span id="vMBorderW">3</span>px</div></div>
                                        <input id="mBorderW" type="range" min="0" max="10" step="1" value="3">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="tiny">Border style</label>
                                        <div class="select-holder">
                                            <select id="mBorderStyle" class="form-control form-control-sm">
                                                <option value="solid" selected>Solid</option>
                                                <option value="dashed">Dashed</option>
                                                <option value="dotted">Dotted</option>
                                            </select>
                                        </div>
                                        
                                        <div class="tiny mt-2 text-muted">Use border width 0 for no border</div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="rangeTitle"><div class="tiny">Equation scale</div><div class="val"><span id="vMEqScale">1.00</span>x</div></div>
                                        <input id="mEqScale" type="range" min="0.6" max="1.4" step="0.05" value="1">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button id="btnDeleteInModal" type="button" class="btn btn-outline-danger btn-sm mr-auto">Delete</button>
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                <button id="btnSaveModal" type="button" class="btn btn-primary btn-sm">Save</button>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="container-fluid py-3 appWrap rurera-hide">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h4 class="m-0">Part–Whole Model Builder</h4>
                        <div class="d-flex align-items-center">
                            <!-- controls are shown by default (no toggle button) -->
                        </div>
                    </div>

                    <div id="stageFrame">
                        <div id="stageArea">
                            <div id="stage">

                                <svg id="wires"></svg>
                                <div id="nodesLayer"></div>
                                <div id="stageOverlay">
                                    <span id="stageHeightText" class="ov-pill">H: 0px</span>

                                    <button id="btnAutoAlignIcon" class="ov-btn" data-toggle="tooltip" data-placement="bottom" title="Auto tree alignment">⟲</button>

                                    <div class="ov-dd">
                                        <button id="btnAddIcon" class="ov-btn" data-toggle="tooltip" data-placement="bottom" title="Add new shape">＋</button>
                                        <div id="addMenu" class="ov-menu shadow-sm">
                                            <button class="btn btn-light btn-sm btn-block text-left" id="addMenuCircle">◯ Add circle</button>
                                            <button class="btn btn-light btn-sm btn-block text-left" id="addMenuRect">▭ Add rectangle</button>
                                        </div>
                                    </div>

                                    <button id="btnClearSelIcon" class="ov-btn" data-toggle="tooltip" data-placement="bottom" title="Clear stage">✕</button>
                                </div>

                            </div>

                            <div id="stageResizer"><div class="grip"></div></div>
                        </div>

                        <div id="bottomBar">
                            <!-- help + quick actions -->
                            <div class="d-flex flex-wrap align-items-center mb-2">
                                <span class="badgekey">Drag</span><span class="tiny mr-3">move shapes (touch supported)</span>
                                <span class="badgekey">Ctrl/⌘ + Click</span><span class="tiny mr-3">multi-select</span>
                                <span class="badgekey">Shift + Click</span><span class="tiny mr-3">connect (selected → clicked)</span>
                                <span class="badgekey">Drag selected</span><span class="tiny mr-3">moves group</span>
                                <span class="badgekey">Double click</span><span class="tiny mr-3">edit</span>
                            </div>

                            <div class="d-flex flex-wrap align-items-center mb-2">
                                <span class="badgekey">Ctrl/⌘ + A</span><span class="tiny mr-3">select all</span>
                                <span class="badgekey">Delete</span><span class="tiny mr-3">delete selected (asks first)</span>
                            </div>

                            <div class="row">
                                <div class="col-lg-5 mb-2 mb-lg-0">
                                    <label class="tiny mb-1">Add text / equation</label>
                                    <textarea id="addText" class="form-control mono" rows="2" placeholder="Examples: 100%   0.7   A   \frac{1}{10}"></textarea>
                                </div>
                                <div class="col-lg-7"></div>
                            </div>

                            <!-- controls -->
                            <div class="mt-2" id="controlsAlways">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="small font-weight-bold mb-1">New shape defaults</div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="tiny mb-1">Border</div>
                                                    <input id="addBorder" type="color" class="form-control swatch" value="#111111">
                                                </div>
                                                <div class="col-4">
                                                    <div class="tiny mb-1">Fill</div>
                                                    <input id="addFill" type="color" class="form-control swatch" value="#ffffff">
                                                </div>
                                                <div class="col-4">
                                                    <div class="tiny mb-1">Text</div>
                                                    <input id="addTextColor" type="color" class="form-control swatch" value="#111111">
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <div class="tiny mb-1">Border width</div>
                                                    <select id="addBorderW" class="form-control form-control-sm">
                                                        <option value="0">No border</option>
                                                        <option value="1">1px</option>
                                                        <option value="2">2px</option>
                                                        <option value="3" selected>3px</option>
                                                        <option value="4">4px</option>
                                                        <option value="5">5px</option>
                                                        <option value="6">6px</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="tiny">Equation scale</div>
                                                        <div class="tiny"><span id="vAddEq">1.00</span>x</div>
                                                    </div>
                                                    <input id="addEqScale" type="range" min="0.50" max="1.20" step="0.05" value="1">
                                                </div>
                                            </div>

                                            <div class="mt-2">
                                                <div class="d-flex justify-content-between"><div class="tiny mb-1">Node size</div><div class="tiny text-muted"><span id="vNodeSize">110</span>px</div></div>
                                                <input id="nodeSize" type="range" min="70" max="180" step="2" value="110">
                                            </div>

                                            <div class="mt-2">
                                                <div class="d-flex justify-content-between"><div class="tiny mb-1">Font size</div><div class="tiny text-muted"><span id="vFontSize">18</span>px</div></div>
                                                <input id="fontSize" type="range" min="10" max="34" step="1" value="18">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 mt-3 mt-lg-0">
                                            <div class="small font-weight-bold mb-1">Lines</div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="tiny mb-1">Colour</div>
                                                    <input id="lineColor" type="color" class="form-control swatch" value="#111111">
                                                </div>
                                                <div class="col-6">
                                                    <div class="tiny mb-1">Style</div>
                                                    <select id="lineStyle" class="form-control form-control-sm">
                                                        <option value="none" selected>Solid</option>
                                                        <option value="dashed">Dashed</option>
                                                        <option value="dotted">Dotted</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <div class="tiny mb-1">Arrows</div>
                                                <select id="arrowMode" class="form-control form-control-sm">
                                                    <option value="none">No arrows</option>
                                                    <option value="start">Arrow at start</option>
                                                    <option value="end" selected>Arrow at end</option>
                                                    <option value="both">Arrows both ends</option>
                                                </select>
                                            </div>

                                            <div class="mt-2">
                                                <div class="tiny mb-1">Arrow style</div>
                                                <select id="arrowStyle" class="form-control form-control-sm">
                                                    <option value="triangle" selected>Triangle</option>
                                                    <option value="wide">Wide triangle</option>
                                                    <option value="chevron">Chevron</option>
                                                    <option value="diamond">Diamond</option>
                                                    <option value="circle">Circle</option>
                                                </select>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <div class="d-flex justify-content-between"><div class="tiny mb-1">Arrow size</div><div class="tiny text-muted"><span id="vArrowSize">12</span>px</div></div>
                                                    <input id="arrowSize" type="range" min="8" max="22" step="1" value="12">
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex justify-content-between"><div class="tiny mb-1">Arrow stroke</div><div class="tiny text-muted"><span id="vArrowStroke">0</span>px</div></div>
                                                    <input id="arrowStroke" type="range" min="0" max="6" step="1" value="0">
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <div class="d-flex justify-content-between"><div class="tiny mb-1">Line stroke</div><div class="tiny text-muted"><span id="vLineStroke">4</span>px</div></div>
                                                <input id="lineStroke" type="range" min="1" max="10" step="1" value="4">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 mt-3 mt-lg-0">
                                            <div class="small font-weight-bold mb-1">Stage</div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="tiny mb-1">Width preset</div>
                                                    <select id="stageWidthPreset" class="form-control form-control-sm">
                                                        <option value="auto">Auto (100%)</option>
                                                        <option value="400">400px</option>
                                                        <option value="600" selected>600px</option>
                                                        <option value="800">800px</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 d-flex align-items-end">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="toggleGrid">
                                                        <label class="custom-control-label tiny" for="toggleGrid">Grid</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <div class="small font-weight-bold mb-1">Save / load</div>
                                                <button id="btnSaveJson" class="btn btn-success btn-sm mr-2">Save JSON</button>
                                                <button id="btnLoadJson" class="btn btn-outline-success btn-sm mr-2">Load JSON</button>
                                                <button id="btnExportSvg2" class="btn btn-info btn-sm mr-2">Export SVG</button>
                                                <button id="btnDownloadSvg2" class="btn btn-outline-info btn-sm" disabled>Download SVG</button>
                                                <input id="jsonFile" type="file" accept="application/json" class="d-none"/>
                                                <textarea id="jsonBox" class="form-control mono mt-2" rows="5" placeholder="JSON appears here..."></textarea>
                                            </div>

                                            <div class="mt-3">
                                                <div class="small font-weight-bold mb-1">SVG</div>
                                                <textarea id="svgBox" class="form-control mono" rows="5" placeholder="SVG appears here..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /controlsAlways -->
                        </div><!-- /bottomBar -->
                    </div><!-- /stageFrame -->
                </div>



            </div>
            <div class="modal-footer">
                <div class="text-right">
                    <a href="javascript:;" class="btn btn-primary insert-whole-modal" data-insert_id="-1">Insert</a>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="nodeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Edit shape</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label class="small font-weight-bold mb-1">Text / equation</label>
                    <textarea id="mLabel" class="form-control mono" rows="2"></textarea>
                </div>

                <div class="mt-3">
                    <div class="small font-weight-bold mb-1">Preview</div>
                    <div class="preview-wrap">
                        <div id="modalPreviewNode" class="preview-node">
                            <div id="modalPreviewLabel" class="label"></div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-4">
                        <div class="tiny mb-1">Border</div>
                        <input id="mBorder" type="color" class="form-control swatch">
                    </div>
                    <div class="col-4">
                        <div class="tiny mb-1">Fill</div>
                        <input id="mFill" type="color" class="form-control swatch">
                    </div>
                    <div class="col-4">
                        <div class="tiny mb-1">Text</div>
                        <input id="mText" type="color" class="form-control swatch">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <div class="tiny mb-1">Shape</div>
                        <select id="mShape" class="form-control form-control-sm">
                            <option value="circle">Circle</option>
                            <option value="rect">Rectangle</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="tiny mb-1">Border width</div>
                        <select id="mBorderW" class="form-control form-control-sm">
                            <option value="0">No border</option>
                            <option value="1">1px</option>
                            <option value="2">2px</option>
                            <option value="3">3px</option>
                            <option value="4">4px</option>
                            <option value="5">5px</option>
                            <option value="6">6px</option>
                        </select>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="d-flex justify-content-between">
                        <div class="tiny">Equation scale</div>
                        <div class="tiny"><span id="mEqVal">1.00</span>x</div>
                    </div>
                    <input id="mEqScale" type="range" min="0.50" max="1.20" step="0.05" value="1">
                </div>

                <div class="custom-control custom-switch mt-3">
                    <input type="checkbox" class="custom-control-input" id="mLocked">
                    <label class="custom-control-label" for="mLocked">Locked (cannot drag)</label>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancel</button>
                <button id="mSave" type="button" class="btn btn-primary btn-sm">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>

    (function(){
        const state = {
            nodes: new Map(),
            edges: [],
            selected: new Set(),
            lastSelected: null,
            nextId: 1,
            stageHeight: 400,
            stageWidth: 600,
            alignMode: -1,
            drag: null
        };

        const stageArea = document.getElementById('stageArea');
        const stage = document.getElementById('stage');
        const wires = document.getElementById('wires');

        function clamp(v,a,b){ return Math.max(a, Math.min(b,v)); }
        function setCSSVar(name,val){ document.documentElement.style.setProperty(name,val); }
        function getCSSVar(name){ return getComputedStyle(document.documentElement).getPropertyValue(name).trim(); }
        function getVarPx(name){ return parseFloat(getCSSVar(name)) || 0; }

        function updateDimText(){
            document.getElementById('stageDimText').textContent = `H:${Math.round(stage.clientHeight)} × W:${Math.round(stage.clientWidth)}`;
        }

        function applyStageSize(){
            state.stageWidth = parseInt(document.getElementById('stageWidthPreset').value,10) || 600;
            state.stageHeight = clamp(state.stageHeight, 220, 1400);
            stageArea.style.width = state.stageWidth + 'px';
            stageArea.style.maxWidth = '100%';
            stageArea.style.marginLeft = 'auto';
            stageArea.style.marginRight = 'auto';
            stage.style.height = state.stageHeight + 'px';
            wires.setAttribute('viewBox', `0 0 ${stage.clientWidth} ${stage.clientHeight}`);
            updateDimText();
            drawLines();
        }

        function applyNodeStyle(el,node){
            el.classList.toggle('circle', (node.shape||'circle')==='circle');
            el.classList.toggle('rect', (node.shape||'circle')==='rect');
            el.style.background = node.fill || '#fff';
            const bw = (node.borderW ?? 3);
            el.style.borderColor = (bw===0) ? 'transparent' : (node.border || '#111');
            el.style.borderWidth = bw + 'px';
            el.style.borderStyle = (bw===0) ? 'solid' : (node.borderStyle || 'solid');
            el.style.color = node.text || '#111';
            el.style.opacity = node.locked ? '0.92' : '1';
        }

        function isMathLike(s){
            if(!s) return false;
            return /\\[a-zA-Z]+|\\\(|\\\)|\$\$|\$/.test(s);
        }

        async function renderLabel(id){
            const node = state.nodes.get(id);
            const el = stage.querySelector(`.node[data-id="${id}"]`);
            if(!node || !el) return;
            const labelEl = el.querySelector('.label');
            if(!labelEl) return;

            labelEl.innerHTML = '';
            const txt = (node.label||'').trim();
            if(!txt){ node.isMath=false; node.svgLabel=null; return; }

            const treatAsMath = !!node.isMath || isMathLike(txt);
            if(treatAsMath && window.MathJax && MathJax.tex2svgPromise){
                try{
                    let tex = txt.replace(/^\s*\$\s*/,'').replace(/\s*\$\s*$/,'');
                    tex = tex.replace(/^\s*\\\(\s*/,'').replace(/\s*\\\)\s*$/,'');
                    const wrapper = await MathJax.tex2svgPromise(tex, {display:false});
                    const svg = wrapper.querySelector('svg');
                    if(svg){
                        svg.setAttribute('shape-rendering','geometricPrecision');
                        svg.style.maxWidth='100%';
                        svg.style.maxHeight='100%';
                        node.isMath = true;
                        node.svgLabel = svg.outerHTML;
                        labelEl.innerHTML = node.svgLabel;
                        return;
                    }
                }catch(err){
                    console.warn('MathJax render failed', err);
                }
            }
            node.isMath=false;
            node.svgLabel=null;
            labelEl.textContent = txt;
        }

        function makeNodeEl(id,node){
            const el = document.createElement('div');
            el.className = `node ${node.shape||'circle'}`;
            el.dataset.id = id;
            const label = document.createElement('div');
            label.className = 'label';
            el.appendChild(label);
            applyNodeStyle(el,node);
            el.style.left = node.x+'px';
            el.style.top = node.y+'px';
            el.addEventListener('pointerdown', (e)=>onNodePointerDown(e,id));
            el.addEventListener('dblclick', (e)=>{ e.stopPropagation(); openModal('edit', id); });
            stage.appendChild(el);
            renderLabel(id);
        }

        function addNode(shape='circle', atCenter=true){
            const s = getVarPx('--nodeSize');
            const id = String(state.nextId++);
            const x = atCenter ? (stage.clientWidth/2 - s/2) : 40;
            const y = atCenter ? (stage.clientHeight/2 - s/2) : 40;
            state.nodes.set(id, {
                x: clamp(x, 0, Math.max(0, stage.clientWidth - s)),
                y: clamp(y, 0, Math.max(0, stage.clientHeight - s)),
                shape,
                label: 'A',
                isMath:false,
                svgLabel:null,
                eqScale:1,
                fill: document.getElementById('defFill').value,
                border: document.getElementById('defBorder').value,
                text: document.getElementById('defText').value,
                borderW: parseInt(document.getElementById('defBorderW').value,10),
                borderStyle: document.getElementById('defBorderStyle').value,
                locked:false
            });
            makeNodeEl(id, state.nodes.get(id));
            return id;
        }

        function setSelected(id,on){
            const el = stage.querySelector(`.node[data-id="${id}"]`);
            if(on) state.selected.add(id); else state.selected.delete(id);
            if(el) el.classList.toggle('selected', on);
        }
        function clearSelection(){
            for(const id of Array.from(state.selected)) setSelected(id,false);
            state.selected.clear();
            state.lastSelected=null;
        }
        function ensurePrimarySelected(id){
            if(!state.selected.has(id)){
                clearSelection();
                setSelected(id,true);
            }
            state.lastSelected=id;
        }
        function selectAll(){
            clearSelection();
            for(const id of state.nodes.keys()){
                setSelected(id,true);
                state.lastSelected=id;
            }
        }

        function addEdge(from,to){
            if(state.edges.some(e=>e.from===from && e.to===to)) return;
            state.edges.push({from,to});
            drawLines();
        }

        function getPointerStagePos(e){
            const r = stage.getBoundingClientRect();
            return {x:e.clientX-r.left, y:e.clientY-r.top};
        }

        function onNodePointerDown(e,id){
            e.preventDefault();
            e.stopPropagation();
            const node = state.nodes.get(id);
            if(!node || node.locked) return;

            if(e.shiftKey){
                if(state.selected.size===0) return;
                const from = state.lastSelected || Array.from(state.selected)[0];
                if(from && from!==id) addEdge(from, id);
                return;
            }

            if(e.ctrlKey || e.metaKey){
                const newState = !state.selected.has(id);
                setSelected(id,newState);
                state.lastSelected=id;
                if(state.selected.size===0) state.lastSelected=null;
            }else{
                ensurePrimarySelected(id);
            }

            const start = getPointerStagePos(e);
            const s = getVarPx('--nodeSize');
            const offsets = [];
            for(const sid of state.selected){
                const n = state.nodes.get(sid);
                if(n && !n.locked) offsets.push({id:sid, ox:n.x-start.x, oy:n.y-start.y});
            }
            if(!offsets.length) return;

            const pid = e.pointerId;
            stage.querySelector(`.node[data-id="${id}"]`).setPointerCapture(pid);
            state.drag = {pid, offsets};

            function move(ev){
                if(!state.drag || ev.pointerId!==state.drag.pid) return;
                ev.preventDefault();
                const p = getPointerStagePos(ev);
                for(const it of state.drag.offsets){
                    const n = state.nodes.get(it.id);
                    if(!n || n.locked) continue;
                    n.x = clamp(p.x+it.ox, 0, Math.max(0, stage.clientWidth - s));
                    n.y = clamp(p.y+it.oy, 0, Math.max(0, stage.clientHeight - s));
                    const el = stage.querySelector(`.node[data-id="${it.id}"]`);
                    if(el){ el.style.left=n.x+'px'; el.style.top=n.y+'px'; }
                }
                drawLines();
            }
            function up(ev){
                if(!state.drag || ev.pointerId!==state.drag.pid) return;
                state.drag=null;
                window.removeEventListener('pointermove', move);
                window.removeEventListener('pointerup', up);
            }
            window.addEventListener('pointermove', move, {passive:false});
            window.addEventListener('pointerup', up, {passive:false});
        }

        stage.addEventListener('pointerdown', (e)=>{
            if(e.target===stage || e.target===wires) clearSelection();
        });

        function nodeCenter(n){
            const s = getVarPx('--nodeSize');
            return {x:n.x+s/2, y:n.y+s/2};
        }
        function boundaryPoint(n, toward){
            const s = getVarPx('--nodeSize');
            const cx=n.x+s/2, cy=n.y+s/2;
            const dx=toward.x-cx, dy=toward.y-cy;
            if((n.shape||'circle')==='rect'){
                const hw=s/2, hh=s/2;
                const adx=Math.abs(dx), ady=Math.abs(dy);
                const tx=hw/(adx||1e-6), ty=hh/(ady||1e-6);
                const t=Math.min(tx,ty);
                return {x:cx+dx*t, y:cy+dy*t};
            }else{
                const r=s/2, len=Math.hypot(dx,dy)||1e-6;
                return {x:cx+dx/len*r, y:cy+dy/len*r};
            }
        }
        function dashArray(){
            const dash=getCSSVar('--lineDash');
            const w=getVarPx('--lineStroke');
            if(dash==='dashed') return `${w*3} ${w*2}`;
            if(dash==='dotted') return `1 ${w*2}`;
            return '';
        }
        function markerPath(kind, flip){
            if(kind==='diamond') return flip ? 'M 10 5 L 5 0 L 0 5 L 5 10 Z' : 'M 0 5 L 5 0 L 10 5 L 5 10 Z';
            if(kind==='chevron') return flip ? 'M 8 1 L 2 5 L 8 9' : 'M 2 1 L 8 5 L 2 9';
            if(kind==='wide') return flip ? 'M 10 0 L 0 5 L 10 10 Z' : 'M 0 0 L 10 5 L 0 10 Z';
            return flip ? 'M 10 0 L 0 5 L 10 10 Z' : 'M 0 0 L 10 5 L 0 10 Z';
        }
        function drawMarker(id, flip){
            const lineColor=getCSSVar('--lineColor')||'#111';
            const arrowSize=parseInt(getCSSVar('--arrowSize'))||12;
            const arrowStroke=parseInt(getCSSVar('--arrowStroke'))||0;
            const style=getCSSVar('--arrowStyle')||'triangle';
            const refX=flip?1:9, refY=5;
            let content='';
            if(style==='circle'){
                content=`<circle cx="5" cy="5" r="4" fill="${lineColor}" ${arrowStroke>0?`stroke="${lineColor}" stroke-width="${arrowStroke}"`:''}/>`;
            }else if(style==='chevron'){
                const sw=Math.max(1, arrowStroke||2);
                content=`<path d="${markerPath(style, flip)}" fill="none" stroke="${lineColor}" stroke-width="${sw}" stroke-linecap="round" stroke-linejoin="round"/>`;
            }else{
                content=`<path d="${markerPath(style, flip)}" fill="${lineColor}" ${arrowStroke>0?`stroke="${lineColor}" stroke-width="${arrowStroke}"`:''}/>`;
            }
            return `<marker id="${id}" markerWidth="${arrowSize}" markerHeight="${arrowSize}" refX="${refX}" refY="${refY}" orient="auto" markerUnits="userSpaceOnUse" viewBox="0 0 10 10">${content}</marker>`;
        }

        function drawLines(){
            const W=stage.clientWidth, H=stage.clientHeight;
            wires.setAttribute('viewBox', `0 0 ${W} ${H}`);
            wires.innerHTML='';
            const defs=document.createElementNS('http://www.w3.org/2000/svg','defs');
            defs.innerHTML = drawMarker('arrowEnd',false)+drawMarker('arrowStart',true);
            wires.appendChild(defs);

            const lineColor=getCSSVar('--lineColor')||'#111';
            const lineStroke=getVarPx('--lineStroke');
            const dash=dashArray();
            const arrowMode=getCSSVar('--arrowMode')||'end';

            for(const e of state.edges){
                const a=state.nodes.get(e.from), b=state.nodes.get(e.to);
                if(!a||!b) continue;
                const ca=nodeCenter(a), cb=nodeCenter(b);
                const p1=boundaryPoint(a, cb);
                const p2=boundaryPoint(b, ca);

                const line=document.createElementNS('http://www.w3.org/2000/svg','line');
                line.setAttribute('x1', p1.x); line.setAttribute('y1', p1.y);
                line.setAttribute('x2', p2.x); line.setAttribute('y2', p2.y);
                line.setAttribute('stroke', lineColor);
                line.setAttribute('stroke-width', lineStroke);
                line.setAttribute('stroke-linecap','round');
                if(dash) line.setAttribute('stroke-dasharray', dash);
                if(arrowMode==='end' || arrowMode==='both') line.setAttribute('marker-end','url(#arrowEnd)');
                if(arrowMode==='start' || arrowMode==='both') line.setAttribute('marker-start','url(#arrowStart)');
                wires.appendChild(line);
            }
        }

        // Modal
        let modalMode='edit', modalId=null;
        function updateModalPreview(){
            const shape=document.getElementById('mShape').value;
            const fill=document.getElementById('mFill').value;
            const border=document.getElementById('mBorder').value;
            const text=document.getElementById('mText').value;
            const bw=parseInt(document.getElementById('mBorderW').value,10);
            const bs=document.getElementById('mBorderStyle').value;
            const label=document.getElementById('mLabel').value.trim();
            const isMath=document.getElementById('mIsMath').checked || isMathLike(label);
            const eqScale=parseFloat(document.getElementById('mEqScale').value);

            document.getElementById('vMBorderW').textContent = String(bw);
            document.getElementById('vMEqScale').textContent = Number(eqScale).toFixed(2);

            const box=document.getElementById('previewBox');
            box.innerHTML='';
            const el=document.createElement('div');
            el.className='node '+(shape==='rect'?'rect':'circle');
            el.style.position='relative';
            el.style.width='140px'; el.style.height='140px';
            el.style.background=fill;
            el.style.borderColor=(bw===0)?'transparent':border;
            el.style.borderWidth=bw+'px';
            el.style.borderStyle=(bw===0)?'solid':bs;
            el.style.color=text;
            const lab=document.createElement('div');
            lab.className='label';
            el.appendChild(lab);
            box.appendChild(el);

            if(!label) return;
            if(isMath && window.MathJax && MathJax.tex2svgPromise){
                let tex=label.replace(/^\s*\$\s*/,'').replace(/\s*\$\s*$/,'');
                tex=tex.replace(/^\s*\\\(\s*/,'').replace(/\s*\\\)\s*$/,'');
                MathJax.tex2svgPromise(tex,{display:false}).then(w=>{
                    const svg=w.querySelector('svg');
                    if(svg){
                        svg.style.transform=`scale(${eqScale})`;
                        svg.style.transformOrigin='center center';
                        lab.innerHTML=svg.outerHTML;
                    }else lab.textContent=label;
                }).catch(()=>lab.textContent=label);
            }else{
                lab.textContent=label;
            }
        }

        function openModal(mode,id=null,shape='circle'){
            modalMode=mode; modalId=id;
            document.getElementById('btnDeleteInModal').style.display = (mode==='edit')?'':'none';
            document.getElementById('modalTitle').textContent = (mode==='edit')?'Edit shape':'Add shape';

            const n = (mode==='edit') ? state.nodes.get(id) : {
                label:'A', isMath:false, eqScale:1, shape,
                fill:document.getElementById('defFill').value,
                border:document.getElementById('defBorder').value,
                text:document.getElementById('defText').value,
                borderW:parseInt(document.getElementById('defBorderW').value,10),
                borderStyle:document.getElementById('defBorderStyle').value,
                locked:false
            };

            document.getElementById('mLabel').value = n.label||'';
            document.getElementById('mIsMath').checked = !!n.isMath || isMathLike(n.label||'');
            document.getElementById('mShape').value = n.shape||'circle';
            document.getElementById('mLocked').checked = !!n.locked;
            document.getElementById('mFill').value = n.fill||'#ffffff';
            document.getElementById('mBorder').value = n.border||'#111111';
            document.getElementById('mText').value = n.text||'#111111';
            document.getElementById('mBorderW').value = (n.borderW ?? 3);
            document.getElementById('mBorderStyle').value = n.borderStyle||'solid';
            document.getElementById('mEqScale').value = (n.eqScale ?? 1);

            updateModalPreview();
            $('#editModal').modal('show');
        }

        ['mLabel','mIsMath','mShape','mFill','mBorder','mText','mBorderW','mBorderStyle','mEqScale'].forEach(id=>{
            document.getElementById(id).addEventListener('input', updateModalPreview);
            document.getElementById(id).addEventListener('change', updateModalPreview);
        });

        document.getElementById('btnSaveModal').addEventListener('click', async ()=>{
            const label=document.getElementById('mLabel').value.trim();
            const isMath=document.getElementById('mIsMath').checked || isMathLike(label);
            const shape=document.getElementById('mShape').value;
            const locked=document.getElementById('mLocked').checked;
            const fill=document.getElementById('mFill').value;
            const border=document.getElementById('mBorder').value;
            const text=document.getElementById('mText').value;
            const borderW=parseInt(document.getElementById('mBorderW').value,10);
            const borderStyle=document.getElementById('mBorderStyle').value;
            const eqScale=parseFloat(document.getElementById('mEqScale').value);

            let id=modalId;
            if(modalMode==='create') id=addNode(shape,true);

            const n=state.nodes.get(id);
            n.label=label; n.isMath=!!isMath; n.eqScale=eqScale;
            n.shape=shape; n.locked=locked;
            n.fill=fill; n.border=border; n.text=text;
            n.borderW=borderW; n.borderStyle=borderStyle;
            n.svgLabel=null;

            // sync defaults
            document.getElementById('defFill').value=fill;
            document.getElementById('defBorder').value=border;
            document.getElementById('defText').value=text;
            document.getElementById('defBorderW').value=borderW;
            document.getElementById('defBorderStyle').value=borderStyle;

            const el=stage.querySelector(`.node[data-id="${id}"]`);
            if(el) applyNodeStyle(el,n);
            await renderLabel(id);
            drawLines();
            $('#editModal').modal('hide');
        });

        document.getElementById('btnDeleteInModal').addEventListener('click', ()=>{
            if(modalMode!=='edit' || !modalId) return;
            if(confirm('Delete this shape?')){
                const el=stage.querySelector(`.node[data-id="${modalId}"]`);
                if(el) el.remove();
                state.nodes.delete(modalId);
                state.edges = state.edges.filter(e=>e.from!==modalId && e.to!==modalId);
                clearSelection();
                drawLines();
                $('#editModal').modal('hide');
            }
        });

        // Save/Load JSON
        function toJSON(){
            return JSON.stringify({
                version:27,
                stage:{ width: state.stageWidth, height: state.stageHeight },
                vars:{
                    nodeSize:getCSSVar('--nodeSize'),
                    fontSize:getCSSVar('--fontSize'),
                    lineStroke:getCSSVar('--lineStroke'),
                    lineColor:getCSSVar('--lineColor'),
                    lineDash:getCSSVar('--lineDash'),
                    arrowMode:getCSSVar('--arrowMode'),
                    arrowStyle:getCSSVar('--arrowStyle'),
                    arrowSize:getCSSVar('--arrowSize'),
                    arrowStroke:getCSSVar('--arrowStroke')
                },
                defaults:{
                    fill:document.getElementById('defFill').value,
                    border:document.getElementById('defBorder').value,
                    text:document.getElementById('defText').value,
                    borderW:parseInt(document.getElementById('defBorderW').value,10),
                    borderStyle:document.getElementById('defBorderStyle').value
                },
                nodes:Array.from(state.nodes.entries()).map(([id,n])=>({id,...n})),
                edges:state.edges.slice()
            }, null, 2);
        }

        function downloadText(filename,text,mime){
            const blob=new Blob([text],{type:mime});
            const url=URL.createObjectURL(blob);
            const a=document.createElement('a');
            a.href=url; a.download=filename;
            document.body.appendChild(a);
            a.click();
            a.remove();
            setTimeout(()=>URL.revokeObjectURL(url),3000);
        }

        async function loadFromObject(obj){
            if(!obj || !obj.nodes) throw new Error('Invalid JSON');
            // clear
            stage.querySelectorAll('.node').forEach(n=>n.remove());
            state.nodes.clear();
            state.edges=[];
            clearSelection();

            if(obj.stage){
                state.stageHeight=parseInt(obj.stage.height,10)||400;
                state.stageWidth=parseInt(obj.stage.width,10)||600;
                document.getElementById('stageWidthPreset').value=String(state.stageWidth);
            }
            if(obj.vars){
                Object.entries(obj.vars).forEach(([k,v])=>{
                    const map={
                        nodeSize:'--nodeSize', fontSize:'--fontSize', lineStroke:'--lineStroke', lineColor:'--lineColor',
                        lineDash:'--lineDash', arrowMode:'--arrowMode', arrowStyle:'--arrowStyle', arrowSize:'--arrowSize', arrowStroke:'--arrowStroke'
                    };
                    if(map[k]) setCSSVar(map[k], v);
                });
                // sync UI
                const ns=parseFloat(obj.vars.nodeSize)||110; document.getElementById('nodeSize').value=ns; document.getElementById('vNodeSize').textContent=ns;
                const fs=parseFloat(obj.vars.fontSize)||18; document.getElementById('fontSize').value=fs; document.getElementById('vFontSize').textContent=fs;
                const ls=parseFloat(obj.vars.lineStroke)||4; document.getElementById('lineStroke').value=ls; document.getElementById('vLineStroke').textContent=ls;
                const as=parseFloat(obj.vars.arrowSize)||12; document.getElementById('arrowSize').value=as; document.getElementById('vArrowSize').textContent=as;
                const ast=parseFloat(obj.vars.arrowStroke)||0; document.getElementById('arrowStroke').value=ast; document.getElementById('vArrowStroke').textContent=ast;
                document.getElementById('lineColor').value=obj.vars.lineColor||'#111111';
                document.getElementById('lineDash').value=obj.vars.lineDash||'none';
                document.getElementById('arrowMode').value=obj.vars.arrowMode||'end';
                document.getElementById('arrowStyle').value=obj.vars.arrowStyle||'triangle';
            }
            if(obj.defaults){
                if(obj.defaults.fill) document.getElementById('defFill').value=obj.defaults.fill;
                if(obj.defaults.border) document.getElementById('defBorder').value=obj.defaults.border;
                if(obj.defaults.text) document.getElementById('defText').value=obj.defaults.text;
                if(obj.defaults.borderW!=null) document.getElementById('defBorderW').value=obj.defaults.borderW;
                if(obj.defaults.borderStyle) document.getElementById('defBorderStyle').value=obj.defaults.borderStyle;
            }

            applyStageSize();

            let maxId=0;
            obj.nodes.forEach(it=>{
                const id=String(it.id);
                maxId=Math.max(maxId, parseInt(id,10)||0);
                const n={
                    x:it.x||0, y:it.y||0,
                    shape:it.shape||'circle',
                    label:it.label||'',
                    isMath:!!it.isMath,
                    svgLabel:null,
                    eqScale:it.eqScale ?? 1,
                    fill:it.fill||'#fff',
                    border:it.border||'#111',
                    text:it.text||'#111',
                    borderW:it.borderW ?? 3,
                    borderStyle:it.borderStyle||'solid',
                    locked:!!it.locked
                };
                state.nodes.set(id,n);
                makeNodeEl(id,n);
            });
            state.nextId=maxId+1;

            if(Array.isArray(obj.edges)){
                state.edges = obj.edges.filter(e=>e && state.nodes.has(String(e.from)) && state.nodes.has(String(e.to)))
                    .map(e=>({from:String(e.from), to:String(e.to)}));
            }
            for(const id of state.nodes.keys()) await renderLabel(id);
            drawLines();
        }

        // SVG export
        function escapeXml(s){ return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&apos;'); }
        function prefixSvgIds(svgText, prefix){
            let s=String(svgText);
            s=s.replace(/id="([^"]+)"/g,(m,g1)=>`id="${prefix}${g1}"`);
            s=s.replace(/url\(#([^)]+)\)/g,(m,g1)=>`url(#${prefix}${g1})`);
            s=s.replace(/xlink:href="#([^"]+)"/g,(m,g1)=>`xlink:href="#${prefix}${g1}"`);
            s=s.replace(/href="#([^"]+)"/g,(m,g1)=>`href="#${prefix}${g1}"`);
            return s;
        }
        function exportSVG(){
            const W=stage.clientWidth, H=stage.clientHeight;
            const lineStroke=getVarPx('--lineStroke');
            const lineColor=getCSSVar('--lineColor')||'#111';
            const dash=dashArray();
            const arrowMode=getCSSVar('--arrowMode')||'end';
            const parts=[];
            parts.push(`<svg xmlns="http://www.w3.org/2000/svg" width="${W}" height="${H}" viewBox="0 0 ${W} ${H}">`);
            parts.push(`<defs>${drawMarker('arrowEnd',false)}${drawMarker('arrowStart',true)}</defs>`);

            for(const e of state.edges){
                const a=state.nodes.get(e.from), b=state.nodes.get(e.to);
                if(!a||!b) continue;
                const ca=nodeCenter(a), cb=nodeCenter(b);
                const p1=boundaryPoint(a, cb), p2=boundaryPoint(b, ca);
                let extra='';
                if(dash) extra+=` stroke-dasharray="${dash}"`;
                if(arrowMode==='end'||arrowMode==='both') extra+=` marker-end="url(#arrowEnd)"`;
                if(arrowMode==='start'||arrowMode==='both') extra+=` marker-start="url(#arrowStart)"`;
                parts.push(`<line x1="${p1.x}" y1="${p1.y}" x2="${p2.x}" y2="${p2.y}" stroke="${lineColor}" stroke-width="${lineStroke}" stroke-linecap="round"${extra} />`);
            }

            const s=getVarPx('--nodeSize');
            const fontSize=getVarPx('--fontSize');
            for(const [id,n] of state.nodes.entries()){
                const cx=n.x+s/2, cy=n.y+s/2;
                const bw=(n.borderW ?? 3);
                const stroke=(bw===0)?'transparent':(n.border||'#111');
                const fill=(n.fill||'#fff');
                // border dash for shapes
                let bdash = '';
                if(bw > 0){
                    const bs = (n.borderStyle || 'solid');
                    if(bs === 'dashed') bdash = ` stroke-dasharray="${bw*3} ${bw*2}"`;
                    if(bs === 'dotted') bdash = ` stroke-dasharray="1 ${bw*2}" stroke-linecap="round"`;
                }
                if((n.shape||'circle')==='rect'){
                    parts.push(`<rect x="${n.x}" y="${n.y}" width="${s}" height="${s}" rx="14" ry="14" fill="${fill}" stroke="${stroke}" stroke-width="${bw}"${bdash} />`);
                }else{
                    parts.push(`<circle cx="${cx}" cy="${cy}" r="${s/2}" fill="${fill}" stroke="${stroke}" stroke-width="${bw}"${bdash} />`);
                }

                const domSvg = stage.querySelector(`.node[data-id="${id}"] .label svg`);
                let svgLabel = n.svgLabel;
                if(!svgLabel && domSvg) svgLabel = domSvg.outerHTML;

                if(svgLabel && (n.isMath || isMathLike(n.label||''))){
                    const pref=`mj_${id}_`;
                    const svgText=prefixSvgIds(svgLabel,pref);
                    const eqScale=(n.eqScale ?? 1);
                    const w=110*eqScale, h=55*eqScale;
                    const x=cx-w/2, y=cy-h/2;
                    const patched = svgText.replace(/<svg([^>]*)>/i, (m,attrs)=>{
                        let a=attrs.replace(/\s(width|height)="[^"]*"/gi,'');
                        return `<svg${a} x="${x}" y="${y}" width="${w}" height="${h}" preserveAspectRatio="xMidYMid meet">`;
                    });
                    parts.push(patched);
                }else{
                    const label=(n.label||'').trim();
                    if(label){
                        parts.push(`<text x="${cx}" y="${cy}" font-size="${fontSize}" fill="${n.text||'#111'}" text-anchor="middle" dominant-baseline="middle">${escapeXml(label)}</text>`);
                    }
                }
            }

            parts.push(`</svg>`);
            return parts.join('\n');
        }

        // Controls
        function renderAll(){
            setCSSVar('--nodeSize', document.getElementById('nodeSize').value+'px');
            setCSSVar('--fontSize', document.getElementById('fontSize').value+'px');
            setCSSVar('--lineStroke', document.getElementById('lineStroke').value+'px');
            setCSSVar('--arrowSize', document.getElementById('arrowSize').value+'px');
            setCSSVar('--arrowStroke', document.getElementById('arrowStroke').value+'px');
            setCSSVar('--lineColor', document.getElementById('lineColor').value);
            setCSSVar('--lineDash', document.getElementById('lineDash').value);
            setCSSVar('--arrowMode', document.getElementById('arrowMode').value);
            setCSSVar('--arrowStyle', document.getElementById('arrowStyle').value);

            const s=getVarPx('--nodeSize');
            for(const [id,n] of state.nodes){
                n.x = clamp(n.x, 0, Math.max(0, stage.clientWidth - s));
                n.y = clamp(n.y, 0, Math.max(0, stage.clientHeight - s));
                const el=stage.querySelector(`.node[data-id="${id}"]`);
                if(el){
                    el.style.left=n.x+'px'; el.style.top=n.y+'px';
                    applyNodeStyle(el,n);
                }
            }
            drawLines();
        }

        const sliderMap = {nodeSize:'vNodeSize', fontSize:'vFontSize', lineStroke:'vLineStroke', arrowSize:'vArrowSize', arrowStroke:'vArrowStroke'};
        Object.keys(sliderMap).forEach(id=>{
            const el=document.getElementById(id);
            el.addEventListener('input', (e)=>{
                document.getElementById(sliderMap[id]).textContent = e.target.value;
                renderAll();
            });
        });
        ['lineDash','arrowMode','arrowStyle','lineColor','defFill','defBorder','defText','defBorderW','defBorderStyle'].forEach(id=>{
            document.getElementById(id).addEventListener('input', renderAll);
            document.getElementById(id).addEventListener('change', renderAll);
        });

        document.getElementById('stageWidthPreset').addEventListener('change', applyStageSize);
        document.getElementById('toggleGrid').addEventListener('change', (e)=>stage.classList.toggle('gridOn', e.target.checked));

        // Add menu
        const addMenu=document.getElementById('addMenu');
        function closeAddMenu(){ addMenu.style.display='none'; }
        function toggleAddMenu(){ addMenu.style.display = (addMenu.style.display==='block')?'none':'block'; }
        document.getElementById('btnAdd').addEventListener('click', (e)=>{ e.stopPropagation(); toggleAddMenu(); });
        document.addEventListener('pointerdown', (e)=>{
            if(addMenu.style.display==='block'){
                const within = addMenu.contains(e.target) || e.target.id==='btnAdd';
                if(!within) closeAddMenu();
            }
        });
        addMenu.querySelectorAll('.item').forEach(it=>{
            it.addEventListener('click', (e)=>{
                e.stopPropagation(); closeAddMenu();
                openModal('create', null, it.dataset.shape || 'circle');
            });
        });

        // Clear stage
        document.getElementById('btnClearStage').addEventListener('click', (e)=>{
            e.stopPropagation();
            if(confirm('Are you sure you want to clear the entire stage?')){
                stage.querySelectorAll('.node').forEach(n=>n.remove());
                state.nodes.clear(); state.edges=[]; clearSelection(); drawLines();
            }
        });

        // Stage resizer
        document.getElementById('stageResizer').addEventListener('pointerdown', (e)=>{
            e.preventDefault(); e.stopPropagation();
            const startY=e.clientY, startH=state.stageHeight, pid=e.pointerId;
            e.target.setPointerCapture(pid);

            function move(ev){
                if(ev.pointerId!==pid) return;
                ev.preventDefault();
                state.stageHeight = clamp(startH + (ev.clientY-startY), 220, 1400);
                applyStageSize();
            }
            function up(ev){
                if(ev.pointerId!==pid) return;
                window.removeEventListener('pointermove', move);
                window.removeEventListener('pointerup', up);
            }
            window.addEventListener('pointermove', move, {passive:false});
            window.addEventListener('pointerup', up, {passive:false});
        });

        // Save/Load buttons
        document.getElementById('btnSaveJson').addEventListener('click', ()=>{
            const json=toJSON();
            document.getElementById('jsonBox').value=json;

            console.log(json);
            downloadText('part-whole-tree.json', json, 'application/json;charset=utf-8');
        });
        document.getElementById('btnLoadJson').addEventListener('click', ()=>{
            const txt=document.getElementById('jsonBox').value.trim();
            if(txt){
                try{ loadFromObject(JSON.parse(txt)); return; }
                catch(e){ alert('Invalid JSON in box.'); return; }
            }
            document.getElementById('jsonFile').click();
        });
        document.getElementById('jsonFile').addEventListener('change', (e)=>{
            const f=e.target.files && e.target.files[0];
            if(!f) return;
            const r=new FileReader();
            r.onload = async ()=>{
                try{ await loadFromObject(JSON.parse(String(r.result||''))); }
                catch(err){ alert('Could not load JSON file.'); }
                e.target.value='';
            };
            r.readAsText(f);
        });

        $(document).on('click', '.insert-whole-modal', function () {
            const svg = exportSVG();
            const json = toJSON();
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

                $('.rureraform-toolbar-tool-other[data-type="whole_modal_builder"] a').click();
                var current_element = $(".whole_modal_builder_element").last().attr('data-index_i');

                console.log(svg);
                rureraform_form_elements[current_element]["content"] = svg;
                rureraform_form_elements[current_element]["json_code"] = json;

                $(".whole_modal_builder_element").last().html(svg);
            }

            $(".whole-modal-builder").modal('hide');
            console.log(svg);
        });
        // SVG buttons
        document.getElementById('btnExportSvg').addEventListener('click', ()=>{
            document.getElementById('svgBox').value = exportSVG();
        });
        document.getElementById('btnDownloadSvg').addEventListener('click', ()=>{
            let svg=document.getElementById('svgBox').value.trim();
            if(!svg){ svg=exportSVG(); document.getElementById('svgBox').value=svg; }
            downloadText('part-whole-model.svg', svg, 'image/svg+xml;charset=utf-8');
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', (ev)=>{
            const tag=(ev.target && ev.target.tagName || '').toLowerCase();
            const typing = (tag==='input' || tag==='textarea' || ev.target.isContentEditable);
            if((ev.ctrlKey||ev.metaKey) && ev.key.toLowerCase()==='a' && !typing){
                ev.preventDefault(); selectAll();
            }
            if(!typing && (ev.key==='Delete' || ev.key==='Backspace')){
                if(state.selected.size===0) return;
                ev.preventDefault();
                if(confirm('Delete the selected shape(s)?')){
                    for(const id of Array.from(state.selected)){
                        const el=stage.querySelector(`.node[data-id="${id}"]`);
                        if(el) el.remove();
                        state.nodes.delete(id);
                    }
                    state.edges = state.edges.filter(e=>state.nodes.has(e.from) && state.nodes.has(e.to));
                    clearSelection();
                    drawLines();
                }
            }
        });

        // Auto align (simple cycle)
        document.getElementById('btnAutoAlign').addEventListener('click', ()=>{
            if(state.nodes.size===0) return;
            state.alignMode = (state.alignMode+1)%3;
            const s=getVarPx('--nodeSize'), pad=20;

            const indeg={}, out={};
            for(const [id] of state.nodes){ indeg[id]=0; out[id]=[]; }
            for(const e of state.edges){
                if(state.nodes.has(e.from) && state.nodes.has(e.to)){
                    indeg[e.to]++; out[e.from].push(e.to);
                }
            }
            let roots=Object.keys(indeg).filter(k=>indeg[k]===0);
            if(!roots.length) roots=[Array.from(state.nodes.keys())[0]];

            const depth={}; roots.forEach(r=>depth[r]=0);
            const q=[...roots];
            while(q.length){
                const u=q.shift();
                for(const v of out[u]||[]){
                    const nd=(depth[u]||0)+1;
                    if(depth[v]==null || nd<depth[v]) depth[v]=nd;
                    q.push(v);
                }
            }
            const levels=new Map();
            for(const [id,n] of state.nodes){
                const d = depth[id] ?? 0;
                if(!levels.has(d)) levels.set(d, []);
                levels.get(d).push({id,n});
            }
            const maxD=Math.max(...Array.from(levels.keys()));

            if(state.alignMode===0){
                const stepX = (maxD>0) ? (stage.clientWidth-2*pad-s)/maxD : 0;
                for(const [d, arr] of levels.entries()){
                    arr.sort((a,b)=>a.n.y-b.n.y);
                    const x=clamp(pad + d*stepX, 0, stage.clientWidth-s);
                    const gapY=Math.max(s*1.15, 110);
                    const total=(arr.length-1)*gapY;
                    let startY=clamp((stage.clientHeight-total)/2, pad, stage.clientHeight-pad-total);
                    arr.forEach((it,i)=>{
                        if(it.n.locked) return;
                        it.n.x=x; it.n.y=clamp(startY+i*gapY,0,stage.clientHeight-s);
                    });
                }
            }else if(state.alignMode===1){
                const stepY = (maxD>0) ? (stage.clientHeight-2*pad-s)/maxD : 0;
                for(const [d, arr] of levels.entries()){
                    arr.sort((a,b)=>a.n.x-b.n.x);
                    const y=clamp(pad + d*stepY,0,stage.clientHeight-s);
                    const gapX=Math.max(s*1.25, 140);
                    const total=(arr.length-1)*gapX;
                    let startX=clamp((stage.clientWidth-total)/2, pad, stage.clientWidth-pad-total);
                    arr.forEach((it,i)=>{
                        if(it.n.locked) return;
                        it.n.y=y; it.n.x=clamp(startX+i*gapX,0,stage.clientWidth-s);
                    });
                }
            }else{
                const all=Array.from(state.nodes.entries()).filter(([id,n])=>!n.locked).sort((a,b)=>(depth[a[0]]??0)-(depth[b[0]]??0));
                const cols=Math.max(1, maxD+1);
                const colW=clamp((stage.clientWidth-2*pad)/cols, s*1.05, stage.clientWidth);
                const perCol=Math.ceil(all.length/cols);
                all.forEach(([id,n],i)=>{
                    const col=Math.floor(i/perCol), row=i%perCol;
                    n.x=clamp(pad+col*colW, 0, stage.clientWidth-s);
                    n.y=clamp(pad+row*(s*1.10)+(col%2?s*0.28:0), 0, stage.clientHeight-s);
                });
            }
            for(const [id,n] of state.nodes){
                const el=stage.querySelector(`.node[data-id="${id}"]`);
                if(el){ el.style.left=n.x+'px'; el.style.top=n.y+'px'; }
            }
            drawLines();
        });

        // Init
        function init(){
            applyStageSize();
            renderAll();

            // Example
            const a=addNode('circle', false);
            state.nodes.get(a).x=160; state.nodes.get(a).y=60; state.nodes.get(a).label='Whole';

            const b=addNode('circle', false);
            state.nodes.get(b).x=60; state.nodes.get(b).y=210; state.nodes.get(b).label='\\frac{3}{5}'; state.nodes.get(b).isMath=true;

            const c=addNode('rect', false);
            state.nodes.get(c).x=260; state.nodes.get(c).y=210; state.nodes.get(c).label='40%';

            // apply example positions
            for(const [id,n] of state.nodes){
                const el=stage.querySelector(`.node[data-id="${id}"]`);
                if(el){ el.style.left=n.x+'px'; el.style.top=n.y+'px'; }
            }

            addEdge(a,b); addEdge(a,c);

            (async ()=>{
                for(const id of state.nodes.keys()) await renderLabel(id);
                drawLines();
            })();
        }
        init();
        $(".load-json-btn").click();
    })();


$('#editModal').on('hidden.bs.modal', function () {
    $('body').addClass('modal-open');
});
</script>
