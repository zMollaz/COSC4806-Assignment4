<?php
class Note {

    public function __construct() {
        
    }

    public function getUserNotes($userId) {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM notes WHERE user_id = :userId AND deleted = 0");
        $statement->bindValue(':userId', $userId, PDO::PARAM_INT);
        $statement->execute();
        $notes = $statement->fetchAll(PDO::FETCH_ASSOC);
        print_r($notes);
        return $notes;
    }
}