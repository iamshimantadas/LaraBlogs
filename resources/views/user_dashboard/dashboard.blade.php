<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>

<style>
  table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>

</head>
<body>

<div class="sidebar">
  <a class="active" href="#home">Home</a>
  <a href="{{url('/')}}/">Main Page</a>
  <a href="{{url('/')}}/updateinfo">Update Info</a>
  <a href="{{url('/')}}/logout">Logout</a>
</div>

<div class="content">



  <h2>Good day user!!</h2>
  <p>
    
  
    <div style="overflow-x:auto;">
  <table>
    <tr>
      <th>Payment ID</th>
      <th>Amount</th>
      <th>Date</th>
      <th>Time</th>
    </tr>
    @foreach($user as $user)
    <tr>
      <td>{{$user->paymentid}}</td>
      <td>{{$user->amount}}</td>
      <td>{{$user->date}}</td>
      <td>{{$user->time}}</td>
    </tr>
    @endforeach
    
    
  </table>
</div>


</p>
  <!-- <p>We have also added a media query for screens that are 400px or less, which will vertically stack and center the navigation links.</p>
  <h3>Resize the browser window to see the effect.</h3> -->
</div>

</body>
</html>
