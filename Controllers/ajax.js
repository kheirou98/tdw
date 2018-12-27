function ajax() {
    let element = document.querySelectorAll("tr[data=change]");
    let tds;
    let obj;
    let module;
    let repp={
        "module": [
            "Bureatique",
            "Infographie",
            "Langues",
            "Management"
        ],
        "volume": [
            100, 3, 1, 3
        ],
        "taux": [
            200, 17, 0, 17
        ]
    }
    $.getJSON("jsonfile.json", obj, function (rep) {
        str="";
        for(i =0 ; i<rep.prixht.length;i++){
           str+=
               "<tr><td>"+repp.module[i]+"</td>" +
               "<td>"+repp.volume[i]+"</td>" +
               "<td>"+rep.prixht[i]+"</td>" +
               "<td>"+repp.taux[i]+"</td>" +
               "<td>"+(rep.prixht[i]+rep.prixht[i]*repp.taux[i]/100)+"</td>" +
               "</tr>";
        }
        $("#formationsBody").html(str);
    });


}
ajax();
setInterval(function () {    ajax();}, 5000);


function printTable(data){

    var tableRef = $("#formationsTable")[0];
    var newRow   = tableRef.insertRow(0);

    for(i =0 ; i< data.module.length;i++){

        newRow   = tableRef.insertRow(3+i);

        console.log(tableRef.rows.length,i);

        newCell  = newRow.insertCell(0);
        newCell.innerHTML=data.module[i];

        newCell  = newRow.insertCell(1);
        newCell.innerHTML=data.volume[i];

        newCell  = newRow.insertCell(2);
        newCell.innerHTML=data.prixht[i];

        newCell  = newRow.insertCell(3);
        newCell.innerHTML=data.taux[i];

        newCell  = newRow.insertCell(4);
        newCell.innerHTML=data.prixht[i]+data.prixht[i]*data.taux[i]/100;
    }
}