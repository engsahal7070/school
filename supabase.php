<?php
// supabase.php

$supabase_url = "https://dfhufqxviugzhyncqrxn.supabase.co";
$supabase_key = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImRmaHVmcXh2aXVnemh5bmNxcnhuIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NjQyMjcyMTksImV4cCI6MjA3OTgwMzIxOX0.GSlCGgIR3I-xcOkphPXjJZORLjRUxqnuulMJ0u-5Kz8";

function supabase_get($table) {
    global $supabase_url, $supabase_key;

    $ch = curl_init("$supabase_url/rest/v1/$table?select=*");
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "apikey: $supabase_key",
        "Authorization: Bearer $supabase_key"
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    return json_decode(curl_exec($ch), true);
}

function supabase_insert($table, $data) {
    global $supabase_url, $supabase_key;

    $ch = curl_init("$supabase_url/rest/v1/$table");
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "apikey: $supabase_key",
        "Authorization: Bearer $supabase_key",
        "Content-Type: application/json",
        "Prefer: return=minimal"
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    return curl_exec($ch);
}

function supabase_delete($table, $id) {
    global $supabase_url, $supabase_key;

    $ch = curl_init("$supabase_url/rest/v1/$table?id=eq.$id");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "apikey: $supabase_key",
        "Authorization: Bearer $supabase_key"
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    return curl_exec($ch);
}
