jsMVC.controller.application.Class({
	className: "main"
},function() {

	this.init = function () {
	}

	this.styles = []

	this.pages = {
		"main": {
			"scheme": /http/,
			"domain": /.*/,
			"port": /.*/,
			"path": /^\/$/,
			"query": {},
			"fragment": /^$/
		},
		"edit": {
			"scheme": /http/,
			"domain": /.*/,
			"port": /.*/,
			"path": /\/edit.html/,
			"query": {
				"test": /.?/
			},
			"fragment": /.*/
		},
		"run": {
			"scheme": /http/,
			"domain": /.*/,
			"port": /.*/,
			"path": /\/run.html/,
			"query": {
				"test": /.?/,
				"env": /.?/
			},
			"fragment": /.*/
		}
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
