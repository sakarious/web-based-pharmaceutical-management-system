/*=============================================
=          edit category          =
=============================================*/

$(".tables").on("click", ".btnEditCategory", function(){

	var idCategory = $(this).attr("idCategory");

	var data = new FormData();
	data.append("idCategory", idCategory);

	$.ajax({
		url: "ajax/categories.ajax.php",
		method: "POST",
 		data: data,
 		cache: false,
 		contentType: false,
 		processData: false,
 		dataType: "json",
 		success: function(answer){

 			$("#editCategory").val(answer["category"]);
 			$("#idCategory").val(answer["id"]);

 			console.log("answer", answer)

 		}

	})

})


/*=============================================
=      validate if category exists          =
=============================================*/

$("#newCategory").change(function(){

	$(".alert").remove();

	var category = $(this).val();

	var data = new FormData();
	data.append("validateCategory", category);

	$.ajax({
		url: "ajax/categories.ajax.php",
		method: "POST",
 		data: data,
 		cache: false,
 		contentType: false,
 		processData: false,
 		dataType: "json",
 		success: function(answer){

 		if(answer){

      		$("#newCategory").parent().after('<div class="alert alert-warning">This Category already exists</div>');
      		
      		$("#newCategory").val('');
      	}

 			//console.log("answer", answer);

 		}

	})

})


/*=============================================
=          delete category          =
=============================================*/

$(".tables").on("click", ".btnDeleteCategory", function(){

	var idCategory = $(this).attr("idCategory");

	swal({
		title: 'Are you sure to delete this category?',
		text: "If you are not sure, you can cancel the action",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancel',
		confirmButtonText: 'Yes, Delete Category!'
	}).then((result)=>{

		if(result.value){

			window.location = "index.php?route=categories&idCategory="+idCategory;

		}

	})


})