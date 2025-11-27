<?php
require "supabase.php";
$students = supabase_get("students");
?>
<!DOCTYPE html>
<html>
<head>
    <title>School Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-5">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Students List</h1>

        <a href="add.php" class="bg-blue-600 text-white px-4 py-2 rounded">Add Student</a>

        <table class="w-full mt-4 bg-white shadow rounded">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2">ID</th>
                    <th class="p-2">Name</th>
                    <th class="p-2">Class</th>
                    <th class="p-2">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($students as $s): ?>
                <tr class="border-b">
                    <td class="p-2"><?= $s['id'] ?></td>
                    <td class="p-2"><?= $s['name'] ?></td>
                    <td class="p-2"><?= $s['class'] ?></td>
                    <td class="p-2">
                        <a href="delete.php?id=<?= $s['id'] ?>" class="text-red-600">Delete</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>
