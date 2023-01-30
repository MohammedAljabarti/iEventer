

<?php
session_start();

ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<head>
<script>



function msg(){

   swal({
  title: "HTML <small>Title</small>!",
  text: "<img src='images/send-email.gif' >",
  html: true
});

//swal('Successfully Done!', '', 'success');


}



function msg_del_edit(){

 

swal('Successfully Done!', 'PLease Refresh The Page', 'success');


}







function hide(pic,form,text){

 
 
document.getElementById(pic).style.display="BLOCK";

document.getElementById(form).style.display="BLOCK";
document.getElementById(text).style.display="BLOCK";





}







   function CreateSuitable() {



var option=document.getElementById("sel").value;

if(option=="Youtube"){

  <?php $platform="Youtube"; ?>
 document.getElementById("YT").style.display="BLOCK";
}
else{
   document.getElementById("YT").style.display="none";


}




if(option=="Local Video"){



   document.getElementById("localVid").style.display="BLOCK";


 
}


else{

   document.getElementById("localVid").style.display="none";

}






if(option=="Tweet"){



document.getElementById("Tweet").style.display="BLOCK";



}


else{

document.getElementById("Tweet").style.display="none";

}












if(option=="Insta"){

 

document.getElementById("Insta").style.display="BLOCK";



}


else{

document.getElementById("Insta").style.display="none";

}








if(option=="Flyer"){

 

document.getElementById("Local_flyer").style.display="BLOCK";



}


else{

document.getElementById("Local_flyer").style.display="none";

}






console.log(option);


   }



   function add_Add(){

document.getElementById("adding_form").style.display="BLOCK";

document.getElementById("advrtisement_pic").style.display="none";


document.getElementById("add_text").style.display="none";


}







function Delete_Forum(){


document.getElementById("delete_forum").style.display="BLOCK";

document.getElementById("addpicdel").style.display="none";


document.getElementById("deleting").style.display="none";

}




function Edit_Forum(){
   
   document.getElementById("edit_forum").style.display="BLOCK";
 
 document.getElementById("edit").style.display="none";
 
 
 document.getElementById("editing").style.display="none";
 
 
 
 }
 



</script>


<link rel="stylesheet" href="style.css">



<style>


h1{

   text-align:center;
}

form{

margin-left:40%;

}

img{  
   
   
   margin-left:100px;"



}


iframe{
display:relative;

left:90px;
}





</style>
</head>
<body>


 
    <header>
        <a href="#" class="logo">iEventer</a>
    </header>
<h1>Help More people to reach your event by advertising it!</h1>



 <form action="">

<label for="">Select the method of advertizing</label>


    
<h1 id="add_text">Click to Add an add!</h1>


<img style="margin:0 50% 0 50%" src="images/ad.png"  width=80 height=80 alt="" onclick="add_Add()" id="advrtisement_pic">


<form action="" id="adding_form" style="display:none;">

<label for="">Select the method of advertizing</label>


<select id="sel"  onchange="CreateSuitable()"   name="" id="">

<option value=""  ><-Select-></option>

<option value="Youtube"  >Youtube</option>


<option value="Local Video"  >Local Video</option>

<option value="Flyer">Flyer</option>


<option value="Tweet"  >Tweet</option>


<option value="Insta"  >Instagram Post</option>


 
</select>



<!-- HIDDEN TAGS APPEAR ON EVENTS ONLY --->


</form>

  
<form method="POST" action=""  id="YT" style="display:none;">


<img     src="images/youtube.png" alt="" height=100 width=100>
<br>
   
<label>Write a brief description</label>
        <input type="text" name="descr" id="de"  required/>
        <br>

        <br>
        <label>Type the video URL in the box </label>

<input name="URL"  style="margin-left=30px;"    type="text" placeholder="insert the URL"  required> 

<br>
<br>


<input type="submit" name="subYT" id="submit"   />



</form>

 

 








<form method="POST" enctype="multipart/form-data"  id="localVid"  style="display:none;">


<img src="images/folders.png" alt="" heigth=100 width=100>

<br>
<br>
<input type="file" name="file" id="file" required/>
        <br>
        <label> Description</label>
        <input type="text" name="descr" id="de" required />
        <br>
        <br>
        <input type="submit" name="subLOC" id="submit" />
    </form>





    


<form method="POST" enctype="multipart/form-data"  id="Local_flyer"  style="display:none;">


<img src="images/flyer.png" alt="" heigth=100 width=100>

<br>
<br>
<input type="file" name="file" id="file" required/>
        <br>
        <label> Description</label>
        <input type="text" name="descr" id="de" required />
        <br>
        <br>
        <input type="submit" name="subLoc_Flyer" id="submit" />
    </form>



 





    

<form method="POST"   id="Tweet"  style="display:none;">


<img src="images/twitter-sign.png" alt="" heigth=100 width=100>

<br>
<br>
<label>Write a brief description</label>
        <input type="text" name="descr" id="de"  required/>
        <br>

        <br>
        <label>Paste the tweet URL in the box </label>

<input name ="URL" style="margin-left=30px;"    type="text" placeholder="insert the URL"  required> 
        <input type="submit" name="subTW" id="submit" />
    </form>





    

<form method="POST"   id="Insta"  style="display:none;">


<img src="images/instagram.png"  heigth=100 width=100>

<br>
<br>
<label>Write a brief description</label>
        <input type="text" name="descr" id="de"  required/>
        <br>

        <br>
        <label>Paste the POST URL in the box </label>

<input  name ="URL"  style="margin-left=30px;"    type="text" placeholder="insert the URL"  required> 
        <input type="submit" name="subIG" id="submit" />
    </form>



    <br>
<hr>


<br>

 

<h1 id="deleting">Click To Delete An advertisement!</h1>

<img style="margin:0 50% 0 50%"    src="images/delete_col.png" alt="adding new forum" width=80 height=80 onclick="Delete_Forum()" id="addpicdel">






<form method="POST" id="delete_forum" name="delete" style="display:none;" onclick="Delete_Forum()">


<h2>Select from the Following Ads  to Delete!</h2>


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


 $sql="SELECT * from advertisments WHERE name ='$name';
" ;
;
 

$loop = mysqli_query($conn,$sql);



while($row = mysqli_fetch_array($loop)){

 
    $description=$row['description'];
   

  echo "


  <option value='$description'>$description</option>
";

 

   


}











?>
</select>
<br>
<br>

<input name="del" type="submit" class="btn btn-dark" value="Apply" onclick="hide('deleting','delete_forum','deleting')"  >

</form>

<!--Edit-->


<hr>


<h1 id="editing">Click To Edit Existed Forum!</h1>
<img style="margin:0 50% 0 50%" src="images/edit.png" alt="edit new forum" width=80 height=80 onclick="Edit_Forum()" id="edit">


<!--Edit feature-->

 
<form method="POST" id="edit_forum" name="edit" style="display:none;" onclick="Edit_Forum()">


<h2>Select from the Following Ads to Edit!</h2>


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


 $sql="SELECT * from advertisments WHERE name ='$name';
" ;
;
 

$loop = mysqli_query($conn,$sql);



while($row = mysqli_fetch_array($loop)){

 
    $description=$row['description'];

  echo "


  <option value='$description'>$description</option>
";

 

   


}







?>
</select>
<br>
<br>




<h3>The new Description:</h3>



<br>
 <input name="edited"   type='text'>
<br>

<br>




<br>


<br>

<input name="edit" type="submit"  class="btn btn-dark" value="Apply" onclick="hide('edit','edit','editing')"  >

</form>






<hr>




<?php
 




 $conn = mysqli_connect('localhost', 'root', '', 'ieventer');
 if ($conn) {
    
 } else {
 
     echo "error";
 }


 $edit='';



 if(isset($_POST["edit"])){ 




   $old_name=$_POST['editing'];
   
 
   $new_name=$_POST['edited'];
 
   if($new_name==''){
 
 
     $new_name=$old_name;
 
   }
 
 
 
 
   $sql="UPDATE advertisments 
   SET description = '$new_name', Edited= 'YES'
   WHERE description = '$old_name';";
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
 
  
   $sql="DELETE FROM advertisments WHERE description='$seleced';
   ";
   try{
   mysqli_query($conn,$sql);
   }
   
   
   catch(err){
   
   }
   
 
   
   //header("Location:Advertisement.php");
   //ob_end_flush();
 
  
 
  }
 








 if (isset($_POST['subLoc_Flyer'])) {


   $name= $_SESSION['name'];
   $date=":".date("Y/m/d")." ".date("l")."";


   $filename = $_FILES["file"]["name"];
   try {
       $desc = $_POST['descr'];
   } catch (Exception $e) {
   }
   $tempname = $_FILES["file"]["tmp_name"];
   $folder = "images/" . $filename;
   move_uploaded_file($filename, $folder);



 

 
   if(str_contains($folder, 'png')||str_contains($folder, 'jpg') ||str_contains($folder, 'jpeg')){



      
      

   
 
      $sql="INSERT INTO `advertisments` (`description`, `URL`, `platform`, `name`, `date`, `Edited`) VALUES ('$desc', '$folder', 'iEventer_Server_Flyer', '$name', '$date','NY');";
      mysqli_query($conn, $sql);
    



      echo "<script> msg()</script>";


   header("Location:Advertisement.php");
   ob_end_flush();

     
   }


   



    else {

      echo "<script> alert('The folder uploaded is not a flyer (Image)')
      </script>
      ";
    }






}








 if (isset($_POST['subLOC'])) {


   $name= $_SESSION['name'];
   $date=":".date("Y/m/d")." ".date("l")."";


   $filename = $_FILES["file"]["name"];
   
       $desc = $_POST['descr'];
    
   $tempname = $_FILES["file"]["tmp_name"];
   $folder = "videos/" . $filename;
   move_uploaded_file($filename, $folder);



   if(str_contains($folder, 'mp4')){




   
      $sql="INSERT INTO `advertisments` ( `description`, `URL`, `platform`, `name`, `date`, `Edited`) VALUES ('$desc', '$folder', 'iEventer_Server_Vid', '$name', '$date','NY');";
      mysqli_query($conn, $sql);
    
 
   header("Location:Advertisement.php");
   ob_end_flush();

} 


else{


   echo "<script> alert('The folder uploaded is not a video! ')
   </script>
   ";

}

 


 

}








 if(isset($_POST['subYT'])){

$desc=$_POST['descr'];

$URL=$_POST['URL'];


 

if (str_contains($URL, 'https://www.youtube.com/watch?')) {
 





    $name= $_SESSION['name'];

    $date=":".date("Y/m/d")." ".date("l")."";
    
    
    $sql="INSERT INTO `advertisments` (`description`, `URL`, `platform`, `name`, `date`, `Edited`) VALUES ('$desc', '$URL', 'Youtube', '$name', '$date','NY');";
    
    
    try{
       mysqli_query($conn,$sql);
       }
       
       
       catch(err){
       
       }
       
    
       header("Location:Advertisement.php");
    
       ob_end_flush();



}

 else {
    echo "<script> alert('The URL Entered Is not a YouTube URL')
    </script>
    ";


    
}

 

 }



 if(isset($_POST['subTW'])){

   $desc=$_POST['descr'];
   
   $URL=$_POST['URL'];




     
   





   if (str_contains($URL, 'https://twitter.com')) {
 





      $name= $_SESSION['name'];
  
      $date=":".date("Y/m/d")." ".date("l")."";
      
      
      $sql="INSERT INTO `advertisments` (`description`, `URL`, `platform`, `name`, `date`, `Edited`) VALUES ('$desc', '$URL', 'Twitter', '$name', '$date','NY');";
      
      
      try{
         mysqli_query($conn,$sql);
         }
         
         
         catch(err){
         
         }
         
      
         header("Location:Advertisement.php");
      
         ob_end_flush();
  
  
  
  }
  
   else {
      echo "<script> alert('The URL Entered Is not a Twitter URL')
      </script>
      ";
  
  
      
  }




   
    }




    if(isset($_POST['subIG'])){

      $desc=$_POST['descr'];
      
      $URL=$_POST['URL'];
      
      



   if (str_contains($URL, 'https://www.instagram.com/')) {
 





      $name= $_SESSION['name'];
  
      $date=":".date("Y/m/d")." ".date("l")."";
      
      
      $sql="INSERT INTO `advertisments` (`description`, `URL`, `platform`, `name`, `date`, `Edited`) VALUES ('$desc', '$URL', 'Instagram', '$name', '$date','NY');";
      
      
      try{
         mysqli_query($conn,$sql);
         }
         
         
         catch(err){
         
         }
         
      
         header("Location:Advertisement.php");
      
         ob_end_flush();
  
  
  
  }
  
   else {
      echo "<script> alert('The URL Entered Is not an Instagram URL')
      </script>
      ";
  
  
      
  }
      
    }

       

    $sql="SELECT * from advertisments order by id desc;";
    
     
    
    $loop = mysqli_query($conn,$sql);
    
    
    
    while($row = mysqli_fetch_array($loop)){






      if($row["platform"]=="iEventer_Server_Flyer"){



         
         if($row['Edited']=='YES'){


         }




         
         echo "<h2 style='margin-left:45%;'>Advertised through<h2>"."<br>";
   
         echo "<img  style='margin-left:45%;'    src='images/iEventer_servers.png' alt= height=200 width=200>";
   
   
         echo "<br>";
         echo "<br>";
   
   
            $url=$row['URL'];
   
   
            echo "<h3>".$row['name']." At"." ".$row['date'] ."<br>";
   
   
   echo "        <img   style='margin-left:40%;'    controls width='440' height='340' src='$url' > </img>" ."  <br>  <br>
   ";



 

   echo "<h3 style='text-align:center; color:red'>Brief Description: <br>";



   
   if($row['Edited']=='YES'){

      $edit="[Edited]";
            
   }


   echo "$edit"."<br>";

   
   echo "<br>".$row['description']."<br>";


   echo "<hr>";

   
         }









      if($row["platform"]=="iEventer_Server_Vid"){







         
      echo "<h2 style='margin-left:45%;'>Advertised through<h2>"."<br>";

      echo "<img  style='margin-left:45%;'    src='images/iEventer_servers.png' alt= height=200 width=200>";


      echo "<br>";
      echo "<br>";


         $url=$row['URL'];

         echo "<h3>".$row['name']." At"." ".$row['date'] ."<br>";
   
       

echo "        <video   style='margin-left:40%;'    controls width='440' height='340' src='$url' > </video>" ."  <br>  <br>
";




echo "<h3 style='text-align:center; color:red'>Brief Description: <br>";

if($row['Edited']=='YES'){

   $edit="[Edited]";
         
}

echo "$edit"."<br>";


   
echo "<br>".$row['description']."<br>";


echo "<hr>";



      }



if($row["platform"]=="Instagram"){



   
   echo "<h2 style='margin-left:45%;'>Advertised through<h2>"."<br>";

         echo "<img  style='margin-left:50%;'    src='images/instagram.png' alt= height=100 width=100>";


         echo "<br>";
         echo "<br>";

   $url=$row['URL'];

   echo "<h3>".$row['name']." At"." ".$row['date'] ."<br>";
   
 

echo "<blockquote class='instagram-media' data-instgrm-permalink='$url=ig_embed&amp;utm_campaign=loading' data-instgrm-version='14' style=' background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);'><div style='padding:16px;'> <a href='$url=ig_embed&amp;utm_campaign=loading' style=' background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;' target=_blank'> <div style=' display: flex; flex-direction: row; align-items: center;'> <div style='background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;'></div> <div style='display: flex; flex-direction: column; flex-grow: 1; justify-content: center;'> <div style=' background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;'></div> <div style=' background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;'></div></div></div><div style='padding: 19% 0;'></div> <div style='display:block; height:50px; margin:0 auto 12px; width:50px;'><svg width='50px' height='50px' viewBox='0 0 60 60' version='1.1' xmlns='https://www.w3.org/2000/svg' xmlns:xlink='https://www.w3.org/1999/xlink'><g stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'><g transform='translate(-511.000000, -20.000000)' fill='#000000'><g><path d='M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631'></path></g></g></g></svg></div><div style='padding-top: 8px;'> <div style=' color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;'>View this post on Instagram</div></div><div style='padding: 12.5% 0;'></div> <div style='display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;'><div> <div style='background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);'></div> <div style='background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;'></div> <div style='background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);'></div></div><div style='margin-left: 8px;'> <div style=' background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;'></div> <div style=' width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)'></div></div><div style='margin-left: auto;'> <div style=' width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);'></div> <div style='background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);'></div> <div style='width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);'></div></div></div> <div style='display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;'> <div style=' background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;'></div> <div style=' background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;'></div></div></a><p style=' color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;'><a href='$url=loading' style=' color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;' target='_blank'>A post shared by Crash Bandicoot (@crashbandicoot)</a></p></div></blockquote> <script async src='//www.instagram.com/embed.js'></script>'"."<br>  <br>";


   

echo "<h3 style='text-align:center; color:red'>Brief Description: <br>";


if($row['Edited']=='YES'){

   $edit="[Edited]";
         
}

echo "$edit"."<br>";

   
echo "<br>".$row['description']."<br>";


echo "<hr>";

  }



if($row["platform"]=="Twitter"){


   echo "<h2 style='margin-left:45%;'>Advertised through<h2>"."<br>";

         echo "<img  style='margin-left:50%;'    src='images/twitter-sign.png' alt= height=100 width=100>";


         echo "<br>";
         echo "<br>";


$url=$row['URL'];


 

echo "<h3>".$row['name']." At"." ".$row['date'] ."<br>";
   
 
echo "<pre>";
  echo "                              <blockquote style='margin-left:-5;' class='twitter-tweet'><p lang='ar' dir='rtl'></p>&mdash;  <a href='$url'></a></blockquote> <script async src='https://platform.twitter.com/widgets.js' charset='utf-8'></script> .<br>  <br>
  ";



  echo "</pre>";



  
echo "<h3 style='text-align:center; color:red'>Brief Description: <br>";


if($row['Edited']=='YES'){

   $edit="[Edited]";
         
}

echo "$edit"."<br>";

   
echo "<br>".$row['description']."<br>";


echo "<hr>";



}

    
      if($row['platform']=="Youtube"){


         echo "<h2 style='margin-left:45%;'>Advertised through<h2>"."<br>";

         echo "<img  style='margin-left:50%;'    src='images/youtube.png' alt= height=100 width=100>";


         echo "<br>";
         echo "<br>";


$url=$row['URL'];



$cut=substr($url,32);

$res="https://www.youtube.com/embed/".$cut;


echo "<h3>".$row['name']." At"." ".$row['date'] ."<br>";
   
 
 


  echo "<iframe width='560' height='315' src='$res' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen> ></iframe>" ."<br> <br>";


  
echo "<h3 style='text-align:center; color:red'>Brief Description: <br>";
   


if($row['Edited']=='YES'){

   $edit="[Edited]";
         
}

echo "$edit"."<br>";



echo "<br>".$row['description']."<br>";


echo "<hr>";


}
    
     }    
   


?>


 
 
</body>
</html>
