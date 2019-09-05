"use strict";




window.onload = function() {
	var rotatex = document.getElementById("rotatex");
	var rotatey = document.getElementById("rotatey");
	var rotatez = document.getElementById("rotatez");		
	var cube = document.getElementById("cube");	
	var front = document.getElementById("front");	 	
	var back = document.getElementById("back");
	var bottom = document.getElementById("bottom");	 	
	var left = document.getElementById("left");
	var right = document.getElementById("right");	 	
	var top = document.getElementById("top");	
	
	
	
	rotatex.onchange = moveCube;
	rotatey.onchange = moveCube;
	rotatez.onchange = moveCube;
	

	
	document.getElementById("insertFront").onclick = function(e) {
		document.getElementById("frontHTML").style.display = "block";
		document.getElementById("frontCSS").style.display = "block";		
		front.style.animation = "moveFront 4s forwards linear";
		document.getElementById("frontHTML").style.animation = "highlightMe 7s forwards linear";
		document.getElementById("frontCSS").style.animation = "highlightMe 7s forwards linear";	
		e.target.disabled = true;		
	};
	
	document.getElementById("insertBack").onclick = function(e) {
		document.getElementById("backHTML").style.display = "block";
		document.getElementById("backCSS").style.display = "block";		
		back.style.animation = "moveBack 4s forwards linear";
		document.getElementById("backHTML").style.animation = "highlightMe 7s forwards linear";
		document.getElementById("backCSS").style.animation = "highlightMe 7s forwards linear";			
		e.target.disabled = true;		
	};	
	
	document.getElementById("insertBottom").onclick = function(e) {		
		document.getElementById("bottomHTML").style.display = "block";
		document.getElementById("bottomCSS").style.display = "block";		
		bottom.style.animation = "moveBottom 4s forwards linear";
		document.getElementById("bottomHTML").style.animation = "highlightMe 7s forwards linear";
		document.getElementById("bottomCSS").style.animation = "highlightMe 7s forwards linear";		
		e.target.disabled = true;		
	};
	
	document.getElementById("insertLeft").onclick = function(e) {		
		document.getElementById("leftHTML").style.display = "block";
		document.getElementById("leftCSS").style.display = "block";		
		left.style.animation = "moveLeft 4s forwards linear";
		document.getElementById("leftHTML").style.animation = "highlightMe 7s forwards linear";
		document.getElementById("leftCSS").style.animation = "highlightMe 7s forwards linear";		
		e.target.disabled = true;		
	};	
	
	document.getElementById("insertRight").onclick = function(e) {		
		document.getElementById("rightHTML").style.display = "block";
		document.getElementById("rightCSS").style.display = "block";		
		right.style.animation = "moveRight 4s forwards linear";
		document.getElementById("rightHTML").style.animation = "highlightMe 7s forwards linear";
		document.getElementById("rightCSS").style.animation = "highlightMe 7s forwards linear";	
		e.target.disabled = true;		
	};
	
	document.getElementById("insertTop").onclick = function(e) {		
		document.getElementById("topHTML").style.display = "block";
		document.getElementById("topCSS").style.display = "block";		
		top.style.animation = "moveTop 4s forwards linear";
		document.getElementById("topHTML").style.animation = "highlightMe 7s forwards linear";
		document.getElementById("topCSS").style.animation = "highlightMe 7s forwards linear";		
		e.target.disabled = true;		
	};	
	
	
	
	function moveCube() {		
		cube.style.transform = "rotateX(" + rotatex.value + "deg) rotateY(" + rotatey.value + "deg) rotateZ(" + rotatez.value + "deg)";
		document.getElementById("cubeTranscode").textContent = cube.style.transform;
	}

	

};