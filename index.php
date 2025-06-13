<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brawl Stars Gems</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <style>
        .container {
            background: rgba(255, 255, 255, 0.1);
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

        .pack.mega {
        }

        .pack.legendary::before {
            display: none;
        }

        .pack.legendary {
            animation: rainbow 3s linear infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }

        @keyframes rainbow {
            0% { filter: hue-rotate(0deg); }
            25% { filter: hue-rotate(90deg); }
            50% { filter: hue-rotate(180deg); }
            75% { filter: hue-rotate(270deg); }
            100% { filter: hue-rotate(360deg); }
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
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
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
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-4px); }
            60% { transform: translateY(-2px); }
        }

        .user-form, .user-info, .loading-animation, .gems-loading-animation, .cpa-tasks {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .user-form h2, .user-info h2 {
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
        }

        @media (max-width: 768px) {
            .packs {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 8px;
                padding: 10px;
            }
            
            .title-animated {
                font-size: 1.8rem;
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
    </style>
    <section class="parent">
        <div class="container">
            <div class="gems-packs">
                <h1 class="title-animated">Select Your Free Gems Pack</h1>
                <div class="packs">
                    <div class="pack" data-gems="80" onclick="selectPack(80)">
                        <div class="pack-content">
                            <div class="gems-image">
                                <img src="img/gems-brawl.png" alt="Gems Pack">
                            </div>
                            <h3>80 Gems</h3>
                            <p class="pack-description">Starter Pack</p>
                            <div class="price-container">
                                <span class="original-price">$0.99</span>
                                <span class="free-label">Free</span>
                            </div>
                            <div class="promo-badge">-100%</div>
                        </div>
                    </div>                    <div class="pack" data-gems="170" onclick="selectPack(170)">
                        <div class="pack-content">
                            <div class="gems-image">
                                <img src="img/gems-brawl.png" alt="Gems Pack">
                            </div>
                            <h3>170 Gems</h3>
                            <p class="pack-description">Advanced Pack</p>
                            <div class="price-container">
                                <span class="original-price">$1.99</span>
                                <span class="free-label">Free</span>
                            </div>
                            <div class="promo-badge">-100%</div>
                        </div>
                    </div>                    <div class="pack featured" data-gems="360" onclick="selectPack(360)">
                        <div class="pack-content">
                            <div class="gems-image">
                                <img src="img/gems-brawl.png" alt="Gems Pack">
                            </div>
                            <h3>360 Gems</h3>
                            <p class="pack-description">Pro Pack</p>
                            <div class="price-container">
                                <span class="original-price">$4.99</span>
                                <span class="free-label">Free</span>
                            </div>
                            <div class="promo-badge">HOT!</div>
                        </div>
                    </div>                    <div class="pack" data-gems="530" onclick="selectPack(530)">
                        <div class="pack-content">
                            <div class="gems-image">
                                <img src="img/gems-brawl.png" alt="Gems Pack">
                            </div>
                            <h3>530 Gems</h3>
                            <p class="pack-description">Elite Pack</p>
                            <div class="price-container">
                                <span class="original-price">$9.99</span>
                                <span class="free-label">Free</span>
                            </div>
                            <div class="promo-badge">-100%</div>
                        </div>
                    </div>                   
                       <div class="pack mega" data-gems="800" onclick="selectPack(800)">
                        <div class="pack-content">
                            <div class="gems-image">
                                <img src="img/gems-brawl.png" alt="Gems Pack">
                            </div>
                            <h3>800 Gems</h3>
                            <p class="pack-description">Mega Pack</p>
                            <div class="price-container">
                                <span class="original-price">$14.99</span>
                                <span class="free-label">Free</span>
                            </div>
                            <div class="promo-badge">MEGA!</div>
                        </div>
                    </div>                    <div class="pack legendary" data-gems="1200" onclick="selectPack(1200)">
                        <div class="pack-content">
                            <div class="gems-image">
                                <img src="img/gems-brawl.png" alt="Gems Pack">
                            </div>
                            <h3>1200 Gems</h3>
                            <p class="pack-description">Legendary Pack</p>
                            <div class="price-container">
                                <span class="original-price">$24.99</span>
                                <span class="free-label">Free</span>
                            </div>
                            <div class="promo-badge">EPIC!</div>
                        </div>
                    </div>
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
        </div>    </section>

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