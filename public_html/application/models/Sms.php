<?php
class Sms extends CI_Model
{
// 	function sendSMS($jsonObj)
// 	{
// 		$url = "http://www.mobily.ws/api/msgSend.php";
// 		$ch = curl_init();
// 		curl_setopt($ch, CURLOPT_URL, $url);
// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// 		curl_setopt($ch, CURLOPT_HEADER, 0);
// 		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
// 		curl_setopt($ch, CURLOPT_POST, 1);
// 		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
// 		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($jsonObj));
// 		$result = curl_exec($ch);
// 		$result = json_decode($result, true);
// 		return $result;
// 	}
	function sendSMS($jsonObj)
	{
		// Prepare data for sending
		$data = array(
			'bearerTokens' => '84b159ad33d4f84eff529e7891855473',
			'recipients' => $jsonObj['numbers'],
			'sender' => 'Nassr APP',
			'body' => $jsonObj['msg']
		);

		// Initialize cURL session
		$ch = curl_init('https://api.taqnyat.sa/v1/messages');

		// Set the cURL options
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

		// Disable SSL verification (not recommended for production)
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

		// Execute the request and capture the response
		$response = curl_exec($ch);

		// Check for cURL errors
		if (curl_errno($ch)) {
			echo 'cURL error: ' . curl_error($ch);
		}

		// Close the cURL session
		curl_close($ch);

		// Decode the JSON response
		$result = json_decode($response, true);

		// Return or log the result for debugging
		return $result;
	}
}