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
	
	var noOpt2 = document.getElementById("noOpt2");	
	var allOpt2 = document.getElementById("allOpt2");
	var allTime2 = document.getElementById("allTime2");
	var allTiming2 = document.getElementById("allTiming2");
	var allDelay2 = document.getElementById("allDelay2");		
	var selectOpt2 = document.getElementById("selectOpt2");
	var useBG2 = document.getElementById("useBG2");
	var bgTime2 = document.getElementById("bgTime2");	
	var bgTiming2 = document.getElementById("bgTiming2");
	var bgDelay2 = document.getElementById("bgDelay2");	
	var useLeft2 = document.getElementById("useLeft2");
	var leftTime2 = document.getElementById("leftTime2");	
	var leftTiming2 = document.getElementById("leftTiming2");
	var leftDelay2 = document.getElementById("leftDelay2");	
	var useWidthHeight2 = document.getElementById("useWidthHeight2");
	var whTime2 = document.getElementById("whTime2");
	var whTiming2 = document.getElementById("whTiming2");
	var whDelay2 = document.getElementById("whDelay2");	
	var useBR2 = document.getElementById("useBR2");
	var brTime2 = document.getElementById("brTime2");
	var brTiming2 = document.getElementById("brTiming2");
	var brDelay2 = document.getElementById("brDelay2");	

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
	var transCode2 = document.getElementById("transCode2");	

	var enableTrans = document.getElementById("enableTrans");
	var enableTrans2 = document.getElementById("enableTrans2");	
	
	var trans1Options = document.querySelectorAll(".trans1Option");
	var trans2Options = document.querySelectorAll(".trans2Option");	

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
	
	
	
	noOpt2.onclick = applyTrans2;
	allOpt2.onclick = applyTrans2;
	selectOpt2.onclick = changeTrans2;
	
	allTime2.onchange = changeTransType3b;
	allTiming2.onchange = changeTransType3b;	
	allDelay2.onchange = changeTransType3b;
	
	useBG2.onclick = changeTransTypeb;
	bgTime2.onchange = changeTransType2b;
	bgTiming2.onchange = changeTransType4b;	
	bgDelay2.onchange = changeTransType5b;
	
	useLeft2.onclick = changeTransTypeb;
	leftTime2.onchange = changeTransType2b;
	leftTiming2.onchange = changeTransType4b;	
	leftDelay2.onchange = changeTransType5b;	
	
	useWidthHeight2.onclick = changeTransTypeb;
	whTime2.onchange = changeTransType2b;
	whTiming2.onchange = changeTransType4b;	
	whDelay2.onchange = changeTransType5b;	
	
	useBR2.onclick = changeTransTypeb;
	brTime2.onchange = changeTransType2b;
	brTiming2.onchange = changeTransType4b;	
	brDelay2.onchange = changeTransType5b;
	
	
	function changeTransType() {
		selectOpt.checked = true;
		applyTrans();
	}
	
	function changeTransTypeb() {
		selectOpt2.checked = true;
		applyTrans2();
	}	
	
	function changeTransType2(e) {
		e.target.previousElementSibling.previousElementSibling.checked = true;
		selectOpt.checked = true;
		applyTrans();
	}	
	
	function changeTransType2b(e) {
		e.target.previousElementSibling.previousElementSibling.checked = true;
		selectOpt2.checked = true;
		applyTrans2();
	}	
	
	function changeTransType3() {
		allOpt.checked = true;
		applyTrans();
	}	
	
	function changeTransType3b() {
		allOpt2.checked = true;
		applyTrans2();
	}	
	
	function changeTransType4(e) {
		e.target.previousElementSibling.previousElementSibling.previousElementSibling.checked = true;
		selectOpt.checked = true;
		applyTrans();
	}	
	
	function changeTransType4b(e) {
		e.target.previousElementSibling.previousElementSibling.previousElementSibling.checked = true;
		selectOpt2.checked = true;
		applyTrans2();
	}	
	
	function changeTransType5(e) {
		e.target.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.checked = true;
		selectOpt.checked = true;
		applyTrans();
	}
	
	function changeTransType5b(e) {
		e.target.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.checked = true;
		selectOpt2.checked = true;
		applyTrans2();
	}		
	
	enableTrans.onclick = function(e) {
		if (e.target.checked) {
			for (var i=0; i< trans1Options.length; i++) {
				trans1Options[i].disabled = "";
			}	
			document.getElementById("trans1Entry").style.display = "block";
			applyTrans();			
		} else {
			for (var i=0; i< trans1Options.length; i++) {
				trans1Options[i].disabled = true;
			}
			document.getElementById("trans1Entry").style.display = "none";
			var styleRule = document.styleSheets[0].cssRules[0];
			styleRule.style.transition = "";		
		}
	};
	
	enableTrans2.onclick = function(e) {
		if (e.target.checked) {
			for (var i=0; i< trans2Options.length; i++) {
				trans2Options[i].disabled = "";
			}
			document.getElementById("trans2Entry").style.display = "block";	
			applyTrans2();			
		} else {
			for (var i=0; i< trans2Options.length; i++) {
				trans2Options[i].disabled = true;
			}	
			document.getElementById("trans2Entry").style.display = "none";	
			var styleRule = document.styleSheets[0].cssRules[1];
			styleRule.style.transition = "";			
		}
	};
	
	function applyTrans() {
		if (enableTrans.checked) {
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
	}
	
	function applyTrans2() {
		if (enableTrans2.checked) {
			var transString = "";
			var transString2 = "";
			if (noOpt2.checked) {
				transString = "none;";
				transString2 = "none";			
			} else if (allOpt2.checked) {
				transString = "all " + allTime2.value + "s " + allTiming2.options[allTiming2.selectedIndex].value + " " + allDelay2.value + "s;";
				transString2 = "all " + allTime2.value + "s " + allTiming.options[allTiming2.selectedIndex].value + " " + allDelay2.value + "s";			
			} else {
				if (useWidthHeight2.checked) {transString += "width " + whTime2.value + "s " + whTiming2.options[whTiming2.selectedIndex].value + " " + whDelay2.value + "s, <br /> height " + whTime2.value + "s " + whTiming2.options[whTiming2.selectedIndex].value + " " + whDelay2.value + "s, <br />";}
				if (useLeft2.checked) {transString += "left " + leftTime2.value + "s " + leftTiming2.options[leftTiming2.selectedIndex].value + " " + leftDelay2.value + "s, <br />";}			
				if (useBG2.checked) {transString += "background-color " + bgTime2.value + "s " + bgTiming2.options[bgTiming2.selectedIndex].value + " " + bgDelay2.value + "s, <br />";}
				if (useBR2.checked) {transString += "border-radius " + brTime2.value + "s " + brTiming2.options[brTiming2.selectedIndex].value + " " + brDelay2.value + "s, <br />";}

				if (useWidthHeight2.checked) {transString2 += "width " + whTime2.value + "s " + whTiming2.options[whTiming2.selectedIndex].value + " " + whDelay2.value + "s, height " + whTime2.value + "s " + whTiming2.options[whTiming2.selectedIndex].value + " " + whDelay2.value + "s, ";}
				if (useLeft2.checked) {transString2 += "left " + leftTime2.value + "s " + leftTiming2.options[leftTiming2.selectedIndex].value + " " + leftDelay2.value + "s, ";}			
				if (useBG2.checked) {transString2 += "background-color " + bgTime2.value + "s " + bgTiming2.options[bgTiming2.selectedIndex].value + " " + bgDelay2.value + "s, ";}		
				if (useBR2.checked) {transString2 += "border-radius " + brTime2.value + "s " + brTiming2.options[brTiming2.selectedIndex].value + " " + brDelay2.value + "s, ";}

				var commaIndex = transString.lastIndexOf(",");
				var commaIndex2 = transString2.lastIndexOf(",");			
				transString = transString.substring(0, commaIndex) + ";";
				transString2 = transString2.substring(0, commaIndex2);			
			}
			var initRule = document.styleSheets[0].cssRules[1];
			initRule.style.transition = transString2;
			transCode2.innerHTML = transString;
		}
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
		
		if (enableTrans.checked) {
			applyTrans();
		}		
	}
	
	function changeTrans2() {

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
		
		if (enableTrans2.checked) {
			applyTrans2();
		}
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