<?php
/**
 * Created by PhpStorm.
 * User: razak
 * Date: 3/17/2017
 * Time: 2:42 AM
 */

include "../Model/activity.php";


log_activity('', $_SESSION['user_id']);


/**
 * This method automatically log errors
 * @param $error
 * @param $userID
 */
function log_activity($error, $userID)
{
    if (log_db_errors($error, $userID)) {
        echo 'true';
    } else {
        echo 'false';
    }
}