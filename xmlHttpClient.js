/*			xmlHTTP Funcitons		*/
	var xmlHttp
		/*@cc_on @*/
	/*@if (@_jscript_version >= 5)
	  try {
	  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP")
	} catch (e) {
	  try {
		xmlHttp=new ActiveXObject("Microsoft.XMLHTTP")
	  } catch (E) {
	   xmlHttp=false
	  }
	}
	@else
	xmlHttp=false
	@end @*/
	if (!xmlHttp) {
		try {
		  xmlHttp = new XMLHttpRequest();
		}
		catch (e) {
		  xmlHttp=false
		}
	}
	
/*
		Arguments	
				URLto			:	Back End file Name
				xmlMessage		:	string to pass by post (name=value) pair
						e.g.	'action_code=getDesignation' + '&trea_code=3101&ddo_code=003264'
								
*/	
	//		BY POST METHOD
	function xmlHTTP_send_post(URLto, xmlMessage) {
		if(xmlHttp) {
			//var csrf_token=document.getElementsByName("__csrf_magic")[0].value;
			//xmlMessage = xmlMessage+"&__csrf_magic="+csrf_token;
			
			xmlHttp.open("POST", URLto, false)       
			xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
			xmlHttp.send(xmlMessage)
			//	alert(xmlMessage);
			return xmlHttp.responseText;
		} else {
			return '';
		}	
	}	
	
		//		BY GET METHOD
	function xmlHTTP_send_get(URLto, xmlMessage) {
		if(xmlHttp) {
			xmlHttp.open("GET", URLto, false)       
			//xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
			xmlHttp.send(null)
			return xmlHttp.responseText;
		} else {
			return '';
		}	
	}	
