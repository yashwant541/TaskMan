<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br>
<img src="<?php echo base_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
 <br><br>
<div class="post-body">
	<?php echo $post['body']; ?>
</div>

<hr>
<?php echo form_open(base_url('/posts/delete/'.$post['id'])) ?>
	<input type="submit" value="Delete" class="btn btn-danger">
</form>

<a class="btn btn-default" href="<?php echo base_url('posts/edit/'.$post['slug']) ?>">Edit</a>
<br>
<hr>
<br>
<h3>Comments</h3>
<br>
<?php if($comments): ?>
	<?php foreach($comments as $comment): ?>
		<div class="card card-body bg-light">
			<h5><?php echo $comment['body']; ?> - [<strong>by <?php echo $comment['name']; ?></strong>]</h5>
		</div>
	<?php endforeach; ?>
<?php else: ?>
		<p>No comments to display</p>
<?php endif; ?>
<br>
<hr>
<h3>Add Comment</h3><br><br>
<?php echo validation_errors(); ?>
<?php echo form_open(base_url('comments/create/'.$post['id'])); ?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea type="text" name="body" class="form-control"></textarea>
	</div>
	<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
	<button class="btn btn-primary" type="submit">Submit</button>
</form>