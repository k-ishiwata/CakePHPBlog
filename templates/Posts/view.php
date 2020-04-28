<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<div class="posts view content">
    <?= h($post->created->i18nFormat('YYYY/MM/dd HH:mm:ss')) ?>
    <h2><?= h($post->title) ?></h2>
    <?= $this->Text->autoParagraph(h($post->body)); ?>
    <p><small>投稿者: <?= h($post->user->username) ?></small></p>
    <hr>
    <?= $this->Html->link('一覧へ戻る', ['action' => 'index'], ['class' => 'button']) ?>
</div>
