                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of Student Evaluation</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-black" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="7%">ID</th>
                                            <th width="12%">Student ID</th>
                                            <th width="12%">Student Index Number</th>
                                            <th width="20%">Name</th>
                                            <th width="20%">Approved By</th>
                                            <th width="15%">Noted By</th>
                                            <th width="30%">Updated At</th>
                                            <th width="15%">Status</th>
                                            <th width="3%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM s_applicant_evaluation_tbl eval, p_information_tbl info WHERE eval.user_id=info.user_id";
                                        $result = mysqli_query($db->conn, $query);
                                        if(mysqli_num_rows($result) > 0){
                                            $ids = '';
                                            foreach($result as $row){
                                                $ids++;
                                                if($row['student_index_number'] == ""){
                                                    $indexNumber = "N/A";
                                                }else{
                                                    $indexNumber = $row['student_index_number'];
                                                }
                                                if($row['approved_by'] == ""){
                                                    $approvedBy = "N/A";
                                                }else{
                                                    $approvedBy = $row['approved_by'];
                                                }
                                                if($row['noted_by'] == ""){
                                                    $notedBy = "N/A";
                                                }else{
                                                    $notedBy = $row['noted_by'];
                                                }
                                                if($row['approval_status'] == "Pending"){
                                                    $status = '<strong class="text-warning">Pending</strong>';
                                                }else if($row['approval_status'] == "Accepted"){
                                                    $status = '<strong class="text-success">Accepted</strong>';
                                                }else{
                                                    $status = '<strong class="text-danger">Not Accepted</strong>';
                                                }
                                                $updatedAt = date('M. d, Y h:i:sa', strtotime($row['updated_at']));
                                                echo '
                                                <tr>
                                                    <td>'.$ids.'</td>
                                                    <td>'.$row['user_id'].'</td>
                                                    <td>'.$indexNumber.'</td>
                                                    <td>'.$row['name'].'</td>
                                                    <td>'.$approvedBy.'</td>
                                                    <td>'.$notedBy.'</td>
                                                    <td>'.$updatedAt.'</td>
                                                    <td>'.$status.'</td>
                                                    <td><button class="btn btn-primary btn-sm btn-edit" data-id="'.$row['user_id'].'"><i class="fas fa-solid fa-edit fa-sm"></i></button></td>
                                                </tr>
                                                ';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                <div class="modal fade" id="evaluationModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content text-black noneSelect">
                      <div class="modal-header">
                          <h5 class="modal-title"></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <form method="POST" id="evaluationForm">
                      <div class="modal-body">
                        <span id="form-message"></span>
                        <div class="form-group">
                            <label for="studentIndex" class="form-control-label"><b>Student Index Number</b></label>
                            <input type="text" class="form-control" id="studentIndex" name="studentIndex" placeholder="Student Index Number...">
                        </div>
                        <div class="form-group">
                            <label for="approvedBy" class="form-control-label"><b>Approved By</b></label>
                            <select class="form-control" id="approvedBy" name="approvedBy">
                                <option value="" selected disabled>Select Approved By</option>
                                <?php
                                $sql = "SELECT * FROM student_administration_tbl WHERE position='Registrar' AND status=1";
                                $res = mysqli_query($db->conn, $sql);
                                if(mysqli_num_rows($res) > 0){
                                    foreach($res as $r){
                                        echo '
                                        <option value="'.$r['student_administration_name'].'">Registrar</option>
                                        ';
                                    }
                                    echo '<option value="Other">Other</option>';
                                }
                                ?>
                            </select>
                            <input type="text" class="form-control" id="inputApprovedBy" name="inputApprovedBy" placeholder="Enter name..." hidden>
                        </div>
                        <div class="form-group">
                            <label for="notedBy" class="form-control-label"><b>Noted By</b></label>
                            <select class="form-control" id="notedBy" name="notedBy">
                                <option value="" selected disabled>Select Approved By</option>
                                <?php
                                $sql = "SELECT * FROM student_administration_tbl WHERE position='Student Admin' AND status=1";
                                $res = mysqli_query($db->conn, $sql);
                                if(mysqli_num_rows($res) > 0){
                                    foreach($res as $r){
                                        echo '
                                        <option value="'.$r['student_administration_name'].'">Student Admin</option>
                                        ';
                                    }
                                    echo '<option value="Other">Other</option>';
                                }
                                ?>
                            </select>
                            <input type="text" class="form-control" id="inputNotedBy" name="inputNotedBy" placeholder="Enter name..." hidden>
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-control-label"><b>Status</b></label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="" selected disabled>Select Status</option>
                                <option value="Pending">Pending</option>
                                <option value="Accepted">Accepted</option>
                                <option value="Not Accepted">Not Accepted</option>
                            </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" aria-label="close">Cancel</button>
                        <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Update">
                        <input type="hidden" class="hiddenId" id="hiddenId" name="hiddenId">
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

                <script>
                    $(document).ready(function(){
                        var dataTable = $('#dataTable').DataTable({
                            paging: false
                        })
                        $('#approvedBy').on('change', function(){
                            if($(this).val() == "Other"){
                                $('#inputApprovedBy').removeAttr('hidden');
                            }else{
                                $('#inputApprovedBy').attr('hidden', true);
                            }
                        });
                        $('#notedBy').on('change', function(){
                            if($(this).val() == "Other"){
                                $('#inputNotedBy').removeAttr('hidden');
                            }else{
                                $('#inputNotedBy').attr('hidden', true);
                            }
                        });
                        $('.btn-edit').on('click', function(){
                            var userId = $(this).data('id');
                            $('.hiddenId').val($(this).data('id'));
                            $.ajax({
                                url:'template/evaluation_action.php',
                                method:'POST',
                                data:{userId:userId, action:'getSingleData'},
                                dataType:'JSON',
                                success:function(data){
                                    $('#studentIndex').val(data.studentIndexNumber);
                                    $('#status').val(data.status);
                                    if(data.ApprovedByName != data.RegistrarName){
                                        $('#inputApprovedBy').removeAttr('hidden');
                                        $('#approvedBy').val('Other');
                                        if(data.ApprovedByName != "N/A"){
                                            $('#inputApprovedBy').val(data.ApprovedByName);
                                        }else{
                                            $('#inputApprovedBy').attr('placeholder', 'Enter name...');
                                        }
                                    }else{
                                        $('#inputApprovedBy').attr('hidden', true);
                                        $('#approvedBy').val(data.RegistrarName);
                                    }
                                    if(data.NotedByName != data.studentAdminName){
                                        $('#inputNotedBy').removeAttr('hidden');
                                        $('#notedBy').val('Other');
                                        if(data.NotedByName != "N/A"){
                                            $('#inputNotedBy').val(data.NotedByName);
                                        }else{
                                            $('#inputNotedBy').attr('placeholder', 'Enter name...');
                                        }
                                    }else{
                                        $('#inputNotedBy').attr('hidden', true);
                                        $('#notedBy').val(data.studentAdminName);
                                    }
                                    $('.modal-title').html('<b>Edit Evaluation</b> <small class="text-secondary">('+userId+')</small>');
                                    $('#evaluationModal').modal("show");
                                }
                            });
                        });

                        $('#evaluationForm').on('submit', function(e){
                            e.preventDefault();
                            if($('#approvedBy').val() != "Other"){
                                var approvedName = $('#approvedBy').val();
                            }else{
                                var approvedName = $('#inputApprovedBy').val();
                            }
                            if($('#notedBy').val() != "Other"){
                                var notedName = $('#notedBy').val();
                            }else{
                                var notedName = $('#inputNotedBy').val();
                            }
                            var userId = $('.hiddenId').val();
                            var studentIndex = $('#studentIndex').val();
                            var status = $('#status').val();
                            $.ajax({
                                url:'template/evaluation_action.php',
                                method:'POST',
                                data: {userId:userId, studentIndexNumber:studentIndex, approvedBy:approvedName, notedBy:notedName, status:status, action:'Update'},
                                dataType:'JSON',
                                error:function(){
                                    $('#form-message').html('<div class="alert alert-danger"><b>Error:</b> Please contact the admin about this issue!</div>');
                                },
                                success:function(data){
                                    if(data.error != ""){
                                        $('#form-message').html(data.error);
                                        setTimeout(function(){
                                            $('#form-message').html('');
                                        }, 2500);
                                    }else{
                                        alert(data.success);
                                        window.location.reload();
                                    }
                                }
                            });
                        });
                    });
                </script>