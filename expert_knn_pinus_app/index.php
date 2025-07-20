<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Prediksi Jenis Pohon Pinus</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  * {
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
  }

  body {
    margin: 0;
    padding: 0;
    background: linear-gradient(to bottom right, #e0f7fa, #e8f5e9);
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }

  .card {
    background-color: #ffffff;
    padding: 30px 40px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    max-width: 400px;
    width: 100%;
    animation: slideDown 0.5s ease;
  }

  h2 {
    color: #2e7d32;
    text-align: center;
    margin-bottom: 25px;
  }

  label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #333;
  }

  input[type="number"] {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
  }

  input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #2e7d32;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  input[type="submit"]:hover {
    background-color: #1b5e20;
  }

  @keyframes slideDown {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .footer {
    margin-top: 15px;
    text-align: center;
    font-size: 12px;
    color: #666;
  }
  </style>
</head>

<body>
  <div class="card">
    <h2>Prediksi Jenis Pohon Pinus 🌲</h2>
    <form action="proses.php" method="post">
      <label for="diameter">Diameter (meter)</label>
      <input type="number" name="diameter" id="diameter" step="0.001" placeholder="Contoh: 0.095" required>

      <label for="tinggi">Tinggi (meter)</label>
      <input type="number" name="tinggi" id="tinggi" step="0.01" placeholder="Contoh: 6.5" required>

      <input type="submit" value="Prediksi Sekarang">
    </form>
    <div class="footer">© 2025 Sistem Pakar Pinus - Expert + KNN</div>
  </div>
</body>

</html>