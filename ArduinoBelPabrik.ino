#include <SPI.h>
#include <Ethernet.h>

byte mac[] = { 0x00, 0x00, 0x00, 0x00, 0x00, 0x01 };
IPAddress ip(192, 168, 2, 218);
IPAddress gateway(192, 168, 2, 1);
IPAddress subnet(255, 255, 255, 0);

EthernetClient client;

String msg, data;
char karakter;
int konek = 0;
int relay = 8;
long int string;
int durasi_bell = 8000;

void setup()
{
  Serial.begin(9600);
  delay(1000);
  Ethernet.begin(mac, ip, gateway, subnet);
  delay(1000);
  pinMode(relay, OUTPUT);
  digitalWrite(relay, HIGH);
}

void loop()
{
  while(konek==0)
  {
    delay(10000);
    post("a");
  }
  
  if (!client.connected()) {
    Serial.println("No Reply!!!");
    Serial.println("disconnecting...");
    client.stop();
    konek=0;
  }
  else{
    cek_server();
  }
  
}

void post(String data)
{
  //Serial.println(data);
  Serial.println();
  Serial.println("connecting...");
  //if (client.connect("gran-handa.co.id", 80))
  if (client.connect("192.168.2.4", 80))
  {
    client.println("POST /arduino/bel_otomatis.php HTTP/1.1");
    //client.println("Host: gran-handa.co.id");
    client.println("Host: 192.168.2.4");
    client.println("Content-Type: application/x-www-form-urlencoded");
    client.print("Content-Length: ");
    client.println(data.length());
    client.println();
    client.println(data);
    client.println("Connection: close");
    konek=1;
    Serial.println("connected");
  } 
  else
  {
    Serial.println("connection failed");
    client.stop();
  }
}

void cek_server()
{
  if(client.available())
  {
    char c = client.read();
    //Serial.print(c);
    if(c != 'x')
    {
      msg += c;
    }
    else
    {
      if(msg.startsWith("data"))
      {
        client.stop();
        
        string = msg.substring(4).toInt();
        //Serial.println("Bel berikutnya:");
        //Serial.print(string/3600);
        //Serial.print(":");
        //Serial.print((string%3600)/60);
        //Serial.print(":");
        //Serial.println(((string%3600)%60));
        
        if(string != 0)
        {
          Serial.print("Waiting ");
          Serial.print(string);
          Serial.println(" Second before bell");
          bell();
        }
        else
        {
          Serial.println("No bell");
          konek=0;
        }
        
      }
      msg = "";
    }
  }
}

void bell()
{
  delay(string*1000);
  
  digitalWrite(relay, LOW);
  Serial.println("ON");
  
  delay(durasi_bell);
  
  digitalWrite(relay, HIGH);
  Serial.println("OFF");
  konek = 0;
}
