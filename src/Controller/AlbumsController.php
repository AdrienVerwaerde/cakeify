<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Albums Controller
 *
 * @property \App\Model\Table\AlbumsTable $Albums
 */
class AlbumsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Albums->find()
            ->contain(['Artists']);
        $albums = $this->paginate($query);

        $this->Authorization->skipAuthorization();

        $this->set(compact('albums'));
    }

    /**
     * View method
     *
     * @param string|null $id Album id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $album = $this->Albums->get($id, [
            'contain' => ['Artists', 'Favorites']
        ]);
        $this->Authorization->authorize($album);
        $isFavorite = false;
        
        $userId = $this->request->getAttribute('identity')?->getIdentifier();
        
        if ($userId) {
            $isFavorite = collection($album->favorites)
                ->some(fn($fav) => $fav->user_id === $userId);
        }
        
        $this->set(compact('album', 'isFavorite'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $album = $this->Albums->newEmptyEntity();
        $this->Authorization->authorize($album, 'add');

        if ($this->request->is('post')) {
            $album = $this->Albums->patchEntity($album, $this->request->getData());
            if ($this->Albums->save($album)) {
                $this->Flash->success(__('The album has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The album could not be saved. Please, try again.'));
        }
        $artists = $this->Albums->Artists->find('list', limit: 200)->all();
        $this->set(compact('album', 'artists'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Album id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $album = $this->Albums->get($id, contain: []);
        $this->Authorization->authorize($album);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $album = $this->Albums->patchEntity($album, $this->request->getData());
            if ($this->Albums->save($album)) {
                $this->Flash->success(__('The album has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The album could not be saved. Please, try again.'));
        }
        $artists = $this->Albums->Artists->find('list', limit: 200)->all();
        $this->set(compact('album', 'artists'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Album id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $album = $this->Albums->get($id);
        $this->Authorization->authorize($album);


        if ($this->Albums->delete($album)) {
            $this->Flash->success(__('The album has been deleted.'));
        } else {
            $this->Flash->error(__('The album could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        
        $this->Authentication->allowUnauthenticated(['view', 'index']);

        $this->Authorization->skipAuthorization();
    }
}
