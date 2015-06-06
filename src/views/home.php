<?php
if (isset($sError)) {
    ?>
    <div class="alert alert-danger">
        <?=$sError?>
    </div>
<?php
}
?>
<form method="post">
    <label for="url">
        URL :
    </label>
    <input type="url" id="url" name="url" placeholder="http://"/>
    <input type="submit" value=">"/>
</form>