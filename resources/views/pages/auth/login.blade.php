@extends('layouts.auth.layout')
@section('auth-content')
    <div class="w-full  flex flex-col justify-center h-full items-center gap-y-2  ">
        <div class="text-3xl font-bold"> Connexion</div>
        <div class="card lg:w-1/2 ">
            <form class="p-6" action="{{ route('login.store') }}" method="post">
                @csrf
                <div class="grid lg:grid-cols-1 gap-6">
                    <div>
                        <label for="example-email" class="text-default-800 text-sm font-medium inline-block mb-2">Adresse
                            mail</label>
                        <input type="email" id="example-email" class="form-input" placeholder="Email" name="email">
                    </div>

                    <div>
                        <label for="example-password" class="text-default-800 text-sm font-medium inline-block mb-2">Mot de
                            passe</label>
                        <input type="password" id="example-password" class="form-input" value="password" name="password">
                    </div>
                    <button class="bg-slate-800 text-white p-2 rounded font-bold">Se connnecter</button>
                </div>
            </form>
        </div>
    </div>
@endsection
