<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->
    
<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3 shadow-sm">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-ambulance fa-1x me-2"></i>Klinik Gigi</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0" id="username-sidebar" >Jhon Doe</h6>
                <span id="role-sidebar" >Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="/dashboard" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Transaction</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="/appointment" class="dropdown-item">Appointment</a>
                    <a href="/appointment" class="dropdown-item">Invoice</a>
                </div>
            </div>
            <a href="/patient" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Patient</a>
            <a href="/doktor" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Doktor</a>
            <a href="/shcedules" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Jadwal</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Item</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="/examinations" class="dropdown-item">Pemeriksaan</a>
                    <a href="/items" class="dropdown-item">Peralatan & Obat</a>
                </div>
            </div>
            <a href="/pengaturan" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Pengaturan </a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->

<script>
    const user = JSON.parse(localStorage.getItem('user') || '{}');
    document.getElementById('username-sidebar').innerHTML = (user.first_name + ' ' + user.last_name);
    document.getElementById('role-sidebar').innerHTML = (user.role);
</script>