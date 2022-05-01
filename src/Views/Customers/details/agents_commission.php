    <div style="widdiv:150px;">Lợi nhuận từ đại lý dưới quyền</div>
    <div><?= number_format($commission_from_child); ?> ₫</div>
    <table class="table table-hover table-center mb-0 datatable">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>Lợi nhuận</th>
            </tr>
            </ <thead>
        <tbody>
            <?php foreach ($child_agents as $sa) : ?>
                <tr>
                    <td><?= $sa->char . $sa->getName(); ?></td>
                    <td><?= $sa->getEmail(); ?></td>
                    <td><?= number_format($sa->sum_price); ?> ₫</td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>