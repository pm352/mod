$(document).ready(function(){
	//console.log("Hello");
    
	$("#choix_page").change(function(){
        window.location.href="catalog.php?page=" + $("#choix_page").val() + "&tri=" + $("#tri").val();
	});
    
    $("#tri").change(function(){
        window.location.href="catalog.php?tri=" + $("#tri").val();
	});
    
}); //FIN JQUERY !!!!!