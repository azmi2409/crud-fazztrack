<?

class connection
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $sql;
    private $query;

    protected function connect()
    {
        $servername = "localhost"; //define server address
        $username = "root"; //define MySql Username
        $password = ""; // define Mysql Password
        $dbname = "fazztrack"; // define Database name
        try {
            $dsn = "mysql:host=" . $servername . ";dbname=" . $dbname;
            $conn = new PDO($dsn, $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function Query($query, $param = [])
    {
        if (empty($param)) {
            $this->Query = $this->connect()->prepare($query);
            $this->Query->execute();
            return $this->Query;
        } else {

            $this->Query = $this->connect()->prepare($query);
            $this->Query->execute($param);
            return $this->Query;
        }
    }
}
?>