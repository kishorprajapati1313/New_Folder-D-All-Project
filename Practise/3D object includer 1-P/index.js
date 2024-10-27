import * as THREE from 'three';
import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';

const scene = new THREE.Scene();
scene.background =  new THREE.Color(0xdddddd);

let camera = new THREE.PerspectiveCamera(40, window.innerWidth/window.innerHight, 1, 5000); 

const hlight = new THREE.AmbientLight (0x404040,100);
scene.add(hlight);

let render = new THREE.WebGLRenderer({antialias:true})
reder.setSize(window.innerWidth, window.innerHeight)
document.body.appendChild(rener.domElement);
