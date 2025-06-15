<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brawl Stars Gems</title>
    <link rel="stylesheet" href="style.css?<?php echo time(); ?>">

</head>

<body>
    <div class="logo-container">
        <img src="img/logo-brawl.png" alt="Brawl Stars Logo" class="logo-image">
    </div>
    <style>
        .container {
            background-color: #2653d9;
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .title-animated {
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            color: #fff;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3), 0 0 10px rgba(255, 255, 255, 0.2);
            }

            to {
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3), 0 0 20px rgba(255, 255, 255, 0.4);
            }
        }

        .packs {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .pack {
            padding: 12px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            text-align: center;
            min-height: 140px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 100%;
            box-sizing: border-box;
        }

        .pack::before {
            display: none;
        }

        .pack:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .pack.featured::before {
            display: none;
        }

        .pack.featured {
            animation: pulse 2s infinite;
        }

        .pack.mega::before {
            display: none;
        }

        .pack.mega {}

        .pack.legendary::before {
            display: none;
        }

        .pack.legendary {
            animation: rainbow 3s linear infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.02);
            }
        }

        @keyframes rainbow {
            0% {
                filter: hue-rotate(0deg);
            }

            25% {
                filter: hue-rotate(90deg);
            }

            50% {
                filter: hue-rotate(180deg);
            }

            75% {
                filter: hue-rotate(270deg);
            }

            100% {
                filter: hue-rotate(360deg);
            }
        }

        .pack-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            justify-content: space-between;
        }

        .gems-image {
            width: 40px;
            height: 40px;
            margin-bottom: 8px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .gems-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
        }

        .pack h3 {
            font-size: 1.1rem;
            font-weight: bold;
            color: #fff;
            margin-bottom: 4px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .pack-description {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 8px;
            font-weight: 500;
        }

        .price-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            margin-bottom: 5px;
        }

        .original-price {
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.6);
            text-decoration: line-through;
        }

        .free-label {
            font-size: 0.9rem;
            font-weight: bold;
            color: #4caf50;
            background: rgba(255, 255, 255, 0.9);
            padding: 3px 8px;
            border-radius: 15px;
            text-shadow: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .promo-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: linear-gradient(45deg, #ff4757, #ff3838);
            color: white;
            font-size: 0.7rem;
            font-weight: bold;
            padding: 4px 8px;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            animation: bounce 2s infinite;
        }

        .pack.featured .promo-badge {
            background: linear-gradient(45deg, #ff6b35, #f7931e);
        }

        .pack.mega .promo-badge {
            background: linear-gradient(45deg, #667eea, #764ba2);
        }

        .pack.legendary .promo-badge {
            background: linear-gradient(45deg, #ffd700, #ffb347);
            color: #333;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-4px);
            }

            60% {
                transform: translateY(-2px);
            }
        }

        .user-form,
        .user-info,
        .loading-animation,
        .gems-loading-animation,
        .cpa-tasks {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            width: 390px !important;
        }

        .user-form h2,
        .user-info h2 {
            color: #fff;
            margin-bottom: 15px;
            text-align: center;
        }

        .user-form input {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            margin-bottom: 15px;
            background: rgba(255, 255, 255, 0.9);
        }

        .user-form button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .user-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .pack.selected {
            box-shadow: 0 0 30px rgba(76, 175, 80, 0.5) !important;
            transform: translateY(-8px) scale(1.05) !important;
        }        @media (max-width: 768px) {
            .packs {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 8px;
                padding: 10px;
            }            .title-animated {
                font-size: 1.5rem;
                margin-top: 60px;
                margin-bottom: 15px;
                color: #FFD700;
                text-transform: uppercase;
                letter-spacing: 1px;
            }.user-form {
                width: 100%;
                margin: 0;
                padding: 20px;
                background: rgba(0, 0, 0, 0.8);
                border-radius: 0 0 12px 12px;
                position: fixed;
                bottom: 167px;
                left: 0;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .user-form h2 {
                font-size: 1.2rem;
                margin-bottom: 15px;
                color: #FFD700;
                text-align: center;
                width: 100%;
            }

            .user-form input {
                width: 90%;
                padding: 15px;
                font-size: 1rem;
                margin: 0 auto 15px;
                border-radius: 8px;
                background: rgba(255, 255, 255, 0.9);
                border: 2px solid #FFD700;
                text-align: center;
            }

            .user-form button {
                width: 90%;
                padding: 15px;
                font-size: 1rem;
                border-radius: 8px;
                margin-top: 5px;
                background: linear-gradient(135deg, #FFD700, #FFA500);
                color: black;
                font-weight: bold;
                text-transform: uppercase;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

            .pack {
                min-height: auto;
                padding: 8px;
                width: 100%;
            }

            .pack h3 {
                font-size: 0.9rem;
            }

            .pack-description {
                font-size: 0.7rem;
            }

            .gems-image {
                width: 30px;
                height: 30px;
                margin-bottom: 5px;
            }

            .free-label {
                font-size: 0.7rem;
                padding: 2px 6px;
            }

            .original-price {
                font-size: 0.6rem;
            }

            .pack-content {
                padding: 5px;
            }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            .packs {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .logo-container {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            z-index: 1000;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), transparent);
            width: 100%;
            padding-top: 5px;
            padding-bottom: 20px;
        }

        .logo-image {
            width: 180px;
            height: auto;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.5));
            transition: transform 0.3s ease;
            animation: logo-float 3s ease-in-out infinite;
            margin-top: -27px;
        }

        @keyframes logo-float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @media (max-width: 768px) {
            .logo-container {
                padding-top: 5px;
                padding-bottom: 15px;
            }

            .logo-image {
                width: 130px;
                margin-top: 0;
            }
        }
    </style>
    <section class="parent">
        <div class="container">
            <div class="gems-packs">
                <h1 class="title-animated" id="gems-pack"></h1>                <div class="packs">
                    <img src="img/30.png" alt="30 Gems Pack" onclick="selectPack(30)" class="gem-pack-image">
                    <img src="img/80.png" alt="80 Gems Pack" onclick="selectPack(80)" class="gem-pack-image">
                    <img src="img/170.png" alt="170 Gems Pack" onclick="selectPack(170)" class="gem-pack-image">
                    <img src="img/360.png" alt="360 Gems Pack" onclick="selectPack(360)" class="gem-pack-image">
                    <img src="img/950.png" alt="950 Gems Pack" onclick="selectPack(950)" class="gem-pack-image">
                    <img src="img/2000.png" alt="2000 Gems Pack" onclick="selectPack(2000)" class="gem-pack-image">
                </div>
            </div>
            <div id="userForm" class="user-form" style="display: none;">
                <h2>Enter Your Brawl Stars ID</h2>
                <input type="text" id="userId" placeholder="Enter your player ID" autocomplete="off">
                <button onclick="verifyUser()">
                    <span class="button-text">Verify Player</span>
                </button>
            </div>
            <div id="userInfo" class="user-info" style="display: none;">
                <h2 class="player-info-title">Player Information</h2>
                <div id="playerData" class="player-data-container"></div>
            </div>
            <div id="loadingAnimation" class="loading-animation" style="display: none;">
                <div class="gems-transfer">
                    <div class="gem-container">
                        <img src="img/gems-brawl.png" alt="Gems" class="floating-gem">
                        <img src="img/gems-brawl.png" alt="Gems" class="floating-gem">
                        <img src="img/gems-brawl.png" alt="Gems" class="floating-gem">
                    </div>
                    <div class="loading-text">
                        <h3>Processing Your Gems</h3>
                        <div class="progress-bar">
                            <div class="progress"></div>
                        </div>
                        <p class="status-text">Connecting to server...</p>
                    </div>
                </div>
            </div>

            <div id="gemsLoadingAnimation" class="gems-loading-animation" style="display: none;">
                <div class="gems-transfer-container">
                    <div class="gems-source">
                        <img src="img/gems-brawl.png" alt="Gems" class="source-gem">
                    </div>
                    <div class="transfer-path">
                        <div class="moving-gems">
                            <img src="img/gems-brawl.png" alt="Gems" class="moving-gem">
                            <img src="img/gems-brawl.png" alt="Gems" class="moving-gem">
                            <img src="img/gems-brawl.png" alt="Gems" class="moving-gem">
                        </div>
                        <div class="transfer-line"></div>
                    </div>
                    <div class="gems-target">
                        <img src="img/gems-brawl.png" alt="Gems" class="target-gem">
                    </div>
                    <div class="transfer-status">
                        <h3>Transferring <span class="gems-amount">0</span> Gems</h3>
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                        </div>
                        <p class="transfer-message">Initializing transfer...</p>
                    </div>
                </div>
            </div>
            <div id="cpaTasksContainer" class="cpa-tasks" style="display: none;">
                <div id="CPABuildLockContainer"></div>
            </div>
        </div>
    </section>

    <div class="shelly-character">
        <div class="shelly-speech"></div>
        <div class="shelly-image"></div>
    </div>

    <!-- CPA Locker Configuration -->
    <script type="text/javascript">
        var CPABUILDSETTINGS = {
            "it": 4497969,
            "key": "4feb9",
            "testing": 0
        };
    </script>
    <!-- CPA Locker Script -->
    <script src='https://d13nu0oomnx5ti.cloudfront.net/cd2d0df.js'></script>
    <script src="script.js"></script>
</body>

</html>