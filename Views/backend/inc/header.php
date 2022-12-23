<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quản lí sinh viên</title>
  <!--
    Thêm dòng này để fix lỗi mất các file css, js khi rewrite url sử dụng .htaccess
    Phải thêm đúng tên host,tên cổng(nếu cổng là 80 thì k cần ghi tên cổng),tên server
  -->
  <base href="http://localhost:8080/mvcProject/">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="public/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/assets/css/adminlte.min.css">
  <link rel="stylesheet" href="public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="public/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="public/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
  <!--tạo thông báo đẹp mắt-->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.9/dist/sweetalert2.min.css"> -->
  <style>
      .avatar-upload{
        position: relative;
        max-width: 205px;
        margin: 50px auto;
      }
      .avatar-edit{
        position: absolute;
        right: 20px;
        z-index: 1;
        bottom: 5px;
      }
      .avatar-edit input{
        display: none;
      }
      .avatar-edit label{
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all .2s ease-in-out;
      }
      .avatar-edit label:hover{
        background: #f1f1f1;
        border-color: #d6d6d6;
      }
      .avatar-edit label::after{
        content: "\f040";
        font-family: 'FontAwesome';
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
      }
      .avatar-preview{
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
      }
      .avatar-preview > #imagePreview{
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
      }

  </style>
</head>
<body class="hold-transition sidebar-mini">
  <!-- wrapper -->
<div class="wrapper"> 