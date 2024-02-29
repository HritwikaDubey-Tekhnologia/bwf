<!-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-text mx-3">BWF MMU</div>
</a>

<hr class="sidebar-divider my-0">

<li class="nav-item active">
    <a class="nav-link" href="Dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<hr class="sidebar-divider my-0">

<?php if ($user_data['userTypeID'] == 1): ?>
    <div class="sidebar-heading">
        Patient
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePatient"
            aria-expanded="true" aria-controls="collapsePatient">
            <i class="fas fa-fw fa-cog"></i>
            <span>Patient</span>
        </a>
       <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Patient Components:</h6>
                <a class="collapse-item" href="<?php echo base_url('admin/registerPatient'); ?>">Patient Register</a>
                <a class="collapse-item" href="<?php echo base_url('admin/patient-list'); ?>">Patient List</a>
                <a class="collapse-item" href="<?php echo base_url('admin/registerVitals'); ?>">Add Vitals</a>
                <a class="collapse-item" href="<?php echo base_url('admin/registerPrescription'); ?>">Add Prescription</a>
            </div>
        </div>
    </li>
<?php endif; ?>

<?php if ($user_data['userTypeID'] == 3): ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDoctor"
            aria-expanded="true" aria-controls="collapseDoctor">
            <i class="fas fa-stethoscope"></i>
            <span>Doctor</span>
        </a>
        <div id="collapseDoctor" class="collapse" aria-labelledby="headingDoctor" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Doctor Components:</h6>
                <a class="collapse-item" href="<?php echo base_url('admin/registerDoctor'); ?>">Add Doctor</a>
                <a class="collapse-item" href="<?php echo base_url('admin/doctor-list'); ?>">Doctor List</a>
                <a class="collapse-item" href="<?php echo base_url('admin/registerMMU'); ?>">Add MMU</a>
                <a class="collapse-item" href="<?php echo base_url('admin/registerCity'); ?>">Add City</a>
                <a class="collapse-item" href="<?php echo base_url('admin/registerDriver'); ?>">Add Driver</a>
            </div>
        </div>
    </li>
<?php endif; ?>

<hr class="sidebar-divider d-none d-md-block">

<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
 -->



<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">



<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
<i class="fas fa-ambulance fa-2x" ></i>    
<div class="sidebar-brand-text mx-3">BWF MMU</div>
</a>


<hr class="sidebar-divider my-0">


<li class="nav-item active">
    <a class="nav-link" href="Dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<?php if ($this->user_data['userTypeID'] == 1): ?>

    <hr class="sidebar-divider my-0">


    <div class="sidebar-heading">
        Patient
    </div>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePatient"
            aria-expanded="true" aria-controls="collapsePatient">
            <i class="fas fa-fw fa-cog"></i>
            <span>Patient</span>
        </a>
        <div id="collapsePatient" class="collapse" aria-labelledby="headingPatient" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Patient Components:</h6>
                <!-- <a class="collapse-item" href="<?php echo base_url('admin/registerPatient'); ?>">Patient Register</a> -->
                <a class="collapse-item" href="<?php echo base_url('admin/patient-list'); ?>">Patient List</a>
                <a class="collapse-item" href="<?php echo base_url('admin/prescription-list'); ?>">Prescription List</a>
                <!-- <a class="collapse-item" href="<?php echo base_url('admin/registerVitals'); ?>">Add Vitals</a> -->
                <!-- <a class="collapse-item" href="<?php echo base_url('admin/registerPrescription'); ?>">Add Prescription</a> -->
            </div>
        </div>
    </li>
<?php endif; ?>

<?php if ($this->user_data['userTypeID'] == 3): ?>

    <hr class="sidebar-divider my-0">


    <div class="sidebar-heading">
        Doctor
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePatient"
            aria-expanded="true" aria-controls="collapsePatient">
            <i class="fas fa-user"></i>
            <span>Patient</span>
        </a>
        <div id="collapsePatient" class="collapse" aria-labelledby="headingPatient" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Patient Components:</h6>
                <a class="collapse-item" href="<?php echo base_url('admin/registerPatient'); ?>">Patient Register</a>
                <a class="collapse-item" href="<?php echo base_url('admin/patient-list'); ?>">Patient List</a>
                <a class="collapse-item" href="<?php echo base_url('admin/registerPrescription'); ?>">Add Prescription</a>
                <a class="collapse-item" href="<?php echo base_url('admin/prescription-list'); ?>">Prescription List</a>                
                <a class="collapse-item" href="<?php echo base_url('admin/registerVitals'); ?>">Add Vitals</a>
                <a class="collapse-item" href="<?php echo base_url('admin/vitalsList'); ?>">Vitals List</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDoctor"
            aria-expanded="true" aria-controls="collapseDoctor">
            <i class="fas fa-stethoscope"></i>
            <span>Doctor</span>
        </a>
        <div id="collapseDoctor" class="collapse" aria-labelledby="headingDoctor" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Doctor Components:</h6>
                
                <!-- <a class="collapse-item" href="<?php echo base_url('admin/registerDoctor'); ?>">Add Doctor</a> -->
                <a class="collapse-item" href="<?php echo base_url('admin/doctor_list'); ?>">Doctor List</a>
                
            </div>
        </div>
    </li>

    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMmu"
        aria-expanded="true" aria-controls="collapseMmu">
        <i class="fas fa-ambulance"></i>

        <span>MMU</span>
    </a>
    <div id="collapseMmu" class="collapse" aria-labelledby="headingDoctor" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">MMU Components:</h6>
            
            <a class="collapse-item" href="<?php echo base_url('admin/registerMMU'); ?>">Add MMU</a> 
            <a class="collapse-item" href="<?php echo base_url('admin/doctor-list'); ?>">MMU List</a>

            
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDriver"
        aria-expanded="true" aria-controls="collapseDriver">
      
<i class="fas fa-id-card"></i>


        <span>Driver</span>
    </a>
    <div id="collapseDriver" class="collapse" aria-labelledby="headingDoctor" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Driver Components:</h6>
            
            <a class="collapse-item" href="<?php echo base_url('admin/registerDriver'); ?>">Add Driver</a>
            <a class="collapse-item" href="<?php echo base_url('admin/doctor-list'); ?>">Driver List</a>

            
        </div>
    </div>
</li>
<?php endif; ?>

<?php if ($this->user_data['userTypeID'] == 5): ?>

<hr class="sidebar-divider my-0">


<div class="sidebar-heading">
    SuperAdmin
</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCity"
        aria-expanded="true" aria-controls="collapseCity">
        <i class="fas fa-user"></i>
        <span>Patient</span>
    </a>
    <div id="collapseCity" class="collapse" aria-labelledby="headingPatient" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Patient Components:</h6>
            
            <a class="collapse-item" href="<?php echo base_url('admin/registerCamp'); ?>">Add Camp</a>
                <a class="collapse-item" href="<?php echo base_url('admin/patient-list'); ?>">City List</a>
            <a class="collapse-item" href="<?php echo base_url('admin/registerCity'); ?>">Add City</a>
                <a class="collapse-item" href="<?php echo base_url('admin/patient-list'); ?>">City List</a>
            <a class="collapse-item" href="<?php echo base_url('admin/registerDoctor'); ?>">Add Doctor</a>
                <a class="collapse-item" href="<?php echo base_url('admin/doctor-list'); ?>">Doctor List</a>
                <a class="collapse-item" href="<?php echo base_url('admin/registerMMU'); ?>">Add MMU</a>
                
                <a class="collapse-item" href="<?php echo base_url('admin/registerDriver'); ?>">Add Driver</a>
            
        </div>
    </div>
</li>


<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDoctor"
        aria-expanded="true" aria-controls="collapseDoctor">
        <i class="fas fa-stethoscope"></i>
        <span>Doctor</span>
    </a>
    <div id="collapseDoctor" class="collapse" aria-labelledby="headingDoctor" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Doctor Components:</h6>
            
           
            <a class="collapse-item" href="<?php echo base_url('admin/registerDoctor'); ?>">Add Doctor</a>
                <a class="collapse-item" href="<?php echo base_url('admin/doctor-list'); ?>">Doctor List</a>

            
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMmu"
        aria-expanded="true" aria-controls="collapseMmu">
        <i class="fas fa-ambulance"></i>

        <span>MMU</span>
    </a>
    <div id="collapseMmu" class="collapse" aria-labelledby="headingDoctor" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">MMU Components:</h6>
            
            <a class="collapse-item" href="<?php echo base_url('admin/registerMMU'); ?>">Add MMU</a> 
            <a class="collapse-item" href="<?php echo base_url('admin/doctor-list'); ?>">MMU List</a>

            
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDriver"
        aria-expanded="true" aria-controls="collapseDriver">
        <i class="fas fa-id-card"></i>

        <span>Driver</span>
    </a>
    <div id="collapseDriver" class="collapse" aria-labelledby="headingDoctor" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Driver Components:</h6>
            
            <a class="collapse-item" href="<?php echo base_url('admin/registerDriver'); ?>">Add Driver</a>
            <a class="collapse-item" href="<?php echo base_url('admin/doctor-list'); ?>">Driver List</a>

            
        </div>
    </div>
</li>
<?php endif; ?>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
