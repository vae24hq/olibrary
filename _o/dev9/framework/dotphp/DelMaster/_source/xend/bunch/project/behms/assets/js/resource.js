$(document).ready(function(){ 
$('#getPatientDetails').click( function(){
	
	$('#patientDetails').removeClass('hidden');
	$('#patientDetails').addClass('row');
	 
	
return false;
	});

/*alert('hi');
$.getScript('../budles/mainscript.bundle.js', function() {
    //script is loaded and executed put your dependent JS here
});

$('.container-fluid').load('dashboard'+'.php'); 	
/////////main navigation call............
$('.menu .list li a.mainNav').click( function(){
	
	$('.active').removeClass('active');
	$(this).closest('li').addClass('active');
	
	var ref = $(this).attr('href');
//alert(ref);
$('.container-fluid').fadeOut('slow', function(){
$('.container-fluid').load(ref +'.php');	
});
$('.container-fluid').fadeIn('slow');

return false;
	});
	
	
	
	////////////////sub navigation call............
	
	$('.subNav').click( function(){
	
	$('.active').removeClass('active');
	$(this).closest('li').addClass('active');
	$(this).parents('li').addClass('active open');
	
	var ref = $(this).attr('href');
//alert(ref);
$('.container-fluid').fadeOut('slow', function(){
$('.container-fluid').load(ref+'.php');	
});
$('.container-fluid').fadeIn('slow');

return false;
	}); */
});
 