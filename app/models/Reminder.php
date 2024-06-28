<?php
class Reminder {
    
    public function __construct() {
        // Constructor can be used for initialization if needed
    }

    public function get_user_reminders($userId) {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM reminders WHERE user_id = :userId AND deleted = 0");
        $statement->bindValue(':userId', $userId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create_reminder($userId, $subject, $completed) {
        $db = db_connect();
        $statement = $db->prepare("INSERT INTO reminders (user_id, subject, completed, created_at, deleted) VALUES (:userId, :subject, :completed, NOW(), 0)");
        $statement->bindValue(':userId', $userId, PDO::PARAM_INT);
        $statement->bindValue(':subject', $subject, PDO::PARAM_STR);
        $statement->bindValue(':completed', $completed, PDO::PARAM_INT);
        $statement->execute();
    }

    public function get_reminder_by_id($id) {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM reminders WHERE id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function update_reminder($id, $subject, $completed) {
        $db = db_connect();
        $statement = $db->prepare("UPDATE reminders SET subject = :subject, completed = :completed WHERE id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->bindValue(':subject', $subject, PDO::PARAM_STR);
        $statement->bindValue(':completed', $completed, PDO::PARAM_INT);
        $statement->execute();
    }

    public function delete_reminder($id) {
        $db = db_connect();
        $statement = $db->prepare("UPDATE reminders SET deleted = 1 WHERE id = :id");
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
}
?>
