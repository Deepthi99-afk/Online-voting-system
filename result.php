<<!DOCTYPE html>
<html>
<head>
    <title>Voting Results</title>
</head>
<body>
<?php
include 'db.php'; // Make sure db.php sets up $conn correctly

$sql = "SELECT candidates.name, COUNT(votes.id) AS vote_count
        FROM candidates
        LEFT JOIN votes ON candidates.id = votes.candidate_id
        GROUP BY candidates.id";

// ✅ Check for SQL errors
$result = $conn->query($sql);
if (!$result) {
    die("<strong>Query Failed:</strong> " . $conn->error);
}

// ✅ Display result table
echo "<h2>Voting Results</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Candidate</th><th>Votes</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row['name'] . "</td><td>" . $row['vote_count'] . "</td></tr>";
}
echo "</table>";
?>
</body>
</html>