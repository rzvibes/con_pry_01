<?php include_once("header.php"); ?>
<section id="container">
    <?php include_once("topbar.php"); ?>
    <?php include_once("menu.php"); ?>

    
    <?php include_once("footer.php"); ?>
  </section>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Bienvenido!',
        // (string | mandatory) the text inside the notification
        text: 'modelo en desarrollo Kuv Soluciones tecnológicas ',
        // (string | optional) the image to display on the left
        //image: 'img/ui-sam.jpg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>