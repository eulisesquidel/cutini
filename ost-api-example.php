<?php
#
# Configuration: Enter the url and key. That is it.
#  url => to api/task/cron e.g #  http://yourdomain.com/support/api/tickets.json
#  key => API's Key (see admin panel on how to generate a key)
#  $data add custom required fields to the array.
#
#  Originally authored by jared@osTicket.com
#  Modified by ntozier@osTicket / tmib.net

// If 1, display things to debug.
$debug="0";

// You must configure the url and key in the array below.1
$config = array(
        'url'=>'http://172.16.161.251/osticket/api/http.php/tickets.json',  // URL to site.tld/api/tickets.json
		'key'=>'530114609E1CEE34AC9189DA691FF7EF'  // API Key goes here
);
# NOTE: some people have reported having to use "http://your.domain.tld/api/http.php/tickets.json" instead.

if($config['url'] <> 'http://localhost/osticket/api/http.php/tickets.json') {
  echo "<p style=\"color:red;\"><b>Error: No URL</b><br>You have not configured this script with your URL!</p>";
  echo "Please edit this file ".__FILE__." and add your URL at line 18.</p>";
  die();  
}		
if(IsNullOrEmptyString($config['key']) || ($config['key'] <> '7B26AFF8F1E1C2664EC80FE55692E2B1'))  {
  echo "<p style=\"color:red;\"><b>Error: No API Key</b><br>You have not configured this script with an API Key!</p>";
  echo "<p>Please log into osticket as an admin and navigate to: Admin panel -> Manage -> Api Keys then add a new API Key.<br>";
  echo "Once you have your key edit this file ".__FILE__." and add the key at line 19.</p>";
  die();
}
		
# Fill in the data for the new ticket, this will likely come from $_POST.
# NOTE: your variable names in osT are case sensiTive. 
# So when adding custom lists or fields make sure you use the same case
# For examples on how to do that see Agency and Site below.
$data = array(
    'name'      	=>      '',  // Campo "Apellido y Nombre" del form
    'email'     	=>      '',  // Campo "Email" del form
	'modulogde'		=>		'',  // Campo "Sistema" del form  // 8: EE; 9: CCOO; 10: GEDO; 11: EU
	'usuariogde'	=>		'',  // Campo "Usuario GDE" del form
	'reparticion'	=>		'',  // Campo "Reparticion" del form
	'phone' 		=>		'',  // Campo "Teléfono" del form
	'priority' 		=>		'',  // 1: Low; 2: Normal; 3: High; 4:Emergency
    'subject'   	=>      '',  // Campo "Tema" del form
    'message'   	=>      '',  // Campo "Detalle" del form
    'ip'        	=>      $_SERVER['REMOTE_ADDR'], // Should be IP address of the machine thats trying to open the ticket.
	'source'    	=> 		'API'

    //'attachments' => array() // adjuntos
);

# more fields are available and are documented at:
# https://github.com/osTicket/osTicket-1.8/blob/develop/setup/doc/api/tickets.md


# Add in attachments here if necessary
# Note: there is something with this wrong with the file attachment here it does not work.
//$data['attachments'][] =
//array('file.txt' =>
//        'data:text/plain;base64;'
//            .base64_encode(file_get_contents('/file.txt')));  // replace ./file.txt with /path/to/your/test/filename.txt
 

#pre-checks
function_exists('curl_version') or die('CURL support required');
function_exists('json_encode') or die('JSON support required');

#set timeout
set_time_limit(30);

#curl post
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $config['url']);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_USERAGENT, 'osTicket API Client v1.8');
curl_setopt($ch, CURLOPT_HEADER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Expect:', 'X-API-Key: '.$config['key']));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$result=curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($code != 201)
    die('Unable to create ticket: '.$result);

$ticket_id = (int) $result;

# Continue onward here if necessary. $ticket_id has the ID number of the
# newly-created ticket

function IsNullOrEmptyString($question){
    return (!isset($question) || trim($question)==='');
}
?>
