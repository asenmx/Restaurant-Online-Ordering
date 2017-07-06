    <?php 
    if(isset($_POST['first_name'],$_POST['last_name'],$_POST['reservation_date'],$_POST['people_number'])){
$_POST['reservation_date']=$_POST['reservation_date']." ".$_POST['reservation_time'];


     
      
      $obj=(object)$_POST;


     
       $user->addReservation($obj);

    }
    ?>
    <div id="reservation" class="light-wrapper">
        <section class="ss-style-top"></section>
        <div class="container inner">
            <h2 class="section-title text-center">Резервация</h2>
     
            <div class="row">
                <div class="col-md-6">
                    <form class="form form-table" method="post" >
                        <div class="form-group">
                            <h4>Резервация (За да резервирате маса моля попълнете всички полета.)</h4>
                        </div>

                        <div class="row">
                          <div class="col-lg-6 col-md-6 form-group">
                            <label class="sr-only" for="Първо име"> 
                            Име:</label>
		<span>Име</span>
                            <input class="form-control hint" type="text" id="first_name1" name="first_name" placeholder="Име" required="">
			
                          </div>
                          <div class="col-lg-6 col-md-6 form-group">
                            <label class="sr-only" for="Фамилия">Фамилия:</label>
		<span>Фамилия</span>
                            <input class="form-control hint" type="text" id="last_name1" name="last_name" placeholder="Фамилия" required="">
					
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-md-6 form-group">
                            <label class="sr-only" for="Емайл">Емайл</label>
<span>Дата на резервация</span>	
                            <input class="form-control hint" type="date" id="email1" name="reservation_date"  required="">
					
                          </div>
				   
				<div class="col-md-6 col-lg-6 form-group">
					<span>Час на резервация</span>
				<input class="form-control hint" type="time" name="reservation_time" required=""/>
					
			</div>
    				 <div class="col-lg-6 col-md-6 form-group">
	<span>Брой на гостите</span>
                      <input type="number" class="form-control hint" placeholder="Брой на гостите" min="1" name="people_number">
						
                          </div>
                          <div class="col-lg-6 col-md-6 form-group">
                            <label class="sr-only" for="Телефон">Телефон</label>
	<span>Телефон</span>	
                            <input class="form-control hint" type="text" id="phone1" name="phone" placeholder="Телефон" required="">
					
                          </div>
                        </div>
                   
                       
                        <div class="row">
                     
                        </div><br/>
                        <div class="row">

                          <div class="col-lg-12 col-md-12">
                            <button type="submit" class="btn btn-danger btn-lg">Изпрати!</button>
                          </div>
                        </div>
                      </form>
                </div><!-- col-md-6 -->
                <div class="col-md-5 col-md-offset-1">
                    
              

                    <h3><i class="fa fa-map-marker fa-fw"></i>Къде да ни намерите</h3>
                    <p>Благоевград Алеко Константинов </p>

                    <h3><i class="fa fa-mobile fa-fw"></i>Контакти</h3>
                    <p>Eмaйл: <a href="mailto:dabicata@gmail.com">dabicata@gmail.com</a></p>
                    <p>Телфон: +359894634013</p>

                </div><!-- col-md-6 -->
            </div>
            <!-- /.services --> 
        </div>
        <!-- /.container -->

    </div><!-- #reservation -->
