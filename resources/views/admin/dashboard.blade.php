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
                  <th scope="col"></th>
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
                      <button type="submit" class="btn btn-secondary">Edit Status</button>
                    </form>
                  </td>
                  <td>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sparePartsModal" data-val="{{ $application->id }}">
                    Add Spare Parts
                  </button>
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
      <div class="modal fade" id="sparePartsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Spare Parts</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="modal-form" action="{{ route('admin-order-part-amount', ['id' => '0']) }}" method="POST">
              {{ csrf_field() }}
              <div class="modal-body">
                <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Image</th>
                          <th scope="col">Title</th>
                          <th scope="col">Description</th>
                          <th scope="col">Auto Brand</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Order</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($spare_parts as $part)
                    <tr>
                      <th scope="row">{{ $part->id }}</th>
                      <td><img height="50" src="{{ asset('/storage/images/' . $part->image_name) }}" alt="img"></td>
                      <td>{{ $part->title}}</td>
                      <td>{{ $part->description }}</td>
                      <td>{{ $part->auto_brand }}</td>
                      <td>{{ $part->amount }}</td>
                      <td>
                      <div class="form-group">
                        <input type="number" class="form-control" min="0" placeholder="Enter amount" name="{{ $part->id }}">
                      </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      @else
      <h4>You Do Not Have Any Applications Yet!</h4>
      @endif
    </div>
    <script>
      document.querySelector('#sparePartsModal').addEventListener(  // paņemam modal un pasakam, lai klausās event show.bs.modal
        'show.bs.modal',  
        function (event) {    
          const form = document.querySelector('#modal-form'); //savācam modal
          const value = event.relatedTarget.getAttribute('data-val') //savācam application id
          const actionUrlParts = form.action.split('/');  //saskaldam URL pa daļām. piemēram, www.example.com/controller/action/id => ['www.example.com', 'controller', 'action', 'id']
          actionUrlParts.pop(); //izmetam no URL esošo id
          actionUrlParts.push(value); //pievienojam id, kas tika izvēlēts

          form.action = actionUrlParts.join('/'); // saliekam visu kopā un iedodam gatavo URL modal formai
        });
    </script>
@stop