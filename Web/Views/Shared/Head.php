<?php
$protocol = isset ( $_SERVER ['HTTPS'] ) ? 'https' : 'http';
$port = $_SERVER ['SERVER_PORT'];
$defualtPort = ($port == 80 || $port == 443);
$urlPort = $defualtPort ? '' : ':' . $port;
$baseUrl = $protocol . '://' . $_SERVER ['SERVER_NAME'] . $urlPort . '/Web/';
?>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?= $baseUrl ?>Views/Shared/view.css"></link>
<script
	src="<?= $baseUrl ?>Libraries/Dependencies/JQuery/jquery-2.1.3.js"></script>
<script
	src="<?= $baseUrl ?>Libraries/Dependencies/Knockout/knockout-3.2.0.debug.js"></script>
<script src="<?= $baseUrl ?>Libraries/Web/App/Data.js"></script>
<script src="<?= $baseUrl ?>Libraries/Web/App/UseCase.js"></script>
<script src="<?= $baseUrl ?>Views/Shared/ViewModel.js"></script>
<script>
Data.baseUrl = '<?= $baseUrl ?>';
</script>