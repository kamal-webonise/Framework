<!-- <?php

class SessionModel {

    private $dbConnection;

    public function __construct() {
        global $db;
        $this->dbConnection = DatabaseFactory::getDatabaseInstance($db['dbserver']);
    }   
    
    public function insertSession($uuid,$expiresAt,$userID){
        $sessionArray = array(
            "uuid" => $uuid,
            "expires_at" => $expiresAt,
            "user_id" => $userID
        );
        $this->dbConnection->insert('session',$sessionArray);
    }

    public function updateSession($id,$uuid,$expiresAt,$userID){
        $sessionArray = array(
            "uuid" => $uuid,
            "expires_at" => $expiresAt,
            "user_id" => $userID
        );
        $this->dbConnection->update('session',$id,$sessionArray);
    }

    public function deleteSession($id,$uuid,$expiresAt,$userID){
        $this->dbConnection->delete('session',$id);
    }

    public function sessionByUserIdAndUuId($userID,$uuid){
    $sql="SELECT * from sesion where uuid={$uuid} and user_id={$userID}";
        $result=$this->dbConnection->query($sql);
        return $result->result();
    }
}

?> -->