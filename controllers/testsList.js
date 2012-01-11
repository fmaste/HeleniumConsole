jsMVC.controller.view.Class({
	className: "testsList",
	parentName: ""
},function() {

	var tests = null;
	var environments = null;

	this.init = function (testsP, environmentsP) {
		tests = testsP;
		environments = environmentsP; 
	}

	this.onLoad = function () {
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
			jsMVC.render(appended, "test", "test", [test, environments]);
		}
	}

});
