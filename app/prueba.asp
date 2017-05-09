<%Option Explicit

    Dim objRequest, objXMLDoc, objXmlNode

    Dim strRet, strError, strNome

    Dim strName

    strName= "deepa"

    Set objRequest = Server.createobject("MSXML2.XMLHTTP")

    With objRequest

    .open "GET", "http://localhost:3106/WebService1.asmx/HelloWorld?name=" & strName, False

    .setRequestHeader "Content-Type", "text/xml"

    .setRequestHeader "SOAPAction", "http://localhost:3106/WebService1.asmx/HelloWorld"

    .send

    End With

    Set objXMLDoc = Server.createobject("MSXML2.DOMDocument")

    objXmlDoc.async = false

    Response.ContentType = "text/xml"

    Response.Write(objRequest.ResponseText)

    %>
