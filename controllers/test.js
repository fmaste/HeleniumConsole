jsMVC.controller.view.Class({
	className: "test",
	parentName: ""
},function() {

	var tesName = null;
	var environments = null;

	this.init = function (testNameP, environmentsP) {
		testName = testNameP;
		environments = environmentsP;
	}

	this.onLoad = function () {
		var href = "/edit.php?test=" + testName;
		this.view.find("a").html(testName).attr("href", href);
		for (var key in environments) {
			var environment = environments[key];
			var appended = jQuery('<li class="eachColumn"></li>').
				appendTo(this.view);
			jsMVC.render(
				appended, 
				"environment", 
				null,
				"environment", 
				[testName, key, environment.name]
			);
		}
	}

});
