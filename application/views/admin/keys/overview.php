<form action="/<?= uri_string() ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <div class="col-sm-2">
            <a href="/admin/keys/add"><button type="button" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp;&nbsp;Key hinzufügen</button></a>
        </div>
        <div class="col-sm-1 pull-right">
            <button type="submit" name="submit" class="btn btn-default">Suchen</button>
        </div>
        <div class="col-sm-3 pull-right">
            <input class="form-control" type="text" name="search" value="<?= $search ?>" placeholder="Suchkriterium" required />
        </div>
    </div>
</form>
<div class="table-responsive table-overview">
    <table class="table table-striped" ng-controller="KeyshopKeys">
        <colgroup>
            <col width="50px">
            <col>
            <col>
            <col width="60px">
        </colgroup>
        <tr>
            <th>#</th>
            <th>Key</th>
            <th>Produkt</th>
            <th></th>
        </tr>
        <tr ng-repeat="key in keys">
            <td>{{key.id}}</td>
            <td class="name">
                <a href="/admin/keys/edit/{{key.id}}">{{key.key}}</a>&nbsp;&nbsp;
                <i ng-show="{{key.sold}}" class="fa fa-shopping-cart" data-toggle="tooltip" data-placement="right" title="Key wurde bereits bestellt."></i>
            </td>
            <td>{{key.product}}</td>
            <td>
                <a href="/admin/keys/edit/{{key.id}}"><i class="fa fa-edit"></i></a>
                <form action="/admin/keys" method="post" class="form-remove">
                    <input type="hidden" name="remove" value="{{key.id}}" />
                    <i class="fa fa-remove"></i>
                </form>
            </td>
        </tr>
    </table>
</div>