<?= $this->Form->create($message) ?>
<fieldset>
    <legend>
        <?= __('Add Message') ?>
    </legend>
    <?php
        echo $this->Form->input('members_id', ['options' => $members]);
        echo $this->Form->input('title');
        echo $this->Form->input('comment');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

