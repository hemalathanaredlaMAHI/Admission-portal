
<?php include('header.php'); ?>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="css/step.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<?php $email_id=$_GET['view'];
 ?>
 <style>
	.col-sm-4{
		padding:5px; 
	}
	.col-sm-6{
		padding:5px; 
	}
	.col-sm-3{
		padding:5px; 
	}
 </style>
 
<body>

<form id="regForm" action="create_student_details.php" method="POST" enctype="multipart/form-data">
  
<!-----------------------------Personal Details-------------------------------------------------------------->
<div class="tab">
   <h2> Personal Details: (1 of 6)</h2>
      <p><input type="text" id="firstName" name="firstName" placeholder="First name..." oninput="this.className = ''"></p>
      <p><input type="text" id="lastName" name="lastName" placeholder="Last name..." oninput="this.className = ''"></p>
       <p><label>Date Of birth:</label><input type = "date" name="dateOfBirth" id="dateOfBirth" max="1996-07-31" min="1981-01-31" id="dateOfBirth"  placeholder="Date Of Birth..." oninput="this.className = ''"></p>
       <p id="errors"></p>
          <!------------------------------------ Adhaar Card--------------------------------------------------------->
          <div class="">
             <div class="row">
               <div class="col-sm-12">
                 
                    <label for="exampleFormControlSelect2"><sup> <span style="font-size:80%;color:red;">&starf;</span></sup>Please upload any government ID in PDF format, In verification we will match your GAT/Walk-in exam credentials with this document.</label>
                      <input type="file" id="govtId" name="govtId" accept="application/pdf" oninput="this.className = ''">
               </div>
            
         </div>
      </div>
         <!------------------------------------------------------------------------------------->

</div>

<!--------------------------------- Contact Infromation---------------------------------------------------------------------------->
<div class="tab"><h3>Contact Information: (2 of 6)</h3>
   <div class="container">
      <div class="row">
         <div class="col-sm-4">
            <p><input type="email" id="primaryEmail" name="primaryEmail" placeholder="Your Email..." oninput="this.className = ''"  ></p>
         </div>
         <div class="col-sm-4">
            <p><input type="tel" id="mobileNumber" name="mobileNumber" placeholder="Your Mobile Number" pattern="[0-9]{10}" ></p>
         </div>
         <div class="col-sm-4">
            <p><input type="tel" id="alternateMobileNumber" name="alternateMobileNumber" placeholder="Your Alternate Mobile Number" pattern="[0-9]{10}"></p>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-4">
            <p><input type="text" id="fatherName" name="fatherName" placeholder="Fathers Name..." oninput="this.className = ''" ></p>
         </div>
         <div class="col-sm-4">
            <p><input type="text" id="fatherMobileNumber" name="fatherMobileNumber" placeholder="Fathers Mobile Number..." oninput="this.className = ''" ></p>
         </div>
         <div class="col-sm-4">
            <p><input type="text" id="fatherEmail" name="fatherEmail" placeholder="Fathers Email..."></p>
         </div>

      </div>
      <div class="row">
         <div class="col-sm-4">
            <p><input type="text" id="motherName" name="motherName" placeholder="Mothers Name..." oninput="this.className = ''" ></p>
         </div>
         <div class="col-sm-4">
            <p><input type="text" id="motherMobileNumber" name="motherMobileNumber" placeholder="Mothers Mobile Number..." oninput="this.className = ''" ></p>
         </div>
         <div class="col-sm-4">
            <p><input type="text" id="motherEmail" name="motherEmail" placeholder="Mothers Email..."></p>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-6" style="padding:5px;" >
            <p><TEXTAREA class="form-control" id="permanentAddress" name="permanentAddress" placeholder="Permanent Address..." rows="3" ></TEXTAREA></p>
         </div>
         <div class="col-sm-6" style="padding:5px;">
            <p><TEXTAREA class="form-control" id="temporaryAddress" name="temporaryAddress" placeholder="Temporary Address..." rows="3"></TEXTAREA></p>
         </div>
      </div>
       <p id="contactErrors"><ul><li>Provide your registered email address along with phone numbers, parent contact information, and address for communication.</li></ul></p>
     </div>
   </div>
</div>

<div class="tab"><h3>Academic Details (3 of 6)</h3>

   <div class="container">
      <div class="row">
         <div class="col-sm-6">
            <p><input type="text" id="sscSchoolName" name="sscSchoolName" placeholder="SSC School Name..." oninput="this.className = ''"></p>
         </div>
         <div class="col-sm-3">
            <p> <input type="text" id="sscScore" name="sscScore" placeholder="SSC Score/Points" oninput="this.className = ''"></p>
         </div>
         <div class="col-sm-3">
            <p> <input type="text" id="sscYearOfPassing" name="sscYearOfPassing" placeholder="SSC Year of Passing" oninput="this.className = ''"></p>

         </div>
      </div>
      <div class="row">
         <div class="col-sm-6">
            <p><input type="text" id="interCollageName" name="interCollageName"placeholder="Intermediate Collage Name..." oninput="this.className = ''"></p>
         </div>
         <div class="col-sm-3">
            <p><input type="text" id="interScore" name="interScore" placeholder="Intermediate Score/Poimts" oninput="this.className = ''"></p>
         </div>
         <div class="col-sm-3">
            <p><input type="text" id="interYearOfPassing" name="interYearOfPassing" placeholder="Inter Year of Passing" oninput="this.className = ''"></p>
           
         </div>
      </div>
      <div class="row">
         <div class="col-sm-6">
            <p><input type="text" id="btechCollgeName" name="btechCollgeName" placeholder="B.Tech Collage Name..." oninput="this.className = ''"></p>
         </div>
         <div class="col-sm-3">
            <p><input type="text" id="btechPercentage" name="btechPercentage" placeholder="B.Tech Percentage" oninput="this.className = ''"></p>
         </div>
         <div class="col-sm-3">
            <p><input type="text" id="btechYearOfPassing" name="btechYearOfPassing" placeholder="B.Tech Year of Passing" oninput="this.className = ''"></p>
            
         </div>
      </div>
      <div class="row" >
         <div class="col-offset-sm-6 col-sm-6" >            
			<Select id="btechBranch" name="btechBranch" class="form-control" style="height:40px">
               <option value="">Select Branch</option>
			   <option value="Aeronautical Engineering">Aeronautical Engineering</option>
               <option value="Industrial Engineering">Industrial Engineering</option>
               <option value="Aerospace Engineering">Aerospace Engineering</option>
               <option value="Marine Engineering">Marine Engineering</option>
               <option value="Automobile Engineering">Automobile Engineering</option>
               <option value="Mechanical Engineering">Mechanical Engineering</option>
               <option value="Biomedical Engineering">Biomedical Engineering</option>
               <option value="Mechatronics Engineering">Mechatronics Engineering</option>
               <option value="Biotechnology Engineering">Biotechnology Engineering</option>
               <option value="Metallurgical Engineering">Metallurgical Engineering</option>
               <option value="Ceramic Engineering">Ceramic Engineering</option>
               <option value="Mining Engineering">Mining Engineering</option>
               <option value="Chemical Engineering">Chemical Engineering</option>
               <option value="Petroleum Engineering">Petroleum Engineering</option>
               <option value="Civil Engineering">Civil Engineering</option>
               <option value="Power Engineering">Power Engineering</option>
               <option value="Communications Engineering">Communications Engineering</option>
               <option value="Information Technology">Information Technology</option>
               <option value="Production Engineering">Production Engineering</option>
               <option value="Computer Science Engineering">Computer Science Engineering</option>
               <option value="Robotics Engineering">Robotics Engineering</option>
               <option value="Construction Engineering">Construction Engineering</option>
               <option value="Structural Engineering">Structural Engineering</option>
               <option value="Electrical Engineering">Electrical Engineering</option>
               <option value="Telecommunication Engineering">Telecommunication Engineering</option>
               <option value="Electronics & Communication Engineering">Electronics & Communication Engineering</option>
               <option value="Textile Engineering">Textile Engineering</option>
               <option value="Electronics Engineering">Electronics Engineering</option>
               <option value="Tool Engineering">Tool Engineering</option>
               <option value="Environmental Engineering">Environmental Engineering</option>
               <option value="Transportation Engineering">Transportation Engineering</option>
               <option value="Others">Others</option>
			   </Select>
         </div>         
      </div>
      <h4>Optional</h4>
      <div class="row">
         <div class="col-sm-6">
            <p><input type="text" id="pgCollageName" name="pgCollageName" placeholder="M.Tech Collage Name..." oninput="this.className = ''"></p>
         </div>
         <div class="col-sm-3">
            <p><input type="text" id="pgPercentage" name="pgPercentage" placeholder="M.Tech Percentage" oninput="this.className = ''"></p>
         </div>
         <div class="col-sm-3">
            <p><input type="number" id="pgYearOfPassing" name="pgYearOfPassing" placeholder="M.Tech Year of Passing" min="1990" max="2022"></p>
         </div>
      </div>
      <p id="contactErrors"><ul><li>Give here your educational background information, In case your B.Tech final exams are pending please provide % or CGPA upto final semester. Also indicate if you have additional study like PG or diploma etc.</li></ul></p>
   </div>
</div>
<!----------------------------------------------------------------------------------------------------------->


<div class="tab"><h3>Upload Your Certificates (4 of 6)</h3>
  <div class="container">
    <label for="exampleFormControlSelect2"><b>Note: Upload Only PDF Files:</b></label>
      <div class="row">
         <div class="col-sm-6">
            <label for="exampleFormControlSelect2">Upload SSC Certificate:</label>
         </div>
         <div class="col-sm-6">
            <p><input type="file"  id="sscSchoolCertificate" name="sscSchoolCertificate" accept="application/pdf" oninput="this.className = ''"></p>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-6">
            <label for="exampleFormControlSelect2">Upload Intermediate/Diploma Certificate:</label>
         </div>
         <div class="col-sm-6">
            <p><input type="file"  id="intermediateCertificate" name="intermediateCertificate" accept="application/pdf"  oninput="this.className = ''"></p>
         </div>
      </div>

    
    <br>
      <div id="CMMorProvisionalorOD">
         <label for="exampleFormControlSelect2">Upload atleast one of the following...</label>
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech CMM Certificate</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechCMM" name="btechCMM" accept="application/pdf" oninput="this.className = ''"></p>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech Provisional Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechProvisional" name="btechProvisional" accept="application/pdf" oninput="this.className = ''"></p>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech OD Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechOD" name="btechOD" accept="application/pdf" oninput="this.className = ''"></p>
            </div>
         </div>
      </div>
      <div id="semWiseCertificates" >
         <label for="exampleFormControlSelect2"><u><b>Upload sem wise certificates...</u></b></label>
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech 1st Sem/year Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechFirstSem" name="btechFirstSem" accept="application/pdf" oninput="this.className = ''"></p>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech 2nd Sem Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechSecondSem" name="btechSecondSem" accept="application/pdf"  oninput="this.className = ''"></p>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech 3rd Sem Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechThirdSem" name="btechThirdSem" accept="application/pdf" oninput="this.className = ''"></p>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech 4th Sem Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechFourthSem" name="btechFourthSem" accept="application/pdf" oninput="this.className = ''"></p>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech 5th Sem Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechFifthSem" name="btechFifthSem" accept="application/pdf" oninput="this.className = ''"></p>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech 6th Sem Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechSixthSem" name="btechSixthSem" accept="application/pdf" oninput="this.className = ''"></p>
               
            </div>
         </div>
         
          <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech 7th Sem Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechSeventhSem" name="btechSeventhSem" accept="application/pdf" oninput="this.className = ''"></p>
               
            </div>
         </div>
       
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech 8th Sem Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btecheigthSem" name="btecheigthSem" accept="application/pdf" oninput="this.className = ''"></p>
               
            </div>
         </div>
         <p id="contactErrors"><ul><li>Please upload in PDF format your SSC grade sheet Likewise upload 12th and B.Tech certificates in PDF format. In case your B.Tech final semester exams are pending, upload semester mark sheets till third year.  In case you do not have CMM/Provisional/OD upload semester mark sheets.  .</li>
         <li>In verification we will look for proofs of your B.Tech study</li>
         </ul></p>
       
      </div>
   </div>
</div>

<!---------------------------------------------------------------------------------------------------->
<!----------------------------------------Payment----------------------------------------------------------->




<!--------------------------------------------------------------------->




<!-----------------------------Hallticket and learning centre-------------------------------------------------->

<div class="tab">
   <h3>Choice of learning Center: (5 of 6)</h3>
   <!--------------------------------IIITH---------------------------------------------------------------->
 <div class="row">
         <div class="col-sm-3">
            <label for="exampleFormControlSelect2"><b>1<sup>st </sup>Preference</b> </label>
         </div>
         <div class="col-sm-4">
            <Select id="pref_1" name="pref_1" onChange="changeOptions(this, 2)" placeholder="Select 1<st> Preference" class="form-control">
               <option value="">Select Preference - 1</option>
               <option value="IIIT"> IIIT, Hyderabad</option>
               <option value="JNTUH"> JNTU, Hyderabad</option>
               <option value="JNTUK"> JNTU, Kakinada</option>
			   <option value="JNTUA"> JNTU, Anantapur</option>
               <option value="SVU"> SVU, Tirupati</option>               
            </Select>
         </div>
      </div>
      <!--------------------------------IIITH---------------------------------------------------------------->
 <div class="row">
         <div class="col-sm-3">
            <label for="exampleFormControlSelect2"><b>2<sup>nd</sup> Preference</b> </label>
         </div>
         <div class="col-sm-4">
            <Select id="pref_2" name="pref_2" onChange="changeOptions(this, 3)"  class="form-control">
               <option value="">Select Preference - 2</option>
                             
            </Select>
         </div>
      </div>
      <!--------------------------------IIITH---------------------------------------------------------------->
 <div class="row">
         <div class="col-sm-3">
            <label for="exampleFormControlSelect2"><b>3<sup>rd </sup>Preference</b> </label>
         </div>
         <div class="col-sm-4">
            <Select id="pref_3" name="pref_3" onChange="changeOptions(this, 4)"  class="form-control">
                <option value="">Select Preference - 3</option>
                
            </Select>
         </div>
      </div>
      <!--------------------------------IIITH---------------------------------------------------------------->
 <div class="row">
         <div class="col-sm-3">
            <label for="exampleFormControlSelect2"><b>4<sup>th</sup> Preference</b> </label>
         </div>
         <div class="col-sm-4">
            <Select id="pref_4" name="pref_4" onChange="changeOptions(this, 5)"  class="form-control">
                <option value="">Select Preference - 4</option>
                         
            </Select>
         </div>
      </div>
      <!--------------------------------IIITH---------------------------------------------------------------->
 <div class="row">
         <div class="col-sm-3">
            <label for="exampleFormControlSelect2"><b>5<sup>th </sup>Preference</b> </label>
         </div>
         <div class="col-sm-4">
            <Select id="pref_5" name="pref_5" class="form-control">
               <option value="">Select Preference-5</option>
            </Select>
         </div>
      </div>
      <p id="contactErrors"><ul><li>Please provide preferential choice of University / Learning center for pursuing MSIT program. In case the number of seats in a particular university are full or you wish to change university preferences it can be done during MSIT counseling.</li>
         
         </ul></p>
   
</div>
<!------------------------------------------------------------------------------------------------>
<div class="tab">
   <h3>Payment and Details: (6 of 6)</h3>
       <div class="container">
         <p><b>If you have already Paid Enter details below</p></b>
         <div class="row">
              <div class="col-sm-6">
                <p><input type="text" id="pay_mode" name="pay_mode" placeholder="Tranaction ID/Reference Number" oninput="this.className = ''"></p>
              </div>
           
           
              <div class="col-sm-3">
                <p> <input type="text" id="trans_id" name="trans_id" placeholder="Amount" oninput="this.className = ''"></p>
              </div>
          
           
             <div class="col-sm-3">
               <p><input type="text" id="trans_date" name="trans_date" placeholder="Trasaction Date" oninput="this.className = ''"></p>
            </div>
          </div>
           <p><b>or Pay at below link:</p></b>
            <div class="row">
             <div class="col-sm-6">
                   <table width="100%" border="0" align="" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="32%" align=""><h3><a href="https://www.msitprogram.net/admissions/paymentAdmissions.php" class="newslinks22" target="_blank">
                          <i class="fa fa-hand-o-right"></i>
                          <strong><u>Online Payment link</u></strong></a></h3>
                        </td>
                    </tr>
                   </table>
             </div>
          </div>
          <p id="contactErrors"><ul><li>You can pay online through MSIT payment portal or use GPay or Paytm to directly transfer admission fee into Consortium of Institutions of Higher Learning (CIHL) bank account.  Please transfer admission fee of Rupees Thirty thousand only (Rs. 30,000. /- ) to following back account:
         </li>
         <ul>
            <li>Account name: CIHL </li>
            <li>Account number: 52081085235</li>
            <li>IFSC code: SBIN0021161</li>
            <li>Branch name: SBI, IIIT Campus, Gachibowli.</li>
         </ul>
         <li>To obtain admission/seat in MSIT this payment process is mandatory, students are not allowed to attend counseling sessions if admission fee is not paid. In case a student wants to withdraw / decline admission, they can initiate a refund during MSIT counselling.
</li>
</ul>

             
      
   </div>
 </div>

<!-------------------------------------------------------------------------------------------------->
<div style="overflow:auto;padding-top: 10px;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>


<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
 <span class="step"></span>
</div>

</form>

<script type="text/javascript">
   var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
/************************************************************/
function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}
/********************************************************************/

function nextPrev(n)
 {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");

  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  

  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return true;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}
/*****************************************************************************/
/*
$('input[name="isUnderGraduate"]').bind('change',function(){
    var showOrHide = ($(this).val() == 1) ? true : false;
    if (showOrHide) {
      $('#semWiseCertificates').toggle(false);
      $('#CMMorProvisionalorOD').toggle(true);
    } else {
      $('#semWiseCertificates').toggle(true);
      $('#CMMorProvisionalorOD').toggle(true);
    }
 });*/

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "" && y[i].required==true) {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
var sel_options = [];       
var options = {"IIIT":"MSIT Division, IIIT, Hyderabad", "JNTUH":"MSIT Division, JNTU, Hyderabad", "JNTUK":"MSIT Division, JNTU, Kakinada", "JNTUA":"MSIT Division, JNTU, Anantapur", "SVU":"MSIT Division, SVU, Tirupati"};
function changeOptions(sel, prefno){
	sel_options.push(sel.value);	
	ele = document.getElementById("pref_"+prefno);
	for(var key in options){
		//console.log(options[key]);		
		if(!sel_options.includes(key)){
			//console.log(options[key]);
			var option = document.createElement("option");
			//option.text = options[key];
			option.appendChild(document.createTextNode(options[key]));
			option.value = key;
			ele.appendChild(option);
		}
	}
	
	
}

</script>
<?php include('footer.php'); ?>