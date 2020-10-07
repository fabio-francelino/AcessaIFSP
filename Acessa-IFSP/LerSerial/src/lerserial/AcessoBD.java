/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package lerserial;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;

/**
 *
 * @author fabio
 */
public class AcessoBD {
   
private String pedidoSQL;
private String dado;
private String horario;

private Connection con = null;
private Statement stmt = null;

public AcessoBD() {
    System.out.println("ler passo3");
        try {
            //Class.forName("com.mysql.jdbc.Driver");
            Class.forName("org.gjt.mm.mysql.Driver");
            System.out.println("AcessoBD> Estabelecendo a conexão com o BD...");
            con = DriverManager.getConnection("jdbc:mysql://localhost/acessaifsp?user=root&password=");
            System.out.println("AcessoBD> Conexao bem sucedida.");
            stmt = con.createStatement();
        } catch (ClassNotFoundException cnfe) {
            System.out.println("Excessao de classe nao encontrada.\n"+cnfe);
        } catch (SQLException sqle) {
            sqle.printStackTrace();
            System.out.println("Excessao de conexao ao banco.");
        } catch (Exception e){
            System.out.println(e.getMessage());
        }
    }

    public void executaPedido(String pedido) {
        
        this.pedidoSQL = pedido;
        try {
            int execUpdate = stmt.executeUpdate(pedidoSQL);
        } catch (SQLException sqle) {
            System.out.println("Excessao: " + sqle.toString());
        }
    }
}
