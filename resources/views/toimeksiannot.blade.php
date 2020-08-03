@extends('layouts.app')

@section('content')
  <div class="container">
    <a id="scroll-top" class="mr-3 d-flex justify-content-center align-items-center"><i class="fas fa-lg fa-arrow-circle-up"></i></a>
    <br/>
    <h1 class="text-center" style="padding: 1rem 0;">Toimeksiantojen selailu</h1>
    <hr>
    <br/>
     <div class="form-group col-md-12">
      <label for="haku">Valitse aihealue:</label>
      <select class="form-control" id="haku">
              <option value="">Kaikki</option>
         @foreach ($tehtava as $tehtavat) 
              {
                <option value="{{ $tehtavat->aihealue }}">{{ $tehtavat->aihealue }}</option>
              }
              @endforeach
      </select>
      </div> 
      <br>
        <div class="col-md-12  table-responsive ">
        <table class="table table-striped table-bordered ilmoitus-div col-md-12">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Ilmoittaja</th>
              <th scope="col">Aihe</th>
              <th scope="col">Aihealue</th>
              <th scope="col">Arvosanatavoite</th>
                <th scope="col">Tehtävänanto</th>
                <th scope="col">Deadline</th>
                <th scope="col">Ilmoitettu</th>
                <th scope="col"></th>
            </tr>
          </thead>
          <tbody id="tehtavat">

        @foreach ($tehtava as $tehtavat)

            <tr>
              <th scope="row">{{ $tehtavat->kayttajaid }}</th>
              <td>{{ $tehtavat->aihe }}</td>
              <td>{{ $tehtavat->aihealue }}</td>
            <td>{{ $tehtavat->arvosanatavoite }}</td>
                <td>{{ substr($tehtavat->tehtavananto, 0, 30) }}...</td>
                <td>{{ $tehtavat->deadline }}</td>
                <td>{{ $tehtavat->ilmoituspvm }}</td>
                <td><a role="button" class="btn nappi float-right nappi" href="/tarjous?id={{ $tehtavat->tehtavaid }}">Lue lisää</a></td>
            </tr>

        @endforeach

          </tbody>
        </table>
       </div>
    </div>

<script type="text/javascript">
  
  $(document).ready(function(){
    
  $("#haku option").val(function(idx, val) {
    $(this).siblings('[value="'+ val +'"]').remove();
      return val;
      });
    
  $("#haku").on("click", function() {
    var value = $(this).val().toLowerCase();
    $("#tehtavat tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
    
  var btn = $('#scroll-top');

  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });

  btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
  });
});
</script>
@endsection