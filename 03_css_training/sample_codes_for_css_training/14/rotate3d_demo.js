"use strict";




window.onload = function() {

	var outcomebox = document.getElementById("outcomebox");
	var outcometrans = document.getElementById("outcometrans");
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
	  origincode.textContent = "initial";
      for (var i=0; i < radiobuttons.length; i++) {
         radiobuttons[i].checked = false;
      }
	  rotateX2.value="0";
	  rotateY2.value="0";
	  rotateZ2.value="0";
	  hKeyword.selectedIndex = 1;
	  vKeyword.selectedIndex = 1;	 
	  zOrigin.selectedIndex = 3;
	  vangle.value="0";
	  vx.value="1";
	  vy.value="1";
	  vz.value="0";
	  perspective.value = "800";
	  pvalue.textContent = "perspective(800px) ";
   };
   

	
   function defineOrigin() {
      var originString = "";
	  originString += hKeyword.options[hKeyword.selectedIndex].value + " " + vKeyword.options[vKeyword.selectedIndex].value + " " + zOrigin.options[zOrigin.selectedIndex].value;

	   origincode.textContent = originString;
	   figure3q.style.transformOrigin = originString;
	   figurefront.style.transformOrigin = originString;	   

   }	

   function toggleTrans(e) {
     var transString, transValue, transType; 
	 if (e.target.id !== "useRotate3d") {
		 transValue = e.target.nextElementSibling.value; 
		 transType = e.target.previousElementSibling.textContent;
		 transString = transType + "(" + transValue + ")";
	 } else {
		 transString ="rotate3d("+ vx.value + ", " + vy.value + ", " + vz.value + ", " + vangle.value + "deg)";
		 document.getElementById("useRotate3d").checked = true;		 
	 }

  	  defineOrigin(e);	   
	  figure3q.style.transform =  pvalue.textContent + " " + transString;  
	  figurefront.style.transform =   pvalue.textContent + " " + transString;	       
	  outcometrans.textContent = transString;
   }

	
   function applyTrans(e) {
      var transString, transValue, transType;   
      if ((e.target.id === "rotatex2") || (e.target.id === "rotatey2") || (e.target.id === "rotatez2")) {
		  transValue = e.target.value +"deg"; 
		  transType = e.target.previousElementSibling.previousElementSibling.textContent;
		  e.target.previousElementSibling.checked = true;
		 transString = transType + "(" + transValue + ")";
	  } else {
		 transString = "rotate3d("+ vx.value + ", " + vy.value + ", " + vz.value + ", " + vangle.value + "deg)";
		 document.getElementById("useRotate3d").checked = true;
	  }

	  defineOrigin(e);	   
	  figure3q.style.transform =  pvalue.textContent + " " + transString;  
	  figurefront.style.transform =  pvalue.textContent + " " + transString;	   
	  outcometrans.textContent = transString;       	        
   }
	
	function calcVMag(c1, c2) {
		return Math.sqrt(c1*c1+c2*c2);
	}
	function calcVAngle(xvalue, mag) {
		return Math.acos(xvalue/mag)*180/Math.PI;
	}
	function invTan(c1, c2) {
		if ((c1==="0") && (c2==="0")) {
			return "0deg";
		} else {
			return Math.atan(c1/c2)*180/Math.PI+"deg";
		}
	}
};