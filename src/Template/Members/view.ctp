<div class="row">
    <h4><?= __('Name') ?></h4>
    <?= $this->Text->autoParagraph(h($member->name)); ?>
</div>

<div class="row">
    <h4><?= __('Mail') ?></h4>
    <?= $this->Text->autoParagraph(h($member->mail)); ?>
</div>

<table cellpadding="0" cellspacing="0">
    <tr>
        <th><?= __('id') ?></th>
        <th><?= __('Members Id') ?></th>
        <th><?= __('Title') ?></th>
        <th><?= __('Comment') ?></th>
        <th class="actions"><?= __('Actions') ?></th>
    </tr>
    <?php foreach ($member->messages as $messages): ?>
    <tr>
        <td><?= h($messages->id) ?></td>
        <td><?= h($messages->members_id) ?></td>
        <td><?= h($messages->title) ?></td>
        <td><?= h($messages->comment) ?></td>
        <td class=""actions>
            <?= $this->Html->link(__('View'),
                [
                    'controller' => 'Messages',
                    'action' => 'view', $messages->id
                ]
            ) ?>
            <?= $this->Html->link(__('Edit'),
                [
                    'controller' => 'Messages',
                    'action' => 'edit', $messages->id
                ]
            ) ?>

            <?= $this->Form->postLink(__('Delete'),
                [
                    'controller' => 'Messages',
                    'action' => 'delete', $messages->id
                ],
                [
                    'confirm' => __('Are you sure you want to delete #{0}?', $messages->id)
                ]
            ) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
