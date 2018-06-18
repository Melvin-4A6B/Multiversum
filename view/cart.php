<?php require_once('assets/custom/template/header.php'); ?>

<div class="container">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Prijs</th>
                <th style="width:8%">Aantal</th>
                <th style="width:22%" class="text-center">Subtotaal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-10">
                            <h4 class="nomargin">Product 1</h4>
                        </div>
                    </div>
                </td>
                <td data-th="Price">&euro;1.99</td>
                <td data-th="Quantity">
                    <input type="number" class="form-control text-center" value="1">
                </td>
                <td data-th="Subtotal" class="text-center">&euro;1.99</td>
                <td class="actions" data-th="">
                    <button class="btn btn-info btn-sm"><i class="fas fa-sync"></i></button>
                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>								
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Totaal &euro;1.99</strong></td>
            </tr>
            <tr>
                <td><a href="/cat" class="btn btn-success btn-custom"><i class="fas fa-angle-left"></i> Verder winkelen</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Totaal &euro;1.99</strong></td>
                <td><a href="#" class="btn btn-success btn-block btn-custom">Betalen <i class="fas fa-angle-right"></i></a></td>
            </tr>
        </tfoot>
    </table>
</div>

<?php require_once('assets/custom/template/footer.php'); ?>