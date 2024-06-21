<?php session_start();
include 'database-config_object-oriented.php';
$stress = 0;
$anxiety = 0;
$depression = 0;
if (isset($_POST["stress1"]) && isset($_POST["stress2"]) && isset($_POST["stress3"]) && isset($_POST["stress4"]) && isset($_POST["stress5"]) && isset($_POST["stress6"]) && isset($_POST["stress7"]) && isset($_POST["anxiety1"]) && isset($_POST["anxiety2"]) && isset($_POST["anxiety3"]) && isset($_POST["anxiety4"]) && isset($_POST["anxiety5"]) && isset($_POST["anxiety6"]) && isset($_POST["anxiety7"]) && isset($_POST["depression1"]) && isset($_POST["depression2"]) && isset($_POST["depression3"]) && isset($_POST["depression4"]) && isset($_POST["depression5"]) && isset($_POST["depression6"]) && isset($_POST["depression7"])) {
	$stress = $_POST["stress1"] + $_POST["stress2"] + $_POST["stress3"] + $_POST["stress4"] + $_POST["stress5"] + $_POST["stress6"] + $_POST["stress7"];
	$anxiety = $_POST["anxiety1"] + $_POST["anxiety2"] + $_POST["anxiety3"] + $_POST["anxiety4"] + $_POST["anxiety5"] + $_POST["anxiety6"] + $_POST["anxiety7"];
	$depression = $_POST["depression1"] + $_POST["depression2"] + $_POST["depression3"] + $_POST["depression4"] + $_POST["depression5"] + $_POST["depression6"] + $_POST["depression7"];
} else {
	//echo "error!";
	echo "<script>alert('Please answer all question.');history.go(-1);</script>";
}
// Get the current date
date_default_timezone_set("Asia/Kuala_Lumpur");
$assessmentDate = date("d/m/Y");

$stmt = $conn->prepare("INSERT INTO dass (matrix, stress, anxiety, depression, assessDate) VALUES (?,?,?,?,?)");
$stmt->bind_param("siiis", $mx, $st, $an, $dp, $assessmentDate);
$mx = $_SESSION['username'];
$st = $stress;
$an = $anxiety;
$dp = $depression;
$stmt->execute();
$stmt->close();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Submitted Response</title>
    <!-- CSS files -->
    <link href="css/tabler.min.css?1674944402" rel="stylesheet"/>
    <link href="css/tabler-flags.min.css?1674944402" rel="stylesheet"/>
    <link href="css/tabler-payments.min.css?1674944402" rel="stylesheet"/>
    <link href="css/tabler-vendors.min.css?1674944402" rel="stylesheet"/>
    <link href="css/demo.min.css?1674944402" rel="stylesheet"/>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/themes/light_blue.min.js"></script>
    <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
    <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
        #stackedbar-container {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<script src="js/demo-theme.min.js?1674944402"></script>
<div class="page">
    <div class="page-wrapper">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="mb-1">
                        <ol class="breadcrumb" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="home.php#assessment">Assessment</a></li>
                            <li class="breadcrumb-item"><a href="dass.html">DASS</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">Result</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Assessment Result</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label>Stress (Tekanan): <strong><?php echo htmlspecialchars($stress, ENT_QUOTES, 'UTF-8'); ?></strong></label>
                                    </div>
                                    <div class="mb-3">
                                        <label>Anxiety (Kerisauan): <strong><?php echo htmlspecialchars($anxiety, ENT_QUOTES, 'UTF-8'); ?></strong></label>
                                    </div>
                                    <div class="mb-3">
                                        <label>Depression (Kemurungan): <strong><?php echo htmlspecialchars($depression, ENT_QUOTES, 'UTF-8'); ?></strong></label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="home.php" class="btn btn-link link-secondary">Home</a>
<a href="home.php#assessment" class="btn btn-primary btn-pill">Take another assessment</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Reference Chart</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div id="stackedbar-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    anychart.onDocumentReady(function () {
        // set chart theme
        anychart.theme('lightBlue');
        // create data set on our data
        var dataSet = anychart.data.set([
            ['Stress', 7, 2, 3, 4, 5],
            ['Anxiety', 3, 2, 2, 2, 12],
            ['Depression', 4, 2, 4, 3, 8]
        ]);

        // map data for the first series, take x from the zero column and value from the first column of data set
        var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });

        // map data for the second series, take x from the zero column and value from the second column of data set
        var secondSeriesData = dataSet.mapAs({ x: 0, value: 2 });

        // map data for the second series, take x from the zero column and value from the third column of data set
        var thirdSeriesData = dataSet.mapAs({ x: 0, value: 3 });

        // map data for the fourth series, take x from the zero column and value from the fourth column of data set
        var fourthSeriesData = dataSet.mapAs({ x: 0, value: 4 });

        // map data for the fifth series, take x from the zero column and value from the fourth column of data set
        var fifthSeriesData = dataSet.mapAs({ x: 0, value: 5 });

        // create bar chart
        var chart = anychart.bar();

        // turn on chart animation
        chart.animation(true);

        // force chart to stack values by Y scale.
        chart.yScale().stackMode('value');
        // set the tick interval on the value scale
        chart.yScale().ticks().interval(1);
        chart.yScale().maximum(21);

        // helper function to setup label settings for all series
        var setupSeriesLabels = function (series, name) {
            series.name(name).stroke('3 #fff 1');
        };

        // temp variable to store series instance
        var series;

        // create first series with mapped data
        series = chart.bar(firstSeriesData);
        setupSeriesLabels(series, 'Normal');

        // create second series with mapped data
        series = chart.bar(secondSeriesData);
        setupSeriesLabels(series, 'Mild');

        // create third series with mapped data
        series = chart.bar(thirdSeriesData);
        setupSeriesLabels(series, 'Moderate');

        // create fourth series with mapped data
        series = chart.bar(fourthSeriesData);
        setupSeriesLabels(series, 'Severe');

        // create fifth series with mapped data
        series = chart.bar(fifthSeriesData);
        setupSeriesLabels(series, 'Extremely Severe');

        // turn on legend
        chart.legend().enabled(true).fontSize(14).padding([0, 0, 15, 0]);

        //chart.interactivity().hoverMode('by-x');

        chart.tooltip(false);
        // set the width of points
        chart.pointWidth(50);
        // enable major grids
        chart.yGrid().enabled(true);
        chart.xAxis().ticks().enabled(false);

        // x-axis getter
        var xAxis = chart.xAxis();
        // allow labels overlapping
        xAxis.overlapMode("allowOverlap");

        // set stackedbar-container id for the chart
        chart.container('stackedbar-container');
        // initiate chart drawing
        chart.draw();
    });
</script>
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="js/tabler.min.js?1674944402" defer></script>
<script src="js/demo.min.js?1674944402" defer></script>
</body>
</html>
