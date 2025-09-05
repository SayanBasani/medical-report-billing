<?php
class Database
{
    protected $host;
    protected $user;
    protected $password;
    protected $database;
    protected $port;
    public $dbConnect = false;

    public function __construct()
    {
        $this->host     = getenv('DB_HOST');
        $this->user     = getenv('DB_USERNAME');
        $this->password = getenv('DB_PASSWORD');
        $this->database = getenv('DB_NAME');
        $this->port     = getenv('DB_PORT');

        if (!$this->dbConnect) {
            $conn = new mysqli(
                $this->host,
                $this->user,
                $this->password,
                $this->database,
                $this->port
            );

            if ($conn->connect_error) {
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            } else {
                $this->dbConnect = $conn;
            }
        }
    }
}
