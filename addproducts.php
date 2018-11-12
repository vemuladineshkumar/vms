
<html>
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

   <body>
      
      <form action="upload.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
      <fieldset>

<!-- Form Name -->
<legend>PRODUCTS</legend>

<!-- Text input-->
<!--<div class="form-group">
  <label class="col-md-4 control-label" for="product_id">PRODUCT ID</label>  
  <div class="col-md-4">
  <input id="product_id" name="product_id" placeholder="PRODUCT ID" class="form-control input-md" required="" type="text">
    
  </div>
</div>-->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
  <div class="col-md-4">
  <input id="product_name" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>  
  <div class="col-md-4">
  <input id="product_description" name="product_description" placeholder="PRODUCT DESCRIPTION FR" class="form-control input-md" required="" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="product_price">PRODUCT PRICE</label>  
  <div class="col-md-4">
  <input id="product_price" name="product_price" placeholder="PRODUCT PRICE" class="form-control input-md" required="" type="text">
    
  </div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="product_image">PRODUCT IMAGE</label>  
<div class="col-md-4">
         <input type="file" name="image" /><br>
        
         </div>
         </div>
<div class="form-group">
<label class="col-md-4 control-label" for="product_image"></label>  
    <div class="col-md-4">
         <input type="submit"/><br>
        
    </div>
</div>
    
      </form>
  
   </body>
</html>