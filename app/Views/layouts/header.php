<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
    <link href="<?= base_url('styles/style.css'); ?>" rel="stylesheet">
    <link href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css" rel="stylesheet">
<script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        main {
            font-family: "Poppins", sans-serif;
        }

        .icon-menu>.fa-solid {
            width: 20px;
            height: 20px;
            display: inline-block;
            font-size: 15px;
            line-height: 20px;
            text-align: center;
        }
    </style>
</head>

<body class="flex">
    <?= $this->include('components/sidebar'); ?>
    <main>