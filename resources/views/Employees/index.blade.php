@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        @if(Session::has('flash_message'))
        <p class="alert {{ Session::get('flash_message', 'alert-info') }}">{{ Session::get('flash_message') }}</p>
        @endif
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Employees List</div>
                <div class="card-body">

                    
                    <a href="{{ url('/employees/create') }}" class="btn btn-success btn-sm" title="Add New User" style="float: right; ">
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
                                    <th>First name</th>
                                    <th>Last Name</th>
                                    <th>Company Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>

                                </tr>
                            </thead>
                            <tbody>
                        @if(!empty($employee) && $employee->count())
                            @foreach($employee as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->first_name }}</td>
                                    <td>{{ $item->last_name }}</td>
                                    @php
                                        $company_name = App\Models\Company::Where('id','=',$item->companies_id)->select('name')->first();
                                    @endphp
                                    <td>{{ $company_name->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>

                                        <a href="{{ url('/employees/' . $item->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        <form method="POST" action="{{ url('/employees' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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
