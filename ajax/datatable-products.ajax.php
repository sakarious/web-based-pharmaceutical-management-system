<?php

	require_once "../controllers/products.controller.php";
	require_once "../models/products.model.php";

	require_once "../controllers/categories.controller.php";
	require_once "../models/categories.model.php";

class ProductsTable{

/*=============================================
	show product table
=============================================*/

	public function showProductsTable(){


		$item = null;
		$value = null;

		$products = ControllerProducts::ctrShowProducts($item, $value);		


		/*=============================================
			 Start JsonData structure and each index from the database is in the for loop cycle, it prints and concertenate the final structure
		=============================================*/

		$JsonData = '{
			"data": [';

			for ($i = 0; $i < count($products); $i++) { 

		/*=============================================
		Brings image from products table in database
		=============================================*/

				$image = "<img src='".$products[$i]["image"]."' width='40px'>";
		/*=============================================
		Bring categories from table categories database
		=============================================*/

				$item = "id";
				$value = $products[$i]["idCategory"];

				$categories = ControllerCategories::ctrShowCategories($item, $value);

		/*=============================================
			Change button color for Stock
		=============================================*/
				if($products[$i]["stock"] <= 10) {

					$stock = "<button class= 'btn btn-danger'>".$products[$i]["stock"]."</button>";
				}else if($products[$i]["stock"] > 11 && $products[$i]["stock"] <= 15){

					$stock = "<button class= 'btn btn-warning'>".$products[$i]["stock"]."</button>";
				}else{

				$stock = "<button class= 'btn btn-success'>".$products[$i]["stock"]."</button>";
				}

		/*=============================================
			Button actions (Edit & Delete)
		=============================================*/

				$buttons = "<div class='btn-group'><button class='btn btn-warning btnEditProduct' idProduct='".$products[$i]["id"]."' data-toggle='modal' data-target='#modalEditProducts'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnDeleteProduct' idProduct='".$products[$i]["id"]."' code='".$products[$i]["code"]."' image='".$products[$i]["image"]."'><i class='fa fa-times'></i></button></div>  ";

				$JsonData .='[
						"'.($i+1).'",
						"'.$image.'",
						"'.$products[$i]["code"].'",
						"'.$products[$i]["description"].'",
						"'.$categories["category"].'",
						"'.$stock.'",
						"'.$products[$i]["costPrice"].'",
						"'.$products[$i]["sellingPrice"].'",
						"'.$products[$i]["date"].'",
						"'.$buttons.'"
					],';
			}

			$JsonData = substr($JsonData, 0, -1);

			$JsonData.= ']
			
			}';

			echo $JsonData;
	}
}

/*=============================================
= Activate Product table =
=============================================*/

$activateProducts =  new productsTable();
$activateProducts -> showProductsTable();