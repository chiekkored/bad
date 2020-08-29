<div class="row justify-content-md-center">
  <div class="col-md-4 col-md-offset-4">
    <h1 class="text-center" style="font-family: 'Raleway', sans-serif;"><?= $title; ?></h1>
        <?php echo form_open('posts/update'); ?>
                <input type="hidden" name="post_id" value="<?php echo $posts ?>">

                <?php $conn = mysqli_connect('localhost', 'root', '', 'bad'); $records = mysqli_query($conn, "SELECT * from posts WHERE post_id = $posts"); while ($row = mysqli_fetch_array($records)) {?>

              <div class="form-group">
                <label>Schedule of Appointment</label><small> (<?php echo date("M d Y h:i a", strtotime($row['scheddate'])); ?>)</small>
                <span><input type="datetime-local" class="form-control" name="scheddate" value="">
                  <small>Enter date and time respectively.<?php echo form_error('scheddate', '<label><span class="badge badge-danger">', '</span></label>'); ?></small></span>
                <?php } ?>
              </div>
          <div class="form-group">
          	<label>Category</label>
          	<select name="category_id" class="form-control">
          		<?php foreach($categories as $category): ?>
          			<option value="<?php echo $category['category_id']; ?>"><?php echo $category['name']; ?></option>
          		<?php endforeach; ?>
          	</select>
          </div>
      <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </div>
  </div>
</form>
