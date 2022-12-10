<div class="btn-folder col-md-4 col-12 mb-4">
    <a href="{{ route($route) }}">
        <div class="card card-custom wave wave-animate-slow wave-{{$color}} mb-2">
            <div class="card-body">
                <div class="d-flex align-items-center p-5">
                    <div class="mr-6">
                        <span class="svg-icon svg-icon-{{$color}} svg-icon-4x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                        </span>
                    </div>
                    <div class="d-flex flex-column">
                        <label>{{ $title }}</label>
                        <div class="text-dark-75">
                            {{ $subtitle }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div> <!-- بياناتي -->
