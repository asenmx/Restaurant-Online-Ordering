<?php
$stats=$admin->getStats();

?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
	
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Stats</h1>
			</div>
		</div><!--/.ред-->
		<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-6">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-3 widget-left">
							<svg class="glyph stroked bag"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-9 widget-right">
							
							<div class="text-muted">Обща сума <?php echo $stats['money']; ?> лв </div>
						</div>
					</div>
				</div>
			</div>
			
				<div class="col-xs-12 col-md-6 col-lg-6">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-3 widget-left">
							<svg class="glyph stroked bag"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-9 widget-right">
							
							<div class="text-muted"><?php echo $stats['orders']; ?> Поръчки</div>
						</div>
					</div>
				</div>
			</div>
					<div class="col-xs-12 col-md-6 col-lg-6">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-3 widget-left">
							<svg class="glyph stroked bag"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-9 widget-right">
							
							<div class="text-muted"><?php echo $stats['reservations']; ?> Резервации</div>
						</div>
					</div>
				</div>
			</div>
					<div class="col-xs-12 col-md-6 col-lg-6">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-3 widget-left">
							<svg class="glyph stroked bag"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-9 widget-right">

							
							<div class="text-muted"><?php echo $stats['foods']; ?> Продукти</div>
						</div>
					</div>
				</div>
			</div>
					
				
			
				
				

				
					

		</div>
		
	
		

	</div>	<!--/.main-->

