<?php
class Database
{
    private $conn;
    
    public function __construct($dsn, $usr, $pwd) {
        try {
            $this->conn = new PDO($dsn, $usr, $pwd);
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e) {
            logError($e);
        }
    }
    
    public function Query($query) {
        try {
            $res = $this->conn->query($query);
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e) {
            logError($e);
            return null;
        }
    }
    
    public function Exec($query) {
        try {
            $res = $this->conn->exec($query);
            return $res;
        }
        catch(Exception $e) {
            logError($e);
            return null;
        }
    }
    
    //$fetchAs shall be 0 for CUD
    public function PQuery($query, $args=[], $fetchAs=PDO::FETCH_ASSOC) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($args);
        if($fetchAs == 0) {
            return 1;
        }
        return $stmt->fetchAll($fetchAs);
    }
}
?>