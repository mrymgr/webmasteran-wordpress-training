"use strict";




window.onload = function() {
	var c1 = document.getElementById("stepCanvas1");
	var c2 = document.getElementById("stepCanvas2");
	var c3 = document.getElementById("stepCanvas3");	
	var c4 = document.getElementById("stepCanvas4");	
	var ctx1 = c1.getContext("2d");
	var ctx2 = c2.getContext("2d");	
	var ctx3 = c3.getContext("2d");
	var ctx4 = c4.getContext("2d");		
	var c1b = document.getElementById("stepCanvas1b");
	var c2b = document.getElementById("stepCanvas2b");
	var c3b = document.getElementById("stepCanvas3b");	
	var c4b = document.getElementById("stepCanvas4b");	
	var ctx1b = c1b.getContext("2d");
	var ctx2b = c2b.getContext("2d");	
	var ctx3b = c3b.getContext("2d");
	var ctx4b = c4b.getContext("2d");		
	
	drawSteps(c1, ctx1, 1, "start", 50);
	drawSteps(c1b, ctx1b, 1, "start", 60);
	drawSteps(c2, ctx2, 1, "end", 50);
	drawSteps(c2b, ctx2b, 1, "end", 60);	
	drawSteps(c3, ctx3, 4, "start", 50);
	drawSteps(c3b, ctx3b, 4, "start", 60);
	drawSteps(c4, ctx4, 4, "end", 50);
	drawSteps(c4b, ctx4b, 4, "end", 60);		
	
	document.getElementById("stepCount3").onchange = function(e) {
		drawSteps(c3, ctx3, e.target.value*1, "start", 50);
		drawSteps(c3b, ctx3b, e.target.value*1, "start", 60);
		document.getElementById("cubicCode3").textContent = "steps(" + e.target.value + ", start)";
		var stepRule = document.styleSheets[0].cssRules[3];
		stepRule.style.transitionTimingFunction = "steps("+e.target.value+", start)";	
	};
	document.getElementById("stepCount4").onchange = function(e) {
		drawSteps(c4, ctx4, e.target.value*1, "end", 50);
		drawSteps(c4b, ctx4b, e.target.value*1, "end", 60);
		document.getElementById("cubicCode4").textContent = "steps(" + e.target.value + ", end)";
		var stepRule = document.styleSheets[0].cssRules[4];
		stepRule.style.transitionTimingFunction = "steps("+e.target.value+", end)";		
	};	
	
	document.getElementById("duration").onchange = function(e) {
		var initRule = document.styleSheets[0].cssRules[0];
		initRule.style.transitionDuration = e.target.value + "s";		
	
		document.getElementById("Code1").textContent = "left border-radius filter " + e.target.value + "s";
		document.getElementById("Code2").textContent = "left border-radius filter " + e.target.value + "s";
		document.getElementById("Code3").textContent = "left border-radius filter " + e.target.value + "s";
		document.getElementById("Code4").textContent = "left border-radius filter " + e.target.value + "s";		
	};	

	function drawSteps(c, ctx, n, type, w) {
		ctx.clearRect(0, 0, c.width, c.height);				
		var gap = (w-20)/n;
		var xPos = 10;
		var yPos = w-10;
		ctx.lineWidth = 1.3;
		ctx.beginPath();
		ctx.moveTo(xPos, yPos);
		for (var i=1; i<= n; i++) {
			if (type === "start") {
				xPos=xPos;
				yPos -= gap;
				ctx.lineTo(xPos, yPos);
				ctx.stroke();
				xPos += gap;
				yPos = yPos;
				ctx.lineTo(xPos, yPos);
				ctx.stroke();			
			} else {
				xPos += gap;
				yPos = yPos;
				ctx.lineTo(xPos, yPos);
				ctx.stroke();				
				xPos=xPos;
				yPos -= gap;
				ctx.lineTo(xPos, yPos);
				ctx.stroke();				
			}
		}		
	}
/*	
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
*/
	
};