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
        return $notes;
    }

    public function createNote($userId, $subject, $completed) {
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO notes (user_id, subject, completed, created_at, deleted) VALUES (:userId, :subject, :completed, NOW(), 0)");
        $statement->bindValue(':userId', $userId, PDO::PARAM_INT);
        $statement->bindValue(':subject', $subject, PDO::PARAM_STR);
        $statement->bindValue(':completed', $completed, PDO::PARAM_INT);
        $statement->execute();
    }
}