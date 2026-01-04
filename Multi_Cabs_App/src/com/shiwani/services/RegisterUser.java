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
 * Servlet implementation class RegisterUser
 */
public class RegisterUser extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public RegisterUser() {
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
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException 
	{
		// TODO Auto-generated method stub
		doGet(request, response);
		String Name=request.getParameter("Name");
		String Email=request.getParameter("Email");
		String Pass=request.getParameter("Pass");
		String Mob=request.getParameter("Mob");
		String City=request.getParameter("City");
		
		try
		{
			Connection con=ConnectDB.connect();
			PreparedStatement ps6=con.prepareStatement("select * from user_info_tbl where Email= ? ");
		    ps6.setString(1,Email);
		    ResultSet rs=ps6.executeQuery();
			PreparedStatement ps1=con.prepareStatement("insert into user_info_tbl values (?, ?, ?, ?, ?, ?)");
			ps1.setInt(1, 0);
			ps1.setString(2, Name);
			ps1.setString(3, Email);
			ps1.setString(4, Pass);
			ps1.setString(5, Mob);
			ps1.setString(6, City);
			
			
			if(rs.next())
			{
				response.sendRedirect("UserRegister.html");
				
			}
			else
			{
				int i= ps1.executeUpdate();
				response.sendRedirect("UserLogin.html");
			}
			
		}
		catch(Exception e)
		{
			e.printStackTrace();
		}
		
	}

	}


