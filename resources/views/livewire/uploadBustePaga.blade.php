@if($messaggio == 'ok'|| $messaggio == 'ins')
    <x-app-layout>
        @endif
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-12 lg:px-12">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-1">
                        <div class="container">

                            <div class="py-12">
                                @if($messaggio == 'ok')
                                    <div class="alert alert-success" role="alert">
                                        Buste paga caricate correttamente
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <a href="{{route('dipendenti')}}"><- Torna alla lista die dipendenti</a>
                                <div class="card">
                                    <div class="card-body">
                                        <form method="POST" action="{{route('gestioneBustePaga')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputState">Mese</label>
                                                    <select id="mese" name="mese" class="form-control" wire:model="mese">
                                                        <option selected>Scegli il mese...</option>
                                                        <option value="1">Gennaio</option>
                                                        <option value="2">Febbraio</option>
                                                        <option value="3">Marzo</option>
                                                        <option value="4">Aprile</option>
                                                        <option value="5">Maggio</option>
                                                        <option value="6">Giugno</option>
                                                        <option value="7">Luglio</option>
                                                        <option value="8">Agosto</option>
                                                        <option value="9">Settembre</option>
                                                        <option value="10">Ottobre</option>
                                                        <option value="11">Novembre</option>
                                                        <option value="12">Dicembre</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputState">Anno</label>
                                                    <select id="anno" name="anno" class="form-control" wire:model="anno">
                                                        <option selected>Scegli anno...</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="customFile" id="customFile">
                                                        <label class="custom-file-label" for="customFile">Carica Buste paga</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <button class="btn btn-primary" type="submit">Carica</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($messaggio == 'ok' || $messaggio == 'ins')
    </x-app-layout>
@endif
