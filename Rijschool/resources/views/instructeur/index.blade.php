<x-layout>
    <div class="absolute top-0 right-0 m-4">
        Welkom, Praktijkmanagement
    </div>
            <h1 class="text-3xl mb-6 font-bold underline">Instucteurs in dienst</h1>
            
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-4 rounded">
                    {{ session('success') }}
                </div>
            @endif
        
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-400 text-white">
                        <th class="py-3 px-4 text-left">Voornaam</th>
                        <th class="py-3 px-4 text-left">Tussenvoegsel</th>
                        <th class="py-3 px-4 text-left">Achternaam</th>
                        <th class="py-3 px-4 text-left">Mobiel</th>
                        <th class="py-3 px-4 text-left">Datum in dienst</th>
                        <th class="py-3 px-4 text-left">Aantal sterren</th>
                        <th class="py-3 px-4 text-left">Voertuigen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($instructeurs as $instructeur)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $instructeur->voornaam }}</td>
                            <td class="py-3 px-4">{{ $instructeur->tussenvoegsel }}</td>
                            <td class="py-3 px-4">{{ $instructeur->achternaam }}</td>
                            <td class="py-3 px-4">{{ $instructeur->mobiel }}</td>
                            <td class="py-3 px-4">{{ $instructeur->datum_in_dienst }}</td>
                            <td class="py-3 px-4">
                                @for($i = 0; $i < $instructeur->aantal_sterren; $i++)
                                    ⭐
                                @endfor
                           
                            <td class="py-3 px-4">
                                <a href="" class="py-1 px-2">
                                    🚘
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mb-6 ml-6 space-x-4">
            <a href="{{ route('home') }}" class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">
                Home
            </a>
        </div>

    </div>
</x-layout>