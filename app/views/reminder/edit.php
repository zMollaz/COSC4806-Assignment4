<?php require_once 'app/views/templates/header.php'; ?>

<div class="container">
    <h2>Edit reminder</h2>
    <form action="/reminders/update/<?php echo $data['reminder']['id']; ?>" method="POST">
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" value="<?php echo htmlspecialchars($data['reminder']['subject']); ?>" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="completed" name="completed" <?php echo $data['reminder']['completed'] ? 'checked' : ''; ?>>
            <label class="form-check-label" for="completed">Completed</label>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?php require_once 'app/views/templates/footer.php'; ?>
