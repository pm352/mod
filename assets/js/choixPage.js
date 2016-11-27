$(document).ready(function(){
    
    if (cat && tri) {
        $("#choix_page").change(function(){
            window.location.href="catalog.php?page=" + $("#choix_page").val() + "&cat=" + cat + "&tri=" + $("#tri").val();
        });
    } else if (cat) {
        $("#choix_page").change(function(){
            window.location.href="catalog.php?page=" + $("#choix_page").val() + "&cat=" + cat;
        }); 
    } else if ($("#tri").val() === ""){
        $("#choix_page").change(function(){
            window.location.href="catalog.php?page=" + $("#choix_page").val();
        });
    } else {
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