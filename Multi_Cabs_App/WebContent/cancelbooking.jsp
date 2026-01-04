<%@page import  ="com.shiwani.dbcon.*" %>
<%@page import  ="java.sql.*" %>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Cancel Booking</title>
</head>
<body>
<%
String sr_no = request.getParameter("sr_no");

try
{
	Connection con = ConnectDB.connect();
	PreparedStatement ps1 = con.prepareStatement("delete from booking_tbl where sr_no=?");
	ps1.setString(1, sr_no);
	int i = ps1.executeUpdate();
	{
		response.sendRedirect("OwnBooking.jsp");
	}
}
catch(Exception e)
{
	e.printStackTrace();
}

%>
</body>
</html>