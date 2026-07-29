<div
    class="card border-0 shadow-sm
           text-center h-100"
>

    <div class="pt-4">

        <img
            src="{{ $member->photo }}"
            alt="{{ $member->name }}"
            class="rounded-circle shadow-sm"
            width="150"
            height="150"
            style="object-fit: cover;"
        >

    </div>

    <div class="card-body p-4">

        <h4 class="fw-bold">

            {{ $member->name }}

        </h4>

        <p
            class="fw-bold"
            style="color: #0B4F6C;"
        >

            {{ $member->position }}

        </p>

        <p class="text-secondary mb-0">

            {{ $member->description }}

        </p>

    </div>

</div>