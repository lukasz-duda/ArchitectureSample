<?php $baseUrl = 'http://localhost/ArchitectureSample/Web/'?>
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