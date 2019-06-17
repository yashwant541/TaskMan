<center><h2><?= $title; ?></h2></center>

<?php echo validation_errors(); ?>

<?php echo form_open(base_url('users/update')); ?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control" name="name" value="<?php echo($kio->name); ?>">
		</div>
		<div class="form-group">
			<label>Zip Code</label>
			<input type="text" class="form-control" name="zipcode" value="<?php echo($kio->zipcode); ?>">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" name="email" value="<?php echo($kio->email); ?>">
		</div>
		<div class="form-group">
			<label>You created your account on:</label>
			<input type="text" class="form-control" name="register_date" value="<?php echo($kio->register_date); ?>" readonly>
		</div>
		<button type="submit" class="btn btn-primary">Edit Profile</button>
	</div>
</div>
<?php echo form_close(); ?>