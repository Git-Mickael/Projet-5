<?php foreach ($articles as $article) :?>
    <article class="articles">
        <form method="post" action="<?='index.php?action=deleteArticle&id=' . $article['id']  ?>">
            <p> <?= $article['text'] ?> </p>
            <input type="submit" value="Supprimer" />
        </form>
        <div class="modify">
            <form method="POST" action="<?= 'index.php?action=modify&id=' . $article['id'] ?>">
                <textarea class="changeDescription" name="newDescription"></textarea><br/>
                <input type="submit" value="Modifier" />
            </form>
        </div>
    </article>
<?php endforeach; ?>