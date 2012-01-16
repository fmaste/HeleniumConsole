jsMVC.controller.view.Class({
	className: "test",
	parentName: ""
},function() {

	this.testName = null;
	this.environments = null;

	this.init = function (testNameP, environmentsP) {
		this.testName = testNameP;
		this.environments = environmentsP;
	}

	this.onLoad = function () {
		var href = "/edit.html?test=" + this.testName;
		this.view.find("a").html(this.testName).attr("href", href);
		for (var key in this.environments) {
			var environment = this.environments[key];
			var appended = jQuery('<li class="eachColumn"></li>').
				appendTo(this.view);
			jsMVC.render(
				appended, 
				"environment", 
				null,
				"environment", 
				[this.testName, key, environment.name]
			);
		}
	}

});
