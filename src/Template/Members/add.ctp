<?= $this->Form->create($member) ?>
<fieldset>
    <legend><?= __('Add Member') ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->input('mail');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
