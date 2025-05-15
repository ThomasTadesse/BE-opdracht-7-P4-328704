<x-layout>
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <h2 class="text-3xl mb-8 font-bold border-b-2 border-blue-200 pb-2">Wijzigen Voertuiggegevens</h2>

        <form action="{{ route('voertuig.update', $voertuig->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')

            {{-- Instructeur --}}
            <div class="mb-5">
                <label for="instructeur_id" class="block text-gray-700 font-semibold mb-2">Instructeur:</label>
                <select name="instructeur_id" id="instructeur_id" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach($instructeurs as $instructeur)
                        <option value="{{ $instructeur->id }}" {{ ($voertuig->instructeur_id ?? null) == $instructeur->id ? 'selected' : '' }}>
                            {{ $instructeur->voornaam }} {{ $instructeur->tussenvoegsel }} {{ $instructeur->achternaam }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Type Voertuig --}}
            <div class="mb-5">
                <label for="type_voertuig_id" class="block text-gray-700 font-semibold mb-2">Type Voertuig:</label>
                <select name="type_voertuig_id" id="type_voertuig_id" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach($typeVoertuigen as $typeVoertuig)
                        <option value="{{ $typeVoertuig->id }}" {{ ($voertuig->type_voertuig_id ?? null) == $typeVoertuig->id ? 'selected' : '' }}>
                            {{ $typeVoertuig->rijbewijsCategorie ?? $typeVoertuig->type_naam ?? $typeVoertuig->name ?? 'Type ' . $typeVoertuig->id }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Type --}}
            <div class="mb-5">
                <label for="type" class="block text-gray-700 font-semibold mb-2">Type:</label>
                <input type="text" name="type" id="type" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $voertuig->type }}">
            </div>

            {{-- Bouwjaar --}}
            <div class="mb-5">
                <label for="bouwjaar" class="block text-gray-700 font-semibold mb-2">Bouwjaar:</label>
                <input type="date" name="bouwjaar" id="bouwjaar" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $voertuig->bouwjaar }}">
            </div>

            {{-- Brandstof --}}
            <div class="mb-5">
                <label class="block text-gray-700 font-semibold mb-2">Brandstof:</label>
                <div class="flex space-x-6">
                    <div class="flex items-center">
                        <input class="mr-2 h-5 w-5 text-blue-600" type="radio" name="brandstof" value="Diesel" {{ $voertuig->brandstof == 'Diesel' ? 'checked' : '' }}>
                        <label class="text-gray-700">Diesel</label>
                    </div>
                    <div class="flex items-center">
                        <input class="mr-2 h-5 w-5 text-blue-600" type="radio" name="brandstof" value="Benzine" {{ $voertuig->brandstof == 'Benzine' ? 'checked' : '' }}>
                        <label class="text-gray-700">Benzine</label>
                    </div>
                    <div class="flex items-center">
                        <input class="mr-2 h-5 w-5 text-blue-600" type="radio" name="brandstof" value="Elektrisch" {{ $voertuig->brandstof == 'Elektrisch' ? 'checked' : '' }}>
                        <label class="text-gray-700">Elektrisch</label>
                    </div>
                </div>
            </div>

            {{-- Kenteken --}}
            <div class="mb-5">
                <label for="kenteken" class="block text-gray-700 font-semibold mb-2">Kenteken:</label>
                <input type="text" name="kenteken" id="kenteken" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $voertuig->kentkenen ?? $voertuig->kenteken ?? '' }}">
            </div>

            {{-- Submit --}}
            <div class="flex items-center justify-between mt-8">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">Wijzig</button>
                <a href="{{ route('voertuig.index') }}" class="px-6 py-2 bg-gray-300 text-gray-700 font-semibold rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">Annuleren</a>
            </div>
        </form>
    </div>
</x-layout>