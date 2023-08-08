<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" integrity="sha384-Nsz6oApLgCYeKB4gt3KON1E5yZgx4j7lX0kNlgh1lRV58LyXX4Pe+0WqFdaJeCUV" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" integrity="sha384-Nsz6oApLgCYeKB4gt3KON1E5yZgx4j7lX0kNlgh1lRV58LyXX4Pe+0WqFdaJeCUV" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
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
            <li><a href="#" class="icon" onclick="toggleDropdown(event)"><i class="fas fa-user"></i>Profile<img src="{{ asset('images/profile-removebg-preview (1).png') }}" alt="Profile Image"></a>
                <!-- Dropdown menu for "Profile" link -->
                <ul class="dropdown-menu" id="profileDropdown">
                    <li><a href="/profile">View Profile</a></li> <!-- Added line for View Profile -->
                    <li><a href="/account_settings">Edit Account</a></li>
                    <li><a href="#" onclick="logout()">Logout</a></li>
                </ul>
            </li>
        </ul>
        </nav>
    </header>

    <div class="container">
    <div class="row justify-content-center"> <!-- Center-align the row -->
        <div class="col-md-16">

        <form method="POST" action="{{ route('uploadProfileImage') }}" enctype="multipart/form-data">
    @csrf

        <label for="profileImage">Profile Image:</label>
        <input type="file" id="profileImage" name="profileImage" accept="image/*">
        <button type="submit" class="btn btn-primary">Upload</button>
    
</form>
            @if (Auth::user()->profile_image)
                <div class="circle-profile-image">
                    <img src="{{ asset('storage/' . Auth::user()->profile_image) }}">
                    <form method="POST" action="{{ route('deleteProfileImage') }}" class="delete-profile-image-form">
                        @csrf
                        @method('DELETE') <!-- Add this line -->
                        <button type="submit" class="btn btn-danger btn-sm">Delete Image</button>
                    </form>
                </div>
            @endif
                                     
            <form>
                <div class="form-group">
                <h3 class="text-center" style="font-family: Garamond">Your Profile Information</h3>
                    <label for="department">Department:</label>
                    <input type="text" id="department" name="department" class="form-control" value="{{ Auth::user()->department }}" disabled>
                </div>
                <div class="form-group">
                    <label for="college">College:</label>
                    <input type="text" id="college" name="college" class="form-control" value="{{ Auth::user()->college }}" disabled>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label for="lastname">Last Name:</label>
                        <input type="text" id="lastname" name="lastname" class="form-control" value="{{ Auth::user()->lastname }}" disabled>
                    </div>
                    <div class="col">
                        <label for="firstname">First Name:</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" value="{{ Auth::user()->firstname }}" disabled>
                    </div>
                    <div class="col">
                        <label for="middlename">Middle Name:</label>
                        <input type="text" id="middlename" name="middlename" class="form-control" value="{{ Auth::user()->middlename }}" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                </div>
                <!-- Add more profile fields here as needed -->
            </form>
        </div>
    </div>
</div>

    
</body>
</html>


<script>
    // Add an event listener to the form submission
    document.addEventListener('submit', function (event) {
        const form = event.target;
        if (form.classList.contains('delete-profile-image-form')) {
            event.preventDefault(); // Prevent the default form submission

            // Confirm with the user before deleting the image
            const confirmation = confirm('Are you sure you want to delete your profile image?');
            if (confirmation) {
                // Change the form method to DELETE and submit it
                form.method = 'POST';
                form.action = '{{ route("deleteProfileImage") }}';
                const methodInput = document.createElement('input');
                methodInput.setAttribute('type', 'hidden');
                methodInput.setAttribute('name', '_method');
                methodInput.setAttribute('value', 'DELETE');
                form.appendChild(methodInput);
                form.submit();
            }
        }
    });

    const profileImage = document.getElementById('profileImage');
    const imageInput = document.getElementById('imageInput');

    profileImage.addEventListener('click', () => {
        imageInput.click();
    });

    imageInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                profileImage.style.backgroundImage = `url('${e.target.result}')`;
                profileImage.style.backgroundSize = 'cover';
            };
            reader.readAsDataURL(file);
        }
    });


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