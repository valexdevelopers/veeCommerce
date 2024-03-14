// to use this function you must id your input elemtn as product_image_1 t0 product_image_5
//you must also create a div with id image_preview_wrap to house the images inside the form 

// image 3
const product_image_1 = document.getElementById('product_image_1')
const imageElementClassName1 = 'product_image_1_preview'
product_image_1.addEventListener('change', displayImageElement.bind(null, createImageElement(imageElementClassName1), product_image_1))


// image 4
const product_image_2 = document.getElementById('product_image_2')
const imageElementClassName2 = 'product_image_2_preview'
product_image_2.addEventListener('change', displayImageElement.bind(null, createImageElement(imageElementClassName2), product_image_2))


// image 3
const product_image_3 = document.getElementById('product_image_3')
const imageElementClassName3 = 'product_image_3_preview'
product_image_3.addEventListener('change', displayImageElement.bind(null, createImageElement(imageElementClassName3), product_image_3))


// image 4
const product_image_4 = document.getElementById('product_image_4')
const imageElementClassName4 = 'product_image_4_preview'
product_image_4.addEventListener('change', displayImageElement.bind(null, createImageElement(imageElementClassName4), product_image_4))


// image 5
const product_image_5 = document.getElementById('product_image_5')
const imageElementClassName5 = 'product_image_5_preview'
product_image_5.addEventListener('change', displayImageElement.bind(null, createImageElement(imageElementClassName5), product_image_5))



// function to display image preview from input in admin/createNewProduct
function displayImageElement(imageHtmlElement, inputHtmlElement){
    imageHtmlElement.src = URL.createObjectURL(inputHtmlElement.files[0])
}


// function to create image element 
function createImageElement(imageclass){
    var imageElement = document.getElementById(imageclass)
    if( imageElement === null){
        const image_preview_wrap  = document.querySelector('#image_preview_wrap')
        let col_sm_2 = document.createElement('div')
        col_sm_2.setAttribute('class', 'col-sm-2')
        let form_group_Div = document.createElement('div')
        form_group_Div.setAttribute('class', 'form-group')
        let newImageElement = document.createElement('img')
        newImageElement.setAttribute('class', `${imageclass} width-100-percent`)
        newImageElement.setAttribute('id', imageclass)
        
        // append newImageElement to form_group_Div
        form_group_Div.appendChild(newImageElement)
        col_sm_2.appendChild(form_group_Div)
        image_preview_wrap.appendChild(col_sm_2)
        return newImageElement
    }else{
        return imageElement
    }
    


    
    
}

