<?php
class Database{
    public $host = DB_HOST;
    public $username =DB_USER;
    public $password = DB_PASS;
    public $db_name = DB_NAME;

    public $connection;
    public $error;
    /*
     * Class Constructor
     */
    public function __construct()
    {
        //call connect function
        $this->connect();
    }

    /*
     * Class Connector
     */

    private function connect(){
        $this->connection = new mysqli($this->host,$this->username,$this->password,$this->db_name);
        if (!$this->connection){
            $this->error = "Connection Failed: " . $this->connection->connect_error;
            return false;
        }
    }

    /*
     * Select function
     */
    public function select($query){
        $result = $this->connection->query($query)or die($this->connection->error.__LINE__);

        if ($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }
    /*
     * Insert function
     */
    public function insert($query){
        $insert_row = $this->connection->query($query)or die($this->connection->error.__LINE__);

        //Validate the insert
        if($insert_row){
            header("Location: index.php?msg=".urlencode('Record Added'));
            exit();
        }else{
            die("Error: ".$this->connection->errno." ".$this->connection->error);
        }
    }
    /*
     * Update function
     */
    public function update($query){
        $update_row = $this->connection->query($query)or die($this->connection->error.__LINE__);

        //Validate the update
        if($update_row){
            header("Location: index.php?msg=".urlencode('Record Updated'));
            exit();
        }else{
            die("Error: ".$this->connection->errno." ".$this->connection->error);
        }
    }
    /*
     * Delete function
     */
    public function delete($query){
        $delete_row = $this->connection->query($query)or die($this->connection->error.__LINE__);

        //Validate the delete
        if($delete_row){
            header("Location: index.php?msg=".urlencode('Record Deleted'));
            exit();
        }else{
            die("Error: ".$this->connection->errno." ".$this->connection->error);
        }
    }
}