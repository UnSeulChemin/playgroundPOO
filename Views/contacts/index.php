<?php $title = "| Contacts"; ?>
<section class="section-content">

    <h2>Contacts</h2>

    <?php if (!empty($_SESSION["validate"])):  ?>
        <div class="success-flash">
            <p><?= $_SESSION["validate"]; unset($_SESSION["validate"]); ?></p>
        </div>
    <?php endif; ?>

    <?php if (!empty($_SESSION["warning"])): ?>
        <div class="warning-flash">
            <p><?= $_SESSION["warning"]; unset($_SESSION["warning"]); ?></p>
        </div>
    <?php endif; ?>

    <?= $contactForm; ?>

</section>