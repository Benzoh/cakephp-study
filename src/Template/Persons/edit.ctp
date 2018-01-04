<div>
    <h3>Edit Person</h3>
    <?= $this->Form->create($person) ?>
    <fieldset>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('name');
            echo $this->Form->input('age');
            echo $this->Form->input('mail');
        ?>
    </fieldset>
    <?= $this->Form->button('submit') ?>
    <?= $this->Form->end() ?>
</div>
