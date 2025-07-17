@extends('admin.layouts.main')

@section('css')
    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="{{ asset('admin-templates') }}/assets/vendors/choices.js/choices.min.css" />
@endsection

@section('content')
    <div class="page-heading">
        <h3>Users</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add new user</li>
            </ol>
        </nav>
    </div>
    <div class="page-content" style="min-height: 80vh">
        <section class="row">
            <div class="col-12">
                <a href="{{ route('user.index') }}" class="btn btn-outline-secondary mb-4"><i
                        class="fas fa-arrow-left"></i>Back</a>
                <div class="card shadow rounded">
                    <div class="card-header">
                        <h5 class="m-0 card-title">Add New User</h5>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="first-name" class="form-control" name="fname"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="email" id="email-id" class="form-control" name="email-id"
                                            placeholder="Email">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Mobile</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="number" id="contact-info" class="form-control" name="contact"
                                            placeholder="Mobile">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Password</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Select</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select class="choices form-select">
                                            <option value="square">Square</option>
                                            <option value="rectangle">Rectangle</option>
                                            <option value="rombo">Rombo</option>
                                            <option value="romboid">Romboid</option>
                                            <option value="trapeze">Trapeze</option>
                                            <option value="traible">Triangle</option>
                                            <option value="polygon">Polygon</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Text Area</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Switch</label>
                                    </div>
                                    <div class="form-check form-switch col-md-8">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                    </div>

                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <!-- Include Choices JavaScript -->
    <script src="{{ asset('admin-templates') }}/assets/vendors/choices.js/choices.min.js"></script>
@endsection
