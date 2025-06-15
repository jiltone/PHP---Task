<!DOCTYPE html>
<html>
<head> 
    <base href="/public">
    @include('admin.css')

    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
        }
        .div_deg {
            padding-top: 30px;
        }
        .div_center {
            text-align: center;
            padding-top: 40px;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
   
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="div_center">
                    <h1 style="font-size: 40px; font-weight:bold;">Update Room</h1>
                    <p>Add New Room Details</p>

                    <form action="{{ url('edit_room',$data->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="div_deg">
                            <label>Room Number</label>
                            <input type="text" name="title " value="{{ $data->room_title }}">
                        </div>

                        <div class="div_deg">
                            <label>Description</label>
                            <textarea name="description">
                                {{ $data->description }}
                            </textarea>
                        </div>

                        <div class="div_deg">
                            <label>Price</label>
                            <input type="number" name="price" value="{{ $data->price }}">
                        </div>

                        <div class="div_deg">
                            <label>Room Type</label>
                            <select name="type">
                                <option selected value="{{ $data->room_type }}">{{ $data->room_type }}</option>
                                <option value="regular">Regular</option>
                                <option value="premium">Premium</option>
                                <option value="deluxe">Deluxe</option>
                            </select>
                        </div>

                        <div class="div_deg">
                            <label>Free Wifi</label>
                            <select name="wifi" >
                                <option selected value="{{ $data->wifi }}">{{ $data->wifi }}</option>
                                <option selected value="Yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="div_deg">
                            <label>Current Image</label>
                            <img style="margin: auto;" width="200" height="200" src="room/{{ $data->image }}" >
                        </div>

                        <div class="div_deg">
                            <label>Upload Image</label>
                            <input type="file" name="image" >
                        </div>

                        <div class="div_deg">
                            <button type="submit" class="btn btn-primary" value="Add Room">
                                Update Room
                            </button>
                        </div>
                    </form><!-- close form here -->

                </div><!-- div_center -->
            </div><!-- container-fluid -->
        </div><!-- page-header -->
    </div><!-- page-content -->

    @include('admin.footer')
</body>
</html>
