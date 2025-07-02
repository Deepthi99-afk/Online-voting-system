<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voter_id = $_POST['voter_id'];
    $candidate_id = $_POST['candidate_id'];

    // Check if voter has already voted
    $check = $conn->prepare("SELECT * FROM votes WHERE voter_id = ?");
    if(!$check){
               die("Prepare failed:".$conn->error);}
    $check->bind_param("s", $voter_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "You have already voted!";
    } else {
        // Insert vote
        $stmt = $conn->prepare("INSERT INTO votes (voter_id, candidate_id) VALUES (?, ?)");
        $stmt->bind_param("si", $voter_id, $candidate_id);
        if ($stmt->execute()) {
            echo "Your vote has been submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>