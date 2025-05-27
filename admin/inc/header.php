<?php 
    $id_level= isset($_SESSION['LEVEL'])? $_SESSION['LEVEL'] : '';
?>

<header class="shadow">
            <nav class="navbar navbar-expand-lg bg-body-white ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">CMS Erssa</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Page
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="?page=profile">XXX</a></li>
                                    <li><a class="dropdown-item" href="?page=services">Services</a></li>
                                    <!-- jika level = admin maka dapat halaman user kalau bukan maka jangan -->
                                     <?php  if($id_level == 1) :?>
                                    <li><a class="dropdown-item" href="?page=user">User</a></li>
                                    <li><a class="dropdown-item" href="?page=tambah-user">Tambah User</a></li>
                                    <?php endif?>
                                    <li><a class="dropdown-item" href="?page=manage-profile">Profile</a></li>
                                    <li><a class="dropdown-item" href="?page=testimonials">Testimonials</a></li>
                                    <li><a class="dropdown-item" href="?page=question">Question</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="?page=contact">Contact</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="navbar-nav mr-auto mb-2 mb-lg-0 pe-5">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo $_name =isset($_SESSION['NAME'])? $_SESSION['NAME']: '';?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="keluar.php">LogOut</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
        </header>