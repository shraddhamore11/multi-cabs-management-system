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
                <a href="ViewStaffBooking.jsp" class="nav-item nav-link">My Bookings</a>
                
               
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
    
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-12.png);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">My Bookings</h1>
               
            </div>
        </div>
    </div>
    
    <form>
    
                            
    <!-- Page Header End -->
    <div class="container-xxl py-5">
        <div class="container">     
                </div>
   <table class="table"border="1">
						 <div class="row g-3">
                               
                                <div class="col-md-12">
                                <label><b>Enter Your Email :</b> </label>   
                                    <div class="form-floating">
                                        <input type="email" class="form-control" name="Email" placeholder="Email">
                                        
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit"><font color="white">Submit</font></button>
                                </div>
						 </div>
						
						   <tbody>
						  <%
						  	try
						  	{
						  		
							   
						  		
						  		
						  		String Email=request.getParameter("Email");
						  		Connection con = ConnectDB.connect();
						  	    PreparedStatement ps = con.prepareStatement("select * from booking_tbl where Email=?");
						  		ps.setString(1, Email);
						  		
						  		ResultSet rs = ps.executeQuery(); 
						  		while(rs.next())
						  		{
						  			
						  		%> <thead>
						    <tr>
						      <th scope="col">SR.NO</th>
						      <th scope="col">Pick_Up_Point</th>
						      <th scope="col">Destination</th>
						      <th scope="col">Email</th>
						      <th scope="col">Name</th>
						      
						      <th scope="col">Mob</th>
						      <th scope="col">Cab_Name</th>
						      <th scope="col">Rate</th>
						      <th scope="col">Staff_Email</th>
						      <th scope="col">Date</th>
						       <th scope="col">Action</th>
						    </tr>
						  </thead>
						  
						  			<tr>
								      <th scope="row"><%=rs.getString(1)%></th>
								      <td><%=rs.getString(2)%></td>
								      <td><%=rs.getString(3)%></td>
								      <td><%=rs.getString(4)%></td>
								      <td><%=rs.getString(5)%></td>
								      <td><%=rs.getString(6)%></td>
								      <td><%=rs.getString(7)%></td>
								      <td><%=rs.getString(8)%></td>
								      <td><%=rs.getString(9)%></td>
								      <td><%=rs.getString(10)%></td>
								      <td><a href="cancelbooking.jsp?sr_no=<%=rs.getString(1)%>">Cancel</a></td>
								    </tr>
								<%
						  		}
						  	}
						  	catch(Exception e)
						  	{
						  		e.printStackTrace();
						  	}
						  %>
					</tbody>					
</table>
</div>

   </form>
   
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