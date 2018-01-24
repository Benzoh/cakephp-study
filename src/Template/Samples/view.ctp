<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sample $sample
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sample'), ['action' => 'edit', $sample->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sample'), ['action' => 'delete', $sample->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sample->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Samples'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sample'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="samples view large-9 medium-8 columns content">
    <h3><?= h($sample->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($sample->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data2') ?></th>
            <td><?= $this->Number->format($sample->data2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data3') ?></th>
            <td><?= $sample->data3 ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Data1') ?></h4>
        <?= $this->Text->autoParagraph(h($sample->data1)); ?>
    </div>
</div>
