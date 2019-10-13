function about(text) {
	if(text===1){
		document.getElementById('about-list').innerHTML="<ul><li>Pierwszy</li><li>Drugi</li><li>Trzeci</li></ul>";
	}
	if(text===2){
		document.getElementById('about-list').innerHTML="<ul><li>Drugi</li><li>Drugi</li><li>Trzeci</li></ul>";
	}
	if(text===3){
		document.getElementById('about-list').innerHTML="<ul><li>Trzeci</li><li>Drugi</li><li>Trzeci</li></ul>";
	}
	if(text===4){
		document.getElementById('about-list').innerHTML="<ul><li>Czwarty</li><li>Drugi</li><li>Trzeci</li></ul>";
	}
}