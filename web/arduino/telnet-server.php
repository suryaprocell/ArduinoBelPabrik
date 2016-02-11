<?php
$host   = '192.168.2.219';
$port   = '10000';
//$user   = 'User';
//$pass   = 'Pass';
$socket = fsockopen($host, $port) or die('Could not connect to: '.$host);

fputs($socket, "help \n"); //kirim pesan "help" ke telnet server

// "Endless" loop
while(1)
 {
  while($line = fgets($socket, 1024)) //terima pesan dari telnet server
   {

	echo $line; 
	// Code to deal with the output.
	//switch($line)
	 //{
	  //case 'user:'
	   //fputs($socket, $user."\r\n");
	  //break;

	  //case 'password:'
	   //fputs($socket, $pass."\r\n");
	  //break;
	 
	 //default:
	  // More code..
   }
 }


