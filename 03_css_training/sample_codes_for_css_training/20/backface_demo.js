"use strict";




window.onload = function() {
	var rotatex = document.getElementById("rotatex");
	var rotatey = document.getElementById("rotatey");	
	var useBackface = document.getElementById("useBackface");		
	var card = document.getElementById("card");	
	var front = document.getElementById("front");	 	
	var back = document.getElementById("back");
	
	
	
	rotatex.onchange = transformImg;
	rotatey.onchange = transformImg;
	useBackface.onclick = function(e) {
		document.getElementById("showFrontBackface").style.display = "block";
		document.getElementById("showBackBackface").style.display = "block";
		document.getElementById("backBackcode").style.display = "inline";
		document.getElementById("backFrontcode").style.display = "inline";		
		if (e.target.checked === true) {
			front.style.backfaceVisibility = "visible";
			back.style.backfaceVisibility = "visible";			
		} else {
			front.style.backfaceVisibility = "hidden";
			back.style.backfaceVisibility = "hidden";			
		}
		
		document.getElementById("backFrontcode").textContent = "backface-visibility: " + front.style.backfaceVisibility;
		document.getElementById("backBackcode").textContent = "backface-visibility: " + back.style.backfaceVisibility;		
	};
	
	document.getElementById("insertFront").onclick = function(e) {
		document.getElementById("frontCodeStart").style.display = "block";
		document.getElementById("frontCSS").style.display = "block";	
		document.getElementById("showFrontBackface").style.display = "none";		
		front.style.animation = "moveFront 4s forwards linear";
		document.getElementById("frontCodeStart").style.animation = "highlightMe 7s forwards linear";
		document.getElementById("frontCSS").style.animation = "highlightMe 7s forwards linear";		
		e.target.disabled = true;		
	};
	
	document.getElementById("insertBack").onclick = function(e) {
		document.getElementById("backCodeStart").style.display = "block";
		document.getElementById("backCSS").style.display = "block";
		document.getElementById("showBackBackface").style.display = "none";			
		back.style.animation = "moveBack 8s forwards linear";
		document.getElementById("backCodeStart").style.animation = "highlightMe 7s forwards linear";
		document.getElementById("backCSS").style.animation = "highlightMe 7s forwards linear";			
		e.target.disabled = true;
		
	};	
	
	function transformImg() {		
		card.style.transform = "rotateX(" + rotatex.value + "deg) rotateY(" + rotatey.value + "deg)";		
        document.getElementById("cardTranscode").textContent = "rotateX(" + rotatex.value + "deg) rotateY(" + rotatey.value + "deg)";
	}

	

};