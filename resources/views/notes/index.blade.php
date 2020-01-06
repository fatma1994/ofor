

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

                       
                    </div><!-- .row -->
                </div><!-- .container-fluid -->
            </div><!-- .top-header-bar -->
<div class="container">
 
  <table class="table table-stripe">
    <div><p><a href="{{route('notes_create')}}" class="btn btn-suceess">{{('Enrengistrer les notes')}}</a></p></div>
     <div><p><a href="{{'pedagogique'}}" class="btn btn-suceess">{{('pedagogique')}}</a></p></div>
 </div>
 <tr>
    <th>#</th>
    <th>note</th>
    <th>eleve_id</th>
    <th>matiere_id</th>
    
    <th></th>
    <th></th>
</tr>
@foreach ($note as $v)
<tr>
    <th>{{ $loop->index }}</th>
    <th>{{$v->note}}</th>
    <th>{{$v->eleve_id}}</th>
    <th>{{$v->matiere_id}}</th>

    <th>
        @if (Auth::user()->role == 'admin')
        <p><a href="{{route('notes_edit',['id'=>$v->id])}}"><i class="fa fa-pencil fa-3x text-warning icon-2x"></i>
        </a></p>
        <th>
         <form action="note/{{$v->id}}" method="post">
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

 