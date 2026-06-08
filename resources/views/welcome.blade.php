<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SIPAMAS - Sistem Pelaporan Masalah Masyarakat Terintegrasi. Laporkan keluhan infrastruktur, kebersihan, dan keamanan di daerah Anda.">
    <title>SIPAMAS - Sistem Pelaporan Masyarakat</title>
    
    <!-- Google Fonts: Outfit & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #2F4156;
            --primary-rgb: 47, 65, 86;
            --bg-main: #F5EFEB;
            --bg-white: #FFFFFF;
            --text-black: #000000;
            --text-dark: #1E293B;
            --text-muted: #64748B;
            --text-light: #94A3B8;
            --border-color: #E2E8F0;
            
            /* Badges colors */
            --status-waiting-bg: #F1F5F9;
            --status-waiting-text: #475569;
            --status-processing-bg: #E0F2FE;
            --status-processing-text: #0369A1;
            --status-success-bg: #DCFCE7;
            --status-success-text: #15803D;
            --status-danger-bg: #FEE2E2;
            --status-danger-text: #B91C1C;

            --radius-sm: 8px;
            --radius-md: 14px;
            --radius-lg: 24px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --shadow-sm: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 10px 15px -3px rgba(47, 65, 86, 0.08), 0 4px 6px -4px rgba(47, 65, 86, 0.08);
            --shadow-lg: 0 20px 25px -5px rgba(47, 65, 86, 0.12), 0 8px 10px -6px rgba(47, 65, 86, 0.12);
        }

        /* Base Resets */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-main);
            color: var(--text-dark);
            line-height: 1.6;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
            color: var(--text-black);
            font-weight: 700;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition);
        }

        button {
            cursor: pointer;
            border: none;
            outline: none;
            background: none;
            font-family: inherit;
            transition: var(--transition);
        }

        /* Container */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Button Styling */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 24px;
            font-size: 14px;
            font-weight: 600;
            border-radius: var(--radius-sm);
            transition: var(--transition);
        }

        .btn-primary {
            background-color: var(--primary);
            color: var(--bg-white);
        }

        .btn-primary:hover {
            opacity: 0.95;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(47, 65, 86, 0.25);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background-color: rgba(47, 65, 86, 0.05);
            transform: translateY(-2px);
        }

        .btn-light {
            background-color: var(--bg-white);
            color: var(--text-dark);
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
        }

        .btn-light:hover {
            background-color: var(--bg-main);
            transform: translateY(-2px);
        }

        .btn-danger {
            background-color: var(--status-danger-bg);
            color: var(--status-danger-text);
        }

        .btn-danger:hover {
            background-color: #FCA5A5;
            transform: translateY(-2px);
        }

        /* Navbar */
        .navbar-wrapper {
            position: fixed;
            top: 20px;
            left: 0;
            right: 0;
            z-index: 1000;
            pointer-events: none;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: var(--radius-md);
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            box-shadow: var(--shadow-md);
            pointer-events: auto;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 22px;
            font-weight: 800;
            color: var(--text-black);
            font-family: 'Outfit', sans-serif;
            letter-spacing: -0.5px;
        }

        .logo i {
            color: var(--primary);
            font-size: 24px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 32px;
        }

        .nav-link {
            font-weight: 500;
            font-size: 14px;
            color: var(--text-muted);
            position: relative;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary);
            transition: var(--transition);
        }

        .nav-link:hover::after, .nav-link.active::after {
            width: 100%;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-user {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-left: 16px;
            border-left: 1px solid var(--border-color);
        }

        .nav-user-info {
            text-align: right;
        }

        .nav-username {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-black);
            display: block;
        }

        .nav-role {
            font-size: 11px;
            color: var(--text-muted);
            display: block;
        }

        .nav-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background-color: var(--primary);
            color: var(--bg-white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
            border: 2px solid rgba(255,255,255,0.8);
            box-shadow: var(--shadow-sm);
        }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: none;
            font-size: 20px;
            color: var(--text-dark);
        }

        /* Core Layout Switcher Panels */
        .main-content {
            margin-top: 110px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .panel-section {
            display: none;
            opacity: 0;
            transform: translateY(15px);
            transition: opacity 0.4s ease, transform 0.4s ease;
        }

        .panel-section.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        /* Hero Landing */
        .hero-section {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 48px;
            align-items: center;
            padding: 40px 0 60px 0;
        }

        .hero-content {
            display: flex;
            flex-direction: flex-start;
            flex-direction: column;
            gap: 24px;
        }

        .hero-badge {
            background-color: rgba(47, 65, 86, 0.08);
            color: var(--primary);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            width: fit-content;
        }

        .hero-title {
            font-size: 48px;
            line-height: 1.15;
            letter-spacing: -1px;
        }

        .hero-title span {
            color: var(--primary);
        }

        .hero-desc {
            font-size: 16px;
            color: var(--text-muted);
            max-width: 540px;
        }

        .hero-btns {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-top: 8px;
        }

        /* Hero Image Panel (Modern Minimalist Mockup) */
        .hero-visual {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-card-main {
            background: var(--bg-white);
            border-radius: var(--radius-lg);
            padding: 32px;
            width: 100%;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(255,255,255,0.7);
            position: relative;
            z-index: 2;
        }

        .hero-card-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .hero-card-dots {
            display: flex;
            gap: 6px;
        }

        .hero-card-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #E2E8F0;
        }

        .hero-card-dot:nth-child(1) { background-color: #F87171; }
        .hero-card-dot:nth-child(2) { background-color: #FBBF24; }
        .hero-card-dot:nth-child(3) { background-color: #34D399; }

        .hero-card-bar {
            height: 8px;
            background-color: #F1F5F9;
            border-radius: 4px;
            width: 120px;
        }

        .hero-list-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 14px 0;
            border-bottom: 1px solid #F1F5F9;
        }

        .hero-list-item:last-child {
            border: none;
        }

        .hero-list-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .hero-list-info {
            flex: 1;
        }

        .hero-list-title {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-black);
            margin-bottom: 3px;
        }

        .hero-list-subtitle {
            font-size: 11px;
            color: var(--text-light);
        }

        .hero-list-badge {
            font-size: 11px;
            font-weight: 500;
            padding: 3px 8px;
            border-radius: 12px;
        }

        /* Floating glass elements behind main mockup */
        .hero-float-card {
            position: absolute;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: var(--radius-md);
            padding: 16px;
            box-shadow: var(--shadow-md);
            z-index: 3;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .hero-float-card-1 {
            bottom: -20px;
            left: -30px;
        }

        .hero-float-card-2 {
            top: -20px;
            right: -20px;
        }

        .hero-circle-bg {
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(47, 65, 86, 0.15) 0%, rgba(245, 239, 235, 0) 70%);
            z-index: 1;
            top: -50px;
            right: -50px;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-bottom: 60px;
        }

        .stats-card {
            background-color: var(--bg-white);
            border-radius: var(--radius-md);
            padding: 32px 24px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: var(--transition);
        }

        .stats-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-md);
            border-color: rgba(47, 65, 86, 0.2);
        }

        .stats-icon {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background-color: var(--bg-main);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .stats-num {
            font-size: 32px;
            font-family: 'Outfit', sans-serif;
            color: var(--text-black);
            line-height: 1.1;
            margin-bottom: 4px;
        }

        .stats-label {
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* Feed Section */
        .feed-section {
            padding-bottom: 80px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 32px;
        }

        .section-title-group h2 {
            font-size: 28px;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .section-title-group p {
            color: var(--text-muted);
            font-size: 14px;
        }

        .feed-controls {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .search-box {
            position: relative;
            min-width: 260px;
        }

        .search-box input {
            width: 100%;
            padding: 10px 16px 10px 40px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            font-size: 14px;
            outline: none;
            transition: var(--transition);
        }

        .search-box input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(47, 65, 86, 0.1);
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            font-size: 14px;
        }

        .filter-select {
            padding: 10px 16px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            background-color: var(--bg-white);
            font-size: 14px;
            color: var(--text-dark);
            outline: none;
            cursor: pointer;
            transition: var(--transition);
        }

        .filter-select:focus {
            border-color: var(--primary);
        }

        /* Reports Grid */
        .reports-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 28px;
        }

        .report-card {
            background-color: var(--bg-white);
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            height: 100%;
            cursor: pointer;
            transition: var(--transition);
        }

        .report-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-lg);
            border-color: rgba(47, 65, 86, 0.15);
        }

        .report-img-container {
            height: 200px;
            width: 100%;
            background-color: #E2E8F0;
            position: relative;
            overflow: hidden;
        }

        .report-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .report-card:hover .report-img {
            transform: scale(1.05);
        }

        .report-placeholder-img {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary) 0%, #475B72 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.2);
            font-size: 48px;
        }

        .report-badge-category {
            position: absolute;
            top: 16px;
            left: 16px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(4px);
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            color: var(--primary);
            box-shadow: var(--shadow-sm);
        }

        .report-card-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            flex: 1;
        }

        .report-card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            color: var(--text-light);
        }

        .report-card-author {
            font-weight: 500;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .report-card-author i {
            font-size: 11px;
        }

        .report-card-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-black);
            line-height: 1.3;
        }

        .report-card-desc {
            font-size: 13px;
            color: var(--text-muted);
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex: 1;
        }

        .report-card-location {
            font-size: 12px;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 6px;
            background-color: var(--bg-main);
            padding: 6px 12px;
            border-radius: 6px;
            width: fit-content;
            margin-top: 8px;
        }

        .report-card-location i {
            color: var(--primary);
        }

        .report-card-footer {
            padding: 16px 24px;
            border-top: 1px solid #F1F5F9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .report-status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            display: inline-block;
        }

        /* Status Colors mapping class */
        .status-waiting {
            background-color: var(--status-waiting-bg);
            color: var(--status-waiting-text);
        }
        .status-waiting .status-dot { background-color: var(--status-waiting-text); }

        .status-processing {
            background-color: var(--status-processing-bg);
            color: var(--status-processing-text);
        }
        .status-processing .status-dot { background-color: var(--status-processing-text); }

        .status-success {
            background-color: var(--status-success-bg);
            color: var(--status-success-text);
        }
        .status-success .status-dot { background-color: var(--status-success-text); }

        .status-danger {
            background-color: var(--status-danger-bg);
            color: var(--status-danger-text);
        }
        .status-danger .status-dot { background-color: var(--status-danger-text); }

        .report-card-date {
            font-size: 11px;
            color: var(--text-light);
        }

        /* Empty State */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 24px;
            background-color: var(--bg-white);
            border-radius: var(--radius-md);
            border: 1px dashed var(--border-color);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 16px;
        }

        .empty-state i {
            font-size: 48px;
            color: var(--text-light);
        }

        .empty-state h3 {
            font-size: 20px;
            font-weight: 600;
        }

        .empty-state p {
            color: var(--text-muted);
            max-width: 350px;
            margin: 0 auto;
        }

        /* Dashboard Panel */
        .dashboard-container {
            display: grid;
            grid-template-columns: 260px 1fr;
            gap: 32px;
            padding: 24px 0 80px 0;
            align-items: start;
        }

        .dashboard-sidebar {
            background-color: var(--bg-white);
            border-radius: var(--radius-md);
            padding: 24px 16px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .db-menu-header {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-light);
            padding: 8px 12px 4px 12px;
            font-weight: 700;
        }

        .db-menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            font-size: 14px;
            font-weight: 600;
            border-radius: var(--radius-sm);
            color: var(--text-muted);
            transition: var(--transition);
            width: 100%;
            text-align: left;
        }

        .db-menu-item:hover {
            color: var(--primary);
            background-color: var(--bg-main);
        }

        .db-menu-item.active {
            color: var(--bg-white);
            background-color: var(--primary);
        }

        .dashboard-panel-view {
            display: none;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .dashboard-panel-view.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        /* Modern Forms (Auth, Create Report, Profile) */
        .form-card {
            background-color: var(--bg-white);
            border-radius: var(--radius-md);
            padding: 32px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
            max-width: 700px;
        }

        .form-card h2 {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .form-card-subtitle {
            color: var(--text-muted);
            font-size: 14px;
            margin-bottom: 24px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group-full {
            grid-column: 1 / -1;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-black);
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-color);
            font-size: 14px;
            color: var(--text-dark);
            outline: none;
            background-color: #F8FAFC;
            transition: var(--transition);
        }

        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            border-color: var(--primary);
            background-color: var(--bg-white);
            box-shadow: 0 0 0 3px rgba(47, 65, 86, 0.12);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        /* File Uploader Drag & Drop */
        .file-upload-zone {
            border: 2px dashed var(--border-color);
            border-radius: var(--radius-sm);
            padding: 32px 20px;
            text-align: center;
            background-color: #F8FAFC;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            position: relative;
        }

        .file-upload-zone:hover, .file-upload-zone.dragover {
            border-color: var(--primary);
            background-color: rgba(47, 65, 86, 0.02);
        }

        .file-upload-zone i {
            font-size: 32px;
            color: var(--text-muted);
        }

        .file-upload-zone p {
            font-size: 13px;
            color: var(--text-muted);
        }

        .file-upload-zone p span {
            color: var(--primary);
            font-weight: 600;
        }

        .file-upload-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .upload-preview-container {
            display: none;
            width: 100%;
            margin-top: 12px;
            position: relative;
        }

        .upload-preview-wrapper {
            position: relative;
            width: 100px;
            height: 100px;
            border-radius: var(--radius-sm);
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .upload-preview {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .remove-preview-btn {
            position: absolute;
            top: -6px;
            right: -6px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: var(--status-danger-text);
            color: var(--bg-white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            box-shadow: var(--shadow-sm);
            cursor: pointer;
            z-index: 10;
        }

        /* Error/Validation styling */
        .invalid-feedback {
            font-size: 11px;
            color: var(--status-danger-text);
            margin-top: 4px;
            display: none;
        }

        .is-invalid {
            border-color: var(--status-danger-text) !important;
        }

        /* Modals Structure */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(6px);
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }

        .modal-container {
            background-color: var(--bg-white);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-lg);
            width: 100%;
            max-width: 500px;
            overflow: hidden;
            transform: scale(0.95);
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
        }

        .modal-overlay.active .modal-container {
            transform: scale(1);
        }

        .modal-header {
            padding: 20px 24px;
            border-bottom: 1px solid #F1F5F9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            font-size: 20px;
        }

        .modal-close {
            font-size: 18px;
            color: var(--text-light);
            cursor: pointer;
            transition: var(--transition);
        }

        .modal-close:hover {
            color: var(--text-black);
        }

        .modal-body {
            padding: 24px;
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid #F1F5F9;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        /* Large Detail Modal specifically for Reports */
        .detail-modal-container {
            max-width: 800px;
            width: 90%;
        }

        .detail-report-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 28px;
        }

        .detail-report-img-wrapper {
            border-radius: var(--radius-md);
            overflow: hidden;
            background-color: #E2E8F0;
            aspect-ratio: 4/3;
            width: 100%;
        }

        .detail-report-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .detail-report-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary) 0%, #475B72 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.2);
            font-size: 64px;
        }

        .detail-info-group {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .detail-info-row {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding-bottom: 12px;
            border-bottom: 1px solid #F1F5F9;
        }

        .detail-info-row:last-child {
            border: none;
        }

        .detail-label {
            font-size: 11px;
            text-transform: uppercase;
            font-weight: 700;
            color: var(--text-light);
            letter-spacing: 0.5px;
        }

        .detail-val {
            font-size: 14px;
            color: var(--text-dark);
            font-weight: 500;
        }

        .detail-val-description {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.6;
        }

        .detail-status-pill {
            align-self: flex-start;
            margin-top: 4px;
        }

        /* Toast Container */
        .toast-container {
            position: fixed;
            top: 24px;
            right: 24px;
            z-index: 3000;
            display: flex;
            flex-direction: column;
            gap: 12px;
            pointer-events: none;
        }

        .toast-notification {
            background-color: var(--bg-white);
            border-left: 4px solid var(--primary);
            border-radius: var(--radius-sm);
            padding: 16px 20px;
            box-shadow: var(--shadow-lg);
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 320px;
            max-width: 450px;
            transform: translateX(120%);
            transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
            pointer-events: auto;
        }

        .toast-notification.active {
            transform: translateX(0);
        }

        .toast-icon {
            font-size: 18px;
        }

        .toast-text {
            font-size: 13px;
            font-weight: 500;
            color: var(--text-dark);
            flex: 1;
        }

        .toast-close {
            font-size: 14px;
            color: var(--text-light);
            cursor: pointer;
        }

        .toast-success { border-left-color: var(--status-success-text); }
        .toast-success .toast-icon { color: var(--status-success-text); }

        .toast-error { border-left-color: var(--status-danger-text); }
        .toast-error .toast-icon { color: var(--status-danger-text); }

        .toast-warning { border-left-color: var(--status-warning-text); }
        .toast-warning .toast-icon { color: var(--status-warning-text); }

        /* Spinner Loader */
        .spinner-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(245, 239, 235, 0.75);
            backdrop-filter: blur(2px);
            z-index: 4000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .spinner-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }

        .spinner {
            width: 48px;
            height: 48px;
            border: 4px solid var(--border-color);
            border-top: 4px solid var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Footer */
        footer {
            background-color: var(--text-black);
            color: rgba(255, 255, 255, 0.6);
            padding: 40px 0;
            font-size: 14px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-brand h3 {
            color: var(--bg-white);
            margin-bottom: 12px;
            font-size: 20px;
        }

        .footer-brand p {
            max-width: 350px;
            font-size: 13px;
        }

        .footer-title {
            color: var(--bg-white);
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .footer-links a {
            font-size: 13px;
        }

        .footer-links a:hover {
            color: var(--bg-white);
        }

        .footer-bottom {
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            font-size: 12px;
        }

        /* Skeleton loader */
        .skeleton-card {
            background: var(--bg-white);
            border-radius: var(--radius-md);
            height: 380px;
            border: 1px solid var(--border-color);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .skeleton-img {
            height: 200px;
            background: linear-gradient(90deg, #E2E8F0 25%, #EDF2F7 50%, #E2E8F0 75%);
            background-size: 200% 100%;
            animation: pulse-bg 1.5s infinite;
        }

        .skeleton-body {
            padding: 24px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .skeleton-line {
            height: 14px;
            background: linear-gradient(90deg, #E2E8F0 25%, #EDF2F7 50%, #E2E8F0 75%);
            background-size: 200% 100%;
            animation: pulse-bg 1.5s infinite;
            border-radius: 4px;
        }

        .skeleton-line.short { width: 40%; }
        .skeleton-line.mid { width: 70%; }
        .skeleton-line.long { width: 95%; }

        @keyframes pulse-bg {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* Responsive styling */
        @media (max-width: 992px) {
            .hero-section {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }
            .hero-content {
                align-items: center;
            }
            .hero-title {
                font-size: 38px;
            }
            .hero-desc {
                margin: 0 auto;
            }
            .hero-btns {
                justify-content: center;
            }
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .dashboard-container {
                grid-template-columns: 1fr;
            }
            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none; /* simple mobile drawer toggle or fallback */
            }
            .mobile-menu-btn {
                display: block;
            }
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }
            .feed-controls {
                width: 100%;
            }
            .search-box {
                flex: 1;
                min-width: 100%;
            }
            .filter-select {
                flex: 1;
            }
            .form-grid {
                grid-template-columns: 1fr;
            }
            .detail-report-grid {
                grid-template-columns: 1fr;
            }
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }
        }
    </style>
</head>
<body>

    <!-- Toast Notifications Area -->
    <div class="toast-container" id="toastContainer"></div>

    <!-- Spinner Loader -->
    <div class="spinner-overlay" id="spinnerOverlay">
        <div class="spinner"></div>
    </div>

    <!-- Navigation Header -->
    <div class="navbar-wrapper">
        <div class="container">
            <nav class="navbar">
                <a href="#" class="logo" onclick="handleNavigation('landing'); return false;">
                    <i class="fa-solid fa-bullhorn"></i>
                    <span>SIPAMAS</span>
                </a>
                
                <div class="nav-links">
                    <a href="#" class="nav-link active" id="navLinkHome" onclick="handleNavigation('landing'); return false;">Beranda</a>
                    <a href="#" class="nav-link" id="navLinkDashboard" onclick="handleNavigation('dashboard'); return false;" style="display: none;">Dashboard</a>
                </div>
                
                <div class="nav-actions">
                    <!-- Guest View -->
                    <div id="navGuestActions" style="display: flex; gap: 10px;">
                        <button class="btn btn-secondary" style="padding: 10px 20px;" onclick="openModal('loginModal')">Masuk</button>
                        <button class="btn btn-primary" style="padding: 10px 20px;" onclick="openModal('registerModal')">Daftar</button>
                    </div>
                    
                    <!-- User View -->
                    <div id="navUserActions" class="nav-user" style="display: none;">
                        <div class="nav-user-info">
                            <span class="nav-username" id="navUserName">User</span>
                            <span class="nav-role">Masyarakat</span>
                        </div>
                        <div class="nav-avatar" id="navUserAvatar">U</div>
                        <button class="btn btn-light" style="padding: 8px 12px; margin-left: 12px;" onclick="handleLogout()" title="Keluar">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <main class="main-content">
        
        <!-- ================= LANDING SECTION ================= -->
        <section id="panel-landing" class="panel-section active">
            <!-- Hero Block -->
            <div class="container">
                <div class="hero-section">
                    <div class="hero-content">
                        <div class="hero-badge">
                            <i class="fa-solid fa-circle-info"></i> Sistem Pelaporan Masyarakat Terintegrasi
                        </div>
                        <h1 class="hero-title">Aduan Anda, <span>Perubahan</span> Bagi Daerah.</h1>
                        <p class="hero-desc">
                            SIPAMAS hadir memudahkan warga untuk melaporkan masalah lingkungan, infrastruktur rusak, kebersihan, atau gangguan keamanan langsung kepada aparat desa atau kota dengan transparan.
                        </p>
                        <div class="hero-btns">
                            <button class="btn btn-primary btn-lg" onclick="handleStartReporting()">Buat Laporan Sekarang</button>
                            <a href="#all-reports-section" class="btn btn-secondary btn-lg">Lihat Aduan Publik</a>
                        </div>
                    </div>
                    <div class="hero-visual">
                        <div class="hero-circle-bg"></div>
                        <div class="hero-card-main">
                            <div class="hero-card-head">
                                <div class="hero-card-dots">
                                    <div class="hero-card-dot"></div>
                                    <div class="hero-card-dot"></div>
                                    <div class="hero-card-dot"></div>
                                </div>
                                <div class="hero-card-bar"></div>
                            </div>
                            <div style="font-family:'Outfit', sans-serif; font-weight: 700; font-size: 16px; margin-bottom: 16px; color: var(--primary);">Laporan Terbaru</div>
                            <div class="hero-list">
                                <div class="hero-list-item">
                                    <div class="hero-list-icon" style="background-color: #FEF3C7; color: #D97706;"><i class="fa-solid fa-road"></i></div>
                                    <div class="hero-list-info">
                                        <div class="hero-list-title">Jalan berlubang RT 05</div>
                                        <div class="hero-list-subtitle">Kec. Karawaci, Tangerang</div>
                                    </div>
                                    <span class="hero-list-badge status-processing">Diproses</span>
                                </div>
                                <div class="hero-list-item">
                                    <div class="hero-list-icon" style="background-color: #D1FAE5; color: #059669;"><i class="fa-solid fa-trash"></i></div>
                                    <div class="hero-list-info">
                                        <div class="hero-list-title">Tumpukan sampah pasar</div>
                                        <div class="hero-list-subtitle">Kec. Ciledug, Tangerang</div>
                                    </div>
                                    <span class="hero-list-badge status-success">Selesai</span>
                                </div>
                                <div class="hero-list-item">
                                    <div class="hero-list-icon" style="background-color: #FEE2E2; color: #DC2626;"><i class="fa-solid fa-shield-halved"></i></div>
                                    <div class="hero-list-info">
                                        <div class="hero-list-title">Lampu jalan padam total</div>
                                        <div class="hero-list-subtitle">Kec. Cipondoh, Tangerang</div>
                                    </div>
                                    <span class="hero-list-badge status-waiting">Menunggu</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Floating graphic widgets -->
                        <div class="hero-float-card hero-float-card-1">
                            <div class="stats-icon" style="width: 36px; height: 36px; font-size: 14px;"><i class="fa-solid fa-check-double"></i></div>
                            <div>
                                <div style="font-size: 11px; color: var(--text-light); font-weight: 600;">Penyelesaian</div>
                                <div style="font-size: 13px; font-weight: 700; color: var(--text-black);">92% Sukses</div>
                            </div>
                        </div>

                        <div class="hero-float-card hero-float-card-2">
                            <div class="stats-icon" style="width: 36px; height: 36px; font-size: 14px; background-color: var(--status-success-bg); color: var(--status-success-text);"><i class="fa-solid fa-bolt"></i></div>
                            <div>
                                <div style="font-size: 11px; color: var(--text-light); font-weight: 600;">Respon Cepat</div>
                                <div style="font-size: 13px; font-weight: 700; color: var(--text-black);">&lt; 24 Jam</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Block -->
            <div class="container">
                <div class="stats-grid">
                    <div class="stats-card">
                        <div class="stats-icon"><i class="fa-solid fa-file-invoice"></i></div>
                        <div>
                            <div class="stats-num" id="stat-total">0</div>
                            <div class="stats-label">Total Pengaduan</div>
                        </div>
                    </div>
                    <div class="stats-card">
                        <div class="stats-icon" style="background-color: var(--status-processing-bg); color: var(--status-processing-text);"><i class="fa-solid fa-spinner"></i></div>
                        <div>
                            <div class="stats-num" id="stat-processed">0</div>
                            <div class="stats-label">Sedang Diproses</div>
                        </div>
                    </div>
                    <div class="stats-card">
                        <div class="stats-icon" style="background-color: var(--status-success-bg); color: var(--status-success-text);"><i class="fa-solid fa-circle-check"></i></div>
                        <div>
                            <div class="stats-num" id="stat-resolved">0</div>
                            <div class="stats-label">Selesai Ditangani</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Complaints Feed Block -->
            <div class="container" id="all-reports-section" style="scroll-margin-top: 110px;">
                <div class="section-header">
                    <div class="section-title-group">
                        <h2>Pengaduan Publik Terkini</h2>
                        <p>Daftar aduan resmi dari warga yang terbuka secara transparan untuk dipantau bersama.</p>
                    </div>
                    
                    <div class="feed-controls">
                        <!-- Search Bar -->
                        <div class="search-box">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" id="feedSearch" placeholder="Cari laporan..." oninput="filterFeed()">
                        </div>
                        
                        <!-- Category Filter -->
                        <select class="filter-select" id="feedCategoryFilter" onchange="filterFeed()">
                            <option value="">Semua Kategori</option>
                            <!-- Dynamically loaded categories -->
                        </select>
                    </div>
                </div>

                <!-- Complaints Grid -->
                <div class="reports-grid" id="publicReportsGrid">
                    <!-- Loading Skeletons -->
                    <div class="skeleton-card">
                        <div class="skeleton-img"></div>
                        <div class="skeleton-body">
                            <div class="skeleton-line short"></div>
                            <div class="skeleton-line long"></div>
                            <div class="skeleton-line mid"></div>
                            <div class="skeleton-line short" style="margin-top: auto;"></div>
                        </div>
                    </div>
                    <div class="skeleton-card">
                        <div class="skeleton-img"></div>
                        <div class="skeleton-body">
                            <div class="skeleton-line short"></div>
                            <div class="skeleton-line long"></div>
                            <div class="skeleton-line mid"></div>
                            <div class="skeleton-line short" style="margin-top: auto;"></div>
                        </div>
                    </div>
                    <div class="skeleton-card">
                        <div class="skeleton-img"></div>
                        <div class="skeleton-body">
                            <div class="skeleton-line short"></div>
                            <div class="skeleton-line long"></div>
                            <div class="skeleton-line mid"></div>
                            <div class="skeleton-line short" style="margin-top: auto;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= DASHBOARD SECTION ================= -->
        <section id="panel-dashboard" class="panel-section">
            <div class="container">
                <div class="dashboard-container">
                    
                    <!-- Dashboard Sidebar -->
                    <aside class="dashboard-sidebar">
                        <div class="db-menu-header">Menu Warga</div>
                        <button class="db-menu-item active" id="btnTabCreate" onclick="switchDashboardTab('buat-laporan')">
                            <i class="fa-solid fa-pen-to-square"></i> Buat Laporan Baru
                        </button>
                        <button class="db-menu-item" id="btnTabMyReports" onclick="switchDashboardTab('laporan-saya')">
                            <i class="fa-solid fa-list-check"></i> Laporan Saya
                        </button>
                        <button class="db-menu-item" id="btnTabProfile" onclick="switchDashboardTab('profil-saya')">
                            <i class="fa-solid fa-user-gear"></i> Profil Saya
                        </button>
                    </aside>

                    <!-- Dashboard Main Panels -->
                    <div class="dashboard-main-content">
                        
                        <!-- TAB: Buat Laporan -->
                        <div id="tab-buat-laporan" class="dashboard-panel-view active">
                            <div class="form-card">
                                <h2>Formulir Laporan Pengaduan</h2>
                                <p class="form-card-subtitle">Laporkan segala masalah fasilitas publik atau lingkungan dengan lengkap agar cepat terverifikasi.</p>
                                
                                <form id="createReportForm" onsubmit="handleCreateReport(event)">
                                    <div class="form-grid">
                                        <!-- Title -->
                                        <div class="form-group form-group-full">
                                            <label for="reportTitle">Judul Laporan</label>
                                            <input type="text" id="reportTitle" required placeholder="Contoh: Jalan Berlubang Parah di Depan Sekolah">
                                            <div class="invalid-feedback" id="err-reportTitle"></div>
                                        </div>

                                        <!-- Category -->
                                        <div class="form-group">
                                            <label for="reportCategory">Kategori Masalah</label>
                                            <select id="reportCategory" required>
                                                <option value="" disabled selected>Pilih Kategori</option>
                                                <!-- Populated dynamically -->
                                            </select>
                                            <div class="invalid-feedback" id="err-reportCategory"></div>
                                        </div>

                                        <!-- Region -->
                                        <div class="form-group">
                                            <label for="reportRegion">Kecamatan/Wilayah</label>
                                            <input type="text" id="reportRegion" required placeholder="Contoh: Kec. Karawaci, Tangerang">
                                            <div class="invalid-feedback" id="err-reportRegion"></div>
                                        </div>

                                        <!-- Location Details -->
                                        <div class="form-group form-group-full">
                                            <label for="reportLocation">Detail Lokasi (Jalan / Nomor / Landmark)</label>
                                            <input type="text" id="reportLocation" required placeholder="Contoh: Jl. Merdeka No. 12, seberang Indomaret">
                                            <div class="invalid-feedback" id="err-reportLocation"></div>
                                        </div>

                                        <!-- Description -->
                                        <div class="form-group form-group-full">
                                            <label for="reportDescription">Deskripsi Detail Kronologi Kejadian</label>
                                            <textarea id="reportDescription" required placeholder="Jelaskan kondisi secara detail, kronologi kejadian, dan dampak yang dirasakan warga sekitar..."></textarea>
                                            <div class="invalid-feedback" id="err-reportDescription"></div>
                                        </div>

                                        <!-- Photo Upload Area -->
                                        <div class="form-group form-group-full">
                                            <label>Foto Bukti Pendukung (Maksimal 2MB)</label>
                                            <div class="file-upload-zone" id="fileUploadZone">
                                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                                <p>Tarik dan lepas file di sini, atau <span>pilih file</span></p>
                                                <p style="font-size: 11px; margin-top: -6px;">Hanya mendukung file JPG, JPEG, PNG</p>
                                                <input type="file" id="reportPhoto" class="file-upload-input" accept="image/jpeg, image/jpg, image/png" onchange="handleFilePreview(this)">
                                            </div>
                                            <div class="invalid-feedback" id="err-reportPhoto"></div>
                                            
                                            <!-- File Preview Display -->
                                            <div class="upload-preview-container" id="uploadPreviewContainer">
                                                <div class="upload-preview-wrapper">
                                                    <img src="" alt="Preview" id="uploadPreview" class="upload-preview">
                                                    <div class="remove-preview-btn" onclick="removeUploadedFile()"><i class="fa-solid fa-xmark"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="margin-top: 24px; display: flex; justify-content: flex-end;">
                                        <button type="submit" class="btn btn-primary" id="btnSubmitReport">
                                            <i class="fa-solid fa-paper-plane"></i> Kirim Laporan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- TAB: Laporan Saya -->
                        <div id="tab-laporan-saya" class="dashboard-panel-view">
                            <div class="section-title-group" style="margin-bottom: 24px;">
                                <h2>Riwayat Laporan Saya</h2>
                                <p>Pantau status, respon, atau kelola laporan pengaduan yang telah Anda kirimkan.</p>
                            </div>

                            <div class="reports-grid" id="myReportsGrid">
                                <!-- Populated dynamically -->
                            </div>
                        </div>

                        <!-- TAB: Profil Saya -->
                        <div id="tab-profil-saya" class="dashboard-panel-view">
                            <div class="form-card">
                                <h2>Informasi Profil Akun</h2>
                                <p class="form-card-subtitle">Kelola informasi data diri Anda secara berkala agar memudahkan proses verifikasi aduan.</p>
                                
                                <form id="updateProfileForm" onsubmit="handleUpdateProfile(event)">
                                    <div class="form-grid">
                                        <!-- Name -->
                                        <div class="form-group form-group-full">
                                            <label for="profileName">Nama Lengkap</label>
                                            <input type="text" id="profileName" required placeholder="Nama lengkap Anda">
                                            <div class="invalid-feedback" id="err-profileName"></div>
                                        </div>

                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="profileEmail">Alamat Email</label>
                                            <input type="email" id="profileEmail" required placeholder="email@contoh.com">
                                            <div class="invalid-feedback" id="err-profileEmail"></div>
                                        </div>

                                        <!-- Phone -->
                                        <div class="form-group">
                                            <label for="profilePhone">Nomor Telepon / WA</label>
                                            <input type="text" id="profilePhone" required placeholder="Contoh: 081234567890">
                                            <div class="invalid-feedback" id="err-profilePhone"></div>
                                        </div>
                                    </div>

                                    <div style="margin-top: 24px; display: flex; justify-content: flex-end;">
                                        <button type="submit" class="btn btn-primary" id="btnSubmitProfile">
                                            <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- ================= AUTH MODALS ================= -->
    
    <!-- Modal Login -->
    <div class="modal-overlay" id="loginModal">
        <div class="modal-container">
            <div class="modal-header">
                <h3>Masuk Akun SIPAMAS</h3>
                <span class="modal-close" onclick="closeModal('loginModal')">&times;</span>
            </div>
            <div class="modal-body">
                <form id="loginForm" onsubmit="handleLoginSubmit(event)">
                    <div class="form-group">
                        <label for="loginEmail">Alamat Email</label>
                        <input type="email" id="loginEmail" required placeholder="budi@example.com">
                        <div class="invalid-feedback" id="err-loginEmail">Email atau password salah</div>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Kata Sandi</label>
                        <input type="password" id="loginPassword" required placeholder="Minimal 6 karakter">
                        <div class="invalid-feedback" id="err-loginPassword">Email atau password salah</div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 12px;" id="btnLoginSubmit">Masuk Sekarang</button>
                </form>
                <div style="text-align: center; margin-top: 20px; font-size: 13px; color: var(--text-muted);">
                    Belum punya akun? <a href="#" style="color: var(--primary); font-weight:600;" onclick="switchAuthModal('loginModal', 'registerModal'); return false;">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Register -->
    <div class="modal-overlay" id="registerModal">
        <div class="modal-container" style="max-width: 550px;">
            <div class="modal-header">
                <h3>Registrasi Akun Baru</h3>
                <span class="modal-close" onclick="closeModal('registerModal')">&times;</span>
            </div>
            <div class="modal-body">
                <form id="registerForm" onsubmit="handleRegisterSubmit(event)">
                    <div class="form-group">
                        <label for="registerName">Nama Lengkap</label>
                        <input type="text" id="registerName" required placeholder="Contoh: Budi Santoso">
                        <div class="invalid-feedback" id="err-registerName"></div>
                    </div>
                    
                    <div class="form-grid" style="gap: 0 16px;">
                        <div class="form-group">
                            <label for="registerEmail">Email</label>
                            <input type="email" id="registerEmail" required placeholder="budi@example.com">
                            <div class="invalid-feedback" id="err-registerEmail"></div>
                        </div>
                        <div class="form-group">
                            <label for="registerPhone">Nomor Telepon</label>
                            <input type="text" id="registerPhone" required placeholder="Contoh: 081234567890">
                            <div class="invalid-feedback" id="err-registerPhone"></div>
                        </div>
                    </div>

                    <div class="form-grid" style="gap: 0 16px;">
                        <div class="form-group">
                            <label for="registerPassword">Kata Sandi</label>
                            <input type="password" id="registerPassword" required placeholder="Min. 6 karakter">
                            <div class="invalid-feedback" id="err-registerPassword"></div>
                        </div>
                        <div class="form-group">
                            <label for="registerConfirmPassword">Konfirmasi Kata Sandi</label>
                            <input type="password" id="registerConfirmPassword" required placeholder="Ulangi kata sandi">
                            <div class="invalid-feedback" id="err-registerConfirmPassword"></div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 16px;" id="btnRegisterSubmit">Daftar Akun</button>
                </form>
                <div style="text-align: center; margin-top: 20px; font-size: 13px; color: var(--text-muted);">
                    Sudah terdaftar? <a href="#" style="color: var(--primary); font-weight:600;" onclick="switchAuthModal('registerModal', 'loginModal'); return false;">Masuk Akun</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail Laporan -->
    <div class="modal-overlay" id="detailReportModal">
        <div class="modal-container detail-modal-container">
            <div class="modal-header">
                <h3 id="detailModalTitle">Detail Laporan Pengaduan</h3>
                <span class="modal-close" onclick="closeModal('detailReportModal')">&times;</span>
            </div>
            <div class="modal-body">
                <div class="detail-report-grid">
                    
                    <!-- Left Column: Photo evidence -->
                    <div>
                        <div class="detail-report-img-wrapper" id="detailModalImgWrapper">
                            <!-- Image will load dynamically -->
                        </div>
                    </div>
                    
                    <!-- Right Column: Meta details -->
                    <div class="detail-info-group">
                        <div class="detail-info-row">
                            <span class="detail-label">Status Penanganan</span>
                            <span class="report-status-badge detail-status-pill" id="detailModalStatus">
                                <span class="status-dot"></span>
                                <span class="status-txt">Menunggu</span>
                            </span>
                        </div>
                        
                        <div class="detail-info-row">
                            <span class="detail-label">Kategori</span>
                            <span class="detail-val" id="detailModalCategory">-</span>
                        </div>

                        <div class="detail-info-row">
                            <span class="detail-label">Dilaporkan Oleh</span>
                            <span class="detail-val" id="detailModalReporter">-</span>
                        </div>

                        <div class="detail-info-row">
                            <span class="detail-label">Lokasi Kejadian</span>
                            <span class="detail-val" id="detailModalLocation">-</span>
                        </div>

                        <div class="detail-info-row">
                            <span class="detail-label">Tanggal Pelaporan</span>
                            <span class="detail-val" id="detailModalDate">-</span>
                        </div>
                    </div>

                    <!-- Description Area (Full width bottom grid) -->
                    <div style="grid-column: 1 / -1; margin-top: 12px; border-top: 1px solid #F1F5F9; padding-top: 16px;">
                        <span class="detail-label" style="display: block; margin-bottom: 8px;">Deskripsi Kronologi Kejadian</span>
                        <div class="detail-val-description" id="detailModalDescription">-</div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" onclick="closeModal('detailReportModal')">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3>SIPAMAS</h3>
                    <p>Sistem Pelaporan Masalah Masyarakat Terintegrasi untuk pelayanan publik yang cepat, akurat, terbuka, dan bertanggung jawab.</p>
                </div>
                <div>
                    <h4 class="footer-title">Kategori Laporan</h4>
                    <ul class="footer-links">
                        <li><a href="#all-reports-section" onclick="filterByCategoryName('Infrastruktur')">Infrastruktur</a></li>
                        <li><a href="#all-reports-section" onclick="filterByCategoryName('Kebersihan')">Kebersihan</a></li>
                        <li><a href="#all-reports-section" onclick="filterByCategoryName('Keamanan')">Keamanan</a></li>
                        <li><a href="#all-reports-section" onclick="filterByCategoryName('Fasilitas Umum')">Fasilitas Umum</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="footer-title">Hubungi Kami</h4>
                    <ul class="footer-links">
                        <li><i class="fa-solid fa-envelope" style="margin-right: 8px;"></i> support@sipamas.go.id</li>
                        <li><i class="fa-solid fa-phone" style="margin-right: 8px;"></i> (021) 1234-5678</li>
                        <li><i class="fa-solid fa-location-dot" style="margin-right: 8px;"></i> Kota Tangerang, Banten</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 SIPAMAS. UAS Pemrograman API. Hak Cipta Dilindungi Undang-Undang.</p>
            </div>
        </div>
    </footer>

    <!-- Reactive Single Page App Logic -->
    <script>
        // --- Application State ---
        const state = {
            token: localStorage.getItem('sipamas_token') || null,
            user: JSON.parse(localStorage.getItem('sipamas_user')) || null,
            categories: [],
            reports: [],
            myReports: [],
            currentPanel: 'landing', // 'landing' | 'dashboard'
            currentTab: 'buat-laporan', // 'buat-laporan' | 'laporan-saya' | 'profil-saya'
            selectedFile: null
        };

        // --- Init Application ---
        document.addEventListener('DOMContentLoaded', async () => {
            setupDragAndDrop();
            updateAuthUI();
            
            // Initial data fetching
            await loadCategories();
            await loadPublicFeed();
        });

        // --- Custom Toast Alert Library ---
        function showToast(message, type = 'success') {
            const container = document.getElementById('toastContainer');
            
            const toast = document.createElement('div');
            toast.className = `toast-notification toast-${type}`;
            
            let iconClass = 'fa-circle-check';
            if (type === 'error') iconClass = 'fa-circle-exclamation';
            if (type === 'warning') iconClass = 'fa-triangle-exclamation';
            
            toast.innerHTML = `
                <i class="fa-solid ${iconClass} toast-icon"></i>
                <div class="toast-text">${message}</div>
                <i class="fa-solid fa-xmark toast-close" onclick="this.parentElement.remove()"></i>
            `;
            
            container.appendChild(toast);
            
            // Trigger animation
            setTimeout(() => toast.classList.add('active'), 10);
            
            // Auto destroy
            setTimeout(() => {
                toast.classList.remove('active');
                setTimeout(() => toast.remove(), 400);
            }, 4000);
        }

        // --- Spinner Overlay Toggler ---
        function toggleSpinner(show = true) {
            const spinner = document.getElementById('spinnerOverlay');
            if (show) {
                spinner.classList.add('active');
            } else {
                spinner.classList.remove('active');
            }
        }

        // --- API wrapper helper ---
        async function apiFetch(endpoint, options = {}) {
            const headers = {
                'Accept': 'application/json',
                ...options.headers
            };
            
            if (state.token) {
                headers['Authorization'] = `Bearer ${state.token}`;
            }
            
            // If body is plain object, stringify it
            if (options.body && !(options.body instanceof FormData)) {
                headers['Content-Type'] = 'application/json';
                options.body = JSON.stringify(options.body);
            }
            
            try {
                const response = await fetch(`${window.location.origin}${endpoint}`, {
                    ...options,
                    headers
                });
                
                const data = await response.json();
                
                if (response.status === 401) {
                    handleLogout();
                    showToast('Sesi login telah kedaluwarsa. Silakan masuk kembali.', 'error');
                    return { error: true, status: 401, data: null };
                }
                
                if (!response.ok) {
                    return { error: true, status: response.status, data };
                }
                
                return { error: false, status: response.status, data };
                
            } catch (error) {
                console.error('API Error:', error);
                showToast('Koneksi internet bermasalah atau server mati.', 'error');
                return { error: true, status: 500, data: null };
            }
        }

        // --- Auth UI Management ---
        function updateAuthUI() {
            const guestActions = document.getElementById('navGuestActions');
            const userActions = document.getElementById('navUserActions');
            const navLinkDashboard = document.getElementById('navLinkDashboard');
            
            if (state.token && state.user) {
                guestActions.style.display = 'none';
                userActions.style.display = 'flex';
                navLinkDashboard.style.display = 'inline-block';
                
                // Set Profile Name & Avatar
                document.getElementById('navUserName').innerText = state.user.name;
                document.getElementById('navUserAvatar').innerText = state.user.name.charAt(0).toUpperCase();
                
                // Pre-fill profile page form
                document.getElementById('profileName').value = state.user.name;
                document.getElementById('profileEmail').value = state.user.email;
                document.getElementById('profilePhone').value = state.user.phone;
            } else {
                guestActions.style.display = 'flex';
                userActions.style.display = 'none';
                navLinkDashboard.style.display = 'none';
            }
        }

        // --- Navigation ---
        function handleNavigation(panel) {
            state.currentPanel = panel;
            
            const navLinkHome = document.getElementById('navLinkHome');
            const navLinkDashboard = document.getElementById('navLinkDashboard');
            
            // Toggle active link
            if (panel === 'landing') {
                navLinkHome.classList.add('active');
                navLinkDashboard.classList.remove('active');
            } else {
                navLinkHome.classList.remove('active');
                navLinkDashboard.classList.add('active');
            }
            
            // Switch sections
            document.querySelectorAll('.panel-section').forEach(sec => sec.classList.remove('active'));
            document.getElementById(`panel-${panel}`).classList.add('active');
            
            if (panel === 'dashboard') {
                // Default dashboard tab load
                switchDashboardTab(state.currentTab);
            }
            
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function handleStartReporting() {
            if (!state.token) {
                openModal('loginModal');
                showToast('Silakan masuk akun terlebih dahulu untuk membuat laporan.', 'warning');
            } else {
                state.currentTab = 'buat-laporan';
                handleNavigation('dashboard');
            }
        }

        // --- Dashboard Tabs Toggle ---
        async function switchDashboardTab(tabName) {
            state.currentTab = tabName;
            
            // Update active menu class
            document.querySelectorAll('.db-menu-item').forEach(btn => btn.classList.remove('active'));
            if (tabName === 'buat-laporan') document.getElementById('btnTabCreate').classList.add('active');
            if (tabName === 'laporan-saya') document.getElementById('btnTabMyReports').classList.add('active');
            if (tabName === 'profil-saya') document.getElementById('btnTabProfile').classList.add('active');
            
            // Switch tabs views
            document.querySelectorAll('.dashboard-panel-view').forEach(panel => panel.classList.remove('active'));
            document.getElementById(`tab-${tabName}`).classList.add('active');
            
            // Fetch tab-specific data
            if (tabName === 'laporan-saya') {
                await loadMyReports();
            }
        }

        // --- Modals Handlers ---
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('active');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
            // Reset validation errors
            clearFormErrors(modalId);
        }

        function switchAuthModal(closeId, openId) {
            closeModal(closeId);
            setTimeout(() => openModal(openId), 300);
        }

        function clearFormErrors(modalId) {
            const modalEl = document.getElementById(modalId);
            if (!modalEl) return;
            modalEl.querySelectorAll('.is-invalid').forEach(inp => inp.classList.remove('is-invalid'));
            modalEl.querySelectorAll('.invalid-feedback').forEach(div => {
                div.style.display = 'none';
                div.innerText = '';
            });
        }

        // --- Submit: Register Flow ---
        async function handleRegisterSubmit(e) {
            e.preventDefault();
            clearFormErrors('registerModal');
            
            const name = document.getElementById('registerName').value;
            const email = document.getElementById('registerEmail').value;
            const phone = document.getElementById('registerPhone').value;
            const password = document.getElementById('registerPassword').value;
            const password_confirmation = document.getElementById('registerConfirmPassword').value;
            
            if (password !== password_confirmation) {
                showValidationError('registerConfirmPassword', 'Konfirmasi kata sandi tidak cocok.');
                return;
            }
            
            toggleSpinner(true);
            const btn = document.getElementById('btnRegisterSubmit');
            btn.disabled = true;
            
            const response = await apiFetch('/api/register', {
                method: 'POST',
                body: { name, email, phone, password, password_confirmation }
            });
            
            toggleSpinner(false);
            btn.disabled = false;
            
            if (response.error) {
                if (response.status === 422 && response.data.errors) {
                    // Display specific validations
                    const errs = response.data.errors;
                    if (errs.name) showValidationError('registerName', errs.name[0]);
                    if (errs.email) showValidationError('registerEmail', errs.email[0]);
                    if (errs.phone) showValidationError('registerPhone', errs.phone[0]);
                    if (errs.password) showValidationError('registerPassword', errs.password[0]);
                } else {
                    showToast(response.data.message || 'Registrasi gagal.', 'error');
                }
                return;
            }
            
            showToast('Registrasi berhasil! Silakan masuk.', 'success');
            closeModal('registerModal');
            
            // Auto fill login form and open it
            document.getElementById('loginEmail').value = email;
            document.getElementById('loginPassword').value = '';
            openModal('loginModal');
        }

        // --- Submit: Login Flow ---
        async function handleLoginSubmit(e) {
            e.preventDefault();
            clearFormErrors('loginModal');
            
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;
            
            toggleSpinner(true);
            const btn = document.getElementById('btnLoginSubmit');
            btn.disabled = true;
            
            const response = await apiFetch('/api/login', {
                method: 'POST',
                body: { email, password }
            });
            
            toggleSpinner(false);
            btn.disabled = false;
            
            if (response.error) {
                if (response.status === 401) {
                    showValidationError('loginEmail', 'Email atau kata sandi salah.');
                    showValidationError('loginPassword', 'Email atau kata sandi salah.');
                } else if (response.status === 422 && response.data.errors) {
                    const errs = response.data.errors;
                    if (errs.email) showValidationError('loginEmail', errs.email[0]);
                    if (errs.password) showValidationError('loginPassword', errs.password[0]);
                } else {
                    showToast(response.data.message || 'Gagal login.', 'error');
                }
                return;
            }
            
            // Save Token & Profile
            state.token = response.data.token;
            localStorage.setItem('sipamas_token', state.token);
            
            // Fetch profile data next
            await fetchUserProfile();
            
            showToast('Login berhasil! Selamat datang di SIPAMAS.', 'success');
            closeModal('loginModal');
            updateAuthUI();
            
            // Redirect to dashboard
            handleNavigation('dashboard');
        }

        // --- Fetch User Profile ---
        async function fetchUserProfile() {
            const response = await apiFetch('/api/profile', { method: 'GET' });
            if (!response.error) {
                state.user = response.data.data;
                localStorage.setItem('sipamas_user', JSON.stringify(state.user));
            }
        }

        // --- Action: Logout ---
        async function handleLogout() {
            toggleSpinner(true);
            if (state.token) {
                await apiFetch('/api/logout', { method: 'POST' });
            }
            
            // Clear storage
            state.token = null;
            state.user = null;
            localStorage.removeItem('sipamas_token');
            localStorage.removeItem('sipamas_user');
            
            updateAuthUI();
            toggleSpinner(false);
            showToast('Anda telah berhasil keluar dari sistem.', 'success');
            handleNavigation('landing');
        }

        // --- Submit: Update Profile ---
        async function handleUpdateProfile(e) {
            e.preventDefault();
            clearFormErrors('tab-profil-saya');
            
            const name = document.getElementById('profileName').value;
            const email = document.getElementById('profileEmail').value;
            const phone = document.getElementById('profilePhone').value;
            
            toggleSpinner(true);
            const btn = document.getElementById('btnSubmitProfile');
            btn.disabled = true;
            
            const response = await apiFetch('/api/profile', {
                method: 'PUT',
                body: { name, email, phone }
            });
            
            toggleSpinner(false);
            btn.disabled = false;
            
            if (response.error) {
                if (response.status === 422 && response.data.errors) {
                    const errs = response.data.errors;
                    if (errs.name) showValidationError('profileName', errs.name[0]);
                    if (errs.email) showValidationError('profileEmail', errs.email[0]);
                    if (errs.phone) showValidationError('profilePhone', errs.phone[0]);
                } else {
                    showToast(response.data.message || 'Gagal mengubah profil.', 'error');
                }
                return;
            }
            
            // Update local state user
            state.user = response.data.data;
            localStorage.setItem('sipamas_user', JSON.stringify(state.user));
            
            showToast('Profil Anda berhasil diperbarui!', 'success');
            updateAuthUI();
        }

        // --- Helper: Show Form Validation Error UI ---
        function showValidationError(inputId, message) {
            const input = document.getElementById(inputId);
            if (!input) return;
            input.classList.add('is-invalid');
            
            const feedback = document.getElementById(`err-${inputId}`);
            if (feedback) {
                feedback.innerText = message;
                feedback.style.display = 'block';
            }
        }

        // --- Data Loader: Categories ---
        async function loadCategories() {
            // Check if authenticated first to populate form, or public category is allowed?
            // Actually Categories route /api/categories is protected by auth:api
            // If token exists, load categories for filter and form select
            if (!state.token) {
                // Populate default offline categories for public filters
                populateCategories([{id: 1, category_name: 'Infrastruktur'}, {id: 2, category_name: 'Kebersihan'}, {id: 3, category_name: 'Keamanan'}, {id: 4, category_name: 'Fasilitas Umum'}]);
                return;
            }
            
            const response = await apiFetch('/api/categories', { method: 'GET' });
            if (!response.error) {
                state.categories = response.data.data;
                populateCategories(state.categories);
            }
        }

        function populateCategories(cats) {
            const feedFilter = document.getElementById('feedCategoryFilter');
            const formSelect = document.getElementById('reportCategory');
            
            // Clear except first option
            feedFilter.innerHTML = '<option value="">Semua Kategori</option>';
            formSelect.innerHTML = '<option value="" disabled selected>Pilih Kategori</option>';
            
            cats.forEach(cat => {
                const opt1 = document.createElement('option');
                opt1.value = cat.id;
                opt1.innerText = cat.category_name;
                feedFilter.appendChild(opt1);
                
                const opt2 = document.createElement('option');
                opt2.value = cat.id;
                opt2.innerText = cat.category_name;
                formSelect.appendChild(opt2);
            });
        }

        // --- Data Loader: Public Complaints Feed ---
        async function loadPublicFeed() {
            const grid = document.getElementById('publicReportsGrid');
            
            // If user has token, fetch real reports, else we can show an empty state or request login.
            // Wait, is GET /api/reports public? Let's check api.php:
            // "Protected (auth:api middleware): POST/GET /api/reports"
            // Wait, the API routes show Route::middleware('auth:api')->group(function () { Route::get('/reports', ... ) });
            // This means /api/reports requires a JWT token!
            // If they are not logged in, we cannot fetch reports from the server.
            // Let's handle guest view gracefully. If they are guests, we show a nice call-to-login or empty state, or mock reports!
            // To make it beautiful, if not logged in, let's show an offline mock preview. Once logged in, load the real database reports!
            
            if (!state.token) {
                showMockPublicFeed();
                updateStats(3, 1, 1);
                return;
            }
            
            const response = await apiFetch('/api/reports', { method: 'GET' });
            
            if (response.error) {
                grid.innerHTML = `
                    <div class="empty-state">
                        <i class="fa-solid fa-face-frown"></i>
                        <h3>Gagal mengambil data</h3>
                        <p>Terjadi kesalahan saat memuat data laporan dari server.</p>
                    </div>
                `;
                return;
            }
            
            state.reports = response.data.data;
            renderReportsGrid('publicReportsGrid', state.reports);
            
            // Calculate stats dynamically
            const total = state.reports.length;
            const processing = state.reports.filter(r => r.status.status_name === 'Diproses').length;
            const resolved = state.reports.filter(r => r.status.status_name === 'Selesai').length;
            updateStats(total, processing, resolved);
        }

        function showMockPublicFeed() {
            const mockReports = [
                {
                    id: 'm1',
                    title: 'Jalan Rusak Parah dan Berlubang di Dekat Stasiun',
                    region: 'Kec. Karawaci',
                    location: 'Jl. Ahmad Yani (depan Stasiun Baru)',
                    description: 'Jalan raya yang merupakan akses utama menuju stasiun mengalami kerusakan berlubang besar yang sangat dalam. Jika hujan tergenang air dan sering memicu kecelakaan pemotor.',
                    evidence_photo: null,
                    user: { name: 'Ahmad Faisal' },
                    category: { category_name: 'Infrastruktur' },
                    status: { status_name: 'Diproses' },
                    created_at: '2026-06-05T10:14:00.000000Z'
                },
                {
                    id: 'm2',
                    title: 'Penumpukan Sampah Liar Baunya Menyengat Warga sekitar',
                    region: 'Kec. Ciledug',
                    location: 'Sudut Perempatan Jalan Flamboyan',
                    description: 'Sudah lebih dari seminggu sampah menumpuk di area pembuangan liar ini dan belum ada truk sampah mengangkutnya. Bau menyengat sangat mengganggu kenyamanan warga yang beraktivitas.',
                    evidence_photo: null,
                    user: { name: 'Siti Rahma' },
                    category: { category_name: 'Kebersihan' },
                    status: { status_name: 'Selesai' },
                    created_at: '2026-06-04T08:30:00.000000Z'
                },
                {
                    id: 'm3',
                    title: 'Lampu Penerangan Jalan Umum Mati Total Sepanjang 200 Meter',
                    region: 'Kec. Cipondoh',
                    location: 'Jl. Kenanga Mas Blok C',
                    description: 'Lampu jalan mati total sejak beberapa malam lalu membuat lingkungan sekitar gelap gulita saat malam hari. Sangat rawan tindakan kejahatan pembegalan atau pencurian di malam hari.',
                    evidence_photo: null,
                    user: { name: 'Doni Kusuma' },
                    category: { category_name: 'Keamanan' },
                    status: { status_name: 'Menunggu Verifikasi' },
                    created_at: '2026-06-07T18:22:00.000000Z'
                }
            ];
            
            renderReportsGrid('publicReportsGrid', mockReports, true);
        }

        // --- Data Loader: User's Own Reports ---
        async function loadMyReports() {
            const grid = document.getElementById('myReportsGrid');
            grid.innerHTML = '<div style="grid-column: 1/-1; text-align:center; padding: 40px;"><div class="spinner" style="margin: 0 auto;"></div></div>';
            
            const response = await apiFetch('/api/my-reports', { method: 'GET' });
            
            if (response.error) {
                grid.innerHTML = `
                    <div class="empty-state">
                        <i class="fa-solid fa-face-frown"></i>
                        <h3>Gagal mengambil data</h3>
                        <p>Terjadi kesalahan saat memuat data laporan Anda.</p>
                    </div>
                `;
                return;
            }
            
            state.myReports = response.data.data;
            renderReportsGrid('myReportsGrid', state.myReports, false, true);
        }

        // --- Stats Renderer ---
        function updateStats(total, processing, resolved) {
            document.getElementById('stat-total').innerText = total;
            document.getElementById('stat-processed').innerText = processing;
            document.getElementById('stat-resolved').innerText = resolved;
        }

        // --- Grid Rendering Logic ---
        function renderReportsGrid(gridId, reportsList, isOffline = false, isUserReport = false) {
            const grid = document.getElementById(gridId);
            grid.innerHTML = '';
            
            if (reportsList.length === 0) {
                grid.innerHTML = `
                    <div class="empty-state">
                        <i class="fa-solid fa-folder-open"></i>
                        <h3>Belum Ada Laporan</h3>
                        <p>Tidak ada laporan pengaduan yang ditemukan dalam sistem.</p>
                    </div>
                `;
                return;
            }
            
            reportsList.forEach(report => {
                const card = document.createElement('div');
                card.className = 'report-card';
                card.onclick = () => openReportDetail(report);
                
                // Status mapping
                let statusClass = 'status-waiting';
                const statusName = report.status.status_name;
                if (statusName === 'Diproses') statusClass = 'status-processing';
                if (statusName === 'Selesai') statusClass = 'status-success';
                if (statusName === 'Ditolak') statusClass = 'status-danger';
                
                // Image parsing
                let imageHtml = `<div class="report-placeholder-img"><i class="fa-solid fa-image"></i></div>`;
                if (report.evidence_photo) {
                    imageHtml = `<img src="${report.evidence_photo}" class="report-img" alt="Foto Laporan" onerror="this.outerHTML='<div class=report-placeholder-img><i class=\'fa-solid fa-image\'></i></div>'">`;
                }
                
                // Author name format
                const authorName = report.user ? report.user.name : 'Masyarakat';
                
                // Formatted Date
                const dateStr = formatDate(report.created_at);
                
                let deleteButtonHtml = '';
                if (isUserReport && statusName === 'Menunggu Verifikasi') {
                    // Only show delete button for user's own reports in "Menunggu Verifikasi" state
                    deleteButtonHtml = `
                        <button class="btn btn-danger" style="padding: 6px 12px; font-size: 11px;" onclick="handleDeleteReport(event, ${report.id})">
                            <i class="fa-solid fa-trash"></i> Hapus
                        </button>
                    `;
                }
                
                card.innerHTML = `
                    <div class="report-img-container">
                        ${imageHtml}
                        <span class="report-badge-category">${report.category.category_name}</span>
                    </div>
                    <div class="report-card-body">
                        <div class="report-card-meta">
                            <span class="report-card-author"><i class="fa-solid fa-circle-user"></i> ${authorName}</span>
                            <span class="report-card-date">${dateStr}</span>
                        </div>
                        <h3 class="report-card-title">${escapeHtml(report.title)}</h3>
                        <p class="report-card-desc">${escapeHtml(report.description)}</p>
                        <div class="report-card-location"><i class="fa-solid fa-location-dot"></i> ${escapeHtml(report.region)}</div>
                    </div>
                    <div class="report-card-footer">
                        <span class="report-status-badge ${statusClass}">
                            <span class="status-dot"></span>
                            ${statusName}
                        </span>
                        ${deleteButtonHtml}
                    </div>
                `;
                
                grid.appendChild(card);
            });
        }

        // --- Filter feed ---
        function filterFeed() {
            const query = document.getElementById('feedSearch').value.toLowerCase();
            const catVal = document.getElementById('feedCategoryFilter').value;
            
            const activeList = state.token ? state.reports : getMockReportsList();
            
            const filtered = activeList.filter(rep => {
                const matchesSearch = rep.title.toLowerCase().includes(query) || 
                                      rep.description.toLowerCase().includes(query) || 
                                      rep.region.toLowerCase().includes(query);
                                      
                const matchesCategory = catVal === '' || rep.category.id == catVal || (rep.category.category_name && getCategoryIdOffline(rep.category.category_name) == catVal);
                
                return matchesSearch && matchesCategory;
            });
            
            renderReportsGrid('publicReportsGrid', filtered, !state.token);
        }

        function filterByCategoryName(catName) {
            const select = document.getElementById('feedCategoryFilter');
            for (let i = 0; i < select.options.length; i++) {
                if (select.options[i].text === catName) {
                    select.selectedIndex = i;
                    break;
                }
            }
            filterFeed();
        }

        function getCategoryIdOffline(name) {
            if (name === 'Infrastruktur') return 1;
            if (name === 'Kebersihan') return 2;
            if (name === 'Keamanan') return 3;
            if (name === 'Fasilitas Umum') return 4;
            return 0;
        }

        function getMockReportsList() {
            return [
                {
                    id: 'm1',
                    title: 'Jalan Rusak Parah dan Berlubang di Dekat Stasiun',
                    region: 'Kec. Karawaci',
                    location: 'Jl. Ahmad Yani (depan Stasiun Baru)',
                    description: 'Jalan raya yang merupakan akses utama menuju stasiun mengalami kerusakan berlubang besar yang sangat dalam. Jika hujan tergenang air dan sering memicu kecelakaan pemotor.',
                    evidence_photo: null,
                    user: { name: 'Ahmad Faisal' },
                    category: { category_name: 'Infrastruktur' },
                    status: { status_name: 'Diproses' },
                    created_at: '2026-06-05T10:14:00.000000Z'
                },
                {
                    id: 'm2',
                    title: 'Penumpukan Sampah Liar Baunya Menyengat Warga sekitar',
                    region: 'Kec. Ciledug',
                    location: 'Sudut Perempatan Jalan Flamboyan',
                    description: 'Sudah lebih dari seminggu sampah menumpuk di area pembuangan liar ini dan belum ada truk sampah mengangkutnya. Bau menyengat sangat mengganggu kenyamanan warga yang beraktivitas.',
                    evidence_photo: null,
                    user: { name: 'Siti Rahma' },
                    category: { category_name: 'Kebersihan' },
                    status: { status_name: 'Selesai' },
                    created_at: '2026-06-04T08:30:00.000000Z'
                },
                {
                    id: 'm3',
                    title: 'Lampu Penerangan Jalan Umum Mati Total Sepanjang 200 Meter',
                    region: 'Kec. Cipondoh',
                    location: 'Jl. Kenanga Mas Blok C',
                    description: 'Lampu jalan mati total sejak beberapa malam lalu membuat lingkungan sekitar gelap gulita saat malam hari. Sangat rawan tindakan kejahatan pembegalan atau pencurian di malam hari.',
                    evidence_photo: null,
                    user: { name: 'Doni Kusuma' },
                    category: { category_name: 'Keamanan' },
                    status: { status_name: 'Menunggu Verifikasi' },
                    created_at: '2026-06-07T18:22:00.000000Z'
                }
            ];
        }

        // --- Detail Modal Open ---
        function openReportDetail(report) {
            document.getElementById('detailModalTitle').innerText = report.title;
            document.getElementById('detailModalCategory').innerText = report.category.category_name;
            document.getElementById('detailModalReporter').innerText = report.user ? report.user.name : 'Masyarakat';
            document.getElementById('detailModalLocation').innerText = `${report.location}, ${report.region}`;
            document.getElementById('detailModalDate').innerText = formatDate(report.created_at);
            document.getElementById('detailModalDescription').innerText = report.description;
            
            // Photo mapping
            const imgWrapper = document.getElementById('detailModalImgWrapper');
            if (report.evidence_photo) {
                imgWrapper.innerHTML = `<img src="${report.evidence_photo}" class="detail-report-img" alt="Bukti" onerror="this.outerHTML='<div class=detail-report-placeholder><i class=\'fa-solid fa-image\'></i></div>'">`;
            } else {
                imgWrapper.innerHTML = `<div class="detail-report-placeholder"><i class="fa-solid fa-image"></i></div>`;
            }
            
            // Status mapping
            const statusEl = document.getElementById('detailModalStatus');
            const statusTxt = statusEl.querySelector('.status-txt');
            const statusName = report.status.status_name;
            statusTxt.innerText = statusName;
            
            statusEl.className = 'report-status-badge detail-status-pill';
            if (statusName === 'Menunggu Verifikasi') statusEl.classList.add('status-waiting');
            if (statusName === 'Diproses') statusEl.classList.add('status-processing');
            if (statusName === 'Selesai') statusEl.classList.add('status-success');
            if (statusName === 'Ditolak') statusEl.classList.add('status-danger');
            
            openModal('detailReportModal');
        }

        // --- Action: Delete Report ---
        async function handleDeleteReport(event, id) {
            event.stopPropagation(); // prevent modal opening trigger
            
            if (!confirm('Apakah Anda yakin ingin menghapus laporan aduan ini secara permanen?')) {
                return;
            }
            
            toggleSpinner(true);
            const response = await apiFetch(`/api/reports/${id}`, {
                method: 'DELETE'
            });
            toggleSpinner(false);
            
            if (response.error) {
                showToast(response.data.message || 'Laporan gagal dihapus.', 'error');
                return;
            }
            
            showToast('Laporan berhasil dihapus!', 'success');
            
            // Reload feeds
            await loadMyReports();
            await loadPublicFeed();
        }

        // --- Drag & Drop file upload helpers ---
        function setupDragAndDrop() {
            const zone = document.getElementById('fileUploadZone');
            
            ['dragenter', 'dragover'].forEach(eventName => {
                zone.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    zone.classList.add('dragover');
                }, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                zone.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    zone.classList.remove('dragover');
                }, false);
            });
            
            zone.addEventListener('drop', (e) => {
                const dt = e.dataTransfer;
                const files = dt.files;
                if (files.length) {
                    const fileInput = document.getElementById('reportPhoto');
                    fileInput.files = files;
                    handleFilePreview(fileInput);
                }
            });
        }

        function handleFilePreview(input) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                
                // Validation (max 2MB)
                if (file.size > 2 * 1024 * 1024) {
                    showToast('Ukuran foto terlalu besar. Maksimal adalah 2MB.', 'error');
                    input.value = '';
                    removeUploadedFile();
                    return;
                }
                
                state.selectedFile = file;
                
                const reader = new FileReader();
                reader.onload = (e) => {
                    document.getElementById('uploadPreview').src = e.target.result;
                    document.getElementById('uploadPreviewContainer').style.display = 'block';
                    document.getElementById('fileUploadZone').style.padding = '16px 20px'; // make smaller
                };
                reader.readAsDataURL(file);
            }
        }

        function removeUploadedFile() {
            state.selectedFile = null;
            document.getElementById('reportPhoto').value = '';
            document.getElementById('uploadPreviewContainer').style.display = 'none';
            document.getElementById('uploadPreview').src = '';
            document.getElementById('fileUploadZone').style.padding = '32px 20px'; // reset size
        }

        // --- Action: Create Report Submit ---
        async function handleCreateReport(e) {
            e.preventDefault();
            clearFormErrors('tab-buat-laporan');
            
            const title = document.getElementById('reportTitle').value;
            const category_id = document.getElementById('reportCategory').value;
            const region = document.getElementById('reportRegion').value;
            const location = document.getElementById('reportLocation').value;
            const description = document.getElementById('reportDescription').value;
            
            // Check form validation
            if (!category_id) {
                showValidationError('reportCategory', 'Kategori wajib dipilih.');
                return;
            }
            
            toggleSpinner(true);
            const btnSubmit = document.getElementById('btnSubmitReport');
            btnSubmit.disabled = true;
            
            // Build multipart form data for uploading files
            const formData = new FormData();
            formData.append('title', title);
            formData.append('category_id', category_id);
            formData.append('region', region);
            formData.append('location', location);
            formData.append('description', description);
            
            if (state.selectedFile) {
                formData.append('evidence_photo', state.selectedFile);
            }
            
            // Use custom fetch wrapper without header stringify for multipart
            try {
                const response = await fetch(`${window.location.origin}/api/reports`, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${state.token}`
                    },
                    body: formData
                });
                
                const data = await response.json();
                toggleSpinner(false);
                btnSubmit.disabled = false;
                
                if (response.status === 401) {
                    handleLogout();
                    showToast('Sesi Anda berakhir. Silakan masuk kembali.', 'error');
                    return;
                }
                
                if (!response.ok) {
                    if (response.status === 422 && data.errors) {
                        const errs = data.errors;
                        if (errs.title) showValidationError('reportTitle', errs.title[0]);
                        if (errs.category_id) showValidationError('reportCategory', errs.category_id[0]);
                        if (errs.region) showValidationError('reportRegion', errs.region[0]);
                        if (errs.location) showValidationError('reportLocation', errs.location[0]);
                        if (errs.description) showValidationError('reportDescription', errs.description[0]);
                        if (errs.evidence_photo) showValidationError('reportPhoto', errs.evidence_photo[0]);
                    } else {
                        showToast(data.message || 'Laporan gagal dikirim.', 'error');
                    }
                    return;
                }
                
                showToast('Laporan pengaduan berhasil dikirim!', 'success');
                
                // Reset form fields
                document.getElementById('createReportForm').reset();
                removeUploadedFile();
                
                // Refresh data feed
                await loadPublicFeed();
                
                // Direct redirect to My Reports
                switchDashboardTab('laporan-saya');
                
            } catch (err) {
                console.error(err);
                toggleSpinner(false);
                btnSubmit.disabled = false;
                showToast('Koneksi bermasalah atau server terputus.', 'error');
            }
        }

        // --- Helper: Format raw ISO timestamp to Indonesian locale date ---
        function formatDate(isoString) {
            if (!isoString) return '-';
            try {
                const date = new Date(isoString);
                return date.toLocaleDateString('id-ID', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
            } catch (e) {
                return isoString;
            }
        }

        // --- Helper: Escape HTML strings to prevent XSS ---
        function escapeHtml(text) {
            if (!text) return '';
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            return text.replace(/[&<>"']/g, function(m) { return map[m]; });
        }
    </script>
</body>
</html>
