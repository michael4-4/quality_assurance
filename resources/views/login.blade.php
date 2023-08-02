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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('css/login.css')}}">
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
                                    <span style="color: white; font-size: 20px; font-family: Times New Roman, Times, serif;">QUALITY ASSURANCE</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="color: white; text-decoration: underline; font-size: 20px; font-family: Times New Roman, Times, serif;">FEM Building (Admin Building) Room 204 Second Floor</span>
                                </td>
                            </tr>
                        </table>
                        <td class="logoqa">
                        <img src="{{ asset('images/QA_Logo.png') }}" alt="mmsulogo" id="logo" style="width: 80px; height:80px">
                        </td>
                    </td>
                </tr>
            </table>

<div class="layout">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center">
                    <div class="circle-image">
                        <img src="{{ asset('images/QA_Logo.png') }}" alt="Avatar">
                    </div>
                    <h2 class="card-title text-center" style="font-family: 'Times New Roman', Times, serif">Login Now</h2>
                </div>
            <div class="card-body">
                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address<span style="color: red">*</span></label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
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

                <div class="">
                    <div class="d-grid">
                        <button class="btn btn-success">Login</button>
                    </div>
                </div>

                <div class="text-center">
                    <br>
                    <p class="form-label">Doesn't have an account? <a href="{{ route('register') }}" style="color: #FFD700">Register here</a></p>
                </div>


                </form>
                
            </div>
            </div>
        </div>
    </div>
</div>
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
</script>