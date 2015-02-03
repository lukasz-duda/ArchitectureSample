function UseCase(useCaseName, transactionName, args) {
	var me = this;

	me.useCaseArgs = {
		useCaseName : useCaseName,
		transactionName : transactionName,
		args : args
	}
}

UseCase.prototype.viewModel = null;

UseCase.prototype.execute = function() {
	var me = this;

	$.ajax({
		type : 'POST',
		url : Data.baseUrl + 'Controllers/UseCaseController.php',
		data : JSON.stringify(me.useCaseArgs),
		async : true,
		contentType : "application/json; charset=utf-8",
		dataType : "json",
		success : function(actions) {
			me.viewModel.callActions(actions);
		}
	});
}
