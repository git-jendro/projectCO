@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="/home" method="post">
                @csrf
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Perasaan anda ?</span>
                    </div>
                        <textarea class="form-control" aria-label="With textarea" name="threads" placeholder="Tulisakan keluh kesah anda disini..."></textarea>
                        <button type="submit" class="btn btn-primary ml-2">Kirim</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('thread')

@foreach ($threads as $thread)
        <li class="list-group-item d-flex justify-content-between align-items-center">
          {{$thread -> user_id}}
        <a href="/students/{{$student->id}}" class="badge badge-info">Detail</a>
        </li>
      </ul>
      @endforeach

      
    @foreach ($threads as $thread)
      <div class="card mb-5">
        <div class="card-header">{{$thread -> id_users}} 
            <div class="card-date">
                {{$thread -> created_at}}
            </div>
        </div>
      
          <div class="card-body">
              {{$thread -> threads}}
          </div>
      </div>
      
    @endforeach
@endsection --}}
