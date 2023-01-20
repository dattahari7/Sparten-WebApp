<?php

error_reporting(0);

?>

<?php

$msg = "";

// check if the user has clicked the button "UPLOAD" 

if (isset($_POST['uploadfile'])) {

    $filename = $_FILES["choosefile"]["name"];

    $tempname = $_FILES["choosefile"]["tmp_name"];

    $folder = "image/" . $filename;

    // connect with the database

    $db = mysqli_connect("localhost", "root", "", "test");

    // query to insert the submitted data

    $sql = "INSERT INTO image (filename) VALUES ('$filename')";

    // function to execute above query

    mysqli_query($db, $sql);

    // Add the image to the "image" folder"

    if (move_uploaded_file($tempname, $folder)) {

        $msg = "Image uploaded successfully";
    } else {

        $msg = "Failed to upload image";
    }
}

$result = mysqli_query($db, "SELECT * FROM image");
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo " product Name{$product['filename']}";
        echo "";
        // echo '<img src="data:image/jpeg;base64,' . base64_encode($product['productImage']);
        // echo 'height="371" width="464""/>';
        // echo '"/>';
    }
} else {
    echo "No Product Found";
}
mysqli_close($connection);
?>