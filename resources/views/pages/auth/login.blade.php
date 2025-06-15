@extends('layouts.auth.layout')
@section('auth-content')
    <div class="w-1/2 bg-red-300 p-3">
        <div class="card ">
            <div class="p-6 ">
                <div class="grid lg:grid-cols-2 gap-6">
                    <div>
                        <label for="example-email"
                            class="text-default-800 text-sm font-medium inline-block mb-2">Email</label>
                        <input type="email" id="example-email" name="example-email" class="form-input" placeholder="Email">
                    </div>

                    <div>
                        <label for="example-password"
                            class="text-default-800 text-sm font-medium inline-block mb-2">Password</label>
                        <input type="password" id="example-password" class="form-input" value="password">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
