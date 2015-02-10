<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap-combined.min.css"/>
    <script  src="bootstrap.min.js"></script>
</head>
<body>
	<br>
	<!-- Signup -->
	<div class="modal" style="position:relative;">
		<div class="modal-header">
			<h3>Sign up</h3>
		</div>
		<form name="form" method="POST" action="signup.php">
		<div class="modal-body">
			
				<input type="email" placeholder="Email" name="username"><br />
				<input type="password" placeholder="Password" name="password"><br />
		
		</div>
		<div class="modal-footer">
				<input type="submit" value="submit" class="btn btn-primary">
		</div>
		</form>
	</div>
	<hr>
	<!-- Login -->
	<div class="modal" style="position:relative;">
		<div class="modal-header">
			<h3>Login</h3>
		</div>
		<form name="form" method="POST" action="login.php">
		<div class="modal-body">
			
				<input type="email" placeholder="Email" name="username"><br />
				<input type="password" placeholder="Password" name="password"><br />
		
		</div>
		<div class="modal-footer">
				<input type="submit" value="submit" class="btn btn-primary">
		</div>
		</form>
	</div>
			

</body>
</html>