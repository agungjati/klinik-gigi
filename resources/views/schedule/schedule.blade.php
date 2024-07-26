
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
                                <h6 class="mb-0">Jadwal</h6>
                                <div class="d-flex" >
                                    <form class="d-none d-md-flex ms-4" id="form-search" >
                                        <div class='input-group' >
                                            <span class="input-group-text bg-white rounded-0 border-0 border-bottom" ><span class='fa fa-search'></span></span>
                                            <input class="form-control border-0 border-bottom rounded-0 " name="search" type="search" placeholder="Search">
                                        </div>
                                    </form>
                                    <button class="btn btn-primary ms-4 border-0 shadow-sm" data-bs-toggle="modal" data-bs-target="#modal-add" >
                                        <span class='fa fa-plus'></span> Add Jadwal
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="doctor-table" >
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Doctor Name</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
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


    @include('./schedule/modal-edit')
    @include('./schedule/modal-add')

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
        let doctors = [], limit = 10, currentPage = 1, total = 0;
        
        function getAllSchedules(search = '', gotoPage = 0) {
            const offset = gotoPage > 0 ? (gotoPage - 1) * limit : 0;
            $.ajax({
                url: '/api/schedules?search=' + search + '&offset=' + offset,
                type: 'GET',
                beforeSend: function(xhr) {
                    $('#doctor-table tbody').html('<tr><td colspan="5" class="text-center">Loading...</td></tr>');
                },
                success: function(response) {
                    doctors = response.data;
                    total = response.total;
                    limit = response.limit;
                    currentPage = response.offset > 0 ? response.offset / limit + 1 : 1;
                    let pages = Math.ceil(total / limit);
                    
                    let html = '';
                    for (let i = 0; i < doctors.length; i++) {
                        html += `<tr data-id="${doctors[i].schedule_id}" >`;
                        html += '<th scope="row">' + (i+1) + '</th>';
                        html += '<td>' + doctors[i].first_name + ' ' + doctors[i].last_name + '</td>';
                        html += `<td>${doctors[i].start_date} ${doctors[i].from_time}</td>`;
                        html += `<td>${doctors[i].end_date} ${doctors[i].end_time}</td>`;
                        html += `<td>
                        <button class="btn btn-sm btn-primary" onclick="editModal('${doctors[i].schedule_id}')" ><em class="fa fa-pencil" />  Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteModal('${doctors[i].schedule_id}')" ><em class="fa fa-trash" />  Delete</button>
                        </td>`;
                        html += '</tr>';
                    }
                    if(doctors.length == 0) {
                        html = '<tr><td colspan="5" class="text-center">No data found</td></tr>';
                    }
                    $('#doctor-table tbody').html(html);
                    
                    if(doctors.length !== 0) {
                        $('#pagination').html(`
                            <li class="page-item ${currentPage == 1 ? 'disabled' : ''}" >
                                <a class="page-link" href="#" onclick="getAllSchedules('${search}', ${currentPage - 1})" >Previous</a>
                            </li>
                            ${Array.from({length: pages}, (v, k) => k+1).map(page => `
                                <li class="page-item ${currentPage == page ? 'active' : ''}" >
                                    <a class="page-link" href="#" onclick="getAllSchedules('${search}', ${page})" >${page}</a>
                                </li>
                            `).join('')}
                            <li class="page-item ${currentPage == pages ? 'disabled' : ''}" >
                                <a class="page-link" href="#" onclick="getAllSchedules('${search}', ${currentPage + 1})" >Next</a>
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

        const modalAdd = new bootstrap.Modal(document.getElementById('modal-add'), {
            keyboard: false
        });

        let selectedScheduleId = null;
        function editModal(user_id) {
            modalEdit.show();
            selectedScheduleId = user_id;
        }

        function deleteModal(schedule_id) {
            modalDelete.show();
            selectedScheduleId = schedule_id;
        }

        function addModal(schedule_id) {
            modalAdd.show();
            selectedScheduleId = schedule_id;
        }

        $(document).ready(function initialize() {
            getAllSchedules();
        });

        $(document).ready(function handleUpdate() {
            $('#modal-edit').on('shown.bs.modal', function loadData() {
                let selectedSchedule = doctors.find(schedule => schedule.schedule_id == selectedScheduleId);
                $('#inputDoctor').val(`${selectedSchedule.first_name} ${selectedSchedule.last_name}`);
                $('#inputUserId').val(selectedSchedule.user_id);
                $('#inputStartDate').val(selectedSchedule.start_date);
                $('#inputStartTime').val(selectedSchedule.from_time);
                $('#inputEndDate').val(selectedSchedule.end_date);
                $('#inputEndTime').val(selectedSchedule.end_time);
            });

            $('#form-update').submit(function submitFormUpdate(e) {
                e.preventDefault();
                const data = {
                    schedule_id: selectedScheduleId,
                    user_id: $('#inputUserId').val(),
                    start_date: $('#inputStartDate').val(),
                    from_time: $('#inputStartTime').val(),
                    end_date: $('#inputEndDate').val(),
                    end_time: $('#inputEndTime').val(),
                    _token: csrf_token
                };

                $btnSave = $('#form-update button[type="submit"]');
                $btnSave.prop('disabled', true).html('Saving...');
                $.ajax({
                    url: '/api/schedule',
                    type: 'PUT',
                    data: data,
                    success: function(response) {
                        modalEdit.hide();
                           getAllSchedules();
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
                    url: '/api/schedule/' + selectedScheduleId,
                    type: 'DELETE',
                    data: {
                        _token: csrf_token
                    },
                    success: function(response) {
                        modalDelete.hide();
                        const search = $('#form-search input[name="search"]').val();
                        getAllSchedules(search);
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
                    getAllSchedules(search);
                }
            });
        });

        $(document).ready(function handleSelectDoctor() {
            let doctors = [];
            $('[name="inputDoctor"]').on('focus', function() {
                $('#list-doctor').attr('style', 'display: flex !important');
                if(doctors.length === 0) {
                    getDoctors('');
                }
            });

            $(document).on('blur', '[name="inputDoctor"], button.btn-list-doctor', function(ev) {
                if(ev.relatedTarget && !ev.relatedTarget.classList.contains('btn-list-doctor')) {
                    setTimeout(() => {
                        $('#list-doctor').hide();
                    }, 200);
                }
            });

            $('[name="inputDoctor"]').on('input', function() {
                const search = $(this).val();
                if(search.length > 3) {
                   getDoctors(search);
                }
            });

            function getDoctors(search) {
                $('.list-doctor').attr('style', 'display: flex !important');
                $('.list-doctor').html('Loading...');
                $.ajax({
                        url: '/api/doctors?limit=5&search=' + search,
                        type: 'GET',
                        success: function(response) {
                            let html = '';
                            $('.list-doctor').html('');
                            response = response.data;
                            for (let i = 0; i < response.length; i++) {
                                const fullName = `${response[i].first_name} ${response[i].last_name}`;
                                html += `<button type="button" class="btn-list-doctor border-0 w-100 text-start d-block p-2 bg-white ${i !== 0 ? 'border-top' : '' }"
                                data-userid='${response[i].user_id}' data-fullname='${fullName}' >${fullName}</button>`;
                            }
                            $('.list-doctor').html(html);
                            doctors = response;
                        },
                        error: function(error) {
                            console.log(error);
                            $('.list-doctor').hide();
                        }
                    });
            }

            $(document).on('click', '.btn-list-doctor',   function selectDoctor(ev) {
                $('[name="inputDoctor"]').val($(this).data('fullname'));
                $('[name="inputUserId"]').val($(this).data('userid'));
                $('.list-doctor').hide();
            });
          
        });

        $(document).ready(function handleAdd() {
            $modalAdd = $('#modal-add');
            $modalAdd.on('shown.bs.modal', function() {
                $('#modal-add #inputDoctor').val('');
                $('#modal-add #inputUserId').val('');
                $('#modal-add #inputStartDate').val('');
                $('#modal-add #inputStartTime').val('');
                $('#modal-add #inputEndDate').val('');
                $('#modal-add #inputEndTime').val('');
            });

            $('#form-add').submit(function(e) {
                e.preventDefault();
                const data = {
                    user_id: $('#modal-add #inputUserId').val(),
                    start_date: $('#modal-add #inputStartDate').val(),
                    from_time: $('#modal-add #inputStartTime').val(),
                    end_date: $('#modal-add #inputEndDate').val(),
                    end_time: $('#modal-add #inputEndTime').val(),
                    _token: csrf_token
                };

                $btnSave = $('#form-add button[type="submit"]');
                $btnSave.prop('disabled', true).html('Saving...');
                $.ajax({
                    url: '/api/schedule',
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        modalAdd.hide();
                        getAllSchedules();
                        $btnSave.prop('disabled', false).html('Save');
                    },
                    error: function(error) {
                        console.log(error);
                        $btnSave.prop('disabled', false).html('Save');
                    }
                });
            });
        })
    </script>
   
</body>

</html>