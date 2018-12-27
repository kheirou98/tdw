
var nbElement=5;
for (i = 1; i <= nbElement; i++) {
    var taxe = parseInt(document.getElementById("taxe"+i).innerText);
    var ht=parseInt(document.getElementById("ht"+i).innerText);
    document.getElementById("tti"+i).innerHTML=((taxe/100+1)*ht).toFixed(2);

}

