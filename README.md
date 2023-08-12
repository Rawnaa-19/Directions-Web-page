# Directions Web page
## Table of Contents : 
1. [Introduction](#Introduction)
1. [HTML](#HTML)
    - [Code](#Code)
1. [CSS](#CSS)
    - [Code](#Code)
    - [Page Layout](#Page-Layout)
    - [Hover](#Hover)
1. [PHP](#PHP)
     - [Insert Code](#Insert-into-database-Code)
     - [Database](#Database)
     - [Retrieve Code](#Retrieve-Code)
     - [Retrieve Page](#Retrieve-Page)
1. [The Final Output](#The-Final-Output)

## Introduction
The first task for the Software Department is to create a web page with five buttons. Each button will store its value in a database when pressed.
## HTML 
In the html file, I have declared five form submit buttons left,right,forward,backward,and stop.
### Code
```
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Directions</title>
 </head>
  <body>
    <form action="http://localhost/web1/write.php" method="post">
       <div class="north">
      <input  type="submit" name="button" value="Forward">
    </div> 
        <div class="center">
          <input  type="submit" name="button" value="Left">
          <input  type="submit" name="button" value="Stop">
          <input  type="submit" name="button" value="Right">
      </div>
    <div class="south">
      <input  type="submit" name="button" value="Backward">
    </div>
  
    
    </script>
    </form>
    
  </body>
</html>
```
## CSS
The CSS code is included with the html file. By using CSS, the buttons were styled and positioned according to their values, with some actions added when they were hovered over.
### Code
```
    <style>
      input[value="Stop"] {
        border: 2px solid red;
      }
      
      input {
        background-color: #ababa8;
        border-radius: 12px;
        width: 100px;
        height: 50px;
        padding: 3px;
        color: white;
        border: 2px solid whitesmoke;
        margin: 8px 0;
        transition: all 0.5s;
        cursor: pointer;
        font-size: 20px;
        font-family: Georgia, serif;
      }
      input:hover[value="Stop"] {
        background-color: red;
        width: 120px;
        height: 60px;
      }
      input:hover[value="Right"] {
        box-sizing: border-box;
        width: 120px;
        padding-right: 30px;
        height: 60px;
        border: 4px solid rgb(80, 146, 226);
        background-image: url('https://img.icons8.com/ios-filled/50/5092e2/chevron-right.png');
        background-size: 30px;
        background-position-x: 100%;
        background-position-y: 50%;
        background-repeat: no-repeat;
      }
      input:hover[value="Left"] {
        box-sizing: border-box;
        width: 120px;
        padding-left: 30px;
        height: 60px;
        border: 4px solid rgb(80, 146, 226);
        background-image: url('https://img.icons8.com/ios-filled/50/5092e2/chevron-left.png');
        background-size: 30px;
        background-position-x: 0%;
        background-position-y: 50%;
        background-repeat: no-repeat;
      }
      input:hover[value="Forward"] {
        box-sizing: border-box;
        width: 120px;
        padding-top: 25px;
        height: 60px;
        border: 4px solid rgb(80, 146, 226);
        background-image: url('https://img.icons8.com/ios-filled/50/5092e2/chevron-up.png');
        background-size: 30px;
        background-position-x: 50%;
        background-position-y: 0%;
        background-repeat: no-repeat;
      }
      input:hover[value="Backward"] {
        box-sizing: border-box;
        width: 120px;
        padding-bottom: 25px;
        height: 60px;
        border: 4px solid rgb(80, 146, 226);
        background-image: url('https://img.icons8.com/ios-filled/50/5092e2/chevron-down.png');
        background-size: 30px;
        background-position-x: 50%;
        background-position-y: 100%;
        background-repeat: no-repeat;
      }
.center {
  position: relative;
  top: 30%;
  width: 100%;
  text-align: center;
  margin-top: 35px;
  margin-bottom: 35px;
}
.center input[value="Right"] {

  margin-left: 40px;
}
.center input[value="Left"] {

margin-right: 40px;
}
.south {
  position: relative;
  top: 30%;
  width: 100%;
  text-align: center;
  
}
.north {
  margin-top: 35px;
  text-align: center;
} 
    </style>
```
### Page Layout

<kbd> **Figure 1** <br><br>*Web Page*<br><br> <kbd>![image](https://github.com/Rawnaa-19/Directions-Web-page/assets/106926557/94fcf864-a7f5-437c-9782-6113a52c6b16)</kbd></kbd>

### Hover


https://github.com/Rawnaa-19/Directions-Web-page/assets/106926557/524173e3-348e-4bbd-85c6-543b1fc9a1cf

## PHP
There are two PHP files used in this task. The first file is attached under the following name "write.php", it is responsible for inserting the value of the button pressed into the database. The second file attached under the  name "lastV.php" is responsible for retrieving the last entered value from the database.
### Insert into database Code
```
<?php
$con = mysqli_connect ("localhost","root","","db_direction");  
if (!$con)  
  {  
  die ('Could not connect: ' . mysql_error());  
  }  

if(isset($_POST['button']))
{
  $button_value = $_POST['button'];
 // print_r($button_value);
  // Insert the data into the database
  $sql = "INSERT INTO buttons (direction) VALUES ('$button_value')";
  mysqli_query($con, $sql);
 header("refresh:1,url=index.html");
 
}
?>
```
### Database
I have created a database with one table that has two columns the first column is the id that increaments automatically whenever a new row is added and the second column is the direction.<br><br

<kbd> **Figure 2** <br><br>*Database*<br><br> <kbd>![image](https://github.com/Rawnaa-19/Directions-Web-page/assets/106926557/d6617388-5eb7-455b-a6db-0afe7444ab26)</kbd></kbd>

### Retrieve Code
```
<?php

$con = mysqli_connect ("localhost","root","","db_direction");  
if (!$con)  
  {  
  die ('Could not connect: ' . mysql_error());  
  }

$quer = "SELECT direction FROM  buttons ORDER BY id DESC LIMIT 1 ";

$result = $con->query($quer);
//echo "$result";
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        echo $row['direction'];
    }
}
else{
    echo"no result";
}

?>
```
### Retrieve Page
The last value stored in the database is right. Therefore, the retrieve code should print out "Right".<br><br>
<kbd> **Figure 3** <br><br>*Database Last Value*<br><br> <kbd>![image](https://github.com/Rawnaa-19/Directions-Web-page/assets/106926557/ade9333a-772e-4ea3-8d4d-324315438469)</kbd></kbd><br><br>
<kbd> **Figure 4** <br><br>*Last Value Retrieved*<br><br> <kbd>![image](https://github.com/Rawnaa-19/Directions-Web-page/assets/106926557/9c1f1c45-7de9-4cc3-952c-652515860c79)</kbd></kbd>

## The Final Output


https://github.com/Rawnaa-19/Directions-Web-page/assets/106926557/954781c3-1542-4662-a207-d48a636b73b1



