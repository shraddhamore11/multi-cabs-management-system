<%@page import="com.shiwani.dbcon.*" %>
<%@page import="java.sql.*" %>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>


<head>
    <meta charset="utf-8">
    <title>CarServ - Car Repair HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet"/>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-car me-3"></i>MultiCabs</h2>
        </a>
         
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        
    </nav>
    <!-- Navbar End -->
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
    <!-- Page Header Start -->
    
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-12.png);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown"> Edit Route</h1>
               
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">     
                </div>
                <div class="form-body">
    <form >
                               
                        <%
						  		
						  		String sr_no=request.getParameter("sr_no");
						  		
						  		String Pick_Up_Point=request.getParameter("Pick_Up_Point");
						  		String Destination=request.getParameter("Destination");
						  		String Ola_Rate=request.getParameter("Ola_Rate");
						  		String Uber_Rate=request.getParameter("Uber_Rate");
						  		String Red_Bus_Rate=request.getParameter("Red_Bus_Rate");
						  		String Go_Green_Bus=request.getParameter("Go_Green_Bus");
						  		if(sr_no!=null)
						  		{
						  		try
						  		{
						  		Connection con=ConnectDB.connect();
						  		
						  		PreparedStatement ps1 = con.prepareStatement("Update adminroute_tbl set sr_no=?,Pick_Up_Point=?,Destination=?,Ola_Rate=?,Uber_Rate=?,Red_Bus_Rate=?,Go_Green_Bus=? where sr_no="+sr_no);
						  		ps1.setString(1,sr_no);
						  		ps1.setString(2,Pick_Up_Point);
						  		ps1.setString(3,Destination);
						  		ps1.setString(4,Ola_Rate);
						  		ps1.setString(5,Uber_Rate);
						  		ps1.setString(6,Red_Bus_Rate);
						  		ps1.setString(7,Go_Green_Bus);

						  	    int i = ps1.executeUpdate();
						  	    if(i>0)
						  	    {
						  		   response.sendRedirect("ViewRoute.jsp");
						  	    }
						  	    else
						  	    {
						  		 response.sendRedirect("EditRoute.jsp");
						  	    }
						  	    
						  		}
						  		
						  		catch(Exception e)
						  	    {
						  		e.printStackTrace();
						  	    }
						  	    
						  		}
						  		
						  		
						  %>				   
					</div>
					</div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>