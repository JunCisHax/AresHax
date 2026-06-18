<html lang="vi">
 <head> 
  <script>
  // Function to clear cache and reload
  function clearCacheAndReload() {
    // Check if this is the first visit in this session
    if (!sessionStorage.getItem('cacheCleared')) {
      // Clear browser cache programmatically (if supported)
      if (window.caches && window.caches.keys) {
        caches.keys().then(function(names) {
          for (let name of names) {
            caches.delete(name);
          }
        });
      }
      
      // Clear localStorage and sessionStorage if needed
      // localStorage.clear();
      // sessionStorage.clear();
      
      // Set a flag to prevent infinite reload loop
      sessionStorage.setItem('cacheCleared', 'true');
      
      // Force reload the page
      setTimeout(function() {
        window.location.reload(true); // true forces reload from server
      }, 100);
    }
  }

  // Run on page load
  window.onload = function() {
    clearCacheAndReload();
    
    // Your existing initialization code
    renderGameGrid();
    renderGameDetails();
    setTimeout(() => {
      const popup = document.getElementById('popup');
      popup.style.display = 'flex';
      setTimeout(() => popup.classList.add('show'), 10);
    }, 1000);
  };
</script> 
  <meta name="google-adsense-account" content="ca-pub-5837621758803699"> 
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes"> 
  <meta name="description" content="AresHax - Cung cấp hack game và key miễn phí cho Liên Quân, Free Fire, ZingSpeed và hơn thế nữa!"> 
  <title>AresHax - Hack Game &amp; Key</title> 
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"> 
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      -webkit-tap-highlight-color: transparent;
    }
    
    :root {
      --primary: #6366f1;
      --primary-dark: #4f46e5;
      --primary-light: #818cf8;
      --secondary: #8b5cf6;
      --accent: #06b6d4;
      --success: #10b981;
      --warning: #f59e0b;
      --danger: #ef4444;
      
      --bg-primary: #0f172a;
      --bg-secondary: #1e293b;
      --bg-tertiary: #334155;
      --bg-card: #1e293b;
      --bg-hover: #334155;
      
      --text-primary: #f1f5f9;
      --text-secondary: #cbd5e1;
      --text-muted: #94a3b8;
      
      --border: rgba(255, 255, 255, 0.1);
      --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.15);
      --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.2);
      --shadow-lg: 0 8px 32px rgba(0, 0, 0, 0.3);
      --shadow-glow: 0 0 20px rgba(99, 102, 241, 0.3);
      
      --radius-sm: 8px;
      --radius-md: 12px;
      --radius-lg: 16px;
      --radius-xl: 20px;
    }
    
    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      background: linear-gradient(135deg, var(--bg-primary) 0%, #1a1f3a 100%);
      background-attachment: fixed;
      color: var(--text-primary);
      padding: 16px;
      min-height: 100vh;
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0;
    }
    
    /* Header */
    .header {
      text-align: center;
      margin-bottom: 32px;
      padding: 24px 0;
    }
    
    .header h1 {
      font-size: clamp(24px, 5vw, 36px);
      font-weight: 800;
      background: linear-gradient(135deg, var(--primary-light), var(--accent));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 8px;
      letter-spacing: -0.5px;
      text-shadow: 0 0 30px rgba(99, 102, 241, 0.3);
    }
    
    .header-subtitle {
      color: var(--text-secondary);
      font-size: clamp(14px, 3vw, 16px);
      font-weight: 400;
    }
    
    /* Game Grid */
    .game-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
      gap: 16px;
      margin-bottom: 32px;
    }
    
    @media (max-width: 640px) {
      .game-grid {
        grid-template-columns: repeat(auto-fill, minmax(110px, 1fr));
        gap: 12px;
      }
    }
    
    .game-card {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      background: linear-gradient(135deg, var(--bg-card), var(--bg-secondary));
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 16px 12px;
      box-shadow: var(--shadow-md);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
    }
    
    .game-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(6, 182, 212, 0.1));
      opacity: 0;
      transition: opacity 0.3s;
    }
    
    .game-card:hover,
    .game-card.active {
      transform: translateY(-4px) scale(1.02);
      box-shadow: var(--shadow-lg), var(--shadow-glow);
      border-color: var(--primary);
      background: linear-gradient(135deg, var(--bg-hover), var(--bg-card));
    }
    
    .game-card:hover::before,
    .game-card.active::before {
      opacity: 1;
    }
    
    .game-card img {
      width: 72px;
      height: 72px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid var(--border);
      box-shadow: var(--shadow-sm);
      transition: all 0.3s;
      position: relative;
      z-index: 1;
    }
    
    @media (max-width: 640px) {
      .game-card img {
        width: 60px;
        height: 60px;
      }
    }
    
    .game-card:hover img,
    .game-card.active img {
      border-color: var(--primary);
      box-shadow: 0 0 20px rgba(99, 102, 241, 0.4);
      transform: scale(1.05);
    }
    
    .game-card span {
      margin-top: 12px;
      font-size: 13px;
      font-weight: 600;
      color: var(--text-primary);
      text-align: center;
      line-height: 1.3;
      position: relative;
      z-index: 1;
    }
    
    @media (max-width: 640px) {
      .game-card span {
        font-size: 12px;
        margin-top: 8px;
      }
    }
    
    .game-card:hover span,
    .game-card.active span {
      color: var(--primary-light);
    }
    
    /* Game Details */
    .game-details {
      display: none;
      opacity: 0;
      transition: opacity 0.4s ease, transform 0.4s ease;
      background: linear-gradient(135deg, var(--bg-card), var(--bg-secondary));
      border: 1px solid var(--border);
      border-radius: var(--radius-xl);
      padding: 24px;
      margin-bottom: 32px;
      box-shadow: var(--shadow-lg);
      transform: translateY(-10px);
    }
    
    .game-details.show {
      display: block;
      opacity: 1;
      transform: translateY(0);
    }
    
    .game-details h2 {
      font-size: 20px;
      font-weight: 700;
      color: var(--primary-light);
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    
    @media (max-width: 640px) {
      .game-details h2 {
        font-size: 18px;
      }
    }
    
    .game-details p {
      font-size: 14px;
      color: var(--text-secondary);
      margin-bottom: 16px;
      line-height: 1.6;
    }
    
    @media (max-width: 640px) {
      .game-details p {
        font-size: 13px;
      }
    }
    
    .game-details .btn {
      display: inline-block;
      width: 100%;
      max-width: 240px;
      margin: 8px auto;
      padding: 12px 20px;
      font-size: 14px;
      font-weight: 600;
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: #fff;
      border: none;
      border-radius: var(--radius-md);
      text-align: center;
      text-decoration: none;
      box-shadow: var(--shadow-md);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      cursor: pointer;
      position: relative;
      overflow: hidden;
    }
    
    .game-details .btn::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.2);
      transform: translate(-50%, -50%);
      transition: width 0.6s, height 0.6s;
    }
    
    .game-details .btn:hover::before {
      width: 300px;
      height: 300px;
    }
    
    .game-details .btn:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg), var(--shadow-glow);
    }
    
    .game-details .btn:active {
      transform: translateY(0);
    }
    
    @media (max-width: 640px) {
      .game-details .btn {
        max-width: 100%;
        font-size: 13px;
        padding: 10px 16px;
      }
    }
    
    .game-details hr {
      margin: 20px 0;
      border: none;
      border-top: 1px solid var(--border);
    }
    
    /* Links Section */
    .links-section {
      text-align: center;
      margin: 32px 0;
      padding: 24px;
      background: linear-gradient(135deg, var(--bg-card), var(--bg-secondary));
      border: 1px solid var(--border);
      border-radius: var(--radius-xl);
      box-shadow: var(--shadow-md);
    }
    
    .links-section h2 {
      font-size: 20px;
      font-weight: 700;
      color: var(--primary-light);
      margin-bottom: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }
    
    @media (max-width: 640px) {
      .links-section h2 {
        font-size: 18px;
      }
    }
    
    .links-section .links-container {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      justify-content: center;
      align-items: center;
    }
    
    .links-section a {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 20px;
      background: linear-gradient(135deg, var(--bg-tertiary), var(--bg-card));
      color: var(--text-primary);
      border: 1px solid var(--border);
      border-radius: var(--radius-md);
      font-size: 14px;
      font-weight: 600;
      text-decoration: none;
      box-shadow: var(--shadow-sm);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
    }
    
    .links-section a::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
      transition: left 0.5s;
    }
    
    .links-section a:hover::before {
      left: 100%;
    }
    
    .links-section a:hover {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: #fff;
      border-color: var(--primary);
      transform: translateY(-2px);
      box-shadow: var(--shadow-md), var(--shadow-glow);
    }
    
    .links-section a:active {
      transform: translateY(0);
    }
    
    @media (max-width: 640px) {
      .links-section a {
        font-size: 13px;
        padding: 8px 16px;
        flex: 1;
        min-width: calc(50% - 6px);
        justify-content: center;
      }
    }
    
    /* Popup */
    .popup-overlay {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(15, 23, 42, 0.9);
      backdrop-filter: blur(8px);
      z-index: 1000;
      display: none;
      align-items: center;
      justify-content: center;
      padding: 16px;
      animation: fadeIn 0.3s ease;
    }
    
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    
    .popup-overlay.show {
      display: flex;
    }
    
    .popup-content {
      background: linear-gradient(135deg, var(--bg-card), var(--bg-secondary));
      padding: 24px;
      border-radius: var(--radius-xl);
      max-width: 90%;
      width: 400px;
      max-height: 90vh;
      overflow-y: auto;
      color: var(--text-primary);
      font-size: 14px;
      line-height: 1.7;
      box-shadow: var(--shadow-lg);
      border: 1px solid var(--border);
      animation: slideUp 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(20px) scale(0.95);
      }
      to {
        opacity: 1;
        transform: translateY(0) scale(1);
      }
    }
    
    .popup-content h2 {
      font-size: 22px;
      font-weight: 700;
      color: var(--primary-light);
      text-align: center;
      margin-bottom: 16px;
    }
    
    .popup-content p {
      color: var(--text-secondary);
      margin-bottom: 12px;
    }
    
    .popup-content b {
      color: var(--primary-light);
      font-weight: 600;
    }
    
    .popup-content button {
      display: block;
      margin: 20px auto 0;
      padding: 12px 32px;
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: #fff;
      font-size: 14px;
      font-weight: 600;
      border: none;
      border-radius: var(--radius-md);
      cursor: pointer;
      box-shadow: var(--shadow-md);
      transition: all 0.3s;
      width: 100%;
      max-width: 200px;
    }
    
    .popup-content button:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg), var(--shadow-glow);
    }
    
    .popup-content button:active {
      transform: translateY(0);
    }
    
    @media (max-width: 640px) {
      .popup-content {
        width: 100%;
        padding: 20px;
        font-size: 13px;
      }
      
      .popup-content h2 {
        font-size: 20px;
      }
      
      .popup-content button {
        font-size: 13px;
        padding: 10px 24px;
      }
    }
    
    /* Scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }
    
    ::-webkit-scrollbar-track {
      background: var(--bg-secondary);
    }
    
    ::-webkit-scrollbar-thumb {
      background: var(--bg-tertiary);
      border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
      background: var(--primary);
    }
    
    /* Loading state */
    .game-card.loading {
      pointer-events: none;
      opacity: 0.6;
    }
    
    /* Smooth transitions */
    @media (prefers-reduced-motion: reduce) {
      * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }
    }
  </style> 
  <meta http-equiv="origin-trial" content="AlK2UR5SkAlj8jjdEc9p3F3xuFYlF6LYjAML3EOqw1g26eCwWPjdmecULvBH5MVPoqKYrOfPhYVL71xAXI1IBQoAAAB8eyJvcmlnaW4iOiJodHRwczovL2RvdWJsZWNsaWNrLm5ldDo0NDMiLCJmZWF0dXJlIjoiV2ViVmlld1hSZXF1ZXN0ZWRXaXRoRGVwcmVjYXRpb24iLCJleHBpcnkiOjE3NTgwNjcxOTksImlzU3ViZG9tYWluIjp0cnVlfQ==">
  <meta http-equiv="origin-trial" content="Amm8/NmvvQfhwCib6I7ZsmUxiSCfOxWxHayJwyU1r3gRIItzr7bNQid6O8ZYaE1GSQTa69WwhPC9flq/oYkRBwsAAACCeyJvcmlnaW4iOiJodHRwczovL2dvb2dsZXN5bmRpY2F0aW9uLmNvbTo0NDMiLCJmZWF0dXJlIjoiV2ViVmlld1hSZXF1ZXN0ZWRXaXRoRGVwcmVjYXRpb24iLCJleHBpcnkiOjE3NTgwNjcxOTksImlzU3ViZG9tYWluIjp0cnVlfQ==">
  <meta http-equiv="origin-trial" content="A9nrunKdU5m96PSN1XsSGr3qOP0lvPFUB2AiAylCDlN5DTl17uDFkpQuHj1AFtgWLxpLaiBZuhrtb2WOu7ofHwEAAACKeyJvcmlnaW4iOiJodHRwczovL2RvdWJsZWNsaWNrLm5ldDo0NDMiLCJmZWF0dXJlIjoiQUlQcm9tcHRBUElNdWx0aW1vZGFsSW5wdXQiLCJleHBpcnkiOjE3NzQzMTA0MDAsImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9">
  <meta http-equiv="origin-trial" content="A93bovR+QVXNx2/38qDbmeYYf1wdte9EO37K9eMq3r+541qo0byhYU899BhPB7Cv9QqD7wIbR1B6OAc9kEfYCA4AAACQeyJvcmlnaW4iOiJodHRwczovL2dvb2dsZXN5bmRpY2F0aW9uLmNvbTo0NDMiLCJmZWF0dXJlIjoiQUlQcm9tcHRBUElNdWx0aW1vZGFsSW5wdXQiLCJleHBpcnkiOjE3NzQzMTA0MDAsImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9">
  <meta http-equiv="origin-trial" content="A1S5fojrAunSDrFbD8OfGmFHdRFZymSM/1ss3G+NEttCLfHkXvlcF6LGLH8Mo5PakLO1sCASXU1/gQf6XGuTBgwAAACQeyJvcmlnaW4iOiJodHRwczovL2dvb2dsZXRhZ3NlcnZpY2VzLmNvbTo0NDMiLCJmZWF0dXJlIjoiQUlQcm9tcHRBUElNdWx0aW1vZGFsSW5wdXQiLCJleHBpcnkiOjE3NzQzMTA0MDAsImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9">
 </head> 
 <body> 
  <!-- Popup --> 
  <div id="popup" class="popup-overlay"> 
   <div class="popup-content"> 
    <h2>🎉 Chào Mừng Đến Với AresHax</h2> 
    <p> Chọn game bạn muốn hack để xem link tải và nhận key.<br><br> Key miễn phí sử dụng trong <b>3 ngày</b>. Sau đó, bạn có thể lấy key mới hoặc mua key liên hệ Admin.<br><br> Admin chuyên cung cấp key và acc giá rẻ (<b>dưới 10k</b>) với nhiều tùy chọn skin và rank.<br><br> Cảm ơn bạn đã ủng hộ! Chúc bạn chơi game vui vẻ!<br><br> — Admin <b>Huỳnh Duy Khang</b> ❤️ </p> 
    <button onclick="closePopup()">Đã Hiểu</button> 
   </div> 
  </div> 
  <div class="container"> 
   <div class="header"> 
    <h1>AresHax - Hack Game</h1> 
    <p class="header-subtitle">Chọn game bạn muốn hack</p> 
   </div> 
   <!-- Game Grid --> 
   <div class="game-grid" id="game-grid">
    <div class="game-card" data-game-id="lqv2"> 
     <img src="/assets/img/icons/game/lienquan.png" alt="Biểu tượng Hack Liên Quân Vip 1.62.1.4" loading="lazy" onerror="this.src='https://via.placeholder.com/80?text=Hack Liên Quân Vip 1.62.1.4'"> 
     <span>Hack Liên Quân Vip 1.62.1.4</span> 
    </div>
    <div class="game-card" data-game-id="lqchapto"> 
     <img src="/assets/img/icons/game/lienquan.png" alt="Biểu tượng Hack Liên Quân ESP Chấp Tố 1.62.1.4" loading="lazy" onerror="this.src='https://via.placeholder.com/80?text=Hack Liên Quân ESP Chấp Tố 1.62.1.4'"> 
     <span>Hack Liên Quân ESP Chấp Tố 1.62.1.4</span> 
    </div>
    <div class="game-card" data-game-id="fcmobile"> 
     <img src="/assets/img/icons/game/com.garena.game.fcmobilevn.png" alt="Biểu tượng Hack FC Mobile VN 27.0.07" loading="lazy" onerror="this.src='https://via.placeholder.com/80?text=Hack FC Mobile VN 27.0.07'"> 
     <span>Hack FC Mobile VN 27.0.07</span> 
    </div>
    <div class="game-card" data-game-id="zingspeed"> 
     <img src="/assets/img/icons/game/zingspeedmobile.png" alt="Biểu tượng ZingSpeed" loading="lazy" onerror="this.src='https://via.placeholder.com/80?text=ZingSpeed'"> 
     <span>ZingSpeed</span> 
    </div>
    <div class="game-card" data-game-id="cfmvn"> 
     <img src="/assets/img/icons/game/com.vnggames.cfl.crossfirelegends.png" alt="Biểu tượng HACK CFL ANDROID VIP" loading="lazy" onerror="this.src='https://via.placeholder.com/80?text=HACK CFL ANDROID VIP'"> 
     <span>HACK CFL ANDROID VIP</span> 
    </div>
    <div class="game-card" data-game-id="tocchien"> 
     <img src="/assets/img/icons/game/com.riotgames.league.wildriftvn.png" alt="Biểu tượng Hack Map Tốc Chiến" loading="lazy" onerror="this.src='https://via.placeholder.com/80?text=Hack Map Tốc Chiến'"> 
     <span>Hack Map Tốc Chiến</span> 
    </div>
    <div class="game-card" data-game-id="dnslq"> 
     <img src="/assets/img/icons/game/chongkhoa.png" alt="Biểu tượng Chống Khóa Liên Quân DNS" loading="lazy" onerror="this.src='https://via.placeholder.com/80?text=Chống Khóa Liên Quân DNS'"> 
     <span>Chống Khóa Liên Quân DNS</span> 
    </div>
    <div class="game-card" data-game-id="loaderaov"> 
     <img src="/assets/img/icons/game/loaderaov.png" alt="Biểu tượng LOADER AOV" loading="lazy" onerror="this.src='https://via.placeholder.com/80?text=LOADER AOV'"> 
     <span>LOADER AOV</span> 
    </div>
    <div class="game-card" data-game-id="mbll"> 
     <img src="/assets/img/icons/game/mlbbvn.png" alt="Biểu tượng Mobile Legends Bang Bang" loading="lazy" onerror="this.src='https://via.placeholder.com/80?text=Mobile Legends Bang Bang'"> 
     <span>Mobile Legends Bang Bang</span> 
    </div>
    <div class="game-card" data-game-id="bloodstrike"> 
     <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnfkkUPUFTyoTFt77Z0Bj64qfSBVMfJS5UTg&amp;s" alt="Biểu tượng BloodStrike" loading="lazy" onerror="this.src='https://via.placeholder.com/80?text=BloodStrike'"> 
     <span>BloodStrike</span> 
    </div>
    <div class="game-card" data-game-id="pubgvng"> 
     <img src="/assets/img/icons/game/com.vng.pubgmobile.png" alt="Biểu tượng PUBG MOBILE VNG" loading="lazy" onerror="this.src='https://via.placeholder.com/80?text=PUBG MOBILE VNG'"> 
     <span>PUBG MOBILE VNG</span> 
    </div>
    <div class="game-card" data-game-id="fefe"> 
     <img src="/assets/img/icons/game/freefire.png" alt="Biểu tượng Free Fire" loading="lazy" onerror="this.src='https://via.placeholder.com/80?text=Free Fire'"> 
     <span>Free Fire</span> 
    </div>
   </div> 
   <!-- Game Details --> 
   <div id="game-details">
    <div id="details-lqv2" class="game-details"> 
     <h2>Hack Liên Quân Vip 1.62.1.4</h2> 
     <p>Gỡ Liên Quân Trong Máy Trước Khi Cài !!!</p> 
     <a href="https://www.mediafire.com/file/10aqxtcz71q9giw/LQ+MAP+1.62.1.4.apk/file" class="btn" target="_blank">Tải APK</a> 
     <a href="https://vip.vnhax.top/GETKEY/vipadmin" class="btn" target="_blank">Nhận Key</a> 
    </div>
    <div id="details-lqchapto" class="game-details"> 
     <h2>Hack Liên Quân ESP Chấp Tố 1.62.1.4</h2> 
     <p> Chơi Kĩ No Lâu Không Ban Vặt Nhưng Ăn Tố Nhiều Quá Cũng Ăn Cặc :))</p> 
     <a href="https://www.mediafire.com/file/bg00xekordrn30n/ESP+MAX+VIP.apk/file" class="btn" target="_blank">APK Chấp Tố Ẩn Live</a> 
     <a href="https://vip.vnhax.top/GETKEY/vipadmin" class="btn" target="_blank">Nhận Key</a> 
    </div>
    <div id="details-fcmobile" class="game-details"> 
     <h2>Hack FC Mobile VN 27.0.07</h2> 
     <p>Gỡ Liên Quân Trong Máy Trước Khi Cài !!!</p> 
     <a href="https://www.mediafire.com/file/jq4cb8z5gq600mn/FC+27.0.07+HACK.apk/file" class="btn" target="_blank">Tải APK</a> 
     <a href="https://vip.vnhax.top/GETKEY/vipadmin" class="btn" target="_blank">Nhận Key</a> 
    </div>
    <div id="details-zingspeed" class="game-details"> 
     <h2>🚗 ZingSpeed 1.54.0</h2> 
     <p>Bản mới nhất 64BIT từ CH Play</p> 
     <a href="https://bom.so/ZsmVipVCL" class="btn" target="_blank">Tải APK</a> 
     <a href="https://vip.vnhax.top/GETKEY/vipadmin" class="btn" target="_blank">Nhận Key</a> 
    </div>
    <div id="details-cfmvn" class="game-details"> 
     <h2>HACK CFL ANDROID VIP</h2> 
     <p>FIX LOGIN FB KHÔNG CẦN GỠ FB !!!</p> 
     <a href="https://www.mediafire.com/file/ftj1y8ra02127bp/CF+FIX+LOGIN+FB.apk/file" class="btn" target="_blank">Tải APK</a> 
     <a href="https://vip.vnhax.top/GETKEY/vipadmin" class="btn" target="_blank">Nhận Key</a> 
    </div>
    <div id="details-tocchien" class="game-details"> 
     <h2>Hack Map Tốc Chiến</h2> 
     <p>ANTIBAND | HACK MAP | CAM XA</p> 
     <a href="https://www.mediafire.com/file/ga2efoinre2eg34/Map+Tốc+Chiến_7.1.0.9849.apk/file" class="btn" target="_blank">Tải APK</a> 
     <a href="https://vip.vnhax.top/GETKEY/vipadmin" class="btn" target="_blank">Nhận Key</a> 
    </div>
    <div id="details-dnslq" class="game-details"> 
     <h2>Chống Khoá Acc</h2> 
     <p>Bypass VPN + Xóa Log LQMB</p> 
     <a href="https://www.mediafire.com/file/rfy3qlymz7g61ba/BYPASS+DNS+LQ_2.334.apk/file" class="btn" target="_blank">Tải APK V1</a> 
     <a href="https://www.mediafire.com/file/rfy3qlymz7g61ba/BYPASS+DNS+LQ_2.334.apk/file" class="btn" target="_blank">Tải APK V2 Bật Ở Sảnh Siêu Mạnh</a> 
    </div>
    <div id="details-loaderaov" class="game-details"> 
     <h2>LOADER AOV</h2> 
     <p>CHỈ HỖ TRỢ MÁY ROOT</p> 
     <a href="https://www.mediafire.com/file/eiw2hl45bmybmg1/LOADER+AOV_V1.apk/file" class="btn" target="_blank">Tải APK</a> 
     <a href="https://vip.vnhax.top/GETKEY/vipadmin" class="btn" target="_blank">Key Liên Quân</a> 
     <a href="https://youtu.be/vE69mrPImrU?si=PKHhwyPAGnTpiCaa" class="btn" target="_blank">Hướng Dẫn Dùng</a> 
    </div>
    <div id="details-mbll" class="game-details"> 
     <h2>Hack Map Mobile Legends Bang Bang</h2> 
     <p>ESP | HACK MAP | CAM XA</p> 
     <a href="https://www.mediafire.com/file/8d6r96jzg2cp6rl/Hack+Map+MBLL+V1.apk/file" class="btn" target="_blank">Tải APK</a> 
     <a href="https://vip.vnhax.top/GETKEY/vipadmin" class="btn" target="_blank">Nhận Key</a> 
    </div>
    <div id="details-bloodstrike" class="game-details"> 
     <h2>🔫 Blood Strike</h2> 
     <p>Bản mới nhất 64BIT từ CH Play</p> 
     <a href="https://hmgteam.net/GETKEY/index.php?api=ngohuynhtuan" class="btn" target="_blank">Tải APK</a> 
     <a href="https://hmgteam.net/GETKEY/index.php?api=ngohuynhtuan" class="btn" target="_blank">Nhận Key</a> 
    </div>
    <div id="details-pubgvng" class="game-details"> 
     <h2>🔫 PUBG MOBILE VNG</h2> 
     <p>Bản mới nhất 64BIT từ CH Play</p> 
     <a href="https://hmgteam.net/GETKEY/index.php?api=ngohuynhtuan" class="btn" target="_blank">Tải APK</a> 
     <a href="https://hmgteam.net/GETKEY/index.php?api=ngohuynhtuan" class="btn" target="_blank">Nhận Key</a> 
    </div>
    <div id="details-fefe" class="game-details"> 
     <h2>Hướng dẫn cài đặt</h2> 
     <p>Xem kĩ làm từng bước tránh lỗi</p> 
     <a href="https://youtu.be/QIcsKEwuVe8?si=IL1HLbDuUBPOtcR4" class="btn" target="_blank">Xem hướng dẫn</a> 
     <a href="https://youtu.be/U6RcLFvj7Yo?si=Ue6RJ3DpoTX0pImu" class="btn" target="_blank">Hướng Dẫn Dán File Android Cao Nếu Lỗi</a> 
     <hr> 
     <h2>Tường Lửa Chống Khóa acc</h2> 
     <p>Bật xong mới vào game tránh lỗi</p> 
     <a href="https://www.mediafire.com/file/bs99tqjuk2fowcn/AntiBand+V2.apk/file" class="btn" target="_blank">Tường Lửa</a> 
     <a href="https://youtu.be/zxtLtxJQ3i4?si=XLg211TnRfGulxc7" class="btn" target="_blank">Hướng Dẫn Dùng Tường Lửa</a> 
     <a href="https://vip.vnhax.top/GETKEY/vipadmin" class="btn" target="_blank">Nhận Key</a> 
     <hr> 
     <h2>Hack Free Fire</h2> 
     <p>Bản Mới Nhất</p> 
     <a href="https://transfer.it/t/r5Dou4h3zbAI" class="btn" target="_blank">Tải APK HACK</a> 
     <hr> 
     <h2>Lấy Key Hack Free Fire</h2> 
     <p>Sao chép key vào hack dán</p> 
     <a href="https://vip.vnhax.top/GETKEY/vipadmin" class="btn" target="_blank">Nhận Key</a> 
     <hr> 
     <h2>MT Manager</h2> 
     <p>Xem kĩ video hướng dẫn</p> 
     <a href="https://www.mediafire.com/file/ibdk3fu2r05xg46/MT+Manager_2.18.4.apk/file" class="btn" target="_blank">Tải APK</a> 
    </div>
   </div> 
   <!-- Shop Links --> 
   <div class="links-section"> 
    <h2>🛒 Mua Key &amp; ACC</h2> 
    <div class="links-container"> 
     <a href="https://t.me/JunCisHaxHDK" target="_blank">Key Siêu Tốc</a> 
    </div> 
   </div> 
   <!-- Guide Links --> 
   <div class="links-section"> 
    <h2>⭐ Hướng Dẫn Lấy Key Miễn Phí</h2> 
    <div class="links-container"> 
     <a href="https://www.youtube.com/shorts/6ysuqENg1zg?feature=share" target="_blank">Xem Chi Tiết</a> 
    </div> 
   </div> 
   <!-- Community Links --> 
   <div class="links-section"> 
    <h2>🌐 Cộng Đồng</h2> 
    <div class="links-container"> 
     <a href="https://t.me/AresHaxGame" target="_blank">Box Telegram 1</a> 
     <a href="https://t.me/JunCisHax" target="_blank">Box Telegram 2</a> 
     <a href="https://zalo.me/g/sgqvxb444" target="_blank">Box Zalo </a> 
    </div> 
   </div> 
  </div> 
  <script>
    // Game data
    const games = [
    
    
    
    {
        id: 'lqv2',
        name: 'Hack Liên Quân Vip 1.62.1.4',
        icon: '/assets/img/icons/game/lienquan.png',
        sections: [
          {
            title: 'Hack Liên Quân Vip 1.62.1.4',
            description: 'Gỡ Liên Quân Trong Máy Trước Khi Cài !!!',
            links: [
              { text: 'Tải APK', url: 'https://www.mediafire.com/file/10aqxtcz71q9giw/LQ+MAP+1.62.1.4.apk/file' },
              { text: 'Nhận Key', url: 'https://vip.vnhax.top/GETKEY/vipadmin' }
            ]
          }
        ]
      },
      
      
      
      {
        id: 'lqchapto',
        name: 'Hack Liên Quân ESP Chấp Tố 1.62.1.4',
        icon: '/assets/img/icons/game/lienquan.png',
        sections: [
          {
            title: 'Hack Liên Quân ESP Chấp Tố 1.62.1.4',
            description: ' Chơi Kĩ No Lâu Không Ban Vặt Nhưng Ăn Tố Nhiều Quá Cũng Ăn Cặc :))',
            links: [

              
                            { text: 'APK Chấp Tố Ẩn Live', url: 'https://www.mediafire.com/file/bg00xekordrn30n/ESP+MAX+VIP.apk/file' },
              
              
              { text: 'Nhận Key', url: 'https://vip.vnhax.top/GETKEY/vipadmin' }
            ]
          }
        ]
      },
      
      





    
    
        {
        id: 'fcmobile',
        name: 'Hack FC Mobile VN 27.0.07',
        icon: '/assets/img/icons/game/com.garena.game.fcmobilevn.png',
        sections: [
          {
            title: 'Hack FC Mobile VN 27.0.07',
            description: 'Gỡ Liên Quân Trong Máy Trước Khi Cài !!!',
            links: [
              { text: 'Tải APK', url: 'https://www.mediafire.com/file/jq4cb8z5gq600mn/FC+27.0.07+HACK.apk/file' },
              { text: 'Nhận Key', url: 'https://vip.vnhax.top/GETKEY/vipadmin' }
            ]
          }
        ]
      },
    
    
    
    
    
    
    
    
    
    
    
          {
        id: 'zingspeed',
        name: 'ZingSpeed',
        icon: '/assets/img/icons/game/zingspeedmobile.png',
        sections: [
          {
            title: '🚗 ZingSpeed 1.54.0',
            description: 'Bản mới nhất 64BIT từ CH Play',
            links: [
              { text: 'Tải APK', url: 'https://bom.so/ZsmVipVCL' },
              { text: 'Nhận Key', url: 'https://vip.vnhax.top/GETKEY/vipadmin' }
            ]
          }
        ]
      },
    
          

      
      

      
      
      
            {
        id: 'cfmvn',
        name: 'HACK CFL ANDROID VIP',
        icon: '/assets/img/icons/game/com.vnggames.cfl.crossfirelegends.png',
        sections: [
          {
            title: 'HACK CFL ANDROID VIP',
            description: 'FIX LOGIN FB KHÔNG CẦN GỠ FB !!!',
            links: [
              { text: 'Tải APK', url: 'https://www.mediafire.com/file/ftj1y8ra02127bp/CF+FIX+LOGIN+FB.apk/file' },
              { text: 'Nhận Key', url: 'https://vip.vnhax.top/GETKEY/vipadmin' }
            ]
          }
        ]
      },
      
      
      {
        id: 'tocchien',
        name: 'Hack Map Tốc Chiến',
        icon: '/assets/img/icons/game/com.riotgames.league.wildriftvn.png',
        sections: [
          {
            title: 'Hack Map Tốc Chiến',
            description: 'ANTIBAND | HACK MAP | CAM XA',
            links: [
              { text: 'Tải APK', url: 'https://www.mediafire.com/file/ga2efoinre2eg34/Map+Tốc+Chiến_7.1.0.9849.apk/file' },
              { text: 'Nhận Key', url: 'https://vip.vnhax.top/GETKEY/vipadmin' }
            ]
          }
        ]
      },
      {
        id: 'dnslq',
        name: 'Chống Khóa Liên Quân DNS',
        icon: '/assets/img/icons/game/chongkhoa.png',
        sections: [
          {
            title: 'Chống Khoá Acc',
            description: 'Bypass VPN + Xóa Log LQMB',
            links: [
              { text: 'Tải APK V1', url: 'https://www.mediafire.com/file/rfy3qlymz7g61ba/BYPASS+DNS+LQ_2.334.apk/file' },
              { text: 'Tải APK V2 Bật Ở Sảnh Siêu Mạnh', url: 'https://www.mediafire.com/file/rfy3qlymz7g61ba/BYPASS+DNS+LQ_2.334.apk/file' }
            ]
          }
        ]
      },
      
       
      
      {
        id: 'loaderaov',
        name: 'LOADER AOV',
        icon: '/assets/img/icons/game/loaderaov.png',
        sections: [
          {
            title: 'LOADER AOV',
            description: 'CHỈ HỖ TRỢ MÁY ROOT',
            links: [
              { text: 'Tải APK', url: 'https://www.mediafire.com/file/eiw2hl45bmybmg1/LOADER+AOV_V1.apk/file' },
              { text: 'Key Liên Quân', url: 'https://vip.vnhax.top/GETKEY/vipadmin' },
              { text: 'Hướng Dẫn Dùng', url: 'https://youtu.be/vE69mrPImrU?si=PKHhwyPAGnTpiCaa' }
            ]
          }
        ]
      },
      
      
      
      {
        id: 'mbll',
        name: 'Mobile Legends Bang Bang',
        icon: '/assets/img/icons/game/mlbbvn.png',
        sections: [
          {
            title: 'Hack Map Mobile Legends Bang Bang',
            description: 'ESP | HACK MAP | CAM XA',
            links: [
              { text: 'Tải APK', url: 'https://www.mediafire.com/file/8d6r96jzg2cp6rl/Hack+Map+MBLL+V1.apk/file' },
              { text: 'Nhận Key', url: 'https://vip.vnhax.top/GETKEY/vipadmin' }
            ]
          }
        ]
      },
      
      
      

      {
        id: 'bloodstrike',
        name: 'BloodStrike',
        icon: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnfkkUPUFTyoTFt77Z0Bj64qfSBVMfJS5UTg&s',
        sections: [
          {
            title: '🔫 Blood Strike',
            description: 'Bản mới nhất 64BIT từ CH Play',
            links: [
              { text: 'Tải APK', url: 'https://hmgteam.net/GETKEY/index.php?api=ngohuynhtuan' },
              { text: 'Nhận Key', url: 'https://hmgteam.net/GETKEY/index.php?api=ngohuynhtuan' }
            ]
          }
        ]
      },
      {
        id: 'pubgvng',
        name: 'PUBG MOBILE VNG',
        icon: '/assets/img/icons/game/com.vng.pubgmobile.png',
        sections: [
          {
            title: '🔫 PUBG MOBILE VNG',
            description: 'Bản mới nhất 64BIT từ CH Play',
            links: [
              { text: 'Tải APK', url: 'https://hmgteam.net/GETKEY/index.php?api=ngohuynhtuan' },
              { text: 'Nhận Key', url: 'https://hmgteam.net/GETKEY/index.php?api=ngohuynhtuan' }
            ]
          }
        ]
      },
      {
        id: 'fefe',
        name: 'Free Fire',
        icon: '/assets/img/icons/game/freefire.png',
        sections: [
          {
            title: 'Hướng dẫn cài đặt',
            description: 'Xem kĩ làm từng bước tránh lỗi',
            links: [
              { text: 'Xem hướng dẫn', url: 'https://youtu.be/QIcsKEwuVe8?si=IL1HLbDuUBPOtcR4' },
              { text: 'Hướng Dẫn Dán File Android Cao Nếu Lỗi', url: 'https://youtu.be/U6RcLFvj7Yo?si=Ue6RJ3DpoTX0pImu' }
            ]
          },
          {
            title: 'Tường Lửa Chống Khóa acc',
            description: 'Bật xong mới vào game tránh lỗi',
            links: [
              { text: 'Tường Lửa', url: 'https://www.mediafire.com/file/bs99tqjuk2fowcn/AntiBand+V2.apk/file' },
              { text: 'Hướng Dẫn Dùng Tường Lửa', url: 'https://youtu.be/zxtLtxJQ3i4?si=XLg211TnRfGulxc7' },
              { text: 'Nhận Key', url: 'https://vip.vnhax.top/GETKEY/vipadmin' }
            ]
          },
          {
            title: 'Hack Free Fire',
            description: 'Bản Mới Nhất',
            links: [
              { text: 'Tải APK HACK', url: 'https://transfer.it/t/r5Dou4h3zbAI' }
            ]
          },
          {
            title: 'Lấy Key Hack Free Fire',
            description: 'Sao chép key vào hack dán',
            links: [
              { text: 'Nhận Key', url: 'https://vip.vnhax.top/GETKEY/vipadmin' }
            ]
          },
          {
            title: 'MT Manager',
            description: 'Xem kĩ video hướng dẫn',
            links: [
              { text: 'Tải APK', url: 'https://www.mediafire.com/file/ibdk3fu2r05xg46/MT+Manager_2.18.4.apk/file' }
            ]
          }
        ]
      }
    ];

    // Render game grid
    function renderGameGrid() {
      const grid = document.getElementById('game-grid');
      games.forEach((game) => {
        const card = document.createElement('div');
        card.className = 'game-card';
        card.dataset.gameId = game.id;
        card.innerHTML = `
          <img src="${game.icon}" alt="Biểu tượng ${game.name}" loading="lazy" onerror="this.src='https://via.placeholder.com/80?text=${game.name}'" />
          <span>${game.name}</span>
        `;
        card.onclick = () => toggleGame(game.id, card);
        grid.appendChild(card);
      });
    }

    // Render game details
    function renderGameDetails() {
      const detailsContainer = document.getElementById('game-details');
      games.forEach(game => {
        const detail = document.createElement('div');
        detail.id = `details-${game.id}`;
        detail.className = 'game-details';
        let sectionsHTML = '';
        game.sections.forEach((section, index) => {
          sectionsHTML += `
            <h2>${section.title}</h2>
            <p>${section.description}</p>
            ${section.links.map(link => `
              <a href="${link.url}" class="btn" target="_blank">${link.text}</a>
            `).join('')}
            ${index < game.sections.length - 1 ? '<hr>' : ''}
          `;
        });
        detail.innerHTML = sectionsHTML;
        detailsContainer.appendChild(detail);
      });
    }

    // Toggle game details
    function toggleGame(gameId, card) {
      const current = document.getElementById(`details-${gameId}`);
      const isVisible = current.classList.contains('show');

      // Hide all details
      document.querySelectorAll('.game-details').forEach(detail => {
        detail.classList.remove('show');
        detail.style.display = 'none';
      });

      // Remove active class from all cards
      document.querySelectorAll('.game-card').forEach(c => c.classList.remove('active'));

      // Show selected game
      if (!isVisible) {
        current.style.display = 'block';
        setTimeout(() => current.classList.add('show'), 10);
        card.classList.add('active');
        
        // Smooth scroll to details
        setTimeout(() => {
          current.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }, 100);
      }
    }

    // Close popup
    function closePopup() {
      const popup = document.getElementById('popup');
      popup.classList.remove('show');
      setTimeout(() => {
        popup.style.display = 'none';
      }, 300);
    }

    // Initialize
    window.onload = function () {
      renderGameGrid();
      renderGameDetails();
      setTimeout(() => {
        const popup = document.getElementById('popup');
        popup.style.display = 'flex';
        setTimeout(() => popup.classList.add('show'), 10);
      }, 1000);
    };
    
    // Close popup when clicking outside
    document.getElementById('popup').addEventListener('click', function(e) {
      if (e.target === this) {
        closePopup();
      }
    });
  </script> 
  <ins class="adsbygoogle adsbygoogle-noablate" data-ad-hi="true" data-adsbygoogle-status="done" style="display: none !important;">
   <div id="aswift_0_host" style="border-width: medium; border-style: none; border-color: currentcolor; border-image: initial; height: 0px; width: 0px; margin: 0px; padding: 0px; position: relative; visibility: visible; background-color: transparent; display: inline-block;">
    <iframe id="aswift_0" name="aswift_0" style="left:0;position:absolute;top:0;border:0;width:undefinedpx;height:undefinedpx;min-height:auto;max-height:none;min-width:auto;max-width:none;" sandbox="allow-forms allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts allow-top-navigation-by-user-activation" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allow="attribution-reporting" src="https://googleads.g.doubleclick.net/pagead/ads?client=ca-pub-5837621758803699&amp;output=html&amp;adk=1812271804&amp;adf=3025194257&amp;abgtt=6&amp;lmt=1781410031&amp;plat=3%3A2162688%2C4%3A2162688%2C16%3A8388608%2C17%3A32%2C24%3A32%2C25%3A32%2C32%3A32%2C41%3A32%2C42%3A32%2C43%3A32%2C44%3A32&amp;format=0x0&amp;url=https%3A%2F%2Fvip.vnhax.top%2F&amp;pra=5&amp;asro=0&amp;aimartd=4&amp;aieuf=1&amp;aicrs=1&amp;uach=WyJBbmRyb2lkIiwiMTIuMC4wIiwiIiwiVjIwMjkiLCIxNDkuMC43ODI3LjkxIixudWxsLDEsbnVsbCwiIixbWyJBbmRyb2lkIFdlYlZpZXciLCIxNDkuMC43ODI3LjkxIl0sWyJDaHJvbWl1bSIsIjE0OS4wLjc4MjcuOTEiXSxbIk5vdClBO0JyYW5kIiwiMjQuMC4wLjAiXV0sMF0.&amp;dt=1781796031845&amp;bpp=4&amp;bdt=73&amp;idt=69&amp;shv=r20260612&amp;mjsv=m202606150101&amp;ptt=9&amp;saldr=aa&amp;abxe=1&amp;cookie_enabled=1&amp;eoidce=1&amp;nras=1&amp;correlator=2704003872182&amp;frm=20&amp;pv=2&amp;u_tz=420&amp;u_his=5&amp;u_h=800&amp;u_w=360&amp;u_ah=800&amp;u_aw=360&amp;u_cd=24&amp;u_sd=2&amp;dmc=4&amp;adx=-12245933&amp;ady=-12245933&amp;biw=360&amp;bih=643&amp;scr_x=0&amp;scr_y=0&amp;eid=42533293%2C95340253%2C95340255&amp;oid=2&amp;pvsid=5971089237311107&amp;tmod=453169476&amp;uas=0&amp;nvt=7&amp;fsapi=1&amp;fc=1920&amp;brdim=0%2C0%2C0%2C0%2C360%2C0%2C360%2C643%2C360%2C643&amp;vis=1&amp;rsz=%7C%7Cs%7C&amp;abl=NS&amp;fu=32768&amp;bc=31&amp;bz=1&amp;ifi=1&amp;uci=a!1&amp;fsb=1&amp;dtd=146" data-google-container-id="a!1" tabindex="0" title="Advertisement" aria-label="Advertisement" data-load-complete="true"></iframe>
   </div></ins>
  <iframe id="google_esf" name="google_esf" src="https://googleads.g.doubleclick.net/pagead/html/r20260612/r20190131/zrt_lookup_fy2021.html" style="display: none;"></iframe>
 </body>
</html>
