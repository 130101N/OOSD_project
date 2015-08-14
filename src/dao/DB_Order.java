
package dao;

import entity.Customer;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.text.SimpleDateFormat;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import util.DBManager;

/**
 *
 * @author Charuni
 */
public class DB_Order {
    private final DBManager dbm = new DBManager();

    public void insert(Customer customer) {

        SimpleDateFormat format = new SimpleDateFormat("yyy-MM-dd");

        String startDate = format.format(customer.getStartDate());
        String finishDate = format.format(customer.getFinishDate());

        String sql = "INSERT INTO orders (name,NIC,Email,LandNo,Mobile,Address,Category,SubCategory,CardID,Quantum,StartDate,FinishDate,Details) values (";
        sql = sql + "'" + customer.getName() + "' , '" + customer.getNIC() + "' , '" + customer.getEmail() + "' ,";
        sql = sql + "'" + customer.getLand() + "' , '" + customer.getMobile() + "' , '" + customer.getAddress() + "' ,";
        sql = sql + "'" + customer.getCategory() + "' , '" + customer.getSubCategory() + "' , '" + customer.getCardID() + "' ,'" + customer.getNofCards() + "' , '" + startDate + "' , '" + finishDate + "' , ";
        sql = sql + "'" + customer.getOtherDetails() + "' ";
        sql = sql + ")";

        Connection connection = null;

        try {
            System.out.println("Connecting to a selected database...");
            connection = dbm.connect();
            System.out.println("Connected database successfully");
            System.out.println(dbm.toString());
            Statement statement = connection.createStatement();
            int executeUpdate = statement.executeUpdate(sql);

        } catch (SQLException e) {
            e.printStackTrace();
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(DB_Order.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            try {
                connection.close();

            } catch (SQLException ex) {
                ex.printStackTrace();
            }
        }
    }

    public void delete(Integer id) {
    }

    public void update(Customer customer) {
        SimpleDateFormat format = new SimpleDateFormat("yyyy-MM-dd");
        String startDate = format.format(customer.getStartDate());
        String finishDate = format.format(customer.getFinishDate());
//        String sql = "update employee set name='"+employee.getName()+"',dob='"+employee.getDob()+"',assign='"+employee.getAssign()+"',address='"+employee.getAddress()+"',mobile='"+employee.getMobile()+"' where id='"+employee.getId()+"'";
        String sql = "UPDATE orders SET Name='"+customer.getName()+"',"
                + "NIC='"+customer.getNIC()+"',"
                + "Email='"+customer.getEmail()+"',"
                + "LandNO='"+customer.getLand()+"',"
                + "Mobile='"+customer.getMobile()+"',"
                + "Address='"+customer.getAddress()+"',"
//                + "Category="+customer.getCategory()+","
                + "SubCategory='"+customer.getSubCategory()+"',"
                + "CardID='"+customer.getCardID()+"',"
                + "Quantum="+customer.getNofCards()+","
                + "StartDate='" + startDate + "',"
                + "FinishDate='" + finishDate + "',"
                + "Details='"+customer.getOtherDetails()+"'"
                + " WHERE ID="+customer.getId()+"";
        System.out.println(sql);
        Connection connection = null;

        try {
            connection = dbm.connect();
            Statement statement = connection.createStatement();
            int executeUpdate = statement.executeUpdate(sql);

        } catch (SQLException e) {
            e.printStackTrace();
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(DB_Order.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            try {
                connection.close();

            } catch (SQLException ex) {
                ex.printStackTrace();
            }
        }
        
    }

    public List<Customer> selectAll() {
        return null;
    }
    public String selectAllCus(){
        return "SELECT * FROM orders";
    }
    public String selectCusByDate(String date){
        String sql = "SELECT * FROM orders where StartDate='"+date+"'";
        System.out.println(sql);
        return sql;
        
    }

    public Object[][] selectEmployees(String sql) {

        
        Object[][] obj = null;

        Connection connection = null;

        try {
            connection = dbm.connect();
            Statement statement = connection.createStatement();
            ResultSet rs = statement.executeQuery(sql);

            rs.last();
            int row = rs.getRow();

            rs.beforeFirst();

            obj = new Object[row][6];

            int curRow = 0;
            while (rs.next()) {
                obj[curRow][0] = rs.getInt("id");
                obj[curRow][1] = rs.getString("Name");
                obj[curRow][2] = rs.getString("NIC");
                obj[curRow][3] = rs.getString("Email");
                obj[curRow][4] = rs.getString("LandNo");
                obj[curRow][5] = rs.getString("Mobile");

                curRow++;
            }
        } catch (SQLException e) {
            e.printStackTrace();
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(DB_Order.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            try {
                connection.close();
            } catch (SQLException ex) {
                ex.printStackTrace();
            }
        }

        return obj;
    }

    public Customer getEmployeeByID(Integer id) {
        String sql = "SELECT * FROM orders where id=" + id;
        Customer emp = new Customer();
        Connection connection = null;

        try {
            connection = dbm.connect();
            Statement statement = connection.createStatement();
            ResultSet rs = statement.executeQuery(sql);

            while (rs.next()) {
                emp.setId(rs.getInt("id"));
                emp.setName(rs.getString("Name"));
                emp.setNIC(rs.getString("NIC"));
                emp.setEmail(rs.getString("Email"));
                emp.setLand(rs.getString("LandNo"));
                emp.setMobile(rs.getString("Mobile"));
                emp.setAddress(rs.getString("Address"));
                
               
//                emp.setGender(rs.getInt("gender"));
            }

        } catch (SQLException e) {
            e.printStackTrace();
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(DB_Order.class.getName()).log(Level.SEVERE, null, ex);
        } finally {
            try {
                connection.close();

            } catch (SQLException ex) {
                ex.printStackTrace();
            }
        }
        return emp;

    }
    
}
