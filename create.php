<?php
    //Include config file
    require_once("config.php");

    // Define variables and initialize with empty values 
    $name = $address = $salary = "";                                                  
    
    # Processing form data when form is submitted 
    if($_SERVER["Request_METHOD"] == "POST"){
        // validate name 
        $input_name = trim($_POST["name"]);
        if(empty($input_name)){
            $name_err = "please enter a name";
        }elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" =>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
            $name_err = "Please enter a valid name.";
        }else{
            $name = $input_name;
        }
    }

    #validate address 
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "please enter an address";
    }else{
        $address = $input_address;
    }

    #validate salary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "please enter the salary amount";
    }elseif(!ctype_digit($input_address)){
        $salary_err = "please enter a positive integer value.";
    }else{
        $salary = $input_salary;
    }

    //check input errors before inserting into the database.
    if(empty($name_err) && empty($address_err) && empty($salary_err)){
        #prepare to insert statement
        $sql = "INSERT INTO employee_tbl (name, address, salary) VALUES (?, ?, ?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters 
            // mysqli_stmt_bin_param($stmt, "sss", $param_name, $param_address, $param_salary);

            // set parameters
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;

             
        }
    }



?>