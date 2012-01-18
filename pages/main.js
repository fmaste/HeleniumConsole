jsMVC.controller.page.Class({
	className: "main"
},function() {

	this.init = function () {
	}

	this.styles = ["main"]

	this.getTitle = function () {
		// This text will be used as page title.
		return "Mastellonium";
	}

	this.getFavIcon = function () {
		// The file name of the favicon image.
		return "favicon.png";
	}

	this.onLoad = function () {
		jsMVC.render(this.view, "main");
	}

});
