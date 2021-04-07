<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="css/step.css" rel="stylesheet">


<body>
<form id="regForm" action="/action_page.php">

<!-- <h1>Register for counselling:</h1> -->

<!-- One "tab" for each step in the form: -->
<div class="tab"> <h2> Personal Details: </h2>
  <p><input type="text" id="firstName" placeholder="First name..." oninput="this.className = ''"></p>
  <p><input type="text" id="lastName" placeholder="Last name..." oninput="this.className = ''"></p>
  <p><input type="text" id="aadharNumber" placeholder="Your Aadhar Number. <XXXX-XXXX-XXXX>" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" maxlength="14" oninput="this.className = ''"></p>
  <p><input type = "date" max="1996-07-31" min="1981-01-31" id="dateOfBirth" placeholder="Date Of Birth..." oninput="this.className = ''"></p>
  <p id="errors"></p>
</div>

<div class="tab"><h3>Contact Information:</h3>
   <div class="container">
      <div class="row">
         <div class="col-sm-4">
            <p><input type="email" id="primaryEmail" placeholder="Your Email..." oninput="this.className = ''"  ></p>
         </div>
         <div class="col-sm-4">
            <p><input type="tel" id="studentMobileNumber" name="studentMobileNumber" placeholder="Your Mobile Number" pattern="[0-9]{10}" ></p>
         </div>
         <div class="col-sm-4">
            <p><input type="tel" id="studentAltMobileNumber" name="studentAltMobileNumber" placeholder="Your Alternate Mobile Number" pattern="[0-9]{10}"></p>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-4">
            <p><input type="text" id="fatherName" placeholder="Fathers Name..." oninput="this.className = ''" ></p>
         </div>
         <div class="col-sm-4">
            <p><input type="text" id="fatherMobileNumber" placeholder="Fathers Mobile Number..." oninput="this.className = ''" ></p>
         </div>
         <div class="col-sm-4">
            <p><input type="text" id="fatherEmail" placeholder="Fathers Email..."></p>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-4">
            <p><input type="text" id="motherName" placeholder="Mothers Name..." oninput="this.className = ''" ></p>
         </div>
         <div class="col-sm-4">
            <p><input type="text" id="motherMobileNumber" placeholder="Mothers Mobile Number..." oninput="this.className = ''" ></p>
         </div>
         <div class="col-sm-4">
            <p><input type="text" id="motherEmail" placeholder="Mothers Email..."></p>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-6">
            <p><TEXTAREA class="form-control" id="permanentAddress" placeholder="Permanent Address..." rows="3" ></TEXTAREA></p>
         </div>
         <div class="col-sm-6">
            <p><TEXTAREA class="form-control" id="temporaryAddress" placeholder="Temporary Address..." rows="3"></TEXTAREA></p>
         </div>
      </div>
       <p id="contactErrors"></p>
     </div>
   </div>
</div>

<div class="tab"><h3>Academic Details</h3>

   <div class="container">
      <div class="row">
         <div class="col-sm-6">
            <p><input type="text" id="sscSchool" name="sscSchool" placeholder="SSC School Name..." oninput="this.className = ''"></p>
         </div>
         <div class="col-sm-3">
            <p> <input type="text" id="sscScore" name="sscScore" placeholder="SSC Score/Points" oninput="this.className = ''"></p>
         </div>
         <div class="col-sm-3">
            <p><input type="number" id="sscYearOfPassing" name="sscYearOfPassing" placeholder="SSC Year of Passing" min="1990" max="2020"></p>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <div class="checkbox">
               <label><input type="checkbox" id="diploma" name="diploma" value="">Check this if you are from diploma</label>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-6">
            <p><input type="text" id="interCollageName" placeholder="Intermediate Collage Name..." oninput="this.className = ''"></p>
         </div>
         <div class="col-sm-3">
            <p><input type="text" id="interScore" placeholder="Intermediate Score/Poimts" oninput="this.className = ''"></p>
         </div>
         <div class="col-sm-3">
            <p><input type="number" id="intermediateYearOfPassing" name="interYearOfPassing" placeholder="Inter Year of Passing" min="1990" max="2020"></p>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-6">
            <p><input type="text" id="btechCollgeName" placeholder="B.Tech Collage Name..." oninput="this.className = ''"></p>
         </div>
         <div class="col-sm-3">
            <p><input type="text" id="btechPercentage" placeholder="B.Tech Percentage" oninput="this.className = ''"></p>
         </div>
         <div class="col-sm-3">
            <p><input type="number" id="btechYearOfPassing" name="btechYearOfPassing" placeholder="B.Tech Year of Passing" min="1990" max="2022"></p>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-3">
            <label for="exampleFormControlSelect2">Select B.Tech Branch: </label>
         </div>
         <div class="col-sm-8">
            <Select id="btechBranch" placeholder="Select B.Tech Branch" class="form-control">
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
            <p><input type="text" id="pgCollageName" placeholder="M.Tech Collage Name..." oninput="this.className = ''"></p>
         </div>
         <div class="col-sm-3">
            <p><input type="text" id="pgPercentage" placeholder="M.Tech Percentage" oninput="this.className = ''"></p>
         </div>
         <div class="col-sm-3">
            <p><input type="number" id="pgYearOfPassing" name="btechYearOfPassing" placeholder="M.Tech Year of Passing" min="1990" max="2022"></p>
         </div>
      </div>
   </div>
</div>

<div class="tab"><h3>Upload Your Certificates</h3>
  <div class="container">
    <label for="exampleFormControlSelect2"><b>Note: Upload Only PDF Files:</b></label>
      <div class="row">
         <div class="col-sm-6">
            <label for="exampleFormControlSelect2">Upload SSC Certificate:</label>
         </div>
         <div class="col-sm-6">
            <p><input type="file" file_extension=".pdf" id="sscSchoolCertificate" name="sscSchoolCertificate" oninput="this.className = ''"></p>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-6">
            <label for="exampleFormControlSelect2">Upload Intermediate/Diploma Certificate:</label>
         </div>
         <div class="col-sm-6">
            <p><input type="file" file_extension=".pdf" id="intermediateCertificate" name="intermediateCertificate" oninput="this.className = ''"></p>
         </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <label class="form-check-label" for="exampleRadios1">Are you an under graduate student?</label>
        </div>
        <div class="col-sm-3">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="isUnderGraduate" id="exampleRadios1" value="true" onclick="displayDiv()">
            <label class="form-check-label" for="exampleRadios1">Yes</label>
          </div>
      </div>
      <div class="col-sm-3">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="isUnderGraduate" id="exampleRadios2" value="false" onclick="displayDiv()">
          <label class="form-check-label" for="exampleRadios2">No</label>
        </div>
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
               <p><input type="file" id="btechCMM" name="btechCMM" oninput="this.className = ''"></p>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech Provisional Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechProvisional" name="btechProvisional" oninput="this.className = ''"></p>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech OD Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechOD" name="btechOD" oninput="this.className = ''"></p>
            </div>
         </div>
      </div>
      <div id="semWiseCertificates">
         <label for="exampleFormControlSelect2">Upload sem wise certificates...</label>
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech 1st Sem/year Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechFirstSem" name="btechFirstSem" oninput="this.className = ''"></p>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech 2nd Sem Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechSecondSem" name="btechSecondSem" oninput="this.className = ''"></p>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech 3rd Sem Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechThirdSem" name="btechThirdSem" oninput="this.className = ''"></p>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech 4th Sem Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechFourthSem" name="btechFourthSem" oninput="this.className = ''"></p>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech 5th Sem Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechFifthSem" name="btechFifthSem" oninput="this.className = ''"></p>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-6">
               <label for="exampleFormControlSelect2">Upload B.Tech 6th Sem Certificate:</label>
            </div>
            <div class="col-sm-6">
               <p><input type="file" id="btechSixthSem" name="btechSixthSem" oninput="this.className = ''"></p>
            </div>
         </div>
      </div>
   </div>
</div>

<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
</div>

</form>

<script>
   var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

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

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:

  // if (n == 1) {
  //  var inpObj = document.getElementById("aadharNumber");
  //  if (!inpObj.checkValidity()) {
  //     document.getElementById("errors").innerHTML = "<li>Aadhar Number should be of 12 digit code separated by - for every four digits</li>";
  //     return false;
  //  }
  // }
  
  // if (currentTab+n == 2) {
  //  var inpObj = document.getElementById("primaryEmail");
  //  alert(inpObj.value);
  //  if (!inpObj.checkValidity()) {
  //     document.getElementById("contactErrors").innerHTML = "<li>Enter valid email address...</li>";
  //     return false;
  //  }
  // }

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

function displayDiv() {
  let inputObject = document.getElementById("isUnderGraduate");
  alert(inputObject);
}

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
</script>

</body>
</html>