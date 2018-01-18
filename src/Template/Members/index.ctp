<table>
<tbody>
<?php foreach ($members as $member): ?>
<tr>
    <td><?= $this->Number->format($member->id) ?></td>
    <td><?= __($member->name) ?></td>
    <td class="actions">
        <?= $this->HTML->link(__('View'), ['action' => 'view', $member->id]) ?>
        <?= $this->HTML->link(__('Edit'), ['action' => 'edit', $member->id]) ?>
        <?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $member->id],
            ['confirm' => __('Are you sure you want to delete #{0}?', $member->id)]
        ) ?>
    </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
