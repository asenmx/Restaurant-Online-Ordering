<?php
class Admin{
	private $db;

	public function __construct(){
				try{
	$this->db=new PDO("mysql:host=localhost;dbname=food_store","root","test123");
		
	//******************дебъгване*********
	$this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e){
		die($e->getMessage());
	}
	}

//*******************админ******************************************//	
	public function login($data){
		$data["login"]=(isset($data["login"]))?$data["login"]:"";
		$data["password"]=(isset($data["password"]))?$data["password"]:"";


		foreach($data as $d){
			if(empty($d)){
				$error="<p style='color:red'> Грешно име или парола</p>";
				return $error;
			}

		}
		$login=htmlentities($data["login"]);
		$password=htmlentities($data["password"]);

		$query=$this->db->query("select * from admins where login='".$login."'");
		if(!$query->rowCount()){
			$error="<p style='color:red'>Грешно име или парола</p>";
				return $error;

		}

		$guest=$query->fetch(PDO::FETCH_OBJ);
		if(!password_verify($password,$guest->password)){
				$error="<p style='color:red'>Грешно име или парола<</p>";
				return $error;

		}
		
		$_SESSION["id"]=$guest->id;
		$_SESSION["login"]=$guest->login;
		$_SESSION["password"]=$guest->password;
		echo"<script>location.href='index.php'; </script>";


	}
	public function getAllAdmins(){
		$query=$this->db->query("select * from admins");
		$admins=$query->fetchAll(PDO::FETCH_OBJ);
		return $admins;
	}
	public function addAdmin($data){
		if($this->db->query("insert into admins (name,login,password)values('".$data['name']."','".$data['login']."','".password_hash($data['password'],PASSWORD_BCRYPT)."')")){
echo"<script>window.location.href='index.php?page=admins';
alert('Успешно добавен админ');</script>";
		

		}
		else{
			echo"<script>alert('Проблем при добавяне на админ')</script";
		}


	}
	public function deleteAdmin($id){
		if($this->db->query("delete from admins where id='".$id."'")){
echo"<script>window.location.href='index.php?page=admins';
alert('Успешно Изтрит админ');</script>";
		

		}
		else{
			echo"<script>alert('Проблем при изтриване на админ')</script";

		}
	}

	//*******************************храна*****************************//

	public function getAllFoods(){
		$query=$this->db->query("select * from foods order by id desc");
		$foods=$query->fetchAll(PDO::FETCH_OBJ);
		return $foods;
	}


	public function deleteFood($id){
		$row=$this->db->query("select * from foods where id='".$id."'");
		$row=$row->fetch(PDO::FETCH_OBJ);

		$image=($row->image!="")?$row->image:null;
			if($this->db->query("delete from foods where id='".$id."'")){
				
				@unlink("../foods/".$image);
			

				

				echo"<script>window.location.href='index.php?page=foods';
				alert('Успешно изтриване на храна');</script>";
			}
				
			
			else{
						echo"<script>window.location.href='index.php?page=foods';
						alert('Проблем при изтриване на храна');</script>";
						

			}
			

		
	
	
	
		 }

	public function addFood($data){
		if($this->db->query("insert into foods(name,image,description,price,category_id) values('".$data['name']."','".$data['image']."','".$data['description']."','".$data['price']."','".$data['categorie_id']."')")){
		
				

				echo"<script>window.location.href='index.php?page=foods';
				alert('Успешно добавяне на храна');</script>";
				
			}
			else{
						echo"<script>window.location.href='index.php?page=foods';
						alert('Проблем при добавяне на храна');</script>";
						

			}


	
}

	//*******************************меню*****************************//

	public function getAllMenus(){
		$query=$this->db->query("select * from categories order by id desc");
		$menus=$query->fetchAll(PDO::FETCH_OBJ);
		return $menus;
	}


	public function deleteMenu($id){
		$row=$this->db->query("select * from categories where id='".$id."'");
		$row=$row->fetch(PDO::FETCH_OBJ);

		$image=($row->image!="")?$row->image:null;
			if($this->db->query("delete from categories where id='".$id."'")){
				
				@unlink("../menus/".$image);
			

				

				echo"<script>window.location.href='index.php?page=menus';
				alert('Успешно изтриване на меню');</script>";
			}
				
			
			else{
						echo"<script>window.location.href='index.php?page=menus';
						alert('Проблем при изтриване на меню');</script>";
						

			}
			

		
	
	
	
		 }

	public function addMenu($data){
		if($this->db->query("insert into categories(name,image,description) values('".$data['name']."','".$data['image']."','".$data['description']."')")){
		
				

				echo"<script>window.location.href='index.php?page=menus';
				alert('Успешно добавяне на меню');</script>";
				
			}
			else{
						echo"<script>window.location.href='index.php?page=menus';
						alert('Проблем при изтриване на меню');</script>";
						

			}


	
}

//********************поръчки******************************//

public function getAllOrders(){
	$q=$this->db->query("select * from orders ");
	$orders=$q->fetchAll(PDO::FETCH_OBJ);


		
		foreach ($orders as $o) {
		
			$query=$this->db->query("select orders_foods.*,foods.name,foods.image from orders_foods inner join foods on orders_foods.food_id=foods.id  where orders_foods.order_id='".$o->id."' ");
	

		$o->ordered_food=$query->fetchAll(PDO::FETCH_OBJ);
	}
	
	
		return $orders;

}

public function deleteOrder($id){
	$q=$this->db->prepare("delete from orders where id=:id");
	if($q->execute([":id"=>$id])){
		echo"<script>window.location.href='index.php?page=orders';
						alert('Успешно изтриване на поръчка');</script>";

	}
	else{
		echo"<script>window.location.href='index.php?page=orders';
						alert('Проблем при изтриване на поръчка');</script>";
	}

}
public function deliverOrder($id){
	$q=$this->db->prepare("update orders set status=1 where id=?");
	
	if($q->execute([$id])){

echo"<script>window.location.href='index.php?page=orders';
						alert('Поръчката е маркирана като доставена');</script>";

	}
	else{
		echo"<script>window.location.href='index.php?page=orders';
						alert('Проблем при мариране на доставена поръчка');</script>";
	}

}

//****************************резервации****************************//
public function getAllReservations(){
	$q=$this->db->query("SELECT * FROM `reservations`");
	$reservations=$q->fetchAll(PDO::FETCH_OBJ);
	return $reservations;

	
	

}
public function reserveTable($id){
	if($this->db->query("update reservations set status=1 where id='".$id."'")) {
		echo"<script>window.location.replace('index.php?page=reservations'); alert('Масата е резервирана');</script>";
	} else{
		echo"<script>window.location.replace('index.php?page=reservations'); alert('Проблем при резервиране на маса');</script>";

	}
}
public function deleteReservation($id){
	if($this->db->query("delete from  reservations where id='".$id."'")) {
		echo"<script>window.location.replace('index.php?page=reservations'); alert('Успешно изтриване на резервация');</script>";
	} else{
		echo"<script>window.location.replace('index.php?page=reservations'); alert('Проблем при изтриване на резервация');</script>";

	}
}
//****************************статистика****************************//

public function getStats(){
	$stats=array();
	//orders
	$q=$this->db->query("select count(id) as count from orders");
	$stats['orders']=$q->fetchColumn();
	//reservations
		$q=$this->db->query("select count(id) as count from reservations where status =1");
	$stats['reservations']=$q->fetchColumn();

	//food
		$q=$this->db->query("select sum(orders_foods.quantity) as count from foods inner join orders_foods on foods.id=orders_foods.food_id inner join orders on orders_foods.order_id=orders.id and orders.status=1");
	$stats['foods']=$q->fetchColumn();

	//money
		$q=$this->db->query("select sum(price) as count from orders where status=1");
	$stats['money']=$q->fetchColumn();

	return $stats;



	
}


}
