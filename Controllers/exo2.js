
$(document).ready(function(){
	var nbElement=5;
	var modal = $('#myModal');
    for (var i=1;i<6;i++){
        var prix =parseInt($(`.tableau > tbody tr:nth-child(${i}) .prix`).html());
        var taxe = parseInt($(`.tableau > tbody tr:nth-child(${i}) .taxe`).html());
        $(`.tableau > tbody tr:nth-child(${i}) .resultat`).append(prix + (prix*taxe/100));
    }
    $("#ok").click(function (){

        var nom_f = $("#nom_formation").val();
        var volH = parseInt($("#volume_horaire").val());
        var prixH = parseInt($("#prixHc").val());
        var taxe = parseInt($("#Taxe").val());
        var result = prixH + (prixH*taxe/100);
        $(".tableau > tbody:last").append("<tr><td>"+nom_f+"</td><td>"+volH+"</td><td>"+prixH+"</td><td>"+taxe+"</td><td>"+result+"</td></tr>");
		//$(".tableau > tbody tr:nth-child(1)").className="entete2";
    });
	
});
 $("#connexion").click(function (){
	 
	 
 });
	 
/*var nbElement=5;
for (i = 1; i <= nbElement; i++) {
    var taxe = parseInt($("#taxe"+i).html());
    var ht=parseInt($("#ht"+i).html());
    $("#tti"+i).html(((taxe/100+1)*ht).toFixed(2));
}*/


