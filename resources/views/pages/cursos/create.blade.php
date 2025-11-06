@extends('admin.layouts.app')
@section('content')
    <h1>new category</h1>
     <div class="card">
        <div class="card-body">
            <form action="{{ route('categoryStore') }}" method="post">
                @csrf
                <div class="input-group input-group-outline mb-4">
                    <input type="text" name="name" class="form-control">
                </div>
                <input type="submit" class="btn bg-gradient-success" value="Save">
            </form>
        </div>
    </div>
@endsection