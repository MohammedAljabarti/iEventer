<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        video {
            display: block;
            margin-left: 50%;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Meetings</title>
</head>

<?php
session_start()
?>

<body>
    <h1>Meetings section</h1>
    <h2>In this section u can uplad a recorded video for your event, ad about your event </h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file" />
        <label> Description</label>
        <input type="text" name="descr" id="de" />
        <input type="submit" name="sub" id="submit" />
    </form>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'ieventer');

    if ($conn) {
        echo "Connection sucsessful";
    } else {
        echo "error";
    }

    if (isset($_POST['sub'])) {
        $filename = $_FILES["file"]["name"];
        try {
            $desc = $_POST['descr'];
        } catch (Exception $e) {
        }
        $tempname = $_FILES["file"]["tmp_name"];
        $folder = "videos/" . $filename;
        move_uploaded_file($filename, $folder);
        try {
            $sql = "INSERT INTO videos (id, description, name) VALUES (NULL, '$desc', '$folder');";
            mysqli_query($conn, $sql);
        } catch (Exception $e) {
        }
    }
    ?>

    <div>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'ieventer');
        if ($conn) {
            echo "Connection sucsessful";
        } else {
            echo "error";
        }

        $sql = "SELECT * from videos ;";
        $loop = mysqli_query($conn, $sql);
        if (mysqli_num_rows($loop) > 0) {
            while ($row = mysqli_fetch_array($loop)) {
        ?>
                Description
                <br>
                <?php echo $row["description"] ?>
                <video controls width="340" height="240" src="<?php echo $row["name"] ?>"> </video>;
                <hr>
        <?php
            }
        }
        echo "    <hr>";
        ?>
    </div>
</body>

</html>