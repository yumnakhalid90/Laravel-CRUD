
@extends('welcome')
@section('content')

<center>
<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger fw-bold fs-4 rounded-pills mt-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
 ADD RECORDS
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel" >CRUD</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="insertData" method="Post" enctype="multipart/form-data">
         @csrf
        <div class ="mb-2">
            <input type ="text" placeholder="Enter Product Name"  class="form-control" name="pname">
        </div>
        <div class ="mb-2">
            <input type ="text" placeholder="Enter Product Price"  class="form-control" name="pprice">
        </div>
        <div class ="mb-2">
            <input type ="file"  class="form-control" name="image">
        </div>
        <button type="submit" class="btn btn-outline-warning text-danger fw-bold fs-5 rounded-pills mt-3">ADD RECORD</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
</center>
<div class ="container">
<table class="table mt-5">

    <thead class="bg-danger text-light text-center fs-4">
     <th> Id</th>
     <th>Product Name</th>
     <th>Product Price</th>
     <th>Product Image</th>
     <th>UPDATE</th>
     <th>DELETE</th>


</thaed>
<tbody class="text-danger bg-light text-center fs-5">
  @foreach($data as $item)

<tr>
  <form action="updatedelete" method="get">

    <!-- {{-- The type attribute is set to "hidden," which means that this input field is not visible to the user on the web page. Hidden inputs are typically used to store data that needs to be submitted with a form but does not need to be displayed to the user. --}} -->

    <!-- {{--  This is plain text content within the <td> element This text will be visible on the web page and will display the same value as the hidden input field. This can be useful for displaying the data to the user,  --}} -->

<td class="pt-5"><input type="hidden"  name="id" value="{{$item['Id']}}">{{$item['Id']}}</td>
<td class="pt-5"><input type="hidden" name="name" value="{{$item['PName']}}">{{$item['PName']}}</td>
<td class="pt-5"><input type="hidden" name="price"  value="{{$item['PPrice']}}">{{$item['PPrice']}}</td>
<td><img src="images/{{$item['PImage']}}" width="100px" height="100px"></td>
<td class="pt-5"><input type="submit" class="btn btn-outline-warning" name="update"  value="Update"></td>
<td class="pt-5"><input type="submit" class="btn btn-outline-danger"  name="delete" value="Delete"></td>
</form>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection


