<!-- Modal body -->
<form class="p-2 md:p-3">
    <div class="grid gap-2 mb-4 grid-cols-2">
        <div class="col-span-2">
            <label for="name" class="block mb-0.5 text-xs text-gray-800 after:content-['*'] after:text-red-600 after:ml-0.5">Username / Nomor Induk Siswa</label>
            <input value="<?= $formType == 'edit' ? $user->username : '' ?>" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-[4px] focus:!ring-gozi-400 block w-full p-2.5" placeholder="example: 22519/1990.063" required="">
        </div>
        <div class="col-span-2">
            <label for="category" class="block mb-0.5 text-xs text-gray-800 after:content-['*'] after:text-red-600 after:ml-0.5">Role</label>
            <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-[4px] block w-full p-2.5 focus:!ring-gozi-400">
                <option selected value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
        <div class="col-span-2">
            <label for="name" class="block mb-0.5 text-xs text-gray-800 after:content-['*'] after:text-red-600 after:ml-0.5">Password</label>
            <input value="" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-[4px] focus:!ring-gozi-400 block w-full p-2.5" placeholder="example: $2a$12$ar.A3NtxJibqJuH24vEvT" required="">
        </div>
    </div>
    <div class="flex gap-2 justify-end border-t-2 border-gray-200 pt-2 md:pt-3">
        <button class="duration-150 text-white inline-flex items-center bg-yellow-500 hover:bg-yellow-600 rounded-[4px] text-sm px-3 py-2.5 text-center">
            <i class="fa-solid fa-rotate-right fa-lg"></i>
        </button>
        <button type="submit" class="duration-150 text-white inline-flex gap-1 items-center bg-gozi-600 hover:bg-gozi-500 rounded-[4px] text-sm px-5 py-2.5 text-center">
            <i class="fa-solid fa-plus fa-lg"></i>
            Submit Data
        </button>
    </div>
</form>