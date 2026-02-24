<h2>Inventory List</h2>
<a href="/inventory/create">Add Item</a>

<table border="1" cellpadding="5">
    <tr>
        <th>Name</th>
        <th>Category</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Expiry</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($items as $item): ?>
    <tr>
        <td><?= esc($item['item_name']) ?></td>
        <td><?= esc($item['category']) ?></td>
        <td><?= esc($item['quantity']) ?></td>
        <td><?= esc($item['price']) ?></td>
        <td><?= esc($item['expiry_date']) ?></td>
        <td>
            <?php if(session()->get('role') === 'admin'): ?>
                <a href="/inventory/edit/<?= $item['id'] ?>">Edit</a>
                <a href="/inventory/delete/<?= $item['id'] ?>">Delete</a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>