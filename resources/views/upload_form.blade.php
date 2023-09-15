<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" integrity="sha384-Nsz6oApLgCYeKB4gt3KON1E5yZgx4j7lX0kNlgh1lRV58LyXX4Pe+0WqFdaJeCUV" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('css/upload.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
</head>
<body>

<div id="header">
            <table>
                <tr>
                    <td>
                        <img src="{{ asset('images/mmsu.png') }}" alt="mmsulogo" id="logo1">
                        <img src="{{ asset('images/QA_Logo.png') }}" alt="mmsulogo" id="logo2">

                    </td>
                    <td>
                        <div class="text-container">
                            <div class="text-row">MARIANO MARCOS STATE UNIVERSITY</div>
                            <div class="text-row2"><u>QUALITY ASSURANCE</u></div>
                            <div class="text-row3">Ilocos Norte, Philippines</div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    <!-- Header section -->
    <header>
        <nav>
            <!-- Navigation links -->
            <ul>
              
            <li><a href="/home">Home</a></li>
            <li><a href="/upload">Upload</a></li>
            <li><a href="#" class="icon" onclick="toggleDropdown(event)"><i class="fas fa-user"></i>Profile</a>
            
                <ul class="dropdown-menu" id="profileDropdown">
                    <li><a href="/profile">View Profile</a></li> <!-- Added line for View Profile -->
                    <li><a href="/account_settings">Edit Account</a></li>
                    <li><a href="/manage_details">Manage Details</a></li>
                    <li><a href="#" onclick="logout()">Logout</a></li>
                </ul>
            </li>
        </ul>
        <div class="circular-border">
            <a href="/profile"><img src="{{ asset('storage/' . Auth::user()->profile_image) }}" onerror="this.style.display='none'" class="profile-image" id="profileImagePreview"></a>
        </div>
        </nav>
    </header>
     
<div class="container">
    <div class="col-lg-7">

            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <!-- Add your form fields here -->
            <div>
            <h2 style="font-family: Garamond; text-align: center">Upload Document</h2>
                
            
                <label for="programcourse" style="margin-top:-5px;">Course:<span style="color: red"> *</span></label>
                <select name="programcourse" id="programcourse" required class="form-select">
                    <option value="" disabled selected>Select Program Course</option>
                    <option value="Doctor of Philosophy in Linguistics">Doctor of Philosophy in Linguistics</option>
                    <option value="Doctor of Philosophy in Rural Development">Doctor of Philosophy in Rural Development</option>
                    <option value="Doctor of Education major in Educational Mgt.">Doctor of Education major in Educational Mgt.</option>
                    <option value="Master of Arts/Master in Education">Master of Arts/Master in Education</option>
                    <option value="Master of Arts in English Language and Literature">Master of Arts in English Language and Literature</option>
                    <option value="Master of Arts/Master in Nursing">Master of Arts/Master in Nursing</option>
                    <option value="Master of Arts/Master in Public Administration">Master of Arts/Master in Public Administration</option>
                    <option value="Master of Science in Biology">Master of Science in Biology</option>
                    <option value="Master of Science/Master in Animal Science">Master of Science/Master in Animal Science</option>
                    <option value="Master of Science/Master in Crop Science">Master of Science/Master in Crop Science</option>
                    <option value="Master of Science in Mathematics">Master of Science in Mathematics</option>
                    <option value="Master of Science/Master in Rural Development">Master of Science/Master in Rural Development</option>
                    <option value="Master of Science/Master in Engineering">Master of Science/Master in Engineering</option>
                    <option value="Master in Informatiion Technology">Master in Informatiion Technology</option>
                    <option value="Master in Management">Master in Management</option>
                    <option value="Professional Science Masters-Renewable Energy Engineering">Professional Science Masters-Renewable Energy Engineering</option>
                    <option value="Doctor of Medicine">Doctor of Medicine</option>
                    <option value="Bachelor of Science in Agribusiness">Bachelor of Science in Agribusiness</option>
                    <option value="Bachelor of Science in Agriculture">Bachelor of Science in Agriculture</option>
                    <option value="Bachelor of Science in Development Communication">Bachelor of Science in Development Communication</option>
                    <option value="Bachelor of Science in Environmental Science">Bachelor of Science in Environmental Science</option>
                    <option value="Bachelor of Science in Food Technology">Bachelor of Science in Food Technology</option>
                    <option value="Bachelor of Science in Forestry">Bachelor of Science in Forestry</option>
                    <option value="Bachelor of Science in Fisheries">Bachelor of Science in Fisheries</option>
                    <option value="Bachelor of Science in Marine Biology">Bachelor of Science in Marine Biology</option>
                    <option value="Bachelor of Science in Communication">Bachelor of Science in Communication</option>
                    <option value="Bachelor of Science in English Language">Bachelor of Science in English Language</option>
                    <option value="Bachelor of Science in Sociology">Bachelor of Science in Sociology</option>
                    <option value="Bachelor of Science in Biology">Bachelor of Science in Biology</option>
                    <option value="Bachelor of Science in Mathematics">Bachelor of Science in Mathematics</option>
                    <option value="Bachelor of Science in Meteorology">Bachelor of Science in Meteorology</option>
                    <option value="Bachelor of Science in Psychology">Bachelor of Science in Psychology</option>
                    <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                    <option value="Bachelor of Science in Business Administration">Bachelor of Science in Business Administration</option>
                    <option value="Bachelor of Science in Cooperative Management">Bachelor of Science in Cooperative Management</option>
                    <option value="Bachelor of Science in Economics">Bachelor of Science in Economics</option>
                    <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option> 
                    <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option> 
                    <option value="Bachelor of Science in Tourism Management">Bachelor of Science in Tourism Management</option> 
                    <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option> 
                    <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option> 
                    <option value="Bachelor of Science in Agricultural & Biosystems Engineering">Bachelor of Science in Agricultural & Biosystems Engineering</option> 
                    <option value="Bachelor of Science in Ceramic Engineering">Bachelor of Science in Ceramic Engineering</option> 
                    <option value="Bachelor of Science in Chemical Engineering">Bachelor of Science in Chemical Engineering</option> 
                    <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering of Science in Civil Engineering</option> 
                    <option value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option> 
                    <option value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option> 
                    <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option> 
                    <option value="Bachelor of Science in Mechanical Engineering">Bachelor of Science in Mechanical Engineering</option> 
                    <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option> 
                    <option value="Bachelor of Science in Pharmacy">Bachelor of Science in Pharmacy</option> 
                    <option value="Bachelor of Science in Physical Therapy">Bachelor of Science in Physical Therapy</option> 
                    <option value="Bachelor in Automotive Technology">Bachelor in Automotive Technology</option> 
                    <option value="Bachelor of Science in Industrial Technology">Bachelor of Science in Industrial Technology</option> 
                    <option value="Bachelor of Culture and Arts Education">Bachelor of Culture and Arts Education</option> 
                    <option value="Bachelor of Early Childhood Education">Bachelor of Early Childhood Education</option> 
                    <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option> 
                    <option value="Bachelor of Physical Education">Bachelor of Physical Education</option> 
                    <option value="Bachelor of Secondary Education">Bachelor of Secondary Education</option> 
                    <option value="Bachelor of Special Needs Education">Bachelor of Special Needs Education</option> 
                    <option value="Bachelor of Technical Vocational Teacher Education">Bachelor of Technical Vocational Teacher Education</option> 
                    <option value="Bachelor of Technology and Livelihood Education">Bachelor of Technology and Livelihood Education</option> 
                    <option value="Doctor of Veterinary Medicine">Doctor of Veterinary Medicine</option> 
                    @foreach ($programcourses as $programcourse)
                        <option value="{{ $programcourse->name }}">{{ $programcourse->name }}</option>
                    @endforeach
                </select>
            

                <div class="row mb-1">
                    <div class="col-md-6">
                        <label for="typeofvisit" style="margin-top:-7px;">Type of Visit:<span style="color: red"> *</span></label>
                        <input type="text" name="typeofvisit" id="typeofvisit" placeholder="4th Survey - Phase 2" required class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="dateofvisit" style="margin-top:-7px;">Date of Visit:<span style="color: red"> *</span></label>
                        <input type="text" name="dateofvisit" id="dateofvisit" placeholder="November 30 - December 4, 2020" required class="form-control">
                    </div>
                </div>

       
                <label for="type_of_award" style="margin-top:-7px;">Type of Award:<span style="color: red"> *</span></label>
                <input type="text" name="type_of_award" id="type_of_award" placeholder="Level III Re-accredited" required class="form-control">
                    
                <label for="remarks" style="margin-top:-7px;">Remarks (Award):<span style="color: grey"> - <em>optional</em></span></label>
                <textarea name="remarks" id="remarks" placeholder="Enter remarks here eg. must comply with mandatory recommendations" class="form-control" rows="2"  style="resize: none;"></textarea>
              
            
                <div class="row mb-1">
                    <div class="col-md-6">
                        <label for="validityperiod" style="margin-top:6px;">Validity Period:<span style="color: red"> *</span></label>
                        <input type="text" name="validityperiod" id="validityperiod" placeholder="March 2023 - February 2024" required class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="grandmean" style="margin-top:6px;">Grand Mean:<span style="color: red"> *</span></label>
                        <input type="text" name="grandmean" id="grandmean" placeholder="4.62" required class="form-control">
                    </div>
                </div>

                <label for="document" style="margin-top:-7px;">Select a Document or Drag a File (PDF only):<span style="color: red"> *</span></label>
                <input type="file" name="document" id="document" accept=".pdf" required class="form-control2">
                

                <div class="submitposition">
                    <input type="submit" class="btn btn-sm btn-primary" name="upload" value="Upload Now!">
                    <a href="/home"><button type="button" class="btn btn-sm btn-secondary">Cancel</button></a>
                </div>
                </div>
            </form>
    
    </div>
</div>
</body>
</html>


<script>
    
    // Function to toggle the visibility of the profile dropdown menu
    function toggleDropdown(event) {
        event.preventDefault();
        const profileDropdown = document.getElementById("profileDropdown");
        profileDropdown.classList.toggle("show");
    }

    // Function to handle logout
    function logout() {
    // Use SweetAlert for the confirmation dialog
    Swal.fire({
        title: 'Logout',
        text: 'Are you sure you want to logout?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7367f0',
        cancelButtonColor: '#808080',
        confirmButtonText: 'Yes, Logout'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect to the login page after logout confirmation
            window.location.href = "/login"; // Replace with your login page URL
        }
    });
}

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.icon') && !event.target.closest('.dropdown-menu')) {
            const dropdowns = document.getElementsByClassName("dropdown-menu");
            for (let i = 0; i < dropdowns.length; i++) {
                const openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    };
</script>