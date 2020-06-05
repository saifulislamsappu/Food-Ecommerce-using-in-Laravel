@extends('welcome')

@section('content')
  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
       
          <div class="col-md-12">
             
         <!--Carousel Wrapper-->

<div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2" data-ride="carousel">
    <div class="float-left mt-5">
        <h2 style="margin-bottom: 0px;">Food</h2>
    </div>

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->

    <div class="carousel-item active">
 @foreach ($foodSta as $food)
      <div class="col-md-3 mb-3">
       

        <div class="card">
          <img src="{{asset('assets/images/foods/'.$food->image)}}">
            <div class="card-body">
            <h4 class="card-title font-weight-bold">{{ $food->food_name}}</h4>
              <div>
                <table>
                    <tr>
                        <td><p>Carb : {{ $food->carbohydrate}}</p></td>
                        <td style="padding-left: 130px;"><p>Kca : {{ $food->KCal}}</p></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>Price : {{ $food->Price}}</td>
                    </tr>
                </table>
            </div>
            <div class="row">
              <div class="col-md-6">
                <a href="{{url('food-order/'.$food->id)}}" class="btn btn-primary btn-md btn-rounded"><b>Order</b></a>
               
              </div>
              <div class="col-md-6">
                 <form action="/cart" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{ $food->id}}">
        <input type="hidden" name="food_name" value="{{ $food->food_name}}">
        <input type="hidden" name="price" value="{{ $food->Price}}">
        <input type="hidden" name="image" value="{{ $food->image}}">
        <button type="submit" class="btn btn-primary">Add to Cart</button>
    </form>
              </div>
            </div>
          </div>
        </div>
        
      </div>

@endforeach
    </div>


    <!--/.Second slide-->

    <!--/.Third slide-->

  </div>
  

  <!--/.Slides-->
  <!--Controls-->
 

  <!--/.Controls-->
</div>

<div class="modal" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

 <!--  <div class="modal-dialog" role="document">
    <div class="modal-content"> -->
      <!-- <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Write to us</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body mx-3">

        <style type="text/css">
          /*custom font*/
@import url(import url here);



#regForm {
  background-color: #fff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 100%;
  min-width: 600px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 87%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
  border-radius: 6px;
  /*background: slategray;*/
}

/* Mark input boxes that get errors during validation: */
input.invalid {
  background-color: #ffdddd;
}
select.invalid {
  background-color: #ffdddd;
}
select.valid {
  background-color: #ffffff;
}

/* Hide all steps by default: */
.tab {
  display: none;
}
#btnBMI{
border-width: 2px;
    font-weight: 400;
    font-size: 0.8571em;
    line-height: 1.35em;
    border: none;
    margin: 10px 1px;
    border-radius: 0.1875rem;
    padding: 11px 22px;
    cursor: pointer;
    background-color: #888;
    color: #FFFFFF;
}
button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}
label{
  float: left;
  margin-top: 10px;
}

#prevBtn {
  background-color: #4CAF50;
}

/* Step marker: Place in the form. */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
#result,#resultBMR{
    margin-top: 13px;
    margin-bottom: 0rem;
    font-weight: bold;
    font-size: 20px;
}
#result,#resultMacro{
    margin-top: 13px;
    margin-bottom: 0rem;
    font-weight: bold;
    font-size: 18px;
}
.bmis,.bmrs,.macros{
  font-size: 20px;
   font-weight: bold;
}
#bmrFormula{
  height: 50px;
    width: 84%;
    margin-left: 40px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
    border-radius: 6px;
    padding: 10px;
}
#gender{
  height: 50px;
    width: 84%;
    margin-left: 9px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
    border-radius: 6px;
    padding: 10px;

}
#fat{
  height: 50px;
    width: 82%;
    margin-left: 22px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
    border-radius: 6px;
    padding: 10px;

}
#gol{
  height: 50px;
    width: 82%;
    margin-left: 45px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
    border-radius: 6px;
    padding: 10px;
    margin-left: 70px;

}
#protein{
  height: 50px;
    width: 82%;
    /*margin-left: 9px;*/
    font-family: Raleway;
    border: 1px solid #aaaaaa;
    border-radius: 6px;
    padding: 10px;
}
#medical_term{
  height: 50px;
    width: 82%;
    /*margin-left: 9px;*/
    font-family: Raleway;
    border: 1px solid #aaaaaa;
    border-radius: 6px;
    padding: 10px;
    margin-left: 96px;
}
#prevBtn,#nextBtn{
    border-radius: 3px;
}
.btns{
  border-width: 2px;
    font-weight: 400;
    font-size: 1.2em;
    line-height: 1.35em;
    border: none;
    margin: 10px 1px;
    border-radius: 0.1875rem;
    padding: 11px 22px;
    cursor: pointer;
    background-color: teal;
    color: #FFFFFF !important;
    width: 113px !important;
}
        </style>
        <!-- <h1 class="bg-info text-white text-center p-2 fixed-top">Bootstrap 4 Multi-step form</h1> -->z

<main class="content" role="content">
  
  <section id="section1">
    <div class="container-fluid col-md-6 col-md-offset-3">

<!-- MultiStep Form -->
<form id="regForm" action="{{url('calculator')}}">
{{csrf_field()}}
<!----------BMI---------->
  <h2>Calculator</h2>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
    <p class="bmis">BMI</p>
    <div class="single-field mt-2">
        <label for="height" class=""><b>Height:</b></label>
    <div class="row">
           <div class="col-md-6">
            <input type="number" step="any" min="0" name="foot" id="foot" class="calculatorShortInput" placeholder="Foot" onfocus="this.placeholder = ''" required="" oninput="this.value = Math.abs(this.value)">
            <!-- <span class="additional">Foot</span> -->
          </div>




    <div class="col-md-6">
        <input type="number" step="any" min="0" name="inch" id="inch" class="calculatorShortInput" placeholder="Inch" onfocus="this.placeholder = ''" required="" oninput="this.value = Math.abs(this.value)">
        <!-- <span class="additional">Inch</span> -->
        <span class="clearElement"></span>
      </div>
    </div>
    </div>

    <div class="single-field mt-2">
    <label for="weight">Weight(kg):</label>
    <input  style="width: 83% !important;margin-left: -23px;" type="number" step="any" min="0" name="weight" id="weight" class="calculatorShortInput" placeholder="Enter Your weight" onfocus="this.placeholder = ''" required="" oninput="this.value = Math.abs(this.value)">
    
    <span class="clearElement"></span>
    </div>
<!----------BMI End---------->


    <div class="submitButtons">
      <p id="result"></p>
    <button type="submit" id="btn" class="btns btn-primary" onclick="BMI()">Calculate</button>
    
    </div>

    <!-- <input type="hidden" name="calculationForm" value="1"> -->

  </div>
<!----------BMR---------->

  <div class="tab">
    <p class="bmrs">BMR</p>
    <!-- <h3 style="font-size:18px;">Select your activity level</h3> -->

    <div class="single-field">
    <!-- <label for="bmrFormula" class=""></label> -->
    <select name="bmrFormula" id="bmrFormula" onchange="activity(this.value);">
    <option value="0">Please select your activity level</option>
    <option value="1.1">I am sedentary (little or no exercise)</option>
    <option value="1.275">I am lightly active (light exercise or sports 1-3 days per week)</option>
    <option value="1.35">I am moderately active (moderate exercise or sports 3-5 days per week)</option>
    <option value="1.525">I am very active (hard exercise or sports 6-7 days per week)</option>
    <option value="1.75">I am super active (very hard exercise or sports and a physical job or 2x traing)</option>
    </select>
    <span class="clearElement"></span>
    </div>

    <div class="single-field mt-2"> 
    <label for="age">Age:</label>
    <input type="number" step="any" min="0" name="age" id="age" class="calculatorMedInput" value="" required="" oninput="this.value = Math.abs(this.value)" style="width:84%;margin-left:17px"  onchange="ageFunction(this.value);" oninput ="ageFunction(this.value);">
    <span class="clearElement"></span>
    </div>

    <div class="single-field mt-2">
    <label for="weight">Weight(kg):</label>
    <input style="width: 84%;margin-left: -17px;" type="number" step="any" min="0" name="weight" id="weight_bmr" class="calculatorShortInput weight" value="" required="" disabled>
    <!-- <span class="additional">kg</span> -->
    <span class="clearElement"></span>
    </div>

    <div class="single-field mt-2">
        <label for="height" class=""><b>Height:</b></label>
    <div class="row">
           <div class="col-md-6">
            <input type="number" step="any" min="0" name="foot" id="foot_bmr" class="calculatorShortInput" value="" required="" disabled placeholder="Foot">
            <!-- <span class="additional">Foot</span> -->
    </div>

    <div class="col-md-6">
        <input type="number" step="any" min="0" name="inch" id="inch_bmr" class="calculatorShortInput" value="0" required="" disabled="" placeholder="Inch" style="width:92%">
        <!-- <span class="additional">Inch</span> -->
        <span class="clearElement"></span>
      </div>
    </div>
    </div>

   
    <div class="single-field mt-2">
    <label for="gender">Gender:</label>
    <select name="gender" id="gender">
    <option value="female">Female</option>
    <option value="male">Male</option>
    </select>
    <span class="clearElement"></span>
    </div>

    <div class="submitButtons">
      <p id="resultBMR"></p>
    <button type="submit" id="btn" class="btns btn-primary" onclick="BMR()">Calculate</button>
    
    </div>

    <!-- <input type="hidden" name="calculationForm" value="1"> -->

  </div>

    <!----------BMR END---------->

    
    <!----------Macro---------->

  <div class="tab">
    <p class="macros">Macro</p>

    <div class="single-field">
    <label for="weight">Weight(kg):</label>
    <input type="number" step="any" min="0" name="weight" id="weight_macro" class="calculatorShortInput" value="0" required="" disabled="" style="margin-left: 20px;width: 83%;">
    <!-- <span class="additional">kg</span> -->
    <span class="clearElement"></span>
    </div>

    <div class="single-field mt-2"> 
    <label for="bmr">BMR:</label>
    <input type="number" style="margin-left:50px;width: 83%;" step="any" min="0" name="age" id="bmr" class="calculatorMedInput" value="" required="" disabled="">
    <span class="clearElement"></span>
    </div>

    <div class="single-field mt-2"> 
    <label for="bmr">BODY FAT:</label>
    <input type="number"  step="any" min="0" name="fat" id="body_fat" class="calculatorMedInput" value="" required="" oninput="this.value = Math.abs(this.value)" style="margin-left: 20px;width: 83%;">
    <span class="clearElement"></span>
    </div>
<br>
    <div class="single-field">
    <label for="bmrFormula" class="">Gol</label>
    <select name="macroFormula" id="gol">
    <option value="125">Maintain</option>
    <option value="225">Lean Muscle Gain</option>
    <option value="325">Hard Lean Muscle Gain</option>
    <option value="-75">Fat Loss</option>
    <option value="-25">Rapid Fat Loss</option>
    </select>
    <span class="clearElement"></span>
    </div>

     <div class="single-field mt-2">
    <label for="bmrFormula" class="">Grams of Protein</label>
    <select name="bmrFormula" id="protein">
    <option value="1">1</option>
    <option value="1.5">1.5</option>
    <option value="2">2</option>
    </select>
    <span class="clearElement"></span>
    </div>

    <div class="single-field mt-2">
    <label for="bmrFormula" class="">Grams of Fat</label>
    <select name="bmrprotein" id="fat">
    <option value="0.35">0.35</option>
    <option value="0.45">0.45</option>
    <option value="0.55">0.55</option>
    </select>
    <span class="clearElement"></span>
    </div>
     <div class="single-field mt-2">
    <!-- <label for="bmrFormula" class=""></label> -->
    <select name="medical_term" id="medical_term" onchange="activity(this.value);">
    <option value="0">Please select your Medical Term</option>
    <option value="1">I have Diabeeis</option>
    <option value="2">I have High Blood pressure</option>
    <option value="3">I have low blood pressure </option>
    <option value="4">I have alergy</option>
    </select>
    <span class="clearElement"></span>
    </div>



    <div class="submitButtons">
      <p id="resultMacro"></p>
    <button type="button" id="btn" onclick="Macro()" class="btns btn-primary">Calculate</button>
    
    </div>

    <!-- <input type="hidden" name="calculationForm" value="1"> -->


  </div>
  <div style="overflow:auto;">

<button type="button" id="cancel" class="float-left btn btn-danger" data-dismiss="modal"><p style="font-weight: 400;font-size: 16px; height: 5px; width: 72px;">Cancel</p></button>
    <div style="float:right; margin-top: 7px;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)" style="width: 111px;">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)" style="width: 111px;" >Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;display: none;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
      <!----------Macro---------->
</form>
<!-- /.MultiStep Form -->
  
    </div>
  </section>

</main> <!-- /content -->
  

<!-- alerts are for fun of it -->


  <!-- Circles which indicates the steps of the form: -->
 

      </div>
      <!-- <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
      </div> -->
  <!--   </div>
  </div> -->
</div>


<div class="float-right mt-5 mr-5" style=" margin-right: 110px !important;">
  <a href="" class="btn1 btn-primary btn-rounded" id="btnBMI"data-toggle="modal" data-target="#modalContactForm"
  style="position: fixed;z-index: 1;right:0;bottom: 0px;border-radius: 50%;padding: 40px 0 42px 0px;;text-align: center;font-size: 14px;background: cadetblue;color: white !important;border: 1px solid;text-decoration: none;font-weight: 800;">
Fitness Calculator</a>
</div>
<!--/.Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2" data-ride="carousel"></div>

        </div>
        </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
      <!--       <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul> -->
          </nav>
         <!--  <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div> -->
        </div>
      </footer>
@endsection
@section('script')
<script type="text/javascript">
  var finalBmr=0;
  var protein = 0;
  var bmrFormula = -1;

  $(document).ready(function() {  
  
  // Random Alert shown for the fun of it
  function randomAlert() {
    var min = 5,
      max = 20;
    var rand = Math.floor(Math.random() * (max - min + 1) + min); //Generate Random number between 5 - 20
    // post time in a <span> tag in the Alert
    $("#time").html('Next alert in ' + rand + ' seconds');
    $('#timed-alert').fadeIn(500).delay(3000).fadeOut(500);
    setTimeout(randomAlert, rand * 1000);
  };
  randomAlert();
});

$("#cancel").click(function() { 
    // assumes element with id='button'
    $("#modalContactForm").toggle();
});


// Multi-Step Form
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Find Food";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;

  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);

  var foot = $("#foot").val();
  // console.log(foot);

  $("#foot_bmr").val(foot);
  // var gander =  $( "#gander option:selected" ).val();
  // console.log(gander);
  // return false;
  var inch = $("#inch").val();
  $("#inch_bmr").val(inch);

  var weight = $("#weight").val();
  $("#weight_bmr").val(weight);

  $("#weight_macro").val(weight);

  // var result = $("#resultBMR").val();
  $("#bmr").val(finalBmr.toFixed(2));


}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  z = x[currentTab].getElementsByTagName("select");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
   for (i = 0; i < z.length; i++) {
    // If a field is empty...
    if (z[i].value == "0") {
      // add an "invalid" class to the field:
      z[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  bmrFormula = document.getElementById("bmrFormula").value;
  if (bmrFormula != 0) {
    if (finalBmr == 0) {

      bmrFormula = document.getElementById("bmrFormula").value;
  var age = document.getElementById("age").value;
  var weight_bmr = document.getElementById("weight_bmr").value;
  var foot_bmr = document.getElementById("foot_bmr").value;
  var inch_bmr = document.getElementById("inch_bmr").value;
  var height = (foot_bmr*30.48)+(inch_bmr*2.54);
  // var height = height_n/3.2808;
  var gender = document.getElementById("gender").value;
  var x = document.getElementsByClassName("tab");
  var z = x[currentTab].getElementsByTagName("select");
  // A loop that checks every input field in the current tab:
   for (i = 0; i < z.length; i++) {
    // If a field is empty...
    if (z[i].value == "0") {
      // add an "invalid" class to the field:
      z[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }else{
      valid = true;
    }
  }

  if (bmrFormula==0) {
   document.getElementById("resultBMR").innerHTML="*Plese select an activity";
  }else if (age == "" || age == 0) {
    var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
    document.getElementById("resultBMR").innerHTML="*Age can't be 0 or empty"
  }else{
    
      if (gender == "male"){

  bmr = 66 + (13.75 * weight_bmr) + (5 * height) - (6.8 * age);
  finalBmr = bmr * bmrFormula;

  }
  else{
  bmr = 655 + (9.6 * weight_bmr) + (1.8 * height) - (4.7 * age);
  finalBmr = bmr * bmrFormula;
  }
  document.getElementById("resultBMR").innerHTML="Your BMR is "+finalBmr.toFixed(2);
  }
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
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
function BMI(){
  var f = document.getElementById("foot").value;
  var i = document.getElementById("inch").value;
  var h = (f*12)+(i*1);
  console.log(h);

  // var h = m/3.2808;
  var w = document.getElementById("weight").value;
  var weightLbs = w * 2.205;

  // console.log(f , i, w);
  var bmi = (weightLbs / Math.pow(h, 2)) * 703;

  if (!bmi || bmi == "") {
      document.getElementById("result").innerHTML="*Please fill all field correctly"
  }else{
      document.getElementById("result").innerHTML="Your BMI is : "+bmi.toFixed(2);
  }
  // document.getElementById("foots").innerHTML=f;
  // document.getElementById("foots").innerHTML=f;
  // $("height").val(f);

}
function BMR(){
  // var gander =  $( "#gander option:selected" ).val();
  // console.log(gander);
  bmrFormula = document.getElementById("bmrFormula").value;
  var age = document.getElementById("age").value;
  var weight_bmr = document.getElementById("weight_bmr").value;
  var foot_bmr = document.getElementById("foot_bmr").value;
  var inch_bmr = document.getElementById("inch_bmr").value;
  var height = (foot_bmr*30.48)+(inch_bmr*2.54);
  // var height = height_n/3.2808;
  var x = document.getElementsByClassName("tab");
  var z = x[currentTab].getElementsByTagName("select");
  // A loop that checks every input field in the current tab:
   for (i = 0; i < z.length; i++) {
    // If a field is empty...
    if (z[i].value == "0") {
      // add an "invalid" class to the field:
      z[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }else{
      valid = true;
    }
  }

  if (bmrFormula==0) {
   document.getElementById("resultBMR").innerHTML="*Plese select an activity";
  }else if (age == "" || age == 0) {
    var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
    document.getElementById("resultBMR").innerHTML="*Age can't be 0 or empty"
  }else{
    
      if (gender == "male"){

  bmr = 66 + (13.75 * weight_bmr) + (5 * height) - (6.8 * age);
  finalBmr = bmr * bmrFormula;

  }
  else{
  bmr = 655 + (9.6 * weight_bmr) + (1.8 * height) - (4.7 * age);
  finalBmr = bmr * bmrFormula;
  }
  document.getElementById("resultBMR").innerHTML="Your BMR is "+finalBmr.toFixed(2);
  }

    // console.log(bmrFormula , age, weight_bmr,foot_bmr,inch_bmr,gender);
}

function activity(value)
{
  var x = document.getElementsByClassName("tab");
  var z = x[currentTab].getElementsByTagName("select");
  // A loop that checks every input field in the current tab:
   for (i = 0; i < z.length; i++) {
    // If a field is empty...
    if(value != "0"){
      z[i].className += " valid";
    }else{
      z[i].className += " invalid";
    }
  }
}

function ageFunction(value)
{
  var x = document.getElementsByClassName("tab");
  var y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
   for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if(value != 0){
      y[i].className += " valid";
    }else{
      y[i].className += "invalid";
    }
  }
}

function Macro(){
  var weight_macro = document.getElementById("weight_macro").value;
  var bmr = document.getElementById("bmr").value;
  var body_fat = document.getElementById("body_fat").value;
  var goal = document.getElementById("gol").value;
  var gop = document.getElementById("protein").value;
  var gof = document.getElementById("fat").value;
  var medical_term = document.getElementById("medical_term").value;

  // console.log(weight_macro , bmr, body_fat,gol,protein,fat);


  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      document.getElementById("resultMacro").innerHTML="*Body fat can't be 0 or empty"
      // and set the current valid status to false
      valid = false;
    }else{
      y[i].className += " valid";
      valid = true;
    }
  }
  
  var x = document.getElementsByClassName("tab");
  var z = x[currentTab].getElementsByTagName("select");
  // A loop that checks every input field in the current tab:
   for (i = 0; i < z.length; i++) {
    // If a field is empty...
    if (z[i].value == "0") {
      // add an "invalid" class to the field:
      z[i].className += " invalid";
      document.getElementById("resultMacro").innerHTML="*Plese select a Medical term";
      // and set the current valid status to false
      valid = false;
    }else{
      z[i].className += " valid";
      valid = true;
    }
  }
  if (medical_term!=0) {

  weightLbs = weight_macro * 2.205;
  fatp = body_fat * 0.01;

  fatWeight = weightLbs * fatp;
  leanWeight = weightLbs - fatWeight;
  protein = leanWeight * gop;
  fat = leanWeight * gof;
  caloriesPF = (protein * 4) + (fat * 9);
  caloriesCarb = bmr - caloriesPF;
  carb = (caloriesCarb / 4) + goal * 1;
  totalCalories = caloriesPF * 1 + (carb * 4);
  // Session::put('result', $totalCalories);
  document.getElementById("resultMacro").innerHTML="Protein: "+protein.toFixed(2) + "<br>Carbohydrate: "+ carb.toFixed(2) + "<br>Fat: "+fat.toFixed(2) + "<br>FatTotal Calories for Everyday: "+totalCalories.toFixed(2);
  // console.log(protein.toFixed(2), carb.toFixed(2), fat.toFixed(2), totalCalories.toFixed(2));

}
}

</script>
@endsection