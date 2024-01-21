<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "views/templates/head.php"; ?>
    <title>Facial Recog Test</title>
    <link rel="stylesheet" href="css/test.css">
    <script src="face-api.js/dist/face-api.js"></script>
</head>

<body>
    <div class="d-flex justify-content-center">
        <div class="card m-1">
            <img src="images/face_detect/1x1.jpg" id="dbImg" class="card-img-top">
            <div class="card-body">
                <h4 class="card-title">Reference Image</h4>
                <p class="card-text">This is the image from the database</p>
            </div>
        </div>
        <div class="card m-1">
            <img src="images/face_detect/input_img.jpg" id="inputImg" class="card-img-top">
            <div class="card-body">
                <h4 class="card-title">Input Image</h4>
                <p class="card-text">This is the input image from the user</p>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <b>Similarity: </b><span id="result_msg">Processing...</span>
    </div>

    <script type="module" src="js/script.js"></script>
</body>

</html>