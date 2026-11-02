// CLAW GRABBER GAME
//

// CONFIG
var FLOOR_POS = -0.5;
var BOX_WIDTH = 4.2;
var CORNER = 2.5;
var CLAW_SPEED = 0.022;
var GRAVITY = 0.01;
var STAT_FRIC = 0.3;
var KINE_FRIC = 0.001;

var gameWidth = window.innerWidth / 2;
var gameHeight = window.innerHeight / 1.5;
if (window.innerWidth < 800) {
	gameWidth = window.innerWidth;
}

var balls = []; //   ;)
var wonPrizes = [];
var showPrize = false;
var winPoss = true;
var winNow = false;
var clawDropSpeed = 0.05;
var clawUpSpeed = 0.1;
var clawStickiness = 2;
var playsLeft = 0;
var previewRot = new THREE.Vector3(0, -0.5 - Math.PI / 2);

// INIT
var gloader = new THREE.GLTFLoader(),
	eloader = new THREE.TextureLoader();
const renderer = new THREE.WebGLRenderer({
	antialias: true,
});
renderer.setSize(gameWidth, gameHeight);
renderer.shadowMap.type = THREE.PCFSoftShadowMap; // default THREE.PCFShadowMap
var grabberBox = document.getElementById("grabber");
grabberBox.appendChild(renderer.domElement);
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(
	30,
	gameWidth / gameHeight,
	0.1,
	1000,
);

var light = new THREE.DirectionalLight();
light.position.set(0, -100, 100);
scene.add(light);

var light2 = new THREE.DirectionalLight();
light2.position.set(0, 300, 250);
scene.add(light2);

// CAMERA
var camC = new THREE.Object3D();
camC.add(camera);
camera.position.z = 30;
scene.add(camC);
camC.position.y = 5;
camC.rotation.order = "YXZ";
camC.rotation.x = -Math.PI / 8;

function seekAnimationTime(animMixer, timeInSeconds) {
	animMixer.time = 0;
	for (var i = 0; i < animMixer._actions.length; i++)
		animMixer._actions[i].time = 0;
	animMixer.update(timeInSeconds);
}

const pmremGenerator = new THREE.PMREMGenerator(renderer);
pmremGenerator.compileEquirectangularShader();

var claw, clawMixer, machine, prizes;

function getRandomInt(max) {
	return Math.floor(Math.random() * max);
}

// LOAD AND CONFIG MODELS
gloader.load("/lib/grabberclaw.glb", function (obj) {
	obj.scene.animations = obj.animations;
	scene.add((claw = obj.scene));
	claw.scale.setScalar(0.4);
	claw.position.set(-4, 10, 4);
	clawMixer = new THREE.AnimationMixer(claw);
	var action = clawMixer.clipAction(claw.animations[0]);
	action.play();

	var clawLight = new THREE.SpotLight(0xe65c75, 2, 0, 0.1, 0.9);
	claw.add(clawLight);
	claw.add(clawLight.target);
	clawLight.target.position.y = -10;
	claw.control = true;

	claw.drop = true;
	claw.lifting = false;
	claw.pos = new THREE.Vector2(-4, 4);
	claw.vel = new THREE.Vector2();
	claw.rPos = new THREE.Vector2();
	claw.rVel = new THREE.Vector2();
	claw.rotation.order = "XZY";

	claw.markers = [
		claw.getObjectByName("marker0"),
		claw.getObjectByName("marker1"),
		claw.getObjectByName("marker2"),
		claw.getObjectByName("marker3"),
	];

	for (var i = 0; i < 4; i++) {
		claw.markers[i].visible = false;
		claw.markers[i].realPos = new THREE.Vector3();
	}

	claw.height = 10;
});

gloader.load("/lib/clawmachine.gltf", function (obj) {
	scene.add((machine = obj.scene));

	machine.castShadow = true; //default is false
	machine.receiveShadow = true; //default

	machine.position.y = 0;
	machine.rotation.y = Math.PI;
	machine.scale.setScalar(5 / 2);
});

document.querySelector("#myNFT").addEventListener("texloaded", function () {
	var nftBG = document.getElementById("myNFT").innerHTML;
	eloader.load(
		"data:image/svg+xml;base64," +
			window.btoa(unescape(encodeURIComponent(nftBG))),
		function (tex) {
			tex.wrapS = THREE.RepeatWrapping;
			tex.repeat.x = -1;

			var boxMap = new THREE.MeshBasicMaterial({
				map: tex,
				side: THREE.BackSide,
			});
			skyboxGeo = new THREE.BoxGeometry(1000, 1000, 1000);
			skybox = new THREE.Mesh(skyboxGeo, [
				boxMap,
				boxMap,
				boxMap,
				boxMap,
				boxMap,
				boxMap,
				boxMap,
				boxMap,
			]);

			clawStickiness = 100;

			scene.add(skybox);
			tex.dispose();
		},
	);
});

var camRot = new THREE.Vector2(-Math.PI / 8, 0);
window.onmousemove = function (e) {
	if (e.buttons == 1)
		if (showPrize) {
			previewRot.x += (e.movementY / window.innerWidth) * 3;
			previewRot.y += (e.movementX / window.innerWidth) * 3;
			previewRot.x = Math.max(
				Math.min(previewRot.x, Math.PI / 2),
				-Math.PI / 2,
			);
		} else {
			camRot.x -= (e.movementY / window.innerWidth) * 3;
			camRot.y -= (e.movementX / window.innerWidth) * 3;
			camRot.x = Math.max(Math.min(camRot.x, 0.1), -0.5);
			camRot.y = Math.max(Math.min(camRot.y, Math.PI / 2), -Math.PI / 2);
		}
};
var camRotR = document.querySelector("#but-rr");
camRotR.addEventListener("touchstart", function (e) {
	camRot.y -= 0.1;
});
var camRotL = document.querySelector("#but-rl");
camRotL.addEventListener("touchstart", function (e) {
	camRot.y += 0.1;
});

var keys = [0, 0, 0, 0, 0];
var grabPos = new THREE.Vector2(-4, 4);
var grabOpen = 1;
var allowDown = 1;

var buttonLeft = document.querySelector("#but-l");
buttonLeft.addEventListener("mousedown", function () {
	keys[1] = 1;
});
buttonLeft.addEventListener("mouseup", function () {
	keys[1] = 0;
});
buttonLeft.addEventListener("touchstart", function (event) {
	event.preventDefault();
	keys[1] = 1;
});
buttonLeft.addEventListener("touchend", function (event) {
	event.preventDefault();
	keys[1] = 0;
});

var buttonRight = document.querySelector("#but-r");
buttonRight.addEventListener("mousedown", function () {
	keys[3] = 1;
});
buttonRight.addEventListener("mouseup", function () {
	keys[3] = 0;
});
buttonRight.addEventListener("touchstart", function (event) {
	event.preventDefault();
	keys[3] = 1;
});
buttonRight.addEventListener("touchend", function (event) {
	event.preventDefault();
	keys[3] = 0;
});

var buttonUp = document.querySelector("#but-f");
buttonUp.addEventListener("mousedown", function () {
	keys[0] = 1;
});
buttonUp.addEventListener("mouseup", function () {
	keys[0] = 0;
});
buttonUp.addEventListener("touchstart", function (event) {
	event.preventDefault();
	keys[0] = 1;
});
buttonUp.addEventListener("touchend", function (event) {
	event.preventDefault();
	keys[0] = 0;
});

var buttonDown = document.querySelector("#but-b");
buttonDown.addEventListener("mousedown", function () {
	keys[2] = 1;
});
buttonDown.addEventListener("mouseup", function () {
	keys[2] = 0;
});
buttonDown.addEventListener("touchstart", function (event) {
	event.preventDefault();
	keys[2] = 1;
});
buttonDown.addEventListener("touchend", function (event) {
	event.preventDefault();
	keys[2] = 0;
});

var buttonGrab = document.querySelector("#but-d");
buttonGrab.addEventListener("mousedown", function () {
	if (allowDown == 1) {
		keys[4] = 1;
		allowDown = 0;
	}
	setTimeout(function () {
		allowDown = 1;
	}, 650);
});
buttonGrab.addEventListener("mouseup", function () {
	keys[4] = 0;
});
buttonGrab.addEventListener("touchstart", function (event) {
	event.preventDefault();
	if (allowDown == 1) {
		keys[4] = 1;
		allowDown = 0;
	}
	setTimeout(function () {
		allowDown = 1;
	}, 650);
});
buttonGrab.addEventListener("touchend", function (event) {
	event.preventDefault();
	keys[4] = 0;
});

window.onkeydown = function (e) {
	switch (e.code) {
		case "ArrowUp":
		case "KeyW":
			keys[0] = 1;
			break;
		case "ArrowLeft":
		case "KeyA":
			keys[1] = 1;
			break;
		case "ArrowDown":
		case "KeyS":
			keys[2] = 1;
			break;
		case "ArrowRight":
		case "KeyD":
			keys[3] = 1;
			break;
		case "Space":
			keys[4] = 1;
			break;
	}
};

window.onkeyup = function (e) {
	switch (e.code) {
		case "ArrowUp":
		case "KeyW":
			keys[0] = 0;
			break;
		case "ArrowLeft":
		case "KeyA":
			keys[1] = 0;
			break;
		case "ArrowDown":
		case "KeyS":
			keys[2] = 0;
			break;
		case "ArrowRight":
		case "KeyD":
			keys[3] = 0;
			break;
		case "Space":
			keys[4] = 0;
			break;
	}
};

var grabbingSeq = 0;

function render() {
	requestAnimationFrame(render);
	var lv = claw.vel.clone();
	if (claw.control) {
		if (keys[0]) claw.vel.y -= CLAW_SPEED;
		if (keys[1]) claw.vel.x -= CLAW_SPEED;
		if (keys[2]) claw.vel.y += CLAW_SPEED;
		if (keys[3]) claw.vel.x += CLAW_SPEED;
		if (keys[4]) {
			claw.control = false;
			playsLeft = playsLeft - 1;

			winNow = true;

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "grabber-backend?pid=" + accounts[0], true);
			xmlhttp.send();

			// When server response has loaded
			xmlhttp.onreadystatechange = function () {
				if (xmlhttp.readyState == XMLHttpRequest.DONE) {
					if (xmlhttp.status == 200) {
						// Parse response
						JSON.parse(xmlhttp.responseText);
						document.querySelector(".plays-more").innerHTML = playsLeft;
					}
				}
			};

			setTimeout(function () {
				grabbingSeq = 1;
			}, 200);
		}
	}
	if (grabbingSeq == 0) {
		claw.lifting = false;
		claw.drop = true;

		if (grabOpen < 1) grabOpen += 0.05;
	}
	// Dropping
	else if (grabbingSeq == 1) {
		claw.drop = false;
		var closeEnough = false;

		// Trigger close claw
		if (keys[4]) {
			claw.control = false;
			closeEnough = true;

			setTimeout(function () {
				grabbingSeq = 2;
			}, 5);
			grabbingSeq = 1.5;
		}

		for (var i = 0; i < 4; i++)
			if (claw.markers[i].minDist < 0.11) closeEnough = true;

		if (claw.height < 2) {
			setTimeout(function () {
				grabbingSeq = 2;
			}, 500);
			grabbingSeq = 1.5;
		} else claw.height -= clawDropSpeed;
		// Dropping Stop
	} else if (grabbingSeq == 1.5) {
		claw.height -= clawDropSpeed;
		// Claw Closing
	} else if (grabbingSeq == 2) {
		var closeEnough = false;
		for (var i = 0; i < 4; i++)
			if (claw.markers[i].minDist < -0.1) closeEnough = true;
		if (grabOpen <= 0) {
			setTimeout(function () {
				grabbingSeq = 3;
			}, 200);
			grabbingSeq = -1;
		} else grabOpen -= 0.01;
		// Going Up
	} else if (grabbingSeq == 3) {
		claw.lifting = true;
		var closeEnough = false;
		for (var i = 0; i < 4; i++)
			if (claw.markers[i].minDist < 0) closeEnough = true;
		if (!closeEnough && grabOpen > 0) grabOpen -= 0.01;
		if (claw.height >= 10) {
			claw.height = 10;
			setTimeout(function () {
				grabbingSeq = 4;
			}, 200);
			grabbingSeq = -1;
		} else claw.height += clawUpSpeed;
		// Return to chute
	} else if (grabbingSeq == 4) {
		// Above chute
		if (claw.pos.x <= -4 && claw.pos.y >= 4) {
			setTimeout(function () {
				grabbingSeq = 0;
				claw.control = true;
				if (playsLeft <= 0) {
					showPrize = true;
				}
			}, 200);
			grabbingSeq == -1;
		} else {
			if (claw.pos.x > -4) {
				claw.vel.x -= CLAW_SPEED * 0.8;
			} else if (claw.pos.y < 4) {
				claw.vel.y += CLAW_SPEED * 0.5;
			}
		}
	}
	if (claw.pos.x < -4) {
		claw.pos.x = -4;
		claw.vel.x = 0;
	}
	if (claw.pos.x > 4) {
		claw.pos.x = 4;
		claw.vel.x = 0;
	}
	if (claw.pos.y < -4) {
		claw.pos.y = -4;
		claw.vel.y = 0;
	}
	if (claw.pos.y > 4) {
		claw.pos.y = 4;
		claw.vel.y = 0;
	}
	claw.pos.add(claw.vel);
	claw.position.x = claw.pos.x;
	claw.position.y = claw.height;
	claw.position.z = claw.pos.y;

	grabOpen = Math.max(Math.min(grabOpen, 1), 0);
	seekAnimationTime(clawMixer, (1 - grabOpen) * 4.16);
	for (var i = 0; i < 4; i++) {
		claw.markers[i].minDist = 1;
		claw.markers[i].minItem = undefined;
		claw.markers[i].delta = claw.markers[i].realPos.clone();
		claw.markers[i].getWorldPosition(claw.markers[i].realPos);
		claw.markers[i].delta.sub(claw.markers[i].realPos).negate();
	}

	claw.rVel.add(lv.sub(claw.vel).multiplyScalar(0.1));
	claw.rVel.sub(claw.rPos.clone().multiplyScalar(0.01));
	claw.rPos.add(claw.rVel);
	claw.rVel.multiplyScalar(0.98);
	claw.vel.multiplyScalar(0.9);
	claw.rotation.x = -claw.rPos.y;
	claw.rotation.z = claw.rPos.x;

	for (var i = 0; i < balls.length; i++) {
		var b = balls[i];
		b.position.add(b.velocity);
		b.rotateOnWorldAxis(new THREE.Vector3(1, 0, 0), b.rotVel.x);
		b.rotateOnWorldAxis(new THREE.Vector3(0, 1, 0), b.rotVel.y);
		b.rotateOnWorldAxis(new THREE.Vector3(0, 0, 1), b.rotVel.z);
		b.velocity.multiplyScalar(0.99);
		b.rotVel.multiplyScalar(0.95);
		if (!b.settled) b.velocity.y -= GRAVITY;
		var onFloor = false;
		for (var j = 0; j < balls.length; j++) {
			if (i == j) continue;
			var q = balls[j];
			var dist = b.position.distanceTo(q.position);
			var tr = b.radius + q.radius;
			if (dist < tr) {
				b.chute = false;
				var e = 0.5;
				var n = b.position.clone().sub(q.position).normalize();
				var r = b.position
					.clone()
					.multiplyScalar(q.radius / (b.radius + q.radius));
				r.add(
					q.position.clone().multiplyScalar(b.radius / (b.radius + q.radius)),
				);
				var rb = r.clone().sub(b.position),
					rq = r.clone().sub(q.position);
				var dd = (Math.max(0, tr - dist - 0.1) / (b.mass + q.mass)) * 0.2;
				b.position.add(n.clone().multiplyScalar(dd * q.mass));
				q.position.sub(n.clone().multiplyScalar(dd * b.mass));
				if (
					b.velocity
						.clone()
						.sub(q.velocity)
						.add(b.rotVel.clone().cross(rb))
						.sub(q.rotVel.clone().cross(rq))
						.length() <
					GRAVITY * 1
				)
					if (b.settled || q.settled) {
						onFloor = true;
						continue;
					}
				var dv = b.velocity.clone().sub(q.velocity).dot(n);
				if (dv > 0) continue;
				var jr = (-(1 + e) * dv) / (1 / b.mass + 1 / q.mass);
				var fv = b.velocity
					.clone()
					.sub(q.velocity)
					.sub(n.clone().multiplyScalar(dv));
				fv.add(b.rotVel.clone().cross(rb)).sub(q.rotVel.clone().cross(rq));
				fv.multiplyScalar(
					1 / b.mass +
						1 / q.mass +
						(b.radius * b.radius) / b.moi +
						(q.radius * q.radius) / q.moi,
				);
				if (fv.length() > STAT_FRIC * jr)
					fv = fv.normalize().multiplyScalar(KINE_FRIC * jr);

				b.velocity.add(n.clone().multiplyScalar(jr / b.mass));
				q.velocity.sub(n.clone().multiplyScalar(jr / q.mass));

				b.velocity.sub(fv.clone().divideScalar(b.mass));
				q.velocity.add(fv.clone().divideScalar(q.mass));

				b.rotVel.sub(rb.clone().cross(fv).divideScalar(b.moi));
				q.rotVel.add(rq.clone().cross(fv).divideScalar(q.moi));
			}
		}
		if (
			!b.chute &&
			b.position.y < b.radius - FLOOR_POS &&
			b.velocity.y <= GRAVITY
		) {
			var r = new THREE.Vector3(0, -b.radius, 0);
			b.position.y = Math.max(b.position.y, b.radius - FLOOR_POS - 0.1);
			var fv = b.velocity.clone();
			fv.y = 0;
			fv.add(b.rotVel.clone().cross(r));
			if (fv.length() < GRAVITY * 2 && Math.abs(b.velocity.y) < GRAVITY * 2) {
				onFloor = true;
				b.velocity.y = 0;
			} else if (fv.length() > STAT_FRIC * Math.abs(b.velocity.y) * 1.5)
				fv = fv
					.normalize()
					.multiplyScalar(KINE_FRIC * Math.abs(b.velocity.y) * 1.5);
			fv.divideScalar(1 / b.mass + (b.radius * b.radius) / b.moi);
			b.velocity.sub(fv.clone().divideScalar(b.mass));
			b.rotVel.sub(r.cross(fv).divideScalar(b.moi));
			b.velocity.y = Math.abs(b.velocity.y) * 0.5;
		}
		if (b.position.x < b.radius - BOX_WIDTH) {
			b.position.x = b.radius - BOX_WIDTH;
			b.velocity.x = Math.abs(b.velocity.x) * 0.5;
		}
		if (b.position.x > BOX_WIDTH - b.radius) {
			b.position.x = BOX_WIDTH - b.radius;
			b.velocity.x = -Math.abs(b.velocity.x) * 0.5;
		}
		if (b.position.z < b.radius - BOX_WIDTH) {
			b.position.z = b.radius - BOX_WIDTH;
			b.velocity.z = Math.abs(b.velocity.z) * 0.5;
		}
		if (b.position.z > BOX_WIDTH - b.radius) {
			b.position.z = BOX_WIDTH - b.radius;
			b.velocity.z = -Math.abs(b.velocity.z) * 0.5;
		}

		// Is it a win?
		if (
			b.position.y > 2 + b.radius &&
			b.position.z > BOX_WIDTH - CORNER - b.radius &&
			b.position.x < CORNER + b.radius - BOX_WIDTH
		)
			if (winPoss && winNow) {
				b.chute = true;
			} else {
				b.chute = false;
			}
		// WIN
		if (b.chute && b.position.y < -3) {
			wonPrizes.push(b);
			balls.splice(i, 1);

			prizeCode = b.myindex;
			prizeTitle = $("#myNFT").data(prizeCode);

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open(
				"GET",
				"grabber-backend?cid=" +
					accounts[0] +
					"&time=" +
					prizeCode +
					"&id=" +
					prizeCode,
				true,
			);
			xmlhttp.send();

			document.querySelector(".my-prize-list").innerHTML =
				document.querySelector(".my-prize-list").innerHTML +
				"<br>" +
				prizeTitle;

			continue;
		}

		// LOOSE
		if (
			!b.chute &&
			b.position.z > BOX_WIDTH - CORNER - b.radius &&
			b.position.x < CORNER + b.radius - BOX_WIDTH
		) {
			if (-b.position.x > b.position.z) {
				b.position.z = BOX_WIDTH - CORNER - b.radius;
				b.velocity.z = -Math.abs(b.velocity.z) * 0.5;
			} else {
				b.position.x = CORNER + b.radius - BOX_WIDTH;
				b.velocity.x = Math.abs(b.velocity.x) * 0.5;
			}
		}

		b.settled = onFloor && b.frames > 20;

		if (b.settled) {
			b.velocity.multiplyScalar(0.8);
			b.rotVel.multiplyScalar(0.8);
		}

		if (!claw.drop)
			for (var j = 0; j < 4; j++) {
				var dist =
					b.position.clone().sub(claw.markers[j].realPos).length() - b.radius;
				if (dist < claw.markers[j].minDist) {
					claw.markers[j].minDist = dist;
					claw.markers[j].minItem = b;
					if (dist < 0.2) {
						var r = b.position.clone().sub(claw.markers[j].realPos),
							n = r.clone().normalize();
						b.position.add(n.clone().multiplyScalar(Math.max(0.05 - dist, 0)));
						var force = claw.markers[j].delta
							.clone()
							.sub(b.velocity.clone().sub(b.rotVel.clone().cross(r)));
						var fn = force.clone().normalize();
						force.divideScalar(
							1 / b.mass + (1 / b.moi) * r.clone().cross(fn).cross(r).dot(fn),
						);
						b.velocity.add(force.clone().divideScalar(b.mass));
						b.rotVel.sub(r.clone().cross(force).divideScalar(b.moi));
						b.settled = false;
						b.frames = 0;
					}
				}
			}
		if (b.lastPos.clone().sub(b.position).length() < 0.1) b.frames++;
		else b.lastPos.copy(b.position.clone());
	}
	if (playsLeft <= 0 && showPrize == true) {
		claw.control = false;
		camC.rotation.x *= 0.8;
		camC.rotation.y *= 0.8;
		camC.position.z += 0.05;
		previewRot.y += 0.03;
		previewRot.x += 0.03;

		for (var i = 0; i < wonPrizes.length; i++) {
			wonPrizes[i].position
				.multiplyScalar(0.8)
				.add(new THREE.Vector3(10, 5, 25).multiplyScalar(0.15));
			wonPrizes[i].position.z = 10 * i + 35;
			wonPrizes[i].position.y = 6 - i * 2.4;
			wonPrizes[i].position.x = 0;

			wonPrizes[i].scale.setScalar(1.8);
			wonPrizes[i].rotation.y = previewRot.y + 180;
		}
	} else {
		camC.rotation.x = camRot.x * 0.2 + camC.rotation.x * 0.8;
		camC.rotation.y = camRot.y * 0.2 + camC.rotation.y * 0.8;
	}
	renderer.render(scene, camera);
}

document.querySelector("#myNFT").addEventListener("addPrizes", function () {
	playsLeft = $("#myNFT").data("playno");
	var maxBig = $("#myNFT").data("maxBig");
	var maxSmall = $("#myNFT").data("maxSmall");

	var prizeSet = [];
	var carrySet = 0;
	var smC = 0;

	for (var io = 0; io < maxBig; io++) {
		var geometryD = new THREE.SphereGeometry(0.64, 25, 10);
		var materialD = new THREE.MeshBasicMaterial();
		var sphereD = new THREE.Mesh(geometryD, materialD);

		smC++;
		if (smC > 3) {
			smC = 1;
		}

		if (smC == 1) {
			sphereD.userData.color = "#ac20e8";
			sphereD.userData.theName = "stacker-big";
			sphereD.userData.theTitle = $("#myNFT").data("stackerBig");
		}
		if (smC == 2) {
			sphereD.userData.color = "#4bbe29";
			sphereD.userData.theName = "scratch-big";
			sphereD.userData.theTitle = $("#myNFT").data("scratchBig");
		}
		if (smC == 3) {
			sphereD.userData.color = "#f97b46";
			sphereD.userData.theName = "wheel-big";
			sphereD.userData.theTitle = $("#myNFT").data("wheelBig");
		}

		sphereD.userData.scaleSet = 1;

		prizeSet[io] = sphereD;
		carrySet = io;
	}

	for (var io = 0; io < maxSmall; io++) {
		var geometryD = new THREE.SphereGeometry(0.45, 25, 10);
		var materialD = new THREE.MeshBasicMaterial();
		var sphereD = new THREE.Mesh(geometryD, materialD);

		smC++;
		if (smC > 3) {
			smC = 1;
		}

		if (smC == 1) {
			sphereD.userData.color = "#ac20e8";
			sphereD.userData.theName = "stacker-small";
			sphereD.userData.theTitle = $("#myNFT").data("stackerSmall");
		}
		if (smC == 2) {
			sphereD.userData.color = "#4bbe29";
			sphereD.userData.theName = "scratch-small";
			sphereD.userData.theTitle = $("#myNFT").data("scratchSmall");
		}
		if (smC == 3) {
			sphereD.userData.color = "#f97b46";
			sphereD.userData.theName = "wheel-small";
			sphereD.userData.theTitle = $("#myNFT").data("wheelSmall");
		}
		sphereD.userData.scaleSet = 1;
		carrySet++;
		prizeSet[carrySet] = sphereD;
	}

	for (var i = 0; i < prizeSet.length; i++) {
		var b = prizeSet[i].clone();
		b.material = new THREE.MeshPhysicalMaterial();
		b.material.color = new THREE.Color(b.userData.color);
		b.material.reflectivity = 0;
		b.material.transmission = 0;
		b.material.roughness = 0;
		b.material.metalness = 0.5;
		b.material.shininess = 10;
		b.material.opacity = 1.0;
		b.material.clearcoatRoughness = 0;
		b.material.ior = 0;
		b.material.transparent = false;
		b.myindex = b.userData.theName;
		b.castShadow = true;
		b.receiveShadow = true;
		b.mass = 1;
		b.scale.setScalar(b.userData.scaleSet);
		b.radius = b.geometry.parameters.radius;
		b.moi = clawStickiness;
		b.settled = false;
		b.lastPos = new THREE.Vector3();
		b.frames = 0;
		b.chute = false;
		b.position.copy(
			new THREE.Vector3(
				Math.random() + 1,
				Math.random() * 20 + 20,
				Math.random() - 0.5,
			),
		);
		b.velocity = new THREE.Vector3(Math.random(), Math.random());
		b.rotVel = new THREE.Vector3(0, 0);

		scene.add(b);
		balls.push(b);
	}

	render();
});
