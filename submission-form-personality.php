<?php
session_start();
include('database-config_object-oriented.php');

// Ensure the user is logged in and not an admin
if (!isset($_SESSION['username']) || $_SESSION['role'] == 'admin') {
    header("Location: login.php");
    exit();
}

// Initialize score
$score = 0;
$personalityType = "";

if (
    isset($_POST["soalan1"]) && isset($_POST["soalan2"]) && isset($_POST["soalan3"]) &&
    isset($_POST["soalan4"]) && isset($_POST["soalan5"]) && isset($_POST["soalan6"]) &&
    isset($_POST["soalan7"]) && isset($_POST["soalan8"]) && isset($_POST["soalan9"]) &&
    isset($_POST["soalan10"]) && isset($_POST["soalan11"]) && isset($_POST["soalan12"]) &&
    isset($_POST["soalan13"]) && isset($_POST["soalan14"]) && isset($_POST["soalan15"]) &&
    isset($_POST["soalan16"]) && isset($_POST["soalan17"]) && isset($_POST["soalan18"]) &&
    isset($_POST["soalan19"]) && isset($_POST["soalan20"])
) {
    $score = $_POST["soalan1"] + $_POST["soalan2"] + $_POST["soalan3"] + $_POST["soalan4"] +
        $_POST["soalan5"] + $_POST["soalan6"] + $_POST["soalan7"] + $_POST["soalan8"] +
        $_POST["soalan9"] + $_POST["soalan10"] + $_POST["soalan11"] + $_POST["soalan12"] +
        $_POST["soalan13"] + $_POST["soalan14"] + $_POST["soalan15"] + $_POST["soalan16"] +
        $_POST["soalan17"] + $_POST["soalan18"] + $_POST["soalan19"] + $_POST["soalan20"];
} else {
    echo "<script>alert('Please answer all questions.');history.go(-1);</script>";
    exit();
}

if ($score <= 49) {
    $personalityType = "B";
} else {
    $personalityType = "A";

    if ($score >= 80) {
        $personalityType .= " Negatif";
    } elseif ($score > 70) {
        $personalityType .= " dan berpotensi menghadapi pelbagai risiko";
    } else {
        $personalityType .= " Positif";
    }
}

// Get the current date
date_default_timezone_set("Asia/Kuala_Lumpur");
$assessmentDate = date("d/m/Y");

// Insert into database
$stmt = $conn->prepare("INSERT INTO personaliti (matrix, skor, personaliti, assessDate) VALUES (?, ?, ?, ?)");
$stmt->bind_param("siss", $mx, $sk, $pr, $assessmentDate);
$mx = $_SESSION['username'];
$sk = $score;
$pr = $personalityType;
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
                            <li class="breadcrumb-item"><a href="personality.html">Personality Test</a></li>
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
                                <div class="mb-3">
                                    <label>You have a Personality Type : <strong><?php echo htmlspecialchars($personalityType, ENT_QUOTES, 'UTF-8'); ?></strong>.</label>
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
                                <h4 class="card-title">Explanation</h4>
                            </div>
                            <div class="card-body">
                                <div class="row row-cards">
                                    <div class="col-md-3">
                                        <div class="form-label" style="text-align: center;"><strong>Type A</strong></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-label">Aggressive, energetic, ambitious, driven and highly competitive. Individuals who are susceptible to stress.</div>
                                    </div>
                                </div>
                                <div class="row row-cards">
                                    <div class="col-md-3">
                                        <div class="form-label" style="text-align: center;"><strong>Type B</strong></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-label">Patient, simple, less competitive (easy going). Individuals who give stress to others.</div>
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
<!-- Libs JS -->
<!-- Tabler Core -->
<script src="js/tabler.min.js?1674944402" defer></script>
<script src="js/demo.min.js?1674944402" defer></script>
</body>
</html>
