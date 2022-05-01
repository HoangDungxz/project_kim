<div style="width:150px;">Lợi nhuận từ bán hàng</div>
<div><?= number_format($sale_agent->sum_price); ?> ₫</div>
<table class="table table-hover table-center mb-0 datatable">
    <thead>
        <tr>
            <th>Sản phẩm</th>
            <th>Lợi nhuận</th>
            <th>Ngày đặt</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sale_success as $sa) : ?>
            <tr>

                <td><?= $sa->products_name; ?></td>
                <td><?= number_format($sa->commission); ?> ₫</td>
                <td><?= $sa->orders_date; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>