<?= $this->include('layouts/header'); ?>
<section class="p-4">
    <div class="p-4 rounded-lg shadow-md overflow-x-auto max-w-full">
        <table id="usersTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Username</th>
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