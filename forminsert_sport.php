<?php session_start(); ?>
<?php

if (!$_SESSION["UserID"]) {  //check session

    Header("Location: form.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else { ?>
    <?php include 'head.php'; ?>

    <body>
        <div class="container-xxl position-relative bg-white d-flex p-0">
            <!-- Spinner Start -->
            <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <!-- Spinner End -->


            <!-- Sidebar Start -->
            <div class="sidebar pe-4 pb-3">
                <nav class="navbar bg-light navbar-light">
                    <a href="index.html" class="navbar-brand mx-4 mb-3">
                        <h3 class="text-primary">ระบบยืม-คืน</h3>
                    </a>
                    <div class="d-flex align-items-center ms-4 mb-4">
                        <div class="position-relative">
                            <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0"><?php echo $_SESSION["User"]; ?></h6>
                            <span>Admin</span>
                        </div>
                    </div>
                    <div class="navbar-nav w-100">
                        <a href="index.php" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>หน้าหลัก</a>
                        <a href="typesport.php" class="nav-item nav-link active"><i class="fa fa-grip-horizontal me-2"></i>หมวดหมู่</a>
                        <a href="sport.php" class="nav-item nav-link "><i class="fa fa-baseball-ball me-2"></i>อุปกรณ์กีฬา</a>
                        <a href="user.php" class="nav-item nav-link "><i class="fa fa-user-alt me-2"></i>สมาชิก</a>
                        <a href="borrow.php" class="nav-item nav-link "><i class="fa fa-user-edit me-2"></i>ยืม-คืน</a>
                        <a href="showborrow.php" class="nav-item nav-link "><i class="fa fa-user-check  me-2"></i>ประวัติการยืม</a>

                    </div>
                </nav>
            </div>
            <!-- Sidebar End -->

            <?php include 'navbar.php'; ?>




            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">รายงานอุปกรณ์กีฬา</h6>
                        <form action="insert_sport.php" method="post">
                            <button class='btn btn-sm btn-success'>บันทึก</button></a>
                    </div>
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">เพิ่มอุปกรณ์กีฬา</h6>
                            <div class="form-floating mb-3">
                                <input type="text" name="sport_name" class="form-control" id="floatingInput">
                                <label for="floatingInput">ชื่ออุปกรณ์กีฬา</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="typesport_id" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                    <option  selected>กรุณาเลือกประเภทอุปกรณ์กีฬา</option>
                                    <?php include 'connection.php';
                                    $sql = "SELECT * FROM `type_sport` where status = 1";
                                    $result = $con->query($sql);
                                    $num = 0;
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while ($row = $result->fetch_assoc()) {
                                            // $id = ; 
                                    ?>
                                            <option value="<?php echo $row['typesport_id'] ?>"><?php echo $row['name'] ?></option>

                                    <?php  }
                                    } else {
                                        echo "0 results";
                                    }
                                    $con->close(); ?>
                                </select>
                                <label for="floatingSelect">ประเภทอุปกรณ์กีฬา </label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="balance" class="form-control" id="floatingInput">
                                <label for="floatingInput">ยอดคงเหลือ</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="number" class="form-control" id="floatingInput">
                                <label for="floatingInput">จำนวนทั้งหมด</label>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


        <?php include 'footer.php';
    } ?>