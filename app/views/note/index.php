<?php 
require_once 'app/views/templates/header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>My Reminders</h2>
        <a href="notes/create" class="btn btn-primary">Create New Note</a>
    </div>
    <div class="list-group">
    <?php
    $notes = $data['notes'];
    if (empty($notes)) {
        echo '<p class="text-center">You have no notes to view.</p>';
    } else {
        foreach ($notes as $note) {
            echo '<div class="list-group-item">';
            echo '<h5>' . $note['subject'] . '</h5>';
            echo '<p>Completed: ';
            if ($note['completed']) {
                echo '
                <span style="color: green;">Yes</span>
                <span style="color: green;">&#10004;</span>';
            } else {
                echo '<span style="color: red;">No</span>';
            }
            echo '</p>';
            echo '<p>Created At: ' . date('Y-m-d H:i:s', strtotime($note['created_at'])) . '</p>';
            echo '<a href="notes/edit/' . $note['id'] . '" class="btn btn-secondary" style="margin-right: 10px;">Edit</a>';
            echo '<a href="notes/delete/' . $note['id'] . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this note?\');">Delete</a>';
            echo '</div>';
        }
    }
    ?>
    </div>
</div>

<?php require_once 'app/views/templates/footer.php'; ?>
