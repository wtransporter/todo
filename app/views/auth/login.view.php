<?php include APPROOT . '/views/partials/header.php'; ?>

<div class="p-3">
    <div class="col-6 offset-3 justify-content-center">
        <form action="login" method="POST" class="p-4 bg-light">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="e-mail" required>
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