<?php session_start(); ?>
<?php

if (!$_SESSION["UserID"]) {  //check session

    Header("Location: signin.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else { ?>
    <?php include 'head.php';
    include 'connection.php'; ?>

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
                        <h3 class="text-primary">ระบบยืม-คืน </h3>
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
                        <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>หน้าหลัก</a>
                        <a href="typesport.php" class="nav-item nav-link "><i class="fa fa-grip-horizontal me-2"></i>หมวดหมู่</a>
                        <a href="sport.php" class="nav-item nav-link "><i class="fa fa-baseball-ball me-2"></i>อุปกรณ์กีฬา</a>
                        <a href="user.php" class="nav-item nav-link "><i class="fa fa-user-alt me-2"></i>สมาชิก</a>
                        <a href="borrow.php" class="nav-item nav-link "><i class="fa fa-user-edit me-2"></i>ยืม-คืน</a>
                        <a href="showborrow.php" class="nav-item nav-link "><i class="fa fa-user-check  me-2"></i>ประวัติการยืม</a>

                    </div>
                </nav>
            </div>
            <!-- Sidebar End -->

            <?php include 'navbar.php'; ?>

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">รายการยืม/คืน</p>
                                <h6 class="mb-0">????</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">รายการค้างคืน</p>
                                <h6 class="mb-0">????</h6>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sqluser = "SELECT * FROM user";
                    $resultuser = $con->query($sqluser);

                    $rowcountuser = mysqli_num_rows( $resultuser );
                    
                    ?>

                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">สมาชิก</p>
                                <h6 class="mb-0"><?= $rowcountuser ?></h6>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sql = "SELECT * FROM sports_equipment";
                    $result = $con->query($sql);

                    $rowcount = mysqli_num_rows( $result );
                    
                    ?>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">รายการอุปกรณ์</p>
                                <h6 class="mb-0"><?= $rowcount ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Salse</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">รหัสผู้ยืม</th>
                                    <th scope="col">ชื่อผู้ยืม</th>
                                    <th scope="col">วันที่ยืม</th>
                                    <th scope="col">กำกนดคืน</th>
                                    <th scope="col">สถาณะ</th>
                                    <!-- <th scope="col">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>

                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>01 Jan 2022</td>
                                    <td>01 Jan 2022</td>

                                    <td><a class="btn btn-sm btn-warning" href="">แก้ไข</a>
                                        <a class="btn btn-sm btn-danger" href="">ลบ</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


        <?php include 'footer.php';
    } ?>