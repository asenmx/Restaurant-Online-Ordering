
	<?php

		$menus=$admin->getAllMenus();

	
	if(isset($_POST["name"])){
		$image_name=$_FILES["image"]["name"];
		$image=$_FILES["image"]["tmp_name"];
		$image_name=time().$image_name;
		move_uploaded_file($image, "../menus/".strtolower($image_name));
		$_POST["image"]=strtolower($image_name);
		
		$admin->addmenu($_POST);

	}
	if(isset($_GET["action"])&&$_GET["action"]=="delete"){
		$id=$_GET["id"];
		
		
	$admin->deletemenu($id);

	}
	?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	
		
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Меню</h2>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">

					
					<div class="panel-body">
					<button class="btn-lg btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Добави меню</button>
						<table data-toggle="table"    data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="Име" data-sort-order="desc">
						    <thead>
						    <tr>
						  						        <th data-field="Име" data-sortable="true">Име</th>
						           <th data-field="Описание"  data-sortable="true">Описание</th>
						        <th data-field="Снимка" data-sortable="true">Снимка</th>
						     
						         
						        <th></th>
						    </tr>
						    </thead>
						    <tbody>
						    <?php foreach($menus as $menu){ ?>
						    <tr>
						    <td> <?php echo $menu->name; ?></td>
						    <td ><div  onmouseleave="hide(<?php echo $menu->id ; ?>)" style="word-break: break-all; display:none;"id="<?php echo $menu->id; ?>">
						    00</div> <span <?php echo $menu->id ; ?> > <?php echo $menu->description; ?></span></td>
						    <td><img src="../menus/<?php echo $menu->image; ?>"width="50" height="50"/> </td>
						    <td>
						   
						    	
						    	
						    	<a href="index.php?page=menus&action=delete&id=<?php echo $menu->id; ?>"><button class="btn btn-danger" >Изтрий</button></a>
						    	</td>
						    </tr>
						    <?php } ?>  
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	


<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">

    <div class="modal-content">
        <form method="post" enctype="multipart/form-data">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  	<h2 class="modal-title">Добави меню</h2> 
  </div>
     <div class="modal-body">
   
       <div class="form-group">
       	<label>Име</label>
       	<input type="text" class="form-control" name="name" required="required">

       </div>
       <div class="form-group">
       	<label> Описание</label>
       	<textarea class="form-control" name="description"></textarea>
       </div>
       <div class="form-group">
       	<label>Снимки</label>
       	<input type="file" name="image" class="form-control" required="required">

       </div>


      
      </div>
      <div class="modal-footer">
        
        <input type="submit" class="btn btn-primary" value="Добави">
      </div>
      </form>
     
    </div>
  </div>
</div>
		
		
	</div><!--/.main-->
	<script>
function show(id){
	var dir=document.getElementById(id);
	dir.style.display="block";



}
function hide(id){
	var dir=document.getElementById(id);
	dir.style.display="none";

}
	</script>

