<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  table-layout: fixed;
}

td, th {
  border: 1px solid #dddddd;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
  font-weight: bold;
}
</style>
</head>
<body>

<h2>Wathik Report</h2>

<table>
  <tr>
    <td>ID Number: </td>
    <td>CBO name: </td>
  </tr>
  <tr>
    <td>{{$national_id}}</td>
    <td>{{$cbo_name}}</td>
  </tr>
  <tr>
    <td>Date of Establishment: </td>
    <td>Competent Ministry: </td>
  </tr>
  <tr>
    <td>{{$founding_date}}</td>
    <td>{{$ministry}}</td>
  </tr>
  <tr>
    <td>Mobile Number: </td>
    <td>Landline Number: </td>
  </tr>
  <tr>
    <td>{{$mobile_number}}</td>
    <td>{{$landline_number}}</td>
  </tr>
  <tr>
    <td>PO Box: </td>
    <td>Email: </td>
  </tr>
  <tr>
    <td>{{$mailbox}}</td>
    <td>{{$email}}</td>
  </tr>
  <tr>
    <td>Providence: </td>
    <td>Governorate: </td>
  </tr>
  <tr>
    <td>{{$providence}}</td>
    <td>{{$governorate}}</td>
  </tr>
  <tr>
    <td>Area: </td>
    <td>District: </td>
  </tr>
  <tr>
    <td>{{$area}}</td>
    <td>{{$district}}</td>
  </tr>
  <tr>
    <td>Residential Type: </td>
    <td>Neighborhood: </td>
  </tr>
  <tr>
    <td>{{$residential_type}}</td>
    <td>{{$neighborhood}}</td>
  </tr>
</table>

</body>
</html>

