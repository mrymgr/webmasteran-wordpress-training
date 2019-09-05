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
	var allTiming = document.getElementById("allTiming");
	var allDelay = document.getElementById("allDelay");		
	var selectOpt = document.getElementById("selectOpt");
	var useBG = document.getElementById("useBG");
	var bgTime = document.getElementById("bgTime");	
	var bgTiming = document.getElementById("bgTiming");
	var bgDelay = document.getElementById("bgDelay");	
	var useLeft = document.getElementById("useLeft");
	var leftTime = document.getElementById("leftTime");	
	var leftTiming = document.getElementById("leftTiming");
	var leftDelay = document.getElementById("leftDelay");	
	var useWidthHeight = document.getElementById("useWidthHeight");
	var whTime = document.getElementById("whTime");
	var whTiming = document.getElementById("whTiming");
	var whDelay = document.getElementById("whDelay");	
	var useBR = document.getElementById("useBR");
	var brTime = document.getElementById("brTime");
	var brTiming = document.getElementById("brTiming");
	var brDelay = document.getElementById("brDelay");	

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
	allTiming.onchange = changeTransType3;	
	allDelay.onchange = changeTransType3;
	
	useBG.onclick = changeTransType;
	bgTime.onchange = changeTransType2;
	bgTiming.onchange = changeTransType4;	
	bgDelay.onchange = changeTransType5;
	
	useLeft.onclick = changeTransType;
	leftTime.onchange = changeTransType2;
	leftTiming.onchange = changeTransType4;	
	leftDelay.onchange = changeTransType5;	
	
	useWidthHeight.onclick = changeTransType;
	whTime.onchange = changeTransType2;
	whTiming.onchange = changeTransType4;	
	whDelay.onchange = changeTransType5;	
	
	useBR.onclick = changeTransType;
	brTime.onchange = changeTransType2;
	brTiming.onchange = changeTransType4;	
	brDelay.onchange = changeTransType5;	
	
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
	
	function changeTransType4(e) {
		e.target.previousElementSibling.previousElementSibling.previousElementSibling.checked = true;
		selectOpt.checked = true;
		applyTrans();
	}	
	
	function changeTransType5(e) {
		e.target.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.checked = true;
		selectOpt.checked = true;
		applyTrans();
	}		
	
	function applyTrans() {
		var transString = "";
		var transString2 = "";
		if (noOpt.checked) {
			transString = "none;";
			transString2 = "none";			
		} else if (allOpt.checked) {
			transString = "all " + allTime.value + "s " + allTiming.options[allTiming.selectedIndex].value + " " + allDelay.value + "s;";
			transString2 = "all " + allTime.value + "s " + allTiming.options[allTiming.selectedIndex].value + " " + allDelay.value + "s";			
		} else {
			if (useWidthHeight.checked) {transString += "width " + whTime.value + "s " + whTiming.options[whTiming.selectedIndex].value + " " + whDelay.value + "s, <br /> height " + whTime.value + "s " + whTiming.options[whTiming.selectedIndex].value + " " + whDelay.value + "s, <br />";}
			if (useLeft.checked) {transString += "left " + leftTime.value + "s " + leftTiming.options[leftTiming.selectedIndex].value + " " + leftDelay.value + "s, <br />";}			
			if (useBG.checked) {transString += "background-color " + bgTime.value + "s " + bgTiming.options[bgTiming.selectedIndex].value + " " + bgDelay.value + "s, <br />";}
			if (useBR.checked) {transString += "border-radius " + brTime.value + "s " + brTiming.options[brTiming.selectedIndex].value + " " + brDelay.value + "s, <br />";}

			if (useWidthHeight.checked) {transString2 += "width " + whTime.value + "s " + whTiming.options[whTiming.selectedIndex].value + " " + whDelay.value + "s, height " + whTime.value + "s " + whTiming.options[whTiming.selectedIndex].value + " " + whDelay.value + "s, ";}
			if (useLeft.checked) {transString2 += "left " + leftTime.value + "s " + leftTiming.options[leftTiming.selectedIndex].value + " " + leftDelay.value + "s, ";}			
			if (useBG.checked) {transString2 += "background-color " + bgTime.value + "s " + bgTiming.options[bgTiming.selectedIndex].value + " " + bgDelay.value + "s, ";}		
			if (useBR.checked) {transString2 += "border-radius " + brTime.value + "s " + brTiming.options[brTiming.selectedIndex].value + " " + brDelay.value + "s, ";}
			
			var commaIndex = transString.lastIndexOf(",");
			var commaIndex2 = transString2.lastIndexOf(",");			
			transString = transString.substring(0, commaIndex) + ";";
			transString2 = transString2.substring(0, commaIndex2);			
		}
		var initRule = document.styleSheets[0].cssRules[0];
		initRule.style.transition = transString2;
		transCode.innerHTML = transString;
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