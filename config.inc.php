<?php
// $db_host     = '127.0.0.1';
// $db_user     = 'root';
// $db_pwd      = '';
// $AUwebservice_db = 'webservicetest';
$servicetype = "test"; //TEST REAL
$db_host     = 'localhost';
$db_user     = 'yqchuavjhs';
$db_pwd      = 'uu6TbQzfW2';
$AUwebservice_db = 'yqchuavjhs';

$brands_id   = "60dd43662cffaa001805ce56";
$register_page = "https://m.lucabetasia.co/login?action=register";
$checkuser_api_url = "https://dev-api-x.apinode.xyz/check-user";
$playerauth_api_url = "https://dev-api-x.apinode.xyz/players-auth";
$receive_api_url = "https://dev-api-x.apinode.xyz/receive-event";

function playerauth_api($url,$username,$password,$brands_id){
	if(function_exists('curl_init')){
		$agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json' ));
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,json_encode(array("username" => "$username", "password" => "$password", "brands_id" => "$brands_id")));
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_HEADER, FALSE);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($curl, CURLOPT_USERAGENT, $agent);
		$curl_content = curl_exec($curl);
		curl_close($curl);
		return $curl_content;
	}else{
		return false;
	}
}

function checkuser_api($url,$username,$bearertoken){
	if(function_exists('curl_init')){
		$agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
		$curl = curl_init($url.'?username=' .$username);
		$authorization = "Authorization: Bearer ".$bearertoken; // Prepare the authorisation token
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization )); // Inject the token into the header
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		curl_setopt($curl, CURLOPT_POST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_HEADER, FALSE);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($curl, CURLOPT_USERAGENT, $agent);
		$curl_content = curl_exec($curl);
		curl_close($curl);
		return $curl_content;
	}else{
		return false;
	}
}

function receive_api($url,$playerGame,$brands_id,$bearertoken){
	if(function_exists('curl_init')){
		$agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
		$curl = curl_init($url);
		$authorization = "Authorization: Bearer ".$bearertoken; // Prepare the authorisation token
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization )); // Inject the token into the header
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS,json_encode(array("account_api" => "$playerGame", "brands_id" => "$brands_id")));
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_HEADER, FALSE);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($curl, CURLOPT_USERAGENT, $agent);
		$curl_content = curl_exec($curl);
		curl_close($curl);
		return $curl_content;
	}else{
		return false;
	}
}

function json_validate($string)
{
    // decode the JSON data
    $result = json_decode($string);

    // switch and check possible JSON errors
    switch (json_last_error()) {
        case JSON_ERROR_NONE:
            $error = ''; // JSON is valid // No error has occurred
            break;
        case JSON_ERROR_DEPTH:
            $error = 'The maximum stack depth has been exceeded.';
            break;
        case JSON_ERROR_STATE_MISMATCH:
            $error = 'Invalid or malformed JSON.';
            break;
        case JSON_ERROR_CTRL_CHAR:
            $error = 'Control character error, possibly incorrectly encoded.';
            break;
        case JSON_ERROR_SYNTAX:
            $error = 'Syntax error, malformed JSON.';
            break;
        // PHP >= 5.3.3
        case JSON_ERROR_UTF8:
            $error = 'Malformed UTF-8 characters, possibly incorrectly encoded.';
            break;
        // PHP >= 5.5.0
        case JSON_ERROR_RECURSION:
            $error = 'One or more recursive references in the value to be encoded.';
            break;
        // PHP >= 5.5.0
        case JSON_ERROR_INF_OR_NAN:
            $error = 'One or more NAN or INF values in the value to be encoded.';
            break;
        case JSON_ERROR_UNSUPPORTED_TYPE:
            $error = 'A value of a type that cannot be encoded was given.';
            break;
        default:
            $error = 'Unknown JSON error occured.';
            break;
    }

    if (!empty($error)) {
		$m ="[".date('Y-m-d H:i:s')."] $error\r\n";
		$m .= "[".date('Y-m-d H:i:s')."] $string";
		$new = @fopen("json_errorlog.txt","a");
		@fputs($new,"$m\r\n");
		@fclose($new);
        $result = json_decode(json_encode(array("status" => "2", "msg" => "$error")));
    }

    // everything is OK
    return $result;
}

function misc_parsestring($text,$allowchr='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
	if(empty($allowchr))
	$allowchr = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	if(empty($text)) return FALSE;
	$size = strlen($text);
	for($i=0; $i < $size; $i++) {
		$tmpchr = substr($text, $i , 1);
		if(strpos($allowchr,$tmpchr) === FALSE) 
		return FALSE;
	}
	return TRUE;
}

$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");  
$thai_month_arr=array(  
    "0"=>"",  
    "1"=>"มกราคม",  
    "2"=>"กุมภาพันธ์",  
    "3"=>"มีนาคม",  
    "4"=>"เมษายน",  
    "5"=>"พฤษภาคม",  
    "6"=>"มิถุนายน",   
    "7"=>"กรกฎาคม",  
    "8"=>"สิงหาคม",  
    "9"=>"กันยายน",  
    "10"=>"ตุลาคม",  
    "11"=>"พฤศจิกายน",  
    "12"=>"ธันวาคม"                    
);
$thai_month_arr_mini=array(  
	"0"=>"",  
    "1"=>"ม.ค.",  
    "2"=>"ก.พ.",  
    "3"=>"มี.ค.",  
    "4"=>"เม.ย.",  
    "5"=>"พ.ค.",  
    "6"=>"มิ.ย.",   
    "7"=>"ก.ค.",  
    "8"=>"ส.ค.",  
    "9"=>"ก.ย.",  
    "10"=>"ต.ค.",  
    "11"=>"พ.ย.",  
    "12"=>"ธ.ค."
);
function thai_date($time){  
    global $thai_day_arr,$thai_month_arr; 
	$time=strtotime($time);
    $thai_date_return="";  
    $thai_date_return.= date("j",$time);  
    $thai_date_return.=" ".$thai_month_arr[date("n",$time)];  
    $thai_date_return.= " พ.ศ. ".(date("Y",$time)+543);  
    //$thai_date_return.= "  ".date("H:i",$time)." น.";  
    return $thai_date_return;  
}
function thai_date_mini($time){  
    global $thai_month_arr_mini;
	$time=strtotime($time);
    $thai_date_return = date("j",$time)." ";  
    $thai_date_return.= $thai_month_arr_mini[date("n",$time)]." ";  
    $thai_date_return.= (date("Y",$time)+543);
    return $thai_date_return;  
}
?>