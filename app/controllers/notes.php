<?php

class notes extends Controller {
  public function index() {
    $noteModel = $this->model('Note');
    $notes = $noteModel->getUserNotes();
 
  }
  
}