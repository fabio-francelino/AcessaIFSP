/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package lerserial;
import gnu.io.CommPortIdentifier;
import gnu.io.SerialPort;
import gnu.io.SerialPortEvent;
import gnu.io.SerialPortEventListener;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author fabio
 */
public class SerialCOMq_wr implements Runnable, SerialPortEventListener {
 
    public String Dadoslidos;
    public int nodeBytes;
    private int baudrate;
    private int timeout;
    private CommPortIdentifier cp;
    private SerialPort porta;
    private OutputStream saida;
    private InputStream entrada;
    private Thread threadLeitura;
    private boolean IDPortaOK;
    private boolean PortaOK;
    private boolean Leitura;
    private boolean Escrita;
    private String Porta;
    protected String dado;
    private AcessoBD acessobd;
    private String pedidoSQL;

    SerialCOMq_wr() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
    
    public String getDado() {
        return dado;
    }
 
    public void setDado(String dado) {
        this.dado = dado;
    }
 
    /*public void setPorta(String p){
        this.Porta = p;
    }
 
    public boolean getEscrita(){
        return Escrita;
    }
 
    public boolean getLeitura(){
        return Leitura;
    }*/
 
    public SerialCOMq_wr(String p, int b, int t) {
        this.Porta = p;
        this.baudrate = b;
        this.timeout = t;
    }
    
 
    public void HabilitarEscrita() {
        Escrita = true;
        Leitura = false;
        
    }
 
    public void HabilitarLeitura() {
        Escrita = false;
        Leitura = true;
        //System.out.println("Habilitado");
    }
    //Obtem o Id da porta
    public void ObterIdDaPorta() {
        try {
            System.out.println("Passo2");
            cp = CommPortIdentifier.getPortIdentifier(Porta);
            if (cp == null) {
                System.out.println("Erro na porta");
                IDPortaOK = false;
                System.exit(1);
            }
            IDPortaOK = true;
        } catch (Exception e) {
            System.out.println("Erro obtendo ID da porta:" + e);
            IDPortaOK = false;
            System.exit(1);
        }
    }
    //Abre cominicaçao da porta escolhida
    public void AbrirPorta() {
        //System.out.println("abri porta");
        try {
            porta = (SerialPort) cp.open("SerialCOMq_wr", timeout);
            PortaOK = true;
    //configurar parâmetros
            porta.setSerialPortParams(baudrate, 
            SerialPort.DATABITS_8,
            SerialPort.STOPBITS_1,
            SerialPort.PARITY_NONE);
            porta.setFlowControlMode(SerialPort.FLOWCONTROL_NONE);
        } catch (Exception e) {
            PortaOK = false;
            System.out.println("Erro abrindo comunicação: " + e);
            System.exit(1);
        }
    }
 
    public void LerDados() {
        //System.out.println("ler passo3");
        if (Escrita == false) {
            try {
                entrada = porta.getInputStream();
            } catch (Exception e) {
                System.out.println("Erro de stream: " + e);
                System.exit(1);
            }
            try {
                porta.addEventListener(this);
            } catch (Exception e) {
                System.out.println("Erro de listener: " + e);
                System.exit(1);
            }
            porta.notifyOnDataAvailable(true);
            try {
                threadLeitura = new Thread(this);
                threadLeitura.start();
                run();
            } catch (Exception e) {
                System.out.println("Erro de Thred: " + e);
            }
        }
    }
 
    public void EnviarUmaString(String msg) {
        if (Escrita == true) {
            try {
                saida = porta.getOutputStream();
                System.out.println("FLUXO OK!");
            } catch (Exception e) {
                System.out.println("Erro.STATUS: " + e);
            }
            try {
                System.out.println("Enviando um byte para " + Porta);
                System.out.println("Enviando : " + msg);
                saida.write(msg.getBytes());
                Thread.sleep(100);
                saida.flush();
            } catch (Exception e) {
                System.out.println("Houve um erro durante o envio. ");
                System.out.println("STATUS: " + e);
                System.exit(1);
            }
        } else {
            System.exit(1);
        }
    }
 
    @Override
    public void run() {
        try {
            Thread.sleep(5);
            }catch (Exception e) {
            System.out.println("Erro de Thred: " + e);
        }
    }
    //Este método monitora e obtem os dados da porta
    @Override
    public void serialEvent(SerialPortEvent ev) {
        System.out.println(ev.getEventType() );
        StringBuffer bufferLeitura = new StringBuffer();
        int novoDado = 0;
        switch (ev.getEventType()) {
            case SerialPortEvent.BI:
            case SerialPortEvent.OE:
            case SerialPortEvent.FE:
            case SerialPortEvent.PE:
            case SerialPortEvent.CD:
            case SerialPortEvent.CTS:
            case SerialPortEvent.DSR:
            case SerialPortEvent.RI:
            case SerialPortEvent.OUTPUT_BUFFER_EMPTY:
                break;
            case SerialPortEvent.DATA_AVAILABLE:
        //Algortimo de leitura
                while (novoDado != -1) {
                   // System.out.println("DataAv");
                    try {
                        novoDado = entrada.read();
                        if (novoDado == -1) {
                            break;
                        }
                        if (';' == (char) novoDado) {
                            bufferLeitura.append('\n');
                            break;
                        } else {
                            bufferLeitura.append((char) novoDado);
//                            System.out.println(bufferLeitura);
                        }
                    } catch (IOException ioe) {
                        System.out.println("Erro de leitura serial: " + ioe);
                    }
                }
                setDado(new String(bufferLeitura));
                bufferLeitura = new StringBuffer();
                //System.out.println(getDado());
                recebeuDado();
                break;
        }
    }
    //Método para conferir se recebeu dados
    public void recebeuDado(){
        String dado = getDado();
        if(dado != null){
            System.out.print(getDado()+"\n");
            
            acessobd = new AcessoBD();
            pedidoSQL = "insert into registro (cartao, prontuario) SELECT cartao, prontuario FROM aluno WHERE cartao='"+ getDado() + "'";
            acessobd.executaPedido(pedidoSQL);
            try {
                Thread.sleep(3000);
            } catch (InterruptedException ex) {
                Logger.getLogger(SerialCOMq_wr.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }
 
    //Metodo para fechar a porta COMq
    public void FecharCom() {
        try {
            porta.close();
            System.out.println("Porta "+this.Porta+" fechada");
        } catch (Exception e) {
            System.out.println("Erro fechando porta: " + e);
            System.exit(0);
        }
    }
 
    public String obterPorta() {
        return Porta;
    }
 
    public int obterBaudrate() {
        return baudrate;
    }
}

