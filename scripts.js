const cardsContainer = document.getElementById("cards");
const allCheckBoxes = cardsContainer.querySelectorAll("input.check");
const allCostParagraph = document.getElementById("all-cast");
let allCost = 0;

for(const checkBox of allCheckBoxes){
    checkBox.addEventListener('change', function(){
        if(this.checked){
            let cost = checkBox.parentElement.querySelector("p").innerHTML;
            allCost += Number(cost);
            allCostUpdate();
        } else{
            let cost = checkBox.parentElement.querySelector("p").innerHTML;
            allCost -= Number(cost);
            allCostUpdate();
        }
    })
}

const allCostUpdate = () => {
    allCostParagraph.innerHTML = allCost;
}

const checkAllbtn = document.getElementById("check-all-btn");
checkAllbtn.onclick = () =>{
    for(const checkBox of allCheckBoxes){
        
    }
}