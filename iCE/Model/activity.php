<?php
function log_db_errors($error, $userId){
 $stmt = $conn->prepare("INSERT INTO activity(error, userId) VALUES(:error, :userId) where userId =:userId");
 $stmt->bindparam(":userId", $userId);
 $stmt->bindparam(":error", $error);
 if($stmt->execute()){
   return true;
 }else{
   return false;
 }

}




























 function log_db_errors( $error, $query, $severity )
{
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'To: Admin <'.SEND_ERRORS_TO.'>' . "\r\n";
    $headers .= 'From: Yoursite <system@your-site.com>' . "\r\n";

    $message = '<p>An error has occurred:</p>';

    $message .= '<p>Error at '. date('Y-m-d H:i:s').': ';
    $message .= 'Query: '. htmlentities( $query ).'<br />';
    $message .= '</p>';
    $message .= '<p>Severity: '. $severity .'</p>';

    mail( SEND_ERRORS_TO, 'Database Error', $message, $headers);

    if( DISPLAY_DEBUG )
    {
        echo $message;
    }
}
