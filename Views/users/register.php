<section class="section-content">

    <h2>Register</h2>

    <?php if (isset($_SESSION["warning"]) && !empty($_SESSION["warning"])): ?>
        <div class="warning-flash">
            <p><?= $_SESSION["warning"]; unset($_SESSION["warning"]); ?></p>
        </div>
    <?php endif; ?>

    <?= $registerForm; ?>

</section>