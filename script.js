const API_KEY = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjMyY2I4ZDJiLTNjNjctNGQ3MS05MmY5LWZlZWNlZjM1ZTFlYyIsImlhdCI6MTc0OTgxNzkxMSwic3ViIjoiZGV2ZWxvcGVyLzE4NzViYmJiLTJmNWEtYTA4Mi04M2VmLTRiYzMyMmM2OGQ3YiIsInNjb3BlcyI6WyJicmF3bHN0YXJzIl0sImxpbWl0cyI6W3sidGllciI6ImRldmVsb3Blci9zaWx2ZXIiLCJ0eXBlIjoidGhyb3R0bGluZyJ9LHsiY2lkcnMiOlsiMTg1LjE5OS4xMTAuMTUzIl0sInR5cGUiOiJjbGllbnQifV19.07r1JBJDplpQWR_Hwq_Wt1lC4kZKZfdWoRQAtjSQHy-_OO1JrFQNNlasmdTNQZPyNrgEjAi1VMhxAGH0HvkC5A';
let selectedGems = 0;

function selectPack(gems) {
    selectedGems = gems;
    
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
        }, 50);
    }, 500);
    
    document.getElementById('userInfo').style.display = 'none';
}

async function verifyUser() {
    const userId = document.getElementById('userId').value.trim();
    if (!userId) {
        alert('Please enter your Brawl Stars ID');
        return;
    }

    try {        const response = await fetch(`proxy.php?player_id=${userId.replace('#', '')}`);

        if (!response.ok) {
            throw new Error('Player not found');
        }

        const data = await response.json();
        displayPlayerInfo(data);
    } catch (error) {
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
            </div>
            <div class="stat-item gems-stat">
                <span class="stat-icon">💎</span>
                <div class="stat-info">
                    <span class="stat-label">Selected Pack</span>
                    <span class="stat-value">${selectedGems} gems</span>
                </div>
            </div>
        </div>
        <button class="continue-button" onclick="showCPATasks()">
            <span class="button-icon">🎮</span>
            Continue to Get Gems
        </button>
    `;
    document.getElementById('userInfo').style.display = 'block';
}

function showCPATasks() {
    document.getElementById('cpaTasksContainer').style.display = 'block';
    
    // Force CPA Locker to reinitialize
    if (typeof CPABuildLock === 'function') {
        CPABuildLock();
    }
    
    // Scroll to tasks
    window.scrollTo({
        top: document.getElementById('cpaTasksContainer').offsetTop,
        behavior: 'smooth'
    });
    
    // Add a loading animation while tasks initialize
    document.querySelector('.cpa-loader').innerHTML = `
        <div style="padding: 20px; text-align: center;">
            <p>Loading tasks...</p>
            <div class="loading-spinner"></div>
        </div>
    `;
}
