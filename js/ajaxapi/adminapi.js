function loadPaper(dept)
{
	var sec = document.getElementById('paperList');
	if (window.XMLHttpRequest)
  	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
 	{// code for IE6, IE5
 		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	xmlhttp.onreadystatechange=function()
  	{

  		if (xmlhttp.readyState==4 && xmlhttp.status==200)
    		{
				sec.innerHTML=xmlhttp.responseText;
    		}
  	}
	var addr="../ajaxApi/papers/"+dept;
	xmlhttp.open("GET",addr,true);
	xmlhttp.send();	
	sec.innerHTML='<option>Loading . . .<option>';
}/**/
