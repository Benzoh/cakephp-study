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
                <?php // ハッシュで帰ってこないので書き換え ?>
                <tr>
                    <?php foreach($person as $item): ?>
                        <td><?= h($item); ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
