<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body {
			background-image: url(<?=URL_ROOT ."/img/backs.png";?>);
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>
<body>

	<form action="#">
		<h2>Setup Admin Account</h2>

		<input type="text" name="username" placeholder="Username">
		<input type="password" name="password" placeholder="password">
		<input type="password" name="cpassword" placeholder="password">

		<input type="submit" name="submit" value="Submit">
	</form>

</body>
</html>