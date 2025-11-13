@extends('pages.layouts.app')

@section('content')

<style>
    .profile-card {
        border-radius: 18px;
        padding: 30px;
        background: #fff;
        border-left: 6px solid #ff9800;
        box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        max-width: 650px;
        margin: 0 auto;
    }

    .profile-title {
        font-weight: 900;
        margin-bottom: 5px;
        font-size: 2rem;
    }

    .profile-subtitle {
        color: #777;
        margin-bottom: 25px;
    }

    .profile-item {
        margin-bottom: 15px;
        padding-bottom: 8px;
        border-bottom: 1px solid #eee;
    }

    .profile-label {
        font-weight: bold;
        color: #555;
    }

    .profile-value {
        color: #333;
        font-size: 17px;
        margin-left: 5px;
    }

    .btn-edit {
        background-color: #ff9800;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
        color: white;
    }

    .btn-edit:hover {
        background-color: #e68900;
    }
</style>

<div class="profile-card">

    <h1 class="profile-title">Mi Perfil</h1>
    <p class="profile-subtitle">
        Aquí puedes ver tu información personal dentro de PlatziUnab.
    </p>

    <!-- Nombre -->
    <div class="profile-item">
        <span class="profile-label">Nombre:</span>
        <span class="profile-value">{{$user->name}}</span>
    </div>

    <!-- Correo -->
    <div class="profile-item">
        <span class="profile-label">Correo:</span>
        <span class="profile-value">{{$user->email}}</span>
    </div>

    <!-- Rol -->
    <div class="profile-item">
        <span class="profile-label">Rol:</span>
        <span class="profile-value">{{$user->getRoleNames()->first()}}</span>
    </div>

    <!-- Fecha de Registro -->
    <div class="profile-item">
        <span class="profile-label">Miembro desde:</span>
        <span class="profile-value">{{$user->created_at}}</span>
    </div>


@endsection