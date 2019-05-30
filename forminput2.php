<!DOCTYPE html>
<html>
  <head>
    <title>Area of Circle</title>
  </head>


  <body>

    <h1>Form Input - Area of Circle</h1>
    <p>Demo of how to take form input and pass it to a program - all in a single page</p>

    <?php
       // define variables and set to empty values
       $lower = $upper = $output = $retc = "";

       if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $lower = test_input($_POST["Lower bound"]);
         $upper = test_input($_POST["Upper bound"]);
         exec("/usr/lib/cgi-bin/sp1a/areaofcircle2 " . $lower . " " . $upper, $output, $retc); 
       }

       function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Lower: <input type="text" name="lower"><br>
      Upper: <input type="text" name="upper"><br>
      <br>
      <input type="submit" value="Go!">
    </form>

    <?php
       // only display if return code is numeric - i.e. exec has been called
       if (is_numeric($retc)) {
         echo "<h2>Your Input:</h2>";
         echo $lower;
         echo "<br>";
         echo $upper;
         echo "<br>";
       
         echo "<h2>Program Output (an array):</h2>";
         foreach ($output as $line) {
           echo $line;
           echo "<br>";
         }
       
         echo "<h2>Program Return Code:</h2>";
         echo $retc;
       }
    ?>
    
  </body>
</html>
