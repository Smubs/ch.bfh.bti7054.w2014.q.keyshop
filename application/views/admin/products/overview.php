<a href="/admin/products/add"><button type="button" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp;&nbsp;Produkt hinzufügen</button></a>
<br /><br />
<div class="table-responsive table-overview">
    <table class="table table-striped" ng-controller="KeyshopProducts">
        <colgroup>
            <col width="50px">
            <col>
            <col width="60px">
        </colgroup>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th></th>
        </tr>
        <tr ng-repeat="product in products">
            <td>{{product.id}}</td>
            <td class="name"><a href="/admin/products/edit/{{product.id}}">{{product.name}}</a></td>
            <td>
                <a href="/admin/products/edit/{{product.id}}"><i class="fa fa-edit"></i></a>
                <form action="/admin/products" method="post" class="form-remove">
                    <input type="hidden" name="remove" value="{{product.id}}" />
                    <i class="fa fa-remove"></i>
                </form>
            </td>
        </tr>
    </table>
</div>