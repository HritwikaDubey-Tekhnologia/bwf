<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $this->load->view('Admin/login');
    }

    public function Dashboard()
    {
        $userType = $this->session->userdata('user_type');

        if ($this->session->userdata('logged_in')) {
            switch ($userType) {
                case 'doctor':
                    $this->loadDoctorDashboard();
                    break;
                case 'patient':
                    $this->loadPatientDashboard();
                    break;
                case 'driver':
                    $this->loadDriverDashboard();
                    break;
                case 'mmu':
                    $this->loadMMUDashboard();
                    break;
                case 'superadmin':
                    $this->loadSuperAdminDashboard();
                    break;
                default:
                    $this->loadGenericDashboard();
            }
        } else {
            redirect('admin/login');
        }
    }

    private function loadDoctorDashboard()
    {
        $this->load->view('admin/dashboard');
    }

    private function loadPatientDashboard()
    {
        $this->load->view('admin/dashboard');
    }

    private function loadDriverDashboard()
    {
        $this->load->view('admin/dashboard');
    }

    private function loadMMUDashboard()
    {
        $this->load->view('admin/dashboard');
    }

    private function loadSuperAdminDashboard()
    {
        $this->load->view('admin/dashboard');
    }

    private function loadGenericDashboard()
    {
        $this->load->view('admin/dashboard');
    }


    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('City_model');
        $this->load->model('Vitals_model');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->model('Camp_model');
        
        $this->load->library('session');
        $this->load->model('Prescription_model');
        $this->load->model('Vitals_model');
        $this->load->model('admin_model');
        $this->load->model('Driver_model');
        $this->load->model('Doctor_model');
        $this->load->model('Patient_model');
        $this->load->model('Mmu_model');
        $this->load->helper('form');
    }

    public function showCampRegistrationForm()
    {
        $data['doctors'] = $this->Camp_model->getDoctors();
        $data['mmus'] = $this->Camp_model->getMMUs();

        $this->load->view('admin/camp_registration', $data);
    }

    public function registerCamp()
    {
        $this->load->library('form_validation');
        $this->load->model('Camp_model');
        

        // Validation rules for the form fields
        $this->form_validation->set_rules('campName', 'Camp Name', 'required');
        $this->form_validation->set_rules('campType', 'Camp Type', 'required');
        $this->form_validation->set_rules('campDate', 'Camp Date', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('doctorId', 'Doctor', 'required');
        $this->form_validation->set_rules('mmuId', 'MMU', 'required');

        if ($this->form_validation->run() == false) {
            // If validation fails, show the form again with validation errors

            $data['doctors'] = $this->Camp_model->getDoctors();
            $data['mmus'] = $this->Camp_model->getMMUs();
            $this->load->view('admin/register_camp', $data);
        } else {
            // If validation passes, register the camp and redirect
            $data = array(
                'campName' => $this->input->post('campName'),
                'campType' => $this->input->post('campType'),
                'campDate' => $this->input->post('campDate'),
                'location' => $this->input->post('location'),
                'doctorId' => $this->input->post('doctorId'),
                'mmuId' => $this->input->post('mmuId'),
            );

            $campId = $this->Camp_model->registerCamp($data);

            if ($campId) {
                // Successful registration, you can redirect to a success page or load another view
                redirect('admin/campDetails/' . $campId);
            } else {
                // Handle registration failure
                echo 'Camp registration failed.';
            }
        }
    }

    public function campDetails($campId)
    {
        // Load the Camp_model
        $this->load->model('Camp_model');

        // Fetch camp details using $campId from the model
        $data['campDetails'] = $this->Camp_model->getCampDetails($campId);

        // Load the view to display camp details
        $this->load->view('admin/camp_details', $data);
    }




    public function patientList()
    {
        $this->load->model('Patient_model');
        // Get the search queries from the URL
        $search = $this->input->get('search');
        $searchSex = $this->input->get('searchSex');
        $searchDoctor = $this->input->get('searchDoctor');

        // Get patients based on the search queries
        $data['patients'] = $this->Patient_model->getAllPatients($search, $searchSex, $searchDoctor);

        $this->load->view('admin/patient_list', $data);
    }



    public function doctor_list()
    {
        $this->load->model('doctor_model');
        $doctors = $this->doctor_model->get_doctor_list();
        $data['doctors'] = $doctors;
        $this->load->view('admin/doctor_list', $data);
    }

    public function prescriptionList()
    {
        $this->load->model('Prescription_model');
        $data['prescriptions'] = $this->Prescription_model->getAllPrescriptions();

        $this->load->view('admin/prescription_list', $data);
    }

    public function vitalsList()
    {
        $data['vitals'] = $this->Vitals_model->getVitalsList();
        $this->load->view('admin/vitals_list', $data);
    }



    public function registerMMU()
    {
        
        $this->form_validation->set_rules('cityID', 'City ID', 'required');
        $this->form_validation->set_rules('userID', 'User ID', 'required');
        $this->form_validation->set_rules('mmuName', 'MMU Name', 'required');
        $this->form_validation->set_rules('mmuNumber', 'MMU Number', 'required');
        $this->form_validation->set_rules('insuranceDate', 'Insurance Date', 'required');
    
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/register_mmu');
        } else {
            $data = array(
                'cityID' => $this->input->post('cityID'),
                'userID' => $this->input->post('userID'),
                'mmuName' => $this->input->post('mmuName'),
                'mmuNumber' => $this->input->post('mmuNumber'),
                'insuranceDate' => $this->input->post('insuranceDate')
            );
    
            $this->Mmu_model->registerMMU($data);
            redirect('admin/registerMMU');
        }
    }


    public function registerDriver()
    {
        $this->load->library('form_validation');

        // Add form validation rules here

        if ($this->form_validation->run() === FALSE) {
            // Validation failed, load the registration form again
            $this->load->view('admin/register_driver');
        } else {
            // Validation successful, process the registration
            $data = array(
                // Fetch input data from the form and set it to the $data array
                'userID' => $this->input->post('userID'),
                'mmuID' => $this->input->post('mmuID'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );

            $this->load->model('Driver_model');
            $result = $this->Driver_model->registerDriver($data);

            if ($result) {
                // Driver registration successful
                redirect('admin/login'); // Redirect to login page or another page as needed
            } else {
                // Driver registration failed
                $this->load->view('admin/register_driver');
            }
        }
    }

    public function registerPatient()
    {
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('Patient_model');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('village', 'Village', 'required');

        // Handle form submission
        if ($this->form_validation->run() == TRUE) {
            // Form data is valid, proceed with registration

            // Image Upload Configuration
            $config['upload_path'] = './uploads/';  // Path relative to your project's root
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048;  // 2MB max size, adjust as needed
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (empty($_FILES['imgURL']['name'])) {
                // No file selected, show an error message
                $data['error'] = 'You must select an image to upload.';
                $this->load->view('Admin/register_patient', $data);
                return; // Stop further execution
            }
            if ($this->upload->do_upload('imgURL')) {
                $uploaded_data = $this->upload->data();
                $img_url = $uploaded_data['file_name'];
            } else {
                // Handle the case where image upload fails
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                // You may want to redirect or show an error message to the user
                return;
            }



            // Your registration logic here
            $data = array(
                'patientID' => $this->input->post('patientID'),
                'imgURL' => isset($img_url) ? $img_url : '',  // Set to empty string if upload fails
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'doctor' => $this->input->post('doctor'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'sex' => $this->input->post('sex'),
                'birthdate' => $this->input->post('birthdate'),
                'age' => $this->input->post('age'),
                'village' => $this->input->post('village'),
                'bloodgroup' => $this->input->post('bloodgroup'),
                'adharNo' => $this->input->post('adharNo'),  // Include adharNo with a non-null value
                'abhaNo' => $this->input->post('abhaNo'),
                'insuranceCompany' => $this->input->post('insuranceCompany'),
                'userID' => $this->input->post('userID'),
                'mmuID' => $this->input->post('mmuID'),
                'addDate' => date('Y-m-d'),
                'registrationTime' => date('Y-m-d H:i:s'),
                'hospitalID' => $this->input->post('hospitalID'),
                'password' => $this->input->post('password')
            );

            $this->Patient_model->registerPatient($data);

            redirect('admin/dashboard');
        }

        $this->load->view('Admin/register_patient');
    }

    public function registerPrescription()
    {

        $this->load->model('Prescription_model');

        $this->form_validation->set_rules('patientID', 'Patient ID', 'required');
        $this->form_validation->set_rules('doctorID', 'Doctor ID', 'required');
        // Add more rules for other prescription fields

        if ($this->input->post() && $this->form_validation->run() == TRUE) {
            $data = array(
                'patientID' => $this->input->post('patientID'),
                'doctorID' => $this->input->post('doctorID'),
                'symptom' => $this->input->post('symptom'),
                'advice' => $this->input->post('advice'),
                'state' => $this->input->post('state'),
                'medicine' => $this->input->post('medicine'),
                'Date' => $this->input->post('Date'),
                'note' => $this->input->post('note'),
                'mmuID' => $this->input->post('mmuID'),
            );

            $this->Prescription_model->registerPrescription($data);

            // Redirect or show success message
            redirect('admin/registerPrescription');
        }

        // Get patients data from the model
        $data['patients'] = $this->Prescription_model->getPatients();

        // Load the view with data
        $this->load->view('admin/register_prescription', $data);
    }



    public function registerCity()
    {
        // Form validation rules
        $this->form_validation->set_rules('cityName', 'City Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        // Add other validation rules for other fields

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Admin/register_city');
        } else {
            // Form data
            $data = array(
                'cityName' => $this->input->post('cityName'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                // Add other fields based on your table structure
            );

            // Insert data into the database
            $city_id = $this->City_model->insert_city($data);

            if ($city_id) {
                // City registration successful
                redirect('success_page'); // Redirect to a success page
            } else {
                // Handle database insertion failure
                echo 'City registration failed. Please try again.';
            }
        }
    }


    public function generateReport($patientID) {
        // Load necessary models
        $this->load->model('Patient_model');
        $this->load->model('Prescription_model');
        $this->load->model('Vitals_model');

        // Fetch patient details
        $data['patient'] = $this->Patient_model->getPatientById($patientID);

        // Fetch prescription details
        $data['prescription'] = $this->Prescription_model->getPrescriptionByPatientId($patientID);

        // Fetch vitals details
        $data['vitals'] = $this->Vitals_model->getVitalsByPatientId($patientID);

        // Load view to display the report
        $this->load->view('admin/report', $data);
    }

    public function downloadPDF($patientID) {

        // Load necessary models
        $this->load->library('pdf');

        $this->load->model('Patient_model');
        $this->load->model('Prescription_model');
        $this->load->model('Vitals_model');
        

       // Fetch patient details
       $data['patient'] = $this->Patient_model->getPatientById($patientID);

       // Fetch prescription details
       $data['prescription'] = $this->Prescription_model->getPrescriptionByPatientId($patientID);

       // Fetch vitals details
       $data['vitals'] = $this->Vitals_model->getVitalsByPatientId($patientID);

         // Load view to get HTML content
    $html = $this->load->view('admin/report', $data, true);

    // Generate PDF
    $this->pdf->SetTitle('Patient Report');
    $this->pdf->AddPage();
    $this->pdf->SetFont('times', '', 12);
    $this->pdf->writeHTML($html, true, false, true, false, '');

    // Output the PDF to the browser with a forced download
    $this->pdf->Output($data['patient']->name . '_report_' . date('Y-m-d') . '.pdf', 'D');

    }


    public function registerVitals()
    {
        $this->form_validation->set_rules('patientID', 'Patient ID', 'required');
        $this->form_validation->set_rules('doctorID', 'Doctor ID', 'required');
        // Add more rules for other vitals fields

        if ($this->input->post() && $this->form_validation->run() == TRUE) {
            $data = array(
                'patientID' => $this->input->post('patientID'),
                'doctorID' => $this->input->post('doctorID'),
                'BP' => $this->input->post('BP'),
                'PR' => $this->input->post('PR'),
                'RR' => $this->input->post('RR'),
                'Spo2' => $this->input->post('Spo2'),
                'Ht' => $this->input->post('Ht'),
                'Wt' => $this->input->post('Wt'),
                'Bmi' => $this->input->post('Bmi'),
            );

            $this->Vitals_model->registerVitals($data);

            // Redirect or show success message
        }

        $this->load->view('Admin/register_vitals');
    }

    public function registerDoctor()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('Doctor_model');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('profile', 'Profile', 'required');
        $this->form_validation->set_rules('mmuID', 'MMU ID', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // Add more validation rules as needed

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the registration form with validation errors
            $this->load->view('admin/register_doctor');
        } else {
            // Validation succeeded, process the registration

            // Image Upload Configuration
            $config['upload_path'] = './uploads/';  // Path relative to your project's root
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048;  // 2MB max size, adjust as needed
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('imgURL')) {
                $uploaded_data = $this->upload->data();
                $img_url = $uploaded_data['file_name'];
            } else {
                // Handle the case where image upload fails
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                return;
            }

            $data = array(
                'imgURL' => isset($img_url) ? $img_url : '',  // Set to empty string if upload fails
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'department' => $this->input->post('department'),
                'profile' => $this->input->post('profile'),
                'mmuID' => $this->input->post('mmuID'),
                'password' => $this->input->post('password'),
            );

            // Call the model method to insert the data into the database
            $this->Doctor_model->registerDoctor($data);

            // Redirect to a success page or wherever you want
            redirect('admin/dashboard');
        }
    }



    public function profile()
    {
        $user_data = $this->admin_model->get_user_data($this->session->userdata('user_id'));

        // Pass user data to the profile view
        $profile_data['user_data'] = $user_data;

        // Load the profile view
        $this->load->view('admin/profile', $profile_data);
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, load the login form
            $this->load->view('admin/login');
        } else {
            // Validation passed, process the login
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Call the login method in the User_model
            $user = $this->user_model->login($email, $password);

            if ($user) {
                // Login successful, store user information in session
                $user_data = array(
                    'user_id' => $user->userID,
                    'user_type_id' => $user->userTypeID,
                    'user_type' => $user->userType, // Store user type in lowercase
                    'user_email' => $user->email,  // Store additional user data in session
                    'user_name' => $user->name,
                    'logged_in' => TRUE,
                    // Add more fields as needed
                );

                $this->session->set_userdata($user_data);

                // Redirect to a dashboard or any other page based on user type
                redirect('admin/dashboard');
            } else {
                // Login failed
                $this->load->view('admin/login');
            }
        }
    }

    public function logout()
    {
        // Destroy session and redirect to the login page
        $this->session->sess_destroy();
        redirect('admin/login');
        echo "Logout method executed"; // Add debug message
    }
}
