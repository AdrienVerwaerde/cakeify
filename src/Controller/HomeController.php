<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;

class HomeController extends AppController
{

    public function index()
    {
        $artistsTable = TableRegistry::getTableLocator()->get('Artists');
    
        $lastArtists = $artistsTable->find()
            ->orderBy(['created' => 'DESC'])
            ->limit(5)
            ->all();
    
        $this->set(compact('lastArtists'));
    }
}