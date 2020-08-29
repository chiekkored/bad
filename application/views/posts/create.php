<div class="row justify-content-md-center">
  <div class="col-md-4 col-md-offset-4">
    <h1 class="text-center" style="font-family: 'Raleway', sans-serif;"><?= $title; ?></h1>
        <?php echo form_open('posts/create'); ?>
              <div class="form-group">
                <label>Schedule of Appointment</label>
                <span><input type="datetime-local" class="form-control" name="scheddate" value="">
                  <small>Enter date and time respectively.<?php echo form_error('scheddate', '<label><span class="badge badge-danger">', '</span></label>'); ?></small></span>

              </div>
          <div class="form-group">
            <label>Kind of doctor</label>
            <select name="expertise" id="expertise" class="form-control">
              <option value="">Select Kind</option>
              <?php foreach($doctor_expertise as $expertise): ?>
                <option value="<?php echo $expertise['de_id']; ?>"><?php echo $expertise['name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>List of doctor available</label>
            <select name="doctor_id" id="doctor" class="form-control">
              <option value="">Select Doctor</option>
            </select>
          </div>
          <div class="form-group">
          	<label>Category</label>
          	<select name="category_id" class="form-control">
          		<?php foreach($categories as $category): ?>
          			<option value="<?php echo $category['category_id']; ?>"><?php echo $category['name']; ?></option>
          		<?php endforeach; ?>
          	</select>
          </div>
          <div class="form-group">
            <label>Reason</label>
            <input type="text" name="reason" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Note</label>
            <textarea class="form-control" name="note"></textarea>
          </div>
      <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </div>
  </div>
</form>

<script>
  $(document).ready(function(){

  $('#expertise').on('change', function(){
    var de_id = $(this).val();
    
      $.ajax({
        url:"<?php echo base_url(); ?>Posts/get_doctor",
        type: "POST",
        data: {'de_id' : de_id},
        dataType: 'json',
        success: function(data){
          $('#doctor').html(data);
        },
        fail: function(){
          alert('ERRORRR');
        }
      });
    }); 
  });
</script>