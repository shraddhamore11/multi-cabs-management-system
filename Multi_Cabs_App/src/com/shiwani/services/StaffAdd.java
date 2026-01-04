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
public class StaffAdd extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public StaffAdd() {
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
		String Cab_Name = request.getParameter("Cab_Name");
		String Staff_Name = request.getParameter("Staff_Name");
		String Staff_Email = request.getParameter("Staff_Email");
		String Mob = request.getParameter("Mob");
		String Pass = request.getParameter("Pass");
		
		try
		{
			Connection con=ConnectDB.connect();
			PreparedStatement ps1=con.prepareStatement("insert into staff_info_tbl values (?, ?, ?, ?, ?, ?)");
			ps1.setInt(1, 0);
			ps1.setString(2, Cab_Name);
			ps1.setString(3, Staff_Name);
			ps1.setString(4, Staff_Email);
			ps1.setString(5, Mob);
			ps1.setString(6, Pass);
			
			int i= ps1.executeUpdate();
			if(i>0)
			{
				response.sendRedirect("ViewStaff.jsp");
			}
			else
			{
				response.sendRedirect("AddStaff.html");
			}
			
		}
		catch(Exception e)
		{
			e.printStackTrace();
		}
		
	}

	}


