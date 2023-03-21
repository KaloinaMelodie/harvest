@extends('layouts.sidebar')

@section('liste')
<section>
<link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <!--for demo wrap-->
    <h1>Fixed Table header</h1>
    <div class="tbl-header">
      <table cellpadding="0" cellspacing="0" border="0">
        <thead>
          <tr>
            <th>Role</th>
            <th>Nom Prenom</th>
            <th>email</th>
            <th>Contact</th>
            
          </tr>
        </thead>
      </table>
    </div>
    <div class="tbl-content">
      <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
            @foreach ($vulga as $vulga)
          <tr>
            <td>Vulgarisateur</td>
            <td>{{$vulga->nom}},{{$vulga->Prenom}}</td>
            <td>{{$vulga->login}}</td>
            <td>{{$vulga->adresse}}</td>
            <td>{{$vulga->contact}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </section>
  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    // '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom. Here calculate the scollbar width .
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>

@endsection