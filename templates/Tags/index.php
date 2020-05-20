<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag[]|\Cake\Collection\CollectionInterface $tags
 */
?>
<div class="content">
    <ul>
    <?php foreach ($tags as $tag): ?>
        <li>
            <time><?= h($tag->created->i18nFormat('YYYY/MM/dd HH:mm:ss')) ?></time>
            <?= $this->Html->link($tag->title, ['action' => 'view', $tag->id]) ?>
        </li>
    <?php endforeach; ?>
    </ul>
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
</div>
