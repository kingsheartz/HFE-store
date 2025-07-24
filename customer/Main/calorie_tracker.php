<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("location:hfe.php");
}
require "header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calorie Tracker</title>
</head>
<style>
  .calories-container {
    font-family: 'Segoe UI', sans-serif;
    max-width: 600px;
    margin: auto;
    margin-top: 3em;
    background: #fff;
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  }

  .calories-header {
    text-align: center;
    margin-bottom: 30px;
  }

  .calories-header h1 {
    font-size: 2rem;
    color: #27ae60;
  }

  .calories-header p {
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
  <div class="calories-container">
    <div class="calories-header">
      <h1>Calorie Tracker</h1>
      <p>Track your daily calorie intake easily</p>
    </div>

    <section class="tracker">
      <form id="calorie-form">
        <input id="food_item" type="text" placeholder="Food Item" required />
        <input id="calories" type="number" placeholder="Calories" required />
        <button type="button" onclick="addCalories()">Add</button>
      </form>

      <input type="number" id="goal_input" placeholder="Set Daily Calorie Goal" />
      <button type="button" onclick="saveGoal()">Save Goal</button>
      <div id="goal-status" style="margin-top: 10px; font-weight: bold;"></div>

      <div class="calorie-list">
        <h2>Today's Intake</h2>
        <ul id="food-list">
          <!-- list selected date food items and calories -->
          <li>🍎 Apple - 95 cal</li>
          <li>🥚 Boiled Egg - 78 cal</li>
        </ul>
      </div>

      <div class="total">
        <h3>Total Calories: <span id="total">173</span> cal</h3>
      </div>
    </section>

    <hr>
    <div class="row">
      <h3>Calorie History</h3>
      <label for="filter_date">Select Date:</label>
      <input type="date" id="filter_date" onchange="loadCalorieHistory()" />
      <ul id="history-list"></ul>
    </div>

    <canvas id="weekChart" height="150"></canvas>
    <div style="margin-top:20px">
      <label>Daily Progress</label>
      <div style="background:#ccc; border-radius:8px;">
        <div id="progressBar" style="background:#27ae60; height:20px; border-radius:8px; width:0%"></div>
      </div>
    </div>
  </div>
  <br>
  <?php
  require "../Main/footer.php";
  ?>
  <script>
    function loadCalorieHistory() {
      const date = $('#filter_date').val();
      const customer_id = "<?= $_SESSION['id'] ?>";

      $.ajax({
        url: '../Common/calorie_manager.php',
        method: 'POST',
        data: {
          customer_id,
          date
        },
        success: function(response) {
          const res = JSON.parse(response);
          let html = '';
          if (res.length === 0) {
            html = "<li>No entries found.</li>";
          } else {
            res.forEach(entry => {
              html += `<li>${entry.date_logged}: ${entry.food_item} - ${entry.calories} cal</li>`;
            });
          }
          $('#history-list').html(html);
        }
      });
    }

    function addCalories() {
      const food_item = $('#food_item')?.val();
      const calories = $('#calories')?.val();

      if (!food_item || !calories) {
        Swal.fire('Error', 'Please fill all fields', 'error');
        return;
      }

      $.ajax({
        url: '../Common/calorie_manager.php',
        method: 'POST',
        data: {
          customer_id: "<?= $_SESSION['id'] ?>",
          food_item,
          calories
        },
        success: function(response) {
          const res = JSON.parse(response);
          if (res.status === 'success') {
            Swal.fire('Success', res.message, 'success');
            $('#food_item').val('');
            $('#calories').val('');
          } else {
            Swal.fire('Error', res.message, 'error');
          }
        }
      });
    }

    function saveGoal() {
      const goal = $('#goal_input').val();
      const customer_id = "<?= $_SESSION['id'] ?>";

      $.post('../Common/calorie_manager.php', {
        saveGoal: 1,
        customer_id,
        goal
      }, function(res) {
        const data = JSON.parse(res);
        Swal.fire(data.status, data.message, data.status);
        checkGoalStatus();
      });
    }

    function checkGoalStatus() {
      const customer_id = "<?= $_SESSION['id'] ?>";

      $.post('../Common/calorie_manager.php', {
        checkGoalStatus: 1,
        customer_id
      }, function(res) {
        const data = JSON.parse(res);
        $('#goal-status').html(`Goal: ${data.goal} | Today: ${data.total} - ${data.message}`);
      });
    }

    checkGoalStatus();

    function loadWeekChart() {
      const customer_id = "<?= $_SESSION['id'] ?>";

      $.post('../Common/calorie_manager.php', {
        loadWeekChart: 1,
        customer_id
      }, function(res) {
        const data = JSON.parse(res);
        const ctx = document.getElementById('weekChart').getContext('2d');

        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: data.labels,
            datasets: [{
              label: 'Calories per Day',
              data: data.values,
              backgroundColor: '#2ecc71'
            }]
          }
        });
      });
    }

    function updateProgressBar(total, goal) {
      const percent = goal > 0 ? Math.min((total / goal) * 100, 100) : 0;
      $('#progressBar').css('width', percent + '%');
    }

    $(document).ready(function() {
      checkGoalStatus();
      loadWeekChart();
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>