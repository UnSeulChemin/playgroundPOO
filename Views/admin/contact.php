<section class="section-content">

    <h2>Contact <?= $contact->id ?></h2>
   
    <article class="article-content">
        <div>
            <p class="bold"><?= strip_tags($contact->title) ?></p>
        </div>
        <div>
            <p><?= strip_tags($contact->description) ?></p>
        </div>
        <div>
            <p><?= date('d/m/Y', strtotime($contact->created_at)); ?></p>
        </div>
        <a class="link-form" href="javascript:history.go(-1)">Back</a>
    </article>

</section>