
$( document ).ready(function() {
   $('#productType').change(function (){
       let selectedVal = $( "#productType option:selected" ).val();
       //console.log(`selectedVal = ${selectedVal}`);
       let template = ``;
       switch (selectedVal) {
           case 'dvd':
               template = `
               <div class="row mt-3">
                     <div class="col-md-1">Size (MB)</div>
                     <div class="col-md-2">
                          <input type="text" id = "size" class="form-control">
                     </div>
                      <div class="col-md-9" id="size_messages"></div>
               </div>  
               `;
                break;
           case 'furniture':
               template = `
               <div class="row mt-3">
                    <div class="col-md-1">Height(CM)</div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="height">
                    </div>
                    <div class="col-md-9" id="height_messages"></div>
               </div>

               <div class="row mt-2">
                   <div class="col-md-1">Width(CM)</div>
                   <div class="col-md-2">
                        <input type="text" class="form-control" id="width">
                   </div>
                   <div class="col-md-9" id="width_messages"></div>
               </div>

                <div class="row mt-2">
                     <div class="col-md-1">Length(CM)</div>
                     <div class="col-md-2">
                          <input type="text" class="form-control" id="length">
                     </div>
                     <div class="col-md-9" id="length_messages"></div>
                </div>
               `;
               break;
           case 'book':
               template = `
               <div class="row mt-3">
                     <div class="col-md-1">Weight(KG)</div>
                     <div class="col-md-2">
                          <input type="text" id = "weight" class="form-control">
                     </div>
                      <div class="col-md-9" id="weight_messages"></div>
               </div>  
               `;
               break;
           default:
               break;
       }
       $('#section').html(template);
   })
    var cstTrim = function (txt){
       if (txt === undefined || txt === null)
           return null;
       return txt.trim();
    }

    var validateSKU = function (txt){
       if (txt === null)
           return false;
       return txt.length >= 2 && txt.length <= 20;

    }
    var validateName = function (txt){
       if(txt === null)
           return false;
       return txt.length >= 2 && txt.length <= 20;
    }
    var isNumber = function (txt) {
        return !isNaN(txt) && !isNaN(parseFloat(txt));
    }
    var validateForm = function (sku, name, price, productType, size, height, width, length, weight){
       let isSKU = validateSKU(sku);
       let isName = validateName(name);
       let isPrice = isNumber(price);
       let isProductType = productType !== '-1';
       let isSize = (productType === 'dvd' && isNumber(size) || productType !== 'dvd');
       let isHeight = (productType === 'furniture' && isNumber(height) || productType !== 'furniture');
       let isWidth = (productType === 'furniture' && isNumber(width) || productType !== 'furniture');
       let isLength = (productType === 'furniture' && isNumber(length) || productType !== 'furniture');
       let isWeight = (productType === 'book' && isNumber(weight) || productType !== 'book');

       //update masseges
        if (!isSKU)
            $('#sku_messages').html(`<h6 class="error">Please enter valid SKU!</h6>`);
        else
            $('#sku_messages').html(``);
        if (!isName)
            $('#name_messages').html(`<h6 class="error">Please enter valid Name!</h6>`);
        else
            $('#name_messages').html(``);
        if(!isPrice)
            $('#price_messages').html(`<h6 class="error">Please enter valid Price!</h6>`);
        else
            $('#price_messages').html(``);
        if(!isProductType)
            $('#productType_messages').html(`<h6 class="error">Please choose Product Type!</h6>`);
        else
            $('#productType_messages').html(``);
        if(!isSize)
            $('#size_messages').html(`<h6 class="error">Please enter valid Size!</h6>`);
        else
            $('#size_messages').html(``);
        if(!isHeight)
            $('#height_messages').html(`<h6 class="error">Please enter valid height!</h6>`);
        else
            $('#height_messages').html(``);
        if(!isWidth)
            $('#width_messages').html(`<h6 class="error">Please enter valid Width!</h6>`);
        else
            $('#width_messages').html(``);
        if(!isLength)
            $('#length_messages').html(`<h6 class="error">Please enter valid Length!</h6>`);
        else
            $('#length_messages').html(``);
        if(!isWeight)
            $('#weight_messages').html(`<h6 class="error">Please enter valid Weight!</h6>`);
        else
            $('#weight_messages').html(``);
        //end messages
        return isSKU && isName && isPrice && isProductType && isSize && isHeight && isWidth && isLength && isWeight;

    }

    function updateMessages(status, text) {
       let msgs = $('#save_product_messages');
       if(status === 'success'){
           msgs.removeClass('alert-danger');
           msgs.addClass('alert-primary');
           msgs.html(text);
           msgs.show('slow');
           setTimeout(function (){
               msgs.hide('slow');
           }, 5000);
       }
       else if (status ==='error'){
           msgs.removeClass('alert-primary');
           msgs.addClass('alert-danger');
           msgs.html(text);
           msgs.show('slow');
           setTimeout(function (){
               msgs.hide('slow');
           }, 5000);
       }
    }

    $('#product_form').submit(function (e){
        e.preventDefault();

    let sku = cstTrim( $('#sku').val());
    let name = cstTrim($('#name').val());
    let price = cstTrim($('#price').val());
    let productType = $( "#productType option:selected" ).val();
    let size = cstTrim($('#size').val());
    let height = cstTrim($('#height').val());
    let width = cstTrim($('#width').val());
    let length = cstTrim($('#length').val());
    let weight = cstTrim($('#weight').val());


    if (validateForm(sku, name, price, productType, size, height, width, length, weight)){
        const postData = {
            sku: sku,
            name: name,
            price: parseFloat(price).toFixed(2),
            productType: productType,
            size: parseFloat(size).toFixed(2),
            height: parseFloat(height).toFixed(2),
            width: parseFloat(width).toFixed(2),
            length: parseFloat(length).toFixed(2),
            weight: parseFloat(weight).toFixed(2),

        }

        $.post('../Controllers/saveProduct.php', postData, function (data){
            console.log(data);
            let info = JSON.parse(data);
            if (info.status === 'success'){
                updateMessages('success','product has been saved');
                $('#product_form').trigger('reset');
            }
            else if (info.status === 'error' && info.message === 'duplicate_sku'){
                $('#sku_messages').html(`<h6 class="error">sku already exists!</h6>`);
                updateMessages('error','sku already exists');
            }

        })
    }
    })







});