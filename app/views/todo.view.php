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
<hr>
<div class="row col-12">
<?php foreach ($todos as $todo) : ?>
	<div class="row col-12">
	<form class="col-10 pr-0" method="POST" action="todos/update/<?php echo $todo->id; ?>">
		<div class="form-row align-items-center">
			<div class="col-md-10">
			<label class="sr-only" for="title">Title</label>
			<input type="text" name="title" class="form-control mb-2" id="title"
				placeholder="Title" value="<?php echo $todo->title; ?>">
			</div>
			<div class="col-md-2">
				<div class="form-check mb-2">
					<input onChange="this.form.submit()"
						class="form-check-input" name="finished"
						type="checkbox" id="finished<?php echo $todo->id; ?>" <?php echo $todo->finished ? 'checked' : ''; ?>>
					<label class="form-check-label" for="finished">
					<?php echo $todo->finished ? 'Finished' : 'Pending'; ?>
					</label>
				</div>
			</div>

		</div>
	</form>
	<form class="col-2 pl-0" method="POST" action="todos/delete/<?php echo $todo->id; ?>">
		<div class="form-row align-items-center">
			<div class="col-auto">
				<input type="submit" class="form-control mb-2 btn btn-sm btn-danger" id="delete"
				value="Delete">
			</div>
		</div>
	</form>
	</div>
<?php endforeach; ?>
</div>

<?php include APPROOT . '/views/partials/footer.php'; ?>

