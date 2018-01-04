<div>
    <h3>Find Person</h3>
    <?= $msg ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->input('find'); ?>
        <?= $this->Form->button('Submit'); ?>
        <?= $this->Form->end(); ?>
    </fieldset>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>NAME</td>
                <td>AGE</td>
                <td>MAIL</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($persons as $person): ?>
                <tr>
                    <td><?= h($person->id); ?></td>
                    <td><?= h($person->name); ?></td>
                    <td><?= h($person->age); ?></td>
                    <td><?= h($person->mail); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
