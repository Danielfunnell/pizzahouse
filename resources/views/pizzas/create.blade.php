@extends('layouts.app')
         
@section('content')

<div class="wrapper create-pizza">
    <h1>Create a new Pizza</h1>
    <form action="/pizzas" method="POST">
    @csrf <!--cross site fraudry Page expired: 419-->
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name">
        <label for="type">Choose Pizza type:</label>
        <select name="type" id="type">
            <option value="margarita">Margarita</option>
            <option value="hawaiian">hawaiian</option>
            <option value="veg supreme">Veg supreme</option>
            <option value="volcano">Volcano</option>
        </select>
        <label for="base">Choose Pizza type:</label>
        <select name="base" id="base">
            <option value="cheesy crust">Cheesy Crust</option>
            <option value="garlic crust">Garlic Crust</option>
            <option value="thin & crispy">Thin & Crispy</option>
            <option value="thick">Thick</option>
        </select>
        <fieldset>
            <label>Extra Toppings</label>
            <input type="checkbox" name="toppings[]" value="mushrooms">Mushrooms
            <input type="checkbox" name="toppings[]" value="peppers">Peppers
            <input type="checkbox" name="toppings[]" value="garlic">Garlic
            <input type="checkbox" name="toppings[]" value="olives">Olives
        </fieldset>
        <input type="submit" value="Order Pizza">
    </form>

</div>


@endsection