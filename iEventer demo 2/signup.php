<html>


    <link rel="stylesheet" href="style.css">
    <script type="text/javascript">
        function checkInfo() {
            var username = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var pw1 = document.getElementById("pw").value;
            var pw2 = document.getElementById("pw2").value;
            var pass_val = /^[A-Za-z]\w{7,14}$/;
            if (username == "" || email == "" || pw1 == "" || pw2 == "") {
                document.getElementById("checking").innerHTML = '<h1 style="margin: 8px 0; width: 100%; border-radius: 5px; padding: 10px 15px; text-align: center; background-color: red; color: white;font-size:20">You must filled all the fields</h1>';
            } else {
                document.getElementById("checking").innerHTML = '';
                checkEmail();
                checkPassword();
                if ((email.endsWith('@stu.kau.edu.sa') || email.endsWith('@kau.edu.sa')) && pw1 == pw2 && pw1.length >= 8 && pw1.match(pass_val)) {
                    document.getElementById("sub").style.display = "block";
                    document.getElementById("name").style.borderColor = "black";
                    document.getElementById("email").style.borderColor = "black";
                    document.getElementById("pw").style.borderColor = "black";
                    document.getElementById("pw2").style.borderColor = "black";
                    document.getElementById("checking").innerHTML = '<h1 style="margin: 8px 0; width: 100%; border-radius: 5px; padding: 10px 15px; text-align: center; background-color: rgb(48, 170, 48); color: white;font-size:20">Valid information</h1>';
                }
            }
        }

        function checkEmail() {
            var email = document.getElementById("email").value;
            if (!(email.endsWith('@stu.kau.edu.sa') || email.endsWith('@kau.edu.sa'))) {
                document.getElementById("checking").innerHTML = '<h1 style="margin: 8px 0; width: 100%; border-radius: 5px; padding: 10px 15px; text-align: center; background-color: red; color: white;font-size:20">email must end with @stu.kau.edu.sa</h1>';
                document.getElementById("sub").style.display = "none";
                document.getElementById("email").style.borderColor = "red";
            } else {
                document.getElementById("email").style.borderColor = "black";
            }
        }

        function checkPassword() {
            var pw1 = document.getElementById("pw").value;
            var pw2 = document.getElementById("pw2").value;
            var pass_val = /^[A-Za-z]\w{7,14}$/;
            if (!(pw1 == pw2 && pw1.length >= 8 && pw1.match(pass_val))) {
                document.getElementById("sub").style.display = "none";
                document.getElementById("pw").style.borderColor = "red";
                document.getElementById("pw2").style.borderColor = "red";
                document.getElementById("checking").innerHTML = '<h1 style="margin: 8px 0; width: 100%; border-radius: 5px; padding: 10px 15px; text-align: center; background-color: red; color: white;font-size:20">incorrect password</h1>';

            } else {
                document.getElementById("pw").style.borderColor = "black";
                document.getElementById("pw2").style.borderColor = "black";
            }
        }
    </script>
</head><?php
$conn = mysqli_connect('localhost', 'root', '', 'ieventer');
if ($conn) {
    echo "Connection sucsessful";
} else {
    echo "error";
}

if (isset($_POST['sub'])) {
    $name = $_POST['uname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $sql = "INSERT INTO users(username,email,Password) VALUES ('$name','$email','$password');";
    mysqli_query($conn, $sql);
}
?>

<body style="background-color:rgb(255, 255 255);">
     <header>
        <a href="#" class="logo">iEventer</a>
    </header>
    <div class="form-container">
        <form action="" method="POST" name="form" id="form">
            <div id="checking"></div>
            <input name="uname" type="text" id="name" placeholder="Enter your name" required />
            <input name="email" type="email" id="email" placeholder="Enter your email" required />
            <input name="pass" type="password" id="pw" placeholder="Enter your password" required />
            <input name="cpassword" type="password" id="pw2" placeholder="Confirm your password" required />
            <input type="button" value="check info" id="checker" onclick="checkInfo()" required />
            <p>already have an account? <a href="login.php">login now</a></p>
            <hr>
            <input style="display:none" type="submit" id="sub" name="sub" class="form-btn" value="register now" />
            <div style="font-size:13px; color:darkblue">
                <ul style="text-align: left; margin-top:3px; margin-left:15px">
                    <li>Make sure to enter email ends with @stu.kau.edu.sa or @kau.edu.sa</li>
                    <li>Password should contain upper, lower casses, numbers and (8 characters minimum)</li>
                </ul>
            </div>
        </form>
    </div>
    <footer class="footer">
        <p class="footer-title"><span>Copyrights @ </span>Mohammed Aljabarti and Shadi Basudan</p>
    </footer>
</body>

<?php
include 'config.php';
if (isset($_POST['sub'])) {
    $name = mysqli_real_escape_string($conn, $_POST['uname']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $std_domain = '@stu.kau.edu.sa';
    $ins_domain = '@kau.edu.sa';
    $default_image = 'images/default-avatar.png';
    $select = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND password = '$password'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
        echo '';
    } else {
        if ($password != $cpass) {
            echo 'confirm password not matched!';
        } elseif ((endsWith($email, $std_domain) || endsWith($email, $ins_domain)) == false) {
            echo 'email should ends with @stu.kau.edu.sa or @kau.edu.sa !';
        } else {
            $insert = mysqli_query($conn, "INSERT INTO user (id, name, email, password, gender, department, image,Notify) VALUES(NULL, '$name', '$email', '$password', 'NULL', 'NULL', '$default_image','Y')") or die('query failed');
            header('location:login.php');
            exit;
        }
    }
}

function endsWith($string, $endString)
{
    $len = strlen($endString);
    if ($len == 0) {
        return true;
    }
    return (substr($string, -$len) === $endString);
}
?>

</body>
</html>
