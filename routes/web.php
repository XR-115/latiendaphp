<?php

use Illuminate\Support\Facades\Route;
//dependencia al controlador
use App\Http\Controllers\ProductoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//PRIMERA RUTA LARAVEL
Route::get('Hola', function(){
   echo  "Hola mis amiguitos uwu";
});

//SEGUNDA RUTA LARAVEL
Route::get('arreglos', function(){
    echo  "ANTES";
    $estudiante =["NU"=>"Nicouwu",
                "AN"=>"Andrea",
                "PD"=>"Pedro"];
    echo "<pre>";
    var_dump($estudiante);
    echo "</pre>";
    echo "<hr />";

    //AGREGAR UN NUEVO CAMPO QUE EN ESTE CASO SERÍA UN CAMPO NUEVO
    echo  "DESPUÉS";
    $estudiante["KV"] = "Kevin";
    echo "<pre>";
    var_dump($estudiante);
    echo "</pre>";
    echo "<hr />";

    //BORRAR UN CAMPO NUEVO
    echo  "BORRANDO UN CAMPO";
    unset($estudiante["PD"]);
    echo "<pre>";
    var_dump($estudiante);
    echo "</pre>";
    echo "<hr />";
 });
 
 //TERCERA RUTA EN LARAVEL
 Route::get('paises', function(){
    $paises =["Colombia"=>["capital" => "Bogotá",
                        "moneda" => "Peso",
                        "poblacion" =>51.6,
                        "ciudades" =>[
                            "Bogotá",
                            "Medellín",
                            "Cali"
                        ]
                    ],
            "Peru"=>["capital" => "Lima",
                        "moneda" => "Sol",
                        "poblacion" =>32.97,
                        "ciudades" =>[
                            "Arequipa",
                            "Cuzco"
                        ]
                    ],

            "Paraguay"=>["capital" => "Asuncion",
                        "moneda" => "Guarani",
                        "poblacion" =>7.1,
                        "ciudades" =>[
                            "Ciudad del Este"
                        ]
                    ],
            ];

            

//Para recorrer el array
//    foreach($paises as $pais =>$infopais ){
    
//     echo "<h1> $pais </h1>";
//         foreach($infopais as $clave => $valor){
//             echo "$clave : $valor<br/>";
            
//         }
//     echo "<hr />";
//     }

    //Mostrar la vista de paises
    return view("países")
        ->with("paises" , $paises);
 });

Route::get('prueba' , function(){
    return view('layouts.menu');
});

// Route::get('prueba1' , function(){
//     return view('productos.new');
// });

//RUTAS REST 
Route::resource('productos' , ProductoController::class);