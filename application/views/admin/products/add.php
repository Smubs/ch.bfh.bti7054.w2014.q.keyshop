<h3>Produkt <?php echo $isEditView ? 'bearbeiten' : 'hinzufügen' ?></h3><br />
<form action="/<?= uri_string() ?>" method="post" class="form-horizontal form-product" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="input-status" class="col-sm-2 control-label">Status</label>
        <div class="col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="status" id="input-status"  <?= $data['status'] ?> /> Aktiv
                </label>
            </div>
        </div>
    </div>
    <div class="form-group" ng-controller="KeyshopMultiSelectCategories">
        <label class="col-sm-2 control-label">Kategorien</label>
        <div class="col-sm-10">
            <input type="hidden" name="categories" />
            <multi-select
                input-model="multiSelectCategories"
                button-label="icon name"
                item-label="icon name maker"
                tick-property="ticked">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <label for="input-name" class="col-sm-2 control-label">Name *</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="input-name" placeholder="Name" value="<?= $data['name'] ?>" required />
        </div>
    </div>
    <div class="form-group">
        <label for="input-description" class="col-sm-2 control-label">Beschreibung *</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="3" name="description" id="input-description" placeholder="Beschreibung" required><?= $data['description'] ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="input-price" class="col-sm-2 control-label">Preis *</label>
        <div class="col-sm-10">
            <input type="number" step="any" class="form-control" name="price" id="input-price" placeholder="9.95" value="<?= $data['price'] ?>" required />
        </div>
    </div>
    <div class="form-group">
        <label for="input-discount-price" class="col-sm-2 control-label">Ermässigter Preis</label>
        <div class="col-sm-10">
            <input type="number" step="any" class="form-control" name="discountPrice" id="input-discount-price" placeholder="5.50" value="<?= $data['discountPrice'] ?>" />
        </div>
    </div>
    <div class="form-group">
        <label for="input-picture" class="col-sm-2 control-label">Bild</label>
        <div class="col-sm-10">
            <?= $data['picture'] ?>
            <input type="file" class="form-control" name="picture" id="input-picture" />
        </div>
    </div>
    <?php if ($isEditView): ?>
    <div class="form-group" ng-controller="KeyshopMultiSelectKeys">
        <label class="col-sm-2 control-label">Keys</label>
        <div class="col-sm-10">
            <p class="form-control-static"><?= $data['keys'] ?></p>
        </div>
    </div>
    <?php endif ?>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-default">Speichern</button>
        </div>
    </div>
</form>