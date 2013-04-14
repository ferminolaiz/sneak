function togglev(){
	if(document.getElementsByTagName("ol")[0].style.listStyle.substr(0,4)=="none")
	{
		document.getElementsByTagName("ol")[0].style.listStyle="decimal";
		document.getElementsByTagName("ol")[0].style.paddingLeft="40px"
		document.getElementsByClassName("de1")[0].style.borderLeft = "1px solid rgb(204, 204, 204)"
	}else{
		document.getElementsByTagName("ol")[0].style.listStyle="none";
		document.getElementsByTagName("ol")[0].style.paddingLeft="0px"
		document.getElementsByClassName("de1")[0].style.border = "0px"
	}
}
function contenido_res()
{
	var text = document.getElementById("res_text").innerHTML.trim();
	text = text.replace(/(<([^>]+)>)/ig,"");
	return text;
}
