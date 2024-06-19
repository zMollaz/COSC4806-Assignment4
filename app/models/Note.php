<?php
class Note {

    public function __construct() {
        // Constructor can be used for initialization if needed
    }

    public function getUserNotes($userId) {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM notes WHERE user_id = :userId AND deleted = 0");
        $statement->bindValue(':userId', $userId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createNote($userId, $subject, $completed) {
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO notes (user_id, subject, completed, created_at, deleted) VALUES (:userId, :subject, :completed, NOW(), 0)");
        $statement->bindValue(':userId', $userId, PDO::PARAM_INT);
        $statement->bindValue(':subject', $subject, PDO::PARAM_STR);
        $statement->bindValue(':completed', $completed, PDO::PARAM_INT);
        $statement->execute();
    }

    public function getNoteById($id) {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM notes WHERE id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function updateNote($id, $subject, $completed) {
        $db = db_connect();
        $statement = $db->prepare("UPDATE notes SET subject = :subject, completed = :completed WHERE id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->bindValue(':subject', $subject, PDO::PARAM_STR);
        $statement->bindValue(':completed', $completed, PDO::PARAM_INT);
        $statement->execute();
    }
}
?>
