jsMVC.controller.view.Class({
	className: "main",
	parentName: ""
},function() {

	var getTests = null;
	var getTestEnvironments = null;

	this.init = function () {
		getTests = jQuery.ajax("/model/getTests.php");
		getTestEnvironments = jQuery.ajax("/model/getTestEnvironments.php");
	}

	this.onLoad = function () {
		getTests
		.done(function (tests) {
			getTestEnvironments.
			done(function (environments) {
				jsMVC.render(
					"#content", 
					"testsList", 
					null,
					"testsList", 
					[tests, environments]
				);
			}).fail(function () {
				alert("Failed to load the environments.");
			});
		}).fail(function () {
			alert("Failed to load the tests.");
		});
	}

});
