jsMVC.controller.view.Class({
	className: "test.editor",
	parentName: ""
},function() {

	var that = null;
	this.testName = null;
	this.getTestCode = null;
	this.aceEditor = null;

	this.init = function () {
		that = this;
		this.testName = jsMVC.utils.getUrlParameter("test");
		this.getTestCode = jQuery.ajax("/model/getTestCode.php?test=" + this.testName);
	}

	this.onLoad = function () {
		jQuery.when(this.getTestCode).done(this.process);
	}

	this.process = function (testCode) {
		jQuery("#editor").html(testCode);
		jsMVC.library.load("include/ace/ace.js", true);
		jsMVC.library.load("include/ace/theme-vibrant_ink.js", true);
		jsMVC.library.load("include/ace/mode-javascript.js", true);
		that.aceEditor = ace.edit("editor");
		that.aceEditor.setTheme("ace/theme/vibrant_ink");
		document.getElementById('editor').style.fontSize='12px';
		that.aceEditor.setHighlightActiveLine(true);
		that.aceEditor.setShowPrintMargin(false);
		that.aceEditor.setReadOnly(false);
		var JavaScriptMode = require("ace/mode/javascript").Mode;
		that.aceEditor.getSession().setMode(new JavaScriptMode());
		var line = jsMVC.utils.getUrlParameter("line") / 1;
		if (line > 0) {
			that.aceEditor.gotoLine(line);
		}
		jQuery("#saveTestButton").click(that.saveTest);
	};

	this.saveTest = function () {
		var code = that.aceEditor.getSession().getValue();
		jQuery.ajax("/model/saveTestCode.php", {
			data: {
				test: that.testName, 
				code: code
			}
		});
	};

});
