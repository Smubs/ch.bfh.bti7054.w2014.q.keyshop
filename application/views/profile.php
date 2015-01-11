<h3>Profil bearbeiten</h3>
<div class="alert alert-<?= $alert['mode'] . ' ' . $alert['display'] ?>">
    <?= $alert['message'] ?>
</div>
<form action="/<?= uri_string() ?>" method="post" class="form-horizontal form-profile" role="form">
    <div class="form-group">
        <label for="input-email" class="col-sm-2 control-label">E-Mail *</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email" id="input-email" placeholder="email@adresse.ch" value="<?= $user['email'] ?>" required />
        </div>
    </div>
	<div class="form-group">
        <label for="input-firstname" class="col-sm-2 control-label">Vorname</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="firstname" id="input-firstname" placeholder="Vorname" value="<?= $user['firstname'] ?>" />
        </div>
    </div>
	<div class="form-group">
        <label for="input-lastname" class="col-sm-2 control-label">Nachname</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="lastname" id="input-lastname" placeholder="Nachname" value="<?= $user['lastname'] ?>" />
        </div>
    </div>
	<div class="form-group">
        <label for="input-address" class="col-sm-2 control-label">Adresse</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address" id="input-address" placeholder="Adresse" value="<?= $user['address'] ?>" />
        </div>
    </div>
	<div class="form-group">
        <label for="input-zip" class="col-sm-2 control-label">PLZ / Ort</label>
		<div class="col-sm-5">
            <input type="text" class="form-control" name="zip" id="input-zip" placeholder="PLZ" value="<?= $user['zip'] ?>" />
        </div>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="place" id="input-place" placeholder="Ort" value="<?= $user['place'] ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="select-country" class="col-sm-2 control-label">Land</label>
        <div class="col-sm-10">
            <select class="form-control" id="select-country" name="country">
                <?php foreach ($countries as $country): ?>
                    <option value="<?= $country->getId() ?>" <?php if ($country->getId() === $user['country']) echo 'selected' ?>><?= $country->getCountryName() ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
	<div class="form-group">
        <label for="input-password" class="col-sm-2 control-label">Passwort ändern</label>
        <div class="col-sm-5">
            <input type="password" class="form-control" name="password" id="input-password" placeholder="Passwort" value="" />
        </div>
        <div class="col-sm-5">
            <input type="password" class="form-control" name="passwordRetype" id="input-password-retype" placeholder="Passwort wiederholen" value="" />
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-default">Speichern</button>
        </div>
    </div>
</form>
