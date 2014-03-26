//Avoiding conflicts
var $j = jQuery.noConflict();

//Making the plugins run
$j(document).ready(function() {
	
	//navigation drop down
    $j('.navbar, .footer-navbar ul').superfish();
    
    //mobile navi
	$j('.navbar').tinyNav({
		header: 'Navigation'
	});
});