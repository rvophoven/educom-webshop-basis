<!-- Welkom page-->
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/stylesheet.css">
  </head>
  <body>
  <?php 
       $page = $_GET['page'];

       if (($page == "about")||($page == "home")||($page == "contact")){
        header('Location: http://localhost/educom-webshop-basis/' . $page . '.php');
       }
       else{
       
       }

  ?>

  <!--top section page-------------------------------------------------------------------->
    

  <!--mid section page-------------------------------------------------------------------->
  

  <!--bottum section page-------------------------------------------------------------------->
    
  </body>
</html>