"use strict";




window.onload = function() {
   
	var outcometrans = document.getElementById("outcometrans");
    var outcomecalc	= document.getElementById("outcomecalc");
	var origincode = document.getElementById("origincode");	
	var erase = document.getElementById("erase");
	var rotateX2 = document.getElementById("rotatex2");
	var rotateY2 = document.getElementById("rotatey2");
	var rotateZ2 = document.getElementById("rotatez2");	
	var vx = document.getElementById("vx");
	var vy = document.getElementById("vy");
	var vz = document.getElementById("vz");	
	var vangle = document.getElementById("vangle");
	var pvalue = document.getElementById("pvalue");	
	var perspective = document.getElementById("perspective");
	var hKeyword = document.getElementById("hKeyword");
	var vKeyword = document.getElementById("vKeyword");
	var zOrigin = document.getElementById("zOrigin");	
	var figurefront = document.getElementById("figurefront"); 
	var scaleX2 = document.getElementById("scalex2");
	var scaleY2 = document.getElementById("scaley2");
	var scaleZ2 = document.getElementById("scalez2");	
	var sx = document.getElementById("sx");
	var sy = document.getElementById("sy");
	var sz = document.getElementById("sz");	
	var translateX2 = document.getElementById("translatex2");
	var translateY2 = document.getElementById("translatey2");
	var translateZ2 = document.getElementById("translatez2");	
	var tx = document.getElementById("tx");
	var ty = document.getElementById("ty");
	var tz = document.getElementById("tz");
	var mCells = document.querySelectorAll("table#mTable td");
	
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
	  figurefront.style.transform =   persp + currentTrans;	 
	   showCalc3d();  
   };
   
	

   erase.onclick = function() {
      figurefront.style.transform = "perspective(1200px)";	   
      outcometrans.textContent = "";
	  origincode.textContent = "initial";
      for (var i=0; i < radiobuttons.length; i++) {
         radiobuttons[i].checked = false;
      }
	  rotateX2.value="0";
	  rotateY2.value="0";
	  rotateZ2.value="0";
	   
	  scaleX2.value="1";
	  scaleY2.value="1";
	  scaleZ2.value="1";
	   
	  translateX2.value="0";
	  translateY2.value="0";
	  translateZ2.value="0";

	  tx.value="0";
	  ty.value="0";
	  tz.value="0";	   
	  hKeyword.selectedIndex = 1;
	  vKeyword.selectedIndex = 1;	 
	  zOrigin.selectedIndex = 3;
	  vangle.value="0";
	  vx.value="1";
	  vy.value="1";
	  vz.value="0";
	  perspective.value = "1200";
	  pvalue.textContent = "perspective(1200px) ";
	   showCalc3d();	   
   };
	
	hKeyword.onchange = defineOrigin;
	vKeyword.onchange = defineOrigin;
	zOrigin.onchange = defineOrigin;
   
   function defineOrigin() {
      var originString = "";
	  originString += hKeyword.options[hKeyword.selectedIndex].value + " " + vKeyword.options[vKeyword.selectedIndex].value + " " + zOrigin.options[zOrigin.selectedIndex].value;

	   origincode.textContent = originString;
	   figurefront.style.transform = pvalue.textContent + " " + outcometrans.textContent;	   
	   figurefront.style.transformOrigin = originString;
	   showCalc3d();
   }	

	function showCalc3d() {
		var tString = window.getComputedStyle(figurefront, null).getPropertyValue("transform");
		outcomecalc.textContent = tString;
		var mArray = tString.slice(9,tString.length-1).split(",");
		for (var i=0; i < mArray.length; i++) {
			document.getElementById("m"+i).textContent = mArray[i].trim();
		}
	}
	
   function toggleTrans(e) {

     var transString, transValue, transType, currentTrans, newTrans, startTrans, endTrans, oldOption;      
	 if (e.target.checked === true) {
		 
		 if (e.target.id === "userotate3d") {
			 transType = "rotate3d";
			 transString ="rotate3d("+ vx.value + ", " + vy.value + ", " + vz.value + ", " + vangle.value + "deg)";	
		 } else if (e.target.id === "usescale3d") {
			 transType = "scale3d";
		 	 transString ="scale3d("+ sx.value + ", " + sy.value + ", " + sz.value + ")";		 
		 } else if (e.target.id === "usetranslate3d") {
			 transType = "translate3d";			 
		 	 transString ="translate3d("+ tx.value + "px, " + ty.value + "px, " + tz.value + "px)";			 
		 } else {
			transValue = e.target.nextElementSibling.value; 
			transType = e.target.previousElementSibling.textContent; 
		 	transString = transType + "(" + transValue + ((e.target.nextElementSibling.id === "translatex2" || e.target.nextElementSibling.id === "translatey2" || e.target.nextElementSibling.id === "translatez2") ? "px":"") + ((e.target.nextElementSibling.id === "rotatex2" || e.target.nextElementSibling.id === "rotatey2" || e.target.nextElementSibling.id === "rotatez2") ? "deg":"") + ")";			 
		 }		 
		 
		 currentTrans = outcometrans.textContent;

         if (currentTrans === "") {	       
			  outcometrans.textContent = transString;      
         } else {
            if (currentTrans.indexOf(transType+"(") === -1) {      
			  outcometrans.textContent = currentTrans + " " + transString; 
            } else {
               startTrans = currentTrans.indexOf(transType+"(");
               endTrans = currentTrans.indexOf(")", startTrans)+1;
               oldOption = currentTrans.substring(startTrans, endTrans+1);
               newTrans = currentTrans.replace(oldOption, transString);									       
			  outcometrans.textContent = newTrans;				
            } 
         }         
      } else {
         transType = e.target.previousElementSibling.textContent;
         currentTrans = outcometrans.textContent;
         if (currentTrans.indexOf(transType+"(") !== -1) {
            startTrans = currentTrans.indexOf(transType+"(");
            endTrans = currentTrans.indexOf(")", startTrans)+1;
            oldOption = currentTrans.substring(startTrans, endTrans);
            newTrans = currentTrans.replace(oldOption, "");
            if (newTrans === "") {
               outcometrans.textContent = "";
            } else {
               outcometrans.textContent = newTrans.trim();              
            }          
         }		 
	  }
		
  	  defineOrigin(e);	   	                
   }
      
   function applyTrans(e) {
      var transString, transValue, transType, currentTrans, newTrans, startTrans, endTrans, oldOption;	   
      
	 if ((e.target.id === "vx") || (e.target.id === "vy") || (e.target.id === "vz") || (e.target.id === "vangle")) {
		 transType = "rotate3d";
		 transString ="rotate3d("+ vx.value + ", " + vy.value + ", " + vz.value + ", " + vangle.value + "deg)";
		 document.getElementById("userotate3d").checked = true;	 
	 } else if ((e.target.id === "sx") || (e.target.id === "sy") || (e.target.id === "sz")) {
		 transType = "scale3d";
		 transString ="scale3d("+ sx.value + ", " + sy.value + ", " + sz.value + ")";
		 document.getElementById("usescale3d").checked = true;
	 } else if ((e.target.id === "tx") || (e.target.id === "ty") || (e.target.id === "tz")) {
		 transType = "translate3d"	;		 
		 transString ="translate3d("+ tx.value + "px, " + ty.value + "px, " + tz.value + "px)";	
		 document.getElementById("usetranslate3d").checked = true;
	 } else {
		transValue = e.target.value; 
		transType = e.target.previousElementSibling.previousElementSibling.textContent;	
		e.target.previousElementSibling.checked = true; 	
		transString = transType + "(" + transValue + ((e.target.id === "translatex2" || e.target.id === "translatey2" || e.target.id === "translatez2") ? "px":"") + ((e.target.id === "rotatex2" || e.target.id === "rotatey2" || e.target.id === "rotatez2") ? "deg":"") + ")";			 
	 }	  
	   
	   
	  currentTrans = outcometrans.textContent;

		 if (currentTrans === "") {	       
			  outcometrans.textContent = transString;      
		 } else {
			if (currentTrans.indexOf(transType+"(") === -1) {	       
			  outcometrans.textContent = currentTrans + " " + transString; 
			} else {
			   startTrans = currentTrans.indexOf(transType+"(");
			   endTrans = currentTrans.indexOf(")", startTrans)+1;
			   oldOption = currentTrans.substring(startTrans, endTrans+1).trim();
			   newTrans = currentTrans.replace(oldOption, transString);	       
			  outcometrans.textContent = newTrans; 

			} 
		 } 

	  	defineOrigin(e);
   }
};