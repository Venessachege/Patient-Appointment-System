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
			<label for="Email" class="floatLabel">Fullname</label>
			<input id="fname" name="fname" type="text">
		</p>
        <p>
			<label for="Email" class="floatLabel">Date of Birth</label>
			<input id="dob" name="dob" type="text">
		</p>
		<p>
			<label for="Email" class="floatLabel">Email</label>
			<input id="Email" name="Email" type="text">
		</p>
		<p>
			<label for="password" class="floatLabel">Password</label>
			<input id="password" name="password" type="password">
			<span>Enter a password longer than 8 characters</span>
		</p>
		<p>
			<label for="confirm_password" class="floatLabel">Confirm Password</label>
			<input id="confirm_password" name="confirm_password" type="password">
			<span>Your passwords do not match</span>
		</p>
		<p>
			<input type="submit" value="Create My Account" id="submit">
		</p>
</form>
</body>
</html>