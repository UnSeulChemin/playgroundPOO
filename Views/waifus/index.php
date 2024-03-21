<section class="section-content">

    <h2>Waifus</h2>
   
    <section class="section-card">
        <?php foreach($waifus as $waifu): ?>
            <div class="div-card">
                <figure class="figure-card">
                    <a class="flex" href="<?= $pathRedirect; ?>waifus/waifu/<?= $waifu->id ?>">
                        <img src="<?= $pathRedirect; ?>public/images/waifus/<?= $waifu->image.".".$waifu->extension ?>">
                    </a>
                </figure>
                <div class="div-card-content">
                    <p class="margin-none"><?= $waifu->name ?></p>
                </div>
                <div class="div-card-content">
                    <p class="margin-none"><?= date('d/m/Y', strtotime($waifu->created_at)); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

</section>