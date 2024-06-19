<?php
session_start();

class notes extends Controller {
  public function index() {
    $userId = $_SESSION['user_id'];
    $noteModel = $this->model('Note');
    $notes = $noteModel->getUserNotes($userId);
    $this->view('note/index', ['notes' => $notes]);
  }
  
  public function create() {
    $this->view('note/create');
  }

  public function save() {
    $userId = $_SESSION['user_id'];
    $subject = $_POST['subject'];
    $completed = $_POST['completed'] ? 1 : 0;
    $noteModel = $this->model('Note');
    $noteModel->createNote($userId, $subject, $completed);
    header('Location: /notes');
  }
}