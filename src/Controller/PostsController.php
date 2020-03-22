<?php
declare(strict_types=1);

namespace App\Controller;

// use Cake\Network\Exception\NotFoundException;
use Cake\Http\Exception\NotFoundException;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 *
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    public $paginate = [
        'limit' => 10,
        'order' => [
            'Posts.created' => 'desc'
        ]
    ];
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $posts = $this->paginate($this->Posts->findByPublished(1));

        $this->set(compact('posts'));
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'conditions' => ['published' => 1]
        ]);

        // $post = $this->Posts->findByPublishedAndId(1, $id)->first();
        // if (empty($post)) {
        //     throw new NotFoundException(__('Post not found'));
        // }

        $this->set('post', $post);
    }
}
