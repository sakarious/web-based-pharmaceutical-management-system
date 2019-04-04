/*=============================================
= Loading the dynamic table in products to save time
Finally applied time and space complexity to something :)
Still on still, School is SCAM!! =
=============================================*/

// $.ajax({

//  	url: "ajax/datatable-products.ajax.php",
//  	success:function(answer){
		
//  		console.log("answer", answer);

//  	}

//  })


	$('.productsTable').DataTable( {
		"ajax": "ajax/datatable-products.ajax.php",
		"deferRender": true,
		"retrieve": true,
		"processing": true
	} );
