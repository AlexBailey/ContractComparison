<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<meta charset="UTF-8">
	<title>Contract Finder 3000</title>
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<style type="text/css">
		body {
			background-color: #ffffff;
		}
	</style>
</head>

<?php

function getPreviousValue($option, $type){
	if(isset($_COOKIE[$type])){
		if($option == $_COOKIE[$type]){
			return "selected='selected'";
		}
	} elseif ($option == "default") {
		return "selected='selected'";
	}
}

if (isset($_POST["phone"]) == true) {
	$phoneCookieCreated = false;
	$contractCookieCreated = false;
	if ( setcookie("phone",$_POST["phone"],0) == true ){
		$phoneCookieCreated = true;
		$_COOKIE["phone"]=$_POST["phone"];
	}
	if ( setcookie("contract",$_POST["contract"],0) == true ){
		$contractCookieCreated = true;
		$_COOKIE["contract"]=$_POST["contract"];
	} 
	if ($phoneCookieCreated == false or $contractCookieCreated == false){
		echo "ERROR: Cookies couldn't be created";
	}
}
?>

<body>
	<h1>Contract finder 3000</h1>
	<h2>Select your desired phone and contract length,<br>and we will show you the best value tariffs available.</h2>

	<?php
	$error=false; 
	if(isset($_POST["phone"])){
		$format=".xml";
		$phone=$_POST["phone"];
		$contract=$_POST["contract"];
		if($phone!="default" and $contract!="default"){
			$page=$phone . $contract . $format;
			$relativePath=$_SERVER["PHP_SELF"];
			$fileNamePosition=strrpos($relativePath, "/");
			$relativePath=substr($relativePath, 0, $fileNamePosition);
			header("Location: " . $relativePath . "/phones/" . $page, true, 303);
		} 
		else {
			$error=true;
		}
	}
	?>

	<div class="form">
		<form class="index" action="index.php" method="post">
			<span>I want a</span>
			<select name="phone">
				<option value="default" <?php echo getPreviousValue("default", "phone")?> >...</option>
				<option value="iphone" <?php echo getPreviousValue("iphone", "phone")?> >iPhone 6 Plus 128GB</option>
				<option value="samsung" <?php echo getPreviousValue("samsung", "phone")?> >Samsung Galaxy S5</option>
				<option value="nokia" <?php echo getPreviousValue("nokia", "phone")?> >Nokia Lumia 930</option>
				<option value="sony" <?php echo getPreviousValue("sony", "phone")?> >Sony Xperia Z3</option>
			</select>
			<span>on a</span>
			<select name="contract">
				<option value="default" <?php echo getPreviousValue("default", "contract")?> >...</option>
				<option value="12" <?php echo getPreviousValue("12", "contract")?> >12 Month</option>
				<option value="24" <?php echo getPreviousValue("24", "contract")?> >24 Month</option>
			</select>
			<span>contract,</span>
			<input type="submit" value="please">
			<span>.</span>
		</form>
		<span class="error">
			<?php
			if($error==true) {
				echo "Choose the phone and contract...";
			}
			?>
		</span>
	</div>

</body>
</html>