
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
            <x-card-wrapper >
                <form action="/blogs/{{$blog->slug}}/comments" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                     <textarea name="text" id="" class="form-control border border-0" cols="10" rows="5" placeholder="Say Something.."></textarea>
                     @error('text')
                         <p class="text-danger">{{$message}}</p>
                     @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                     <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
            </x-card-wrapper>
            @else
            <p class="text-center">Please <a href="/login">Login</a> to comment the player blog.</p>
            @endauth
        </div>
    </section>

    <x-comment :comments="$blog->comments"/>
    <!-- subscribe new blogs -->
<x-subscribe></x-subscribe>
    <x-blogs-you-like :randoms="$randomBlogs"/>
</x-layout>


