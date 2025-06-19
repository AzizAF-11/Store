<div class="font-ibm bg-gray-100 flex items-center justify-center ">
    <div class="bg-white rounded-xl shadow-lg p-8 w-full flex flex-col overflow-y-auto"
        style="max-height: calc(100vh - 100px);">
        <h2 class="text-3xl font-bold mb-8 text-gray-900 text-center flex-shrink-0">Tambah Produk Baru</h2>
        <div>
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-lg">
                    <strong>Oops!</strong> Terdapat kesalahan dalam pengisian form:
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <div class="overflow-y-auto pr-2">
            <form class="space-y-7">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="kode_bahan" class="block text-sm font-semibold text-gray-700 mb-1">Kode
                            Bahan</label>
                        <div class="flex items-center space-x-2">
                            <input type="text" wire:model.defer="kode_bahan" id="kode_bahan" readonly
                                class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                            <button type="button" wire:click="generateKodeBahan"
                                class="btn btn-sm bg-blue-500 text-white w-full px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 transition duration-150 ease-in-out">
                                Generate Kode Otomatis
                            </button>
                        </div>


                        @error('kode_bahan') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="nama_bahan" class="block text-sm font-semibold text-gray-700 mb-1">Nama
                            Bahan</label>
                        <input type="text" wire:model.defer="nama_bahan" id="nama_bahan"
                            class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                        @error('nama_bahan') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="harga" class="block text-sm font-semibold text-gray-700 mb-1">Harga</label>
                        <input type="number" wire:model.defer="harga" id="harga"
                            class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                            step="0.01">
                        @error('harga') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="stok" class="block text-sm font-semibold text-gray-700 mb-1">Stok</label>
                        <input type="number" wire:model.defer="stok" id="stok"
                            class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                        @error('stok') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="satuan" class="block text-sm font-semibold text-gray-700 mb-1">Satuan</label>
                        <input type="text" wire:model.defer="satuan" id="satuan"
                            class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                        @error('satuan') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="berat" class="block text-sm font-semibold text-gray-700 mb-1">Berat (gram)</label>
                        <input type="number" wire:model.defer="berat" id="berat"
                            class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                            step="0.01">
                        @error('berat') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="min_pembelian" class="block text-sm font-semibold text-gray-700 mb-1">Min.
                            Pembelian</label>
                        <input type="number" wire:model.defer="min_pembelian" id="min_pembelian"
                            class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                        @error('min_pembelian') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="maks_pembelian" class="block text-sm font-semibold text-gray-700 mb-1">Maks.
                            Pembelian</label>
                        <input type="number" wire:model.defer="maks_pembelian" id="maks_pembelian"
                            class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                        @error('maks_pembelian') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="diskon" class="block text-sm font-semibold text-gray-700 mb-1">Diskon (%)</label>
                        <input type="number" wire:model.defer="diskon" id="diskon"
                            class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                            step="0.01">
                        @error('diskon') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="tanggal_kadaluwarsa" class="block text-sm font-semibold text-gray-700 mb-1">Tanggal
                            Kadaluwarsa</label>
                        <input type="date" wire:model.defer="tanggal_kadaluwarsa" id="tanggal_kadaluwarsa"
                            class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                        @error('tanggal_kadaluwarsa') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="kategori_id" class="block text-sm font-semibold text-gray-700 mb-1">Kategori</label>
                        <select wire:model.defer="kategori_id" id="kategori_id"
                            class="form-select w-full px-4 py-2 border text-gray-600 border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                        <select wire:model.defer="status" id="status"
                            class="form-select w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                        @error('status') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div wire:ignore>
                    <div x-data="quillEditorComponent(@entangle('deskripsi'))" class="mb-2">
                        <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
                        <div x-ref="quillEditor"
                            class="bg-white border border-gray-300 rounded-lg p-2 min-h-[150px] text-gray-800"></div>
                    </div>

                    @error('deskripsi')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror

                </div>

                <!-- Upload Thumbnail -->
                <div class="mb-6">
                    <label for="thumbnail" class="block text-sm font-semibold text-gray-700 mb-2">Thumbnail</label>

                    @if ($thumbnail)

                        <div class="relative group w-1/2 h-64">
                            <img src="{{ $thumbnail->temporaryUrl() }}"
                                class="w-full h-full object-cover rounded-lg shadow border">
                            <button wire:click.prevent="removeThumbnail"
                                class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition">
                                ✕
                            </button>
                        </div>
                    @else

                        <div class="flex items-center justify-start w-full">
                            <label for="thumbnail"
                                class="flex flex-col items-center justify-center w-1/2 h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 
                                                    5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 
                                                    5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 
                                                    15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk
                                            unggah</span> atau tarik ke sini</p>
                                    <p class="text-xs text-gray-500">JPG, PNG (Max 800x400px)</p>
                                </div>
                                <input id="thumbnail" type="file" wire:model="thumbnail" class="hidden" />
                            </label>
                        </div>
                    @endif

                    @error('thumbnail')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <!-- WRAPPER -->
                <div class="flex gap-4">
                    <div class="w-full md:w-1/2 mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Album Gambar 1</label>

                        @if ($album1 && count($album1) > 0)
                            <div class="relative group w-full">
                                <img src="{{ $album1[0]->temporaryUrl() }}"
                                    class="w-full h-64 object-cover rounded-lg shadow border">

                                <button wire:click.prevent="removeImageFromAlbum(1, 0)"
                                    class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition">
                                    ✕
                                </button>
                            </div>
                        @else
                            <div class="flex items-center justify-center w-full">
                                <label for="album1"
                                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-10 h-10 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16V4m0 0l4 4m-4-4L3 8m14 0v8m0 0l-4-4m4 4l4-4" />
                                        </svg>
                                        <p class="mb-1 text-sm text-gray-600"><span class="font-semibold">Klik untuk
                                                unggah</span> atau tarik ke sini</p>
                                        <p class="text-xs text-gray-500">Format: JPG, PNG • Max 800x400px</p>
                                    </div>
                                    <input id="album1" type="file" wire:model="album1" class="hidden" multiple />
                                </label>
                            </div>
                        @endif
                    </div>

                    <div class="w-full md:w-1/2 mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Album Gambar 2</label>

                        @if ($album2 && count($album2) > 0)
                            <div class="relative group w-full">
                                <img src="{{ $album2[0]->temporaryUrl() }}"
                                    class="w-full h-64 object-cover rounded-lg shadow border">

                                <button wire:click.prevent="removeImageFromAlbum(2, 0)"
                                    class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition">
                                    ✕
                                </button>
                            </div>
                        @else
                            <div class="flex items-center justify-center w-full">
                                <label for="album2"
                                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-10 h-10 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16V4m0 0l4 4m-4-4L3 8m14 0v8m0 0l-4-4m4 4l4-4" />
                                        </svg>
                                        <p class="mb-1 text-sm text-gray-600"><span class="font-semibold">Klik untuk
                                                unggah</span> atau tarik ke sini</p>
                                        <p class="text-xs text-gray-500">Format: JPG, PNG • Max 800x400px</p>
                                    </div>
                                    <input id="album2" type="file" wire:model="album2" class="hidden" multiple />
                                </label>
                            </div>
                        @endif
                    </div>
                </div>

            </form>
        </div>

        <div class="flex justify-end space-x-4 pt-4 flex-shrink-0">
            <button type="button" wire:click="cancelCreate"
                class="px-6 py-2 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 transition duration-150 ease-in-out">Batal</button>
            <button type="submit" wire:click="createProduct"
                class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 transition duration-150 ease-in-out">Simpan
                Produk</button>
        </div>
    </div>
</div>