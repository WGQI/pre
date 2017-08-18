jQuery(document).ready(function(){
    var
        degress=0,
        timer = setInterval(function () {
        	if(degress>360) degress=0;
            degress++;
            jQuery('body').css('background-image', 'linear-gradient(' + degress + 'deg,#00B7FF,#FFFFC7)')
        },14000/360);
})