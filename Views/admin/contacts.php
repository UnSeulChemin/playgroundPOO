<section class="section-content">

    <h2>Contacts</h2>

    <?php foreach($contacts as $contact): ?>
        <article class="article-content">
            <p class="bold"><?= $contact->title ?></p>
            <p><?= $contact->description ?></p>
            <p><?= date('d/m/Y', strtotime($contact->created_at)); ?></p>
            <div class="margin-bottom">
                <a class="link-form" href="<?= $pathRedirect; ?>contacts/<?= $contact->id ?>">Preview</a>
            </div>
            <div class="margin-bottom">
                <a class="link-form" href="<?= $pathRedirect; ?>mcontacts/<?= $contact->id ?>">Modify</a>
            </div>
            <div>
                <a class="link-form" href="<?= $pathRedirect; ?>dcontacts/<?= $contact->id ?>">Delete</a>
            </div>
        </article>
    <?php endforeach; ?>

</section>