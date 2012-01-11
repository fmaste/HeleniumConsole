jsMVC.controller.application.Class({
	className: "main"
},function() {

	this.init = function () {
	}

	this.getTitle = function () {
		// This text will be used as page title.
		return "jsMVC";
	}

	this.getFavIcon = function () {
		// The file name of the favicon image.
		return "favicon.png";
	}

	this.getLanguageCode = function () {
		return "en-US";
	}

	this.getAvailableLanguageCodes = function () {
		//TODO
	}

	this.onLoad = function () {
		jsMVC.render(this.view, "main", null, "main");
	}

});
