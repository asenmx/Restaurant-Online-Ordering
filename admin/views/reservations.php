	<?php
ini_set("display_errors","on");
error_reporting(1);
	$reservations=$admin->getAllReservations();
		if(isset($_GET["action"])&&$_GET["action"]=="reserve"){
		$id=$_GET["id"];
		$admin->reserveTable($id);

	}
			if(isset($_GET["action"])&&$_GET["action"]=="delete"){
		$id=$_GET["id"];
		$admin->deleteReservation($id);

	}
	
	?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	
		
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Резервации
			</h2>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">

					
					<div class="panel-body">
					
						<table data-toggle="table"    data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr> <th data-field="datetime" data-sortable="true">Дата и час</th>
						  						        <th data-field="name" data-sortable="true">Име</th>
						  						         <th data-field="phone" data-sortable="true">Телефон</th>
						  						          <th data-field="number" data-sortable="true">Брой гости</th>
						  						          <th>Статус</th>
						  						           <th></th>

						  						       
						       
						     
						      
						    </tr>
						    </thead>
						    <tbody>
						    <?php foreach($reservations as $ad){ ?>
						    <tr>
						    <td><?php echo substr($ad->reservation_date,0,16); ?></td>
						    <td> <?php echo $ad->first_name." ".$ad->last_name; ?></td>
						    <td> <?php echo $ad->phone; ?></td>
						    <td> <?php echo $ad->people_number; ?></td>
						    <td>
						    <?php if($ad->status==0){ ?>
						    	<label class="label label-warning">Изчакване</label>
						
						    <?php }else{ ?>
					<label class="label label-success">Резервиран</label>

						    <?php } ?></td>

						    <td>
						    <?php if($ad->status==0){ ?>
						        <a href="index.php?page=reservations&action=reserve&id=<?php echo $ad->id; ?>"><button class="btn btn-success" >Резервирай</button></a>
						        <?php } ?>

						         <a href="index.php?page=reservations&action=delete&id=<?php echo $ad->id; ?>"><button class="btn btn-danger" >Изтрий</button></a>
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
