console.log("CAT JS : " + cat);
$(document).ready(function(){
	//console.log("Hello");
    
    if (cat) {
        console.log("YES " + cat);
        $("#choix_page").change(function(){
            console.log("YES 2 " + cat);
            window.location.href="catalog.php?page=" + $("#choix_page").val() + "&cat=" + cat + "&tri=" + $("#tri").val();
            console.log("YES 3 " + cat);
        });
    } else if (cat && $("#tri").val()) {
        $("#choix_page").change(function(){
            console.log("YES 4 " + cat);
            window.location.href="catalog.php?page=" + $("#choix_page").val() + "&cat=" + cat;
            console.log("YES 5 " + cat);
        });
    } else if ($("#tri").val() === ""){
        console.log("YES eidel !");
        $("#choix_page").change(function(){
            window.location.href="catalog.php?page=" + $("#choix_page").val();
        });
    } else {
        console.log("NEE NEE NEE !!!!!");
        $("#choix_page").change(function(){
            window.location.href="catalog.php?page=" + $("#choix_page").val() + "&tri=" + $("#tri").val();
        });
    }
    
    if (cat) {
        $("#tri").change(function(){
            window.location.href="catalog.php?cat=" + cat + "&tri=" + $("#tri").val();
        });
    } else {
        $("#tri").change(function(){
            window.location.href="catalog.php?tri=" + $("#tri").val();
        });
    }
    
    
    
}); //FIN JQUERY !!!!!
var cat = cat;
console.log("AFTER : " + cat);