@extends('layouts.luxury-nav')

@section('title', 'หน้าหลัก')

@section('content')
<style>
    .carousel-item img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 10px;
    }

    .icon-have {

        padding: 5px;
        background: linear-gradient(360deg, var(--primary-color), var(--sub-color));
        object-fit: cover;
        border-radius: 100%;
    }

    .icon-have img {
        width: 50px;
        height: 50px;
    }

    .title-food {
        font-size: 30px;
        font-weight: bold;
    }

    .food-box {
        width: 150px;
        height: 100px;
        position: relative;
        flex-shrink: 0;
    }

    .food-image-wrapper {
        width: 100%;
        height: 100%;
        position: relative;
    }

    .food-image-wrapper img {
        width: 100%;
        height: 100%;
        border-radius: 15%;
        object-fit: cover;
    }

    .food-label {
        position: absolute;
        bottom: 0;
        left: 50%;
        /* border:2px solid #000; */
        width: 100%;
        transform: translateX(-50%);
        font-size: 18px;
        color: white;
        font-weight: bold;
        text-align: center;
        text-shadow:
            1px 1px var(--primary-color),
            -1px 1px var(--primary-color),
            1px -1px var(--primary-color),
            -1px -1px var(--primary-color),
            0 1px var(--primary-color),
            1px 0 var(--primary-color),
            0 -1px var(--primary-color),
            -1px 0 var(--primary-color);
    }
</style>
<div id="carouselCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner" style="border-radius: 10px;">
        <div class="carousel-item active">
            <img src="{{ asset('slide/slide-1.png') }}" class="d-block w-100" alt="slide">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('slide/slide-2.png') }}" class="d-block w-100" alt="slide">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('slide/slide-3.png') }}" class="d-block w-100" alt="slide">
        </div>
    </div>
    {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button> --}}
</div>
<div class="container mt-1">
    <div class="d-flex flex-column justify-content-center">
        <div class=" text-start fw-bold fs-5">
            ที่นี่เรามี...
        </div>
        <div class="overflow-x-auto d-flex justify-content-between gap-2 py-2"
            style="overflow-x: auto; white-space: nowrap;">
            <div class="d-flex flex-column justify-content-center align-items-center flex-shrink-0">
                <div class="icon-have">
                    <img src="{{ asset('icon/icon-4.png') }}" alt="icon">
                </div>
                <div class="mt-1 fw-bold" style="font-size: 14px;">wifi ฟรี</div>
            </div>

            <div class="d-flex flex-column justify-content-center align-items-center flex-shrink-0">
                <div class="icon-have">
                    <img src="{{ asset('icon/icon-1.png') }}" alt="icon">
                </div>
                <div class="mt-1 fw-bold" style="font-size: 14px;">ที่จอดรถ</div>
            </div>

            <div class="d-flex flex-column justify-content-center align-items-center flex-shrink-0">
                <div class="icon-have">
                    <img src="{{ asset('icon/icon-2.png') }}" alt="icon" style="padding: 7px;">
                </div>
                <div class="mt-1 fw-bold" style="font-size: 14px;">จ่ายด้วย QR</div>
            </div>

            <div class="d-flex flex-column justify-content-center align-items-center flex-shrink-0">
                <div class="icon-have">
                    <img src="{{ asset('icon/icon-3.png') }}" alt="icon">
                </div>
                <div class="mt-1 fw-bold" style="font-size: 13px;">ห้องน้ำสะอาด</div>
            </div>
        </div>
        <div class="title-food">
            หมวดอาหาร
        </div>
        <div class="gap-2 py-2">
            <div class="d-flex flex-column justify-content-center align-items-center flex-shrink-0 gap-2">
                <div class="row">
                    <div class="col-6">
                        <div class="food-box d-flex flex-column justify-content-center align-items-center">
                            <a href="/detail">
                                <div class="food-image-wrapper">
                                    <img src="{{ asset('foods/food5.png') }}" alt="icon">
                                    <div class="food-label">อาหารตามสั่ง</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="food-box d-flex flex-column justify-content-center align-items-center">
                            <a href="/detail">
                                <div class="food-image-wrapper">
                                    <img src="{{ asset('foods/food5.png') }}" alt="icon">
                                    <div class="food-label">อาหารตามสั่ง</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="food-box d-flex flex-column justify-content-center align-items-center">
                            <a href="/detail">
                                <div class="food-image-wrapper">
                                    <img src="{{ asset('foods/food5.png') }}" alt="icon">
                                    <div class="food-label">อาหารตามสั่ง</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="food-box d-flex flex-column justify-content-center align-items-center">
                            <a href="/detail">
                                <div class="food-image-wrapper">
                                    <img src="{{ asset('foods/food5.png') }}" alt="icon">
                                    <div class="food-label">อาหารตามสั่ง</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="food-box d-flex flex-column justify-content-center align-items-center">
                            <a href="/detail">
                                <div class="food-image-wrapper">
                                    <img src="{{ asset('foods/food5.png') }}" alt="icon">
                                    <div class="food-label">อาหารตามสั่ง</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="food-box d-flex flex-column justify-content-center align-items-center">
                            <a href="/detail">
                                <div class="food-image-wrapper">
                                    <img src="{{ asset('foods/food5.png') }}" alt="icon">
                                    <div class="food-label">อาหารตามสั่ง</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="food-box d-flex flex-column justify-content-center align-items-center">
                            <a href="/detail">
                                <div class="food-image-wrapper">
                                    <img src="{{ asset('foods/food5.png') }}" alt="icon">
                                    <div class="food-label">อาหารตามสั่ง</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="food-box d-flex flex-column justify-content-center align-items-center">
                            <a href="/detail">
                                <div class="food-image-wrapper">
                                    <img src="{{ asset('foods/food5.png') }}" alt="icon">
                                    <div class="food-label">อาหารตามสั่ง</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


@endsection