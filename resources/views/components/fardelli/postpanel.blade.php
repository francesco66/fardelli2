@props(['post'])

<!-- <section class="border-4 border-violet-900 rounded-3xl mt-10 md:m-4 m-2 md:px-10 px-2 md:py-10 py-2 bg-slate-200"> -->
<section class="mt-10 m-2 md:px-4 px-2 md:py-4 py-2">

    <div class="md:flex gap-6">
        <!-- immagine -->
        <div class="pb-5 text-xs">
            @if ($post->image_path)
            <img class="md:max-w-screen-sm rounded-xl" src="{{ asset('img/posts/' . $post->image_path) }}" alt="Post image" />
            @else
            <img class="md:max-w-screen-sm rounded-xl" src="https://picsum.photos/500" alt="Post image" />
            @endif

            <!-- autore dell'immagine (opzionale) -->
            @if ($post->image_author)
            <span class="text-sm text-slate-700">foto di {{ $post->image_author }}</span>
            @endif
        </div>

        <div class="">
            <!-- titolo -->
            <h1 class="text-4xl md:text-6xl font-bold pb-6">{{ $post->title }}</h1>

            <!-- autore e data -->
            <!-- <div class="flex sm:flex-row flex-col gap-2 sm:items-center pb-6"> -->
            <div class="flex flex-wrap gap-2 sm:items-center pb-6">
                <a href="/posts/?author={{ $post->author->name }}" class="md:text-lg text-base text-slate-700">di {{ $post->author->name }}</a>
                <p class="text-sm text-slate-600">&#8226;</p>
                <p class="text-sm text-slate-600">{{ $post->created_at->formatLocalized('%d %B %Y') }}</p>
            </div>

            <!-- excerpt (opzionale) -->
            @if ($post->excerpt)
            <h1 class="text-3xl pb-3">{{ $post->excerpt }}</h1>
            @endif

            <!-- testo del post -->
            <p class="mb-4 mt-4 text-lg">{{ $post->body }}</p>
        </div>

    </div>

    <!-- previous and next -->
    {{-- <a href="{{ url() }}/blog/{{ $prev->slug }}">Previous</a>
    <a href="{{ url() }}/blog/{{ $next->slug }}">Next</a> --}}

</section>