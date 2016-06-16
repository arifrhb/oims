<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Get Filenames by Extension
 *
 * Reads the specified directory and builds an array containing the filenames.  
 * Any sub-folders contained within the specified path are read as well.
 *
 * @access	public
 * @param	string	path to source
 * @param	array	array of file types to include in results
 * @param	bool	whether to include the path as part of the filename
 * @param	bool	internal variable to determine recursion status - do not use in calls
 * @return	array
 */	

function send_sms($to, $msg)
{
	$user = "sbkchh";
	$password =  "123@sbkchh.sk";  
	$sender = "MSC-CSE-14";
	$baseurl ="http://app.planetgroupbd.com";

	// if(isset($_POST['submit'])){ //if post start
		// $to='8801911434979';				
		 // $msg = 'ami nai';
		$text = urlencode($msg);
		
		// while ($row = mysql_fetch_array($result)) {

		// 	echo $row[0];
				
		// 	//$to = $_POST['recipient'];
		// 	$to = $row[0];
		// 	//$url = "$baseurl/api/sendsms/plain?user=$user&password=$password&sender=$sender&SMSText=$text&GSM=$to";
			$simpleSMS = "$baseurl/api/sendsms/plain?user=$user&password=$password&SMSText=$text&GSM=$to";
			$unicodeSMS = "$baseurl/api/v3/sendsms/plain?user=$user&password=$password&sender=$sender&text=$text&GSM=$to&datacoding=8";
				
			// do auth call
			$retrun = file($unicodeSMS);
			//echo $simpleSMS;
			//SMS send complete   
				
			// echo "<br>Send ok...<br>";
	// 	}
	
	// } //Post end
}



/* End of file MY_file_helper.php */
/* Location: ./application/helpers/MY_file_helper.php */