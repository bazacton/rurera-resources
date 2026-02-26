<style>
    .range-container {
        display: flex;
        gap: 35px;
        align-items: center;
        margin: 0;
        max-width: 430px;
        margin-left: auto;
    }
    .range-container .input-group {
        display: flex;
        gap: 0;
        background: #D1D2E8;
        border-radius: 10px;
        overflow: hidden;
        position: relative;
        max-width: 250px;
    }
    .range-container .input-wrapper {
        position: relative;
        flex: 1;
    }
    .range-container .input-group::after {
        content: '';
        position: absolute;
        left: 50%;
        top: 0;
        bottom: 0;
        width: 1px;
        background: rgba(0,0,0,.1);
        transform: translateX(-50%);
    }
    .range-container .range-input-text {
        width: 100px;
        height: 34px;
        border: none;
        background: transparent;
        text-align: left;
        color: #1D1E27;
        outline: none;
        padding: 0 15px 0 10px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }
    .range-container .range-input-text::placeholder {
        color: #666;
    }
    .range-container .unit-label {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: .800rem;
        color: #666;
        font-weight: 300;
        pointer-events: none;
        right: 10px;
    }
    .range-container .range {
        position: relative;
        max-width: 400px;
        width: 110px;
    }
    .range-container .range-input {
        width: 100%;
        height: 10px;
        grid-area: 1 / 1;
        border-radius: 10px;
        appearance: none;
        background: none;
        pointer-events: none;
    }
    .listing-data-row.topic-row,
    .select-topics .topics-table tbody .listing-data-row.topic-row:hover {
        background-color: #f1f1f1;
    }
    .select-topics .topics-table th,
    .select-topics .topics-table td {
        padding: 10px 10px;
    }
    .select-topics .topics-table th:first-child {
        padding-left: 0;
    }
    .select-topics .topics-table .listing-data-row label {
        margin-bottom: 0;
    }
    /* Range Slider Style Start */
    .thumbs {
        display: flex;
        position: relative;
        width: 100%;
        min-height: 35px;
        align-items: center;
    }
    .thumbs .range-input {
        -webkit-appearance: none;
        width: 100%;
        height: 4px;
        border-radius: 4px;
        outline: none;
        background: #e5e5e5;
        position: absolute;
        pointer-events: none;
        padding: 0;
    }
    .thumbs .range-input#range-max-value {
        left: 40px;
    }
    .thumbs .range-input::-webkit-slider-runnable-track {
        height: 4px;
        border-radius: 4px;
    }
    .thumbs .range-input::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #fff;
        border: 3px solid #4f6df5;
        cursor: pointer;
        margin-top: -14px;
        pointer-events: auto;
        position: relative;
        z-index: 2;
    }
    .thumbs .range-input::-moz-range-track {
        height: 4px;
        background: #e5e5e5;
        border-radius: 4px;
    }
    .thumbs .range-input::-moz-range-thumb {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #fff;
        border: 3px solid #4f6df5;
        cursor: pointer;
        pointer-events: auto;
    }
    /* Range Slider Style End */
    .range-container .track {
        position: absolute;
        top: var(--range-track-top);
        width: 100%;
        height: 8px;
        border-radius: 10px;
        background-color: #ababab;
        z-index: -1;
    }
    .progress {
        position: absolute;
        top: var(--range-track-top);
        left: var(--range-progress-left);
        width: var(--range-progress-w);
        height: 8px;
        border-radius: 10px;
        background-color: white;
        z-index: -1;
    }
</style>
<div class="select-topics backend-topic-selection">
    <h3 class="font-16 font-weight-bold">Select Topics</h3>
    <div class="selected-topics rurera-hide" id="selectedTopics">
        <span class="count selected-topics-count"><span>0</span> topics selected</span>
        <div class="chips selected-topics-chips">
        </div>
    </div>
    <!-- Top buttons -->


    <!-- Subject filters -->
    <div class="subject-filters">

        @if(!empty( $parentData))
            <button type="button" class="chip parent-filters active" data-id="all"><span class="active-tick">✓</span> All</button>
            @foreach( $parentData as $parentObj)
                <button type="button" class="chip parent-filters" data-id="{{isset($parentObj->id)? $parentObj->id : 0}}">{{isset($parentObj->title)? $parentObj->title : ''}}</button>
            @endforeach
        @endif
    </div>
    <div class="topics-table-holder lms-chapter-ul-outer table-sm panel-border bg-white rounded-sm">
        <table class="topics-table mt-0" id="mockExam-itemsList">
            <thead>
            <tr>
                <th>Title</th>
                <th>No of Questions</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @php $is_have_records = true; @endphp
            @if(!empty( $parentData) && $is_have_records == true)
                @foreach( $parentData as $parentObj)
                    @php $listingDataArray = isset($listingData[$parentObj->id])? $listingData[$parentObj->id] : [];
                    @endphp
                    <tr class="listing-data-row topic-row" data-parent_id="{{isset($parentObj->id)? $parentObj->id : 0}}">
                        <td data-th="Topic" colspan="3"><b>{{isset($parentObj->title)? $parentObj->title : ''}}</b></td>
                    </tr>
                    @if(!empty($listingDataArray))
                        @foreach($listingDataArray as $listingObj)
                            @php $smart_score = isset($listingObj->performance)? $listingObj->performance : 0;
                            @endphp
                            <tr class="listing-data-row mock-exam-item-row" data-parent_id="{{isset($parentObj->id)? $parentObj->id : 0}}" data-mockexam-item-id="{{isset($listingObj->id)? $listingObj->id : 0}}" data-mockExam-item-title="{{isset($listingObj->title)? $listingObj->title : '-'}}">
                                <td data-th="Topic"> <label  for="check_{{isset($listingObj->id)? $listingObj->id : 0}}">{{isset($listingObj->title)? $listingObj->title : '-'}}</label></td>
                                <td>

                                    <div class="range-container">
                                        <div class="input-group">
                                            <div class="input-wrapper">
                                                <input
                                                    type="text"
                                                    class="range-input-text"
                                                    id="input-min-value"
                                                    pattern="[0-9]*"
                                                    inputmode="numeric"
                                                    value="0"
                                                    placeholder="0"
                                                />
                                                <span class="unit-label">FROM</span>
                                            </div>
                                            <div class="input-wrapper">
                                                <input
                                                    type="text"
                                                    class="range-input-text"
                                                    id="input-max-value"
                                                    pattern="[0-9]*"
                                                    inputmode="numeric"
                                                    value="0"
                                                    placeholder="0"
                                                />
                                                <span class="unit-label">TO</span>
                                            </div>
                                        </div>

                                        <div class="range rurera-hide">
                                            <div class="track"></div>
                                            <div class="progress"></div>
                                            <div class="thumbs">
                                                <input
                                                    class="range-input"
                                                    id="range-min-value"
                                                    name="mock_practice_questions[{{$listingObj->id}}][min]"
                                                    type="range"
                                                    min="0"
                                                    max="100"
                                                    value="0"
                                                    step="1"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"
                                                    aria-orientation="horizontal"
                                                />

                                                <input
                                                    class="range-input"
                                                    id="range-max-value"
                                                    name="mock_practice_questions[{{$listingObj->id}}][max]"
                                                    type="range"
                                                    min="0"
                                                    max="100"
                                                    value="0"
                                                    step="1"
                                                    aria-valuemin="0"
                                                    aria-valuemax="100"
                                                    aria-orientation="horizontal"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="mock-exam-btn-holder">
                                        <button type="button" class="btn btn-outline-primary mock-exam-icon-btn" data-mockexam-action="assign" title="Shortlist (assign to section)">+</button>
                                        <button type="button" class="btn btn-outline-danger mock-exam-icon-btn ml-2 mock-exam-btn-remove-main d-none" data-mockexam-action="unassign" title="Remove from section (unassign)">×</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
            @else
                <tr class="listing-data-row">
                    <td colspan="4">
                        @include('web.default.default.list_no_record')
                    </td>
                </tr>
            @endif

            </tbody>
        </table>
    </div>

</div>

<script>
    /**
     * window.mockExam
     * IMPORTANT: Item list is NOT rendered by JS. Items must exist in HTML.
     * JS reads items from DOM and only updates UI state (enable/disable, assigned badges, etc).
     */
    window.mockExam = (function($) {
        const state = {
            sections: [],
            items: [],
            selectedItemId: null,
            sectionFormMode: "single",
            editingSectionId: null
        };

        const $els = {};
        const $tpl = {};
        let sortable = null;

        function cacheEls() {
            $els.root = $("#mockExam-root");
            $els.itemsList = $("#mockExam-itemsList");
            $els.sectionsCountPill = $("#mockExam-sectionsCountPill");

            $els.builderModal = $("#mockExam-builderModal");
            $els.assignModal = $("#mockExam-assignModal");
            $els.sectionFormModal = $("#mockExam-sectionFormModal");

            $els.sectionsContainer = $("#mockExam-sectionsContainer");
            $els.noSectionsNote = $("#mockExam-noSectionsNote");

            $els.selectedItemTitle = $("#mockExam-selectedItemTitle");
            $els.selectedItemAssignedNote = $("#mockExam-selectedItemAssignedNote");
            $els.assignSectionsCount = $("#mockExam-assignSectionsCount");
            $els.assignSectionsList = $("#mockExam-assignSectionsList");
            $els.assignNoSections = $("#mockExam-assignNoSections");

            $els.formError = $("#mockExam-formError");

            $els.singleModeFields = $("#mockExam-singleModeFields");
            $els.bulkModeFields = $("#mockExam-bulkModeFields");

            $els.secName = $("#mockExam-secName");
            $els.secQuestions = $("#mockExam-secQuestions");
            $els.secTime = $("#mockExam-secTime");
            $els.secInstructions = $("#mockExam-secInstructions");

            $els.bulkCount = $("#mockExam-bulkCount");
            $els.bulkPrefix = $("#mockExam-bulkPrefix");
            $els.bulkQuestions = $("#mockExam-bulkQuestions");
            $els.bulkTime = $("#mockExam-bulkTime");
            $els.bulkInstructions = $("#mockExam-bulkInstructions");
        }

        function cacheTemplates() {
            const $t = $("#mockExam-templates");
            $tpl.assignedItem = $t.find(".mockExam-tpl-assigned-item").first();
            $tpl.sectionCard = $t.find(".mockExam-tpl-section-card").first();
            $tpl.assignSection = $t.find(".mockExam-tpl-assign-section").first();
        }

        function uid() { return "s_" + Math.random().toString(16).slice(2) + "_" + Date.now().toString(16); }
        function sectionLabel(index, total) { return `Section ${index + 1}/${total}`; }

        function stripHtml(html) {
            const div = document.createElement("div");
            div.innerHTML = String(html || "");
            return (div.textContent || div.innerText || "").trim();
        }

        /** Read items from DOM (no JS rendering) */
        function loadItemsFromDom() {
            const items = [];
            $els.itemsList.find("[data-mockexam-item-id]").each(function() {
                const $row = $(this);
                const id = String($row.attr("data-mockexam-item-id") || "").trim();
                const title = String($row.attr("data-mockExam-item-title") || "").trim();
                if (!id) return;
                items.push({ id, title: title || id });
            });
            state.items = items;
        }

        function getSelectedItem() {
            return state.items.find(i => i.id === state.selectedItemId) || null;
        }

        function findAssignedSection(itemId) {
            for (let i = 0; i < state.sections.length; i++) {
                const sec = state.sections[i];
                if (sec.items.includes(itemId)) return { sectionId: sec.id, sectionIndex: i };
            }
            return null;
        }

        /** Update existing item rows in HTML (enable/disable +, show/hide remove, show assigned label) */
        function refreshItemsUI() {
            const total = state.sections.length;

            $els.itemsList.find("[data-mockexam-item-id]").each(function() {
                const $row = $(this);
                const itemId = String($row.attr("data-mockexam-item-id") || "");
                const assigned = findAssignedSection(itemId);
                const label = assigned ? sectionLabel(assigned.sectionIndex, total) : "";

                const $assignBtn = $row.find("[data-mockexam-action='assign']").first();
                const $unassignBtn = $row.find("[data-mockexam-action='unassign']").first();
                const $meta = $row.find(".mockExam-item-meta").first();

                // base meta always has ID
                const base = `ID: ${itemId}`;

                if (assigned) {
                    $assignBtn.prop("disabled", true).addClass("mock-exam-btn-disabled").attr("title", "Already assigned (remove first)");
                    $unassignBtn.removeClass("d-none");
                    $meta.html(`${base} • <span class="badge badge-success">Assigned</span> <span class="ml-1">${label}</span>`);
                } else {
                    $assignBtn.prop("disabled", false).removeClass("mock-exam-btn-disabled").attr("title", "Shortlist (assign to section)");
                    $unassignBtn.addClass("d-none");
                    $meta.html(base);
                }
            });

            $els.sectionsCountPill.text(String(state.sections.length));
        }

        /* =========================
           Sections rendering (templates + clone)
           ========================= */
        function renderSections() {
            $els.sectionsContainer.empty();

            const total = state.sections.length;
            $els.noSectionsNote.toggle(total === 0);

            state.sections.forEach((sec, idx) => {
                const $card = $tpl.sectionCard.clone(false, false);
                $card.attr("data-section-id", sec.id);
                $card.attr("data-mockexam-section-id", sec.id);

                const label = sectionLabel(idx, total);
                const instructionsPlain = stripHtml(sec.instructions || "");

                $card.find(".mockExam-tpl-section-label").text(label);
                $card.find(".mockExam-tpl-section-title").text(sec.name || "Untitled section");
                $card.find(".mockExam-tpl-section-name").text(sec.name || "-");
                $card.find(".mockExam-tpl-section-instr").text(instructionsPlain || "-");
                $card.find(".mockExam-tpl-section-q").text(String(sec.numQuestions ?? "-"));
                $card.find(".mockExam-tpl-section-t").text(String(sec.timeMins ?? "-"));
                $card.find(".mockExam-tpl-section-count").text(String(sec.items.length));

                const $itemsWrap = $card.find(".mockExam-tpl-section-items").empty();
                if (!sec.items.length) {
                    $itemsWrap.append(`<div class="mock-exam-empty-note">No items added yet.</div>`);
                } else {
                    sec.items.forEach(itemId => {
                        const item = state.items.find(i => i.id === itemId);
                        const $it = $tpl.assignedItem.clone(false, false);
                        $it.attr("data-mockexam-item-id", itemId);
                        $it.find(".mockExam-tpl-assigned-title").text(item ? item.title : itemId);
                        $it.find(".mockExam-tpl-assigned-remove")
                            .off("click.mockExam")
                            .on("click.mockExam", () => removeItemFromSection(sec.id, itemId));
                        $itemsWrap.append($it);
                    });
                }

                $card.find(".mockExam-tpl-section-delete")
                    .off("click.mockExam")
                    .on("click.mockExam", () => deleteSection(sec.id));
                $card.find(".mockExam-tpl-section-edit")
                    .off("click.mockExam")
                    .on("click.mockExam", () => openEditSection(sec.id));

                $els.sectionsContainer.append($card);
            });

            renderAssignModal();
            refreshItemsUI();
        }

        function renderAssignModal() {
            const selected = getSelectedItem();
            $els.selectedItemTitle.text(selected ? selected.title : "None");

            $els.selectedItemAssignedNote.hide().text("");
            $els.assignSectionsList.empty();

            const total = state.sections.length;
            $els.assignSectionsCount.text(String(total));
            $els.assignNoSections.toggle(total === 0);

            const assigned = selected ? findAssignedSection(selected.id) : null;
            if (selected && assigned) {
                $els.selectedItemAssignedNote
                    .show()
                    .html(`This item is already assigned to <b>${sectionLabel(assigned.sectionIndex, total)}</b>. Remove it first to assign again.`);
            }

            state.sections.forEach((sec, idx) => {
                const $wrap = $tpl.assignSection.clone(false, false);
                $wrap.attr("data-section-id", sec.id);
                $wrap.attr("data-mockexam-section-id", sec.id);

                const label = sectionLabel(idx, total);
                const isAssignedHere = assigned && assigned.sectionId === sec.id;
                const isAssignedElsewhere = assigned && assigned.sectionId !== sec.id;

                $wrap.find(".mockExam-tpl-assign-label").text(label);
                $wrap.find(".mockExam-tpl-assign-title").text(sec.name || "Untitled section");
                $wrap.find(".mockExam-tpl-assign-count").text(String(sec.items.length));
                $wrap.find(".mockExam-tpl-assign-instr").text(stripHtml(sec.instructions || "") || "No instructions");
                $wrap.find(".mockExam-tpl-assign-meta").html(
                    `Questions: <b>${String(sec.numQuestions ?? "-")}</b> • Time: <b>${String(sec.timeMins ?? "-")}</b> mins`
                );

                const $btn = $wrap.find(".mockExam-tpl-assign-btn");
                $btn.off("click.mockExam").removeClass("btn-success btn-primary");

                if (isAssignedHere) {
                    $btn.addClass("btn-success").text("Assigned here").prop("disabled", true);
                } else if (!selected || isAssignedElsewhere) {
                    $btn.addClass("btn-primary").text("Add selected item").prop("disabled", true);
                } else {
                    $btn.addClass("btn-primary").text("Add selected item").prop("disabled", false)
                        .on("click.mockExam", () => addItemToSection(sec.id, selected.id));
                }

                const $secItems = $wrap.find(".mockExam-tpl-assign-items").empty();
                if (!sec.items.length) {
                    $secItems.append(`<div class="mock-exam-empty-note">No items in this section.</div>`);
                } else {
                    sec.items.forEach(itemId => {
                        const item = state.items.find(i => i.id === itemId);
                        const $it = $tpl.assignedItem.clone(false, false);
                        $it.attr("data-mockexam-item-id", itemId);
                        $it.find(".mockExam-tpl-assigned-title").text(item ? item.title : itemId);
                        $it.find(".mockExam-tpl-assigned-remove")
                            .off("click.mockExam")
                            .on("click.mockExam", () => removeItemFromSection(sec.id, itemId));
                        $secItems.append($it);
                    });
                }

                $els.assignSectionsList.append($wrap);
            });
        }

        /* =========================
           Form + summernote
           ========================= */
        function initSummernote($el) {
            if ($el.data("summernote")) return;
            $el.summernote({
                height: 140,
                toolbar: [
                    ['style', ['bold','italic','underline','clear']],
                    ['para', ['ul','ol','paragraph']],
                    ['insert', ['link']],
                    ['view', ['codeview']]
                ]
            });
        }

        function openAddSection() {
            state.sectionFormMode = "single";
            state.editingSectionId = null;

            $("#mockExam-sectionFormTitle").text("Add Section");
            $els.singleModeFields.show();
            $els.bulkModeFields.hide();
            $els.formError.hide().text("");

            $els.secName.val("");
            $els.secQuestions.val("");
            $els.secTime.val("");

            initSummernote($els.secInstructions);
            $els.secInstructions.summernote("code", "");

            $els.sectionFormModal.modal("show");
        }

        function openBulkSections() {
            state.sectionFormMode = "bulk";
            state.editingSectionId = null;

            $("#mockExam-sectionFormTitle").text("Create Multiple Sections");
            $els.singleModeFields.hide();
            $els.bulkModeFields.show();
            $els.formError.hide().text("");

            $els.bulkCount.val(3);
            $els.bulkPrefix.val("Section");
            $els.bulkQuestions.val("");
            $els.bulkTime.val("");

            initSummernote($els.bulkInstructions);
            $els.bulkInstructions.summernote("code", "");

            $els.sectionFormModal.modal("show");
        }

        function openEditSection(sectionId) {
            const sec = state.sections.find(s => s.id === sectionId);
            if (!sec) return;

            state.sectionFormMode = "edit";
            state.editingSectionId = sectionId;

            $("#mockExam-sectionFormTitle").text("Edit Section");
            $els.singleModeFields.show();
            $els.bulkModeFields.hide();
            $els.formError.hide().text("");

            $els.secName.val(sec.name || "");
            $els.secQuestions.val(sec.numQuestions ?? "");
            $els.secTime.val(sec.timeMins ?? "");

            initSummernote($els.secInstructions);
            $els.secInstructions.summernote("code", sec.instructions || "");

            $els.sectionFormModal.modal("show");
        }

        function saveSectionForm() {
            $els.formError.hide().text("");

            if (state.sectionFormMode === "bulk") {
                const count = Math.max(1, parseInt($els.bulkCount.val(), 10) || 1);
                const prefix = ($els.bulkPrefix.val() || "Section").trim();
                const q = ($els.bulkQuestions.val() || "").trim();
                const t = ($els.bulkTime.val() || "").trim();
                const instr = $els.bulkInstructions.summernote("code");

                for (let i = 1; i <= count; i++) {
                    state.sections.push({
                        id: uid(),
                        name: `${prefix} ${i}`,
                        numQuestions: (q === "" ? "" : Number(q)),
                        timeMins: (t === "" ? "" : Number(t)),
                        instructions: instr || "",
                        items: []
                    });
                }

                $els.sectionFormModal.modal("hide");
                renderSections();
                return;
            }

            const name = ($els.secName.val() || "").trim();
            if (!name) {
                $els.formError.show().text("Section name is required.");
                return;
            }

            const q = ($els.secQuestions.val() || "").trim();
            const t = ($els.secTime.val() || "").trim();
            const instr = $els.secInstructions.summernote("code");

            const payload = {
                name,
                numQuestions: (q === "" ? "" : Number(q)),
                timeMins: (t === "" ? "" : Number(t)),
                instructions: instr || ""
            };

            if (state.sectionFormMode === "edit") {
                const sec = state.sections.find(s => s.id === state.editingSectionId);
                if (!sec) return;
                sec.name = payload.name;
                sec.numQuestions = payload.numQuestions;
                sec.timeMins = payload.timeMins;
                sec.instructions = payload.instructions;
            } else {
                state.sections.push({ id: uid(), ...payload, items: [] });
            }

            $els.sectionFormModal.modal("hide");
            renderSections();
        }

        /* =========================
           Assign actions
           ========================= */
        function openAssignForItem(itemId) {
            state.selectedItemId = itemId;
            renderAssignModal();
            $els.assignModal.modal("show");
        }

        function deleteSection(sectionId) {
            if (!confirm("Delete this section? Items in it will become unassigned.")) return;
            state.sections = state.sections.filter(s => s.id !== sectionId);
            renderSections();
        }

        function resetList() {
            if (!confirm("Create new list? This will remove all sections and assignments.")) return;
            state.sections = [];
            state.selectedItemId = null;
            renderSections();
            renderAssignModal();
            refreshItemsUI();
        }

        function addItemToSection(sectionId, itemId) {
            if (findAssignedSection(itemId)) return;
            const sec = state.sections.find(s => s.id === sectionId);
            if (!sec) return;
            sec.items.push(itemId);
            renderSections();
        }

        function removeItemFromSection(sectionId, itemId) {
            const sec = state.sections.find(s => s.id === sectionId);
            if (!sec) return;
            sec.items = sec.items.filter(id => id !== itemId);
            renderSections();
        }

        function removeItemEverywhere(itemId) {
            state.sections.forEach(sec => {
                if (sec.items.includes(itemId)) sec.items = sec.items.filter(id => id !== itemId);
            });
            renderSections();
        }

        /* =========================
           Sortable
           ========================= */
        function initSortable() {
            const container = document.getElementById("mockExam-sectionsContainer");
            if (!container) return;
            if (sortable) sortable.destroy();

            sortable = new Sortable(container, {
                handle: ".mock-exam-drag-handle",
                animation: 150,
                onEnd: function () {
                    const ids = Array.from(container.querySelectorAll("[data-section-id]"))
                        .map(el => el.getAttribute("data-section-id"));

                    const newOrder = [];
                    ids.forEach(id => {
                        const sec = state.sections.find(s => s.id === id);
                        if (sec) newOrder.push(sec);
                    });
                    state.sections = newOrder;
                    renderSections();
                }
            });
        }

        /* =========================
           Events (delegation for item list)
           ========================= */
        function bindEvents() {
            $("#mockExam-openBuilderLink").on("click.mockExam", function(e) {
                e.preventDefault();
                $els.builderModal.modal("show");
                renderSections();
            });

            $("#mockExam-addOneBtn").on("click.mockExam", openAddSection);
            $("#mockExam-addMultipleBtn").on("click.mockExam", openBulkSections);
            $("#mockExam-newListBtn").on("click.mockExam", resetList);

            $("#mockExam-saveAndCloseBtn").on("click.mockExam", () => $els.builderModal.modal("hide"));
            $("#mockExam-assignDoneBtn").on("click.mockExam", () => $els.assignModal.modal("hide"));
            $("#mockExam-formSaveBtn").on("click.mockExam", saveSectionForm);

            $els.builderModal.on("shown.bs.modal.mockExam", function () {
                initSortable();
                renderSections();
            });

            $els.sectionFormModal.on("shown.bs.modal.mockExam", function () {
                if (state.sectionFormMode === "bulk") initSummernote($els.bulkInstructions);
                else initSummernote($els.secInstructions);
            });

            // ✅ Delegated item events (no per-row binding)
            $els.itemsList.on("click.mockExam", "[data-mockexam-action='assign']", function() {
                const itemId = String($(this).closest("[data-mockexam-item-id]").attr("data-mockexam-item-id") || "");
                if (!itemId) return;
                // prevent if already assigned
                if (findAssignedSection(itemId)) return;
                openAssignForItem(itemId);
            });

            $els.itemsList.on("click.mockExam", "[data-mockexam-action='unassign']", function() {
                const itemId = String($(this).closest("[data-mockexam-item-id]").attr("data-mockexam-item-id") || "");
                if (!itemId) return;
                removeItemEverywhere(itemId);
            });
        }

        function init() {
            cacheEls();
            cacheTemplates();
            loadItemsFromDom();
            refreshItemsUI();
            renderSections();
            renderAssignModal();
            bindEvents();
        }

        return { init, state };
    })(jQuery);

    jQuery(function() {
        window.mockExam.init();
    });
</script>
