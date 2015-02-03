var UseCaseTest = {};

UseCaseTest.originalAjax = null;

UseCaseTest.originalBaseUrl = null;

UseCaseTest.calledOptions = null;

UseCaseTest.ajaxSpy = function(options) {
	UseCaseTest.calledOptions = options;
}

QUnit.module("UseCase", {
	setup : function() {
		UseCaseTest.originalAjax = $.ajax;
		UseCaseTest.originalBaseUrl = Data.baseUrl;
		$.ajax = UseCaseTest.ajaxSpy;
	},
	teardown : function() {
		$.ajax = UseCaseTest.originalAjax;
		Data.baseUrl = UseCaseTest.originalBaseUrl;
	}
});

QUnit.test("sends request", function() {
	Data.baseUrl = 'http://baseUrl/';
	var expectedUseCaseName = 'useCaseName';
	var expectedTransactionName = 'transactionName';
	var expectedArgs = {
		argumentName : 'argumentValue'
	};
	var sut = new UseCase(expectedUseCaseName, expectedTransactionName,
			expectedArgs);

	sut.execute();

	var calledOptions = UseCaseTest.calledOptions;
	strictEqual(calledOptions.type, 'POST');
	var expectedUrl = 'http://baseUrl/Controllers/UseCaseController.php';
	strictEqual(calledOptions.url, expectedUrl);
	var expectedData = JSON.stringify({
		useCaseName : expectedUseCaseName,
		transactionName : expectedTransactionName,
		args : expectedArgs
	});
	strictEqual(calledOptions.data, expectedData);
	ok(calledOptions.async);
	strictEqual(calledOptions.contentType, "application/json; charset=utf-8");
	strictEqual(calledOptions.dataType, "json");
});

QUnit.test("calls view model actions", function() {
	var expectedActions = [ {
		name : 'actionName',
		args : {
			argumentName : 'argumentValue'
		}
	} ];
	var calledActions = null;
	var sut = new UseCase();
	sut.viewModel = {
		callActions : function(actions) {
			calledActions = actions;
		}
	};

	sut.execute();
	UseCaseTest.calledOptions.success(expectedActions);

	deepEqual(calledActions, expectedActions);
});