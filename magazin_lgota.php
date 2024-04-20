<?php
include("head.php");

$obj = new TServiceDicountViewer();
if(isset($_SESSION['user']['login'])){
?>

<div class="container">
	<h1 align="center">Льготы для Вас</h1>
	<div class="row">
		<?php  
 $disc = $obj->displayAll(); 
 foreach ($disc as $d) {
?>

	<div class="col-md-4 pb-4">
		<div class="card">
 
  <div class="card-body">
		<div class="row">
			<div class="col-md-7">
			<h5 class="card-title"><?php echo $d['name_magazin']?></h5>
			<p class="card-title">Cкидка <?php echo $d['discount']?> % на весь ассортимент</p>
			</div>
			<div class="col-md-5" align="center">
			<img src="<?php echo $d['photo']?>" alt="" width="100px" height="90px">
				</div>
		</div>
		
   
    
  </div>
</div>
		</div>
		<?php }?>
	</div>
</div>
<?php
}else{
	header("Location:login.php");
}
include("footer.php");
?>