jsMVC.controller.application.Class({
	className: "main"
},function() {

	this.init = function () {
	}

	this.styles = []

	this.pages = [
		{
			"scheme": /http/,
			"domain": /.*/,
			"port": /.*/,
			"path": /\//,
			"query": /^$/,
			"fragment": /^$/,
			"page": "main"
		},
		{
			"scheme": /http/,
			"domain": /.*/,
			"port": /.*/,
			"path": /\/edit.html/,
			"query": /.*/,
			"fragment": /.*/,
			"page": "edit"
		}
	]

	this.getLanguageCode = function () {
		return "en-US";
	}

	this.getAvailableLanguageCodes = function () {
		//TODO
	}

	this.onLoad = function () {
	}

});
