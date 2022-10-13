    <!--mid section page-------------------------------------------------------------------->
    <section class="contentContact">
         <!--show or dont show form-->

      <form method="post" action="index.php"> <!--make a form-->
        <input type="hidden" name="file" value="registerF">
        <!--Fill in name. Is checkes if empty-->
        <label>Name:</label><input type="text" name="name"  value="<?php echo $name;?>">  <span class="error"> <?php echo $nameErr;?></span><br>
        <!--Fill in email. Is checked if empty/valid-->
        <label>Email:</label><input type="text" name="email" value="<?php echo $email;?>">  <span class="error"><?php echo $emailErr;?></span><br>
        <!--Fill in password. Is checked if empty/valid-->
        <label>Password:</label><input type="text" name="pass" value="<?php echo $pass;?>"> <span class="error"><?php echo $passErr;?></span><br>
        <!--Repeat password. Is checked if empty/valid-->
        <label>Password:</label><input type="text" name="passRe" value="<?php echo $passRe;?>"> <span class="error"><?php echo $rePassErr;?></span><br>
        <!--Send button to send form and data to server-->
        <label>Send:</label><input type="submit" name="sendbutton" value="Send"><br>
      </form>
    </section>