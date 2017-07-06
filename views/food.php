<?php
if(isset($_GET['menu'])) {
  $foods=$user->getAllFoods($_GET['menu']);
}

if(isset($_GET['foodId'],$_GET['quantity'],$_GET['price'],$_GET['name'],$_GET['image'])){
    $food=new stdClass();
    $food->id=$_GET['foodId'];
    $food->quantity=$_GET['quantity'];
    $food->price=$_GET['price']*$_GET['quantity'];
      $food->name=$_GET['name'];
        $food->image=$_GET['image'];
    $_SESSION['sum']+=$food->price;
    $exist=false;
    foreach($_SESSION['foods'] as $f){
        if($f->id==$food->id){
            $exist=true;
            $f->quantity+=$food->quantity;
            

        }
    }
if($exist!=true){
   if(array_push($_SESSION['foods'], $food)){
    die(json_encode("Added !"));
   }
   else{
    die(json_encode("Problem Adding to card"));
   }
}


}
?>
<div id="special-offser" class="parallax pricing">
        <div class="container inner">

            <h2 class="section-title text-center">Храна</h2>
    
            
            <div class="row">
            <?php foreach($foods as $f) { ?>

                <div class="col-md-6 col-sm-6">
                    
                    <div class="pricing-item">
                        
                        <a href="#"><img class="img-responsive img-thumbnail" src="foods/<?php echo $f->image; ?>" ></a>
                        
                        <div class="pricing-item-details">
                            
                            <h3><a href="#"><?php echo $f->name ; ?></a></h3>
                            
                            <p><?php echo $f->description ; ?></p>
                            
    <button class="btn btn-danger" onclick="addToCard(<?php echo "$f->id,$f->price,'$f->name','$f->image'"; ?>)" >Поръчай сега</button>
                            <div class="clearfix"></div>
                        </div>
                        <!--price tag-->
                        <span class="hot-tag br-red" style="font-size:14px;"><?php echo $f->price; ?>лв</span>
                        <div class="clearfix"></div>
                    </div>
                </div>
                
                <div class="clearfix visible-md"></div>
                <?php } ?>

                
                
            </div>

        </div>
        <!-- /.container --> 
    </div><!-- /#special-offser -->
    <div class="modal fade " id="cardModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Добави в количката</h4>
      </div>
      <div class="modal-body">

      <form>
      <div class="form-group">
          <label>Количество</label>
          <input type="number" name="quantity" class="form-control" id="quantity" required>
          <input type="hidden" value="" id="foodId">
          <input type="hidden" value="" id="price">
           <input type="hidden" value="" id="name">
          <input type="hidden" value="" id="image">
      </div>
      <div class="form-group">
   
      </div>
      </form>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Затвори</button>
        <button  class="btn btn-success" onclick="saveToCard()" >Добави в количката</button>
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
