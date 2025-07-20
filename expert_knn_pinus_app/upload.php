<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["gambar"])) {
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);

    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
    $uploaded = true;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Upload Gambar Pohon</title>
  <style>
  body {
    font-family: Arial;
    background: #f0f8ff;
    padding: 30px;
    text-align: center;
  }

  .box {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    display: inline-block;
  }

  img {
    max-width: 100%;
    height: auto;
    margin-top: 15px;
    border-radius: 10px;
  }
  </style>
</head>

<body>
  <div class="box">
    <h2>🖼️ Upload Gambar Pohon</h2>
    <form method="post" enctype="multipart/form-data">
      <input type="file" name="gambar" required>
      <br><br>
      <input type="submit" value="Upload Gambar">
    </form>

    <?php if (!empty($uploaded)): ?>
    <p><strong>Gambar berhasil diunggah.</strong></p>
    <img src="<?= $target_file ?>" alt="Gambar Pohon">
    <p>🔍 Belum dilakukan pengenalan objek. Fitur Computer Vision akan ditambahkan.</p>
    <?php endif; ?>
  </div>
</body>

</html>