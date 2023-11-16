@extends('layouts.main')

@section('container')
    @foreach ($posts as $post)

    <div class="row">
        <div class="col-md-7">
            <form action="/posts">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="search.." name="search" >
                    <button class="btn btn-danger" type="submit" >search</button>
                  </div>
            </form>
        </div>
    </div>

    <article class="mb-5">
    <h2>
        <a href="/posts/{{ $post["slug"] }}">{{ $post["title"] }}</a>
    </h2>
    <h5>By :{{ $post["autor"] }}</h5>
    <p>{{ $post["body"] }}</p>
    </article>

        
    @endforeach
@endsection

