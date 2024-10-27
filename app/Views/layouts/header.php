<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
    <link href="<?= base_url('styles/style.css'); ?>" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-500 text-gray-900 font-sans">
    <header class="bg-blue-600 text-white shadow">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold"><a href="<?= base_url('/'); ?>">My Project</a></h1>
            <nav>
                <a href="<?= base_url('auth/login'); ?>" class="text-white px-4">Login</a>
                <a href="<?= base_url('auth/logout'); ?>" class="text-white px-4">Logout</a>
            </nav>
        </div>
    </header>
    <main class="container mx-auto mt-5 p-4">
