<h2><?= $title; ?></h2>


<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <!--<th scope="col">Description</th>-->
      <th scope="col">Priority</th>
      <th scope="col">Chat Date</th>
      <th scope="col">Sender</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($sender as $send): ?>
  <?php if($send['receiver_id'] === $receiver_id): ?>
  <tr class="table-light">
        <th scope="row"><a href="<?php echo base_url() ?>users/inside" class="rowlink"><?php echo $send['title']; ?></a></th>
        <!--<td><?php echo $send['description']; ?></td>-->
        <td><?php echo $send['priority']; ?></td>
        <td><?php echo $send['chat_date']; ?></td>
        <td><?php echo $send['name']; ?></td>
  </tr>
<?php endif; ?>
<?php endforeach; ?>




<!--
<?php $yuk=1;?>
<?php foreach($urtasks as $taska): ?>

<div class="jumbotron">
  <h1 class="display-3"><?php echo "TASK ".$yuk; $yuk=$yuk+1; ?></h1>
  <p class="lead"><?php echo $taska['title']; ?></p>
  <hr class="my-4">
  <p><?php echo $taska['description']; ?></p>
  <p class="lead">
    chat_date:<?php echo $taska['chat_date']; ?>
  </p>
  <p class="lead">
    Sender_id:<?php echo $taska['sender_id']; ?>
  </p>
  <p class="lead">
    Receiver_id:<?php echo $taska['receiver_id']; ?>
  </p>
  <p class="lead">
    Priority:<?php echo $taska['priority']; ?>
  </p>

</div>
<?php endforeach; ?>


<?php echo $send['id']; ?><br>
<?php echo $send['sender_id']; ?><br>
<?php echo $send['receiver_id']; ?><br>
<?php echo $send['title']; ?><br>
<?php echo $send['description']; ?><br>
<?php echo $send['priority']; ?><br>
<?php echo $send['chat_date']; ?><br>
<?php echo $send['name']; ?><br>
<?php echo $send['email']; ?><br>
<?php echo $send['username']; ?><br>
<?php echo $send['register_date']; ?><br>
<hr><br><br>

-->