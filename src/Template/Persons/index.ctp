<div>
    <h3>List Persons</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>AGE</th>
                <th>MAIL</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($persons as $person): ?>
                <tr>
                    <td><?= h($person->id) ?></td>
                    <td><?= h($person->name) ?></td>
                    <td><?= h($person->age) ?></td>
                    <td><?= h($person->mail) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->Paginator->first('<< first'); ?>
    <?= $this->Paginator->prev('< prev'); ?>
    <?= $this->Paginator->numbers(); ?>
    <?= $this->Paginator->next('next >'); ?>
    <?= $this->Paginator->last('last >>'); ?>
</div>
