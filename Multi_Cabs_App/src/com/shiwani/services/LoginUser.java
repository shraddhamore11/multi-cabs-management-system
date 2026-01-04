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
 * Servlet implementation class LoginUser
 */
public class LoginUser extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public LoginUser() {
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
Connection con=ConnectDB.connect();	
		
		String ueid=request.getParameter("Email");
		String upass=request.getParameter("Pass");
		try
		{
		PreparedStatement ps2=con.prepareStatement("select * from user_info_tbl where Email=? and Pass=? ");
		ps2.setString(1,ueid);
		ps2.setString(2,upass);
		ResultSet rs=ps2.executeQuery();
		if(rs.next())
		{
			//System.out.println("Login Successfully...!!!");
			response.sendRedirect("SearchCab.jsp");
		}
		
		else
		{
			//System.out.println("Login Failed...!!");
			response.sendRedirect("UserLogin.html");
		}
		
		}
		catch(Exception e)
		{
			e.printStackTrace();
		}
			
	}
	}


