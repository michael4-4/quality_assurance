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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.16.0/font/bootstrap-icons.css" rel="stylesheet">
<<<<<<< HEAD
 
    <!-- Include the Cropper.js library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
=======
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1

    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
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
        <div class="circular-border2">
            <a href="/profile"><img src="{{ asset('storage/' . Auth::user()->profile_image) }}"  onerror="this.style.display='none'" class="profile-image2"></a>
        </div>
        </nav>
    </header>

    <div class="container">
    <div class="row justify-content-center"> <!-- Center-align the row -->
        <div class="col-md-16">

    
<<<<<<< HEAD
            <form action="{{ route('editProfileImage') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="profile-image-container">
                    <div class="circular-border">
                        <img src="{{ asset('storage/' . $user->profile_image) }}" alt="" class="profile-image" id="profileImagePreview">
                        <label for="profileImageInput" class="add-icon">
                            <i class="bi bi-plus-circle-fill"></i>
                        </label>
                        <label for="profileImageInput" class="edit-icon">
                            <i class="bi bi-pencil-fill"></i>
                        </label>
                    </div>
                </div>
                <input type="file" id="profileImageInput" name="profileImage" class="sr-only" onchange="showImagePreview()">
                
              <!--  <button style="background-color: #f0ad4e; border-color: #f0ad4e;" type="button" class="btn btn-warning edit-button" onclick="showEditConfirmation()">✏️ Edit</button> -->

                <button type="submit" class="btn btn-info save-button" onclick="showSaveConfirmation()">➕ Save<i class="bi bi-plus-circle-fill"></i></button>
                
                <button style="background-color: #d9534f; border-color: #d9534f;" type="button" class="btn btn-danger delete-button" onclick="showDeleteConfirmation()">🗑️ Delete</button>

=======
        <form action="{{ route('editProfileImage') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="profile-image-container">
        <div class="circular-border">
            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="" class="profile-image" id="profileImagePreview">
            <label for="profileImageInput" class="add-icon">
                <i class="bi bi-plus-circle-fill"></i>
            </label>
            <label for="profileImageInput" class="edit-icon">
                <i class="bi bi-pencil-fill"></i>
            </label>
        </div>
    </div>
    <input type="file" id="profileImageInput" name="profileImage" class="sr-only" onchange="showImagePreview()">
    
    <!-- Hidden input for image deletion -->
    <input type="hidden" id="deleteProfileImage" name="deleteProfileImage" value="0">

    <button style="background-color: #f0ad4e; border-color: #f0ad4e;" type="button" class="btn btn-warning edit-button" onclick="showEditConfirmation()">Edit Image</button>

    <button type="submit" class="btn btn-danger delete-button" onclick="showDeleteConfirmation()">Delete Image</button>
    <button type="submit" class="btn btn-info save-button">Save Image <i class="bi bi-plus-circle-fill"></i></button>



            
>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1
                <div class="form-group">
                    <h3 class="text-center" style="font-family: Garamond">Your Profile Information</h3>

                    <div class="row">
                            <div class="col">
                                <label for="role">Role:</label>
                                <input type="text" id="role" name="role" class="form-control" value="{{ Auth::user()->role }}" disabled>
                            </div>
                            
                            <div class="col">
                                <label for="department">Department:</label>
                                <input type="text" id="department" name="department" class="form-control" value="{{ Auth::user()->department }}" disabled>
                            </div>

                            <div class="col">
                                <label for="college">College:</label>
                                <input type="text" id="college" name="college" class="form-control" value="{{ Auth::user()->college }}" disabled>
                            </div>
                    </div>
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
    function showDeleteConfirmation() {
<<<<<<< HEAD
    Swal.fire({
        title: 'Delete Profile Image',
        text: 'Are you sure you want to delete the profile image?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it'
    }).then((result) => {
        if (result.isConfirmed) {
            // Make an AJAX request to delete the image on the server
            fetch('/deleteProfileImage', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token
                },
            })
            .then(response => response.json())
            .then(data => {
                // Handle the response from the server
                if (data.success) {
                    const profileImage = document.getElementById('profileImagePreview');
                    profileImage.src = ''; // Clear the image preview
                    location.reload();
                } else {
                    // Handle error, display a message, etc.
                }
            })
            .catch(error => {
                console.error('Error deleting profile image:', error);
                // Handle error, display a message, etc.
            });
        }
    });
}

    function showEditConfirmation() {
        const confirmEdit = window.confirm("Are you sure you want to edit the image?");
        
        if (confirmEdit) {
            // If the user confirms, open the edit image modal
            const editImageModal = new bootstrap.Modal(document.getElementById('editImageModal'));
            editImageModal.show();
        }

    }

    function showSaveConfirmation() {
    if (confirm("Are you sure you want to save the image?")) {
        // If the user confirms, submit the main form for saving
        document.forms[0].submit();
        
        // Display a success SweetAlert after the form submission
        Swal.fire({
            title: 'Image Saved',
            text: 'The image has been saved successfully.',
            icon: 'success',
            confirmButtonText: 'OK',
        });
    }
}

    function showImagePreview() {
        const input = document.getElementById('profileImageInput');
        const preview = document.getElementById('profileImagePreview');
        const circularBorderImage = document.getElementById('circularBorderImage');

=======
    const confirmation = confirm("Are you sure you want to delete the image?");
    if (confirmation) {
        document.getElementById('deleteProfileImage').value = '1';
    } else {
        document.getElementById('deleteProfileImage').value = '0';
    }
}


    function showEditConfirmation() {
    const confirmEdit = window.confirm("Do you want to edit the profile image?");
    if (confirmEdit) {
        document.getElementById('profileImageInput').click(); // Trigger the file input click
    }
}

    function showImagePreview() {
        const input = document.getElementById('profileImageInput');
        const preview = document.getElementById('profileImagePreview');
        const circularBorderImage = document.getElementById('circularBorderImage');

>>>>>>> 4e3eecf13bc0cc063f27a9b238f0ac76d39637f1
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                circularBorderImage.src = e.target.result;
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    }
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
        confirmButtonText: 'Yes, Logout',
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