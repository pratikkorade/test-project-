
<style>
.jumbotron {
  background-color: RGB(249,166,2);
  color: #ffffff;
  font-family: Montserrat, sans-serif;
}
</style>
<div class="container-fluid "style="margin-top:5px;">
  <div class="well" style="background-color:red;">
  <h2 style="background-color:red" class="text-center">ENQUIRY LIST</h2>
</div>
      @foreach ($users as $user)
      <div class="jumbotron" style=';margin:5% 25%;color:rgba(0, 0,210,);'>
      first name:{{ $user->name }}
      <br><br>
      Last Name:{{ $user->name }}
      <br><br>
      Phone No:{{ $user->name }}
      <br><br>
      Email Id:{{ $user->email }}
      <br><br>
      Comment :    {{ $user->email }}
      </div>
      @endforeach
        </div>
