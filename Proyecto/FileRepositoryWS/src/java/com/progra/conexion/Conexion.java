package com.progra.conexion;

import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.MongoException;
import com.mongodb.client.MongoDatabase;

public class Conexion {
    private final String ruta;
    private final int puerto;
    private final String database_bd_elearning;
    
    private static Conexion instancia;
    
    private Conexion() {
        this.ruta = "localhost";
        this.puerto = 27017;
        this.database_bd_elearning = "bd_elearning";
    }
    
    public static Conexion getInstancia() {
        if (instancia == null) {
            instancia = new Conexion();
        }
        return instancia;
    }

    public MongoClient getConexion() {
        MongoClient conn = null;
        MongoClientURI connectionString = null;

        try {
            connectionString = new MongoClientURI("mongodb://" + ruta + ":" + puerto);
            conn = new MongoClient(connectionString);

        } catch (MongoException e) {
            e.printStackTrace(System.err);
        }

        return conn;
    }    
    
    public MongoDatabase getDatabaseDb_Elearning(MongoClient conn) {
        MongoDatabase baseDatos = null;

        try {
            baseDatos = conn.getDatabase(database_bd_elearning);
        } catch (MongoException e) {
            e.printStackTrace(System.err);
        }

        return baseDatos;
    }
    
    public void cerrarConexion(MongoClient conn) {
        try {
            conn.close();
        } catch (MongoException e) {
            e.printStackTrace(System.err);
        }
    }    
    
}
