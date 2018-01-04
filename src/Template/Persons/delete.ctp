<div>
    <h3>Delete Person</h3>
    <?= $this->Form->create($person) ?>
    <fieldset>
        <p>ID: <?= h($person->id) ?></p>
        <p>NAME: <?= h($person->name) ?></p>
        <p>AGE: <?= h($person->age) ?></p>
        <p>MAIL: <?= h($person->mail) ?></p>
    </fieldset>
    <?= $this->Form->button('submit') ?>
    <?= $this->Form->end() ?>
</div>
