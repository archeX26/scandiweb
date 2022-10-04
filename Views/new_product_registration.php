<?php
require '../Shared/header.php';
?>

<script type="text/javascript" src="../Scripts/new_product_registration_script.js"></script>
</head>
<body>

<div class="container">
    <div  id ="save_product_messages" class="alert" role="alert" style="display: none"></div>
    <form method="post" id="product_form">
        <div class="row mt-3">
            <div class="col-md-10 display-6">
                Product Add
            </div>
            <div class="col-md-1">
                <button class="btn btn-success w-100">Add</button>
            </div>
            <div class="col-md-1">
                <button id='red_welcome_page' class="btn btn-secondary w-100">Cancel</button>
            </div>

        </div>
        <hr>


        <div class="row mt-2">
            <div class="col-md-1">SKU</div>
            <div class="col-md-2">
                <input type="text" class="form-control" id="sku">
            </div>
            <div class="col-md-9" id="sku_messages"></div>
        </div>

        <div class="row mt-2">
            <div class="col-md-1">Name</div>
            <div class="col-md-2">
                <input type="text" class="form-control" id="name">
            </div>
            <div class="col-md-9" id="name_messages"></div>
        </div>

        <div class="row mt-2">
            <div class="col-md-1">Price($)</div>
            <div class="col-md-2">
                <input type="text" class="form-control" id="price">
            </div>
            <div class="col-md-9" id="price_messages"></div>
        </div>


        <div class="row mt-3">
            <div class="col-md-2">Type Switcher</div>
            <div class="col-md-2">
                <select id = "productType" class="form-select"  aria-label="Default select example">
                    <option selected value="-1">Type Switcher</option>
                    <option value="dvd">DVD</option>
                    <option value="furniture">Furniture</option>
                    <option value="book">Book</option>
                </select>
            </div>
            <div id="productType_messages" class="col-md-8"></div>
        </div>

        <div id="section"></div>
    </form>
</div>

<?php
require '../Shared/footer.php';
?>

