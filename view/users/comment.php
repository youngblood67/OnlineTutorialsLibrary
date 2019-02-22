<div id="container">
    <div class="row justify-content-center">
        <form method="post" action="../treatment/trtComment.php">
            <div class="form-group ">
                <textarea class="form-control" id="commentTextArea" rows="5" placeholder="Votre commentaire..." name="commentContent"></textarea>
            </div>

            <div class="form-group ">
                <button type="submit" class="btn btn-primary ">Enregistrer</button>
            </div>
            <input type="hidden" name="idVideo" value="<?= $idVideo?>" />

        </form>
    </div>

</div>