@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

            <div class="row">
                <div class="col-sm-10">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Productos</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>
                </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Productos</div>

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
<script>
    $(document).ready( function () {
        $('#table-products').DataTable({
            "serverSide": true,
            "ajax": "{{ url('api/products') }}",
            "columns": [
                {"data": 'id'},
                {"data": 'name'},
                { render : function(data, type, row, meta) {
                    
                    return '<form action="{{ route("deleteProduct",'+data+ ') }}" method="DELETE" id="'+ data +'"><a href="#">eliminar</a></form>'
                    }
                }
            ],
          
            "columnDefs": [ {
                "targets": 2,
                "data": "id",
                
            } ]

        });

        $('#table-products').removeClass( 'display' ).addClass('table table-striped table-bordered');
    } );
</script>
@endpush

{{--  /* { render : function() {
    return '<button>edit</button>'
}
}, 
{ render : function() {
    return '<button>delete</button>'
}
}


{"render": 
function (data, type, row, meta) {
        
        return 
        '{!! Form::open(["route" => ["deleteProduct",'+ row[0]+'], "method"=>"DELETE", "id"=>'+row[0]+']) !!}'+
            ' <a href="#">eliminar</a>'+
        ' {!! Form::close() !!} ';
    }
} */  --}}
