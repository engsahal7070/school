<?php
require "supabase.php";

if ($_POST) {
    $data = [
        "name" => $_POST['name'],
        "class" => $_POST['class']
    ];

    supabase_insert("students", $data);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-5">
    <div class="max-w-md mx-auto bg-white p-5 shadow rounded">
        <h1 class="text-xl font-bold mb-4">Add Student</h1>

        <form method="POST">
            <label>Name</label>
            <input type="text" name="name" class="w-full p-2 border rounded mb-3" required>

            <label>Class</label>
            <input type="text" name="class" class="w-full p-2 border rounded mb-3" required>

            <button class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
</body>
</html>
