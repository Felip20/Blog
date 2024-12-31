@props(['blog'])
<x-card-wrapper >
    <form action="/blogs/{{$blog->slug}}/comments" method="POST">
        @csrf
        <div class="form-group mb-3">
         <textarea name="text" id="" class="form-control border border-0" cols="10" rows="5" placeholder="Say Something.."></textarea>
        <x-error name="text"/>
        </div>
        <div class="d-flex justify-content-end">
         <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>
</x-card-wrapper>
