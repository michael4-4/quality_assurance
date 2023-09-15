<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
    <script src="{{ asset('js/register.js') }}" defer></script>
<<<<<<< HEAD
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>

=======
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1
</head>
<body>  

        <div id="header">
            <table>
                <tr>
                    <td>
                        <img src="{{ asset('images/mmsu.png') }}" alt="mmsulogo" id="logo">
                    </td>
                    <td>
                        <div class="text-container">
                            <div class="text-row"><u>Republic of the Philippines</u></div>
                            <div class="text-row2">Mariano Marcos State University</div>
                            <div class="text-row3">Ilocos Norte, Philippines</div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        
        <table>
            <tr>
                <td class="logo-container">
                    <table>
                        <tr>
                            <td style="text-align: right;">
                                <span style="color: white; font-size: 18px; font-family: Garamond;">QUALITY ASSURANCE</span>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
      
        <div class="layout">
        <div class="row justify-content-center">
        <div class="col-lg-6">
        <div class="card">
        
                <div class="card-body"> 
                            @if(Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif 
                            <form action="{{ route('register')}}" method="POST">
                                @csrf
                                <div class="title">
                                <h2 style="font-family: Garamond; margin-left: 230px;"><strong>Register Here</strong></h2>
                                </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
<<<<<<< HEAD
                                    <label for="department" class="form-label">Role<span style="color: red"> *</span></label>
                                    <select name="role" class="form-select" id="role" required>>
                                        <option value="" disabled selected>Select Role</option>
                                        <option value="admin">Quality Assurance Staff (Admin)</option>
                                        <option value="secondary">Department Chair (Secondary User)</option>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
=======
                                    <label for="department" class="form-label">Role<span style="color: red">*</span></label>
                                    <select name="role" class="form-select" id="department" required>>
                                        <option value="" disabled selected>Select Role</option>
                                        <option value="admin">Quality Assurance Staff (Admin)</option>
                                        <option value="secondary">Department Chair (Secondary User)</option>
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1
                                    </select>
                                </div>

                                <div class="col">
<<<<<<< HEAD
                                    <label for="department" class="form-label">Department<span style="color: red"> *</span></label>
=======
                                    <label for="department" class="form-label">Department<span style="color: red">*</span></label>
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1
                                    <select name="department" class="form-select" id="department" required>
                                    <option value="" disabled selected>Select Department</option>
                                    <option value="Quality Assurance">Quality Assurance</option>
                                    <option value="Computing and Information Sciences">Computer Science</option>
                                    <option value="Computing and Information Sciences">Information Technology</option>
                                    <option value="Languages and Literature">Languages and Literature</option>
                                    <option value="Physical Science">Physical Science</option>
                                    <option value="Mathematics">Mathematics</option>
                                    <option value="Biology">Biology</option>
                                    <option value="Physical Education">Physical Education</option>
                                    <option value="Social Sciences">Social Sciences</option>
<<<<<<< HEAD
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->name }}">{{ $department->name }}</option>
                                    @endforeach
=======
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1
                                    </select>
                                </div>
                            </div>
                        </div>

                                <div class="mb-3">
<<<<<<< HEAD
                                    <label for="college" class="form-label">College<span style="color: grey"> <em>- optional</em></span></label>
                                    <input type="text" name="college" class="form-control" id="college" placeholder="College">
=======
                                    <label for="college" class="form-label">College</label>
                                    <input type="text" name="college" class="form-control" id="college" placeholder="College (optional)">
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1
                                </div>

                                <div class="mb-3">
                                <div class="row">
                                    <div class="col">
<<<<<<< HEAD
                                        <label for="lastname" class="form-label">Last Name<span style="color: red"> *</span></label>
=======
                                        <label for="lastname" class="form-label">Last Name<span style="color: red">*</span></label>
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1
                                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name" required>
                                        @error('lastname')
                                            <div class="text-danger custom-error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
<<<<<<< HEAD
                                        <label for="firstname" class="form-label">First Name<span style="color: red"> *</span></label>
=======
                                        <label for="firstname" class="form-label">First Name<span style="color: red">*</span></label>
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1
                                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name" required>
                                        @error('firstname')
                                            <div class="text-danger custom-error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
<<<<<<< HEAD
                                        <label for="middlename" class="form-label">Middle Name<span style="color: red"> *</span></label>
=======
                                        <label for="middlename" class="form-label">Middle Name<span style="color: red">*</span></label>
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1
                                        <input type="text" name="middlename" class="form-control" id="middlename" placeholder="Middle Name" required>
                                        @error('middlename')
                                            <div class="text-danger custom-error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address<span style="color: red"> *</span></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                                    @error('email')
                                        <div class="text-danger custom-error-message">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <label for="password" class="form-label">Password<span style="color: red"> *</span></label>
                                            <div class="input-group">
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                                    <i class="far fa-eye"></i>
                                                </button>
                                                
                                            </div>
<<<<<<< HEAD
                                        </div>                                
=======
                                        </div>

                                        


>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1

                                        <div class="col">
                                            <label for="password_confirmation" class="form-label">Confirm Password<span style="color: red">*</span></label>
                                            <div class="input-group">
                                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password" required>
                                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                                    <i class="far fa-eye"></i>
                                                </button>
                                            </div>
                                            <div id="confirmPasswordError" class="invalid-feedback"></div>
                                            <div id="passwordDoNotMatchMessage" class="indicatorconfirmpassred"></div>
                                            <div id="passwordMatchedMessage" class="indicatorconfirmpassgreen"></div>
                                        </div>
                                    </div>
                                </div>
                                

                                <div id="confirmPasswordError" class="invalid-feedback"></div>
                                <div class="indicator" id="password-strength"></div>
                                                        
                            <div class="button-position">
                                <div class="button-color">
                                    <button id="registerBtn" class="btn btn-success" style="background-color: rgb(12, 75, 5);">Register</button>
                                </div>
                                    <div class="text-center mt-2"> <!-- Added margin-top to separate the links from the button -->
                                    </div>
                                    <p class="form-label">Already have an account? <a href="{{ route('login') }}" style="color: rgb(255, 203, 0);">Login here</a></p>
                                </div>

                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   

 

    <footer class="footerdesign">
    <div id="">
            <table>
                <tr>
                    <td>
                    <img src="{{ asset('images/QA_Logo.png') }}" alt="mmsulogo" id="logo" style="width: 70px; height:70px; margin-top:10px;">
                    </td>
                    <td>
                        <div class="text-container">
                            <div class="footertext"><img src ="{{asset('images/building.png')}}" style="width: 33px; height:25px; margin-right:7px; margin-left:-9px; margin-bottom:5px;" >Room 204 FEM Hall (Administration Building)</div>
                        </div>
                    </td>
                    
                    <td>
                        <div class="contact-section">
                        <div class="footerright1">Contact Us!</div>
                        <div class="footerright2"><img src ="{{asset('images/telephone.png')}}" style="width: 30px; height:25px; margin-right:10px;" >Local 1112</div>
                        <div class="footerright3"><img src ="{{asset('images/email.png')}}" style="width: 30px; height:25px; margin-right:10px;" >quality-assurance@mmsu.edu.ph</div>
                        </div>
                    </td>

                </tr>
            </table>

    </div>
    </footer>

    <script>
<<<<<<< HEAD
        document.addEventListener('DOMContentLoaded', function() {
        // Get the register button element
        const registerBtn = document.getElementById('registerBtn');

        // Add click event listener to the register button
        registerBtn.addEventListener('click', async function(event) {
            // Prevent form submission
            event.preventDefault();

            // Perform validation and database check here
            const password = document.querySelector('input[name="password"]');
            const confirmPassword = document.querySelector('input[name="password_confirmation"]');
            const lastname = document.querySelector('input[name="lastname"]');
            const firstname = document.querySelector('input[name="firstname"]');
            const middlename = document.querySelector('input[name="middlename"]');
            const email = document.querySelector('input[name="email"]');
            const role = document.querySelector('select[name="role"]');
            const department = document.querySelector('select[name="department"]');

            // Check if all required fields are filled
            if (
                password.value === confirmPassword.value &&
                lastname.value.trim() !== '' &&
                firstname.value.trim() !== '' &&
                middlename.value.trim() !== '' &&
                email.value.trim() !== '' &&
                role.value !== '' &&
                department.value !== ''
            ) {
                // Display a confirmation SweetAlert
                Swal.fire({
                    icon: 'question',
                    title: 'Confirm Registration',
                    html: 'Are you sure you want to submit this registration?<br>Please review before proceeding',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, register!',
                    cancelButtonText: 'No, cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If user confirms, submit the form
                        const form = document.querySelector('form');
                        form.submit();
                    }
                });
            } 
        });
    });

        document.addEventListener('DOMContentLoaded', function() {
        // Get the register button element
        const registerBtn = document.getElementById('registerBtn');

        // Add click event listener to the register button
        registerBtn.addEventListener('click', function(event) {
            // Perform validation here
            const password = document.querySelector('input[name="password"]');
            const confirmPassword = document.querySelector('input[name="password_confirmation"]');

            if (password.value !== confirmPassword.value) {
                event.preventDefault(); // Prevent form submission

                // Display a SweetAlert error message
                Swal.fire({
                    icon: 'error',
                    title: 'Passwords Do Not Match',
                    text: 'Please make sure your passwords match!',
                    customClass: {
                        confirmButton: 'swal2-confirm2', // Apply custom class to the "OK" button
                    },
                    
                });
            }
        });
    });

        document.addEventListener('DOMContentLoaded', function() {
        // Get the register button element
        const registerBtn = document.getElementById('registerBtn');

        // Add click event listener to the register button
        registerBtn.addEventListener('click', function(event) {
            // Perform validation here
            const role = document.querySelector('select[name="role"]');
            const department = document.querySelector('select[name="department"]');
            const lastname = document.querySelector('input[name="lastname"]');
            const firstname = document.querySelector('input[name="firstname"]');
            const middlename = document.querySelector('input[name="middlename"]');
            const email = document.querySelector('input[name="email"]');
            const password = document.querySelector('input[name="password"]');
            const confirmPassword = document.querySelector('input[name="password_confirmation"]');

            if (!role.value || !department.value || !lastname.value || !firstname.value || !middlename.value || !email.value || !password.value || !confirmPassword.value) {
                event.preventDefault(); // Prevent form submission
          
                // Display a SweetAlert error message
                Swal.fire({
                    icon: 'info',
                    title: 'Oops...',
                    text: 'Please fill out all required fields!',
                    customClass: {
                        confirmButton: 'swal2-confirm1', // Apply custom class to the "OK" button
                    },
                });
            }
        });
    });

=======
    
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1
        const togglePassword = document.querySelectorAll('.toggle-password');
        const passwordInput = document.querySelector('#password');
        const confirmPasswordInput = document.querySelector('#password_confirmation');
    
    
        togglePassword.forEach((button) => {
            button.addEventListener('click', function () {
                const type = this.previousElementSibling.getAttribute('type') === 'password' ? 'text' : 'password';
                this.previousElementSibling.setAttribute('type', type);
                // Change the icon based on the input type
                this.querySelector('i').className = type === 'password' ? 'far fa-eye' : 'far fa-eye-slash';
            });
        });
    
    
        // Other parts of your script
    
        // Function to validate password confirmation
        function validatePassword() {
        const passwordInput = document.querySelector('#password');
        const confirmPasswordInput = document.querySelector('#password_confirmation');
        const confirmPasswordError = document.querySelector('#confirmPasswordError');
        const passwordDoNotMatchMessage = document.querySelector('#passwordDoNotMatchMessage');
        const passwordMatchedMessage = document.querySelector('#passwordMatchedMessage');

        if (passwordInput.value !== confirmPasswordInput.value) {
            confirmPasswordError.innerText = "";
            passwordDoNotMatchMessage.innerText = "Password do not match";
            passwordDoNotMatchMessage.classList.add('glow-red');
            passwordMatchedMessage.innerText = "";
            passwordMatchedMessage.classList.remove('glow-green');
            confirmPasswordInput.classList.add('is-invalid');
        } else {
            confirmPasswordError.innerText = "";
            passwordDoNotMatchMessage.innerText = "";
            passwordDoNotMatchMessage.classList.remove('glow-red');
            passwordMatchedMessage.innerText = "Password matched";
            passwordMatchedMessage.classList.add('glow-green');
            confirmPasswordInput.classList.remove('is-invalid');
        }
    }

    // Attach input event listeners to validate passwords
    document.querySelector('#password').addEventListener('input', validatePassword);
    document.querySelector('#password_confirmation').addEventListener('input', validatePassword);

    // Attach form submission event listener to validate passwords
    document.querySelector('form').addEventListener('submit', function (event) {
        if (passwordInput.value !== confirmPasswordInput.value) {
            event.preventDefault();
            alert("Passwords do not match. Please make sure both passwords are the same.");
        }
});

    // Other parts of your script

    // Function to check password strength and update border color
       // Other parts of your script

    // Function to check password strength and update border color
    function checkPasswordStrength(password) {
    const strengthIndicator = document.querySelector('#password-strength');
    const passwordInput = document.querySelector('#password');
    const weakColor = "#FF6347";     // Red color for weak passwords
    const mediumColor = "#FFA500";   // Orange color for medium passwords
    const strongColor = "#2E8B57";   // Green color for strong passwords

    let strength = 0;

    // Check for lowercase letters
    if (password.match(/[a-z]/)) {
        strength++;
    }

    // Check for uppercase letters
    if (password.match(/[A-Z]/)) {
        strength++;
    }

    // Check for numbers
    if (password.match(/[0-9]/)) {
        strength++;
    }

    // Check for symbols
    if (password.match(/[!@#$%^&*()_+{}[\]:;<>,.?~\\/-]/)) {
        strength++;
    }

    if (strength === 0) {
        strengthIndicator.textContent = "";
        passwordInput.style.borderColor = "";
        passwordInput.style.animation = "";  // Remove animation
    } else if (strength <= 2) {
        strengthIndicator.textContent = "Weak";
        strengthIndicator.style.color = weakColor;
        passwordInput.style.borderColor = weakColor;
        passwordInput.style.animation = "glow 1s infinite";  // Apply glow animation
    } else if (strength === 3) {
        strengthIndicator.textContent = "Medium";
        strengthIndicator.style.color = mediumColor;
        passwordInput.style.borderColor = mediumColor;
        passwordInput.style.animation = "gloww 2s infinite";  // Apply glow animation
    } else if (strength >= 4) {
        strengthIndicator.textContent = "Strong";
        strengthIndicator.style.color = strongColor;
        passwordInput.style.borderColor = strongColor;
        passwordInput.style.animation = "glowww 3s infinite";  // Apply glow animation
    }
}

    // Attach input event listener to password field for password strength checking
    document.querySelector('#password').addEventListener('input', function () {
        const password = this.value;
        checkPasswordStrength(password);
    });


    // Rest of your script
</script>

</body>
</html>


