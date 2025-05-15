<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voertuigen Overzicht</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Voertuigen Overzicht</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Type Voertuig</th>
                    <th>Type</th>
                    <th>Kenteken</th>
                    <th>Bouwjaar</th>
                    <th>Brandstof</th>
                    <th>Rijbewijscategorie</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($voertuigen as $voertuig)
                    <tr>
                        <td>{{ $voertuig->type_voertuig }}</td>
                        <td>{{ $voertuig->type }}</td>
                        <td>{{ $voertuig->kentkenen }}</td>
                        <td>{{ $voertuig->bouwjaar }}</td>
                        <td>{{ $voertuig->brandstof }}</td>
                        <td>{{ $voertuig->rijbewijscategorie }}</td>
                        <td>
                            <a href="{{ route('voertuig.edit', $voertuig->id) }}" class="btn btn-sm btn-primary">Bewerken</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
