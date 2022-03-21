<?php session_start(); ?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="./assets/css/addstd.css">
</head>
<html lang="en">

<?php 
include_once 'connexion.php';
$result = mysqli_query($conn,"SELECT * FROM pstudents");
?>

<?php 
          $title = 'Student';

          include 'head.php';
      
   ?>


<body>
<div id="bg_model" class=""></div>

  <!-- start side bar -->
  <?php include 'sidebar.php' ;?>   
                 <!-- end side bar -->
<div class="col overflow-auto">
            <!-- start nav bar  -->
            <?php include 'navbar.php' ;?>
         <!-- end nav bar -->
         
    
     <div class="bg-light py-2  ">
            <div class="d-flex align-items-center  justify-content-center justify-content-sm-between  mt-3">
                <h5 class=" fw-bolder d-none d-sm-block mx-3">student list</h5>
                <div class="d-flex align-items-center">
                    <i class="far fs-6 fa-sort me-3 text-info d-sm-block"></i>
                    <a id="newstudent" class="add btn btn-info text text-white text-uppercase mx-4 py-2 ">
                        add new student
                    </a>
                </div>
            </div>
        <hr>


        <main class="row">
            <div class="container ">
                <div class="table-responsive-sm table-responsive-md px-4">
                <table class="table align-middle table-borderless ">
                    <thead>
                    <tr class="text-capitalize  ">
                    <th scope="col" class="text-muted h6 ">image</th>
                        <th scope="col" class="text-muted h6 ">name</th>
                        <th scope="col" class="d-none d-sm-table-cell text-muted h6">email</th>
                        <th scope="col" class="d-none d-sm-table-cell text-muted h6">phone</th>
                        <th scope="col" class="text-muted h6">enroll number</th>
                        <th scope="col" class="d-none d-sm-table-cell text-muted h6">date of addmision</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                     
                      $i=0;
                      while($row = mysqli_fetch_array($result)) {
                      ?>
                    
                     <tr class='bg-white'>
                          <td><img alt=student-picture src='' class='rounded-circle' style= 'width:60px; height:60px;'></td>
                          <td><?php echo $row["name"]?></td>
                          <td><?php echo $row["email"]?></td>                          
                          <td><?php echo $row["phone"]?></td>                          
                          <td><?php echo $row["enroll_number"]?></td>
                          <td><?php echo $row["date_of_addmision"]?></td>
                          <td>                     
                               <a href="Update_student.php?id=<?php echo $row["id"]; ?>"><i class="fal fa-pen fs-6 text-info mx-2"></a></i>
                               <a href="delete-process.php?id=<?php echo $row["id"]; ?>"><i class="fal fa-trash fs-6 mx-2 text-info"></i></a> 
                          </td> 

                          
                      </tr>
                      <?php
                       $i++;
                      }
                     ?>
                    </tbody>
                </table>
                </div>
            </div>    

           
            </form>
            </div>
        </main>
</div>
</div>
<?php
       $err_name='';
       $err_email='';
       $err_phone='';
       $err_enroll_number='';
       $err_date_of_addmision='';
?>
<div id="model" class="addstd_model hide_model ">
<div class="container-fluid text-black py-4 ">
            <h2 class="text-center fw-bold">ADD a New Student</h2>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center ">
            <!-- il faut ajouter l'action pour effectuer -->
            <form method="POST" action="insert.php" class="container w-50 bg-white px-4 rounded py-4">  
            <div class="form-group">
                <label for="">Entrer Votre Photo :</label> 
                <input type="file" class="form-control" alt="profile picture"  name="image">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <br>
                <span class="text-danger"> <?php echo $err_name ?> </span>
                <input type="text" class="form-control" name="name" id="formGroupExampleInput">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Email</label> <br>
                <span class="text-danger"> <?php echo $err_email?> </span>
                <input type="text" class="form-control  " name="email" id="formGroupExampleInput2">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Phone</label> <br>
                <span class="text-danger"> <?php echo $err_phone ?> </span>
                <input type="text" class="form-control  " name="phone" id="formGroupExampleInput2">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Enroll Number</label> <br>
                <span class="text-danger"> <?php echo $err_enroll_number?> </span>
                <input type="text" class="form-control " name="enroll_number" id="formGroupExampleInput2">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Date Of Addmision</label> <br>
                <span class="text-danger"> <?php echo $err_date_of_addmision?> </span>
                <input type="date" class="form-control " name="date_of_addmision" id="formGroupExampleInput2">
            </div>
            <div class="col-auto text-center ">
                <input type="submit" class="btn btn-info text-white mt-4  px-5 py-2 " id="savestd" name="save"  value="save"></input>

                </div>
                </div>
<script src="./assets/js/add_student.js"></script>

</html>