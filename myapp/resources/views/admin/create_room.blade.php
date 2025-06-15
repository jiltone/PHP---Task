<!DOCTYPE html>
<html>
<head> 
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
                    <h1 style="font-size: 40px; font-weight:bold;">Add Room</h1>
                    <p>Add New Room Details</p>

                    <form action="{{url('add_room')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_deg">
                            <label>Room Number</label>
                            <input type="text" name="room_title">
                        </div>

                        <div class="div_deg">
                            <label>Description</label>
                            <textarea name="description"></textarea>
                        </div>

                        <div class="div_deg">
                            <label>Price</label>
                            <input type="number" name="price">
                        </div>

                        <div class="div_deg">
                            <label>Room Type</label>
                            <select name="type">
                                <option value="regular">Regular</option>
                                <option value="premium">Premium</option>
                                <option value="deluxe">Deluxe</option>
                            </select>
                        </div>

                        <div class="div_deg">
                            <label>Free Wifi</label>
                            <select name="wifi">
                                <option selected value="Yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="div_deg">
                            <label>Upload Image</label>
                            <input type="file" name="image">
                        </div>

                        <div class="div_deg">
                            <button type="submit" class="btn btn-primary" value="Add Room">
                                Add Room
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
