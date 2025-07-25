<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("location:hfe.php");
}
require "header.php";
?>
<!-- breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <ol class="breadcrumb breadcrumb1">
      <li>
        <a href="../Main/hfe.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a>
      </li>
      <li class="active">Calorie Tracker</li>
    </ol>
  </div>
</div>
<!-- //breadcrumbs -->
<style>
  body {
    background-color: #151515;
  }

  .bg-overlay {
    height: 100%;
    background-color: rgb(000, 000, 000, 0.65);
    width: 100%;
    padding-top: 3em;
  }

  .calories-outer-container {
    background: url('../../images/calorie-tracker-bg-dark.jpg') no-repeat fixed;
    background-position-x: center;
    background-position-y: top;
    background-size: cover;
    font-family: 'Segoe UI', sans-serif;
  }

  .calories-container {
    font-family: 'Segoe UI', sans-serif;
    max-width: 700px;
    margin: 3em auto;
    margin-top: 0;
    background: #151515;
    border-radius: 16px;
    padding: 30px 40px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
  }

  .calories-header h1 {
    font-size: 3rem;
    color: #27ae60;
    margin-bottom: 10px;
  }

  .calories-header p {
    color: #7f8c8d;
    font-size: 1.5rem;
  }

  .calorie-list h2,
  .history-container h2,
  .weekly-report-container h2 {
    font-size: 20px;
    color: #27ae60;
  }

  .total h3 {
    font-size: 20px;
    color: #ba5b02ff;
  }

  input[type="text"],
  input[type="number"],
  input[type="date"] {
    padding: 12px;
    border: 1px solid darkgrey;
    color: darkgrey;
    background-color: #101010;
    border-radius: 8px;
    width: 100%;
    box-sizing: border-box;
  }

  .btn.focus,
  .btn:focus,
  .btn:hover {
    color: #fff;
  }

  #goal_input {
    margin-bottom: 10px;
  }

  .tracker,
  .date-picker-container,
  .daily-progress {
    border: 1px solid darkgrey;
    border-radius: 8px;
    padding: 10px;
  }

  .tracker legend,
  .date-picker-container legend,
  .daily-progress legend {
    font-size: 1.5rem;
    color: #27ae60;
    margin-bottom: 10px;
    border: 0px;
    width: auto;
  }

  #calorie-history {
    color: #27ae60;
    margin-bottom: 10px;
  }

  .date-picker-div {
    display: flex;
    gap: 10px;
    align-items: center;
  }

  input[type="date"]::-webkit-calendar-picker-indicator {
    filter: invert(46%) sepia(69%) saturate(505%) hue-rotate(83deg) brightness(90%) contrast(85%);
  }

  .tracker form,
  #history-status {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 20px;
  }

  .tracker button,
  #history-status button {
    background: #27ae60;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s ease;
  }

  .tracker button:hover,
  #history-status button:hover {
    background: #219150;
  }

  #goal-status {
    padding: 10px;
    background: #101010;
    color: darkgrey;
    border-radius: 8px;
    margin-top: 20px;
    font-weight: bold;
  }

  .total {
    font-size: 1.1rem;
    margin-top: 10px;
    color: #34495e;
  }

  ul {
    padding-left: 0;
  }

  #food-list,
  #history-list {
    list-style: none;
    padding-left: 0;
  }

  #food-list li,
  #history-list li {
    background: #101010;
    color: darkgrey;
    padding: 10px 15px;
    border-radius: 8px;
    margin-bottom: 8px;
  }

  canvas {
    background: #151515;
    border-radius: 12px;
    padding: 15px;
    border: 1px solid darkgrey;
  }

  #progress-bar-wrapper {
    background: #dfe6e9;
    border-radius: 12px;
    overflow: hidden;
    margin-top: 10px;
  }

  #progress-bar {
    height: 100%;
    background: #27ae60;
    width: 0%;
    text-align: center;
    color: white;
    font-weight: bold;
    line-height: 25px;
    transition: width 0.5s ease-in-out;
  }

  .daily-progress-bar {
    background: #27ae60;
    height: 22px;
    border-radius: 8px;
    width: 0%
  }

  hr {
    margin: 30px 0;
    border-color: #eee;
  }
</style>

<div class="calories-outer-container">
  <div class="bg-overlay">
    <div class="calories-container">
      <div class="calories-header">
        <h1>Calorie Tracker</h1>
        <p>Track your daily calorie intake easily</p>
      </div>

      <fieldset class="tracker">
        <legend>Log Your Calories</legend>
        <form id="calorie-form">
          <input id="food-item" type="text" placeholder="Food Item" required />
          <input id="calories" type="number" placeholder="Calories" required />
          <button type="button" onclick="addCalories()">Add</button>
        </form>

        <input type="number" id="goal_input" placeholder="Set Daily Calorie Goal" />
        <button id="save-goal" type="button" onclick="saveGoal()">Save Goal</button>
        <div id="goal-status"></div>
      </fieldset>

      <hr>
      <div class="calorie-list">
        <h2>Today's Intake</h2>
        <ul id="food-list">
          <!-- list selected date food items and calories -->
          <li>No entries for today yet.</li>
        </ul>
      </div>

      <div class="total">
        <h3>Total Calories: <span id="total">0</span> cal</h3>
      </div>


      <hr>
      <h3 id="calorie-history">Calorie History</h3>

      <div id="history-status" style="margin-top: 10px;">
        <fieldset class="date-picker-container">
          <legend>Select Date</legend>
          <div class="date-picker-div">
            <input type="date" id="filter-date" class="btn" />
            <button type="button" class="btn btn-secondary" onclick="loadCalorieHistory()">Load History</button>
          </div>
        </fieldset>
      </div>

      <div id="row" class="history-container" style="margin-top: 20px;">
        <h2>History:</h2>
        <ul id="history-list">
          <li>No entries yet.</li>
        </ul>
      </div>
      <hr>

      <div id="row" class="weekly-report-container" style="margin-top: 20px;">
        <h2>Weekly Report</h2>
        <canvas id="week-chart" height="150"></canvas>
      </div>

      <fieldset class="daily-progress" style="margin-top: 20px;">
        <legend>Daily Progress</legend>
        <div id="progress-bar-wrapper">
          <div id="progress-bar" class="daily-progress-bar"></div>
        </div>
      </fieldset>
    </div>
    <div>
      <div>
        <br>
        <?php
        require "../Main/footer.php";
        ?>
        <script>
          let weekChartInstance = null; // global chart instance

          function renderCalorieTracker() {
            loadCalorieHistory(false);
            loadCalorieHistory(true);
            checkGoalStatus();
            loadWeekChart();
          }

          function loadCalorieHistory(isCustomDate = true) {
            let date = $('#filter-date').val();
            if (!isCustomDate) {
              date = new Date().toISOString().split('T')[0]; // Use today's date if no custom date is selected
            }

            const customer_id = "<?= $_SESSION['id'] ?>";

            $.ajax({
              url: '../Common/calorie_manager.php',
              method: 'POST',
              data: {
                calory_history: 1,
                customer_id,
                date
              },
              success: function(response) {
                const res = JSON.parse(response);
                let html = '';

                if (isCustomDate) {
                  if (res.length === 0) {
                    html = "<li>No entries found.</li>";
                  } else {
                    res.forEach(entry => {
                      html += `<li class="calorie-history">${entry.date_logged}: ${entry.food_item} - ${entry.calories} cal</li>`;
                    });

                    $('#history-list').html(html);
                  }
                } else {
                  if (res.length === 0) {
                    html = "<li>No entries for today yet.</li>";
                  } else {
                    const totalCalories = res.reduce((sum, entry) => sum + entry.calories, 0);
                    res.forEach(entry => {
                      html += `<li>${entry.food_item} - ${entry.calories} cal</li>`;
                    });

                    $('#food-list').html(html);
                    $('#total').text(totalCalories);
                  }
                }
              }
            });
          }

          function addCalories() {
            const food_item = $('#food-item')?.val();
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
                  $('#food-item').val('');
                  $('#calories').val('');
                  renderCalorieTracker();
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
              renderCalorieTracker();
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
              updateProgressBar(data.goal, data.total);
            });
          }

          function loadWeekChart() {
            const customer_id = "<?= $_SESSION['id'] ?>";

            $.post('../Common/calorie_manager.php', {
              loadWeekChart: 1,
              customer_id
            }, function(res) {
              const data = JSON.parse(res);
              const ctx = document.getElementById('week-chart').getContext('2d');

              // Destroy previous chart if exists
              if (weekChartInstance) {
                weekChartInstance.destroy();
              }

              // Create new chart
              weekChartInstance = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: data.labels,
                  datasets: [{
                    label: 'Calories per Day',
                    data: data.values,
                    backgroundColor: [
                      '#1abc9c', '#2ecc71', '#3498db',
                      '#9b59b6', '#f1c40f', '#e67e22', '#e74c3c'
                    ]
                  }]
                },
                options: {
                  scales: {
                    x: {
                      grid: {
                        color: 'darkgrey' // X-axis grid line color
                      },
                      ticks: {
                        color: 'darkgrey' // X-axis label (text) color
                      }
                    },
                    y: {
                      grid: {
                        color: 'darkgrey' // Y-axis grid line color
                      },
                      ticks: {
                        color: 'darkgrey' // Y-axis label (text) color
                      }
                    }
                  }
                }
              });
            });
          }

          function updateProgressBar(goal, total) {
            const percent = goal > 0 ? Math.min((total / goal) * 100, 100) : 0;
            const $bar = $('#progress-bar');

            $bar.css('width', percent + '%');
            $bar.css('display', 'flex');
            $bar.css('justify-content', 'center');
            $bar.css('align-items', 'center');
            $bar.html((percent === 0 ? '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' : '') + `${Math.round(percent)}%`);

            // Color based on progress
            if (percent === 0) $bar.css('margin-left', '10px'); // orange
            else if (percent < 50) $bar.css('background', '#f1c40f'); // yellow
            else if (percent < 100) $bar.css('background', '#27ae60'); // green
            else $bar.css('background', '#e74c3c'); // red
          }

          $(document).ready(function() {
            checkGoalStatus();
            loadWeekChart();
            loadCalorieHistory();
            loadCalorieHistory(false); // Load today's history by default
          });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>