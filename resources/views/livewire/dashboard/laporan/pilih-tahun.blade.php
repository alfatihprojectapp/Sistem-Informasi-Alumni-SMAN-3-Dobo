<div>
    <div wire:ignore.self class="modal fade" id="pilihTahunCetakModal" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5><i class="bi bi-calendar-check"></i> Pilih tahun cetak</h5>

                </div>
                <div class="modal-body">
                    <p style="font-size: 12pt;">Cetak data siswa baru jurusan <b>{{ $nama_jurusan }}</b> pada tahun :</p>
                    <div class="dropdown d-inline">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Pilih tahun
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @foreach ($tahun as $data)
                                <li>
                                    <a target="blank" class="dropdown-item"
                                        href="/dashboard/siswa/{{ $kode_jurusan }}/{{ $data->tahun }}/cetak">
                                        {{ 'Tahun pendaftaran ' . $data->tahun }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                        <button id="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>


    @if ($closeModal)
        <script>
            $(document).ready(function() {
                $('#pilihTahunCetakModal').modal('hide');
            })
        </script>
    @endif


</div>
