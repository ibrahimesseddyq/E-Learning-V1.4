<!DOCTYPE html>
    <?php 
    $title = 'SIGN IN';
    include 'head.php';   
    include 'connexion.php';
    $name=@$_POST['name'];
    $email=@$_POST['email'];
    $password=@$_POST['password'];
    $cpassword=@$_POST['cpassword'];
    $sql = "SELECT * FROM comptes WHERE email='$email'";
          if(isset($_POST['submit'])){
        if(!empty($name) && !empty($email) && !empty($password) && !empty($cpassword)){
            if($password === $cpassword){
                $result = mysqli_query($conn,$sql);
                if($result->num_rows<1){
                    $sql2="INSERT INTO `comptes`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
                    if(mysqli_query($conn,$sql2)){
                        echo "";
                        header('location: index.php');
                    }else{
                        header("location: signup.php?email=exist");
                    }
                }
            }else{
                header("location: signup.php?password=notmatch");
            }
        }else{
            header("location: signup.php?fields=empty");
        }
      }
    ?>

    <body class="for-bg">
    <section
      class="container-fluid d-flex justify-content-center align-items-center  min-vh-100">
      <section class="rounded p-4 col-lg-4 col-md-6 col-sm-7 bg-white shadow px-5">

        <section class="row">
          <form class="form-container" method="POST"  >
            <h1 class="ps-3 ms-4 fw-bolder">E-classe</h1>
            <div class="text-center mt-4">
              <h2 class="text-uppercase" style="font-size: 17px">SIGN UP</h2>
              <p class="text-secondary" style="font-size: 15px">It's quick and easy. </p>
            </div>
           
            <div id="alert"class="alert alert-danger"></div>

            <div class="mb-1">
              <label  class="form-label" style="font-size: 13px">Enter your name</label> <br>
              <input type="name" id="name" name="name" class="form-control py-1" placeholder="Enter your name">
            </div>
            

            <div class="mb-4">
              <label class="form-label mt-1" style="font-size: 13px" >Enter your email</label> <br>
              <input type="email" id="email" placeholder="Enter Your email" class="form-control py-1" name="email">

                <div class="mb-2">
              <label class="form-label mt-3" style="font-size: 13px" >Enter your Password</label> <br>
              <input type="password" id="pass" placeholder="Enter a password" class="form-control py-1" name="password">


              <div class="mb-2">
              <label class="form-label mt-3" style="font-size: 13px" >Confirm your Password</label> <br>
              <input type="password" id="cpass" placeholder="confirm your password" class="form-control py-1" name="cpassword"> 

            <input
              type="submit" id="submit" class="btn btn-info btn-lg mb-3 mt-3 w-100 text-white p-2" value="SIGN UP" name="submit">
                </div>


            <div class="d-flex flex-md-column justify-content-center align-items-center">
              <p class="text-black">Vous avez déja un compte?</p>
              <a class="text-decoration-none text-center fs-6 mt-3 text-info" href="index.php">Connectez vous</a>
            </div>

            </form>
          </section>
          <?php
          ?>
      </section>
    </section>    
    <script src="./assets/js/signup.js"></script>
</body>
</html>