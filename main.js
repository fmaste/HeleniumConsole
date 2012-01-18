jsMVC.controller.application.Class({
	className: "main"
},function() {

	this.init = function () {
	}

	this.styles = ["index"]

	this.pages = [
		{
			"scheme": "http",
			"domain": "",
			"port": "",
			"path": "",
			"query": "",
			"fragment": "",
			"page": "main"
		},
		{
			"scheme": "http",
			"domain": "",
			"port": "",
			"path": "",
			"query": "",
			"fragment": "",
			"page": ""
		}
	]

	this.getPageName = function () {
		return "main";
	}

	this.getPageParams = function () {
		return [];
	}

	this.getLanguageCode = function () {
		return "en-US";
	}

	this.getAvailableLanguageCodes = function () {
		//TODO
	}

	this.onLoad = function () {
	}

});
