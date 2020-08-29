    
<?php echo form_open('users/login'); ?>
	<div class="row justify-content-md-center">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center" style="font-family: 'Raleway', sans-serif;"><?php echo $title; ?></h1>
			<div class="form-group">
				<div class="input-group">
					<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
					<div class="input-group-prepend">
		            	<span class="input-group-text bg-transparent" id="basic-addon1"><i class="fa fa-user"></i></span>
		            </div>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<input type="password" name="password" class="form-control" placeholder="Password" required autofocus>
					<div class="input-group-prepend">
						<span class="input-group-text bg-transparent" id="basic-addon1"><i class="fa fa-unlock-alt"></i></span>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Login</button>
		</div>
	</div>
<?php echo form_close(); ?>