<?php
include("head.php");
$enter_site=false;

$obj = new TTypeViewer();
$prof = new TProfileRepository();
if(isset($_SESSION['user']['login']) && isset($_SESSION['user']['password'])){
	header("Location: profile.php");
	die;
}
$errors =[];
if(isset($_POST['SignUp'])){
	
	$prof->insert($_POST,$session);
	
	
}
if(isset($_POST['LogIn'])){
	
	try{
		$r = new TProfileRepository();
		$enter_site = $r->login($_POST['loginName'],$_POST['loginPassword'],$_POST['loginCheck']=="on");
		/*$ob = new User($_POST['loginName'],md5($_POST['loginPassword']),$_POST['loginCheck']=="on", $session);
		$enter_site=$ob->login();*/
		
	//$enter_site=$mainObj->login($_POST['login'],md5($_POST['password']),$_POST['remember']=="on", $session);
if(!$enter_site){
	$errors[]="Неверный логин или пароль";
	
}else{
	header("Location: profile.php");
		die;
}/*}
else{
echo $_SESSION ['captcha']==$_POST ['captcha'] ;
$errors[]="Неверно введена капча";}*/

	}catch(Exception $ex){
	
			echo 'Выброшено исключение: ', $ex->getMessage(),"\n";
		}
	
	
}




?>
<?php
foreach($errors as $error):?>
<li><?=$error?></li>
<?php endforeach;?>

<div class="container logreg">
<ul class="nav nav-fill nav-tabs" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="fill-tab-0" data-bs-toggle="tab" href="#fill-tabpanel-0" role="tab" aria-controls="fill-tabpanel-0" aria-selected="true">Авторизоваться</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="fill-tab-1" data-bs-toggle="tab" href="#fill-tabpanel-1" role="tab" aria-controls="fill-tabpanel-1" aria-selected="false">Зарегистрироваться</a>
  </li>
</ul>
<div class="tab-content pt-5" id="tab-content">
  <div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0">
	<form method="POST">
      
	<div class="form">
      <!-- Email input -->
      <div data-mdb-input-init class="form-outline mb-4 text-center">
        <input type="text" id="loginName" name="loginName" class="form-control" />
        <label class="form-label" for="loginName"> Почта </label>
      </div>

      <!-- Password input -->
      <div data-mdb-input-init class="form-outline mb-4 text-center">
        <input type="password" id="loginPassword" name="loginPassword" class="form-control" />
        <label class="form-label" for="loginPassword">Пароль</label>
      </div>

      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
          <!-- Checkbox -->
          <div class="form-check mb-3 mb-md-0">
            <input class="form-check-input" type="checkbox" value="" id="loginCheck" name="loginCheck" checked />
            <label class="form-check-label" for="loginCheck"> Запомнить меня </label>
          </div>
        </div>

        <div class="col-md-6 d-flex justify-content-center">
          <!-- Simple link -->
          <a href="forgot.php">Забыли пароль</a>
        </div>
      </div>

      <!-- Submit button -->
      <button type="submit" name="LogIn" data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-primary btn-block mb-4">Войти</button>

      
	</div>
    </form>
	</div>
  <div class="tab-pane" id="fill-tabpanel-1" role="tabpanel" aria-labelledby="fill-tab-1">
	<form method="POST" enctype="multipart/form-data">
      <div class="form">

      <!-- Name input -->
      <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="registerName"  name="registerName" class="form-control"  required/>
        <label class="form-label" for="registerName">Имя</label>
      </div>

      <!-- Username input -->
      <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="registerLastName" name="registerLastName" class="form-control" required />
        <label class="form-label" for="registerLastName">Отчество</label>
      </div>
			<div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="registerUsername" name="registerUsername" class="form-control" required/>
        <label class="form-label" for="registerUsername">Фамилия</label>
      </div>
			<div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="registerSnils" name="registerSnils" class="form-control" />
        <label class="form-label" for="registerLastSnils">Снилс</label>
      </div>
			<div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="registerOMS" name="registerOMS" class="form-control" />
        <label class="form-label" for="registerOMS">Полис</label>
      </div>
      <!-- Email input -->
      <div data-mdb-input-init class="form-outline mb-4">
        <input type="email" id="registerEmail" name="registerEmail" class="form-control" />
        <label class="form-label" for="registerEmail">Почта</label>
      </div>
			<div data-mdb-input-init class="form-outline mb-4">
        <input type="date" id="registerDate"  name="registerDate" class="form-control"  required/>
        <label class="form-label" for="registerDate">Дата рождения</label>
      </div>
			<div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="registerSeria" name="registerSeria" class="form-control" required/>
        <label class="form-label" for="registerSeria">Серия паспорта</label>
      </div>
			<div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="registerNumber" name="registerNumber" class="form-control" required/>
        <label class="form-label" for="registerNumber">Номер паспорта</label>
      </div>
			<div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="registerPhone" name="registerPhone" class="form-control" required/>
        <label class="form-label" for="registerPhone">Телефон</label>
      </div>
      <!-- Password input -->
      <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" id="registerPassword"  name="registerPassword" class="form-control"  required/>
        <label class="form-label" for="registerPassword">Пароль</label>
      </div>
			<div data-mdb-input-init class="form-outline mb-4">
			<select class="form-select" aria-label="Default select example" name = "type"  required>
  <option disabled>Выберите тип льготы</option>
  <?php 
	$k=1;
          $type = $obj->displayAll();
          foreach ($type as $t) {
        
  echo "<option value=".$k++.">".$t['type_benefits']."</option>";
	 } ?>
</select>
			</div>
			<div data-mdb-input-init class="form-outline mb-4">
			<label class="form-label" for="customFile">Загрузите подтверждающий файл</label>
<input type="file" class="form-control" id="customFile" name="file_dock"  required/>
			</div>

     

     

      <!-- Submit button -->
      <button type="submit" name="SignUp" data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-primary btn-block mb-3">Зарегистрироваться</button>
    </form>
	</div>
</div>
</div>
</div>

<?php
include("footer.php");
?>