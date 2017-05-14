/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.progra.web.elearning.cliente;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.io.PrintWriter;
import java.io.UnsupportedEncodingException;
import java.net.URLDecoder;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.ServletException;
import javax.servlet.annotation.MultipartConfig;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.Part;

/**
 *
 * @author Dario
 */
@WebServlet(name = "FileUploadServlet", urlPatterns = {"/upload"})
@MultipartConfig
public class FileUploadExample extends HttpServlet {

    private final static Logger LOGGER =
            Logger.getLogger(FileUploadExample.class.getCanonicalName());

    /**
     * Processes requests for both HTTP
     * <code>GET</code> and
     * <code>POST</code> methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");

        // Crea los componentes del sistema para guardar el archivo
        final String path = request.getParameter("destination");
        //el archivo se obtiene de un formulario multipart
        final Part filePart = request.getPart("file");
        final String fileName = getFileName(filePart);
        //El metodo getPath obtiene la ruta fisica del servidor basado en el espacio de clases
        String finalPath = getPath() + File.separator + path + File.separator + fileName;

        OutputStream out = null;
        InputStream filecontent = null;
        final PrintWriter writer = response.getWriter();

        try {
            out = new FileOutputStream(finalPath);
            filecontent = filePart.getInputStream();

            int read = 0;
            final byte[] bytes = new byte[1024];

            while ((read = filecontent.read(bytes)) != -1) {
                out.write(bytes, 0, read);
            }
            writer.println("Nuevo archivo " + fileName + " creado en la ruta " + path);
            LOGGER.log(Level.INFO, "Archivo{0} ha sido cargado en {1}",
                    new Object[]{fileName, path});


        } catch (FileNotFoundException fne) {
            writer.println("usted no especifico la ruta del archivo o  "
                    + "esta intentando subir un archivo protegido o inexistente ");
            writer.println("<br/> ERROR: " + fne.getMessage());

            LOGGER.log(Level.SEVERE, "Problemas durante la subida del archivo. Error: {0}",
                    new Object[]{fne.getMessage()});
        } finally {
            if (out != null) {
                out.close();

                //subir al servicio web
                Path pathFinal = Paths.get(finalPath);
                byte[] data = Files.readAllBytes(pathFinal);


                com.progra.web.elearning.ui.filerepository.FileTransferImplService service = new com.progra.web.elearning.ui.filerepository.FileTransferImplService();
                com.progra.web.elearning.ui.filerepository.FileTransferImpl port = service.getFileTransferImplPort();
                //metodo del servicio web que hace la subida del archivo
                port.upload(fileName, data);
                
            }
            if (filecontent != null) {
                filecontent.close();
            }
            if (writer != null) {
                writer.close();
            }
            //Una vez subido al repositorio, borrelo de la carpeta tmp
             File borrarArchivo = new File(finalPath);                                              
             boolean borrar = borrarArchivo.delete();
             if(borrar){
                 LOGGER.log(Level.INFO, "Archivo{0} ha sido borrado de {1}",
                    new Object[]{fileName, path});
             }
            
        }
    }

    /**
     * Metodo que separa el nombre del archivo de su extension
     * @param part
     * @return 
     */
    private String getFileName(final Part part) {
        final String partHeader = part.getHeader("content-disposition");
        LOGGER.log(Level.INFO, "Part Header = {0}", partHeader);
        for (String content : part.getHeader("content-disposition").split(";")) {
            if (content.trim().startsWith("filename")) {
                return content.substring(
                        content.lastIndexOf('\\') + 1).trim().replace("\"", "");
            }
        }
        return null;
    }

    /**
     * Metodo que obtiene la ruta fisica del proyecto, basado en la carpeta de classes
     * @return
     * @throws UnsupportedEncodingException 
     */
    public String getPath() throws UnsupportedEncodingException {
        String path = this.getClass().getClassLoader().getResource("").getPath();
        String fullPath = URLDecoder.decode(path, "UTF-8");
        String pathArr[] = fullPath.split("/WEB-INF/classes/");
        fullPath = pathArr[0];
        String webFolder = fullPath.substring(fullPath.lastIndexOf("/"));
        fullPath = fullPath.substring(fullPath.indexOf("/"), fullPath.lastIndexOf("/"));
        fullPath = fullPath.substring(fullPath.indexOf("/"), fullPath.lastIndexOf("/"))
                + webFolder;
        String reponsePath = "";
// to read a file from webcontent
        reponsePath = new File(fullPath).getPath() + File.separatorChar;
        return reponsePath;
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP
     * <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP
     * <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>
}
