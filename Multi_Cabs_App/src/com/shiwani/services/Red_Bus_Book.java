package com.shiwani.services;

import java.io.IOException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.shiwani.dbcon.ConnectDB;

/**
 * Servlet implementation class Red_Bus_Book
 */
public class Red_Bus_Book extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public Red_Bus_Book() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
		String Pick_Up_Point,Destination;
		String Cab_Name = null;
		String Mob = null;
		String Name = null;
		String Staff_Email = null;
		String Rate=null;
	     Pick_Up_Point =request.getParameter("Pick_Up_Point");
		 Destination =request.getParameter("Destination");
		 Cab_Name =request.getParameter("Cab_Name");
		String Date =request.getParameter("Date");
		String Email =request.getParameter("Email");
		
try
		
		{
			Connection con = ConnectDB.connect();
			PreparedStatement ps2=con.prepareStatement("select Red_Bus_Rate from adminroute_tbl where Pick_Up_Point=? and Destination=?");
			ps2.setString(1,Pick_Up_Point);
			ps2.setString(2,Destination);
			ResultSet rs=ps2.executeQuery();
			while(rs.next())
			{
			Rate  = rs.getString("Red_Bus_Rate");
			}
			
			PreparedStatement ps3=con.prepareStatement("select Name,Mob from user_info_tbl where Email=?");		
			ps3.setString(1,Email);
			
			ResultSet rs1=ps3.executeQuery();
			while(rs1.next())
			{
			Name  = rs1.getString("Name");
			Mob  = rs1.getString("Mob");
			}
			
			PreparedStatement ps4=con.prepareStatement("select Staff_Email from staff_info_tbl where Cab_Name=?");
			ps4.setString(1,Cab_Name);
			ResultSet rs2=ps4.executeQuery();
			while(rs2.next())
			{
			
			 Staff_Email = rs2.getString("Staff_Email");
			}
			
			
			PreparedStatement ps1=con.prepareStatement("insert into booking_tbl values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			ps1.setInt(1, 0);
			ps1.setString(2, Pick_Up_Point);
			ps1.setString(3, Destination);
			ps1.setString(4, Email);
			ps1.setString(5, Name);
			ps1.setString(6, Mob);
			ps1.setString(7, Cab_Name);
			ps1.setString(8, Rate);
			ps1.setString(9, Staff_Email);
			ps1.setString(10, Date);
			int i = ps1.executeUpdate();
			if(i>0)
			{
				response.sendRedirect("Payment.html");
				
			}
			else
			{
				response.sendRedirect("Red_Bus_Booking.html");
			}
		}
		catch(Exception e)
		{
			e.printStackTrace();
		}
	}

	}


