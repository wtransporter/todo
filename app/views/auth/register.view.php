<?php include APPROOT . '/views/partials/header.php'; ?>

<div class="p-3">
    <div class="col-6 offset-3 justify-content-center">
        <?php if (isset($data['errors'])) : ?>
            <div  class="alert alert-danger">
                <?php foreach ($data['errors'] as $error) : ?>
                <span><?php echo $error; ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="register" method="POST" class="p-4 bg-light">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                    required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                    required>
            </div>
            <div class="form-group">
                <label for="email">Last Name</label>
                <input type="text" class="form-control" id="email" name="email"
                    placeholder="e-mail" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" 
                    name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" 
                    name="confirm_password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary">Register</button>
                <span class="float-right"><a href="login"> Have an account ?</a></span>
            </div>
        </form>
    </div>
</div>

<?php include APPROOT . '/views/partials/footer.php'; ?>