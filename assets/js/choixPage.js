$(document).ready(function(){
	//console.log("Hello");
    
	$("#choix_page").change(function(){
	   var page =	 window.location.href="catalog.php?page="+$("#choix_page").val();
        console.log(page);
	});
    
    $("#tri").change(function(){
	   var tri = window.location.href="catalog.php?tri="+$("#tri").val();
       console.log(tri);
	});
    
    
}); //FIN JQUERY !!!!!