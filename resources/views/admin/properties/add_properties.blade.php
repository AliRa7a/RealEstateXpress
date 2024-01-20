@extends('admin.admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="row profile-body">
        <div class="col-md-4 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Add Properties</h6>
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Property Name</label>
                                            <input type="text" name="property_name" class="form-control">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="property_status" class="form-label">Property Status</label>
                                            <select class="form-select" name="property_status" id="property_status">
                                                <option selected disabled>Select Status</option>
                                                <option value="rent">Rent</option>
                                                <option value="buy">Buy</option>
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Min Price</label>
                                            <input type="text" name="min_price" class="form-control">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Max Price</label>
                                            <input type="text" name="max_price" class="form-control">
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Main Image</label>
                                            <input type="file" name="property_thumbnail" class="form-control" onchange="mainThumbUrl(this)">
                                            <img src="" id="mainThumb">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Additional Images</label>
                                            <input type="file" id="multiImg" multiple="" name="multi_img[]" class="form-control" onchange="multiImgUrl(this)">
                                            <div class="row" id="preview_image"></div>
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Bedrooms</label>
                                            <input type="text" class="form-control" name="bedrooms">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Bathrooms</label>
                                            <input type="text" class="form-control" name="bathrooms">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Garage</label>
                                            <input type="text" class="form-control" name="garage">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Garage Size</label>
                                            <input type="text" class="form-control" name="garage_size">
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" name="city">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">State</label>
                                            <input type="text" class="form-control" name="state">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Postal Code</label>
                                            <input type="text" class="form-control" name="postal_code">
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Property Size</label>
                                            <input type="text" class="form-control" name="property_size">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Property Video</label>
                                            <input type="text" class="form-control" name="property_video">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Neighborhood</label>
                                            <input type="text" class="form-control" name="neighborhood">
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Latitude</label>
                                            <input type="text" class="form-control" name="latitude">
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Longitude</label>
                                            <input type="text" class="form-control" name="longitude">
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->
                            </form>
                            <button type="button" class="btn btn-primary submit">Submit form</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function mainThumbUrl(input) {
        var mainThumb = document.getElementById('mainThumb');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                mainThumb.src = e.target.result;
                mainThumb.style.width = '100px';
                mainThumb.style.height = '100px';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function multiImgUrl(input) {
        var previewContainer = document.getElementById('preview_image');

        previewContainer.innerHTML = '';

        if (input.files && input.files.length > 0) {
            for (var i = 0; i < input.files.length; i++) {
                var reader = new FileReader();
                var imgElement = document.createElement('img');

                reader.onload = (function(img) {
                    return function(e) {
                        img.src = e.target.result;
                        img.style.width = '100px';
                        img.style.height = '100px';
                    };
                })(imgElement);

                reader.readAsDataURL(input.files[i]);
                previewContainer.appendChild(imgElement);
            }
        }
    }
</script>

@endsection