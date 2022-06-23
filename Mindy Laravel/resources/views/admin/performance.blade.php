<head>
    <!-- Latest CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
</head>

@extends('layouts.admin')

@section('content')


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-6">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-8 pb-2 mb-3">
        <h1>Performance</h1>
        <a href="/logout" class="btn btn-success px-3 py-2 primary-btn mb-5"
        style="border-radius: 30px; font-size: 20px; background-color: #079911;margin-right: 40px;">Logout</a>
    </div>

    <div class="container-fluid" style="width: 800px;">
    
        <body>
            <div class="chart-container">
                <div class="pie-chart-container">
                <canvas id="pie-chart"></canvas>
                </div>
            </div>
            
            <!-- javascript -->
            
            <script>
            $(function(){
                //get the pie chart canvas
                var cData = JSON.parse(`<?php echo $chart_data; ?>`);
                var ctx = $("#pie-chart");
            
                //pie chart data
                var data = {
                    labels: cData.label,
                    datasets: [
                    {
                        label: "Pembelians Count",
                        data: cData.data,
                        backgroundColor: [
                        "#DEB887",
                        "#A9A9A9",
                        "#DC143C",
                        "#F4A460",
                        "#2E8B57",
                        "#1D7A46",
                        "#CDA776",
                        ],
                        borderColor: [
                        "#CDA776",
                        "#989898",
                        "#CB252B",
                        "#E39371",
                        "#1D7A46",
                        "#F4A460",
                        "#CDA776",
                        ],
                        borderWidth: [1, 1, 1, 1, 1,1,1]
                    }
                    ]
                };
            
                //options
                var options = {
                    responsive: true,
                    title: {
                    display: true,
                    position: "top",
                    text: "Chart Data Layanan Paket",
                    fontSize: 18,
                    fontColor: "#111"
                    },
                    legend: {
                    display: true,
                    position: "bottom",
                    labels: {
                        fontColor: "#333",
                        fontSize: 16
                    }
                    }
                };
            
                //create Pie Chart class object
                var chart1 = new Chart(ctx, {
                    type: "pie",
                    data: data,
                    options: options
                });
            
            });
            </script>
        </body>
    
            

    </div>  
    
    

</main>



@endsection