<?php require_once 'app/views/templates/header.php'; ?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Your Notes</h2>
        <a href="notes/create" class="btn btn-primary">Create New Note</a>
    </div>
    <div class="list-group">
        <?php foreach ($data['notes'] as $note): ?>
            <div class="list-group-item">
                <h5><?php echo htmlspecialchars($note['subject']); ?></h5>
                <p>Completed: <?php echo $note['completed'] ? 'Yes' : 'No'; ?></p>
                <p>Created At: <?php echo date('Y-m-d H:i:s', strtotime($note['created_at'])); ?></p>
                <a href="notes/edit/<?php echo $note['id']; ?>" class="btn btn-secondary">Edit</a>
                <a href="notes/delete/<?php echo $note['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this note?');">Delete</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once 'app/views/templates/footer.php'; ?>
