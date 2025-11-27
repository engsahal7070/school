<?php
require "supabase.php";

$id = $_GET['id'];
supabase_delete("students", $id);

header("Location: index.php");
