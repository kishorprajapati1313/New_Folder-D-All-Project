import * as THREE from 'three';
import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';

let scene, camera, renderer;

function init() {
    // Create a scene with a background color
    scene = new THREE.Scene();
    scene.background = new THREE.Color(12);

    // Set up the camera
    camera = new THREE.PerspectiveCamera(40, window.innerWidth / window.innerHeight, 1, 5000);
    camera.rotation.y = (45 / 180) * Math.PI;
    camera.position.x = 800;
    camera.position.y = 100;
    camera.position.z = 1000;

    // Create an ambient light
    const hlight = new THREE.AmbientLight(0x404040, 100);
    scene.add(hlight);

    // Create a directional light
    const directionalLight = new THREE.DirectionalLight(0xffffff, 100);
    directionalLight.position.set(0, 1, 0);
    directionalLight.castShadow = true;
    scene.add(directionalLight);

    // Initialize the WebGLRenderer
    renderer = new THREE.WebGLRenderer({ antialias: true });
    renderer.setSize(window.innerWidth, window.innerHeight);

    // Append the renderer's DOM element to the document
    document.body.appendChild(renderer.domElement);

    // Load the 3D model using GLTFLoader
    const loader = new GLTFLoader();
    loader.load('low_poly_chicken/scene.gltf', function (gltf) {
        const chicken = gltf.scene.children[0];
        chicken.scale.set(0.5, 0.5, 0.5);
        scene.add(chicken);

        // Render the scene with the camera
        renderer.render(scene, camera);
    });
}

// Initialize the 3D scene
init();
