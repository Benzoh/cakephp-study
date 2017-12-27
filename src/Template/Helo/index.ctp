<div>
    <h3>Index Page</h3>
    <ul class="side-nav">
        <li>This is sample.</li>
    </ul>
    <p><?= $message ?></p>

    <!-- <form action="/helo/index" method="post">
        <input type="text" name="text1">
        <input type="submit">
    </form> -->

    <?= $this->Form->create(null, [
        'type' => 'post',
        'url' => [
            'controller' => 'Helo',
            'action' => 'index',
        ]
    ]) ?>
    <?= $this->Form->text('text1', [
        'value' => 'please input...'
    ]) ?>
    <?= $this->Form->submit('OK') ?>
    <?= $this->Form->end() ?>
</div>
