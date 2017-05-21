package com.progra.DAO;

import com.mongodb.MongoClient;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoDatabase;
import static com.mongodb.client.model.Filters.eq;
import com.progra.conexion.Conexion;
import com.progra.modelo.Recurso;
import org.bson.Document;

public class DAO_Recurso {

    private static Conexion conexion;
    private static String coleccion;

    public DAO_Recurso() {
        conexion = Conexion.getInstancia();
        coleccion = "recurso";
    }

    public static void insert(Recurso recurso) {
        MongoClient conn = conexion.getConexion();
        MongoDatabase baseDatos = conexion.getDatabaseDb_Elearning(conn);
        MongoCollection<Document> collection = baseDatos.getCollection(coleccion);

        Document doc = new Document("nombre", recurso.getNombre())
                .append("extension", recurso.getExtension())
                .append("ruta", recurso.getRuta())
                .append("recurso", recurso.getRecurso())
                .append("curso", recurso.getCurso())
                .append("usuario", recurso.getUsuario());

        collection.insertOne(doc);
        conexion.cerrarConexion(conn);
    }

    public static void update(Recurso recurso) {
        MongoClient conn = conexion.getConexion();
        MongoDatabase baseDatos = conexion.getDatabaseDb_Elearning(conn);
        MongoCollection<Document> collection = baseDatos.getCollection(coleccion);

        collection.updateOne(eq("id", recurso.getId()),
                new Document("$set",
                        new Document("nombre", recurso.getNombre())
                                .append("extension", recurso.getExtension())
                                .append("ruta", recurso.getRuta())
                                .append("recurso", recurso.getRecurso()))
                                .append("curso", recurso.getCurso())
                                .append("usuario", recurso.getUsuario()));
        conexion.cerrarConexion(conn);
    }
    
    public static void delete(int id) {
        MongoClient conn = conexion.getConexion();
        MongoDatabase baseDatos = conexion.getDatabaseDb_Elearning(conn);
        MongoCollection<Document> collection = baseDatos.getCollection(coleccion);
        
        collection.deleteOne(eq("id", id));
        conexion.cerrarConexion(conn);
    }   

}
