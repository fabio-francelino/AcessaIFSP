#include <SPI.h>
#include <MFRC522.h>

#define SS_PIN 10
#define RST_PIN 9
MFRC522 mfrc522(SS_PIN, RST_PIN);    // Cria um objeto MFRC522.

void setup() {
    Serial.begin(9600); // Inicia a comunicação serial com o PC.
    SPI.begin();        // Inicia o controlador SPI
    mfrc522.PCD_Init(); // Inicia o cartão MFRC522

}

void loop() {
// Procura por novos cartões.
if ( ! mfrc522.PICC_IsNewCardPresent()) {
delay(2500);
return;
}

// Seleciona um dos cartões.
if ( ! mfrc522.PICC_ReadCardSerial()) {
return;
}
    for (byte i = 0; i < mfrc522.uid.size; i++) {
        Serial.print(mfrc522.uid.uidByte[i], HEX);
 } 
}
