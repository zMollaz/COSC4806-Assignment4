<?php 
require_once 'app/views/templates/header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>My Reminders</h2>
        <a href="reminders/create" class="btn btn-primary">Create new reminder</a>
    </div>
    <div class="list-group">
    <?php
    $reminders = $data['reminders'];
    if (empty($reminders)) {
        echo '<p class="text-center">You have no reminders to view.</p>';
    } else {
        foreach ($reminders as $reminder) {
            echo '<div class="list-group-item">';
            echo '<h5>' . $reminder['subject'] . '</h5>';
            echo '<p>Completed: ';
            if ($reminder['completed']) {
                echo '
                <span style="color: green;">Yes</span>
                <span style="color: green;">&#10004;</span>';
            } else {
                echo '<span style="color: red;">No</span>';
            }
            echo '</p>';
            echo '<p>Created At: ' . date('Y-m-d H:i:s', strtotime($reminder['created_at'])) . '</p>';
            echo '<a href="reminders/edit/' . $reminder['id'] . '" class="btn btn-secondary" style="margin-right: 10px;">Edit</a>';
            echo '<a href="reminders/delete/' . $reminder['id'] . '" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this reminder?\');">Delete</a>';
            echo '</div>';
        }
    }
    ?>
    </div>
</div>

<?php require_once 'app/views/templates/footer.php'; ?>
