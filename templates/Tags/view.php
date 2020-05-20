<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<div class="posts view content">
    <h2>「<?= h($tag->title) ?>」の投稿一覧</h2>
    <?php foreach ($posts as $post): ?>
        <p>投稿日：<time><?= h($post->created->i18nFormat('YYYY/MM/dd HH:mm:ss')) ?></time></p>
        <h3 style="margin-bottom:0"><?= h($post->title) ?></h3>
        <?= $this->Text->autoParagraph(h($post->description)); ?>
        <p><small>
            <?php if(!empty($post->tags)): ?>
            <?php foreach($post->tags as $tag): ?>
                <?= $this->Html->link($tag->title,
                    ['action' => 'view', $tag->id]);
                ?>
                <?= $tag !== end($post->tags) ? ',' : '' ?>
            <?php endforeach; ?> /
            <?php endif; ?>
            投稿者: <?= h($post->user->username) ?>
        </small></p>
        <br>
        <?=
            $this->Html->link('記事を読む',
            ['controller' => 'Posts', 'action' => 'view', $post->id],
            ['class' => 'button'])
        ?>
        <hr>
    <?php endforeach; ?>
    <?php if($this->Paginator->total() > 1): ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< 最初') ?>
            <?= $this->Paginator->prev('< 前へ') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('次へ >') ?>
            <?= $this->Paginator->last('最後 >>') ?>
        </ul>
    </div>
    <?php endif; ?>

    <?= $this->Html->link('タグ一覧へ戻る', ['action' => 'index'], ['class' => 'button']) ?>
</div>
