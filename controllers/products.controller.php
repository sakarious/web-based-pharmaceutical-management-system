<?php

class ControllerProducts{

	/*=============================================
	show products
	=============================================*/

	static public function ctrShowProducts($item, $value){

		$table = "products";

		$answer = ProductsModel::mdlShowProducts($table, $item, $value);

		return $answer;

	}


}