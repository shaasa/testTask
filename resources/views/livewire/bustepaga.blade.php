<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-12 lg:px-12">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-1">
                    <div class="container">
                        <div class="py-12">
                            <a href="{{route('dipendenti')}}"><- Torna alla lista die dipendenti</a>
                            <div class="card">
                                <div class="card-header">
                                    <h3>
                                        Buste paga per l'utente {{$nome}}
                                    <!-- Button trigger modal -->

                                    </h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Mese</th>
                                            <th>File</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($bustepaga as $bustapaga)
                                            <tr>
                                                <td>{{$bustapaga->mese}}/{{$bustapaga->anno}}</td>
                                                <td>
                                                    <a href="{{\Illuminate\Support\Facades\Storage::url($bustapaga->file)}}" target="_blank"><i class="bi bi-cloud-download"></i></a>
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
</x-app-layout>
