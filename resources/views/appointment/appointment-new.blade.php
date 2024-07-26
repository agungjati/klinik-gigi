
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
    <link href="/css/full-calendar.css" rel="stylesheet">
    <style>
        #list-doctor .list-group-item {
            cursor: pointer;
        }

        #list-doctor .list-group-item:hover{
            color: #fff;
            background: #009cff;
            border-color: #009cff;
            transition: 0.5s all ease;
        }
    </style>
</head>

<body>
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
                            <h6 class="mb-4">Appointment</h6>
                            <div class="card">
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <div class="mb-3">
                                            <label for="inputDoctor" class="form-label">Select Doctor</label>
                                            <div class='d-flex align-items-center' >
                                                <input type="search" class="form-control" id="inputDoctor" placeholder="Search Doctor">&nbsp;&nbsp;
                                                <button type="button" class="btn btn-primary shadow-sm" ><em class="fa fa-search"></em></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <div id='list-doctor' class='col-md-8'>
                                        <!-- <ol id='list-doctor' class="list-group list-group-numbered">
                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Senin, 10, Juli 2024</div>
                                                    <div class='cursor-pointer' >10.00 - 13.00</div>
                                                    <div class='cursor-pointer' >14.00 - 15.00</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <div class="fw-bold">Selasa, 11, Juli 2024</div>
                                                    <div class='cursor-pointer' >10.00 - 13.00</div>
                                                    <div class='cursor-pointer' >14.00 - 15.00</div>
                                                </div>
                                            </li>
                                        </ol> -->
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <div class="mb-3">
                                            <label for="inputPatient" class="form-label">Select Patient</label>
                                            <div class='d-flex align-items-center' >
                                                <input type="date" class="form-control" id="inputDatebirth" style='width: 200px' />&nbsp;&nbsp;
                                                <input type="search" class="form-control" id="inputPatient" placeholder="Search Patient" />&nbsp;&nbsp;
                                                <button type="button" class="btn btn-primary shadow-sm" ><em class="fa fa-search"></em></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row mb-3'>
                                    <div class='col-md-3'>
                                        <ol id='list-patient' class="list-group">
                                            <li class="list-group-item">Cras justo odio</li>
                                            <li class="list-group-item">Cras justo odio</li>
                                            <li class="list-group-item">Cras justo odio</li>
                                        </ol>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <div class="mb-3">
                                            <label for="inputPatient" class="form-label">Booking Date<span class='text-danger' >*</span></label>
                                            <div class='d-flex align-items-center' >
                                                <input type="date" class="form-control" id="inputDatebirth" style='width: 200px' />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row mt-4'>
                                    <div class='col-12 pt-2 border-top'>
                                        <button type='button' class='btn btn-primary shadow-sm me-2' >Save</button>
                                        <button type='button' class='btn btn-secondary shadow-sm' >Cancel</button>
                                    </div>
                                </div>
                            </div>
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


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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
        $(document).ready(function handleDoctor() {
            $('#inputDoctor').on('input', function() {
                const value = $(this).val().toLowerCase();
                if(value.length > 2) {
                    $listDoctor = $('#list-doctor');

                    $.ajax({
                        url: '/api/doctors?join=schedule&search='+ value,
                        beforeSend: function() {
                            $listDoctor.html('Loading...')
                        },
                        success: function(response) {
                            const doctors = response.data;
                            $listDoctor.html('');
                            let listItemEl = '';
                            for(let i = 0; i < doctors.length; i++) {
                                const doctor = doctors[i];
                                if(i === 9) {debugger}
                                if((i + 1) % 5 === 0) {
                                    listItemEl += `<li class="list-group-item list-doctor-item" data-userid="${doctor.user_id}" >${doctor.first_name} ${doctor.last_name}</li>`
                                    $listDoctor.append(`
                                    <ol class="list-group list-group-horizontal-md mb-2">
                                        ${listItemEl}
                                    </ol>`);
                                    listItemEl = '';
                                }else {
                                    listItemEl += `<li class="list-group-item list-doctor-item" data-userid="${doctor.user_id}" >${doctor.first_name} ${doctor.last_name}</li>`
                                }

                            }

                            if(listItemEl) {
                                $listDoctor.append(`
                                <ol class="list-group list-group-horizontal-md">
                                        ${listItemEl}
                                </ol>`);
                            }
                        },
                        error: function() {
                            $listDoctor.html('')
                        }
                    })
                }
            });

            $(document).on('click', '.list-doctor-item', function() {
                const userId = $(this).data('userid');
                console.log(userId);

            });
        });

        $(document).ready(function handlePatient() {
            $('#inputPatient').on('keyup', function() {
                const value = $(this).val().toLowerCase();
                if(value.length > 2) {
                    $listPatient = $('#list-patient');
                    const dob = $('#inputDatebirth').val();

                    $.ajax({
                        url: `/api/patients?search=${value}&dob=${dob}`,
                        beforeSend: function() {
                            $listPatient.html('Loading...')
                        },
                        success: function(response) {
                            const patients = response.data;
                            $listPatient.html('');
                            for(let i = 0; i < patients.length; i++) {
                                $listPatient.append(`
                                <li class="list-group-item">Cras justo odio</li>
                                `);
                            }
                        },
                        error: function() {
                            $listPatient.html('')
                        }
                    })
                }
            });
        });
    </script>
   
</body>

</html>