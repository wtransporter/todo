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
        <form action="login" method="POST" class="p-4 bg-light">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="e-mail" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary">Login</button>
                <span class="float-right"><a href="register"> Don't have an account ?</a></span>
            </div>
        </form>
    </div>
</div>

<?php include APPROOT . '/views/partials/footer.php'; ?>