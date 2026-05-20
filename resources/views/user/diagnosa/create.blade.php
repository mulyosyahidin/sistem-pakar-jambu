@extends('layouts.satoshi')
@section('title', 'Diagnosa Baru')

@section('custom_head')
    <style>
        .btn-cart {
            position: relative;
        }

        .btn-cart .item-count {
            position: absolute;
            top: -8px;
            left: -8px;
            width: 20px;
            height: 20px;
            background-color: #8655FA;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@endsection

@section('content')
    <main class="container-fluid p-0" xmlns="http://www.w3.org/1999/html">
        <div class="px-6 px-lg-7 pt-8 border-bottom">
            <div class="d-flex align-items-center">
                <h1>Diagnosa Baru</h1>

                <div class="hstack gap-2 ms-auto">
                    <button class="btn btn-sm btn-neutral btn-cart">
                        <i class="bi bi-cart"></i>

                        <span class="item-count">0</span>
                    </button>

                    <button type="submit" class="btn btn-sm btn-primary btn-submit">
                        <i class="bi bi-send me-2"></i> Diagnosa
                    </button>
                </div>
            </div>

            <ul class="nav nav-tabs nav-tabs-flush gap-8 overflow-x border-0 mt-4">
                @foreach($gejala as $item)
                    <li class="nav-item">
                        <button class="nav-link {{ $loop->index == 0 ? 'active' : '' }}" id="{{ $loop->iteration }}-tab"
                                data-bs-toggle="tab" data-bs-target="#tab_{{ $loop->iteration }}"
                                type="button" role="tab" aria-controls="{{ $loop->index == 0 ? 'true' : 'false' }}"
                                aria-selected="true">
                            {{ $item['kategori'] }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="vstack gap-6 p-7">
            <div class="tab-content">
                @foreach($gejala as $item)
                    <div class="tab-pane fade {{ $loop->index == 0 ? 'show active' : '' }}"
                         id="tab_{{ $loop->iteration }}" role="tabpanel"
                         aria-labelledby="{{ $loop->iteration }}-tab">
                        <div class="row g-6">
                            @foreach($item['data'] as $data)
                                @php
                                    $hasMedia = filled($data->media_url);
                                @endphp
                                <div class="col-xl-3 col-md-3 col-sm-6">
                                    <div class="card">
                                        @if($hasMedia)
                                            <div class="position-relative group-item-invisible group-item-visible-hover">
                                                @if($data->media_type == 'image')
                                                    <img
                                                        src="{{ asset($data->media_url) }}"
                                                        class="card-img-top" alt="{{ $data->nama }}">
                                                @elseif ($data->media_type == 'video')
                                                    <iframe width="100%" height="350"
                                                            style="border-top-left-radius: 8px; border-top-right-radius: 8px;"
                                                            src="https://www.youtube.com/embed/{{ getYoutubeVideId($data->media_url) }}"
                                                            title="YouTube video player" frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                            allowfullscreen></iframe>
                                                @endif
                                                <div
                                                    class="group-item rounded-top d-flex flex-column p-4 position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-25">
                                                    @if($data->media_type == 'video')
                                                        <div class="d-flex justify-content-end">
                                                            <a href="{{ $data->media_url }}" target="_blank"
                                                               class="btn btn-sm btn-square border-0 text-bg-dark bg-opacity-70 bg-opacity-100-hover">
                                                                <i class="bi bi-box-arrow-up-right"></i>
                                                            </a>
                                                        </div>
                                                    @endif

                                                    <div class="text-center mt-auto">
                                                        <a class="btn btn-sm btn-white w-100 btn-select" data-id="{{ $data->id }}">
                                                            Pilih
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="h6 text-sm">{{ $data->nama }}</span>
                                            </div>
                                            @if($data->deskripsi)
                                                <div class="text-sm text-muted my-1">{{ $data->deskripsi }}</div>
                                            @endif
                                            @unless($hasMedia)
                                                <a class="btn btn-sm btn-neutral w-100 mt-3 btn-select" data-id="{{ $data->id }}">
                                                    Pilih
                                                </a>
                                            @endunless
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection

@section('custom_html')
    <form action="{{ route('user.diagnosa.store') }}" method="post" id="diagnosa-form">
        @csrf
    </form>
@endsection

@push('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        let selectedItems = {};
        let itemCountElement = document.querySelector('.item-count');
        let btnSelectElements = document.querySelectorAll('.btn-select');

        btnSelectElements.forEach(function(btnSelectElement) {
            btnSelectElement.addEventListener('click', toggleItemSelection);
        });

        function toggleItemSelection(e) {
            let itemId = e.target.getAttribute('data-id');

            let card = e.target.closest('.card');
            let button = card.querySelector('.btn-select');

            let message = '';

            if (selectedItems[itemId]) {
                delete selectedItems[itemId];

                card.classList.remove('bg-primary-subtle');
                button.innerHTML = 'Pilih';

                message = 'Gejala dihapus!';
            } else {
                selectedItems[itemId] = true;

                card.classList.add('bg-primary-subtle');
                button.innerHTML = 'Hapus Pilihan';

                message = 'Gejala dipilih!';
            }

            itemCountElement.textContent = Object.keys(selectedItems).length;

            showToast(message);
        }

        let btnSubmit = document.querySelector('.btn-submit');
        let diagnosaForm = document.querySelector('#diagnosa-form');

        btnSubmit.addEventListener('click', handleSubmit);

        function handleSubmit(e) {
            e.preventDefault();

            let selectedItemsArray = Object.keys(selectedItems);

            if (selectedItemsArray.length === 0) {
                showToast('Pilih setidaknya satu gejala!', 'linear-gradient(to right, #ff416c, #ff4b2b)');
            } else {
               for (let i = 0; i < selectedItemsArray.length; i++) {
                    let input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'id_gejala[]';
                    input.value = selectedItemsArray[i];

                    diagnosaForm.appendChild(input);
                }

                diagnosaForm.submit();
            }
        }

        function showToast(message, background = "linear-gradient(to right, #00b09b, #96c93d)") {
            Toastify({
                text: message,
                duration: 3000,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                    background: background,
                },
                onClick: function() {}
            }).showToast();
        }
    </script>

@endpush
