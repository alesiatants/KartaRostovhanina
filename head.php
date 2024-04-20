<?php

include 'mainfunction.php';
$session = new Session();
if(!$session->checkSessiondop('user',"login") && isset($_COOKIE['login'])){
	$session->setSessiondop('user','login',$_COOKIE['login']);
	//$_SESSION['user']['login']=$_COOKIE['login'];
}
if(!$session->checkSessiondop('user',"password") && isset($_COOKIE['password'])){
	$session->setSessiondop('user','password',$_COOKIE['password']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Админ панель</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


	<script src="https://kit.fontawesome.com/890a250b1c.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Platypi:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">Карта Ростовчанина</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0 justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="culture.php">Культура</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="news.php">Новости</a>
        </li>
				<?php if(isset($_SESSION['user']['login'])){?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Льготы
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="event_lgota.php">Мероприятия</a></li>
            <li><a class="dropdown-item" href="magazin_lgota.php">Сервисы</a></li>
          </ul>
        </li><?php } ?>
				<li class="nav-item">
          <a class="nav-link" href="health.php">Здоровье</a>
        </li>
				<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            О проекте
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="about_project.php#about">Главное</a></li>
            <li><a class="dropdown-item" href="about_project.php#klient">Типы держателей</a></li>
						<li><a class="dropdown-item" href="about_project.php#skidka">Скидки по карте</a></li>
          </ul>
        </li>

      </ul>
      <ul class="navbar-nav mb-lg-0 justify-content-end">
			<?php if(isset($_SESSION['user']['login'])){?>
			<li class="nav-item">
					<a class="nav-link" href="logout.php"><i style="color: #a020d1;" class="fa-solid fa-right-from-bracket fa-xl"></i></a>
				</li>
				<li class="nav-item">
				<?php } else{?>
					<a href="login.php" class="nav-link"><i style="color: #a020d1;" class="fa-solid fa-right-to-bracket fa-xl"></i></a>
				</li>
				<?php } if(isset($_SESSION['user']['login'])){?>
				<li class="nav-item">
				
					<a href="profile.php" class="nav-link"><i style="color: #a020d1;" class="fa-solid fa-user fa-xl"></i></a>
				</li>
				<?php } ?>
			</ul>
    </div>
  </div>
</nav>


