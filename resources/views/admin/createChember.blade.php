@extends('masterAdmin')
@section('chember')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Chember Management</h4>
                <h6>Add/Update Chember</h6>
            </div>
        </div>

        <form action="{{route('admin.addChember')}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Chember</label>
                                <input type="text" name="name" id="name">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" id="address">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="text" name="telephone" id="telephone">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit">Submit</a>

                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection