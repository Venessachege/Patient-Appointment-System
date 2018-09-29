<!doctype html>
<html>
<head>
<title>Form</title>
<link href="<?= base_url('assets/css/styles.css')?>" rel="stylesheet">
<script src="<?= base_url('assets/js/jquery.js')?>"></script>
<script src="<?= base_url('assets/js/main.js')?>"></script>
</head>
<body>
<form action="#" method="post">
  <h2>Sign Up</h2>
       
		<p>
			<label for="Email" class="floatLabel">Email</label>
			<input id="Email" name="Email" type="text">
		</p>
		<p>
			<label for="password" class="floatLabel">Password</label>
			<input id="password" name="password" type="password">
			
		</p>
		
		<p>
			<input type="submit" value="Create My Account" id="submit">
		</p>
</form>
</body>
</html>