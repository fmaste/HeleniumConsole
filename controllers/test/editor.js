jsMVC.controller.view.Class({
	className: "test.editor",
	parentName: ""
},function() {

	this.testName = null;
	this.aceEditor = null;

	this.init = function () {
		this.testName = jsMVC.utils.getUrlParameter("test");
	}

	this.onLoad = function () {
		this.get("/model/getTestCode.php", {test: this.testName}).done(this.process);
	}

	this.process = function (testCode) {
		jQuery("#editor").html(testCode);
		jsMVC.library.load("include/ace/ace.js", true);
		jsMVC.library.load("include/ace/theme-vibrant_ink.js", true);
		jsMVC.library.load("include/ace/mode-javascript.js", true);
		this.aceEditor = ace.edit("editor");
		this.aceEditor.setTheme("ace/theme/vibrant_ink");
		document.getElementById('editor').style.fontSize='12px';
		this.aceEditor.setHighlightActiveLine(true);
		this.aceEditor.setShowPrintMargin(false);
		this.aceEditor.setReadOnly(false);
		var JavaScriptMode = require("ace/mode/javascript").Mode;
		this.aceEditor.getSession().setMode(new JavaScriptMode());
		var line = jsMVC.utils.getUrlParameter("line") / 1;
		if (line > 0) {
			this.aceEditor.gotoLine(line);
		}
		var that = this;
		jQuery("#saveTestButton").click(function () {
			that.saveTest.call(that);
		});
	};

	this.saveTest = function () {
		var code = this.aceEditor.getSession().getValue();
		this.post("/model/saveTestCode.php", {
			test: this.testName, 
			code: code
		});
	};

});
