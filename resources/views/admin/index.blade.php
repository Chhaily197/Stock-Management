@extends('admin.include.master')
@section('container')
{{-- book shop  --}}
<section class="section">
  <div class="row">
    <div class="col-12 col-md-6 col-lg-3">
      <a href="/books" class="nav-link">
        <div class="bg-danger rounded-3 p-3 d-flex justify-content-between align-items-center">
          <div><h2 class="text-light">BOOK</h2></div>
          <div><lord-icon
            src="https://cdn.lordicon.com/wxnxiano.json"
            trigger="morph"
            colors="primary:#ffffff,secondary:#ffffff"
            style="width:75px;height:75px">
        </lord-icon></div>
         </div>
      </a>
    </div>

    {{-- IT LAB --}}
    <div class="col-12 col-md-6 col-lg-3">
      <a href="item" class="nav-link">
        <div class="bg-warning rounded-3 p-3 d-flex justify-content-between align-items-center">
          <div><h2 class="text-light">IT LAB</h2></div>
          <div><lord-icon
            src="https://cdn.lordicon.com/qhgmphtg.json"
            trigger="hover"
            colors="primary:#ffffff,secondary:#ffffff"
            style="width:75px;height:75px">
        </lord-icon></div>
         </div>
      </a>
    </div>
  </div>

    <div class="card mt-5">
      <div class="card-body py-3">
        <div class="row">
          <div class="col-xl-8">
                <div style="margin:0 auto;" class="p-3">
                    <canvas id="chart"></canvas>
                </div>
          </div>
          <div class="col-xl-4">
                <div style="margin:0 auto;" class="p-3">
                    <canvas id="chartO"></canvas>
                </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('chart').getContext('2d');

            const data = {
              labels: @json($labelsBook),
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
                data: @json($qtyBook),
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
                options: options
            });
        });
    </script>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('chartO').getContext('2d');

            const data = {
                labels: @json($labelsItem),
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
                    data: @json($qtyItem),
                }, ],
            };

            const options = {
                responsive: true,
                layout: {
                  padding: 20
                },
            };

            const myBarChart = new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: options,
            });
        });
    </script>
  @endsection

