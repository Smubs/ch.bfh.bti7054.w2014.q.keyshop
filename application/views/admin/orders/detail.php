<h3>Detailansicht der Bestellung #<?= $this->uri->segment(4) ?><b class="pull-right">Status: <?= $status ?></b></h3>
<h4>Produkte</h4>
<div class="table-responsive table-overview">
    <table class="table table-striped">
        <colgroup>
            <col width="30%">
            <col>
        </colgroup>
        <tr>
            <th>Produkt</th>
            <th>Key(s)</th>
        </tr>
        <?php foreach ($products as $product): ?>
        <tr>
            <td>
                <span class="quantity"><?= $product['quantity'] ?>x</span>
                <a href="/admin/products/edit/<?= $product['id'] ?>"><?= $product['name'] ?></a>
            </td>
            <td>
                <?php foreach ($product['keys'] as $key): ?>
                <div><a href="/admin/keys/edit/<?= $key['id'] ?>"><?= $key['key'] ?></a></div>
                <?php endforeach ?>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</div>
<h4>Benutzer</h4>
<div class="table-responsive table-overview">
    <table class="table table-striped">
        <colgroup>
            <col width="30%">
            <col>
        </colgroup>
        <tr>
            <td>E-Mail</td>
            <td><a href="/admin/users/edit/<?= $user->getId() ?>"><?= $user->getEmail() ?></a></td>
        </tr>
        <tr>
            <td>Vorname / Nachname</td>
            <td><?= $user->getFirstname() . ' ' . $user->getLastname() ?></td>
        </tr>
        <tr>
            <td>Adresse</td>
            <td><?= $user->getAddress() ?></td>
        </tr>
        <tr>
            <td>PLZ / Ort</td>
            <td><?= $user->getZip() . ' ' . $user->getPlace() ?></td>
        </tr>
        <tr>
            <td>Land</td>
            <td><?= $user->getCountry()->getCountryName() ?></td>
        </tr>
    </table>
</div>