<?php echo form_open('users/register'); ?>
<div class="row justify-content-md-center">
	<div class="col-md-4 col-md-offset-4">
		<h1 class="text-center" style="font-family: 'Raleway', sans-serif;"><?= $title; ?></h1>
		<div class="row">
			<div class="col">
			<div class="form-group">
				<label><small>First Name</small></label>
				<input class="form-control" type="text" name="firstname" placeholder="First Name" autofocus>
				<?php echo form_error('firstname', '<label><span class="badge badge-danger">', '</span></label>'); ?>
			</div>
			</div>
			<div class="col">
		<div class="form-group">
				<label><small>Last name</small></label>
				<input class="form-control" type="text" name="lastname" placeholder="Last Name">
				<?php echo form_error('lastname', '<label><span class="badge badge-danger">', '</span></label>'); ?>
			</div>
			</div>
		</div>
		<div class="form-group">
			<label><small>Phone number</small></label>
			<input class="form-control" type="text" name="number" placeholder="Phone Number" required>
		</div>
		<div class="form-group">
			<label><small>Username</small></label>
			<input class="form-control" type="text" name="username" placeholder="Username">
			<?php echo form_error('username', '<label><span class="badge badge-danger">', '</span></label>'); ?>
		</div>
		<div class="form-group">
			<label><small>Password</small></label>
			<input class="form-control" type="password" name="password" placeholder="Password">
			<?php echo form_error('password', '<label><span class="badge badge-danger">', '</span></label>'); ?>
		</div>
		<div class="form-group">
			<label><small>Confirm Password</small></label>
			<input class="form-control" type="password" name="password2" placeholder="Confirm Password">
			<?php echo form_error('password2', '<label><span class="badge badge-danger">', '</span></label>'); ?>
		</div>
		<div class="form-group">
			<label><small>Email</small></label>
			<input class="form-control" type="email" name="email" placeholder="Email">
			<?php echo form_error('email', '<label><span class="badge badge-danger">', '</span></label>'); ?>
		</div>
		<div class="form-group">
				<label><small>City</small></label>
				<select name="city" class="form-control">
					<option>Cebu City</option>
					<option>Carcar City</option>
					<option>Danao City</option>
					<option>Lapu-lapu City</option>
					<option>Mandaue City</option>
					<option>Naga City</option>
					<option>Talisay City</option>
				</select>
				<?php echo form_error('city', '<small><span class="badge badge-danger">', '</span></small>'); ?>
		</div>
		<input type="hidden" name="user_role" value="Patient">
		<button type="submit" class="btn btn-primary btn-block">Submit</button>
	</div>
</div>
<?php echo form_close(); ?>