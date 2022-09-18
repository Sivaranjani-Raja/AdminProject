@extends('layouts.app')

@section('content')
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 48rem;">
            <div class="card-header">Add New Employee</div>
            <div class="card-body">

                <a href="{{ url('/employees/') }}" style="float: right;  padding: 10px 10px;" title="Home"><button
                        class="btn btn-primary btn-sm"><i class="fa fa-home" aria-hidden="true"></i></button></a>
                <br>
                <form action="{{ url('employees') }}" method="post" id="empform">
                    {!! csrf_field() !!}
                    <label>First Name</label></br>
                    <input type="text" name="first_name" id="first_name" class="form-control" required
                        data-parsley-pattern="[a-zA-z ]+$" data-parsley-trigger="keyup"></br>

                    <label>Last Name</label></br>
                    <input type="text" name="last_name" id="last_name" class="form-control" required
                        data-parsley-pattern="[a-zA-z ]+$" data-parsley-trigger="keyup"></br>


                    <label>Company Name</label></br>
                    <select class="form-select" name="companies_id" aria-label="Default select example">
                        @foreach ($company as $companies)
                            <option value="{{ $companies->id }}">{{ $companies->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <label>Email</label></br>
                    <input type="email" name="email" id="email" class="form-control" data-parsley-type="email"
                        data-parsley-trigger="keyup"></br>


                    <label>Phone Number</label></br>
                    <input type="number" name="phone" id="phone" class="form-control" data-parsley-pattern="[0-9]+$"
                        data-parsley-length="[10,13]" data-parsley-trigger="keyup"></br>


                    <input type="submit" value="Save" class="btn btn-success"></br>

                </form>

            </div>
        </div>

    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $(function() {
        $("#empform").parsley();
    });
</script>
