jsMVC.controller.view.Class({
	className: "test.runLink",
	parentName: ""
},function() {

	var test = null;
	var environment = null;
	var environmentName = null

	this.init = function (testP, environmentP, environmentNameP) {
		test = testP;
		environment = environmentP;
		environmentName = environmentNameP;
	}

	this.onLoad = function () {
		var href = "/test.php?test=" + test +"&env=" + environment;
		this.view.find("a").html(environmentName).attr("href", href);
	}

});
