<article>

    <h1>

        {{ $title }}

    </h1>

    @if ($image)

        <img
            src="{{ $image }}"
            alt="{{ $title }}"
            style="
                width: 100%;
                max-height: 500px;
                object-fit: cover;
                border-radius: 12px;
                margin: 25px 0;
            "
        >

    @endif

    <div>

        {!! $content !!}

    </div>

    @if ($file)

        <div style="margin-top: 30px;">

            <a
                href="{{ $file }}"
                target="_blank"
            >

                Download File

            </a>

        </div>

    @endif

    @if (
        $button_text
        &&
        $button_link
    )

        <div style="margin-top: 30px;">

            <a
                href="{{ $button_link }}"
            >

                {{ $button_text }}

            </a>

        </div>

    @endif

</article>