<?php

namespace App\Observers;

use App\Post;
use Elasticsearch\Client;

class ElasticPostObserver
{
    //
    private $elasticSearch;

    public function __construct(Client $client)
    {
        $this->elasticSearch = $client;
    }

    public function saved(Post $model)
    {
        $this->elasticSearch->index([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->id,
            'body' => $model->toSearchArray(),
        ]);
    }

    public function deleted(Post $model)
    {
        $this->elasticSearch->delete([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->id,
        ]);
    }
}
