$(document).ready(function(){
    $('#banner-images-input').change(function(){
        
        let imageInput = document.querySelector('#banner-images-input')
        let imagePreviews = document.getElementsByClassName('setImagePreview')
        let imagePreviewsName = document.getElementsByClassName('preview-image-name')
        let imagePreviewsSize = document.getElementsByClassName('preview-image-size')
        let i = 0
        let r = 0
        let noOfAllowedImages 
        const uri = window.location.pathname;
        let fileName =(uri.replace('http://127.0.0.1:8000/', '') )
        let extraPathName;
        if(/\/admin\/brands\/[A-Za-z0-9_]/i.test(fileName)){
          extraPathName = fileName.replace('/admin/brands/', '')
            // console.log(extraPathName)
        }else if (/\/admin\/categories\/[A-Za-z0-9_]/i.test(fileName)){
            extraPathName = fileName.replace('/admin/categories/', '')
        }else if (/\/admin\/products\/[A-Za-z0-9_]/i.test(fileName)){
            extraPathName = fileName.replace('/admin/products/', '')
        }


        if(fileName == '/admin/products/new'){
            noOfAllowedImages = 5     
        }else if(fileName == `/admin/products/${extraPathName}`){
            noOfAllowedImages = 5  
        }else if(fileName == '/banner.html'){
            noOfAllowedImages = 3  
        }else if(fileName == '/admin/brands/new'){
            noOfAllowedImages = 1  
        }else if(fileName == `/admin/brands/${extraPathName}`){
            noOfAllowedImages = 1  
        }else if(fileName == '/admin/categories/new'){
            noOfAllowedImages = 1  
        }else if(fileName == `/admin/categories/${extraPathName}`){
            noOfAllowedImages = 1  
        }

        if(imageInput.files.length <= noOfAllowedImages){
            if(imageInput.files.length == 1) {
                console.log(imageInput.files.length)
                imagePreviews[0].src = URL.createObjectURL(imageInput.files[0])
                imagePreviewsName[0].innerHTML = imageInput.files[0].name

                if(imageInput.files[0].size > 1000){
                    imageSize = Math.floor(imageInput.files[0].size/1000) + 'kb'
                }else if(imageInput.files[0].size > 1000000){
                    imageSize = Math.floor(imageInput.files[0].size/1000000) + 'mb'
                }else{
                    imageSize = Math.floor(imageInput.files[0].size) + 'b'
                }
                imagePreviewsSize[0].innerHTML =  imageSize
                // console.log(imageInput.files[i].size, imageInput.files[i].name)
                $('#image_preview_wrap').css('display', 'grid')
           }else{

           
            while(i < imageInput.files.length){
                
                $("#image-preview-container").clone().attr('class', `new-image-preview`).appendTo("#image_preview_wrap")
                while(r < imagePreviews.length ){

                    imagePreviews[r].src = URL.createObjectURL(imageInput.files[i])
                    imagePreviewsName[r].innerHTML = imageInput.files[i].name

                    if(imageInput.files[i].size > 1000){
                        imageSize = Math.floor(imageInput.files[i].size/1000) + 'kb'
                    }else if(imageInput.files[i].size > 1000000){
                        imageSize = Math.floor(imageInput.files[i].size/1000000) + 'mb'
                    }else{
                        imageSize = Math.floor(imageInput.files[i].size) + 'b'
                    }
                    imagePreviewsSize[r].innerHTML =  imageSize
                    // console.log(imageInput.files[i].size, imageInput.files[i].name)
                    i++;
                    r++;
                    $('#image_preview_wrap').css('display', 'grid')
                    console.log(imageInput.files.length)
                }
            }
        }
           
        }else{
            let  error = `You can select up to ${noOfAllowedImages} images but not more. Kindly repeat the previous action correctly`
            $('#modal-title').text('Image Upload Error')
            $('#modal-body').text(error)
            $('#modal').css('display', 'grid')
            
        }
        

      
    });

    $('#close-modal').click(function(){
        $('#modal').css('display', 'none')  
    });

    // category selection for product form below

    $('#close-modal-productCategory').click(function(){
        $('#productCategory').css('display', 'none')  
    });

    $('#selectProductCategorybtn').click(function() {
        $('#productCategory').css('display', 'grid')  
    })




    // product selections for sales below
    $('#selectProductsbtn').click(function() {
        $('#productSelection').css('display', 'grid')  
    })

    $('#close-modal-productSelection').click(function(){
        $('#productSelection').css('display', 'none')  
    });

    $('#categorySelect').click(function(){
        $('#selectByCategory').css('display', 'block')  
        $('#selectByProduct').css('display', 'none')  
    });
    
    $('#productSelect').click(function(){
        $('#selectByCategory').css('display', 'none')  
        $('#selectByProduct').css('display', 'block')  
    });
    
});