<?php require_once 'app/views/templates/header.php'; ?>
<div class="container">
    <h2>Create Note</h2>
    <form action="/notes/save" method="POST">
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="completed" name="completed">
            <label class="form-check-label" for="completed">Completed</label>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
<?php require_once 'app/views/templates/footer.php'; ?>