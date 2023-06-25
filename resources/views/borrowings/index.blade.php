@extends('layout.master')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Peminjam</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('borrowings.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Keterangan</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($borrowings as $borrowing)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $borrowing->nama_peminjam }}</td>
            <td>{{ $borrowing->judul_buku }}</td>
            <td>{{ $borrowing->tgl_pinjam }}</td>
            <td>{{ $borrowing->tgl_kembali }}</td>
            <td>{{ $borrowing->ket }}</td>
            <td>
                <form action="{{ route('borrowings.destroy',$borrowing->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('borrowings.edit',$borrowing->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $borrowings->links() !!}
        
@endsection