<html>
	<head>
		<title>TaskMan</title>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styles.css'); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script>
        /* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
        function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
          document.getElementById("main").style.marginLeft = "250px";
          document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }

        /* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
          document.getElementById("main").style.marginLeft = "0";
          document.body.style.backgroundColor = "white";
        }
    </script>
    <script>
      // Look for .hamburger
      var hamburger = document.querySelector(".hamburger");
      // On click
      hamburger.addEventListener("click", function() {
        // Toggle class "is-active"
        hamburger.classList.toggle("is-active");
        // Do something else, like open/close menu
      });
    </script>
    <script>
      $(document).ready(function() {
        $('label').click(function() {
          $('label').removeClass('active');
          $(this).addClass('active');
        });
      });
    </script>
	</head>
	<body>







		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    


      <?php if($this->session->userdata('logged_in')): ?>
        <?php if($this->session->userdata('admin')): ?>
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="<?php echo base_url() ?>admin/profile">Profile</a>
            <a href="<?php echo base_url() ?>admin/alltask">All Tasks</a>
          </div>
          <!-- Use any element to open the sidenav -->
          <span onclick="openNav()">
          <button class="hamburger hamburger--arrowturn-r" type="button">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
          </span>
        <?php else: ?>
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="<?php echo base_url() ?>users/profile">Profile</a>
            <a href="<?php echo base_url() ?>task/create">Create Task</a>
            <a href="<?php echo base_url() ?>users/your_tasks">Your Task</a>
            
          </div>
          <!-- Use any element to open the sidenav -->
          <span onclick="openNav()">
          <button class="hamburger hamburger--arrowturn-r" type="button">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
          </span>
        <?php endif; ?>
      <?php endif; ?>




      








    <a class="navbar-brand" href="<?php echo base_url() ?>">TaskMan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>about">About</a>
          </li>
      <?php if($this->session->userdata('logged_in')): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>users">Users</a>
          </li>
      <?php endif; ?>
    </ul>
    <ul class="navbar-nav mr-auto navbar-right">
      <?php if(!$this->session->userdata('logged_in')): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>users/login">Login<span class="sr-only">(current)</span></a>
        </li>
      <?php else: ?>
        <?php if($this->session->userdata('admin')): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>users/register">Register<span class="sr-only">(current)</span></a>
        </li>
        <?php endif; ?>
      <?php endif; ?>
      <?php if($this->session->userdata('logged_in')): ?>
        <?php if($this->session->userdata('admin')): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>admin/logout">Logout<span class="sr-only">(current)</span></a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>users/logout">Logout<span class="sr-only">(current)</span></a>
          </li>
        <?php endif; ?>  
      <?php endif; ?>
    </ul>
  </div>
</nav>
<div id="main">
<div class="container">
  <!-- Flash Messages -->
  <?php if($this->session->flashdata('user_registered')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_created')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_updated')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_deleted')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('category_created')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('login_failed')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('login_success')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('login_success').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('logout')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('logout').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('profile_updated')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('profile_updated').'</p>'; ?>
  <?php endif; ?>
