$(document).ready(function() {
$('.buscador').select2({
}).on("select2:close", function (e) {  
        $(this).valid(); 
    });

	$("#residence_coowner").change(function(event) {
		var data = $( "#addExpenditure" ).serialize();
	    $.ajax({
	    	type: 'POST',
	    	url: 'searchClient',
	    	data: data,
	    	success: function(data){
	    	  $('#resultClient').html(data);
	    	  $('#year').val($(this).find('option:first').val());
	    	  $('#year').removeAttr('disabled');

	        }                           
        })
	});

	$("#year").change(function(event) {
		var data = $( "#addExpenditure" ).serialize();
		
	    $.ajax({
	    	type: 'POST',
	    	url: 'searchMonth',
	    	data: data,
	    	success: function(data){
	    		$('#month').html(data);
	    		$('#month').removeAttr('disabled');
	        }                           
        })
	});

	/*$("#year").change(function(event) { 
		var data = $( "#addExpenditure" ).serialize();
		var year = $('select[name=year]').val();
	    $.ajax({
	    	type: 'POST',
	    	url: 'searchYear',
	    	data: data,
	    	success: function(data){
	    		if (data !="") {
	    			$('#title').html("<label><b>Meses pagados del año:</b> <b class='bg-info text-white'>"+year+"</b></label>");
	    			$('#year').html(data);
	        	}
	        	else{
	        		$('#title').html("<label><b>Pagos del año:</b> "+year+"</label>");
	        		$('#year').html("<li>no hay pagos registrados</li>");
	        	}
	        }                           
        })
	}); */
});
	


