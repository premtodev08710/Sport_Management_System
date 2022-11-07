<?php session_start(); ?>
<?php

if (!$_SESSION["UserID"]) {  //check session

    Header("Location: signin.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

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
                        <a href="typesport.php" class="nav-item nav-link "><i class="fa fa-grip-horizontal me-2"></i>หมวดหมู่</a>
                        <a href="sport.php" class="nav-item nav-link "><i class="fa fa-baseball-ball me-2"></i>อุปกรณ์กีฬา</a>
                        <a href="user.php" class="nav-item nav-link "><i class="fa fa-user-alt me-2"></i>สมาชิก</a>
                        <a href="borrow.php" class="nav-item nav-link active"><i class="fa fa-user-edit me-2"></i>ยืม-คืน</a>
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
                        <h6 class="mb-0">รายงานการยืม-คืน</h6>
                        <!-- <a href="">Show All</a> -->
                        <a href="forminsert_sport.php"><button class="btn btn-sm btn-success">ยืม</button></a>

                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อ</th>
                                    <th scope="col">วันที่ยืม</th>
                                    <th scope="col">จำนวนที่ยืม</th>

                                    <th scope="col">สถาณะ</th>
                                    <th scope="col">แก้ไข\ลบ </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php include 'connection.php';

                                $sql = "
                                    SELECT borrow.borrow_id,borrow.student_id,borrow.sport_id,borrow.start_date,borrow.end_date 
                                    ,borrow.number, borrow.status ,user.Firstname ,user.Lastname ,
                                    sports_equipment.sport_name ,sports_equipment.sport_name FROM borrow 
                                    INNER JOIN user on borrow.student_id = user.student_id 
                                    INNER JOIN sports_equipment on borrow.sport_id = sports_equipment.sport_id
                                    where borrow.number = 0";
                                $result = $con->query($sql);
                                $num = 0;
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        // $id = ; 
                                ?>

                                        <!--  -->
                                        <tr>
                                            <td><?= $num += 1 ?></td>
                                            <td><?= $row['Firstname'] . ' ' . $row['Firstname'] ?></td>
                                            <td><?= $row['start_date'] ?></td>
                                            <td><?= $row['number'] ?></td>

                                            <td><?php if( $row['status'] == 0){
                                                    echo 'ยังไม่ได้รับคืน';
                                            } ?></td>
                                            <td>
                                                <a class="btn btn-primary m-2" href="editborrow.php?sport_id=<?= $row['sport_id']; ?>&borrow_id=<?= $row['borrow_id']?>&number=<?= $row["number"];?>">รับคืน</a>
                                                <a class="btn btn-warning m-2" href="formedit_borrow.php?borrow_id=<?php echo $row["borrow_id"]; ?>">แก้ไข</a>
                                            </td>
                                        </tr>
                                <?php  }
                                } else {
                                    // echo "0 results";
                                }
                                $con->close(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


        <?php include 'footer.php';
    } ?>