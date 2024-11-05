<aside class="bg-[#FAF6F0] relative h-screen w-60 drop-shadow-md">
    <div class="flex w-full h-14 p-1">
        <div class="relative flex px-4 bg-[#F4DFC8] h-full w-full rounded-md items-center font-semibold">
            <div>
                <i class="fa-solid fa-graduation-cap !text-lg"></i>
            </div>
            <!-- <h1 class="uppercase tracking-tight font-bold">Alumni Tracker.</h1> -->
             <button onclick="toggleMenu()" class="bg-black text-[#F4DFC8] h-10 w-10 flex items-center justify-center rounded-md absolute right-1">
                <i class="fa-solid fa-bars-staggered fa-sm -scale-100"></i>
             </button>
        </div>
    </div>
    <nav class="mt-3 px-2">
        <ul class="flex flex-col gap-2 *:text-gray-900 *:text-sm">
            <li>
                <a href="#" class="duration-300 flex hover:bg-[#F4DFC8] items-center py-3 px-3 gap-4 rounded-lg">
                    <div class="icon-menu">
                        <i class="fa-solid fa-chart-simple"></i>
                    </div>
                    <p>Dashboard</p>
                    <div class="h-2 w-2"></div>
                </a>
            </li>
            <li>
                <a href="#" class="duration-300 flex hover:bg-[#F4DFC8] items-center py-3 px-3 gap-4 rounded-lg">
                    <div class="icon-menu">
                        <i class="fa-solid fa-database"></i>
                    </div>
                    <p>Master Data</p>
                    <div class="h-2 w-2"></div>
                </a>
            </li>
            <li>
                <a href="#" class="duration-300 flex hover:bg-[#F4DFC8] items-center py-3 px-3 gap-4 rounded-lg">
                    <div class="icon-menu">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <p>User / Siswa</p>
                    <div class="h-2 w-2"></div>
                </a>
            </li>
        </ul>
    </nav>
    <div class="absolute p-1 bottom-0 w-full h-16">
        <section class="flex bg-[#F4DFC8] h-full rounded-lg p-2 gap-2 drop-shadow-sm">
            <div class="img-container h-10 w-10 p-0.5 border-[1px] border-stone-400 rounded-full bg-white">
                <div class="rounded-full overflow-hidden">
                    <img src="<?= session()->get('profile') ? session()->get('profile') : 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y'; ?>" alt="User Profile">
                </div>
            </div>
            <p class="max-w-32 flex flex-col justify-center tracking-tight text-stone-800">
                <span class="text-sm font-semibold -mb-1 capitalize truncate">
                    <?= session()->get('username'); ?>
                </span>
                <span class="text-xs truncate">
                    <?= session()->get('email'); ?>
                </span>
            </p>
            <a href="<?= base_url('auth/logout') ?>" class="p-2 flex text-center items-center ml-auto hover:text-stone-800">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </section>
    </div>
</aside>