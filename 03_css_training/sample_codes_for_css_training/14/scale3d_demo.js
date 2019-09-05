"use strict";




window.onload = function() {

	var outcomebox = document.getElementById("outcomebox");
	var outcometrans = document.getElementById("outcometrans");
	var origincode = document.getElementById("origincode");	
	var erase = document.getElementById("erase");
	var scaleX2 = document.getElementById("scalex2");
	var scaleY2 = document.getElementById("scaley2");
	var scaleZ2 = document.getElementById("scalez2");	
	var sx = document.getElementById("sx");
	var sy = document.getElementById("sy");
	var sz = document.getElementById("sz");	

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
	  scaleX2.value="0";
	  scaleY2.value="0";
	  scaleZ2.value="0";
	  hKeyword.selectedIndex = 1;
	  vKeyword.selectedIndex = 1;	 
	  zOrigin.selectedIndex = 3;

	  sx.value="1";
	  sy.value="1";
	  sz.value="1";
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
	 if (e.target.id !== "usescale3d") {
		 transValue = e.target.nextElementSibling.value; 
		 transType = e.target.previousElementSibling.textContent;
		 transString = transType + "(" + transValue + ")";
	 } else {
		 transString ="scale3d("+ sx.value + ", " + sy.value + ", " + sz.value + ")";
		 document.getElementById("usescale3d").checked = true;		 
	 }

  	  defineOrigin(e);	  
 
	  figure3q.style.transform =  pvalue.textContent + " " + transString;  
	  figurefront.style.transform =   pvalue.textContent + " " + transString;	       
	  outcometrans.textContent = transString;
   }

	
   function applyTrans(e) {
      var transString, transValue, transType;   
      if ((e.target.id === "scalex2") || (e.target.id === "scaley2") || (e.target.id === "scalez2")) {
		  transValue = e.target.value; 
		  transType = e.target.previousElementSibling.previousElementSibling.textContent;
		  e.target.previousElementSibling.checked = true;
		 transString = transType + "(" + transValue + ")";
	  } else {
		 transString = "scale3d("+ sx.value + ", " + sy.value + ", " + sz.value + ")";
		 document.getElementById("usescale3d").checked = true;
	  }

	  defineOrigin(e);	
	   
	  figure3q.style.transform =  pvalue.textContent + " " + transString;  
	  figurefront.style.transform =  pvalue.textContent + " " + transString;	   
	  outcometrans.textContent = transString;       	        
   }
	
};