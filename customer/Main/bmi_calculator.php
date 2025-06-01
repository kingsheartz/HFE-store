<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BMI Calculator</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f4f8;
      color: #333;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background: #fff;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    h1 {
      color: #2ecc71;
      margin-bottom: 10px;
    }

    p {
      color: #7f8c8d;
      margin-bottom: 30px;
    }

    .input-group {
      margin-bottom: 20px;
      text-align: left;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: 600;
    }

    input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 10px;
      font-size: 16px;
    }

    button {
      background: #2ecc71;
      color: white;
      border: none;
      padding: 12px 20px;
      font-size: 16px;
      border-radius: 10px;
      cursor: pointer;
      transition: background 0.3s ease;
      width: 100%;
    }

    button:hover {
      background: #27ae60;
    }

    .result {
      margin-top: 30px;
      font-size: 1.2rem;
      color: #2980b9;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>BMI Calculator</h1>
    <p>Enter your height and weight to calculate your Body Mass Index.</p>

    <form id="bmi-form">
      <div class="input-group">
        <label for="height">Height (cm)</label>
        <input type="number" id="height" placeholder="e.g., 170" required />
      </div>
      <div class="input-group">
        <label for="weight">Weight (kg)</label>
        <input type="number" id="weight" placeholder="e.g., 65" required />
      </div>
      <button type="submit">Calculate BMI</button>
    </form>

    <div class="result" id="result">
      <!-- BMI result will go here -->
      Your BMI will appear here.
    </div>
  </div>
</body>

</html>