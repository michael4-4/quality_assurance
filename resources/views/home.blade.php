<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" integrity="sha384-Nsz6oApLgCYeKB4gt3KON1E5yZgx4j7lX0kNlgh1lRV58LyXX4Pe+0WqFdaJeCUV" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
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
            <!--<li><a href="#" class="icon" onclick="toggleDropdown(event)"><i class="fas fa-user"></i><img src="{{ asset('images/profile-removebg-preview (1).png') }}" alt="Profile Image"></a>-->
                <!-- Dropdown menu for "Profile" link -->
                <ul class="dropdown-menu" id="profileDropdown">
                    <li><a href="/account_settings">Account Settings</a></li>
                    <li><a href="#" onclick="logout()">Logout</a></li>
                </ul>
            </li>
        </ul>
        </nav>
    </header>

    <!-- Main content section -->
    <div class="container"><br>
        <h1 class="position">Welcome, {{ Auth::user()->name }}!</h1>
    </div>

    <div class="foreground-container">
        <img src="{{asset('images/mmsu2.png')}}">
    </div>
     

</body>
</html>


<script>
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