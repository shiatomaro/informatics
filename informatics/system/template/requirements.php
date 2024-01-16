                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
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
                                            <th width="15%">Requirements</th>
                                            <th width="70px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM student_requirements_tbl st, p_information_tbl pi WHERE st.user_id=pi.user_id";
                                        $res = mysqli_query($db->conn, $sql);
                                        if(mysqli_num_rows($res) > 0){
                                            $ids = '';
                                            foreach($res as $r){
                                                $ids++;
                                                $createdOn = date("M. d, Y h:i:sa", strtotime($r["created_on"]));
                                                echo '
                                                <tr>
                                                    <td>'.$ids.'</td>
                                                    <td>'.$r["user_id"].'</td>
                                                    <td>'.$r["name"].'</td>
                                                    <td>'.$createdOn.'</td>
                                                    <td><button class="btn btn-info btn-sm btn-show" data-id="'.$r["user_id"].'">Show</button></td>
                                                    <td><button class="btn btn-primary btn-sm btn-edit" data-id="'.$r["user_id"].'"><i class="fas fa-solid fa-edit fa-sm"></i></button></td>
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

                <!-- Requirements Form Modal-->
                <div class="modal fade bd-example-modal-lg" id="reqModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content text-black">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form method="POST" id="requirementsForm" enctype="multipart/form-data">
                            <div class="modal-body">
                                <span id="formMessage"></span>
                                <div class="row col-md-12" style="user-select: none;">
                                    <div class="form-group col-md-6">
                                        <label for="form137" class="col-form-label"><b>Form 137</b><?php echo $optional;?></label>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <input type="file" class="form-control files" id="form137" name="form137" accept=".jpg, .jpeg, .png">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger removeReq" data-name="form137"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="form138" class="col-form-label"><b>Form 138</b><?php echo $optional;?></label>
                                        <div class="row">
                                            <div class="col-md-10">
                                            <input type="file" class="form-control files" id="form138" name="form138" accept=".jpg, .jpeg, .png">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger removeReq" data-name="form138"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="birthCertificate" class="col-form-label"><b>NSO Birth Certificate</b><?php echo $optional;?></label>
                                        <div class="row">
                                            <div class="col-md-10">
                                            <input type="file" class="form-control files" id="birthCertificate" name="birthCertificate" accept=".jpg, .jpeg, .png">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger removeReq" data-name="birthCertificate"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="barangayClearance" class="col-form-label"><b>Barangay Clearance</b><?php echo $optional;?></label>
                                        <div class="row">
                                            <div class="col-md-10">
                                            <input type="file" class="form-control files" id="barangayClearance" name="barangayClearance" accept=".jpg, .jpeg, .png">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger removeReq" data-name="barangayClearance"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="goodMoralCertificate" class="col-form-label"><b>Good Moral Certificate</b><?php echo $optional;?></label>
                                        <div class="row">
                                            <div class="col-md-10">
                                            <input type="file" class="form-control files" id="goodMoralCertificate" name="goodMoralCertificate" accept=".jpg, .jpeg, .png">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger removeReq" data-name="goodMoralCertificate"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="diploma" class="col-form-label"><b>Diploma</b><?php echo $optional;?></label>
                                        <div class="row">
                                            <div class="col-md-10">
                                            <input type="file" class="form-control files" id="diploma" name="diploma" accept=".jpg, .jpeg, .png">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger removeReq" data-name="diploma"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="id_picture" class="col-form-label"><b>(2)1x1" & (2)2x2" (Note)</b><?php echo $optional;?></label>
                                        <textarea class="form-control" id="id_picture" name="id_picture" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                <input class="btn btn-primary" type="submit" name="submit" id="submitBtn" value="Update">
                                <input type="hidden" id="action" name="action">
                                <input type="hidden" id="hiddenId" name="hiddenId">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Show Requirements Modal-->
                <div class="modal fade bd-example-modal-xl" id="showReqModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content text-black">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row col-md-12">
                                    <div class="col-md-4 forForm137">
                                    </div>
                                    <div class="col-md-4 forForm138">
                                    </div>
                                    <div class="forBirthCertificate col-md-4">
                                    </div>
                                    <div class="col-md-4 forBarangayClearance">
                                    </div>
                                    <div class="col-md-4 forGoodMoralCertificate">
                                    </div>
                                    <div class="col-md-4 forDiploma">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-dark" type="button" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function(){
                        var dataTable = $('#dataTable').DataTable({
                            paging: false
                        })
                        $('#requirementsForm').on('submit', function(e){
                            e.preventDefault();
                            
                            $.ajax({
                                url:"template/requirements_action.php",
                                method:"POST",
                                data:new FormData(this),
                                dataType:"JSON",
                                contentType:false,
                                processData:false,
                                success:function(data){
                                    if(data.error != ""){
                                        $('#formMessage').html(data.error);
                                    }else{
                                        alert(data.success);
                                        window.location.reload();
                                        $('#formMessage').html('');
                                    }
                                }
                            });
                        });

                        $('.removeReq').on('click', function(e){
                            e.preventDefault();
                            if(confirm("Are you sure you want to remove it?")){
                                var userId = $('#hiddenId').val();
                                var forReq = $(this).data('name');
                                $.ajax({
                                    url:"template/requirements_action.php",
                                    method:"POST",
                                    data:{userId:userId, forReq:forReq, action:'Remove'},
                                    dataType:'JSON',
                                    success:function(data){
                                        if(data.error != ''){
                                            $('#formMessage').html(data.error);
                                        }else{
                                            $('#formMessage').html(data.success);
                                            $('input[id='+forReq+']').val('');
                                        }
                                        setTimeout(function(){
                                            $('#formMessage').html('');
                                        }, 2500);
                                    }
                                });
                            }
                        });

                        $('.btn-edit').on('click', function(e){
                            e.preventDefault();
                            var userId = $(this).data('id');
                            $('#hiddenId').val(userId);
                            $.ajax({
                                url:'template/requirements_action.php',
                                method:'POST',
                                data:{userId:userId, action:'getSingleData'},
                                dataType:'JSON',
                                success:function(data){
                                    $('#action').val("Update");
                                    $('#id_picture').val(data.id_picture);
                                    $('.modal-title').html("<b style='user-select: none;'>Edit Requirements</b> <small class='text-secondary'>("+userId+")</small>");
                                    $('#reqModal').modal("show");
                                }
                            })
                        });

                        $('.btn-show').on('click', function(e){
                            e.preventDefault();
                            var userId = $(this).data('id');
                            $.ajax({
                                url:'template/requirements_action.php',
                                method:'POST',
                                data:{userId:userId, action:'getSingleData'},
                                dataType:'JSON',
                                success:function(data){
                                    $('.modal-title').html('<b>View Requirements</b> <small class="text-secondary">('+userId+')</small>');
                                    $('.forForm137').html('<b>Form 137</b><a href="./img/requirements/'+data.form_137+'" target="_blank"><img src="./img/requirements/'+data.form_137+'" class="img-thumbnail w-100 p-1" style="height: 450px !important;"/></a>');
                                    $('.forForm138').html('<b>Form 138</b><a href="./img/requirements/'+data.form_138+'" target="_blank"><img src="./img/requirements/'+data.form_138+'" class="img-thumbnail w-100 p-1" style="height: 450px !important;"/></a>');
                                    $('.forBirthCertificate').html('<b>NSO Birth Certificate</b><a href="./img/requirements/'+data.birth_certificate+'" target="_blank"><img src="./img/requirements/'+data.birth_certificate+'" class="img-thumbnail w-100 p-1" style="height: 450px !important;"/></a>');
                                    $('.forBarangayClearance').html('<b>Barangay Clearance</b><a href="./img/requirements/'+data.barangay_clearance+'" target="_blank"><img src="./img/requirements/'+data.barangay_clearance+'" class="img-thumbnail w-100 p-1" style="height: 450px !important;"/></a>');
                                    $('.forGoodMoralCertificate').html('<b>Good Moral Certificate</b><a href="./img/requirements/'+data.good_moral_certificate+'" target="_blank"><img src="./img/requirements/'+data.good_moral_certificate+'" class="img-thumbnail w-100 p-1" style="height: 450px !important;"/></a>');
                                    $('.forDiploma').html('<b>Diploma</b><a href="./img/requirements/'+data.diploma+'" target="_blank"><img src="./img/requirements/'+data.diploma+'" class="img-thumbnail w-100 p-1" style="height: 450px !important;"/></a>');
                                    $('#showReqModal').modal('show');
                                }
                            });
                        });
                        $('#form137').on('change', function(){
                            var extension = $('#form137').val().split('.').pop().toLowerCase();
                            if(extension != '')
                            {
                                if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
                                {
                                    $('#form137').val('');
                                    $('#formMessage').html('<div class="alert alert-danger noneSelect"><b>Error: </b>Invalid Image File.</div>');
                                    setTimeout(function(){
                                        $('#formMessage').html('');
                                    }, 3000);
                                    return false;
                                }
                            }
                        });

                        $('#form138').on('change', function(){
                            var extension = $('#form138').val().split('.').pop().toLowerCase();
                            if(extension != '')
                            {
                                if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
                                {
                                    $('#form138').val('');
                                    $('#formMessage').html('<div class="alert alert-danger noneSelect"><b>Error: </b>Invalid Image File.</div>');
                                    setTimeout(function(){
                                        $('#formMessage').html('');
                                    }, 3000);
                                    return false;
                                }
                            }
                        });

                        $('#birthCertificate').on('change', function(){
                            var extension = $('#birthCertificate').val().split('.').pop().toLowerCase();
                            if(extension != '')
                            {
                                if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
                                {
                                    $('#birthCertificate').val('');
                                    $('#formMessage').html('<div class="alert alert-danger noneSelect"><b>Error: </b>Invalid Image File.</div>');
                                    setTimeout(function(){
                                        $('#formMessage').html('');
                                    }, 3000);
                                    return false;
                                }
                            }
                        });

                        $('#barangayClearance').on('change', function(){
                            var extension = $('#barangayClearance').val().split('.').pop().toLowerCase();
                            if(extension != '')
                            {
                                if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
                                {
                                    $('#barangayClearance').val('');
                                    $('#formMessage').html('<div class="alert alert-danger noneSelect"><b>Error: </b>Invalid Image File.</div>');
                                    setTimeout(function(){
                                        $('#formMessage').html('');
                                    }, 3000);
                                    return false;
                                }
                            }
                        });

                        $('#goodMoralCertificate').on('change', function(){
                            var extension = $('#goodMoralCertificate').val().split('.').pop().toLowerCase();
                            if(extension != '')
                            {
                                if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
                                {
                                    $('#goodMoralCertificate').val('');
                                    $('#formMessage').html('<div class="alert alert-danger noneSelect"><b>Error: </b>Invalid Image File.</div>');
                                    setTimeout(function(){
                                        $('#formMessage').html('');
                                    }, 3000);
                                    return false;
                                }
                            }
                        });

                        $('#diploma').on('change', function(){
                            var extension = $('#diploma').val().split('.').pop().toLowerCase();
                            if(extension != '')
                            {
                                if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
                                {
                                    $('#diploma').val('');
                                    $('#formMessage').html('<div class="alert alert-danger noneSelect"><b>Error: </b>Invalid Image File.</div>');
                                    setTimeout(function(){
                                        $('#formMessage').html('');
                                    }, 3000);
                                    return false;
                                }
                            }
                        });
                    });
                    
                </script>