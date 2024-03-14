const slideWrap = document.getElementById('slider');
const noOfSlides = slideWrap.length;
let i = 1;

function displaySlides(){
    setInterval(function(){
    document.getElementById('slide' + i).checked =true;
    i++;
    if(i > 3){
        i = 1;
    }
    }, 3000);

}
displaySlides();


// const minus = document.getElementById('minus')
// const plus = document.getElementById('plus')
// const quantity = document.getElementById('quantity')




