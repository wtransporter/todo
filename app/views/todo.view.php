<?php include APPROOT . '/views/partials/header.php'; ?>

<form method="POST" action="todos">
	<div class="form-row align-items-center">
		<div class="col-md-6">
		<label class="sr-only" for="title">Title</label>
		<input type="text" name="title" class="form-control mb-2" id="title"
			placeholder="Title">
		</div>

		<div class="col-auto">
			<button type="submit" class="btn btn-primary mb-2">Submit</button>
		</div>
	</div>
</form>

<form method="POST" action="todo/update">
	<div class="form-row align-items-center">
		<div class="col-md-6">
		<label class="sr-only" for="title">Title</label>
		<input type="text" name="title" class="form-control mb-2" id="title"
			placeholder="Title">
		</div>
		<div class="col-auto">
			<div class="form-check mb-2">
				<input class="form-check-input" name="finished" type="checkbox" id="finished">
				<label class="form-check-label" for="finished"></label>
			</div>
		</div>

	</div>
</form>

<?php include APPROOT . '/views/partials/footer.php'; ?>

