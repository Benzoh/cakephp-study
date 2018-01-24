<table class="vertical-table">
    <tr>
        <th><?= __('Member') ?></th>
        <td>
            <?= $message->has('member') ? $this->Html->link($message->member->name, ['controller' => 'Members', 'action' => 'view', $message->member->id]) : '' ?>
        </td>
    </tr>
    <tr>
        <th><?= __('id') ?></th>
        <td><?= $this->Number->format($message->id) ?></td>
    </tr>
</table>
<div class="row">
    <h4><?= __('Title') ?></h4>
    <?= $this->Text->autoParagraph(h($message->title)); ?>
</div>
<div class="row">
    <h4><?= __('Comment') ?></h4>
    <?= $this->Text->autoParagraph(h($message->comment)); ?>
</div>
