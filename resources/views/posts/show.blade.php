<x-fardelli.layout>

    <x-fardelli.navbar />


    <x-fardelli.postpanel :post="$post" />


    <!-- CONTROLLI solo per autore del post -->
    @if (Auth::check() && auth()->user()->name == $post->user->name)
        <section class="flex flex-row md:justify-start justify-around items-center gap-4 border-4 border-violet-900 rounded-3xl mt-10 md:m-10 m-2 md:px-4 px-2 md:py-4 py-2 bg-black">
            <div class="">
                <a href="/posts/{{ $post->slug }}/edit" class="h-1 p-2 text-lg text-white bg-blue-600 rounded-xl">Modifica</a>
            </div>
            <div class="">
                <form action="/posts/{{ $post->slug }}" method="POST" class="m-0 p-0">
                    @csrf
                    @method('delete')
                    <button class="p-2 text-lg text-white bg-red-600 rounded-xl">Cancella</button>
                </form>
            </div>
        </section>
    @endif

    <!-- <section class="mt-10 m-2 md:px-4 px-2 md:py-4 py-2">
    <div class="md:flex gap-6"> -->

    <!-- COMMENTS -->
    <section class="mt-10 m-2 md:px-4 px-2 md:py-4 py-2">
    <form method="POST" action="/posts/{{ $post->slug }}/comments" class="border rounded-lg">
        @csrf

        @auth()
            <h1 class="text-lg mb-4">Vuoi commentare?</h1>
            <div>
                <textarea
                    name="body"
                    id="body"
                    class="w-full text-sm rounded-lg outline-none focus:outline-none focus:ring bg-slate-100 text-slate-700"
                    placeholder="il tuo commento..."
                    required
                    ></textarea>

                @error('body')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror

            </div>
            <div>
                <button type="submit" class="p-2 my-2 text-lg text-white bg-blue-500 hover:bg-blue-600 rounded-xl">Pubblica</button>
            </div>
        @else
            <div class="font-semibold p-4">
                <a href="/register" class="hover:underline text-blue-500">Registrati</a> o <a href="/login" class="hover:underline text-blue-500">Accedi</a> per commentare.
            </div>
        @endauth

    </form>
    </section>

    <section class="md:mt-8 mt-2 overflow-hidden flex items-center justify-center mb-10">
        <div class="md:mx-4 mx-2">
            <h3 class="mb-4 text-lg md:text-2xl font-semibold text-gray-900">Commenti</h3>
            <div class="space-y-4">
            @foreach ( $post->comments as $comment )
                <x-fardelli.comment :comment="$comment"/>
            @endforeach
        </div>
    </section>

</x-fardelli.layout>