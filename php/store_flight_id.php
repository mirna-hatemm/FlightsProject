<?php
session_start();

if (isset($_POST['flight_id'])) {
    $_SESSION['selected_flight_id'] = $_POST['flight_id'];
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Flight ID not provided']);
}
?>
