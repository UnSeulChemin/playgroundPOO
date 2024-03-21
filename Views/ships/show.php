<section class="section-content">

    <h2>Ships</h2>
   
    <section class="section-card">
        <div class="div-card">
            <figure class="figure-card">
                <img src="<?= $pathRedirect; ?>public/images/ships/<?= $ship->image.".".$ship->extension ?>">
            </figure>
            <div class="div-card-content">
                <p class="margin-none"><?= $ship->name ?></p>
            </div>
            <div class="div-card-content">
                <p class="margin-none"><?= date('d/m/Y', strtotime($ship->created_at)); ?></p>
            </div>
        </div>
    </section>

</section>