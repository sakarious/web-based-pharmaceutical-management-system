<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Manage Products

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Manage Products</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddProduct">

          Add Product

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive productsTable" width="100%">
       
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Image</th>
             <th>Code</th>
             <th>Description</th>
             <th>Category</th>
             <th>Stock</th>
             <th>Cost Price (N)</th>
             <th>Selling Price (N)</th>
             <th>Date Added</th>
             <th>Actions</th>

           </tr> 

          </thead>

        </table>

      </div>
    
    </div>

  </section>

</div>


<!--=====================================
=            module add product            =
======================================-->

<!-- Modal -->
<div id="modalAddProduct" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->

    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/formdata">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background: #3c8dbc; color: #fff">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Add Products</h4>

        </div>

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             <!-- select category -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="newCategory" name="newCategory" required>

                  <option value="">Select Category</option>

                  <?php

                    $item = null;
                    $value = $products[$i]["idCategory"];

                    $categories = ControllerCategories::ctrShowCategories($item, $value);

                    foreach ($categories as $key => $value) {
                      echo '<option value="'.$value["category"].'">'.$value["category"].'</option>';
                      }

                  ?>

                </select>

              </div>

            </div>

            <!--Input Code -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input class="form-control input-lg" type="text" name="newCode" placeholder="Add Code" required>

              </div>

            </div>

            <!-- input description -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input class="form-control input-lg" type="text" name="newDescription" placeholder="Add Description" required>

              </div>

            </div>

             <!-- input Stock -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-check"></i></span>

                <input class="form-control input-lg" type="number" name="newStock" placeholder="Add Stock" min="0" required>

              </div>

            </div>

             <!-- INPUT COST PRICE -->
             <div class="form-group row">

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                    <input type="number" class="form-control input-lg" id="newBuyingPrice" name="newCostPrice" step="any" min="0" placeholder="Cost price" required>

                  </div>

                </div>

                <!-- INPUT SELLING PRICE -->
                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="number" class="form-control input-lg" id="newSellingPrice" name="newSellingPrice" step="any" min="0" placeholder="Selling price" required>

                  </div>
                
                  <br>

                  <!-- CHECKBOX PERCENTAGE -->
                  <div class="col-xs-6">
                    
                    <div class="form-group">
                      
                      <label>
                        
                        <input type="checkbox" class="minimal percentage" checked>
                        
                        Use percentage
                      
                      </label>

                    </div>

                  </div>

                  <!-- INPUT PERCENTAGE -->
                  <div class="col-xs-6" style="padding:0">
                    
                    <div class="input-group">
                      
                      <input type="number" class="form-control input-lg newPercentage" min="0" value="40" required>

                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                    </div>

                  </div>

                </div>

            </div>

            <!-- input image -->
            <div class="form-group">

              <div class="panel">Upload image</div>

              <input id="newProductPhoto" type="file" name="newProductPhoto">

              <p class="help-block">Picture must not be more than 2Mb</p>

              <img src="views/img/products/default/anonymous.jpg" alt="" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn b