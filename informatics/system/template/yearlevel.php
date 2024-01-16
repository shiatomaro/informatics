
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <span id="tableMessage"></span>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">List of Year Level</h6>
            <div class="float-right">
                <button class="btn btn-success btn-sm" id="showCourseModal"><i class="fas fa-solid fa-plus fa-xl"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-black" id="courseDbTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Year Level</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id = 0;
                        $sql = "SELECT * FROM yearlevel_tbl";
                        $res = mysqli_query($db->conn, $sql);
                        if(mysqli_num_rows($res) > 0){
                            foreach($res as $row){
                                $id++;
                                if($row['status'] == 1){
                                    $btnStatus = '<button class="btn btn-danger btn-status btn-sm" data-id="'.$row['id'].'" data-status="'.$row['status'].'">Disable</button>';
                                }else{
                                    $btnStatus = '<button class="btn btn-primary btn-status btn-sm" data-id="'.$row['id'].'" data-status="'.$row['status'].'">Enable</button>';
                                }
                                $output = '
                                <tr>
                                <td>'.$id.'</td>
                                <td>'.$row['year_level'].'</td>
                                <td>'.$btnStatus.'</td>
                                <td width="150px"><button class="btn btn-primary btn-sm btn-edit" data-id="'.$row['id'].'"><i class="fas fa-solid fa-edit fa-sm"></i></button>&nbsp;
                                    <button class="btn btn-danger btn-sm btn-delete" data-id="'.$row['id'].'"><i class="fas fa-solid fa-trash fa-sm"><!-- Delete --></i></button>
                                </td>
                                </tr>
                                ';
                                echo $output;
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

<!-- Course Form Modal-->
<div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="exampleModalLabel"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" id="courseForm">
            <div class="modal-body">
                <span id="formMessage"></span>
                <div class="form-group">
                    <label for="courseName" class="col-form-label"><b>Year Level</b><?php echo $required;?></label>
                    <input type="text" class="form-control" id="courseName" name="courseName" placeholder="Year Level..." required>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="hiddenid" id="hiddenid">
                <input type="hidden" name="action" id="action" value="courseAdd">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                <input class="btn btn-success" type="submit" name="submit" id="submitBtn" value="">
                <input type="hidden" name="previousCourseName" id="previousCourseName">
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Course Delete Modal-->
<div class="modal fade" id="courseDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"><span id="modalContentBody"></span></div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                <input class="btn btn-primary" id="btn-delete" type="button" value="Confirm" hidden>
                <input class="btn btn-primary" id="btn-stat" type="button" value="Confirm" hidden>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        var courseTable = $('#courseDbTable').DataTable({
            paging: false
        });

        $('.btn-status').on('click', function(){
            var varId = $(this).data('id');
            var varStatus = $(this).data('status');
            var nextStatus = 1;
            var statusName;
            if(varStatus == 1){
                statusName = 'disable';
            }else{
                statusName = 'enable';
            }
            $('#btn-delete').attr('hidden', true);
            $('#btn-stat').removeAttr('hidden');
            $('.modal-title').html("<b>Confirmation</b>");
            $('#courseDeleteModal').modal('show');
            $('#modalContentBody').html("Are you sure you want to "+statusName+" it?");
            if(varStatus == 1){
                nextStatus = 0;
            }
            $('#btn-stat').on('click', function(){
                $.ajax({
                    url:"template/yearlevel_action.php",
                    method:"POST",
                    data:{varId:varId, varStatus:varStatus, nextStatus:nextStatus, action:'courseChange_Status'},
                    dataType:"JSON",
                    success:function(data){
                        if(data.error != ''){
                            $('#tableMessage').html(data.error);
                            $('#courseDeleteModal').modal('hide');
                        }else{
                            $('#courseDeleteModal').modal('hide');
                            $('#tableMessage').html('');
                            window.location.reload();
                        }
                    }
                });
            });
        });

        $('#showCourseModal').on('click', function(){
            $('#courseForm')[0].reset();
            $('.modal-title').html("<b>Add Year Level</b>");
            $('#action').val("courseAdd");
            $('#submitBtn').val("Add");
            $('#submitBtn').removeClass('btn-primary');
            $('#submitBtn').addClass('btn-success');
            $('#courseModal').modal("show");
            $('#submitBtn').removeAttr('disabled');
        });

        $('#courseForm').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: 'template/yearlevel_action.php',
                method: "POST",
                data: $(this).serialize(),
                dataType: 'JSON',
                error:function(){
                    console.log('Error');
                },
                success:function(data){
                    if(data.error != ''){
                        $('#formMessage').html(data.error);
                    }else{
                        $('#courseName').val('');
                        $('#tableMessage').html(data.success);
                        $('#courseModal').modal("hide");
                        setTimeout(function(){
                            window.location.reload();
                            $('#tableMessage').html('');
                        }, 1500);
                    }
                }
            });
        });

        // For Edit Modal & Function
        $('.btn-edit').on('click',function(){
            var edit_id = $(this).data('id');
            $.ajax({
                url:'template/yearlevel_action.php',
                method:'POST',
                data:{edit_id:edit_id, action:'getSingleData'},
                dataType:'JSON',
                success:function(data){
                    $('#courseName').val(data.courseName);
                    $('#previousCourseName').val(data.courseName);
                    $('#hiddenid').val(edit_id);
                    $('#action').val('CourseEdit');
                    $('#submitBtn').val('Update');
                    $('#submitBtn').removeClass('btn-success');
                    $('#submitBtn').addClass('btn-primary');
                    $('.modal-title').html('<b>Edit Year Level</b>');
                    $('#courseModal').modal('show');
                }
            });
        });

        // For Delete Modal & Function
        $('.btn-delete').on('click', function(){
            var delete_id = $(this).data('id');
            var RowsId = $('.idRows').data('id');
            $('#modalContentBody').html("Are you sure you want to delete it?");
            $('.modal-title').html("<b>Confirmation</b>");
            $('#courseDeleteModal').modal('show');
            $('#btn-stat').attr('hidden', true);
            $('#btn-delete').removeAttr('hidden');
            $('#btn-delete').click(function(){
                $.ajax({
                    url: 'template/yearlevel_action.php',
                    method: 'POST',
                    data: {delete_id:delete_id, action:'deleteCourse'},
                    dataType: 'JSON',
                    success:function(data){
                        if(data.error != ''){
                            $('#tableMessage').html(data.error);
                            $('#courseDeleteModal').modal('hide');
                        }else{
                            $('#courseDeleteModal').modal('hide');
                            $('#tableMessage').html('');
                            window.location.reload();
                        }
                    }
                });
            });
        });
    });
</script>