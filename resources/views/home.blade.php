@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
            <div class="card">
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
</div>
@endsection

@section('thread')
<div class="card mt-3">
    <div class="card-header">Nama 
        <div class="card-date">
            Tanggal
        </div>
    </div>
  
      <div class="card-body">
          Threads
      </div>
  </div>
    
@endsection

