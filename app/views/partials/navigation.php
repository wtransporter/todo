<div class="mb-2">

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="/">ToDo</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
			</li>
			<?php if (isLoggedIn()) : ?>
			<li class="nav-item">
				<a class="nav-link" href="/todo-list">ToDo</a>
			</li>
			<?php endif; ?>
		</ul>
		<ul class="navbar-nav ml-auto">
			<?php if (! isLoggedIn()) : ?>
				<li class="nav-item">
					<a class="nav-link" href="login">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="register">Register</a>
				</li>
			<?php else : ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<?php echo authUser('user_name'); ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="logout">Logout</a>
					<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Profile</a>
					</div>
				</li>
			<?php endif; ?>
		</ul>
	</div>
	</nav>
</div>