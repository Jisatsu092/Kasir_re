<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('KONSINYASI PRODUK') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <div>DATA KONSINYASI PRODUK</div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 flex gap-5">
                    {{-- FORM ADD SUPPLIER --}}
                    <div class="w-full bg-gray-100 p-4 rounded-xl">
                        <div class="mb-5">
                            INPUT DATA KONSINYASI PRODUK
                        </div>
                        <form action="{{ route('konsinyasi_pro.store') }}" method="post">
                            @csrf
                            <div class="mb-5">
                            <label for="id_konsinyasi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Konsinyasi</label>
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="id_konsinyasi" data-placeholder="Pilih Konsinyasi">
                                <option value="">Pilih...</option>
                                @foreach ($konsinyasi as $k)
                                <option value="{{$k->id}}">{{$k->konsinyasi}}</option> 
                                @endforeach
                            </select>
                            </div>
                            <div class="mb-5">
                                <label for="id_produk"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Produk</label>
                                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="id_produk" data-placeholder="Pilih Produk">
                                    <option value="">Pilih...</option>
                                    @foreach ($produk as $p)
                                    <option value="{{$p->id}}">{{$p->produk}}</option>     
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Stok</label>
                                <input name="stok" type="number" id="number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Tgl_Konsinyasi</label>
                                <input name="tgl_konsinyasi" type="date" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">SIMPAN</button>
                        </form>
                    </div>
                    {{-- TABLE SUPPLIER --}}
                    <div class="w-full">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            KONSINYASI
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            PRODUK
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            STOK
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            TANGGAL KONSINYASI
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($konsinyasi_pro as $key => $k)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $konsinyasi_pro->perPage() * ($konsinyasi_pro->currentPage() - 1) + $key + 1 }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $k->konsinyasi->konsinyasi }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $k->produk->produk }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $k->stok}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $k->tgl_konsinyasi }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <button type="button" data-id="{{ $k->id }}"
                                                    data-modal-target="sourceModal"
                                                    data-id_konsinyasi="{{ $k->id_konsinyasi }}" data-id_produk="{{ $k->id_produk }}" data-stok="{{ $k->stok }}" data-tgl_konsinyasi="{{ $k->tgl_konsinyasi }}"
                                                    onclick="editSourceModal(this)"
                                                    class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded-md text-xs text-white">
                                                    Edit
                                                </button>
                                                <button
                                                    onclick="return konsinyasi_proDelete('{{ $k->id }}','{{ $k->id_konsinyasi }}')"
                                                    class="bg-red-500 hover:bg-bg-red-300 px-3 py-1 rounded-md text-xs text-white">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $konsinyasi_pro->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Update Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col  p-4 space-y-6">
                    
                        <div class="mb-5">
                            <label for="id_konsinyasi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Konsinyasi</label>
                            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="id_konsinyasi_edit" id="id_konsinyasi" data-placeholder="Pilih Konsinyasi">
                                <option value="">Pilih...</option>
                                @foreach ($konsinyasi as $k)
                                <option value="{{$k->id}}">{{$k->konsinyasi}}</option> 
                                @endforeach
                            </select>
                            </div>
                    <div class="mb-5">
                                <label for="id_produk"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark">Produk</label>
                                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="id_produk_edit" id="id_produk" data-placeholder="Pilih Produk">
                                    <option value="">Pilih...</option>
                                    @foreach ($produk as $p)
                                    <option value="{{$p->id}}">{{$p->produk}}</option>     
                                    @endforeach
                                </select>
                            </div>
                        <div class="">
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900">Stok</label>
                            <input type="number" id="stok" name="stok"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan stok disini...">
                        </div>
                        <div class="">
                            <label for="text"
                                class="block mb-2 text-sm font-medium text-gray-900">Tgl_konsinyasi</label>
                            <input type="date" id="tgl_konsinyasi" name="tgl_konsinyasi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan tgl_konsinyasi disini...">
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    const editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modalTarget = button.dataset.modalTarget;
        const id = button.dataset.id;
        const id_konsinyasi = button.dataset.id_konsinyasi;
        const id_produk = button.dataset.id_produk;
        const stok = button.dataset.stok;
        const tgl_konsinyasi = button.dataset.tgl_konsinyasi;
    
        let url = "{{ route('konsinyasi_pro.update', ':id') }}".replace(':id', id);

        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `UPDATE KONSINYASI PRODUK ${id_konsinyasi}`;

        // document.getElementById('id_exrduduk').value = id_produk;
        let event = new Event('change');
        document.querySelector('[name="id_konsinyasi_edit"]').value = id_konsinyasi;
        document.querySelector('[name="id_konsinyasi_edit"]').dispatchEvent(event);
        document.querySelector('[name="id_produk_edit"]').value = id_produk;
        document.querySelector('[name="id_produk_edit"]').dispatchEvent(event);
        document.getElementById('stok').value = stok;
        document.getElementById('tgl_konsinyasi').value = tgl_konsinyasi;

        document.getElementById('formSourceButton').innerText = 'Simpan';
        document.getElementById('formSourceModal').setAttribute('action', url);
        let csrfToken = document.createElement('input');
        csrfToken.setAttribute('type', 'hidden');
        csrfToken.setAttribute('value', '{{ csrf_token() }}');
        formModal.appendChild(csrfToken);

        let methodInput = document.createElement('input');
        methodInput.setAttribute('type', 'hidden');
        methodInput.setAttribute('name', '_method');
        methodInput.setAttribute('value', 'PATCH');
        formModal.appendChild(methodInput);

        status.classList.toggle('hidden');
    }

    const sourceModalClose = (button) => {
        const modalTarget = button.dataset.modalTarget;
        let status = document.getElementById(modalTarget);
        status.classList.toggle('hidden');
    }

    const konsinyasi_proDelete = async (id, konsinyasi_pro) => {
        let tanya = confirm(`Apakah anda yakin untuk menghapus Konsinyasi Produk ${konsinyasi_pro} ?`);
        if (tanya) {
            await axios.post(`/konsinyasi_pro/${id}`, {
                    '_method': 'DELETE',
                    '_token': $('meta[name="csrf-token"]').attr('content')
                })
                .then(function(response) {
                    // Handle success
                    location.reload();
                })
                .catch(function(error) {
                    // Handle error
                    alert('Error deleting record');
                    console.log(error);
                });
        }
    }
</script>