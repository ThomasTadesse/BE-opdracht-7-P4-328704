<x-layout>
    <div class="absolute top-0 right-0 m-4">
        Welkom, Praktijkmanagement
    </div>

    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 px-4">
        <h1 class="text-4xl font-bold mb-4">Rijschool</h1>
        <br>
        <a href="{{ route('instructeur.index') }}" class="bg-sky-400 hover:bg-sky-300 text-white font-bold py-2 px-4 rounded">Instructeurs in dienst</a>
        <br>
        <a href="{{ route('voertuig.index') }}" class="bg-rose-400 hover:bg-rose-300 text-white font-bold py-2 px-4 rounded">Voertuigen in beslag</a>
    </div>
</x-layout>