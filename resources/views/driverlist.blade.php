<table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Phone number</th>
    
        <th scope="col">Action</th>
      </tr>
    </thead>
    @foreach($drivers as $driver)
    <tbody>
      <tr>
        <th>{{ $driver->reg }}</th>
        <td>{{ $driver->firstName }}</td>
        <td>{{ $driver->lastName }}</td>
        <td>{{ $driver->userName }}</td>
        <td>{{ $driver->email }}</td>
        <td>{{ $driver->phonenumber}}</td>
        <td>
            <a href="{{ url('/show/'.$driver->id)}}" class="bnt btn-sm btn-info">Show</a>
            <a href="{{ url('/edit/'.$driver->id)}}" class="bnt btn-sm btn-warning">Edit</a>
            <a href="{{ url('/delete/'.$driver->id)}}" class="bnt btn-sm btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>