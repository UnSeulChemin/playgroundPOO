<section class="section-content">

    <h2>Ships</h2>
   
    <section class="section-card">
        <?php foreach($ships as $ship): ?>
            <div class="div-card">
                <figure class="figure-card">
                    <img src="public/images/ships/<?= $ship->image.".".$ship->extension ?>">
                </figure>
                <div class="div-card-content">
                    <p class="margin-none"><?= $ship->name ?></p>
                </div>
                <div class="div-card-content">
                    <p class="margin-none"><?= $ship->created_at ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</section>