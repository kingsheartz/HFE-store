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
      <li class="active">BMI Calculator</li>
    </ol>
  </div>
</div>
<!-- //breadcrumbs -->

<style>
  body {
    background-color: #151515;
  }

  .bmi-outer-container {
    background: url('../../images/bmi_bg.jpg') no-repeat fixed;
    background-position: center top;
    background-size: cover;
    font-family: 'Segoe UI', sans-serif;
  }

  .bmi-bg-overlay {
    height: 100%;
    background-color: rgba(0, 0, 0, 0.65);
    width: 100%;
    padding-top: 3em;
  }

  .bmi-container {
    max-width: 700px;
    margin: 3em auto;
    margin-top: 0;
    background: #151515;
    border-radius: 16px;
    padding: 30px 40px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
  }

  .bmi-header h1 {
    font-size: 3rem;
    color: #27ae60;
    margin-bottom: 10px;
  }

  .bmi-header p {
    color: #7f8c8d;
    font-size: 1.5rem;
  }

  fieldset.bmi-box {
    border: 1px solid darkgrey;
    border-radius: 8px;
    padding: 15px;
    margin-top: 20px;
  }

  .bmi-box legend,
  .bmi-date-picker-container legend {
    font-size: 1.5rem;
    color: #27ae60;
    margin-bottom: 10px;
    border: none;
    width: auto;
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

  .bmi-result {
    background: #101010;
    color: darkgrey;
    padding: 15px;
    border-radius: 8px;
    margin-top: 15px;
    font-size: 1.2rem;
    font-weight: bold;
  }

  #bmi-calculate-btn,
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

  #bmi-calculate-btn:hover,
  #history-status button:hover {
    background: #219150;
  }

  .bmi-display,
  .bmi-date-picker-container,
  .bmi-chart-container {
    background: #101010;
    border-radius: 8px;
    padding: 15px;
    border: 1px solid darkgrey;
    color: darkgrey;
  }


  input[type="date"]::-webkit-calendar-picker-indicator {
    filter: invert(46%) sepia(69%) saturate(505%) hue-rotate(83deg) brightness(90%) contrast(85%);
  }

  .bmi-box form,
  #history-status {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-bottom: 20px;
  }

  #bmi-history {
    color: #27ae60;
    margin-bottom: 10px;
  }

  .date-picker-div {
    display: flex;
    gap: 10px;
    align-items: center;
  }

  .bmi-display h2,
  .history-container h2,
  .bmi-chart-container h2 {
    font-size: 18px;
    color: #27ae60;
  }

  ul {
    padding: 0;
    list-style: none;
  }

  #bmi-history-list {
    list-style: none;
    padding-left: 0;
  }

  #bmi-history-list li {
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

  hr {
    margin: 30px 0;
    border-color: #eee;
  }
</style>

<div class="bmi-outer-container">
  <div class="bmi-bg-overlay">
    <div class="bmi-container">
      <div class="bmi-header">
        <h1>BMI Calculator</h1>
        <p>Calculate your Body Mass Index easily</p>
      </div>

      <fieldset class="bmi-box">
        <legend>Enter Your Details</legend>
        <form id="bmi-form">
          <input id="bmi-weight" type="number" placeholder="Weight (kg)" required />
          <input id="bmi-height" type="number" placeholder="Height (cm)" required />
          <button id="bmi-calculate-btn" type="button" onclick="calculateBMI()">Calculate</button>
        </form>
        <div id="bmi-result" class="bmi-result" style="display: none;"></div>

        <div class="bmi-display">
          <h2>Your BMI: <span id="bmi-value">_</span></h2>
          <h2>Status: <span id="bmi-status">_</span></h2>
        </div>
      </fieldset>

      <hr>
      <h3 id="bmi-history">BMI History</h3>

      <div id="history-status" style="margin-top: 10px;">
        <fieldset class="bmi-date-picker-container">
          <legend>Select Date</legend>
          <div class="date-picker-div">
            <input type="date" id="bmi-date" class="btn" />
            <button type="button" class="btn btn-secondary" onclick="loadBMIHistory()">Load</button>
          </div>
        </fieldset>
      </div>

      <div id="row" class="history-container" style="margin-top: 20px;">
        <h2>History:</h2>
        <ul id="bmi-history-list">
          <li>No entries yet.</li>
        </ul>
      </div>
      <hr>

      <div class="bmi-chart-container">
        <h2>Weekly BMI Trend</h2>
        <canvas id="bmi-chart" height="150"></canvas>
      </div>
    </div>
    <?php require "../Main/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      let bmiChartInstance = null;

      function calculateBMI() {
        const weight = parseFloat($('#bmi-weight').val());
        const height = parseFloat($('#bmi-height').val());
        const heightInMeter = height / 100;

        if (!weight || !heightInMeter) {
          Swal.fire('Error', 'Please enter both weight and height.', 'error');
          return;
        }

        const bmi = weight / (heightInMeter * heightInMeter);
        const bmiRounded = bmi.toFixed(1);
        const status = getBMIStatus(bmi);

        $('#bmi-value').text(bmiRounded);
        $('#bmi-status').text(status);

        // Save to server
        $.post('../Common/bmi_api.php', {
          save_bmi: 1,
          customer_id: "<?= $_SESSION['id'] ?>",
          weight,
          height,
          bmi: bmiRounded
        }, function(response) {
          const res = JSON.parse(response);
          Swal.fire(res.status, res.message, res.status);
          loadBMIHistory();
          loadBMIChart();
        });
      }

      function getBMIStatus(bmi) {
        if (bmi < 18.5) return "Underweight";
        else if (bmi < 24.9) return "Normal";
        else if (bmi < 29.9) return "Overweight";
        else return "Obese";
      }

      function loadBMIHistory() {
        const customer_id = "<?= $_SESSION['id'] ?>";
        const date = $('#bmi-date').val();

        $.post('../Common/bmi_api.php', {
          load_bmi_history: 1,
          customer_id,
          date
        }, function(res) {
          const data = JSON.parse(res);
          let html = '';

          if (!data?.length) {
            html = `<li>${data?.message}</li>`;
          } else {
            data?.forEach(entry => {
              html += `<li>${entry.date_logged}: BMI ${entry.bmi} - ${getBMIStatus(entry.bmi)}</li>`;
            });
          }

          $('#bmi-history-list').html(html);
        });
      }

      function loadBMIChart() {
        const customer_id = "<?= $_SESSION['id'] ?>";

        $.post('../Common/bmi_api.php', {
          load_bmi_chart: 1,
          customer_id
        }, function(res) {
          const data = JSON.parse(res);
          const ctx = document.getElementById('bmi-chart').getContext('2d');

          if (bmiChartInstance) {
            bmiChartInstance.destroy();
          }

          bmiChartInstance = new Chart(ctx, {
            type: 'line',
            data: {
              labels: data.labels,
              datasets: [{
                label: 'BMI',
                data: data.values,
                borderColor: '#27ae60',
                backgroundColor: 'rgba(39, 174, 96, 0.1)',
                tension: 0.3,
                fill: true
              }]
            },
            options: {
              scales: {
                x: {
                  grid: {
                    color: 'darkgrey'
                  },
                  ticks: {
                    color: 'darkgrey'
                  }
                },
                y: {
                  grid: {
                    color: 'darkgrey'
                  },
                  ticks: {
                    color: 'darkgrey'
                  }
                }
              }
            }
          });
        });
      }

      $(document).ready(function() {
        loadBMIHistory();
        loadBMIChart();
      });
    </script>