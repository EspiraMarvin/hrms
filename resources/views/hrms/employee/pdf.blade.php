<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Employee List</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<div class="text-center mb20">
    <p style="font-size: 16px; text-align: center">
        <b>ICT AUTHORITY</b>

        <b>EMPLOYEES LIST</b>
    </p>
</div>
</div>
<body>
<table class="table table-bordered" style="width: 100%">
     <thead>

    <tr>
        <th class="text-center">Id</th>
        <th class="text-center">PF No.</th>
        <th class="text-center">Name</th>
        <th class="text-center">Role</th>
        <th class="text-center">Supervisor</th>
        <th class="text-center">Department</th>
        <th class="text-center">Duty Station</th>
        <th class="text-center">Date Posted</th>
    </tr>
    </thead>
    <tbody>
        <?php $i = 0;?>
      @foreach($employees as $emp)
          <tr>
              <td class="text-center">{{$i+=1}}</td>
              <td class="text-center">{{$emp->pf_number}}</td>
              <td class="text-center">{{$emp->name}}</td>
              <td class="text-center">{{isset($emp->roles[0]->role) ? $emp->roles[0]->role:''}}</td>
              <td class="text-center">{{isset($emp->user->supervisedBy[0]->name) ? $emp->user->supervisedBy[0]->name:''}}</td>
              <td class="text-center">{{isset($emp->departments->department) ? $emp->department->department:''}}</td>
              <td class="text-center">{{isset($emp->duty_station) ? $emp->duty_station:''}}</td>
              <td class="text-center">{{date_format(new DateTime($emp->posted_date), 'd-m-Y')}}</td>
          </tr>
      @endforeach
    </tbody>
</table>
</body>
</html>
