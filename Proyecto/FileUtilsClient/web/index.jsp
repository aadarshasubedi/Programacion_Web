<%-- 
    Document   : index
    Created on : 19/04/2017, 06:40:59 AM
    Author     : Dario
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Carga de archivos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form method="POST" action="upload" enctype="multipart/form-data" >
            Archivo:
            <input type="file" name="file" id="file" /> <br/>
            Destino:
            <input type="text" value="/tmp" name="destination"/>
            </br>
            <input type="submit" value="Subir" name="upload" id="upload" />
        </form>
                
         <form method="GET" action="download">
            Indique el nombre del archivo que quiere descargar (con extension):
            <input type="text"  name="nombreArchivo"/>
            </br>
            <input type="submit" value="Descargar" name="download" id="download" />
        </form>
        
    </body>
</html>
