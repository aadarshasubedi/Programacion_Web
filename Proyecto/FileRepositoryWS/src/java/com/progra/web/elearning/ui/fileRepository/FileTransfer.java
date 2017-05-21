/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.progra.web.elearning.ui.fileRepository;

import javax.jws.WebService;
import javax.jws.WebMethod;

/**
 * Servicio web cuenta con los metodos de ejemplo del servicio de descargay subida
 * @author Dario
 */
@WebService
public interface FileTransfer {
    //Metodo de subida 
    @WebMethod
    public void upload(String fileName, byte[] imageBytes, int Id_Curso, int Id_Recuro, String extension, int Id_Usuario);
     //metodo de descarga
    @WebMethod
    public byte[] download(String fileName);   
}