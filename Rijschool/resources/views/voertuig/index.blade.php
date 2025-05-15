<x-layout>
    <div class="absolute top-0 right-0 m-4">
        Welkom, Praktijkmanagement
    </div>
    <div class="container mt-5">
        <h1 class="text-3xl mb-6 font-bold underline">Alle beschikbare voertuigen</h1>
        
        
        <h2 class="text-2xl mb-4">Naam: </h2>
        <h2 class="text-2xl mb-4">Datum in dienst: </h2>
        <h2 class="text-2xl mb-4">Aantal sterren: </h2>
        
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 my-4 rounded">
                {{ session('error') }}
            </div>
        @endif
        
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-400 text-white">
                    <th class="py-3 px-4 text-left">Type Voertuig</th>
                    <th class="py-3 px-4 text-left">Type</th>
                    <th class="py-3 px-4 text-left">Kenteken</th>
                    <th class="py-3 px-4 text-left">Bouwjaar</th>
                    <th class="py-3 px-4 text-left">Brandstof</th>
                    <th class="py-3 px-4 text-left">Rijbewijscategorie</th>
                    <th class="py-3 px-4 text-left">Toevoegen</th>
                    <th class="py-3 px-4 text-left">Wijzigen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($voertuigen as $voertuig)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4">{{ $voertuig->type_voertuig }}</td>
                        <td class="py-3 px-4">{{ $voertuig->type }}</td>
                        <td class="py-3 px-4">{{ $voertuig->kentkenen }}</td>
                        <td class="py-3 px-4">{{ $voertuig->bouwjaar }}</td>
                        <td class="py-3 px-4">{{ $voertuig->brandstof }}</td>
                        <td class="py-3 px-4">{{ $voertuig->rijbewijscategorie }}</td>
                        <td class="py-3 px-4">
                            <a href="{{ route('voertuig.create', $voertuig->id) }}" class="py-1 px-2">
                                ➕
                            </a>
                        </td>
                        <td class="py-3 px-4">
                            <a href="{{ route('voertuig.edit', $voertuig->id) }}" class="py-1 px-2">
                                ✏️
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6 space-x-4 mt-4">
        <a href="{{ route('home') }}" class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">
            Home
        </a>
    </div>
</x-layout>