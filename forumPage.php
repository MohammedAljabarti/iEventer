<!DOCTYPE html>
<html lang="en">

<head>

<style>




#forum{

}

</style>

    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Forums</title>


      <link rel="stylesheet" href="style.css">

</head>


<?php  



session_start()


?>


<body  >



<header>
        <a href="#" class="logo">iEventer</a>
       
    </header>


<!--
<h3 style="text-align: center;">In this section you can share your thoughts and experience in event you attended</h3>

-->
 





 
<form method="POST"  name="myform">
     
<br>

<br>
 <br>

 
<br>

<br>
</div>


<div>




<h1 style="  text-align: center;
" >Subject Name</h1>
 
<h1 style="  text-align: center;
" >
<?php echo $_GET['subject']; ?>
<h1>

 <label style="margin-left:800px;">Share your experience with us</label>

<br>

<br>
<textarea  style="margin-left:300px;" name="comment" id="" cols="200" rows="20" placeholder="Insert text here"></textarea>

<br>
<input style="margin-left:800px;" type="submit" value="Share" name="sub">
</form>
<br>
<br>

<br>
<br>


     
 </p>

 


<hr>





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

$comment=$_POST['comment'];

$s=$_GET['subject'];;


 
$date=":".date("Y/m/d")." ".date("l")."";
$sql="INSERT INTO `forum` ( `Name`, `Comment`,`date`,`Subject`) VALUES ('$name', '$comment','$date','$s');";


mysqli_query($conn,$sql);


header("Location:forumPage.php?subject=".$s);
exit;



 }

 ?>




<div>
<h3>Comments:</h3>







<?php  

$conn =mysqli_connect('localhost','root','','ieventer');


if ($conn) {


  }
 else {

  }



  try{
$seso=$_GET['subject'];
}


catch(err){
  
}
 
 $sql="SELECT  * FROM forum where Subject='$seso' order by id desc;";


 $loop = mysqli_query($conn,$sql);



while($row = mysqli_fetch_array($loop)){

$id=$row['id'];



  echo "<ul> <li style=' 
  background-color: white;
  display: inline-block;
  justify-content: space-between;
  margin-left: 20ppx;
  margin-top: 20px;
  width: 580px;
  height: 200px;
  font-weight: 500;


 
 


  

  
  '>".$row['Name']." at ".$row['date'] ."<hr>" .$row['Comment'] ;



echo "<ul> <li> ";


echo "Replies:"; 

  echo $id."<br>  <br><br> <hr>";



   
   

  echo "<form method='POST'> ";


  echo "<input type='text'  style='margin-left:300px' name='commentreply'  cols='200' rows='20' placeholder='Insert text here'></textarea>
  ";
  echo " <input id='reply' type='submit' value='Reply' name='reply' >"."</ul>";

  echo "</form>";

 echo "<br>  <br> <hr>";
 
if(isset($_POST['reply'])){
 

}
}

 ?>


<script>

  
function change(){



document.getElementById("like").src="red.png";

document.getElementById("like").width=30;

document.getElementById("like").height=30;



}


  function reply(id){

    document.write('the id is '+id);
//
    //document.write('<textarea name="comment" id="" cols="30" rows="10"> </textarea>');


    //document.write('<input type="submit" value="share" name="sub">');




    
 






   
     
  }


</script>

  

</div>

 


</body>

</html>