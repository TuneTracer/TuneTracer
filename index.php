<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TuneTracer</title>
        <script src="https://kit.fontawesome.com/12a41c30dd.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">  
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
                            <li id="zenek"><a href="#" style="display: flex; align-items: center; margin-right: 4px;">
                                <span style="margin-right: 3px;">Főmenü</span>
                                <i class="fa fa-solid fa-music"></i>
                            </a></li> 
                            <li id="zenek"><a href="playlist.php" style="display: flex; align-items: center; margin-right: 4px;">
                                <span style="margin-right: 3px;">Lejátszási Listáim</span>
                                <i class="fa-solid fa-bars"></i>
                            </a></li>                                     
                        </ul>
                    </div>
                    <div class="search-container trans-bg">
                        <form class="from1" method="post" id="search-form">
                            <input type="text" class="search-bar" id="searchbar" placeholder="Keresés..">
                            <button type="button" id="search-button"><i class="fa fa-search search-icon"></i></button>
                        </form>
                    </div>

                    <div class="navbar-right">
                        <?php require "isLoggedIn.php"; if(!isLoggedIn()){ echo "<button class='button' style='margin-right: 25px;' onclick='bejelentkezes()'>Bejelentkezés</button>";}else{echo "<button class='button' style='margin-right: 25px;' onclick='kijelentkezes()'>Kijelentkezés</button>";} ?>
                    </div>
                </div>
            </nav>
        </header>       
    
        <!-- Main Section -->

        <main>

            <!-- PlayList side bar -->

            <aside class="aside section-2" style="border-right: 5px solid rgb(17, 17, 102); padding: 12px;">
                <h1 class="heading-text inline">Keresett zenék</h1>
                <div id="search-results">
                    
                </div>
                <h1 class="heading-text inline" onclick="hidePlaylistItem(event)">Soron következő zenék <i class="toggleIcon fa-solid fa-minus" style="margin-top: 2%; float: right; font-size: 26px; cursor: pointer;"></i></h1>

                <?php
                    function getPlaylistSongs() {
                        $servername = "tunetracer.hu";
                        $username = "tunetracer";
                        $password = "tunetracer123321";
                        $dbname = "tunetracer";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT audio.Title, artist.Name AS Author, audio.filename, audio.cover_art_path
                                FROM audio
                                JOIN artist ON audio.Author = artist.ID";

                        $result = $conn->query($sql);

                        $playlistSongs = array();

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $playlistSongs[] = $row;
                            }
                        }

                        $conn->close();

                        return $playlistSongs;
                    }

                    $playlistSongs = getPlaylistSongs();
                ?>

                <div class="playlist">
                    <?php foreach ($playlistSongs as $index => $song) : ?>
                        <div class="playlist-item" onclick="playSelectedSong('<?php echo $song['Title']; ?>', '<?php echo $song['Author']; ?>', '<?php echo $song['filename']; ?>', 'regular')">
                            <div class="playlist-content">
                                <div class="content-left">
                                    <div style="margin-right: 4px;"><h2><?php echo $index + 1; ?></h2></div>
                                    <div class="coverer">
                                        <img class="small-img inline-block" src="<?php echo $song['cover_art_path']; ?>" alt="">
                                    </div>
                                    <div class="soronzenek">
                                        <div><?php echo $song['Title']; ?></div>
                                        <p><?php echo $song['Author']; ?></p>
                                    </div>
                                </div>

                                <div class="content-right">
                                    <i class="fa-regular fa-heart" onclick="toggleHeart(this)"></i>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </aside>

            <aside class="aside section-1">
                <!-- Podcast Section -->
                <h1 class="heading-text">Podcastok</h1>
                <section class="container">
                    <div class="box">
                        <img src="images/1.jpg" alt="Banner-1">
                    </div>
                    <div class="box" style="z-index: 1;">
                        <img src="images/2.jpg" alt="Banner-3">
                    </div>
                </section>

                <?php
                    $servername = "tunetracer.hu";
                    $username = "tunetracer";
                    $password = "tunetracer123321";
                    $dbname = "tunetracer";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT audio.Title, artist.Name AS Author, audio.filename, audio.cover_art_path
                            FROM audio
                            JOIN artist ON audio.Author = artist.ID
                            ORDER BY RAND()
                            LIMIT 30";

                    $result = $conn->query($sql);

                    $randomPlaylist = array();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $randomPlaylist[] = $row;
                        }
                    }

                    $conn->close();
                ?>

                <!-- Playlists -->
                <h1 class="heading-text" style="margin-top: 60px;">Lejátszási Listák</h1>
                <section class="latest-releases">
                    <div class="card">
                        <figure>
                            <a href="#" onclick="playRandomPlaylist()">
                                <img src="images/End Game.jpg" alt=""> 
                                <div><i class="fa-solid fa-circle-play" onclick="handleCirclePlay(this)"></i></div>
                            </a>
                            <figcaption class="song-info">
                                <h2>Random Playlist <p><?php echo count($randomPlaylist); ?> zene</p></h2>
                                <div class="heartIcon"><i class="fa-regular fa-heart" onclick="toggleHeart(this)"></i></div>
                            </figcaption>
                        </figure>
                    </div>
                </section>

                <!-- Popular Artists -->
                <section class="popular-artists">
                    <h1 class="heading-text">Népszerű előadók</h1>
                    <div class="popular-artist-content">
                        <figure>
                            <a href="#">
                                <img src="images/End Game.jpg" alt="">
                                <figcaption>Taylor Swift</figcaption>
                            </a>
                        </figure>            
                    </div>

                </section>

                 <!-- Music Station -->

                 <section class="music-station">
                     <figure id="mus-sta-fig">
                         <img src="images/music-station.jpg">
                     </figure>
                     <div class="music-mood">
                        <figure><a href="#"><img src="images/love.jpg" alt=""><p>Love</p></a></figure>
                        <figure><a href="#"><img src="images/retro.jpg" alt=""><p>Retro</p></a></figure>
                        <figure><a href="#"><img src="images/chill.jpg" alt=""><p>Chill</p></a></figure>
                        <figure><a href="#"><img src="images/workout.jpg" alt=""><p>Workout</p></a></figure>
                        <figure><a href="#"><img src="images/rock.jpg" alt=""><p>Rock</p></a></figure>
                        <figure><a href="#"><img src="images/pop.jpg" alt=""><p>Pop</p></a></figure>
                     </div>
                 </section>

                <!-- Latest English -->

                <section class="latest-songs" id="latest-english">
                    <h1 class="heading-text">Legfrissebb Magyar</h1>
                    <div class="latest-song-div">      
                        <figure>
                            <a href="#">
                                <img src="images/End Game.jpg" alt="">
                                <figcaption class="">
                                    <h5>End Game</h5>
                                    <h6>AUG 2, 2020</h6>
                                </figcaption>
                            </a>
                        </figure>       
                    </div>

                </section>

                <!-- Latest Hungarian -->

                <section class="latest-songs" id="latest-hungarian">
                    <h1 class="heading-text">Legfrissebb Magyar</h1>
                    <div class="latest-song-div">
                        <figure>
                            <a href="#">
                                <img src="images/3korty.jpg" alt="">
                                <figcaption class="">
                                    <h5>3korty</h5>
                                    <h6>AUG 2, 2023</h6>
                                </figcaption>
                            </a>
                        </figure>
                    </div>
                </section>
            </aside>
        </main>
        
        <!-- Footer:- Music Player Controls  -->

        <footer>
            <div class="play-song-info trans-bg">
                <div class="con-left trans-bg">
                    <div class="footer-img">
                         
                    </div>
                    <div class="trans-bg">
                        
                    </div> 
                </div>    
                <div class="con-right trans-bg side-margin-4px">
                    <i class="fa-solid fa-ban" style="cursor: pointer;" onclick="blockCurrentSong()"></i>
                    <i class="fa-regular fa-heart" style="cursor: pointer;" onclick="toggleHeart(this)"></i>
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

            function kijelentkezes()
            {
                window.location.href = "logout.php";
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

            function handleCirclePlay(element) {
                var audioPlayer = document.getElementById('audioPlayer');
                var playPauseButton = document.getElementById('playPauseButton');

                if (audioPlayer.paused) {
                    playRandomPlaylist();

                    element.classList.remove("fa-circle-play");
                    element.classList.add("fa-circle-pause");
                    playPauseButton.classList.remove("fa-play");
                    playPauseButton.classList.add("fa-pause");
                    audioPlayer.play();
                } else {
                    playPauseButton.classList.remove("fa-pause");
                    playPauseButton.classList.add("fa-play");
                    audioPlayer.pause();
                    element.classList.remove("fa-circle-pause");
                    element.classList.add("fa-circle-play");
                }
            }

            var typingTimer;
            var doneTypingInterval = 100; 

            function performSearch() {
                clearTimeout(typingTimer);

                typingTimer = setTimeout(function () {
                    var searchQuery = document.getElementById("searchbar").value.trim();
                    if (searchQuery !== "") {
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "search.php", true);
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState == 4) {
                                if (xhr.status == 200) {
                                    try {
                                        var results = JSON.parse(xhr.responseText);
                                        if (Array.isArray(results)) {
                                            updateList(results);
                                        } else {
                                            console.error("Invalid response format:", xhr.responseText);
                                            clearList();
                                        }
                                    } catch (error) {
                                        console.error("Error parsing JSON:", error.message);
                                        clearList();
                                    }
                                } else {
                                    console.error("Request failed with status:", xhr.status);
                                    clearList();
                                }
                            }
                        };
                        xhr.send("query=" + searchQuery);
                    } else {
                        clearList();
                    }
                }, doneTypingInterval);
            }

            function clearList() {
                var resultList = document.getElementById("search-results");
                resultList.innerHTML = "";
            }

            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("searchbar").addEventListener("keyup", performSearch);
                document.getElementById("search-button").addEventListener("click", performSearch);              
            });

            function updateList(results) {
                var resultList = document.getElementById("search-results");
                resultList.innerHTML = "";

                if (results && results.length > 0) {
                    var ul = document.createElement("ul");
                    for (var i = 0; i < results.length; i++) {
                        (function (i) {
                            var li = document.createElement("li");
                            li.textContent = results[i].cim + " - " + results[i].szerzo;

                            li.addEventListener("click", function() {
                                playSelectedSong(results[i].cim, results[i].szerzo, results[i].filenev);
                            });

                            ul.appendChild(li);
                        })(i);
                    }

                    resultList.appendChild(ul);
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

            function getBlockedSongs() {
                var blockedSongs = localStorage.getItem('blockedSongs');
                blockedSongs = blockedSongs ? JSON.parse(blockedSongs) : [];
                return blockedSongs;
            }

            function stopPlayback() {
                var audioPlayer = document.getElementById('audioPlayer');
                audioPlayer.pause();
            }

            function playNextUnblockedTrack() {
                var nextUnblockedIndex = getNextUnblockedIndex();
                if (nextUnblockedIndex !== null) {
                    currentSongIndex = nextUnblockedIndex;
                    playSelectedSong(playlistSongs[currentSongIndex].Title, playlistSongs[currentSongIndex].Author, playlistSongs[currentSongIndex].filename);
                } else {
                    stopPlayback();
                }
            }

            function getNextUnblockedIndex() {
                var currentIndex = currentSongIndex;
                var blockedSongs = getBlockedSongs();

                while (true) {
                    currentIndex = (currentIndex + 1) % playlistSongs.length;

                    if (blockedSongs.indexOf(playlistSongs[currentIndex].filename) === -1) {
                        return currentIndex;
                    }
                    if (currentIndex === currentSongIndex) {
                        return null;
                    }
                }
            }

            function playPreviousTrack() {
                var previousUnblockedIndex = getPreviousUnblockedIndex();
                if (previousUnblockedIndex !== null) {
                    currentSongIndex = previousUnblockedIndex;
                    playSelectedSong(playlistSongs[currentSongIndex].Title, playlistSongs[currentSongIndex].Author, playlistSongs[currentSongIndex].filename);
                } else {
                }
            }

            function getPreviousUnblockedIndex() {
                var currentIndex = currentSongIndex;
                var blockedSongs = getBlockedSongs();

                while (true) {
                    currentIndex = (currentIndex - 1 + playlistSongs.length) % playlistSongs.length;

                    if (blockedSongs.indexOf(playlistSongs[currentIndex].filename) === -1) {
                        return currentIndex;
                    }
                    if (currentIndex === currentSongIndex) {
                        return null;
                    }
                }
            }

            function blockCurrentSong() {
                if (currentSongIndex !== null && currentSongIndex >= 0 && currentSongIndex < playlistSongs.length) {
                    var blockedSongIndex = currentSongIndex;

                    if (getBlockedSongs(playlistSongs[blockedSongIndex].filename)) {
                        playNextUnblockedTrack();
                    } else {
                        var playlistItems = document.querySelectorAll('.playlist-item');
                        if (playlistItems[blockedSongIndex]) {
                            playlistItems[blockedSongIndex].classList.add('blocked-song');
                        }

                        var blockedSongs = getBlockedSongs();
                        if (blockedSongs.indexOf(playlistSongs[blockedSongIndex].filename) === -1) {
                            blockedSongs.push(playlistSongs[blockedSongIndex].filename);
                            localStorage.setItem('blockedSongs', JSON.stringify(blockedSongs));
                        }
                    }
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
            var playlistSongs = <?php
                $json = json_encode($playlistSongs);

                if ($json === false) {
                    // Hiba a JSON generálásakor
                    $jsonError = json_last_error_msg();
                    echo 'console.error("JSON encoding error: ' . $jsonError . '");';
                    echo 'var playlistSongs = [];';
                } else {
                    echo $json;
                }
            ?>;


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

            function playRandomPlaylist() {
                var audioPlayer = document.getElementById('audioPlayer');
                var playPauseButton = document.getElementById('playPauseButton');
                var currentSongIndex = 0;
                var randomPlaylist = <?php echo json_encode($randomPlaylist); ?>;

                if (randomPlaylist.length > 0) {
                    playSelectedSong(randomPlaylist[currentSongIndex].Title, randomPlaylist[currentSongIndex].Author, randomPlaylist[currentSongIndex].filename);
                } else {
                    console.error("Nincs elérhető zene a véletlenszerű lejátszási listán.");
                }
            }

            localStorage.setItem('currentSongIndex', JSON.stringify(currentSongIndex));
            localStorage.setItem('isShuffleActive', JSON.stringify(isShuffleActive));

            var storedCurrentSongIndex = JSON.parse(localStorage.getItem('currentSongIndex'));
            var storedIsShuffleActive = JSON.parse(localStorage.getItem('isShuffleActive'));

            currentSongIndex = storedCurrentSongIndex;
            isShuffleActive = storedIsShuffleActive;

        </script>
    </body>
</html>
