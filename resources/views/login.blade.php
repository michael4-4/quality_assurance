<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- toggle -->
    <!-- Font Awesome -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <script>
        // Wait for a few seconds and then remove the notification
        setTimeout(function() {
            var notification = document.querySelector('.centered-notification');
            if (notification) {
                notification.remove();
            }
<<<<<<< HEAD
        }, 6000); // Remove after 5 seconds
    </script>
    <script>
        // Wait for a few seconds and then remove the notification
        setTimeout(function() {
            var notification = document.querySelector('.centered-notification2');
            if (notification) {
                notification.remove();
            }
        }, 6000); // Remove after 5 seconds
    </script>
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
=======
        }, 10000); // Remove after 5 seconds
    </script>
    
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1

    </head>
    <body>  
        @if(session('alert'))
        <div class="centered-notification">
            {{ session('alert') }}
        </div>
    @endif
<<<<<<< HEAD

        @if(session('alert2'))
        <div class="centered-notification2">
            {{ session('alert2') }}
        </div>
    @endif
=======
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1
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
            <!--
            <div class="title">
            <h2 style="font-family: Garamond"><b>Login Now</b></h2>
            </div>
<<<<<<< HEAD
        -->
            
        <p style="font-family: 'Great Vibes', sans-serif; font-stretch: expanded; font-size:30px; text-align:center; margin-top:50px;">Welcome to our system!<br>We're delighted to have you join us and make the most of our services.</p>
=======

            
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1
<div class="layout">
                            
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card">
                
            <div class="card-body">
<<<<<<< HEAD
                <h2 style="font-family: Garamond; text-align:center"><b>Login Now</b></h2>
                    <!--
                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert" style="max-width: 400px; text-align:center; font-size: 15px; margin-top: 15px;" >
                            {{ Session::get('error') }}
                        </div>
                    @endif-->
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            
                            <label for="email" class="form-label">Email Address<span style="color: red"> *</span></label>
                            <input type="email" name="email" class="form-control form-control-sm" id="email" placeholder="name@example.com" required
=======
                       
                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert" style="max-width: 400px; text-align:center; font-size: 15px;" >
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address<span style="color: red">*</span></label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1
                            value="{{ session('remember_email') ?? old('email') }}" required>
                        </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password<span style="color: red"> *</span></label>
                    <div class="input-group">
<<<<<<< HEAD
                        <input type="password" name="password" class="form-control form-control-sm" id="password" placeholder="Password" required>
=======
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1
                            
                        <button class="btn btn-outline-secondary toggle-password" type="button">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-3 form-check remember-checkbox">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
                

                <div class="button-position">
                    <div class="button-color">
                        <button class="btn btn-success" style="background-color: rgb(12, 75, 5);">Login</button>
                    </div>
                </div>

                <div class="text-center">
                    <br>
                    <p class="form-label">Doesn't have an account? <a href="{{ route('register') }}" style="color: rgb(255, 203, 0);">Register here</a></p>
                </div>


                </form>
                
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
    
</body>
</html>

<script>
    const togglePassword = document.querySelector('.toggle-password');
    const passwordInput = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        // Change the icon based on the input type
        togglePassword.querySelector('i').className = type === 'password' ? 'far fa-eye' : 'far fa-eye-slash';
    });

    function adjustRememberMePosition() {
        $('.alert').length ? $('.remember-checkbox').addClass('adjusted') : $('.remember-checkbox').removeClass('adjusted');
    }

    $(document).ready(function() {
        adjustRememberMePosition(); // Call the function on document ready

        // You can also call the function when an alert is shown/hidden
        $('.alert').on('show.bs.alert hide.bs.alert', function() {
            adjustRememberMePosition();
        });
    });

</script>