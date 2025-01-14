
<x-layout>
    <!-- single blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{$blog->title}}</h3>
          <div>
            <div>Author - <a href="/?username={{$blog->author->username}}">{{$blog->author->name}}</a></div>
            <div><a href="/?category={{$blog->category->slug}}"><span class="badge bg-warning text-dark">{{$blog->category->name}}</span></a></div>
            <div class="text-secondary">Date - {{$blog->created_at->diffForHumans()}}</div>
            <div class="text-secondary">
                <form action="/blogs/{{$blog->slug}}/subscribe" method="POST">
                    @csrf
                    @auth
                    @if (auth()->user()->isSub($blog))
                        <button class="btn btn-danger">Unsubscribe</button>
                    @else
                        <button class="btn btn-warning">Subscribe</button>
                    @endif
                    @endauth
                </form>
            </div>
          </div>
          <p class="lh-md mt-3">
            {{$blog->body}}
          </p>
        </div>
      </div>
    </div>

    <section class="container">
        <div class="col-md-8 mx-auto">
            @auth
            <x-comments-form :blog="$blog"/>
            @else
            <p class="text-center">Please <a href="/login">Login</a> to comment the player blog.</p>
            @endauth
        </div>
    </section>

    @if ($blog->comments->count())
    <x-comment :comments="$blog->comments()->paginate(4)"/>
    @endif

    <!-- subscribe new blogs -->
    <x-blogs-you-like :randoms="$randomBlogs"/>
</x-layout>


