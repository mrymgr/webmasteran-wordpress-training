"use strict";




window.onload = function() {
	var x1 = document.getElementById("x1");
	var y1 = document.getElementById("y1");
	var x2 = document.getElementById("x2");
	var y2 = document.getElementById("y2");
	var c = document.getElementById("bezCanvas");
	var c2 = document.getElementById("bezCanvas2");	
	var ctx = c.getContext("2d");
	var ctx2 = c2.getContext("2d");	
	
	drawBCurve(x1.value, y1.value, x2.value, y2.value);
	
	document.getElementById("duration").onchange = function(e) {
		var initRule = document.styleSheets[0].cssRules[0];
		initRule.style.transitionDuration = e.target.value + "s";		
	
		document.getElementById("Code1").textContent = "left border-radius filter " + e.target.value + "s ease";
		document.getElementById("Code2").textContent = "left border-radius filter " + e.target.value + "s linear";
		document.getElementById("Code3").textContent = "left border-radius filter " + e.target.value + "s ease-in";
		document.getElementById("Code4").textContent = "left border-radius filter " + e.target.value + "s ease-out";
		document.getElementById("Code5").textContent = "left border-radius filter " + e.target.value + "s ease-in-out";	
		document.getElementById("Code6").textContent = "left border-radius filter " + e.target.value + "s";		
	};
	
	x1.onchange = function() {
		drawBCurve(x1.value, y1.value, x2.value, y2.value);
	};
	y1.onchange = function() {
		drawBCurve(x1.value, y1.value, x2.value, y2.value);
	};
	x2.onchange = function() {
		drawBCurve(x1.value, y1.value, x2.value, y2.value);
	};
	y2.onchange = function() {
		drawBCurve(x1.value, y1.value, x2.value, y2.value);
	};	
	function drawBCurve(x1val, y1val, x2val, y2val) {
		ctx.clearRect(0, 0, c.width, c.height);		
		ctx.beginPath();
		ctx.moveTo(10, 40);
		ctx.bezierCurveTo(10+x1val*30, 40-y1val*30, 10+x2val*30, 40-y2val*30, 40, 10);
		ctx.lineWidth = 1.3;
		ctx.stroke();	
		
		ctx2.clearRect(0, 0, c2.width, c2.height);		
		ctx2.beginPath();
		ctx2.moveTo(10, 50);
		ctx2.bezierCurveTo(10+x1val*40, 50-y1val*40, 10+x2val*40, 50-y2val*40, 50, 10);
		ctx2.lineWidth = 1.3;
		ctx2.stroke();	
		
		var BRule = document.styleSheets[0].cssRules[6];
		BRule.style.transitionTimingFunction = "cubic-bezier("+x1.value+","+y1.value+","+x2.value+","+y2.value+")";
		document.getElementById("cubicCode").textContent = "cubic-bezier("+x1.value+", "+y1.value+", "+x2.value+", "+y2.value+")";
	}

	
};