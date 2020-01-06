<!DOCTYPE html>
<html lang="en">
<head>
    <title>Administation</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
</head>
<body class="administration-page">
    <form action="index.blade.php" method="POST"></form>
    <div class="page-header">
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
                            

                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container-fluid -->
            </div><!-- .top-header-bar -->

            <div class="container">

              <table class="table table-stripe">
               <div><p><a href="{{route('cours_create')}}" class="btn btn-suceess">{{('Enrengistrer cours')}}></a></p></div>
               <div><p><a href="{{'pedagogique'}}" class="btn btn-suceess">{{('pedagogique')}}</a></p></div>
               <tr>
                <th>#</th>
                <th>heure_debut</th>
                <th>heure_fin</th>
                <th>etat</th>
                <th>teacher_id</th>
                <th>classe_id</th>
                <th>matiere_id</th>

                <th></th>
              </tr>
              @foreach ($cours as $v)
              <tr>
                <th>{{ $loop->index }}</th>
                <th>{{$v->heure_debut}}</th>
                <th>{{$v->heure_fin}}</th>
                <th>{{$v->etat}}</th>
                <th>{{$v->teacher_id}}</th>
                <th>{{$v->classe_id}}</th>
              <th>{{$v->matiere_id}}</th>

                <th>
                  @if (Auth::user()->role == 'admin')
                  <p><a href="{{route('cours_edit',['id'=>$v->id])}}"><i class="fa fa-pencil fa-3x  text-warning icon-2x"></i>
                  </a>
                  <th>
                   <form action="cours/{{$v->id}}" method="post">
                    @csrf
                    @method('delete')
                      <button type="submit" name="delete"><i class="fa fa-trash fa-3x  text-danger"></i></button>

                  </form>
                </p>
                @endif
              </th>
            </tr>

            @endforeach

          </table>
        </div>

 