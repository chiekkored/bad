<h2>Appointments</h2>
<hr>
<?php foreach($posts as $post) : ?>

 	<?php if($this->session->userdata('id') == $post['user_id'] AND $post['deleted'] == 0 AND $post['done'] == 0): ?>
	<div class="shadow-sm p-3 mb-5 bg-white rounded">
		<h3><?php echo date("M d Y | h:i a", strtotime($post['scheddate'])); ?></h3>
	<small><span class="badge badge-info">Dr. <?php $id = $post['doctor_id']; $conn = mysqli_connect('localhost', 'root', '', 'bad'); $records = mysqli_query($conn, "SELECT firstname from users WHERE user_id = $id"); while ($row = mysqli_fetch_array($records)) { echo $row['firstname'];
} $post['doctor_id'] ?></span> <?php if($post['name']=='Consultation'){ echo "<span class='badge badge-success'>";}else if($post['name']=='Check-up'){ echo "<span class='badge badge-danger'>";}else if($post['name']=='Vaccination'){ echo "<span class='badge badge-warning'>";} ?><strong><?php echo $post['name']; ?></span></strong></small><br>
	<p class="lead">Reason: <?php echo $post['reason']; ?></p>
	<small>NOTE: <i><?php echo $post['note']; ?></i></small>
</div>
 <?php endif; ?> 
<?php endforeach; ?>