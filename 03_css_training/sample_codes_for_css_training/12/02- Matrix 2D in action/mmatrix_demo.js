"use strict";




window.onload = function() {

	var matrixcells = document.getElementsByClassName("matrixcell");	
	var transformcells = document.getElementsByClassName("transformcell");		
	var mArrays = [];
	var outcomebox = document.getElementById("outcomebox");	
		
	
	document.getElementById("mBoxes").firstElementChild.children[1].onclick = removeMatrix;
	document.getElementById("mBoxes").firstElementChild.children[2].onclick = addNewMatrix;	
	document.getElementById("vKeyword").onchange = applyMatrix;
	document.getElementById("hKeyword").onchange = applyMatrix;		

	function removeMatrix(e) {
		var currentTable = e.target.parentElement;
		if (currentTable.parentElement.childElementCount > 1) {
			if (currentTable === currentTable.parentElement.lastElementChild) {
				var newAdd = document.createElement("input");
				newAdd.value="add new matrix";
				newAdd.type = "button";
				newAdd.onclick = addNewMatrix;
				currentTable.previousElementSibling.appendChild(newAdd);
			}
			currentTable.parentElement.removeChild(currentTable);
		}
	}
	
	function addNewMatrix(e) {
		var newMatrix = document.getElementById("mBoxes").lastElementChild.cloneNode(true);
		var newMatrixTable = newMatrix.firstElementChild;
		newMatrixTable.rows[0].cells[0].children[0].value="1";
		newMatrixTable.rows[0].cells[1].children[0].value="0";
		newMatrixTable.rows[0].cells[2].children[0].value="0";
		newMatrixTable.rows[1].cells[0].children[0].value="0";
		newMatrixTable.rows[1].cells[1].children[0].value="1";
		newMatrixTable.rows[1].cells[2].children[0].value="0";
		document.getElementById("mBoxes").appendChild(newMatrix);
		newMatrix.children[1].onclick = removeMatrix;
		newMatrix.children[2].onclick = addNewMatrix;	
		e.target.parentElement.removeChild(e.target);		
	}
	

	
	document.getElementById("multButton").onclick = function() {
		if (document.getElementsByClassName("matrixsample").length > 1) {
			getAllArrays();
			var finalArray = multAllArrays();
			matrixcells[0].value = finalArray[0][0].toFixed(3);
			matrixcells[1].value = finalArray[0][1].toFixed(3);
			matrixcells[2].value = finalArray[0][2].toFixed(3);		
			matrixcells[3].value = finalArray[1][0].toFixed(3);
			matrixcells[4].value = finalArray[1][1].toFixed(3);
			matrixcells[5].value = finalArray[1][2].toFixed(3);	

			transformcells[0].value = matrixcells[0].value;
			transformcells[1].value = matrixcells[3].value;	
			transformcells[2].value = matrixcells[1].value;		
			transformcells[3].value = matrixcells[4].value;		
			transformcells[4].value = matrixcells[2].value;		
			transformcells[5].value = matrixcells[5].value;		

			applyMatrix();

			function getAllArrays() {
				var matrixList = document.getElementsByClassName("matrixsample");
				mArrays=[];
				for (var i=0; i < matrixList.length; i++) {
					mArrays.push(getTableValues(matrixList[i]));
				}

				function getTableValues(tableRef) {
					var tempMatrix = [[1,0,0],[0,1,0],[0,0,1]];
					for (var i=0; i < tableRef.rows.length; i++) {
						for (var j=0; j < tableRef.rows[i].cells.length; j++) {
							tempMatrix[i][j] = tableRef.rows[i].cells[j].children[0].value;
						}
					}
					return tempMatrix;
				}			
			}	

			function multArray(array1, array2) {
				var resultArray = [
					[1, 0, 0],
					[0, 1, 0],
					[0, 0, 1]
				];
				resultArray[0][0] = array1[0][0]*array2[0][0]+array1[0][1]*array2[1][0]+array1[0][2]*array2[2][0];
				resultArray[0][1] = array1[0][0]*array2[0][1]+array1[0][1]*array2[1][1]+array1[0][2]*array2[2][1];	
				resultArray[0][2] = array1[0][0]*array2[0][2]+array1[0][1]*array2[1][2]+array1[0][2]*array2[2][2];
				resultArray[1][0] = array1[1][0]*array2[0][0]+array1[1][1]*array2[1][0]+array1[1][2]*array2[2][0];
				resultArray[1][1] = array1[1][0]*array2[0][1]+array1[1][1]*array2[1][1]+array1[1][2]*array2[2][1];	
				resultArray[1][2] = array1[1][0]*array2[0][2]+array1[1][1]*array2[1][2]+array1[1][2]*array2[2][2];
				resultArray[2][0] = array1[2][0]*array2[0][0]+array1[2][1]*array2[1][0]+array1[2][2]*array2[2][0];
				resultArray[2][1] = array1[2][0]*array2[0][1]+array1[2][1]*array2[1][1]+array1[2][2]*array2[2][1];	
				resultArray[2][2] = array1[2][0]*array2[0][2]+array1[2][1]*array2[1][2]+array1[2][2]*array2[2][2];	

				return resultArray;
			}

			function multAllArrays() {
				var currentMult = mArrays[0];
				for (var i=1; i < mArrays.length; i++) {
					currentMult = multArray(currentMult, mArrays[i]);
				}
				return currentMult;
			}
		} else {
			matrixcells[0].value = parseFloat(document.getElementsByClassName("matrixsample")[0].rows[0].cells[0].children[0].value).toFixed(3);
			matrixcells[1].value = parseFloat(document.getElementsByClassName("matrixsample")[0].rows[0].cells[1].children[0].value).toFixed(3);
			matrixcells[2].value = parseFloat(document.getElementsByClassName("matrixsample")[0].rows[0].cells[2].children[0].value).toFixed(3);
			matrixcells[3].value = parseFloat(document.getElementsByClassName("matrixsample")[0].rows[1].cells[0].children[0].value).toFixed(3);
			matrixcells[4].value = parseFloat(document.getElementsByClassName("matrixsample")[0].rows[1].cells[1].children[0].value).toFixed(3);
			matrixcells[5].value = parseFloat(document.getElementsByClassName("matrixsample")[0].rows[1].cells[2].children[0].value).toFixed(3);

			transformcells[0].value = matrixcells[0].value;
			transformcells[1].value = matrixcells[3].value;	
			transformcells[2].value = matrixcells[1].value;		
			transformcells[3].value = matrixcells[4].value;		
			transformcells[4].value = matrixcells[2].value;		
			transformcells[5].value = matrixcells[5].value;		

			applyMatrix();			
		}
		
	};
	

	
	
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


   function defineOrigin() {
      var originString = "";
	  originString += hKeyword.options[hKeyword.selectedIndex].value + " " + vKeyword.options[vKeyword.selectedIndex].value;
	  outcomebox.style.transformOrigin = originString;

   }	
	
	
	
};