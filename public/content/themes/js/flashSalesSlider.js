
let moveableSize = 0.0084683
let rightMoveSize = -0.0084683
function grabbb( childrenofSlide, childrenofSlideClassName, sliderwrap, buttonposition, btnIdToOff, btnIdToShow){
    $('document').ready( function(){
        //    // flash sales
        let sliderChild = document.querySelector(`#${childrenofSlide}`) //flash-sales
        let slider = document.querySelector(`#${sliderwrap}`); //flash_sales_set
        let sliderPreviewLength =  slider.getElementsByClassName(`${childrenofSlideClassName}`).length
        let slider_setWidth = sliderChild.offsetWidth * sliderPreviewLength
        // add column gap to width
        slider_setWidth += 130
        slider.style.width =   `${slider_setWidth}px`
        let singleMove = slider_setWidth / sliderPreviewLength
        // this remains constant as its the current display of the device
        let viewableWidth = document.getElementById('viewableWidth').offsetWidth
        // $(`#${btnIdToOff}`).css('display', 'none')
        

        if(buttonposition == 'left'){
            // alert(sliderwrap)
            moveLeft(slider_setWidth, `#${sliderwrap}`, singleMove);
            
        }else if(buttonposition == 'right'){
            
            moveRight(slider, `#${sliderwrap}`, singleMove);
        }

        function moveLeft(sliderWidth, sliderid, oneMove  ){
            oneMove = parseFloat((oneMove).toFixed(3)) 
            
            if(moveableSize <= sliderWidth - viewableWidth ){
                moveableSize += singleMove 
                // $(`#${btnIdToOff}`).css('display', 'none')
                
            }else{
                moveableSize = sliderWidth - viewableWidth
                $(`#${btnIdToShow}`).css('display', 'none')

            }
            moveableSize = parseFloat((moveableSize).toFixed(3)) 
            leftmove = '-' + moveableSize + 'px'
            $(sliderid).animate({left: leftmove})
            $(`#${btnIdToOff}`).css('display', 'inline-block')
            moveableSize += oneMove
            
        }

        function moveRight(sliderWrappername, sliderid, oneMove ){
            
            let leftMove = sliderWrappername.style.left;
            leftMove = parseFloat(leftMove)
            oneMove = parseFloat((oneMove + 0.0084683).toFixed(3)) 
           
            if(rightMoveSize <= leftMove || leftMove + oneMove >= 0 || leftMove >= 0){
                
                rightmove = 0.0084683
                move = rightmove + 'px'
                $(`#${btnIdToShow}`).css('display', 'inline-block')
                // $(`#${btnIdToOff}`).css('display', 'inline-block')
            }else{
                $(`#${btnIdToShow}`).css('display', 'inline-block')
                rightmove = leftMove + oneMove
                move = rightmove + 'px'
            }
            console.log(rightMoveSize, leftMove, oneMove, moveableSize)
            $(sliderid).animate({left: move})
            rightMoveSize += oneMove
        }

        });
}
