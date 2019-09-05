"use strict";




window.onload = function() {
	var rotatex = document.getElementById("rotatex");
	var rotatey = document.getElementById("rotatey");
	var rotatez = document.getElementById("rotatez");
	var tz = document.getElementById("tz");
	var useImgs	= document.getElementById("useImgs");
	var useCont	= document.getElementById("useCont");	
	var imgList = document.querySelectorAll("img.figs3d");
	var crosshair	= document.getElementById("crosshair");	
		
	var container = document.getElementById("container");	
	var perspective = document.getElementById("perspective");
	
	var posKey = document.getElementById("posKey");
	var posP = document.getElementById("posP");
	var hKeyword = document.getElementById("hKeyword");
	var vKeyword = document.getElementById("vKeyword");
	var hPos = document.getElementById("hPos");
	var vPos = document.getElementById("vPos"); 	
	
	
	rotatex.onchange = transformImg;
	rotatey.onchange = transformImg;
	rotatez.onchange = transformImg;	
	tz.onchange = transformImg;
	
	
	
	useImgs.onclick = transformImg;
	useCont.onclick = transformImg;
	
	perspective.onchange = function() {
		transformImg();	
	};
	
	document.getElementById("resetButton").onclick = function() {
		rotatex.value = "0"; rotatey.value = "0"; rotatez.value = "0";tz.value = "0";		
		perspective.value = "1200";
		transformImg();	
	};
	
   	hKeyword.onchange = defineOrigin;
   	vKeyword.onchange = defineOrigin;
	hPos.onchange = defineOrigin;
   	vPos.onchange = defineOrigin;	
	
	function defineOrigin(e) {
      var originString = "";

	    if ((e.target.id === "hKeyword") || (e.target.id === "vKeyword")) {
			posKey.checked = true;
		}

	   	if ((e.target.id === "hPos") || (e.target.id === "vPos")) {
			posP.checked = true;
		}

	   transformImg();
   }
	
	function transformImg() {
		var originString = "";
		if (posKey.checked) {
			var hKey = hKeyword.options[hKeyword.selectedIndex].value;
			var vKey = vKeyword.options[vKeyword.selectedIndex].value;
			originString += hKey + " " + vKey;
			switch (hKey) {
				case "left": crosshair.style.left="0px"; break;
				case "right": crosshair.style.left="575px"; break;
				case "center": crosshair.style.left="287.5px"; break;					
			}
			switch (vKey) {
				case "top": crosshair.style.top="0px"; break;
				case "bottom": crosshair.style.top="575px"; break;
				case "center": crosshair.style.top="287.5px"; break;					
			}
		} else {
			 originString += hPos.value + "% " + vPos.value + "%";
			 crosshair.style.left=hPos.value + "%";
			 crosshair.style.top=vPos.value + "%";			
		}
		
		if (useImgs.checked === true) {
			for (var i=0; i < imgList.length; i++) {
				imgList[i].style.transform = "perspective(" + perspective.value + "px) translateZ(" + tz.value +"px) rotateX("+rotatex.value+"deg) rotateY("+rotatey.value+"deg) rotateZ("+rotatez.value+"deg)";
				imgList[i].style.perspectiveOrigin = originString;
			}
			container.style.perspective = "";	
			container.style.perspectiveOrigin = "";
			
			document.getElementById("imagePOP").style.display = "block";
			document.getElementById("imgorigin").textContent = originString;			
			document.getElementById("imgTranscode").textContent = imgList[0].style.transform;
			document.getElementById("containerPOP").style.display = "none";
			document.getElementById("containerPP").style.display = "none";			
		} else {
			for (var i=0; i < imgList.length; i++) {
				imgList[i].style.transform = "translateZ(" + tz.value +"px) rotateX("+rotatex.value+"deg) rotateY("+rotatey.value+"deg) rotateZ("+rotatez.value+"deg)";
				imgList[i].style.perspectiveOrigin = "";
			}	
			document.getElementById("imgTranscode").textContent = imgList[0].style.transform;
			
			document.getElementById("imagePOP").style.display = "none";
			
			container.style.perspective = perspective.value + "px";	
			container.style.perspectiveOrigin = originString;			
			document.getElementById("containerPP").style.display = "block";
			document.getElementById("containerPOP").style.display = "block";			
			document.getElementById("pvalue").textContent = perspective.value + "px";
			document.getElementById("contorigin").textContent = originString;			
		}
	}

	

};