<aside x-data="{ expanded: true }" x-bind:class="expanded ? 'w-60' : 'w-[60px]'" class="duration-300 bg-[#FAF6F0] relative h-screen drop-shadow-md">
    <div class="flex w-full h-[60px] p-1">
        <div x-bind:class="expanded ? 'bg-[#F4DFC8]' : 'bg-transparent'" class="relative flex px-4 h-full w-full rounded-md items-center font-semibold">
            <div x-bind:class="expanded ? 'block' : 'hidden'">
                <i class="fa-solid fa-graduation-cap !text-lg"></i>
            </div>
            <!-- <h1 class="uppercase tracking-tight font-bold">Alumni Tracker.</h1> -->
             <button 
                data-tooltip-target="tooltip-right" 
                data-tooltip-placement="right"
                @click="expanded = !expanded" 
                class="bg-black text-[#F4DFC8] h-9 w-9 flex items-center justify-center rounded-md absolute right-2"
            >
                <i x-bind:class="expanded ? '-scale-100' : 'scale-100'" class="duration-200 fa-solid fa-bars-staggered fa-sm"></i>
             </button>
        </div>
    </div>
    <nav class="mt-3 px-2">
        <ul class="flex flex-col gap-2 *:text-gray-900 *:text-sm">
            <li>
                <a 
                href="#" 
                class="group relative duration-300 transition-all transition-radius flex items-center py-3 px-3 gap-4 rounded-lg"
                x-bind:class="expanded ? 'hover:bg-[#F4DFC8]' : 'bg-[#ffffff] hover:bg-[#F4DFC8] hover:rounded-2xl'"
                >
                    <div class="icon-menu">
                        <i class="fa-solid fa-chart-simple"></i>
                    </div>
                    <p x-bind:class="expanded ? '' : 'max-w-0'" class="duration-150 overflow-hidden whitespace-pre">Dashboard</p>
                    <div x-bind:class="expanded ? 'opacity-0' : 'opacity-100'" class="duration-200 absolute w-2 h-2.5 group-hover:h-8 bg-black rounded-full top-1/2 -translate-y-1/2 -left-3.5 group-hover:-left-3"></div>
                </a>
            </li>
            <li>
                <a 
                    href="#" 
                    class="group relative duration-300 transition-all transition-radius flex items-center py-3 px-3 gap-4 rounded-lg"
                    x-bind:class="expanded ? 'hover:bg-[#F4DFC8]' : 'bg-[#ffffff] hover:bg-[#F4DFC8] hover:rounded-2xl'"
                >
                    <div class="icon-menu">
                        <i class="fa-solid fa-database"></i>
                    </div>
                    <p x-bind:class="expanded ? '' : 'max-w-0'" class="duration-150 overflow-hidden whitespace-pre">Master Data</p>
                    <div x-bind:class="expanded ? 'opacity-0' : 'opacity-100'" class="duration-200 absolute w-2 h-2.5 group-hover:h-8 bg-black rounded-full top-1/2 -translate-y-1/2 -left-3.5 group-hover:-left-3"></div>
                </a>
            </li>
            <li>
                <a 
                    href="#" 
                    class="group relative duration-300 transition-all transition-radius flex items-center py-3 px-3 gap-4 rounded-lg"
                    x-bind:class="expanded ? 'hover:bg-[#F4DFC8]' : 'bg-[#ffffff] hover:bg-[#F4DFC8] hover:rounded-2xl'"
                >
                    <div class="icon-menu">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <p x-bind:class="expanded ? '' : 'max-w-0'" class="duration-150 overflow-hidden whitespace-pre">User / Siswa</p>
                    <div x-bind:class="expanded ? 'opacity-0' : 'opacity-100'" class="duration-200 absolute w-2 h-2.5 group-hover:h-8 bg-black rounded-full top-1/2 -translate-y-1/2 -left-3.5 group-hover:-left-3"></div>
                </a>
            </li>
        </ul>
    </nav>
    <div class="absolute p-1 bottom-0 w-full h-16">
        <section x-bind:class="expanded ? 'bg-[#F4DFC8]' : 'bg-transparent'" class="flex h-full rounded-lg px-1.5 py-2 gap-2 drop-shadow-sm">
            <div 
                @click="if (!expanded) expanded = true" 
                x-bind:class="expanded ? '' : 'cursor-pointer'"
                class="img-container h-10 w-10 flex-shrink-0 p-0.5 border-[1px] border-stone-400 rounded-full bg-white"
            >
                <div class="rounded-full overflow-hidden">
                    <img src="<?= session()->get('profile') ? session()->get('profile') : 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y'; ?>" alt="User Profile">
                </div>
            </div>
            <p x-bind:class="expanded ? '' : 'hidden'" class="max-w-32 flex flex-col justify-center tracking-tight text-stone-800">
                <span class="text-sm font-semibold -mb-1 capitalize truncate">
                    <?= session()->get('username'); ?>
                </span>
                <span class="text-xs truncate">
                    <?= session()->get('email'); ?>
                </span>
            </p>
            <a x-bind:class="expanded ? '' : 'hidden'" href="<?= base_url('auth/logout') ?>" class="p-2 flex text-center items-center ml-auto hover:text-stone-800">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </section>
    </div>
</aside>