"use strict";




window.onload = function() {

	var m1 = document.querySelectorAll("table#matrix1 input");
	var m2 = document.querySelectorAll("table#matrix2 input");
	var m3 = document.querySelectorAll("table#matrix3 input");
	var allInputs = document.querySelectorAll("table input");
	var summaryM1 = document.querySelectorAll("table#summary tr td:first-of-type");
	var summaryM2 = document.querySelectorAll("table#summary tr td:nth-of-type(3)");
	var summaryM1M2 = document.querySelectorAll("table#summary tr td:nth-of-type(5)");	
	var summaryAll = document.querySelector("table#summary tr:last-of-type td:last-of-type");	
	var k, m, i, rowsum;
	
	document.getElementById("start").onclick = function() {
		document.getElementById("start").disabled = true;
		document.getElementById("mmult").disabled = false;
		k=-1;
		document.getElementById("summary").style.visibility = "visible";		
		for (var i=0; i < 3; i++) {
			summaryM1[i].textContent = "";
			summaryM2[i].textContent = "";	
			summaryM1M2[i].textContent = "";			
		}
		for (i=0; i<9; i++) {
			m3[i].value="";
		}
		summaryAll.textContent = "";
		document.getElementById("mmult").click();
	};
		
	document.getElementById("mmult").onclick = function() {
		k++;
		if (k <= 8) {
			m=3*Math.floor(k/3);
			i=k%3;
			resetColor();

			rowsum=0;				
			for (var j=0; j<3; j++) {
				m1[j+m].style.backgroundColor="hsl(60, 70%, 85%)";
				m2[3*j+i].style.backgroundColor="hsl(190, 70%, 85%)";			
				rowsum += m1[j+m].value*m2[3*j+i].value ;
				summaryM1[j].textContent=m1[j+m].value;
				summaryM2[j].textContent=m2[3*j+i].value;
				summaryM1M2[j].textContent = m1[j+m].value*m2[3*j+i].value;

			}
			m3[k].style.backgroundColor="hsl(120, 70%, 85%)";
			m3[k].value=rowsum;
			summaryAll.textContent = rowsum;
		} else {
			document.getElementById("summary").style.visibility = "hidden";
			document.getElementById("start").disabled = false;
			document.getElementById("mmult").disabled = true;			
			resetColor();
		}
	};
	
	function resetColor() {
		for (var i=0; i<allInputs.length; i++) {
			allInputs[i].style.backgroundColor="";
		}
	}
	
};