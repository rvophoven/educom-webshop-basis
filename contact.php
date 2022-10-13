<!-- Contact page-->
    <!--mid section page-------------------------------------------------------------------->
    <section class="contentContact">
         <!--show or dont show form-->

      <form method="post" action="index.php"> <!--make a form-->
        <input type="hidden" name="file" value="contactF">
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
    </section>

