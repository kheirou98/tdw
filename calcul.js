/*$(document).ready(function() {
	var a=$('#col2_lign1').text();
	var b=$('#col3_lign1').text();
	var c=(parseInt(a)+(parseInt(a)*parseInt(b)/100));
	$('#taxe1').text(c);
	
	var d=$('#col2_lign2').text();
	var e=$('#col3_lign1').text();
	var f=(parseInt(d)+(parseInt(d)*parseInt(e)/100));
	$('#taxe2').text(f);
	
	var g=$('#col2_lign3').text();
	var h=$('#col3_lign3').text();
	var i=(parseInt(g)+(parseInt(g)*parseInt(h)/100));
	$('#taxe3').text(i);
	
	var j=$('#col2_lign4').text();
	var k=$('#col3_lign4').text();
	var l=(parseInt(j)+(parseInt(j)*parseInt(k)/100));
	$('#taxe4').text(l);
	
	var m=$('#col2_lign5').text();
	var n=$('#col3_lign4').text();
	var o=(parseInt(m)+(parseInt(m)*parseInt(n)/100));
	$('#taxe5').text(o);
});
*/
$(document).ready(function(){
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
		$(".tableau > tbody tr:nth-child(1)").className="entete2";
    });
	$("#ajout_formation").click (function (){
			$("#myModal").css({
            display:'block',
        });
});
$(".close").click(function (){
			$("#myModal").css({
            display:'none',
        });
});
window.onclick = function(event) {
    if (event.target == modal) {
        $("#myModal").css({
            display:'none',
        });
    }
}

});
/*<script src="calcul.js" > </script>*/ 