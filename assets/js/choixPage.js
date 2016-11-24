$(document).ready(function(){
	//console.log("Hello");
	$("#choix_page").change(function(){
		window.location.href="catalog.php?page="+$("#choix_page").val();
	});
    

	$("#tri").change(function(){
		window.location.href="catalog.php?tri="+$("#tri").val();
	});


    /*
    $.ajax({
        method: "GET",
        url: "catalog.php",
    }).done(function(data) {
        console.log(data);
        $test = "DSC";
        console.log("Hello" + $test);
    });*/

}); //FIN JQUERY !!!!!