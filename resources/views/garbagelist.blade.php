<table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Latitude</th>
        <th scope="col">Longtiude</th>
        <th scope="col">Level</th>
        
        <th scope="col">Action</th>
      </tr>
    </thead>
    @foreach($garbages as $garbage)
    <tbody>
      <tr>
        <th>{{ $garbage->reg }}</th>
        <td>{{ $garbage->latitude }}</td>
        <td>{{ $garbage->longtiude }}</td>
        <td>{{ $garbage->level }}</td>
        
        <td>
            <a href="{{ url('/showg/'.$garbage->id)}}" class="bnt btn-sm btn-info">Show</a>
            <a href="{{ url('/editg/'.$garbage->id)}}" class="bnt btn-sm btn-warning">Edit</a>
            <a href="{{ url('/deleteg/'.$garbage->id)}}" class="bnt btn-sm btn-danger">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>