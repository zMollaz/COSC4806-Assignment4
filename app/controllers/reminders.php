<?php
session_start();

class Reminders extends Controller {
    public function index() {
        $userId = $_SESSION['user_id'];
        $reminderModel = $this->model('Reminder');
        $reminders = $reminderModel->get_user_reminders($userId);
        $this->view('reminder/index', ['reminders' => $reminders]);
    }

    public function create() {
        $this->view('reminder/create');
    }

    public function save() {
        $userId = $_SESSION['user_id'];
        $subject = $_POST['subject'];
        $completed = isset($_POST['completed']) ? 1 : 0;
        $reminderModel = $this->model('Reminder');
        $reminderModel->create_reminder($userId, $subject, $completed);
        header('Location: /reminders');
    }

    public function edit($id) {
        $reminderModel = $this->model('Reminder');
        $reminder = $reminderModel->get_reminder_by_id($id);
        $this->view('reminder/edit', ['reminder' => $reminder]);
    }

    public function update($id) {
        $subject = $_POST['subject'];
        $completed = $_POST['completed'] ? 1 : 0;
        $reminderModel = $this->model('Reminder');
        $reminderModel->update_reminder($id, $subject, $completed);
        header('Location: /reminders');
    }
  
    public function delete($id) {
        $reminderModel = $this->model('Reminder');
        $reminderModel->delete_reminder($id);
        header('Location: /reminders');
    }
}
?>
