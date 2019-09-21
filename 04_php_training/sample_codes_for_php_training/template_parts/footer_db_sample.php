<script>
    var ctx = document.getElementById('currency').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgba(255, 99, 132,0.3)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45]
            },
                {
                    label: 'My second dataset',
                    backgroundColor: 'rgba(100, 10, 132,0.3)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [20, 1, 8, 9, 12, 14, 25]
                }
            ]
        },

        // Configuration options go here
        options: {}
    });

</script>
</body>
</html>