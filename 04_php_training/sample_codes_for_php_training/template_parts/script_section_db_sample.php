
<script>
    var ctx1 = document.getElementById('currency-line-chart').getContext('2d');
    var chart1 = new Chart(ctx1, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: <?php echo json_encode($jalali_dates)  ?>,
            datasets: [{
                label: 'Dollar',
                /*backgroundColor: 'rgba(255, 99, 132,0.3)',*/
                borderColor: 'rgb(255, 99, 132)',
                data: <?php echo json_encode($dollars)  ?>
            },
                {
                    label: 'Euro',
                    /*backgroundColor: 'rgba(100, 10, 132,0.3)',*/
                    borderColor: 'rgb(132, 99, 255)',
                    data: <?php echo json_encode($euros)  ?>
                }
            ]
        },

        // Configuration options go here
        options: {}
    });

    var ctx2 = document.getElementById('currency-radar-chart').getContext('2d');
        var chart2 = new Chart(ctx2, {
            // The type of chart we want to create
            type: 'radar',

            // The data for our dataset
            data: {
                labels: <?php echo json_encode($jalali_dates)  ?>,
                datasets: [{
                    label: 'Dollar',
                    /*backgroundColor: 'rgba(255, 99, 132,0.3)',*/
                    borderColor: 'rgb(255, 99, 132)',
                    data: <?php echo json_encode($dollars)  ?>
                },
                    {
                        label: 'Euro',
                        /*backgroundColor: 'rgba(100, 10, 132,0.3)',*/
                        borderColor: 'rgb(132, 99, 255)',
                        data: <?php echo json_encode($euros)  ?>
                    }
                ]
            },

            // Configuration options go here
            options: {}
        });

</script>
