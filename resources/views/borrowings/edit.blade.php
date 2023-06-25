@extends('layout.master')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('borrowings.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        
    <form action="{{ route('borrowings.update',$borrowing->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf

        @method('PUT')
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Peminjam</strong>
                    <select class="form-control" name="nama_peminjam">
                        @foreach($students as $student)
                        <option value="{{$student->nama}}" @if($borrowing->nama_peminjam == $student->nama)selected @endif>{{$student->nama}}</option>
                        @endforeach
                    </select>            
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul buku</strong>
                    <select class="form-control" name="judul_buku">
                        @foreach($books as $book)
                        <option value="{{$book->judul}}" @if($borrowing->judul_buku == $book->judul)selected @endif>{{$book->judul}}</option>
                        @endforeach
                    </select>            
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Pinjam</strong>
                    <input type="date" name="tgl_pinjam" class="form-control" placeholder="Tanggal Pinjam" value = "{{$borrowing->tgl_pinjam}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Kembali</strong>
                    <input type="date" name="tgl_kembali" class="form-control" placeholder="Tanggal Kembali" value = "{{$borrowing->tgl_kembali}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Keterangan</strong>
                    <input type="radio" name="ket" value="Kembali" {{$borrowing->ket == 'Kembali'? 'checked' : ''}}> Kembali
                    <input type="radio" name="ket" value="Belum Kembali" {{$borrowing->ket == 'Belum Kembali'? 'checked' : ''}}> Belum Kembali

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
    </form>
@endsection