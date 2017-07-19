<?php
//all records of students

function get_records($db){
    $query = 'select * from students';   
    return mysqli_query($db, $query);

}

//add record in students

function add_record($db){
    $name = filter_input(INPUT_POST, 'name');
    $email=filter_input(INPUT_POST, 'email');
    if(!$name){
       echo 'insert name'; 
    }else if(!$email){
        echo 'insert email';
     }else{
      $query="INSERT INTO students (`name`, `email`) VALUES ('".$name."','".$email."')";
      return mysqli_query($db, $query);
    }
}

//delete record id in students

function delete_record($db){
    $id=filter_input(INPUT_POST, 'id');
    $query="DELETE FROM students WHERE students.id = ".$id;
    return mysqli_query($db, $query);
}

//
function validate($result){
    if(!$result){
       echo 'problem:' . mysqli_connect_errno() . ' ' . mysqli_connect_error();
    }else{
       echo 'ok';
    }
 
}