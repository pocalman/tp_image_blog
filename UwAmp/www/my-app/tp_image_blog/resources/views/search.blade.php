@extends('layouts.app')
@section('content')

<br />
<div class="container box">
    <h3>Recherche</h3><br />
    <div class="panel panel-default">
        <div class="panel-heading">Reherche d'image par lieu</div>
        <div class="panel-body">
            <form method="get" action="/search">
                <div class="form-group">
                    <input type="text" name="search" id="search" class="form-control typeahead "
                        placeholder="Entrez une localisation" autocomplete="off" />
                    <button type="submit" class="btn btn-primary">Chercher</button>
                </div>
            </form>
            <div class="table-responsive">
                <!-- Ici, on affiche le total des résultat de la recherche grâce à count() -->
                <h3>Résultats totaux: <span id="total_records">
                        <td>{{{ $datas->Total() }}}
                        </td>
                    </span></h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Utilisateur</th>
                            <th>Date</th>
                            <th>Localisation</th>
                            @auth
                            <th>Signaler</th>
                            <th>Supprimer</th>
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        <!-- On reprend le même principe que dans la page d'accueil, pour afficher les images, mais elles apparaitront dans un tableau.-->
                        @foreach($datas as $data)
                        <tr>
                            <td> <a href="/storage/images/{{$data->name}}"><img src="/storage/thumbs/{{$data->name}}"
                                        style="height: 100px;"></a></td>
                            <td>{{$data->utilisateur}}</td>
                            <td>{{$data->created_at}}</td>
                            <td>{{$data->city}}</td>
                            @auth
                            <td>
                                <form action="{{ url('signalement/'.$data->id) }}" method="GET">
                                    <button type="submit" class="btn btn-danger">Signaler</button>
                                </form>
                            </td>
                            @if (Auth::user()->level=='admin')
                          <!-- L'admin a le pouvoir de supprimer toute les images. -->
                            <td>
                                <form action="{{ url('delete/'.$data->id) }}">
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                            @elseif(Auth::user()->name==$data->utilisateur)
                            <!-- Ici on s'assure que seul l'icône de suppression n'apparaisse que pour les images qui appartiennent à l'utilisateur connecté selon son nom (Auth::user()->name) équivalent à $data->utilisateur. -->
                            <td>
                            <form action="{{ url('delete/'.$data->id) }}">
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                            @endif
                            @endauth
                        </tr>
                        <tr>
                            @endforeach
                            {{$datas->links()}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    // Va chercher grâce à J Query une chaine de données à partir de l'interface textuelle et suggère des lieux exclusivement entrées dans la base de données. 
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source: function (query, process) {
            return $.get(path, {
                query: query
            }, function (data) {
                return process(data);
            });
        }
    });

    $(document).ready(function () {

        fetch_image_data();

        function fetch_image_data(query = '') {
            $.ajax({
                url: "/search",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function (data) {
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }

        $(document).on('keyup', '#search', function () {
            var query = $(this).val();
            var lengthQuery = query.length;
            fetch_image_data(query);
        });
    });

</script>

@endsection
