
  <center>
<div class="row container">
  <BR>
    <BR>
  <div class="container-fluid bg-grey">
  <div class="well" style="background-color:GREEN;">
    <h2 class="text-center">EDIT</h2>
  </div>
  <form action="/user/{{$user->id}}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
  <div class="col-sm-6 form-group">

    <input class="form-control" id="name" name="name" placeholder="Name" type="text" value="{{ $user->name}}" >
  </div>
  <div class="col-sm-6 form-group">
    <input class="form-control" id="dob" name="dob" placeholder="dob" type="date"  value="{{ $user->dob}}" >
  </div>
  <br>
  <br>
  <div class="col-sm-6 form-group">
    <input class="form-control" id="email" name="email" placeholder="Email" type="email"  value="{{ $user->email }} ">
  </div>
  <div class="col-sm-6 form-group">
    <input class="form-control" id="number" name="number" placeholder="Phone Number" type="text"  value="{{$user->number }}" >
  </div>




      <textarea class="form-control" value="{{$user->address}}" id="address" name="address" placeholder="Comment" rows="5" cols="8"></textarea><br>

<div class="row">
  <div class="col-sm-10 form-group">
    <button class="btn  btn-lg btn-default " type="submit">EDIT</button>
</div>
       </form>
       <form action="/user/{{$user->id}}" method="post">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}

       <div class="row">
         <div class="col-sm-10 form-group">
           <button class="btn  btn-lg btn-denger " type="submit">DELETE</button>
       </div>
              </form>

</div>
</center>
