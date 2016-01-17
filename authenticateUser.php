<?php
    include "header.php";
    @$user = $_POST['userId'];
    @$password = md5($_POST['password']);
    @$selection = $_POST['select'];
    if ($selection == "Driver"){
        $query =mysql_query("SELECT * from `driver` where driver_id='$user'");
        $table_password = "";
        @$exist = mysql_num_rows($query);
        if($exist > 0){ // if there are returning rows
            while($row = mysql_fetch_array($query)){ // display all rows  from query
                $table_password = $row['password'];
                @$table_name= $raw['name'];
            }
            if($password == $table_password){
                    $_SESSION['userId'] = $user;
                    $_SESSION['name'] = $table_name;
                    Print '<script>alert("Successfully Logged In!");</script>'; // prompts user
                    header("location:homeDriver.php"); // redirects the user to authenticated home page

            }
            else{
                    Print '<script>alert("Incorrect Password!");</script>'; // prompts user
                    Print '<script>window.location.assign("index.php");</script>'; // redirects to the login page
            }
        }
        else{
                Print '<script>alert("Incorrect UserName");</script>'; // prompts user
                Print '<script>window.location.assign("index.php");</script>'; // redirects to the login page
        }
    }
    else{
        $query =mysql_query("SELECT * from `passenger` where name='$user'");
        $table_password = "";
        @$exist = mysql_num_rows($query);
        if($exist > 0){ // if there are returning rows
            while($row = mysql_fetch_array($query)){ // display all rows  from query
                $table_password = $row['password'];
                $table_id = $row['contact_no'];
            }
            if($password == $table_password){
                    $_SESSION['userId'] = $table_id;
                    $_SESSION['name'] = $user;
                    Print '<script>alert("Successfully Logged In!");</script>'; // prompts user
                    header("location:passengerProfile.php"); // redirects the user to authenticated home page

            }
            else{
                    Print '<script>alert("Incorrect Password!");</script>'; // prompts user
                    Print '<script>window.location.assign("index.php");</script>'; // redirects to the login page
            }
        }
        else{
                Print '<script>alert("Incorrect UserName");</script>'; // prompts user
                Print '<script>window.location.assign("index.php");</script>'; // redirects to the login page
        }
    }
?>
