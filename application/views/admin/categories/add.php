<h3>Kategorie <?php echo $isEditView ? 'bearbeiten' : 'hinzufügen' ?></h3><br />
<form action="/<?= uri_string() ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="input-name" class="col-sm-2 control-label">Name *</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="input-name" placeholder="Name" value="<?= $data['name'] ?>" required />
        </div>
    </div>
    <div class="form-group">
        <label for="input-description" class="col-sm-2 control-label">Beschreibung</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="3" name="description" id="input-description" placeholder="Beschreibung"><?= $data['description'] ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="input-css-class" class="col-sm-2 control-label">CSS-Klasse</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="cssClass" id="input-css-class" placeholder="CSS-Klasse" value="<?= $data['cssClass'] ?>" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-default">Speichern</button>
        </div>
    </div>
</form>