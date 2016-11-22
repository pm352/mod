$(document).ready(function(){
	//console.log("Hello");
	$("#choix_page").change(function(){
		window.location.href="catalog.php?page="+$("#choix_page").val();
	});

}); //FIN JQUERY !!!!!