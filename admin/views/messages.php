	<?php
$messages=$admin->getAllMessages();


	
	if(isset($_GET["action"])&&$_GET["action"]=="delete"){
		$id=$_GET["id"];

		
	$admin->deleteMEssage($id);

	}
	?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	
		
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Messages
					</h2>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">

					
					<div class="panel-body">
			
						<table data-toggle="table"    data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						  						        <th data-field="name" data-sortable="true">Nom</th>
						  						        <th data-field="email" data-sortable="true">Email</th>
						  						        <th data-field="telephone" data-sortable="true">Telephone</th>
						        <th data-field="description"  data-sortable="true">message</th>

						   
						        <th>Action</th>
						    </tr>
						    </thead>
						    <tbody>
						    <?php foreach($messages as $message){ ?>
						    <tr>
						    <td> <?php echo $message->nom; ?></td>
						    <td> <?php echo $message->email; ?></td>
						    <td> <?php echo $message->telephone; ?></td>
						    <td ><div  onmouseleave="hide(<?php echo $message->id ; ?>)" style="word-break: break-all; display:none;"id="<?php echo $message->id; ?>">
						    <p >
						    <?php echo htmlentities($message->message); ?></p></div> <span onmouseenter="show(<?php echo $message->id ; ?>)" > <?php echo htmlentities(substr($message->message,0,20)); ?>...</span></td>
						    <td>
						 
						    	<a href="index.php?page=messages&action=delete&id=<?php echo $message->id; ?>"><button class="btn btn-danger" >Supprimer</button></a>
						    	</td>
						    </tr>
						    <?php } ?>  
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	



		
		
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

