<?php 
include 'database-config_object-oriented.php';
$id = $_GET['id'];

$sqlinfo = "SELECT name,faculty,gender,telephone,email FROM users WHERE username='$id'"; 
$result = $conn->query($sqlinfo);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $name = $row["name"]; 
    $faculty = $row["faculty"];
    $gender = $row["gender"];
    $telephone = $row["telephone"];
    $email = $row["email"];
  }
} else {
  echo "<script>alert('Data did not exist.');history.go(-1);</script>";
}

$sql = "SELECT stress,anxiety,depression FROM dass WHERE matrix='$id'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $scoreStress = $row["stress"];
    $scoreAnxiety = $row["anxiety"];
    $scoreDepression = $row["depression"];
  }
} else {
  $scoreDepression = $scoreAnxiety = $scoreStress = 0;
  $label = "This student have not yet answered the assessment.";
}  
$sql = "SELECT skor,personaliti FROM personaliti WHERE matrix='$id'"; 
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $score = $row["skor"];
    $personalityType = $row["personaliti"];
  }
} else {
  $score = 0;
  $type = "";
  $label = "This student have not yet answered the assessment.";
}
$sql = "SELECT auditori,visual,kinestetik FROM belajar WHERE matrix='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $visual = $row["visual"];
    $auditori = $row["auditori"];
    $kinestetik = $row["kinestetik"];
  }
} else {
  $visual = $auditori = $kinestetik = 0;
  $label = "This student have not yet answered the assessment.";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Student Details</title>
    <!-- CSS files -->
    <link href="css/tabler.min.css?1674944402" rel="stylesheet"/>
    <link href="css/tabler-flags.min.css?1674944402" rel="stylesheet"/>
    <link href="css/tabler-payments.min.css?1674944402" rel="stylesheet"/>
    <link href="css/tabler-vendors.min.css?1674944402" rel="stylesheet"/>
    <link href="css/demo.min.css?1674944402" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
        --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
        font-feature-settings: "cv03", "cv04", "cv11";
      }
      #chartdivStress,#chartdivAnxiety,#chartdivDepression {
        width: 100%;
        height: 300px;
      }
    </style>
  </head>
  <body >
    <script src="js/demo-theme.min.js?1674944402"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <div class="page">
      <!-- Navbar -->
      <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar navbar-light">
            <div class="container-xl">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="home.php" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Home
                    </span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="logout.php">
                      Log out
                    </a>
                  </div>
                </li>
              </ul>
              <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
              </div>
            </div>
          </div>
        </div>
      </header>
      <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Student Details
                </h2>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Base info</h3>
              </div>
              <div class="card-body">
                <div class="datagrid">
                  <div class="datagrid-item">
                    <div class="datagrid-title">Name</div>
                    <div class="datagrid-content"><?php echo $name; ?></div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Matrix Number</div>
                    <div class="datagrid-content"><?php echo $id ?></div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Gender</div>
                    <div class="datagrid-content"><?php echo $gender ?></div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Telephone number</div>
                    <div class="datagrid-content"><?php echo $telephone ?></div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Email</div>
                    <div class="datagrid-content"><?php echo $email ?></div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Faculty</div>
                    <div class="datagrid-content"><?php echo $faculty; ?></div>
                  </div>
                  <!--<div class="datagrid-item">
                    <div class="datagrid-title">Role</div>
                    <div class="datagrid-content">
                      <span class="status status-green">
                        Student
                      </span>
                    </div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Checkbox</div>
                    <div class="datagrid-content">
                      <label class="form-check">
                        <input class="form-check-input" type="checkbox" checked>
                        <span class="form-check-label">Click me</span>
                      </label>
                    </div>
                  </div>
                  <div class="datagrid-item">
                    <div class="datagrid-title">Longer description</div>
                    <div class="datagrid-content">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </div>
                  </div>-->
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
                  <li class="nav-item">
                    <a href="#tabs-dass" class="nav-link active" data-bs-toggle="tab">DASS</a>
                  </li>
                  <li class="nav-item">
                    <a href="#tabs-personality" class="nav-link" data-bs-toggle="tab">PERSONALITY</a>
                  </li>
                  <li class="nav-item">
                    <a href="#tabs-learningstyle" class="nav-link" data-bs-toggle="tab">LEARNING STYLE</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane fade active show" id="tabs-dass">
                    <div class="col-12">
                      <div><?php if ($scoreStress==0 || $scoreAnxiety==0 || $scoreDepression==0) {echo $label;} ?></div><br>
                      <div class="card-group">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">Stress</h3>
                          </div>
                          <div class="card-body p-0">
                            <div id="chartdivStress"></div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">Anxiety</h3>
                          </div>
                          <div class="card-body p-0">
                            <div id="chartdivAnxiety"></div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">Depression</h3>
                          </div>
                          <div class="card-body p-0">
                            <div id="chartdivDepression"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tabs-personality">
                    <h4>PERSONALITY</h4><div><?php if ($score==0) {echo $label;} ?></div>
                    <div><?php if (isset($personalityType)) {echo $personalityType;} ?></div>
                  </div>
                  <div class="tab-pane fade" id="tabs-learningstyle">
                    <h4>LEARNING STYLE</h4>
                    <div>
                      <?php if ($visual==0 || $auditori==0 || $kinestetik==0) {echo $label;} else { ?>
                    </div>
                    <div>
                      Visual : <?php echo $visual; ?><br>
                      Auditori : <?php echo $auditori; ?><br>
                      Kinestetik : <?php echo $kinestetik; } ?><br>
                    </div>
                    <div id="columnchart-container"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <script src="dist/list.min.js?1674944402" defer></script>
    <script src="apexcharts/dist/apexcharts.min.js?1674944402" defer></script>
    <!-- Tabler Core -->
    <script src="js/tabler.min.js?1674944402" defer></script>
    <script src="js/demo.min.js?1674944402" defer></script>
    <script>
      // stress
      am5.ready(function() {

      // Create root element
      // https://www.amcharts.com/docs/v5/getting-started/#Root_element
      var root = am5.Root.new("chartdivStress");

      // Set themes
      // https://www.amcharts.com/docs/v5/concepts/themes/
      root.setThemes([
        am5themes_Animated.new(root)
      ]);

      // Create chart
      // https://www.amcharts.com/docs/v5/charts/radar-chart/
      var chart = root.container.children.push(am5radar.RadarChart.new(root, {
        panX: false,
        panY: false,
        startAngle: 160,
        endAngle: 380
      }));

      // Create axis and its renderer
      // https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Axes
      var axisRenderer = am5radar.AxisRendererCircular.new(root, {
        innerRadius: -40
      });

      axisRenderer.grid.template.setAll({
        stroke: root.interfaceColors.get("background"),
        visible: true,
        strokeOpacity: 0
      });

      var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
        maxDeviation: 0,
        min: 0,
        max: 21,
        strictMinMax: true,
        renderer: axisRenderer
      }));

      // Add clock hand
      // https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Clock_hands
      var axisDataItem = xAxis.makeDataItem({});

      var clockHand = am5radar.ClockHand.new(root, {
        pinRadius: am5.percent(18),
        radius: am5.percent(80),
        bottomWidth: 30
      })

      var bullet = axisDataItem.set("bullet", am5xy.AxisBullet.new(root, {
        sprite: clockHand
      }));

      xAxis.createAxisRange(axisDataItem);

      var label = chart.radarContainer.children.push(am5.Label.new(root, {
        fill: am5.color(0xffffff),
        centerX: am5.percent(50),
        textAlign: "center",
        centerY: am5.percent(50),
        fontSize: "1.2em"
      }));

      axisDataItem.set("value", '<?php echo $scoreStress ?>');
      bullet.get("sprite").on("rotation", function () {
        var value = axisDataItem.get("value");
        var text = axisDataItem.get("value").toString();
        var fill = am5.color(0x000000);
        xAxis.axisRanges.each(function (axisRange) {
          if (value >= axisRange.get("value") && value <= axisRange.get("endValue")) {
            fill = axisRange.get("axisFill").get("fill");
          }
        })

        label.set("text", value.toString());

        clockHand.pin.animate({ key: "fill", to: fill, duration: 500, easing: am5.ease.out(am5.ease.cubic) })
        clockHand.hand.animate({ key: "fill", to: fill, duration: 500, easing: am5.ease.out(am5.ease.cubic) })
      });

      chart.bulletsContainer.set("mask", undefined);

      // Create axis ranges bands
      // https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Bands
      var bandsData = [{
        title: "Extremely Severe",
        color: "#ee1f25",
        lowScore: 16,
        highScore: 21
      }, {
        title: "Severe",
        color: "#fdae19",
        lowScore: 12,
        highScore: 16
      }, {
        title: "Moderate",
        color: "#f3eb0c",
        lowScore: 9,
        highScore: 12
      }, {
        title: "Mild",
        color: "#b0d136",
        lowScore: 7,
        highScore: 9
      }, {
        title: "Normal",
        color: "#0f9747",
        lowScore: 0,
        highScore: 7
      }];

      am5.array.each(bandsData, function (data) {
        var axisRange = xAxis.createAxisRange(xAxis.makeDataItem({}));

        axisRange.setAll({
          value: data.lowScore,
          endValue: data.highScore
        });

        axisRange.get("axisFill").setAll({
          visible: true,
          fill: am5.color(data.color),
          fillOpacity: 0.8
        });

        axisRange.get("label").setAll({
          text: data.title,
          inside: true,
          radius: 14,
          fontSize: "1em",
          fill: root.interfaceColors.get("background")
        });
      });

      }); 
      // anxiety
      am5.ready(function() {

      // Create root element
      // https://www.amcharts.com/docs/v5/getting-started/#Root_element
      var root = am5.Root.new("chartdivAnxiety");

      // Set themes
      // https://www.amcharts.com/docs/v5/concepts/themes/
      root.setThemes([
        am5themes_Animated.new(root)
      ]);

      // Create chart
      // https://www.amcharts.com/docs/v5/charts/radar-chart/
      var chart = root.container.children.push(am5radar.RadarChart.new(root, {
        panX: false,
        panY: false,
        startAngle: 160,
        endAngle: 380
      }));

      // Create axis and its renderer
      // https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Axes
      var axisRenderer = am5radar.AxisRendererCircular.new(root, {
        innerRadius: -40
      });

      axisRenderer.grid.template.setAll({
        stroke: root.interfaceColors.get("background"),
        visible: true,
        strokeOpacity: 0
      });

      var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
        maxDeviation: 0,
        min: 0,
        max: 21,
        strictMinMax: true,
        renderer: axisRenderer
      }));

      // Add clock hand
      // https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Clock_hands
      var axisDataItem = xAxis.makeDataItem({});

      var clockHand = am5radar.ClockHand.new(root, {
        pinRadius: am5.percent(18),
        radius: am5.percent(80),
        bottomWidth: 30
      })

      var bullet = axisDataItem.set("bullet", am5xy.AxisBullet.new(root, {
        sprite: clockHand
      }));

      xAxis.createAxisRange(axisDataItem);

      var label = chart.radarContainer.children.push(am5.Label.new(root, {
        fill: am5.color(0xffffff),
        centerX: am5.percent(50),
        textAlign: "center",
        centerY: am5.percent(50),
        fontSize: "1.2em"
      }));

      axisDataItem.set("value", '<?php echo $scoreAnxiety ?>');
      bullet.get("sprite").on("rotation", function () {
        var value = axisDataItem.get("value");
        var text = axisDataItem.get("value").toString();
        var fill = am5.color(0x000000);
        xAxis.axisRanges.each(function (axisRange) {
          if (value >= axisRange.get("value") && value <= axisRange.get("endValue")) {
            fill = axisRange.get("axisFill").get("fill");
          }
        })

        label.set("text", value.toString());

        clockHand.pin.animate({ key: "fill", to: fill, duration: 500, easing: am5.ease.out(am5.ease.cubic) })
        clockHand.hand.animate({ key: "fill", to: fill, duration: 500, easing: am5.ease.out(am5.ease.cubic) })
      });

      chart.bulletsContainer.set("mask", undefined);

      // Create axis ranges bands
      // https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Bands
      var bandsData = [{
        title: "Extremely Severe",
        color: "#ee1f25",
        lowScore: 9,
        highScore: 21
      }, {
        title: "Severe",
        color: "#fdae19",
        lowScore: 7,
        highScore: 9
      }, {
        title: "Moderate",
        color: "#f3eb0c",
        lowScore: 5,
        highScore: 7
      }, {
        title: "Mild",
        color: "#b0d136",
        lowScore: 3,
        highScore: 5
      }, {
        title: "Normal",
        color: "#0f9747",
        lowScore: 0,
        highScore: 3
      }];

      am5.array.each(bandsData, function (data) {
        var axisRange = xAxis.createAxisRange(xAxis.makeDataItem({}));

        axisRange.setAll({
          value: data.lowScore,
          endValue: data.highScore
        });

        axisRange.get("axisFill").setAll({
          visible: true,
          fill: am5.color(data.color),
          fillOpacity: 0.8
        });

        axisRange.get("label").setAll({
          text: data.title,
          inside: true,
          radius: 14,
          fontSize: "0.8em",
          fill: root.interfaceColors.get("background")
        });
      });

      }); 
      // depression
      am5.ready(function() {

      // Create root element
      // https://www.amcharts.com/docs/v5/getting-started/#Root_element
      var root = am5.Root.new("chartdivDepression");

      // Set themes
      // https://www.amcharts.com/docs/v5/concepts/themes/
      root.setThemes([
        am5themes_Animated.new(root)
      ]);

      // Create chart
      // https://www.amcharts.com/docs/v5/charts/radar-chart/
      var chart = root.container.children.push(am5radar.RadarChart.new(root, {
        panX: false,
        panY: false,
        startAngle: 160,
        endAngle: 380
      }));

      // Create axis and its renderer
      // https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Axes
      var axisRenderer = am5radar.AxisRendererCircular.new(root, {
        innerRadius: -40
      });

      axisRenderer.grid.template.setAll({
        stroke: root.interfaceColors.get("background"),
        visible: true,
        strokeOpacity: 0
      });

      var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
        maxDeviation: 0,
        min: 0,
        max: 21,
        strictMinMax: true,
        renderer: axisRenderer
      }));

      // Add clock hand
      // https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Clock_hands
      var axisDataItem = xAxis.makeDataItem({});

      var clockHand = am5radar.ClockHand.new(root, {
        pinRadius: am5.percent(18),
        radius: am5.percent(80),
        bottomWidth: 30
      })

      var bullet = axisDataItem.set("bullet", am5xy.AxisBullet.new(root, {
        sprite: clockHand
      }));

      xAxis.createAxisRange(axisDataItem);

      var label = chart.radarContainer.children.push(am5.Label.new(root, {
        fill: am5.color(0xffffff),
        centerX: am5.percent(50),
        textAlign: "center",
        centerY: am5.percent(50),
        fontSize: "1.2em"
      }));

      axisDataItem.set("value", '<?php echo $scoreDepression ?>');
      bullet.get("sprite").on("rotation", function () {
        var value = axisDataItem.get("value");
        var text = axisDataItem.get("value").toString();
        var fill = am5.color(0x000000);
        xAxis.axisRanges.each(function (axisRange) {
          if (value >= axisRange.get("value") && value <= axisRange.get("endValue")) {
            fill = axisRange.get("axisFill").get("fill");
          }
        })

        label.set("text", value.toString());

        clockHand.pin.animate({ key: "fill", to: fill, duration: 500, easing: am5.ease.out(am5.ease.cubic) })
        clockHand.hand.animate({ key: "fill", to: fill, duration: 500, easing: am5.ease.out(am5.ease.cubic) })
      });

      chart.bulletsContainer.set("mask", undefined);

      // Create axis ranges bands
      // https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Bands
      var bandsData = [{
        title: "Extremely Severe",
        color: "#ee1f25",
        lowScore: 13,
        highScore: 21
      }, {
        title: "Severe",
        color: "#fdae19",
        lowScore: 10,
        highScore: 13
      }, {
        title: "Moderate",
        color: "#f3eb0c",
        lowScore: 6,
        highScore: 10
      }, {
        title: "Mild",
        color: "#b0d136",
        lowScore: 4,
        highScore: 6
      }, {
        title: "Normal",
        color: "#0f9747",
        lowScore: 0,
        highScore: 4
      }];

      am5.array.each(bandsData, function (data) {
        var axisRange = xAxis.createAxisRange(xAxis.makeDataItem({}));

        axisRange.setAll({
          value: data.lowScore,
          endValue: data.highScore
        });

        axisRange.get("axisFill").setAll({
          visible: true,
          fill: am5.color(data.color),
          fillOpacity: 0.8
        });

        axisRange.get("label").setAll({
          text: data.title,
          inside: true,
          radius: 14,
          fontSize: "1em",
          fill: root.interfaceColors.get("background")
        });
      });

      }); 
      // gaya belajar
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
  </body>
</html>