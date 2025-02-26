<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data['student_id'];
$subject = $data['subject'];
$marks = $data['marks'];


$conn = new mysqli('localhost', 'root', '', 'student_management');

if ($conn->connect_error) {
    die(json_encode(["message" => "Connection failed: " . $conn->connect_error]));
}

$sql = "INSERT INTO results (student_id, subject, marks) VALUES ('$student_id', '$subject', '$marks')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Result added successfully"]);
} else {
    echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]);
}

$conn->close();
?>
