/* xmlHTTP Funcitons */
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

function xmlHTTP_send_post(URLto, xmlMessage) {


if(xmlHttp) {

//alert(URLto);
xmlHttp.open("POST", URLto, false);
xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

xmlHttp.send(xmlMessage);

return xmlHttp.responseText;
} else {
return '';
}
}

function xmlHttpRequest(URL)
{
// stores the reference to the XMLHttpRequest object
var xmlHttp = createXmlHttpRequestObject();

// retrieves the XMLHttpRequest object
function createXmlHttpRequestObject()
{
// will store the reference to the XMLHttpRequest object
var xmlHttp;
// if running Internet Explorer
if(window.ActiveXObject)
{
try
{
xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
}
catch (e)
{
xmlHttp = false;
}
}
// if running Mozilla or other browsers
else
{
try
{
xmlHttp = new XMLHttpRequest();
}
catch (e)
{
xmlHttp = false;
}
}
// return the created object or display an error message
if (!xmlHttp)

alert("Error creating the XMLHttpRequest object.");
else
return xmlHttp;
}

xmlHttp.open("POST",URL, false);
xmlHttp.send(null);
if(xmlHttp.status == 200)
{
return xmlHttp.responseText;
}
else
{
alert("There was a problem accessing the server: " + xmlHttp.statusText);
}
}
