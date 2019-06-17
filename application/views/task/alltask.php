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
  <tr class="table-light">
        <th scope="row"><a href="<?php echo base_url() ?>users/inside" class="rowlink"><?php echo $send['title']; ?></a></th>
        <!--<td><?php echo $send['description']; ?></td>-->
        <td><?php echo $send['priority']; ?></td>
        <td><?php echo $send['chat_date']; ?></td>
        <td><?php echo $send['name']; ?></td>
  </tr>
<?php endforeach; ?>