<?php
session_start();
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
    color: #139b3b;
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
    color: #139b3b;
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

  #bmi-clear-btn,
  #bmi-calculate-btn,
  #bmi-save-btn,
  #history-status button {
    background: #139b3b;
    color: white;
    padding: 6px 12px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s ease;
  }

  #bmi-clear-btn:hover,
  #bmi-calculate-btn:hover,
  #bmi-save-btn:hover,
  #history-status button:hover {
    background: #139b3b;
  }

  #bmi-save-btn {
    margin-top: 15px;
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
    color: #139b3b;
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
    color: #139b3b;
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

  .bmi-box button,
  #history-status button {
    color: #e3e2e2;
    border: none;
    cursor: pointer;
    font-weight: bold;
    transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
  }

  .bmi-box button:hover,
  #history-status button:hover {
    background: #139b3b;
    transform: translateY(-2px);
  }

  .bmi-box button:active,
  #history-status button:active {
    transform: translateY(0);
  }


  .del-bmi {
    padding: 5px;
    border-radius: 5px;
    color: darkgrey;
    transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
  }

  .del-bmi:hover {
    color: darkgrey;
    background-color: #8b0000ff;
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
          <button id="bmi-clear-btn" type="button" onclick="clearBMI()">Clear</button>
        </form>
        <div id="bmi-result" class="bmi-result" style="display: none;"></div>

        <div class="bmi-display">
          <h2>Your BMI: <span id="bmi-value">_</span></h2>
          <h2>Status: <span id="bmi-status">_</span></h2>
        </div>
      </fieldset>
      <?php
      if (isset($_SESSION['hfe_id'])) {
      ?>
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
      <?php
      }
      ?>
    </div>
    <?php require "../Main/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      let bmiChartInstance = null;

      function getBMIStatus(bmi) {
        if (bmi < 18.5) return {
          status: "Underweight",
          color: "#8b8b00"
        };
        else if (bmi < 24.9) return {
          status: "Normal",
          color: "green"
        };
        else if (bmi < 29.9) return {
          status: "Overweight",
          color: "#a56b00"
        };
        else return {
          status: "Obese",
          color: "red"
        };
      }

      function clearBMI() {
        $('#bmi-weight').val('');
        $('#bmi-height').val('');
        $('#bmi-value').text('_');
        $('#bmi-value').css('color', '#139b3b');
        $('#bmi-status').text('_');
        $('#bmi-status').text('_');
        $('#bmi-status').css('background-color', 'transparent');
        $('#bmi-status').css('color', '#139b3b');
        $('#bmi-save-btn').remove();
      }

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
        const result = getBMIStatus(bmi);

        $('#bmi-value').text(bmiRounded);
        $('#bmi-value').css('color', result.color);

        $('#bmi-status').text(result.status);
        $('#bmi-status').css('padding-inline', '5px');
        $('#bmi-status').css('padding-bottom', '2px');
        $('#bmi-status').css('border-radius', '3px');
        $('#bmi-status').css('background-color', result.color);
        $('#bmi-status').css('color', 'white');
        $('#bmi-status').css('font-size', '16px');

        <?php
        if (isset($_SESSION['hfe_id'])) {
        ?>
          $('#bmi-save-btn').remove();
          $('.bmi-display').append(`<button id="bmi-save-btn" type="button" onclick="saveBMI(<?= $_SESSION['hfe_id'] ?>, ${weight}, ${height}, ${bmiRounded})"><i class="fas fa-save"></i> Save</button>`);
        <?php
        }
        ?>
      }

      <?php
      if (!isset($_SESSION['hfe_id'])) {
        echo '</script>';
        return;
      }
      ?>

      function saveBMI(customer_id, weight, height, bmiRounded) {
        Swal.fire({
            title: "<span style='font-family-arial'></span>",
            text: "Do you want to save",
            icon: "warning",
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonColor: 'green',
            confirmButtonText: '<i class="fas fa-save"></i> Save',
            cancelButtonColor: 'red',
            allowOutsideClick: false,
            cancelButtonText: '<i class="fa fa-close"></i> Cancel'
          })
          .then((willSubmit) => {
            if (willSubmit.dismiss) {
              return false;
            } else if (willSubmit.isConfirmed) {
              // Save to server
              $.post('../Common/bmi_api.php', {
                save_bmi: 1,
                customer_id: "<?= $_SESSION['hfe_id'] ?>",
                weight,
                height,
                bmi: bmiRounded
              }, function(response) {
                const res = JSON.parse(response);
                Swal.fire(res.status, res.message, res.status);

                if (res.status === 'success') {
                  $('#bmi-save-btn').remove();
                  loadBMIHistory();
                  loadBMIChart();
                }
              });
            }
          });
      }

      function renderBMI() {
        loadBMIHistory();
        loadBMIChart();
      }

      function deleteBMI(bmi_id) {
        $.ajax({
          url: '../Common/bmi_api.php?bmi_id=' + bmi_id,
          method: 'DELETE',
          success: function(response) {
            const res = JSON.parse(response);
            if (res.status === 'deleted') {
              Swal.fire('Deleted', res.message, 'success');
              renderBMI();
            } else {
              Swal.fire('Error', res.message, 'error');
            }
          }
        });
      }

      function loadBMIHistory() {
        const customer_id = "<?= $_SESSION['hfe_id'] ?>";
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
              const result = getBMIStatus(entry.bmi);
              html += `<li>${entry.date_logged}: BMI ${entry.bmi} - <span style="border-radius: 3px;padding-inline: 5px;padding-bottom: 2px;background-color: ${result.color};color: white;">${result.status}</span> <i class="fa fa-trash float-right del-bmi" onclick=deleteBMI(${entry.bmi_id})></i></li>`;
            });
          }

          $('#bmi-history-list').html(html);
        });
      }

      function loadBMIChart() {
        const customer_id = "<?= $_SESSION['hfe_id'] ?>";

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
                borderColor: '#139b3b',
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
        loadBMIChart();
        loadBMIHistory();
      });
    </script>