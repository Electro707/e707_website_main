---
layout: page
title:  "Schematic and PCB Checklist"
categories: programming
date: 2025-12-28
---

<style type="text/css">
    #checklistDiv ul {
        margin-left: 5px;
        margin-bottom: 0;
    }
    #checklistDiv p {
        margin-left: 5px;
        margin-top: 24px;
        margin-bottom: 0.5em;
    }
    #checklistDiv label {
        cursor: pointer;
    }
    #info {
        display: grid;
        grid-template-columns: max-content auto;
        gap: 0.25em 2em;
        padding: 5px;
    }
    #info input {
        width: 30%;
    }
    button {
        margin: 5px;
        padding: 5px;
        display: block;
        width: 30%;
    }
    #ckhListForm {
        border-style: solid;
        border-width: 1px;
    }
    textarea {
        margin: 5px;
        padding: 5px;
        width: 75%;
    }
</style>

> [If you want to head right to the checklist, click me](#ckhListForm)

> Updated on {{page.date}}

Preface: This page loads non-obfuscated JS code.

Throughout my time designing PCBs in my professional career, something that we recently instituted at my workplace that turned out to be really helpful is a design checklist.
Every time we are ready to order a board, we go through every line item in the checklist and cross it off before placing the order, even for simple prototypes.

This has saved us many times from accidental errors that would have resulted in costly future reworks or re-spin of the design. While initially it seems like a bureaucratic time sink, the time spent going through the checklist is far less costly than the alternative.

I decided to create my own checklist that I will use on my personal projects. This checklist on this page will be continuously updated as I find more stuff to add or change on the list.

The form in this page can be used to complete the checklist. After you are done, click on "Export" to get a text version of the checklist. You can also drag-and-drop back in a checklist to finish off where you started

## Issues & Contributing
If you find an issue with this page or list, or want to submit feedback, feel free to submit an Issue on [this blog's Github repo](https://github.com/Electro707/e707_website_main) or email me @ [general@electro707.com](general@electro707.com)

If you would like to contribute to this list or the page, feel free to submit a pull-request on the Github repo.

# Checklist

## Notes
- Some companies have one part number for the schematic+pcb, others have it split. If you have a single part number, feel free to leave the other entry empty.

## Functionality
If you drag-and-drop in a previously generated checklist, it should re-load all the checked items. The drag-and-drop _must_ happen within the boxed checklist area.

If you hover over a text item, I wrote down some of my rationale and thoughts on each check item.

The checklist definition/items can be customizable. First download [the template used](PCBChecklist/PCBChecklistItems.json){:target="_blank"}, which is a JSON. Modify the JSON to your needs. Other than the field `nameRev`, the top level keys, in sequential order, are the categories listed. Each category is a list of dictionaries, where each dictionary must include an `id` and `text` field. The ID is used to track the item, in case the wording is changed but the underlying context is not. An optional `info` can be added to define some rational text which is shown on hover. Drag-and-drop your customized list definition, or click on the "Load List Definition" button to load it in.

If you are loading in a previous checklist, please load the definition first before the list.

## The List
<div id="ckhListForm">

<!-- <input type="file" id="file-input" multiple hidden accept="json/*"/> -->
<p id="chkListName"></p>

<div id="info">
<label for="ent_sch_p" >(Schematic) Part# and Rev:</label>
<input type="text" id="ent_sch_p" placeholder='-'>
<label for="ent_pcb_p">PCB Part# and Rev:</label>
<input type="text" id="ent_pcb_p" placeholder='-'>
<label for="ent_attend" >Reviewers:</label>
<input type="text" id="ent_attend" placeholder='-'>
<label for="ent_date" >Date:</label>
<input type="text" id="ent_date" placeholder='-'>
</div>

<div id="checklistDiv">
<!-- This will be populated by JS -->
</div>

<p><b>Additional Notes:</b></p>
<textarea id="ent_notes" placeholder="Additional Notes" rows="4" cols="50">
</textarea>

<div style="display: flex;">
    <button type="button" onclick="clickedExportList()">Export checklist</button>
    <button type="file" onclick="clickedLoadList(true)">Load checklist</button>
</div>
<div style="display: flex; margin-top: 10px;">
    <button type="button" onclick="clearAllCheck()">Reset</button>
    <button type="file" onclick="clickedLoadList(false)">Load List Definition</button>
</div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", async () => {
        // load current date
        loadCurrentDate();
        // populate the checklist
        const r = await fetch("PCBChecklist/PCBChecklistItems.json");
        if (!r.ok) {
            throw new Error(`HTTP error! Status: ${r.status}`);
        }
        const d = await r.json();
        chkData = d;
        populateList();

        // configure drop zones for files
        const dropZone = document.getElementById("ckhListForm");
        dropZone.addEventListener("drop", dropHandler);
        dropZone.addEventListener("dragover", dragoverHandler);
    });

    function populateList(){
        var newHtml = "";
        var chkName = "Unknown List";
        for (let header in chkData){
            if(header == "nameRev"){
                chkName = chkData[header];
                continue;
            }
            newHtml += `<p><b>${header}</b></p>`;
            newHtml += "<ul>";
            chkData[header].forEach(itm => {
                const id = "ent_ckh_" + itm['id'];
                newHtml += `<li> <input type="checkbox" id="${id}"> <label for="${id}" title="${itm['info']}">${itm['text']}</label> </li>`;
            });

            newHtml += "</ul>";
        };
        // console.log(newHtml);
        document.getElementById("checklistDiv").innerHTML = newHtml;
        document.getElementById("chkListName").innerHTML = chkName;
    }

    function clearAllCheck(){
        Array.from(document.querySelectorAll('#checklistDiv input[type="checkbox"]')).forEach(cb => cb.checked = false);
        document.getElementById('ent_sch_p').value = "";
        document.getElementById('ent_pcb_p').value = "";
        document.getElementById('ent_attend').value = "";
        document.getElementById('ent_notes').value = "";
        loadCurrentDate();
    }

    function loadCurrentDate(){
        const dateV = new Date().toISOString().slice(0, 10);
        document.getElementById("ent_date").value = dateV;
    }

    function dragoverHandler(e){
        e.preventDefault();
    }

    async function dropHandler(e){
        console.log(e);
        // from https://developer.mozilla.org/en-US/docs/Web/API/HTML_Drag_and_Drop_API/File_drag_and_drop
        if ([...e.dataTransfer.items].some((item) => item.kind === "file")) {
            e.preventDefault();
            const itm = e.dataTransfer.items[0];      // only 1 file allowed, no multiple
            const file = itm.getAsFile();
            loadedSomeFile(file);
        }
    }

    async function loadedSomeFile(file){
        if (file.type.startsWith("text/plain")) {
            loadList(file);
        }
        if (file.type.startsWith("application/json")) {
            const d = await file.text();
            chkData = JSON.parse(d);
            populateList();
        }
    }

    // use the same function to load either the text checklist, or the list definition itself
    async function clickedLoadList(isText){
        // from https://stackoverflow.com/questions/16215771/how-to-open-select-file-dialog-via-js
        var input = document.createElement('input');
        if(isText == true){
            input.accept = '.txt';
        } else {
            input.accept = '.json';
        }
        input.type = 'file';
        input.click();
        console.log(input);
        input.onchange = e => {
            console.log(e);
            var file = e.target.files[0];
            loadedSomeFile(file);
            input.remove();
        }
    }

    async function loadList(file){
        clearAllCheck();

        var src = await file.text();
        // from https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_expressions#using_regular_expressions_in_javascript
        const re = new RegExp(/-\ \[(.?)\].*\((\w*)\)$/);

        var inNotesSec = false;
        var notesSec = [];

        src = src.split('\n');
        src.forEach(line => {
            if(inNotesSec){
                if(line == ""){
                    document.getElementById('ent_notes').value = notesSec.join('\n');
                    inNotesSec = false;
                    return;
                }
                notesSec.push(line.trimLeft());
                return;
            }

            const splitCol = line.split(':');
            if(splitCol[0].trim() == 'Schematic Part#'){
                document.getElementById('ent_sch_p').value = splitCol[1].trim();
            }
            else if(splitCol[0].trim() == 'PCB Part#'){
                document.getElementById('ent_pcb_p').value = splitCol[1].trim();
            }
            else if(splitCol[0].trim() == 'Reviewers'){
                document.getElementById('ent_attend').value = splitCol[1].trim();
            }
            else if(splitCol[0].trim() == 'Date'){
                document.getElementById('ent_date').value = splitCol[1].trim();
            }
            else if(splitCol[0].trim() == 'Notes'){
                inNotesSec = true;
                return;
            }

            const reM = re.exec(line.trim());
            if(reM !== null){
                const id = reM[2];
                const chkState = reM[1];
                var isChecked = false;
                if(chkState != " "){
                    isChecked = true;
                }
                // console.log(id, isChecked, reM);
                const chkBox = document.querySelector(`#checklistDiv input[id="ent_ckh_${id}"]`);
                chkBox.checked = isChecked;
            }
        });
    }

    function clickedExportList(){
        toPrintTxt = [];
        toPrintTxt.push(document.getElementById("chkListName").innerHTML);
        toPrintTxt.push("");
        toPrintTxt.push(`Schematic Part#: ${document.getElementById('ent_sch_p').value}`);
        toPrintTxt.push(`PCB Part#: ${document.getElementById('ent_pcb_p').value}`);
        toPrintTxt.push(`Reviewers: ${document.getElementById('ent_attend').value}`);
        toPrintTxt.push(`Date: ${document.getElementById('ent_date').value}`);


        toPrintTxt.push(`Notes:`);
        document.getElementById('ent_notes').value.split('\n').forEach( n => {
            toPrintTxt.push(`    ${n}`);
        });

        for (let header in chkData){
            if(header == "nameRev"){continue;}

            toPrintTxt.push("");
            toPrintTxt.push(`${header}: `);
            chkData[header].forEach(itm => {
                const id = "ent_ckh_" + itm['id'];
                const labelTxt = document.querySelector(`label[for="${id}"]`);
                const chkBox = document.querySelector(`#checklistDiv input[id="${id}"]`);
                const checkTxt = chkBox.checked ? 'x' : ' ';
                toPrintTxt.push(`- [${checkTxt}] ${labelTxt.textContent.trim()} (${itm['id']})`)
            });
        };
        // console.log(toPrintTxt.join('\n'));

        const text = toPrintTxt.join('\n');
        const blob = new Blob([text], { type: "text/plain" });
        const url = URL.createObjectURL(blob);

        const a = document.createElement("a");
        a.href = url;
        a.download = `ckhList_${document.getElementById('ent_date').value}.txt`;
        a.click();

        URL.revokeObjectURL(url);
        a.remove();
    }
</script>