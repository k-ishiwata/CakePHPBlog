<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\Query;

/**
 * Tags Controller
 *
 * @property \App\Model\Table\TagsTable $Tags
 *
 * @method \App\Model\Entity\Tag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TagsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadModel('Posts');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'limit' => 30,
            'order' => [
                'Tags.created' => 'desc'
            ]
        ];
        $tags = $this->paginate($this->Tags->find());

        $this->set(compact('tags'));
    }

    /**
     * View method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tag = $this->Tags->get($id, [
            'contain' => ['Posts'],
        ]);

        // $posts = $this->Posts->find('all', [
        //     'contain' => ['Users', 'Tags']
        // ]);

        // $posts = $this->Posts->find()
        //     ->contain([
        //         'Users',
        //         'Tags' => function(Query $q){
        //             return $q->where(['Tags.id' => 1]);
        //         }
        //     ]);

        // ページネートするので別に取得
        // $posts = $this->Posts->find()
        //     ->contain(['Users', 'Tags'])
        //     ->matching(
        //         'Tags', function (Query $q) use ($id){
        //             return $q->where(['Tags.id' => $id]);
        //         }
        //     );

        $this->paginate = [
            'limit' => 10,
            'contain' => ['Users', 'Tags'],
            'order' => [
                'Posts.created' => 'desc'
            ]
        ];

        $posts = $this->Posts->find()
            // ->contain(['Users', 'Tags'])
            ->matching(
                'Tags', function (Query $q) use ($id){
                    return $q->where(['Tags.id' => $id]);
                }
            );

        $posts = $this->paginate($posts);

        // dd($posts->sql());
        // dd($posts->toArray());

        // https://book.cakephp.org/3/ja/orm/query-builder.html#contain


        $this->set(compact('tag', 'posts'));
    }
}
