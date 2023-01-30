<?php
session_start()
?>
 


<html>




<head>
    <title>Forum</title>


    <link rel="stylesheet" href="style.css">






    <script>
 

function filter(){

     alert("Yes?");
   
 
 


}

 
 


    </script>


    <style>



a::before {  
  transform: scaleX(0);
  transform-origin: bottom right;

}

a:hover::before {
  transform: scaleX(1);
  transform-origin: bottom left;
}

a::before {
  content: " ";
  display: block;
  position: absolute;
  top: 0; right: 0; bottom: 0; left: 0;
  inset: 0 0 0 0;
  background: hsl(200 100% 80%);
  z-index: -1;
  transition: transform .3s ease;
}

a {
  position: relative;
  font-size: 16px;;
}



 

@media (orientation: landscape) {
  body {
    grid-auto-flow: column;
  }
}

    </style>
</head>



<body style="background-color:rgb(255, 255 255);">


    <header>
        <a href="#" class="logo">iEventer</a>
       
    </header>


    <br>
    <br>
    <br>   
    <br>

 <div class="BIG">
    <h1 style="text-align: center;">Welcome to Forum Page</h1>
    


<br>
    <h3 style="text-align: center;">In this page You can choose one of the events topics below and start  discussion about it </h3>
     

<br>


<div>
    <form action="" method="POST" enctype="multipart/form-data">
<label for="">Select Subject Category</label>

<br>
        <select name="selct" id="selection">


            <option value="Programming">Programming</option>

            <option value="Regelgion">Religion</option>

            <option value="Sport">Sport</option>

            <option value="Technical">Technical</option>

            <option value="Other">Other</option>









        </select>



        <br>

        <label for="">Subject name:</label>

        <br>
<input name="subject" id="discussion" type="text" required>


<br>
<br>


<label for="">Select a Picture for the topic:</label>

<input type="file" name="file" id="file" />




<br>
<br>

<input name="sub" type="submit" value="start discussion!"  >

    </form>


</div>



<h2 id="deleting">Click To Delete Existed Forum!</h2>
<img src="images/delete.png" alt="adding new forum" width=80 height=80 onclick="Delete_Forum()" id="addpicdel">






<div >


<br>

 




<form method="POST" id="delete_forum" name="delete" style="display:none;" onclick="Delete_Forum()">


<h2>Select from the Following existed forums to Delete!</h2>


<br>

<select name="deletion" >






<?php




$conn =mysqli_connect('localhost','root','','ieventer');


if ($conn) {


echo "Connection sucsessful";
 }
 else {

 echo "error";
 }

 $name=$_SESSION['name'];


 $sql="SELECT * from form_cat where name ='$name';
" ;
;
 

$loop = mysqli_query($conn,$sql);



while($row = mysqli_fetch_array($loop)){

 
    $subject=$row['Subject_name'];
    $pic=$row['pic'];

  echo "


  <option value='$subject'>$subject</option>
";

 

   


}











?>
</select>
<br>
<br>

<input name="del" type="submit" class="btn btn-dark" value="Apply" onclick="hide('deleting','delete_forum','deleting')"  >

</form>





<hr>

<h2 id="editing">Click To Edit Existed Forum!</h2>
<img src="images/edit.png" alt="edit new forum" width=80 height=80 onclick="Edit_Forum()" id="edit">


<!--Edit feature-->

 
<form method="POST" id="edit_forum" name="edit" style="display:none;" onclick="Edit_Forum()">


<h2>Select from the Following existed forums to Edit!</h2>


<br>

<select name="editing" >






<?php




$conn =mysqli_connect('localhost','root','','ieventer');


if ($conn) {


echo "Connection sucsessful";
 }
 else {

 echo "error";
 }

 $name=$_SESSION['name'];


 $sql="SELECT * from form_cat where name ='$name';
" ;
;
 

$loop = mysqli_query($conn,$sql);



while($row = mysqli_fetch_array($loop)){

 
    $subject=$row['Subject_name'];
    $pic=$row['pic'];

  echo "


  <option value='$subject'>$subject</option>
";

 

   


}







?>
</select>
<br>
<br>




<h3>The new Name:</h3>



<br>
 <input name="edited"   type='text'>
<br>

<br>



<h3>The New  Category:</h3>

<select name="selct_to_edit" id="selection">


<option value="Programming">Programming</option>

<option value="Regelgion">Religion</option>

<option value="Sport">Sport</option>

<option value="Technical">Technical</option>

<option value="Other">Other</option>









</select>


<br>


<br>

<input name="edit" type="submit"  class="btn btn-dark" value="Apply" onclick="hide('edit','edit','editing')"  >

</form>






<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$conn =mysqli_connect('localhost','root','','ieventer');


if ($conn) {


echo "Connection sucsessful";
 }
 else {

 echo "error";
 }


 
 

 if(isset($_POST["edit"])){ 




  $old_name=$_POST['editing'];
  

  $new_name=$_POST['edited'];

  if($new_name==''){


    $new_name=$old_name;

  }

  $category=$_POST['selct_to_edit'];



  $sql="UPDATE form_cat
  SET Subject_name = '$new_name', Category= '$category'
  WHERE Subject_name = '$old_name';";
  try{
  mysqli_query($conn,$sql);

    
 

  }
  
  
  catch(err){
  
  }


  echo "<script> msg_del_edit()</script>";


 
   
//header("Location:Create_Form.php");
//ob_end_flush();

 

 }





 if(isset($_POST["del"])){ 

 
  $seleced=$_POST['deletion'];

 
  $sql="DELETE FROM `form_cat` WHERE Subject_name='$seleced';
  ";
  try{
  mysqli_query($conn,$sql);
  }
  
  
  catch(err){
  
  }
  

  echo "<script> msg_del_edit()</script>";
  
//header("Location:Create_Form.php");
//ob_end_flush();

 

 }







 if(isset($_POST["sub"])){





    $name=$_SESSION['name'];

    $category=$_POST['selct'];


    $subject=$_POST['subject'];

    $_SESSION['subject'] = $subject;


 
    $filename = $_FILES["file"]["name"];
    
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "images/" . $filename;
    move_uploaded_file($filename, $folder);



    $date=date("Y/m/d")." ".date("l")."";
$sql="INSERT INTO `form_cat` (`Name`, `Category`, `Subject_name`, `Date`,`pic`) VALUES ('$name', '$category', '$subject', '$date','$folder');";

try{
mysqli_query($conn,$sql);
}


catch(err){

}


 







function Send_Notification($email){


require_once "vendor/autoload.php";

//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions

$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";

$mail->SMTPAuth = "true";
$mail->SMTPSecure = "tls";
$mail->Port = "587";
// optional
// used only when SMTP requires authentication  
$mail->SMTPAuth = true;
$mail->Username = 'ieventersm11@gmail.com

';
$mail->Password = 'ztdyqzlpujlkqifd';

//From email address and name
$mail->From = "ieventersm11@gmail.com

";
$mail->FromName = "iEventer";

//To address and name
$mail->addAddress($email); //Recipient name is optional

//Address to which recipient will reply
//$mail->addReplyTo("reply@yourdomain.com", "Reply");

/*CC and BCC
$mail->addCC("cc@example.com");
$mail->addBCC("bcc@example.com");
*/

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Forums";
$mail->Body = "<b> A New forum is available Created by ".$_SESSION['name']." Discussing {' ".$_SESSION['subject']." '}";
$mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    echo "Message has been sent successfully";
} catch (Exception $e) {
    echo "Mailer Error: --> " . $mail->ErrorInfo;
}

$mail->smtpClose();

}



$sql="SELECT * from users;";
    
     
    
$loop = mysqli_query($conn,$sql);



while($row = mysqli_fetch_array($loop)){

 
    $email=$row['email'];

    Send_Notification($email);

 
 }    





header("Location:Create_Form.php");
ob_end_flush();


     


 }

 
 

?>




</div>



<div >



<?php


$conn =mysqli_connect('localhost','root','','ieventer');


if ($conn) {


echo "Connection sucsessful";
 }
 else {

 echo "error";
 }




 if(isset($_POST["sub"])){

    $name=$_SESSION['name'];

    $category=$_POST['selct'];


    $subject=$_POST['subject'];

    $filename = $_FILES["file"]["name"];
    
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "images/" . $filename;
    move_uploaded_file($filename, $folder);



    $date=":".date("Y/m/d")." ".date("l")."";
$sql="INSERT INTO `form_cat` (`Name`, `Category`, `Subject_name`, `Date`,`pic`) VALUES ('$name', '$category', '$subject', '$date','$folder');";

try{
mysqli_query($conn,$sql);
}


catch(err){

}

header("Location:Create_Form.php");
exit;
     


 }


?>




</div>



<hr>



<div  >
<h3>Filter:</h3>
 


 <form action="" method="POST">


 <input name="Programming" type="submit" value="Programming" >  

 <input name="Regelgion" type="submit" value="Regelgion" > 
<input name="Sport" type="submit" value="Sport" >
<input name="Technical" type="submit" value="Technical">
<input name="Other" type="submit" value="Other" >
<input name="All" type="submit"  value="All">



 </form>
<ul>
<br>
<br>
<h3>Exited forums:</h3>

 <?php 




$conn =mysqli_connect('localhost','root','','ieventer');


if ($conn) {


echo "Connection sucsessful";
 }
 else {

 echo "error";
 }



 
 if(isset($_POST["Regelgion"])){ // show relg only


    $sql="SELECT * FROM `form_cat` where Category='Regelgion' order by id desc";
    
     
    
    $loop = mysqli_query($conn,$sql);
    
    
    
    while($row = mysqli_fetch_array($loop)){
    
     
        $subject=$row['Subject_name'];
        $pic=$row['pic'];
    
      echo "<li> <a href='forumPage.php?subject=$subject'> Category     :   ". $row["Category"].",    Subject Name     :    ". $row["Subject_name"] .",     Posted by     :    ".$row["Name"].",    In            "  .$row["Date"]."...     <img        alt='topic picture'     src='$pic' height=150 width=150'> <hr> <br> </li> " ;
    }    



 }
 





 
 if(isset($_POST["Sport"])){




    $sql="SELECT * FROM `form_cat` where Category='Sport' order by id desc";
    
     
    
    $loop = mysqli_query($conn,$sql);
    
    
    
    while($row = mysqli_fetch_array($loop)){
    
     
        $subject=$row['Subject_name'];
        $pic=$row['pic'];
    
      echo "<li> <a href='forumPage.php?subject=$subject'> Category     :   ". $row["Category"].",    Subject Name     :    ". $row["Subject_name"] .",     Posted by     :    ".$row["Name"].",    In            "  .$row["Date"]."...     <img        alt='topic picture'     src='$pic' height=150 width=150'> <hr> <br> </li> " ;
    }    



 }
 
 


 if(isset($_POST["Technical"])){


    $sql="SELECT * FROM `form_cat` where Category='Technical' order by id desc";
    
     
    
    $loop = mysqli_query($conn,$sql);
    
    
    
    while($row = mysqli_fetch_array($loop)){
    
     
        $subject=$row['Subject_name'];
        $pic=$row['pic'];
    
      echo "<li> <a href='forumPage.php?subject=$subject'> Category     :   ". $row["Category"].",    Subject Name     :    ". $row["Subject_name"] .",     Posted by     :    ".$row["Name"].",    In            "  .$row["Date"]."...     <img        alt='topic picture'     src='$pic' height=150 width=150'> <hr> <br> </li> " ;
    }    



 }
 


 if(isset($_POST["Other"])){


    $sql="SELECT * FROM `form_cat` where Category='Other' order by id desc";
    
     
    
    $loop = mysqli_query($conn,$sql);
    
    
    
    while($row = mysqli_fetch_array($loop)){
    
     
        $subject=$row['Subject_name'];
        $pic=$row['pic'];
    
      echo "<li> <a href='forumPage.php?subject=$subject'> Category     :   ". $row["Category"].",    Subject Name     :    ". $row["Subject_name"] .",     Posted by     :    ".$row["Name"].",    In            "  .$row["Date"]."...     <img        alt='topic picture'     src='$pic' height=150 width=150'> <hr> <br> </li> " ;
    }    



 }
 


 if(isset($_POST["Programming"])){


    $sql="SELECT * FROM `form_cat` where Category='Programming' order by id desc";
    
     
    
    $loop = mysqli_query($conn,$sql);
    
    
    
    while($row = mysqli_fetch_array($loop)){
    
     
        $subject=$row['Subject_name'];
        $pic=$row['pic'];
    
      echo "<li> <a href='forumPage.php?subject=$subject'> Category     :   ". $row["Category"].",    Subject Name     :    ". $row["Subject_name"] .",     Posted by     :    ".$row["Name"].",    In            "  .$row["Date"]."...     <img        alt='topic picture'     src='$pic' height=150 width=150'> <hr> <br> </li> " ;
    }    



 }
 









 if(isset($_POST["All"])){


    $sql="SELECT * FROM  `form_cat` order by id desc;
    " ;
    ;
        
     
    
    $loop = mysqli_query($conn,$sql);
    
    
    
    while($row = mysqli_fetch_array($loop)){
    
     
        $subject=$row['Subject_name'];
        $pic=$row['pic'];
    
      echo "<li> <a href='forumPage.php?subject=$subject'> Category     :   ". $row["Category"].",    Subject Name     :    ". $row["Subject_name"] .",     Posted by     :    ".$row["Name"].",    In            "  .$row["Date"]."...     <img        alt='topic picture'     src='$pic' height=150 width=150'>  <br> <hr> </li> " ;
    }    



 }







 
 
 
 ?>

 </ul>


<ul>



<!--



<?php


$conn =mysqli_connect('localhost','root','','ieventer');


if ($conn) {


echo "Connection sucsessful";
 }
 else {

 echo "error";
 }



 $sql="SELECT * FROM  `form_cat` order by id desc;
" ;
;
 

$loop = mysqli_query($conn,$sql);



while($row = mysqli_fetch_array($loop)){

 
    $subject=$row['Subject_name'];
    $pic=$row['pic'];

  echo "<li> <a href='forumPage.php?subject=$subject'> Category     :   ". $row["Category"].",    Subject Name     :    ". $row["Subject_name"] .",     Posted by     :    ".$row["Name"].",    In            "  .$row["Date"]."...     <img        alt='topic picture'     src='$pic' height=150 width=150'> <br> </li> " ;


 

   


}

?>

-->


</ul>


</div>

</div>

</body>
</html>
