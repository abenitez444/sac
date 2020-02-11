$(document).ready(function () {

    $('#payment_method_id').on('change', function(){
     var valor = $("#payment_method_id").val();
     if (valor==1) {
     	var fechaVen = $("#datetime").val();
     	console.log(fechaVen);
     	 $("#due_date").val(fechaVen);

     }
	});
});
