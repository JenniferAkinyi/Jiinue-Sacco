<?php

$dbhost = "localhost";  
$dbuser = "root";  
$dbpassword = '';  
$dbname = "jiinueyouthsacco";  
      
$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);


if(!$conn){
    die("Connection failed:". mysqli_connect_error());
} 
   
if(isset($_POST['submit'])){

date_default_timezone_set('Africa/Nairobi');

  # access_token
  $consumerKey = 'smLRi4BzbFAlPEx7Yo4f0YvjCz3A53AB'; //Fill with your app Consumer Key
  $consumerSecret = 'br85bS4yqm25W5A0'; // Fill with your app Secret

  # define the variables
  # provide the following details, this part is found on your test credentials on the developer account
  $BusinessShortCode = '174379';
  $Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';  
  
  /*
    This are your info, for
    $PartyA should be the ACTUAL clients phone number or your phone number, format 2547********
    $AccountRefference, it maybe invoice number, account number etc on production systems, but for test just put anything
    TransactionDesc can be anything, probably a better description of or the transaction
    $Amount this is the total invoiced amount, Any amount here will be 
    actually deducted from a clients side/your test phone number once the PIN has been entered to authorize the transaction. 
    for developer/test accounts, this money will be reversed automatically by midnight.
  */
  
   $PartyA = $_POST['phone']; // This is your phone number, 
  $AccountReference = 'JIINUE YOUTH SACCO';
  $TransactionDesc = 'Test Payment';
  $Amount = $_POST['amount'];
  $customer_id='customer_id'; // Replace 1234 with the actual customer ID

 
  # Get the timestamp, format YYYYmmddhms -> 20181004151020
   $Timestamp = date('YmdHis', time());
   $date = date('Y-m-d H:i:s', $Timestamp);

  
  # Get the base64 encoded string -> $password. The passkey is the M-PESA Public Key
  $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);

  # header for access token
  $headers = ['Content-Type:application/json; charset=utf8'];

    # M-PESA endpoint urls
 $access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
 $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

 # callback url
  $CallBackURL = 'https://morning-basin-87523.herokuapp.com/callback_url.php';  

  $curl = curl_init($access_token_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($curl, CURLOPT_HEADER, FALSE);
  curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
  $result = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $result = json_decode($result);
  $access_token = $result->access_token;  
  curl_close($curl);

  # header for stk push
  $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];

  # initiating the transaction
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $initiate_url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header

  $curl_post_data = array(
    //Fill in the request parameters with valid values
    'BusinessShortCode' => $BusinessShortCode,
    'Password' => $Password,
    'Timestamp' => $Timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $BusinessShortCode,
    'PhoneNumber' => $PartyA,
    'CallBackURL' => $CallBackURL,
    'AccountReference' => $AccountReference,
    'TransactionDesc' => $TransactionDesc
  );

  $data_string = json_encode($curl_post_data);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  $curl_response = curl_exec($curl);
  print_r($curl_response);

  echo $curl_response;
 $sql = "INSERT INTO payment (PHONE_NUMBER, AMOUNT, DATE_OF_TRANSACTION) VALUES ('$PartyA', '$Amount', '$date')";
$result = mysqli_query($conn, $sql);
if(!$result)
{
    echo "Error: " . mysqli_error($conn);
} else {
  $update_sql = "UPDATE payment SET CUSTOMER_ID='$customer_id' WHERE ID='$customer_id'";
    $update_sql = "UPDATE payment SET PHONE_NUMBER='$PartyA', AMOUNT='$Amount', DATE_OF_TRANSACTION='$date' WHERE CUSTOMER_ID='$customer_id'";
    $update_result = mysqli_query($conn, $update_sql);
    if (!$update_result) {
        echo "Error: " . mysqli_error($conn);
    }
}

}
?>

