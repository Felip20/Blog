
<x-layout>
<x-hero />
    <x-blog-section :blogs="$blogs" :categories="$categories" :current="$currentCategory ?? null"/>
    <x-subscribe  />
  </body>
</html>
</x-layout>



