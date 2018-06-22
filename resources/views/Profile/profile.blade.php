@include('navbar.navbar')
@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/profile.css') }}">

@section('content')
<body class="p">
    <div class="col-md-12">
        <div class="row justify-content-center">
            <ul class="nav nav-tabs">
                <h2 role="presentation">
                    <a class="profile" href="#">Profiel </a>
                </h2>
                <h2 role="presentation"><a class="profile" href="#">Geschiedenis</a></h2>
            </ul>
        </div>
        <div class="col-9 justify-content-center bg-dark">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <h1 class="profile"> Profiel</h1>
                </div>
            </div>

            <div class="row justify-content-end">
                <div class="col-md-6 bg-light">
                    <form>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Naam:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Jan Kees">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="voorbeeld@gmail.com">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Land:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Nederland">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Woonplaats:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Woonplaats">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Postcode</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="1234AB">
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Telefoon:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="06-12345678">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-date-input" class="col-2 col-form-label">Geboorte:</label>
                                <div class="col-10">
                                  <input class="form-control" type="date" id="example-date-input">
                            </div>
                        </div>
                        <button type="button" class="btn bg-success btn-lg">Bewerken</button>
                </form>
                </div>

                <div class="col-4">
                    <img src="http://suryanation.id/assets/img/profiels/unknown.png">
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <form>
                    <div class="form-group">
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </form>
            </div>
        </div>
     </div>
</body>


@endsection
