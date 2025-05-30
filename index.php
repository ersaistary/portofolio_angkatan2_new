<?php 
    include 'admin/config/koneksi.php';

    //query profile
    $queryProfile = mysqli_query($config, "SELECT * FROM about ORDER BY id DESC");
    $rowProfile = mysqli_fetch_assoc($queryProfile);

    //queru services
    $queryServices = mysqli_query($config, "SELECT * FROM services ORDER BY id DESC");
    $rowServices = mysqli_fetch_all($queryServices, MYSQLI_ASSOC);

    //query testimonial
    $queryTestimonials = mysqli_query($config, "SELECT * FROM testimonials ORDER BY id DESC");
    $rowTestimonials = mysqli_fetch_all($queryTestimonials, MYSQLI_ASSOC);

    //queryQuestion
    $queryQuestion = mysqli_query($config, "SELECT * FROM question ORDER BY id DESC");
    $rowQuestion = mysqli_fetch_assoc($queryQuestion);

    //queryArea1
    $queryArea1 = mysqli_query($config, "SELECT * FROM area1 ORDER BY id DESC");
    $rowArea1 = mysqli_fetch_assoc($queryArea1);

    //queryArea1_content
    $queryArea1_content = mysqli_query($config, "SELECT * FROM area1_content ORDER BY id DESC");
    $rowArea1_content = mysqli_fetch_assoc($queryArea1_content);

    //queryProject
    $queryProject = mysqli_query($config, "SELECT * FROM project ORDER BY id DESC");
    $rowProject = mysqli_fetch_all($queryProject, MYSQLI_ASSOC);

    //queryHeader
    $queryHeader = mysqli_query($config, "SELECT * FROM head_content ORDER BY id DESC");
    $rowHeader = mysqli_fetch_assoc($queryHeader);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>Mark Webpage Title</title>
    
    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="depan/css/bootstrap.css" rel="stylesheet">
    <link href="depan/css/fontawesome-all.css" rel="stylesheet">
	<link href="depan/css/styles.css" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">

    
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            
            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="index.php"><img src="depan/images/logo.svg" alt="alternative"></a>  

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Mark</a> -->

            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#header">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
                <span class="nav-item social-icons">
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook-f fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-twitter fa-stack-1x"></i>
                        </a>
                    </span>
                </span>
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h1 class="h1-large"><?php echo isset($rowHeader['head'])? $rowHeader['head'] : ''?></h1>
                        <a class="btn-solid-lg page-scroll" href="#about">Discover</a>
                        <a class="btn-outline-lg page-scroll" href="#contact"><i class="fas fa-user"></i>Contact Me</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- About-->
    <div id="about" class="basic-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="text-container first">
                        <h2><?php echo isset($rowProfile['name'])? $rowProfile['name'] : ''?></h2>
                        <p><?php echo isset($rowProfile['description'])? $rowProfile['description'] : ''?></p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="text-container second">
                        <div class="time"><?php echo isset($rowProfile['time1'])? $rowProfile['time1'] : ''?></div>
                        <h6><?php echo isset($rowProfile['position1'])? $rowProfile['position1'] : ''?></h6>
                        <p><?php echo isset($rowProfile['position_desc1'])? $rowProfile['position_desc1'] : ''?></p>

                        <div class="time"><?php echo isset($rowProfile['time2'])? $rowProfile['time2'] : ''?></div>
                        <h6><?php echo isset($rowProfile['position2'])? $rowProfile['position2'] : ''?></h6>
                        <p><?php echo isset($rowProfile['position_desc2'])? $rowProfile['position_desc2'] : ''?></p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="text-container third">
                        <div class="time"><?php echo isset($rowProfile['time3'])? $rowProfile['time3'] : ''?></div>
                        <h6><?php echo isset($rowProfile['position3'])? $rowProfile['position3'] : ''?></h6>
                        <p><?php echo isset($rowProfile['position_desc3'])? $rowProfile['position_desc3'] : ''?></p>

                        <div class="time"><?php echo isset($rowProfile['time4'])? $rowProfile['time4'] : ''?></div>
                        <h6><?php echo isset($rowProfile['position4'])? $rowProfile['position4'] : ''?></h6>
                        <p><?php echo isset($rowProfile['position_desc4'])? $rowProfile['position_desc4'] : ''?></p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of about -->


    <!-- Services -->
    <div id="services" class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Offered services</h2>
                    <p class="p-heading">Web design and development have been my bread and butter for more than 5 years. During that time I've discovered that I can help startups and companies with the following services</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <?php foreach ($rowServices as $key => $data):?>
                    <div class="col-lg-4">
                        <div class="text-box">
                            <i class="<?= $data ['icon'] ?>"></i>
                            <h4><?= $data ['title']?></h4>
                            <p><?= $data ['description']?></p>
                        </div> <!-- end of text-box -->
                    </div> <!-- end of col -->
                <?php endforeach?>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of services -->


    <!-- Details -->
	<div class="split">
		<div class="area-1">
            <?php if (isset($rowArea1['photo']) && !empty($rowArea1['photo'])): ?>
                <img src="admin/uploads/<?php echo ($rowArea1['photo']); ?>" alt="Profile Photo" class="img-fluid" style="width: 20000px;">
            <?php else: ?>
                <p>Tidak ada foto yang tersedia.</p>
            <?php endif; ?>
		</div><!-- end of area-1 on same line and no space between comments to eliminate margin white space --><div class="area-2 bg-gray">
            <div class="container">    
                <div class="row">
                    <div class="col-lg-12">     
                        
                        <!-- Text Container -->
                        <div class="text-container">
                            <h2><?php echo isset($rowArea1_content['head'])? $rowArea1_content['head'] : ''?></h2>
                            <p><?php echo isset($rowArea1_content['head_description'])? $rowArea1_content['head_description'] : ''?></p>
                            <h5><?php echo isset($rowArea1_content['design_tools'])? $rowArea1_content['design_tools'] : ''?></h5>
                            <p><?php echo isset($rowArea1_content['tools_desc'])? $rowArea1_content['tools_desc'] : ''?></p>
                            <h5><?php echo isset($rowArea1_content['dev_skill'])? $rowArea1_content['dev_skill'] : ''?></h5>
                            <p><?php echo isset($rowArea1_content['skill_desc'])? $rowArea1_content['skill_desc'] : ''?></p>
                        </div> <!-- end of text-container -->
                        <!-- end of text container -->

                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
		</div> <!-- end of area-2 -->
    </div> <!-- end of split -->
    <!-- end of details -->


    <!-- Projects -->
    <div id="projects" class="basic-3">
        <div class="container">
            <?php foreach ($rowProject as $key => $data): ?>
                <div class="text-container">
                    <div class="image-container">
                        <?php if (isset($data['image']) && !empty($data['image'])): ?>
                            <img src="admin/uploads/<?php echo $data['image'] ?>" alt="Profile Photo" class="img-fluid d-flex justify-content-center" >
                        <?php else: ?>
                            <p>Tidak ada foto yang tersedia.</p>
                        <?php endif; ?>
                    </div> <!-- end of image-container -->
                    <p>
                        <strong>For:</strong> <?= $data['for'] ?> 
                        <strong>Project:</strong> <?= $data['description'] ?>
                    </p>
                </div> <!-- end of text-container -->
            <?php endforeach ?>
        </div> <!-- end of container -->
    </div> <!-- end of basic-3 -->
    <!-- end of projects -->


    <!-- Testimonials -->
    <div class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">A few words from people that chose to work with me</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <?php foreach ($rowTestimonials as $key => $data):?>
                        <div class="card">
                            <div class="card-body">
                                <p class="testimonial-text">“<?= $data ['testi']?>”</p>
                                <div class="details">
                                    <div class="text">
                                        <div class="testimonial-author"><?= $data ['name']?></div>
                                        <div class="occupation"><?= $data ['occupation']?></div>
                                    </div> <!-- end of text -->
                                </div> <!-- end of testimonial-details -->
                            </div>
                        </div>
                        <!-- end of card -->
                    <?php endforeach?>
                    <!-- Card -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of testimonials -->


    <!-- Section Divider -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <hr class="section-divider">
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
    <!-- end of section divider -->


    <!-- Questions -->
    <div class="accordion-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Frequent questions</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <?php 
                                        $question= mysqli_query($config, "SELECT question FROM question WHERE id=1");
                                        $rowQuestion= mysqli_fetch_assoc($question);
                                        echo $rowQuestion['question'];
                                    ?>
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?php 
                                        $answer= mysqli_query($config, "SELECT answer FROM question WHERE id=1");
                                        $rowAnswer = mysqli_fetch_assoc($answer);
                                        echo $rowAnswer['answer'];
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <?php 
                                        $question= mysqli_query($config, "SELECT question FROM question WHERE id=2");
                                        $rowQuestion= mysqli_fetch_assoc($question);
                                        echo $rowQuestion['question'];
                                    ?>
                                </button>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?php 
                                        $answer= mysqli_query($config, "SELECT answer FROM question WHERE id=1");
                                        $rowAnswer = mysqli_fetch_assoc($answer);
                                        echo $rowAnswer['answer'];
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <?php 
                                        $question= mysqli_query($config, "SELECT question FROM question WHERE id=1");
                                        $rowQuestion= mysqli_fetch_assoc($question);
                                        echo $rowQuestion['question'];
                                    ?>
                                </button>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?php 
                                        $answer= mysqli_query($config, "SELECT answer FROM question WHERE id=1");
                                        $rowAnswer = mysqli_fetch_assoc($answer);
                                        echo $rowAnswer['answer'];
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <?php 
                                        $question= mysqli_query($config, "SELECT question FROM question WHERE id=1");
                                        $rowQuestion= mysqli_fetch_assoc($question);
                                        echo $rowQuestion['question'];
                                    ?>
                                </button>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?php 
                                        $answer= mysqli_query($config, "SELECT answer FROM question WHERE id=1");
                                        $rowAnswer = mysqli_fetch_assoc($answer);
                                        echo $rowAnswer['answer'];
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <?php 
                                        $question= mysqli_query($config, "SELECT question FROM question WHERE id=1");
                                        $rowQuestion= mysqli_fetch_assoc($question);
                                        echo $rowQuestion['question'];
                                    ?>
                                </button>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?php 
                                        $answer= mysqli_query($config, "SELECT answer FROM question WHERE id=1");
                                        $rowAnswer = mysqli_fetch_assoc($answer);
                                        echo $rowAnswer['answer'];
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end of accordion -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of accordion-1 -->
    <!-- end of questions -->


    <!-- Contact -->
    <div id="contact" class="form-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact details</h2>
                    <p class="p-heading">For any type of online project please don't hesitate to get in touch with me. The fastest way is to send me your message using the following email <a class="blue no-line" href="#your-link">contact@domain.com</a></p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Contact Form -->
                    <form id="contactForm" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="cname" required name="name">
                            <label class="label-control" for="cname">Name</label>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" id="cemail" required name="email"> 
                            <label class="label-control" for="cemail">Email</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control-textarea" id="cmessage" required name="project_details"></textarea>
                            <label class="label-control" for="cmessage">Project details</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button" name="simpan">Submit</button>
                        </div>
                    </form>

                    <?php 
                        include 'admin/config/koneksi.php'; 
                        if(isset($_POST['simpan'])){
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $project_details = $_POST['project_details'];
                            $insertQ = mysqli_query ($config, "INSERT INTO contacts (name, email, project_details) VALUES ('$name','$email','$project_details')");
                        }
                    ?>
                    <!-- end of contact form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->  
    <!-- end of contact -->


    <!-- Footer -->
    <div class="footer bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="social-container">
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-pinterest-p fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-youtube fa-stack-1x"></i>
                            </a>
                        </span>
                    </div> <!-- end of social-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © <a class="no-line" href="#your-link">Your name</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Distributed By <a class="no-line" href="https://themewagon.com/">Themewagon</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
        
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    
    	
    <!-- Scripts -->
    <script src="depan/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="depan/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="depan/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="depan/js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>