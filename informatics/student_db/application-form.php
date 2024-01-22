<html>

<head>
    <meta charset="UTF-8">
    <title>Application Form</title>

    <link href="css/form.css" rel="stylesheet" type="text/css">
    <script src="validation.js"></script>
    <link rel="stylesheet" href="form.css">
</head>

<body class="zf-backgroundBg"></body>
<div class="template">
    <form action='_blank' name='form' method='POST' onSubmit='javascript:document.charset="UTF-8"; return ValidateAndSubmit();' accept-charset='UTF-8' enctype='multipart/form-data' id='form'><input type="hidden" name="zf_referrer_name" value=""><!-- To Track referrals , place the referrer name within the " " in the above hidden input field -->
        <input type="hidden" name="redirect" value="">
        <input type="hidden" name="zc_gad" value="">
        <div class="templateWrapper">

            <!---------Start of Application---------->
            <!---------Start of Header---------->
            <ul class="header">
                <li class="template-head">
                    <h2 class="form-title">
                        <em>Informatics Northgate College, Alabang Admission Application Form</em>
                    </h2>
                    <p class="form-desc">Fill-up form for admission</p>
                    <div class="clearboth"></div>
                </li>
            </ul>
            <!---------End of Header---------->
            <!---------Start of Application Information "Note: 143 - S"---------->
            <div class="form-wrapper top-align">
                <ul>
                    <!---------Name starts here "Note: I wanna be renamed, CHEEsedog - S"---------->
                    <li class="form-fill-wrapper form-name form-namelarge">
                        <label class="labelname">Student Name</label>
                        <div class="form-container form-threeType">
                            <div class="form-nameWrapper">
                                <span> <input type="text" maxlength="255" name="Name_First" fieldType=7 placeholder="" /> <label>First Name</label>
                                </span>
                                <span> <input type="text" maxlength="255" name="Name_Middle" fieldType=7 placeholder="" /> <label>Middle Name</label>
                                </span>
                                <span> <input type="text" maxlength="255" name="Name_Last" fieldType=7 placeholder="" /> <label>Last Name</label>
                                </span>
                                <div class="clearboth"></div>
                            </div>
                            <p id="Name_error" class="errorMessage" style="display:none;">Invalid value</p>
                        </div>
                        <div class="clearboth"></div>
                    </li><!---------Name Ends Here---------->
                    <!---------Image Upload Starts Here---------->
                    <li class="form-fill-wrapper"><label class="labelname">1x1 Picture
                        </label>
                        <div class="form-container">
                            <input type="file" accept="image/*" name="Profile" checktype="c1" />
                            <p id="ImageUpload_error" class="errorMessage" style="display:none;">Choose any file for this field.</p>
                        </div>
                        <div class="clearboth"></div>
                    </li><!---------Image Upload Ends Here---------->
                    <!--fileupload-->
                    <!---------Additional Information---------->
                    <li class="form-fill-wrapper form-name form-namelarge">
                        <label class="labelname">Additional Information</label>
                        <div class="form-container form-twoType">
                            <div class="form-nameWrapper">
                                <span> <input type="text" aria-hidden="true" name=" maxlength=" 255" name="Email-Address" fieldType=7 placeholder="" /> <label>Email Address</label>
                                </span>
                                </span> </span>
                                <span> <input type="text" maxlength="255" name="Number" fieldType=7 placeholder="" /> <label>Contact Number</label>
                                </span>
                                </span> </span>
                                <div class="clearboth"></div>
                            </div>
                            <p id="Name_error" class="errorMessage" style="display:none;">Invalid value</p>
                        </div>
                        <div class="form-container form-twoType">
                            <div class="form-nameWrapper">
                                <span> <input type="text" aria-hidden="true" name=" maxlength=" 255" name="Address" fieldType=7 placeholder="" /> <label>Present Address</label>
                                </span>
                                </span> </span>
                                <span> <input type="text" maxlength="255" name="Citizenship" fieldType=7 placeholder="" /> <label>Citizenship</label>
                                </span>
                                </span> </span>
                                <div class="clearboth"></div>
                            </div>
                            <p id="Name_error" class="errorMessage" style="display:none;">Invalid value</p>
                        </div>
                        <div class="form-container form-twoType">
                            <div class="form-nameWrapper">
                                <span> <input type="text" aria-hidden="true" name=" maxlength=" 255" name="Civil-Status" fieldType=7 placeholder="" /> <label>Civil Status</label>
                                </span>
                                </span> </span>
                                <span> <input type="text" maxlength="255" name="RS-Status" fieldType=7 placeholder="" /> <label>Relationship Status</label>
                                </span>
                                </span> </span>
                                <div class="clearboth"></div>
                            </div>
                            <p id="Name_error" class="errorMessage" style="display:none;">Invalid value</p>
                        </div>
                        <div class="clearboth"></div>
                    </li>
                    <!---------End of Additional Status, "Hehe comment lang ako, i got bored cleaning this - S"---------->

                    <!---------Date Starts Here---------->
                    <li class="form-fill-wrapper zf-date"><label class="labelname">
                            Date of birth
                        </label>
                        <div class="form-container">
                            <span> <input type="text" name="DOB" checktype="c4" value="" maxlength="25" placeholder="" /><label>dd-MMM-yyyy</label> </span>
                            <div class="clearboth"></div>
                            <p id="Date_error" class="errorMessage" style="display:none;">Invalid value</p>
                        </div>
                        <div class="clearboth"></div>
                    </li>
                    <!---------Date Ends Here---------->

                    <!---------Start Of Gender "note: I was thinking if two lang or i should add more eh - Shia" ---------->
                    <li class="form-gender form-fill-wrapper form-sideBySide"><label class="labelname"> Sex Assigned at Birth
                        </label>
                        <div class="form-container">
                            <div class="form-overflow">
                                <span class="form-multiAttType">
                                    <input class="form-genderBtnType" type="radio" id="Radio_1" name="Male" checktype="c1" value="Male">
                                    <label for="Radio_1" class="form-genderChoice">Male</label> </span>
                                <span class="form-multiAttType">
                                    <input class="form-genderBtnType" type="radio" id="Radio_2" name="Female" checktype="c1" value="Female">
                                    <label for="Radio_2" class="form-genderChoice">Female</label> </span>
                                <div class="clearboth"></div>
                            </div>
                            <p id="Radio_error" class="errorMessage" style="display:none;">Invalid value</p>
                        </div>
                        <div class="clearboth"></div>
                    </li>
                    <!---------End of gender, "Note: But you did said it wads okay na dalawa lang.. so I made it 'Sex assigned at birth' instead of 'gender' -Shia"---------->

                    <!---------Mother, Father, and Guardian Info---------->
                    <li class="form-fill-wrapper form-name form-namelarge"><label class="labelname">
                            Mother
                        </label>
                        <div class="form-container form-twoType">
                            <div class="form-nameWrapper">
                                <span> <input type="text" maxlength="255" name="mother-name" fieldType=7 placeholder="" /> <label>Full Name</label>
                                </span>
                                </span> </span>
                                <span> <input type="text" maxlength="255" name="mother-occupation" fieldType=7 placeholder="" /> <label>Occupation</label>
                                </span>
                                </span> </span>

                                <div class="clearboth"></div>
                            </div>
                            <p id="Name_error" class="errorMessage" style="display:none;">Invalid value</p>
                        </div>
                        <div class="clearboth"></div>
                    </li>

                    <li class="form-fill-wrapper form-name form-namelarge"><label class="labelname">
                            Father
                        </label>
                        <div class="form-container form-twoType">
                            <div class="form-nameWrapper">
                                <span> <input type="text" maxlength="255" name="father-name" fieldType=7 placeholder="" /> <label>Full Name</label>
                                </span>
                                </span> </span>
                                <span> <input type="text" maxlength="255" name="father-occupation" fieldType=7 placeholder="" /> <label>Occupation</label>
                                </span>
                                </span> </span>
                                <div class="clearboth"></div>
                            </div>
                            <p id="Name_error" class="errorMessage" style="display:none;">Invalid value</p>
                        </div>
                        <div class="clearboth"></div>
                    </li>
                    <li class="form-fill-wrapper form-name form-namelarge"><label class="labelname">
                            Guardian
                        </label>
                        <div class="form-container form-twoType">
                            <div class="form-nameWrapper">
                                <span> <input type="text" maxlength="255" name="guardian-name" fieldType=7 placeholder="" /> <label>Full Name</label>
                                </span>
                                </span> </span>
                                <span> <input type="text" maxlength="255" name="guardian-occupation" fieldType=7 placeholder="" /> <label>Occupation</label>
                                </span>
                                </span> </span>
                                <div class="clearboth"></div>
                            </div>
                            <p id="Name_error" class="errorMessage" style="display:none;">Invalid value</p>
                        </div>
                        <div class="clearboth"></div>
                    </li>
                    <!---------End of Mother, Father, and Guardian Info But We Will Never End HAHA---------->

                    <!---------Start of Education Questions---------->
                    <!--- Start of Grade Level-->
                    <li class="form-fill-wrapper form-large">
                        <label class="labelname">Grade level you're applying for</label>
                        <div class="form-container">
                            <select class="form-form-sBox" name="grade-level" checktype="c1">
                                <option selected="true" value="-Select-">-Grade level-</option>
                                <option value="Grade11">Grade 11</option>
                                <option value="Grade12">Grade 12</option>
                                <option value="FIRSTYR">First year College</option>
                                <option value="SECONDYR">Second year College</option>
                                <option value="THIRDYR">Third year College</option>
                                <option value="FOURTHYR">Fourth year College</option>
                    </li>
                    </select>
                    <p id="Dropdown_error" class="errorMessage" style="display:none;">Invalid value</p>
            </div>
            <div class="clearboth"></div>
            <!-- End of Grade level, "Samedt i wanna graduate na - S"-->

            <!--- Start of Course Choices-->
            <li class="form-fill-wrapper form-large">
                <label class="labelname">Preffered Course/Strand</label>
                <div class="form-container">
                    <select class="form-form-sBox" name="first-choice" checktype="c1">
                        <option selected="true" value="-Select-">-First Choice-</option>
                        <option value="HUMMS">SHS: HUMMS</option>
                        <option value="ICT-Animation">SHS: ICT-Animation</option>
                        <option value="ICT-Programming">SHS: ICT-Programming</option>
                        <option value="GAS">SHS: GAS</option>
                        <option value="ABM">College: ABM</option>
                        <option value="BSIT">College: BSIT</option>
                        <option value="BSBA">College: BSBA</option>
                        <option value="BSCS">College: BSCS</option>
            </li>
            </select>
            <p id="Dropdown_error" class="errorMessage" style="display:none;">Invalid value</p>
        </div>
        <div class="clearboth"></div>
        <div class="form-container">
            <select class="form-form-sBox" name="second-choice" checktype="c1">
                <option selected="true" value="-Select-">-Second Choice-</option>
                <<option value="HUMMS">SHS: HUMMS</option>
                    <option value="ICT-Animation">SHS: ICT-Animation</option>
                    <option value="ICT-Programming">SHS: ICT-Programming</option>
                    <option value="GAS">SHS: GAS</option>
                    <option value="ABM">College: ABM</option>
                    <option value="BSIT">College: BSIT</option>
                    <option value="BSBA">College: BSBA</option>
                    <option value="BSCS">College: BSCS</option>
                    </li>
            </select>
            <p id="Dropdown_error" class="errorMessage" style="display:none;">Invalid value</p>
        </div>
        <div class="clearboth"></div>
        <!-- End of Grade level, "Samedt i wanna graduate na - S"-->

        <!-- Previous School-->
        <div class="form-container">
            <li class="form-fill-wrapper form-large">
                <label class="labelname">
                    Previous School
                </label>
                <select class="form-form-sBox" name="previous-school" checktype="c1">
                    <option selected="true" value="-Select-">-Previous School Before Applying-</option>
                    <!-- List of schools -->
                    <option value="Anima Christi Center for Learning and Human Development">Anima Christi Center for Learning and Human Development</option>
                    <option value="APEC">APEC</option>
                    <option value="Bay View Academy">Bay View Academy</option>
                    <option value="Christ Baptist Academy">Christ Baptist Academy</option>
                    <option value="Christ the King School of Muntinlupa">Christ the King School of Muntinlupa</option>
                    <option value="Christ the Living Intercessor Christian School">Christ the Living Intercessor Christian School</option>
                    <option value="Colegio de Muntinlupa">Colegio de Muntinlupa</option>
                    <option value="Colegio de Nuestra Señora de Guadalupe">Colegio de Nuestra Señora de Guadalupe</option>
                    <option value="Cupang Senior High School">Cupang Senior High School</option>
                    <option value="De La Salle Zobel School">De La Salle Zobel School</option>
                    <option value="Divine Mercy School">Divine Mercy School</option>
                    <option value="Emmanuel John Institute of Science And Technology, Inc.">Emmanuel John Institute of Science And Technology, Inc.</option>
                    <option value="Far Eastern University Alabang">Far Eastern University Alabang</option>
                    <option value="Facilities Management College">Facilities Management College</option>
                    <option value="Holy Queen of La Salette School">Holy Queen of La Salette School</option>
                    <option value="Infant Jesus Montessori School of Muntinlupa - Parkhomes">Infant Jesus Montessori School of Muntinlupa - Parkhomes</option>
                    <option value="Kennedy International School of Business and Languages">Kennedy International School of Business and Languages</option>
                    <option value="Lakewood School of Alabang">Lakewood School of Alabang</option>
                    <option value="Le Sainte School">Le Sainte School</option>
                    <option value="Liceo de Alabang, Inc.">Liceo de Alabang, Inc.</option>
                    <option value="Liceo de Piccolo Santo">Liceo de Piccolo Santo</option>
                    <option value="Living Light Academy">Living Light Academy</option>
                    <option value="Lombosco Academy Foundation, Inc.">Lombosco Academy Foundation, Inc.</option>
                    <option value="Lyceum of Alabang INC.">Lyceum of Alabang INC.</option>
                    <option value="Maria Ferarri School">Maria Ferarri School</option>
                    <option value="Maranatha Christian Academy - Bayanan">Maranatha Christian Academy - Bayanan</option>
                    <option value="Mary Cause of our Joy Catholic School">Mary Cause of our Joy Catholic School</option>
                    <option value="Mary, Mother of God Parochial School">Mary, Mother of God Parochial School</option>
                    <option value="MBC-Sinai School">MBC-Sinai School</option>
                    <option value="Miraculous Medal School">Miraculous Medal School</option>
                    <option value="MIT International School">MIT International School</option>
                    <option value="Muntinlupa Business High School">Muntinlupa Business High School</option>
                    <option value="Muntinlupa Cosmopolitan School">Muntinlupa Cosmopolitan School</option>
                    <option value="Muntinlupa Institute of Technology (MIT)">Muntinlupa Institute of Technology (MIT)</option>
                    <option value="Muntinlupa National High School">Muntinlupa National High School</option>
                    <option value="Muntinlupa Science High School">Muntinlupa Science High School</option>
                    <option value="Our Lady of The Abandoned Catholic School">Our Lady of The Abandoned Catholic School</option>
                    <option value="Our Lady of the Lake School">Our Lady of the Lake School</option>
                    <option value="Pamantasan ng Lungsod ng Muntinlupa (PLMun)">Pamantasan ng Lungsod ng Muntinlupa (PLMun)</option>
                    <option value="PAREF Ridgefield School">PAREF Ridgefield School</option>
                    <option value="PAREF Rosemont School">PAREF Rosemont School</option>
                    <option value="PAREF Southridge School">PAREF Southridge School</option>
                    <option value="Pedro E. Diaz High School">Pedro E. Diaz High School</option>
                    <option value="Ridgeview Academy">Ridgeview Academy</option>
                    <option value="Sacred Heart Institute">Sacred Heart Institute</option>
                    <option value="Santo Niño School of Muntinlupa">Santo Niño School of Muntinlupa</option>
                    <option value="Servite School, Inc.">Servite School, Inc.</option>
                    <option value="Soldier's Hills Elementary School">Soldier's Hills Elementary School</option>
                    <option value="South Crest School">South Crest School</option>
                    <option value="Southernside Montessori School">Southernside Montessori School</option>
                    <option value="Spring Christian School">Spring Christian School</option>
                    <option value="STI College (Alabang Branch)">STI College (Alabang Branch)</option>
                    <option value="Sto. Domingo Pascual Academy, Inc.">Sto. Domingo Pascual Academy, Inc.</option>
                    <option value="Sunshine Christian School of Muntinlupa">Sunshine Christian School of Muntinlupa</option>
                    <option value="Theresiana de Montealegre Dame School">Theresiana de Montealegre Dame School</option>
                    <option value="The Birthright School of Muntinlupa">The Birthright School of Muntinlupa</option>
                    <option value="Tunasan National High School">Tunasan National High School</option>
                    <option value="OM">Outside of Muntinlupa:</option>
            </li>
            <div class="form-container">
                <span> <input type="text" name="SingleLine" checktype="c1" value="" maxlength="255" fieldType=1 placeholder="Others" /></span>
                <p id="SingleLine_error" class="errorMessage" style="display:none;">Invalid value</p>
            </div>
            <div class="clearboth"></div>
            </select>
            <p id="Dropdown_error" class="errorMessage" style="display:none;">Invalid value</p>
        </div>
        <div class="clearboth">
            <!---------End of Educational Questions---------->

            <!---------More Infomation---------->
            <li class="form-fill-wrapper form-name form-namelarge">
                <label class="labelname"> Occupation </label>
                <div class="form-container">
                    <span> <input type="text" name="student-occupation" checktype="c1" value="" maxlength="255" fieldType=1 placeholder="" /></span>
                    <p id="SingleLine1_error" class="errorMessage" style="display:none;">Invalid value</p>
                </div>
                <div class="clearboth"></div>
            </li>
            <!---------Single Line Ends Here---------->
            <!---------Multiple Line Starts Here---------->
            <li class="form-fill-wrapper form-large"><label class="labelname">
                    Any medical condition to mention about the student?
                </label>
                <div class="form-container">
                    <span> <textarea name="MultiLine" checktype="c1" maxlength="65535" placeholder=""></textarea> </span>
                    <p id="MultiLine_error" class="errorMessage" style="display:none;">Invalid value</p>
                </div>
                <div class="clearboth"></div>
            </li><!---------Multiple Line Ends Here----------><!---------File Upload Starts Here---------->

            <!---------File Upload Starts Here---------->
            <li class="form-fill-wrapper"><label class="labelname">Payment for Admission
                </label>
                <div class="form-container">
                    <input type="file" name="payment" checktype="c1" />
                    <p id="FileUpload_error" class="errorMessage" style="display:none;">Choose any file for this field.</p>
                </div>
                <div class="clearboth"></div>
            </li><!---------File Upload Ends Here---------->
            <!--Image Upload-->
            <!---------File Upload Starts Here---------->
            <li class="form-fill-wrapper"><label class="labelname">Birth Certificate
                </label>
                <div class="form-container">
                    <input type="file" name="nso" checktype="c1" />
                    <p id="FileUpload_error" class="errorMessage" style="display:none;">Choose any file for this field.</p>
                </div>
                <div class="clearboth"></div>
            </li><!---------File Upload Ends Here---------->
            <!--Image Upload-->
            <!---------File Upload Starts Here---------->
            <li class="form-fill-wrapper"><label class="labelname"> Form-138
                </label>
                <div class="form-container">
                    <input type="file" name="form-138" checktype="c1" />
                    <p id="FileUpload_error" class="errorMessage" style="display:none;">Choose any file for this field.</p>
                </div>
                <div class="clearboth"></div>
            </li><!---------File Upload Ends Here---------->
            <!---------File Upload Starts Here---------->
            <li class="form-fill-wrapper"><label class="labelname">Form-137
                </label>
                <div class="form-container">
                    <input type="file" name="form-137" checktype="c1" />
                    <p id="FileUpload_error" class="errorMessage" style="display:none;">Choose any file for this field.</p>
                </div>
                <div class="clearboth"></div>
            </li><!---------File Upload Ends Here---------->
            <!--Image Upload-->

            <!---------File Upload Starts Here---------->
            <li class="form-fill-wrapper"><label class="labelname">Good Moral
                </label>
                <div class="form-container">
                    <input type="file" name="good-moral" checktype="c1" />
                    <p id="FileUpload_error" class="errorMessage" style="display:none;">Choose any file for this field.</p>
                </div>
                <div class="clearboth"></div>
            </li><!---------File Upload Ends Here---------->
            <!--Image Upload-->

            <!---------File Upload Starts Here---------->
            <li class="form-fill-wrapper"><label class="labelname">Baranggay Clearance
                </label>
                <div class="form-container">
                    <input type="file" name="baranggay-clearance" checktype="c1" />
                    <p id="FileUpload_error" class="errorMessage" style="display:none;">Choose any file for this field.</p>
                </div>
                <div class="clearboth"></div>
            </li><!---------File Upload Ends Here---------->
            <!--Image Upload-->

            <!--Image Upload-->
            <!---------File Upload Starts Here---------->
            <li class="form-fill-wrapper"><label class="labelname">Previous School Transfer Certificate (If applicable)
                </label>
                <div class="form-container">
                    <input type="file" name="transfer-certificate" checktype="c1" />
                    <p id="FileUpload1_error" class="errorMessage" style="display:none;">Choose any file for this field.</p>
                </div>
                <div class="clearboth"></div>
            </li><!---------File Upload Ends Here---------->
            <!--Terms and conditions-->
            <li class="form-fill-wrapper"><label class="labelname">
                    Terms and Conditions
                </label>
                <div class="form-container">
                    <div class="form-termsContainer">
                        <div class="form-termsMsg form-descFld">
                            <p style="margin: 12pt 0px; line-height: 1.2; direction: ltr" class="zw-paragraph heading0"><span style="vertical-align: baseline">It is required for the student to clear an non-graded examination and an admission fee of 500 pesos to be admitted to the school.</span><br /></p>
                            <div><span style="vertical-align: baseline">I agree with the terms and conditions of the school and declare that the information provided above is correct.</span> <br /></div>
                        </div>
                        <div class="form-termsAccept"><input class="form-checkBoxType form-flLeft" name="TermsConditions" type="checkbox"><label class="form-descFld">I accept the Terms and Conditions.</label></div>
                    </div>
                </div>
                <p class="errorMessage" elname="error" id="TermsConditions_error" style="display:none;">Invalid value</p>
                <div class="clearBoth"></div>
            </li>

            </ul>
        </div><!---------template Container Starts Here---------->
        <ul>
            <li class="form-fmFooter"><button class="form-submitColor">Submit</button></li>
        </ul>
</div><!-- 'templateWrapper' ends --></form>
</div><!-- 'template' ends -->
<script type="text/javascript">
    var DateReg = new RegExp("^(([0][1-9])|([1-2][0-9])|([3][0-1]))[-](Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec|JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)[-](?:(?:19|20)[0-9]{2})$");
    var MandArray = [];
    var FieldArray = ["Name_First", "Name_Middle", "Name_Last", "DOB", "Male", "Female", "SingleLine", "Dropdown", "Dropdown1", "mother-name", "mother-occupation", "father-name", "father-occupation", "guardian-name", "guardian-occupation", "grade-level", "first-choice", "second-choice", "previous-school", "SingleLine1", "MultiLine", "payment", "nso", "form-138", "form-137", "good-moral", "baranggay-clearance", "transfer-certificate", "TermsConditions"];
    var IntegrationEnabled = false;
    var salesIQFieldsArray = [];
</script>
</body>

</html>