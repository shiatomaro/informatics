<?php
require_once('connection.php');
session_start();
extract($_POST);

if (isset($Register)) {
    //check user alereay exists or not
    $sql = mysqli_query($con, "select * from registration where usn = '$USN'");
    $r = mysqli_num_rows($sql);
    if ($r == true) {
        $err = "<font color='red'>USN Already Exists..!</font>";
    } else {
        //image
        $image1 = $_FILES['img']['name'];
        //encrypt your password
        $pass = md5($psswd);



        $query = "insert into registration values('','$fname','$lname','$dob','$USN','$mail','$dept','$sem','$gen','$phone','$image1','$pass')";
        $data = mysqli_query($con, $query);

        //upload image

        mkdir("images/$USN");
        move_uploaded_file($_FILES['img']['tmp_name'], "images/$USN/" . $_FILES['img']['name']);

        if ($data) {
            $err = "<font color='green'>Registered successfully...!!</font>";
        }
    }
}
?>
<!-- register.php -->
<!-- REGISTRATION FORM -->

   <?php require_once('header.php'); ?>
    <!--Form-->
    <div class=" mcontainer">
        <form name="register" method="post" class="myform" action="" enctype="multipart/form-data">
            <h1 class="tit">Registration</h1>
            <?php echo @$err; ?>
            <hr class="mhr" color="black" height="15px" />
            <table width="100%">
                <tr>
                    <td>
                        <label class="label required">First Name</label>
                    </td>

                    <td>

                    </td>

                    <td class="td1">
                        <input type="text" autocomplete="off" name="fname" placeholder="First Name" class="required" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Last Name</label>
                    </td>

                    <td>

                    </td>

                    <td class="td1">
                        <input type="text" name="lname" autocomplete="off" placeholder="Last Name" required />
                    </td>
                </tr>


                <tr>
                    <td>
                        <label>Birth Date</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="date" name="dob" autocomplete="off" placeholder="YYYY/MM/DD" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label">Gender</label>
                    </td>

                    <td>

                    </td>

                    <td class="td1">
                        <input type="radio" name="gen" value="M" />&nbsp;&nbsp;&nbsp;&nbsp;Male
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="gen" value="F" />&nbsp;&nbsp;&nbsp;&nbsp;Female
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">USN</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="text" name="USN" autocomplete="off" placeholder="1BM19CS000" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Email</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="email" name="mail" autocomplete="off" placeholder="student.cs19@bmsce.ac.in" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Department</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <select name="dept" class="select1" autocomplete="off" placeholder="computer science" required>
                            <option name="s1" selected> Computer Science & Engineering</option>
                            <option name="s2"> Information Science Engineering</option>
                            <option name="s3"> Civil Engineering </option>
                            <option name="s4"> Aerospace Engineering </option>
                            <option name="s5"> Medical Engineering </option>
                            <option name="s6"> Electrical Engineering </option>
                            <option name="s7"> Mechnical Engineering </option>
                            <option name="s8"> Electronincs & Communication </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Semester</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <select name="sem" autocomplete="off" class="select12" placeholder="" required>
                            <option name="s1" disabled> 1 </option>
                            <option name="s2"> 2 </option>
                            <option name="s3" disabled> 3 </option>
                            <option name="s4" selected> 4 </option>
                            <option name="s5" disabled> 5 </option>
                            <option name="s6"> 6 </option>
                            <option name="s7" disabled> 7 </option>
                            <option name="s8"> 8 </option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="phone" autocomplete="off" name="phone" id="phone" placeholder="9998887776" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Upload Your Image</label>

                    </td>
                    <td> </td>
                    <td><input class="form-control" type="file" name="img" id="img" /></td>
                </tr>

                <tr>
                    <td>
                        <label class="label required">Password</label>
                    </td>
                    <td>

                    </td>
                    <td class="td1" class="label required">
                        <input type="password" name="psswd" id="pass1" placeholder="Password" required />
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="Register" class="login_btn" value="Submit" />
                    </td>
                    <td>

                    </td>
                    <td class="td1">
                        <input type="reset" onClick="window.location.href=window.location.href" class="reset_btn" value="Reset" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <!--Scroll Up js File-->
    <script src="js/scroll.js"></script>
    <a id="back-to-top" data-toggle="tooltip" data-placement="auto" title="Back-to-Top" style="color:#000;background-color:#30888D;border:2px solid black;" href="#" class="btn-light btn-lg back-to-top" role="button"><i class="fas fa-arrow-up"></i></a>
    <?php require_once('footer.php'); ?>
</body>

</html>