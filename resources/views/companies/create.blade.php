@extends('layouts.app')

@section('content')
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 48rem;">
            <div class="card-header">Add New Company</div>
            <div class="card-body">

                <a href="{{ url('/companies/') }}" style="float: right;  padding: 10px 10px;" title="Home"><button
                        class="btn btn-primary btn-sm"><i class="fa fa-home" aria-hidden="true"></i></button></a>
                <br>
                <form action="{{ url('companies') }}" method="post" id="companyform" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <label>Company Name</label></br>
                    <input type="text" name="name" id="name" class="form-control" required
                        data-parsley-pattern="[a-zA-z ]+$" data-parsley-trigger="keyup" /></br>


                    <label>Email</label></br>
                    <input type="email" name="email" id="email" class="form-control" data-parsley-type="email"
                        data-parsley-trigger="keyup"></br>

                    <label>Logo</label></br>
                    <input type="file" name="logo" class="form-control" placeholder="Logo"><br>

                    <label>Website</label></br>
                    <input type="text" name="website" id="website" class="form-control"></br>

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
        $("#companyform").parsley();
    });
</script>
