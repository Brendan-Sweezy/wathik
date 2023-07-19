<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <title>Weekly Report</title>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.bottom {
  position:absolute;
  bottom:0;
  left:30%;
  
}

.topright {
  position: absolute;
  top: 0px;
  right: 0px;
  font-size: 18px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

  </head>
  <body>
    <h1>{{ $project->name }}</h1>
    <h5>{{ $organization->name }}</h5>
    <h5>7/11/23-7/17/23</h5>

    <p>This week the project <strong>{{ $project->name }}</strong> held a total of <strong>{{ count($events) }} events</strong>. This week {{ $project->name }} made contact with beneficiaries a total of <strong>{{ $beneficiaries_sum }} times</strong>. {{ $project->name }} began on <strong>{{ $project->date }}</strong> and serves a total of <strong>{{ $project->beneficiaries }} beneficiaries</strong>.</p>
    
    <table>
      <tr>
        <th>Name</th>
        <th>Date</th>
        <th>Time</th>
        <th>Number of Beneficiaries</th>
      </tr>
      
      @foreach ($events as $event)
        <tr>
          <th>{{ $event->name }}</th>
          <th>{{ $event->date }}</th>
          <th>{{ $event->time }}</th>
          <th>{{ $event->beneficiaries }}</th>
        </tr>
      @endforeach
      
    </table>

    <img class='topright' alt="Logo" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('assets/media/wathikLogo.png')))}}" width="100" height="100"/>

    <br>
    
    <img alt="Image" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('assets/media/images/test_image_weekly_report.jpeg')))}}" height='300'/>
    
    <br>
    <p class='bottom'>Powered by Wathik © 2023 an ILearn product</p>
</div>

  </body>
</html>