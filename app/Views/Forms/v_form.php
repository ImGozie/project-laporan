<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?= base_url('js/tailwindConfig.js') ?>"></script>
    <link href="<?= base_url('styles/select2.css') ?>" rel="stylesheet" />
    <!-- new cdn -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        main {
            font-family: "Poppins", sans-serif;
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

<body>
    <main class="flex flex-col items-center justify-center">
        <header class="flex gap-3 flex-col w-[640px] p-2">
            <div class="flex justify-between bg-gozi-50 grow p-4 rounded-lg border-[1px]">
                <div class="flex gap-6 items-center">
                    <img class="w-14 mix-blend-multiply object-contain image-rendering-crisp"
                        style="image-rendering: -webkit-optimize-contrast; image-rendering: crisp-edges;"
                        src="<?= base_url('assets/img/BKI-orange.jpg'); ?>" alt="BKI-Logo">
                    <div class="w-[1px] h-9 bg-gray-400"></div>
                    <h3 class="text-4xl text-gray-600 pt-3 max-w-1 tracking-tight leading-4 font-bold">BKI <span class="text-2xl">SKARIGA.</span></h3>
                </div>
                <div class="flex flex-col gap-2">
                    <a href="#" class="text-gray-500 flex gap-2 items-center">
                        <i class="fa-solid fa-phone"></i>
                        <h4 class="text-sm">0822-4581-8700</h4>
                    </a>
                    <a href="#" class="text-gray-500 flex gap-2 items-center">
                        <i class="fa-brands fa-facebook"></i>
                        <h4 class="text-sm">bkksmkpgri3malang</h4>
                    </a>
                    <a href="#" class="text-gray-500 flex gap-2 items-center">
                        <i class="fa-brands fa-instagram"></i>
                        <h4 class="text-sm">bkk_skariga</h4>
                    </a>
                </div>
            </div>
            <div class="bg-gozi-50 relative overflow-hidden grow p-8 rounded-lg border-[1px]">
                <div class="absolute left-0 top-0 w-full h-3 bg-gozi-500"></div>
                <h1 class="text-3xl font-semibold text-gray-600">PENELUSURAN ALUMNI SMK PGRI 3 MALANG LINTAS MASA</h1>
                <hr class="w-full bg-gray-600 my-4">
                <div class="flex items-center gap-2">
                    <span class="text-md font-medium text-gray-600">
                        <i class="fa-regular fa-envelope"></i>
                    </span>
                    <span class="text-md font-medium text-gray-600 truncate">
                        <?= session()->get('email'); ?>
                    </span>
                    <a href="#" class="mx-1 font-medium text-gozi-700 hover:text-gozi-500">Ganti akun</a>
                </div>
            </div>
        </header>
        <section class="flex gap-3 flex-col w-[640px] p-2">
            <div class="bg-white relative overflow-hidden grow p-8 rounded-lg border-[1px]">
                <div class="grid gap-2 grid-cols-2">
                    <div class="col-span-2">
                        <label for="nis" class="block mb-0.5 text-md text-gray-800 after:content-['*'] after:text-red-600 after:ml-0.5">NIS</label>
                        <input type="text" name="nis" id="nis" class="mt-6 w-1/2 bg-transparent border-b-[1px] py-2 text-md placeholder:font-light text-gray-600 focus:outline-none" placeholder="Masukkan NIS">
                    </div>
                </div>
            </div>
            <div class="bg-white relative overflow-hidden grow p-8 rounded-lg border-[1px]">
                <div class="col-span-2">
                    <label for="name" class="block mb-0.5 text-md text-gray-800 after:content-['*'] after:text-red-600 after:ml-0.5">Nama Lengkap Alumni</label>
                    <input type="text" name="name" id="name" class="mt-6 w-1/2 bg-transparent border-b-[1px] py-2 text-md placeholder:font-light text-gray-600 focus:outline-none" placeholder="Masukkan Nama Lengkap">
                </div>
            </div>
            <div class="bg-white relative overflow-hidden grow p-8 rounded-lg border-[1px]">
                <div class="col-span-2">
                    <label for="name" class="block mb-0.5 text-md text-gray-800 after:content-['*'] after:text-red-600 after:ml-0.5">Tahun lulus Alumni dari SMK PGRI 3 MALANG</label>
                    <input type="text" class="mt-6 w-1/2 bg-transparent border-b-[1px] py-2 text-md placeholder:font-light text-gray-600 focus:outline-none" placeholder="Masukkan data">
                </div>
            </div>
            <div class="bg-white relative overflow-hidden grow p-8 rounded-lg border-[1px]">
                <div class="col-span-2">
                    <label for="name" class="block mb-0.5 text-md text-gray-800 after:content-['*'] after:text-red-600 after:ml-0.5">Jurusan saat di SMK PGRI 3 Malang</label>
                    <div class="mt-6">
                        <select id="mySelect2" class="w-1/2"></select>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        $(document).ready(function () {
            $('#mySelect2').select2({
                ajax: {
                    url: '<?= site_url('jurusan/getjurusan'); ?>',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        console.log(data);
                        
                        return {
                            results: data
                        };
                    }
                },
                placeholder: 'Pilih Jurusan',
            });
        });
    </script>
</body>
</html>