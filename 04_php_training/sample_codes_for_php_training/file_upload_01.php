<?php

if ( isset( $_FILES ) && ! empty( $_FILES ) ) {
    var_dump( $_FILES );
}

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Register User</title>
    <style>
        .wrapper {
            width: 60%;
            margin: 20px auto;
            background-color: #b5fce2;
            border: 2px solid black;
            color: #000000;
            border-radius: 10px;
            padding: 20px;
        }

        .msn-m15 {
            margin: 15px;
        }

        .msn-for-btn {
            display: inline-block;
            text-decoration: none !important;
            background-color: #276dff;
            color: white;
            font-size: 16px;
            padding: 10px !important;
            margin: 20px;

        }
    </style>
</head>
<html>

<body>

<form class="wrapper" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ) ?>" method="post" enctype="multipart/form-data">
    <label for="uploaded-file">Select image to upload:</label>
    <input type="file" name="uploaded-file" id="uploaded-file" >
    <br>
    <input type="submit" value="Upload Image" name="submit" class="msn-for-btn">
</form>


</body>
</html>