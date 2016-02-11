int relay = 8;
int fingerprint = A0;

long int time_high = 0;
long int time_low = 0;
int fingerprint_val;
int val;
int state;

void setup()
{
  Serial.begin(9600);
  pinMode(relay, OUTPUT);
  digitalWrite(relay, HIGH);
}

void loop()
{
  cek_input();
  proses();
  delay(1);
}

void cek_input()
{
  val = analogRead(fingerprint);
  if(val > 40)
  {
    fingerprint_val = HIGH;
  }
  else
  {
    fingerprint_val = LOW;
  }
}

void proses()
{
  if(fingerprint_val==HIGH)
  {
    time_high++;
    time_low = 0;
    state = 1;
  }
  
  if( (fingerprint_val==LOW) && (state==1) )
  {
    if(time_low <= 2000)
    {
      time_low++;
    }
    else
    {
      Serial.println(time_high);
      
      if(time_high > 1500)
      {
        digitalWrite(relay, LOW);
        delay(8000);
        digitalWrite(relay, HIGH);
      }
      
      state = 0;
      time_high = 0;
    }
  }
}
