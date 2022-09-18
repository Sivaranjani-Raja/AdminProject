@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @if(Session::has('flash_message'))
        <p class="alert {{ Session::get('flash_message', 'alert-info') }}">{{ Session::get('flash_message') }}</p>
        @endif
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Companies List</div>
                <div class="card-body">

                    
                    <a href="{{ url('/companies/create') }}" class="btn btn-success btn-sm" title="Add New User" style="float: right; ">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </a>
                    <br/>
                    <br/>
                    <br>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Company Name</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                </tr>
                            </thead>
                            <tbody>
                        @if(!empty($company) && $company->count())
                            @foreach($company as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                        <td> <img src="{{asset('storage/logo/'.$item->logo)}}" class="img-thumbnail justify-content-sm-center rounded-circle"  style="height: 50px; width: 70px;" alt="">
                                        </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->website }}</td>
                                    <td>

                                        <a href="{{ url('/companies/' . $item->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        <form method="POST" action="{{ url('/companies' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="10">There are no data.</td>
                            </tr>
                        @endif
                            </tbody>
                           
                           
                        </table>
                        <br>
                       
                        <br><br>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
