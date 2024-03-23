<section class="section-content">

    <h2>Upload</h2>

    <?php if (isset($_SESSION["validate"]) && !empty($_SESSION["validate"])):  ?>
        <div class="success-flash">
            <p><?= $_SESSION["validate"]; unset($_SESSION["validate"]); ?></p>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION["warning"]) && !empty($_SESSION["warning"])): ?>
        <div class="warning-flash">
            <p><?= $_SESSION["warning"]; unset($_SESSION["warning"]); ?></p>
        </div>
    <?php endif; ?>

    <?= $fileForm; ?>

</section>