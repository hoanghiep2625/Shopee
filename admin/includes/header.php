<!DOCTYPE html>
<html>
<?php
if (isset($_SESSION['admin']) && $_SESSION['admin'] == $_SESSION['email']) {
} else {
    header("location:?action=login");
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>QUẢN TRỊ WEBSITE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="admin/includes/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="admin/includes/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="admin/includes/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="admin/includes/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="admin/includes/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="admin/includes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="admin/includes/plugins/daterangepicker/daterangepicker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="admin/includes/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" type="text/css" href="dist/asColorPicker.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">