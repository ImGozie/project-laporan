<?= $this->include('layouts/header'); ?>
    <h1><?= session()->get('email'); ?></h1>
    <a href="<?= base_url('auth/logout') ?>">Logout</a>
<?= $this->include('layouts/footer'); ?>