<h3>Benutzer <?php echo $isEditView ? 'bearbeiten' : 'hinzufügen' ?></h3><br />
<form action="/<?= uri_string() ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="checkbox-admin" class="col-sm-2 control-label">Administrator</label>
        <div class="col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="admin" id="checkbox-admin" value="1" <?php if ($data['admin']) echo 'checked' ?> />&nbsp;
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="input-email" class="col-sm-2 control-label">E-Mail *</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email" id="input-email" placeholder="E-Mail" value="<?= $data['email'] ?>" required />
        </div>
    </div>
    <div class="form-group">
        <label for="input-password" class="col-sm-2 control-label">Passwort <?php if (!$isEditView) echo '*' ?></label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="input-password" placeholder="Passwort" value="<?= $data['password'] ?>" <?php if (!$isEditView) echo 'required' ?> />
        </div>
    </div>
    <div class="form-group">
        <label for="input-firstname" class="col-sm-2 control-label">Vorname</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="firstname" id="input-firstname" placeholder="Vorname" value="<?= $data['firstname'] ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="input-lastname" class="col-sm-2 control-label">Nachname</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="lastname" id="input-lastname" placeholder="Nachname" value="<?= $data['lastname'] ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="input-address" class="col-sm-2 control-label">Adresse</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address" id="input-address" placeholder="Adresse" value="<?= $data['address'] ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="input-zip" class="col-sm-2 control-label">PLZ / Ort</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="zip" id="input-zip" placeholder="PLZ" value="<?= $data['zip'] ?>" />
        </div>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="place" id="input-place" placeholder="Ort" value="<?= $data['place'] ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="select-country" class="col-sm-2 control-label">Land</label>
        <div class="col-sm-10">
            <select class="form-control" id="select-country" name="country">
                <?php foreach ($data['countries'] as $country): ?>
                <option value="<?= $country->getId() ?>" <?php if ($country->getId() === $data['country']) echo 'selected' ?>><?= $country->getCountryName() ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-default">Speichern</button>
        </div>
    </div>
</form>