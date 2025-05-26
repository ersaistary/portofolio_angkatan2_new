<?php 
session_start();
ob_start();
    $_name = isset($_SESSION['NAME'])? $_SESSION['NAME']: '';
    if(!$_name){
        header ("location:index.php?access=failed");
    }
include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Header -->
        <?php include 'inc/header.php'; ?>
        <!-- Content -->
        <div class="content mt-5">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <?php 
                                    echo (isset($_GET ['page']))? str_replace("-", " ", ucfirst($_GET['page'])) : 'Home';
                                ?>
                            </div>

                            <!-- Body -->
                            <div class="card-body">
                                <?php 
                                    if(isset($_GET['page'])){
                                        if(file_exists("content/" . $_GET['page'] . ".php")){
                                            include "content/" . $_GET['page']. ".php";
                                        }else{
                                            include 'content/notfound.php';
                                        }
                                    }else{
                                        include 'content/home.php'; 
                                    }
                                ?>    
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
    <script>
      $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });

      $('#table').DataTable();
    </script>

    
</body>

</html>