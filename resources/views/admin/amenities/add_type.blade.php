@extends('admin.admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="row profile-body">
        <div class="col-md-4 col-xl-8 middle-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Add Amenity</h6>

                            <form method="POST" action="{{route('store.amenities')}}" class="forms-sample">
                                @csrf
                                <div class="mb-3">
                                    <label for="amenities_name" class="form-label">Amenity Name</label>
                                    <input type="text" class="form-control" name="amenities_name" id="amenities_name" required>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection