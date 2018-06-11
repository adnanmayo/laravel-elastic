@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Articles <small>({{ $posts->count() }})</small>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="container">
                                            <form action="{{ url('search') }}" method="get">
                                                <div class="form-group">
                                                    <input
                                                            type="text"
                                                            name="q"
                                                            class="form-control"
                                                            placeholder="Search..."
                                                            value="{{ request('q') }}"
                                                    />
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="container">
                                            @forelse ($posts as $post)
                                                <article>
                                                    <h2>{{ $post->title }}</h2>

                                                    <p>{{ $post->body }}</p>

                                                    <p class="well">
                                                        {{ implode(', ', $post->tags ?: []) }}
                                                    </p>
                                                </article>
                                            @empty
                                                <p>No articles found</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
