<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" integrity="sha384-Nsz6oApLgCYeKB4gt3KON1E5yZgx4j7lX0kNlgh1lRV58LyXX4Pe+0WqFdaJeCUV" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/home.css')}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
        @if(session('alert'))
            <div class="centered-notification">
                {{ session('alert') }}
            </div>
        @endif

        @if(session('success'))
            <div class="centered-notification2">
                {{ session('success') }}
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
              
            <li><a style="text-decoration:none; color:white"  href="/home">Home</a></li>
            <li><a style="text-decoration:none; color:white" href="/upload">Upload</a></li>
            <li><a style="text-decoration:none; color:white" href="#" class="icon" onclick="toggleDropdown(event)"><i class=""></i>Profile</a>
            
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

    

<!-- Main content section -->
<div class="container">
    <br>
    @auth
    <h3 class="position">Welcome {{ Auth::user()->firstname }}!</h3>
    <div style="margin-bottom: -25px;"></div>

<form onsubmit="return validateSearch()">
    <div class="filter-box">
        <label class="filterby" for="filterbySelect">Filter By:</label> <!-- Add a label element -->
        <select id="filterSelect" name="filterSelect">
            <option value="all">Select Fiter</option>
            <option value="Default">Default</option>
            <option value="az">A-Z</option>
            <option value="latest">Latest Upload</option>
            <!-- Add more filter options as needed -->
        </select>
        <input type="text" id="searchInput" placeholder="Search by Program Course" required>
        <button onclick="searchDocuments()" class="search-icon-button">
            <i class="fas fa-search"></i> <!-- FontAwesome search icon -->
    </div>
</form>
    
    <!-- Create a dynamic filter search with five dropdowns -->

        <div class="col-md-3">
          
                <label for="programCourse">Program Course:</label>
        
                    <select class="form-select form-control-lg" id="programCourse" name="programCourse">
                        <!-- Options for Program Course -->
                        
                    <option value="all">Select Program Course</option>
                    <option value="all">All</option> 
                    <option value="Doctor of Philosophy in Linguistics">Doctor of Philosophy in Linguistics</option>
                    <option value="Doctor of Philosophy in Rural Development">Doctor of Philosophy in Rural Development</option>
                    <option value="Doctor of Education major in Educational Mgt.">Doctor of Education major in Educational Mgt.</option>
                    <option value="Master of Arts/Master in Education">Master of Arts/Master in Education</option>
                    <option value="Master of Arts in English Language and Literature">Master of Arts in English Language and Literature</option>
                    <option value="Master of Arts/Master in Nursing">Master of Arts/Master in Nursing</option>
                    <option value="Master of Arts/Master in Public Administration">Master of Arts/Master in Public Administration</option>
                    <option value="Master of Science in Biology">Master of Science in Biology</option>
                    <option value="Master of Science/Master in Animal Science">Master of Science/Master in Animal Science</option>
                    <option value="Master of Science/Master in Crop Science">Master of Science/Master in Crop Science</option>
                    <option value="Master of Science in Mathematics">Master of Science in Mathematics</option>
                    <option value="Master of Science/Master in Rural Development">Master of Science/Master in Rural Development</option>
                    <option value="Master of Science/Master in Engineering">Master of Science/Master in Engineering</option>
                    <option value="Master in Informatiion Technology">Master in Informatiion Technology</option>
                    <option value="Master in Management">Master in Management</option>
                    <option value="Professional Science Masters-Renewable Energy Engineering">Professional Science Masters-Renewable Energy Engineering</option>
                    <option value="Doctor of Medicine">Doctor of Medicine</option>
                    <option value="Bachelor of Science in Agribusiness">Bachelor of Science in Agribusiness</option>
                    <option value="Bachelor of Science in Agriculture">Bachelor of Science in Agriculture</option>
                    <option value="Bachelor of Science in Development Communication">Bachelor of Science in Development Communication</option>
                    <option value="Bachelor of Science in Environmental Science">Bachelor of Science in Environmental Science</option>
                    <option value="Bachelor of Science in Food Technology">Bachelor of Science in Food Technology</option>
                    <option value="Bachelor of Science in Forestry">Bachelor of Science in Forestry</option>
                    <option value="Bachelor of Science in Fisheries">Bachelor of Science in Fisheries</option>
                    <option value="Bachelor of Science in Marine Biology">Bachelor of Science in Marine Biology</option>
                    <option value="Bachelor of Science in Communication">Bachelor of Science in Communication</option>
                    <option value="Bachelor of Science in English Language">Bachelor of Science in English Language</option>
                    <option value="Bachelor of Science in Sociology">Bachelor of Science in Sociology</option>
                    <option value="Bachelor of Science in Biology">Bachelor of Science in Biology</option>
                    <option value="Bachelor of Science in Mathematics">Bachelor of Science in Mathematics</option>
                    <option value="Bachelor of Science in Meteorology">Bachelor of Science in Meteorology</option>
                    <option value="Bachelor of Science in Psychology">Bachelor of Science in Psychology</option>
                    <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                    <option value="Bachelor of Science in Business Administration">Bachelor of Science in Business Administration</option>
                    <option value="Bachelor of Science in Cooperative Management">Bachelor of Science in Cooperative Management</option>
                    <option value="Bachelor of Science in Economics">Bachelor of Science in Economics</option>
                    <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option> 
                    <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option> 
                    <option value="Bachelor of Science in Tourism Management">Bachelor of Science in Tourism Management</option> 
                    <option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option> 
                    <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option> 
                    <option value="Bachelor of Science in Agricultural & Biosystems Engineering">Bachelor of Science in Agricultural & Biosystems Engineering</option> 
                    <option value="Bachelor of Science in Ceramic Engineering">Bachelor of Science in Ceramic Engineering</option> 
                    <option value="Bachelor of Science in Chemical Engineering">Bachelor of Science in Chemical Engineering</option> 
                    <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering of Science in Civil Engineering</option> 
                    <option value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option> 
                    <option value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option> 
                    <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option> 
                    <option value="Bachelor of Science in Mechanical Engineering">Bachelor of Science in Mechanical Engineering</option> 
                    <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option> 
                    <option value="Bachelor of Science in Pharmacy">Bachelor of Science in Pharmacy</option> 
                    <option value="Bachelor of Science in Physical Therapy">Bachelor of Science in Physical Therapy</option> 
                    <option value="Bachelor in Automotive Technology">Bachelor in Automotive Technology</option> 
                    <option value="Bachelor of Science in Industrial Technology">Bachelor of Science in Industrial Technology</option> 
                    <option value="Bachelor of Culture and Arts Education">Bachelor of Culture and Arts Education</option> 
                    <option value="Bachelor of Early Childhood Education">Bachelor of Early Childhood Education</option> 
                    <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option> 
                    <option value="Bachelor of Physical Education">Bachelor of Physical Education</option> 
                    <option value="Bachelor of Secondary Education">Bachelor of Secondary Education</option> 
                    <option value="Bachelor of Special Needs Education">Bachelor of Special Needs Education</option> 
                    <option value="Bachelor of Technical Vocational Teacher Education">Bachelor of Technical Vocational Teacher Education</option> 
                    <option value="Bachelor of Technology and Livelihood Education">Bachelor of Technology and Livelihood Education</option> 
                    <option value="Doctor of Veterinary Medicine">Doctor of Veterinary Medicine</option> 
                    </select>
           
        </div>
       
        <div class="col-md-2">
                <label for="dateofVisit">Date of Visit:</label>
                    <select class="form-select form-control-lg" id="dateofVisit" name="dateOfVisit">
                        <!-- Options for Date of Visit (Year) -->
                        <option value="all">Select Year</option>
                        <option value="all">All</option> 
                        @for ($year = 2000; $year <= 2024; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
        </div>

        <div class="col-md-2">
            <label for="type_of_award">Type of Award:</label> 
            <select class="form-select form-control-lg" id="type_of_award" name="type_of_award">
                <!-- Options for Program Course -->
                <option value="all">Select Award</option> 
                <option value="all">All</option> 
                <option value="Level I">Level I</option>
                <option value="Level II">Level II</option>
                <option value="Level III">Level III</option>
                <option value="Level IV">Level IV</option>
            </select>
        </div>
        
        
        <div class="col-md-3">
                <label for="validityPeriod">Validity Period:</label>
                    <select class="form-select form-select-lg" id="validityPeriod" name="validityPeriod">
                    <option value="all">Select Validity Period</option>
                    <option value="all">All</option> 
                        @for ($year = 2000; $year <= 2024; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
        </div>

        <div class="col-md-2">
            <label for="grandMean">Grand Mean:</label>
            <input type="number" class="form-control" id="grandMeanInput" placeholder="Enter Grand Mean" min="1" max="5" step="0.01">
        </div>
    <!-- ... existing code for success message ... -->
    @endif
</div>

<br>
<div id="noDocumentsMessageDefault" style="display: none; margin-left: 470px; margin-top: 98px;">
    <i>--No documents found to be search, Try entering the correct keyword--.</i>
</div>
<div id="noDocumentsMessage1" style="display: none; margin-left:500px; margin-top:98px"><i>--No documents found matching the selected program course.--</i></div>
<div id="noDocumentsMessage2" style="display: none; margin-left:500px; margin-top:98px"><i>--No documents found matching the selected date of visit.--</i></div>
<div id="noDocumentsMessage3" style="display: none; margin-left:500px; margin-top:98px"><i>--No documents found matching the selected type of award.--</i></div>
<div id="noDocumentsMessage4" style="display: none; margin-left:500px; margin-top:98px"><i>--No documents found matching the selected validity period.--</i></div>
<div id="noDocumentsMessage5" style="display: none; margin-left:500px; margin-top:98px"><i>--No documents found matching the selected grand mean.--</i></div>
 @if ($documents->count() > 0)
    <div class="row">
        <div id="doccontainer"> <!-- Add an id to the container -->
        @foreach ($documents as $document)
        <div class="col-md-4" data-program-course="{{ $document->program_course }}" data-date-of-visit="{{ $document->date_of_visit }}" data-type-of-award="{{ $document->type_of_award }}" data-validity-period="{{ $document->validity_period }}" data-grand-mean="{{ $document->grand_mean }}" data-creation-timestamp="{{ $document->created_at->timestamp }}"  style="margin-left: 115px; margin-right: -275px; margin-bottom: 30px">
            
            <h5 style="margin-left: -1px;">{{ $document->program_course }}</h5>
            
            @if ($document->uploader)
                <p>Uploaded by: <b>{{ $document->uploader->firstname}} {{ $document->uploader->middlename }} {{ $document->uploader->lastname }}</b></p>
            @else
                <p>Uploader not found for this document.</p>
            @endif
            
        <embed src="{{ asset('storage/documents/' . $document->document_path) }}" type="application/pdf" width="50%" height="300">
        <br>
        <div class="container">
            <a href="{{ asset('storage/documents/' . $document->document_path) }}" class="btn btn-warning btn-sm" target="_blank" style="margin-left: 3.5px;">View PDF</a>
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
                            <p><strong>Type of Award:</strong> {{ $document->type_of_award }}</p>
                            <p><strong>Remarks (Award):</strong> {{ $document->remarks }}</p>
                            <p><strong>Validity Period:</strong> {{ $document->validity_period }}</p>
                            <p><strong>Grand Mean:</strong> {{ $document->grand_mean }}</p>
                            <p><strong>Document Path:</strong> {{ $document->document_path }}</p>
                           
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <div class="container text-center">
                            <button type="button" class="btn btn-danger" data-document-id="{{ $document->id }}" onclick="deleteDocument(this)">Delete PDF</button>
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
        <p class="text-center" style="margin-top: 100px"><i>--No documents uploaded yet.--</i></p>
    @endif 

</body>
</html>


<script>
    // Event listener for the search button (submit)
    const searchButton = document.querySelector('.search-icon-button');
    searchButton.addEventListener('click', function () {
        // Get the search input value
        const searchValue = searchInput.value.toLowerCase();

        // Reset other dropdowns
        document.getElementById('filterSelect').selectedIndex = 0; // Reset the filter dropdown
        document.getElementById('programCourse').selectedIndex = 0; // Reset the program course dropdown
        document.getElementById('dateofVisit').selectedIndex = 0; // Reset the level dropdown
        document.getElementById('type_of_award').selectedIndex = 0; // Reset the dateofVisit dropdown
        document.getElementById('validityPeriod').selectedIndex = 0; // Reset the validity period dropdown
        document.getElementById('grandMean').selectedIndex = 0; // Reset the grand mean dropdown
        // Perform the search here and update the search results

        // Hide the "No documents found to be searched" message
        const noDocumentsMessage = document.getElementById('noDocumentsMessageDefault');
        noDocumentsMessage.style.display = 'none';
    });

    function validateSearch() {
    const searchInput = document.getElementById('searchInput');
    const searchText = searchInput.value.trim(); // Remove leading and trailing whitespace

    if (searchText === '') {
        alert('Please enter a search keyword.'); // You can customize this message
        return false; // Prevent form submission
    }

    // Continue with the search logic
    searchDocuments();
    

    return false; // Prevent form submission
}

    // Function to search documents by program course
    // Function to perform document search
    function searchDocuments() {
        const searchInput = document.getElementById('searchInput');
        const searchText = searchInput.value.toLowerCase(); // Convert search text to lowercase for case-insensitive search
        const documentsContainer = document.getElementById('doccontainer'); // Replace with the actual container ID
        const documents = Array.from(documentsContainer.querySelectorAll('.col-md-4'));

        documents.forEach(document => {
            const programCourse = document.getAttribute('data-program-course').toLowerCase(); // Convert program course to lowercase
            const display = programCourse.includes(searchText) ? 'block' : 'none'; // Check if the program course contains the search text

            document.style.display = display;
        });

        // Hide all "No documents found" messages
        for (let i = 1; i <= 5; i++) {
            const noDocumentsMessage = document.getElementById('noDocumentsMessage' + i);
            noDocumentsMessage.style.display = 'none';
        }

        // Check if there are no matching documents and show a message
        const matchingDocuments = documents.filter(document => document.style.display === 'block');
        if (matchingDocuments.length === 0) {
            const noDocumentsMessage = document.getElementById('noDocumentsMessageDefault');
            noDocumentsMessage.style.display = 'block';
        }
    }

    // Event listener for filterSelect dropdown change
    const filterSelect = document.getElementById('filterSelect');
    filterSelect.addEventListener('change', function () {
        const selectedOption = this.value;

        if (selectedOption === 'Default') {
        // Show all uploaded PDFs in the order of creation (first created to latest)
        const documentsContainer = document.getElementById('doccontainer'); // Use the actual container ID
        const documents = Array.from(documentsContainer.querySelectorAll('.col-md-4'));

        

        // Sort documents by their data-creation-timestamp attribute
        documents.sort((a, b) => {
            const timestampA = parseInt(a.getAttribute('data-creation-timestamp'));
            const timestampB = parseInt(b.getAttribute('data-creation-timestamp'));
            return timestampA - timestampB;
        });

        // Clear the container and re-insert the sorted documents
        documentsContainer.innerHTML = '';
        documents.forEach(document => {
            documentsContainer.appendChild(document);
        });

        // Hide all "No documents found" messages
        for (let i = 1; i <= 5; i++) {
            const noDocumentsMessage = document.getElementById('noDocumentsMessage' + i);
            noDocumentsMessage.style.display = 'none';
        }

        } else if (selectedOption === 'az') {
            // Sort documents alphabetically by program course (A-Z)
            const documentsContainer = document.getElementById('doccontainer'); // Replace with the actual container ID
            const documents = Array.from(documentsContainer.querySelectorAll('.col-md-4'));

            documents.sort((a, b) => {
                const programCourseA = a.getAttribute('data-program-course');
                const programCourseB = b.getAttribute('data-program-course');
                return programCourseA.localeCompare(programCourseB);
            });

            // Clear the container and re-insert the sorted documents
            documentsContainer.innerHTML = '';
            documents.forEach(document => {
                documentsContainer.appendChild(document);
            });

            // Hide all "No documents found" messages
            for (let i = 1; i <= 5; i++) {
                const noDocumentsMessage = document.getElementById('noDocumentsMessage' + i);
                noDocumentsMessage.style.display = 'none';
            }

        } else if (selectedOption === 'latest') {
            // Show the latest uploaded PDFs first
            const documentsContainer = document.getElementById('doccontainer'); // Replace with the actual container ID
            const documents = Array.from(documentsContainer.querySelectorAll('.col-md-4'));

            // Sort documents by their data-creation-timestamp attribute in descending order (latest first)
            documents.sort((a, b) => {
                const uploadOrderA = parseInt(a.getAttribute('data-creation-timestamp'));
                const uploadOrderB = parseInt(b.getAttribute('data-creation-timestamp'));
                return uploadOrderB - uploadOrderA;
            });

            // Clear the container and re-insert the sorted documents
            documentsContainer.innerHTML = '';
            documents.forEach(document => {
                documentsContainer.appendChild(document);
            });

            // Hide all "No documents found" messages
            for (let i = 1; i <= 5; i++) {
                const noDocumentsMessage = document.getElementById('noDocumentsMessage' + i);
                noDocumentsMessage.style.display = 'none';
            }

        } else {
            // Handle other filter options if needed
            // Call a different function or add more logic here
        }
    });

    // Function to hide all "No documents found" messages
    function hideAllNoDocumentsMessages() {
        for (let i = 1; i <= 5; i++) {
            const message = document.getElementById(`noDocumentsMessage${i}`);
            message.style.display = 'none';
        }
    }
    
    function deleteDocument(button) {
        const documentId = button.getAttribute('data-document-id');

        Swal.fire({
            title: 'Are you sure you want to delete?',
            text: 'You are about to delete this document. This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/delete_document/' + documentId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Handle success: Remove the document container from the UI
                        $(button).closest('.col-md-4').remove();
                        
                        // Show success SweetAlert
                        Swal.fire({
                            title: 'Success',
                            text: 'Document deleted successfully.',
                            icon: 'success',
                            timer: 3000, // Display alert for 2.0 seconds
                            showConfirmButton: false
                        });

                        // Reload the window after a short delay
                        setTimeout(function() {
                            location.reload();
                        }, 3000); // Reload after 2.0 seconds
                    },
                    error: function(error) {
                        console.error(error);
                        // Show error SweetAlert
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred while deleting the document.',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    }

    // search filter for grand mean
    // Function to hide all "No documents found" messages
function hideAllNoDocumentsMessages() {
    for (let i = 1; i <= 5; i++) {
        const message = document.getElementById(`noDocumentsMessage${i}`);
        if (message) {
            message.style.display = 'none';
        }
    }
}

    // search filter for grand mean
    function filterByGrandMean(selectedGrandMean) {
        const documents = document.querySelectorAll('.col-md-4');
        let documentsFound = false; // Flag to check if any documents match the criteria

        documents.forEach(document => {
            const grandMeanValue = parseFloat(document.getAttribute('data-grand-mean'));

            if (grandMeanValue === selectedGrandMean) {
                document.style.display = 'block';
                documentsFound = true;
            } else {
                document.style.display = 'none';
            }
        });

        // Hide all "No documents found" messages
        hideAllNoDocumentsMessages();

        // Show "No documents found" message if no documents match the criteria
        if (!documentsFound) {
            const noDocumentsMessage = document.getElementById('noDocumentsMessage5');
            noDocumentsMessage.style.display = 'block'; // Display the message
        }
    }

    // Event listener for Grand Mean input change
    const grandMeanInput = document.getElementById('grandMeanInput');
    grandMeanInput.addEventListener('input', function () {
        // Reset other dropdowns and input fields
        document.getElementById('programCourse').selectedIndex = 0;
        document.getElementById('dateofVisit').selectedIndex = 0;
        document.getElementById('type_of_award').selectedIndex = 0;
        document.getElementById('validityPeriod').selectedIndex = 0;
        document.getElementById('filterSelect').selectedIndex = 0;
        document.getElementById('searchInput').value = '';

        // Filter documents based on the entered Grand Mean (accurate match) or show all when empty
        const inputValue = this.value.trim();
        if (inputValue === '') {
            const documents = document.querySelectorAll('.col-md-4');
            documents.forEach(document => {
                document.style.display = 'block';
            });

        // Hide all "No documents found" messages
        hideAllNoDocumentsMessages();
        } else {
            filterByGrandMean(parseFloat(inputValue));
        }
    });


    // search filter for validity period
    function filterByValidityPeriod(selectedYear) {
        const documents = document.querySelectorAll('.col-md-4');
        let documentsFound = false; // Flag to check if any documents match the criteria
        
        documents.forEach(document => {
            const validityPeriod = document.getAttribute('data-validity-period');
            const yearsInValidity = validityPeriod.match(/\d{4}/g); // Extract all 4-digit numbers (years) from the validity period

            if (selectedYear === 'all' || yearsInValidity.includes(selectedYear)) {
                document.style.display = 'block';
                documentsFound = true;
            } else {
                document.style.display = 'none';
            }
        });

        // Show "No documents found" message if no documents match the criteria
        const noDocumentsMessage = document.getElementById('noDocumentsMessage4');
        if (!documentsFound) {
            noDocumentsMessage.style.display = 'block'; // Display the message
        } else {
            noDocumentsMessage.style.display = 'none'; // Hide the message
        }
    }

    // Event listener for validity period dropdown change
    const validityPeriodDropdown = document.getElementById('validityPeriod');
    validityPeriodDropdown.addEventListener('change', function () {
        document.getElementById('programCourse').selectedIndex = 0; // Reset the program course dropdown
        document.getElementById('dateofVisit').selectedIndex = 0; // Reset the level dropdown
        document.getElementById('type_of_award').selectedIndex = 0; // Reset the dateofVisit dropdown
        document.getElementById('grandMeanInput').value = ''; // Reset the validity period dropdown
        document.getElementById('filterSelect').selectedIndex = 0;
        document.getElementById('searchInput').value = '';

        // Hide "No documents found" message for search
        const noSearchResultsMessage = document.getElementById('noDocumentsMessageDefault');
        noSearchResultsMessage.style.display = 'none';
        // Hide the "No documents found" message for program course
        // Hide all "No documents found" messages
        hideAllNoDocumentsMessages();
        filterByValidityPeriod(this.value);
    });

    function filterByLevel(selectedLevel) {
        const documents = document.querySelectorAll('.col-md-4');
        let documentsFound = false; // Flag to check if any documents match the criteria

        documents.forEach(document => {
            const levelValue = document.getAttribute('data-type-of-award');

            // Use a regular expression to match the level part
            const regex = /Level [IV]+\b/g; // This matches "Level I", "Level II", "Level III", "Level IV"
            const matches = levelValue.match(regex);

            // Check if there are matches and if they include the selected level
            if (matches && (selectedLevel === 'all' || matches.includes(selectedLevel))) {
                document.style.display = 'block';
                documentsFound = true;
            } else {
                document.style.display = 'none';
            }
        });

        // Show "No documents found" message if no documents match the criteria
        const noDocumentsMessage = document.getElementById('noDocumentsMessage3');
        if (!documentsFound) {
            noDocumentsMessage.style.display = 'block'; // Display the message
        } else {
            noDocumentsMessage.style.display = 'none'; // Hide the message
        }
    }

    // Event listener for level dropdown change
    const levelDropdown = document.getElementById('type_of_award');
    levelDropdown.addEventListener('change', function () {
        document.getElementById('programCourse').selectedIndex = 0; // Reset the program course dropdown
        document.getElementById('dateofVisit').selectedIndex = 0; // Reset the level dropdown
        document.getElementById('validityPeriod').selectedIndex = 0; // Reset the dateofVisit dropdown
        document.getElementById('grandMeanInput').value = ''; // Reset the validity period dropdown
        document.getElementById('filterSelect').selectedIndex = 0;
        document.getElementById('searchInput').value = '';

        // Hide "No documents found" message for search
        const noSearchResultsMessage = document.getElementById('noDocumentsMessageDefault');
        noSearchResultsMessage.style.display = 'none';
        // Hide all "No documents found" messages
        hideAllNoDocumentsMessages();
        filterByLevel(this.value);
    });



    function filterByYear(selectedYear) {
        const documents = document.querySelectorAll('.col-md-4');
        let documentsFound = false; // Flag to check if any documents match the criteria
        
        documents.forEach(document => {
            const dateOfVisit = document.getAttribute('data-date-of-visit');
            const yearsInDate = dateOfVisit.match(/\d{4}/g); // Extract all 4-digit numbers (years) from the date

            if (selectedYear === 'all' || yearsInDate.includes(selectedYear)) {
                document.style.display = 'block';
                documentsFound = true;
            } else {
                document.style.display = 'none';
            }
        });

        // Show "No documents found" message if no documents match the criteria
        const noDocumentsMessage = document.getElementById('noDocumentsMessage2');
        if (!documentsFound) {
            noDocumentsMessage.style.display = 'block'; // Display the message
        } else {
            noDocumentsMessage.style.display = 'none'; // Hide the message
        }
    }

    // Event listener for year dropdown change
    const yearDropdown = document.getElementById('dateofVisit');
    yearDropdown.addEventListener('change', function () {
        document.getElementById('programCourse').selectedIndex = 0; // Reset the program course dropdown
        document.getElementById('type_of_award').selectedIndex = 0; // Reset the level dropdown
        document.getElementById('validityPeriod').selectedIndex = 0; // Reset the dateofVisit dropdown
        document.getElementById('grandMeanInput').value = ''; // Reset the validity period dropdown
        document.getElementById('filterSelect').selectedIndex = 0;
        document.getElementById('searchInput').value = '';

        // Hide "No documents found" message for search
        const noSearchResultsMessage = document.getElementById('noDocumentsMessageDefault');
        noSearchResultsMessage.style.display = 'none';
        // Hide all "No documents found" messages
        hideAllNoDocumentsMessages();
        filterByYear(this.value);
    });


    function filterByProgramCourse(selectedProgramCourse) {
        const documents = document.querySelectorAll('.col-md-4');
        let documentsFound = false; // Flag to check if any documents match the criteria
        
        documents.forEach(document => {
            const programCourseValue = document.getAttribute('data-program-course');
            
            if (selectedProgramCourse === 'all' || programCourseValue === selectedProgramCourse) {
                document.style.display = 'block';
                documentsFound = true;
            } else {
                document.style.display = 'none';
                
            }
        });

        // Show "No documents found" message if no documents match the criteria
        const noDocumentsMessage = document.getElementById('noDocumentsMessage1');
        if (!documentsFound) {
            noDocumentsMessage.style.display = 'block'; // Display the message
        } else {
            noDocumentsMessage.style.display = 'none'; // Hide the message
        }
    }

    // Event listener for program course dropdown change
    const programCourseDropdown = document.getElementById('programCourse');
    programCourseDropdown.addEventListener('change', function () {
        document.getElementById('dateofVisit').selectedIndex = 0; // Reset the program course dropdown
        document.getElementById('type_of_award').selectedIndex = 0; // Reset the level dropdown
        document.getElementById('validityPeriod').selectedIndex = 0; // Reset the dateofVisit dropdown
        document.getElementById('grandMeanInput').value = ''; // Reset the validity period dropdown
        document.getElementById('filterSelect').selectedIndex = 0;
        document.getElementById('searchInput').value = '';

        // Hide "No documents found" message for search
        const noSearchResultsMessage = document.getElementById('noDocumentsMessageDefault');
        noSearchResultsMessage.style.display = 'none';  
        // Hide all "No documents found" messages
        hideAllNoDocumentsMessages();
    
        filterByProgramCourse(this.value);
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
        confirmButtonText: 'Yes, logout'
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