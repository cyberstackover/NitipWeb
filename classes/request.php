<?php

/**
* 
*/
class Request
{
	
	private $_db;

    function __construct($db){
    	parent::__construct();
    
    	$this->_db = $db;
    }

    public function get_request($reqID){

    	try {
			$stmt = $this->_db->prepare('SELECT * FROM members WHERE reqID = :reqID');
			$stmt->execute(array('reqID' => $reqID));
			
			$row = $stmt->fetchAll();
			
			return $row;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
    }
}

?>