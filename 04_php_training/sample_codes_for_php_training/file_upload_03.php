<?php

function msn_check_for_uploading( $error ) {
	$result = [];
	switch ( $error ) {
		case 0 :
			$result['can_continue_file_process'] = true;
			$result['message']                   = '';
			break;
		case 1:
			$result['can_continue_file_process'] = false;
			$result['message']                   = 'The uploaded file exceeds the upload_max_filesize';
			break;
		case 2:
			$result['can_continue_file_process'] = false;
			$result['message']                   = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
			break;
		case 3:
			$result['can_continue_file_process'] = false;
			$result['message']                   = 'Problem in max file size of HTML form';
			break;
		case 4:
			$result['can_continue_file_process'] = false;
			$result['message']                   = 'No file was uploaded';
			break;
		case 6:
			$result['can_continue_file_process'] = false;
			$result['message']                   = 'Missing a temporary folder';
			break;
		case 7:
			$result['can_continue_file_process'] = false;
			$result['message']                   = 'Failed to write file to disk';
			break;
		case 8:
			$result['can_continue_file_process'] = false;
			$result['message']                   = 'A PHP extension stopped the file upload';
			break;
	}

	return $result;
}

function msn_return_path( $path ) {
	if ( file_exists( $path ) ) {
		return $path;
	} else {
		mkdir( $path, 0777, true );

		return $path;
	}
}

function msn_check_for_target( $file ) {
	if ( file_exists( $file ) ) {
		$result['can_continue_file_process'] = false;
		$result['message']                   = 'This file is uploaded before and you can not upload it again!';
	} else {
		$result['can_continue_file_process'] = true;
		$result['message']                   = '';
	}

	return $result;
}

function msn_check_for_limitation( $filename, $filetmpname, $filesize, $uploadpath ) {
	$result        = [];
	$allowed_files = [
		"jpg"  => "image/jpg",
		"jpeg" => "image/jpeg",
		"gif"  => "image/gif",
		"png"  => "image/png",
	];
	$max_size      = 2 * 1024 * 1024;

	// Verify file extension
	$ext = pathinfo( $filename, PATHINFO_EXTENSION );
	if ( ! array_key_exists( $ext, $allowed_files ) ) {
		$result['can_continue_file_process'] = false;
		$result['message']                   = 'Your file is not an image file<br>Only allowed jpg, jpeg, png and gif';

		return $result;
	} elseif ( $filesize > $max_size ) {
		$result['can_continue_file_process'] = false;
		$result['message']                   = 'Your file is larger than expected<br>Only allowed less than 2M for file size';

		return $result;
	} else {
		move_uploaded_file( $filetmpname, $uploadpath . $filename );
		$result['can_continue_file_process'] = false;
		$result['message']                   = '<h2>You file was uploaded succesfully.</h2>';

		return $result;
	}


}


if ( isset( $_POST["submit"] ) ) {

	/*Define variable for ease of access*/
	$file_name     = $_FILES["uploaded-file"]["name"];
	$file_error    = $_FILES["uploaded-file"]["error"];
	$file_type     = $_FILES["uploaded-file"]["type"];
	$file_size     = $_FILES["uploaded-file"]["size"];
	$file_tmp_name = $_FILES["uploaded-file"]["tmp_name"];


	$msn_result = msn_check_for_uploading( $file_error );
	if ( $msn_result['can_continue_file_process'] ) {

		$upload_path = msn_return_path( 'uploads/images/' );
		$target_file = $upload_path . basename( $file_name );
		$msn_result  = msn_check_for_target( $target_file );

		if ( $msn_result['can_continue_file_process'] ) {
			$msn_result = msn_check_for_limitation( $file_name, $file_tmp_name, $file_size, $upload_path );
		}
	}
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
    <input type="file" name="uploaded-file" id="uploaded-file">
    <br>
    <input type="submit" value="Upload Image" name="submit" class="msn-for-btn">
</form>
<div class="msn-m15">
	<?php
	if ( isset( $msn_result['message'] ) && ! empty( $msn_result['message'] ) ) {
		?>
        <div class="wrapper"><?php echo $msn_result['message']; ?></div>
		<?php
	}
	?>
</div>


</body>
</html>