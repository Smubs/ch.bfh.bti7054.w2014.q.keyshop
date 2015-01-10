<form action="/<?= uri_string() ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <div class="col-sm-1 pull-right">
            <button type="submit" name="submit" class="btn btn-default">Suchen</button>
        </div>
        <div class="col-sm-3 pull-right">
            <input class="form-control" type="number" name="search" value="<?= $search ?>" placeholder="Nach Bestell-ID suchen" required />
        </div>
    </div>
</form>
<div class="table-responsive table-overview">
    <table class="table table-striped" ng-controller="KeyshopOrders">
        <colgroup>
            <col width="50px">
            <col>
            <col>
            <col width="30px">
        </colgroup>
        <tr>
            <th>#</th>
            <th>Bestellung</th>
            <th>Benutzer</th>
            <th></th>
        </tr>
        <tr ng-repeat="order in orders">
            <td>{{order.id}}</td>
            <td>
                <ul>
                    <li ng-repeat="product in order.products">
                        <span class="quantity">{{product.quantity}}x</span>
                        <a href="/admin/products/edit/{{product.id}}">{{product.name}}</a>
                    </li>
                </ul>
            </td>
            <td><a href="/admin/users/edit/{{order.user.id}}">{{order.user.email}}</a></td>
            <td>
                <a href="/admin/orders/detail/{{order.id}}"><i class="fa fa-file-o"></i></a>
                <!-- <form action="/admin/orders" method="post" class="form-remove">
                    <input type="hidden" name="remove" value="{{order.id}}" />
                    <i class="fa fa-remove"></i>
                </form> -->
            </td>
        </tr>
    </table>
</div>