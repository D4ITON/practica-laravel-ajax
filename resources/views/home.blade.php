@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <p>
                        <span id="products_total">{{ $products_total }}</span>
                    </p>

                    <div id="alert" class="alert alert-warning alert-dismissible" role="alert">
                        <p id="alert-info"></p>
                        <button id="btn-destroy" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    {{-- table section --}}
                    <table id="table-products" class="table table-hover display">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">option</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                <tr>
                                    <th scope="row">{{ $producto->id }}</th>
                                    <td><label for="{{ $producto->id }}">{{ $producto->name }}</label></td>
                                    <td>
                                        {{-- <form method="DELETE" action="{{ route('destroyProduct',$producto->id) }}">
                                            <a href="#">eliminar</a>
                                        </form> --}}
                                        {!! Form::open(['route' => ['deleteProduct', $producto->id], 'method'=>'DELETE', 'id'=>$producto->id]) !!}
                                            <a href="#">eliminar</a>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                         
                    {{-- fin table section --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')


@endpush


@push('scripts')

@endpush