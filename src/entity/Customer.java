/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package entity;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.util.Date;
import java.util.Objects;
import javax.swing.JFrame;
import javax.swing.JOptionPane;
import org.apache.commons.lang3.time.DateUtils;

/**
 *
 * @author Charuni
 */
public class Customer {
    private  Integer   id;
    private  String    name;
    private  String    nic;
    private  String    email;
    private  String    address;
    private  String    landNo;
    private  String    mobile;
    private  String    category;
    private  String    subCategory;
    private  String       cardID;
    private  int       nofCards;
    private  Date     startDate;
    private  Date     finishDate;
    private  String    details;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

        public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }
    
    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }
    
    public String getNIC() {
        return nic;
    }

    public void setNIC(String nic) {
        this.nic = nic;
    }
    
    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public String getMobile() {
        return mobile;
    }

    public void setMobile(String mobile) {
        this.mobile = mobile;
    }

    public String getLand() {
        return landNo;
    }

    public void setLand(String landNo) {
        this.landNo = landNo;
    }

    public Date getStartDate() {
        return startDate;
    }

    public void setStartDate(Date startDate) {
        if(startDate == null){
            Date date = new Date();
            this.startDate = date;
            LocalDate futureDate = LocalDate.now().plusMonths(2);
        
       // display time and date using toString()
       System.out.println(date.toString());
            System.out.println(futureDate);
        }
        else{
        this.startDate = startDate;}
    }
    
    public Date getFinishDate() {
        return finishDate;
    }

    public void setFinishDate(Date finishDate) {
        if(finishDate == null){
            
            this.finishDate = DateUtils.addMonths(new Date(), 2);
            
           
        
      
//            System.out.println(finishDate);
        }
        else{
        this.finishDate = finishDate;}
    }
    
    public String getCategory() {
        return category;
    }

    public void setCategory(String category) {
        this.category = category;
    }
    public String getSubCategory() {
        return subCategory;
    }

    public void setSubCategory(String subCategory) {
        this.subCategory = subCategory;
    }

    public void setCardID(String cardID){
        this.cardID = cardID;
    }
    public String getCardID(){
        return cardID;
    }
    
    public void setNofCards(Integer nofCards){
        this.nofCards = nofCards;
    }
    public Integer getNofCards(){
        return nofCards;
    }
    public String getOtherDetails() {
        return details;
    }

    public void setOtherDetails(String details) {
        this.details = details;
    }

    @Override
    public String toString() {
        return name ;
    }

    @Override
    public int hashCode() {
        int hash = 5;
        hash = 97 * hash + Objects.hashCode(this.id);
        return this.id;
    }

    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final Customer other = (Customer) obj;
        if (!Objects.equals(this.id, other.id)) {
            return false;
        }
        return true;
    }

    
}
