"use strict";




window.onload = function() {
	
	document.getElementById("duration").onchange = function(e) {
		var initRule = document.styleSheets[0].cssRules[0];
		initRule.style.transitionDuration = e.target.value + "s";		
	
		document.getElementById("Code1").textContent = "left border-radius filter " + e.target.value + "s ease";
		document.getElementById("Code2").textContent = "left border-radius filter " + e.target.value + "s linear";
		document.getElementById("Code3").textContent = "left border-radius filter " + e.target.value + "s ease-in";
		document.getElementById("Code4").textContent = "left border-radius filter " + e.target.value + "s ease-out";
		document.getElementById("Code5").textContent = "left border-radius filter " + e.target.value + "s ease-in-out";	
	};
};