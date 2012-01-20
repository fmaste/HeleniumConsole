jsMVC.controller.view.Class({
	className: "test.run",
	parentName: ""
},function() {

	var view = null;
	this.test = null;
	this.env = null;

	this.init = function (test, env) {
		this.test = test;
		this.env = env;
		this.runTest = jQuery.ajax("/model/runTest.php?test=" + test + "&env=" + env);
	}

	this.onLoad = function () {
		view = this.view;
		jQuery.when(this.runTest).done(this.process);
	}

	this.process = function (result) {
		view.html(result);
	}

});
