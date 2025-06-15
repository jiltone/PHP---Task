<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
   <style>
        .table_deg {
            width: 80%;
            border: 2px solid white;
            margin: auto;
        }
        .table_deg th, .table_deg td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .table_deg th {
            background-color: #f2f2f2;
        }

        .th_deg {
            background-color: #4CAF50;

            padding: 30px;
            text-align: center;
        }
        .tr{
            border: 3px solid white;
        }
        .td{
            padding: 10px;
        }
    </style>
    

  </head>
  <body>
    @include('admin.header')
   
    @include('admin.sidebar')
   
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 class="h3 mb-0 text-gray-800">Room Details</h1>
            
        
        <div class="container-fluid">
            <table class="table_deg">
                
                    <tr>
                        <th class="th_deg">Room Number</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Free Wifi</th>
                        <th class="th_deg">Room Type</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Update</th>
                    </tr>
                
                 @foreach($data as $room)
                    <tr>
                        <td>{{ $room->room_title }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($room->description, 50) }}</td>
                        <td>{{ $room->price }}</td>
                        <td>{{ $room->wifi }}</td>
                        <td>{{ $room->room_type }}</td>
                        <td><img width="100" src="room/{{ $room->image }}"></td>
                        <td>
                            <a class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this room?')" href="{{ url('room_delete', $room->id) }}">Delete</a>

                        </td>
                        <td>
                            <a class="btn btn-danger"   href="{{ url('room_update', $room->id) }}">Update</a>

                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
        </div>
        </div>
        </div>
        
    @include('admin.footer')
        
  </body>
</html>