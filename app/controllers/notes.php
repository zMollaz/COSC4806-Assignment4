<?php
session_start();

class notes extends Controller {
  public function index() {
    $userId = $_SESSION['user_id'];
    $noteModel = $this->model('Note');
    $notes = $noteModel->getUserNotes($userId);
    $this->view('note/index', ['notes' => $notes]);
  }
  
}