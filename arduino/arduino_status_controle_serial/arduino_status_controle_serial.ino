#define RELE 8
#define TIME_SINC 1000
#define LIGAR 'a'
#define DESLIGAR 'd'

boolean botaoStatus = false;
boolean ledStatus = false;
char leituraSerial;
unsigned long int lastExecuteTime = 0;
unsigned long int currentExecuteTime = 0;

void ligaRele(char);
 
void setup() {
  Serial.begin(9600); //Inicia serial 
  pinMode(RELE, OUTPUT); //led como saida
}

void loop() {
  if(Serial.available() > 0){
    ligaRele(Serial.read());
  }

  currentExecuteTime = (millis() - lastExecuteTime);
  if (currentExecuteTime > TIME_SINC) {
    Serial.print("$STS,");
    Serial.print(botaoStatus);
    Serial.print(",");
    Serial.print(ledStatus);
    Serial.print(",");
    Serial.println();
    lastExecuteTime = millis();
  }
  delay(10);
}

void ligaRele(char leituraSerial) {
  if(leituraSerial == LIGAR and ledStatus == false){
    digitalWrite(RELE,HIGH);
    ledStatus = true;
  }
  if(leituraSerial == DESLIGAR and ledStatus == true){
    digitalWrite(RELE,LOW);
    ledStatus = false;
  }
}
