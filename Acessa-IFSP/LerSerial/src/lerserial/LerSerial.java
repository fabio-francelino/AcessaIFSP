package lerserial;

/**
 *
 * @author fabio
 */
public class LerSerial extends SerialCOMq {  
  
public static void main(String[] args){  
    
    System.out.println("Passo1");
    
    SerialCOMq_wr leitura = new SerialCOMq_wr("COM3", 9600, 0);
    leitura.HabilitarLeitura();
    leitura.ObterIdDaPorta();
    leitura.AbrirPorta();
    leitura.LerDados();
            
    
    
 //Controle de tempo da leitura aberta na serial

       /* try {

            Thread.sleep(5000);
            System.out.println("Fechar Com");

        } catch (InterruptedException ex) {

            System.out.println("Erro na Thread: " + ex);

        }

        leitura.FecharCom();
*/
    }

}
