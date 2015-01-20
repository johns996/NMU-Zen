<?php
session_start();
if(isset($_SESSION['hp_spanning_image'])){
	$image = $_SESSION['hp_spanning_image'];
}
else{
	$image = rand(1, 6);
	$_SESSION['hp_spanning_image'] = $image;	
}
?>
<div class="header-spanning-image image<?php echo $image; ?>">

</div>