@extends('layout')

@section('title', 'Parkours')
@section('css', 'parkours.css')

@section('content')
    @parent

    <div class="parcour_content">

        <div class="switch_button">
            <ul>
                <li class="switch_button_1" onclick="switchEffect(1)">Personal</li>
                <li class="switch_button_2" onclick="switchEffect(2)">Public</li>
            </ul>
        </div>

        <div class="personal_parcour switched_item_1">

            <div class="parcour_segment">
                <img src="" alt="img missing" class="parcour_img">
                <div class="parcour_details">
                    <h2>Parcour name</h2>
                    <p>Parcour owner:</p>
                    <p>Distance:</p>
                </div>
            </div>

            <hr class="bar">

        </div>

        <div class="public_parcour switched_item_2">

            <div class="parcour_segment">
                <img src="" alt="img missing" class="parcour_img">
                <div class="parcour_details">
                    <h2>Parcour name</h2>
                    <p>Parcour owner:</p>
                    <p>Distance:</p>
                </div>
            </div>

            <hr class="bar">

        </div>

    </div>

@endsection