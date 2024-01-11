<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Profile</title>
        <script src="https://kit.fontawesome.com/12a41c30dd.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="profil.css">
    </head>
    <body>

        <!-- Header Section  -->

        <header>
            <nav class="navbar">
                <div id="navbar" style="padding: 0px;">
                    <div class="navbar-left">
                        <ul>
                            <li><a href="#" onclick="toggleProfilePage()">
                                <span style="margin-right: 2px;">Profil</span>
                                <i class="fas fa-user-circle"></i>
                            </a></li>   
                            <li id="zenek"><a href="index.php" style="display: flex; align-items: center; margin-right: 4px;">
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
                <div style="padding: 12px;">
                    <h3 class="inline">Hasonló előadók</h3>
                    <p class="inline sml-txt right" onclick="hidePlaylistItem(event)"><i class="toggleIcon fa-solid fa-minus" style="margin-left: 1em; font-size: 26px; cursor: pointer;"></i></p>
                    <div class="playlist">
                        <div class="playlist-item">
                             <div class="playlist-content">
                                 <div class="content-left">
                                     <div style="margin-right: 4px;"><h2>01</h2></div>
                                     <div class="coverer">
                                         <img class="small-img inline-block" src="images/billie-eilish.jpg" alt=""> 
                                     </div>
                                     <div>
                                         <h3>Billie Eilish</h3>
                                     </div> 
                                 </div>        
                                 <div class="content-right">
                                    <i class="fa-regular fa-heart" onclick="toggleHeart(this)"></i>
                                 </div>
                             </div>
                        </div>
                    </div>
                </div>
                <div style="border-top: 2px solid rgb(17, 17, 102); padding: 12px;">
                    <h3 class="inline">Legutóbb játszott</h3>
                    <p class="inline sml-txt right" onclick="hidePlaylistItem(event)"><i class="toggleIcon fa-solid fa-minus" style="margin-left: 1em; font-size: 26px; cursor: pointer;"></i></p>
                    <div class="playlist">
                        <div class="playlist-item">
                             <div class="playlist-content">
                                 <div class="content-left">
                                     <div style="margin-right: 4px;"><h2>01</h2></div>
                                     <div class="coverer">
                                         <img class="small-img inline-block" src="images/End Game.jpg" alt=""> 
                                     </div>
                                     <div>
                                         <div>End Game</div>
                                         <p>Taylor Swift</p>
                                     </div> 
                                 </div>
                                 
                                 <div class="content-right">
                                    <i class="fa-regular fa-heart" style="cursor: pointer;" onclick="toggleHeart(this)"></i>
                                 </div>
                             </div>
                        </div>
                    </div>
                </div>
            </aside>
            <aside class="aside section-1">
                <div class="subscription-info">
                    <div class="subscription-details">
                        <p><?php
                            if(isLoggedIn()){
                                if(!isset($conn)){require "database.php";}
                                $sql = "SELECT subscription_types.Name FROM users INNER JOIN subscriptions ON users.subscription = subscriptions.ID INNER JOIN subscription_types ON subscriptions.Type = subscription_types.ID WHERE users.Email = '".$_SESSION['email']."'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "Megvásárolt előfizetés: ".$row['Name'];
                                    }
                                    $conn->close();
                                }
                                $conn->close();
                                echo "Nincs fizetve csomag.";
                            }
                        ?></p>
                    </div>
                    <a href="subscription.html">Csomagok</a>
                </div>

                <h1 style="margin-top: 12px;">Legtöbbet hallgatott előadó</h1>
                <div class="container">
                    <img  class="big-img" src="images/End Game.jpg" alt="loading img">
                    <div class="jumpbox-details">
                        <div class="discriptive-part">
                            <div class="right">115M Követő</div>
                            <div class="author"><h1>Taylor Swift</h1></div>
                            <p class="song-name">End Game</p>
                            <p class="desc sml-txt"><b>Taylor Swift</b> is a Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate consequuntur adipisci et consectetur, similique magni officia ducimus voluptatibus laboriosam, provident ullam voluptas expedita dignissimos tenetur perspiciatis dolorem porro, animi vel amet. Numquam vel labore est id iste in facilis officiis sequi ab iusto soluta quae, alias quisquam sapiente sint. Dolor dolore cumque possimus eos necessitatibus harum alias, libero fugiat, quisquam qui, itaque tenetur cupiditate? Officiis error, nulla qui accusantium delectus consequatur, hic distinctio similique rerum odio molestiae amet quidem dolore!</p>
                        </div>
                        <div class="action-part">
                            <div class="btns">
                                <button>Összes Lejátszása</button>
                                <button>Követés</button>
                            </div>
                            <p class="sml-txt">85 Tracks | 30 Album</p>
                        </div>
                    </div>
                </div>

                <div class="playlist-main">
                    <h1>Hasonló zenék</h1>
                    <div class="playlist-item">
                         <div class="playlist-content">
                             <div class="content-left">
                                 <div style="margin-right: 4px;"><h2>01</h2></div>
                                 <div class="coverer">
                                     <img class="small-img inline-block" src="images/End Game.jpg" alt=""> 
                                 </div>
                                 <div>
                                     <div>End Game</div>
                                     <p>Taylor Swift</p>
                                 </div> 
                             </div>
                             
                            <div class="content-right side-margin-12px">
                                <i class="fa-regular fa-heart" onclick="toggleHeart(this)"></i>
                                <i class="fa-solid fa-plus"></i>
                            </div>
                         </div>
                    </div>
                </div>
                 
            </aside>    
        </main>

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
                    <div class="heartIcon"><i class="fa-regular fa-heart" onclick="toggleHeart(this)"></i></div>
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
    </body>

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
</html>

<?php 
    require "isLoggedIn.php"; 
    if(isLoggedIn()){ 
        header("Location: regbej.php");
    } 
?>