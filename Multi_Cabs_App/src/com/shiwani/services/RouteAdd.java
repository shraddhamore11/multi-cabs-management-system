package com.shiwani.services;

import java.io.IOException;
import java.sql.Connection;
import java.sql.PreparedStatement;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.shiwani.dbcon.ConnectDB;

/**
 * Servlet implementation class StaffAdd
 */
public class RouteAdd extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public RouteAdd() {
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
		String Pick_Up_Point = request.getParameter("Pick_Up_Point");
		String Destination = request.getParameter("Destination");
		String Ola_Rate = request.getParameter("Ola_Rate");
		
		String Uber_Rate = request.getParameter("Uber_Rate");
		String Red_Bus_Rate = request.getParameter("Red_Bus_Rate");
		String Go_Green_Bus = request.getParameter("Go_Green_Bus");
		
		
		try
		{
			Connection con=ConnectDB.connect();
			PreparedStatement ps1=con.prepareStatement("insert into adminroute_tbl values (?, ?, ?, ?, ?, ?, ?)");
			ps1.setInt(1, 0);
			ps1.setString(2, Pick_Up_Point);
			ps1.setString(3, Destination);
			ps1.setString(4, Ola_Rate);
			ps1.setString(4, Ola_Rate);
			ps1.setString(5, Uber_Rate);
			ps1.setString(6, Red_Bus_Rate);
			ps1.setString(7, Go_Green_Bus);
			
			
			int i= ps1.executeUpdate();
			if(i>0)
			{
				response.sendRedirect("ViewRoute.jsp");
			}
			else
			{
				response.sendRedirect("AddRoute.html");
			}
			
		}
		catch(Exception e)
		{
			e.printStackTrace();
		}
		
	}

	}


