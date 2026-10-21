---
layout: post
title:  "Pizza Calculator"
date:   2026-10-19
updatedOn: 2026-10-20
categories: misc
includesGenerator: yes
---

<style type="text/css">
    #pizzaSizes {
        display: grid;
        width: 100%;
        grid-template-columns: 0.2fr repeat(3, 1fr) 5em;
    }
    #pizzaSizes > div {
        display: grid;
        grid-column: 1 / 6;
        grid-template-columns: subgrid;
    }
    .pizzaDiv {
        border: 1px white;
    }
    .pizzaDiv > button {
        margin: auto auto auto auto;
    }

    #pizzaSizes input{
        height: 3em;
    }

    #pizzaSizes .goodbye {
        width: 2em;
    }

    #pizzaSizes .qty {
        text-align: center;
    }

    #add_table_bt {
        display: block;
        margin: 5px auto 5px auto;
        padding: 5px;
    }

    #pizzaHeader {
        padding: 5px;
    }
    #pizzaHeader span {
        font-weight: bold;
    }
</style>

When ordering pizza, have you ever wondered if jumping pizza sizes is worth it? What if 2 smalls is better than 1 medium?

This calculator below is perfect for just that! Just enter your pizza size and cost, and it would calculate the cost per area, so you can determine the best pizza per dollar.

<div style='border-style: solid; border-width: 1px;'>
    <div id='pizzaSizes'>
        <div id='pizzaHeader'>
            <span>Qty</span>
            <span>Pizza Diameter</span>
            <span>Cost</span>
            <span>$/Total Area</span>
        </div>
        <!-- This will be populated by JS -->
    </div>
    <button id='add_table_bt'>MORE PIZZA</button>
</div>


<script>
    document.addEventListener("DOMContentLoaded", async () => {
        // generate 1 entry for the Pizza
        appendPizzaList();

        const button = document.getElementById("add_table_bt")?.addEventListener("click", () => {
            appendPizzaList();
        });
    });

    function appendPizzaList(){
        const list = document.getElementById('pizzaSizes');
        const divID = Math.random().toString(16).slice(2);

        listHTML = `<div class="pizzaDiv" id=pizzaItem_${divID}>`;

        listHTML += `<input type="text" class="qty" placeholder="qty" oninput="updatePizza('${divID}')" value="1"></input>`
        listHTML += `<input type="text" class="size" placeholder="Size" oninput="updatePizza('${divID}')"></input>`
        listHTML += `<input type="text" class="dollar" placeholder="$" oninput="updatePizza('${divID}')"></input>`
        listHTML += `<input type="text" class="costArea" readonly=true></input>`
        listHTML += `<button class="goodbye" onclick="goodbyePizza('${divID}')">X</button>`

        listHTML += `<span class="funFact" style="display: inline-block; min-height: 1.5em; grid-column: 1 / 6;"></span>`
        listHTML += `<span class="sillyMsg" style="white-space: pre-line; display: inline-block; min-height: 1.5em; grid-column: 1 / 6;"></span>`

        listHTML += "</div>";

        list.insertAdjacentHTML("beforeend", listHTML);
    }

    function updatePizza(pizzaID){
        const list = document.getElementById(`pizzaItem_${pizzaID}`);
        console.log(list);

        const sillyMsg = list.querySelector(".sillyMsg");
        const funFact = list.querySelector(".funFact");
        const costAreaBox = list.querySelector(".costArea");
        // reset showcased value
        costAreaBox.value = "";
        funFact.textContent = "";
        sillyMsg.textContent = "";

        const sizeS = list.querySelector(".size").value;
        const costS = list.querySelector(".dollar").value;
        const qtyS = list.querySelector(".qty").value;

        const size = sizeS.trim() === "" ? NaN : Number(sizeS);
        const cost = costS.trim() === "" ? NaN : Number(costS);
        const qty = qtyS.trim() === "" ? NaN : Number(qtyS);

        var area = NaN;
        var totalArea = NaN;

        if(isNaN(size) == false){
            area = Math.PI * Math.pow(size/2, 2);

            funFact.textContent += `Pie Area = ${area.toFixed(2)} in^2`;


            if (eval(atob("c2l6ZSA+PSAxMjA="))){
                sillyMsg.textContent += atob("c28geW91IGhhdmUgYSB3aG9sZSBiZWRyb29tIHdvcnRoIG9mIGEgcGl6emE/Cg==");
            }
            else if (eval(atob("c2l6ZSA+PSA1MA=="))){
                sillyMsg.textContent += atob("b2sgeW91IGFyZSBraWRkaW5nIG5vdz8K");
            }
            else if (eval(atob("c2l6ZSA+PSAzMA=="))){
                sillyMsg.textContent += atob("V293Li4udGhhdCBpcyBhIGJpZyBwaXp6YSEK");
            }
            else if (eval(atob("c2l6ZSAhPSAw"))){
                if (eval(atob("c2l6ZSA8IDA="))){
                    sillyMsg.textContent += atob("cGl6emEgdm9pZD8K");
                }
                else if (eval(atob("c2l6ZSA8PSAwLjI1"))){
                    sillyMsg.textContent += atob("cGl6emEgZm9yIGFudHMK");
                }
            }

            if(isNaN(qty) == false){
                totalArea = area * qty;
                funFact.textContent += `, Total Area = ${totalArea.toFixed(2)} in^2`;
            }
        }
        if(isNaN(cost) == false){
            if (eval(atob("Y29zdCA+PSAxZTY="))){
                sillyMsg.textContent += atob("bWlsbGlvbmFpcmUgcGl6emEK");
            }
            else if (eval(atob("Y29zdCA+PSAxMDAw"))){
                sillyMsg.textContent += atob("bXIgYmVhc3QgY2hhbGxlbmdlIHBpenphCg==");
            }
            else if (eval(atob("Y29zdCA+PSAxMDA="))){
                sillyMsg.textContent += atob("Z29sZCBwbGF0dGVkIHBpenphCg==");
            }
            else if (eval(atob("Y29zdCA+PSAzNQ=="))){
                sillyMsg.textContent += atob("c29tZSBuaWNlIHBpenphLCBlaD8K");
            }
        }

        if(isNaN(size) || isNaN(cost) || isNaN(qty)){
            return;
        }

        const costPerArea = cost / totalArea;

        costAreaBox.value = costPerArea.toFixed(3);

    }

    function goodbyePizza(pizzaID){
        const list = document.getElementById('pizzaSizes');
        document.getElementById(`pizzaItem_${pizzaID}`)?.remove();
    }
</script>