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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Wait for a few seconds and then remove the notification
        setTimeout(function() {
            var notification = document.querySelector('.centered-notification');
            if (notification) {
                notification.remove();
            }
        }, 7000); // Remove after 5 seconds
    </script>
    <script>
        // Wait for a few seconds and then remove the notification
        setTimeout(function() {
            var notification = document.querySelector('.centered-notification1');
            if (notification) {
                notification.remove();
            }
        }, 7000); // Remove after 5 seconds
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<body>
    @if(session('alert'))
        <div class="centered-notification">
            {{ session('alert') }}
        </div>
    @endif
    @if(session('alert-danger'))
    <div class="centered-notification1">
        {{ session('alert-danger') }}
    </div>
@endif
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
            <li><a href="#" class="icon" onclick="toggleDropdown(event)"><i class=""></i>Profile</a>
            
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

<div class="layout">
    <div class="container">
        <h3 id="positionedit" style="font-family: Garamond">Edit Account Information</h3>
        @if(Session::has('success'))
<<<<<<< HEAD
            <div class="alert alert-success" role="alert" style="text-align: center;">
                {{ Session::get('success') }}
            </div>
        @endif 

        @if (session('error'))
            <div class="alert alert-danger" role="alert" style="text-align: center;">
                {{ session('error') }}
            </div>
        @endif
=======
                                <div class="alert alert-success" role="alert" style="text-align: center;">
                                    {{ Session::get('success') }}
                                </div>
                            @endif 
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1

        <form method="post" action="{{ route('update_account') }}">
            @csrf
            <label for="department" class="form-label">Department<span style="color: red"></span></label>
            <select name="department" class="form-select form-control-sm" id="department" required>
                <option value="" disabled>Select Department:</option>
                <option value="Quality Assurance" @if(Auth::user()->department === 'Quality Assurance') selected @endif>Quality Assurance</option>
                <option value="Computer Sciences" @if(Auth::user()->department === 'Computer Science') selected @endif>Computer Science</option>
                <option value="Information Technology" @if(Auth::user()->department === 'Information Technology') selected @endif>Information Technology</option>
                <option value="Languages and Literature" @if(Auth::user()->department === 'Languages and Literature') selected @endif>Languages and Literature</option>
                <option value="Physical Science" @if(Auth::user()->department === 'Physical Science') selected @endif>Physical Science</option>
                <option value="Mathematics" @if(Auth::user()->department === 'Mathematics') selected @endif>Mathematics</option>
                <option value="Biology" @if(Auth::user()->department === 'Biology') selected @endif>Biology</option>
                <option value="Physical Education" @if(Auth::user()->department === 'Physical Education') selected @endif>Physical Education</option>
                <option value="Social Sciences" @if(Auth::user()->department === 'Social Sciences') selected @endif>Social Sciences</option>
                </select>
            <br>
            <label for="college">College:</label>
            <input type="text" class="form-control form-control-sm" name="college" value="{{ Auth::user()->college }}">

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
                    <div class="input-group">
                        <input type="password" class="form-control form-control-sm" name="current_password" id="current_password" required>
                        <div class="input-group-append">
                            <span class="input-group-text" style="margin-top: -10px;">
                                <i class="fa fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-sm btn-secondary change-password-btn" id="changePasswordButton" style="background-color: green; color: white; margin-top: 8px; margin-left: 1px; margin-bottom: 23px;">Change Password</button>

            <div class="submitposition">
                <button type="submit" class="btn btn-sm btn-primary" id="saveChangesButton" >Save Changes</button>
                <a href="/home"><button type="button" class="btn btn-sm btn-secondary">Cancel</button></a>
            </div>
        </form>
</div>

</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const changePasswordButton = document.querySelector('#changePasswordButton');

        changePasswordButton.addEventListener('click', function () {
            Swal.fire({
                title: 'Change Password',
                html:
                    '<div class="input-group">' +
                    '<input type="password" id="current_password" class="form-control" placeholder="Current Password" required>' +
                    '<div class="input-group-append">' +
                    '<button class="btn btn-outline-primary toggle-password" style="background-color: #1DACD6; color: white" type="button">' +
                    '<i class="fas fa-eye"></i>' + // Font Awesome eye icon
                    '</button>' +
                    '</div>' +
                    '</div>' +

                    '<div class="input-group">' +
                    '<input type="password" id="new_password" class="form-control" placeholder="New Password" required>' +
                    '<div class="input-group-append">' +
                    '<button class="btn btn-outline-primary toggle-password" style="background-color: #1DACD6; color: white" type="button">' +
                    '<i class="fas fa-eye"></i>' + // Font Awesome eye icon
                    '</button>' +
                    '</div>' +
                    '</div>' +

                    '<div class="input-group">' +
                    '<input type="password" id="confirm_password" class="form-control" placeholder="Confirm New Password" required>' +
                    '<div class="input-group-append">' +
                    '<button class="btn btn-outline-primary toggle-password" style="background-color: #1DACD6; color: white" type="button">' +
                    '<i class="fas fa-eye"></i>' + // Font Awesome eye icon
                    '</button>' +
                    '</div>' +
                    '</div>',
                confirmButtonText: 'Change',
                confirmButtonColor: '#7367f0',
                showCancelButton: true,
 
                preConfirm: () => {
                    // ... (rest of your code remains the same)
                    const currentPassword = Swal.getPopup().querySelector('#current_password').value;
                    const newPassword = Swal.getPopup().querySelector('#new_password').value;
                    const confirmPassword = Swal.getPopup().querySelector('#confirm_password').value;

                    if (!currentPassword || !newPassword || !confirmPassword) {
                        Swal.showValidationMessage('All fields are required.');
                    } else if (newPassword !== confirmPassword) {
                        Swal.showValidationMessage('New passwords do not match.');
                    } else if (newPassword.length < 8) {
                        Swal.showValidationMessage('New password must be at least 8 characters.');
                    } else if (!/^[A-Z]/.test(newPassword)) {
                        Swal.showValidationMessage('The first letter of the new password must be capital.');
                    } else if (!/\d/.test(newPassword)) {
                        Swal.showValidationMessage('The password must include at least one number.');
                    } else if (!/[!@#$%^&*()]/.test(newPassword)) {
                        Swal.showValidationMessage('The password must include at least one symbol (!@#$%^&*()).');
                    } else {
                        
                    }

                    return { currentPassword, newPassword };
                },
                didOpen: () => {
                    const togglePasswordButtons = Swal.getPopup().querySelectorAll('.toggle-password');

                    togglePasswordButtons.forEach(function (button) {
                        button.addEventListener('click', function () {
                            const inputField = this.parentElement.previousElementSibling;
                            if (inputField.type === 'password') {
                                inputField.type = 'text';
                                this.innerHTML = '<i class="fas fa-eye-slash"></i>'; // Font Awesome eye-slash icon
                            } else {
                                inputField.type = 'password';
                                this.innerHTML = '<i class="fas fa-eye"></i>'; // Font Awesome eye icon
                            }
                        });
                    });
                },
            }).then((result) => {
                if (!result.isConfirmed) return; // User canceled

                fetch('/change-password', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token if not already included
                    },
                    body: JSON.stringify(result.value),
                })
                .then((response) => {
                    if (response.ok) {
                        Swal.fire('Password changed successfully!', '', 'success').then(() => {
                            location.reload(); // Reload the page after successful password change
                        });
                    } else {
                        Swal.fire('Error changing password', 'An error occurred while changing the password due to incorrect current password.', 'error');
                    }
                })
                .catch((error) => {
                    console.error('An error occurred:', error);
                    Swal.fire('Error changing password', 'An error occurred while changing the password due to incorrect current password.', 'error');
                });
            });
        });
    });


    document.addEventListener("DOMContentLoaded", function() {
    // Get references to the relevant elements
    const saveChangesButton = document.getElementById("saveChangesButton");
    const currentPasswordInput = document.getElementById("current_password");

    // Add a click event listener to the "Save Changes" button
    saveChangesButton.addEventListener("click", function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Check if the current password input is filled
        if (currentPasswordInput.value.trim() === "") {
            // If the current password is not filled, show an info alert
            Swal.fire({
                title: "Save Changes",
                text: "Please enter your current password to save changes.",
                icon: "warning",
            });
        } else {
            // If the current password is filled, show the confirmation dialog
            Swal.fire({
                title: "Confirm Save",
                text: "Are you sure you want to save the changes?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: '#7367f0',
                cancelButtonColor: '#808080',
                confirmButtonText: "Yes, save it!",
                cancelButtonText: "No, cancel",
                
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user clicks "Yes" in the confirmation dialog,
                    // submit the form
                    document.querySelector("form").submit();
                }
            });
        }
    });
});

    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('current_password');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        togglePassword.classList.toggle('fa-eye-slash');
    });

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