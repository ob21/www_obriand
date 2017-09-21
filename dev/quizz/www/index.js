function init() {
	alert("index.js:init()");
	
	var xhr_object = null;
	
	if(window.XMLHttpRequest) // Firefox
	   xhr_object = new XMLHttpRequest();
	else if(window.ActiveXObject) // Internet Explorer
	   xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
	else { // XMLHttpRequest non supporté par le navigateur
	   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
	   return;
	}
	
	xhr_object.open("GET", "http://obriand.fr/dev/quizz/dataquizz.php", false);
	xhr_object.send(null);
	//if(xhr_object.readyState == 4) alert(xhr_object.responseText);
	
	alert(xhr_object.responseText);
	
	var doc = eval('(' + xhr_object.responseText + ')'); 
	
	displayquizz(doc);
}

function displayquizz(doc) {
	alert("index.js:displayquizz():"+doc[0].question);
	
	var id_quizz = doc[0].id;
	var theme = doc[0].theme;
	var question = doc[0].question;
	var reponseA = doc[0].reponse_a;
	var reponseB = doc[0].reponse_b;
	var reponseC = doc[0].reponse_c;
	var reponseD = doc[0].reponse_d;
	var indice = doc[0].indice;
	
	document.getElementById("themeDiv").innerHTML = "<p>"+theme+"</p>";
	document.getElementById("idDiv").innerHTML = id_quizz;
	document.getElementById("questionDiv").innerHTML = "<p>"+question+"</p>";
	document.getElementById("reponseADiv").innerHTML = "<p>"+reponseA+"</p>";
	document.getElementById("reponseBDiv").innerHTML = "<p>"+reponseB+"</p>";
	document.getElementById("reponseCDiv").innerHTML = "<p>"+reponseC+"</p>";
	document.getElementById("reponseDDiv").innerHTML = "<p>"+reponseD+"</p>";
	document.getElementById("indiceDiv").innerHTML = "<p>"+indice+"</p>";
	
} 

function xhr_sendreponse(rep) {
	alert("index.js:xhr_sendreponse()");
	alert("rep:"+rep);
	id_quizz=document.getElementById("idDiv").innerHTML;
	alert("id_quizz:"+id_quizz);
	
	var xhr_object = null;
	
	if(window.XMLHttpRequest) // Firefox
	   xhr_object = new XMLHttpRequest();
	else if(window.ActiveXObject) // Internet Explorer
	   xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
	else { // XMLHttpRequest non supporté par le navigateur
	   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
	   return;
	}
	
	xhr_object.open("POST", "http://obriand.fr/dev/quizz/datasetrepquizz.php", true);
	xhr_object.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xhr_object.send("idquizz="+id_quizz+"&rep"+rep+"=1");	
	//if(xhr_object.readyState == 4) alert(xhr_object.responseText);
	
	alert('reponse sent');

}

function xhr_getreponses() {
	alert("index.js:xhr_getreponses()");
	
	var xhr_object = null;
	
	if(window.XMLHttpRequest) // Firefox
	   xhr_object = new XMLHttpRequest();
	else if(window.ActiveXObject) // Internet Explorer
	   xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
	else { // XMLHttpRequest non supporté par le navigateur
	   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
	   return;
	}
	
	xhr_object.open("GET", "http://obriand.fr/dev/quizz/datagetrepquizz", false);
	xhr_object.send(null);
	//if(xhr_object.readyState == 4) alert(xhr_object.responseText);
	
	alert(xhr_object.responseText);
	
	var doc = eval('(' + xhr_object.responseText + ')'); 
	
	alert("d:"+doc[0].count);
	alert("c:"+doc[1].count);
	alert("b:"+doc[2].count);
	alert("a:"+doc[3].count);
}