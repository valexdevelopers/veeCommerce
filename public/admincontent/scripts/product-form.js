$(document).ready(function() {

    //animate menu for mobile view
    $("#menu-open-button").click(function () {
        $("#menu_wrapper").animate({
            width: "300px",
            display:"block",
            
        });
    });
   
    $("#menu-close-button").click(function () {
        $("#menu_wrapper").animate({
            width: "0px",
            display:"none",
            
    
        });
    });
    
    // // create new options variant for product form
    // $("#create-option-btn").click(function(){
    //     $("#options-for-product-details").clone().appendTo("#product-variant");
    // });

    // create new options variant for product form
    let noOfProductVariantCreated = 1;
    $("#create-option-btn").click(function(){
        console.log("#create-option-btn")
        noOfProductVariantCreated++
        let optionId = `options-for-product-details-${noOfProductVariantCreated}`
        let selectVariantId = `select_variant_${noOfProductVariantCreated}`
        let inputVariantId = `variant_${noOfProductVariantCreated}`
        $("#options-for-product-details-1").clone().attr("id", optionId).appendTo("#product-variant")
        $(`#${optionId}`).find("select.select_variant").attr("id", selectVariantId)
        $(`#${optionId}`).find("input.input_variant").attr("id", inputVariantId)
        $(`#${optionId}`).find("i#remove-product-variant-1").attr('id', `remove-product-variant-${noOfProductVariantCreated}`)
        
    })

    

   
    let productVariantClicked 
    let select_id 
    let icon_id
    let noOfClicksNewSizeBtn = 1 ; // the first size has already been created on size select
    let noOfClicksNewColorBtn = 1 ; // the first color has already been created on color select
    
    document.querySelector("#product-variant").onclick = e => {

        productVariantClicked = e.target.id
        console.log(e.target.id)
        if(/select_variant_[0-9]/.test(productVariantClicked)){
            select_id = productVariantClicked;  // to get the element
            console.log(select_id)
        }else if(/remove-product-variant-[0-9]/.test(productVariantClicked)){
            // actions for when product variant removal clicked
            icon_id = productVariantClicked
            // check if its the first id trying to be romoved
            VariantSection = $(`#${icon_id}`).parents("section.product-variant-class")
            if(VariantSection.attr('id') == "options-for-product-details-1"){
                console.log(VariantSection.attr('id'))
            }else{
                VariantSection.remove()
            }
        }else if($(`#${productVariantClicked}`).attr('id') == "size-option-value-btn"){
            // find the section parent

            noOfClicksNewSizeBtn++
            VariantChildSection = $(`#${productVariantClicked}`).parents("section.product-variant-child")
            // find the child div of section parent containing the sub variant values
            //  reasons for this div search is to be able to append cloned values to the said div
            VariantChildSectionChildDiv = VariantChildSection.children("div.product-variant-child-div-child")
            newOptionValue = VariantChildSectionChildDiv.find("div#option-value-1").clone()
            newOptionValue.attr('id', `option-value-${noOfClicksNewSizeBtn}`)
            newOptionValue.find('input.option-value').attr('name', `product_size[${noOfClicksNewSizeBtn}][size_value]`)
            newOptionValue.find('i.remove-product-variant-option-value').attr('id', `remove-product-variant-option-value-${noOfClicksNewSizeBtn}`)
            newOptionValue.appendTo(VariantChildSectionChildDiv)
            
        } else if($(`#${productVariantClicked}`).attr('id') == "color-option-value-btn"){
            // find the section parent

            noOfClicksNewColorBtn++
            VariantChildSection = $(`#${productVariantClicked}`).parents("section.product-variant-child")
            // find the child div of section parent containing the sub variant values
            //  reasons for this div search is to be able to append cloned values to the said div
            VariantChildSectionChildDiv = VariantChildSection.children("div.product-variant-child-div-child")
            newOptionValue = VariantChildSectionChildDiv.find("div#option-value-1").clone()
            newOptionValue.attr('id', `option-value-${noOfClicksNewColorBtn}`)
            newOptionValue.find('input.option-value').attr('name', `product_color[${noOfClicksNewColorBtn}][color_value]`)
            newOptionValue.find('i.remove-product-variant-option-value').attr('id', `remove-product-variant-option-value-${noOfClicksNewColorBtn}`)
            newOptionValue.appendTo(VariantChildSectionChildDiv)
            
        }else if(/remove-product-variant-option-value-[0-9]/.test(productVariantClicked)){
            VariantValueGroup = $(`#${productVariantClicked}`).parents("div.variant-value-group")
            
            if($(`#${productVariantClicked}`).attr('id') == "remove-product-variant-option-value-1"){
                console.log(VariantValueGroup.attr('id'))
            }else{
               
                VariantValueGroup.remove()
            }
        }

       $(`#${select_id}`).change(function (){
        let product_variant = $(`#${select_id}`).val()
        let intValueOFClickedProductVariant = select_id.substring(15, select_id.length)
        let variant_id = `#variant_${intValueOFClickedProductVariant}`
        let SelectVariantParent = $(`#${select_id}`).parents("section.product-variant-class");
        if(product_variant == 'color' || product_variant == 'size'){
            $(variant_id).css('display', 'none');
            // the functions below set the value for specific variants as they change 
            SelectVariantParent.find("label#label-option-value").text(`${product_variant} value`)
            SelectVariantParent.find("input#option-value").attr('name', `product_${product_variant}[1][${product_variant}_value]`)
            SelectVariantParent.find("input#option-value").attr('placeholder', `enter ${product_variant}`)
            SelectVariantParent.find("button.create-option-value-btn").attr('id', `${product_variant}-option-value-btn`)
            SelectVariantParent.find("button.create-option-value-btn").text(`add ${product_variant} value`)
            SelectVariantParent.children("section#product-variant-child").css('display', 'block')
            
            
            // // creating more values inputs
            // let noOfOptionValuesCreated = 1;
            // $(`#${product_variant}-option-value-btn`).click( function(){
            //     console.log(product_variant)
            // //     noOfOptionValuesCreated++;
            // // let valueId = `option-value-${noOfOptionValuesCreated}`
            // //     $("#option-value-1").clone().attr('id', valueId).appendTo("#options-values-for-product-details");
                
            // })
            
        }else{
            $(variant_id).css('display', 'block');
            SelectVariantParent.children("section#product-variant-child").css('display', 'none')
            $(variant_id).attr('name', product_variant);
             console.log(variant_id, product_variant)
        }
            
        }) 

        
    }
});