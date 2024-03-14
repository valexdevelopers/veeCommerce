$(document).ready(function () {
    $('#images-input-1').change(function (){
    let imageInput = document.querySelector('#images-input-1')
    let imagePreviews = document.getElementById('setImagePreview-1')
    let imagePreviewsName = document.getElementById('preview-image-name-1')
    let imagePreviewsSize = document.getElementById('preview-image-size-1')
    
        imagePreviews.src = URL.createObjectURL(imageInput.files[0])
        imagePreviewsName.innerHTML = imageInput.files[0].name

        if(imageInput.files[0].size > 1000){
            imageSize = Math.floor(imageInput.files[0].size/1000) + 'kb'
        }else if(imageInput.files[0].size > 1000000){
            imageSize = Math.floor(imageInput.files[0].size/1000000) + 'mb'
        }else{
            imageSize = Math.floor(imageInput.files[0].size) + 'b'
        }
        imagePreviewsSize.innerHTML =  imageSize
        $('#image_banner_wrap').css('display', 'grid')
    })

    $('#images-input-2').change(function (){
        let imageInput = document.querySelector('#images-input-2')
        let imagePreviews = document.getElementById('setImagePreview-2')
        let imagePreviewsName = document.getElementById('preview-image-name-2')
        let imagePreviewsSize = document.getElementById('preview-image-size-2')
        
            imagePreviews.src = URL.createObjectURL(imageInput.files[0])
            imagePreviewsName.innerHTML = imageInput.files[0].name
    
            if(imageInput.files[0].size > 1000){
                imageSize = Math.floor(imageInput.files[0].size/1000) + 'kb'
            }else if(imageInput.files[0].size > 1000000){
                imageSize = Math.floor(imageInput.files[0].size/1000000) + 'mb'
            }else{
                imageSize = Math.floor(imageInput.files[0].size) + 'b'
            }
            imagePreviewsSize.innerHTML =  imageSize
            $('#image_banner_wrap-2').css('display', 'grid')
    })

    $('#images-input-3').change(function (){
        let imageInput = document.querySelector('#images-input-3')
        let imagePreviews = document.getElementById('setImagePreview-3')
        let imagePreviewsName = document.getElementById('preview-image-name-3')
        let imagePreviewsSize = document.getElementById('preview-image-size-3')
        
            imagePreviews.src = URL.createObjectURL(imageInput.files[0])
            imagePreviewsName.innerHTML = imageInput.files[0].name
    
            if(imageInput.files[0].size > 1000){
                imageSize = Math.floor(imageInput.files[0].size/1000) + 'kb'
            }else if(imageInput.files[0].size > 1000000){
                imageSize = Math.floor(imageInput.files[0].size/1000000) + 'mb'
            }else{
                imageSize = Math.floor(imageInput.files[0].size) + 'b'
            }
            imagePreviewsSize.innerHTML =  imageSize
            $('#image_banner_wrap-3').css('display', 'grid')
    })

    $('#images-input-4').change(function (){
        let imageInput = document.querySelector('#images-input-4')
        let imagePreviews = document.getElementById('setImagePreview-4')
        let imagePreviewsName = document.getElementById('preview-image-name-4')
        let imagePreviewsSize = document.getElementById('preview-image-size-4')
        
            imagePreviews.src = URL.createObjectURL(imageInput.files[0])
            imagePreviewsName.innerHTML = imageInput.files[0].name
    
            if(imageInput.files[0].size > 1000){
                imageSize = Math.floor(imageInput.files[0].size/1000) + 'kb'
            }else if(imageInput.files[0].size > 1000000){
                imageSize = Math.floor(imageInput.files[0].size/1000000) + 'mb'
            }else{
                imageSize = Math.floor(imageInput.files[0].size) + 'b'
            }
            imagePreviewsSize.innerHTML =  imageSize
            $('#image_banner_wrap-4').css('display', 'grid')
    })

    $('#images-input-5').change(function (){
        let imageInput = document.querySelector('#images-input-5')
        let imagePreviews = document.getElementById('setImagePreview-5')
        let imagePreviewsName = document.getElementById('preview-image-name-5')
        let imagePreviewsSize = document.getElementById('preview-image-size-5')
        
            imagePreviews.src = URL.createObjectURL(imageInput.files[0])
            imagePreviewsName.innerHTML = imageInput.files[0].name
    
            if(imageInput.files[0].size > 1000){
                imageSize = Math.floor(imageInput.files[0].size/1000) + 'kb'
            }else if(imageInput.files[0].size > 1000000){
                imageSize = Math.floor(imageInput.files[0].size/1000000) + 'mb'
            }else{
                imageSize = Math.floor(imageInput.files[0].size) + 'b'
            }
            imagePreviewsSize.innerHTML =  imageSize
            $('#image_banner_wrap-5').css('display', 'grid')
    })
})