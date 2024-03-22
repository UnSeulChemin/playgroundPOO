<section class="section-content">

    <h2>Ship</h2>
   
    <section class="section-card">
        <div class="div-card">
            <figure class="figure-card">
                <img src="<?= $pathRedirect; ?>public/images/waifus/<?= $waifu->image.".".$waifu->extension ?>">
            </figure>
            <div class="div-card-content">
                <p class="margin-none"><?= $waifu->name ?></p>
            </div>
            <div class="div-card-content">
                <p class="margin-none"><?= date('d/m/Y', strtotime($waifu->created_at)); ?></p>
            </div>
        </div>
    </section>

</section>