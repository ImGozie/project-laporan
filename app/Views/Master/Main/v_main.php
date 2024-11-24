<?= $this->include('layouts/header'); ?>
<section class="py-4">
    <div class="flex flex-wrap gap-4">
        <?php foreach ($menu as $arr): ?>
            <?php if ($arr->type === 'submenu'): ?>
                <a href="<?= $arr->url ?>" class="group overflow-hidden shadow-sm duration-300 border-2 relative border-gozi-50 hover:bg-gozi-50 rounded-lg cursor-pointer p-3 flex-grow basis-full h-44 sm:basis-1/3 lg:basis-1/4 xl:basis-1/5">
                    <p class="inline-flex  items-center gap-2 text-sm font-medium bg-gozi-50 group-hover:bg-white text-gozi-900 px-3 py-1 rounded-md">
                        <i class="fa-solid fa-database"></i>
                        Master
                    </p>
                    <h1 class="text-2xl font-semibold mt-1 capitalize"><?= $arr->name ?></h1>
                    <p class="text-sm mt-1.5 w-[70%] text-gray-400"><?= $arr->desc ?></p>
                    <!-- decoration -->
                    <span class="absolute -bottom-4 -right-2 text-black/5 text-8xl">
                        <i class="fa-solid <?= $arr->icon ?>"></i>
                    </span>
                    <div class="absolute flex shadow-lg items-center justify-center w-16 h-16 opacity-0 group-hover:opacity-100 bg-gozi-400 text-white bottom-5 right-5 rounded-full scale-[30%] group-hover:scale-100 duration-300"><i class="fa-solid fa-arrow-right fa-xl duration-200 group-hover:-rotate-45"></i></div>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php
            for ($i = 0; $i < 5; $i++) {
                echo '<div class="opacity-0 flex-grow bg-slate-200 p-4 basis-full sm:basis-1/3 lg:basis-1/4 xl:basis-1/5">' . $i . '</div>';
            }
        ?>
    </div>
</section>
<?= $this->include('layouts/footer'); ?>