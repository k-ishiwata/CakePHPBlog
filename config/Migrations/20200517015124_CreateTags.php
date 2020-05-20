<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTags extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('tags');
        $table->addColumn('title', 'string', [
            'limit' => 100,
            'null' => false,
        ])
        ->addColumn('created', 'datetime')
        ->addColumn('modified', 'datetime')
        ->create();

        $table = $this->table('posts_tags');
        $table->addColumn('post_id', 'integer', [
            'null' => false
        ])
        ->addColumn('tag_id', 'integer', [
            'null' => false
        ])
        ->create();
    }
}
