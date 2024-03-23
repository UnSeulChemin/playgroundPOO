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

    <form method="post" enctype="multipart/form-data">
        <div class="flex-center">
            <label class="label-file" for="file">Image</label>
            <input class="none" type="file" id="file" name="image">
        </div>
        <button class="link-form" type="submit">Envoyer</button>
    </form>

</section>