<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>MONGODB Crud</title>
  <link href="http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold" rel="stylesheet" type="text/css"/>
    <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:regular,bold" rel="stylesheet" type="text/css"/>
  <link href="<?php echo base_url();?>assets/public/stylesheets/app.less" media="all" rel="stylesheet/less" type="text/css" />
  <script src="<?php echo base_url();?>assets/public/javascripts/less-1.0.41.js"></script>
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body>
<?php $this->load->view('templates/header');?>
<?php $this->load->view('templates/nav-menu');?>
<?php $this->load->view($main);?>
<?php $this->load->view('templates/footer');?>
</body>
</html>