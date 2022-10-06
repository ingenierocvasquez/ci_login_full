<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="es">

<head><meta charset="gb18030">

  
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="">

  <title>Hello</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url().'assets/bootstrap/css/bootstrap.css'?>" rel="stylesheet">

  <link href="<?php echo base_url().'assets/bootstrap/css/plantilla.css'?>" rel="stylesheet">
      

  <script type="text/javascript">
    $(function(){
      var url = window.location.href; 

      $("#tabs a").each(function() {
       if(url == (this.href)) { 
        $(this).closest("li").addClass("active");
      }
    });
    });

    $(function(){
      var url = window.location.href; 

      $("#items a").each(function() {
       if(url == (this.href)) { 
        $(this).closest("li").addClass("active");
      }
    });
    });

  </script> 



</head>

<body>
  <div id="content" class="container">




