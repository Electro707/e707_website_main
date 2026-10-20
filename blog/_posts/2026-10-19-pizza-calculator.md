---
layout: post
title:  "Pizza Calculator"
date:   2026-10-19
updatedOn: 2026-10-19
categories: misc
includesGenerator: yes
---

<style type="text/css">
    #pizzaSizes {
        display: grid;
        width: 100%;
        grid-template-columns: repeat(3, 1fr) 5em;
    }
    #pizzaSizes > div {
        display: grid;
        grid-column: 1 / 5;
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

When ordering pizza, have you ever wondered if jumping pizza sizes is worth it?

This calculator below is perfect for just that! Just enter your pizza size and cost, and it would calculate if a pizza is worth it or not.

<div style='border-style: solid; border-width: 1px;'>
    <div id='pizzaSizes'>
        <div id='pizzaHeader'>
            <span>Pizza Diameter</span>
            <span>Cost</span>
            <span>$/Area</span>
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

        listHTML += `<input type="text" class="size" placeholder="Size" oninput="updatePizza('${divID}')"></input>`
        listHTML += `<input type="text" class="dollar" placeholder="$" oninput="updatePizza('${divID}')"></input>`
        listHTML += `<input type="text" class="costArea" readonly=true></input>`
        listHTML += `<button class="goodbye" onclick="goodbyePizza('${divID}')">X</button>`

        listHTML += `<span class="sillyMsg" style="white-space: pre-line; display: inline-block; min-height: 1.5em; grid-column: 1 / 5;"></span>`
        listHTML += `<span class="funFact" style="display: inline-block; min-height: 1.5em; grid-column: 1 / 5;"></span>`

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
        funFact.value = "";
        sillyMsg.textContent = "";

        const sizeS = list.querySelector(".size").value;
        const costS = list.querySelector(".dollar").value;

        const size = sizeS.trim() === "" ? NaN : Number(sizeS);
        const cost = costS.trim() === "" ? NaN : Number(costS);

        var area = NaN;

        if(isNaN(size) == false){
            area = Math.PI * Math.pow(size/2, 2);

            funFact.textContent = `Area = ${area.toFixed(2)} in^2`;
            if(size >= 120){
                sillyMsg.textContent += "so you have a whole bedroom worth of a pizza?\n";
            }
            else if(size >= 50){
                sillyMsg.textContent += "ok you are kidding now?\n";
            }
            else if(size >= 30){
                sillyMsg.textContent += "Wow...that is a big pizza!\n";
            }
            else if(size != 0){
                if(size < 0){
                    sillyMsg.textContent += "pizza void?\n";
                }
                else if(size <= 0.25){
                    sillyMsg.textContent += "pizza for ants\n";
                }

            }
        }
        if(isNaN(cost) == false){
            if(cost >= 1e6){
                sillyMsg.textContent += "millionaire pizza\n";
            }
            else if(cost >= 1000){
                sillyMsg.textContent += "mr beast challenge pizza\n";
            }
            else if(cost >= 100){
                sillyMsg.textContent += "gold platted pizza\n";
            }
            else if(cost >= 35){
                sillyMsg.textContent += "some nice pizza, eh?\n";
            }
        }

        if(isNaN(size) || isNaN(cost)){
            return;
        }

        const costPerArea = cost / area;

        costAreaBox.value = costPerArea.toFixed(3);

    }

    function goodbyePizza(pizzaID){
        const list = document.getElementById('pizzaSizes');
        document.getElementById(`pizzaItem_${pizzaID}`)?.remove();
    }
</script>