function showContent(link){
	var cont = document.getElementById('rate');
	var loading = document.getElementById('loading');

	cont.innerHTML = loading.innerHTML;

	var http = createRequestObject();
	if(http){
		http.open('post', link);
		http.onreadystatechange = function(){
			if(http.readyState == 4){
				cont.innerHTML = http.responseText;
			}
		}
		http.send(null);
	} else {
		document.location = link;
	}
}

function createRequestObject(){
	try{return new XMLHttpRequest()}
	catch(e){
		try {return new ActiveXObject('Msxm12.XMLHTTP')}
		catch(e){
			try {return new ActiveXObject('Microsoft.XMLHTTP')}
			catch(e) {return null;}
		}
	}
}