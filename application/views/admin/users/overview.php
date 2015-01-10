<form action="/<?= uri_string() ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <div class="col-sm-2">
            <a href="/admin/users/add"><button type="button" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp;&nbsp;Benutzer hinzufügen</button></a>
        </div>
        <div class="col-sm-1 pull-right">
            <button type="submit" name="submit" class="btn btn-default">Suchen</button>
        </div>
        <div class="col-sm-3 pull-right">
            <input class="form-control" type="text" name="searchEmail" value="<?= $searchEmail ?>" placeholder="Nach E-Mail suchen" />
        </div>
    </div>
</form>
<div class="table-responsive table-overview">
    <table class="table table-striped" ng-controller="KeyshopUsers">
        <colgroup>
            <col width="50px">
            <col>
            <col width="60px">
        </colgroup>
        <tr>
            <th>#</th>
            <th>E-Mail</th>
            <th></th>
        </tr>
        <tr ng-repeat="user in users">
            <td>{{user.id}}</td>
            <td class="name"><a href="/admin/users/edit/{{user.id}}">{{user.email}}</a></td>
            <td>
                <a href="/admin/users/edit/{{user.id}}"><i class="fa fa-edit"></i></a>
                <form action="/admin/users" method="post" class="form-remove">
                    <input type="hidden" name="remove" value="{{user.id}}" />
                    <i class="fa fa-remove"></i>
                </form>
            </td>
        </tr>
    </table>
</div>