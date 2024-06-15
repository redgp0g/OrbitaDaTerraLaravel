<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use App\Models\Carta;
use App\Models\TipoCarta;

class HomeController extends Controller
{
    public function index($idVendedor = 38)
    {
        $cadastro = Cadastro::find($idVendedor) ?? Cadastro::find(38);
        $cartas = Carta::with('tipocarta')->get();

        return view('home/index', compact('cadastro', 'cartas'));
    }

    public function contempladas($idVendedor = 38)
    {
        $cadastro = Cadastro::find($idVendedor) ?? Cadastro::find(38);

        return view('home/contempladas', compact('cadastro'));
    }

    public function simulacao($idVendedor = 38)
    {
        $cadastro = Cadastro::find($idVendedor) ?? Cadastro::find(38);
        $tiposCarta = TipoCarta::all();

        return view('home/simulacao', compact('cadastro','tiposCarta'));
    }
}
