<style>
.jumbotron {
  background-color: RGB(249,166,2);
  color: #ffffff;
  font-family: Montserrat, sans-serif;
}
</style>
<div class="container-fluid "style="margin-top:5px;">
  <div class="well" style="background-color:red;">
  <h2 style="background-color:red" class="text-center">INFORMATION</h2>
</div>

      <div class="jumbotron" style=';margin:5% 25%;color:rgba(0, 0,210,);'>
    <a href='/user/{{ $user->id}}'>first name:{{ $user->name }}</a>
      <br><br>
    Date of Birth:{{ $user->dob }}
      <br><br>
      Phone No:{{ $user->number }}
      <br><br>
      Email Id:{{ $user->email }}
      <br><br>
      address :{{ $user->address }}
      </div>


  <button class="btn btn-default btn-lg " style="margin-left:45%"><a class="button" href="/user/{{$user->id}}/edit">EDIT</a></button
        </div>
