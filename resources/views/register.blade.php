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
                                <span style="color: white; font-size: 20px; font-family: Garamond;">QUALITY ASSURANCE</span>
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
                <div class="col-lg-5"> <!-- Reduced the column size to make the form smaller -->
                    <div class="card">

                        <div class="card-body">
                            @if(Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif 
                            <form action="{{ route('register')}}" method="POST">
                                @csrf
                        
                        <div class="mb-3">
                            <label for="department" class="form-label">Department<span style="color: red">*</span></label>
                            <select name="department" class="form-select" id="department" required>
                            <option value="" disabled selected>Select Department</option>
                            <option value="Quality Assurance">Quality Assurance</option>
                            <option value="Computing and Information Sciences">Computing and Information Sciences</option>
                            <option value="Languages and Literature">Languages and Literature</option>
                            <option value="Physical Science">Physical Science</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="Biology">Biology</option>
                            <option value="Physical Education">Physical Education</option>
                            <option value="Social Sciences">Social Sciences</option>
                            </select>
                        </div>

                                <div class="mb-3">
                                    <label for="college" class="form-label">College<span style="color: red">*</span></label>
                                    <input type="text" name="college" class="form-control" id="college" placeholder="College">
                                </div>

                                <div class="mb-3">
                                    <label for="lastname" class="form-label">Last Name<span style="color: red">*</span></label>
                                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Lastname" required>
                                    @error('lastname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="firstname" class="form-label">First Name<span style="color: red">*</span></label>
                                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Firstname" required>
                                    @error('firstname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="middlename" class="form-label">Middle Name<span style="color: red">*</span></label>
                                    <input type="text" name="middlename" class="form-control" id="middlename" placeholder="Middlename" required>
                                    @error('middlename')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address<span style="color: red">*</span></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                <label for="password" class="form-label">Password<span style="color: red">*</span></label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password<span style="color: red">*</span></label>
                                <div class="input-group">
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password" required>
                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </div>
                                <div id="confirmPasswordError" class="invalid-feedback"></div><!-- Add a div to display error message -->
                            </div>
                                                        
                                <div class="button-position">
                                    <div class="button-color">
                                        <button class="btn btn-success" style="background-color: rgb(12, 75, 5);">Register</button>
                                    </div>
                                    <div class="text-center mt-2"> <!-- Added margin-top to separate the links from the button -->
                                    <br>
                                        <p class="form-label">Already have an account? <a href="{{ route('login') }}" style="color: rgb(255, 203, 0);">Login here</a></p>
                                    </div>
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
                    <img src="{{ asset('images/QA_Logo.png') }}" alt="mmsulogo" id="logo" style="width: 80px; height:80px; margin-top:10px;">
                    </td>
                    <td>
                        <div class="text-container">
                            <div class="footertext"><img src ="{{asset('images/building.png')}}" style="width: 33px; height:25px; margin-right:7px; margin-left:-9px; margin-bottom:5px;" >Room 204 FEM Hall (Administration Building)</div>
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
                                <div class="position">
                                <div class="footerright1">Contact Us!</div>
                                <div class="footerright2"><img src ="{{asset('images/telephone.png')}}" style="width: 30px; height:20px; margin-right:10px;" >Local 1112</div>
                                <div class="footerright3"><img src ="{{asset('images/email.png')}}" style="width: 30px; height:25px; margin-right:10px;" >quality-assurance@mmsu.edu.ph</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </footer>
</body>
</html>


<script>
    function validatePassword() {
        const passwordInput = document.querySelector('#password');
        const confirmPasswordInput = document.querySelector('#password_confirmation');
        const confirmPasswordError = document.querySelector('#confirmPasswordError');

        if (passwordInput.value !== confirmPasswordInput.value) {
            confirmPasswordError.innerText = "Passwords do not match";
            confirmPasswordInput.classList.add('is-invalid');
            return false;
        } else {
            confirmPasswordError.innerText = "";
            confirmPasswordInput.classList.remove('is-invalid');
            return true;
        }
    }

    document.querySelector('#password_confirmation').addEventListener('input', validatePassword);

    document.querySelector('form').addEventListener('submit', function (event) {
        if (!validatePassword()) {
            event.preventDefault();
            alert("Passwords do not match. Please make sure both passwords are the same.");
        }
    });


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
</script>