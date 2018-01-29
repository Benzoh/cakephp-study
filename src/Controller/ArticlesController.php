<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[] paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
        $this->Auth->allow(['tags']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        // $this->loadComponent('Pagenator');
        $this->paginate = [
            'contain' => ['Users']
        ];
        $articles = $this->paginate($this->Articles);
        // $articles = $this->Paginator->paginate($this->Articles->find());

        $this->set(compact('articles'));
        $this->set('_serialize', ['articles']);
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    // http://192.168.100.100/articles/view/first-post
    public function view($slug = null)
    {
        $article = $this->Articles->findBySlug($slug)->firstOrFail();

        $this->set(compact('article'));
        $this->set('_serialize', ['article']);
    }

    // public function view($id = null)
    // {
    //     $article = $this->Articles->get($id, [
    //         'contain' => ['Users', 'Tags']
    //     ]);

    //     $this->set('article', $article);
    //     $this->set('_serialize', ['article']);
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            
            $article->user_id = $this->Auth->user('id');

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        // $users = $this->Articles->Users->find('list', ['limit' => 200]);
        
        // タグのリストを取得
        $tags = $this->Articles->Tags->find('list');
        // ビューコンテキストにtagsをセット
        $this->set('tags', $tags);
        
        // $this->set(compact('article', 'users', 'tags'));
        $this->set(compact('article', $article));
        $this->set('_serialize', ['article']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($slug)
    // public function edit($id = null)
    {
        $article = $this->Articles
            ->findBySlug($slug)
            ->contain('Tags') // 関連づけられたTagsを読み込み
            ->firstOrFail();
        // $article = $this->Articles->get($id, [
        //     'contain' => ['Tags']
        // ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->getData(), [
                'accessibleFields' => ['user_id' => false]
            ]);
            // $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        // $users = $this->Articles->Users->find('list', ['limit' => 200]);
        
        // タグのリストを取得
        $tags = $this->Articles->Tags->find('list');

        // ビューコンテキストにtagsをセット
        $this->set('tags', $tags);
        
        // $this->set(compact('article', 'users', 'tags'));
        $this->set('article', $article);
        $this->set('_serialize', ['article']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($slug)
    // public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        // $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.', $article->title));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        // return $this->redirect(['action' => 'index']);
    }

    public function tags()
    {
        $tags = $this->request->getParam('pass');
        $articles = $this->Articles->find('tagged', [
            'tags' => $tags
        ]);

        $this->set([
            'articles' => $articles,
            'tags' => $tags
        ]);
    }

    // 渡された引数はメソッドのパラメーターとして渡されるので、 PHP の可変引数を使ってアクションを記述することもできる
    // public function tags(...$tags)
    // {
    //     $articles = $this->Articles->find('tagged', [
    //         'tags' => $tags
    //     ]);

    //     $this->set([
    //         'articles' => $articles,
    //         'tags' => $tags
    //     ]);
    // }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');

        if (in_array($action, ['add', 'tags'])) {
            return true;
        }

        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }

        $article = $this->Articles->findBySlug($slug)->first();

        return $article->user_id === $user['id'];
    }
}
