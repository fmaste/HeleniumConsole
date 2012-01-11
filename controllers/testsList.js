jsMVC.controller.view.Class({
	className: "testsList",
	parentName: ""
},function() {

	this.getTests = null;
	this.getTestEnvironments = null;

	this.init = function () {
		this.getTests = jQuery.ajax("/model/getTests.php");
		this.getTestEnvironments = jQuery.ajax("/model/getTestEnvironments.php");
	}

	this.onLoad = function () {
		jQuery.when(this.getTests, this.getTestEnvironments).done(this.process);
	}

	this.process = function (tests, environments) {
		tests = tests[0];
		environments = environments[0];
		var i = 0;
		for (var key in tests) {
 			i++;
			var test = tests[key];
			var appended = jQuery('<li class="eachTest"></li>').
				appendTo(jQuery("#testList", this.view));
			if (i % 2) {
				appended.addClass("withbg");
			}
			appended = jQuery('<ul class="eachRow"></ul>').
				appendTo(appended);
			jsMVC.render(appended, "test", null, "test", [test, environments]);
                }
	}

});
