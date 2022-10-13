<!-- Welkom page-->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
  <?php 
      
        $page = getRequestedPage();
        showPage($page);

      // filter data recieved. Trim, remove slashes and replace html script.
       function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      // 
      function getRequestedPage() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
          return $_GET['page'];
        }elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
          return "index";
        }else{
          
        }
      }

      function getForm(){
            //define variables        
            $valid = 0;
            $salutation = $name = $email = $number = $message = $methode = "";
            $nameErr = $emailErr = $numberErr = $messageErr = "";
        
            //First filter al values
            $salutation = test_input($_REQUEST["salutation"]);
            $name = test_input($_REQUEST["name"]);
            $email = test_input($_REQUEST["email"]);
            $number = test_input($_REQUEST["number"]);
            $message = test_input($_REQUEST["message"]);
            $methode = test_input($_REQUEST["methode"]);

            //check field for correct data
            if (empty($name)) {
              $nameErr = "Name is required";
            } else{
              $valid ++;
            }
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)||empty($email)){
              $emailErr = "Invalid email format";
            } else{
            $valid ++;
            }

            if (empty($number)){
              $numberErr = "No number";
            }elseif (!preg_match('/^[0-9]*$/',$number)){
              $numberErr = "Invalid number";
            }else{
              $valid ++;
            }

            if (empty($message)) {
              $messageErr = "Empty field";
            } else{
              $valid ++;
            }
      
            if($valid <=3){//if field invalid reload form with error
              include "contact.php";
            }else{// if info good show thank you
                echo "<h2>Thank you for your input:</h2>";
                echo $salutation . "  " . $name . "<br>";
                echo $email . "<br>";
                echo $number . "<br>";
                echo $message . "<br>";
                echo "We wil message you by:" . $methode . "<br>";
            } 
      }
      
  // --Show the different pages--------------------------------------------------------------
    function showPage($page){ 
      $salutation = $name = $email = $number = $message = $methode = "";
      $nameErr = $emailErr = $numberErr = $messageErr = "";
          ?>  
  <!--top section page-------------------------------------------------------------------->
          <header class="navigation">
          <!--Show differen title-->
          <?php 
          switch($page){
            case "home":
              echo '<div class="titlePage">Home page</div>';
              break;
            case "about":
              echo '<div class="titlePage">About page</div>';
              break;
            case "contact":
              echo '<div class="titlePage">Contact page</div>';
              break;
            case "index":
              echo '<div class="titlePage">Contact page</div>';
              break;
            default:
            echo '<div class="titlePage">No content page</div>';
          }
          ?>
          <!--Show links -->
            <div class="links">
              <a href="index.php?page=home">HOME -</a>
              <a href="index.php?page=about">ABOUT -</a>
              <a href="index.php?page=contact">CONTACT </a>
            </div>
          </header>
          <!--mid section page-------------------------------------------------------------------->
          <?php 
              // switch between mid sections 
              switch($page){
                case "home":
                  include $page . ".php";
                  break;
                case "about":
                  include $page . ".php";
                  break;
                case "contact":
                  include $page . ".php";
                  break;
                case "index": // at form load form on page
                  getForm(); 
                  break;
                default:
                echo "Wrong page link";
              } 
          ?>
          <!--bottum section page-------------------------------------------------------------------->
          <footer class="footnote">
            <p>&copy; <?php echo date("Y"); ?> Ramon van Ophoven</p>
          </footer>
          <?php
   }
  ?>
    
</body>
</html>