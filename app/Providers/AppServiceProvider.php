<?php

namespace App\Providers;

use App\Contracts\PostRepositoryInterface;
use App\Contracts\SearchClientInterface;
use App\Repositories\PostRepository;
use App\Services\ElasticSearch;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
//        $this->app->bind(SearchClientInterface::class, ElasticSearch::class);


        $this->app->singleton(PostRepositoryInterface::class, function($app) {
            // This is useful in case we want to turn-off our
            // search cluster or when deploying the search
            // to a live, running application at first.

            return new PostRepository(
                $app->make(Client::class)
            );
        });

        $this->bindSearchClient();

    }
    private function bindSearchClient()
    {
        $this->app->bind(Client::class, function ($app) {
            return ClientBuilder::create()
                ->setHosts(config('services.search.hosts'))
                ->build();
        });
    }
}
