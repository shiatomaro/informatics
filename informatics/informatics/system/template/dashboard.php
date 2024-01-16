            <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php if($userType == "Admin"){ ?>
                        <!-- TOTAL USERS Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                TOTAL USERS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                                            $sql = "SELECT COUNT(*) AS count FROM user_tbl"; 
                                            $res = mysqli_query($db->conn, $sql);
                                            $countAll = mysqli_fetch_assoc($res);
                                            echo $countAll['count'];
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TOTAL REGISTRAR Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                TOTAL REGISTRAR</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                                            $sql = "SELECT COUNT(*) AS count FROM user_tbl WHERE user_type='Registrar'"; 
                                            $res = mysqli_query($db->conn, $sql);
                                            $countAll = mysqli_fetch_assoc($res);
                                            echo $countAll['count'];
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <!-- TOTAL STUDENT Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                TOTAL STUDENT</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                                            $sql = "SELECT COUNT(*) AS count FROM s_applicant_evaluation_tbl"; 
                                            $res = mysqli_query($db->conn, $sql);
                                            $countAll = mysqli_fetch_assoc($res);
                                            echo $countAll['count'];
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TOTAL STUDENT ACCEPTED Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                TOTAL STUDENT ACCEPTED</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                                            $sql = "SELECT COUNT(*) AS count FROM s_applicant_evaluation_tbl WHERE approval_status='Accepted'"; 
                                            $res = mysqli_query($db->conn, $sql);
                                            $countAll = mysqli_fetch_assoc($res);
                                            echo $countAll['count'];
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TOTAL STUDENT NOT ACCEPTED Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                TOTAL STUDENT NOT ACCEPTED</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                                            $sql = "SELECT COUNT(*) AS count FROM s_applicant_evaluation_tbl WHERE approval_status='Not Accepted'"; 
                                            $res = mysqli_query($db->conn, $sql);
                                            $countAll = mysqli_fetch_assoc($res);
                                            echo $countAll['count'];
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PENDING REQUESTS Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                PENDING REQUESTS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                                            $sql = "SELECT COUNT(*) AS count FROM s_applicant_evaluation_tbl WHERE approval_status='Pending'"; 
                                            $res = mysqli_query($db->conn, $sql);
                                            $countAll = mysqli_fetch_assoc($res);
                                            echo $countAll['count'];
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800">Accepted Student(per Year Level)</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>
                    <div class="row">

                        <?php
                        $output = '';
                        $allsql = "SELECT * FROM yearlevel_tbl";
                        $resfall = mysqli_query($db->conn, $allsql);
                        if(mysqli_num_rows($resfall) > 0){
                            foreach ($resfall as $row) {
                                $yrlvl = $row['year_level'];
                                $sql1 = "SELECT COUNT(yr_lvl) as count, year_level FROM p_information_tbl pi, yearlevel_tbl yt, s_applicant_evaluation_tbl sa WHERE yt.year_level='$yrlvl' AND pi.yr_lvl='$yrlvl' AND sa.approval_status='Pending' AND sa.user_id=pi.user_id";
                                $res1 = mysqli_query($db->conn, $sql1);
                                $r2 = mysqli_fetch_assoc($res1);
                                $output .= '
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        TOTAL '.$yrlvl.'</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    '.$r2['count'].'
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ';
                            }
                        }else{
                            $output = '';
                        }
                        echo $output;
                        ?>
                    </div>

                    <!-- Content Row -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h4 mb-0 text-gray-800">Accepted Student(per Strand/Course)</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>
                    <div class="row">

                        <?php
                        $output = '';
                        $allsql = "SELECT * FROM course_tbl";
                        $resfall = mysqli_query($db->conn, $allsql);
                        if(mysqli_num_rows($resfall) > 0){
                            foreach ($resfall as $row) {
                                $cname = $row['course_name'];
                                $sql1 = "SELECT COUNT(1st_choice) as count, course_name FROM p_information_tbl pi, course_tbl ct, s_applicant_evaluation_tbl sa WHERE ct.course_name='$cname' AND pi.1st_choice='$cname' AND sa.approval_status='Pending' AND sa.user_id=pi.user_id";
                                $res1 = mysqli_query($db->conn, $sql1);
                                $r2 = mysqli_fetch_assoc($res1);
                                $output .= '
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                        TOTAL '.$cname.'</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    '.$r2['count'].'
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-sticky-note fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ';
                            }
                        }else{
                            $output = '';
                        }
                        echo $output;
                        ?>

                        <!-- Area Chart 
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                 Card Header - Dropdown 
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Student Overview</h6>
                                </div>
                                 Card Body 
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <!-- Pie Chart
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                 Card Header - Dropdown
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Student Approval</h6>
                                </div>
                                 Card Body
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> Pending
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Accepted
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> Not Accepted
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                         -->
                    </div>
                </div>