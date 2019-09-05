"use strict";




window.onload = function() {
	var xdeg = document.getElementById("xdeg");
	var ydeg = document.getElementById("ydeg");
	var zdeg = document.getElementById("zdeg");
	var quarter3 = document.getElementById("quarter3");
	var topview = document.getElementById("topview");
	var sideview = document.getElementById("sideview");
	var frontview = document.getElementById("frontview");
	var labels = document.getElementById("labels");
	var axes = document.getElementById("axes");
	var box = document.getElementById("box");
	var tbox = document.getElementById("tbox");
	var figure = document.getElementById("figure");	
	var cube = document.getElementById("cube");
	var axisLabels = document.getElementsByTagName("span");
	var faces = document.getElementsByClassName("face");
	var axisLines = document.getElementsByClassName("axis");
	var figure3d = document.getElementById("figure3d");	
	var outcome = document.getElementById("outcome");	
	var perspective = document.getElementById("perspective");		
	
	
	xdeg.onchange = rotateIt;
	ydeg.onchange = rotateIt;
	zdeg.onchange = rotateIt;	
	
	function rotateIt() {
		cube.style.transform = "rotateX("+xdeg.value+"deg) rotateY("+ydeg.value+"deg) rotateZ("+zdeg.value+"deg)";		
	}
	
	quarter3.onclick = function() {
		cube.style.transform = "rotateX(-24deg) rotateY(-40deg) rotateZ(0deg)";
		xdeg.value = -24;
		ydeg.value = -40;
		zdeg.value = 0;
	};
	
	frontview.onclick = function() {
		cube.style.transform = "rotateX(0deg) rotateY(0deg) rotateZ(0deg)";
		xdeg.value = 0;
		ydeg.value = 0;
		zdeg.value = 0;		
	};	
	
	topview.onclick = function() {
		cube.style.transform = "rotateX(-90deg) rotateY(0deg) rotateZ(0deg)";
		xdeg.value = -90;
		ydeg.value = 0;
		zdeg.value = 0;		
	};	
	
	sideview.onclick = function() {
		cube.style.transform = "rotateX(0deg) rotateY(-90deg) rotateZ(0deg)";
		xdeg.value = 0;
		ydeg.value = -90;
		zdeg.value = 0;		
	};	
	
	labels.onclick = function() {
		if (labels.checked) {
			for (var i=0; i<axisLabels.length; i++) {axisLabels[i].style.display = "block";}
		} else {
			for (var i=0; i<axisLabels.length; i++) {axisLabels[i].style.display = "none";}			
		}
	};
	
	axes.onclick = function() {
		if (axes.checked) {
			for (var i=0; i<axisLines.length; i++) {axisLines[i].style.display = "block";}
		} else {
			for (var i=0; i<axisLines.length; i++) {axisLines[i].style.display = "none";}			
		}
	};	
	
	box.onclick = function() {
		if (box.checked) {
			for (var i=0; i<faces.length; i++) {
				faces[i].style.border = "2px solid red";
				faces[i].style.backgroundColor = "rgba(255, 255, 255, 0.6)";
			}
		} else {
			for (var i=0; i<faces.length; i++) {
				faces[i].style.border = "2px solid transparent";
				faces[i].style.backgroundColor = "transparent";
			}			
		}
	};	
	
	tbox.onclick = function() {
		if (tbox.checked) {
			for (var i=0; i<faces.length; i++) {faces[i].style.backgroundColor = "rgba(255, 255, 255, 0.6)";}
		} else {
			for (var i=0; i<faces.length; i++) {faces[i].style.backgroundColor = "hsl(120, 30%, 90%)";}			
		}
	};
	
	figure.onclick = function() {
		if (figure.checked) {
			figure3d.style.display = "block";
		} else {
			figure3d.style.display = "none";	
		}
	};	
	
	perspective.onchange = function() {
		outcome.style.perspective = perspective.value + "px";
	}
	
};