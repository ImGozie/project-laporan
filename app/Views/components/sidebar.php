<aside x-data="{ isOpen: true }" >
    <nav x-bind:class="isOpen ? 'w-60' : 'w-[60px]'" class="duration-300 bg-[#FAF6F0] fixed h-screen drop-shadow-md">
        <div class="flex w-full h-[60px] p-1">
            <div x-bind:class="isOpen ? 'bg-[#F4DFC8]' : 'bg-transparent'" class="relative flex px-4 h-full w-full rounded-md items-center font-semibold">
                <div x-bind:class="isOpen ? 'block' : 'hidden'">
                    <i class="fa-solid fa-graduation-cap !text-lg"></i>
                </div>
                 <button 
                    data-tooltip-target="tooltip-toggle" 
                    data-tooltip-placement="right"
                    @click="isOpen = !isOpen" 
                    class="bg-black text-[#F4DFC8] h-9 w-9 flex items-center justify-center rounded-md absolute right-2"
                >
                    <i x-bind:class="isOpen ? '-scale-100' : 'scale-100'" class="duration-200 fa-solid fa-bars-staggered fa-sm"></i>
                 </button>
            </div>
        </div>
        <div class="mt-3 px-2">
            <ul class="flex flex-col gap-2 *:text-gray-900 *:text-sm">
                <?php
                    foreach ($menu as $arr) : 
                ?>
                    <li>
                        <a 
                            href="<?= $arr->url ?>" 
                            class="group relative duration-300 transition-all transition-radius flex items-center py-3 px-3 gap-4 rounded-lg"
                            x-bind:class="isOpen ? 'hover:bg-[#F4DFC8]' : 'bg-[#ffffff] hover:bg-[#F4DFC8] hover:rounded-2xl'"
                        >
                            <div class="icon-menu">
                                <i class="fa-solid <?= $arr->icon ?>"></i>
                            </div>
                            <p x-bind:class="isOpen ? '' : 'max-w-0'" class="duration-150 overflow-hidden whitespace-pre capitalize"><?= $arr->name ?></p>
                            <div x-bind:class="isOpen ? 'opacity-0' : 'opacity-100'" class="duration-200 absolute w-2 h-2.5 group-hover:h-8 bg-black rounded-full top-1/2 -translate-y-1/2 -left-3.5 group-hover:-left-3"></div>
                            <div x-show="!isOpen" class="duration-300 w-0 group-hover:w-fit opacity-0 group-hover:opacity-100 absolute rounded-lg group-hover:px-3 group-hover:py-2 left-14 text-white whitespace-pre bg-gray-900 capitalize overflow-hidden"><?= $arr->name ?></div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="absolute p-1 bottom-0 w-full h-16">
            <section 
                data-tooltip-target="tooltip-right" 
                data-tooltip-placement="right"
                x-bind:class="isOpen ? 'bg-[#F4DFC8]' : 'bg-transparent'" 
                class="flex h-full rounded-lg px-1.5 py-2 gap-2 drop-shadow-sm"
            >
                <div 
                    @click="if (!isOpen) isOpen = true" 
                    x-bind:class="isOpen ? '' : 'cursor-pointer'"
                    class="img-container h-10 w-10 flex-shrink-0 border-[1px] border-stone-400 rounded-full bg-white"
                >
                    <div class="rounded-full overflow-hidden border-[2px] border-white">
                        <img src="<?= session()->get('profile') ? session()->get('profile') : 'https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y'; ?>">
                    </div>
                </div>
                <p x-bind:class="isOpen ? '' : 'hidden'" class="max-w-32 flex flex-col justify-center tracking-tight text-stone-800">
                    <span class="text-sm font-semibold -mb-1 capitalize truncate">
                        <?= session()->get('username'); ?>
                    </span>
                    <span class="text-xs truncate">
                        <?= session()->get('email'); ?>
                    </span>
                </p>
                <a 
                    data-tooltip-target="tooltip-logout" 
                    data-tooltip-placement="bottom"
                    x-bind:class="isOpen ? '' : 'hidden'" 
                    href="<?= base_url('auth/logout') ?>" class="p-2 flex text-center items-center ml-auto hover:text-stone-800"
                >
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            </section>
        </div>
    </nav>
    <!-- tooltip sidebar toggle -->
    <div id="tooltip-toggle" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-normal text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        <span class="whitespace-pre" x-text="isOpen ? 'Close Sidebar' : 'Open Sidebar'"></span>
    </div>
    <!-- tooltip sidebar footer -->
    <div x-show="!isOpen" id="tooltip-right" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-normal text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        <span class="whitespace-pre">Account</span>
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
    <!-- tooltip logout -->
    <div x-show="isOpen" id="tooltip-logout" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-normal text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        <span class="whitespace-pre">Logout</span>
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
    <!-- Hidden Nav -->
     <div x-bind:class="isOpen ? 'w-60' : 'w-[60px]'" class="duration-300 h-screen"></div>
</aside>