<?php
require_once "connection.php";

class UsersModel {
    /*=============================================
    SHOW USER
    =============================================*/
    public static function MdlShowUsers($tableUsers, $item, $value) {
        $connection = new Connection();
        $db = $connection->connect();
        
        if ($item != null) {
            $stmt = $db->prepare("SELECT * FROM $tableUsers WHERE $item = :$item");
            $stmt->bindParam(":".$item, $value, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = $db->prepare("SELECT * FROM $tableUsers");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    /*=============================================
    ADD USER
    =============================================*/
    public static function mdlAddUser($table, $data) {
        $connection = new Connection();
        $db = $connection->connect();
        
        $stmt = $db->prepare("INSERT INTO $table (name, user, password, profile, photo) VALUES (:name, :user, :password, :profile, :photo)");
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":user", $data["user"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        $stmt->bindParam(":profile", $data["profile"], PDO::PARAM_STR);
        $stmt->bindParam(":photo", $data["photo"], PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }

    /*=============================================
    EDIT USER
    =============================================*/
    public static function mdlEditUser($table, $data) {
        $connection = new Connection();
        $db = $connection->connect();
        
        $stmt = $db->prepare("UPDATE $table SET name = :name, password = :password, profile = :profile, photo = :photo WHERE user = :user");
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":user", $data["user"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        $stmt->bindParam(":profile", $data["profile"], PDO::PARAM_STR);
        $stmt->bindParam(":photo", $data["photo"], PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }

    /*=============================================
    UPDATE USER
    =============================================*/
    public static function mdlUpdateUser($table, $item1, $value1, $item2, $value2) {
        $connection = new Connection();
        $db = $connection->connect();
        
        $stmt = $db->prepare("UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2");
        $stmt->bindParam(":".$item1, $value1, PDO::PARAM_STR);
        $stmt->bindParam(":".$item2, $value2, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }

    /*=============================================
    DELETE USER
    =============================================*/
    public static function mdlDeleteUser($table, $data) {
        $connection = new Connection();
        $db = $connection->connect();
        
        $stmt = $db->prepare("DELETE FROM $table WHERE id = :id");
        $stmt->bindParam(":id", $data, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }
}

?>