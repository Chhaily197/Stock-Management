<!DOCTYPE html>
<html lang="en">

<head>
    @include('Books.link')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Overview Data</title>
</head>

<body>
    <form action="/graph" method="POST" style="width: 600px; padding:12px;" class="d-flex gap-2">
        @csrf
        <div class="group-form mb-3 d-flex">
            <label for="selected">Select Table: </label>
            <select name="selected" id="selected" class="form-select">
                <option value="book">BOOK</option>
                <option value="IT_lab">IT-LAB</option>
            </select>
        </div>
        <div class="group-form mb-3 d-inline">
            <button type="submit" class="btn btn-primary py-3">Generate Graph</button>
        </div>
    </form>

        <div class="row">
          <div class="col-xl-9">
               <div style="margin:0 auto;">
                    <canvas id="chart"></canvas>
               </div>
          </div>
          <div class="col-xl-3">
               <div style="margin:0 auto;">
                    <canvas id="chartO"></canvas>
               </div>
          </div>
        </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('chart').getContext('2d');

            const data = {
                labels: @json($labels),
                datasets: [{
                    label: 'Quantities',
                    backgroundColor: [
                         'rgba(218, 47, 47, 0.605)',
                         'rgba(47, 67, 218, 0.605)',
                         'rgba(187, 218, 47, 0.539)',
                         'rgba(242, 192, 9, 0.539)',
                    ],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    data: @json($qty),
                }, ],
            };

            const options = {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Quantity',
                        },
                    },
                },
            };

            const myBarChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: options,
            });
        });
    </script>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('chartO').getContext('2d');

            const data = {
                labels: @json($labels),
                datasets: [{
                    label: 'Quantities',
                    backgroundColor: [
                         'rgba(218, 47, 47, 0.605)',
                         'rgba(47, 67, 218, 0.605)',
                         'rgba(187, 218, 47, 0.539)',
                         'rgba(242, 192, 9, 0.539)',
                    ],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    data: @json($qty),
                }, ],
            };

            const options = {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Quantity',
                        },
                    },
                },
            };

            const myBarChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: options,
            });
        });
    </script>
</body>

</html>
