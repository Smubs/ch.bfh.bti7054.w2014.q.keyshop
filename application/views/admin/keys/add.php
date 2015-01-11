<h3>Key <?php echo $isEditView ? 'bearbeiten' : 'hinzufügen' ?></h3><br />
<form action="/<?= uri_string() ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="select-product" class="col-sm-2 control-label">Produkt *</label>
        <div class="col-sm-10">
            <select class="form-control" name="product" id="select-product">
                <?php foreach($data['products'] as $product): ?>
                <option value="<?= $product->getId() ?>" <?php if ($product->getId() === $data['product']) echo 'selected' ?>><?= $product->getName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="input-name" class="col-sm-2 control-label">Key *</label>
        <div class="col-sm-10">
            <?php if ($isEditView): ?>
            <input type="text" class="form-control" name="key" id="input-name" placeholder="" value="<?= $data['key'] ?>" required />
            <?php else: ?>
            <textarea class="form-control" name="keys" rows="3" placeholder="Pro Zeile ein Key" required></textarea>
            <?php endif ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-default">Speichern</button>
        </div>
    </div>
</form>