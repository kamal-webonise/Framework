
<?php
abstract class SessionCore{

    public static function exists($name) {
        return (isset($_SESSION[$name])) ? true : false;
    }

    public static function get($name) {
        return $_SESSION[$name];
    }

    public static function set($name, $value) {
        return $_SESSION[$name] = $value;
    }

    public static function delete($name) {
        if(self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }
    public abstract function createSession($uuid,$expiresAt,$userID);
    public abstract function updateSession($id,$uuid,$expiresAt,$userID);
    public abstract function deleteSession($id);
    public abstract function getSession($userID,$uuid);
    public abstract function deleteUserSession($userId);
}
?>