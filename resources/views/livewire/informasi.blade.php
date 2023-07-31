<div>
    <title>Informasi - SMA Negeri 8 Buru</title>

    <main id="main">

        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="/">Beranda</a></li>
                    <li>Informasi</li>
                </ol>
                <h2>Informasi</h2>

            </div>
        </section>

        <section wire:ignore.self id="portfolio-details" class="portfolio-details" data-aos="fade-up"
            data-aos-duration="1000">
            <div class="container">

                @if ($informasi->count())
                    @foreach ($informasi as $data)
                        <div class="card mb-3">
                            <div class="card-header">
                                <div class="container d-flex align-items-center">
                                    <div class="me-auto">
                                        {{-- {{ $data->created_at }} --}}
                                    </div>
                                    <div class="ms-auto">
                                        <small class="text-secondary">{{ $data->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {!! $data->isi_informasi !!}
                            </div>
                        </div>
                    @endforeach
                @else
                    <hr>
                    <p class="text-center text-secondary mt-5">Data tidak ditemukan !</p>
                @endif

            </div>
        </section>
    </main>

</div>
