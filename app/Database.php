<?php


abstract class Database{

     protected $dbh;
     protected $stmt;

     public function __construct()
     {
         $this->dbh = new PDO("mysql:host=localhost;dbname=limundo_imitation;charset=utf8mb4",'root',"123456",array(
             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
             PDO::ATTR_PERSISTENT => false
         ));
     }



     public function query($query)
     {
        $this->stmt = $this->dbh->prepare($query);
     }


     public function bind($param, $value, $type = null){
         if (is_null($type)) {
             switch (true) {
                 case is_int($value):
                     $type = PDO::PARAM_INT;
                     break;
                 case is_bool($value):
                     $type = PDO::PARAM_BOOL;
                     break;
                 case is_null($value):
                     $type = PDO::PARAM_NULL;
                     break;
                 default:
                     $type = PDO::PARAM_STR;
             }
         }
         $this->stmt->bindValue($param, $value, $type);
     }

     public function all()
     {
         $query = "SELECT * FROM {$this->table}";

         try {
             $statement = $this->dbh->prepare($query);
             $statement->execute();
             return $statement->fetchAll(PDO::FETCH_OBJ);
         } catch (\Exception $e) {
                $e->getMessage();
         }
     }

     public function execute(){
         $this->stmt->execute();
     }

     public function resultSet(){
         $this->execute();
         return $this->stmt->fetchAll(PDO::FETCH_OBJ);
     }
     public function single(){
         $this->execute();
         return $this->stmt->fetch(PDO::FETCH_OBJ);
     }

     public function find($id)
     {
         $this->query("SELECT * FROM ".$this->table." WHERE id = :id");
         $this->bind(":id",$id);
         return $this->single();

     }

    public function checkEmail($email)
    {
        $this->query("SELECT * FROM ".$this->table." WHERE email = :email");
        $this->bind(":email",$email);

        return $this->single();
    }

    public function delete($id)
    {
        $this->query("DELETE FROM {$this->table} WHERE id = :id");
        $this->bind(":id",$id);
        $this->execute();
    }

}
