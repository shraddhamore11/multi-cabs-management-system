package com.shiwani.dbcon;

import java.sql.*;

public class ConnectDB
{
	public static Connection con=null;
	public static Connection connect()
	{
		if(con==null)  
		{
			try
			{
				Class.forName("com.mysql.cj.jdbc.Driver");
				con=DriverManager.getConnection("jdbc:mysql://localhost:4306/multi_cabs_db", "root", "");
			}
			catch(Exception e)
			{
				e.printStackTrace();
			}
		}
		return con;
	}
}
