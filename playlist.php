<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <title>Playlists</title>
      <script src="https://kit.fontawesome.com/12a41c30dd.js" crossorigin="anonymous"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="playlist.css">
</head>
<body>
      <!-- Header Section  -->

      <header>
            <nav class="navbar">
                  <div id="navbar" style="padding: 0px;">
                        <div class="navbar-left">
                              <ul>
                              <li><a href="profil.php" onclick="toggleProfilePage()">
                                    <span style="margin-right: 2px;">Profil</span>
                                    <i class="fas fa-user-circle"></i>
                              </a></li>   
                              <li id="zenek"><a href="index.php" style="display: flex; align-items: center; margin-right: 4px;">
                                    <span style="margin-right: 3px;">Főmenü</span>
                                    <i class="fa fa-solid fa-music"></i>
                              </a></li>  
                              <li id="zenek"><a href="#" style="display: flex; align-items: center; margin-right: 4px;">
                                    <span style="margin-right: 3px;">Lejátszási Listáim</span>
                                    <i class="fa-solid fa-bars"></i>
                              </a></li>   
                              </ul>
                        </div>
                        
                        <div class="search-container trans-bg">
                              <form action="#" class="from1">
                              <input type="text" class="search-bar" placeholder="Keresés..">
                              <button type="submit"><i class="fa fa-search search-icon"></i></button>
                              </form>
                        </div>
                        <div class="navbar-right">
                        <?php require "isLoggedIn.php"; if(!isLoggedIn()){ echo "<button class='button' style='margin-right: 25px;' onclick='bejelentkezes()'>Bejelentkezés</button>";}else{echo "<button class='button' style='margin-right: 25px;' onclick='kijelentkezes()'>Kijelentkezés</button>";} ?>
                        </div>
                  </div>
            </nav>
      </header>   
      
      <!-- Main Section  -->

      <main>
            <aside class="aside section-2" style="border-right: 5px solid rgb(17, 17, 102); padding: 12px;">
                  <h1 class="heading-text inline" onclick="hidePlaylistItem(event)">Lejátszási Listáid <i class="toggleIcon fa-solid fa-minus" style="float: right; margin-top: 2%; font-size: 26px; cursor: pointer;"></i></h1>
                  <div class="playlist">
                        <div class="playlist-item">
                              <div class="grid-container">
                                    <div class="grid-item">
                                          <img src="images/End Game.jpg" alt="">
                                          <div class="lejnev">Lejátszási lista 1</div>
                                    </div>
                              </div>  
                        </div>
                  </div>
            </aside>

            <aside class="section-1">
                  <h1 class="playlist-name">Kiválasztott lejátszási lista neve</h1>
                  <button class="play-button" onclick="playAll()">Összes Lejátszása</button>
                  <div class="menusong">
                        <li class="songitem">
                              <span>1</span>
                              <img src="images/End Game.jpg" alt="">
                              <h5>End Game <br>
                                    <div class="subtitle">Taylor Swift</div>
                              </h5>
                              <p>Pop Zene</p>
                              <p>2023.12.18</p>
                              <i class="fa-regular heartList fa-heart" onclick="toggleHeart(this)"></i>
                              <div class="idotartam">3:33</div>
                              <i class="fa-solid fa-ellipsis more"></i>
                        </li>
                        <li class="songitem">
                              <span>1</span>
                              <img src="images/End Game.jpg" alt="">
                              <h5>End Game <br>
                                    <div class="subtitle">Taylor Swift</div>
                              </h5>
                              <p>Pop Zene</p>
                              <p>2023.12.18</p>
                              <i class="fa-regular heartList fa-heart" onclick="toggleHeart(this)"></i>
                              <div class="idotartam">3:33</div>
                              <i class="fa-solid fa-ellipsis more"></i>
                        </li>
                  </div>
            </aside>
      </main>

      <!-- Footer:- Music Palyer Controls  -->

      <footer>
            <div class="play-song-info trans-bg">
                  <div class="con-left trans-bg">
                        <div class="footer-img">
                              <img class="small-img inline-block" src="images/End Game.jpg" alt=""> 
                        </div>
                        <div class="trans-bg">
                              <div class="font-mid trans-bg">End Game</div>
                              <p class="trans-bg">Taylor Swift</p>
                        </div> 
                  </div>    
                  <div class="con-right trans-bg side-margin-4px">
                        <i class="fa-solid fa-ban" style="cursor: pointer;"></i>
                        <div class="heartIcon"><i class="fa-regular fa-heart" style="cursor: pointer;" onclick="toggleHeart(this)"></i></div>
                  </div>
            </div>

            <audio id="audioPlayer" controls style="display: none;"></audio>

            <div class="player trans-bg">
                <div class="buttons">
                    <div class="random-track" onclick="toggleRandom()">
                        <i class="fa-solid fa-shuffle" title="random"></i>
                    </div>
                    
                    <div class="prev-track" onclick="playPreviousTrack()">
                        <i class="fa-solid fa-backward-step"></i>
                    </div>

                    <div class="playpause-track" onclick="handlePlayPause()">
                        <i id="playPauseButton" class="fa-solid fa-play"></i>
                    </div>

                    <div class="next-track" onclick="playNextTrack()">
                        <i class="fa-solid fa-forward-step"></i>
                    </div>

                    <div class="repeat-track" id="repeatButton">
                        <i class="fa-solid fa-arrow-rotate-right" title="repeat"></i>
                    </div>
                </div>
                <div class="slider_container">
                    <div class="current-time">00:00</div>
                    <input type="range" min="1" max="100" value="0" class="seek_slider">
                    <div class="total-duration">00:00</div>
                </div>
            </div>
            <div class="extras trans-bg">
                <div class="slider_container">
                    <i class="fa fa-volume-down"></i>
                    <input type="range" min="1" max="100" value="99" class="volume_slider" id="volumeSlider">
                    <i class="fa fa-volume-up"></i>
                </div>
                <div></div>
            </div>
      </footer>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

      <script>
            function bejelentkezes()
            {
            window.location.href = "regbej.php";
            }

            function hidePlaylistItem(event) {
            var clickedElement = event.target;

            if (clickedElement.classList.contains("toggleIcon")) {
                  var playlistItem = clickedElement.parentElement.nextElementSibling;
                  var icon = clickedElement;

                  if (icon.classList.contains("fa-minus")) {
                        icon.classList.remove("fa-minus");
                        icon.classList.add("fa-plus");
                        playlistItem.style.display = "none";
                  } else {
                        icon.classList.remove("fa-plus");
                        icon.classList.add("fa-minus");
                        playlistItem.style.display = "block";
                  }
            }
            }

            function toggleHeart(event) {
                  if (event.classList.contains("fa-regular")) {
                        event.classList.remove("fa-regular");
                        event.classList.add("fa-solid");
                  } else {
                        event.classList.remove("fa-solid");
                        event.classList.add("fa-regular");
                  }
            }   

            function handlePlayPause(event) {
                  if (event.classList.contains("fa-play")) {
                  event.classList.remove("fa-play");
                  event.classList.add("fa-pause");
                  } else {
                  event.classList.remove("fa-pause");
                  event.classList.add("fa-play");
                  }
            }

            function playSelectedSong(title, artist, filename) {
                var audioPlayer = document.getElementById('audioPlayer');
                var playPauseButton = document.getElementById('playPauseButton');

                var isPlaying = !audioPlayer.paused;

                var musicFolderPath = 'music/';
                var musicUrl = musicFolderPath + filename;
                audioPlayer.src = musicUrl;

                var songInfo = document.createElement('div');
                songInfo.innerHTML = '<div class="font-mid trans-bg">' + title + '</div><p class="trans-bg">' + artist + '</p>';
                document.querySelector('.footer-img').innerHTML = songInfo.innerHTML;

                if (isPlaying) {
                    audioPlayer.play();
                } else {
                    playPauseButton.classList.remove("fa-pause");
                    playPauseButton.classList.add("fa-play");
                }
            }

            function handlePlayPause() {
                var audioPlayer = document.getElementById('audioPlayer');
                var playPauseButton = document.getElementById('playPauseButton');

                if (audioPlayer.paused) {
                    playPauseButton.classList.remove("fa-play");
                    playPauseButton.classList.add("fa-pause");
                    audioPlayer.play();
                } else {
                    playPauseButton.classList.remove("fa-pause");
                    playPauseButton.classList.add("fa-play");
                    audioPlayer.pause();
                }
            }

            var currentSongIndex = 0;
            var playlistSongs = <?php echo json_encode($playlistSongs); ?>;

            function playPreviousTrack() {
                if (isShuffleActive) {
                    currentSongIndex = Math.floor(Math.random() * shuffledPlaylist.length);
                    playSelectedSong(shuffledPlaylist[currentSongIndex].Title, shuffledPlaylist[currentSongIndex].Author, shuffledPlaylist[currentSongIndex].filename);
                } else {
                    if (currentSongIndex > 0) {
                        currentSongIndex--;
                    } else {
                        currentSongIndex = playlistSongs.length - 1;
                    }
                    playSelectedSong(playlistSongs[currentSongIndex].Title, playlistSongs[currentSongIndex].Author, playlistSongs[currentSongIndex].filename);
                }

                var audioPlayer = document.getElementById('audioPlayer');
                var playPauseButton = document.getElementById('playPauseButton');
                playPauseButton.classList.remove("fa-play");
                playPauseButton.classList.add("fa-pause");
                audioPlayer.play();
            }

            var playlistSongs = <?php echo json_encode($playlistSongs); ?>;
            var currentSongIndex = 0;
            var shuffledPlaylist = []; 
            var isShuffleActive = false; 

            function shufflePlaylist() {
                shuffledPlaylist = [...playlistSongs];
                for (let i = shuffledPlaylist.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [shuffledPlaylist[i], shuffledPlaylist[j]] = [shuffledPlaylist[j], shuffledPlaylist[i]];
                }
            }

            function toggleRandom() {
                var randomButton = document.querySelector('.random-track');

                if (!isShuffleActive) {
                    isShuffleActive = true;
                    shufflePlaylist();
                    randomButton.classList.add("active"); 
                } else {
                    isShuffleActive = false;
                    shuffledPlaylist = [];
                    randomButton.classList.remove("active"); 
                }
            }

            function playNextTrack() {
                if (isShuffleActive) {
                    currentSongIndex = Math.floor(Math.random() * shuffledPlaylist.length);
                    playSelectedSong(shuffledPlaylist[currentSongIndex].Title, shuffledPlaylist[currentSongIndex].Author, shuffledPlaylist[currentSongIndex].filename);
                } else {
                    if (currentSongIndex < playlistSongs.length - 1) {
                        currentSongIndex++;
                    } else {
                        currentSongIndex = 0;
                    }
                    playSelectedSong(playlistSongs[currentSongIndex].Title, playlistSongs[currentSongIndex].Author, playlistSongs[currentSongIndex].filename);
                }

                var audioPlayer = document.getElementById('audioPlayer');
                var playPauseButton = document.getElementById('playPauseButton');
                playPauseButton.classList.remove("fa-play");
                playPauseButton.classList.add("fa-pause");
                audioPlayer.play();
            }


            function updateSeekBar() {
                var audioPlayer = document.getElementById('audioPlayer');
                var seekSlider = document.querySelector('.seek_slider');
                var currentTimeElement = document.querySelector('.current-time');
                var totalDurationElement = document.querySelector('.total-duration');

                var currentTime = audioPlayer.currentTime;
                var totalDuration = audioPlayer.duration;

                if (!isNaN(totalDuration)) {
                    currentTimeElement.textContent = formatTime(currentTime);
                    totalDurationElement.textContent = formatTime(totalDuration);

                    var seekPercentage = (currentTime / totalDuration) * 100;
                    seekSlider.value = seekPercentage;
                }
            }


            function formatTime(seconds) {
                var minutes = Math.floor(seconds / 60);
                var remainingSeconds = Math.floor(seconds % 60);

                var formattedTime = minutes + ":" + (remainingSeconds < 10 ? "0" : "") + remainingSeconds;
                return formattedTime;
            }

            document.addEventListener("DOMContentLoaded", function () {
                var audioPlayer = document.getElementById('audioPlayer');
                var playPauseButton = document.getElementById('playPauseButton');

                audioPlayer.addEventListener('ended', function () {
                    playNextTrack(); // Call the function to play the next track
                });

                var volumeSlider = document.getElementById("volumeSlider");
                volumeSlider.addEventListener("input", function () {
                    var volume = volumeSlider.value / 100;
                    audioPlayer.volume = volume;
                });

                var seekSlider = document.querySelector('.seek_slider');
                seekSlider.addEventListener('input', function () {
                    var seekPercentage = seekSlider.value;
                    var newTime = (seekPercentage * audioPlayer.duration) / 100;
                    audioPlayer.currentTime = newTime;
                });

                audioPlayer.addEventListener('timeupdate', function () {
                    updateSeekBar();
                });
            });

            function replayTrack() {
                var audioPlayer = document.getElementById('audioPlayer');
                var playPauseButton = document.getElementById('playPauseButton');
                audioPlayer.currentTime = 0;

                if (audioPlayer.paused) {
                    playPauseButton.classList.remove("fa-play");
                    playPauseButton.classList.add("fa-pause");
                    audioPlayer.play();
                }
            }

            document.addEventListener("DOMContentLoaded", function () {
                var replayButton = document.querySelector('.repeat-track');
                replayButton.addEventListener('click', function () {
                    replayTrack();
                });
            });       

            localStorage.setItem('currentSongIndex', JSON.stringify(currentSongIndex));
            localStorage.setItem('isShuffleActive', JSON.stringify(isShuffleActive));

            var storedCurrentSongIndex = JSON.parse(localStorage.getItem('currentSongIndex'));
            var storedIsShuffleActive = JSON.parse(localStorage.getItem('isShuffleActive'));

            currentSongIndex = storedCurrentSongIndex;
            isShuffleActive = storedIsShuffleActive;
      </script>
</body>
</html>