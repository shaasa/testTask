<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                                <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                                <a href="https://laravel.com/docs">Task 1: Gestione buste paga dipendenti</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Form di caricamento delle buste paga per i dipendenti.<br>
                                Le buste paga sono presenti su un unico file che verrà diviso e salvato singolarmente per dipendente.<br>
                                Se viene inserito il file per un mese e un anno già presenti, verranno caricati nuovamente i file.

                            </div>
                            <div class="mt-2 text-sm text-gray-500">
                                Per effettuare il controllo nelle singole buste paga, non avendo nessun modello di partenza, si è cercato solamente il primo CF disponibile, mediante
                                espressione regolare.
                                Nel caso non fosse presente il file viene automaticamente scartato.

                            </div>
                            <div class="mt-2 text-sm text-gray-500">
                            </div>
                            <div class="mt-2 text-sm text-gray-500">
                                <strong>File si esempio per il caricamento delle buste paga:</strong>
                                <a href="{{\Illuminate\Support\Facades\Storage::url('esempioBustePaga.pdf')}}" target="_blank"><i class="bi bi-file-earmark-arrow-down"></i></a>
                            </div>

                            <a href="/dipendenti">
                                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                    <div>Vai al task</div>

                                    <div class="ml-1 text-indigo-500">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400">
                                <path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                                <a href="https://laracasts.com">Task 2: CRUD località</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Form di inserimento di una località. Vengono inserite separatamente le coordinate sfruttando le potenzialità di Google Maps.
                            </div>

                            <a href="https://laracasts.com">
                                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                    <div>Vai al task</div>

                                    <div class="ml-1 text-indigo-500">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
