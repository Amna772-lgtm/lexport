<?php
$CI = &get_instance();
if (!function_exists('is_logged_in')) {
	function is_logged_in()
	{
		$CI = &get_instance();
		$is_logged_in = $CI->session->userdata('admin_id');
		if (!isset($is_logged_in) || $is_logged_in == '') {
			redirect('web_management/cms');

			die();
		}
	}
}

function showMsg($type = '', $msg = '')
{
	global $CI;
	if (empty($type) && empty($msg)) {
		$type = $CI->session->userdata('f_type');
		$msg = $CI->session->userdata('f_msg');
		$CI->session->unset_userdata('f_type');
		$CI->session->unset_userdata('f_msg');
	}
	if ($type != '' && $msg != '') {
		switch ($type) {
			case 'success':
				echo '<div class="alert alert-success"><button data-dismiss="alert" class="close"> × </button><strong>Success:</strong> ' . $msg . '</div><div class="clearfix"></div>';
				break;
			case 'error':
				echo '<div class="alert alert-danger"><button data-dismiss="alert" class="close"> × </button><strong>Error: </strong> ' . $msg . '</div><div class="clearfix"></div>';
				break;
			case 'warning':
				echo '<div class="alert alert-warning"><button data-dismiss="alert" class="close"> × </button><strong>Warning:</strong> ' . $msg . '</div><div class="clearfix"></div>';
				break;
			default:
				echo '<div class="alert alert-info"><button data-dismiss="alert" class="close"> × </button><strong>Info:</strong> ' . $msg . '</div><div class="clearfix"></div>';
				break;
		}
	}
}

function setMsg($type, $msg)
{
	global $CI;
	$CI->session->set_userdata('f_type', $type);
	$CI->session->set_userdata('f_msg', $msg);
}
function user_email($id)
{
	global $CI;
	$CI = get_instance();
	if ($id == '') {
		return false;
	}
	$to_mail = $CI->db->select("email")->where_in('id', $id)->get('users')->result_array();
	$users = array_column($to_mail, 'email');
	return $users;
}
function clsoe_diff($date1, $time, $close_date)
{
	global $CI;
	$CI = get_instance();
	$date1 = explode('/', $date1);
	$time = str_replace(array(' am', ' pm'), array('', ''), $time);
	$date1 = $date1[2] . "-" . $date1[1] . "-" . $date1[0] . " " . $time;

	$date2 = $close_date;
	$date1 = strtotime($date1);
	$date2 = strtotime($date2);

	// Formulate the Difference between two dates re
	$diff = abs($date1 - $date2);
	$diff1 = $date1 - $date2;

	// To get the year divide the resultant date into 
	// total seconds in a year (365*60*60*24) 
	$years = floor($diff / (365 * 60 * 60 * 24));


	// To get the month, subtract it with years and 
	// divide the resultant date into 
	// total seconds in a month (30*60*60*24) 
	$months = floor(($diff - $years * 365 * 60 * 60 * 24)
		/ (30 * 60 * 60 * 24));


	// To get the day, subtract it with years and  
	// months and divide the resultant date into 
	// total seconds in a days (60*60*24) 
	$days = floor(($diff - $years * 365 * 60 * 60 * 24 -
		$months * 30 * 60 * 60 * 24) / (60 * 60 * 24));


	// To get the hour, subtract it with years,  
	// months & seconds and divide the resultant 
	// date into total seconds in a hours (60*60) 
	$hours = floor(($diff - $years * 365 * 60 * 60 * 24
		- $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24)
		/ (60 * 60));


	// To get the minutes, subtract it with years, 
	// months, seconds and hours and divide the  
	// resultant date into total seconds i.e. 60 
	$minutes = floor(($diff - $years * 365 * 60 * 60 * 24
		- $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24
		- $hours * 60 * 60) / 60);


	// To get the minutes, subtract it with years, 
	// months, seconds, hours and minutes  
	$seconds = floor(($diff - $years * 365 * 60 * 60 * 24
		- $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24
		- $hours * 60 * 60 - $minutes * 60));
	$mn = '';
	if ($diff1 < 0) {
		$mn = '-';
		$color = "green";
	} else {
		$color = "green";
	}
	$getdate = date("m/d/Y", strtotime($close_date));
	$dated = date("d-m-Y", strtotime($close_date));
	$site_lang = $CI->session->userdata('site_lang');

if ($site_lang == "arabic") {
    $laandays = "يوم";
} else {
    $laandays = "days";
}

	// $diff = "($dated)<br><span style='color:".$color."'>".$mn.$days." ".$laandays." ".$hours.":".$minutes.":".$seconds."</span>";
	$diff = ($dated) . " " . $mn . $days . " " . $laandays . " " . $hours . ":" . $minutes . ":" . $seconds;
	return $diff;
}
function intPart($float)
{
	if ($float < -0.0000001)
		return ceil($float - 0.0000001);
	else
		return floor($float + 0.0000001);
}

function getTheDayAndDateFromDateAppWithoutDayHij($date, $lan)
{
	global $CI;
	$CI = get_instance();
	if ($date == "") return "";
	if (strpos($date, '-') !== false) {
		$sepparator = '-';

		$parts = explode($sepparator, $date);
		$dayForDate = date("l", mktime(0, 0, 0, $parts[2], $parts[1], $parts[0]));

		if ($lan == 'ar') {
			$data = Greg2Hijri($parts[0], $parts[1], $parts[2], true, true);
		} else {
			$data = $parts[0] . "/" . $parts[1] . "/" . $parts[2];
		}
	} else {
		$sepparator = '/';
		$parts = explode($sepparator, $date);
		$dayForDate = date("l", mktime(0, 0, 0, $parts[2], $parts[1], $parts[0]));
		if ($lan == 'ar') {
			$data = Greg2Hijri($parts[0], $parts[1], $parts[2], true, true);
		} else {
			$data =	$parts[0] . "/" . $parts[1] . "/" . $parts[2];
		}
	}
	return $data;
}
function getTheDayAndDateFromDateAppWithoutDay($date, $lan)
{
	global $CI;
	$CI = get_instance();
	if ($date == "") return;
	if (strpos($date, '-') !== false) {
		$sepparator = '-';

		$parts = explode($sepparator, $date);
		$dayForDate = date("l", mktime(0, 0, 0, $parts[2], $parts[1], $parts[0]));
		if ($lan == 'ar') {
			$data = Hijri2Greg($parts[0], $parts[1], $parts[2], true);
		} else {
			$data = $parts[0] . "/" . $parts[1] . "-" . $parts[2];
		}
	} else {
		$sepparator = '/';
		$parts = explode($sepparator, $date);
		$dayForDate = date("l", mktime(0, 0, 0, $parts[2], $parts[1], $parts[0]));
		if ($lan == 'ar') {
			$data = Hijri2Greg($parts[0], $parts[1], $parts[2], true);
		} else {
			$data =	$parts[0] . "/" . $parts[1] . "-" . $parts[2];
		}
	}
	return $data;
}
function getDayArToEn($day)
{
	if ($day == "Monday") {
		$day = "الإثنين";
	} else if ($day == "Tuesday") {
		$day = "الثلاثاء";
	} else if ($day == "Wednesday") {
		$day = "الأربعاء";
	} else if ($day == "Thursday") {
		$day = "الخميس";
	} else if ($day == "Friday") {
		$day = "الجمعة";
	} else if ($day == "Saturday") {
		$day = "السبت";
	} else if ($day == "Sunday") {
		$day = "الأحد";
	}
	return $day;
}
function getTheDayAndDateFromDateApp($date, $lan)
{
	global $CI;
	if ($date == "") return "";
	$CI = get_instance();
	if (strpos($date, '-') !== false) {
		$sepparator = '-';

		$parts = explode($sepparator, $date);
		//$dayForDate = date("l", mktime(0, 0, 0, $parts[2], $parts[1], $parts[0]));

		$date1 =  $parts[2] . "-" . $parts[1] . "-" . $parts[0];
		$unixTimestamp = strtotime($date1);
		$dayForDate = date("l", $unixTimestamp);
		if ($lan == 'ar') {
			$data = Greg2Hijri($parts[0], $parts[1], $parts[2], true, true) . " " . getDayArToEn($dayForDate);
		} else {
			$data = $parts[0] . "-" . $parts[1] . "-" . $parts[2] . " " . $dayForDate;;
		}
	} else {
		$sepparator = '/';
		$parts = explode($sepparator, $date);
		//$dayForDate = date("l", mktime(0, 0, 0, $parts[2], $parts[1], $parts[0]));

		$date1 =  $parts[2] . "-" . $parts[1] . "-" . $parts[0];
		$unixTimestamp = strtotime($date1);
		$dayForDate = date("l", $unixTimestamp);

		if ($lan == 'ar') {
			$data = Greg2Hijri($parts[0], $parts[1], $parts[2], true, true) . " " . getDayArToEn($dayForDate);
		} else {
			$data =	$parts[0] . "-" . $parts[1] . "-" . $parts[2] . " " . $dayForDate;;
		}
	}
	return $data;
}

function Hijri2Greg($day, $month, $year, $string = false)
{
	$day   = (int) $day;
	$month = (int) $month;
	$year  = (int) $year;

	$jd = intPart((11 * $year + 3) / 30) + 354 * $year + 30 * $month - intPart(($month - 1) / 2) + $day + 1948440 - 385;

	if ($jd > 2299160) {
		$l = $jd + 68569;
		$n = intPart((4 * $l) / 146097);
		$l = $l - intPart((146097 * $n + 3) / 4);
		$i = intPart((4000 * ($l + 1)) / 1461001);
		$l = $l - intPart((1461 * $i) / 4) + 31;
		$j = intPart((80 * $l) / 2447);
		$day = $l - intPart((2447 * $j) / 80);
		$l = intPart($j / 11);
		$month = $j + 2 - 12 * $l;
		$year  = 100 * ($n - 49) + $i + $l;
	} else {
		$j = $jd + 1402;
		$k = intPart(($j - 1) / 1461);
		$l = $j - 1461 * $k;
		$n = intPart(($l - 1) / 365) - intPart($l / 1461);
		$i = $l - 365 * $n + 30;
		$j = intPart((80 * $i) / 2447);
		$day = $i - intPart((2447 * $j) / 80);
		$i = intPart($j / 11);
		$month = $j + 2 - 12 * $i;
		$year = 4 * $k + $n + $i - 4716;
	}

	$data = array();
	$date['year']  = $year;
	$date['month'] = $month;
	$date['day']   = $day;

	if (!$string)
		return $date;
	else
		return "{$day}/{$month}/{$year}";
}

function Greg2Hijri($day, $month, $year, $string = false, $isplus = true)
{
	if ($isplus) {
		$day   = (int) $day;
	} else {
		$day   = (int) $day;
	}
	$month = (int) $month;
	$year  = (int) $year;

	if (($year > 1582) or (($year == 1582) and ($month > 10)) or (($year == 1582) and ($month == 10) and ($day > 14))) {
		$jd = intPart((1461 * ($year + 4800 + intPart(($month - 14) / 12))) / 4) + intPart((367 * ($month - 2 - 12 * (intPart(($month - 14) / 12)))) / 12) -
			intPart((3 * (intPart(($year + 4900 +    intPart(($month - 14) / 12)) / 100))) / 4) + $day - 32075;
	} else {
		$jd = 367 * $year - intPart((7 * ($year + 5001 + intPart(($month - 9) / 7))) / 4) + intPart((275 * $month) / 9) + $day + 1729777;
	}

	$l = $jd - 1948440 + 10632;
	$n = intPart(($l - 1) / 10631);
	$l = $l - 10631 * $n + 354;
	$j = (intPart((10985 - $l) / 5316)) * (intPart((50 * $l) / 17719)) + (intPart($l / 5670)) * (intPart((43 * $l) / 15238));
	$l = $l - (intPart((30 - $j) / 15)) * (intPart((17719 * $j) / 50)) - (intPart($j / 16)) * (intPart((15238 * $j) / 43)) + 29;

	$month = intPart((24 * $l) / 709);
	$day   = $l - intPart((709 * $month) / 24);
	$year  = 30 * $n + $j - 30;

	$date = array();
	$date['year']  = $year;
	$date['month'] = $month;
	$date['day']   = $day;

	if (!$string)
		return $date;
	else
		return "{$day}/{$month}/{$year}";
}
function getBrowser()
{
	$u_agent = $_SERVER['HTTP_USER_AGENT'];
	$bname = 'Unknown';
	$platform = 'Unknown';
	$version = "";

	//First get the platform?
	if (preg_match('/linux/i', $u_agent)) {
		$platform = 'linux';
	} elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
		$platform = 'mac';
	} elseif (preg_match('/windows|win32/i', $u_agent)) {
		$platform = 'windows';
	}

	// Next get the name of the useragent yes seperately and for good reason
	if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
		$bname = 'Internet Explorer';
		$ub = "MSIE";
	} elseif (preg_match('/Firefox/i', $u_agent)) {
		$bname = 'Mozilla Firefox';
		$ub = "Firefox";
	} elseif (preg_match('/OPR/i', $u_agent)) {
		$bname = 'Opera';
		$ub = "Opera";
	} elseif (preg_match('/Chrome/i', $u_agent) && !preg_match('/Edge/i', $u_agent)) {
		$bname = 'Google Chrome';
		$ub = "Chrome";
	} elseif (preg_match('/Safari/i', $u_agent) && !preg_match('/Edge/i', $u_agent)) {
		$bname = 'Apple Safari';
		$ub = "Safari";
	} elseif (preg_match('/Netscape/i', $u_agent)) {
		$bname = 'Netscape';
		$ub = "Netscape";
	} elseif (preg_match('/Edge/i', $u_agent)) {
		$bname = 'Edge';
		$ub = "Edge";
	} elseif (preg_match('/Trident/i', $u_agent)) {
		$bname = 'Internet Explorer';
		$ub = "MSIE";
	}

	// finally get the correct version number
	$known = array('Version', $ub, 'other');
	$pattern = '#(?<browser>' . join('|', $known) .
		')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	if (!preg_match_all($pattern, $u_agent, $matches)) {
		// we have no matching number just continue
	}
	// see how many we have
	$i = count($matches['browser']);
	if ($i != 1) {
		//we will have two since we are not using 'other' argument yet
		//see if version is before or after the name
		if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
			$version = $matches['version'][0];
		} else {
			$version = $matches['version'][1];
		}
	} else {
		$version = $matches['version'][0];
	}

	// check if we have a number
	if ($version == null || $version == "") {
		$version = "?";
	}

	return array(
		'userAgent' => $u_agent,
		'name'      => $bname,
		'version'   => $version,
		'platform'  => $platform,
		'pattern'    => $pattern
	);
}



function getUserSession($id)
{
	if ($id == '') {
		return false;
	}
	global $CI;
	$CI = get_instance();
	$data = $CI->db->select('session_id')->where(['id' => $id])->get('users')->row();
	if ($data) {
		return $data->session_id;
	} else {
		return false;
	}
}
function getCaseID()
{
	global $CI;
	$CI = get_instance();
	$case_no = $CI->db->select_max('id')->get('c_case')->row_array();
	$case_no = $case_no['id'];
	$dbValue = $case_no + 1;
	return $dbValue;
}
function getMissionNumber($id, $table)
{
	if ($id == '') {
		return false;
	}
	global $CI;
	$CI = get_instance();
	$data = $CI->db->select('session_number')->where(['id' => $id])->get($table)->row();
	return $data->session_number;
}
function getMissionCount($id, $table)
{
	if ($id == '') {
		return false;
	}
	global $CI;
	$CI = get_instance();
	return $data = $CI->db->select('*')->where(['sub_mission_id' => $id])->get($table)->num_rows();
}

function checkAllMissionClose($id, $table)
{
	if ($id == '') {
		return false;
	}
	global $CI;
	$CI = get_instance();
	return $data = $CI->db->select('*')->where(['sub_mission_id' => $id])->where(['is_close' => 0])->get($table)->num_rows();
}
function insertActionLog($json_data = "",	$customers_id = "",	$action_type = "", $status_type = "")
{
	global $CI;
	$CI = get_instance();
	$admin_id = $CI->session->userdata('admin_id');
	$role_id = $CI->session->userdata('role_id');
	$action_log['user_id'] =  isset($admin_id) ? $admin_id : 0;
	$action_log['action_type'] = $action_type;
	$action_log['customer_id'] = $customers_id;
	$action_log['status_type'] = $status_type;
	$action_log['role'] = isset($role_id) ? $role_id : 0;
	$action_log['ip'] = $_SERVER['REMOTE_ADDR'];
	$action_log['json_data'] = json_encode($json_data);
	$action_log['device'] = getDeviceName();
	$action_log['create_date'] = date("Y-m-d G:i:s");
	$CI->db->insert('action_log', $action_log);
}
function chatNotification($id)
{
	global $CI;
	$CI = get_instance();
	return $CI->db->select('id')->where(['user_id' => $id, 'is_read' => 0])->get('chat')->num_rows();
}
function sendSMSProcess($mobile, $msg)
{
	global $CI;
	$CI = get_instance();
	$data = $CI->db->select('*')->where(['phone' => $mobile])->get("users")->row();
	$jsonObj = array(
		'apiKey' => 'c05990df25f97ddda831392752f7eb0b',
		'sender' => 'Nassr APP',
		'numbers' => $data->country_code . $mobile,
		'msg' => $msg,
		'msgId' => rand(1, 99999),
		'timeSend' => '0',
		'dateSend' => '0',
		'deleteKey' => '55348',
		'lang' => '3',
		'applicationType' => 68,
	);
	$result = $CI->Sms->sendSMS($jsonObj);

	$badge = $data->badge + 1;
	$post['badge'] = $badge;
	$CI->db->where('id', $data->id)->update('users', $post);
	$id = "dkarFReofts:APA91bGSHkVOHVjOYXfQwfwXnrMv5hkYrfce-9nNxT0iYXLJG-Actc3qLPBUChVOEPUAMIVZnjHPa5UIRWKrKkpBIvwOYtP45adpnO15diTgseDgV8OuN_-u2bgMZB7HyH6SRSwetHD7";
	static_send_android_notification($data->device_token, '', $msg, $badge);

	$json_data['text'] = $msg;
	insertActionLog($json_data, $data->id, "send", "sms");
}

function static_send_android_notification($to = "", $regid = "", $msg, $badge)
{
	$url = 'https://fcm.googleapis.com/fcm/send';
	$fields['data']['title'] = "Nassr";
	$fields['data']['body'] = $msg;
	$fields['data']['sound'] = "default";
	$fields['data']['badge'] = $badge;
	$fields['data']['icon'] = "fcm_push_icon";
	$fields['notification']['title'] = "Nassr";
	$fields['notification']['body'] = $msg;
	$fields['notification']['sound'] = "default";
	$fields['notification']['badge'] = $badge;
	$fields['data']['landing_page'] = "";
	$fields['notification']['icon'] = "fcm_push_icon";


	if ($to) {
		$fields['to'] = $to;
	}
	if ($regid) {
		$fields['registration_ids'] = $regid;
	}
	$fields['priority'] = "high";
	$fields['restricted_package_name'] = "";
	$json = json_encode($fields);
	$serverKey = "AAAAScjKkok:APA91bGGuB4RlB25ZBcT6SxUYH0B-3V7mcQ17QU7NpVbOOIhc60-Yg9eT25UySnE9KfYnmcDGrMwEyTZAf3OV8qkUvuJexht7ZuKYMoIaf59GQpv683oqZWdB-TZpqqUQtmNDGd4J5za";
	$headers = array();
	$headers[] = 'Content-Type: application/json';
	$headers[] = 'Authorization: key=' . $serverKey;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	//Send the request
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);
	//Close request
	if ($response === FALSE) {
		die('FCM Send Error: ' . curl_error($ch));
	}
	curl_close($ch);
	return true;
}
function mission_rand($no, $pre)
{
	$rand = rand(100000, 999999);
	return $pre . $no . $rand;
}
function mission_due_time($date, $time)
{
	$date = explode('/', $date);
	$date = $date[2] . '/' . $date[1] . '/' . $date[0];
	$datetime = $date . " " . str_replace(array(' am', ' pm'), array('', ''), $time) . ":" . rand(0, 59) . substr($time, -3);
	return $datetime;
}
function getCaseNumber($case_id)
{
    $CI =& get_instance();  // Correct way to get CI instance

    if ($case_id == '0' || $case_id == '') {
        $case_no = $CI->db->select('no')->where('id', 1)->get('file_number')->row();
        $case_no = $case_no->no + 1;

        $file_number['no'] = $case_no;
        $CI->db->where('id', 1)->update('file_number', $file_number);

        return "FN" . str_pad($case_no, 6, "0", STR_PAD_LEFT);
    } else {
        $q = $CI->db->select(['case_number'])->where('id', $case_id)->get('c_case')->row();
        if ($q) {
            return $q->case_number;
        }
    }

    return null; // optional fallback
}

function getCaseType($eid)
{
	global $CI;
	$CI = get_instance();

	if ($eid == '' || $eid == '0') {
		return false;
	}
	$case_type = $CI->db->select('name')->where('id', $eid)->get('case_type')->row();
	return  $case_type->name;
}
function getGeneralType($eid)
{
	global $CI;
	$CI = get_instance();
	if ($eid == '') {
		return false;
	}
	$case_type = $CI->db->select('name')->where('id', $eid)->get('task_type')->row();
	return  $case_type->name;
}
function getTheDayFromDate($date)
{
	global $CI;
	$sepparator = '-';
	$parts = explode($sepparator, $date);
	//$dayForDate = date("l", mktime(0, 0, 0, $parts[2], $parts[1], $parts[0]));

	$date1 =  $parts[2] . "-" . $parts[1] . "-" . $parts[0];
	$unixTimestamp = strtotime($date1);
	$dayForDate = date("l", $unixTimestamp);

	$CI = get_instance();
	if ($date == '') {
		return false;
	}
	return "<br>" . $dayForDate;
}
function getTheDayAndDateFromDate($date)
{
	global $CI;
	$CI = get_instance();
	if (strpos($date, '-') !== false) {

		$sepparator = '-';

		$parts = explode($sepparator, $date);
		//$dayForDate = date("l", mktime(0, 0, 0, $parts[2], $parts[1], $parts[0]));

		$date1 =  $parts[2] . "-" . $parts[1] . "-" . $parts[0];
		$unixTimestamp = strtotime($date1);
		$dayForDate = date("l", $unixTimestamp);
		if ($date == '') {
			return false;
		}
		if ($CI->session->userdata('admin_site_lang') == "arabic" or $CI->session->userdata('admin_site_lang') == "") {

			$data = Greg2Hijri($parts[0], $parts[1], $parts[2], true, true) . " " . getDayArToEn($dayForDate);
		} else {
			$data = $parts[0] . "-" . $parts[1] . "-" . $parts[2] . " " . $dayForDate;
		}
	} else {

		$sepparator = '/';

		$parts = explode($sepparator, $date);
		//$dayForDate = date("l", mktime(0, 0, 0, $parts[2], $parts[1], $parts[0]));


		$date1 =  $parts[2] . "-" . $parts[1] . "-" . $parts[0];
		$unixTimestamp = strtotime($date1);
		$dayForDate = date("l", $unixTimestamp);

		if ($date == '') {
			return false;
		}
		if ($CI->session->userdata('admin_site_lang') == "arabic" or $CI->session->userdata('admin_site_lang') == "") {

			$data = Greg2Hijri($parts[0], $parts[1], $parts[2], true, true) . " " . getDayArToEn($dayForDate);
		} else {
			$data =	$parts[0] . "-" . $parts[1] . "-" . $parts[2] . " " . $dayForDate;
		}
	}

	return $data;
}

function getdateforshorting($date)
{
	global $CI;
	$CI = get_instance();
	if (strpos($date, '-') !== false) {

		$sepparator = '-';

		$parts = explode($sepparator, $date);

		$date1 =  $parts[2] - 1 . "-" . $parts[1] . "-" . $parts[0];
		$unixTimestamp = strtotime($date1);
		$dayForDate = date("l", $unixTimestamp);


		if ($date == '') {
			return false;
		}
		if ($CI->session->userdata('site_lang') == "arabic" or $CI->session->userdata('site_lang') == "") {
			$data1 = Greg2Hijri($parts[0], $parts[1], $parts[2], false, true);
			$data =	 $data1[2] . $data1[1] . $data1[0];
		} else {
			if ($parts[0] - 1 == 0) {
				$newdate = 30;
				$newmonth = $parts[1] - 1;
			} else {
				$newdate = $parts[0];
				$newmonth = $parts[1];
			}
			$data =	 $parts[2] . $newmonth . $newdate;
		}
	} else {

		$sepparator = '/';

		$parts = explode($sepparator, $date);
		//$dayForDate = date("l", mktime(0, 0, 0, $parts[2], $parts[1], $parts[0]));

		$date1 =  $parts[2] - 1 . "-" . $parts[1] . "-" . $parts[0];
		$unixTimestamp = strtotime($date1);
		$dayForDate = date("l", $unixTimestamp);

		if ($date == '') {
			return false;
		}
		if ($CI->session->userdata('site_lang') == "arabic" or $CI->session->userdata('site_lang') == "") {
			$data1 = Greg2Hijri($parts[0], $parts[1], $parts[2], false, true);
			$data =	 $data1['year'] . $data1['month'] . $data1['day'];
		} else {
			if ($parts[0] - 1 == 0) {
				$newdate = 30;
				$newmonth = $parts[1] - 1;
			} else {
				$newdate = $parts[0];
				$newmonth = $parts[1];
			}
			$data =	 $parts[2] . $newmonth . $newdate;
		}
	}
	return $data;
}
function getTheDayAndDateFromDatePanFront($date)
{
	global $CI;
	$CI = get_instance();
	if (strpos($date, '-') !== false) {

		$sepparator = '-';

		$parts = explode($sepparator, $date);
		//$dayForDate = date("l", mktime(0, 0, 0, $parts[2], $parts[1], $parts[0]));

		$date1 =  $parts[2] - 1 . "-" . $parts[1] . "-" . $parts[0];
		$unixTimestamp = strtotime($date1);
		$dayForDate = date("l", $unixTimestamp);


		if ($date == '') {
			return false;
		}
		if ($CI->session->userdata('site_lang') == "arabic" or $CI->session->userdata('site_lang') == "") {
			$data = Greg2Hijri($parts[0], $parts[1], $parts[2], true, true) . " " . getDayArToEn($dayForDate);
		} else {
			if ($parts[0] - 1 == 0) {
				$newdate = 30;
				$newmonth = $parts[1] - 1;
			} else {
				$newdate = $parts[0];
				$newmonth = $parts[1];
			}
			$data =	 $newdate . "-" . $newmonth . "-" . $parts[2] . " " . $dayForDate;
		}
	} else {

		$sepparator = '/';

		$parts = explode($sepparator, $date);
		//$dayForDate = date("l", mktime(0, 0, 0, $parts[2], $parts[1], $parts[0]));

		$date1 =  $parts[2] - 1 . "-" . $parts[1] . "-" . $parts[0];
		$unixTimestamp = strtotime($date1);
		$dayForDate = date("l", $unixTimestamp);

		if ($date == '') {
			return false;
		}
		if ($CI->session->userdata('site_lang') == "arabic" or $CI->session->userdata('site_lang') == "") {
			$data = Greg2Hijri($parts[0], $parts[1], $parts[2], true, true) . " " . getDayArToEn($dayForDate);
		} else {
			if ($parts[0] - 1 == 0) {
				$newdate = 30;
				$newmonth = $parts[1] - 1;
			} else {
				$newdate = $parts[0];
				$newmonth = $parts[1];
			}
			$data =	 $newdate . "-" . $newmonth . "-" . $parts[2];
		}
	}
	return $data;
}
function getTheDayAndDateFromDatePan($date)
{
    global $CI;
    $CI = get_instance();
    if (strpos($date, '-') !== false) {

        $sepparator = '-';
        $parts = explode($sepparator, $date);

        $date1 =  ($parts[2] - 1) . "-" . $parts[1] . "-" . $parts[0];
        $unixTimestamp = strtotime($date1);

        if ($date == '') {
            return false;
        }

        if ($CI->session->userdata('admin_site_lang') == "arabic" or $CI->session->userdata('admin_site_lang') == "") {
            $data = Greg2Hijri($parts[0], $parts[1], $parts[2], true, true);
        } else {
            if ($parts[0] - 1 == 0) {
                $newdate = 30;
                $newmonth = $parts[1] - 1;
            } else {
                $newdate = $parts[0];
                $newmonth = $parts[1];
            }
            $data =	 $parts[2] . "-" . $newmonth . "-" . $newdate;
        }
    } else {

        $sepparator = '/';
        $parts = explode($sepparator, $date);

        $date1 =  ($parts[2] - 1) . "-" . $parts[1] . "-" . $parts[0];
        $unixTimestamp = strtotime($date1);

        if ($date == '') {
            return false;
        }

        if ($CI->session->userdata('admin_site_lang') == "arabic" or $CI->session->userdata('admin_site_lang') == "") {
            $data = Greg2Hijri($parts[0], $parts[1], $parts[2], true, true);
        } else {
            if ($parts[0] - 1 == 0) {
                $newdate = 30;
                $newmonth = $parts[1] - 1;
            } else {
                $newdate = $parts[0];
                $newmonth = $parts[1];
            }
            $data =	 $parts[2] . "-" . $newmonth . "-" . $newdate;
        }
    }
    return $data;
}

function getCustomerCaseServices($eid)
{
	global $CI;
	$CI = get_instance();
	if ($eid == '' || $eid == '0') {
		return false;
	}
	$emp = $CI->db->select('service_types')->where('customers_id', $eid)->get('c_case')->result_array();
	$ct = sizeof($emp);
	$txt = '';
	if ($ct > 1) {
		$txt = ", and many more";
	}
	$sname = getServiceType($emp[0]['service_types']);
	return $sname . $txt;
}
function getEmployeeName($eid)
{
	global $CI;
	$CI = get_instance();
	if ($eid == '' || $eid == '0') {
		return false;
	}
	$emp = $CI->db->select('name')->where('id', $eid)->get('users')->row();
	return  $emp->name;
}
function getEmployeeList()
{
	global $CI;
	$CI = get_instance();
	$emp = $CI->db->select('name,id')->where('role_id', 2)->get('users')->result_array();
	return  $emp;
}

function getCustomerMobile($eid)
{
	global $CI;
	$CI = get_instance();
	if ($eid == '' || $eid == '0') {
		return false;
	}
	$emp = $CI->db->select('phone')->where('id', $eid)->get('users')->row();
	return  $emp->phone;
}
function getDeviceName()
{
	global $CI;
	$CI = get_instance();
	$CI->load->library('user_agent');
	if ($CI->agent->is_mobile('iphone')) {
		$device =   "iphone";
	} elseif ($CI->agent->is_mobile()) {
		$device =  'mobile';
	} else {
		$device = 'web';
	}
	return $device;
}
function getFineName($eid)
{
	global $CI;
	$CI = get_instance();
	$emp = $CI->db->select('*')->where('id', $eid)->get('fine_type')->row();
	return  $emp->name;
}
function allMissionNotification($table)
{

	if (ResponsibleNotification($table) > 0) {
		return true;
	} else if (FollowNotification($table) > 0) {
		return true;
	} else if (CloseNotification($table) > 0) {
		return true;
	} else if (PendingNotification($table) > 0) {
		return true;
	} else if (ReviewNotification($table) > 0) {
		return true;
	} else {
		return false;
	}
}
function allCustomerNotification()
{

	if (casePendingNotification() > 0) {
		return true;
	} else if (userNotification() > 0) {
		return true;
	} else {
		return false;
	}
}
function ResponsibleNotification($table)
{
	global $CI;
	$CI = get_instance();
	$user_id = $CI->session->userdata('admin_id');
	$role_id = $CI->session->userdata('role_id');
	// SUb
	if ($CI->uri->segment(4)) {
		$sub_mission_id = $CI->uri->segment(4);
	} else {
		$sub_mission_id = 0;
	}
	// sub
	if ($role_id == 1) {
		$where  = "read_admin = 0 AND is_close = 0 AND status = 0  AND on_review = 0";
		$no = $CI->db->select('id')->where("($where)", NULL, FALSE)->where("{$table}.sub_mission_id", $sub_mission_id)->get($table)->num_rows();
	} else if (in_array($CI->session->userdata('admin_id'), getFileManager())) {
		$where  = "c_case.manager_id=$user_id AND {$table}.on_review = 0 AND {$table}.responsible_employee = $user_id  AND  {$table}.read_manager =0 AND {$table}.status =0 AND {$table}.is_close =0";
		return $CI->db->select("$table.*,c_case.id as case_id")
			->join('c_case', "c_case.id = {$table}.case_id", 'left')
			->where("($where)", NULL, FALSE)
			->where("{$table}.sub_mission_id", $sub_mission_id)
			->get($table)
			->num_rows();
	} else {
		$where  = "read_response = 0 AND is_close = 0 AND status = 0 AND responsible_employee = $user_id  AND on_review = 0";
		$no = $CI->db->select('id')->where("($where)", NULL, FALSE)->where("{$table}.sub_mission_id", $sub_mission_id)->get($table)->num_rows();
	}
	return  $no;
}

function FollowNotification($table)
{
	global $CI;
	$CI = get_instance();
	// SUb
	if ($CI->uri->segment(4)) {
		$sub_mission_id = $CI->uri->segment(4);
	} else {
		$sub_mission_id = 0;
	}
	// sub

	$user_id = $CI->session->userdata('admin_id');
	$role_id = $CI->session->userdata('role_id');
	if ($role_id == 1) {
		$where  = "read_admin = 0 AND status = 0 AND on_review = 0 AND is_close = 0";
		$no = $CI->db->select('id')->where("($where)", NULL, FALSE)->where("{$table}.sub_mission_id", $sub_mission_id)->get($table)->num_rows();
	} else if (in_array($CI->session->userdata('admin_id'), getFileManager())) {

		$where  = "c_case.manager_id=$user_id  AND {$table}.follow_up_employee = $user_id  AND {$table}.on_review = 0 AND {$table}.read_manager =0 AND {$table}.is_close =0 AND {$table}.status =0";
		return $CI->db->select("$table.*,c_case.id as case_id")
			->join('c_case', "c_case.id = {$table}.case_id", 'left')
			->where("($where)", NULL, FALSE)->where("{$table}.sub_mission_id", $sub_mission_id)
			->get($table)
			->num_rows();
	} else {
		$where  = "assign_mission.following_employee_id = $user_id AND {$table}.is_close = 0  AND {$table}.on_review = 0  AND assign_mission.type='$table'";
		$no =   $CI->db->select("{$table}.*,assign_mission.*,c_case.id as case_id,c_case.client_name,c_case.customers_id,c_case.case_number,c_case.service_types,c_case.opponent_full_name,c_case.case_title,c_case.court_name,c_case.judge_name")
			->join('c_case', "c_case.id = {$table}.case_id", 'left')
			->join('assign_mission', "assign_mission.app_id = {$table}.id", 'left')
			->where("($where)", NULL, FALSE)->where("{$table}.sub_mission_id", $sub_mission_id)
			->where("{$table}.status", 0)->order_by("{$table}.id", "desc")
			->where("$table.is_close", 0)
			->get($table)
			->num_rows();

		//	$where  ="read_follow = 0 AND is_close = 0 AND status = 0 AND follow_up_employee = $user_id  AND on_review = 0";
		//	$no= $CI->db->select('id')->where("($where)", NULL, FALSE)->where("{$table}.sub_mission_id",$sub_mission_id)->get($table)->num_rows();
	}
	return  $no;
}
function CloseNotification($table)
{

	global $CI;
	$CI = get_instance();
	// SUb
	if ($CI->uri->segment(4)) {
		$sub_mission_id = $CI->uri->segment(4);
	} else {
		$sub_mission_id = 0;
	}
	// sub
	$user_id = $CI->session->userdata('admin_id');
	$role_id = $CI->session->userdata('role_id');
	if ($role_id == 1) {
		$where  = "read_admin = 0 AND is_close = 1";
		return  $CI->db->select('id')->where("($where)", NULL, FALSE)->where("{$table}.sub_mission_id", $sub_mission_id)->get($table)->num_rows();
	} else if (in_array($CI->session->userdata('admin_id'), getFileManager())) {
		$where  = "c_case.manager_id=$user_id AND {$table}.is_close = 1 AND {$table}.status = 0 AND {$table}.read_manager =0";
	} else {
		if (in_array($CI->session->userdata('admin_id'), getFileManager())) {
			$where  = "c_case.manager_id=$user_id AND {$table}.is_close = 1 AND {$table}.status = 0 AND {$table}.read_manager = 0 ";
		} else {
			$where  = "({$table}.follow_up_employee = $user_id OR {$table}.responsible_employee = $user_id) AND {$table}.is_close = 1 AND {$table}.status = 0 AND ({$table}.read_follow = 0 OR {$table}.read_response = 0)";
		}
	}
	return  $CI->db->select("$table.*,c_case.id as case_id")
		->join('c_case', "c_case.id = {$table}.case_id", 'left')
		->where("($where)", NULL, FALSE)->where("{$table}.sub_mission_id", $sub_mission_id)
		->get($table)
		->num_rows();
}
function PendingNotification($table)
{
	global $CI;
	$CI = get_instance();
	// SUb
	if ($CI->uri->segment(4)) {
		$sub_mission_id = $CI->uri->segment(4);
	} else {
		$sub_mission_id = 0;
	}
	// sub

	$user_id = $CI->session->userdata('admin_id');
	$role_id = $CI->session->userdata('role_id');
	if ($role_id == 1) {
		$where  = "read_admin = 0 AND status = 1";
		return $no = $CI->db->select('id')->where("($where)", NULL, FALSE)->where("{$table}.sub_mission_id", $sub_mission_id)->get($table)->num_rows();
	} else {
		if (in_array($CI->session->userdata('admin_id'), getFileManager())) {
			$where  = "c_case.manager_id=$user_id AND {$table}.read_manager = 0 AND {$table}.status = 1";
		} else {
			$where  = "{$table}.user_id = $user_id AND ({$table}.read_follow = 0 OR {$table}.read_response = 0) AND {$table}.status = 1";
		}

		return  $CI->db->select("$table.*,c_case.id as case_id")
			->join('c_case', "c_case.id = {$table}.case_id", 'left')
			->where("($where)", NULL, FALSE)->where("{$table}.sub_mission_id", $sub_mission_id)
			->get($table)
			->num_rows();
	}
}
function ReviewNotification($table)
{
	global $CI;
	$CI = get_instance();
	// SUb
	if ($CI->uri->segment(4)) {
		$sub_mission_id = $CI->uri->segment(4);
	} else {
		$sub_mission_id = 0;
	}
	// sub

	$user_id = $CI->session->userdata('admin_id');
	$role_id = $CI->session->userdata('role_id');
	if ($role_id == 1) {
		$where  = "read_admin = 0 AND on_review = 1";
		$no = $CI->db->select('id')->where("($where)", NULL, FALSE)->where("{$table}.sub_mission_id", $sub_mission_id)->get($table)->num_rows();
	} else if (in_array($CI->session->userdata('admin_id'), getFileManager())) {
		$where  = "c_case.manager_id=$user_id AND {$table}.on_review = 1 AND {$table}.read_manager =0";
		return $CI->db->select("$table.*,c_case.id as case_id")
			->join('c_case', "c_case.id = {$table}.case_id", 'left')
			->where("($where)", NULL, FALSE)->where("{$table}.sub_mission_id", $sub_mission_id)
			->get($table)
			->num_rows();
	} else {
		$where  = "(user_id = $user_id or responsible_employee = $user_id)  AND (read_follow = 0 OR read_response = 0) AND on_review = 1";
		$no = $CI->db->select('id')->where("($where)", NULL, FALSE)->where("{$table}.sub_mission_id", $sub_mission_id)->get($table)->num_rows();
	}
	return  $no;
}
function caseRejectNotification()
{
	global $CI;
	$CI = get_instance();
	return $CI->db->select('id')->where(['is_reject' => 1, 'is_read' => 0])->get('case_temp')->num_rows();
	return  $no;
}
function caseOpponentNotification()
{
	global $CI;
	$CI = get_instance();
	return $CI->db->select('id')->where("(opponent_full_name != ''  AND is_read = 0)", NULL, FALSE)->get('c_case')->num_rows();
}
function casePendingNotification()
{
	global $CI;
	$CI = get_instance();
	return $CI->db->select('id')->where(['is_reject' => 0, 'is_read' => 0])->get('case_temp')->num_rows();
}
function userNotification()
{
	global $CI;
	$CI = get_instance();
	return $CI->db->select('id')->where(['role_id' => 3, 'is_read' => 0])->get('users')->num_rows();
}

function newCustomerNotification()
{
	global $CI;
	$CI = get_instance();
	if ($CI->session->userdata('role_id') == 1) {
		return $CI->db->select('id')->where(['is_read' => 0])->get('customers')->num_rows();
	} else {
		return $CI->db->select('id')->where(['is_read' => 0, 'user_id' => $CI->session->userdata('admin_id')])->get('customers')->num_rows();
	}
}
function getFileManager()
{
	global $CI;
	$CI = get_instance();
	$data =  $CI->db->select('user_id')->get('customers')->result_array();

	foreach ($data as $row) {
		$my_values[] = $row['user_id'];
	}
	return $my_values;
}

function getHrEserviceName($eid)
{
	global $CI;
	$CI = get_instance();
	if ($eid == '') {
		return '-';
	}
	$emp = $CI->db->select('*')->where('id', $eid)->get('hr_eservice_type')->row();
	return  $emp->name;
}

function consultation_type($eid)
{
	global $CI;
	$CI = get_instance();
	if ($eid == '') {
		return "-";
	}
	$emp = $CI->db->select('*')->where('id', $eid)->get('consultation_type')->row();
	return  $emp->name;
}

function general_type($eid)
{
	global $CI;
	$CI = get_instance();
	if ($eid == '') {
		return "-";
	}
	$emp = $CI->db->select('*')->where('id', $eid)->get('task_type')->row();
	return  $emp->name;
}
function getCustomerLists()
{
	global $CI;
	$CI = get_instance();
	$getCustomerLists = $CI->db->select(['user_id'])->order_by("id", "desc")->get('customers')->result_array();
	foreach ($getCustomerLists as $list_customer) {
		$lsc[] = $list_customer['user_id'];
	}
	return  $lsc;
}

function getGroupList()
{
	global $CI;
	$CI = get_instance();
	$group = $CI->db->select('*')->get('employee_group')->result_array();
	return  $group;
}

function gtCourtList()
{
	global $CI;
	$CI = get_instance();
	$gtCourtList = $CI->db->select('*')->get('court_master')->result_array();
	return  $gtCourtList;
}
function gtCourtName($id)
{
	global $CI;
	if ($id == '' || $id == 0) {
		return false;
	}
	$emp = $CI->db->select('name')->where('id', $id)->get('court_master')->row();
	return  $emp->name;
}

function getDepartmentName($id)
{
	global $CI;
	if ($id == '' || $id == 0) {
		return false;
	}
	$emp = $CI->db->select('d_name')->where('id', $id)->get('department')->row();
	return  $emp->d_name;
}

function getProjectTypeName($id)
{
	global $CI;
	if ($id == '' || $id == 0) {
		return false;
	}
	$emp = $CI->db->select('name')->where('id', $id)->get('project_type')->row();
	return  $emp->name;
}
function getProjectList()
{
	global $CI;
	$CI = get_instance();
	$group = $CI->db->select('*')->get('project_type')->result_array();
	return  $group;
}

function getJudicialCircuit()
{
	global $CI;
	$CI = get_instance();
	$group = $CI->db->select('judicial_circuit')->get('court_master')->result_array();
	return  $group;
}
function getJudicialCircuitByID($id)
{
	global $CI;
	if ($id == '' || $id == 0) {
		return false;
	}
	$emp = $CI->db->select('judicial_circuit')->where('id', $id)->get('court_master')->row();
	return  $emp->judicial_circuit;
}
function getHrEservice_list()
{
	global $CI;
	$CI = get_instance();
	$branch = $CI->db->select('*')->get('hr_eservice_type')->result_array();
	return  $branch;
}

function getJudgeList()
{
	global $CI;
	$CI = get_instance();
	$judge_master = $CI->db->order_by('id', 'DESC')->get_where('judge_master', ['is_delete' => 0])->result_array();
	return  $judge_master;
}
function getFine_list()
{
	global $CI;
	$CI = get_instance();
	$branch = $CI->db->select('*')->get('fine_type')->result_array();
	return  $branch;
}
function getBranchName($id)
{
	global $CI;
	$CI = get_instance();
	if ($id == '') {
		return false;
	}
	$branch = $CI->db->select('name')->where('id', $id)->get('branches')->row();
	return  $branch->name;
}
function getCaseIdByDocId($id)
{
	global $CI;
	$CI = get_instance();
	if ($id == '') {
		return false;
	}
	$branch = $CI->db->select('*')->where('doc_id', $id)->get('c_case')->row();
	if ($branch) {
		return  $branch->id;
	} else {
		return false;
	}
}
function branch()
{
	global $CI;
	$CI = get_instance();
	$branch = $CI->db->select('*')->get('branches')->result_array();
	return  $branch;
}
function getServiceName($id)
{
	global $CI;
	$CI = get_instance();
	if ($id == '') {
		return false;
	}
	$branch = $CI->db->select('name')->where('id', $id)->get('services')->row();
	return  $branch->name;
}

function getServiceType($id)
{
	global $CI;
	$CI = get_instance();
	if ($id == '') {
		return false;
	}
	$branch = $CI->db->select('name')->where('id', $id)->get('services')->row();
	return  $branch->name;
}
function services_list()
{
	global $CI;
	$CI = get_instance();
	$branch = $CI->db->select('*')->get('services')->result_array();
	return  $branch;
}
function employee_type()
{
	global $CI;
	$CI = get_instance();
	$employee_type = $CI->db->select('*')->get('employee_type')->result_array();
	return  $employee_type;
}
function getConsultationType()
{
	global $CI;
	$CI = get_instance();
	$consultation_type = $CI->db->select('*')->get('consultation_type')->result_array();
	return  $consultation_type;
}

function getWritingType()
{
	global $CI;
	$CI = get_instance();
	$writing_type = $CI->db->select('*')->get('writing_type')->result_array();
	return  $writing_type;
}

function check_block($id)
{
	global $CI;
	$CI = get_instance();
	if ($id == '') {
		return false;
	}
	$check_block = $CI->db->select('status')->where('id', $id)->get('users')->row();
	if ($check_block->status == 0) {
		return  "true";
	} else {
		return  "false";
	}
}
function getStateByID($id)
{
	global $CI;
	$CI = get_instance();
	$emp = $CI->db->select('name')->where('id', $id)->get('states')->row();
	return  $emp->name;
}

function getCityByID($id)
{
	global $CI;
	$CI = get_instance();
	if ($id == '') {
		return false;
	}
	$emp = $CI->db->select('name')->where('id', $id)->get('cities')->row();
	return  $emp->name;
}

function getExpenseTotal($id)
{
	global $CI;
	$CI = get_instance();
	$expensetotal = 0;
	$expense = $CI->db->select('expenses_amount')->where('expense_id', $id)->get('expense_details')->result_array();
	foreach ($expense as $ext) {
		$expensetotal += $ext['expenses_amount'];
	}
	return  $expensetotal;
}

function cal_total($total, $val)
{
	$subtotal = $total / $val;
	$total = $subtotal * 5 / 100;
	$total = $subtotal + $total;
	$totaldata['subtotal'] = number_format((float)$subtotal, 2, '.', '');
	$totaldata['total'] = number_format((float)$total, 2, '.', '');
	return $totaldata;
}

function getMangerIdByCustomerId($id)
{
	global $CI;
	$CI = get_instance();
	$emp = $CI->db->select('user_id')->where('id', $id)->get('customers')->row();
	return  $emp->user_id;
}
function getCaseNumberById($id)
{
	global $CI;
	$CI = get_instance();
	if ($id == '') {
		return false;
	}
	$emp = $CI->db->select('case_number')->where('id', $id)->get('c_case')->row();
	return  $emp->case_number;
}
function getGroupByID($id)
{
	global $CI;
	$CI = get_instance();
	if ($id == '') {
		return false;
	}
	$emp = $CI->db->select('employee_name')->where('id', $id)->get('employee_group')->row();
	return  json_decode($emp->employee_name);
}
