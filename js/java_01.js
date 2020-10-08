// JavaScript Document----------------------------------------------------------------------
							//			inicio do scrip desta secção -->
	
	var background=0;
	var el= "";
	var sound=0;
	var text=0;
	/*-------------------- função de click nos A----------*/
	function fundo(a){
		background=a;
		console.log(background);
		//esconde
			document.getElementById("A01").style.display="none";//esconde a primeiro A
			document.getElementById("A02").style.display="none";// o A nº2
			document.getElementById("A03").style.display="none";// o A nº3
			document.getElementById("CdC").style.display="none";// o texto
		//mostra o proximo
			document.getElementById("input01").style.display="none";
		
			document.getElementById("E01").style.display="inline";
			document.getElementById("E02").style.display="inline";
			document.getElementById("E03").style.display="inline";
			
	}
	/*-------------------funçao dos elementos------------*/

		var element=[];
	function imagens(a){
		if(typeof element === 'string'|| element instanceof String){
			element=element.split(",");
		}
		element[element.length] = a;
		console.log(element);
		//var array= ["","",""];
		element.toString();
		el=element;
	}
	/*-------------------funçao dos elementos------------*/
	function sons(a){
		sound= a;	
		console.log(sound);
		//ESCONDER
			document.getElementById("S01").style.display="none";
			document.getElementById("S02").style.display="none";
			document.getElementById("S03").style.display="none";
		//PROXIMOS ELEMENTOS
		//serão o fim
		
		
	}
 
