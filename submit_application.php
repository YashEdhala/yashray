<?php
// Include database connection (if needed)
include('db.php');

// Function to handle file uploads
function handleFileUpload($file, $targetDir) {
    // Get the file name, extension, and temp file path
    $fileName = basename($file['name']);
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // Define allowed file extensions
    $allowedExts = ['pdf', 'doc', 'docx'];
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Check for file upload errors
    if ($fileError === UPLOAD_ERR_OK) {
        // Check if file type is allowed
        if (in_array($fileExt, $allowedExts)) {
            // Generate a unique file name to avoid conflicts
            $newFileName = uniqid('', true) . '.' . $fileExt;
            $targetFilePath = $targetDir . $newFileName;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($fileTmpName, $targetFilePath)) {
                return $newFileName; // Return the new file name
            } else {
                return false; // Error moving file
            }
        } else {
            return false; // Invalid file type
        }
    }
    return false; // File upload error
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $jobCategory = $_POST['jobCategory'];
    
    // Define directory to store uploaded files
    $uploadDir = 'uploads/'; // Change this to the directory where you want to store the files

    // Handle file uploads
    $cvFileName = handleFileUpload($_FILES['cv'], $uploadDir);
    $coverLetterFileName = handleFileUpload($_FILES['coverLetter'], $uploadDir);

    // Check if files were uploaded successfully
    if ($cvFileName && $coverLetterFileName) {
        // Insert data into database (assuming you have a table `applications` in your DB)
        $sql = "INSERT INTO applications (job_category, cv_file, cover_letter_file) 
                VALUES ('$jobCategory', '$cvFileName', '$coverLetterFileName')";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            header("Location: job_recommendations.php?category=" . urlencode($jobCategory));
        exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "There was an error uploading your files. Please try again.";
    }
}

?>
