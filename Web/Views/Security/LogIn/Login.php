<!DOCTYPE html>
<html>
<head>
<?php include("../../Shared/Head.php"); ?>
<title>Login</title>
</head>
<body>
	<label for="UserName">User</label>
	<input id="UserName" data-bind="value: userName, hasFocus: true" />
	<label for="Password">Password</label>
	<input id="Password" data-bind="value: password" />
	<input type="button" data-bind="click: logIn" value="Log in" />

	<script src="LoginViewModel.js"></script>
</body>
</html>
