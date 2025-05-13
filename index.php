<?php 
include('phpqrcode/qrlib.php');

if (isset($_POST['data'])) $data = $_POST['data'];
else $data = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div class="container" id="container">
        <form action="" method="POST" id="qrForm">
        <h1>QR Code Generator</h1>
            <label>Enter Text or URL</label>
            <input type="text" name="data" value="<?=$data?>" placeholder="Enter Text or URL">
            <label>Select QR Code Size</label>
            <select name="size">
                <option value="500">Small (500x500)</option>
                <option value="750">Medium (750x750)</option>
                <option value="1000">Large (1000x1000)</option>
            </select>
            <button type="submit">
                Generate QR Code
            </button>
        </form>
        <div class="qr">
            <?php if (isset($_POST['data']) && !empty($_POST['data'])) {
                $data = $_POST['data'];
                $size = (int)$_POST['size'];

                $filePath = 'qrcodes/'. uniqid(). '.png';
                QRcode::png($data, $filePath, QR_ECLEVEL_L, $size/150);
                echo "<h2>Here is your QR Code</h2>";
                echo "<img src='$filePath' alt='QR Code'><br>";
                echo "<a href='$filePath' download>Download QR Code</a>";
            }else {
                echo "<br>No Data Received!</br>";
            } ?>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>