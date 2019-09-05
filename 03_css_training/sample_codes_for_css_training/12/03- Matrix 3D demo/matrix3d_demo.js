"use strict";




window.onload = function() {
	var matrixcells = document.getElementsByClassName("matrixcell");
	var transformcells = document.getElementsByClassName("transformcell");	
	var pvalue = document.getElementById("pvalue");	
	var perspective = document.getElementById("perspective");
	var hKeyword = document.getElementById("hKeyword");
	var vKeyword = document.getElementById("vKeyword");
	var zOrigin = document.getElementById("zOrigin");
	var originCode = document.getElementById("originCode");
	var figure3q = document.getElementById("figure3q");	
	var figurefront = document.getElementById("figurefront"); 	
	
    document.getElementById("applyTrans").onclick = applyMatrix;
	
	document.getElementById("applyScale3d").onclick = function() {
		matrixcells[0].value = document.getElementById("scalex").value;
		matrixcells[1].value = 0; 
		matrixcells[2].value = 0; 
		matrixcells[3].value = 0;
		matrixcells[4].value = 0;
		matrixcells[5].value = document.getElementById("scaley").value;	
		matrixcells[6].value = 0;
		matrixcells[7].value = 0;
		matrixcells[8].value = 0;
		matrixcells[9].value = 0;
		matrixcells[10].value = document.getElementById("scalez").value;	
		matrixcells[11].value = 0;
		matrixcells[12].value = 0;
		matrixcells[13].value = 0;
		matrixcells[14].value = 0;
		matrixcells[15].value = 1;		
		addToTransform();
		applyMatrix();		
	};
	document.getElementById("applyTranslate3d").onclick = function() {
		matrixcells[0].value = 1;
		matrixcells[1].value = 0; 
		matrixcells[2].value = 0; 
		matrixcells[3].value = document.getElementById("translatex").value;
		matrixcells[4].value = 0;
		matrixcells[5].value = 1;	
		matrixcells[6].value = 0;
		matrixcells[7].value = document.getElementById("translatey").value;
		matrixcells[8].value = 0;
		matrixcells[9].value = 0;
		matrixcells[10].value = 1;	
		matrixcells[11].value = document.getElementById("translatez").value;
		matrixcells[12].value = 0;
		matrixcells[13].value = 0;
		matrixcells[14].value = 0;
		matrixcells[15].value = 1;		
		addToTransform();
		applyMatrix();		
	};
	document.getElementById("applyRotateX").onclick = function() {
		var angleV = document.getElementById("thetaX").value;
		matrixcells[0].value = 1;
		matrixcells[1].value = 0; 
		matrixcells[2].value = 0; 
		matrixcells[3].value = 0;
		matrixcells[4].value = 0;
		matrixcells[5].value = Math.cos(parseFloat(angleV)*Math.PI/180).toFixed(3);	
		matrixcells[6].value = -1*Math.sin(parseFloat(angleV)*Math.PI/180).toFixed(3);
		matrixcells[7].value = 0;
		matrixcells[8].value = 0;
		matrixcells[9].value = Math.sin(parseFloat(angleV)*Math.PI/180).toFixed(3);
		matrixcells[10].value = Math.cos(parseFloat(angleV)*Math.PI/180).toFixed(3);	
		matrixcells[11].value = 0;
		matrixcells[12].value = 0;
		matrixcells[13].value = 0;
		matrixcells[14].value = 0;
		matrixcells[15].value = 1;			
		addToTransform();
		applyMatrix();		
	};
	document.getElementById("applyRotateY").onclick = function() {
		var angleV = document.getElementById("thetaY").value;
		matrixcells[0].value = Math.cos(parseFloat(angleV)*Math.PI/180).toFixed(3);
		matrixcells[1].value = 0; 
		matrixcells[2].value = Math.sin(parseFloat(angleV)*Math.PI/180).toFixed(3); 
		matrixcells[3].value = 0;
		matrixcells[4].value = 0;
		matrixcells[5].value = 1;	
		matrixcells[6].value = 0;
		matrixcells[7].value = 0;
		matrixcells[8].value = -1*Math.sin(parseFloat(angleV)*Math.PI/180).toFixed(3);
		matrixcells[9].value = 0;
		matrixcells[10].value = Math.cos(parseFloat(angleV)*Math.PI/180).toFixed(3);	
		matrixcells[11].value = 0;
		matrixcells[12].value = 0;
		matrixcells[13].value = 0;
		matrixcells[14].value = 0;
		matrixcells[15].value = 1;			
		addToTransform();
		applyMatrix();		
	};	
	document.getElementById("applyRotateZ").onclick = function() {
		var angleV = document.getElementById("thetaZ").value;
		matrixcells[0].value = Math.cos(parseFloat(angleV)*Math.PI/180).toFixed(3);
		matrixcells[1].value = -1*Math.sin(parseFloat(angleV)*Math.PI/180).toFixed(3); 
		matrixcells[2].value = 0; 
		matrixcells[3].value = 0;
		matrixcells[4].value = Math.sin(parseFloat(angleV)*Math.PI/180).toFixed(3);
		matrixcells[5].value = Math.cos(parseFloat(angleV)*Math.PI/180).toFixed(3);	
		matrixcells[6].value = 0;
		matrixcells[7].value = 0;
		matrixcells[8].value = 0;
		matrixcells[9].value = 0;
		matrixcells[10].value = 1;	
		matrixcells[11].value = 0;
		matrixcells[12].value = 0;
		matrixcells[13].value = 0;
		matrixcells[14].value = 0;
		matrixcells[15].value = 1;			
		addToTransform();
		applyMatrix();		
	};	
	document.getElementById("applyReflections").onclick = function() {
		matrixcells[0].value = -1;
		matrixcells[1].value = 0; 
		matrixcells[2].value = 0; 
		matrixcells[3].value = 0;
		matrixcells[4].value = 0;
		matrixcells[5].value = -1;	
		matrixcells[6].value = 0;
		matrixcells[7].value = 0;
		matrixcells[8].value = 0;
		matrixcells[9].value = 0;
		matrixcells[10].value = 1;	
		matrixcells[11].value = 0;
		matrixcells[12].value = 0;
		matrixcells[13].value = 0;
		matrixcells[14].value = 0;
		matrixcells[15].value = 1;			
		addToTransform();
		applyMatrix();		
	};	

	document.getElementById("resetTrans").onclick = function() {
		matrixcells[0].value = 1;
		matrixcells[1].value = 0;
		matrixcells[2].value = 0;
		matrixcells[3].value = 0;
		matrixcells[4].value = 0;
		matrixcells[5].value = 1;
		matrixcells[6].value = 0;
		matrixcells[7].value = 0;
		matrixcells[8].value = 0;
		matrixcells[9].value = 0;
		matrixcells[10].value = 1;
		matrixcells[11].value = 0;
		matrixcells[12].value = 0;
		matrixcells[13].value = 0;
		matrixcells[14].value = 0;
		matrixcells[15].value = 1;		
		addToTransform();
		applyMatrix();
	};	
	
	for (var i = 0; i < matrixcells.length; i++) {
		matrixcells[i].onchange = addToTransform;
	}
	
   perspective.onchange = function() {
	   pvalue.textContent = perspective.value + "px";
	   applyMatrix();	       	    
   };
   	
	hKeyword.onchange = defineOrigin;
	vKeyword.onchange = defineOrigin;
	zOrigin.onchange = defineOrigin;
	
   function defineOrigin() {
	   originCode.textContent = hKeyword.options[hKeyword.selectedIndex].value + " " + vKeyword.options[vKeyword.selectedIndex].value + " " + zOrigin.options[zOrigin.selectedIndex].value;
	   applyMatrix();	   
   }	
	
	function addToTransform() {
		transformcells[0].value = matrixcells[0].value;
		transformcells[1].value = matrixcells[4].value;	
		transformcells[2].value = matrixcells[8].value;		
		transformcells[3].value = matrixcells[12].value;		
		transformcells[4].value = matrixcells[1].value;		
		transformcells[5].value = matrixcells[5].value;	
		transformcells[6].value = matrixcells[9].value;
		transformcells[7].value = matrixcells[13].value;	
		transformcells[8].value = matrixcells[2].value;		
		transformcells[9].value = matrixcells[6].value;		
		transformcells[10].value = matrixcells[10].value;		
		transformcells[11].value = matrixcells[14].value;
		transformcells[12].value = matrixcells[3].value;		
		transformcells[13].value = matrixcells[7].value;		
		transformcells[14].value = matrixcells[11].value;		
		transformcells[15].value = matrixcells[15].value;		
	}
	
	function applyMatrix() {
		var mstring = "";
		for (var i = 0; i <= 14; i++) {
			mstring += transformcells[i].value + ", ";
		}
		mstring += transformcells[15].value;

	   figure3q.style.transform = "perspective(" + pvalue.textContent + ") matrix3d(" + mstring + ")";
	   figure3q.style.transformOrigin = originCode.textContent;
	   figurefront.style.transform = "perspective(" + pvalue.textContent + ") matrix3d(" + mstring + ")";	   
	   figurefront.style.transformOrigin = originCode.textContent;
	}
	
};