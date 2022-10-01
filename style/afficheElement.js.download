function afficheElt(idCheckBox, idElementAffiche) {		
			if (document.getElementById(idCheckBox).checked == true){
				document.getElementById(idElementAffiche).style.display="block";
				
			} else {
			 document.getElementById(idElementAffiche).style.display="none";
			}
}

function afficheElt2CheckBox(idCheckBox1, idCheckBox2, idElementAffiche) {	
			if (document.getElementById(idCheckBox1).checked == true || document.getElementById(idCheckBox2).checked == true){
				document.getElementById(idElementAffiche).style.display="block";
				
			} else {
			 document.getElementById(idElementAffiche).style.display="none";
			}
}

// Méthode d'affichage d'une div qui dépend de la sélection ou non de plusieurs checkboxes
// une ou plusierus checkboxes peuvent ne pas exister
// le premier argument est l'element à afficher, 
// les élements suivants sont les id des checkboxes à prendre en compte
function afficheEltCheckBoxAleatoires() {
	var nbElement = arguments.length;
	var afficher = false;
	if(arguments.length > 1) {
		for(var i=1; i< arguments.length; i++){
			var checkbox = document.getElementById(arguments[i]);
			if(checkbox == null){
				//si la checkbox n'existe pas, alors elle n'est pas sélectionnée
				afficher = afficher || false;
			}else{
				afficher = afficher || checkbox.checked;
			}
		}
		if (afficher){
			document.getElementById(arguments[0]).style.display="block";		
		} else {
			document.getElementById(arguments[0]).style.display="none";
		}
	}
}

function afficherAvertissement() {
	document.getElementById('loginIconeAttention').getElementsByTagName('img')[0].style.display = "";
	document.getElementById('loginMessageAttention').getElementsByTagName('p')[0].style.display = "";
	return true;
}
