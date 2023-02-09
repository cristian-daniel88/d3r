let toggleProfile = false;
let togleMenu = false;

// FUNTIONS
function toggleProfileFunction() {
        if (!toggleProfile) {
            if (togleMenu) {
                $('#mobile-menu ').animate({
                    top: '-5000px'
                }, 1000);  
                togleMenu = false
            }
            let myVar;
            function showImage(){
                $("#profileMenu").fadeOut(750).fadeIn(750);
                myVar = setTimeout(showImage, 2000);
                stopFunction()
            }
            function stopFunction(){
                clearTimeout(myVar); // stop the timer
            }
            $(document).ready(function(){
                showImage();
            }); 
            toggleProfile = true;   
        } else {
            let myVar;
            function showImage(){
                $("#profileMenu").fadeIn(750).fadeOut(750);
                myVar = setTimeout(showImage, 2000);
                stopFunction()
            }
            function stopFunction(){
                clearTimeout(myVar); // stop the timer
            }
            $(document).ready(function(){
                showImage();
            }); 
            toggleProfile = false;  
        }

}

function burguerFunction () {
    if (!togleMenu) {
        if (toggleProfile) {
            let myVar;
            function showImage(){
                $("#profileMenu").fadeIn(750).fadeOut(750);
                myVar = setTimeout(showImage, 2000);
                stopFunction()
            }
            function stopFunction(){
                clearTimeout(myVar); // stop the timer
            }
            $(document).ready(function(){
                showImage();
            }); 
            toggleProfile = false;  
        }

        $('#mobile-menu').animate({
            top: '50px'
        }, 500); 
        togleMenu = true 
    } else {
        $('#mobile-menu ').animate({
            top: '-5000px'
        }, 500);  
        togleMenu = false
    }
}


// EVENTS
$('#user-menu-button').click(() => {toggleProfileFunction()});

$('#menuButton').click(() => {burguerFunction()})

 

   

