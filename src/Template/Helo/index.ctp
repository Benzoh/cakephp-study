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
    <?= $this->Form->password('pw') ?>
    <?= $this->Form->hidden('hide',['value' => 'hide message']) ?>
    <?= $this->Form->textarea('area') ?>
    <?= $this->Form->checkbox('check', ['id' => 'check']) ?>
    <?= $this->Form->label('check', 'check!!') ?>

    <?= $this->Form->radio('radio', [
        ['value' => '男', 'text'=> 'male', 'checked' => true],
        ['value' => '女', 'text'=> 'female'],
    ]) ?>

    <?= $this->Form->select('select', [
        ['value' => 'Mac', 'text' => 'Mac OS X'],
        ['value' => 'Windows', 'text' => 'Windows 10'],
        ['value' => 'Linux', 'text' => 'Linux'],
    ]) ?>

    <?= $this->Form->select('select2', [
        ['value' => 'Mac', 'text' => 'Mac OS X'],
        ['value' => 'Windows', 'text' => 'Windows 10'],
        ['value' => 'Linux', 'text' => 'Linux'],
    ], ['multiple' => true]) ?>


    <?= $this->Form->submit('OK') ?>
    <?= $this->Form->end() ?>
</div>
