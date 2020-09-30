<?php 
    session_start();
    include('server.php');//เรียกไฟล์เชื่อมDatabase

    $errors = array();

    //เมื่อclick register button
    if(isset($_POST['reg_user'])){
        //รับค่าจากinputที่กรอกมาใส่ตัวแปร
        $username = mysqli_real_escape_string($conn, $_POST['username']);//'username' เอามาจาก name ใน input หน้า register
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        //check ว่า ข้อมูลที่ส่งมาเป็นชค่าเปล่ารึเปล่า
        if(empty($username)) {
          array_push($errors, "Username is required");
        }
        if(empty($email)) {
          array_push($errors, "Email is required");
        }
        if(empty($password_1)) {
          array_push($errors, "Password is required");
        }
        if(empty($password_2)) {
          array_push($errors, "The two password is not match");
        }
        
        $user_check_query ="SELECT * FROM user WHERE username = '$username' OR email = '$email' ";
        //ดึงข้อมูล
        $query = mysqli_query($conn, $user_check_query);
        //fetchข้อมูลออกมา
        $result = mysqli_fetch_assoc($query);

        if ($result) { // ถ้ามี user อยู่ในระบบ
            if ($result['username'] === $username) {
                array_push($errors, "Username is already");
            }
            if ($result['email']===$email) {
              array_push($errors, "Email is already");
            }
        }

        //count errors
        if (count($errors) == 0) {
            $password = md5($password_1);

            $sql = "INSERT INTO user (username, email, password) VALUES ('$username','$email','$password')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');

        } else {
            array_push($errors, "Username or email is already");
            $_SESSION['error'] = "Username or email is already";
            header("location: register.php");
        }


    }

?>