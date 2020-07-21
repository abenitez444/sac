
//Store Coowner (Name_residence, Type_residence select Dependent)
$("#name_residence_id").change(function(){
  var res = $(this).val();
  $.get('nameResidence/'+res, function(data){
    console.log(data);
    $('#type_residence_id').removeAttr('disabled');
      var type_residence_id = '<option value="0" disabled selected>Seleccione. . .</option>'
        for (var i=0; i<data.length;i++){
	    	if(data[i].type_residence == 1){
	    	  type_residence_id+='<option value="1">Apartamento</option>';
	    	}else if(data[i].type_residence == 2){
	      	  type_residence_id+='<option value="2">Thownhouse</option>';
	    	}else{
	    	  type_residence_id+='<option value="3">Casa</option>';
	    	}
        }
        $("#type_residence_id").html(type_residence_id);
  	});
});
//Store Coowner (type_residence_id, type_structure_id select Dependent)
	$("#type_residence_id").change(function(event){
	var id = $('#name_residence_id').val()

	$.ajax({
	url: 'typeStructure/'+id,
	type: 'GET',
	dataType: 'json',

	}).done(function(data) {

	if(data.length > 0){
    console.log(data);
    $('#type_structure_id').removeAttr('disabled');
    $("#type_structure_id").empty();
    $("#type_structure_id").append("<option value='0' disabled selected>Seleccione... </option>");
	    for(i=0; i<data[0].length; i++){
	      	if(data[0][i].type_center == 'on'){
        	  $("#type_structure_id").append('<option value="1">Central</option>');
        	}
        	if(data[0][i].type_corner == 'on'){
          	  $("#type_structure_id").append('<option value="2">Esquina</option>');
        	}
        	if (data[0][i].type_penhouse == 'on') {
        	  $("#type_structure_id").append('<option value="3">Pen house</option>');
        	}
	    	if(data[0][i].type_structure == 'on'){
	      $("#type_structure_id").append("<option value='"+data[0][i].structure+ "'> "+data[0][i].structure+"</option>");
	  	  }
	   	}
	  }
	}).fail(function() {
	  console.log("error");
  });
});

//Edit Coowner
//Store Coowner (Name_residence, Type_residence select Dependent)
$(".name_residence_id").change(function(){
  var res = $(this).val();
  $.get('nameResidence/'+res, function(data){
    console.log(data);
    $('.type_residence_id').removeAttr('disabled');
      var type_residence_id = '<option value="0" disabled selected>Seleccione. . .</option>'
        for (var i=0; i<data.length;i++){
	    	if(data[i].type_residence == 1){
	    	  type_residence_id+='<option value="1">Apartamento</option>';
	    	}else if(data[i].type_residence == 2){
	      	  type_residence_id+='<option value="2">Thownhouse</option>';
	    	}else{
	    	  type_residence_id+='<option value="3">Casa</option>';
	    	}
        }
        $(".type_residence_id").html(type_residence_id);
  	});
});
//Store Coowner (type_residence_id, type_structure_id select Dependent)
	$(".type_residence_id").change(function(event){
	var id = $('.name_residence_id').val()

	$.ajax({
	url: 'typeStructure/'+id,
	type: 'GET',
	dataType: 'json',

	}).done(function(data) {

	if(data.length > 0){
    console.log(data);
    $('.type_structure_id').removeAttr('disabled');
    $(".type_structure_id").empty();
    $(".type_structure_id").append("<option value='0' disabled selected>Seleccione... </option>");
	    for(i=0; i<data[0].length; i++){
	      	if(data[0][i].type_center == 'on'){
        	  $(".type_structure_id").append('<option value="1">Central</option>');
        	}
        	if(data[0][i].type_corner == 'on'){
          	  $(".type_structure_id").append('<option value="2">Esquina</option>');
        	}
        	if (data[0][i].type_penhouse == 'on') {
        	  $(".type_structure_id").append('<option value="3">Pen house</option>');
        	}
	    	if(data[0][i].type_structure == 'on'){
	     $(".type_structure_id").append("<option value='"+data[0][i].structure+ "'> "+data[0][i].structure+"</option>");
	  	  }
	   	}
	  }
	}).fail(function() {
	  console.log("error");
  });
});

