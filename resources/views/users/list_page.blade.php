@extends('layouts.luxury-nav')

@section('title', 'หน้ารายละเอียด')

@section('content')
    <style>
        .title-buy {
            font-size: 30px;
            font-weight: bold;
        }

        .title-list-buy {
            font-size: 25px;
            font-weight: bold;
        }

        .btn-delete {
            background: none;
            border: none;
            color: rgb(185, 185, 185);
            cursor: pointer;
            padding: 0;
            font-size: 14px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-delete:hover {
            color: darkgray;
        }

        .btn-aprove {
            background: linear-gradient(360deg, var(--primary-color), var(--sub-color));
            border-radius: 20px;
            border: 0px solid #0d9700;
            padding: 5px 0px;
            font-weight: bold;
            text-decoration: none;
            color: rgb(255, 255, 255);
            transition: background 0.3s ease;
            /* เพิ่ม transition เพื่อให้การเปลี่ยนแปลงเป็นไปอย่างนุ่มนวล */
        }

        .btn-aprove:hover {
            background: linear-gradient(360deg, var(--sub-color), var(--primary-color));
            /* เปลี่ยนทิศทาง gradient หรือสีที่ใช้ใน hover */
            cursor: pointer;
            /* เพิ่มให้มีรูป pointer ขณะ hover */
        }
    </style>

    <div class="container">
        <div class="d-flex flex-column justify-content-center gap-2">
            <div class="title-buy">
                คำสั่งซื้อ
            </div>
            <div class="bg-white px-2 pt-3 shadow-lg d-flex flex-column aling-items-center justify-content-center"
                style="border-radius: 10px;">
                <div class="title-list-buy">
                    รายการอาหารที่สั่ง
                </div>
                <div id="order-summary" class="mt-2"></div>
                <div class="fw-bold fs-5 mt-5 " style="border-top:2px solid #7e7e7e; margin-bottom:-10px;">
                    ยอดชำระ
                </div>
                <div class="fw-bold text-center" style="font-size:45px; ">
                    <span id="total-price" style="color: #0d9700"></span><span class="text-dark ms-2">บาท</span>
                </div>
            </div>
            <div class="bg-white p-2 shadow-lg mt-3" style="border-radius:20px;">
                <textarea class="form-control fw-bold text-center bg-white p-2" style="border-radius: 20px;" rows="4"
                    placeholder="หมายเหตุ(ความต้องการเพิ่มเติม)            เช่น ขอกระเพราไม่ใบกระเพรา">
</textarea>
            </div>
            <a href="#" class="btn-aprove mt-3" id="confirm-order-btn" style="display: none;">ยืนยันคำสั่งซื้อ</a>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let orderData = JSON.parse(localStorage.getItem('orderData')) || {};
            const container = document.getElementById('order-summary');
            const totalPriceEl = document.getElementById('total-price');

            function renderOrderList() {
                container.innerHTML = ''; // เคลียร์ข้อมูลเก่า
                let total = 0;

                // เช็คว่ามีรายการสินค้าใน orderData หรือไม่
                if (Object.keys(orderData).length === 0) {
                    const noItemsMessage = document.createElement('div');
                    noItemsMessage.textContent = "ท่านยังไม่ได้เลือกสินค้า";
                    container.appendChild(noItemsMessage);
                } else {
                    for (const name in orderData) {
                        for (const type in orderData[name]) {
                            const item = orderData[name][type];
                            if (item.qty > 0) {
                                const el = document.createElement('div');
                                el.classList.add('d-flex', 'justify-content-between', 'align-items-center', 'mb-1');

                                // ฝั่งซ้าย: รายการอาหาร
                                const itemText = document.createElement('div');
                                itemText.textContent = `${name} (${type}) x${item.qty}`;

                                // ฝั่งขวา: ราคารวมและปุ่มลบ
                                const rightSide = document.createElement('div');
                                rightSide.classList.add('d-flex', 'align-items-center', 'gap-2');

                                const priceText = document.createElement('div');
                                priceText.textContent = `${item.qty * item.price}`;

                                const deleteBtn = document.createElement('button');
                                deleteBtn.classList.add('btn-delete');
                                deleteBtn.textContent = 'ลบ';
                                deleteBtn.onclick = () => {
                                    item.qty -= 1;

                                    if (item.qty <= 0) {
                                        delete orderData[name][type];
                                        if (Object.keys(orderData[name]).length === 0) {
                                            delete orderData[name];
                                        }
                                    }

                                    localStorage.setItem('orderData', JSON.stringify(orderData));
                                    renderOrderList();
                                };

                                rightSide.appendChild(priceText);
                                rightSide.appendChild(deleteBtn);

                                el.appendChild(itemText);
                                el.appendChild(rightSide);
                                container.appendChild(el);

                                total += item.qty * item.price;
                            }
                        }
                    }
                }

                totalPriceEl.textContent = `${total}`;
            }

            renderOrderList(); // แสดงผลตอนโหลดหน้า
        });
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const orderData = JSON.parse(localStorage.getItem('orderData')) || {};

        // ตรวจสอบว่ามีข้อมูลใน localStorage หรือไม่
        const confirmButton = document.getElementById('confirm-order-btn');

        if (Object.keys(orderData).length > 0) {
            // ถ้ามีข้อมูลใน localStorage ให้แสดงปุ่ม
            confirmButton.style.display = 'inline-block'; 
        }

        // เมื่อคลิกปุ่มยืนยันคำสั่งซื้อ
        confirmButton.addEventListener('click', function(event) {
            event.preventDefault(); // ป้องกันการส่งข้อมูลหรือรีเฟรชหน้า

            // เคลียร์ข้อมูลจาก localStorage
            localStorage.removeItem('orderData');

            // ซ่อนปุ่มหลังจากกดแล้ว
            confirmButton.style.display = 'none';

        });
    });
</script>

@endsection
