<?= $this->include('layouts/header'); ?>
<section class="mt-4">
    <div class="px-4 rounded-lg shadow-md overflow-x-auto max-w-full">
        <table id="usersTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Login Method</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</section>
<?= $this->include('layouts/footer'); ?>