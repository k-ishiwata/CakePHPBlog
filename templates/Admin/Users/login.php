<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form">
    <?= $this->Flash->render() ?>
    <?= $this->Form->create() ?>
        <fieldset>
            <?= $this->Form->control('username', ['autofocus' => true]) ?>
            <?= $this->Form->control('password') ?>
        </fieldset>
    <?= $this->Form->button('ログイン'); ?>
    <?= $this->Form->end() ?>
</div>
