<?php
    session_start();
class Note {

    public function __construct() {
        
    }

    public function getUserNotes() {
        $userId = $_SESSION['user_id'];
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM notes WHERE user_id = :userId AND deleted = 0");
        $statement->bindValue(':userId', $userId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}