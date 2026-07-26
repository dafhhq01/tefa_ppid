<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Frontend PPID</title>
    <style>
        body {
            font-family: system-ui, sans-serif;
            line-height: 1.6;
            padding: 2rem;
            max-width: 900px;
            margin: auto;
            background: #f9fafb;
            color: #111827;
        }

        h1 {
            border-bottom: 2px solid #2563eb;
            padding-bottom: 0.5rem;
        }

        section {
            background: white;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        ul {
            padding-left: 1.5rem;
        }

        li {
            margin-bottom: 0.5rem;
        }

        a {
            color: #2563eb;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .badge {
            background: #e5e7eb;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-size: 0.8rem;
        }
    </style>
</head>

<body>

    <h1>Testing Frontend PPID </h1>

    <section>
        <h2>📰 FE1: Berita Featured (Homepage)</h2>
        <ul>
            @forelse($featured_news as $n)
                <li>
                    <strong>{{ $n->title }}</strong> <span
                        class="badge">{{ $n->published_at?->format('d M Y') }}</span><br>
                    <img src="{{ url('storage/' . $n->thumbnail) }}" alt="thumb"
                        style="width: 150px; border-radius: 4px; margin-top: 5px;"><br>
                    <small>{{ $n->excerpt }}</small>


                </li>
            @empty
                <li>Belum ada berita featured.</li>
            @endforelse
        </ul>
    </section>

    <section>
        <h2>📚 FE4: Publikasi & Laporan</h2>
        <ul>
            @forelse($publications as $pub)
                <li>
                    <strong>{{ $pub->title }}</strong> <span class="badge">{{ $pub->category }}</span><br>
                    <a href="{{ url('storage/' . $pub->file) }}" target="_blank">📥 Download PDF</a>
                </li>
            @empty
                <li>Belum ada publikasi.</li>
            @endforelse
        </ul>
    </section>

    <section>
        <h2>📄 FE4: Dokumen Center</h2>
        <ul>
            @forelse($documents as $doc)
                <li>
                    <strong>{{ $doc->title }}</strong>
                    <span class="badge">{{ $doc->category }}</span>
                    <span class="badge">{{ $doc->type }}</span><br>
                    <a href="{{ url('storage/' . $doc->file) }}" target="_blank">📥 Download Dokumen</a>
                </li>
            @empty
                <li>Belum ada dokumen.</li>
            @endforelse
        </ul>
    </section>

    <section>
        <h2>💼 FE4: Pengadaan Barang & Jasa</h2>
        <ul>
            @forelse($procurements as $rup)
                <li>
                    <strong>{{ $rup->title }} ({{ $rup->year }})</strong>
                    @if ($rup->file)
                        - <a href="{{ url('storage/' . $rup->file) }}" target="_blank">Download RUP</a>
                    @endif

                    @if ($rup->children->count() > 0)
                        <ul>
                            @foreach ($rup->children as $paket)
                                <li>
                                    ↳ Paket: {{ $paket->title }} <span class="badge">{{ $paket->stage }}</span>
                                    @if ($paket->file)
                                        - <a href="{{ url('storage/' . $paket->file) }}" target="_blank">Download</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @empty
                <li>Belum ada data pengadaan.</li>
            @endforelse
        </ul>
    </section>

</body>

</html>
