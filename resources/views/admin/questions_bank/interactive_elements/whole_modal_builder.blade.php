
<style>

    .appWrap{ max-width:1200px; margin:0 auto; }

    #stageFrame{
        padding-top:50px;
        padding-bottom:50px;

        width:100%;
        max-width:100%;

        background:#fff;
        border:1px solid #d0d0d0;
        border-radius:12px;
        overflow:hidden;
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.06);
        width:100%;
        max-width:100%;
        margin:0 auto;
        position:relative;
    }

    #stage{
        position:relative;
        height:620px;
        background:#fff;
        overflow:hidden;
        user-select:none;
        touch-action:none;
    }

    /* grid */
    #stage.grid-on::before{
        content:"";
        position:absolute; inset:0;
        pointer-events:none;
        background-image:
            linear-gradient(to right, var(--gridColor) 1px, transparent 1px),
            linear-gradient(to bottom, var(--gridColor) 1px, transparent 1px);
        background-size: var(--gridSize) var(--gridSize);
    }

    /* ruler (only when grid on) */
    #rulerY{
        position:absolute; top:0; left:0;
        width:44px; height:100%;
        pointer-events:none;
        display:none;
        background: rgba(250,250,250,.85);
        border-right: 1px solid rgba(0,0,0,.1);
        font-size: 10px;
        color: rgba(0,0,0,.55);
        z-index:2;
    }
    #stage.grid-on #rulerY{ display:block; }
    .tick{ position:absolute; left:0; right:0; height:1px; background: rgba(0,0,0,.18); }
    .tick.small{ background: rgba(0,0,0,.12); }
    .tick-label{ position:absolute; left:4px; transform: translateY(-50%); white-space:nowrap; }

    #heightBadge{
        position:absolute; right:10px; bottom:10px;
        background: rgba(0,0,0,.06);
        border:1px solid rgba(0,0,0,.12);
        border-radius:999px;
        padding:3px 8px;
        font-size:12px;
        color:#333;
        pointer-events:none;
        user-select:none;
        display:none;
        z-index:3;
    }


    /* wires */
    #wires{
        position:absolute; inset:0;
        width:100%; height:100%;
        pointer-events:none;
        z-index:1;
    }
    #wires line{
        stroke: var(--lineColor);
        stroke-width: var(--lineStroke);
        stroke-linecap: round;
        shape-rendering: crispEdges;
        vector-effect: non-scaling-stroke;
    }

    /* nodes layer */
    #nodesLayer{ position:absolute; inset:0; width:100%; height:100%; z-index:3; }

    .node{
        position:absolute;
        width:var(--nodeSize);
        height:var(--nodeSize);
        box-sizing:border-box;
        display:flex;
        align-items:center;
        justify-content:center;
        background:#fff;
        border:3px solid #111;
        border-radius:9999px;
        cursor:grab;
    }
    .node.rect{ border-radius:14px; }
    .node:active{ cursor:grabbing; }
    .node.selected{ box-shadow: 0 0 0 4px rgba(13,110,253,.22); }
    .node.locked{
        cursor:not-allowed;
        border-style:dashed;
        opacity:.97;
    }
    .label{
        width:92%;
        text-align:center;
        font-size:var(--fontSize);
        line-height:1.05;
        pointer-events:none;
        display:flex;
        align-items:center;
        justify-content:center;
        color: inherit;
    }
    .label .eq-wrap{ display:inline-block; transform-origin:center center; }
    .label svg{ max-width:100%; height:auto; display:block; }


    #stageArea{
        border:2px dotted rgba(0,0,0,.25);
        border-radius:12px;
        background:#fff;
        padding:12px;

        width:100%;
        max-width:100%;
        margin:0 auto;
    }

    /* stage resizer */
    #stageResizer{
        height: 14px;
        background: #f1f1f1;
        border-top: 1px solid #e0e0e0;
        cursor: ns-resize;
        display:flex;
        align-items:center;
        justify-content:center;
        user-select:none;
        touch-action:none;
    }
    #stageResizer .grip{
        width: 42px; height: 4px;
        border-radius:999px;
        background:#cfcfcf;
    }

    /* bottom help/controls */
    #bottomBar{
        background:#fbfbfb;
        border-top:1px solid #e6e6e6;
        padding:10px;
    }
    .badgekey{
        font-size:12px; padding:.15rem .45rem;
        border-radius:999px; border:1px solid #c7d2fe;
        background:#eef2ff; color:#3730a3;
        display:inline-block;
        margin-right:6px; margin-bottom:6px;
    }
    .tiny{ font-size:12px; color:#666; }
    textarea.mono{
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", monospace;
        font-size:12px;
    }
    .swatch{ width:100%; height:34px; padding:0; }

    /* overlay (top-right) */
    #stageOverlay{
        position:absolute; top:10px; right:10px;
        display:flex; align-items:center;
        gap:8px;
        z-index:4;
    }
    .ov-pill{
        display:inline-block;
        padding:3px 8px;
        border-radius:999px;
        background: rgba(0,0,0,.05);
        border:1px solid rgba(0,0,0,.12);
        font-size:12px;
        color:#333;
        pointer-events:none;
    }
    .ov-btn{
        width:30px; height:30px;
        border-radius:999px;
        border:1px solid rgba(0,0,0,.18);
        background:#fff;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        cursor:pointer;
        user-select:none;
        padding:0;
    }
    .ov-btn:hover{ background:#f7f7f7; }

    .ov-dd{ position:relative; }
    .ov-menu{
        position:absolute;
        top: 34px;
        right: 0;
        width: 160px;
        background:#fff;
        border:1px solid rgba(0,0,0,.12);
        border-radius:10px;
        padding:6px;
        display:none;
        z-index:10;
    }
    .ov-menu .btn{ border-radius:8px; }


    /* modal preview */
    .preview-wrap{
        border:1px solid rgba(0,0,0,.12);
        background: #fafafa;
        border-radius:10px;
        padding:10px;
        display:flex;
        align-items:center;
        justify-content:center;
        min-height:150px;
    }
    .preview-node{
        width:130px;
        height:130px;
        box-sizing:border-box;
        display:flex;
        align-items:center;
        justify-content:center;
        background:#fff;
        border:3px solid #111;
        border-radius:9999px;
    }
    .preview-node.rect{ border-radius:14px; }
    .preview-node .label{
        width:92%;
        text-align:center;
        line-height:1.05;
        pointer-events:none;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .preview-node .label .eq-wrap{ display:inline-block; transform-origin:center center; }

</style>

<!-- MathJax (SVG output) -->
<script>
    window.MathJax = {
        tex: { inlineMath: [['\\(','\\)'],['$','$']] },
        svg: { fontCache: 'none' }
    };
</script>
<script src="https://cdn.jsdelivr.net/npm/mathjax@4/tex-mml-svg.js" defer></script>
<div id="rurera_interactive_elements" class="rurera_interactive_elements whole-modal-builder modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content edit-quest-modal-div">
            <div class="modal-body">


                <div class="container-fluid py-3 appWrap">
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
                                                <textarea id="jsonBox" class="form-control mono mt-2" rows="5" placeholder="JSON appears here...">{
  "version": 10,
  "stage": {
    "widthPreset": "600",
    "height": 400,
    "grid": false
  },
  "globals": {
    "nodeSize": 110,
    "fontSize": 18,
    "lineStroke": 4,
    "lineColor": "#111111",
    "lineDash": "none",
    "arrowMode": "end",
    "arrowStyle": "triangle",
    "arrowSize": 12,
    "arrowStroke": 0,
    "gridSize": 24
  },
  "nodes": [
    {
      "id": "1",
      "x": 0,
      "y": 158.39993286132812,
      "label": "100%",
      "border": "#111111",
      "fill": "#ffffff",
      "text": "#111111",
      "borderW": 3,
      "eqScale": 1,
      "shape": "circle",
      "locked": false
    },
    {
      "id": "2",
      "x": 20.93328857421875,
      "y": 24.750015258789062,
      "label": "A",
      "border": "#111111",
      "fill": "#ffffff",
      "text": "#111111",
      "borderW": 3,
      "eqScale": 1,
      "shape": "circle",
      "locked": false
    },
    {
      "id": "3",
      "x": 77.73333740234375,
      "y": 290,
      "label": "0.7",
      "border": "#111111",
      "fill": "#ffffff",
      "text": "#111111",
      "borderW": 3,
      "eqScale": 1,
      "shape": "circle",
      "locked": false
    },
    {
      "id": "4",
      "x": 181.066650390625,
      "y": 51.949981689453125,
      "label": "\\frac{1}{10}",
      "border": "#111111",
      "fill": "#ffffff",
      "text": "#111111",
      "borderW": 3,
      "eqScale": 0.9,
      "shape": "circle",
      "locked": false
    },
    {
      "id": "5",
      "x": 130.6666259765625,
      "y": 185.64999389648438,
      "label": "B",
      "border": "#111111",
      "fill": "#ffffff",
      "text": "#111111",
      "borderW": 3,
      "eqScale": 1,
      "shape": "circle",
      "locked": false
    },
    {
      "id": "6",
      "x": 281.20001220703125,
      "y": 73.54998779296875,
      "label": "10%",
      "border": "#111111",
      "fill": "#ffffff",
      "text": "#111111",
      "borderW": 3,
      "eqScale": 1,
      "shape": "circle",
      "locked": false
    },
    {
      "id": "7",
      "x": 281.20001220703125,
      "y": 212.05001831054688,
      "label": "C",
      "border": "#111111",
      "fill": "#ffffff",
      "text": "#111111",
      "borderW": 3,
      "eqScale": 1,
      "shape": "circle",
      "locked": false
    }
  ],
  "edges": [
    {
      "from": "1",
      "to": "2"
    },
    {
      "from": "1",
      "to": "3"
    },
    {
      "from": "2",
      "to": "4"
    },
    {
      "from": "2",
      "to": "5"
    },
    {
      "from": "5",
      "to": "6"
    },
    {
      "from": "5",
      "to": "7"
    }
  ]
}</textarea>
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
                    <a href="javascript:;" class="btn btn-primary insert-whole-modal">Insert</a>
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
    function runtesting(){
        const stageFrame = document.getElementById('stageFrame');
        const stage = document.getElementById('stage');
        const wires = document.getElementById('wires');
        const nodesLayer = document.getElementById('nodesLayer');
        const resizer = document.getElementById('stageResizer');
        console.log('DOMLoader');

        const state = {
            nodes: new Map(), // id -> node
            edges: [],        // {from,to}
            selected: new Set(),
            nextId: 1,
            alignMode: -1,
            stageWidthPreset: '600',
            stageHeight: 400
        };

        const clamp=(n,min,max)=>Math.max(min,Math.min(max,n));
        const getVar=(name)=>getComputedStyle(document.documentElement).getPropertyValue(name).trim();
        const getVarPx=(name)=>parseInt(getVar(name))||0;
        const setVar=(name,val)=>document.documentElement.style.setProperty(name,val);

        function stageRect(){ return stage.getBoundingClientRect(); }

        function crisp(n, strokeW){
            const odd = Math.round(strokeW) % 2 === 1;
            const r = Math.round(n);
            return odd ? (r + 0.5) : r;
        }

        function dashArray(){
            const style=getVar('--lineDash');
            const w=getVarPx('--lineStroke')||4;
            if(style==='dashed') return `${w*3} ${w*2}`;
            if(style==='dotted') return `${w} ${w*1.6}`;
            return null;
        }

        function nodeCenter(n){
            const s=getVarPx('--nodeSize');
            return {cx:n.x+s/2, cy:n.y+s/2};
        }

        function boundaryPoint(n, toward){
            // returns point on border of shape in direction of "toward"
            const s = getVarPx('--nodeSize');
            const bw = Number.isFinite(n.borderW) ? n.borderW : 3;
            const cx = n.x + s/2;
            const cy = n.y + s/2;
            const tx = toward.x;
            const ty = toward.y;
            let dx = tx - cx;
            let dy = ty - cy;
            const len = Math.hypot(dx,dy) || 1;
            dx /= len; dy /= len;

            if(n.shape === 'rect'){
                // intersection with square bounds (good approximation for rounded rect)
                const half = (s/2) - (bw/2);
                const ax = Math.abs(dx), ay = Math.abs(dy);
                const k = half / Math.max(ax, ay, 1e-6);
                return {x: cx + dx*k, y: cy + dy*k};
            }else{
                // circle
                const r = (s/2) - (bw/2);
                return {x: cx + dx*r, y: cy + dy*r};
            }
        }

        function refreshSelectedStyles(){
            document.querySelectorAll('.node').forEach(el=>{
                el.classList.toggle('selected', state.selected.has(el.dataset.id));
            });
        }
        function clearSelection(){ state.selected.clear(); refreshSelectedStyles(); }
        function selectAll(){ state.selected = new Set(Array.from(state.nodes.keys())); refreshSelectedStyles(); }
        function primarySelected(){ return state.selected.size ? state.selected.values().next().value : null; }

        function looksLikeTeX(s){
            s=(s||'').trim(); if(!s) return false;
            if((s.startsWith('\\(')&&s.endsWith('\\)'))||(s.startsWith('$')&&s.endsWith('$'))||(s.startsWith('\\[')&&s.endsWith('\\]'))) return true;
            return /\\frac|\\dfrac|\\tfrac|\\times|\\div|\\sqrt|[_^{}]/.test(s);
        }

        console.log('--working--');
        async function mjReady(){ console.log('mjReady');

            if(window.MathJax && MathJax.startup) await MathJax.startup.promise; }

        function texToSvg(texRaw){
            let tex=(texRaw||'').trim();
            if(tex.startsWith('\\(')&&tex.endsWith('\\)')) tex=tex.slice(2,-2);
            if(tex.startsWith('\\[')&&tex.endsWith('\\]')) tex=tex.slice(2,-2);
            if(tex.startsWith('$')&&tex.endsWith('$')) tex=tex.slice(1,-1);
            const svg=MathJax.tex2svg(tex,{display:false}).querySelector('svg');
            svg.removeAttribute('style');
            svg.setAttribute('width','100%');
            svg.setAttribute('height','auto');
            svg.setAttribute('preserveAspectRatio','xMidYMid meet');
            return svg;
        }

        async function renderLabel(labelEl, node){
            labelEl.innerHTML='';
            const txt=(node.label||'').trim();
            if(!txt){ node.isMath=false; node.svgLabel=null; return; }
            console.log('renderLabel');
            await mjReady();
            if(looksLikeTeX(txt)){
                const wrap=document.createElement('div');
                wrap.className='eq-wrap';
                wrap.style.transform=`scale(${node.eqScale ?? 1})`;
                const svg=texToSvg(txt);
                wrap.appendChild(svg);
                labelEl.appendChild(wrap);
                node.isMath=true;
                node.svgLabel=svg.outerHTML;
            }else{
                labelEl.textContent=txt;
                node.isMath=false;
                node.svgLabel=null;
            }
        }

        function applyNodeStyle(el, n){
            const bw = Number.isFinite(n.borderW) ? n.borderW : 3;
            el.style.borderWidth = bw+'px';
            el.style.borderColor = (bw===0) ? 'transparent' : (n.border || '#111');
            el.style.background = n.fill || '#fff';
            el.style.color = n.text || '#111';
            el.classList.toggle('rect', n.shape==='rect');
            el.classList.toggle('locked', !!n.locked);
        }

        function wireDefs(){
            const lc = getVar('--lineColor') || '#111';
            const as = parseInt(getVar('--arrowSize')) || 12;
            const astroke = parseInt(getVar('--arrowStroke')) || 0;
            const style = getVar('--arrowStyle') || 'triangle';

            function markerPath(kind, flip){
                // kind: triangle|wide|chevron|diamond|circle
                // flip indicates start marker orientation (mirrored horizontally)
                if(kind === 'circle'){
                    // circle uses <circle>
                    return null;
                }
                if(kind === 'diamond'){
                    return flip ? 'M 10 5 L 5 0 L 0 5 L 5 10 Z' : 'M 0 5 L 5 0 L 10 5 L 5 10 Z';
                }
                if(kind === 'chevron'){
                    // open chevron shape (stroke only works better)
                    return flip ? 'M 8 1 L 2 5 L 8 9' : 'M 2 1 L 8 5 L 2 9';
                }
                if(kind === 'wide'){
                    return flip ? 'M 10 0 L 0 5 L 10 10 Z' : 'M 0 0 L 10 5 L 0 10 Z';
                }
                // triangle (default)
                return flip ? 'M 10 0 L 0 5 L 10 10 Z' : 'M 0 0 L 10 5 L 0 10 Z';
            }

            const defs = document.createElementNS('http://www.w3.org/2000/svg','defs');

            function mkMarker(id, flip){
                const m = document.createElementNS('http://www.w3.org/2000/svg','marker');
                m.setAttribute('id', id);
                m.setAttribute('markerWidth', String(as));
                m.setAttribute('markerHeight', String(as));
                m.setAttribute('refY','5');
                m.setAttribute('orient', 'auto');
                m.setAttribute('markerUnits', 'userSpaceOnUse');

                // set refX so arrow tip sits on line end
                m.setAttribute('refX', flip ? '1' : '9');
                m.setAttribute('viewBox', '0 0 10 10');

                if(style === 'circle'){
                    const c = document.createElementNS('http://www.w3.org/2000/svg','circle');
                    c.setAttribute('cx','5'); c.setAttribute('cy','5'); c.setAttribute('r','4');
                    c.setAttribute('fill', lc);
                    if(astroke>0){ c.setAttribute('stroke', lc); c.setAttribute('stroke-width', String(astroke)); }
                    m.appendChild(c);
                }else{
                    const d = markerPath(style, flip);
                    const p = document.createElementNS('http://www.w3.org/2000/svg','path');
                    p.setAttribute('d', d);
                    if(style === 'chevron'){
                        p.setAttribute('fill','none');
                        p.setAttribute('stroke', lc);
                        p.setAttribute('stroke-width', String(Math.max(1, astroke || 2)));
                        p.setAttribute('stroke-linecap','round');
                        p.setAttribute('stroke-linejoin','round');
                    }else{
                        p.setAttribute('fill', lc);
                        if(astroke>0){ p.setAttribute('stroke', lc); p.setAttribute('stroke-width', String(astroke)); }
                    }
                    m.appendChild(p);
                }
                return m;
            }

            defs.appendChild(mkMarker('arrowEnd', false));
            defs.appendChild(mkMarker('arrowStart', true));
            return defs;
        }

        function drawLines(){
            const rect=stageRect();
            const W=Math.round(rect.width), H=Math.round(rect.height);
            wires.setAttribute('viewBox',`0 0 ${W} ${H}`);
            wires.setAttribute('width',W);
            wires.setAttribute('height',H);
            wires.innerHTML='';
            wires.appendChild(wireDefs());

            const lw=getVarPx('--lineStroke')||4;
            const da=dashArray();
            const arrow=getVar('--arrowMode')||'end';

            for(const e of state.edges){
                const a=state.nodes.get(e.from), b=state.nodes.get(e.to);
                if(!a||!b) continue;
                const ca={x: nodeCenter(a).cx, y: nodeCenter(a).cy};
                const cb={x: nodeCenter(b).cx, y: nodeCenter(b).cy};
                const p1 = boundaryPoint(a, cb);
                const p2 = boundaryPoint(b, ca);

                const line=document.createElementNS('http://www.w3.org/2000/svg','line');
                line.setAttribute('x1',crisp(p1.x,lw));
                line.setAttribute('y1',crisp(p1.y,lw));
                line.setAttribute('x2',crisp(p2.x,lw));
                line.setAttribute('y2',crisp(p2.y,lw));
                if(da) line.setAttribute('stroke-dasharray',da);
                if(arrow==='start'||arrow==='both') line.setAttribute('marker-start','url(#arrowStart)');
                if(arrow==='end'||arrow==='both') line.setAttribute('marker-end','url(#arrowEnd)');
                wires.appendChild(line);
            }
        }

        async function drawNodes(){
            nodesLayer.innerHTML='';
            for(const [id,n] of state.nodes.entries()){
                const el=document.createElement('div');
                el.className='node';
                el.dataset.id=id;
                el.style.left=n.x+'px';
                el.style.top=n.y+'px';
                applyNodeStyle(el,n);

                const label=document.createElement('div');
                label.className='label';
                el.appendChild(label);
                nodesLayer.appendChild(el);

                console.log('drawNodes');
                await renderLabel(label,n);

                // click select / connect
                el.addEventListener('click',(ev)=>{
                    ev.stopPropagation();

                    // connect mode
                    if(ev.shiftKey){
                        const from = primarySelected();
                        const to = id;
                        if(from && from!==to){
                            if(!state.edges.some(x=>x.from===from && x.to===to)){
                                state.edges.push({from,to});
                                drawLines();
                            }
                        }
                        return;
                    }

                    if(ev.ctrlKey || ev.metaKey){
                        if(state.selected.has(id)) state.selected.delete(id);
                        else state.selected.add(id);
                    }else{
                        state.selected.clear();
                        state.selected.add(id);
                    }
                    refreshSelectedStyles();
                });

                // dblclick edit
                el.addEventListener('dblclick',(ev)=>{
                    ev.stopPropagation();
                    state.selected.clear(); state.selected.add(id);
                    refreshSelectedStyles();
                    openModalFor(id);
                });

                // drag (group drag)
                attachDrag(el,n);
            }
            refreshSelectedStyles();
        }

        async function renderAll(){
            console.log('renderAll');
            await drawNodes();
            drawLines();
            updateRuler();
        }

        function attachDrag(el, node){
            let dragging=false, sx=0, sy=0;
            let startPos=new Map();

            el.addEventListener('pointerdown',(ev)=>{
                if(node.locked) return;

                const id=el.dataset.id;
                if(!state.selected.has(id)){
                    if(ev.ctrlKey||ev.metaKey){
                        state.selected.add(id);
                    }else{
                        state.selected.clear();
                        state.selected.add(id);
                    }
                    refreshSelectedStyles();
                }

                dragging=true;
                el.setPointerCapture(ev.pointerId);
                el.style.cursor='grabbing';
                sx=ev.clientX; sy=ev.clientY;

                startPos.clear();
                for(const sid of state.selected){
                    const n=state.nodes.get(sid);
                    if(!n || n.locked) continue;
                    startPos.set(sid,{x:n.x,y:n.y});
                }
            });

            el.addEventListener('pointermove',(ev)=>{
                if(!dragging) return;
                const rect=stageRect();
                const s=getVarPx('--nodeSize');
                const dx=ev.clientX - sx;
                const dy=ev.clientY - sy;

                for(const [sid,p] of startPos.entries()){
                    const n=state.nodes.get(sid);
                    if(!n) continue;
                    n.x=clamp(p.x+dx,0,rect.width-s);
                    n.y=clamp(p.y+dy,0,rect.height-s);

                    const dom=document.querySelector(`.node[data-id="${sid}"]`);
                    if(dom){
                        dom.style.left=n.x+'px';
                        dom.style.top=n.y+'px';
                    }
                }
                drawLines();
            });

            function end(){ dragging=false; el.style.cursor='grab'; }
            el.addEventListener('pointerup', end);
            el.addEventListener('pointercancel', end);
            el.addEventListener('lostpointercapture', end);
        }

        function applyStageSize(){
            stage.style.height = state.stageHeight + 'px';
            const stageArea = document.getElementById('stageArea');
            if(state.stageWidthPreset==='auto'){
                stageArea.style.width='100%';
            }else{
                stageArea.style.width = state.stageWidthPreset + 'px';
                stageArea.style.maxWidth='100%';
                stageArea.style.margin='0 auto';
            }

            const rect=stageRect();
            const s=getVarPx('--nodeSize');
            for(const n of state.nodes.values()){
                n.x=clamp(n.x,0,rect.width-s);
                n.y=clamp(n.y,0,rect.height-s);
            }
            document.querySelectorAll('.node').forEach(el=>{
                const n=state.nodes.get(el.dataset.id);
                if(!n) return;
                el.style.left=n.x+'px';
                el.style.top=n.y+'px';
            });

            drawLines();
            updateRuler();
        }

        // stage resizer
        (function(){
            let dragging=false, sy=0, oh=0;
            resizer.addEventListener('pointerdown',(ev)=>{
                dragging=true;
                resizer.setPointerCapture(ev.pointerId);
                sy=ev.clientY; oh=state.stageHeight;
            });
            resizer.addEventListener('pointermove',(ev)=>{
                if(!dragging) return;
                const dy=ev.clientY - sy;
                state.stageHeight = clamp(oh + dy, 320, 1600);
                applyStageSize();
            });
            function end(){ dragging=false; }
            resizer.addEventListener('pointerup', end);
            resizer.addEventListener('pointercancel', end);
            resizer.addEventListener('lostpointercapture', end);
        })();

        function updateRuler(){
            const r = stageRect();
            const h = Math.round(r.height);
            const w = Math.round(r.width);
            const el = document.getElementById('stageHeightText');
            if(el) el.textContent = `H:${h} × W:${w}`;
        }

        // CRUD
        async function addNode(label, opts){
            const rect=stageRect();
            const s=getVarPx('--nodeSize');
            const id=String(state.nextId++);
            const x=clamp(rect.width*0.12 + Math.random()*90, 0, rect.width-s);
            const y=clamp(rect.height*0.22 + Math.random()*150,0, rect.height-s);
            state.nodes.set(id,{
                id,x,y,
                label: label||'A',
                border: opts.border,
                fill: opts.fill,
                text: opts.text,
                borderW: opts.borderW,
                eqScale: opts.eqScale ?? 1,
                shape: opts.shape || 'circle',
                locked:false,
                isMath:false, svgLabel:null
            });
            console.log('addNode');
            await renderAll();
            state.selected.clear();
            state.selected.add(id);
            refreshSelectedStyles();
            return id;
        }

        async function deleteSelected(){
            if(state.selected.size===0) return alert('Select at least one shape.');
            const ids=[...state.selected];
            ids.forEach(id=>state.nodes.delete(id));
            state.edges = state.edges.filter(e=>!state.selected.has(e.from) && !state.selected.has(e.to));
            clearSelection();
            await renderAll();
        }

        async function toggleLockSelected(){
            if(state.selected.size===0) return alert('Select at least one shape.');
            for(const id of state.selected){
                const n=state.nodes.get(id);
                if(n) n.locked=!n.locked;
            }
            await renderAll();
        }

        function clearAll(){
            state.nodes.clear();
            state.edges = [];
            state.selected.clear();
            state.nextId = 1;
            renderAll();
        }

        function autoAlign(){
            if(state.nodes.size===0) return;

            // Cycle through layout modes for variety
            state.alignMode = (state.alignMode + 1) % 3;

            const indeg={}, out={};
            for(const [id] of state.nodes){ indeg[id]=0; out[id]=[]; }
            for(const e of state.edges){
                if(!state.nodes.has(e.from)||!state.nodes.has(e.to)) continue;
                indeg[e.to]=(indeg[e.to]||0)+1;
                out[e.from].push(e.to);
            }
            let roots=Object.keys(indeg).filter(k=>indeg[k]===0);
            if(!roots.length) roots=[Array.from(state.nodes.keys())[0]];

            const depth={}, q=[];
            roots.forEach(r=>{depth[r]=0;q.push(r);});
            while(q.length){
                const u=q.shift();
                for(const v of out[u]||[]){
                    const nd=(depth[u]||0)+1;
                    if(depth[v]===undefined||nd<depth[v]) depth[v]=nd;
                    q.push(v);
                }
            }

            const levels=new Map();
            for(const [id,n] of state.nodes){
                const d=(depth[id]!==undefined)?depth[id]:0;
                if(!levels.has(d)) levels.set(d,[]);
                levels.get(d).push(n);
            }
            for(const arr of levels.values()) arr.sort((a,b)=>a.y-b.y);

            const rect=stageRect();
            const s=getVarPx('--nodeSize');
            const pad=24;
            const maxDepth=Math.max(...Array.from(levels.keys()));
            const dy = Math.max(s*1.15, 110);
            const dx = Math.max(s*1.25, 140);

            // Mode 0: left-to-right tree (original)
            // Mode 1: top-to-bottom tree
            // Mode 2: compact "staggered" layout
            if(state.alignMode === 0){
                const marginX=Math.max(pad,s*0.15);
                const stepX=(maxDepth>0)?((rect.width-2*marginX-s)/maxDepth):0;
                for(const [d,arr] of levels.entries()){
                    const x=clamp(marginX + d*stepX, 0, rect.width-s);
                    const totalH=(arr.length-1)*dy;
                    let startY=clamp((rect.height-totalH)/2, pad, rect.height-pad-totalH);
                    arr.forEach((n,i)=>{
                        if(n.locked) return;
                        n.x=x; n.y=clamp(startY + i*dy, 0, rect.height-s);
                    });
                }
            } else if(state.alignMode === 1){
                const marginY=Math.max(pad,s*0.15);
                const stepY=(maxDepth>0)?((rect.height-2*marginY-s)/maxDepth):0;
                for(const [d,arr] of levels.entries()){
                    const y=clamp(marginY + d*stepY, 0, rect.height-s);
                    const totalW=(arr.length-1)*dx;
                    let startX=clamp((rect.width-totalW)/2, pad, rect.width-pad-totalW);
                    arr.forEach((n,i)=>{
                        if(n.locked) return;
                        n.y=y; n.x=clamp(startX + i*dx, 0, rect.width-s);
                    });
                }
            } else {
                // staggered compact: zig-zag columns
                const cols = Math.max(1, maxDepth+1);
                const colW = clamp((rect.width - 2*pad) / cols, s*1.05, rect.width);
                let col=0;
                const all = Array.from(state.nodes.values()).filter(n=>!n.locked);
                all.sort((a,b)=>(depth[a.id]||0)-(depth[b.id]||0));
                const perCol = Math.ceil(all.length / cols);

                all.forEach((n,i)=>{
                    col = Math.floor(i / perCol);
                    const row = i % perCol;
                    const x = clamp(pad + col*colW, 0, rect.width-s);
                    const y = clamp(pad + row*(s*1.10), 0, rect.height-s);
                    n.x = x;
                    n.y = y + (col%2 ? s*0.30 : 0);
                });
            }

            document.querySelectorAll('.node').forEach(el=>{
                const n=state.nodes.get(el.dataset.id);
                if(!n) return;
                el.style.left=n.x+'px';
                el.style.top=n.y+'px';
            });
            drawLines();
        }

        // Modal edit
        let modalNodeId=null;
        let modalCreateShape=null;

        async function updateModalPreview(){
            const nodeEl = document.getElementById('modalPreviewNode');
            const labelEl = document.getElementById('modalPreviewLabel');
            if(!nodeEl || !labelEl) return;

            // read current modal fields
            const label = document.getElementById('mLabel').value || '';
            const border = document.getElementById('mBorder').value || '#111111';
            const fill = document.getElementById('mFill').value || '#ffffff';
            const text = document.getElementById('mText').value || '#111111';
            const shape = document.getElementById('mShape').value || 'circle';
            const bw = parseInt(document.getElementById('mBorderW').value,10);
            const eqScale = parseFloat(document.getElementById('mEqScale').value) || 1;

            nodeEl.classList.toggle('rect', shape==='rect');
            nodeEl.style.background = fill;
            nodeEl.style.color = text;
            nodeEl.style.borderWidth = bw + 'px';
            nodeEl.style.borderColor = (bw===0) ? 'transparent' : border;
            const bs = document.getElementById('mBorderStyle') ? document.getElementById('mBorderStyle').value : 'solid';
            nodeEl.style.borderStyle = (bw===0) ? 'solid' : bs;

            // render label using same renderer
            const tempNode = { label, eqScale };
            await renderLabel(labelEl, tempNode);
        }
        async function openModalFor(id){
            const n=state.nodes.get(id);
            if(!n) return;
            modalNodeId=id;

            document.getElementById('mLabel').value = n.label || '';
            document.getElementById('mBorder').value = n.border || '#111111';
            document.getElementById('mFill').value = n.fill || '#ffffff';
            document.getElementById('mText').value = n.text || '#111111';
            document.getElementById('mEqScale').value = (n.eqScale ?? 1);
            document.getElementById('mEqVal').textContent = (n.eqScale ?? 1).toFixed(2);
            document.getElementById('mShape').value = n.shape || 'circle';
            document.getElementById('mBorderW').value = String(Number.isFinite(n.borderW)?n.borderW:3);
            document.getElementById('mLocked').checked = !!n.locked;

            await updateModalPreview();
            $('#nodeModal').modal('show');
        }

        document.getElementById('mEqScale').addEventListener('input',(ev)=>{
            document.getElementById('mEqVal').textContent = parseFloat(ev.target.value).toFixed(2);
        });


        // live preview updates
        ['mLabel','mBorder','mFill','mText','mShape','mBorderW','mEqScale'].forEach(id=>{
            const el=document.getElementById(id);
            if(!el) return;
            el.addEventListener('input', ()=>updateModalPreview());
            el.addEventListener('change', ()=>updateModalPreview());
        });


        document.getElementById('mSave').addEventListener('click', async ()=>{
            const label = document.getElementById('mLabel').value;
            const border = document.getElementById('mBorder').value;
            const fill = document.getElementById('mFill').value;
            const text = document.getElementById('mText').value;
            const eqScale = parseFloat(document.getElementById('mEqScale').value) || 1;
            const shape = document.getElementById('mShape').value;
            const borderW = parseInt(document.getElementById('mBorderW').value,10);
            const borderStyle = document.getElementById('mBorderStyle') ? document.getElementById('mBorderStyle').value : 'solid';
            const locked = document.getElementById('mLocked').checked;

            if(!modalNodeId){
                // CREATE mode
                console.log('mSave');
                const id = await addNode(label || 'A', {border, fill, text, eqScale, borderW, borderStyle, shape});
                const n = state.nodes.get(id);
                if(n) n.locked = locked;
                // sync defaults to what user just picked
                document.getElementById('addBorder').value = border;
                document.getElementById('addFill').value = fill;
                document.getElementById('addTextColor').value = text;
                document.getElementById('addEqScale').value = eqScale;
                document.getElementById('vAddEq').textContent = eqScale.toFixed(2);
                document.getElementById('addBorderW').value = String(borderW);
                if(document.getElementById('addBorderStyle')) document.getElementById('addBorderStyle').value = borderStyle;
                await renderAll();
                $('#nodeModal').modal('hide');
                modalCreateShape = null;
                return;
            }

            // EDIT mode
            const n=state.nodes.get(modalNodeId);
            if(!n) return;

            n.label = label;
            n.border = border;
            n.fill = fill;
            n.text = text;
            n.eqScale = eqScale;
            n.shape = shape;
            n.borderW = borderW;
            n.borderStyle = borderStyle;
            n.locked = locked;

            // sync new-shape defaults to edited node (so Add uses same style)
            document.getElementById('addBorder').value = n.border || '#111111';
            document.getElementById('addFill').value = n.fill || '#ffffff';
            document.getElementById('addTextColor').value = n.text || '#111111';
            document.getElementById('addEqScale').value = (n.eqScale ?? 1);
            document.getElementById('vAddEq').textContent = (n.eqScale ?? 1).toFixed(2);
            document.getElementById('addBorderW').value = String(n.borderW ?? 3);
            if(document.getElementById('addBorderStyle')) document.getElementById('addBorderStyle').value = (n.borderStyle || 'solid');

            await renderAll();
            $('#nodeModal').modal('hide');
        });

        // JSON
        function toJSON(){
            return JSON.stringify({
                version:10,
                stage:{widthPreset:state.stageWidthPreset,height:state.stageHeight,grid:stage.classList.contains('grid-on')},
                globals:{
                    nodeSize:getVarPx('--nodeSize'),
                    fontSize:getVarPx('--fontSize'),
                    lineStroke:getVarPx('--lineStroke'),
                    lineColor:getVar('--lineColor'),
                    lineDash:getVar('--lineDash'),
                    arrowMode:getVar('--arrowMode'),
                    arrowStyle:getVar('--arrowStyle'),
                    arrowSize:parseInt(getVar('--arrowSize'))||12,
                    arrowStroke:parseInt(getVar('--arrowStroke'))||0,
                    gridSize:parseInt(getVar('--gridSize'))||24
                },
                nodes:[...state.nodes.values()].map(n=>({
                    id:n.id,x:n.x,y:n.y,label:n.label,
                    border:n.border,fill:n.fill,text:n.text,
                    borderW:n.borderW,eqScale:n.eqScale,shape:n.shape,locked:!!n.locked
                })),
                edges:state.edges.map(e=>({from:e.from,to:e.to}))
            },null,2);
        }

        async function loadFromObject(obj){
            if(!obj || !obj.nodes) throw new Error('Invalid JSON');
            state.nodes.clear(); state.edges=[]; state.selected.clear(); state.nextId=1;

            if(obj.globals){
                if(Number.isFinite(obj.globals.nodeSize)) setVar('--nodeSize', obj.globals.nodeSize+'px');
                if(Number.isFinite(obj.globals.fontSize)) setVar('--fontSize', obj.globals.fontSize+'px');
                if(Number.isFinite(obj.globals.lineStroke)) setVar('--lineStroke', obj.globals.lineStroke+'px');
                if(typeof obj.globals.lineColor==='string') setVar('--lineColor', obj.globals.lineColor);
                if(typeof obj.globals.lineDash==='string') setVar('--lineDash', obj.globals.lineDash);
                if(typeof obj.globals.arrowMode==='string') setVar('--arrowMode', obj.globals.arrowMode);
                if(typeof obj.globals.arrowStyle==='string') setVar('--arrowStyle', obj.globals.arrowStyle);
                if(Number.isFinite(obj.globals.arrowSize)) setVar('--arrowSize', obj.globals.arrowSize+'px');
                if(Number.isFinite(obj.globals.arrowStroke)) setVar('--arrowStroke', obj.globals.arrowStroke+'px');
                if(Number.isFinite(obj.globals.gridSize)) setVar('--gridSize', obj.globals.gridSize+'px');
            }
            if(obj.stage){
                if(typeof obj.stage.widthPreset==='string') state.stageWidthPreset=obj.stage.widthPreset;
                if(Number.isFinite(obj.stage.height)) state.stageHeight=obj.stage.height;
                if(typeof obj.stage.grid==='boolean'){
                    stage.classList.toggle('grid-on', obj.stage.grid);
                    document.getElementById('toggleGrid').checked=obj.stage.grid;
                }
            }

            for(const nn of obj.nodes){
                const id=String(nn.id);
                state.nodes.set(id,{
                    id,
                    x: nn.x||0,
                    y: nn.y||0,
                    label: nn.label ?? '',
                    border: nn.border || '#111',
                    fill: nn.fill || '#fff',
                    text: nn.text || '#111',
                    borderW: Number.isFinite(nn.borderW)?nn.borderW:3,
                    eqScale: Number.isFinite(nn.eqScale)?nn.eqScale:1,
                    shape: nn.shape || 'circle',
                    locked: !!nn.locked,
                    isMath:false, svgLabel:null
                });
                const num=parseInt(id,10);
                if(Number.isFinite(num)) state.nextId=Math.max(state.nextId,num+1);
                else{
                    // keep nextId incremental even if ids are n1-style
                    state.nextId = Math.max(state.nextId, state.nodes.size+1);
                }
            }
            if(Array.isArray(obj.edges)){
                state.edges = obj.edges
                    .filter(e=>e && state.nodes.has(String(e.from)) && state.nodes.has(String(e.to)))
                    .map(e=>({from:String(e.from),to:String(e.to)}));
            }

            // reflect UI
            document.getElementById('lineColor').value = (getVar('--lineColor') || '#111111');
            document.getElementById('lineStyle').value = (getVar('--lineDash') || 'none');
            document.getElementById('arrowMode').value = (getVar('--arrowMode') || 'end');
            if(document.getElementById('arrowStyle')) document.getElementById('arrowStyle').value = (getVar('--arrowStyle') || 'triangle');
            if(document.getElementById('arrowSize')) document.getElementById('arrowSize').value = (parseInt(getVar('--arrowSize'))||12);
            if(document.getElementById('arrowStroke')) document.getElementById('arrowStroke').value = (parseInt(getVar('--arrowStroke'))||0);
            document.getElementById('stageWidthPreset').value = state.stageWidthPreset;
            document.getElementById('nodeSize').value = getVarPx('--nodeSize');
            document.getElementById('fontSize').value = getVarPx('--fontSize');
            document.getElementById('lineStroke').value = getVarPx('--lineStroke');

            applyStageSize();
            await renderAll();
        }

        function downloadText(filename,text,mime){
            const blob=new Blob([text],{type:mime||'text/plain;charset=utf-8'});
            const url=URL.createObjectURL(blob);
            const a=document.createElement('a');
            a.href=url; a.download=filename;
            document.body.appendChild(a);
            a.click();
            a.remove();
            URL.revokeObjectURL(url);
        }

        // Export SVG
        function safeText(s){ return (s||'').replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;"); }
        function exportSVG(){
            const rect=stageRect();
            const W=Math.round(rect.width), H=Math.round(rect.height);
            const nodeSize=getVarPx('--nodeSize');
            const lineStroke=getVarPx('--lineStroke');
            const lineColor=getVar('--lineColor')||'#111';
            const dash=getVar('--lineDash')||'none';
            const arrow=getVar('--arrowMode')||'end';
            const fontSize=getVarPx('--fontSize');

            const dashArr = (dash==='dashed') ? `${lineStroke*3} ${lineStroke*2}` :
                (dash==='dotted') ? `${lineStroke} ${lineStroke*1.6}` : null;

            const parts=[];
            parts.push(`<svg xmlns="http://www.w3.org/2000/svg" width="${W}" height="${H}" viewBox="0 0 ${W} ${H}">`);
            const arrowStyle=getVar('--arrowStyle')||'triangle';
            const arrowSize=parseInt(getVar('--arrowSize'))||12;
            const arrowStroke=parseInt(getVar('--arrowStroke'))||0;

            function markerPath(kind, flip){
                if(kind==='diamond') return flip ? 'M 10 5 L 5 0 L 0 5 L 5 10 Z' : 'M 0 5 L 5 0 L 10 5 L 5 10 Z';
                if(kind==='chevron') return flip ? 'M 8 1 L 2 5 L 8 9' : 'M 2 1 L 8 5 L 2 9';
                if(kind==='wide') return flip ? 'M 10 0 L 0 5 L 10 10 Z' : 'M 0 0 L 10 5 L 0 10 Z';
                return flip ? 'M 10 0 L 0 5 L 10 10 Z' : 'M 0 0 L 10 5 L 0 10 Z';
            }

            function markerDef(id, flip){
                const refX = flip ? 1 : 9;
                const refY = 5;
                let content='';
                if(arrowStyle==='circle'){
                    content = `<circle cx="5" cy="5" r="4" fill="${lineColor}" ${arrowStroke>0?`stroke="${lineColor}" stroke-width="${arrowStroke}"`:''}/>`;
                }else if(arrowStyle==='chevron'){
                    const sw = Math.max(1, arrowStroke || 2);
                    content = `<path d="${markerPath(arrowStyle, flip)}" fill="none" stroke="${lineColor}" stroke-width="${sw}" stroke-linecap="round" stroke-linejoin="round"/>`;
                }else{
                    content = `<path d="${markerPath(arrowStyle, flip)}" fill="${lineColor}" ${arrowStroke>0?`stroke="${lineColor}" stroke-width="${arrowStroke}"`:''}/>`;
                }
                return `<marker id="${id}" markerWidth="${arrowSize}" markerHeight="${arrowSize}" refX="${refX}" refY="${refY}" orient="auto" markerUnits="userSpaceOnUse" viewBox="0 0 10 10">${content}</marker>`;
            }

            parts.push(`<defs>
      ${markerDef('arrowEnd', false)}
      ${markerDef('arrowStart', true)}
    </defs>`);

            let gAttrs = `fill="none" stroke="${lineColor}" stroke-width="${lineStroke}" stroke-linecap="round" shape-rendering="crispEdges" vector-effect="non-scaling-stroke"`;
            if(dashArr) gAttrs += ` stroke-dasharray="${dashArr}"`;
            parts.push(`<g ${gAttrs}>`);
            for(const e of state.edges){
                const a=state.nodes.get(e.from), b=state.nodes.get(e.to);
                if(!a||!b) continue;
                const ca={x: nodeCenter(a).cx, y: nodeCenter(a).cy};
                const cb={x: nodeCenter(b).cx, y: nodeCenter(b).cy};
                const p1 = boundaryPoint(a, cb);
                const p2 = boundaryPoint(b, ca);
                let extra='';
                if(arrow==='start'||arrow==='both') extra += ` marker-start="url(#arrowStart)"`;
                if(arrow==='end'||arrow==='both') extra += ` marker-end="url(#arrowEnd)"`;
                parts.push(`<line x1="${crisp(ca.cx,lineStroke)}" y1="${crisp(ca.cy,lineStroke)}" x2="${crisp(cb.cx,lineStroke)}" y2="${crisp(cb.cy,lineStroke)}"${extra}/>`);
            }
            parts.push(`</g>`);

            parts.push(`<g>`);
            for(const n of state.nodes.values()){
                const cx=n.x + nodeSize/2;
                const cy=n.y + nodeSize/2;
                const bw=Number.isFinite(n.borderW)?n.borderW:3;
                const border=(bw===0)?'transparent':(n.border||'#111');
                const fill=n.fill||'#fff';
                const text=n.text||'#111';

                if(n.shape==='rect'){
                    parts.push(`<rect x="${n.x}" y="${n.y}" width="${nodeSize}" height="${nodeSize}" rx="14" ry="14" fill="${fill}" stroke="${border}" stroke-width="${bw}"/>`);
                }else{
                    const r=nodeSize/2 - bw/2;
                    parts.push(`<circle cx="${cx}" cy="${cy}" r="${r}" fill="${fill}" stroke="${border}" stroke-width="${bw}" shape-rendering="geometricPrecision"/>`);
                }

                if(n.isMath && n.svgLabel){
                    const eqScale=Number.isFinite(n.eqScale)?n.eqScale:1;
                    const box=(nodeSize*0.70)*eqScale;
                    const left=cx - box/2;
                    const top=cy - box/2;
                    const inner=n.svgLabel.replace(/^<svg[^>]*>/i,'').replace(/<\/svg>\s*$/i,'');
                    parts.push(`<g transform="translate(${left},${top})">
          <svg width="${box}" height="${box}" preserveAspectRatio="xMidYMid meet">
            <g fill="${text}" stroke="${text}">${inner}</g>
          </svg>
        </g>`);
                }else{
                    parts.push(`<text x="${cx}" y="${cy}" text-anchor="middle" dominant-baseline="middle" font-family="Arial, sans-serif" font-size="${fontSize}" fill="${text}">${safeText(n.label||'')}</text>`);
                }
            }
            parts.push(`</g></svg>`);
            return parts.join('\n');
        }

        // Controls wiring
        document.getElementById('btnAutoAlignIcon').addEventListener('click', autoAlign);

        // overlay: add menu + clear selection
        const addBtn = document.getElementById('btnAddIcon');
        const addMenu = document.getElementById('addMenu');
        function closeAddMenu(){ addMenu.style.display='none'; }
        addBtn.addEventListener('click',(e)=>{
            e.stopPropagation();
            addMenu.style.display = (addMenu.style.display==='block') ? 'none' : 'block';
        });
        document.getElementById('addMenuCircle').addEventListener('click', async (e)=>{ e.stopPropagation(); closeAddMenu(); const id = await addNode('A', currentDefaultOpts('circle')); if(id) openModalFor(id); });
        document.getElementById('addMenuRect').addEventListener('click', async (e)=>{ e.stopPropagation(); closeAddMenu(); const id = await addNode('A', currentDefaultOpts('rect')); if(id) openModalFor(id); });
        document.addEventListener('click', ()=>closeAddMenu());

        document.getElementById('btnClearSelIcon').addEventListener('click', (e)=>{
            e.stopPropagation();
            if(confirm('Are you sure you want to clear the entire stage?')){
                clearAll();
            }
        });

        // stage click clears selection
        stage.addEventListener('click',()=>clearSelection());

        // keyboard select all
        document.addEventListener('keydown',(ev)=>{
            const tag=(ev.target && ev.target.tagName||'').toLowerCase();
            const typing = (tag==='input' || tag==='textarea' || ev.target.isContentEditable);

            if((ev.ctrlKey||ev.metaKey) && ev.key.toLowerCase()==='a'){
                if(typing) return; // let text select all when typing
                ev.preventDefault();
                selectAll();
                return;
            }

            if(!typing && (ev.key==='Delete' || ev.key==='Backspace')){
                if(state.selected.size===0) return;
                ev.preventDefault();
                if(confirm('Delete the selected shape(s)?')){
                    deleteSelected();
                }
            }
        });

        function currentDefaultOpts(shape){
            return {
                border: document.getElementById('addBorder').value,
                fill: document.getElementById('addFill').value,
                text: document.getElementById('addTextColor').value,
                eqScale: parseFloat(document.getElementById('addEqScale').value)||1,
                borderW: parseInt(document.getElementById('addBorderW').value,10),
                borderStyle: (document.getElementById('addBorderStyle')?document.getElementById('addBorderStyle').value:'solid'),
                shape: shape
            };
        }

        async function addFromUI(shape){
            const label = document.getElementById('addText').value.trim() || 'A';
            const id = await addNode(label, currentDefaultOpts(shape));
            // open edit modal immediately (same workflow as editing)
            if(id) openModalFor(id);
        }


        document.getElementById('addEqScale').addEventListener('input',(ev)=>{
            document.getElementById('vAddEq').textContent = parseFloat(ev.target.value).toFixed(2);
        });

        document.getElementById('lineColor').addEventListener('input',(ev)=>{
            setVar('--lineColor', ev.target.value);
            drawLines();
        });
        document.getElementById('lineStyle').addEventListener('change',(ev)=>{
            setVar('--lineDash', ev.target.value);
            drawLines();
        });
        document.getElementById('arrowMode').addEventListener('change',(ev)=>{ setVar('--arrowMode', ev.target.value); drawLines(); });
        document.getElementById('arrowStyle').addEventListener('change',(ev)=>{ setVar('--arrowStyle', ev.target.value); drawLines(); });
        document.getElementById('arrowSize').addEventListener('input',(ev)=>{ document.getElementById('vArrowSize').textContent = ev.target.value; setVar('--arrowSize', ev.target.value+'px'); drawLines(); });
        document.getElementById('arrowStroke').addEventListener('input',(ev)=>{ document.getElementById('vArrowStroke').textContent = ev.target.value; setVar('--arrowStroke', ev.target.value+'px'); drawLines(); });
        document.getElementById('lineStroke').addEventListener('input',(ev)=>{
            document.getElementById('vLineStroke').textContent = ev.target.value;
            setVar('--lineStroke', ev.target.value+'px');
            drawLines();
        });

        document.getElementById('toggleGrid').addEventListener('change',(ev)=>{
            stage.classList.toggle('grid-on', ev.target.checked);
            updateRuler();
        });

        document.getElementById('stageWidthPreset').addEventListener('change',(ev)=>{
            state.stageWidthPreset = ev.target.value;
            applyStageSize();
        });

        document.getElementById('nodeSize').addEventListener('input',(ev)=>{
            document.getElementById('vNodeSize').textContent = ev.target.value;
            setVar('--nodeSize', ev.target.value+'px');
            applyStageSize();
            renderAll();
        });

        document.getElementById('fontSize').addEventListener('input',(ev)=>{
            document.getElementById('vFontSize').textContent = ev.target.value;
            setVar('--fontSize', ev.target.value+'px');
            renderAll();
        });

        // JSON buttons
        document.getElementById('btnSaveJson').addEventListener('click', ()=>{
            const json = toJSON();
            document.getElementById('jsonBox').value = json;
            downloadText('part-whole-tree.json', json, 'application/json;charset=utf-8');
        });

        document.getElementById('btnLoadJson').addEventListener('click', ()=>{
            console.log('btnLoadJson----------------------');
            const txt=document.getElementById('jsonBox').value.trim();
            if(txt){
                try{ loadFromObject(JSON.parse(txt)); return; }catch(e){}
            }
            //document.getElementById('jsonFile').click();
        });

        document.getElementById('jsonFile').addEventListener('change', async (ev)=>{
            const f=ev.target.files && ev.target.files[0];
            if(!f) return;
            const txt=await f.text();
            document.getElementById('jsonBox').value=txt;
            try{ await loadFromObject(JSON.parse(txt)); }
            catch(e){ alert('Invalid JSON file.'); }
            finally{ ev.target.value=''; }
        });
        // SVG export (moved next to JSON)
        document.getElementById('btnExportSvg2').addEventListener('click', ()=>{
            const svg = exportSVG();
            document.getElementById('svgBox').value = svg;
            document.getElementById('btnDownloadSvg2').disabled = false;
        });
        document.getElementById('btnDownloadSvg2').addEventListener('click', ()=>{
            const svg = document.getElementById('svgBox').value.trim();
            if(!svg) return alert('Export SVG first.');
            downloadText('part-whole-model.svg', svg, 'image/svg+xml;charset=utf-8');
        });

        // Load example
        async function loadExample(){
            state.nodes.clear();
            state.edges = [];
            state.selected.clear();
            state.nextId = 1;

            applyStageSize();
            const rect=stageRect();
            const s=getVarPx('--nodeSize');

            function put(label,x,y,shape='circle', eqScale=1){
                const id=String(state.nextId++);
                state.nodes.set(id,{
                    id,
                    x: clamp(x,0,rect.width-s),
                    y: clamp(y,0,rect.height-s),
                    label,
                    border: document.getElementById('addBorder').value,
                    fill: document.getElementById('addFill').value,
                    text: document.getElementById('addTextColor').value,
                    borderW: parseInt(document.getElementById('addBorderW').value,10),
                    borderStyle: (document.getElementById('addBorderStyle')?document.getElementById('addBorderStyle').value:'solid'),
                    eqScale,
                    shape,
                    locked:false,
                    isMath:false,
                    svgLabel:null
                });
                return id;
            }

            const n1=put('100%', 80, rect.height/2 - s/2);
            const n2=put('A',    260, rect.height/2 - s - 40);
            const n3=put('0.7',  260, rect.height/2 + 40);
            const n4=put('\\frac{1}{10}', 480, rect.height/2 - s - 120, 'circle', 0.90);
            const n5=put('B',    480, rect.height/2 - 20);
            const n6=put('10%',  720, rect.height/2 - s - 40);
            const n7=put('C',    720, rect.height/2 + 80);

            state.edges.push(
                {from:n1,to:n2},
                {from:n1,to:n3},
                {from:n2,to:n4},
                {from:n2,to:n5},
                {from:n5,to:n6},
                {from:n5,to:n7}
            );

            await renderAll();
            state.selected.clear(); state.selected.add(n1);
            refreshSelectedStyles();
        }

        // initial
        function init(){
            setVar('--lineColor', document.getElementById('lineColor').value);
            setVar('--lineDash', document.getElementById('lineStyle').value);
            setVar('--arrowMode', document.getElementById('arrowMode').value);
            setVar('--arrowStyle', document.getElementById('arrowStyle').value);
            setVar('--arrowSize', document.getElementById('arrowSize').value+'px');
            setVar('--arrowStroke', document.getElementById('arrowStroke').value+'px');
            setVar('--lineStroke', document.getElementById('lineStroke').value+'px');
            setVar('--fontSize', document.getElementById('fontSize').value+'px');
            setVar('--nodeSize', document.getElementById('nodeSize').value+'px');
            // slider readouts
            document.getElementById('vNodeSize').textContent = document.getElementById('nodeSize').value;
            document.getElementById('vFontSize').textContent = document.getElementById('fontSize').value;
            document.getElementById('vLineStroke').textContent = document.getElementById('lineStroke').value;
            document.getElementById('vArrowSize').textContent = document.getElementById('arrowSize').value;
            document.getElementById('vArrowStroke').textContent = document.getElementById('arrowStroke').value;

            applyStageSize();
            updateRuler();
            // load example after 2 frames for stable size
            requestAnimationFrame(()=>requestAnimationFrame(loadExample));

            $("#btnLoadJson").click();
        }

        window.addEventListener('resize', ()=>applyStageSize());
        // enable bootstrap tooltips
        try{ $('[data-toggle="tooltip"]').tooltip(); }catch(e){}
        init();

        $(document).on('click', '.insert-whole-modal', function () {
            const svg = exportSVG();


            var editor_data = '<div id="rureraform-element-5" class="rureraform-element-5 rureraform-element quiz-group rureraform-element-html" data-type="question_label">'+svg+'</div>';



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

            console.log('daata-type-----'+type);

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
                    template_names.forEach(function(templateName) {
                        console.log(templateName);
                        if( jQuery('.rureraform-toolbar-tool-other[data-type="'+templateName+'"] a').length > 0){
                            jQuery('.rureraform-toolbar-tool-other[data-type="'+templateName+'"] a').click();
                        }else if( jQuery('.rureraform-toolbar-tool-input[data-type="'+templateName+'"] a').length > 0){
                            jQuery('.rureraform-toolbar-tool-input[data-type="'+templateName+'"] a').click();
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

            $(".whole-modal-builder").modal('hide');
            $('.rureraform-toolbar-tool-other[data-type="whole_modal_builder"] a').click();
            var current_element = $(".whole_modal_builder_element").last().attr('data-index_i');
            rureraform_form_elements[current_element]["content"] = svg;
            $(".whole_modal_builder_element").last().html(svg);

            console.log(svg);
        });
    }
    runtesting();



</script>
