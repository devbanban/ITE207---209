<?php
//ไฟล์เชื่อมต่อฐานข้อมูล
require_once 'config/condb.php';
//คิวรี่ข้อมูลมาแสดงในตาราง
$stmt = $condb->prepare("SELECT * FROM tbl_member");
$stmt->execute();
$result = $stmt->fetchAll();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Basic CRUD by devbanban.com 2024</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

 <!-- start menu -->
   <?php include 'menu.php';?>
    <!-- end menu -->

    <!-- start member -->
    <div class="container">
      <div class="row">
        <div class="col-sm-12"> <br>
          <h3>รายการสมาชิก <a href="add.php" class="btn btn-info">+เพิ่มข้อมูล</a> </h3>

          <table class="table table-striped  table-hover table-responsive table-bordered">
            <thead>
              <tr class="table-danger">
                <th width="5%">ลำดับ</th>
                <th width="50%">ชื่อ</th>
                <th width="15%">เบอร์โทร</th>
                <th width="20%">อีเมล</th>
                <th width="5%">แก้ไข</th>
                <th width="5%">ลบ</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($result as $row) { ?>
              <tr>
                <td><?=$row['member_id'];?></td>
                <td><?=$row['member_name'];?></td>
                <td>-</td>
                <td>-</td>
                <td><a href="edit.php?id=<?=$row['member_id'];?>&act=edit" class="btn btn-warning btn-sm">แก้ไข</a></td>
                <td><a href="delete.php?id=<?=$row['member_id'];?>&act=delete" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <hr>
          * แยก  header & footer & include  <br>
          * เปลี่ยนการลบจาก method get to method post ถ้าเวลาเหลือ 
        </div>
      </div>
    </div>
    <!-- end member -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>