<?php
session_start();
include('database-config_procedural.php');

// Ensure the user is logged in and not an admin
if (!isset($_SESSION['username']) || $_SESSION['role'] == 'admin') {
    header("Location: login.php");
    exit();
}

// Initialize variables
$visual = $auditory = $kinesthetic = 0;

    if (isset($_POST["auditori1"]) && isset($_POST["auditori2"]) && isset($_POST["auditori3"]) && isset($_POST["auditori4"]) && isset($_POST["auditori5"]) && isset($_POST["auditori6"]) && isset($_POST["auditori7"]) && isset($_POST["auditori8"]) && isset($_POST["visual1"]) && isset($_POST["visual2"]) && isset($_POST["visual3"]) && isset($_POST["visual4"]) && isset($_POST["visual5"]) && isset($_POST["visual6"]) && isset($_POST["visual7"]) && isset($_POST["visual8"]) && isset($_POST["kinestetik1"]) && isset($_POST["kinestetik2"]) && isset($_POST["kinestetik3"]) && isset($_POST["kinestetik4"]) && isset($_POST["kinestetik5"]) && isset($_POST["kinestetik6"]) && isset($_POST["kinestetik7"]) && isset($_POST["kinestetik8"])) {

	$auditori = $_POST["auditori1"] + $_POST["auditori2"] + $_POST["auditori3"] + $_POST["auditori4"] + $_POST["auditori5"] + $_POST["auditori6"] + $_POST["auditori7"] + $_POST["auditori8"];
	$visual = $_POST["visual1"] + $_POST["visual2"] + $_POST["visual3"] + $_POST["visual4"] + $_POST["visual5"] + $_POST["visual6"] + $_POST["visual7"] + $_POST["visual8"];
	$kinestetik = $_POST["kinestetik1"] + $_POST["kinestetik2"] + $_POST["kinestetik3"] + $_POST["kinestetik4"] + $_POST["kinestetik5"] + $_POST["kinestetik6"] + $_POST["kinestetik7"] + $_POST["kinestetik8"];
} else {
	//echo "error!";
	echo "<script>alert('Please answer all question.');history.go(-1);</script>";
}

if ($auditori >= $visual && $auditori >= $kinestetik) {
  $highestLabel = "Auditori";
  if ($auditori == $visual) {
    $highestLabel .= " dan Visual";
  }
  if ($auditori == $kinestetik) {
    $highestLabel .= " dan Kinestetik";
  }
} elseif ($visual >= $kinestetik) {
  $highestLabel = "Visual";
  if ($visual == $kinestetik) {
    $highestLabel .= " dan Kinestetik";
  }
} else {
  $highestLabel = "Kinestetik";
}

// Get the current date
date_default_timezone_set("Asia/Kuala_Lumpur");
$assessmentDate = date("d/m/Y");

   $stmt = $conn->prepare("INSERT INTO belajar (matrix,auditori,visual,kinestetik,assessDate) VALUES (?,?,?,?,?)");
$stmt->bind_param("siiis", $mx, $ad, $vs, $kn, $assessmentDate);
$mx = $_SESSION['username'];
$ad = $auditori;
$vs = $visual;
$kn = $kinestetik;
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
    <script src="https://cdn.anychart.com/releases/v8/themes/morning.min.js"></script>
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
                  <li class="breadcrumb-item"><a href="gaya-belajar.html">Learning Style Test</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="#">Result</a></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
              <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Assessment Result</h4>
                  </div>
                  <div class="card-body">
                    <div class="card-body">
                      <div class="label">
                        Your learning style is <strong><?php echo $highestLabel; ?></strong>.
                      </div><br>
                      <div id="columnchart-container"></div>
                    </div>
                  </div>
                  <div class="card-footer">
               <a href="home.php" class="btn btn-link link-secondary">Home</a>
<a href="home.php#assessment" class="btn btn-primary btn-pill">Take another assessment</a>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                      <li class="nav-item">
                        <a href="#tabs-auditory" class="nav-link active" data-bs-toggle="tab">Auditori</a>
                      </li>
                      <li class="nav-item">
                        <a href="#tabs-visual" class="nav-link" data-bs-toggle="tab">Visual</a>
                      </li>
                      <li class="nav-item">
                        <a href="#tabs-kinesthetic" class="nav-link" data-bs-toggle="tab">Kinestetic</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="tab-pane fade active show" id="tabs-auditory">
                        <h4>Learning style: Auditory</h4>
                        <div>Auditory learners like to talk to themselves. Hearing their voice helps them to remember information. Usually, Auditory students have the advantage of communicating.</div>
                        <a href="https://www.tutorkami.com/tuition/gaya-belajar-anak-vak/">Sumber</a>
                      </div>
                      <div class="tab-pane fade" id="tabs-visual">
                        <h4>Learning style: Visual</h4>
                        <div>Visual learners are divided into 2 categories, Linguistic and Spatial. Linguistic students learn more easily through writing, whether reading or writing. They easily remember something read or written by him. While Spatial type visual students prefer the use of charts, graphs and pictures. They have a stronger memory and imagination.</div>
                        <a href="https://www.tutorkami.com/tuition/gaya-belajar-anak-vak/">Sumber</a>
                      </div>
                      <div class="tab-pane fade" id="tabs-kinesthetic">
                        <h4>Learning style: Kinesthetic</h4>
                        <div>Kinesthetic learners prefer to move and be active. They are not the type of students who can just sit and listen for hours. They will lose concentration if they don't move. In class, they choose to jot down notes to create movement.</div>
                        <a href="https://www.tutorkami.com/tuition/gaya-belajar-anak-vak/">Sumber</a>
                      </div>
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
      anychart.onDocumentReady(function() {

      // set the data
      var data = {
        header: ['Name', 'Mark'],
        rows: [
          ['Auditory', '<?php echo $auditori ?>'],
          ['Visual', '<?php echo $visual ?>'],
          ['Kinesthetic', '<?php echo $kinestetik ?>']
        ]};

      // create the chart
      var chart = anychart.column();
      chart.yScale().ticks().interval(1);
      chart.yScale().maximum(24);

      // add data
      chart.data(data);

      // set the chart title
      //chart.title('The deadliest earthquakes in the XXth century');

      // draw
      chart.container('columnchart-container');
      chart.draw();
    });
    </script>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="js/tabler.min.js?1674944402" defer></script>
    <script src="js/demo.min.js?1674944402" defer></script>
  </body>
</html>