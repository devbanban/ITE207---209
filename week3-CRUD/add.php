<?php
//ถ้ามีค่าส่งมาจากฟอร์ม
if(isset($_POST['member_name']) && isset($_POST['action']) && $_POST['action']=='add'){

// echo '<pre>';
// print_r($_POST);
// exit();

//ไฟล์เชื่อมต่อฐานข้อมูล
require_once 'config/condb.php'; 

//trigger exception in a "try" block
try { 

    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $member_name = $_POST['member_name'];

    //sql insert
    $stmt = $condb->prepare("INSERT INTO tbl_member

    (
    member_name
    )

    VALUES 
    (
    :member_name
    )


    ");

    //bindparam STR // INT
    $stmt->bindParam(':member_name', $member_name, PDO::PARAM_STR);
    

    //ถ้า stmt ทำงานถูกต้อง 
     if($stmt->execute()){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "เพิ่มข้อมูลสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    } //if

} //catch exception
catch(Exception $e) {
  //echo 'Message: ' .$e->getMessage();
  //exit;
   echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  text: "กรุณาติดต่อผู้ดูแลระบบ",
                  type: "error"
              }, function() {
                  window.location = "index.php";
              });
            }, 1000);
        </script>';
  }  //catch
} //isset

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Basic CRUD by devbanban.com 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- sweet alert -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  </head>

  <body>
 <!-- start menu -->
 <?php include 'menu.php';?>
    <!-- end menu -->

    
    <!-- start member -->
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-7">
          <h3>ฟอร์มเพิ่มข้อมูลสมาชิก</h3>

          <form action="" method="post">
            <div class="row mb-2">
              <label class="col-sm-2 col-form-label">ชื่อสมาชิก</label>
              <div class="col-sm-7">
                <input type="text" name="member_name" class="form-control" required placeholder="ชื่อสมาชิก">
              </div>
            </div>

           

            <div class="row mb-2">
              <label class="col-sm-2"></label>
              <div class="col-sm-3">
                <button type="submit" name="action" value="add" class="btn btn-primary"> เพิ่มข้อมูล </button>
              </div>
            </div>
          </form>

         
        </div>
      </div>
    </div>
    <!-- end member -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


