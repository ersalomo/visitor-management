<div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
            <h6 class="text-capitalize">Visitation overview</h6>
            <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">4% more</span> in 2023
            </p>
        </div>
        <div class="card-body p-3">
            <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="/argon/assets/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function () {
            const ctx1 = document.getElementById("chart-line").getContext("2d");
            const gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
            gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
            gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
            gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
            const url = "{{route('admin.visit.overview-visitation')}}"
            $.get(url, function (res){
                const countVisitorByMonth   = res.data
                new Chart(ctx1, {
                    type: "line",
                    data: {
                        labels: ["Feb","May", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        datasets: [{
                            label: "Mobile apps",
                            tension: 0.4,
                            pointRadius: 0,
                            borderColor: "#5e72e4",
                            backgroundColor: gradientStroke1,
                            borderWidth: 3,
                            fill: true,
                            data: [50, 40, 300, 220, 500, 250, 400, 230, 500, 100, countVisitorByMonth],
                            maxBarThickness: 6

                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            }
                        },
                        interaction: {
                            intersect: false,
                            mode: 'index',
                        },
                        scales: {
                            y: {
                                grid: {
                                    drawBorder: false,
                                    display: true,
                                    drawOnChartArea: true,
                                    drawTicks: false,
                                    borderDash: [5, 5]
                                },
                                ticks: {
                                    display: true,
                                    padding: 10,
                                    color: '#fbfbfb',
                                    font: {
                                        size: 11,
                                        family: "Open Sans",
                                        style: 'normal',
                                        lineHeight: 2
                                    },
                                }
                            },
                            x: {
                                grid: {
                                    drawBorder: false,
                                    display: false,
                                    drawOnChartArea: false,
                                    drawTicks: false,
                                    borderDash: [5, 5]
                                },
                                ticks: {
                                    display: true,
                                    color: '#ccc',
                                    padding: 20,
                                    font: {
                                        size: 11,
                                        family: "Open Sans",
                                        style: 'normal',
                                        lineHeight: 2
                                    },
                                }
                            },
                        },
                    },
                });

            })
        });

    </script>
@endpush
