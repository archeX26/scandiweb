
$( document ).ready(function() {
    console.log( "ready!" );

    $('#red_new_product').click(function (){
        window.location.href = "http://localhost/WEBSITES/Authors/Scandiweb/App/Views/new_product_registration.php"
    })
    $('#red_new_product2').click(function (){
        window.location.href = "http://localhost/WEBSITES/Authors/Scandiweb/App/Views/new_product_registration.php"
    })

    $('#red_show_products').click(function (){
        window.location.href = "http://localhost/WEBSITES/Authors/Scandiweb/App/Views/show_products.php"
    })
    $('#red_welcome_page').click(function (){
        window.location.href = "http://localhost/WEBSITES/Authors/Scandiweb/App/Views/index.php"
    })
});