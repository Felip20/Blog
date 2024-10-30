<x-layout>
    <x-slot name="title">
        <title>All blogs</title>
    </x-slot>
        @foreach($blogs as $blog)
        <h1><a href="blogs/{{$blog->slug}}">
            {{$blog->title}}</a>
        </h1>
        <div>
            <p>
                Tested at - {{$blog->date}}
            </p>
            <p>
                {{$blog->intro}}
            </p>
        </div>
        @endforeach
</x-layout>


