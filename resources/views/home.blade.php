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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



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
                    <li><a href="/profile">View Profile</a></li> <!-- Added line for View Profile -->
                    <li><a href="/account_settings">Edit Account</a></li>
                    <li><a href="#" onclick="logout()">Logout</a></li>
                </ul>
            </li>
        </ul>
        </nav>
    </header>

    <!-- Main content section -->
    <div class="container"><br>
        <h3 class="position">Welcome {{ Auth::user()->firstname }}!</h3>
        @if (isset($successMessage))
        <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert" style="max-width: 400px; margin-top: -50px; text-align:center">
            {{ $successMessage }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

 <br>

 
 @if ($documents->count() > 0)
 <div class="row">
 @foreach ($documents as $document)
    <div class="col-md-4">
        <h4>{{ $document->program_course }}</h4>
        <embed src="{{ asset('storage/documents/' . $document->document_path) }}" type="application/pdf" width="50%" height="300">
        <br>
        <div class="container">
            <a href="{{ asset('storage/documents/' . $document->document_path) }}" class="btn btn-danger btn-sm">View PDF</a>
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal{{ $document->id }}">View Details</button>

            <!-- Modal -->
            <div class="modal fade" id="myModal{{ $document->id }}" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Summary Details</h4>
                        <button type="button" class="close" data-dismiss="modal" style="position: absolute; top: 2rem; right: 2rem;">&times;</button>
                    </div>
                        <div class="modal-body">
                            <!-- Center the details -->
                            <div style="margin-top:10px;">
                            <p><strong>Program Course:</strong> {{ $document->program_course }}</p>
                            <p><strong>Type of Visit:</strong> {{ $document->type_of_visit }}</p>
                            <p><strong>Date of Visit:</strong> {{ $document->date_of_visit }}</p>
                            <p><strong>Award:</strong> {{ $document->award }}</p>
                            <p><strong>Validity Period:</strong> {{ $document->validity_period }}</p>
                            <p><strong>Grand Mean:</strong> {{ $document->grand_mean }}</p>
                            <p><strong>Document Path:</strong> {{ $document->document_path }}</p>
                        </div>
                    </div>
                        <div class="modal-footer">
                            <div class="container text-center">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
    </div>
    @else
        <p class="text-center"><i>No documents uploaded yet.</i></p>
    @endif

   
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