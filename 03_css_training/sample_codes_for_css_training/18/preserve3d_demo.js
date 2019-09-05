"use strict";




window.onload = function() {
	var rotatex = document.getElementById("rotatex");
	var rotatey = document.getElementById("rotatey");
	var rotatez = document.getElementById("rotatez");
	var rotatex2 = document.getElementById("rotatex2");
	var rotatey2 = document.getElementById("rotatey2");
	var rotatez2 = document.getElementById("rotatez2");	
	var tx2 = document.getElementById("tx2");
	var ty2 = document.getElementById("ty2");
	var tz2 = document.getElementById("tz2");	
		
	var container = document.getElementById("container");	
	var perspective = document.getElementById("perspective");
	var figure3d = document.getElementById("figure3d");	
	var tsflat = document.getElementById("tsflat");	
	var tspreserve = document.getElementById("tspreserve");	
	var useFn = document.getElementById("useFn");	
	var useP = document.getElementById("useP");		
	
	rotatex.onchange = transformContainer;
	rotatey.onchange = transformContainer;
	rotatez.onchange = transformContainer;	
	rotatex2.onchange = transformFigure;
	rotatey2.onchange = transformFigure;
	rotatez2.onchange = transformFigure;	
	tx2.onchange = transformFigure;
	ty2.onchange = transformFigure;
	tz2.onchange = transformFigure;	
	
	tsflat.onclick = function () {
		transformContainer();
	};
	tspreserve.onclick = function () {
		transformContainer();	
	};	
	
	useFn.onclick = function () {
		transformContainer();
	};
	useP.onclick = function () {
		transformContainer();	
	};	
	
	perspective.onchange = function() {
		transformContainer();	
	};
	
	document.getElementById("resetButton").onclick = function() {
		rotatex.value = "0"; rotatey.value = "0"; rotatez.value = "0";
		rotatex2.value = "0"; rotatey2.value = "0"; rotatez2.value = "0";		
		tx2.value = "0"; ty2.value = "0"; tz2.value = "0";		
		perspective.value = "1200";
		tsflat.checked = true;
		useFn.checked = true;
		transformContainer();
		transformFigure();		
	};
	function transformContainer() {
		if (useFn.checked === true) {
			container.style.transform = "perspective(" + perspective.value + "px) rotateX("+rotatex.value+"deg) rotateY("+rotatey.value+"deg) rotateZ("+rotatez.value+"deg)";
			container.style.perspective = "";
		} else {
			container.style.transform = "rotateX("+rotatex.value+"deg) rotateY("+rotatey.value+"deg) rotateZ("+rotatez.value+"deg)";
			container.style.perspective = perspective.value + "px";			
		}
		container.style.transformStyle = document.querySelector('input[name="ts"]:checked').value;	
		upDateCodeString();
	}
	
	
	function transformFigure() {
		figure3d.style.transform = "translate3d("+tx2.value+"px,"+ty2.value+"px,"+tz2.value+"px) rotateX("+rotatex2.value+"deg) rotateY("+rotatey2.value+"deg) rotateZ("+rotatez2.value+"deg)";	
		container.style.transformStyle = document.querySelector('input[name="ts"]:checked').value;
		upDateCodeString();
	}
	
	function upDateCodeString() {
		document.getElementById("containerTranscode1").textContent = container.style.transform;
		document.getElementById("containerTranscode2").textContent = container.style.transformStyle;
		if (useP.checked === true) {
			document.getElementById("showp").style.display = "block";
			document.getElementById("showp").textContent = "perspective: " + perspective.value + "px;";
		} else {
			document.getElementById("showp").style.display = "none";			
		} 	
		document.getElementById("imgTranscode").textContent = figure3d.style.transform;		
	}

};