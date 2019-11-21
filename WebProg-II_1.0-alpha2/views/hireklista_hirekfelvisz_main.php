<h2>Hír fölvitele</h2>
<form action="<?= SITE_ROOT ?>hirekrogzit" method="post">
    <label for="hir_cim">Cím: </label><input type="text" name="hir_cim" id="hir_cim" required pattern=".{3,}" /><br>
    <label for="hir_szoveg">Szöveg: </label><textarea name="hir_szoveg" id="hir_szoveg" rows="16" cols="64" required pattern=".{3,}"></textarea><br>
    <input type="submit" value="Küldés">
</form>
<p><?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?></p>
