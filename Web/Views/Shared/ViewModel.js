function ViewModel() {
}

ViewModel.prototype.showWarning = function(message) {
	alert(message.text);
}

ViewModel.prototype.makeUseCase = function(useCaseName, transactionName, args) {
	return new UseCase(useCaseName, transactionName, args);
}

ViewModel.prototype.executeUseCase = function(useCaseName, transactionName,
		args) {
	var useCase = this.makeUseCase(useCaseName, transactionName, args);
	useCase.viewModel = this;
	useCase.execute();
}

ViewModel.prototype.callActions = function(actions) {
	for (var i = 0; i < actions.length; i++) {
		var actionName = actions[i].name;
		var args = actions[i].args;

		if (typeof this[actionName] == "function") {
			this[actionName](args);
		}
	}
}