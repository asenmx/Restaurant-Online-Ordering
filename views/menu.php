<?php
$menus=$user->getAllMenus();
?>
<div id="food-menu" class="light-wrapper">
        <section class="ss-style-top"></section>
        <div class="container inner">
            <h2 class="section-title text-center">Меню</h2>
       

                  
                <?php foreach($menus as $m) { ?>


                    <a id="foodies" href="index.php?page=food&menu=<?php echo $m->id; ?>">
                <div class="col-sm-3 col-md-3">
                    <div class="menu-images ">
                    <img width="250" height="90" src="menus/<?php echo $m->image; ?>"></div>

                    <div class="menu-titles"><h1 class=""><?php echo $m->name; ?></h1></div>
                       <div class="menu-items ">
                     <p> <?php echo $m->description; ?></p>
                    </div>
                </div>
                </a>
                <?php } ?>


                
                
                
           
               
                
               
                
          
            
        </div>
        <!-- /.container -->
      
    </div><!--/#food-menu-->