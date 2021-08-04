<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;
use App\Csv;

//require_once 'vendor/portphp/autoload.php';
use Port\Csv\CsvReader;
use Port\Writer\DbalWriter;


class PizzaController extends Controller
{   
    // Can use method to below to auth every route 
    // public function __construct() {
    //     $this->middleware('auth');
    // }


    public function index() {
          // $pizzas = Pizza::all();
          //$pizzas = Pizza::orderBy('name', 'desc')->get(); // have to add get method to get records  
          //$pizzas = Pizza::where('type', 'Hawaiian')->get();
          $pizzas = Pizza::latest()->get();


    return view('pizzas.index', [
        "pizzas" => $pizzas,
        ]);
    }

    public function show($id) {

        $pizza = Pizza::findOrFail($id); //404 page if dosent exist

        return view('pizzas.show', ['pizza' => $pizza]);
    }

    public function create() {
        return view ('pizzas.create');
    }

    public function store() {

        $pizza = new Pizza();

        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->toppings = request('toppings');

        $pizza->save();

        return redirect('/')->with('mssg', 'Thanks for your order');
    }

    public function destroy($id) {

        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect('/pizzas');
    }

    public function update() {
        //get file

       $file = new \SplFileObject('../app/Csv/stock-reset.csv');

       $delimiter = ';';
       $enclosure = '"';
       $escape = '\\'; 

       $reader = new CsvReader($file, $delimiter, $enclosure, $escape);
       $reader->setHeaderRowNumber(0);
   
       
       
       return view('pizzas.update', ['reader' => $reader]);
    }
}
