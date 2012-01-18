jsMVC.controller.page.Class({
	className: "edit"
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
		jsMVC.render(this.view, "edit");
	}

});
