@extends('admin.layout')
@section('style')
<style>
    .btn-custom {
        background: linear-gradient(to right, <?= $config->color1 ?>, <?= $config->color2 ?>);
        color: <?= $config->color_font ?>;
    }
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 col-md-12 order-1">
                <div class="row d-flex justify-content-center">
                    <div class="col-10">
                        <form action="{{route('ConfigSave')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    ตั้งค่าเว็บไซต์
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <label for="name" class="form-label">ชื่อเว็บไซต์ : </label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{$config->name}}">
                                        </div>
                                    </div>
                                    <h6>สีของปุ่ม</h6>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-4">
                                            <label for="color1" class="form-label">สีที่ 1 : </label>
                                            <input type="color" class="form-control" id="color1" name="color1" title="เลือกสี" value="{{$config->color1}}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="color2" class="form-label">สีที่ 2 : </label>
                                            <input type="color" class="form-control" id="color2" name="color2" title="เลือกสี" value="{{$config->color2}}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="color_font" class="form-label">สีตัวหนังสือ : </label>
                                            <input type="color" class="form-control" id="color_font" name="color_font" title="เลือกสี" value="{{$config->color_font}}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="demo-color" class="form-label">ปุ่มตัวอย่าง : </label>
                                            <button type="button" class="form-control btn-custom" id="demo-color">ปุ่มตัวอย่าง</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <h6>พื้นหลัง</h6>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <input class="form-control" type="file" id="image_bg" name="image_bg">
                                                <a href="{{($config->image_bg) ? url('storage/'.$config->image_bg) : 'javascript:void(0);'}}"
                                                    {{($config->image_bg) ? 'target="_blank" ' : ''}}
                                                    class="btn btn-outline-secondary" type="button"><i class="bx bx-search-alt-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <h6>QR-Code</h6>
                                    <div class="row g-3 mb-3">
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <input class="form-control" type="file" id="image_qr" name="image_qr">
                                                <a href="{{($config->image_qr) ? url('storage/'.$config->image_qr) : 'javascript:void(0);'}}"
                                                    {{($config->image_qr) ? 'target="_blank" ' : ''}}
                                                    class="btn btn-outline-secondary" type="button"><i class="bx bx-search-alt-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" class="btn btn-outline-primary">บันทึก</button>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{$config->id}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        const color1 = document.getElementById('color1');
        const color2 = document.getElementById('color2');
        const colorf = document.getElementById('color_font');
        const button = document.getElementById('demo-color');

        function updateGradient() {
            const c1 = color1.value;
            const c2 = color2.value;
            const cf = colorf.value;
            button.style.background = `linear-gradient(to right, ${c1}, ${c2})`;
            button.style.color = cf;
        }

        color1.addEventListener('input', updateGradient);
        color2.addEventListener('input', updateGradient);
        colorf.addEventListener('input', updateGradient);
    });
</script>
@endsection