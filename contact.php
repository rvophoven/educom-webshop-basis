<!-- Contact page-->
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/stylesheet.css">
  </head>
  <body>
    <!--php code-------------------------------------------------------------------->
    <?php
      //define variables
      $salutation = $name = $email = $number = $message = $methode = "";
      $nameErr = $emailErr = $numberErr = $messageErr = "";
      $valid = 0;

      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //First filter al values
        $salutation = test_input($_POST["salutation"]);
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $number = test_input($_POST["number"]);
        $message = test_input($_POST["message"]);
        $methode = test_input($_POST["methode"]);

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
  
      }
      // filter data recieved. Trim, remove slashes and replace html script.
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>

    <!--head section page-------------------------------------------------------------------->
    <header class="navigation">
      <div class="titlePage">Contact page</div>

      <div class="links">
        <a href="index.html">HOME -</a>
        <a href="about.html">ABOUT -</a>
        <a href="contact.php">CONTACT</a>
      </div>
    </header>

    <!--mid section page-------------------------------------------------------------------->
    <section class="contentContact">
      <?php if ($valid <= 3){ ?>   <!--show or dont show form-->

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <!--make a form-->
        <!--Choose salutation-->
        <label>Salutation:</label>
        <select name="salutation"> 
          <option value="Dhr" <?php if($salutation == "Dhr") echo "selected";?>>Dhr</option>
          <option value="Mvr" <?php if($salutation == "Mvr") echo "selected";?>>Mvr</option>
          <option value="Beste" <?php if($salutation == "Beste") echo "selected";?>>Beste</option>
        </select><br>
        <!--Fill in name. Is checkes if empty-->
        <label>Name:</label><input type="text" name="name"  value="<?php echo $name;?>">  <span class="error"> <?php echo $nameErr;?></span><br>
        <!--Fill in email. Is checked if empty/valid-->
        <label>Email:</label><input type="text" name="email" value="<?php echo $email;?>">  <span class="error"><?php echo $emailErr;?></span><br>
        <!--Fill in number. Is checked if empty/valid-->
        <label>Number:</label><input type="text" name="number" value="<?php echo $number;?>"> <span class="error"><?php echo $numberErr;?></span><br>
        <!--Choose response type-->
        <label>Respons by:</label>
        <input type="radio" name="methode" id="methodeEmail" value="Email" checked=<?php if (isset($methode) && $methode=="Email") echo "checked";?>><label>:Email</label>
        <input type="radio" name="methode" id="methodeNumber" value="Number" <?php if (isset($methode) && $methode=="Number") echo "checked";?>><label>:Number</label><br>
        <!--Fill in message. Is checked if empty-->
        <label>Message:</label> <span class="error"><?php echo $messageErr;?></span><br>
        <textarea name="message" rows="5" cols="40">  <?php echo $message;?></textarea><br>
        <!--Send button to send form and data to server-->
        <label>Send:</label><input type="submit" name="sendbutton" value="Send"><br>
      </form>
      <!-- All 4 fields okay? Show thank you and send information -->
      <?php }else { 
        echo "<h2>Thank you for your input:</h2>";
        echo $salutation . "  " . $name . "<br>";
        echo $email . "<br>";
        echo $number . "<br>";
        echo $message . "<br>";
        echo "We wil message you by:" . $methode . "<br>";
      }
       ?>  
    </section>
     
    <!--bottum section page-------------------------------------------------------------------->
      <footer class="footnote">
        <p>&copy; 2022 Ramon van Ophoven</p>
      </footer>

  </body>
</html>
