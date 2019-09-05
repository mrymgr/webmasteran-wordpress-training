"use strict";




window.onload = function() {

	var outcomebox = document.getElementById("outcomebox");
	var outcometrans = document.getElementById("outcometrans");	
	var erase = document.getElementById("erase");
	var translateX2 = document.getElementById("translatex2");
	var translateY2 = document.getElementById("translatey2");
	var translateZ2 = document.getElementById("translatez2");	
	var tx = document.getElementById("tx");
	var ty = document.getElementById("ty");
	var tz = document.getElementById("tz");	
	var pvalue = document.getElementById("pvalue");	
	var perspective = document.getElementById("perspective");
	var figure3q = document.getElementById("figure3q");	
	var figurefront = document.getElementById("figurefront");		

   figure3q.style.transform = "";
   figurefront.style.transform = "";	
   
   var transBoxes = document.getElementsByClassName("transBox");
   for (var i=0; i < transBoxes.length; i++) {
      transBoxes[i].onchange = applyTrans;
   }	
   
   var radiobuttons = document.getElementsByClassName("eraseT");
   for (var i=0; i < radiobuttons.length; i++) {
      radiobuttons[i].onclick = toggleTrans;
   }
		
   perspective.onchange = function() {
	   var currentTrans = outcometrans.textContent;
	   var persp = "perspective(" + perspective.value + "px) ";
	   pvalue.textContent = persp;
	  figure3q.style.transform =  persp + currentTrans;  
	  figurefront.style.transform =   persp + currentTrans;	       	    
   };
	
   erase.onclick = function() {
      figure3q.style.transform = "";
      figurefront.style.transform = "";	   
      outcometrans.textContent = "";

      for (var i=0; i < radiobuttons.length; i++) {
         radiobuttons[i].checked = false;
      }
	  translateX2.value="0";
	  translateY2.value="0";
	  translateZ2.value="0";

	  tx.value="0";
	  ty.value="0";
	  tz.value="0";
	  perspective.value = "800";
	  pvalue.textContent = "perspective(800px) ";
   };
   
	

   function toggleTrans(e) {
     var transString, transValue, transType; 
	 if (e.target.id !== "usetranslate3d") {
		 transValue = e.target.nextElementSibling.value; 
		 transType = e.target.previousElementSibling.textContent;
		 transString = transType + "(" + transValue + ")";
	 } else {
		 transString ="translate3d("+ tx.value + "px, " + ty.value + "px, " + tz.value + "px)";
		 document.getElementById("usetranslate3d").checked = true;		 
	 }
   
	  figure3q.style.transform =  pvalue.textContent + " " + transString;  
	  figurefront.style.transform =   pvalue.textContent + " " + transString;	       
	  outcometrans.textContent = transString;
   }

	
   function applyTrans(e) {
      var transString, transValue, transType;   
      if ((e.target.id === "translatex2") || (e.target.id === "translatey2") || (e.target.id === "translatez2")) {
		  transValue = e.target.value +"px"; 
		  transType = e.target.previousElementSibling.previousElementSibling.textContent;
		  e.target.previousElementSibling.checked = true;
		 transString = transType + "(" + transValue + ")";
	  } else {
		 transString = "translate3d("+ tx.value + "px, " + ty.value + "px, " + tz.value + "px)";
		 document.getElementById("usetranslate3d").checked = true;
	  }
   
	  figure3q.style.transform =  pvalue.textContent + " " + transString;  
	  figurefront.style.transform =  pvalue.textContent + " " + transString;	   
	  outcometrans.textContent = transString;       	        
   }
	
};