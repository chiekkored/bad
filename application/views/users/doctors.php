<h2>List of doctors</h2>
<hr>
	<div class="shadow-sm p-3 mb-5 bg-white rounded">
		<table class="table">
			
		
	<?php $conn = mysqli_connect('localhost', 'root', '', 'bad'); $records = mysqli_query($conn, "SELECT * from users WHERE user_role = 'Doctor' ORDER BY lastname ASC"); while ($row = mysqli_fetch_array($records)) { 
		echo '<tr><td>Dr. '. $row['firstname'].' '. $row['lastname'].'</td><td>'.$row['number'].'</td></tr>'; } ?>

		</table>
</div>