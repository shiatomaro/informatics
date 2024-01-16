                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <span id="tableMessage"></span>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary float-left">List of Users</h6>
                            <div class="float-right">
                                <button class="btn btn-success btn-sm" id="showUsersModal"><i class="fas fa-solid fa-plus fa-xl"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-black" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th>User Type</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM user_tbl";
                                        $res = mysqli_query($db->conn, $sql);
                                        if(mysqli_num_rows($res) > 0){
                                            $ids = '';
                                            foreach($res as $r){
                                                if($r['status'] == 1){
                                                    $status = '<button class="btn btn-danger btn-sm btn-status" data-id="'.$r['user_id'].'" data-status="'.$r['status'].'">Disable</button>';
                                                }else{
                                                    $status = '<button class="btn btn-primary btn-sm btn-status" data-id="'.$r['user_id'].'" data-status="'.$r['status'].'">Enable</button>';
                                                }
                                                $ids++;
                                                echo '
                                                <tr>
                                                    <td>'.$ids.'</td>
                                                    <td>'.$r['user_id'].'</td>
                                                    <td>'.$r['username'].'</td>
                                                    <td>'.$r['email_address'].'</td>
                                                    <td>'.$r['created_at'].'</td>
                                                    <td>'.$r['user_type'].'</td>
                                                    <td>'.$status.'</td>
                                                    <td><button class="btn btn-primary btn-sm btn-edit" data-id="'.$r['user_id'].'"><i class="fas fa-solid fa-edit fa-sm"></i></button>&nbsp;<button class="btn btn-danger btn-sm btn-delete" data-id="'.$r['user_id'].'"><i class="fas fa-solid fa-trash fa-sm"></i></button></td>
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

                <!-- Course Form Modal-->
                <div class="modal fade" id="usersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content text-black" style="user-select: none;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form method="POST" id="usersForm">
                            <div class="modal-body">
                                <span id="formMessage"></span>
                                <div class="form-group">
                                    <label for="username" class="col-form-label"><b>Username</b><?php echo $required;?></label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username..." required>
                                </div>
                                <div class="form-group">
                                    <label for="email_address" class="col-form-label"><b>Email Address</b><?php echo $required;?></label>
                                    <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email Address..." required>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-form-label"><b>Password</b><?php echo $required;?></label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password..." required>
                                </div>
                                <div class="form-group">
                                    <label for="user_type" class="col-form-label"><b>User Type</b><?php echo $required;?></label>
                                    <select name="user_type" id="user_type" class="form-control">
                                        <option value="" selected disabled>Select User Type</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Registrar">Registrar</option>
                                        <option value="Student">Student</option>
                                    </select>
                                </div><div class="form-check">
                                    <input type="checkbox" class="form-check-input" style="cursor: pointer;" id="showPass" name="showPass">
                                    <label for="showPass" class="form-check-label" style="cursor: pointer;">Show Password</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="hiddenid" id="hiddenid">
                                <input type="hidden" name="action" id="action" value="Add">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                <input class="btn btn-success" type="submit" name="submit" id="submitBtn" value="">
                                <input type="hidden" name="previousEmail" id="previousEmail">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Course Delete Modal-->
                <div class="modal fade" id="usersDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content text-black">
                            <span id="form-message"></span>
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
                        var dataTable = $('#dataTable').DataTable({
                            paging: false
                        })
                        // For Show Password
                        $('#showPass').change(function(){
                            if($('#showPass').is(':checked')){
                                $('#password').attr('type', 'text');
                            }else{
                                $('#password').attr('type', 'password');
                            }
                        });
                        // For Add Form Function
                        $('#showUsersModal').click(function(){
                            $('#usersForm')[0].reset();
                            $('.modal-title').html('<b>Add User</b>');
                            $('#submitBtn').val('Add');
                            $('#usersModal').modal("show");
                        });

                        // To Read All Inputted Data By User
                        $('#usersForm').on('submit', function(e){
                            e.preventDefault();
                            $.ajax({
                                url:'template/users_action.php',
                                method:'POST',
                                data:$(this).serialize(),
                                dataType:'JSON',
                                success:function(data){
                                    if(data.error != ''){
                                        $('#formMessage').html(data.error);
                                    }else{
                                        $('#usersModal').modal("hide");
                                        alert(data.success);
                                        window.location.reload();
                                    }
                                }
                            });
                        });

                        $('.btn-edit').on('click', function(){
                            var userId = $(this).data('id');
                            $.ajax({
                                url: 'template/users_action.php',
                                method: 'POST',
                                data: {userId:userId, action:'getSingleData'},
                                dataType:'JSON',
                                success:function(data){
                                    $('.modal-title').html('Edit User');
                                    $('#hiddenid').val(userId);
                                    $('#username').val(data.username);
                                    $('#previousEmail').val(data.emailAddress);
                                    $('#email_address').val(data.emailAddress);
                                    $('#password').val(data.password);
                                    $('#user_type').val(data.userType);
                                    $('#action').val('Edit');
                                    $('#submitBtn').removeClass('btn-success');
                                    $('#submitBtn').addClass('btn-primary');
                                    $('#submitBtn').val('Update');
                                    $('#usersModal').modal("show");
                                }
                            });
                        });

                        // For Change Status Function
                        $('.btn-status').on('click', function(){
                            var varId = $(this).data('id');
                            var varStatus = $(this).data('status');
                            var nextStatus = 1;
                            var statusName;
                            if(varStatus == 1){
                                statusName = 'disable';
                                nextStatus = 0;
                            }else{
                                statusName = 'enable';
                            }
                            $('#btn-delete').attr('hidden', true);
                            $('#btn-stat').removeAttr('hidden');
                            $('.modal-title').html("<b>Confirmation</b>");
                            $('#usersDeleteModal').modal('show');
                            $('#modalContentBody').html("Are you sure you want to "+statusName+" it?");
                            $('#btn-stat').on('click', function(){
                                $.ajax({
                                    url:"template/users_action.php",
                                    method:"POST",
                                    data:{varId:varId, nextStatus:nextStatus, action:'changeStatus'},
                                    dataType:"JSON",
                                    success:function(data){
                                        if(data.error != ''){
                                            $('#form-message').html(data.error);
                                            $('#usersDeleteModal').modal('hide');
                                        }else{
                                            $('#usersDeleteModal').modal('hide');
                                            window.location.reload();
                                        }
                                    }
                                });
                            });
                        });

                        // For Delete Modal & Function
                        $('.btn-delete').on('click', function(){
                            var delete_id = $(this).data('id');
                            $('#modalContentBody').html("Are you sure you want to delete it?");
                            $('.modal-title').html("<b>Confirmation</b>");
                            $('#usersDeleteModal').modal('show');
                            $('#btn-stat').attr('hidden', true);
                            $('#btn-delete').removeAttr('hidden');
                            $('#btn-delete').click(function(){
                                $.ajax({
                                    url: 'template/users_action.php',
                                    method: 'POST',
                                    data: {delete_id:delete_id, action:'deleteUser'},
                                    dataType: 'JSON',
                                    success:function(data){
                                        if(data.error != ''){
                                            $('#tableMessage').html(data.error);
                                            $('#usersDeleteModal').modal('hide');
                                        }else{
                                            $('#usersDeleteModal').modal('hide');
                                            alert(data.success);
                                            window.location.reload();
                                        }
                                    }
                                });
                            });
                        });
                    });
                </script>