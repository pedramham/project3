<?php
class Database
 	{
	    private $host      = "localhost";
		private $user      = "root";
		private $pass      = "";
		private $dbname    = "photoshop_articel";
		//////


    public static $dbh;
    private $error;
    public function __construct(){
    	
    }
    
         public function connect (){
    	
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );
        // Create a new PDO instanace
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        // Catch any errors
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
     }//connect
     

  
     public function  myquery ($sql,$array3){
     	$stmt=$this->dbh->prepare($sql);
     	foreach ($array3 as $key=>$value){
     		$stmt->bindvalue($key+1,$value);
        	}
            $stmt->execute();     	
        }
     
     
     public function select($sql,$array){
     	$stmt=$this->dbh->prepare($sql);
     	foreach ($array as $key=>$value){
     		$stmt->bindvalue($key+1,$value);
     	}//forech//
     	$stmt->execute();
     	$result=$stmt->fetchALL(PDO::FETCH_ASSOC);
		$result=$result['m_newspaper_title'] ;
    	return $result;
     }
     
}






