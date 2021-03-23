<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-12 lg:px-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-1">
                <div class="container">
                    <div class="py-12">

                        <div class="card">
                            <div class="card-header">
                                <h3>
                                    Dipendenti
                                    <!-- Button trigger modal -->
                                    <a href="{{route('uploadBustePaga',['messaggio'=>'ins'])}}" class="btn btn-primary" style="float: right">
                                        Inserisci buste paga
                                    </a>
                                </h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>CF</th>
                                        <th>Buste Paga</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dipendenti as $dipendente)
                                        <tr>
                                            <td>{{$dipendente->id}}</td>
                                            <td>{{$dipendente->nome}}</td>
                                            <td>{{$dipendente->cf}}</td>
                                            <td>
                                                <a title="Buste paga {{$dipendente->nome}}" href="bustepaga/{{$dipendente->id}}"><i class="bi bi-file-earmark-arrow-down"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
