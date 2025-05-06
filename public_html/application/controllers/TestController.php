// application/controllers/TestController.php
class TestController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the necessary models
        $this->load->model('Admin_model');
        $this->load->model('Sms');
    }

    public function test_send_sms_to_admins() {
        // Fetch all admin phone numbers with country codes
        $admin_phone_numbers = $this->Admin_model->get_all_admin_phone_numbers();

        // Prepare the message to be sent
        $message = 'This is a test SMS message from the developer for solving SMS issues, SORRY FOR ANY INCONVENIENCE.';

        // Initialize an array to store full phone numbers
        $phone_numbers = [];

        // Uncomment the foreach loop to collect all full phone numbers
        foreach ($admin_phone_numbers as $admin) {
            $full_phone_number = $admin['country_code'] . $admin['phone'];
            $phone_numbers[] = $full_phone_number;
        }

        // Alternatively, you can hardcode a specific number for testing
        // $phone_numbers[] = '+966555000304'; // Example phone number

        // Check if there are any phone numbers to send the SMS to
        if (!empty($phone_numbers)) {
            $jsonObj = [
                'numbers' => $phone_numbers, // Array of full phone numbers
                'msg' => $message // The message to be sent
            ];

            // Send the SMS using the Sms model
            $result = $this->Sms->sendSMS($jsonObj);

            // Handle the result and output it for testing
            if (isset($result['status']) && $result['status'] == 'success') {
                echo "Test message sent successfully to all admins.";
            } else {
                echo "Failed to send test message. Error: " . json_encode($result);
            }
        } else {
            echo "No admin phone numbers found.";
        }
    }
}
