
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lycee d'excellence</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{asset('css/all.css')}}">
</head>
<body>
  <img src="images/s5.jpg" class="d-block w-100" alt="...">
  <div class="hero-content">
    <header class="site-header">
      <div class="top-header-bar">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-lg-6 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
              <div class="header-bar-email d-flex align-items-center">
                <i class="fa fa-envelope"></i><a href="#">fallougalass@gmail.com</a>
              </div><!-- .header-bar-email -->

              <div class="header-bar-text lg-flex align-items-center">
                <p><i class="fa fa-phone"></i>221-77-641-84-90 </p>
              </div><!-- .header-bar-text -->
            </div><!-- .col -->

            <div class="col-12 col-lg-6 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
              <div class="header-bar-search">
                <form action="{{ route('eleves_show') }}" class="flex align-items-stretch" method="post">
                    @csrf
                  <input type="search" placeholder="Rechercher" name="matricule">
                  <button type="submit" value="" class="flex justify-content-center align-items-center"><i class="fa fa-search"></i></button>
                </form>
              </div><!-- .header-bar-search -->


            </div><!-- .col -->
          </div><!-- .row -->
        </div><!-- .container-fluid -->
      </div><!-- .top-header-bar -->

      <div class="container">
        <table class="table table-striped">
          <div>
            <p>
              <a href="{{route('eleves_create')}}" class="btn btn-success">
              Enregistrement d'un eleve </a>
            </p>
            <p>
              <a href="{{'administration'}}" class="btn btn-success">Adminstration</a>
            </p>
          </div>

          <th class="text-light" >#</th>
          <th class="text-light">matricule</th>
          <th class="text-light">nom</th>
          <th class="text-light">prenom</th>
          <th class="text-light">sexe</th>
          <th class="text-light">date_naissance</th>
          <th class="text-light">lieu_naissance</th>
          <th class="text-light">telephone</th>
          <th class="text-light">Action</th>
        </tr>
        @foreach ($eleve as $v)
        <tr>
          <th class="text-light">{{ $loop->index }}</th>
          <th class="text-light">{{$v->matricule}}</th>
          <th class="text-light">{{$v->nom}}</th>
          <th class="text-light">{{$v->prenom}}</th>
          <th class="text-light">{{$v->sexe}}</th>
          <th class="text-light">{{$v->date_naissance}}</th>
          <th class="text-light">{{$v->lieu_naissance}}</th>
          <th class="text-light">{{$v->telephone}}</th>
          
            @if (Auth::user()->role == 'admin')
          <th>
            <p>
              <a href="{{route('eleves_edit',['id'=>$v->id])}}"><i class="fa fa-pencil fa-3x text-warning icon-2x"></i>
              </a>
          </th>
          <th>
              <form action="eleve/{{$v->id}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" name="delete"><i class="fa fa-trash fa-3x text-danger"></i></button>
              </form>
            </p>
            @endif
          </th>
        </tr>
        @endforeach

      </table>
    </div>

