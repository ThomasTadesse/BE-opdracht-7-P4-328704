<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Allergenen</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 underline">Product</h1>
        
        @if(count($productInfo) > 0)
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <table class="min-w-full">
                    <tbody>
                        <tr class="border-b">
                            <td class="py-2 font-bold">Naam Product:</td>
                            <td class="py-2">{{ $productInfo[0]->ProductNaam }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 font-bold">Barcode:</td>
                            <td class="py-2">{{ $productInfo[0]->Barcode }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 font-bold">Gluten:</td>
                            <td class="py-2">{{ $productInfo[0]->BevatGluten ? 'Ja' : 'Nee' }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 font-bold">Gelatine:</td>
                            <td class="py-2">{{ $productInfo[0]->BevatGelatine ? 'Ja' : 'Nee' }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 font-bold">AZO-kleurstoffen:</td>
                            <td class="py-2">{{ $productInfo[0]->BevatAZOKleurstoffen ? 'Ja' : 'Nee' }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 font-bold">Soja:</td>
                            <td class="py-2">{{ $productInfo[0]->BevatSoja ? 'Ja' : 'Nee' }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 font-bold">Lactose:</td>
                            <td class="py-2">{{ $productInfo[0]->BevatLactose ? 'Ja' : 'Nee' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex space-x-4">
                <form action="{{ route('magazijn.destroy', $productInfo[0]->Id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                        Bevestig Verwijderen
                    </button>
                </form>
                
                <a href="{{ route('magazijn.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                    Annuleren
                </a>
            </div>
        @else
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4">
                Product niet gevonden
            </div>
        @endif
    </div>
</body>
</html>
