<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<?php include("../../Shared/Head.php"); ?>
</head>
<body>
	<div>
		<label for="UserName">User name</label> <input id="UserName"
			data-bind="value: userName" />
	</div>
	<button data-bind="click: logIn">Log in</button>

	<script src="LoginViewModel.js"></script>
</body>
</html>
