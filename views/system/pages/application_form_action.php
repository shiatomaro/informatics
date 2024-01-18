<?php
include('../../conn/conn.php');
$object = New forAction();
$output = '';
if(isset($_POST['action'])){
    $noInformation = "<b class='text-black'><i>No information available for this student!</i></b>";
	if($_POST['action'] == "perinfo"){
		$userId = $_POST['user_id'];
		$sql = "SELECT * FROM p_information_tbl WHERE user_id LIKE '$userId'";
		$res = mysqli_query($object->conn, $sql);
		if(mysqli_num_rows($res) > 0){
			foreach($res as $r){
				$output = '
						<table class="table table-bordered text-black" width="100%">
                            <tbody>
                                <tr>
                                    <th>1x1 Picture</th>
                                    <td><img src="./img/1x1/'.$r["1x1_picture"].'" width="150px" height="150px" alt="1x1 Picture"></td>
                                </tr>
                                <tr>
                                    <th>Year Level</th>
                                    <td>'.$r['yr_lvl'].'</td>
                                </tr>
                                <tr>
                                    <th>User ID</th>
                                    <td>'.$r["user_id"].'</td>
                                </tr>
                                <tr>
                                    <th>Name <small>(<b>Format: </b>Lastname, Firstname Middlename)</small></th>
                                    <td>'.$r["name"].'</td>
                                </tr>
                                <tr>
                                    <th>1st Choice</th>
                                    <td>'.$r["1st_choice"].'</td>
                                </tr>
                                <tr>
                                    <th>2nd Choice</th>
                                    <td>'.$r["2nd_choice"].'</td>
                                </tr>
                                <tr>
                                    <th>Awareness</th>
                                    <td>'.$r["awareness"].'</td>
                                </tr>
                                <tr>
                                    <th>School</th>
                                    <td>'.$r["school"].'</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>'.$r["address"].'</td>
                                </tr>
                                <tr>
                                    <th>Contact No.</th>
                                    <td>'.$r["contact_no"].'</td>
                                </tr>
                                <tr>
                                    <th>Email Address</th>
                                    <td>'.$r["email_address"].'</td>
                                </tr>
                                <tr>
                                    <th>Birthday</th>
                                    <td>'.$r["birth_date"].'</td>
                                </tr>
                                <tr>
                                    <th>Age</th>
                                    <td>'.$r["age"].'</td>
                                </tr>
                                <tr>
                                    <th>Citizenship</th>
                                    <td>'.$r["citizenship"].'</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>'.$r["gender"].'</td>
                                </tr>
                                <tr>
                                    <th>Civil Status</th>
                                    <td>'.$r["civil_status"].'</td>
                                </tr>
                                <tr>
                                    <th>Father\'s Information <small>(Name, Age, Occupation)</small></th>
                                    <td>'.$r["father_Info"].'</td>
                                </tr>
                                <tr>
                                    <th>Mother\'s Information  <small>(Name, Age, Occupation)</small></th>
                                    <td>'.$r["mother_Info"].'</td>
                                </tr>
                                <tr>
                                    <th>Guardian Information  <small>(Name, Age, Occupation)</small></th>
                                    <td>'.$r["guardian_Info"].'</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>'.$r["their_address"].'</td>
                                </tr>
                                <tr>
                                    <th>Contact No.</th>
                                    <td>'.$r["their_contact_no"].'</td>
                                </tr>
                                <tr>
                                    <th>Email Address</th>
                                    <td>'.$r["their_email_address"].'</td>
                                </tr>
                            </tbody>
                        </table>
				';
			}
		}else{
			$output = $noInformation;
		}
		echo $output;
	}

    if($_POST['action'] == "eduBack"){
		$userId = $_POST['user_id'];
		$sql = "SELECT * FROM e_background_tbl WHERE user_id LIKE '$userId'";
		$res = mysqli_query($object->conn, $sql);
		if(mysqli_num_rows($res) > 0){
			foreach($res as $r){
                error_reporting(0);
                $primary_info = explode("/+", $r['primary_info']);
                $secondary_info = explode("/+", $r['secondary_info']);
                $vocational_info = explode("/+", $r['vocational_info']);
                $tertiary_info = explode("/+", $r['tertiary_info']);
                $post_graduate_info = explode("/+", $r['post_graduate_info']);
                $last_school_attended = explode("/+", $r['last_school_attended']);
                $fromToP = explode("-", $primary_info[1]);
                $fromToS = explode("-", $secondary_info[1]);
                $fromToV = explode("-", $vocational_info[1]);
                $fromToT = explode("-", $tertiary_info[1]);
                $fromToPG = explode("-", $post_graduate_info[1]);
                $fromToL = explode("-", $last_school_attended[1]);
                if($primary_info[0] == ""){
                    $primary_info[0] = "N/A";
                }
                if($secondary_info[0] == ""){
                    $secondary_info[0] = "N/A";
                }
                if($vocational_info[0] == ""){
                    $vocational_info[0] = "N/A";
                }
                if($tertiary_info[0] == ""){
                    $tertiary_info[0] = "N/A";
                }
                if($post_graduate_info[0] == ""){
                    $post_graduate_info[0] = "N/A";
                }
                if($last_school_attended[0] == ""){
                    $last_school_attended[0] = "N/A";
                }
                if($last_school_attended[2] == ""){
                    $last_school_attended[2] = "N/A";
                }
                if($post_graduate_info[2] == ""){
                    $post_graduate_info[2] = "N/A";
                }
                if($tertiary_info[2] == ""){
                    $tertiary_info[2] = "N/A";
                }
                if($vocational_info[2] == ""){
                    $vocational_info[2] = "N/A";
                }
                if($secondary_info[2] == ""){
                    $secondary_info[2] = "N/A";
                }
                if($primary_info[2] == ""){
                    $primary_info[2] = "N/A";
                }
				$output = '
						<table class="table table-bordered text-black" width="100%">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th rowspan="2" width="50px"></th>
                                    <th rowspan="2" width="320px" class="text-center">School / Address</th>
                                    <th colspan="2" class="text-center" style="font-size: 12.5px;">Inclusive Dates</th>
                                    <th rowspan="2" class="text-center">Honors / Awards</th>
                                </tr>
                                <tr>
                                    <th style="font-size: 12.5px;">From</th>
                                    <th style="font-size: 12.5px;">To</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Primary</th>
                                    <td>'.$primary_info[0].'</td>
                                    <td>'.$fromToP[0].'</td>
                                    <td>'.$fromToP[1].'</td>
                                    <td>'.$primary_info[2].'</td>
                                </tr>
                                <tr>
                                    <th>Secondary</th>
                                    <td>'.$secondary_info[0].'</td>
                                    <td>'.$fromToS[0].'</td>
                                    <td>'.$fromToS[1].'</td>
                                    <td>'.$secondary_info[2].'</td>
                                </tr>
                                <tr>
                                    <th>Vocational</th>
                                    <td>'.$vocational_info[0].'</td>
                                    <td>'.$fromToV[0].'</td>
                                    <td>'.$fromToV[1].'</td>
                                    <td>'.$vocational_info[2].'</td>
                                </tr>
                                <tr>
                                    <th>Tertiary</th>
                                    <td>'.$tertiary_info[0].'</td>
                                    <td>'.$fromToT[0].'</td>
                                    <td>'.$fromToT[1].'</td>
                                    <td>'.$tertiary_info[2].'</td>
                                </tr>
                                <tr>
                                    <th>Post Graduate</th>
                                    <td>'.$post_graduate_info[0].'</td>
                                    <td>'.$fromToPG[0].'</td>
                                    <td>'.$fromToPG[1].'</td>
                                    <td>'.$post_graduate_info[2].'</td>
                                </tr>
                                <tr>
                                    <th>Last School Attended</th>
                                    <td>'.$last_school_attended[0].'</td>
                                    <td>'.$fromToL[0].'</td>
                                    <td>'.$fromToL[1].'</td>
                                    <td>'.$last_school_attended[2].'</td>
                                </tr>
                            </tbody>
                        </table>
				';
			}
		}else{
			$output = $noInformation;
		}
		echo $output;
	}

    if($_POST['action'] == "req"){
		$userId = $_POST['user_id'];
		$sql = "SELECT * FROM student_requirements_tbl req, p_information_tbl info WHERE req.user_id LIKE '$userId' AND info.user_id LIKE '$userId'";
		$res = mysqli_query($object->conn, $sql);
		if(mysqli_num_rows($res) > 0){
			foreach($res as $r){
                error_reporting(0);
                $userId = $userId;
                if($r["form_137"] != "N/A" AND $r["form_137"] != ""){
                    $form137 = "<span class='text-success'>&check;</span>";
                    $nameForm137 = "Form 137";
                }else{
                    $form137 = "<span class='text-danger'>&cross;</span>";
                    $nameForm137 = "<span class='text-danger'>Form 137</span>";
                }
                if($r["form_138"] != "N/A" AND $r["form_138"] != ""){
                    $form138 = "<span class='text-success'>&check;</span>";
                    $nameForm138 = "Form 138";
                }else{
                    $form138 = "<span class='text-danger'>&cross;</span>";
                    $nameForm138 = "<span class='text-danger'>Form 138</span>";
                }
                if($r["birth_certificate"] != "N/A" AND $r["birth_certificate"] != ""){
                    $birth_cert = "<span class='text-success'>&check;</span>";
                    $nameBirthCert = "NSO Birth Certificate";
                }else{
                    $birth_cert = "<span class='text-danger'>&cross;</span>";
                    $nameBirthCert = "<span class='text-danger'>NSO Birth Certificate</span>";
                }
                if($r["barangay_clearance"] != "N/A" AND $r["barangay_clearance"] != ""){
                    $barangay_clearance = "<span class='text-success'>&check;</span>";
                    $nameBClearance = "Barangay Clearance";
                }else{
                    $barangay_clearance = "<span class='text-danger'>&cross;</span>";
                    $nameBClearance = "<span class='text-danger'>Barangay Clearance</span>";
                }
                if($r["good_moral_certificate"] != "N/A" AND $r["good_moral_certificate"] != ""){
                    $good_moral = "<span class='text-success'>&check;</span>";
                    $nameGoodMor = "Good Moral Certificate";
                }else{
                    $good_moral = "<span class='text-danger'>&cross;</span>";
                    $nameGoodMor = "<span class='text-danger'>Good Moral Certificate</span>";
                }
                if($r["id_picture"] != "N/A" AND $r["id_picture"] != ""){
                    $id_picture = $r["id_picture"];
                    $nameIdPic = '(2)1x1" & (2)2x2 Picture <span class="text-success">&check;</span>';
                }else{
                    $id_picture = "<span class='text-danger'>&cross;</span>";
                    $nameIdPic = '<span class="text-danger">(2)1x1" & (2)2x2 Picture</span>';
                }
                $date = $r["created_on"];
                $created_on = date('M. d, Y h:i:sa', strtotime($date));
				$output = '
						<table class="table table-bordered text-black" width="100%">
                            <tbody>
                                <tr>
                                    <th>User ID</th>
                                    <td>'.$userId.'</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>'.$r["name"].'</td>
                                </tr>
                                <tr>
                                    <th>'.$nameForm137.'</th>
                                    <td>'.$form137.'</td>
                                </tr>
                                <tr>
                                    <th>'.$nameForm138.'</th>
                                    <td>'.$form138.'</td>
                                </tr>
                                <tr>
                                    <th>'.$nameBirthCert.'</th>
                                    <td>'.$birth_cert.'</td>
                                </tr>
                                <tr>
                                    <th>'.$nameBClearance.'</th>
                                    <td>'.$barangay_clearance.'</td>
                                </tr>
                                <tr>
                                    <th>'.$nameGoodMor.'</th>
                                    <td>'.$good_moral.'</td>
                                </tr>
                                <tr>
                                    <th>'.$nameIdPic.'</th>
                                    <td>'.$id_picture.'</td>
                                </tr>
                                <tr>
                                    <th>Created On</th>
                                    <td>'.$created_on.'</td>
                                </tr>
                            </tbody>
                        </table>
				';
			}
		}else{
			$output = $noInformation;
		}
		echo $output;
	}
}
?>