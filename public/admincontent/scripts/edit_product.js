$(document).ready(function (){
    // sales discount type selection
    $('#percentage').click(function (){
         $('#discount_amount').css('display', 'none')
         $('#discount_value_percentage').attr('name', 'discount_value')
        $('#percentage_discount').css('display', 'block')
        $('#discount_max_value').css('display', 'block')

    });

    $('#fixed').click(function (){
        $('#discount_amount').css('display', 'block')
        $('#discount_value_fixed').attr('name', 'discount_value')
       $('#percentage_discount').css('display', 'none')
       $('#discount_max_value').css('display', 'none')
       $('#discount_value_percentage').attr('name', '')
   });

    // edit products below

    $('#edit_product_image_1').click(function (){
        $('#images-input-1').attr('name', 'product_image_1')
        $('#image_upload').css('display', 'block')
        $('#proceed').css('display', 'block')
    });

    $('#edit_product_image_2').click(function (){
        $('#images-input-1').attr('name', 'product_image_2')
        $('#image_upload').css('display', 'block')
        $('#proceed').css('display', 'block')
    });

    $('#edit_product_image_3').click(function (){
        $('#images-input-1').attr('name', 'product_image_3')
        $('#image_upload').css('display', 'block')
        $('#proceed').css('display', 'block')
    });

    $('#edit_product_image_4').click(function (){
        $('#images-input-1').attr('name', 'product_image_4')
        $('#image_upload').css('display', 'block')
        $('#proceed').css('display', 'block')
    });

    $('#edit_product_image_5').click(function (){
        $('#images-input-1').attr('name', 'product_image_5')
        $('#image_upload').css('display', 'block')
        $('#proceed').css('display', 'block')
    });

    $('#product_name_edit').click(function (){
        $('#product_name_description').css('display', 'block')
        $('#product_name').css('display', 'block')
        $('#product_name_input').attr('name', 'product_name')
        $('#product_name_input').attr('required', 'required')
        $('#proceed').css('display', 'block')
    });


    $('#product_description_edit').click(function (){
        $('#product_name_description').css('display', 'block')
        $('#product_description').css('display', 'block')
        $('#product_description_input').attr('name', 'product_description')
        $('#product_description_input').attr('required', 'required')
        $('#proceed').css('display', 'block')
    });

    $('#product_variant_edit').click(function (){
        $('#variant_container').css('display', 'block')
        $('#proceed').css('display', 'block')
    });

    $('#product_variant__size_edit').click(function (){
        $('#variant_container').css('display', 'block')
        $('#proceed').css('display', 'block')
    });

    $('#product_price_edit').click(function (){
        $('#product_price').css('display', 'block')
        $('#product_price_base').attr('name', 'product_price')
        $('#product_price_base').attr('required', 'required')
        $('#product_discount_price').attr('name', 'product_discount_price')
        $('#proceed').css('display', 'block')
    });

    $('#product_brand_edit').click(function (){
        $('#product_brand').css('display', 'block')
        $('#organise').css('display', 'block')
        $('#product_brand_select').attr('name', 'product_brand')
        $('#proceed').css('display', 'block')
    });

    $('#product_category_edit').click(function (){
        $('#product_category_container').css('display', 'block')
        $('#organise').css('display', 'block')
        $('#product_category').attr('name', 'product_category')
        $('#proceed').css('display', 'block')
    });
});