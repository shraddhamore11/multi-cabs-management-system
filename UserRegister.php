
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Lab Budget Management</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                   
                 
                </div>
            </div>
            <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
    
                        <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">K K WAGH POLYTECHNIC</a></small>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                     <a href="index.php" class="navbar-brand"><h1 style="color:red;">Lab Budget</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                     <div class="navbar-nav mx-auto">
						<a href="index.php" class="nav-item nav-link" style="color:blue;">Back</a>
                            <a href="index.php" class="nav-item nav-link active" style="color:blue;">Home</a>
                           
                           
                            <div class="nav-item dropdown">
                            </div>
                            <a href="contact.php" class="nav-item nav-link" style="color:blue;">Contact</a>
							
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->
      
            <h1 class="text-center text-white display-6">User Registration</h1>
           
        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="#">
                                
                               
                            </a>
							
                        </div>
						
                        <div class="col-lg-6">
						
                            <div class="position-relative mx-auto">
							<h1 class="text-primary mb-0">User Registration</h1>
                               
								<br>
								<br>
								
                            </div>
							<div>
							<form action="UserRegister_code.php" method="post" >
							<div>
							<div class="position-relative mx-auto">
							 <label for="uname">Username:</label>
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="text" name="uname" required>
								<br>
								<br>
                            </div>
							<div class="position-relative mx-auto">
							 <label for="uname">Department:</label>
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="text" name="depart" required>
								<br>
								<br>
                            </div>
							<div class="position-relative mx-auto">
							 <label for="uname">Lab Name:</label>
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="text" name="labname" required>
								<br>
								<br>
                            </div>
							<div class="position-relative mx-auto">
							<label for="uemail">Email:</label>
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="email" name="uemail" required>
								<br>
								<br>
                            </div>
							<div class="position-relative mx-auto">
							<label for="umob">Mobile:</label>
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="text" name="umob" required>
								<br>
								<br>
                            </div>
							<div class="position-relative mx-auto">
							<label for="upass">Password:</label>
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="password" name="upass" required>
								<br>
								<br>
                            </div>

							<div class="position-relative mx-auto">
						<button class="form-control border-0 w-100 py-3 px-4 " type="submit" name="submit" class="btn btn-dark">Register</button>
							 <br>
							 <br>
							 </div>
							 <style>
   .custom-width {
        width: 640px; /* Adjust the width as needed */
        height: 70px; /* Adjust the height as needed */
        font-size: 40px; /* Adjust the font size as needed */
    }
	 .custom-text-color {
        color: black; /* Or any other color value you desire */
    }
	.custom-text {
        color: white; /* Or any other color value you desire */
    }
	 .custom-button-color {
        background-color: black; /* Or any other color value you desire */
    }
</style>

                            <div class="position-relative mx-auto">    
                            <a href="User_Login.php"><button type="button" class="btn btn-primary btn-lg custom-width custom-text custom-button-color">Existing User --> LOGIN</button></a>
							
                        </div>
                        </div>
						</form>
	
						
                    </div>
                </div>
             
            </div>
        </div>
        <!-- Footer End -->

       



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>