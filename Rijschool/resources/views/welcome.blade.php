<x-layout>
    <div class="absolute top-0 right-0 m-4">
        Welkom, Manager
    </div>

    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 px-4">
        <h1 class="text-4xl font-bold mb-4">Magazijn Jamin</h1>
        <br>
        <a href="{{ route('product.index') }}" class="bg-lime-400 hover:bg-lime-300 text-white font-bold py-2 px-4 rounded">Overzicht Geleverde Producten</a>
        <br>
        <a href="{{ route('magazijn.index') }}" class="bg-sky-400 hover:bg-sky-300 text-white font-bold py-2 px-4 rounded">Overzicht Producten uit het Assortiment</a>
    </div>
</x-layout>