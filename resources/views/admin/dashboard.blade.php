@extends('layouts.admin-master')
@section('content')
    <div class="container"> 
      @if (session('success')) 
          <h6 class="alert alert-success">{{ session('success') }}</h6>
      @endif
      <div class="d-flex align-items-center">
          <h1>Applications list</h1>
      </div>
      @if (!empty($applications))
      <table class="table">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Service</th>
                  <th scope="col">Mechanic</th>
                  <th scope="col">Auto Brand</th>
                  <th scope="col">Description</th>
                  <th scope="col">Date</th>
                  <th scope="col">Status</th>
                  @if($admin_user->role !== 'mechanic')
                  <th scope="col"></th>
                  @endif
              </tr>
          </thead>
          <tbody>
              @foreach($applications as $application)
              <tr>
                  <th scope="row">{{ $application->id }}</th>
                  <td>{{ $application->service->title }}</td>
                  <td>{{ $application->mechanic->name }} {{ $application->mechanic->surname }} <div>{{ $application->mechanic->phone }}</div></td>
                  <td>{{ $application->auto_brand }}</td>
                  <td>{{ $application->description }}</td>
                  <td>{{ $application->date }}</td>
                  <td style="width: 250px;">
                    <form action="{{ route('admin-update-application-status', ['id' => $application->id]) }}" method="POST" class="d-flex justify-content-between">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <select class="form-select" name="status">
                          <option value="recieved" @selected("recieved" === $application->status)>Recieved</option>
                          <option value="in_progress" @selected("in_progress" === $application->status)>In Progress</option>
                          <option value="done" @selected("done" === $application->status)>Done</option>
                          <option value="decline" @selected("decline" === $application->status)>Decline</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary">Edit Status</button>
                    </form>
                  </td>
                  @if($admin_user->role !== 'mechanic')
                  <td>
                      <form action="{{ route('admin-delete-application', ['id' => $application->id] )}}" method="POST">
                          {{ csrf_field() }}
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                  </td>
                  @endif
              </tr>
              @endforeach
          </tbody>
      </table>
      @else
      <h4>You Do Not Have Any Applications Yet!</h4>
      @endif
    </div>
@stop