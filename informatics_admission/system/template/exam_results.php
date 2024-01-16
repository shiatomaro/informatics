<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of Student Requirements</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-black" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="7%">ID</th>
                            <th width="12%">Student ID</th>
                            <th width="35%">Name</th>
                            <th width="13%">Created At</th>
                            <th width="15%">Result</th>
                            <th width="70px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "
                            SELECT er.id, er.user_id, pi.name, er.created_at, er.result, er.action
                            FROM p_information_tbl pi
                            RIGHT JOIN exam_results_tbl er ON pi.user_id = er.user_id;
                        ";
                        $res = mysqli_query($db->conn, $sql);
                        // TODO:
                        // 1. the result column should have buttons that would show the exam's result when clicked (?)
                        // 2. the action column should have a button that decides the action for the user
                        if (mysqli_num_rows($res) > 0) {
                            foreach ($res as $r) {
                                echo "
                                <tr>
                                    <td>$r[id]</td>
                                    <td>$r[user_id]</td>
                                    <td>$r[name]</td>
                                    <td>$r[created_at]</td>
                                    <td>$r[result]</td>
                                    <td>$r[action]</td>
                                </tr>
                                ";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>