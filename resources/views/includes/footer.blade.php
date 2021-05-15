 <div id="footer">
      Copyright © <?php echo date('Y'); ?> House of Youth Dialogue (HYD). <br>
      All Rights Reserved.
    </div>
  </div>


<script>
    // function selecSingletDelegation() {
    //     var x = document.getElementById("groupDelegation");
    //     if (x.style.display === "none") {
    //         x.style.display = "none";
    //     } else {
    //         x.style.display = "none";
    //     }
    // }

    // function selectGroupDelegation() {
    //     var x = document.getElementById("groupDelegation");
    //     if (x.style.display === "none") {
    //         x.style.display = "block";
    //     }
    // }

    function selectVisaYes() {
        var x = document.getElementById("visa");
       
            x.style.display = "block";
            document.getElementsByName('inptPasportNumber')[0].setAttribute('required', '');
            document.getElementsByName('inptDateOfBirth')[0].setAttribute('required', '');
           
        
    }

    function selectVisaNo() {
        var x = document.getElementById("visa");

            x.style.display = "none";
            document.getElementsByName('inptPasportNumber')[0].removeAttribute('required');
            document.getElementsByName('inptDateOfBirth')[0].removeAttribute('required');
           
        
    }

    function validateForm() {
        var x = document.forms["myDelegationForm"]["inptPasportName"].value;
        if ( x == " ") {
            alert("Name must be filled out");
            return false;
        }
    }

    function performanceYes() {
        var x = document.getElementById("performance");
        if (x.style.display === "none") {
            x.style.display = "block";
        }
    }

    function performanceNo() {
        var x = document.getElementById("performance");
        if (x.style.display === "none") {
            x.style.display = "none";
        } else {
            x.style.display = "none";
        }
    }

  </script>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- <script src="{{ asset('js/app.js') }}"></script> -->