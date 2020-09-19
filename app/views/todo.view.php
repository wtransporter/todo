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
<?php foreach ($todos as $todo) : ?>
		
	<form method="POST" action="todos/update/<?php echo $todo->id; ?>">
		<div class="form-row align-items-center">
			<div class="col-md-6">
			<label class="sr-only" for="title">Title</label>
			<input type="text" name="title" class="form-control mb-2" id="title"
				placeholder="Title" value="<?php echo $todo->title; ?>">
			</div>
			<div class="col-auto">
				<div class="form-check mb-2">
					<input onChange="this.form.submit()"
						class="form-check-input" name="finished"
						type="checkbox" id="finished" <?php echo $todo->finished ? 'checked' : ''; ?>>
					<label class="form-check-label" for="finished">
					<?php echo $todo->finished ? 'Finished' : 'Pending'; ?>
					</label>
				</div>
			</div>

		</div>
	</form>

<?php endforeach; ?>

<?php include APPROOT . '/views/partials/footer.php'; ?>

