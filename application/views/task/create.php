<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?> 

<?php echo form_open_multipart(base_url('task/create')); ?>
  <div class="form-group">
    <label>Receiver</label>
    <select name="receiver_id" class="form-control">
      <?php foreach($alluser as $user): ?>
        <?php if($user['id']!=$sender_id): ?>
        <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
        <?php endif; ?>
      <?php endforeach; ?>
    </select>
  </div>
  
  <div class="form-group">
  <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title">
  </div>
  <div class="form-group">
    <label>Description</label>
    <textarea class="form-control" name="description" placeholder="Add Description"></textarea>
  </div>
  <div class="form-group">
  <label>Priority</label>
  </div>
    <fieldset class="rating">
    <input type="radio" id="star5" name="priority" value="5" /><label class ="full" for="star5" title="5stars"></label>
    <input type="radio" id="star4" name="priority" value="4" /><label class="full" for="star4" title="4stars"></label>
    <input type="radio" id="star3" name="priority" value="3" /><label class ="full" for="star3" title="3stars"></label>
    <input type="radio" id="star2" name="priority" value="2" /><label class="full" for="star2" title="2stars"></label>
    <input type="radio" id="star1" name="priority" value="1" /><label class ="full" for="star1" title="1stars"></label>
	  </fieldset>
  <div class="form-group">
  	<input type="hidden">
  	<br> 
  </div>
  <br>
  <div align="left">
  <button type="submit" class="btn btn-default">Submit</button>
  </div>
</form>