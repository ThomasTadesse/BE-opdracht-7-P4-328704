<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Producten uit het assortiment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold underline">Overzicht Producten uit het Assortiment</h1>
            
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-4 rounded">
                    {{ session('success') }}
                </div>
            @endif
            
            <form action="{{ route('magazijn.index') }}" method="GET" class="flex space-x-4">
              <!-- Dropdown voor startdatum & einddatum -->
              <div class="flex items-center space-x-4 bg-white p-4 rounded-lg shadow-md">
        <input type="text" 
               name="start_date" 
               class="rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2" 
               placeholder="Kies startdatum"
               value="{{ request('start_date') }}"
               id="start_date">
        
        <span class="text-gray-500 font-medium">tot</span>
        
        <input type="text" 
               name="end_date" 
               class="rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-2" 
               placeholder="Kies einddatum"
               value="{{ request('end_date') }}"
               id="end_date">
    </div>

                <!-- Maak Selectie Knop -->
                <button type="submit" class="bg-blue-300 text-white px-4 py-2 rounded-lg shadow hover:bg-green-300">
                    Maak selectie
                </button>
            </form>
        </div>
        
        <!-- Tabel voor Overzicht Producten -->
        @if(count($magazijnInfo) > 0)
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-400 text-white">
                        <th class="py-3 px-4 text-left">Naam Leverancier</th>
                        <th class="py-3 px-4 text-left">Contactpersoon</th>
                        <th class="py-3 px-4 text-left">Stad</th>
                        <th class="py-3 px-4 text-left">Productnaam</th>
                        <th class="py-3 px-4 text-left">Einddatum Levering</th>
                        <th class="py-3 px-4 text-left">Verwijder</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($magazijnInfo as $product)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $product->LeverancierNaam }}</td>
                            <td class="py-3 px-4">{{ $product->Contactpersoon }}</td>
                            <td class="py-3 px-4">{{ $product->Stad }}</td>
                            <td class="py-3 px-4">{{ $product->ProductNaam }}</td>
                            <td class="py-3 px-4">{{ date('d-m-Y', strtotime($product->EinddatumLevering)) }}</td>
                            <td class="py-3 px-4">
                                <a href="{{ route('magazijn.show', $product->Id) }}" class="py-1 px-2">
                                    ❌
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 my-4 rounded text-center" role="alert">
                <p>Er zijn geen leveringen geweest van producten in deze periode</p>
            </div>
        @endif
        <div class="mt-6 space-x-4">
            <a href="{{ route('welcome') }}" class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">
                Home
            </a>
        </div>
    </div>
     <!-- Flatpickr JavaScript -->
 <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        const config = {
            dateFormat: "Y-m-d",
            minDate: "2023-01-01",
            maxDate: "2024-12-31",
            locale: "nl",
            allowInput: true,
            placeholder: "Kies een datum"
        };

        flatpickr("#start_date", config);
        flatpickr("#end_date", config);
    </script>
</body>
</html>