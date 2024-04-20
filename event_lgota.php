<?php
include("head.php");


$obj = new TMeropriatieViewer();
$dostoprem = $obj->displayAll();
?>
<div class="containern logreg">
	<div class="row">
<?php foreach($dostoprem as $d){?>
<div class="col-md-6">
	<div class="card mb-5" style="width: 20rem;">
  <img src="<?php echo $d['img_event']?>" class="card-img-top" alt="..." height="200px">
  <div class="card-body">
    <h5 class="card-title"><?php echo $d['title_event']?></h5>
    <p class=""><?php echo substr($d['content_event'],0,350)?>...</p>
		<p class="card-text"><?php echo $d['adress_event']?></p>
		<p class="card-text"><?php echo $d['price_event']?></p>
    <a href="<?php echo $d['geol_or_web_event']?>" class="btn btn-primary">Подробнее</a>
  </div>
	</div>
	</div>

<?php } ?>

</div>
</div>


<?php
include("footer.php");
?>