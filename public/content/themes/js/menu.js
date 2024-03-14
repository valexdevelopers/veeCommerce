$(document).ready(function(){
    $("#menu-open").click(function(){
        
        $("#menu_wrapper").animate({
            width: "300px"
        });
        
       
       
    });

    $("#menu-close-button").click(function () {
        $("#menu_wrapper").animate({
            width: "0px",
        });
    });

    $('#user-dropdown-btn').click(function (){
        $('#user-dropdown-menu').show()
    });
    
    $('#close-user-dropdown').click(function (){
        $('#user-dropdown-menu').hide()
    });
});





