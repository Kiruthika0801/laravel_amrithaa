@extends('layouts.master')

@section('content')
<!-- Page-content -->
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <div class="container my-4">
                <!-- Header Section -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3">Sales Performance Dashboard</h1>
                    <div>
                        <label for="date-range" class="form-label">Date Range</label>
                        <input type="date" class="form-control" id="date-range">
                    </div>
                </div>

                <!-- Key Metrics Overview -->
                <div class="row text-center mb-4">
                    <div class="col-md-4">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h5 class="card-title">Total Sales</h5>
                                <p class="card-text display-6">$25,000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h5 class="card-title">Total Products Sold</h5>
                                <p class="card-text display-6">500</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h5 class="card-title">Total Salespersons</h5>
                                <p class="card-text display-6">20</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Graphs Section -->
                <div class="row">
                    <!-- Total Sales per Month (Bar Chart) -->
                    <div class="col-md-6 chart-container">
                        <div class="card">
                            <div class="card-header">
                                Total Sales per Month
                            </div>
                            <div class="card-body">
                                <canvas id="salesPerMonthChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Average Sales per Product (Line Chart) -->
                    <div class="col-md-6 chart-container">
                        <div class="card">
                            <div class="card-header">
                                Average Sales per Product
                            </div>
                            <div class="card-body">
                                <canvas id="avgSalesPerProductChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Top Performing Salespersons (Pie Chart) -->
                    <div class="col-md-6 chart-container">
                        <div class="card">
                            <div class="card-header">
                                Top-Performing Salespersons
                            </div>
                            <div class="card-body">
                                <canvas id="topSalespersonsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sales Performance Table -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Salesperson</th>
                                <th>Total Sales</th>
                                <th>Products Sold</th>
                                <th>Average Sales</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>$10,000</td>
                                <td>200</td>
                                <td>$50</td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>$8,000</td>
                                <td>150</td>
                                <td>$53</td>
                            </tr>
                            <tr>
                                <td>Michael Scott</td>
                                <td>$7,000</td>
                                <td>100</td>
                                <td>$70</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Reporting Section -->
                <div class="mt-4 d-flex justify-content-between">
                    <button class="btn btn-primary">Generate PDF</button>
                    <button class="btn btn-secondary">Download CSV</button>
                </div>
            </div>

            <!-- Chart.js -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // Sample data for Total Sales per Month (Bar Chart)
                var ctx1 = document.getElementById('salesPerMonthChart').getContext('2d');
                var salesPerMonthChart = new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: ['January', 'February', 'March', 'April', 'May'],
                        datasets: [{
                            label: 'Total Sales',
                            data: [5000, 4000, 3000, 6000, 7000],
                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Sample data for Average Sales per Product (Line Chart)
                var ctx2 = document.getElementById('avgSalesPerProductChart').getContext('2d');
                var avgSalesPerProductChart = new Chart(ctx2, {
                    type: 'line',
                    data: {
                        labels: ['Product A', 'Product B', 'Product C', 'Product D'],
                        datasets: [{
                            label: 'Average Sales per Product',
                            data: [50, 40, 60, 70],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });

                // Sample data for Top Performing Salespersons (Pie Chart)
                var ctx3 = document.getElementById('topSalespersonsChart').getContext('2d');
                var topSalespersonsChart = new Chart(ctx3, {
                    type: 'pie',
                    data: {
                        labels: ['John Doe', 'Jane Smith', 'Michael Scott'],
                        datasets: [{
                            label: 'Sales Contribution',
                            data: [10000, 8000, 7000],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(255, 206, 86, 0.6)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });
            </script>
        
        <!--end grid-->
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
@section('script')
<!--dashboard ecommerce init js-->
<script src="{{ URL::to('assets/js/pages/dashboards-ecommerce.init.js') }}"></script>
@endsection
@endsection

<style>
    body {
        background-color: #f8f9fa;
    }

    .card-header {
        font-weight: bold;
        font-size: 1.2rem;
    }

    .chart-container {
        padding: 20px;
    }

    .table-responsive {
        margin-top: 30px;
    }
</style>