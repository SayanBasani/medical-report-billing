<!-- 
 DB_HOST=localhost
DB_PORT=3066
DB_NAME=maasarada
DB_USER=root
DB_PASS=admin
 -->

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
        $this->host     = getenv('DB_HOST') ?: $_ENV['DB_HOST'];
        $this->user     = getenv('DB_USER') ?: $_ENV['DB_USER'];
        $this->password = getenv('DB_PASS') ?: $_ENV['DB_PASS'];
        $this->database = getenv('DB_NAME') ?: $_ENV['DB_NAME'];
        $this->port     = getenv('DB_PORT') ?: $_ENV['DB_PORT'];

        if (!$this->dbConnect) {
            $conn = new mysqli(
                $this->host,
                $this->user,
                $this->password,
                $this->database,
                $this->port
            );

            if ($conn->connect_error) {
                die("❌ Error failed to connect to MySQL: " . $conn->connect_error);
            } else {
                $this->dbConnect = $conn;
            }
        }
    }
}
