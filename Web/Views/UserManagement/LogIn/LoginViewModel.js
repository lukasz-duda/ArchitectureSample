LoginViewModel.prototype = new ViewModel();
LoginViewModel.constructor = LoginViewModel;

function LoginViewModel() {
	var me = this;

	me.userName = ko.observable();

	me.logIn = function() {
		var args = {
			userName : me.userName()
		};
		me.executeUseCase('LogIn', 'logIn', args);
	};

	me.showHomeView = function() {
		alert('Successful login.');
	};
};

var viewModel = new LoginViewModel();
ko.applyBindings(viewModel);