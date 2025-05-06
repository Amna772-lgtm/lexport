import { createNoise2D } from "https://cdn.skypack.dev/simplex-noise@4.0.0";

const root = document.querySelector(":root");
const titleElement = document.getElementById("title");
const artistElement = document.getElementById("artist");
const playButton = document.getElementById("play-button");
const pauseButton = document.getElementById("pause-button");
const nextButton = document.getElementById("next-button");
const previousButton = document.getElementById("previous-button");
const albumCover = document.querySelector("img");
const bars = Array.from(
document.getElementById("visualizer-container").children);


playButton.addEventListener("click", () => updatePlayerStatus());
pauseButton.addEventListener("click", () => updatePlayerStatus());
nextButton.addEventListener("click", () => updateTrack("next"));
previousButton.addEventListener("click", () => updateTrack("prev"));

const tracks = [
{ artist: 'Thundercat', title: 'Show You The Way', albumArt: 'https://assets.codepen.io/1096155/them-changes-album-cover.jpg' },
{ artist: 'Marcy Playground', title: 'Sex & Candy', albumArt: 'https://assets.codepen.io/1096155/marcy-playground-album-cover.jpg' },
{ artist: 'Fischerspooner', title: 'All We Are', albumArt: 'https://assets.codepen.io/1096155/fischerspooner-album-cover.png' }];


const amountOfBars = 110;
const percentPerBar = amountOfBars / 100;
const playerStates = {
  playing: 'playing',
  paused: 'paused' };


let playerStatus = playerStates.playing;
let progress = 0;
let currentTrack = tracks[0];
let palette = { primary: "#9F6A56", secondary: "#546464" };


const clamp = (num, min = 10, max = 45) => Math.min(Math.max(num, min), max);
const getRandomNum = (min, max) => Math.random() * (max - min) + min;
const convertArrayToRgb = arr => `rgb(${arr[0]}, ${arr[1]}, ${arr[2]})`;
const rgbToHex = (r, g, b) => '#' + [r, g, b].map(x => {
  const hex = x.toString(16);
  return hex.length === 1 ? '0' + hex : hex;
}).join('');

const updateBarHeights = () => {
  const date = new Date();

  bars.forEach((bar, i) => {
    const noise2D = createNoise2D();
    let multiplier = 7;

    if (i < 5 || i > bars.length - 5) {
      multiplier = 2.5;
    }

    const currentHeight = Number(bar.style.height.replace("px", ""));
    const scaleFactor = noise2D(currentHeight, currentHeight) * multiplier * 1.25;
    const newHeight = Number(clamp(scaleFactor * currentHeight));

    bar.style.height = `${newHeight}px`;
  });
};

const upadteBarOpacity = (opacity, barCount) => {
  bars.forEach((bar, i) => {
    if (i <= barCount) {
      bar.style.opacity = opacity;
    }
  });
};

const updateProgress = () => {
  const howManyBarsToHightlight = progress * percentPerBar;
  let opacity = 0.85;

  if (progress >= 99.9) opacity = 0.25;

  upadteBarOpacity(opacity, howManyBarsToHightlight);
};

const updateCssVariables = () => {
  root.style.setProperty('--color-primary', palette.primary);
  root.style.setProperty('--color-secondary', palette.secondary);
};

const updateColorPalette = () => {
  try {
    const colorThief = new ColorThief();
    const newPalette = colorThief.getPalette(albumCover, 2);
    const [primary, secondary] = newPalette;

    palette.primary = rgbToHex(primary[0], primary[1], primary[2]);
    palette.secondary = rgbToHex(secondary[0], secondary[1], secondary[2]);
  } catch (e) {
    console.error('colorThief: ', e);
  }

  updateCssVariables();
};

const checkIfAlbumArtIsReady = () => {
  if (albumCover.complete) {
    updateColorPalette();
  } else {
    albumCover.addEventListener('load', function () {
      updateColorPalette();
    });
  }
};

const updatePlayerData = () => {
  artistElement.innerHTML = currentTrack.artist;
  titleElement.innerHTML = currentTrack.title;
  albumCover.src = currentTrack.albumArt;
};

const updatePlayerStatus = () => {
  if (playerStatus === playerStates.playing) {
    playerStatus = playerStates.paused;
    playButton.style.display = 'flex';
    pauseButton.style.display = 'none';
  } else {
    playerStatus = playerStates.playing;
    playButton.style.display = 'none';
    pauseButton.style.display = 'flex';
  }
};

const updateTrack = dir => {
  const tL = tracks.length;
  const currentI = tracks.indexOf(currentTrack);
  const nextIndex = dir === "next" ? (currentI + 1) % tL : (currentI + tL - 1) % tL;
  const nextTrack = tracks[nextIndex];

  currentTrack = nextTrack;
  progress = 0;
  upadteBarOpacity(0.25, amountOfBars);

  updatePlayerData();
  checkIfAlbumArtIsReady();
};

setInterval(() => {
  if (playerStatus === playerStates.playing) {
    updateBarHeights();
    updateProgress();
  }

  /* mock a songs progression while listening */
  if (progress > 100) progress = 0;
  progress += 0.5;
}, 300);