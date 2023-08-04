<!-- resources/views/account_settings.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" integrity="sha384-Nsz6oApLgCYeKB4gt3KON1E5yZgx4j7lX0kNlgh1lRV58LyXX4Pe+0WqFdaJeCUV" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- Add your CSS and JS links here -->
    <link rel="stylesheet" href="{{asset('css/account_settings.css')}}">
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
    <header class="position3nav">
        <nav>
            <!-- Navigation links -->
            <ul>
            <li><a href="/home">Home</a></li>
            <li><a href="/upload">Upload</a></li>
            <li><a href="#" class="icon" onclick="toggleDropdown(event)"><i class="fas fa-user"></i>Profile<img src="{{ asset('images/profile-removebg-preview (1).png') }}" alt="Profile Image"></a>
                <!-- Dropdown menu for "Profile" link -->
                <ul class="dropdown-menu" id="profileDropdown">
                    <li><a href="#">Edit Account</a></li>
                    <li><a href="#" onclick="logout()">Logout</a></li>
                </ul>
            </li>
        </ul>
        </nav>
    </header>

<div class="layout">
    <div class="container">
        <h3 id="positionedit" style="font-family: Garamond">Edit Account Information</h3>
        @if(Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif 

        <form method="post" action="{{ route('update_account') }}">
            @csrf
            <label for="department" class="form-label">Department<span style="color: red"></span></label>
            <select name="department" class="form-control form-control-sm" id="department" required>
                <option value="" disabled>Select Department</option>
                <option value="Quality Assurance" @if(Auth::user()->department === 'Quality Assurance') selected @endif>Quality Assurance</option>
                <option value="Computing and Information Sciences" @if(Auth::user()->department === 'Computing and Information Sciences') selected @endif>Computing and Information Sciences</option>
                <option value="Languages and Literature" @if(Auth::user()->department === 'Languages and Literature') selected @endif>Languages and Literature</option>
                <option value="Physical Science" @if(Auth::user()->department === 'Physical Science') selected @endif>Physical Science</option>
                <option value="Mathematics" @if(Auth::user()->department === 'Mathematics') selected @endif>Mathematics</option>
                <option value="Biology" @if(Auth::user()->department === 'Biology') selected @endif>Biology</option>
                <option value="Physical Education" @if(Auth::user()->department === 'Physical Education') selected @endif>Physical Education</option>
                <option value="Social Sciences" @if(Auth::user()->department === 'Social Sciences') selected @endif>Social Sciences</option>
                </select>
            <br>
            <label for="college">College:</label>
            <input type="text" class="form-control form-control-sm" name="college" value="{{ Auth::user()->college }}" required>

            <div class="row">
            <div class="col">
                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control form-control-sm" name="lastname" value="{{ Auth::user()->lastname }}" required>
            </div>
            <div class="col">
                <label for="firstname">First Name:</label>
                <input type="text" class="form-control form-control-sm" name="firstname" value="{{ Auth::user()->firstname }}" required>
            </div>
            <div class="col">
                <label for="middlename">Middle Name:</label>
                <input type="text" class="form-control form-control-sm" name="middlename" value="{{ Auth::user()->middlename }}" required>
            </div>
        </div>

            <label for="email">Email:</label>
            <input type="email" class="form-control form-control-sm" name="email" value="{{ Auth::user()->email }}" required>

            <div class="row">
                <div class="col">
                    <label for="current_password">Current Password:</label>
                    <input type="password" class="form-control form-control-sm" name="current_password" id="current_password" class="form-control" required>
                </div>
            <div class="col">
                    <label for="new_password">New Password:</label>
                    <input type="password" class="form-control form-control-sm" name="new_password" id="new_password" required>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label for="password_confirmation">Confirm New Password:</label>
                    <input type="password" class="form-control form-control-sm" name="password_confirmation" id="password_confirmation" required>
                </div>   
                <div class="col" style="display: flex; align-items: center;">
                <input type="checkbox" style="margin-top: 19px;" id="showPassword">
                    <label for="showPassword" style="margin-left: 10px; margin-top: 12px;">Show Password</label>
                    
                </div>
            </div>
        
            
            <div class="submitposition">
                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                <a href="/home"><button type="button" class="btn btn-sm btn-secondary">Cancel</button></a>
            </div>
        </form>
</div>

    <script>
    var showPasswordCheckbox = document.getElementById("showPassword");
    var passwordInputs = document.querySelectorAll("input[type='password']");

    showPasswordCheckbox.addEventListener("change", function () {
        for (var i = 0; i < passwordInputs.length; i++) {
            passwordInputs[i].type = this.checked ? "text" : "password";
        }
    });

    // Make sure to re-hide passwords when the form is submitted (e.g., on Save Changes)
    document.querySelector("form").addEventListener("submit", function () {
        for (var i = 0; i < passwordInputs.length; i++) {
            passwordInputs[i].type = "password";
        }
    });
        // Function to toggle the visibility of the profile dropdown menu
     // Function to toggle the visibility of the profile dropdown menu
     function toggleDropdown(event) {
        event.preventDefault();
        const profileDropdown = document.getElementById("profileDropdown");
        profileDropdown.classList.toggle("show");
    }

    // Function to handle logout
    function logout() {
        const confirmLogout = window.confirm("Are you sure you want to logout?");
        if (confirmLogout) {
            // Redirect to the login page after logout confirmation
            window.location.href = "/login"; // Replace "/login" with the actual URL of your login page
        }
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
</body>
</html>
