var ViewModelTest = {};

ViewModelTest.originalMakeUseCase = null;

ViewModelTest.calledUseCaseName = null;

ViewModelTest.calledTransactionName = null;

ViewModelTest.calledArgs = null;

ViewModelTest.useCase = null;

QUnit.module("ViewModelTest", {
	setup : function() {
		ViewModelTest.originalMakeUseCase = ViewModel.prototype.makeUseCase;
		ViewModel.prototype.makeUseCase = function(useCaseName,
				transactionName, args) {
			ViewModelTest.calledUseCaseName = useCaseName;
			ViewModelTest.calledTransactionName = transactionName;
			ViewModelTest.calledArgs = args;
			var useCase = {
				execute : function() {
				}
			};
			ViewModelTest.useCase = useCase;

			return useCase;
		}
	},
	teardown : function() {
		ViewModel.prototype.makeUseCase = ViewModelTest.originalMakeUseCase;
	}
});

TestViewModel.prototype = new ViewModel();
TestViewModel.constructor = TestViewModel;

function TestViewModel() {
	var me = this;

	me.action1Args = null;

	me.action1 = function(args) {
		me.action1Args = args;
	}

	me.action2Args = null;

	me.action2 = function(args) {
		me.action2Args = args;
	}
}

QUnit.test("allow view model to execute use case in its context", function() {
	var sut = new TestViewModel();
	var expectedArgs = {
		argumentName : 'argumentValue'
	};

	sut.executeUseCase('useCaseName', 'transactionName', expectedArgs);

	strictEqual(ViewModelTest.useCase.viewModel, sut);
	strictEqual(ViewModelTest.calledUseCaseName, 'useCaseName');
	strictEqual(ViewModelTest.calledTransactionName, 'transactionName');
	deepEqual(ViewModelTest.calledArgs, expectedArgs);
});

QUnit.test("can call it's actions", function() {
	var sut = new TestViewModel();
	var actions = [ {
		name : 'action1',
		args : {
			arg1 : 'arg1Value'
		}
	}, {
		name : 'action2',
		args : {
			arg2 : 'arg2Value'
		}
	} ];

	sut.callActions(actions);

	deepEqual(sut.action1Args, actions[0].args);
	deepEqual(sut.action2Args, actions[1].args);
});
