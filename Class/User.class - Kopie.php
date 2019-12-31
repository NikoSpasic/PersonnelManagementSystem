<?php 

class User 
{
	
	/*******************************/
	/********** PROPERTIES *********/
	/*******************************/
	
	protected $id;
	protected $ime_radnika;
	protected $go_novi;
	protected $go_prosla_godina;
	protected $go_preprosla_godina;

	/***********************************************************/
	
	
	/*********************************/
	/********** CONSTRUCTOR **********/
	/*********************************/

		
	
	/***********************************************************/

	
	/*************************************/
	/********** GETTER & SETTER **********/
	/*************************************/

	/********** USR_ID **********/
	public function getUsr_id() {
		return $this->usr_id;
	}
	/*******************************/
	
	/********** IME_RADNIKA *********/
	public function getImeRadnika() 
	{
		return $this->ime_radnika;
	}
	public function setImeRadnika($value) 
	{

		$value = trim($value);
		$value = htmlspecialchars( $value, ENT_QUOTES | ENT_HTML5 );
		if( !$value ) {
			$value = NULL;
		}
		
		$this->ime_radnika = $value;
	}
	/*******************************/
	/*******************************/
	
	/********** GO_NOVI **********/
	public function getGoNovi() {
		return $this->go_novi;
	}
	public function setGoNovi($value) 
	{

		$value = trim($value);
		$value = htmlspecialchars( $value, ENT_QUOTES | ENT_HTML5 );
		if( !$value ) {
			$value = NULL;
		}
		
		$this->go_novi = $value;
	}
	/*******************************/
	/*******************************/
	
	/********** GO_PROSLA_GODINA ***/
	public function getGoProslaGodina() {
		return $this->go_prosla_godina;
	}
	public function setGoProslaGodina($value) 
	{

		$value = trim($value);
		$value = htmlspecialchars( $value, ENT_QUOTES | ENT_HTML5 );
		if( !$value ) {
			$value = NULL;
		}
		
		$this->go_prosla_godina = $value;
	}
	/*******************************/
	/*******************************/
	
	/********** GO_PREPROSLA_GODINA ***/
	public function getGoPreproslaGodina() {
		return $this->go_preprosla_godina;
	}
	public function setGoPreproslaGodina($value) 
	{

		$value = trim($value);
		$value = htmlspecialchars( $value, ENT_QUOTES | ENT_HTML5 );
		if( !$value ) {
			$value = NULL;
		}
		
		$this->go_preprosla_godina = $value;
	}
	/*******************************/


	/*************************************/
	/********** METHODS ******************/
	/*************************************/

	public static function fetchAllUsersFromDb($pdo)
	{
		$users = [];
		$sql = "SELECT * FROM urlaub";						

		$statement = $pdo->query($sql);	
		$statement->execute();
					
		while($row = $statement->fetch(PDO::FETCH_OBJ)) {
			$users[] = $row;
		}
		return $users;

	}


	public static function updateYear($pdo)
	{
		$sql = "UPDATE urlaub SET go_prosla_godina = go_novi + go_prosla_godina, go_novi = 22, flag = flag + 1";
		$statement = $pdo->prepare($sql);
		
		$statement->execute();
	}

}