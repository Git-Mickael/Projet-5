<h3>Envoi d'une image</h3>
<?php foreach ($images as $image) :?>
<form enctype="multipart/form-data" action="changeIdentifyImage" method="post">
   <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
   <input type="file" name="identifyImage" size=50 />
   <input type="submit" value="Envoyer" />
</form>

    <article class="image">
            <img id="firstImage" src="<?= $image['img'] ?>"/>        
    </article>
<?php endforeach; ?>