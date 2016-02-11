int relay = 8;
String string;
char karakter;
int aktif = 0;
int hari = 1;
long int jam, menit, detik;
long int pukul;
int durasi_bell = 8;

long int alaram[]=
{
  // cutting2,Jahit2,Toyota2, istirahat 10 menit
  second(0,0,0),  // 0. cutting2, jahit2, Toyota2 Istirahat 1
  second(0,35,0), // 1. cutting2, jahit2, Toyota2 persiapan masuk
  second(0,40,0), // 2. cutting2, jahit2, Toyota2 masuk
  
  //jahit2,toyota2,cutting2 istirahat subuh dilewati (manual)
  
  // Jahit2,Toyota2,Cutting2 Pulang
  second(5,30,0), // 3. jahit2, Pulang
  second(5,45,0), // 4. toyota2, Pulang
  second(5,55,0), // 5. cutting2, Pulang || Cutting1, jahit1 Persiapan masuk
  
  //cutting1, jahit1, toyota1, office masuk
  second(6,0,0),   // 6. cutting1, jahit1 masuk
  second(6,10,0),  // 7. toyota1 persiapan masuk
  second(6,15,0),  // 8. toyota1 masuk
  second(6,50,0),  // 9. office persiapan masuk
  second(7,0,0),  // 10. office masuk
  
  //cutting1, jahit1, toyota1, office istirahat 10 menit
  second(9,30,0), // 11. cutting1, jahit1, office istirahat
  second(9,36,0), // 12. cutting1, jahit1, office persiapan masuk
  second(9,40,0), // 13. cutting1, jahit1, office masuk || toyota1 istirahat
  second(9,46,0), // 14. toyota1 persiapan masuk
  second(9,50,0), // 15. toyota1 masuk
  
  //toyota1, cutting1, jahit1, office istirahat 50 menit
  second(11,20,0), // 16. toyota1 istirahat
  second(12,0,0),  // 17. cutting1, jahit1, office istirahat
  second(12,5,0),  // 18. toyota1 persiapan masuk
  second(12,10,0), // 19. toyota1 masuk
  second(12,45,0), // 20. cutting1, jahit1, office persiapan masuk
  second(12,50,0), // 21. cutting1, jahit1, office masuk
  
  //cutting1, jahit1, toyota1, office pulang
  second(15,0,0),  // 22. cutting1, jahit1 pulang
  second(15,15,0), // 23. toyota1 pulang
  second(16,0,0),  // 24. office pulang
  
  //cutting2, jahit2, toyota2 masuk
  second(20,25,0), // 25. cutting2, jahit2 persiapan masuk
  second(20,30,0), // 26. cutting2, jahit2 masuk
  second(20,40,0), // 27. toyota2, persiapan masuk
  second(20,45,0), // 28. toyota2, masuk
};

void setup()
{
  Serial.begin(9600);
  pinMode(relay, OUTPUT);
  digitalWrite(relay, HIGH);
  Serial.println("Ver. 2.1");
  Serial.println("Masukkan hari.jam.menit(contoh: 7.05.10)");
  delay(500);
}

void loop()
{
  if(aktif == 0)
  {
    cek_serial();
    return;
  }
  
  run_jam();
  cek_alaram();
  delay(1000);
}

void cek_serial()
{
  if(Serial.available())
  {
    karakter = (char)Serial.read();
    if(karakter != '\n')
    {
      string += karakter;
    }
    else
    {
      hari = string.substring(0).toInt();
      jam = string.substring(2,4).toInt();
      menit = string.substring(5).toInt();
      detik = 0;
      Serial.println("Setting Jam Berhasil");
      switch (hari)
      {
        case 1 :
        Serial.print("Senin, ");
        break;
        
        case 2 :
        Serial.print("Selasa, ");
        break;
        
        case 3 :
        Serial.print("Rabu, ");
        break;
        
        case 4 :
        Serial.print("Kamis, ");
        break;
        
        case 5 :
        Serial.print("Jumat, ");
        break;
        
        case 6 :
        Serial.print("Sabtu, ");
        break;
        
        case 7 :
        Serial.print("Minggu, ");
        break;
        
        
      }
      Serial.print(jam);
      Serial.print(":");
      Serial.print(menit);
      Serial.print(":");
      Serial.println(detik);
      pukul = second(jam,menit,detik);
      aktif = 1;
      string = "";
    }
  }
}

void run_jam()
{
  if(pukul < second(23,59,59))
  {
    pukul++;
  }
  else
  {
    pukul = 0;
    if(hari<7)
    {
      hari++;
    }
    else
    {
      hari = 1;
    }
  }
  
/*
  switch (hari)
      {
        case 1 :
        Serial.print("Senin:");
        break;
        
        case 2 :
        Serial.print("Selasa:");
        break;
        
        case 3 :
        Serial.print("Rabu:");
        break;
        
        case 4 :
        Serial.print("Kamis:");
        break;
        
        case 5 :
        Serial.print("Jumat:");
        break;
        
        case 6 :
        Serial.print("Sabtu:");
        break;
        
        case 7 :
        Serial.print("Minggu:");
        break;
      }
      
  Serial.print(pukul/3600);
  Serial.print(":");
  Serial.print((pukul%3600)/60);
  Serial.print(":");
  Serial.println(((pukul%3600)%60));
*/

}

void cek_alaram()
{
  int i = 0;
  while (i<29)
  {
    if(i==16)
    {
      if(hari==5)
      {
        i=22;
      }
    }
    
    if (pukul == alaram[i])
    {
      digitalWrite(relay, LOW);
      //Serial.println("Bel ON");
      return;
    }
    
    if (pukul == ( alaram[i] + durasi_bell ))
    {
      digitalWrite(relay, HIGH);
      //Serial.println("Bel OFF");
      return;
    }
    
    i++;
    
  }
}

long int second( long int x, long int y, long int z)
{
  long int hasil;
  hasil = (x*3600)+(y*60)+z;
  return hasil;
}
