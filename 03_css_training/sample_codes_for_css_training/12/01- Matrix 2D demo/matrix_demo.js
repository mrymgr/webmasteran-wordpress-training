"use strict";




window.onload = function() {
	var matrixcells = document.getElementsByClassName("matrixcell");
	var transformcells = document.getElementsByClassName("transformcell");	
	var outcomebox = document.getElementById("outcomebox");
    var hKeyword = document.getElementById("hKeyword");
    var vKeyword = document.getElementById("vKeyword");	
	
    document.getElementById("applyTrans").onclick = applyMatrix;
	
	document.getElementById("applyScale").onclick = function() {
		matrixcells[0].value = document.getElementById("scalea").value;
		matrixcells[1].value = 0; 
		matrixcells[2].value = 0; 
		matrixcells[3].value = 0;
		matrixcells[4].value = document.getElementById("scaleb").value;
		matrixcells[5].value = 0;	
		addToTransform();
	};
	document.getElementById("applyTranslate").onclick = function() {
		matrixcells[0].value = 1;
		matrixcells[1].value = 0;
		matrixcells[2].value = document.getElementById("translatex").value;
		matrixcells[3].value = 0;
		matrixcells[4].value = 1;
		matrixcells[5].value = document.getElementById("translatey").value;		
		addToTransform();
	};
	document.getElementById("applySkew").onclick = function() {
		var angleX = document.getElementById("skewx").value;
		var angleY = document.getElementById("skewy").value;					
		matrixcells[0].value = 1;
		matrixcells[1].value = Math.tan(parseFloat(angleX)*Math.PI/180).toFixed(3);	
		matrixcells[2].value = 0;
		matrixcells[3].value = Math.tan(parseFloat(angleY)*Math.PI/180).toFixed(3);
		matrixcells[4].value = 1;
		matrixcells[5].value = 0;		
		addToTransform();
	};	
	document.getElementById("applyRotate").onclick = function() {
		var angleV = document.getElementById("theta").value;
		matrixcells[0].value = Math.cos(parseFloat(angleV)*Math.PI/180).toFixed(3);
		matrixcells[1].value = -1*Math.sin(parseFloat(angleV)*Math.PI/180).toFixed(3);
		matrixcells[2].value = 0;
		matrixcells[3].value = Math.sin(parseFloat(angleV)*Math.PI/180).toFixed(3);		
		matrixcells[4].value = Math.cos(parseFloat(angleV)*Math.PI/180).toFixed(3);		
		matrixcells[5].value = 0;		
		addToTransform();
	};
	document.getElementById("applyHorz").onclick = function() {
		matrixcells[0].value = -1;
		matrixcells[1].value = 0;
		matrixcells[2].value = 0;
		matrixcells[3].value = 0;
		matrixcells[4].value = 1;
		matrixcells[5].value = 0;		
		addToTransform();
	};	
	document.getElementById("applyVert").onclick = function() {
		matrixcells[0].value = 1;
		matrixcells[1].value = 0;
		matrixcells[2].value = 0;
		matrixcells[3].value = 0;
		matrixcells[4].value = -1;
		matrixcells[5].value = 0;
		addToTransform();
	};	
	
	document.getElementById("resetTrans").onclick = function() {
		matrixcells[0].value = 1;
		matrixcells[1].value = 0;
		matrixcells[2].value = 0;
		matrixcells[3].value = 0;
		matrixcells[4].value = 1;
		matrixcells[5].value = 0;
		addToTransform();
		applyMatrix();
	};
	
	for (var i = 0; i < matrixcells.length; i++) {
		matrixcells[i].onchange = addToTransform;
	}
	
   function defineOrigin() {
      var originString = "";
	  originString += hKeyword.options[hKeyword.selectedIndex].value + " " + vKeyword.options[vKeyword.selectedIndex].value;
	  outcomebox.style.transformOrigin = originString;

   }	
	
	function addToTransform() {
		transformcells[0].value = matrixcells[0].value;
		transformcells[1].value = matrixcells[3].value;	
		transformcells[2].value = matrixcells[1].value;		
		transformcells[3].value = matrixcells[4].value;		
		transformcells[4].value = matrixcells[2].value;		
		transformcells[5].value = matrixcells[5].value;		
	}
	
	function applyMatrix() {
		var m0 = transformcells[0].value;
		var m1 = transformcells[1].value;	
		var m2 = transformcells[2].value;
		var m3 = transformcells[3].value;
		var m4 = transformcells[4].value;
		var m5 = transformcells[5].value;
		var mstring = m0+", "+m1+", "+m2+", "+m3+", "+m4+", "+m5;
		outcomebox.style.transform = "matrix(" + mstring + ")";
		defineOrigin();
	}
	
};