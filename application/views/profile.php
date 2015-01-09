<h3>Profil bearbeiten</h3><br />
<form action="/<?= uri_string() ?>" method="post" class="form-horizontal form-profile" role="form">
    <div class="form-group">
        <label for="input-name" class="col-sm-2 control-label">E-Mail</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email" id="input-name" placeholder="email@adresse.ch" value="<?= $user['email'] ?>" />
        </div>
    </div>
	<div class="form-group">
        <label for="input-name" class="col-sm-2 control-label">Vorname</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="firstname" id="input-name" placeholder="Vorname" value="<?= $user['firstname'] ?>" />
        </div>
    </div>
	<div class="form-group">
        <label for="input-name" class="col-sm-2 control-label">Nachname</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="lastname" id="input-name" placeholder="Nachname" value="<?= $user['lastname'] ?>" />
        </div>
    </div>
	<div class="form-group">
        <label for="input-name" class="col-sm-2 control-label">Adresse</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address" id="input-name" placeholder="Adresse" value="<?= $user['address'] ?>" />
        </div>
    </div>
	<div class="form-group">
        <label for="input-name" class="col-sm-2 control-label">Ortschaft</label>
		<div class="col-sm-2">
            <input type="text" class="form-control" name="zip" id="input-name" placeholder="PLZ" value="<?= $user['zip'] ?>" />
        </div>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="place" id="input-name" placeholder="Ort" value="<?= $user['place'] ?>" />
        </div>
    </div>
	<div class="form-group">
        <label for="input-name" class="col-sm-2 control-label">Passwort ändern</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="password" id="input-name" placeholder="Passwort" value="" />
        </div>
    </div>
	<div class="form-group">
        <label for="input-name" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="password2" id="input-name" placeholder="Passwort wiederholen" value="" />
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-default">Speichern</button>
        </div>
    </div>
</form>
