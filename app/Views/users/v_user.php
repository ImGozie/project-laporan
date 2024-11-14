<?= $this->include('layouts/header'); ?>
<section class="mt-4">
    <div class="px-4 rounded-lg shadow-md overflow-x-auto max-w-full">
        <div class="flex gap-2 justify-end py-4 border-b-2 border-gray-200">
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-[0.8rem] bg-gozi-500 hover:bg-gozi-600 duration-150 text-[#F4DFC8] py-2 px-3 font-[500] rounded-md">
                <i class="fa-solid fa-plus"></i>
                Add New
            </button>
        </div>
        <table id="usersTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Login Method</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</section>
<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center !items-start w-full md:inset-0 backdrop-blur-sm h-screen max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative !top-10 bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900 ">
                    Create New Data
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="grid gap-2 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-1 text-sm font-medium text-gray-500">Username / Nomor Induk Siswa</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:!ring-gray-900 focus:!border-gray-900 block w-full p-2.5" placeholder="example: 22519/1990.063" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="category" class="block mb-1 text-sm font-medium text-gray-500">Role</label>
                        <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md block w-full p-2.5 focus:!ring-gray-900 focus:!border-gray-900">
                            <option selected value="User">User</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="name" class="block mb-1 text-sm font-medium text-gray-500">Password</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:!ring-gray-900 focus:!border-gray-900 block w-full p-2.5" placeholder="example: $2a$12$ar.A3NtxJibqJuH24vEvT" required="">
                    </div>
                </div>
                <div class="flex justify-end border-t-2 border-gray-200 pt-4">
                    <button type="submit" class="duration-150 text-white inline-flex items-center bg-black hover:bg-gray-800 font-medium rounded-md text-sm px-5 py-2.5 text-center">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Submit Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> 
<?= $this->include('layouts/footer'); ?>