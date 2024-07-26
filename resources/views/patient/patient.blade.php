
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.css" rel="stylesheet" />
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">
    
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <div class="position-relative bg-white d-flex p-0">
       
       @include('sidebar')


        <!-- Content Start -->
        <div class="content">
            
            @include('navbar')

            <!-- Content start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-white rounded h-100 p-4 shadow-sm">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0">Patients</h6>
                                <form class="d-none d-md-flex ms-4" id="form-search" >
                                    <div class='input-group' >
                                        <span class="input-group-text bg-white rounded-0 border-0 border-bottom" ><span class='fa fa-search'></span></span>
                                        <input class="form-control border-0 border-bottom rounded-0 " name="search" type="search" placeholder="Search">
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="doctor-table" >
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col" width="160" >&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <nav aria-label="Page navigation" class="d-flex" >
                                <ul class="pagination mx-auto" id="pagination" >
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
             </div>
            <!-- Content end -->

            @include('footer')
           
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    @include('./doctor/modal-edit')

    <!-- Modal -->
    <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="Modal Delete" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-body text-center ">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer pt-0 pb-2 border-top-0 justify-content-center">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger btn-sm">Yes</button>
            </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/chart/chart.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/waypoints/waypoints.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/lib/tempusdominus/js/moment.min.js"></script>
    <script src="/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/i18n/datepicker.en.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Template Javascript -->
    <script src="/js/main.js"></script>
    <script>
        const csrf_token = '{{ csrf_token() }}';
        let patients = [], limit = 10, currentPage = 1, total = 0;
        
        function getAllPatients(search = '', gotoPage = 0) {
            const offset = gotoPage > 0 ? (gotoPage - 1) * limit : 0;
            $.ajax({
                url: '/api/patients?search=' + search + '&offset=' + offset,
                type: 'GET',
                beforeSend: function(xhr) {
                    $('#doctor-table tbody').html('<tr><td colspan="5" class="text-center">Loading...</td></tr>');
                },
                success: function(response) {
                    patients = response.data;
                    total = response.total;
                    limit = response.limit;
                    currentPage = response.offset > 0 ? response.offset / limit + 1 : 1;
                    let pages = Math.ceil(total / limit);
                    
                    let html = '';
                    for (let i = 0; i < patients.length; i++) {
                        html += `<tr data-id="${patients[i].user_id}" >`;
                        html += '<th scope="row">' + (i+1) + '</th>';
                        html += '<td>' + patients[i].first_name + ' ' + patients[i].last_name + '</td>';
                        html += '<td>' + patients[i].email + '</td>';
                        html += '<td>' + patients[i].phone + '</td>';
                        html += `<td>
                        <button class="btn btn-sm btn-primary" onclick="editModal('${patients[i].user_id}')" ><em class="fa fa-pencil" />  Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteModal('${patients[i].user_id}')" ><em class="fa fa-trash" />  Delete</button>
                        </td>`;
                        html += '</tr>';
                    }
                    if(patients.length == 0) {
                        html = '<tr><td colspan="5" class="text-center">No data found</td></tr>';
                    }
                    $('#doctor-table tbody').html(html);

                    if(patients.length !== 0) {
                        $('#pagination').html(`
                            <li class="page-item ${currentPage == 1 ? 'disabled' : ''}" >
                                <a class="page-link" href="#" onclick="getAllPatients('${search}', ${currentPage - 1})" >Previous</a>
                            </li>
                            ${Array.from({length: pages}, (v, k) => k+1).map(page => `
                                <li class="page-item ${currentPage == page ? 'active' : ''}" >
                                    <a class="page-link" href="#" onclick="getAllPatients('${search}', ${page})" >${page}</a>
                                </li>
                            `).join('')}
                            <li class="page-item ${currentPage == pages ? 'disabled' : ''}" >
                                <a class="page-link" href="#" onclick="getAllPatients('${search}', ${currentPage + 1})" >Next</a>
                            </li>
                        `);
                    }
                },
                error: function(error) {
                    $('#doctor-table tbody').html('<tr><td colspan="5" class="text-center">No data found</td></tr>');
                }
            });
        }

        const modalEdit = new bootstrap.Modal(document.getElementById('modal-edit'), {
            keyboard: false
        });
        
        const modalDelete = new bootstrap.Modal(document.getElementById('modal-delete'), {
            keyboard: false
        });

        let selectedUserId = null;
        function editModal(user_id) {
            modalEdit.show();
            selectedUserId = user_id;
        }

        function deleteModal(user_id) {
            modalDelete.show();
            selectedUserId = user_id;
        }

        $(document).ready(function initialize() {
            getAllPatients();
        });

        $(document).ready(function handleUpdate() {
            $('#modal-edit').on('shown.bs.modal', function loadData() {
                let selectedDoctor = patients.find(doctor => doctor.user_id == selectedUserId);
                $('#inputFirstName').val(selectedDoctor.first_name);
                $('#inputLastName').val(selectedDoctor.last_name);
                $('#inputEmail').val(selectedDoctor.email);
                $('#inputPhone').val(selectedDoctor.phone);
            });

            $('#form-update').submit(function submitFormUpdate(e) {
                e.preventDefault();
                const data = {
                    user_id: selectedUserId,
                    first_name: $('#inputFirstName').val(),
                    last_name: $('#inputLastName').val(),
                    email: $('#inputEmail').val(),
                    phone: $('#inputPhone').val(),
                    _token: csrf_token
                };

                $btnSave = $('#form-update button[type="submit"]');
                $btnSave.prop('disabled', true).html('Saving...');
                $.ajax({
                    url: '/api/patients',
                    type: 'PUT',
                    data: data,
                    success: function(response) {
                        modalEdit.hide();
                        getAllPatients();
                        $btnSave.prop('disabled', false).html('Save');
                    },
                    error: function(error) {
                        console.log(error);
                        $btnSave.prop('disabled', false).html('Save');
                    }
                });
            });
        }); 
        
        $(document).ready(function handleDelete() {
            $btnDelete = $('#modal-delete button.btn-danger');
            $btnDelete.click(function() {
                $btnDelete.prop('disabled', false).text('Deleting...');
                $.ajax({
                    url: '/api/patients/' + selectedUserId,
                    type: 'DELETE',
                    data: {
                        _token: csrf_token
                    },
                    success: function(response) {
                        modalDelete.hide();
                        const search = $('#form-search input[name="search"]').val();
                        getAllPatients(search);
                        $btnDelete.prop('disabled', false).text('Yes');
                    },
                    error: function(error) {
                        console.log(error);
                        $btnDelete.prop('disabled', false).text('Yes');
                    }
                });
            });
        });

        $(document).ready(function handleSearch() {
            $('#form-search').submit(function(e) {
                e.preventDefault();
                const search = $('#form-search input[name="search"]').val();
                if((search && search.length > 3) || search === '') {
                    getAllPatients(search);
                }
            });
        });
    </script>
   
</body>

</html>