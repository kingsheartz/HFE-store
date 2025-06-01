<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calorie Tracker</title>
</head>
<style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  body {
    font-family: 'Segoe UI', sans-serif;
    background: #f9fbfd;
    color: #2c3e50;
    padding: 20px;
  }

  .container {
    max-width: 600px;
    margin: auto;
    background: #fff;
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  }

  header {
    text-align: center;
    margin-bottom: 30px;
  }

  header h1 {
    font-size: 2rem;
    color: #27ae60;
  }

  header p {
    color: #7f8c8d;
  }

  .tracker form {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 20px;
  }

  .tracker input[type="text"],
  .tracker input[type="number"] {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
  }

  .tracker button {
    background: #27ae60;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease;
  }

  .tracker button:hover {
    background: #219150;
  }

  .calorie-list h2 {
    margin-bottom: 10px;
  }

  #food-list {
    list-style: none;
    padding-left: 0;
  }

  #food-list li {
    background: #ecf0f1;
    margin-bottom: 8px;
    padding: 10px;
    border-radius: 8px;
  }

  .total {
    margin-top: 20px;
    font-size: 1.2rem;
    font-weight: bold;
    color: #2980b9;
  }
</style>

<body>
  <div class="container">
    <header>
      <h1>Calorie Tracker</h1>
      <p>Track your daily calorie intake easily</p>
    </header>

    <section class="tracker">
      <form id="calorie-form">
        <input type="text" placeholder="Food Item" required />
        <input type="number" placeholder="Calories" required />
        <button type="submit">Add</button>
      </form>

      <div class="calorie-list">
        <h2>Today's Intake</h2>
        <ul id="food-list">
          <li>🍎 Apple - 95 cal</li>
          <li>🥚 Boiled Egg - 78 cal</li>
        </ul>
      </div>

      <div class="total">
        <h3>Total Calories: <span id="total">173</span> cal</h3>
      </div>
    </section>
  </div>
</body>

</html>