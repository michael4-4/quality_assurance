<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" integrity="sha384-Nsz6oApLgCYeKB4gt3KON1E5yZgx4j7lX0kNlgh1lRV58LyXX4Pe+0WqFdaJeCUV" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('css/manage_details.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

<script>
    // Wait for a few seconds and then remove the notification
    setTimeout(function() {
        var notification = document.querySelector('.centered-notification');
        if (notification) {
            notification.remove();
        }
    }, 6000); // Remove after 5 seconds

    // Wait for a few seconds and then remove the notification
    setTimeout(function() {
        var notification = document.querySelector('.centered-notification2');
        if (notification) {
            notification.remove();
        }
    }, 6000); // Remove after 5 seconds

    // Wait for a few seconds and then remove the notification
    setTimeout(function() {
        var notification = document.querySelector('.centered-notification3');
        if (notification) {
            notification.remove();
        }
    }, 6000); // Remove after 5 seconds
</script>

</head>
<body>
    @if(session('alert1'))
        <div class="centered-notification">
            {{ session('alert1') }}
        </div>
    @endif

    @if(session('alert2'))
        <div class="centered-notification2">
            {{ session('alert2') }}
        </div>
    @endif

    @if(session('alert3'))
        <div class="centered-notification3">
            {{ session('alert3') }}
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
            <li><a href="#" class="icon" onclick="toggleDropdown(event)"><i class="fas fa-user"></i>Profile</a>
            
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
     

    <div class="container">
        <div class="col-lg-11">
            <div>
                <h2 style="font-family: Garamond; text-align: center">Manage Details</h2>
            </div>
            <br>

        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <form action="{{ route('add_role') }}" method="POST" class="role-form">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-8" >
                                    <label for="role">Add New Role: <span style="color: grey"><em> opt</em></span></label>
                                    <input type="text" name="role" id="role" placeholder="New Role Name" class="form-control custom-input">
                                </div>
            
                                <div class="col-7">
                                    <label for="selected_role">Roles:</label>
                                    <select style="margin-top: 3px;" name="selected_role" id="selected_role" class="form-select custom-select">
                                        <option value="" disabled selected>Added Role(s)</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div style="text-align: center;">
                            <button type="submit" class="btn btn-sm btn-primary" id="addRoleButton" style="margin-right: 15px;">➕ Add Role</button>
                            </div>

                        </div>
                    </form>
                </div>


                <div class="col">
                    <form action="{{ route('add_department') }}" method="POST" class="department-form">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-8">
                                    <label for="department">Add New Department: <span style="color:grey"> <em> opt</em></span></label>
                                    <input type="text" name="department" id="department" placeholder="New Department Name" class="form-control custom-input">
                                </div>
            
                                <div class="col-7">
                                    <label for="selected_department">Departments:</label>
                                    <select style="margin-top: 3px;" name="selected_department" id="selected_department" class="form-select custom-select">
                                        <option value="" disabled selected>Added Department(s)</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div style="text-align: center;">
                            <button type="submit" class="btn btn-sm btn-warning" id="addDepartmentButton" style="color: white;">➕ Add Department</button>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="col">
                    <form action="{{ route('add_programcourse') }}" method="POST" class="programcourse-form">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-8">
                                    <label for="programcourse">Add Program Course:<span style="color: grey"> <em>opt</em></span></label>
                                    <input type="text" name="programcourse" id="programcourse" placeholder="New Program Course" class="form-control custom-input">
                                </div>
                                    
                                <div class="col-7">
                                    <label for="selected_programcourse">Departments:</label>
                                    <select style="margin-top: 3px;" name="selected_programcourse" id="selected_programcourse" class="form-select custom-select">
                                        <option value="" disabled selected>Added Program Course(s)</option>
                                        @foreach ($programcourses as $programcourse)
                                            <option value="{{ $programcourse->id }}">{{ $programcourse->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                                <div style="text-align: center;">
                                <button type="submit" class="btn btn-sm btn-success" id="addProgramCourseButton">➕ Add Program Course</button>
                                </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
            <br>
            <div class="submitposition">
                <a href="/home"><button type="button" class="btn btn-sm btn-secondary">Go Back</button></a>
            </div>
        </div>
    </div>
</body>
</html>


<script>
    // function to handle the add programcourse for sweet alert
    document.addEventListener("DOMContentLoaded", function () {
    const addprogramcourseButton = document.getElementById("addProgramCourseButton");
    const programcourseForm = document.querySelector(".programcourse-form");
    const programcourseInput = document.getElementById("programcourse");

    addProgramCourseButton.addEventListener("click", function (e) {
        e.preventDefault(); // Prevent the default form submission

        if (programcourseInput.value.trim() === '') {
            // The input field is empty; show an error message using SweetAlert.
            Swal.fire({
                title: 'Error',
                text: 'Please enter a role name.',
                icon: 'error'
            });
            programcourseInput.classList.add('is-invalid');
        } else {
            Swal.fire({
                title: 'Add Role',
                text: 'Are you sure you want to add this role?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Add it'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user confirms, submit the form
                    fetch(programcourseForm.action, {
                        method: programcourseForm.method,
                        body: new FormData(programcourseForm)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message === 'Role added successfully') {
                            Swal.fire({
                                title: 'Success',
                                text: 'Role added successfully.',
                                icon: 'success'
                            });
                            programcourseInput.value = ''; // Clear the input field on success
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: 'Role already exists.',
                                icon: 'error'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
            });
        }
    });

    // Listen to the input event on the roleInput element
    programcourseInput.addEventListener('input', function () {
            // Remove the is-invalid class when the user types or enters text
            programcourseInput.classList.remove('is-invalid');
        });
});

    // function to handle the add department for sweet alert
    document.addEventListener("DOMContentLoaded", function () {
    const addRoleButton = document.getElementById("addDepartmentButton");
    const departmentForm = document.querySelector(".department-form");
    const departmentInput = document.getElementById("department");

    addDepartmentButton.addEventListener("click", function (e) {
        e.preventDefault(); // Prevent the default form submission

        if (departmentInput.value.trim() === '') {
            // The input field is empty; show an error message using SweetAlert.
            Swal.fire({
                title: 'Error',
                text: 'Please enter a role name.',
                icon: 'error'
            });
            departmentInput.classList.add('is-invalid');
        } else {
            Swal.fire({
                title: 'Add Role',
                text: 'Are you sure you want to add this role?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Add it'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user confirms, submit the form
                    fetch(departmentForm.action, {
                        method: departmentForm.method,
                        body: new FormData(departmentForm)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message === 'Role added successfully') {
                            Swal.fire({
                                title: 'Success',
                                text: 'Role added successfully.',
                                icon: 'success'
                            });
                            departmentInput.value = ''; // Clear the input field on success
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: 'Role already exists.',
                                icon: 'error'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
            });
        }
    });

    // Listen to the input event on the roleInput element
    departmentInput.addEventListener('input', function () {
            // Remove the is-invalid class when the user types or enters text
            departmentInput.classList.remove('is-invalid');
        });
});

    // function to handle the add role for sweet alert
    document.addEventListener("DOMContentLoaded", function () {
    const addRoleButton = document.getElementById("addRoleButton");
    const roleForm = document.querySelector(".role-form");
    const roleInput = document.getElementById("role");

    addRoleButton.addEventListener("click", function (e) {
        e.preventDefault(); // Prevent the default form submission

        if (roleInput.value.trim() === '') {
            // The input field is empty; show an error message using SweetAlert.
            Swal.fire({
                title: 'Error',
                text: 'Please enter a role name.',
                icon: 'error'
            });
            roleInput.classList.add('is-invalid');
        } else {
            Swal.fire({
                title: 'Add Role',
                text: 'Are you sure you want to add this role?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Add it'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user confirms, submit the form
                    fetch(roleForm.action, {
                        method: roleForm.method,
                        body: new FormData(roleForm)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.message === 'Role added successfully') {
                            Swal.fire({
                                title: 'Success',
                                text: 'Role added successfully.',
                                icon: 'success'
                            });
                            roleInput.value = ''; // Clear the input field on success
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: 'Role already exists.',
                                icon: 'error'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
            });
        }
    });

    // Listen to the input event on the roleInput element
    roleInput.addEventListener('input', function () {
            // Remove the is-invalid class when the user types or enters text
            roleInput.classList.remove('is-invalid');
        });
});

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