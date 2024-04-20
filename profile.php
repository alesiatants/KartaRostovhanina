<?php
include("head.php");
if(isset($_SESSION['user']['login'])){
$obj = new TUserFinder();
$types = new TTypeViewer();
$person = $obj->find_by_name_pass($_SESSION['user']['login'], $_SESSION['user']['password']);

$card = $obj->find_card_by_id_user($person['id']);

$type = $obj->displyaTypeByKlient($person['id']);
$photo = $obj->displyPhotoByKlient($person['id']);
if(isset($_POST['delete'])){
	$obj = new TProfileRepository();
	$obj->delete($person['id'],$session);
	
	
}
if(isset($_POST['update'])){
	$obj = new TProfileRepository();
	$obj->update($_POST,$session);
	
	
}

?>
<div class="container">
	<div class="card" style="width: 70rem;">
		<div class="card-body">
			
			<div class="row">
				<div class="col-md-7">
				
							<div class="card">
 								<div class="card-body paycard">
									<div class="row ps-4 pe-4">
										<div class="col-md-6">
											<div class="row pt-3 pb-3">
												<p class="card-text "><?php echo $card['num']?></p>
											</div>
											<div class="row pt-3 pb-3">
												<div class="col-md-6"><?php echo $card['day_k']?>/<?php echo $card['year_k']?></div>
													<div class="col-md-6"><?php echo $card['csv']?></div>
												</div>
											</div>
											<div class="col-md-6 pt-4 pb-4" align="center">
												<img src="./public/images/castle.png" alt="" width="140px", height="140px">
											</div>
										</div>
									</div>
								</div>
							
						</div>

		<div class="col-md-5">
			<table class="table">
				
				<tbody>
					<tr>
						<th scope="row">ФИО</th>
						<td><?php echo $person['fname']?> <?php echo $person['lname']?> <?php echo $person['surname']?></td>
						
					</tr>
					<tr>
						<th scope="row">Дата рождения</th>
						<td><?php echo $person['birtdate']?></td>
					</tr>
					<tr>
						<th scope="row">Снилс</th>
						<td><?php echo $person['snils']?></td>
					</tr>
					<tr>
						<th scope="row">Полис</th>
						<td><?php echo $person['oms']?></td>
					</tr>
					<tr>
						<th scope="row">Паспорт</th>
						<td><?php echo $person['seria']?> <?php $person['num']?> </td>
					</tr>
					<tr>
						<th scope="row">Телефон</th>
						<td><?php echo $person['phone']?></td>
					</tr>
					<tr>
						<th scope="row">Пароль</th>
						<td type="password"><?php echo $person['password_klient']?></td>
					</tr>
					<tr>
						<th scope="row">Тип льготы</th>
						<td><?php echo $type['type_benefits']?></td>
					</tr>
					<tr>
					<th scope="row">Документ</th>
						<td> <img src="data:image/jpg;base64, <?php echo base64_encode($photo['photo']) ?>" alt="" width="30px" height="30px"></td>
					
					</tr>
					
					
					
				</tbody>
			</table>
		</div>
		</div>
		<div class="row justify-content-end">
			<div class="col-md-4">
		<button type="button"  class="btn btn-danger btn-lg mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
			Обновить данные
		</button>
	</div>
	<form action="" method="POST">
	<div class="col-md-4">
		<button type="submit" name="delete" class="btn btn-danger btn-lg mt-2 mb-2">
			Удалить кабинет
		</button>
	</div>
	</form>
	</div>
	</div>
  
  
</div>
<!-- Button trigger modal -->


<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Обновите личный кабинет</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
				
	
				<div class="row">
					
						
<form action="" method="POST"  enctype="multipart/form-data">
<div class="form">
<div class="row">
	<div class="col-md-6">
	<div data-mdb-input-init class="form-outline mb-4">
	<input type="text" id="updateName"  name="updateName" class="form-control" value="<?php echo $person['fname']?>" />
	<label class="form-label" for="updateName">Имя</label>
</div>
	</div>
	<div class="col-md-6">
	<div data-mdb-input-init class="form-outline mb-4">
	<input type="text" id="updateLastName" name="updateLastName" class="form-control" value="<?php echo $person['lname']?>" />
	<label class="form-label" for="updateLastName">Отчество</label>
</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
	<div data-mdb-input-init class="form-outline mb-4">
	<input type="text" id="updateUsername" name="updateUsername" class="form-control" value="<?php echo $person['surname']?>"/>
	<label class="form-label" for="updateUsername">Фамилия</label>
</div>
	</div>
	<div class="col-md-6">
	<div data-mdb-input-init class="form-outline mb-4">
	<input type="email" id="updateEmail" name="updateEmail" class="form-control" value="<?php echo $person['email']?>"/>
	<label class="form-label" for="updateEmail">Почта</label>
</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
<div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="updateSnils" name="updateSnils" class="form-control" value="<?php echo $person['snils']?>"/>
        <label class="form-label" for="updateSnils">Снилс</label>
      </div>
	</div>
	<div class="col-md-6">
			<div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="updateOMS" name="updateOMS" class="form-control" value="<?php echo $person['oms']?>"/>
        <label class="form-label" for="updateOMS">Полис</label>
      </div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
	<div data-mdb-input-init class="form-outline mb-4">
	<input type="date" id="updateDate"  name="updateDate" class="form-control" value="<?php echo $person['birtdate']?>"/>
	<label class="form-label" for="updateDate">Дата рождения</label>
</div>
	</div>
	<div class="col-md-6">
	<div data-mdb-input-init class="form-outline mb-4">
	<input type="text" id="updateSeria" name="updateSeria" class="form-control" value="<?php echo $person['seria']?>"/>
	<label class="form-label" for="updateSeria">Серия паспорта</label>
</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
	<div data-mdb-input-init class="form-outline mb-4">
	<input type="text" id="updateNumber" name="updateNumber" class="form-control" value="<?php echo $person['num']?>"/>
	<label class="form-label" for="updateNumber">Номер паспорта</label>
</div>
	</div>
	<div class="col-md-6">
	<div data-mdb-input-init class="form-outline mb-4">
	<input type="password" id="updatePassword"  name="updatePassword" class="form-control" value=""/>
	<label class="form-label" for="updatePassword">Пароль</label>
</div>
	</div>
</div>


<div class="row">
	<div class="col-md-6">
	<div data-mdb-input-init class="form-outline mb-4">
<select class="form-select" aria-label="Default select example" name = "updatetype" >
<?php
			$k = 1;
			$g = $types->displayAll();
			foreach ($g as $t) {
				if($type['id']==$k){
  echo "<option value=".$k++." selected>".$t['type_benefits']."</option>";}else{
		echo "<option value=".$k++.">".$t['type_benefits']."</option>";
	}}

	  ?>
</select>
</div>
	</div>
	<div class="col-md-6">
	<div data-mdb-input-init class="form-outline mb-4">
	<input type="text" id="updatePhone" name="updatePhone" class="form-control" value="<?php echo $person['phone']?>"/>
	<label class="form-label" for="updatePhone">Телефон</label>
</div>
	</div>
	
</div>



<input type="hidden" value="<?php echo $person['id']?>" name="id_klient" />
	<button type="submit" name="update" class="btn btn-dange mb-4" style="color: white;">Обновить</button>
</form>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть окно</button>
        
      </div>
    </div>
  </div>
</div>
</div>
						
<?php
}else{
	header("Location:login.php");
}
include("footer.php");
?>
