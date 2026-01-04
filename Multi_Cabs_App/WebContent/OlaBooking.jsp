<%@page import="com.shiwani.dbcon.*" %>
<%@page import="java.sql.*" %>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<body>
<!DOCTYPE html>
<html lang="en">

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
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

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
         
        <div class="navbar-nav ms-auto p-4 p-lg-0">
          <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small><b>+012 345 6789</b></small>
                </div>
                <a href="OwnBooking.jsp" class="nav-item nav-link"><b>My Bookings</b></a>
                
               <a href="index.html" class="nav-item nav-link"><b>Logout</b></a>
            </div>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
       
    </nav>
    <!-- Navbar End -->
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
       
    </nav>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-3.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-5 animated slideInDown">Book your Cab</h1>
               
            </div>
        </div>
    </div>
    <!-- Page Header End -->


   
    <div class="container-xxl py-5">
        <div class="container">     
                </div>
                <div class="form-body">
                        <form action="Ola_Book"method="post">
				
					<%
					try
					{
						Connection con = ConnectDB.connect();
					
					String sr_no=request.getParameter("sr_no");
					PreparedStatement ps1 = con.prepareStatement("select Pick_Up_Point,Destination from adminroute_tbl where sr_no="+sr_no);
					ResultSet rs=ps1.executeQuery();
					while(rs.next())
					{
					%>

					<div class="col-md-12">
					<h3><b>Boarding :</b></h3>
					<label><b>Location :</b></label>
					<div class="form-floating">
						<input class="form-control" type="text" name="Pick_Up_Point"value=<%=rs.getString("Pick_Up_Point") %> >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						
						</span>
					</div>
					</div>

					
					<div class="col-md-12">
					<h3><b>Dropping :</b></h3>
					<label><b>Location :</b></label>
					<div class="form-floating">
						<input class="form-control" type="text" name="Destination"value=<%=rs.getString("Destination")%> >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
					
						</span>
					</div>
					</div>
					<%
					}
					String Staff_Email="darshan@gmail.com";
					PreparedStatement ps2=con.prepareStatement("select Cab_Name from staff_info_tbl where Staff_Email=?");
					ps2.setString(1,Staff_Email);
					ResultSet rs1=ps2.executeQuery();
					while(rs1.next())
					{
					%>
					<div class="col-md-12">
					
					<label><b>Cab_Name :</b></label>
					<div class="form-floating">
						<input class="form-control" type="text" name="Cab_Name"value=<%=rs1.getString("Cab_Name") %>>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
					
						</span>
					</div>
					</div>
					<%
					}
					%>
					<div class="col-md-12">
					
					<label><b>Enter Date :</b></label>
					<div class="form-floating">
						<input class="form-control" type="date" name="Date" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
					
						</span>
					</div>
					</div>
					
					<div class="col-md-12">
					<h3><b>Contact Details :</b></h3>
					<label><b>Your ticket and bus details will be sent here </b></label>
					<h1></h1>
					<label><b>Email Id: </b></label>
					<div class="form-floating">
						<input class="form-control" type="email" name="Email" >
						<span class="focus-input100"></span>
						<span class="symbol-input100">
					
						</span>
					</div>
					</div>
					
					
					
					<div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit"><font color="white">proceed</font></button>
                                </div>

					 <%
					
					}
					catch(Exception e)
					{
						e.printStackTrace();
					}
					
					%>

					
				</form>
				
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
