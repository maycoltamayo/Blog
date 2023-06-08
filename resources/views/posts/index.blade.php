<x-app-layout>
    <div class="container py-8">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ">
            @foreach($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif "style="background-image: url(@if($post->image)http://127.0.0.1:8000/storage/{{$post->image->url}}@else https://th.bing.com/th/id/R.b44b129dd93f41fd15e95032ded972d6?rik=3c445xi4nOcN%2bw&riu=http%3a%2f%2fk30.kn3.net%2ftaringa%2f8%2f3%2f9%2fB%2f7%2f2%2fluismi222222%2fD28.jpg&ehk=n5xYmu%2bPejImNc7k%2baupiZE4NpesYm3OiVivWQJZQ3Q%3d&risl=&pid=ImgRaw&r=0 @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach($post->tags as $tag) 
                                <a href="{{route('posts.tag',$tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                            <a href="{{route('posts.show',$post)}}">
                                {{ $post->name }}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach

        </div>

        <div class="mt-4">
            {{$posts->links()}}
        </div>

    </div>
</x-app-layout>