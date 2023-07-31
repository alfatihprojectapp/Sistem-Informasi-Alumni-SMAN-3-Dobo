<div>

    <title>{{ $title }} | Dashboard - SMA Negeri 8 Buru</title>

    <div class="content-wrapper">
        <!-- title page -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0">{!! $icon !!} {{ $title_page }}
                            @can('admin')
                                <button wire:click="create" class="badge bg-primary border-0 px-3 py-2"
                                    style="font-size: 10pt;font-weight: normal;width: 135px;">
                                    <span wire:loading.remove wire:target="create">
                                        <i class="bi bi-plus-lg"></i> Buat informasi
                                    </span>
                                    <span wire:loading wire:target="create"
                                        class="spinner-border spinner-border-sm text-light" role="status"
                                        aria-hidden="true" style="width: 13px; height: 13px;"></span>
                                </button>
                            @endcan
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- continer -->
        <section class="content">
            <div class="container-fluid">

                @if ($showLivewireCreate)
                    @livewire('dashboard.informasi.create')
                    <script>
                        $(document).ready(function() {
                            $('#createModal').modal('show');
                        });
                    </script>
                @endif
                @if ($showLivewireUpdate)
                    @livewire('dashboard.informasi.update', ['informasi' => $getInformasi])
                    <script>
                        $(document).ready(function() {
                            $('#editModal').modal('show');
                        });
                    </script>
                @endif
                @if ($showLivewireDelete)
                    @livewire('dashboard.informasi.delete', ['informasi' => $getInformasi])
                    <script>
                        $(document).ready(function() {
                            $('#deleteModal').modal('show');
                        });
                    </script>
                @endif
                <script>
                    $(document).on('click', '#closeModal', function() {
                        Livewire.emit('closeLivewire');
                    });
                </script>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <select class="form-select sm w-auto" wire:model="paginate">
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <input wire:model="search" type="text" placeholder="Cari" class="form-control">
                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($informasi->count())
                    @foreach ($informasi as $data)
                        <div class="card">
                            <div class="card-header">
                                @can('admin')
                                    <button class="badge bg-success mb-1 border-0 py-2"
                                        wire:click="edit({{ $data->id_informasi }})" ata-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Ubah" style="width: 80px;">
                                        <span wire:loading.remove wire:target="edit({{ $data->id_informasi }})">
                                            <i class="bi bi-pencil-square"></i> Ubah
                                        </span>
                                        <span wire:loading wire:target="edit({{ $data->id_informasi }})"
                                            class="spinner-border spinner-border-sm text-light" role="status"
                                            aria-hidden="true" style="width: 11px; height: 11px;"></span>
                                    </button>

                                    <button class="badge bg-danger mb-1 border-0 py-2"
                                        wire:click="delete({{ $data->id_informasi }})" ata-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Hapus" style="width: 80px;">
                                        <span wire:loading.remove wire:target="delete({{ $data->id_informasi }})">
                                            <i class="bi  bi-trash"></i> Hapus
                                        </span>
                                        <span wire:loading wire:target="delete({{ $data->id_informasi }})"
                                            class="spinner-border spinner-border-sm text-light" role="status"
                                            aria-hidden="true" style="width: 11px; height: 11px;"></span>
                                    </button>
                                @endcan
                                <div class="card-tools">
                                    <small>{{ $data->created_at->diffForHumans() }}</small>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="bi bi-dash-lg"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                {!! $data->isi_informasi !!}
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">{{ $informasi->links() }}</div>
                    @endforeach
                @else
                    <hr>
                    <p class="text-center text-secondary mt-5">Data tidak ditemukan !</p>
                @endif

            </div>
        </section>

    </div>

</div>
