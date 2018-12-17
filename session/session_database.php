<?php
class SessionDatabase extends SessionCore{
    
    private $databaseConnection;

    public function __construct(){
        $this->databaseConnection=DatabaseFactory::getDatabaseInstance();
    }
    
    public function createSession($uuid,$expiresAt,$userID){
        $sessionArray = array(
            "uuid" => $uuid,
            "expires_at" => $expiresAt,
            "user_id" => $userID
        );
        return $this->databaseConnection->insert('sessions',$sessionArray);
    }

    public function updateSession($id,$uuid,$expiresAt,$userID){
        $sessionArray = array(
            "uuid" => $uuid,
            "expires_at" => $expiresAt,
            "user_id" => $userID
        );
        return $this->databaseConnection->update('sessions',$id,$sessionArray);
    }

    public function deleteSession($id) {
        $this->databaseConnection->delete('sessions',$id);
    }

    public function getSession($userID,$uuid){
    $sql="SELECT * from sessions where uuid='{$uuid}' and user_id='{$userID}'";
        $result=$this->databaseConnection->query($sql);
        return $result->results();
    }

    public function deleteUserSession($userId) {
        $arr = ["user_id" => $userId];
        $sql="DELETE from sessions where user_id=?";
        $this->databaseConnection->query($sql,$arr);
    }
}