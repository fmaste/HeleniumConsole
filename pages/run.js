jsMVC.controller.page.Class({
	className: "run"
},function() {

	this.init = function () {
	}

	this.styles = []

	this.getTitle = function () {
		// This text will be used as page title.
		return "Mastellonium";
	}

	this.getFavIcon = function () {
		// The file name of the favicon image.
		return "favicon.png";
	}

	this.onLoad = function () {
		var test = jsMVC.utils.getUrlParameter("test");
		var env = jsMVC.utils.getUrlParameter("env");
		jsMVC.render(this.view, "test.run", null, "test.run", [test, env]);
	}

});
