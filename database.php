<?php
class Database
{
    protected $host  = 'localhost';
    protected $user  = 'root';
    protected $password = 'admin';
    protected $database = 'maasarada';
    public $dbConnect = false;

    public function __construct()
    {
        if (!$this->dbConnect) {
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if ($conn->connect_error) {
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            } else {
                $this->dbConnect = $conn;
            }
        }
    }
}