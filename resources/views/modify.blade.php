@extends('layouts.dlayout')

@section('title')

  Modyfikacja prezentacji

@endsection

@section('content')

    <main>
      <section class="administration-section">
        <div class="table-wrapper">
          <ul class="table-list table-template">
            <li class="item"><span class="table-title">ID</span></li>
            <li class="item"><span class="table-title">Tytuł</span></li>
            <li class="item"><span class="table-title">Opis</span></li>
            <li class="item"><span class="table-title">Zdjęcie</span></li>
            <li class="item"><span class="table-title">Rozmiar</span></li>
            <li class="item"><span class="table-title">Plik</span></li>
            <li class="item"><span class="table-title">Rozmiar</span></li>
          </ul>
          @foreach($presentations as $presentation)
          <ul class="table-list table-template">
            <li class="item">{{$presentation->id}}</li>
            <li class="item">{{$presentation->title}}</li>
            <li class="item">{{$presentation->description}}</li>
            <li class="item">{{$presentation->name_of_image}}</li>
            <li class="item">{{$presentation->size_of_image}}</li>
            <li class="item">{{$presentation->filename}}</li>
            <li class="item">{{$presentation->size_of_file}}</li>
            <li class="item">
              <form action="{{url('dashboard', $presentation->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Czy na pewno chcesz usunąć?')" id="delete-btn" class="btn-container">
                  <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
              </form>
              <a href="{{url('dashboard/modify/'.$presentation->id.'/edit')}}">
                <button class="btn-container"><i class="far fa-edit"></i></button>
              </a>
            </li>
          </ul>
          @endforeach
        </div>
      </section>
    </main>

@endsection
