<!DOCTYPE html>
<?php
require_once('navBar.php');

?>

<html lang="en">

<body>
<script src='scripts/jquery.min.js'></script>
  <script type='text/javascript'>
    setInterval(function(){carrega()}, 400);
     function carrega() {

        $('#dados').load('monitoraBanco2.php');
     }
	
  </script>

    <tbody>
      
	  <div id="dados"> </div></br>
	  
    </tbody>
  
</body>
</html>


