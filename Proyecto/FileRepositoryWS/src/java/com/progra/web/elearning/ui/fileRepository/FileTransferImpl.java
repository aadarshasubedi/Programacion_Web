/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package com.progra.web.elearning.ui.fileRepository;

import com.progra.DAO.DAO_Recurso;
import com.progra.modelo.Recurso;
import java.io.BufferedInputStream;
import java.io.BufferedOutputStream;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import javax.jws.WebMethod;
import javax.jws.WebService;
import javax.xml.ws.WebServiceException;
import javax.xml.ws.soap.MTOM;

/**
 * Servicio web con objeto de implementacion donde esta los metodos de subida y descarga implementados
 * MTOM es una anotacion propia de servicios web JAX-WS 
 * @author Dario
 */
@MTOM
@WebService
public class FileTransferImpl implements FileTransfer {
    @WebMethod
    public void upload(String fileName, byte[] imageBytes, int Id_Curso, int Id_Recuro, String extension, int Id_Usuario) {
         //supone que hay un repositorio en el servidor donde almacenar los videos
        String filePath = "c:/repositorio" + File.separator + fileName;
        Recurso recurso = new Recurso();
        DAO_Recurso dao_recurso = new DAO_Recurso();
        recurso.setCurso(Id_Curso);
        recurso.setRecurso(Id_Recuro);
        recurso.setExtension(extension);
        recurso.setNombre(fileName);
        recurso.setRuta("c:/repositorio");
        recurso.setUsuario(Id_Usuario);
                    dao_recurso.insert(recurso);
                 
        try {
            //recibe el archivo en bytes
            FileOutputStream fos = new FileOutputStream(filePath);
            BufferedOutputStream outputStream = new BufferedOutputStream(fos);
            outputStream.write(imageBytes);
            outputStream.close();
            
            
            System.out.println("Received file: " + filePath);
             
        } catch (IOException ex) {
            System.err.println(ex);
            throw new WebServiceException(ex);
        }
    }
     
    @WebMethod
    public byte[] download(String fileName) {
        //supone que hay un repositorio en el servidor donde almacenar los videos
        String filePath = "c:/repositorio" + File.separator + fileName;
        System.out.println("Sending file: " + filePath);
         
        try {
            //lee el archivo del repositorio
            File file = new File(filePath);
            FileInputStream fis = new FileInputStream(file);
            BufferedInputStream inputStream = new BufferedInputStream(fis);
            byte[] fileBytes = new byte[(int) file.length()];
            inputStream.read(fileBytes);
            inputStream.close();
            //regresa el archivo completo 
            return fileBytes;
        } catch (IOException ex) {
            System.err.println(ex);
            throw new WebServiceException(ex);
        }      
    }
}
