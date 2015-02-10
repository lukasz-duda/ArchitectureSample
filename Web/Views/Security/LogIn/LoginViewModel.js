LoginViewModel.prototype = new ViewModel();
LoginViewModel.constructor = LoginViewModel;

function LoginViewModel() {
	var me = this;

	me.userName = ko.observable(null);
	me.password = ko.observable(null);

	me.logIn = function() {
		var args = {
			userName : me.userName(),
			password : me.password()
		};
		me.executeUseCase('LogIn', 'logIn', args);
	};

	me.showHomeView = function() {
		alert('Successful login.');
	};
};

var viewModel = new LoginViewModel();
ko.applyBindings(viewModel);