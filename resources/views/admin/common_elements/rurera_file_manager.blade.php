
<style>

    .rurera-filepicker .rfp-fileinput-hidden{position:absolute;left:-9999px;top:auto;width:1px;height:1px;opacity:0;}
    /* Scoped to prevent conflicts */
    .rurera-filepicker {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    .rurera-filepicker .rfp-btn {
        font-weight: 500;
    }

    .rurera-filepicker .rfp-selected-wrap {
        border: 1px solid rgba(0,0,0,.08);
        border-radius: 6px;
        padding: 12px;
        background: #fff;
    }

    .rurera-filepicker .rfp-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 10px;
        border: 1px solid rgba(0,0,0,.08);
        border-radius: 6px;
        margin-bottom: 10px;
        background: #fafafa;
    }

    .rurera-filepicker .rfp-drag-handle {
        cursor: grab;
        user-select: none;
        font-weight: 900;
        color: #6c757d;
        padding: 0 6px 0 0;
        line-height: 1;
        font-size: 18px;
    }
    .rurera-filepicker .rfp-item[draggable="true"] { cursor: default; }
    .rurera-filepicker .rfp-item.rfp-dragging { opacity: 0.55; }
    .rurera-filepicker .rfp-item.rfp-drop-target { outline: 2px dashed rgba(0,123,255,.35); }

    .rurera-filepicker .rfp-item:last-child { margin-bottom: 0; }

    .rurera-filepicker .rfp-item-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 0;
    }

    .rurera-filepicker .rfp-thumb {
        width: 44px;
        height: 44px;
        border-radius: 6px;
        border: 1px solid rgba(0,0,0,.08);
        background: #fff;
        overflow: hidden;
        flex: 0 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .rurera-filepicker .rfp-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .rurera-filepicker .rfp-title {
        font-weight: 600;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 420px;
    }

    .rurera-filepicker .rfp-sub {
        color: #6c757d;
        font-size: 12px;
    }

    /* Modal upload area */
    .rurera-filepicker .rfp-dropzone {
        border: 2px dashed #ced4da;
        border-radius: 10px;
        background: #fafafa;
        padding: 28px;
        text-align: center;
        transition: 0.2s ease-in-out;
        user-select: none;
    }

    .rurera-filepicker .rfp-dropzone.rfp-dragover {
        background: #f0f6ff;
        border-color: #007bff;
    }


    .rurera-filepicker .rfp-fileinput-hidden{
        position:absolute;
        left:-9999px;
        width:1px;
        height:1px;
        opacity:0;

    }

    /* 200x200 gallery tiles */
    .rurera-filepicker .rfp-gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, 200px);
        justify-content: start;
        gap: 14px;
    }

    .rurera-filepicker .rfp-tile {
        border: 1px solid rgba(0,0,0,.08);
        border-radius: 10px;
        background: #fff;
        overflow: hidden;
        cursor: pointer;
        transition: transform .08s ease-in-out, box-shadow .08s ease-in-out;
        height: 200px;
        position: relative;
    }

    .rurera-filepicker .rfp-tile:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 18px rgba(0,0,0,.08);
    }

    .rurera-filepicker .rfp-tile img {
        width: 200px;
        height: 200px;
        max-width: 200px;
        max-height: 200px;
        object-fit: contain;
        display: block;
    }

    .rurera-filepicker .rfp-tile .rfp-tile-label {
        position: absolute;
        left: 10px;
        right: 10px;
        bottom: 10px;
        background: rgba(0,0,0,.55);
        color: #fff;
        padding: 6px 8px;
        border-radius: 8px;
        font-size: 12px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .rurera-filepicker .rfp-tile .rfp-tile-check {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: rgba(255,255,255,.92);
        border: 1px solid rgba(0,0,0,.12);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        color: #28a745;
        opacity: 0;
        transition: opacity .1s ease-in-out;
    }

    .rurera-filepicker .rfp-tile.rfp-selected .rfp-tile-check { opacity: 1; }


</style>

<!-- Tabs -->
<ul class="nav nav-tabs" id="rfpTabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="rfp-tab-upload" data-toggle="tab" href="#rfp-pane-upload" role="tab" aria-controls="rfp-pane-upload" aria-selected="true">File Upload</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="rfp-tab-gallery" data-toggle="tab" href="#rfp-pane-gallery" role="tab" aria-controls="rfp-pane-gallery" aria-selected="false">Gallery</a>
    </li>
</ul>

<div class="tab-content pt-3 rurera-file-manager-attr" {{isset($upload_attrs)? $upload_attrs : ''}}>

    <div class="hidden-field-data">
        {!! $hidden_field !!}
    </div>
    <!-- TAB 1: UPLOAD -->
    <div class="tab-pane fade show active" id="rfp-pane-upload" role="tabpanel" aria-labelledby="rfp-tab-upload">

        <div class="alert alert-info">
            <strong>Upload rules:</strong>
            <ul class="mb-0">
                <li>Maximum <strong>5 files</strong> per insert</li>
                <li>Maximum <strong>4 MB</strong> per file</li>
                <li>Allowed types: <strong>JPG</strong>, <strong>PDF</strong>, <strong>SVG</strong>, <strong>DOCX</strong></li>
            </ul>
        </div>

        <div class="rfp-dropzone" id="rfpDropzone">
            <div class="mb-2">
                <svg width="46" height="46" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-muted">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="12" y1="18" x2="12" y2="12"></line>
                    <line x1="9" y1="15" x2="12" y2="12"></line>
                    <line x1="15" y1="15" x2="12" y2="12"></line>
                </svg>
            </div>
            <div class="font-weight-bold">Drag &amp; drop files here</div>
            <div class="text-muted small">or click to select (max 5 files, 4 MB each)</div>
            <input id="rfpFileInput" class="rfp-fileinput-hidden" type="file" multiple
                   accept=".pdf,.docx,.svg,.jpg,.jpeg,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/jpeg,image/svg+xml" />
            <div class="mt-3">
                <label class="btn btn-primary rfp-btn mb-0" id="rfpChooseBtn" for="rfpFileInput">Select Files</label>
            </div>
        </div>

        <div class="mt-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="font-weight-bold">Selected for upload</div>
                <div class="text-muted small"><span id="rfpUploadCount">0</span>/5</div>
            </div>
            <div id="rfpUploadList"></div>

            <div class="d-flex justify-content-end mt-2">
                <button type="button" class="btn btn-success rfp-btn upload-files-btn" id="rfpUploadBtn" disabled>Upload</button>
            </div>

            <div id="rfpUploadStatus" class="mt-3" style="display:none;"></div>
        </div>

        <hr />

        <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="font-weight-bold">Successful uploads</div>
            <div class="text-muted small">Select thumbs, then click <strong>Insert</strong></div>
        </div>

        <div id="rfpUploadedGrid" class="rfp-gallery-grid"></div>

    </div>

    <!-- TAB 2: GALLERY -->
    <div class="tab-pane fade" id="rfp-pane-gallery" role="tabpanel" aria-labelledby="rfp-tab-gallery">

        <form name="gallery-area" type="POST" class="gallery-load-form" action="javascript:;">

            @if(isset($gallery_fields) && !empty($gallery_fields))

                @foreach($gallery_fields as $field_name => $field_value)
                    <input type="hidden" name="{{$field_name}}" value="{{$field_value}}">
                @endforeach
            @endif


            <div class="d-flex flex-wrap align-items-end" style="gap:10px;">
                <div>
                    <label class="small text-muted mb-1">Type</label>
                    <select name="file_type" class="form-control form-control-sm" id="rfpFilterType">
                        <option value="all">All</option>
                        <option value="image">Images (JPG/SVG)</option>
                        <option value="pdf">PDF</option>
                        <option value="docx">DOCX</option>
                    </select>
                </div>
                <div>
                    <label name="sort_by" class="small text-muted mb-1">Sort</label>
                    <select class="form-control form-control-sm" id="rfpFilterSort">
                        <option value="recent">Most recent</option>
                        <option value="name">Name (A–Z)</option>
                    </select>
                </div>

                <div class="flex-grow-1" style="min-width:220px; max-width:420px;">
                    <label class="small text-muted mb-1">Search</label>
                    <input type="text" name="file_name" class="form-control form-control-sm" id="rfpSearch" placeholder="Search by title...">
                </div>
                <div class="flex-grow-1"></div>
                <div class="text-muted small">Showing up to <strong>30</strong> recent files</div>
            </div>
        </form>

        <div class="rurera-gallery-grid">
            Loading...
            <div id="rfpGalleryGrid" class="mt-3 rfp-gallery-grid rurera-gallery-grid">


            </div>
        </div>

    </div>

</div>


<script>
    (function() {
        'use strict';

        $(document).on('click', '.rfp-tile', function () {

            var id = $(this).attr('data-item-id');
            //var id = "13147";
            var is_multiple = $('.rurera-file-manager-attr')
                .attr('data-is_multiple')
                .replace(/^"+|"+$/g, '');

            if(is_multiple == 'false') {
                selectedToInsertIds.clear();
                $('.rfp-tile').removeClass('rfp-selected');
            }
            if (selectedToInsertIds.has(id)) {
                selectedToInsertIds.delete(id);
                $(this).removeClass('rfp-selected');
            } else {
                // cap to 2
                if (selectedToInsertIds.size >= CONFIG.maxFiles) {
                    // swap out the oldest selected (first in set)
                    const first = selectedToInsertIds.values().next().value;
                    if (first) selectedToInsertIds.delete(first);
                }
                selectedToInsertIds.add(id);
                $(this).addClass('rfp-selected');
            }
            console.log('----selectedToInsertIds---');
            console.log(selectedToInsertIds);
            renderGalleryTab();
            updateInsertFooter();
        });

        // Public output contract (kept from your previous version)
        window.PdfUploadQuestion = window.PdfUploadQuestion || {};
        window.PdfUploadQuestion.userResponse = window.PdfUploadQuestion.userResponse || [];

        const CONFIG = {
            maxFiles: 5,
            maxFileSizeBytes: 4 * 1024 * 1024,
            allowedExtensions: ['.pdf', '.docx', '.svg', '.jpg', '.jpeg'],
            allowedMimeTypes: [
                'application/pdf',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'image/jpeg',
                'image/svg+xml'
            ],
            storageKey: 'rurera_file_gallery_v2',
            recentLimit: 30
        };

        // Elements
        const el = {
            // Main
            mainSelectedList: document.getElementById('rfpMainSelectedList'),
            mainEmpty: document.getElementById('rfpMainEmpty'),
            mainSelectedCount: document.getElementById('rfpMainSelectedCount'),
            debug: document.getElementById('rfpDebug'),

            // Upload tab
            dropzone: document.getElementById('rfpDropzone'),
            fileInput: document.getElementById('rfpFileInput'),
            chooseBtn: document.getElementById('rfpChooseBtn'),
            uploadList: document.getElementById('rfpUploadList'),
            uploadCount: document.getElementById('rfpUploadCount'),
            uploadBtn: document.getElementById('rfpUploadBtn'),
            uploadStatus: document.getElementById('rfpUploadStatus'),
            uploadedGrid: document.getElementById('rfpUploadedGrid'),

            // Gallery tab
            search: document.getElementById('rfpSearch'),
            filterType: document.getElementById('rfpFilterType'),
            filterSort: document.getElementById('rfpFilterSort'),
            galleryGrid: document.getElementById('rfpGalleryGrid'),

            // Footer actions
            insertCount: document.getElementById('rfpInsertCount'),
            insertBtn: document.getElementById('rfpInsertBtn')
        };

        /** @type {File[]} */
        let filesToUpload = [];

        /** @type {Set<string>} */
        let selectedToInsertIds = new Set();

        /** @type {any[]} */
        let sessionUploaded = [];


        // --- Helpers ---
        function bytesToMb(bytes) {
            return (bytes / (1024 * 1024)).toFixed(2);
        }

        function extOf(name) {
            const i = name.lastIndexOf('.');
            return i >= 0 ? name.slice(i).toLowerCase() : '';
        }

        function isAllowedFile(file) {
            const ext = extOf(file.name);
            const okExt = CONFIG.allowedExtensions.includes(ext);
            const okMime = CONFIG.allowedMimeTypes.includes(file.type) || file.type === '';
            return okExt && okMime;
        }

        function validateFilesBatch(fileList) {
            const errors = [];
            if (fileList.length > CONFIG.maxFiles) {
                errors.push(`You can select up to ${CONFIG.maxFiles} files.`);
            }
            for (const f of fileList) {
                if (!isAllowedFile(f)) {
                    errors.push(`Not allowed: ${f.name} (only JPG, PDF, SVG, DOCX).`);
                }
                if (f.size > CONFIG.maxFileSizeBytes) {
                    errors.push(`${f.name} is ${bytesToMb(f.size)} MB (max 4.00 MB).`);
                }
            }
            return errors;
        }

        function showStatus(kind, html) {
            el.uploadStatus.style.display = 'block';
            el.uploadStatus.className = `alert alert-${kind}`;
            el.uploadStatus.innerHTML = html;
        }

        function hideStatus() {
            el.uploadStatus.style.display = 'none';
            el.uploadStatus.className = '';
            el.uploadStatus.innerHTML = '';
        }

        function makePlaceholderThumbSvg(label) {
            const safe = String(label || '').replace(/[&<>]/g, '');
            const svg = `
          <svg xmlns="http://www.w3.org/2000/svg" width="400" height="400" viewBox="0 0 400 400">
            <rect x="0" y="0" width="400" height="400" fill="#f1f3f5"/>
            <rect x="70" y="70" width="260" height="260" rx="22" fill="#ffffff" stroke="#dee2e6"/>
            <text x="200" y="215" text-anchor="middle" font-family="Arial, sans-serif" font-size="54" font-weight="700" fill="#495057">${safe}</text>
          </svg>
        `.trim();
            return 'data:image/svg+xml;charset=utf-8,' + encodeURIComponent(svg);
        }

        function fileKindFromTypeOrExt(mime, name) {
            const ext = extOf(name);
            if (mime === 'application/pdf' || ext === '.pdf') return 'pdf';
            if (mime === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' || ext === '.docx') return 'docx';
            if (mime === 'image/svg+xml' || ext === '.svg') return 'image';
            if (mime === 'image/jpeg' || ext === '.jpg' || ext === '.jpeg') return 'image';
            return 'other';
        }

        function readFileAsDataURL(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.onload = () => resolve(reader.result);
                reader.onerror = () => reject(new Error('File read failed'));
                reader.readAsDataURL(file);
            });
        }

        function loadGallery() {
            try {
                const raw = localStorage.getItem(CONFIG.storageKey);
                const parsed = raw ? JSON.parse(raw) : [];
                return Array.isArray(parsed) ? parsed : [];
            } catch (e) {
                return [];
            }
        }

        function saveGallery(items) {
            try {
                localStorage.setItem(CONFIG.storageKey, JSON.stringify(items));
            } catch (e) {
                // ignore
            }
        }


        function makeDummySvgDataUrl(labelText) {
            const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200">
          <defs>
            <linearGradient id="g" x1="0" x2="1" y1="0" y2="1">
              <stop offset="0" stop-color="#e2e8f0"/>
              <stop offset="1" stop-color="#cbd5e1"/>
            </linearGradient>
          </defs>
          <rect x="0" y="0" width="200" height="200" rx="16" fill="url(#g)"/>
          <circle cx="100" cy="92" r="44" fill="#0f172a" opacity="0.10"/>
          <text x="100" y="104" text-anchor="middle" font-family="Arial, Helvetica, sans-serif" font-size="44" fill="#0f172a" font-weight="700">${labelText}</text>
          <text x="100" y="164" text-anchor="middle" font-family="Arial, Helvetica, sans-serif" font-size="14" fill="#334155">Dummy SVG</text>
        </svg>`;
            return 'data:image/svg+xml;charset=utf-8,' + encodeURIComponent(svg);
        }

        function seedDummyGalleryIfNeeded() {
            // Seed once per storage key
            const seededKey = CONFIG.storageKey + '_seeded';
            if (localStorage.getItem(seededKey) === '1') return;

            const existing = loadGallery();
            if (existing.length) {
                localStorage.setItem(seededKey, '1');
                return;
            }

            const now = Date.now();
            const seeded = [];
            for (let i = 1; i <= 20; i++) {
                const id = 'rfp_dummy_' + i;
                seeded.push({
                    id,
                    name: `Dummy ${String(i).padStart(2,'0')}.svg`,
                    mime: 'image/svg+xml',
                    kind: 'image',
                    size: 0,
                    uploadedAt: now - i * 1000,
                    dataUrl: makeDummySvgDataUrl(String(i)),
                    displayTitle: null
                });
            }
            saveGallery(upsertRecent(seeded));
            localStorage.setItem(seededKey, '1');
        }

        function upsertRecent(items) {
            // Keep most recent first, cap to recentLimit
            const normalized = (items || []).map(it => {
                const item = Object.assign({}, it);
                if (!item.uploadedAt) item.uploadedAt = Date.now();
                if (!item.displayTitle) item.displayTitle = displayTitleForItem(item);
                return item;
            });
            const sorted = [...normalized].sort((a,b) => (b.uploadedAt || 0) - (a.uploadedAt || 0));
            return sorted.slice(0, CONFIG.recentLimit);
        }

        function galleryIconThumb(item) {
            const kind = item.kind;
            if (kind === 'pdf') return makePlaceholderThumbSvg('PDF');
            if (kind === 'docx') return makePlaceholderThumbSvg('DOCX');
            return makePlaceholderThumbSvg('FILE');
        }

        function getThumbForItem(item) {
            if (!item) return makePlaceholderThumbSvg('FILE');
            if (item.kind === 'image') {
                if (item.dataUrl) return item.dataUrl;
                if (item.thumbUrl) return item.thumbUrl;
                if (item.url) return item.url;
            }
            return galleryIconThumb(item);
        }

        function sanitizeText(s) {
            return String(s || '').replace(/[&<>"']/g, (c) => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[c]));
        }

        function formatTimestamp(ts) {
            const d = new Date(ts || Date.now());
            const pad = (n) => String(n).padStart(2,'0');
            const yyyy = d.getFullYear();
            const mm = pad(d.getMonth() + 1);
            const dd = pad(d.getDate());
            const hh = pad(d.getHours());
            const mi = pad(d.getMinutes());
            return `${yyyy}-${mm}-${dd} ${hh}:${mi}`;
        }

        function shortenTitle(name, maxLen) {
            const s = String(name || '');
            const n = typeof maxLen === 'number' ? maxLen : 22;
            if (s.length <= n) return s;
            const ext = extOf(s);
            const base = ext ? s.slice(0, -ext.length) : s;
            const cut = Math.max(6, n - ext.length - 1);
            return base.slice(0, cut) + '…' + ext;
        }

        function displayTitleForItem(item) {
            const ts = formatTimestamp(item.uploadedAt);
            const short = shortenTitle(item.name, 26);
            return `${short} • ${ts}`;
        }

        // --- UI renderers ---
        function renderUploadSelectedList() {
            el.uploadCount.textContent = String(filesToUpload.length);
            el.uploadBtn.disabled = filesToUpload.length === 0;
            el.uploadList.innerHTML = '';

            if (!filesToUpload.length) {
                el.uploadList.innerHTML = '<div class="text-muted small">No files selected.</div>';
                return;
            }

            var files_names = [];
            filesToUpload.forEach((f, idx) => {
                const kind = fileKindFromTypeOrExt(f.type, f.name);
                const thumb = (kind === 'image') ? makePlaceholderThumbSvg('IMG') : (kind === 'pdf' ? makePlaceholderThumbSvg('PDF') : makePlaceholderThumbSvg('DOCX'));
                const row = document.createElement('div');
                const file_name = f.name.replace(/\.[^/.]+$/, '');
                const extension = f.name.split('.').pop();
                row.className = 'rfp-item';
                row.setAttribute('draggable','true');
                row.setAttribute('data-drag-index', String(idx));
                row.setAttribute('draggable','true');
                row.setAttribute('data-drag-index', String(idx));
                console.log('---------filesToUpload--------');
                console.log(f);
                row.innerHTML = `
            <div class="rfp-item-meta">
              <div class="rfp-drag-handle" title="Drag to reorder">⋮⋮</div>
              <div class="rfp-thumb"><img alt="" src="${thumb}"></div>
              <div class="temp-files-area" style="min-width:0;">
                <input type="text" class="upload_files_names" name="upload_files_names[]" value="${sanitizeText(file_name)}">.${sanitizeText(extension)}
                <div class="rfp-title" title="${sanitizeText(f.name)}">${sanitizeText(f.name)}</div>
                <div class="rfp-sub">${sanitizeText(kind.toUpperCase())} • ${bytesToMb(f.size)} MB</div>
                <span class="filename-feedback"></span>
                <span class="suggested-filename"></span>
              </div>
            </div>
            <div>
              <button type="button" class="btn btn-sm btn-outline-danger" data-remove-upload="${idx}">Remove</button>
            </div>
          `;
                el.uploadList.appendChild(row);
            });
        }

        function renderGrid(gridEl, items) {


            gridEl.innerHTML = '';
            if (!items.length) {
                gridEl.innerHTML = '<div class="text-muted small">No items to show.</div>';
                return;
            }

            console.log('testin4444-');
            const frag = document.createDocumentFragment();
            items.forEach(item => {
                const tile = document.createElement('div');
                const selected = selectedToInsertIds.has(item.id);
                console.log('----selected----');
                console.log(selected);
                tile.className = 'rfp-tile' + (selected ? ' rfp-selected' : '');
                tile.setAttribute('data-item-id', item.id);
                const thumb = item.url;


                //console.log(thumb);
                tile.innerHTML = `
            <img alt="" src="${thumb}">
            <div class="rfp-tile-check">✓</div>
            <div class="rfp-tile-label" title="${sanitizeText(item.name)}">${sanitizeText(item.displayTitle || displayTitleForItem(item))}</div>
          `;
                frag.appendChild(tile);
            });
            gridEl.appendChild(frag);
        }

        function renderUploadedSection() {
            // Upload tab: show only items uploaded in THIS modal session
            renderGrid(el.uploadedGrid, upsertRecent(sessionUploaded));
        }

        function applyGalleryFilters(allItems) {
            const type = el.filterType.value;
            const sort = el.filterSort.value;
            const q = (el.search && el.search.value ? el.search.value : '').trim().toLowerCase();

            let items = [...allItems];

            if (type !== 'all') {
                items = items.filter(it => {
                    if (type === 'image') return it.kind === 'image';
                    if (type === 'pdf') return it.kind === 'pdf';
                    if (type === 'docx') return it.kind === 'docx';
                    return true;
                });
            }


            if (q) {
                items = items.filter(it => String(it.name || '').toLowerCase().includes(q));
            }

            if (sort === 'name') {
                items.sort((a,b) => String(a.name).localeCompare(String(b.name)));
            } else {
                items.sort((a,b) => (b.uploadedAt || 0) - (a.uploadedAt || 0));
            }

            return items.slice(0, CONFIG.recentLimit);
        }

        function renderGalleryTab() {
            const all = loadGallery();
            const filtered = applyGalleryFilters(all);
            renderGrid(el.galleryGrid, filtered);
        }

        function updateInsertFooter() {
            el.insertCount.textContent = String(selectedToInsertIds.size);
            el.insertBtn.disabled = selectedToInsertIds.size === 0;
        }

        function renderMainSelected() {
            const selected = window.PdfUploadQuestion.userResponse || [];
            console.log('selected--------');
            console.log(selected);
            //el.mainSelectedCount.textContent = String(selected.length);

            if (!selected.length) {
                updateDebug();
                return;
            }

            var preview_div = $('.rurera-file-manager-attr')
                .attr('data-preview_div')
                .replace(/^"+|"+$/g, '');

            var field_name = $('.rurera-file-manager-attr')
                .attr('data-field_name')
                .replace(/^"+|"+$/g, '');
            var question_id = $('.rurera-file-manager-attr')
                .attr('data-question_id')
                .replace(/^"+|"+$/g, '');

            var hidden_field = $(".hidden-field-data").find('input').first().clone();



            var images_response = '';
            selected.forEach((item, idx) => {
                const thumb = item.url;
                hidden_field.val(thumb);
                hidden_field.attr('value', thumb);
                attachQuestionImage(question_id, item.id);
                if(hidden_field.length > 0){
                    images_response += `<li>${hidden_field.prop('outerHTML')}<img src="${thumb}" style="width:80px;"></li>`;
                }else{
                    images_response += `<img src="${thumb}" style="width:80px;">`;
                    $("." + preview_div).find('img').attr('src', thumb);
                    $("." + preview_div).find('.'+field_name).attr('value', thumb);
                    $("." + preview_div).find('.'+field_name).val(thumb);
                }

            });

            if(hidden_field.length > 0) {
                $("." + preview_div).html(images_response);
            }
            $('.rurera-file-manager-modal').modal('hide');
        }

        function attachQuestionImage(question_id, gallery_image_id){

            $.ajax({
                type: "POST",
                url: '/admin/common/attach_question_image',
                data: {'question_id': question_id, 'gallery_image_id': gallery_image_id},
                success: function (return_data) {}
            });
        }
        function updateDebug() {
            try {
                el.debug.textContent = JSON.stringify(window.PdfUploadQuestion.userResponse || [], null, 2);
            } catch (e) {
                el.debug.textContent = 'Unable to render debug JSON.';
            }
        }

        // --- Interactions ---
        // Dropzone
        // Clicking the dropzone should open the native file picker
        // (Label button handles the common case; dropzone click is a convenience)
        el.dropzone.addEventListener('click', (e) => {
            // Ignore clicks on buttons/labels inside the dropzone
            const t = e.target;
            if (t && (t.closest('button') || t.closest('label'))) return;
            try { el.fileInput.click(); } catch (_) {}
        });

        el.dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            e.stopPropagation();
            el.dropzone.classList.add('rfp-dragover');
        });
        el.dropzone.addEventListener('dragleave', (e) => {
            e.preventDefault();
            e.stopPropagation();
            el.dropzone.classList.remove('rfp-dragover');
        });
        el.dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            e.stopPropagation();
            el.dropzone.classList.remove('rfp-dragover');
            const dropped = Array.from(e.dataTransfer.files || []);
            handlePickedFiles(dropped);
        });

        el.fileInput.addEventListener('change', (e) => {
            const picked = Array.from(e.target.files || []);
            handlePickedFiles(picked);
            // reset input so selecting same file again triggers change
            el.fileInput.value = '';
        });

        function handlePickedFiles(picked) {
            hideStatus();

            // Limit to remaining slots
            const remaining = CONFIG.maxFiles - filesToUpload.length;
            const trimmed = picked.slice(0, Math.max(0, remaining));
            const combined = [...filesToUpload, ...trimmed].slice(0, CONFIG.maxFiles);

            const errors = validateFilesBatch(combined);
            if (errors.length) {
                showStatus('danger', '<strong>Fix these issues:</strong><ul class="mb-0">' + errors.map(e => `<li>${sanitizeText(e)}</li>`).join('') + '</ul>');
                return;
            }

            filesToUpload = combined;
            renderUploadSelectedList();

            $(".upload_files_names").change();
        }

        // Remove selected-for-upload
        el.uploadList.addEventListener('click', (e) => {
            const btn = e.target.closest('[data-remove-upload]');
            if (!btn) return;
            const idx = Number(btn.getAttribute('data-remove-upload'));
            if (Number.isNaN(idx)) return;
            filesToUpload.splice(idx, 1);
            hideStatus();
            renderUploadSelectedList();
        });

        // Upload
        el.uploadBtn.addEventListener('click', async () => {
            hideStatus();

            if (!filesToUpload.length) return;
            const errors = validateFilesBatch(filesToUpload);
            if (errors.length) {
                showStatus('danger', '<strong>Fix these issues:</strong><ul class="mb-0">' + errors.map(e => `<li>${sanitizeText(e)}</li>`).join('') + '</ul>');
                return;
            }

            el.uploadBtn.disabled = true;
            showStatus('info', '<strong>Uploading…</strong> Please wait.');

            // Prepare multipart form data for your backend
            const fd = new FormData();
            fd.append('question_id', '1122');
            for (const f of filesToUpload) {
                fd.append('files[]', f, f.name);
            }

            var upload_type = $('.rurera-file-manager-attr')
                .attr('data-upload_type')
                .replace(/^"+|"+$/g, '');

            var question_id = $('.rurera-file-manager-attr')
                .attr('data-question_id')
                .replace(/^"+|"+$/g, '');

            var upload_path = $('.rurera-file-manager-attr')
                .attr('data-upload_path')
                .replace(/^"+|"+$/g, '');

            var upload_dir = $('.rurera-file-manager-attr')
                .attr('data-upload_dir')
                .replace(/^"+|"+$/g, '');


            var preview_div = $('.rurera-file-manager-attr')
                .attr('data-preview_div')
                .replace(/^"+|"+$/g, '');
            var field_name = $('.rurera-file-manager-attr')
                .attr('data-field_name')
                .replace(/^"+|"+$/g, '');
            var is_multiple = $('.rurera-file-manager-attr')
                .attr('data-is_multiple')
                .replace(/^"+|"+$/g, '');

            fd.append('upload_type', upload_type);
            fd.append('question_id', question_id);
            fd.append('upload_path', upload_path);
            fd.append('upload_dir', upload_dir);

            fd.append('preview_div', preview_div);
            fd.append('field_name', field_name);
            fd.append('is_multiple', is_multiple);

            $('input[name="upload_files_names[]"]').each(function (index) {
                fd.append('upload_files_names[]', $(this).val());
            });



            try {
                const ajaxResult = await new Promise((resolve, reject) => {
                    $.ajax({
                        url: '/admin/common/upload_gallery',
                        method: 'POST',
                        data: fd,
                        processData: false,
                        contentType: false,
                        success: (res) => resolve(res),
                        error: (xhr) => reject(xhr)
                    });
                });

                // Normalize response
                let res = ajaxResult;
                if (typeof res === 'string') {
                    try { res = JSON.parse(res); } catch (_) {}
                }


                //Uploading Data
                const now = Date.now();
                const gallery = loadGallery();

                // If backend returns files metadata, prefer that.
                // Expected shape (flexible): {files:[{id,name,url,thumb,mime,size,uploadedAt}]}
                const serverFiles = (res && (res.files || res.items || res.data)) && Array.isArray(res.files || res.items || res.data)
                    ? (res.files || res.items || res.data)
                    : null;

                console.log('tsdfsfsd-------');
                console.log(serverFiles);
                const newItems = [];

                if (serverFiles && serverFiles.length) {
                    for (const meta of serverFiles) {
                        const name = meta.name || meta.filename || 'uploaded-file';
                        const mime = meta.mime || meta.type || '';
                        const kind = fileKindFromTypeOrExt(mime, name);
                        const url = meta.url || meta.path || meta.file_url || null;
                        const thumbUrl = meta.thumb || meta.thumbnail || (kind === 'image' ? url : null);

                        newItems.push({
                            id: String(meta.id || ('rfp_' + now + '_' + Math.random().toString(16).slice(2))),
                            name,
                            mime,
                            kind,
                            size: typeof meta.size === 'number' ? meta.size : null,
                            uploadedAt: meta.uploadedAt || meta.uploaded_at || Date.now(),
                            url,
                            thumbUrl,
                            dataUrl: null,
                            displayTitle: null
                        });
                    }
                } else {
                    // Fallback: create local items for immediate UI (use FileReader for image thumbs)
                    for (const f of filesToUpload) {
                        const kind = fileKindFromTypeOrExt(f.type, f.name);
                        let dataUrl = null;
                        if (kind === 'image') {
                            dataUrl = 'testing';//await readFileAsDataURL(f);
                        }
                        newItems.push({
                            id: 'rfp_' + now + '_' + Math.random().toString(16).slice(2),
                            name: f.name,
                            mime: f.type,
                            kind,
                            size: f.size,
                            uploadedAt: Date.now(),
                            url: null,
                            thumbUrl: null,
                            dataUrl,
                            displayTitle: null
                        });
                    }
                }

                const merged = upsertRecent([...newItems, ...gallery]);
                saveGallery(merged);

                // Keep session uploads visible only until modal closes
                sessionUploaded = upsertRecent([...newItems, ...sessionUploaded]);

                filesToUpload = [];
                renderUploadSelectedList();
                renderUploadedSection();
                renderGalleryTab();

                showStatus('success', '<strong>Successful!</strong> Files uploaded. Select the thumbnails and click <strong>Insert</strong>.');
            } catch (xhr) {
                const msg = (xhr && xhr.responseJSON && (xhr.responseJSON.error || xhr.responseJSON.message)) ||
                    (xhr && xhr.responseText) ||
                    'Upload failed. Please try again.';
                showStatus('danger', sanitizeText(msg));
            } finally {
                el.uploadBtn.disabled = filesToUpload.length === 0;
            }
        });

        // Select tiles (both grids)
        function handleTileClick(e) {
            const tile = e.target.closest('.rfp-tile');
            var is_multiple = $('.rurera-file-manager-attr')
                .attr('data-is_multiple')
                .replace(/^"+|"+$/g, '');




            if (!tile) return;
            const id = tile.getAttribute('data-item-id');


            if (!id) return;

            if(is_multiple == 'false') {
                selectedToInsertIds.clear();
            }
            if (selectedToInsertIds.has(id)) {
                selectedToInsertIds.delete(id);
            } else {
                // cap to 2
                if (selectedToInsertIds.size >= CONFIG.maxFiles) {
                    // swap out the oldest selected (first in set)
                    const first = selectedToInsertIds.values().next().value;
                    if (first) selectedToInsertIds.delete(first);
                }
                selectedToInsertIds.add(id);
            }

            // Re-render both grids to reflect selection check
            renderUploadedSection();
            renderGalleryTab();
            updateInsertFooter();
        }

        el.uploadedGrid.addEventListener('click', handleTileClick);
        el.galleryGrid.addEventListener('click', handleTileClick);

        // Filters
        el.filterType.addEventListener('change', renderGalleryTab);
        el.filterSort.addEventListener('change', renderGalleryTab);
        if (el.search) el.search.addEventListener('input', renderGalleryTab);

        // Insert
        el.insertBtn.addEventListener('click', () => {
            const gallery = loadGallery();
            const selectedItems = gallery.filter(it => selectedToInsertIds.has(it.id));


            // Ensure max 2
            const final = selectedItems.slice(0, CONFIG.maxFiles);

            // Pass array to main page
            window.PdfUploadQuestion.userResponse = final;

            // Reset selections
            selectedToInsertIds.clear();
            updateInsertFooter();

            // Update main
            renderMainSelected();

            // Close modal
            $('#rfpModal').modal('hide');
        });

        // Main: delete / preview
        el.mainSelectedList.addEventListener('click', (e) => {
            const del = e.target.closest('[data-delete-main]');
            if (del) {
                const idx = Number(del.getAttribute('data-delete-main'));
                const arr = window.PdfUploadQuestion.userResponse || [];
                if (!Number.isNaN(idx) && arr[idx]) {
                    arr.splice(idx, 1);
                    window.PdfUploadQuestion.userResponse = arr;
                    renderMainSelected();
                }
                return;
            }

            const prev = e.target.closest('[data-preview-main]');
            if (prev) {
                const idx = Number(prev.getAttribute('data-preview-main'));
                const arr = window.PdfUploadQuestion.userResponse || [];
                const item = arr[idx];
                if (!item) return;

                // Basic preview: images open in new tab; others show alert (no blob persisted)
                if (item.kind === 'image' && item.dataUrl) {
                    const w = window.open();
                    if (w) {
                        w.document.write('<title>Preview</title>');
                        w.document.write('<img src="' + item.dataUrl + '" style="max-width:100%;height:auto;">');
                    }
                } else {
                    if (item.url) { window.open(item.url, '_blank'); } else { alert('PDF/DOCX preview needs a server URL from /admin/upload_gallery/.'); }
                }
            }
        });


        // Main: drag & drop reorder
        (function enableMainReorder() {
            let dragFrom = null;

            function getItemEl(target) {
                return target && target.closest ? target.closest('.rfp-item[draggable="true"]') : null;
            }

            el.mainSelectedList.addEventListener('dragstart', (e) => {
                const itemEl = getItemEl(e.target);
                if (!itemEl) return;
                dragFrom = Number(itemEl.getAttribute('data-drag-index'));
                itemEl.classList.add('rfp-dragging');
                e.dataTransfer.effectAllowed = 'move';
                try { e.dataTransfer.setData('text/plain', String(dragFrom)); } catch (_) {}
            });

            el.mainSelectedList.addEventListener('dragend', (e) => {
                const itemEl = getItemEl(e.target);
                if (itemEl) itemEl.classList.remove('rfp-dragging');
                Array.from(el.mainSelectedList.querySelectorAll('.rfp-item')).forEach(x => x.classList.remove('rfp-drop-target'));
                dragFrom = null;
            });

            el.mainSelectedList.addEventListener('dragover', (e) => {
                const over = getItemEl(e.target);
                if (!over) return;
                e.preventDefault();
                over.classList.add('rfp-drop-target');
            });

            el.mainSelectedList.addEventListener('dragleave', (e) => {
                const over = getItemEl(e.target);
                if (!over) return;
                over.classList.remove('rfp-drop-target');
            });

            el.mainSelectedList.addEventListener('drop', (e) => {
                const over = getItemEl(e.target);
                if (!over) return;
                e.preventDefault();

                const to = Number(over.getAttribute('data-drag-index'));
                const from = typeof dragFrom === 'number' ? dragFrom : Number((e.dataTransfer && e.dataTransfer.getData('text/plain')) || -1);
                if (Number.isNaN(from) || Number.isNaN(to) || from < 0 || to < 0 || from === to) return;

                const arr = window.PdfUploadQuestion.userResponse || [];
                if (!arr[from] || !arr[to]) return;

                const moved = arr.splice(from, 1)[0];
                arr.splice(to, 0, moved);
                window.PdfUploadQuestion.userResponse = arr;
                renderMainSelected();
            });
        })();

        // Modal open: refresh UI
        $('#rfpModal').on('shown.bs.modal', () => {
            // Each time the modal opens, start a fresh Upload session view
            sessionUploaded = [];
            selectedToInsertIds = new Set();
            hideStatus();
            renderUploadSelectedList();
            renderUploadedSection();
            renderGalleryTab();
            updateInsertFooter();
        });

        // Init
        //seedDummyGalleryIfNeeded();
        renderUploadSelectedList();
        renderUploadedSection();
        renderGalleryTab();
        renderMainSelected();
        updateInsertFooter();

    })();






</script>
