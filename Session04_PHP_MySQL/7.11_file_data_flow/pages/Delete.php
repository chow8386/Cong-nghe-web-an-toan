<?php
session_start(); 

$filename = 'data/student.txt';

if (isset($_SESSION['students'])) {
    $students = $_SESSION['students'];

    if (isset($_GET['id'])) {
        $idToDelete = (int)$_GET['id'];

        if ($idToDelete >= 0 && $idToDelete < count($students)) {
            $fullnameToDelete = $students[$idToDelete]['fullname'];

            unset($students[$idToDelete]);

            $students = array_values($students);

            $file = fopen($filename, 'w');
            foreach ($students as $student) {
                fwrite($file, implode('|', $student) . "\n");
            }
            fclose($file);

            $_SESSION['students'] = $students;

            echo "<script>alert('Delete $fullnameToDelete successfully!')</script>";
        } else {
            echo "<script>alert('ID not found!')</script>";
        }
    }
} else {
    echo "<script>alert('No student data found!')</script>";
}
    header("Location: index.php?page=list");
?>
