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
          return test_input($_REQUEST["file"]);
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

      function getRegister(){}
      function getLogin(){}
      function getLogOut(){}
      
  // --Show the different pages--------------------------------------------------------------
    function showPage($page){ 
      $salutation = $name = $email = $number = $message = $methode = $pass = $passRe ="";
      $nameErr = $emailErr = $numberErr = $messageErr = $nameReErr = $emailReErr = $passErr = $rePassErr ="";
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
            case "register":
                echo '<div class="titlePage">Register page</div>';
                break;
            case "login":
                echo '<div class="titlePage">Login page</div>';
                break;
            case "logout":
                echo '<div class="titlePage">Logout page</div>';
                break;
            case "contactF":
              echo '<div class="titlePage">Contact page</div>';
              break;
            case "registerF":
              echo '<div class="titlePage">Register page</div>';
              break;
            case "loginF":
              echo '<div class="titlePage">Login page</div>';
              break;
            default:
            echo '<div class="titlePage">No content page</div>';
          }
          ?>
          <!--Show links -->
            <div class="links">
              <a href="index.php?page=home">HOME -</a>
              <a href="index.php?page=about">ABOUT -</a>
              <a href="index.php?page=contact">CONTACT -</a>
              <a href="index.php?page=register">REGISTER -</a>
              <a href="index.php?page=login">LOGIN -</a>
              <a href="index.php?page=logout">LOGOUT</a>
            </div>
          </header>
          <!--mid section page-------------------------------------------------------------------->
          <?php 
              // switch between mid sections 
              if(($page =="home")||($page =="about")||($page =="contact")||($page =="register")||($page =="login")||($page =="logout")){
                include $page . ".php";
              }else{
                switch($page){
                  case "contactF": // at form load form on page
                    getForm(); 
                    break;
                  case "registerF": // at form load form on page
                    getRegister(); 
                    break;
                  case "loginF": // at form load form on page
                    getLogin(); 
                    break;
                  default:
                  echo "Wrong page link";
                } 
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