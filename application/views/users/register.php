<?php echo validation_errors(); ?>

<?php echo form_open(base_url('users/register')); ?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1><?= $title; ?></h1>
		<div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control" name="name" placeholder="Enter Name">
		</div>
		<div class="form-group">
			<label>Zip Code</label>
			<input type="text" class="form-control" name="zipcode" placeholder="Enter Zipcode">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" name="email" placeholder="Enter Email">
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username" placeholder="Enter Username">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" placeholder="Enter Password">
		</div>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" class="form-control" name="password2" placeholder="Enter Password Again">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</div>
<?php echo form_close(); ?>