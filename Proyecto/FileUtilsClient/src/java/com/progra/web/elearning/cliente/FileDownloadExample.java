/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.progra.web.elearning.cliente;

import java.io.ByteArrayInputStream;
import java.io.IOException;
import java.io.InputStream;
import java.util.logging.Logger;
import javax.servlet.ServletException;
import javax.servlet.ServletOutputStream;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Dario
 */
@WebServlet(name = "FileDownloadServlet", urlPatterns = {"/download"})
public class FileDownloadExample extends HttpServlet {

    private final static Logger LOGGER
            = Logger.getLogger(FileDownloadExample.class.getCanonicalName());

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        final String nombreArchivo = request.getParameter("nombreArchivo");

        com.progra.web.elearning.ui.filerepository.FileTransferImplService service = new com.progra.web.elearning.ui.filerepository.FileTransferImplService();
        com.progra.web.elearning.ui.filerepository.FileTransferImpl port = service.getFileTransferImplPort();
        //obtiene el archivo del repositorio del servicio web, enviando el nombre con su extension
        byte[] data = port.download(nombreArchivo);
        //crea el encabezado para enviar el archivo de bytes como un adjunto
          response.setContentType("application/octet-stream");
        response.setHeader("Content-Disposition","attachment;filename=" + nombreArchivo );

        InputStream in = new ByteArrayInputStream(data);
        ServletOutputStream out = response.getOutputStream();

        byte[] outputByte = new byte[4096];
        //lee el archivo para ingresar los bytes en la descarga
        while (in.read(outputByte, 0, 4096) != -1) {
            out.write(outputByte, 0, 4096);
        }
        in.close();
        out.flush();
        out.close();

    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
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
     * Handles the HTTP <code>POST</code> method.
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
