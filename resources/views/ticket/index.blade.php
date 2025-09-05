<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecta - Book Your Experience</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8fafc;
            color: #1e293b;
            min-height: 100vh;
        }

        .main-container {
            width: 100%;
            min-height: 100vh;
            background: white;
        }

        .header {
            position: relative;
            height: 320px;
            background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 100%);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px 24px;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
            opacity: 0.3;
        }

        .title-section {
            position: relative;
            z-index: 10;
            text-align: center;
        }

        .venue-name {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 12px;
            color: white;
            letter-spacing: -1px;
        }

        .venue-info {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 24px;
            font-size: 16px;
            font-weight: 500;
            color: rgba(255,255,255,0.9);
        }

        .star {
            color: #fbbf24;
        }

        .content {
            padding: 40px;
            background: white;
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 24px;
            color: #0f172a;
            text-align: center;
        }

        .date-section {
            margin-bottom: 40px;
        }

        .date-navigation {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-bottom: 24px;
        }

        .nav-button {
            width: 50px;
            height: 50px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-button:hover {
            background: #2563eb;
            transform: scale(1.1);
        }

        .nav-button:disabled {
            background: #94a3b8;
            cursor: not-allowed;
            transform: none;
        }

        .month-year-display {
            font-size: 20px;
            font-weight: 600;
            color: #0f172a;
            min-width: 180px;
            text-align: center;
        }

        .date-picker-container {
            position: relative;
            overflow: hidden;
            padding: 0 20px;
        }

        .date-picker {
            display: flex;
            gap: 16px;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 10px 0;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .date-picker::-webkit-scrollbar {
            display: none;
        }

        .date-item {
            min-width: 90px;
            padding: 20px 16px;
            background: #f1f5f9;
            border: 2px solid transparent;
            border-radius: 16px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            flex-shrink: 0;
            position: relative;
        }

        .date-item:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        .date-item.active {
            background: #3b82f6;
            border-color: #3b82f6;
            color: white;
            transform: translateY(-2px);
        }

        .date-item.past {
            background: #f1f5f9;
            color: #94a3b8;
            cursor: not-allowed;
        }

        .date-item.past:hover {
            background: #f1f5f9;
            transform: none;
        }

        .date-day {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 6px;
            font-weight: 500;
        }

        .date-item.active .date-day {
            color: rgba(255,255,255,0.8);
        }

        .date-item.past .date-day {
            color: #cbd5e1;
        }

        .date-number {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
        }

        .date-item.active .date-number {
            color: white;
        }

        .date-item.past .date-number {
            color: #cbd5e1;
        }

        .date-month {
            font-size: 12px;
            color: #64748b;
            margin-top: 4px;
            font-weight: 500;
        }

        .date-item.active .date-month {
            color: rgba(255,255,255,0.7);
        }

        .date-item.past .date-month {
            color: #cbd5e1;
        }

        .packages-section {
            margin-bottom: 40px;
        }

        .package-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 24px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .package-card {
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 20px;
            padding: 28px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .package-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #0ea5e9);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .package-card:hover {
            border-color: #3b82f6;
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.15);
        }

        .package-card:hover::before {
            transform: scaleX(1);
        }

        .package-card.selected {
            border-color: #3b82f6;
            background: linear-gradient(135deg, #dbeafe 0%, #eff6ff 100%);
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(59, 130, 246, 0.2);
        }

        .package-card.selected::before {
            transform: scaleX(1);
        }

        .package-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 16px;
        }

        .package-badge {
            background: #3b82f6;
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .package-badge.popular {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        .package-badge.best {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .package-badge.exclusive {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        }

        .package-name {
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .package-desc {
            font-size: 16px;
            color: #64748b;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .package-features {
            margin-bottom: 24px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            font-size: 15px;
            color: #475569;
        }

        .feature-icon {
            color: #22c55e;
            font-weight: bold;
            font-size: 16px;
        }

        .package-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .package-price {
            font-size: 26px;
            font-weight: 800;
            color: #3b82f6;
        }

        .price-per {
            font-size: 14px;
            color: #64748b;
            font-weight: 500;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f1f5f9;
            border-radius: 12px;
            padding: 8px;
        }

        .qty-btn {
            width: 40px;
            height: 40px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            color: #3b82f6;
            font-size: 20px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .qty-btn:hover {
            background: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }

        .qty-display {
            font-size: 18px;
            font-weight: 600;
            color: #0f172a;
            min-width: 30px;
            text-align: center;
        }

        .summary-section {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 32px;
            margin: 40px auto;
            display: none;
            max-width: 600px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .summary-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #0f172a;
            text-align: center;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 16px;
            padding: 8px 0;
        }

        .summary-total {
            border-top: 2px solid #3b82f6;
            padding-top: 20px;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            font-size: 24px;
            font-weight: 700;
            color: #3b82f6;
        }

        .continue-button {
            display: block;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background: linear-gradient(135deg, #3b82f6 0%, #0ea5e9 100%);
            color: white;
            border: none;
            border-radius: 16px;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 25px rgba(59, 130, 246, 0.3);
        }

        .continue-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(59, 130, 246, 0.4);
        }

        .continue-button:disabled {
            background: #94a3b8;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        /* Form Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(10px);
            padding: 20px;
        }

        .modal.active {
            display: flex;
        }

        .form-container {
            background: white;
            border-radius: 24px;
            width: 100%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }

        .form-header {
            background: linear-gradient(135deg, #3b82f6 0%, #0ea5e9 100%);
            padding: 32px;
            color: white;
            border-radius: 24px 24px 0 0;
            text-align: center;
            position: relative;
        }

        .close-modal {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255,255,255,0.2);
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .close-modal:hover {
            background: rgba(255,255,255,0.3);
        }

        .form-body {
            padding: 40px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
        }

        .form-section {
            background: #f8fafc;
            border-radius: 16px;
            padding: 24px;
        }

        .form-section h4 {
            font-size: 18px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .visitor-section {
            grid-column: 1 / -1;
        }

        .visitor-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 16px;
        }

        .visitor-item {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
        }

        .visitor-header {
            font-weight: 600;
            color: #374151;
            margin-bottom: 16px;
            text-align: center;
            font-size: 16px;
        }

        .visitor-inputs {
            display: grid;
            gap: 12px;
        }

        .visitor-row {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 12px;
        }

        .payment-section {
            grid-column: 1 / -1;
        }

        .payment-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .payment-method {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            padding: 20px;
            border: 2px solid #e5e7eb;
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .payment-method:hover {
            border-color: #3b82f6;
            transform: translateY(-2px);
        }

        .payment-method.selected {
            border-color: #3b82f6;
            background: #eff6ff;
            transform: translateY(-2px);
        }

        .payment-icon {
            width: 60px;
            height: 40px;
            background: #3b82f6;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 14px;
        }

        .submit-button {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #3b82f6 0%, #0ea5e9 100%);
            color: white;
            border: none;
            border-radius: 16px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 24px;
        }

        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        /* Ticket Modal */
        .ticket-modal {
            background: white;
            border-radius: 24px;
            width: 100%;
            max-width: 500px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
            position: relative;
        }

        .ticket-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
            height: 250px;
        }

        .ticket-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
            opacity: 0.4;
        }

        .ticket-header {
            position: relative;
            z-index: 10;
            padding: 40px 32px;
            color: white;
            text-align: center;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .ticket-venue {
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 12px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        .ticket-date {
            font-size: 18px;
            opacity: 0.95;
            font-weight: 500;
        }

        .ticket-body {
            background: white;
            padding: 40px 32px;
            position: relative;
        }

        .ticket-body::before {
            content: '';
            position: absolute;
            top: -15px;
            left: 30px;
            right: 30px;
            height: 30px;
            background: white;
            border-radius: 0 0 25px 25px;
        }

        .ticket-body::after {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            right: -20px;
            height: 40px;
            background: radial-gradient(circle at 20px 20px, transparent 20px, white 20px),
                        radial-gradient(circle at calc(100% - 20px) 20px, transparent 20px, white 20px);
        }

        .barcode-section {
            text-align: center;
            margin-bottom: 30px;
        }

        .barcode {
            width: 100%;
            max-width: 350px;
            height: 90px;
            background: repeating-linear-gradient(
                90deg,
                #000 0px,
                #000 3px,
                transparent 3px,
                transparent 6px,
                #000 6px,
                #000 9px,
                transparent 9px,
                transparent 12px,
                #000 12px,
                #000 15px,
                transparent 15px,
                transparent 18px
            );
            border-radius: 10px;
            margin: 0 auto 20px;
            border: 2px solid #e5e7eb;
        }

        .ticket-code {
            font-family: 'Courier New', monospace;
            font-size: 20px;
            font-weight: bold;
            color: #374151;
            letter-spacing: 2px;
            background: #f3f4f6;
            padding: 12px 20px;
            border-radius: 10px;
            display: inline-block;
        }

        .ticket-details {
            background: #f8fafc;
            border-radius: 16px;
            padding: 24px;
            margin: 24px 0;
        }

        .detail-grid {
            display: grid;
            gap: 16px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .detail-row:last-child {
            border-bottom: none;
            font-weight: 600;
            color: #3b82f6;
            font-size: 18px;
        }

        .detail-label {
            color: #64748b;
            font-weight: 500;
            font-size: 15px;
        }

        .detail-value {
            color: #0f172a;
            font-weight: 600;
            font-size: 15px;
        }

        .download-section {
            text-align: center;
            padding-top: 24px;
        }

        .download-btn {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: white;
            border: none;
            padding: 16px 32px;
            border-radius: 14px;
            font-weight: 600;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(34, 197, 94, 0.3);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .content {
                padding: 24px 20px;
            }

            .venue-name {
                font-size: 36px;
            }

            .venue-info {
                flex-direction: column;
                gap: 12px;
            }

            .section-title {
                font-size: 24px;
            }

            .package-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .form-body {
                padding: 24px;
            }

            .payment-grid {
                grid-template-columns: 1fr;
            }

            .visitor-grid {
                grid-template-columns: 1fr;
            }

            .date-picker {
                justify-content: flex-start;
                padding: 0;
            }

            .date-item {
                min-width: 80px;
                padding: 16px 12px;
            }

            .date-navigation {
                gap: 16px;
            }

            .nav-button {
                width: 45px;
                height: 45px;
                font-size: 18px;
            }

            .month-year-display {
                font-size: 18px;
                min-width: 150px;
            }

            .ticket-modal {
                max-width: 420px;
                margin: 20px;
            }

            .ticket-venue {
                font-size: 28px;
            }

            .ticket-header {
                padding: 32px 24px;
            }

            .ticket-body {
                padding: 32px 24px;
            }
        }

        /* Animations */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .package-card {
            animation: slideUp 0.6s ease forwards;
        }

        .package-card:nth-child(2) { animation-delay: 0.1s; }
        .package-card:nth-child(3) { animation-delay: 0.2s; }
        .package-card:nth-child(4) { animation-delay: 0.3s; }
    </style>
</head>
<body>
        
        <div class="header">
            <div class="title-section">
                <h1 class="venue-name">Selecta</h1>
                <div class="venue-info">
                    <span><span class="star">⭐</span>4.8</span>
                    <span>Batu, Malang</span>
                    <span>08:00 - 17:00</span>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="date-section">
                <h2 class="section-title">Pilih Tanggal Kunjungan</h2>
                
                <div class="date-navigation">
                    <button class="nav-button" id="prevMonth" onclick="changeMonth(-1)">‹</button>
                    <div class="month-year-display" id="monthYearDisplay">Agustus 2024</div>
                    <button class="nav-button" id="nextMonth" onclick="changeMonth(1)">›</button>
                </div>
                
                <div class="date-picker-container">
                    <div class="date-picker" id="datePicker">
                        <!-- Dates will be generated dynamically -->
                    </div>
                </div>
            </div>

            <div class="packages-section">
                <h2 class="section-title">Pilih Paket Wisata</h2>
                
                <div class="package-grid">
                    <div class="package-card" onclick="selectPackage(1)" data-package-id="1">
                        <div class="package-header">
                            <div>
                                <div class="package-name">Reguler Pass</div>
                            </div>
                            <div class="package-badge">Basic</div>
                        </div>
                        <div class="package-desc">Perfect untuk kunjungan santai bersama keluarga</div>
                        <div class="package-features">
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Akses semua wahana</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Area bermain anak</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Taman bunga</span>
                            </div>
                        </div>
                        <div class="package-footer">
                            <div>
                                <div class="package-price">Rp 25.000</div>
                                <div class="price-per">per orang</div>
                            </div>
                            <div class="quantity-controls">
                                <button class="qty-btn" onclick="event.stopPropagation(); changeQty(1, -1)">-</button>
                                <span class="qty-display" id="qty-1">0</span>
                                <button class="qty-btn" onclick="event.stopPropagation(); changeQty(1, 1)">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="package-card" onclick="selectPackage(2)" data-package-id="2">
                        <div class="package-header">
                            <div>
                                <div class="package-name">Premium Package</div>
                            </div>
                            <div class="package-badge popular">Popular</div>
                        </div>
                        <div class="package-desc">Paket lengkap dengan makan siang dan fasilitas premium</div>
                        <div class="package-features">
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Semua fasilitas Reguler</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Makan siang set menu</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Welcome drink</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Foto digital gratis</span>
                            </div>
                        </div>
                        <div class="package-footer">
                            <div>
                                <div class="package-price">Rp 45.000</div>
                                <div class="price-per">per orang</div>
                            </div>
                            <div class="quantity-controls">
                                <button class="qty-btn" onclick="event.stopPropagation(); changeQty(2, -1)">-</button>
                                <span class="qty-display" id="qty-2">0</span>
                                <button class="qty-btn" onclick="event.stopPropagation(); changeQty(2, 1)">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="package-card" onclick="selectPackage(3)" data-package-id="3">
                        <div class="package-header">
                            <div>
                                <div class="package-name">Family Bundle</div>
                            </div>
                            <div class="package-badge best">Best Deal</div>
                        </div>
                        <div class="package-desc">Hemat untuk keluarga besar, sudah termasuk 4 tiket</div>
                        <div class="package-features">
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>4 tiket premium included</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Family photoshoot</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Picnic area reserved</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Souvenir package</span>
                            </div>
                        </div>
                        <div class="package-footer">
                            <div>
                                <div class="package-price">Rp 150.000</div>
                                <div class="price-per">4 orang</div>
                            </div>
                            <div class="quantity-controls">
                                <button class="qty-btn" onclick="event.stopPropagation(); changeQty(3, -1)">-</button>
                                <span class="qty-display" id="qty-3">0</span>
                                <button class="qty-btn" onclick="event.stopPropagation(); changeQty(3, 1)">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="package-card" onclick="selectPackage(4)" data-package-id="4">
                        <div class="package-header">
                            <div>
                                <div class="package-name">VIP Experience</div>
                            </div>
                            <div class="package-badge exclusive">Exclusive</div>
                        </div>
                        <div class="package-desc">Pengalaman mewah dengan akses VIP dan layanan personal</div>
                        <div class="package-features">
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Personal tour guide</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>VIP lounge access</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Premium dining</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span>Priority access</span>
                            </div>
                        </div>
                        <div class="package-footer">
                            <div>
                                <div class="package-price">Rp 85.000</div>
                                <div class="price-per">per orang</div>
                            </div>
                            <div class="quantity-controls">
                                <button class="qty-btn" onclick="event.stopPropagation(); changeQty(4, -1)">-</button>
                                <span class="qty-display" id="qty-4">0</span>
                                <button class="qty-btn" onclick="event.stopPropagation(); changeQty(4, 1)">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="summary-section" id="summarySection">
                <div class="summary-title">Ringkasan Pesanan</div>
                <div id="summaryItems"></div>
                <div class="summary-total">
                    <span>Total Pembayaran:</span>
                    <span id="totalAmount">Rp 0</span>
                </div>
            </div>

            <button class="continue-button" id="continueButton" onclick="openBookingForm()" disabled>
                Pilih Paket Dulu
            </button>
        </div>
    </div>

    <!-- Booking Form Modal -->
    <div class="modal" id="bookingModal">
        <div class="form-container">
            <div class="form-header">
                <button class="close-modal" onclick="closeBookingForm()">&times;</button>
                <h3 style="font-size: 24px; margin-bottom: 8px;">Data Pemesanan</h3>
                <p style="opacity: 0.9;">Lengkapi data untuk melanjutkan pemesanan</p>
            </div>
            
            <div class="form-body">
                <div class="form-grid">
                    <div class="form-section">
                        <h4>Data Pemesan</h4>
                        <div class="form-group">
                            <label class="form-label">Nama Lengkap*</label>
                            <input type="text" class="form-input" id="bookerName" placeholder="Masukkan nama lengkap" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email*</label>
                            <input type="email" class="form-input" id="bookerEmail" placeholder="contoh@email.com" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">No. WhatsApp*</label>
                            <input type="tel" class="form-input" id="bookerPhone" placeholder="08123456789" required>
                        </div>
                    </div>

                    <div class="form-section">
                        <h4>Ringkasan Pesanan</h4>
                        <div id="modalSummaryItems" style="margin-bottom: 20px;"></div>
                        <div style="border-top: 2px solid #3b82f6; padding-top: 16px;">
                            <div style="display: flex; justify-content: space-between; font-size: 18px; font-weight: 700; color: #3b82f6;">
                                <span>Total:</span>
                                <span id="modalTotalAmount">Rp 0</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section visitor-section" id="visitorSection">
                    <h4>Data Pengunjung</h4>
                    <div class="visitor-grid" id="visitorList">
                        <!-- Visitor forms will be generated here -->
                    </div>
                </div>

                <div class="form-section payment-section">
                    <h4>Metode Pembayaran</h4>
                    <div class="payment-grid">
                        <div class="payment-method selected" onclick="selectPayment('gopay')" data-payment="gopay">
                            <div class="payment-icon">GP</div>
                            <div style="text-align: center;">
                                <div style="font-weight: 600; color: #374151;">GoPay</div>
                                <div style="font-size: 13px; color: #6b7280;">Instant payment</div>
                            </div>
                        </div>

                        <div class="payment-method" onclick="selectPayment('ovo')" data-payment="ovo">
                            <div class="payment-icon" style="background: #4c1d95;">OVO</div>
                            <div style="text-align: center;">
                                <div style="font-weight: 600; color: #374151;">OVO</div>
                                <div style="font-size: 13px; color: #6b7280;">Quick & easy</div>
                            </div>
                        </div>

                        <div class="payment-method" onclick="selectPayment('dana')" data-payment="dana">
                            <div class="payment-icon" style="background: #1e40af;">DANA</div>
                            <div style="text-align: center;">
                                <div style="font-weight: 600; color: #374151;">DANA</div>
                                <div style="font-size: 13px; color: #6b7280;">Secure payment</div>
                            </div>
                        </div>

                        <div class="payment-method" onclick="selectPayment('transfer')" data-payment="transfer">
                            <div class="payment-icon" style="background: #059669;">BANK</div>
                            <div style="text-align: center;">
                                <div style="font-weight: 600; color: #374151;">Transfer Bank</div>
                                <div style="font-size: 13px; color: #6b7280;">BCA, Mandiri, BNI</div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="submit-button" onclick="processPayment()">
                    🎫 Bayar Sekarang
                </button>
            </div>
        </div>
    </div>

    <!-- Ticket Modal -->
    <div class="modal" id="ticketModal">
        <div class="ticket-modal">
            <div class="ticket-card">
                <div class="ticket-header">
                    <button class="close-modal" onclick="closeTicketModal()">&times;</button>
                    <div class="ticket-venue">Selecta</div>
                    <div class="ticket-date" id="ticketModalDate">19 Agustus 2024</div>
                </div>
            </div>
            
            <div class="ticket-body">
                <div class="barcode-section">
                    <div class="barcode"></div>
                    <div class="ticket-code" id="ticketCode">SEL240819001234</div>
                </div>

                <div class="ticket-details">
                    <div class="detail-grid" id="ticketDetailsContainer">
                        <!-- Details will be populated dynamically -->
                    </div>
                </div>

                <p style="font-size: 14px; color: #6b7280; margin: 20px 0; line-height: 1.6; text-align: center;">
                    📱 Tunjukkan barcode ini di pintu masuk Selecta<br>
                    💾 Screenshot atau simpan tiket untuk akses mudah
                </p>

                <div class="download-section">
                    <button class="download-btn" onclick="downloadTicket()">
                        <span>📱</span>
                        <span>Simpan ke Galeri</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let selectedPackages = {};
        let packagePrices = {
            1: 25000,
            2: 45000,
            3: 150000,
            4: 85000
        };
        let packageNames = {
            1: 'Reguler Pass',
            2: 'Premium Package', 
            3: 'Family Bundle',
            4: 'VIP Experience'
        };
        let selectedDate = null;
        let selectedPayment = 'gopay';
        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();
        
        const monthNames = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        
        const dayNames = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];

        function initializeDatePicker() {
            // Set default to current month
            currentMonth = new Date().getMonth();
            currentYear = new Date().getFullYear();
            
            // Auto-select tomorrow if today is available, otherwise select first available date
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            
            generateDatePicker();
        }

        function generateDatePicker() {
            const datePicker = document.getElementById('datePicker');
            const monthYearDisplay = document.getElementById('monthYearDisplay');
            
            // Update month/year display
            monthYearDisplay.textContent = `${monthNames[currentMonth]} ${currentYear}`;
            
            // Calculate dates to show (30 days from current month)
            const firstDay = new Date(currentYear, currentMonth, 1);
            const lastDay = new Date(currentYear, currentMonth + 1, 0);
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            let datesHTML = '';
            
            // Generate dates for current month
            for (let day = 1; day <= lastDay.getDate(); day++) {
                const currentDate = new Date(currentYear, currentMonth, day);
                const dayName = dayNames[currentDate.getDay()];
                const isPast = currentDate < today;
                const isToday = currentDate.getTime() === today.getTime();
                
                const dateString = `${day} ${monthNames[currentMonth]} ${currentYear}`;
                
                datesHTML += `
                    <div class="date-item ${isPast ? 'past' : ''}" 
                         onclick="${isPast ? '' : `selectDate('${dateString}', this)`}"
                         data-date="${dateString}">
                        <div class="date-day">${dayName}</div>
                        <div class="date-number">${day}</div>
                        <div class="date-month">${monthNames[currentMonth].slice(0, 3)}</div>
                    </div>
                `;
            }
            
            datePicker.innerHTML = datesHTML;
            
            // Auto-select tomorrow or first available date
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            
            if (tomorrow.getMonth() === currentMonth && tomorrow.getFullYear() === currentYear) {
                const tomorrowString = `${tomorrow.getDate()} ${monthNames[currentMonth]} ${currentYear}`;
                const tomorrowElement = document.querySelector(`[data-date="${tomorrowString}"]`);
                if (tomorrowElement && !tomorrowElement.classList.contains('past')) {
                    selectDate(tomorrowString, tomorrowElement);
                }
            } else {
                // Select first available date if tomorrow is not in current month
                const firstAvailable = document.querySelector('.date-item:not(.past)');
                if (firstAvailable) {
                    const dateString = firstAvailable.getAttribute('data-date');
                    selectDate(dateString, firstAvailable);
                }
            }
            
            updateNavigationButtons();
        }

        function selectDate(dateString, element) {
            // Remove active class from all dates
            document.querySelectorAll('.date-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Add active class to selected date
            element.classList.add('active');
            selectedDate = dateString;
            
            // Scroll selected date into view
            element.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
        }

        function changeMonth(direction) {
            currentMonth += direction;
            
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            } else if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            
            generateDatePicker();
        }

        function updateNavigationButtons() {
            const prevButton = document.getElementById('prevMonth');
            const today = new Date();
            
            // Disable previous button if we're at current month/year or earlier
            if (currentYear < today.getFullYear() || 
                (currentYear === today.getFullYear() && currentMonth <= today.getMonth())) {
                prevButton.disabled = true;
            } else {
                prevButton.disabled = false;
            }
            
            // Limit to 12 months in the future
            const nextButton = document.getElementById('nextMonth');
            const maxMonth = today.getMonth();
            const maxYear = today.getFullYear() + 1;
            
            if (currentYear > maxYear || 
                (currentYear === maxYear && currentMonth >= maxMonth)) {
                nextButton.disabled = true;
            } else {
                nextButton.disabled = false;
            }
        }

        function selectPackage(id) {
            // Package selection handled through quantity controls
        }

        function changeQty(packageId, change) {
            const qtyElement = document.getElementById(`qty-${packageId}`);
            let currentQty = parseInt(qtyElement.textContent);
            let newQty = Math.max(0, currentQty + change);
            
            qtyElement.textContent = newQty;
            
            if (newQty > 0) {
                selectedPackages[packageId] = {
                    quantity: newQty,
                    price: packagePrices[packageId],
                    name: packageNames[packageId]
                };
                document.querySelector(`[data-package-id="${packageId}"]`).classList.add('selected');
            } else {
                delete selectedPackages[packageId];
                document.querySelector(`[data-package-id="${packageId}"]`).classList.remove('selected');
            }
            
            updateSummary();
        }

        function updateSummary() {
            let subtotal = 0;
            let totalQty = 0;
            let summaryHTML = '';
            
            Object.entries(selectedPackages).forEach(([id, pkg]) => {
                subtotal += pkg.price * pkg.quantity;
                totalQty += pkg.quantity;
                summaryHTML += `
                    <div class="summary-item">
                        <span>${pkg.quantity}x ${pkg.name}</span>
                        <span>Rp ${(pkg.price * pkg.quantity).toLocaleString('id-ID')}</span>
                    </div>
                `;
            });
            
            const summarySection = document.getElementById('summarySection');
            const continueButton = document.getElementById('continueButton');
            
            if (totalQty > 0) {
                summarySection.style.display = 'block';
                document.getElementById('summaryItems').innerHTML = summaryHTML;
                document.getElementById('totalAmount').textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
                
                continueButton.disabled = false;
                continueButton.textContent = `🎫 Lanjut Pemesanan (${totalQty} tiket)`;
            } else {
                summarySection.style.display = 'none';
                continueButton.disabled = true;
                continueButton.textContent = 'Pilih Paket Dulu';
            }
        }

        function openBookingForm() {
            if (Object.keys(selectedPackages).length === 0) {
                alert('Pilih paket dulu ya!');
                return;
            }
            
            if (!selectedDate) {
                alert('Pilih tanggal kunjungan dulu ya!');
                return;
            }

            generateVisitorForm();
            updateModalSummary();
            
            const modal = document.getElementById('bookingModal');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeBookingForm() {
            const modal = document.getElementById('bookingModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function generateVisitorForm() {
            let totalVisitors = 0;
            Object.values(selectedPackages).forEach(pkg => {
                if (pkg.name === 'Family Bundle') {
                    totalVisitors += pkg.quantity * 4; // 4 people per bundle
                } else {
                    totalVisitors += pkg.quantity;
                }
            });

            let visitorHTML = '';
            for (let i = 1; i <= totalVisitors; i++) {
                visitorHTML += `
                    <div class="visitor-item">
                        <div class="visitor-header">Pengunjung ${i}</div>
                        <div class="visitor-inputs">
                            <input type="text" class="form-input" placeholder="Nama lengkap" id="visitor_${i}_name" required>
                            <div class="visitor-row">
                                <input type="number" class="form-input" placeholder="Umur" id="visitor_${i}_age" required>
                                <select class="form-input" id="visitor_${i}_gender" required>
                                    <option value="">Jenis Kelamin</option>
                                    <option value="male">Laki-laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                `;
            }

            document.getElementById('visitorList').innerHTML = visitorHTML;
        }

        function updateModalSummary() {
            let subtotal = 0;
            let summaryHTML = '';
            
            Object.entries(selectedPackages).forEach(([id, pkg]) => {
                subtotal += pkg.price * pkg.quantity;
                summaryHTML += `
                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px; padding: 8px 0; border-bottom: 1px solid #e5e7eb;">
                        <span style="font-size: 14px;">${pkg.quantity}x ${pkg.name}</span>
                        <span style="font-weight: 600;">Rp ${(pkg.price * pkg.quantity).toLocaleString('id-ID')}</span>
                    </div>
                `;
            });
            
            document.getElementById('modalSummaryItems').innerHTML = summaryHTML;
            document.getElementById('modalTotalAmount').textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
        }

        function selectPayment(method) {
            selectedPayment = method;
            document.querySelectorAll('.payment-method').forEach(pm => pm.classList.remove('selected'));
            document.querySelector(`[data-payment="${method}"]`).classList.add('selected');
        }

        function processPayment() {
            // Validate form
            const bookerName = document.getElementById('bookerName').value;
            const bookerEmail = document.getElementById('bookerEmail').value;
            const bookerPhone = document.getElementById('bookerPhone').value;

            if (!bookerName || !bookerEmail || !bookerPhone) {
                alert('Lengkapi data pemesan terlebih dahulu!');
                return;
            }

            // Validate visitors
            let totalVisitors = 0;
            Object.values(selectedPackages).forEach(pkg => {
                if (pkg.name === 'Family Bundle') {
                    totalVisitors += pkg.quantity * 4;
                } else {
                    totalVisitors += pkg.quantity;
                }
            });

            for (let i = 1; i <= totalVisitors; i++) {
                const name = document.getElementById(`visitor_${i}_name`).value;
                const age = document.getElementById(`visitor_${i}_age`).value;
                const gender = document.getElementById(`visitor_${i}_gender`).value;

                if (!name || !age || !gender) {
                    alert(`Lengkapi data pengunjung ${i}!`);
                    return;
                }
            }

            // Simulate payment process
            const submitButton = document.querySelector('.submit-button');
            const originalText = submitButton.textContent;
            
            submitButton.textContent = '⏳ Memproses Pembayaran...';
            submitButton.disabled = true;
            
            setTimeout(() => {
                // Generate ticket
                const ticketCode = generateTicketCode();
                
                // Close booking modal
                closeBookingForm();
                
                // Show ticket modal
                showTicketModal(ticketCode);
                
                // Reset form
                resetForm();
                
                submitButton.textContent = originalText;
                submitButton.disabled = false;
            }, 3000);
        }

        function generateTicketCode() {
            const today = new Date();
            const dateStr = today.getFullYear().toString().slice(-2) + 
                          (today.getMonth() + 1).toString().padStart(2, '0') + 
                          today.getDate().toString().padStart(2, '0');
            const randomNum = Math.floor(Math.random() * 999999).toString().padStart(6, '0');
            return `SEL${dateStr}${randomNum}`;
        }

        function showTicketModal(ticketCode) {
            document.getElementById('ticketCode').textContent = ticketCode;
            document.getElementById('ticketModalDate').textContent = selectedDate;
            
            // Generate ticket details
            let detailsHTML = `
                <div class="detail-row">
                    <span class="detail-label">Kode Tiket:</span>
                    <span class="detail-value">${ticketCode}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Tanggal:</span>
                    <span class="detail-value">${selectedDate}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Waktu:</span>
                    <span class="detail-value">08:00 - 17:00 WIB</span>
                </div>
            `;
            
            Object.entries(selectedPackages).forEach(([id, pkg]) => {
                detailsHTML += `
                    <div class="detail-row">
                        <span class="detail-label">${pkg.name}:</span>
                        <span class="detail-value">${pkg.quantity}x</span>
                    </div>
                `;
            });
            
            let totalAmount = 0;
            Object.values(selectedPackages).forEach(pkg => {
                totalAmount += pkg.price * pkg.quantity;
            });
            
            detailsHTML += `
                <div class="detail-row">
                    <span class="detail-label">Total Bayar:</span>
                    <span class="detail-value">Rp ${totalAmount.toLocaleString('id-ID')}</span>
                </div>
            `;
            
            document.getElementById('ticketDetailsContainer').innerHTML = detailsHTML;
            
            const modal = document.getElementById('ticketModal');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeTicketModal() {
            const modal = document.getElementById('ticketModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function downloadTicket() {
            // Simulate download/save functionality
            alert('🎉 Tiket berhasil disimpan! Check galeri kamu atau folder Downloads.');
            closeTicketModal();
        }

        function resetForm() {
            selectedPackages = {};
            document.querySelectorAll('.qty-display').forEach(el => el.textContent = '0');
            document.querySelectorAll('.package-card').forEach(el => el.classList.remove('selected'));
            document.getElementById('summarySection').style.display = 'none';
            document.getElementById('continueButton').disabled = true;
            document.getElementById('continueButton').textContent = 'Pilih Paket Dulu';
            
            document.getElementById('bookerName').value = '';
            document.getElementById('bookerEmail').value = '';
            document.getElementById('bookerPhone').value = '';
        }

        document.getElementById('bookingModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeBookingForm();
            }
        });

        document.getElementById('ticketModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeTicketModal();
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            initializeDatePicker();
            
            const cards = document.querySelectorAll('.package-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 150);
            });
        });

        console.log('🎫 Selecta Full Screen Booking System with Enhanced Date Picker loaded!');
    </script>
</body>
</html>