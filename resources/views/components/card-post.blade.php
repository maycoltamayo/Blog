@props(['post'])
<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden mt-3">
    @if ($post->image)
        <img class="w-full h-80 object-cover object-center"  src="{{ asset('storage/' . $post->image->url) }}"
            alt="{{ $post->name }}">
    @else
        <img class="w-full h-80 object-cover object-center"
            src="https://th.bing.com/th/id/R.b44b129dd93f41fd15e95032ded972d6?rik=3c445xi4nOcN%2bw&riu=http%3a%2f%2fk30.kn3.net%2ftaringa%2f8%2f3%2f9%2fB%2f7%2f2%2fluismi222222%2fD28.jpg&ehk=n5xYmu%2bPejImNc7k%2baupiZE4NpesYm3OiVivWQJZQ3Q%3d&risl=&pid=ImgRaw&r=0"
            alt="">
    @endif
    
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-3">
            <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
        </h1>
        <div class="text-gray-700 text-base">
            {!! $post->stract !!}
        </div>
    </div>

    <div class="px-6 pt-4 mb-2">
        @foreach ($post->tags as $tag)
            <a href="{{ route('posts.tag', $tag) }}"
                class="inline-block bg-gray-200 rounded-full px-3 py-1 
          text-sm text-gray-700 mr-2">{{ $tag->name }}</a>
        @endforeach
    </div>
</article>
