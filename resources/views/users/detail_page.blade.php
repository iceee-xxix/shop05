@extends('layouts.luxury-nav')

@section('title', 'หน้ารายละเอียด')

@section('content')
    <style>
        .title-food {
            font-size: 30px;
            font-weight: bold;
        }

        .card-food {
            background-color: var(--bg-card-food);
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
            padding: 4px;
        }


        .card-food img {
            width: 120px;
            height: 90px;
            border-radius: 20px;
        }

        .card-title {
            font-size: 21px;
            font-weight: bold;
        }

        .btn-gray-left {
            background-color: #d3d3d3;
            color: #333;
            border: none;
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px;
            padding: 0px 14px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        .btn-gray-right {
            background-color: #d3d3d3;
            color: #333;
            border: none;
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;
            padding: 0px 14px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        .btn-gray-left:hover {
            background-color: #c0c0c0;
            transform: scale(1.05);
        }

        .btn-gray-right:hover {
            background-color: #c0c0c0;
            transform: scale(1.05);
        }

        .count {
            background-color: #e0e0e0;
            padding: 1.5px 0px;
        }
    </style>

    <div class="container">
        <div class="d-flex flex-column justify-content-center gap-2">
            <div class="title-food">
                หมวดอาหาร
            </div>
            <!-- เมนู 1 -->
            <div class="d-flex justify-content-start align-items-start card-food gap-2">
                <img src="{{ asset('foods/food1.png') }}" alt="food" style="width: 100px;">
                <div class="d-flex flex-column justify-content-center">
                    <div class="card-title text-start">
                        บะหมี่เกี๋ยวต้มยำ
                    </div>

                    <!-- ธรรมดา -->
                    <div class="d-flex justify-content-between align-items-center gap-2 mb-1">
                        <div>ธรรมดา 50</div>
                        <!-- ปุ่มเพิ่ม/ลดพร้อมคลาสปุ่มเทา -->
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn-gray-left" onclick="changeCount(this, -1)" data-name="บะหมี่เกี๋ยวต้มยำ"
                                data-type="ธรรมดา" data-price="40">-</button>
                            <div class="count fw-bold px-2">0</div>
                            <button class="btn-gray-right" onclick="changeCount(this, 1)" data-name="บะหมี่เกี๋ยวต้มยำ"
                                data-type="ธรรมดา" data-price="40">+</button>
                        </div>

                    </div>

                    <!-- พิเศษ -->
                    <div class="d-flex justify-content-between align-items-center gap-2">
                        <div>พิเศษ 60</div>
                        <!-- ปุ่มเพิ่ม/ลดพร้อมคลาสปุ่มเทา -->
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn-gray-left" onclick="changeCount(this, -1)" data-name="บะหมี่เกี๋ยวต้มยำ"
                                data-type="พิเศษ" data-price="60">-</button>
                            <div class="count fw-bold px-2">0</div>
                            <button class="btn-gray-right" onclick="changeCount(this, 1)" data-name="บะหมี่เกี๋ยวต้มยำ"
                                data-type="พิเศษ" data-price="60">+</button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- เมนู 2 -->
            <div class="d-flex justify-content-start align-items-start card-food gap-2">
                <img src="{{ asset('foods/food2.png') }}" alt="food" style="width: 100px;">
                <div class="d-flex flex-column justify-content-center">
                    <div class="card-title text-start">
                        มาม่า
                    </div>

                    <!-- ธรรมดา -->
                    <div class="d-flex justify-content-between align-items-center gap-2 mb-1">
                        <div>ธรรมดา 40</div>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn-gray-left" onclick="changeCount(this, -1)" data-name="มาม่า"
                                data-type="ธรรมดา" data-price="40">-</button>
                            <div class="count fw-bold px-2">0</div>
                            <button class="btn-gray-right" onclick="changeCount(this, 1)" data-name="มาม่า"
                                data-type="ธรรมดา" data-price="40">+</button>
                        </div>
                    </div>

                    <!-- พิเศษ -->
                    <div class="d-flex justify-content-between align-items-center gap-2">
                        <div>พิเศษ 70</div>
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn-gray-left" onclick="changeCount(this, -1)" data-name="มาม่า"
                                data-type="พิเศษ" data-price="70">-</button>
                            <div class="count fw-bold px-2">0</div>
                            <button class="btn-gray-right" onclick="changeCount(this, 1)" data-name="มาม่า"
                                data-type="พิเศษ" data-price="70">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const orderData = JSON.parse(localStorage.getItem('orderData')) || {};;
        console.log(orderData)

        function changeCount(button, amount) {
            const name = button.getAttribute('data-name');
            const type = button.getAttribute('data-type');
            const price = parseFloat(button.getAttribute('data-price'));

            const countEl = button.parentElement.querySelector('.count');
            let count = parseInt(countEl.textContent) || 0;
            count += amount;
            if (count < 0) count = 0;
            countEl.textContent = count;

            // สร้างโครงสร้างถ้ายังไม่มี
            if (!orderData[name]) {
                orderData[name] = {};
            }

            // ถ้ามีอยู่แล้วให้บวกเพิ่ม
            const oldQty = orderData[name][type]?.qty || 0;

            if (count > 0) {
                orderData[name][type] = {
                    qty: oldQty + amount,
                    price: price
                };
            } else {
                // ถ้าจำนวนเหลือ 0 ให้ลบออกจาก orderData
                delete orderData[name][type];

                // ถ้าไม่มีประเภทอาหารในเมนูนี้แล้ว ลบเมนูทิ้ง
                if (Object.keys(orderData[name]).length === 0) {
                    delete orderData[name];
                }
            }

            console.log(orderData);
            goToBuyPage();
        }

        function goToBuyPage() {
            // บันทึกข้อมูล orderData ลงใน localStorage เป็น JSON string
            localStorage.setItem('orderData', JSON.stringify(orderData));

        }

        // โหลดค่าจาก localStorage แล้วแสดงบนหน้า
        function restoreCountsFromStorage() {
            for (const name in orderData) {
                for (const type in orderData[name]) {
                    const qty = orderData[name][type].qty;

                    // หา button + ที่ตรงกับเมนูนั้นและประเภทนั้น
                    const plusButton = document.querySelector(
                        `button[data-name="${name}"][data-type="${type}"][onclick*="changeCount"][class*="btn-gray-right"]`
                        );
                    if (plusButton) {
                        const countEl = plusButton.parentElement.querySelector('.count');
                        if (countEl) {
                            countEl.textContent = qty;
                        }
                    }
                }
            }
        }

        // เรียกตอนโหลดหน้า
        restoreCountsFromStorage();
    </script>
@endsection
