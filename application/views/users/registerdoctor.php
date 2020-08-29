<?php echo form_open_multipart('users/registerdoctor'); ?>
<div class="row justify-content-md-center">
	<div class="col-md-5 col-md-offset-5">
		<h1 class="text-center" style="font-family: 'Raleway', sans-serif;"><?= $title; ?></h1>
		<div class="row">
			<div class="col">
			<div class="form-group">
				<label><small>First Name</small></label>
				<input class="form-control" type="text" name="firstname" placeholder="First Name" autofocus>
				<?php echo form_error('firstname', '<small><span class="badge badge-danger">', '</span></small>'); ?>
			</div>
			</div>
			<div class="col">
		<div class="form-group">
				<label><small>Last name</small></label>
				<input class="form-control" type="text" name="lastname" placeholder="Last Name">
				<?php echo form_error('lastname', '<small><span class="badge badge-danger">', '</span></small>'); ?>
			</div>
			</div>
		</div>
		<div class="form-group">

			<label><small>Username</small></label>
			<input class="form-control" type="text" name="username" placeholder="Username">
			<?php echo form_error('username', '<small><span class="badge badge-danger">', '</span></small>'); ?>
		</div>
		<div class="form-group">
			<label><small>Phone number</small></label>
			<input class="form-control" type="text" name="number" placeholder="Phone Number" required>
		</div>
		<div class="form-group">
			<label><small>Password</small></label>
			<input class="form-control" type="password" name="password" placeholder="Password">
			<?php echo form_error('password', '<small><span class="badge badge-danger">', '</span></small>'); ?>
		</div>
		<div class="form-group">
			<label><small>Confirm Password</small></label>
			<input class="form-control" type="password" name="password2" placeholder="Confirm Password">
			<?php echo form_error('password2', '<small><span class="badge badge-danger">', '</span></small>'); ?>
		</div>
		<div class="form-group">
				<label><small>Email</small></label>
				<input class="form-control" type="email" name="email" placeholder="Email">
				<?php echo form_error('email', '<small><span class="badge badge-danger">', '</span></small>'); ?>
		</div>
		<div class="form-group">
				<label><small>City Address</small></label>
				<select name="city" class="form-control">
					<option>Cebu City</option>
					<option>Carcar City</option>
					<option>Danao City</option>
					<option>Lapu-lapu City</option>
					<option>Mandaue City</option>
					<option>Naga City</option>
					<option>Talisay City</option>
				</select>
		</div>
		<div class="form-group">
				<label><small>Clinic located</small></label>
				<select name="cliniccity" class="form-control">
					<option>Cebu City</option>
					<option>Carcar City</option>
					<option>Danao City</option>
					<option>Lapu-lapu City</option>
					<option>Mandaue City</option>
					<option>Naga City</option>
					<option>Talisay City</option>
				</select>
		</div>
		<div class="form-group">
				<label><small>Field of Expertise</small></label>
				<select name="de_id" class="form-control">
          		<?php foreach($doctor_expertise as $expertise): ?>
          			<option value="<?php echo $expertise['de_id']; ?>"><?php echo $expertise['name']; ?></option>
          		<?php endforeach; ?>
          	</select>
		</div>
		<div class="form-group">
			<label><small>Resume (pdf)</small></label>
			<div class="custom-file">
				<input type="file" name="userfile">
			</div>
		</div>
		<input type="hidden" name="user_role" value="Doctor">
		<button type="submit" class="btn btn-primary btn-block">Submit</button>
	</div>
</div>
<?php echo form_close(); ?>