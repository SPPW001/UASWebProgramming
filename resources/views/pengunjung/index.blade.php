@extends('pengunjung.layout')

@section('title', 'Beranda Pengunjung - RBlog Neon')

@section('content')
<div class="row g-4">
    <div class="col-lg-8">
        <div class="mb-4">
            <span class="badge-cyber">PUBLIC ACCESS</span>
            <h1 class="article-title mt-3 mb-2">
                {{ $kategoriAktif ? 'Kategori: ' . $kategoriAktif->nama_kategori : 'Lima Artikel Terbaru' }}
            </h1>
        </div>

        @forelse($artikel as $item)
            <article class="article-card">
                <a href="{{ route('pengunjung.detail', $item->id) }}">
                    <img class="cover" src="{{ asset('storage/gambar/' . $item->gambar) }}" alt="Gambar {{ $item->judul }}" onerror="this.style.display='none'">
                </a>
                <div class="article-body">
                    <span class="badge-cyber">{{ $item->kategori->nama_kategori ?? 'Tanpa Kategori' }}</span>
                    <h2 class="article-title">
                        <a href="{{ route('pengunjung.detail', $item->id) }}">{{ $item->judul }}</a>
                    </h2>
                    <div class="meta">
                        {{ trim(($item->penulis->nama_depan ?? '') . ' ' . ($item->penulis->nama_belakang ?? '')) ?: 'Penulis Tidak Diketahui' }} · {{ $item->hari_tanggal }}
                    </div>
                    <p class="excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 230) }}</p>
                    <a href="{{ route('pengunjung.detail', $item->id) }}" class="btn btn-neon">Kelanjutannya →</a>
                </div>
            </article>
        @empty
            <div class="empty-state">
                Belum ada artikel untuk ditampilkan. Isi dulu CMS-nya, karena halaman publik tidak bisa memanggil konten dari alam gaib.
            </div>
        @endforelse
    </div>

    <aside class="col-lg-4">
        <div class="side-card">
            <div class="side-title">KATEGORI ARTIKEL</div>
            <a href="{{ route('pengunjung.index') }}" class="category-link {{ $kategoriAktif ? '' : 'active' }}">
                <span>Semua Artikel</span>
                <span class="count-pill">{{ $kategoriArtikel->sum('artikel_count') }}</span>
            </a>
            @foreach($kategoriArtikel as $kategori)
                <a href="{{ route('pengunjung.kategori', $kategori->id) }}" class="category-link {{ optional($kategoriAktif)->id === $kategori->id ? 'active' : '' }}">
                    <span>{{ $kategori->nama_kategori }}</span>
                    <span class="count-pill">{{ $kategori->artikel_count }}</span>
                </a>
            @endforeach
        </div>
    </aside>
</div>
@endsection
