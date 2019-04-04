<?php

class ControllerCategories{

	/*=============================================
	create categories
	=============================================*/

	static public function ctrCreateCategory(){

		if(isset($_POST["newCategory"])){

			if (preg_match('/^[a-zA-Z0-9-\/ ]+$/', $_POST["newCategory"])){

				$table = "categories";

				$data = $_POST["newCategory"];

				$answer = CategoriesModel::mdlCreateCategory($table, $data);

				if($answer == "ok"){

					echo '<script>
						
						swal({
							type: "success",
							title: "The Category has been created",
							showConfirmButton: true,
							confirmButtonText: "Close"

						}).then(function(result){

							if(result.value){

								window.location = "categories";
							}

						});
						
						</script>';

				}

			
			}else{

				echo '<script>
						
						swal({
							type: "error",
							title: "Category name cannot be blank or contain special characters",
							showConfirmButton: true,
							confirmButtonText: "Close"

						}).then(function(result){

							if(result.value){

								window.location = "categories";
							}

						});
						
						</script>';
			}


		}

	}

	/*=============================================
	show categories
	=============================================*/

	static public function ctrShowCategories($item, $value){

		$table = "categories";

		$answer = CategoriesModel::mdlShowCategories($table, $item, $value);

		return $answer;


	}

	/*=============================================
	edit categories
	=============================================*/

	static public function ctrEditCategory(){

		if(isset($_POST["editCategory"])){

			if (preg_match('/^[a-zA-Z0-9-\/ ]+$/', $_POST["editCategory"])){

				$table = "categories";

				$data = array("category"=>$_POST["editCategory"], "id"=>$_POST["idCategory"]);

				$answer = CategoriesModel::mdlEditCategory($table, $data);

				if($answer == "ok"){

					echo '<script>
						
						swal({
							type: "success",
							title: "The Category has been changed!",
							showConfirmButton: true,
							confirmButtonText: "Close"

						}).then(function(result){

							if(result.value){

								window.location = "categories";
							}

						});
						
						</script>';

				}

			
			}else{

				echo '<script>
						
						swal({
							type: "error",
							title: "Category name cannot be blank or contain special characters",
							showConfirmButton: true,
							confirmButtonText: "Close"

						}).then(function(result){

							if(result.value){

								window.location = "categories";
							}

						});
						
						</script>';
			}


		}

	}

	/*=============================================
	delete categories
	=============================================*/

	static public function ctrDeleteCategory(){

		if(isset($_GET["idCategory"])){

			$table = "categories";
			$data = $_GET["idCategory"];

			$answer = CategoriesModel::mdlDeleteCategory($table, $data);

			if($answer == "ok"){

					echo '<script>
						
						swal({
							type: "success",
							title: "The Category has been deleted!",
							showConfirmButton: true,
							confirmButtonText: "Close",
							closeOnConfirm: false
							}).then(function(result){

							if(result.value){

								window.location = "categories";
							}

						})
						
						</script>';

			}

		}
	

	}

}
