<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASSSSUUUUUUUUU</title>
    <?= $this->include('layouts/import'); ?>
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

        tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        tbody tr:nth-child(even) {
            background-color: #fdfdfd;
        }

        ::-webkit-scrollbar {
            width: 2px;
            height: 3px;
        }

        ::-webkit-scrollbar-track {
            border-radius: 10;
            background: #fff;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 0;
            background: #92c4fe;
        }
    </style>
</head>

<body class="flex overflow-hidden">
    <?= $this->include('components/sidebar'); ?>
    <main class="grow overflow-x-auto px-4 py-1">
        <!-- <header class="w-full h-[52px] shadow-sm flex items-center rounded-md bg-[#FAF6F0]">
            something
        </header> -->