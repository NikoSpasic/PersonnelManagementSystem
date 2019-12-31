<?php 


/***********************************/
/********** CONFIGURATION **********/
/***********************************/
require_once("include/config.inc.php");
require_once("include/db.inc.php");
require_once("Class/User.class.php");

/*****************************************/
/********** DATABASE OPERATIONS **********/
/*****************************************/
$pdo = dbConnect();


/*****************************************/
/********** VARIABLE INITIALISATION ******/
/*****************************************/
$flag = null;
$korisnici = null;

/*****************************************************/

#Cita vrednost flaga prvog korisnika u tabeli (ako u tabeli postoji bar jedan korisnik)
#U suprotnom se na mestu korisnika u tabeli ispisuje $poruka
if(User::fetchAllUsersFromDb($pdo)) {
	$flag = User::fetchAllUsersFromDb($pdo)[0]->getFlag();
} else {
	return $poruka = 'Tabela u Bazi je prazna!';
}

#Prvi put nakon pokretanja skripte u Novoj godini
#Preracunavanje go i podizanje flag-a za +1
if($flag && date("Y") > $flag) {
	User::updateYear($pdo);
}

#Uhvaceni asocijativni niz sa svim radnicima smesta u var $korisnici
$korisnici = User::fetchAllUsersFromDb($pdo);







