<?php
require '../Shared/header.php';
?>
<script type="text/javascript" src="../Scripts/show_products_script.js"></script>
</head>
<body>

<div class="container">
    <div  id ="show_products_messages" class="alert" role="alert" style="display: none"></div>
        <div class="row mt-3">
            <div class="col-md-9 display-6">
                Product List
            </div>
            <div class="col-md-1">
                <button id="red_new_product2" class="btn btn-success w-100">ADD</button>
            </div>
            <div class="col-md-2">
                <button id="delete-product-btn" class="btn btn-danger w-100">MASS DELETE</button>
            </div>

        </div>
        <hr>
    <div id="products_list" class="mt-4"></div>
</div>

<?php
require '../Shared/footer.php';
?>

