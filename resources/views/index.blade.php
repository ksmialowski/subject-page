@extends('layouts.main')

@section('title')
     Sieci komputerowe
@endsection

@section('home')
     <section class="intro-section">
          <div class="container">
               <img class="page-logo" src="image/logo.png" alt="Logo strony">
               <h2 class="section-title">sieci komputerowe</h2>
               <hr class="topology-icon">
               <p class="section-paragraph">mgr inż. Robert Kasza</p>
          </div>
     </section>
@endsection

@section('presentations')
     <section class="exercises-section">
          <div class="container">
               <h2 class="section-title">Materiały</h2>
               <hr class="topology-icon">
               <div class="image-container">
                    @foreach ($presentations as $presentation)
                        <div class="link-holder">
                            <a href="storage/upload/{{$presentation->filename}}" title="{{$presentation->title}}" download>
                                <img class="exercise-img" src="storage/upload/{{$presentation->name_of_image}}"
                                     alt="{{$presentation->title}}">
                                <p class="link-description">{{$presentation->description}}</p>
                            </a>
                        </div>
                    @endforeach
               </div>
          </div>
     </section>
@endsection

@section('students')
     <section class="about-section">
          <div class="container">
               <h2 class="section-title">Dla uczniów</h2>
               <hr class="topology-icon">
               <div class="image-container">
                    <div class="link-holder">
                         <a href="" title="PSO">
                              <img class="exercise-img" src="image/pso.png" alt="PSO">
                              <p class="link-description">PSO</p>
                         </a>
                    </div>
                    <div class="link-holder">
                         <a href="" title="Regulamin">
                              <img class="exercise-img" src="image/regulamin.png" alt="Regulamin">
                              <p class="link-description">Regulamin</p>
                         </a>
                    </div>
                    <div class="link-holder">
                         <a href="http://www.elektronik.rzeszow.pl/plan-lekcji-2/plany/n35.html" title="Plan lekcji" target="_blank">
                              <img class="exercise-img" src="image/planlekcji.png" alt="Plan lekcji">
                              <p class="link-description">Plan lekcji</p>
                         </a>
                    </div>
                    <div class="link-holder">
                         <a href="" title="Książki">
                              <img class="exercise-img" src="image/spis.png" alt="Spis ksiazek">
                              <p class="link-description">Książki</p>
                         </a>
                    </div>
               </div>
          </div>
     </section>
@endsection

@section('contact')
     <section class="contact-section">
          <div class="container">
               <h2 class="section-title">Kontakt</h2>
               <hr class="topology-icon">
               @if(count($errors) > 0)
                         <ul>
                              @foreach($errors->all() as $error)
                                   <li>{{$error}}</li>
                              @endforeach 
                         </ul> 
               @endif
               <form action="{{URL('sendemail')}}" method="post" class="form-container" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="text" name="name" placeholder="Imię i nazwisko" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <textarea name="message" placeholder="Wiadomość" required></textarea>
                    <input type="file" name="attachment" required>
                    <div class="wrapper">
                         <button class="form-button" type="submit">Wyślij</button>
                    </div>
               </form>
          </div>
     </section>
@endsection
