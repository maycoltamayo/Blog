<x-app-layout>
    <div class="container py-8">

        <h1 class="text-4xl fond-bold text-gray-600">
            {{ $post->name }}
        </h1>

        <div class="text-lg text-gray-500 mb-2">
            {!! $post->extract !!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- contenido principal --}}
            <div class="lg:col-span-2">
                <figure>
                    @if ($post->image)
                        <img class="w-full h-80 object-cover object-center"
                            src="http://127.0.0.1:8000/storage/{{ $post->image->url }}" alt="{{ $post->name }}">
                    @else
                        <img class="w-full h-80 object-cover object-center"
                            src="https://th.bing.com/th/id/R.b44b129dd93f41fd15e95032ded972d6?rik=3c445xi4nOcN%2bw&riu=http%3a%2f%2fk30.kn3.net%2ftaringa%2f8%2f3%2f9%2fB%2f7%2f2%2fluismi222222%2fD28.jpg&ehk=n5xYmu%2bPejImNc7k%2baupiZE4NpesYm3OiVivWQJZQ3Q%3d&risl=&pid=ImgRaw&r=0"
                            alt="">
                    @endif
                </figure>
                <div class="text-base text-grade-500 mt-4">
                    {!! $post->body !!}
                </div>
            </div>
            {{-- contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-grade-600 mb-4">Más en {{ $post->category->name }}</h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('posts.show', $similar) }}">
                                @if ($post->image)
                                    <img class="w-full h-80 object-cover object-center"
                                        src="http://127.0.0.1:8000/storage/{{ $similar->image->url }}"
                                        alt="{{ $post->name }}">
                                @else
                                    <img class="w-full h-80 object-cover object-center"
                                        src="https://th.bing.com/th/id/R.b44b129dd93f41fd15e95032ded972d6?rik=3c445xi4nOcN%2bw&riu=http%3a%2f%2fk30.kn3.net%2ftaringa%2f8%2f3%2f9%2fB%2f7%2f2%2fluismi222222%2fD28.jpg&ehk=n5xYmu%2bPejImNc7k%2baupiZE4NpesYm3OiVivWQJZQ3Q%3d&risl=&pid=ImgRaw&r=0"
                                        alt="">
                                @endif
                                <span class="ml-2 text-grade-600">{{ $similar->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>
