<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tab name -->
    <title>User Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    table tbody tr:hover {
        transform: scale(1.01);
        transition: 0.2s ease-in-out;
    }
    </style>
</head>

<body class="bg-success-subtle">

<div class="container mt-4">

    <div class="card shadow-lg border-0 ">

        <!-- Header -->
        <div class="card-header bg-secondary text-white px-4 py-3">

            <div class="d-flex justify-content-between align-items-center">

                <h2 class="mb-0">
                    User Management System
                </h2>

                <!-- Add User Button -->
                 
                <a href="{{ route('form') }}" target='_blank' class="btn btn-warning fw-bold">
                     + Add User
                </a>

            </div>

        </div>

        <div class="card-body bg-primary-subtle">

            <!-- Title -->
            <div class="text-center mb-1">
                <h4 class="text-primary display-10 border-bottom pb-1 d-inline-block">
                    User Records
                </h4>
            </div>

            <!-- Table -->
            <div class="table-responsive">

                 <table class="table table-hover align-middle text-center shadow-sm rounded overflow-hidden">

                    <thead class="table-secondary">

                        <tr class="text-dark">

                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Gender</th>
                            <th>Action</th>

                         </tr>

                    </thead>

                    <tbody id="userTableBody">

                    </tbody>

                </table>

            </div>

            <!-- Bottom Section -->
            <div class="d-flex justify-content-between align-items-center mt-4">

                <!-- Pagination -->
                <div id="paginationArea">
                    
                </div>

                <!-- Total Records -->
                <div class="text-black-subtle" id="totalRecords">
                    Total Records: 0
                </div>

            </div>

        </div>

    </div>

</div>

<script>
    
function loadPage(page = 1)
{
    fetch(`/user-data-mgmnt/public/api/users?page=${page}`)

    .then(response => response.json())

    .then(result => {

        let users = result.data.data;

        let tbody = document.getElementById('userTableBody');
        let totalRecords = document.getElementById('totalRecords');
        let paginationArea = document.getElementById('paginationArea');

        // Clear previous data
        tbody.innerHTML = '';

        // Total Records
        totalRecords.innerHTML =
            `Total Records : ${result.total_records}`;

        // No Records Found
        if(users.length === 0)
        {
            tbody.innerHTML =
            `
            <tr>
                <td colspan="7" class="text-danger fw-bold py-4">
                    No Records Found
                </td>
            </tr>
            `;
            return;
        }

        // User Rows
        users.forEach((user,index) => {

            let rowClass =
                index % 2 === 0
                ? 'table-primary'
                : 'table-info';

            let genderBadge =
                user.gender.toLowerCase() === 'male'
                ? '<span class="badge bg-info px-4 py-2">Male</span>'
                : '<span class="badge bg-danger px-4 py-2">Female</span>';

            tbody.innerHTML +=
            `
            <tr class="${rowClass}">

                <td>
                    <span class="badge bg-dark">
                        ${user.id}
                    </span>
                </td>

                <td class="fw-semibold text-primary">
                    ${user.name}
                </td>

                <td>
                    ${user.age}
                </td>

                <td class="text-muted">
                    ${user.email}
                </td>

                <td>
                    <span class="badge bg-secondary">
                        ${user.city}
                    </span>
                </td>

                <td>
                    ${genderBadge}
                </td>

                <td>

                    <a href="/user-data-mgmnt/public/edit/${user.id}"
                       target="_blank"
                       class="btn btn-warning btn-sm me-2">
                        Edit
                    </a>

                    <a href="/user-data-mgmnt/public/delete/${user.id}"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure you want to delete this user?')">
                        Delete
                    </a>

                </td>

            </tr>
            `;
        });

        // Pagination
        let paginationHtml =
            '<nav><ul class="pagination mb-0">';

        result.data.links.forEach(link => {

            let activeClass =
                link.active ? 'active' : '';

            let disabledClass =
                link.url === null ? 'disabled' : '';

            let pageNumber =
                link.page ?? '';

            paginationHtml +=
            `
            <li class="page-item ${activeClass} ${disabledClass}">
                <a class="page-link"
                   href="#"
                   onclick="event.preventDefault(); loadPage('${pageNumber}')">
                   ${link.label}
                </a>
            </li>
            `;
        });

        paginationHtml +=
            '</ul></nav>';

        paginationArea.innerHTML =
            paginationHtml;

    })

    .catch(error => {

        console.log(error);

    });
}

// Initial Load
loadPage();

</script>




</body>
</html>