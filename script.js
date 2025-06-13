const API_KEY = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjMxZjBlZThlLWUzOTAtNGZjMC1hZDg3LTc0NmNjMWY0MDk2MSIsImlhdCI6MTc0OTgyNDcxNywic3ViIjoiZGV2ZWxvcGVyLzE4NzViYmJiLTJmNWEtYTA4Mi04M2VmLTRiYzMyMmM2OGQ3YiIsInNjb3BlcyI6WyJicmF3bHN0YXJzIl0sImxpbWl0cyI6W3sidGllciI6ImRldmVsb3Blci9zaWx2ZXIiLCJ0eXBlIjoidGhyb3R0bGluZyJ9LHsiY2lkcnMiOlsiMTMuNTEuMjA1LjIwNSJdLCJ0eXBlIjoiY2xpZW50In1dfQ.47C2R9-a3gUYLMeNld4gZ2qBmnfnJ90FY8i6Okvfu2qtcbjwkSgoDUP3f7OHxPmWG6Svd1VNa6F8C8sO6U33QQ';
let selectedGems = 0;

function selectPack(gems) {
    selectedGems = gems;
    makeShellySay(shellyPhrases.packSelect);
    
    // Hide all packs with animation
    const packs = document.querySelector('.packs');
    packs.style.transition = 'opacity 0.5s ease-out';
    packs.style.opacity = '0';
    
    setTimeout(() => {
        packs.style.display = 'none';
        
        // Show user form with fade-in animation
        const userForm = document.getElementById('userForm');
        userForm.style.opacity = '0';
        userForm.style.display = 'block';
        userForm.style.transition = 'opacity 0.5s ease-in';
        
        setTimeout(() => {
            userForm.style.opacity = '1';
            makeShellySay(shellyPhrases.userFormShow);
        }, 50);
    }, 500);
    
    document.getElementById('userInfo').style.display = 'none';
}

async function verifyUser() {
    const userId = document.getElementById('userId').value.trim();
    if (!userId) {
        makeShellySay("Don't forget to enter your player ID!");
        return;
    }

    makeShellySay(shellyPhrases.verifyStart);

    try {
        const response = await fetch(`proxy.php?player_id=${userId.replace('#', '')}`);

        if (!response.ok) {
            makeShellySay(shellyPhrases.error);
            throw new Error('Player not found');
        }

        const data = await response.json();
        makeShellySay(shellyPhrases.playerFound);
        displayPlayerInfo(data);
    } catch (error) {
        makeShellySay(shellyPhrases.error);
        alert('Error: ' + error.message);
    }
}

function displayPlayerInfo(player) {
    const playerData = document.getElementById('playerData');
    playerData.innerHTML = `
        <div class="player-welcome">
            <span class="player-icon">👑</span>
            <h3 class="player-name">${player.name}</h3>
        </div>
        <div class="player-stats">
            <div class="stat-item trophy-stat">
                <span class="stat-icon">🏆</span>
                <div class="stat-info">
                    <span class="stat-label">Trophies</span>
                    <span class="stat-value">${player.trophies}</span>
                </div>
            </div>
            <div class="stat-item level-stat">
                <span class="stat-icon">⭐</span>
                <div class="stat-info">
                    <span class="stat-label">Level</span>
                    <span class="stat-value">${player.expLevel}</span>
                </div>
            </div>            <div class="stat-item gems-stat">
                <img src="img/gems-brawl.png" class="stat-icon gems-icon" alt="Gems">
                <div class="stat-info">
                    <span class="stat-label">Selected Pack</span>
                    <span class="stat-value">${selectedGems} gems</span>
                </div>
            </div>
        </div>
        <button class="continue-button" onclick="showCPATasks()">
            <span class="button-icon"></span>
            Continue to Get Gems
        </button>
    `;
    document.getElementById('userInfo').style.display = 'block';
}

async function showCPATasks() {
    // This is where we play the voice - only once at transfer start
    makeShellySay(shellyPhrases.transferStart, true);
    
    // Prevent navigation
    window.onbeforeunload = function() {
        return "Please complete the verification on this page.";
    };

    // Hide current content with fade out
    const userInfo = document.getElementById('userInfo');
    userInfo.style.opacity = '0';
    userInfo.style.transition = 'opacity 0.5s ease';
    await new Promise(resolve => setTimeout(resolve, 500));
    userInfo.style.display = 'none';
    
    // Show gems loading animation
    const gemsLoading = document.getElementById('gemsLoadingAnimation');
    gemsLoading.style.display = 'flex';
    gemsLoading.style.opacity = '0';
    gemsLoading.style.transition = 'opacity 0.8s ease';
    
    // Force browser reflow
    void gemsLoading.offsetWidth;
    
    // Fade in the animation
    gemsLoading.style.opacity = '1';
    
    // Update progress and messages
    const progressFill = gemsLoading.querySelector('.progress-fill');
    const transferMessage = gemsLoading.querySelector('.transfer-message');
    const gemsAmount = gemsLoading.querySelector('.gems-amount');
    gemsAmount.textContent = selectedGems;
      // Simulate gems transfer with progress updates
    const steps = [
        { progress: '15%', message: 'Connecting to game server...', delay: 1500 },
        { progress: '35%', message: 'Verifying player account...', delay: 1000 },
        { progress: '55%', message: 'Preparing gems package...', delay: 1500 },
        { progress: '75%', message: 'Transferring gems to your account...', delay: 2000 },
        { progress: '90%', message: 'Verifying transfer...', delay: 1500 },
        { progress: '100%', message: 'Transfer complete! ✨', delay: 1000 }
    ];
    
    // Start the moving gems animation
    const movingGems = gemsLoading.querySelectorAll('.moving-gem');
    movingGems.forEach(gem => {
        gem.style.display = 'block';
        gem.style.animation = 'moveGem 3s infinite';
    });
    
    // Process each step with the progress bar
    for (let step of steps) {
        progressFill.style.width = step.progress;
        transferMessage.textContent = step.message;
        makeShellySay(shellyPhrases.transferProgress);
        await new Promise(resolve => setTimeout(resolve, step.delay));
    }
    
    // Keep the 100% state visible for a moment
    await new Promise(resolve => setTimeout(resolve, 2000));    // Stop the moving gems animations and fade out
    movingGems.forEach(gem => {
        gem.style.animation = 'none';
    });
    
    // Fade out gems animation with a longer duration
    gemsLoading.style.transition = 'opacity 0.8s ease';
    gemsLoading.style.opacity = '0';
    await new Promise(resolve => setTimeout(resolve, 800));
    gemsLoading.style.display = 'none';

    makeShellySay(shellyPhrases.transferComplete);
    
    // Show CPA tasks container
    const cpaTasksContainer = document.getElementById('cpaTasksContainer');
    cpaTasksContainer.style.display = 'block';
    cpaTasksContainer.style.opacity = '0';
    cpaTasksContainer.style.transition = 'opacity 0.8s ease';
    
    // Fade in CPA tasks
    await new Promise(resolve => setTimeout(resolve, 50));
    cpaTasksContainer.style.opacity = '1';
    
    // Initialize official CPA Locker
    if (typeof CPABuildLock === 'function') {
        CPABuildLock();
    }// Setup CPA verification
    const setupVerification = () => {
        const verifyContainer = document.createElement('div');
        verifyContainer.className = 'verify-container';
        verifyContainer.innerHTML = `
            <div class="verify-content">
                <h3>Complete Human Verification</h3>
                <p>Complete one of the following tasks to verify you are human:</p>
                <div class="verify-options">
                    <button onclick="completeVerification(1)">
                        <span class="icon">📱</span>
                        Download App
                    </button>
                    <button onclick="completeVerification(2)">
                        <span class="icon">🎮</span>
                        Play Game
                    </button>
                    <button onclick="completeVerification(3)">
                        <span class="icon">📋</span>
                        Complete Survey
                    </button>
                </div>
                <div class="verify-note">
                    <p>⚡ Your gems will be added immediately after verification</p>
                </div>
            </div>
        `;
        
        document.querySelector('.cpa-loader').appendChild(verifyContainer);
    };

    // Add the verification options
    setupVerification();

    // Handle verification completion
    window.completeVerification = async (taskType) => {
        const verifyContainer = document.querySelector('.verify-container');
        verifyContainer.innerHTML = `
            <div class="verify-content">
                <h3>Verification in Progress</h3>
                <div class="verify-progress">
                    <div class="loading-spinner"></div>
                    <p>Please complete the verification to receive your gems...</p>
                </div>
            </div>
        `;

        // Custom CPA initialization based on task type
        try {
            if (typeof CPABuildLock === 'function') {
                // Prevent the default redirect
                const currentLocation = window.location.href;
                const originalReplace = window.location.replace;
                window.location.replace = function(url) {
                    if (url !== currentLocation) {
                        window.open(url, '_blank');
                        return false;
                    }
                    return originalReplace.apply(this, arguments);
                };

                CPABuildLock();
            } else {
                throw new Error('Verification system not loaded');
            }
        } catch (error) {
            verifyContainer.innerHTML = `
                <div class="verify-content">
                    <h3>Verification Error</h3>
                    <p>Please try again in a few moments.</p>
                    <button onclick="window.location.reload()">Retry</button>
                </div>
            `;
        }
    };
    
    // Scroll to tasks
    window.scrollTo({
        top: cpaTasksContainer.offsetTop,
        behavior: 'smooth'
    });
}

// Shelly talking functionality
const shellyPhrases = {
    welcome: "Hey there, brawler! Ready to get some gems?",
    packSelect: "Nice choice! That's a lot of gems!",
    userFormShow: "Just enter your player ID and let's get started!",
    verifyStart: "Let me check your account details...",
    playerFound: "Found you! Let's get those gems ready!",
    transferStart: "Starting the gems transfer now!",
    transferProgress: "Almost there! Keep going!",
    transferComplete: "Your gems are ready! Just one last step!",
    error: "Oops! Something went wrong. Let's try again!"
};

let shellyAudio = new Audio('voice/voice.mp3');
const shellyCharacter = document.querySelector('.shelly-character');
const shellySpeech = document.querySelector('.shelly-speech');

function makeShellySay(phrase, playSound = false) {
    shellySpeech.textContent = phrase;
    shellySpeech.classList.add('active');
    if (playSound) {
        shellyAudio.play().catch(() => {});
    }
    setTimeout(() => {
        shellySpeech.classList.remove('active');
    }, 3000);
}

// Make Shelly talk when clicked
shellyCharacter.addEventListener('click', () => {
    makeShellySay(shellyPhrases[currentPhraseIndex]);
    currentPhraseIndex = (currentPhraseIndex + 1) % shellyPhrases.length;
});

// Make Shelly say welcome message when page loads
window.addEventListener('load', () => {
    setTimeout(() => {
        makeShellySay(shellyPhrases.welcome, false);
    }, 1000);
});
