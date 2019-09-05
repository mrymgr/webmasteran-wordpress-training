"use strict";




window.onload = function() {
   
   var outcomebox = document.getElementById("outcomebox");
   var outcometrans = document.getElementById("outcometrans");
   var origincode = document.getElementById("origincode");	
   var erase = document.getElementById("erase");
   var translatex1 = document.getElementById("translatex1");
   var translatey1 = document.getElementById("translatey1");	
   var scalex1 = document.getElementById("scalex1");
   var scaley1 = document.getElementById("scaley1");
   var skewx1 = document.getElementById("skewx1");
   var skewy1 = document.getElementById("skewy1");	
   var posKey = document.getElementById("posKey");
   var posP = document.getElementById("posP");
   var hKeyword = document.getElementById("hKeyword");
   var vKeyword = document.getElementById("vKeyword");
   var hPos = document.getElementById("hPos");
   var vPos = document.getElementById("vPos"); 	

   outcomebox.style.transform = "";
   
   var transBoxes = document.getElementsByClassName("transBox");
   for (var i=0; i < transBoxes.length; i++) {
      transBoxes[i].onchange = applyTrans;
   }	
   
   var radiobuttons = document.getElementsByClassName("eraseT");
   for (var i=0; i < radiobuttons.length; i++) {
      radiobuttons[i].onclick = toggleTrans;
   }
   translatex1.onchange = applyTrans;
   translatey1.onchange = applyTrans;
   scalex1.onchange = applyTrans;
   scaley1.onchange = applyTrans;
   skewx1.onchange = applyTrans;
   skewy1.onchange = applyTrans;	
   hKeyword.onchange = defineOrigin;
   vKeyword.onchange = defineOrigin;
   hPos.onchange = defineOrigin;
   vPos.onchange = defineOrigin;	

   erase.onclick = function() {
      outcomebox.style.transform = "";
      outcometrans.textContent = "";
      for (var i=0; i < radiobuttons.length; i++) {
         radiobuttons[i].checked = false;
      }
   };
   
   function defineOrigin(e) {
      var originString = "";

	    if ((e.target.id === "hKeyword") || (e.target.id === "vKeyword")) {
			posKey.checked = true;
		}

	   	if ((e.target.id === "hPos") || (e.target.id === "vPos")) {
			posP.checked = true;
		}

	   if (posKey.checked) {
			 originString += hKeyword.options[hKeyword.selectedIndex].value + " " + vKeyword.options[vKeyword.selectedIndex].value;
	   } else {
			 originString += hPos.value + "% " + vPos.value + "%";
	   }

	   origincode.textContent = originString;
	   outcomebox.style.transformOrigin = originString;

   }
	
   function toggleTrans(e) {
     var transString, transValue, transType;      
	   
	 if (e.target.id === "useTranslate") {
		 transType = "translate";
		 transString = "translate(" + translatex1.value + "px, " + translatey1.value + "px)";			 
	 } else if (e.target.id === "useScale") {
		 transType = "scale";
		 transString = "scale(" + scalex1.value + ", " + scaley1.value + ")";			 
	 } else if (e.target.id === "useSkew") {
		 transType = "skew";
		 transString = "skew(" + skewx1.value + "deg, " + skewy1.value + "deg)";
	 } else {
		transValue = e.target.nextElementSibling.value; 
		transType = e.target.previousElementSibling.textContent;
	 transString = transType + "(" + transValue + ((e.target.nextElementSibling.id === "translatex2" || e.target.nextElementSibling.id === "translatey2") ? "px":"") + ((e.target.nextElementSibling.id === "skewx2" || e.target.nextElementSibling.id === "skewy2" || e.target.nextElementSibling.id === "rotate") ? "deg":"") + ")";}

  	defineOrigin(e);	   
	outcomebox.style.transform =  transString;         
	outcometrans.textContent = transString;             


   }
      
   function applyTrans(e) {
      var transString, transValue, transType;	   
      
      if ((e.target.id === "translatex1") || (e.target.id === "translatey1")) {
         transType = "translate";
         transString = "translate(" + translatex1.value + "px, " + translatey1.value + "px)";
         document.getElementById("useTranslate").checked = true;
      } else if ((e.target.id === "scalex1") || (e.target.id === "scaley1")) {
         transType = "scale";
         transString = "scale(" + scalex1.value + ", " + scaley1.value + ")";
         document.getElementById("useScale").checked = true;
      } else if ((e.target.id === "skewx1") || (e.target.id === "skewy1")) {
         transType = "skew";
         transString = "skew(" + skewx1.value + "deg, " + skewy1.value + "deg)";
         document.getElementById("useSkew").checked = true;
      } else  {
         transValue = e.target.value; 
         transType = e.target.previousElementSibling.previousElementSibling.textContent;
         e.target.previousElementSibling.checked = true;
         transString = transType + "(" + transValue + ((e.target.id === "translatex2" || e.target.id === "translatey2") ? "px":"") + ((e.target.id === "skewx2" || e.target.id === "skewy2" || e.target.id === "rotate") ? "deg":"") + ")";
      }	   
	   
	  defineOrigin(e);	   
	  outcomebox.style.transform =  transString;         
	  outcometrans.textContent = transString;       	        
   }
};