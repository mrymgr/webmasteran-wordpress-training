"use strict";




window.onload = function() {
   
	var bgColor1 = document.getElementById("bgColor1");
	var bgColor2 = document.getElementById("bgColor2");
	var leftVal1 = document.getElementById("leftVal1");
	var leftVal2 = document.getElementById("leftVal2");
	var size1 = document.getElementById("size1");
	var size2 = document.getElementById("size2");
	var bRadius1 = document.getElementById("bRadius1");	
	var bRadius2 = document.getElementById("bRadius2");
	var noOpt = document.getElementById("noOpt");	
	var allOpt = document.getElementById("allOpt");
	var allTime = document.getElementById("allTime");	
	var selectOpt = document.getElementById("selectOpt");
	var useBG = document.getElementById("useBG");
	var bgTime = document.getElementById("bgTime");	
	var useLeft = document.getElementById("useLeft");
	var leftTime = document.getElementById("leftTime");	
	var useWidthHeight = document.getElementById("useWidthHeight");
	var whTime = document.getElementById("whTime");	
	var useBR = document.getElementById("useBR");
	var brTime = document.getElementById("brTime");

	var BGCode1 = document.getElementById("BGCode1");
	var BGCode2 = document.getElementById("BGCode2");
	var leftCode1 = document.getElementById("leftCode1");
	var leftCode2 = document.getElementById("leftCode2");
	var widthCode1 = document.getElementById("widthCode1");
	var widthCode2 = document.getElementById("widthCode2");
	var heightCode1 = document.getElementById("heightCode1");
	var heightCode2 = document.getElementById("heightCode2");	
	var BRCode1 = document.getElementById("BRCode1");
	var BRCode2 = document.getElementById("BRCode2");
	
	var transCode = document.getElementById("transCode");	

	bgColor1.onchange = changeTrans;
	bgColor2.onchange = changeTrans;
	leftVal1.onchange = changeTrans;
	leftVal2.onchange = changeTrans;	
	size1.onchange = changeTrans;
	size2.onchange = changeTrans;	
	bRadius1.onchange = changeTrans;
	bRadius2.onchange = changeTrans;	
	
	noOpt.onclick = applyTrans;
	allOpt.onclick = applyTrans;
	selectOpt.onclick = changeTrans;
	allTime.onchange = changeTransType3;
	useBG.onclick = changeTransType;
	bgTime.onchange = changeTransType2;
	useLeft.onclick = changeTransType;
	leftTime.onchange = changeTransType2;
	useWidthHeight.onclick = changeTransType;
	whTime.onchange = changeTransType2;
	useBR.onclick = changeTransType;
	brTime.onchange = changeTransType2;	
	
	function changeTransType() {
		selectOpt.checked = true;
		applyTrans();
	}
	
	function changeTransType2(e) {
		e.target.previousElementSibling.previousElementSibling.checked = true;
		selectOpt.checked = true;
		applyTrans();
	}	
	
	function changeTransType3() {
		allOpt.checked = true;
		applyTrans();
	}	
	
	function applyTrans() {
		var transString = "";
		if (noOpt.checked) {
			transString = "none";
		} else if (allOpt.checked) {
			transString = "all " + allTime.value + "s";
		} else {
			if (useBG.checked) {transString += "background-color " + bgTime.value + "s, ";}
			if (useLeft.checked) {transString += "left " + leftTime.value + "s, ";}	
			if (useWidthHeight.checked) {transString += "width " + whTime.value + "s, height " + whTime.value + "s, ";}	
			if (useBR.checked) {transString += "border-radius " + brTime.value + "s, ";}
			if (transString.length > 0) {transString = transString.substring(0, transString.length-2);}
		}
		var initRule = document.styleSheets[0].cssRules[0];
		initRule.style.transition = transString;
		transCode.textContent = transString;
	}
	
	function changeTrans() {
		var initRule = document.styleSheets[0].cssRules[0];
		var endRule = document.styleSheets[0].cssRules[1];
		
		initRule.style.backgroundColor = hexToRGB(bgColor1.value);
		initRule.style.left = leftVal1.value + "px";
		initRule.style.width = size1.value + "px";
		initRule.style.height = size1.value + "px";
		initRule.style.borderRadius = bRadius1.value + "%";
		
		BGCode1.textContent = hexToRGB(bgColor1.value);
		leftCode1.textContent = leftVal1.value + "px";
		widthCode1.textContent = size1.value + "px";
		heightCode1.textContent = size1.value + "px";
		BRCode1.textContent = bRadius1.value + "%";
		
		endRule.style.backgroundColor = hexToRGB(bgColor2.value);
		endRule.style.left = leftVal2.value + "px";
		endRule.style.width = size2.value + "px";
		endRule.style.height = size2.value + "px";
		endRule.style.borderRadius = bRadius2.value + "%";
		
		BGCode2.textContent = hexToRGB(bgColor2.value);
		leftCode2.textContent = leftVal2.value + "px";
		widthCode2.textContent = size2.value + "px";
		heightCode2.textContent = size2.value + "px";
		BRCode2.textContent = bRadius2.value + "%";
		
		applyTrans();
		
	}
		
   function hexToRGB(hexc){
    var h = "0123456789ABCDEF";
    var hex = hexc.toUpperCase();
    var r = h.indexOf(hex[1])*16+h.indexOf(hex[2]);
    var g = h.indexOf(hex[3])*16+h.indexOf(hex[4]);
    var b = h.indexOf(hex[5])*16+h.indexOf(hex[6]);
      
	return "rgb("+r+", "+g+", "+b+")";
   } 		

};