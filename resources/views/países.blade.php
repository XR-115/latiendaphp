<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola buenas tardes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" 
    integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-dark text-info">
    <h1>PAÍSES :D</h1>
        <table class="table table-striped bg-white">                                                                                                                                                   
            <thead>
                <tr>
                    <th class="text-primary"> 
                        País
                    </th>
                    <th class="text-secondary">
                        Capital
                    </th>
                    <th class="text-success">
                        Moneda
                    </th>
                    <th class="text-info">
                        Poblacion
                    </th>
                    <th class="text-warning">
                        Ciudades
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($paises as $pais => $infopais)
                <tr>
                    <td rowspan='{{ count($infopais["ciudades"]) }}'>{{ $pais }}</td>

                    <td rowspan='{{ count($infopais["ciudades"]) }}'>{{ $infopais["capital"] }}</td>

                    <td rowspan='{{ count($infopais["ciudades"]) }}'>{{ $infopais["moneda"] }}</td>

                    <td rowspan='{{ count($infopais["ciudades"]) }}'>{{ $infopais["poblacion"] }}</td>
                    
                    @foreach($infopais["ciudades"] as $ciudad) 
                    
                        <td class="bg-info">{{$ciudad}}</td>
                    </tr>
                    @endforeach
                    
                @endforeach
            </tbody>
            <tfoot></tfoot>
        </table>
</body>
</html>