<?php foreach($posts as $key=>$post) : ?>
  <?php if (!next($posts)) {
  }?>
<?php endforeach; ?>
<h2>Welcome Doctor, you have <?php echo $key+1; ?> appointments.</h2>
<hr>
<?php foreach($posts as $key=>$post) : ?>
	<?php if($this->session->userdata('id') == $post['doctor_id'] AND $post['deleted'] == 0 AND $post['done'] == 0): ?>
	<div class="shadow-sm p-3 mb-5 bg-white rounded">
		<h3><?php echo date("M d Y | h:i a", strtotime($post['scheddate'])); ?> <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#done"><i class="fa fa-check" aria-hidden="true"></i></button> <a href="<?php echo base_url(); ?>posts/edit/<?php echo $post['post_id'];?>" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button></h3>
	<small><span class="badge badge-info"><?php echo $post['firstname'],' ', $post['lastname'], ' (', $post['number'],')' ?></span> <?php if($post['name']=='Consultation'){ echo "<span class='badge badge-success'>";}else if($post['name']=='Check-up'){ echo "<span class='badge badge-danger'>";}else if($post['name']=='Vaccination'){ echo "<span class='badge badge-warning'>";} ?><strong><?php echo $post['name']; ?></span></strong></small><br>
  <p class="lead">Reason: <?php echo $post['reason']; ?></p>
	<small>NOTE: <i><?php echo $post['note']; ?></i></small>
</div>
<?php endif; ?>
<?php endforeach; ?>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete appointment?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open('posts/delete/'.$post['post_id']); ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Delete">
      </div>
	</form>
    </div>
  </div>
</div>

<div class="modal fade" id="done" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Appointment done?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open('posts/done/'.$post['post_id']); ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Done">
      </div>
  </form>
    </div>
  </div>
</div>