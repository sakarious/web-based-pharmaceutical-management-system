<?php

require_once "../controllers/categories.controller.php";
require_once "../models/categories.model.php";

class AjaxCategories{

	/*=============================================
	=          edit category          =
	=============================================*/

	public $idCategory;

	public function ajaxEditCategory(){

		$item = "id";
		$value = $this->idCategory;

		$answer = ControllerCategories::ctrShowCategories($item, $value);

		echo json_encode($answer);

	}

	/*=============================================
	=         validate category          =
	=============================================*/

	public $validateCategory;

	public function ajaxValidateCategory(){

		$item = "category";
		$value = $this->validateCategory;

		$answer = ControllerCategories::ctrShowCategories($item, $value);

		echo json_encode($answer);

	}
}

/*=============================================
=          edit category          =
=============================================*/
if(isset($_POST["idCategory"])){

	$category = new AjaxCategories();
	$category -> idCategory = $_POST["idCategory"];
	$category -> ajaxEditCategory();

}

/*=============================================
=         validate category (object)         =
=============================================*/

if(isset($_POST["validateCategory"])){

	$valCategory = new AjaxCategories();
	$valCategory -> validateCategory = $_POST["validateCategory"];
	$valCategory -> ajaxValidateCategory();

}