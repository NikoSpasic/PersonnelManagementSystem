<?php 

class User 
{
	
	/*******************************/
	/********** PROPERTIES *********/
	/*******************************/
	
	protected $id;
	protected $ime;
	protected $prezime;
	protected $go_novi;
	protected $go_stari;
	protected $go_iskorisceno;
	protected $go_preostalo;
	protected $flag;
	
	/***********************************************************/

	
	/*************************************/
	/********** GETTERS & SETTERS ********/
	/*************************************/

	/********** ID **********/
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		return $this->id = $id;
	}
	/*******************************/
	
	/********** IME ****************/
	public function getIme() 
	{
		return $this->ime;
	}
	public function setIme($name) 
	{		
		$this->ime = $name;
	}
	/*******************************/

	/********** PREZIME ************/
	public function getPrezime() 
	{
		return $this->prezime;
	}
	public function setPrezime($name) 
	{		
		$this->prezime = $name;
	}
	/*******************************/
	
	/********** GO_NOVI ************/
	public function getGoNovi() 
	{
		return $this->go_novi;
	}
	public function setGoNovi($value) 
	{
		if(!is_numeric($value)) {
			throw new Exception('Vrednost mora biti brojcana. \"' . $value . '\" nije odgovarajuca vrednost.');
		}
		
		$this->go_novi = $value;
	}
	/*******************************/
	
	/********** GO_STARI ***********/
	public function getGoStari() {
		return $this->go_stari;
	}
	public function setGoStari($value) 
	{
		if(!is_numeric($value)) {
			throw new Exception('Vrednost mora biti brojcana. \"' . $value . '\" nije odgovarajuca vrednost.');
		}
		
		$this->go_stari = $value;
	}
	/*******************************/
	
	/****** GO_ISKORISCENO *********/
	public function getGoIskorisceno() 
	{
		return $this->go_iskorisceno;
	}
	public function setGoIskorisceno($value) 
	{
		if(!is_numeric($value)) {
			throw new Exception('Vrednost mora biti brojcana. \"' . $value . '\" nije odgovarajuca vrednost.');
		}
		
		$this->go_iskorisceno = $value;
	}
	/*******************************/

	/****** GO_PREOSTALO ***********/
	public function getGoPreostalo() 
	{
		return $this->go_preostalo;
	}
	public function setGoPreostalo($value) 
	{
		if(!is_numeric($value)) {
			throw new Exception('Vrednost mora biti brojcana. \"' . $value . '\" nije odgovarajuca vrednost.');
		}
		
		$this->go_preostalo = $value;
	}
	/*******************************/

	/********** FLAG ***************/
	public function getFlag() 
	{
		return $this->flag;
	}
	public function setFlag($year) 
	{
		if(!is_numeric($year)) {
			throw new Exception('Vrednost mora biti brojcana. \"' . $year . '\" nije odgovarajuca vrednost.');
		}
		return $this->flag = $year;
	}
	/*******************************/


	/*************************************/
	/********** METHODS ******************/
	/*************************************/

	/*************************************
	*
	* Hvata sve kolone za sve radnike iz tabele 'odmor' i smesta ih u array '$users'
	* 
	* zatim vraca asocijativni array $users, sa svim radnicima
	* 
	***************************************/
	public static function fetchAllUsersFromDb($pdo)
	{
		$users = [];
		
		$sql = "SELECT * FROM odmor";						

		$statement = $pdo->query($sql);	
		$statement->execute();
					
		while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
			$user = new User();
			$user->setId($row['id']);
			$user->setIme($row['ime']);
			$user->setPrezime($row['prezime']);
			$user->setGoNovi($row['go_novi']);
			$user->setGoStari($row['go_stari']);
			$user->setGoIskorisceno($row['go_iskorisceno']);
			$user->setGoPreostalo($row['go_preostalo']);
			$user->setFlag($row['flag']);

			$users[] = $user;
		}
		return $users;

	}

	/*************************************
	*
	* Vrsi update u tabeli 'odmor'
	*
	* flag povecava za 1
	*
	* flag ne moze bidi veci od trenutne godine date('Y') => definisano preko php-a
	* 
	***************************************/
	public static function updateYear($pdo)
	{
		$sql = "UPDATE odmor SET go_stari = (go_novi + go_stari), go_novi = 22, flag = flag + 1";
		$statement = $pdo->prepare($sql);
		
		$statement->execute();
	}

}