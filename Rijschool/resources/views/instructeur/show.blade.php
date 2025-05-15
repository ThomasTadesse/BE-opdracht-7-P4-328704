<x-layout>
    <div class="absolute top-0 right-0 m-4">
        Welkom, Praktijkmanagement
    </div>
    
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl mb-6 font-bold underline">Door Instructeur gebruikte voertuigen</h1>
        
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded p-6 mb-6">
            <h2 class="text-2xl font-bold mb-4">
                {{ $instructeurData->voornaam }} 
                {{ $instructeurData->tussenvoegsel }} 
                {{ $instructeurData->achternaam }}
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p><span class="font-semibold">Mobiel:</span> {{ $instructeurData->mobiel }}</p>
                    <p><span class="font-semibold">Datum in dienst:</span> {{ $instructeurData->datum_in_dienst }}</p>
                </div>
                <div>
                    <p>
                        <span class="font-semibold">Aantal sterren:</span>
                        @for($i = 0; $i < $instructeurData->aantal_sterren; $i++)
                            ⭐
                        @endfor
                    </p>
                </div>
            </div>
        </div>

        <div class="mb-6">
            <a href="{{ route('voertuig.create', $instructeurData->id) }}" class="bg-green-400 hover:bg-green-500 text-white font-bold py-2 px-4 rounded">
                Toevoegen Voertuig
            </a>
        </div>
        
        @if(count($voertuigen) > 0)
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden mb-6">
                <thead>
                    <tr class="bg-gray-400 text-white">
                        <th class="py-3 px-4 text-left">Type Voertuig</th>
                        <th class="py-3 px-4 text-left">Type</th>
                        <th class="py-3 px-4 text-left">Kenteken</th>
                        <th class="py-3 px-4 text-left">Bouwjaar</th>
                        <th class="py-3 px-4 text-left">Brandstof</th>
                        <th class="py-3 px-4 text-left">Rijbewijscategorie</th>
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
                                <a href="{{ route('voertuig.edit', $voertuig->id) }}" class="text-blue-500 hover:text-blue-700">
                                    ✏️
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 my-4 rounded">
                Deze instructeur heeft geen voertuigen toegewezen.
            </p>
        @endif

        <div class="flex space-x-4">
            <a href="{{ route('instructeur.index') }}" class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">
                Terug naar overzicht
            </a>
            <form action="{{ route('instructeur.destroy', $id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-4 rounded" 
                        onclick="return confirm('Weet je zeker dat je deze instructeur wilt verwijderen?')">
                    Verwijderen
                </button>
            </form>
        </div>
    </div>
</x-layout>
