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

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out forwards;
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
                        <i class="fa-regular <?= session()->get('email') != '' ? 'fa-envelope' : 'fa-user' ?>"></i>
                    </span>
                    <span class="text-md font-medium text-gray-600 truncate">
                        <p><?= session()->get('email') != '' ? session()->get('email') : session()->get('username') ?></p>
                    </span>
                    <a href="<?= base_url('auth/logout') ?>" class="mx-1 font-medium text-gozi-700 hover:text-gozi-500">Ganti akun</a>
                </div>
            </div>
        </header>
        <form id="form-alumni" method="post">
            <div class="flex gap-3 flex-col w-[640px] p-2">
                <div id="success-card" class="hidden bg-white overflow-hidden grow p-8 rounded-lg border-[1px]">
                    <div class="relative flex flex-col items-center gap-4">
                        <img class="w-36 bg-blend-multiply" src="<?= base_url('assets/img/success-submitted.png'); ?>" alt="Random-Image">
                        <h1 class="text-xl font-semibold text-gray-400">Your response has been recorded</h1>
                    </div>
                </div>
            </div>
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
                        <label for="year" class="block mb-0.5 text-md text-gray-800 after:content-['*'] after:text-red-600 after:ml-0.5">Tahun lulus Alumni dari SMK PGRI 3 MALANG</label>
                        <div class="mt-6">
                            <select id="year" name="year" class="w-1/2"></select>
                        </div>
                    </div>
                </div>
                <div class="bg-white relative overflow-hidden grow p-8 rounded-lg border-[1px]">
                    <div class="col-span-2">
                        <label for="jurusan" class="block mb-0.5 text-md text-gray-800 after:content-['*'] after:text-red-600 after:ml-0.5">Jurusan saat di SMK PGRI 3 Malang</label>
                        <div class="mt-6">
                            <select id="jurusan" name="major" class="w-1/2"></select>
                        </div>
                    </div>
                </div>
                <div class="bg-white relative overflow-hidden grow p-8 rounded-lg border-[1px]">
                    <div class="col-span-2">
                        <label for="phone" class="block mb-0.5 text-md text-gray-800 after:content-['*'] after:text-red-600 after:ml-0.5">Nomor WA / Kontak HP</label>
                        <input type="text" name="phone" id="phone" class="mt-6 w-1/2 bg-transparent border-b-[1px] py-2 text-md placeholder:font-light text-gray-600 focus:outline-none" placeholder="Masukkan Nama Lengkap">
                    </div>
                </div>
                <div class="bg-white relative overflow-hidden grow p-8 rounded-lg border-[1px]">
                    <div class="col-span-2">
                        <label for="socialmedia" class="block mb-0.5 text-md text-gray-800 after:content-['*'] after:text-red-600 after:ml-0.5">Akun Sosial Media</label>
                        <input type="text" name="socialmedia" id="socialmedia" class="mt-6 w-1/2 bg-transparent border-b-[1px] py-2 text-md placeholder:font-light text-gray-600 focus:outline-none" placeholder="Masukkan Nama Lengkap">
                    </div>
                </div>
                <div class="bg-white relative overflow-hidden grow p-8 rounded-lg border-[1px]">
                    <div class="col-span-2">
                        <label for="name" class="block mb-0.5 text-md text-gray-800 after:content-['*'] after:text-red-600 after:ml-0.5">Status saat ini</label>
                        <div class="mt-6">
                            <select id="currentstatus" name="currentstatus" class="w-1/2"></select>
                        </div>
                    </div>
                </div>
                <div class="bg-white relative overflow-hidden grow p-8 rounded-lg border-[1px]">
                    <div class="col-span-2">
                        <label for="name" class="block mb-0.5 text-md text-gray-800">Mendapatkan informasi Pekerjaan dari mana ?</label>
                        <div class="mt-6">
                            <select id="jobinfo" name="jobinfo" class="w-1/2"></select>
                        </div>
                    </div>
                </div>
                <div class="bg-white relative overflow-hidden grow p-8 rounded-lg border-[1px]">
                    <div class="col-span-2">
                        <p class="block mb-0.5 text-md text-gray-800">Mendapatkan kerja saat ini melalui</p>
                        <div class="mt-8 flex flex-col gap-4">
                            <div class="flex items-center">
                                <input id="default-radio-1" type="radio" value="1" name="currentjob" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                                <label for="default-radio-1" class="ms-2 text-md text-gray-800">BKI SKARIGA</label>
                            </div>
                            <div class="flex items-center">
                                <input id="default-radio-2" type="radio" value="2" name="currentjob" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                                <label for="default-radio-2" class="ms-2 text-md text-gray-800">BKK SMK Lainya</label>
                            </div>
                            <div class="flex items-center">
                                <input id="default-radio-3" type="radio" value="3" name="currentjob" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300">
                                <label for="default-radio-3" class="ms-2 text-md text-gray-800">SOSIAL MEDIA</label>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="flex gap-3 flex-col w-[640px] p-2">
                <div class="flex gap-2 justify-end pb-4 border-b-2">
                    <button type="button" class="bg-yellow-600 hover:bg-yellow-700 px-4 py-2 text-sm text-gozi-50 rounded-md" onclick="resetForm()">Kosongkan Formulir</button>
                    <button type="submit" class="bg-gozi-600 hover:bg-gozi-700 px-4 py-2 text-sm text-gozi-50 rounded-md">Submit</button>
                </div>
                <div class="flex items-end justify-center w-full h-32 py-6">
                    <h1 class="text-lg tracking-tight leading-6 font-semibold text-center max-w-96 text-gray-400">PENELUSURAN ALUMNI SMK PGRI 3 MALANG LINTAS MASA</h1>
                </div>
            </footer>
        </form>
    </main>
    <script>
        $(document).ready(function() {
            $("#form-alumni").on("submit", function(e) {
                e.preventDefault();
                let data = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: '<?= site_url('forms/submit') ?>',
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        let notifType = response.success ? "success" : "error";
                        // showNotif(notifType, response.message);
                        console.log(notifType, response.message);
                        if (response.success) {
                            showSuccessCard();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        showError(thrownError + ", please contact administrator for the further");
                    },
                });

                return false;
            });
            initializeSelect2('#year', '<?= site_url('forms/getyear'); ?>', 'Pilih');
            initializeSelect2('#jurusan', '<?= site_url('jurusan/getjurusan'); ?>', 'Pilih Jurusan');
            initializeSelect2('#currentstatus', '<?= site_url('currentstatus/getstatus'); ?>', 'Pilih');
            initializeSelect2('#jobinfo', '<?= site_url('jobinfo/getjobinfo'); ?>', 'Pilih');
        });

        function initializeSelect2(id, url, placeholder) {
            $(id).select2({
                ajax: {
                    url: url,
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            search: params.term
                        };
                    },
                    processResults: function(data) {
                        console.log(data);

                        return {
                            results: data
                        };
                    }
                },
                placeholder: placeholder,
                // allowClear: true,
            });
        }

        function resetForm() {
            $('#form-alumni').find('input[type="text"], input[type="hidden"]').val('');
            $('#form-alumni').find('select').each(function() {
                $(this).val(null).trigger('change');
            });
            $('#form-alumni').find('input[type="radio"]').prop('checked', false);
        }

        function showSuccessCard() {
            const successCard = document.getElementById("success-card");
            successCard.classList.remove("hidden");
            successCard.classList.add("animate-fadeIn");
            const formSections = document.querySelectorAll("section");
            formSections.forEach(section => section.classList.add("hidden"));
        }
    </script>
</body>

</html>