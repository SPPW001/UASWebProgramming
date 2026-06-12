@extends('pengunjung.layout')

@section('title', $artikel->judul . ' - RBlog Neon')

@section('content')
<div class="row g-4">
    <div class="col-lg-8">
        <div class="breadcrumb-cyber">
            <a href="{{ route('pengunjung.index') }}">Beranda</a>
            / <a href="{{ route('pengunjung.kategori', $artikel->id_kategori) }}">{{ $artikel->kategori->nama_kategori ?? 'Tanpa Kategori' }}</a>
            / {{ $artikel->judul }}
        </div>

        <article class="detail-card">
            <img class="cover cover-detail" src="{{ asset('storage/gambar/' . $artikel->gambar) }}" alt="Gambar {{ $artikel->judul }}" onerror="this.style.display='none'">
            <div class="detail-body">
                <span class="badge-cyber">{{ $artikel->kategori->nama_kategori ?? 'Tanpa Kategori' }}</span>
                <h1 class="article-title">{{ $artikel->judul }}</h1>
                <div class="meta">
                    {{ trim(($artikel->penulis->nama_depan ?? '') . ' ' . ($artikel->penulis->nama_belakang ?? '')) ?: 'Penulis Tidak Diketahui' }} · {{ $artikel->hari_tanggal }}
                </div>
                <div class="content article-content">
                    {!! $artikel->isi !!}
                </div>
                <div class="mt-4">
                    <a href="{{ route('pengunjung.index') }}" class="btn btn-neon">← Kembali ke Beranda</a>
                </div>
            </div>
        </article>
    </div>

    <aside class="col-lg-4">
        <div class="side-card">
            <div class="side-title">ARTIKEL TERKAIT</div>
            @forelse($artikelTerkait as $item)
                <a href="{{ route('pengunjung.detail', $item->id) }}" class="related-item">
                    <img class="related-img" src="{{ asset('storage/gambar/' . $item->gambar) }}" alt="Gambar {{ $item->judul }}" onerror="this.style.display='none'">
                    <span>
                        <span class="related-title d-block">{{ \Illuminate\Support\Str::limit($item->judul, 56) }}</span>
                        <span class="meta d-block mb-0">{{ $item->hari_tanggal }}</span>
                    </span>
                </a>
            @empty
                <p class="meta mb-0">Belum ada artikel terkait dari kategori yang sama.</p>
            @endforelse
        </div>
    </aside>
</div>
@endsection
