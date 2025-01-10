<x-layout>
    <h3 class="my-3 text-center ">Blog Create</h3>
        <div class="col-md-8 mx-auto">
            <x-card-wrapper>
                <form action="/admin/blogs/store" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input name="title" type="text" id="title" class="form-control" value="{{old('title')}}">
                        <x-error name="title"/>
                    </div>
                    <div class="mb-3">
                        <label for="slug">Slug</label>
                        <input name="slug" type="text" id="slug" class="form-control" value="{{old('slug')}}">
                        <x-error name="slug"/>
                    </div>
                    <div class="mb-3">
                        <label for="intro">Intro</label>
                        <input name="intro" type="text" id="intro" class="form-control" value="{{old('intro')}}">
                        <x-error name="intro"/>
                    </div>
                    <div class="mb-3">
                        <label for="body">Body</label>
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{old('body')}}</textarea>
                        <x-error name="body"/>
                    </div>
                    <div>
                        <label for="category">Category</label>
                        <select name="category_id" id="category" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </x-card-wrapper>
        </div>
</x-layout>
