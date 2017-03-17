<?php
function log_db_errors($error, $userId)
{
    $stmt = $conn->prepare("INSERT INTO activity(error, userId) VALUES(:error, :userId) where userId =:userId");
    $stmt->bindparam(":userId", $userId);
    $stmt->bindparam(":error", $error);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

}
