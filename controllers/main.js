jsMVC.controller.view.Class({
	className: "main",
	parentName: ""
},function() {

	this.init = function () {
	}

	this.onLoad = function () {
		jsMVC.render(
			"#content", 
			"testsList", 
			null,
			"testsList", 
			[]
		);
	}

});
