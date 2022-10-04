$( document ).ready(function() {
    showAllProducts();

        function showAllProducts() {
  $.post('../Controllers/showProducts.php', function (data){
      //console.log(data);
      let info = JSON.parse(data);
      let template = ``;
      let colCount = 0;

      if(info.status === 'success'){
          info.data.forEach((obj)=>{
              if(colCount === 0) {
                  template += `<div class="row mb-4">`;
              }
              template += `<div class="col-md-3">
                                <fieldset> 
                                        <div class="form-check ms-1">
                                          <input class="form-check-input" type="checkbox" name ="delete-checkbox" value="${obj.ID}">
                                         
                                        </div>

                                       <p>${obj.SKU}</p> 
                                       <p>${obj.Name}</p>
                                       <p>${parseFloat(obj.Price).toFixed(2)} $</p>
                                       <p>${(obj.Type === 'dvd')? 'Size: ' + obj.MB +' MB' :
                                            (obj.Type === 'furniture')? 'Dimension: ' + obj.Height + 'X' + obj.Width + 'X' + obj.Length :
                                             'Weight: ' + obj.KG +' KG'}</p>
                               </fieldset>
                           </div>`;
              colCount ++;
              if(colCount === 4){
                  template += `</div>`;
                  colCount = 0;
              }
          })
          $('#products_list').html(template);
      }
  })
};

    function updateMessages(status, text) {
        let msgs = $('#show_products_messages');
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

    $('#delete-product-btn').click(function (){
        let productIDs = [];
        $("input:checkbox[name=delete-checkbox]:checked").each(function () {
            //console.log($(this).val());
            productIDs.push($(this).val());
        });
        if(productIDs.length){
            $.post('../Controllers/deleteProducts.php',{productIDs:productIDs},function (data){
                let info = JSON.parse(data);
                if(info.status === 'success'){
                    updateMessages('success',info.rowCount + '  rows successfully deleted');
                    showAllProducts();
                }
                else if(info.status === 'error'){
                    updateMessages('error', info.message)
                }

            })
        }

    })

});