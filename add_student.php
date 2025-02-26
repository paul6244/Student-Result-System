<?php
$data = json_decode(file_get_contents("php://input"), true);
$name = $data['name'];
$roll_number = $data['roll_number'];

$conn = new mysqli('localhost', 'root', '', 'student_management');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO students (name, roll_number) VALUES ('$name', '$roll_number')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Student added successfully"]);
} else {
    echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]);
}

$conn->close();
?>
