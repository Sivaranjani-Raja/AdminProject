@extends('layouts.app')

@section('content')


    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card" style="width: 48rem;">
            <div class="card-header">Add New Company</div>
            <div class="card-body">

                <a href="{{ url('/companies/') }}" style="float: right;  padding: 10px 10px;" title="Home"><button
                        class="btn btn-primary btn-sm"><i class="fa fa-home" aria-hidden="true"></i></button></a>
                <br>
                <form action="{{ url('companies/' . $company->id) }}" method="post" id="companyform"
                    enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    @method('PATCH')
                    <input type="hidden" name="id" id="id" value="{{ $company->id }}" id="id" />
                    <label>Company Name</label></br>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}"
                        data-parsley-pattern="[a-zA-z ]+$" data-parsley-trigger="keyup"></br>


                    <label>Email</label></br>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $company->email }}"
                        data-parsley-type="email" data-parsley-trigger="keyup"></br>


                    <label>Logo</label></br>
                    <input type="file" name="logo" class="form-control" placeholder="Logo"><br>
                    <img src="{{ asset('storage/logo/' . $company->logo) }}"
                        class="img-thumbnail justify-content-sm-center rounded-circle" style="height: 100px; width: 100px;"
                        alt=""><br>


                    <label>Website</label></br>
                    <input type="text" name="website" id="website" class="form-control"
                        value="{{ $company->website }}"></br>

                    <input type="submit" value="Update" class="btn btn-success"></br>

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
