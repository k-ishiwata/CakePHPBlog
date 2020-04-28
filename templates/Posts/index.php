<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
?>
<div class="content">
    <?php foreach ($posts as $post): ?>
        <p>投稿日：<time><?= h($post->created->i18nFormat('YYYY/MM/dd HH:mm:ss')) ?></time></p>
        <h3 style="margin-bottom:0"><?= h($post->title) ?></h3>
        <?= $this->Text->autoParagraph(h($post->description)); ?>
        <p><small>投稿者: <?= h($post->user->username) ?></small></p>
        <br>
        <?= $this->Html->link('記事を読む', ['action' => 'view', $post->id], ['class' => 'button']) ?>
        <hr>
    <?php endforeach; ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< 最初') ?>
            <?= $this->Paginator->prev('< 前へ') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('次へ >') ?>
            <?= $this->Paginator->last('最後 >>') ?>
        </ul>
    </div>
</div>
