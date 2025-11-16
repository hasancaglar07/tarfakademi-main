
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TARF | Gelişmiş Kinetik Deneyim</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&family=Inter:wght@300;400;500;600&display=swap" as="style">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>


:root {
    /* Premium Color Palette */
    --accent-color: #2563eb;
    --accent-hover: #1d4ed8;
    --accent-light: #60a5fa;
    --text-primary: #0f172a;
    --text-secondary: #475569;
    --text-light: #94a3b8;
    --background: #ffffff;
    --background-secondary: #f8fafc;

    /* Advanced Glassmorphism */
    --glass-bg: rgba(255, 255, 255, 0.75);
    --glass-stroke: rgba(148, 163, 184, 0.15);
    --glass-shadow: rgba(15, 23, 42, 0.08);

    /* Premium Gradients */
    --accent-gradient: linear-gradient(135deg, #3b82f6 0%, #2563eb 50%, #1d4ed8 100%);
    --text-gradient: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
    --shimmer-gradient: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);

    /* Sophisticated Shadows */
    --shadow-sm: 0 2px 8px -1px rgba(15, 23, 42, 0.06);
    --shadow-md: 0 4px 16px -2px rgba(15, 23, 42, 0.08);
    --shadow-lg: 0 8px 24px -4px rgba(15, 23, 42, 0.1);
    --shadow-xl: 0 20px 40px -8px rgba(15, 23, 42, 0.12);
    --shadow-accent: 0 8px 32px -4px rgba(37, 99, 235, 0.2);
    --shadow-glow: 0 0 48px rgba(59, 130, 246, 0.15);

    /* Typography */
    --font-primary: 'Orbitron', sans-serif;
    --font-secondary: 'Inter', sans-serif;

    /* Spacing System */
    --spacing-sm: 1rem;
    --spacing-md: 1.5rem;
    --spacing-lg: 2.5rem;

    /* Smooth Animations */
    --transition-normal: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    --transition-slow: 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    --ease-in-out: cubic-bezier(0.65, 0, 0.35, 1);
}

/* ================================ */
/* BASE STYLES */
/* ================================ */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: var(--font-secondary);
    background: #000;
    background-size: 400% 400%;
    animation: gradientShift 15s ease infinite;
    color: var(--text-primary);
    overflow: hidden;
    cursor: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* ================================ */
/* BACKGROUND & FOREGROUND ELEMENTS */
/* ================================ */

.parallax-bg {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    overflow: hidden;
    z-index: 0;
}

.bg-shape {
    position: absolute;
    border-radius: 50%;
    transition: transform 0.8s var(--ease-in-out);
    filter: blur(80px);
    opacity: 0.5;
    mix-blend-mode: overlay;
    animation: parallax-drift 30s var(--ease-in-out) infinite;
}

.shape1 { width: 50vw; height: 50vw; top: 5%; left: 10%; background: radial-gradient(circle, rgba(102, 126, 234, 0.15) 0%, rgba(118, 75, 162, 0.1) 50%, transparent 70%); animation-delay: 0s; animation-duration: 32s;}
.shape2 { width: 40vw; height: 40vw; top: 45%; left: 65%; background: radial-gradient(circle, rgba(240, 147, 251, 0.12) 0%, rgba(245, 87, 108, 0.08) 50%, transparent 70%); animation-delay: -8s; animation-duration: 28s;}
.shape3 { width: 60vw; height: 60vw; top: 60%; left: 0%; background: radial-gradient(circle, rgba(79, 172, 254, 0.14) 0%, rgba(102, 126, 234, 0.09) 50%, transparent 70%); animation-delay: -16s; animation-duration: 35s;}
.shape4 { width: 35vw; height: 35vw; top: 15%; left: 75%; background: radial-gradient(circle, rgba(245, 87, 108, 0.11) 0%, rgba(240, 147, 251, 0.07) 50%, transparent 70%); animation-delay: -24s; animation-duration: 26s;}
.shape5 { width: 45vw; height: 45vw; top: 75%; left: 45%; background: radial-gradient(circle, rgba(118, 75, 162, 0.13) 0%, rgba(79, 172, 254, 0.08) 50%, transparent 70%); animation-delay: -30s; animation-duration: 30s;}

.vignette {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    pointer-events: none;
    z-index: 4;
    background: radial-gradient(ellipse at center, transparent 60%, rgba(15, 23, 42, 0.03) 100%);
}

#three-canvas, #label-canvas {
    position: fixed;
    top: 0;
    left: 0;
    outline: none;
    z-index: 1;
    pointer-events: none;
}
#label-canvas { z-index: 2; }

/* ================================ */
/* LOADING SCREEN */
/* ================================ */

.loading-container {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: var(--background);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 10000;
    transition: opacity 1s ease-out;
}
.loading-container.hidden { opacity: 0; pointer-events: none; }
.loading-content { text-align: center; }
.loading-logo { margin-bottom: var(--spacing-lg); }
.loading-text {
    font-family: var(--font-primary);
    font-size: clamp(2.5rem, 8vw, 4.5rem);
    font-weight: 900;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    background: var(--accent-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    filter: drop-shadow(0 4px 16px rgba(37, 99, 235, 0.2));
}
.loading-progress-bar { width: 320px; height: 4px; background: rgba(148, 163, 184, 0.15); border-radius: 4px; overflow: hidden; margin: 0 auto 0.5rem; box-shadow: inset 0 1px 3px rgba(15, 23, 42, 0.1); }
.loading-progress-fill { height: 100%; background: var(--accent-gradient); width: 0%; border-radius: 4px; transition: width var(--transition-normal); box-shadow: 0 0 12px rgba(37, 99, 235, 0.4); }
.loading-percentage { font-family: var(--font-primary); font-size: 0.9rem; color: var(--accent-color); font-weight: 700; letter-spacing: 0.1em; }
.loading-status { font-size: 0.85rem; color: var(--text-secondary); letter-spacing: 0.15em; text-transform: uppercase; font-weight: 500; margin-top: var(--spacing-md); }
.loading-background-effect { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: radial-gradient(circle at center, rgba(102, 126, 234, 0.08) 0%, rgba(240, 147, 251, 0.05) 50%, transparent 70%); }

/* ================================ */
/* ENHANCED CURSOR SYSTEM */
/* ================================ */

.cursor { position: fixed; width: 8px; height: 8px; background-color: var(--accent-color); border-radius: 50%; left: 0; top: 0; pointer-events: none; transform: translate(-50%, -50%); z-index: 10000; transition: transform 0.1s ease-out, background-color var(--transition-normal), width var(--transition-normal), height var(--transition-normal); box-shadow: 0 0 8px rgba(37, 99, 235, 0.5); }
.cursor-ring { position: fixed; width: 36px; height: 36px; border: 2px solid var(--accent-color); border-radius: 50%; left: 0; top: 0; pointer-events: none; transform: translate(-50%, -50%); transition: transform 0.15s ease-out, width var(--transition-normal), height var(--transition-normal), border-color var(--transition-normal), background-color var(--transition-normal); z-index: 9999; opacity: 0.6; }
.cursor-trail { position: fixed; width: 24px; height: 24px; background: radial-gradient(circle, rgba(37, 99, 235, 0.2) 0%, transparent 70%); border-radius: 50%; left: 0; top: 0; pointer-events: none; transform: translate(-50%, -50%); z-index: 9998; transition: transform 0.2s ease-out; }
.cursor-ring.hover { width: 64px; height: 64px; background-color: rgba(37, 99, 235, 0.08); opacity: 0.8; }
.cursor.hover { width: 0; height: 0; }

/* ================================ */
/* UI CONTAINER & LAYOUT */
/* ================================ */

.ui-container { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 3; pointer-events: none; display: flex; flex-direction: column; justify-content: space-between; align-items: center; padding: clamp(2rem, 4vw, 4rem) clamp(1.5rem, 3vw, 3rem); }
.ui-container > * { pointer-events: all; }

/* ================================ */
/* HEADER & FOOTER */
/* ================================ */

.header-section, .footer-section { text-align: center; opacity: 0; transform: translateY(30px); will-change: transform, opacity; }
.header-section { transform: translateY(-30px); }
.top-logo { position: relative; margin-bottom: var(--spacing-md); cursor: pointer; transition: transform var(--transition-normal); }
.top-logo:hover { transform: translateY(-3px); }
.logo-main { display: block; font-family: var(--font-primary); font-size: clamp(2.5rem, 6vw, 4rem); font-weight: 900; letter-spacing: 0.15em; text-transform: uppercase; background: var(--text-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; line-height: 1; user-select: none; filter: drop-shadow(0 2px 8px rgba(15, 23, 42, 0.1)); }
.logo-sub { display: block; font-family: var(--font-primary); font-size: clamp(0.7rem, 1.8vw, 1rem); font-weight: 600; letter-spacing: 0.4em; text-transform: uppercase; color: var(--accent-color); margin-top: 0.4em; filter: drop-shadow(0 1px 4px rgba(37, 99, 235, 0.15)); }
.logo-accent-line { width: 80px; height: 3px; background: var(--accent-gradient); margin: var(--spacing-sm) auto 0; border-radius: 3px; opacity: 0; transform: scaleX(0); transition: all var(--transition-slow) var(--ease-in-out); box-shadow: 0 2px 8px rgba(37, 99, 235, 0.3); }
.subtitle-text { font-family: var(--font-secondary); font-size: clamp(0.75rem, 1.8vw, 0.95rem); font-weight: 500; color: white; letter-spacing: 0.08em; text-transform: uppercase; }
.footer-content { text-align: center; }
.footer-link { text-decoration: none; color: var(--text-secondary); font-size: 0.875rem; font-weight: 500; transition: all var(--transition-normal); position: relative; display: inline-block; padding: 0.5rem 1rem; }
.footer-link:hover { color: var(--accent-color); }
.footer-accent { position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 0%; height: 2px; background: var(--accent-gradient); transition: all var(--transition-normal); }
.footer-link:hover .footer-accent { width: 100%; }
.footer-tagline { font-size: 0.75rem; color: var(--text-light); margin-top: 0.5rem; }

/* ================================ */
/* MAIN CONTENT & LABELS */
/* ================================ */

.globe-focus-section { flex: 1; pointer-events: none; }
.interaction-hint { position: relative; display: inline-block; background: var(--glass-bg); backdrop-filter: blur(32px); border: 1px solid var(--glass-stroke); border-radius: 24px; padding: 1.2rem 2rem; margin-top: 50px; opacity: 0; transform: translateY(30px); transition: all var(--transition-slow); box-shadow: var(--shadow-lg); }
.interaction-hint:hover { transform: translateY(28px); box-shadow: var(--shadow-xl); border-color: rgba(37, 99, 235, 0.2); }
.hint-text { font-size: 1em; color: var(--text-primary); font-weight: 500; }

.label-chip { pointer-events: auto; user-select: none; display: inline-flex; align-items: center; gap: 10px; padding: 12px 20px; border-radius: 999px; background: var(--glass-bg); border: 1px solid var(--glass-stroke); backdrop-filter: blur(24px); box-shadow: var(--shadow-md); font-weight: 600; font-size: 13px; color: var(--text-primary); transform: translateZ(0); transition: all var(--transition-normal); text-decoration: none; }
.label-chip::before { content: ''; width: 7px; height: 7px; border-radius: 50%; background: var(--accent-color); box-shadow: 0 0 12px rgba(37, 99, 235, 0.6); transition: all var(--transition-normal); }
.label-chip:hover { transform: scale(1.05) translateY(-2px); color: var(--accent-color); border-color: rgba(37, 99, 235, 0.3); background: rgba(255, 255, 255, 0.9); box-shadow: var(--shadow-accent); }
.label-chip:hover::before { box-shadow: 0 0 16px rgba(37, 99, 235, 0.8); }

/* ================================ */
/* PERFORMANCE MONITOR & RESPONSIVE */
/* ================================ */

.performance-monitor { position: fixed; top: var(--spacing-sm); right: var(--spacing-sm); background: var(--glass-bg); backdrop-filter: blur(24px); border-radius: 12px; padding: var(--spacing-sm); font-size: 0.75rem; color: var(--text-secondary); z-index: 9000; border: 1px solid var(--glass-stroke); box-shadow: var(--shadow-md); }
.performance-monitor.hidden { display: none; }
.monitor-item { display: flex; justify-content: space-between; min-width: 120px; }
.monitor-label { font-weight: 500; }
.monitor-value { color: var(--accent-color); font-weight: 600; }

@media (max-width: 768px) {
    body { cursor: auto; }
    .cursor, .cursor-ring, .cursor-trail { display: none; }
}

@keyframes parallax-drift {
    0%, 100% { transform: translate(0, 0); }
    50% { transform: translate(10px, -10px); }
}

@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
    </style>

    <meta name="description" content="TARF   - Gelecek nesil teknoloji eğitimi ve inovasyon merkezi. Gelişmiş kinetik ve interaktif bir web deneyimi.">
    <meta name="keywords" content="teknoloji, eğitim, yazılım, akademi, inovasyon, three.js, webgl, interaktif">
    <meta name="author" content="TARF  ">

    <meta property="og:title" content="TARF   - Gelişmiş Kinetik Deneyim">
    <meta property="og:description" content="Teknolojinin geleceğini şekillendiren, interaktif 3D eğitim platformu.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://tarf.com.tr">
    </head>
<body>
    <div class="parallax-bg">
        <div class="bg-shape shape1" data-depth="0.1"></div>
        <div class="bg-shape shape2" data-depth="0.2"></div>
        <div class="bg-shape shape3" data-depth="0.3"></div>
        <div class="bg-shape shape4" data-depth="0.15"></div>
        <div class="bg-shape shape5" data-depth="0.25"></div>
    </div>

    <div class="vignette"></div>

    <div class="cursor"></div>
    <div class="cursor-ring"></div>
    <div class="cursor-trail"></div>

    <div id="loading-screen" class="loading-container">
        <div class="loading-content">
            <div class="loading-logo">
                <img src="{{ asset('img/tarf.png') }}" alt="Tarf" style=" height: 100px;">
                <div class="loading-particles"></div>
            </div>
            <div class="loading-progress-container">
                <div class="loading-progress-bar">
                    <div class="loading-progress-fill"></div>
                </div>
                <div class="loading-percentage">0%</div>
            </div>
            <div class="loading-status">KINETIK ÇEKIRDEK BAŞLATILIYOR...</div>
        </div>
        <div class="loading-background-effect"></div>
    </div>

    <canvas id="three-canvas"></canvas>
    <div id="label-canvas"></div>

    <div class="ui-container">
        <header class="header-section">
            <div class="top-logo">
                <span class="logo-main">
                    <img src="{{ asset('img/tarf_white.png') }}" alt="Tarf" style=" height: 100px;">
                </span>
            </div>
            <div class="header-subtitle">
                <span class="subtitle-text">Teknolojinin Geleceği</span>
                <div class="subtitle-particles"></div>
            </div>
        </header>

        <main class="globe-focus-section">
            <div class="globe-info">
                <div class="interaction-hint">
                    <span class="hint-text">Dünyayı keşfetmek için fareyi hareket ettirin</span>
                    <div class="hint-particles"></div>
                </div>
            </div>
        </main>

        <footer class="footer-section">
            <div class="footer-content">
                <a href="{{ localized_route('home') }}" class="footer-link" id="redirect-link">
                    <span class="footer-text">Ana Sayfaya Git</span>
                    <div class="footer-accent"></div>
                </a>
                <div class="footer-tagline" id="countdown-text">5 saniye sonra otomatik yönlendirileceksiniz...</div>
            </div>
        </footer>

    </div>

    <div id="performance-monitor" class="performance-monitor hidden">
        <div class="monitor-item">
            <span class="monitor-label">FPS:</span>
            <span class="monitor-value" id="fps-counter">60</span>
        </div>
        <div class="monitor-item">
            <span class="monitor-label">Particles:</span>
            <span class="monitor-value" id="particle-counter">0</span>
        </div>
        <div class="monitor-item">
            <span class="monitor-label">Globe:</span>
            <span class="monitor-value" id="globe-status">Active</span>
        </div>
    </div>

    <script async src="https://unpkg.com/es-module-shims@1.6.3/dist/es-module-shims.js"></script>
    <script type="importmap">
        {
            "imports": {
                "three": "https://cdn.jsdelivr.net/npm/three@0.157.0/build/three.module.js",
                "three/addons/": "https://cdn.jsdelivr.net/npm/three@0.157.0/examples/jsm/"
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <script  type="module">
        // TARF AKADEMI - Gelişmiş Kinetik Deneyim
// Yazar: Google Gemini (Mevcut kod tabanı üzerinde geliştirilmiştir)
// Versiyon: 2.0 - Premium

import * as THREE from 'three';
import { RGBELoader } from 'three/addons/loaders/RGBELoader.js';
import { CSS2DRenderer, CSS2DObject } from 'three/addons/renderers/CSS2DRenderer.js';

// ==========================================
// GLOBAL DEĞİŞKENLER & YAPILANDIRMA
// ==========================================
let scene, camera, renderer, labelRenderer, clock;
let globeGroup, earth, clouds, stars;
let orbitersGroup;
let mouse = new THREE.Vector2(-10, -10);
let isLoaded = false;
let isMobile = window.innerWidth < 768;
let introTimeline;

// Performans izleme
const perfMonitor = {
    fps: 60,
    frameCount: 0,
    lastTime: performance.now()
};

// ==========================================
// ANA BAŞLATMA FONKSİYONU
// ==========================================
document.addEventListener('DOMContentLoaded', () => {
    console.log('🚀 TARF AKADEMI | Kinetik Deneyim v2.0 Başlatılıyor...');
    initializeScene();
    initializeUI();
    initializeEventListeners();
    animate();
});

// ==========================================
// THREE.JS SAHNE KURULUMU
// ==========================================
function initializeScene() {
    // Sahne ve Kamera
    scene = new THREE.Scene();
    camera = new THREE.PerspectiveCamera(68, window.innerWidth / window.innerHeight, 0.1, 2000);
    camera.position.set(0, 0.4, 9);
    clock = new THREE.Clock();

    // Renderer'lar
    renderer = new THREE.WebGLRenderer({
        canvas: document.querySelector('#three-canvas'),
        antialias: !isMobile,
        alpha: true,
        powerPreference: 'high-performance'
    });
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.outputColorSpace = THREE.SRGBColorSpace;
    renderer.toneMapping = THREE.ACESFilmicToneMapping;
    renderer.toneMappingExposure = 1.35;

    labelRenderer = new CSS2DRenderer();
    labelRenderer.setSize(window.innerWidth, window.innerHeight);
    labelRenderer.domElement.style.position = 'fixed';
    labelRenderer.domElement.style.top = '0';
    document.querySelector('#label-canvas').appendChild(labelRenderer.domElement);

    // Sahne Elemanları
    setupEnvironment();
    setupLighting();
    createFuturisticEarth();
    createStarfield();
    createOrbitingLabels();

    console.log('✅ Three.js Sahnesi başarıyla kuruldu.');
}

function setupEnvironment() {
    new RGBELoader().load('https://dl.polyhaven.org/file/ph-assets/HDRIs/hdr/1k/peppermint_powerplant_2_1k.hdr', (texture) => {
        texture.mapping = THREE.EquirectangularReflectionMapping;
        scene.environment = texture;
    });
}

function setupLighting() {
    scene.add(new THREE.HemisphereLight(0xffffff, 0x7799cc, 0.6));
    const dirLight = new THREE.DirectionalLight(0xffffff, 1.0);
    dirLight.position.set(5, 3, 5);
    scene.add(dirLight);
}

// ==========================================
// 3D NESNE OLUŞTURMA
// ==========================================
function createFuturisticEarth() {
    globeGroup = new THREE.Group();
    globeGroup.scale.set(0, 0, 0); // Giriş animasyonu için başlangıç ölçeği
    scene.add(globeGroup);

    const loader = new THREE.TextureLoader();
    const earthTexture = loader.load('https://threejs.org/examples/textures/planets/earth_atmos_2048.jpg');
    const specularMap = loader.load('https://threejs.org/examples/textures/planets/earth_specular_2048.jpg');
    const normalMap = loader.load('https://threejs.org/examples/textures/planets/earth_normal_2048.jpg');
    const cloudTexture = loader.load('https://threejs.org/examples/textures/planets/earth_clouds_2048.png');

    // Ana Dünya - Premium Materyal
    const earthMaterial = new THREE.MeshPhysicalMaterial({
        map: earthTexture, normalMap: normalMap, roughnessMap: specularMap,
        roughness: 0.4, metalness: 0.1, clearcoat: 0.3, clearcoatRoughness: 0.2,
        envMapIntensity: 1.2,
    });
    earth = new THREE.Mesh(new THREE.SphereGeometry(2.9, 128, 128), earthMaterial);
    globeGroup.add(earth);

    // Gelişmiş Bulutlar
    clouds = new THREE.Mesh(
        new THREE.SphereGeometry(3.02, 128, 128),
        new THREE.MeshLambertMaterial({ map: cloudTexture, transparent: true, opacity: 0.7 })
    );
    globeGroup.add(clouds);

    // Çok Katmanlı Atmosfer ve Hologramlar
    const createGlowLayer = (radius, color, opacity, blending = THREE.AdditiveBlending) => {
        const glow = new THREE.Mesh(
            new THREE.SphereGeometry(radius, 64, 64),
            new THREE.MeshBasicMaterial({ color, transparent: true, opacity, blending, side: THREE.BackSide, depthWrite: false })
        );
        globeGroup.add(glow);
    };
    createGlowLayer(3.15, 0x3b82f6, 0.1);
    createGlowLayer(3.35, 0x60a5fa, 0.05);

    // Holografik Grid
    const grid = new THREE.Mesh(
        new THREE.SphereGeometry(3.05, 32, 16),
        new THREE.MeshBasicMaterial({ color: 0x60a5fa, transparent: true, opacity: 0.06, wireframe: true, blending: THREE.AdditiveBlending })
    );
    globeGroup.add(grid);
}

function createStarfield() {
    const count = isMobile ? 5000 : 10000;
    const positions = new Float32Array(count * 3);
    const colors = new Float32Array(count * 3);

    for (let i = 0; i < count; i++) {
        const r = THREE.MathUtils.randFloat(45, 300);
        const theta = Math.random() * 2 * Math.PI;
        const phi = Math.acos((Math.random() * 2) - 1);
        positions[i * 3] = r * Math.sin(phi) * Math.cos(theta);
        positions[i * 3 + 1] = r * Math.sin(phi) * Math.sin(theta);
        positions[i * 3 + 2] = r * Math.cos(phi);

        const color = new THREE.Color();
        color.setHSL(THREE.MathUtils.randFloat(0.5, 0.65), 0.9, 0.8);
        color.toArray(colors, i * 3);
    }

    const starGeometry = new THREE.BufferGeometry();
    starGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    starGeometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

    stars = new THREE.Points(starGeometry, new THREE.PointsMaterial({
        size: 0.5, sizeAttenuation: true, vertexColors: true,
        transparent: true, opacity: 0.8, blending: THREE.AdditiveBlending
    }));
    scene.add(stars);
}

function createOrbitingLabels() {
    orbitersGroup = new THREE.Group();
    globeGroup.add(orbitersGroup);

    const services = [
        { text: 'Yazılım Teknolojileri', href: '/tr' },
        { text: 'Düşünce Enstitüsü', href: '/tr' },
        { text: 'Tarf Mekan', href: '/tr' },
        { text: 'Akademi', href: '/tr' },
        { text: 'Tarf Dergi', href: '/tr' },
        { text: 'Kulüpler ve Takımlar', href: '/tr' }
    ];

    services.forEach((service, index) => {
        const pivot = new THREE.Object3D();
        orbitersGroup.add(pivot);

        const anchor = new THREE.Object3D();
        const angle = (index / services.length) * Math.PI * 2;
        const radius = 4.6;
        const lat = (index % 3 - 1) * 0.2; // Farklı yükseklikler
        anchor.position.set(Math.cos(angle) * radius, lat * radius, Math.sin(angle) * radius);
        pivot.add(anchor);

        // Bağlantı noktası
        const dot = new THREE.Mesh(
            new THREE.SphereGeometry(0.05, 12, 12),
            new THREE.MeshBasicMaterial({ color: 0x2563eb })
        );
        anchor.add(dot);

        // HTML Etiketi
        const labelElement = document.createElement('a');
        labelElement.href = service.href;
        labelElement.className = 'label-chip';
        labelElement.textContent = service.text;
        labelElement.target = "_blank"; // Yeni sekmede aç
        labelElement.addEventListener('mouseenter', () => document.body.classList.add('cursor-hover'));
        labelElement.addEventListener('mouseleave', () => document.body.classList.remove('cursor-hover'));

        const label = new CSS2DObject(labelElement);
        label.position.set(0.3, 0.25, 0);
        anchor.add(label);

        anchor.userData = { baseAngle: angle, speed: (Math.random() * 0.05 + 0.05) * (Math.random() > 0.5 ? 1 : -1), lat, radius };
    });
}

// ==========================================
// UI & ANIMASYON
// ==========================================
function initializeUI() {
    // Yükleme Ekranı
    const progressFill = document.querySelector('.loading-progress-fill');
    const percentage = document.querySelector('.loading-percentage');
    const status = document.querySelector('.loading-status');
    const loadingScreen = document.getElementById('loading-screen');

    const loadingSteps = [
        { p: 20, t: 'Platform başlatılıyor...', d: 300 },
        { p: 45, t: 'Kaynaklar yükleniyor...', d: 500 },
        { p: 70, t: 'Bilgi sistemleri hazırlanıyor...', d: 400 },
        { p: 90, t: 'Arayüz hazırlanıyor...', d: 300 },
        { p: 100, t: 'Platform hazır', d: 200 }
    ];

    let currentStep = 0;
    function nextStep() {
        if (currentStep < loadingSteps.length) {
            const step = loadingSteps[currentStep];
            gsap.to(progressFill, { width: step.p + '%', duration: 0.6, ease: 'power2.out' });
            percentage.textContent = step.p + '%';
            status.textContent = step.t;
            currentStep++;
            setTimeout(nextStep, step.d);
        } else {
             // Yükleme tamamlandığında
             setTimeout(() => {
                gsap.to(loadingScreen, {
                    opacity: 0, duration: 1.5, ease: 'power2.out',
                    onComplete: () => {
                        loadingScreen.classList.add('hidden');
                        isLoaded = true;
                        startIntroAnimation();
                    }
                });
            }, 500);
        }
    }
    setTimeout(nextStep, 500);

    // Özel İmleç
    if (!isMobile) {
        const cursor = document.querySelector('.cursor');
        const ring = document.querySelector('.cursor-ring');
        window.addEventListener('mousemove', (e) => {
            gsap.to(cursor, { duration: 0.2, x: e.clientX, y: e.clientY });
            gsap.to(ring, { duration: 0.5, x: e.clientX, y: e.clientY });
        });
        document.body.addEventListener('mouseleave', () => document.body.classList.add('cursor-hidden'));
        document.body.addEventListener('mouseenter', () => document.body.classList.remove('cursor-hidden'));
    }
}

function startIntroAnimation() {
    introTimeline = gsap.timeline({
        onComplete: () => {
            console.log('✨ Giriş animasyonu tamamlandı.');
            startAutoRedirect();
        }
    });

    introTimeline
        .to(globeGroup.scale, { x: 1, y: 1, z: 1, duration: 2.4, ease: 'expo.out' })
        .to('.header-section', { opacity: 1, y: 0, duration: 1.2, ease: 'expo.out' }, "-=1.6")
        .to('.logo-accent-line', { opacity: 1, scaleX: 1, duration: 1, ease: 'power2.out' }, "-=1")
        .to('.footer-section', { opacity: 1, y: 0, duration: 1, ease: 'power2.out' }, "-=0.8");
}

function startAutoRedirect() {
    let countdown = 5;
    const countdownElement = document.getElementById('countdown-text');
    const redirectLink = document.getElementById('redirect-link');

    const updateCountdown = () => {
        if (countdown > 0) {
            countdownElement.textContent = `${countdown} saniye sonra otomatik yönlendirileceksiniz...`;
            countdown--;
            setTimeout(updateCountdown, 1000);
        } else {
            countdownElement.textContent = 'Yönlendiriliyor...';
            // Ana sayfaya yönlendir
            window.location.href = redirectLink.href;
        }
    };

    // 2 saniye sonra geri sayımı başlat
    setTimeout(updateCountdown, 2000);
}

// ==========================================
// OLAY DİNLEYİCİLER
// ==========================================
function initializeEventListeners() {
    window.addEventListener('resize', onWindowResize);
    window.addEventListener('mousemove', onMouseMove);
}

function onWindowResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
    labelRenderer.setSize(window.innerWidth, window.innerHeight);
    isMobile = window.innerWidth < 768;
}

function onMouseMove(event) {
    mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
    mouse.y = -(event.clientY / window.innerHeight) * 2 + 1;
}

// ==========================================
// ANIMASYON DÖNGÜSÜ
// ==========================================
function animate() {
    requestAnimationFrame(animate);
    const t = clock.getElapsedTime();

    // Dünya ve bulutların dönüşü
    if (earth) earth.rotation.y += 0.001;
    if (clouds) clouds.rotation.y += 0.0015;

    // Kamera Parallax Etkisi
    camera.position.x += (mouse.x * 0.9 - camera.position.x) * 0.05;
    camera.position.y += (-mouse.y * 0.6 - camera.position.y) * 0.05;
    camera.lookAt(scene.position);

    // Yıldızların yavaş hareketi
    if (stars) stars.rotation.y = t * 0.006;

    // Yörüngedeki etiketlerin hareketi
    orbitersGroup.children.forEach(pivot => {
        pivot.children.forEach(anchor => {
            const data = anchor.userData;
            if (data) {
                const angle = data.baseAngle + t * data.speed;
                anchor.position.set(
                    Math.cos(angle) * data.radius,
                    data.lat * data.radius + Math.sin(t * 0.6 + angle) * 0.12,
                    Math.sin(angle) * data.radius
                );
                anchor.lookAt(camera.position);
            }
        });
    });

    // Render
    renderer.render(scene, camera);
    labelRenderer.render(scene, camera);

    // Performans
    updatePerformanceMonitor();
}

function updatePerformanceMonitor() {
    perfMonitor.frameCount++;
    const currentTime = performance.now();
    if (currentTime >= perfMonitor.lastTime + 1000) {
        perfMonitor.fps = Math.round((perfMonitor.frameCount * 1000) / (currentTime - perfMonitor.lastTime));
        perfMonitor.frameCount = 0;
        perfMonitor.lastTime = currentTime;
        document.getElementById('fps-counter').textContent = perfMonitor.fps;
    }
}

    </script>
</body>
</html>
